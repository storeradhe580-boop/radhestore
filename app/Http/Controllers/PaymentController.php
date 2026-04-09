<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Show checkout page with order summary
     */
    public function checkout()
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        // Razorpay test key
        $razorpayKey = env('RAZORPAY_KEY_ID', 'rzp_test_your_key_here');
        
        return view('payment.checkout', compact('cart', 'total', 'razorpayKey'));
    }

    /**
     * Create Razorpay order
     */
    public function createOrder(Request $request)
    {
        try {
            $cart = session()->get('cart', []);
            
            if (empty($cart)) {
                return response()->json(['error' => 'Cart is empty'], 400);
            }
            
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            
            $amount = $total * 100; // Convert to paise
            
            // Check if Razorpay SDK is available
            if (!class_exists('\Razorpay\Api\Api')) {
                return response()->json(['error' => 'Razorpay SDK not installed. Run: composer require razorpay/razorpay'], 500);
            }
            
            $keyId = env('RAZORPAY_KEY_ID');
            $keySecret = env('RAZORPAY_KEY_SECRET');
            
            if (empty($keyId) || $keyId === 'rzp_test_your_key_here') {
                return response()->json(['error' => 'Razorpay API key not configured'], 500);
            }
            
            $api = new \Razorpay\Api\Api($keyId, $keySecret);
            
            $orderData = [
                'receipt' => 'order_' . Str::random(10),
                'amount' => $amount,
                'currency' => 'INR',
                'payment_capture' => 1
            ];
            
            $razorpayOrder = $api->order->create($orderData);
            
            return response()->json([
                'success' => true,
                'order_id' => $razorpayOrder['id'],
                'amount' => $amount,
                'currency' => 'INR',
                'key' => $keyId
            ]);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Verify payment and create order
     */
    public function verifyPayment(Request $request)
    {
        try {
            // Manual validation to always return JSON
            if (!$request->has('razorpay_payment_id') || !$request->has('razorpay_order_id') || !$request->has('razorpay_signature')) {
                return response()->json([
                    'success' => false,
                    'error' => 'Missing required payment parameters'
                ], 400);
            }
            
            // Check if Razorpay SDK is available
            if (!class_exists('\Razorpay\Api\Api')) {
                return response()->json([
                    'success' => false,
                    'error' => 'Razorpay SDK not installed'
                ], 500);
            }
            
            $keyId = env('RAZORPAY_KEY_ID');
            $keySecret = env('RAZORPAY_KEY_SECRET');
            
            if (empty($keyId) || empty($keySecret)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Razorpay API keys not configured'
                ], 500);
            }
            
            $api = new \Razorpay\Api\Api($keyId, $keySecret);
            
            // Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];
            
            $api->utility->verifyPaymentSignature($attributes);
            
            // Create order in database
            $cart = session()->get('cart', []);
            
            if (empty($cart)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Cart is empty'
                ], 400);
            }
            
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }
            
            $order = Order::create([
                'user_id' => Auth::id(),
                'order_number' => 'ORD-' . strtoupper(Str::random(8)),
                'total_amount' => $total,
                'payment_id' => $request->razorpay_payment_id,
                'payment_method' => 'razorpay',
                'payment_status' => 'paid',
                'order_status' => 'processing',
                'shipping_address' => $request->shipping_address ?? Auth::user()->address,
                'shipping_city' => $request->shipping_city ?? Auth::user()->city,
                'shipping_state' => $request->shipping_state ?? Auth::user()->state,
                'shipping_pincode' => $request->shipping_pincode ?? Auth::user()->pincode,
                'shipping_phone' => $request->shipping_phone ?? Auth::user()->phone,
            ]);
            
            // Create order items
            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['price'] * $item['quantity']
                ]);
            }
            
            // Clear cart
            session()->forget('cart');
            
            return response()->json([
                'success' => true,
                'order_id' => $order->order_number,
                'message' => 'Payment successful! Order placed.'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Payment verification failed: ' . $e->getMessage()
            ], 400);
        }
    }

    /**
     * Handle payment failure
     */
    public function paymentFailed(Request $request)
    {
        return response()->json([
            'success' => false,
            'error' => 'Payment was cancelled or failed'
        ]);
    }

    /**
     * Show order success page
     */
    public function success($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)
                      ->where('user_id', Auth::id())
                      ->firstOrFail();
        
        return view('payment.success', compact('order'));
    }
}

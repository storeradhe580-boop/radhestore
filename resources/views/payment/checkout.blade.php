@extends('layouts.app')

@section('title', 'Checkout - Radhe Store')

@section('content')
<div class="w-full max-w-6xl mx-auto px-3 md:px-10 py-8">
    <h1 class="text-2xl md:text-3xl font-bold text-[#2b0505] mb-8 text-center">Checkout</h1>
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Order Summary -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-black/5">
            <h2 class="text-lg font-bold text-[#2b0505] mb-4">Order Summary</h2>
            
            <div class="space-y-4 mb-6">
                @foreach($cart as $item)
                <div class="flex items-center gap-4 py-3 border-b border-gray-100">
                    <div class="w-16 h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                        <img src="{{ $item['image'] ?? asset('images/default-product.jpg') }}" 
                             alt="{{ $item['name'] }}" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-sm font-medium text-[#2b0505]">{{ $item['name'] }}</h3>
                        <p class="text-xs text-gray-500">Qty: {{ $item['quantity'] }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-[#D4AF37]">₹{{ number_format($item['price'] * $item['quantity'], 0) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="border-t border-gray-200 pt-4">
                <div class="flex justify-between items-center text-lg font-bold">
                    <span class="text-[#2b0505]">Total:</span>
                    <span class="text-[#D4AF37]">₹{{ number_format($total, 0) }}</span>
                </div>
            </div>
        </div>
        
        <!-- Payment Section -->
        <div class="bg-white rounded-xl p-6 shadow-sm border border-black/5">
            <h2 class="text-lg font-bold text-[#2b0505] mb-4">Payment</h2>
            
            <!-- Shipping Details Form -->
            <form id="shipping-form" class="space-y-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Shipping Address</label>
                    <textarea name="shipping_address" id="shipping_address" rows="3" 
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#D4AF37] focus:border-[#D4AF37]"
                              required>{{ Auth::user()->address ?? '' }}</textarea>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type="text" name="shipping_city" id="shipping_city" 
                               value="{{ Auth::user()->city ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#D4AF37] focus:border-[#D4AF37]"
                               required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                        <input type="text" name="shipping_state" id="shipping_state" 
                               value="{{ Auth::user()->state ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#D4AF37] focus:border-[#D4AF37]"
                               required>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pincode</label>
                        <input type="text" name="shipping_pincode" id="shipping_pincode" 
                               value="{{ Auth::user()->pincode ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#D4AF37] focus:border-[#D4AF37]"
                               required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                        <input type="tel" name="shipping_phone" id="shipping_phone" 
                               value="{{ Auth::user()->phone ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-[#D4AF37] focus:border-[#D4AF37]"
                               required>
                    </div>
                </div>
            </form>
            
            <!-- Pay Button -->
            <button id="pay-btn" 
                    class="w-full py-4 bg-[#2b0505] text-white font-bold rounded-lg hover:bg-[#4a0a0a] transition-all duration-300 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                Pay ₹{{ number_format($total, 0) }}
            </button>
            
            <p class="text-xs text-gray-500 text-center mt-4">
                <i class="bi bi-shield-check"></i> Secure payment powered by Razorpay
            </p>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
// Helper function to show alerts (uses SweetAlert if available, otherwise alert)
function showAlert(options) {
    if (typeof Swal !== 'undefined') {
        Swal.fire(options);
    } else {
        alert(options.title + ': ' + options.text);
    }
}

document.getElementById('pay-btn').addEventListener('click', async function() {
    const btn = this;
    btn.disabled = true;
    btn.innerHTML = '<i class="bi bi-arrow-repeat animate-spin"></i> Processing...';
    
    try {
        // Create Razorpay order
        const orderResponse = await fetch('{{ route("payment.order.create") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        
        // Check if response is OK before parsing JSON
        if (!orderResponse.ok) {
            const text = await orderResponse.text();
            throw new Error('Server error: ' + orderResponse.status + ' - ' + text.substring(0, 100));
        }
        
        const orderData = await orderResponse.json();
        
        if (orderData.error) {
            throw new Error(orderData.error);
        }
        
        if (!orderData.success || !orderData.order_id) {
            throw new Error('Invalid order response from server');
        }
        
        // Razorpay checkout options with UPI enabled
        const options = {
            key: orderData.key,
            amount: orderData.amount,
            currency: orderData.currency,
            name: 'Radhe Store',
            description: 'Order Payment',
            order_id: orderData.order_id,
            // Enable all payment methods including UPI
            method: {
                upi: {
                    flow: 'collect',
                    apps: ['google_pay', 'phonepe', 'paytm', 'bhim', 'amazon_pay']
                },
                card: true,
                netbanking: true,
                wallet: true,
                emi: false,
                paylater: false
            },
            config: {
                display: {
                    language: 'en',
                    hide: [
                        { method: 'emi' },
                        { method: 'paylater' }
                    ]
                }
            },
            handler: async function(response) {
                try {
                    // Verify payment
                    const verifyResponse = await fetch('{{ route("payment.verify") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            razorpay_order_id: response.razorpay_order_id,
                            razorpay_signature: response.razorpay_signature,
                            shipping_address: document.getElementById('shipping_address').value,
                            shipping_city: document.getElementById('shipping_city').value,
                            shipping_state: document.getElementById('shipping_state').value,
                            shipping_pincode: document.getElementById('shipping_pincode').value,
                            shipping_phone: document.getElementById('shipping_phone').value
                        })
                    });
                    
                    // Check if response is OK before parsing JSON
                    if (!verifyResponse.ok) {
                        const text = await verifyResponse.text();
                        throw new Error('Verification failed: ' + verifyResponse.status + ' - ' + text.substring(0, 100));
                    }
                    
                    const verifyData = await verifyResponse.json();
                    
                    if (verifyData.success) {
                        showAlert({
                            icon: 'success',
                            title: 'Payment Successful!',
                            text: 'Your order has been placed. Order ID: ' + verifyData.order_id,
                            confirmButtonColor: '#2b0505'
                        });
                        setTimeout(() => {
                            window.location.href = '{{ route("payment.success", ["order" => "ORDER_PLACEHOLDER"]) }}'.replace('ORDER_PLACEHOLDER', verifyData.order_id);
                        }, 1500);
                    } else {
                        showAlert({
                            icon: 'error',
                            title: 'Payment Failed',
                            text: verifyData.error || 'Payment verification failed',
                            confirmButtonColor: '#2b0505'
                        });
                    }
                } catch (error) {
                    showAlert({
                        icon: 'error',
                        title: 'Error',
                        text: error.message,
                        confirmButtonColor: '#2b0505'
                    });
                }
            },
            prefill: {
                name: '{{ Auth::user()->name }}',
                email: '{{ Auth::user()->email }}',
                contact: '{{ Auth::user()->phone ?? "" }}',
                method: 'upi' // Prefer UPI as default
            },
            notes: {
                address: 'Radhe Store Order',
                merchant_order_id: orderData.order_id
            },
            theme: {
                color: '#2b0505',
                backdrop_color: '#000000'
            },
            modal: {
                ondismiss: function() {
                    btn.disabled = false;
                    btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg> Pay ₹{{ number_format($total, 0) }}';
                }
            }
        };
        
        const rzp = new Razorpay(options);
        
        rzp.on('payment.failed', function(response) {
            showAlert({
                icon: 'error',
                title: 'Payment Failed',
                text: response.error.description,
                confirmButtonColor: '#2b0505'
            });
            btn.disabled = false;
            btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg> Pay ₹{{ number_format($total, 0) }}';
        });
        
        rzp.open();
        
    } catch (error) {
        showAlert({
            icon: 'error',
            title: 'Error',
            text: error.message,
            confirmButtonColor: '#2b0505'
        });
        btn.disabled = false;
        btn.innerHTML = '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg> Pay ₹{{ number_format($total, 0) }}';
    }
});
</script>
@endpush
@endsection

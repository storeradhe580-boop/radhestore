# Razorpay Payment Integration - Test Guide

## Quick Test

### 1. Visit Test Page
Go to: `https://your-site.com/payment/test`

### 2. Enter Amount
Default is ₹100, change if needed

### 3. Click "Pay Now"
This will:
- Call `/create-order` endpoint
- Get order_id, key, amount from server
- Open Razorpay checkout popup

### 4. Use Test Card
- **Card Number**: `5267 3181 8797 5449`
- **Expiry**: `12/25`
- **CVV**: `123`
- **Name**: Any name
- **OTP**: `1234`

### 5. Success!
You should see "Payment Successful!" with Payment ID

---

## How It Works

### Backend (PaymentController.php)
```php
// 1. Get API keys from .env
$keyId = env('RAZORPAY_KEY');
$keySecret = env('RAZORPAY_SECRET');

// 2. Initialize Razorpay API
$api = new \Razorpay\Api\Api($keyId, $keySecret);

// 3. Create order
$orderData = [
    'amount' => $amount * 100, // in paise
    'currency' => 'INR',
    'receipt' => 'test_' . Str::random(8)
];
$order = $api->order->create($orderData);

// 4. Return JSON
return response()->json([
    'order_id' => $order['id'],
    'key' => $keyId,
    'amount' => $amountInPaise
]);
```

### Frontend (test.blade.php)
```javascript
// 1. Call /create-order
const response = await fetch('/create-order', {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ amount: amount })
});
const data = await response.json();

// 2. Open Razorpay
const options = {
    key: data.key,
    amount: data.amount,
    order_id: data.order_id,
    handler: function(response) {
        // Payment success
        alert('Payment ID: ' + response.razorpay_payment_id);
    }
};
const rzp = new Razorpay(options);
rzp.open();
```

---

## Routes

| URL | Method | Description |
|-----|--------|-------------|
| `/payment/test` | GET | Test payment page |
| `/create-order` | POST | Create Razorpay order |

---

## Environment Variables (.env)

```env
RAZORPAY_KEY=rzp_test_YOUR_KEY_HERE
RAZORPAY_SECRET=YOUR_SECRET_HERE
```

---

## If You Get "API Key Not Configured" Error

### Check 1: .env file
```bash
# Should show your actual keys
grep RAZORPAY .env
```

### Check 2: Clear cache
```bash
php artisan config:clear
php artisan cache:clear
```

### Check 3: Install SDK
```bash
composer require razorpay/razorpay:^2.9
```

---

## Integration in Cart/Checkout

To use in your cart, call `/create-order` instead of the cart-based flow:

```javascript
// In cart.blade.php or checkout
fetch('/create-order', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    },
    body: JSON.stringify({ amount: {{ $total }} })
})
```

---

## Test Cards

| Card Type | Number | CVV | Expiry |
|-----------|--------|-----|--------|
| Visa | 4111 1111 1111 1111 | 123 | 12/25 |
| Mastercard | 5267 3181 8797 5449 | 123 | 12/25 |
| Amex | 3714 4963 5398 431 | 1234 | 12/25 |

---

## Troubleshooting

| Error | Solution |
|-------|----------|
| "API key not configured" | Add RAZORPAY_KEY and RAZORPAY_SECRET to .env |
| "SDK not installed" | Run `composer require razorpay/razorpay` |
| "Order creation failed" | Check API keys are correct |
| "Invalid JSON" | Check server returns valid JSON, not HTML error |

---

## Next Steps

1. ✅ Test with `/payment/test`
2. ✅ Verify payments work
3. ⏭️ Integrate into cart/checkout flow
4. ⏭️ Save orders to database after payment
5. ⏭️ Handle payment verification

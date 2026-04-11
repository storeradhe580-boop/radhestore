# Razorpay UPI Payment Integration Guide

## Overview
Razorpay checkout now supports UPI payments including Google Pay, PhonePe, Paytm, and other UPI apps.

## Configuration

### JavaScript Options
```javascript
const options = {
    key: data.key,
    amount: data.amount,
    currency: 'INR',
    order_id: data.order_id,
    
    // Payment Methods Configuration
    method: {
        upi: {
            flow: 'collect',  // 'collect' or 'intent'
            apps: [
                'google_pay',   // Google Pay
                'phonepe',      // PhonePe
                'paytm',        // Paytm
                'bhim',         // BHIM
                'amazon_pay'    // Amazon Pay
            ]
        },
        card: true,         // Enable Credit/Debit cards
        netbanking: true,   // Enable Netbanking
        wallet: true,       // Enable Wallets (Paytm, etc.)
        emi: false,         // Disable EMI
        paylater: false     // Disable Pay Later
    },
    
    // Display Configuration
    config: {
        display: {
            language: 'en',
            hide: [
                { method: 'emi' },
                { method: 'paylater' }
            ]
        }
    },
    
    // Prefill UPI as preferred method
    prefill: {
        name: 'Customer Name',
        email: 'customer@example.com',
        contact: '9999999999',
        method: 'upi'  // This sets UPI as default
    },
    
    handler: function(response) {
        // Handle success
        console.log('Payment ID:', response.razorpay_payment_id);
    }
};

const rzp = new Razorpay(options);
rzp.open();
```

## Test Mode vs Live Mode

### Test Mode
- UPI options may be limited
- Use test UPI VPA: `success@razorpay`
- Test card: `5267 3181 8797 5449`

### Live Mode
- Full UPI support with all apps
- Google Pay, PhonePe, Paytm fully functional
- QR code option available

## UPI Flows

### 1. Collect Flow (Recommended)
```javascript
method: {
    upi: {
        flow: 'collect',
        apps: ['google_pay', 'phonepe', 'paytm']
    }
}
```
- Customer enters UPI ID
- Gets notification on their UPI app
- Approves payment

### 2. Intent Flow
```javascript
method: {
    upi: {
        flow: 'intent',
        apps: ['google_pay', 'phonepe', 'paytm']
    }
}
```
- Opens UPI app directly
- Customer pays within the app
- Returns to your website

## Available UPI Apps

| App ID | Display Name |
|--------|--------------|
| `google_pay` | Google Pay |
| `phonepe` | PhonePe |
| `paytm` | Paytm |
| `bhim` | BHIM |
| `amazon_pay` | Amazon Pay |
| `whatsapp` | WhatsApp Pay |
| ` CRED` | CRED |
| `mobikwik` | MobiKwik |

## Testing UPI Payments

### Test UPI VPA
- **Success**: `success@razorpay`
- **Failure**: `failure@razorpay`

### Steps
1. Visit `/payment/test`
2. Enter amount
3. Click "Pay Now"
4. Select UPI tab
5. Enter test VPA: `success@razorpay`
6. Complete payment

## Live Mode Configuration

To enable full UPI in production:

1. Complete KYC in Razorpay Dashboard
2. Activate live API keys
3. Update `.env`:
```env
RAZORPAY_KEY=rzp_live_YOUR_LIVE_KEY
RAZORPAY_SECRET=YOUR_LIVE_SECRET
```

## Files Updated

- `resources/views/payment/test.blade.php` - UPI configuration
- `resources/views/payment/checkout.blade.php` - UPI for checkout
- `RAZORPAY_UPI_GUIDE.md` - This guide

## Troubleshooting

### UPI Not Showing
- Check you're using correct test/live keys
- Verify `method.upi` is set to `true` or object
- Clear browser cache

### Intent Flow Not Working
- Ensure mobile device has UPI app installed
- Check `flow: 'intent'` configuration
- May not work on desktop browsers

### Collect Flow Issues
- Verify UPI ID format (name@bank)
- Check network connectivity
- Try different UPI app

## API Response Format

```json
{
    "success": true,
    "order_id": "order_xxx",
    "amount": 10000,
    "currency": "INR",
    "key": "rzp_test_xxx"
}
```

## Support

Razorpay Docs: https://razorpay.com/docs/payments/payment-methods/upi/

# Razorpay Payment Integration Setup

## Overview
This Laravel project now includes Razorpay payment gateway integration for secure online payments.

## Installation Steps

### 1. Install Razorpay PHP SDK
```bash
composer require razorpay/razorpay
```

### 2. Run Database Migration
```bash
php artisan migrate
```
This will add the necessary fields to the orders table for Razorpay payments.

### 3. Configure Razorpay API Keys

#### Get Test API Keys:
1. Go to https://dashboard.razorpay.com/
2. Sign up or log in
3. Switch to "Test Mode"
4. Go to Settings > API Keys
5. Generate Key ID and Key Secret

#### Update .env file:
```env
RAZORPAY_KEY_ID=rzp_test_your_key_here
RAZORPAY_KEY_SECRET=your_secret_here
```

For production, use live keys:
```env
RAZORPAY_KEY_ID=rzp_live_your_key_here
RAZORPAY_KEY_SECRET=your_live_secret_here
```

### 4. Test Cards (For Development)
Use these test card details:
- **Card Number**: 5267 3181 8797 5449
- **Expiry**: Any future date (e.g., 12/25)
- **CVV**: Any 3 digits (e.g., 123)
- **Name**: Any name
- **3D Secure OTP**: 1234

## Payment Flow

1. User adds products to cart
2. User clicks "Proceed to Checkout"
3. User fills shipping information
4. User clicks "Pay" button
5. Razorpay checkout modal opens
6. User enters card/UPI/netbanking details
7. Razorpay processes payment
8. Payment is verified on server
9. Order is created in database
10. User sees success confirmation

## Routes

| Route | Method | Description |
|-------|--------|-------------|
| `/payment/checkout` | GET | Checkout page with order summary |
| `/payment/order/create` | POST | Create Razorpay order |
| `/payment/verify` | POST | Verify payment signature |
| `/payment/failed` | POST | Handle failed payments |
| `/payment/success/{order}` | GET | Order success page |

## Files Created/Modified

### Controllers
- `app/Http/Controllers/PaymentController.php` - Payment handling

### Views
- `resources/views/payment/checkout.blade.php` - Checkout page
- `resources/views/payment/success.blade.php` - Success page

### Routes
- `routes/web.php` - Added payment routes

### Models
- `app/Models/Order.php` - Updated fillable fields
- `app/Models/OrderItem.php` - Added total field

### Migration
- `database/migrations/2026_04_09_000000_add_razorpay_fields_to_orders.php`

### Configuration
- `.env` - Added Razorpay keys

## Security Features

- ✅ Payment signature verification
- ✅ CSRF token protection
- ✅ Authenticated routes only
- ✅ Order number generation
- ✅ Payment status tracking

## Testing

1. Add products to cart
2. Go to cart and click "Proceed to Checkout"
3. Fill shipping details
4. Use test card details
5. Verify order is created after successful payment

## Live Mode Setup

1. Complete KYC on Razorpay dashboard
2. Switch to "Live Mode"
3. Generate live API keys
4. Update `.env` with live keys
5. Test with real payment (small amount)
6. Verify webhook integration (optional)

## Support

For Razorpay support:
- Documentation: https://razorpay.com/docs/
- Support Email: support@razorpay.com

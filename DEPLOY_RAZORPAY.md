# Razorpay Deployment Guide for Render

## Problem
Razorpay SDK showing "not installed" error on Render deployment.

## Solution Steps

### 1. Update composer.lock locally (REQUIRED)

Run this on your local machine to update dependencies:

```bash
# Navigate to project directory
cd e:\radhe-shop\radhe-shop

# Update composer.lock with new razorpay package
composer update razorpay/razorpay --no-dev --optimize-autoloader

# Or if composer is not installed locally, delete composer.lock
# and it will be regenerated on next install:
# del composer.lock
```

### 2. Commit Changes

```bash
git add composer.json composer.lock

git commit -m "Add Razorpay SDK for payment integration"

git push origin main
```

### 3. Set Environment Variables on Render Dashboard

Go to your Render Dashboard → radhe-store → Environment:

```
RAZORPAY_KEY_ID=rzp_test_YOUR_ACTUAL_TEST_KEY
RAZORPAY_KEY_SECRET=YOUR_ACTUAL_SECRET
```

**Get Test Keys from:** https://dashboard.razorpay.com/

### 4. Redeploy on Render

Option A: Automatic (push triggers deploy)
Option B: Manual Deploy button in Render Dashboard

### 5. Verify Installation

After deployment, check logs:
- Look for "Installing composer dependencies"
- Should show "razorpay/razorpay" being installed

Test the payment:
1. Add item to cart
2. Go to checkout
3. Click Pay button
4. Should open Razorpay modal (not show SDK error)

---

## Alternative: Force Fresh Install (If Still Failing)

If deployment still shows SDK error:

### Option A: Delete composer.lock
```bash
git rm composer.lock
git commit -m "Remove composer.lock for fresh install"
git push
```

### Option B: Update build.sh
Add this to build.sh before composer install:
```bash
# Force update if composer.lock outdated
composer update razorpay/razorpay --no-dev --optimize-autoloader --with-dependencies
```

---

## Quick Fix Checklist

- [ ] `composer.json` has `"razorpay/razorpay": "^2.9"`
- [ ] `composer.lock` updated and committed
- [ ] Render has `RAZORPAY_KEY_ID` env var
- [ ] Render has `RAZORPAY_KEY_SECRET` env var
- [ ] Redeploy completed successfully
- [ ] Test payment works without SDK error

---

## Test Card for Verification

Use these test card details:
- **Card Number**: 5267 3181 8797 5449
- **Expiry**: 12/25
- **CVV**: 123
- **OTP**: 1234

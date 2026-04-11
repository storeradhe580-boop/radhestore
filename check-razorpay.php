<?php
/**
 * Razorpay Installation Verification Script
 * Run: php check-razorpay.php
 */

echo "===========================================\n";
echo "  Razorpay Installation Verification\n";
echo "===========================================\n\n";

// Check 1: Composer autoload
echo "1. Checking Composer Autoload...\n";
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
    echo "   ✓ Autoload found\n";
} else {
    echo "   ✗ Autoload NOT found - Run: composer install\n";
    exit(1);
}

// Check 2: Razorpay SDK
echo "\n2. Checking Razorpay SDK...\n";
if (class_exists('Razorpay\Api\Api')) {
    echo "   ✓ Razorpay SDK class exists\n";
} else {
    echo "   ✗ Razorpay SDK NOT found\n";
    echo "   Fix: composer require razorpay/razorpay:^2.9\n";
    exit(1);
}

// Check 3: Environment variables
echo "\n3. Checking Environment Variables...\n";
$keyId = getenv('RAZORPAY_KEY_ID') ?: $_ENV['RAZORPAY_KEY_ID'] ?? null;
$keySecret = getenv('RAZORPAY_KEY_SECRET') ?: $_ENV['RAZORPAY_KEY_SECRET'] ?? null;

if ($keyId && $keyId !== 'rzp_test_your_key_here') {
    echo "   ✓ RAZORPAY_KEY_ID is set\n";
} else {
    echo "   ✗ RAZORPAY_KEY_ID is NOT set or has default value\n";
    echo "   Fix: Add RAZORPAY_KEY_ID to .env file\n";
}

if ($keySecret && $keySecret !== 'your_secret_here') {
    echo "   ✓ RAZORPAY_KEY_SECRET is set\n";
} else {
    echo "   ✗ RAZORPAY_KEY_SECRET is NOT set or has default value\n";
    echo "   Fix: Add RAZORPAY_KEY_SECRET to .env file\n";
}

// Check 4: Try to initialize Razorpay API
echo "\n4. Testing Razorpay API Initialization...\n";
try {
    if ($keyId && $keySecret) {
        $api = new Razorpay\Api\Api($keyId, $keySecret);
        echo "   ✓ Razorpay API initialized successfully\n";
    } else {
        echo "   ⚠ Skipping (keys not configured)\n";
    }
} catch (Exception $e) {
    echo "   ✗ Failed to initialize: " . $e->getMessage() . "\n";
}

// Check 5: Check routes
echo "\n5. Checking Routes...\n";
$routes = [
    'payment.checkout',
    'payment.order.create',
    'payment.verify',
    'payment.success',
];

echo "   Run 'php artisan route:list | grep payment' to verify routes\n";

// Summary
echo "\n===========================================\n";
echo "  Verification Complete!\n";
echo "===========================================\n";
echo "\nNext Steps:\n";
echo "1. If all checks pass, commit and push to deploy\n";
echo "2. Set RAZORPAY_KEY_ID and RAZORPAY_KEY_SECRET on Render\n";
echo "3. Test payment flow\n";

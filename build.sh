#!/bin/bash

# Laravel Build Script for Render Deployment
set -e

echo "🚀 Starting Laravel build process..."

# Install Composer dependencies (production only)
echo "📦 Installing Composer dependencies..."

# Ensure razorpay is installed (in case composer.lock is outdated)
composer require razorpay/razorpay:^2.9 --no-interaction --no-dev --optimize-autoloader --update-no-dev

# Install remaining dependencies
composer install --no-dev --optimize-autoloader

# Verify Razorpay is installed
echo "🔍 Verifying Razorpay installation..."
if composer show razorpay/razorpay > /dev/null 2>&1; then
    echo "✅ Razorpay SDK installed successfully"
else
    echo "❌ Razorpay SDK installation failed"
    exit 1
fi

# Clear all caches first (prevents stale cache issues)
echo "🧹 Clearing all caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Cache Laravel configuration
echo "⚙️ Caching Laravel configuration..."
php artisan config:cache

# Cache Laravel routes
echo "🛣️ Caching Laravel routes..."
php artisan route:cache

# Cache views
echo "👁️ Caching views..."
php artisan view:cache

# Install Node.js dependencies
echo "📦 Installing Node.js dependencies..."
npm install

# Build frontend assets
echo "🏗️ Building frontend assets..."
npm run build

# Create storage link if not exists
echo "🔗 Creating storage link..."
php artisan storage:link --force

# Set proper permissions
echo "🔐 Setting file permissions..."
chmod -R 755 storage bootstrap/cache

echo "✅ Build completed successfully!"

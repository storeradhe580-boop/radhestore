#!/bin/bash
# Render startup script for Laravel
set -e

echo "Starting Laravel deployment on Render..."

# Load Render environment
if [ -f .render.env ]; then
    export $(cat .render.env | xargs)
fi

# Ensure PORT is set
PORT=${PORT:-8000}
HOST=${HOST:-0.0.0.0}

echo "Using PORT: $PORT"
echo "Using HOST: $HOST"

# Run Laravel migrations
echo "Running migrations..."
php artisan migrate --force

# Clear caches
echo "Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Link storage
echo "Creating storage link..."
php artisan storage:link

# Start Laravel server with Render's PORT
echo "Starting Laravel server on $HOST:$PORT..."
php artisan serve --host=$HOST --port=$PORT

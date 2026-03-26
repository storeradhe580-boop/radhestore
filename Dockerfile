FROM php:8.2-cli

# સિસ્ટમ લાઈબ્રેરીઓ
RUN apt-get update && apt-get install -y \
    unzip git curl libpng-dev libonig-dev libxml2-dev zip libpq-dev

# PHP Extensions
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# પહેલા composer ફાઈલો કોપી કરો
COPY composer.json composer.lock ./

# Dependencies ઇન્સ્ટોલ કરો
RUN composer install --no-scripts --no-autoloader --no-interaction --no-dev --ignore-platform-reqs

# હવે બાકીનો બધો કોડ કોપી કરો
COPY . .

# --- અહીં ફેરફાર છે: Permissions પહેલા આપો, પછી dump-autoload કરો ---
RUN mkdir -p storage/framework/cache/data \
    storage/framework/app/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache \
    && chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# હવે Autoloader રન કરો (હવે એરર નહીં આવે)
RUN composer dump-autoload --optimize

# પોર્ટ સેટ કરો
EXPOSE 10000

# એપ શરૂ કરો
CMD php artisan serve --host=0.0.0.0 --port=10000
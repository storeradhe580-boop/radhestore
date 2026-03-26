FROM php:8.2-cli

# જરૂરી સિસ્ટમ લાઈબ્રેરીઓ
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libpq-dev

# PHP Extensions ઇન્સ્ટોલ કરો
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Composer મેળવો
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# પહેલા composer ફાઈલો કોપી કરો
COPY composer.json composer.lock ./

# Dependencies ઇન્સ્ટોલ કરો
RUN composer install --no-scripts --no-autoloader --no-interaction --no-dev --ignore-platform-reqs

# હવે બાકીનો બધો કોડ કોપી કરો
COPY . .

# --- આ ભાગ સૌથી મહત્વનો છે (Error સોલ્વ કરવા માટે) ---
RUN mkdir -p /var/www/storage/framework/cache/data \
    && mkdir -p /var/www/storage/framework/app/cache \
    && mkdir -p /var/www/storage/framework/sessions \
    && mkdir -p /var/www/storage/framework/views \
    && mkdir -p /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Autoloader ફાઈનલ કરો
RUN composer dump-autoload --optimize

# પોર્ટ સેટ કરો
EXPOSE 10000

# એપ શરૂ કરો
CMD php artisan serve --host=0.0.0.0 --port=10000
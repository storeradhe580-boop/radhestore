# PHP 8.4 Apache
FROM php:8.4-apache

# જરૂરી સિસ્ટમ પેકેજ અને PHP એક્સ્ટેન્શન (zip પણ ઉમેર્યું છે)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libpq-dev \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql intl bcmath zip

# Apache સેટિંગ્સ
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite

WORKDIR /var/www/html
COPY . .

# Composer ઇન્સ્ટોલ કરો
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# બધી જ Platform Requirements ને ઇગ્નોર કરીને ઇન્સ્ટોલ કરવા માટે
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

RUN php artisan storage:link
RUN php artisan filament:assets

# પરમિશન
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]

RUN php artisan migrate --force
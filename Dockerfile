# 1. Base PHP image with Apache
FROM php:8.2-apache

# 2. Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    libsqlite3-dev unzip git curl libzip-dev zip \
    && docker-php-ext-install pdo pdo_sqlite

# 3. Enable Apache rewrite for Laravel
RUN a2enmod rewrite

# 4. Set the working directory
WORKDIR /var/www/html

# 5. Copy project files
COPY . .

# 6. Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 7. Install Laravel dependencies (production)
RUN composer install --no-dev --optimize-autoloader



# 9. Prepare SQLite database in persistent volume (/var)
RUN touch /var/database.sqlite

# 10. Run important Laravel setup commands
RUN php artisan key:generate --force \
    && php artisan storage:link \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan migrate --force

# 11. Set correct permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 12. Expose web port for Render
EXPOSE 80

# 13. Start Apache server
CMD ["apache2-foreground"]

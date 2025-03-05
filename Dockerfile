FROM php:8.2-apache

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip

# Enable mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Set Apache Document Root ke public (sesuai Laravel)
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy the application code
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions agar Laravel bisa menulis ke storage, cache, dan foto_berita
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/foto_berita /var/www/html/public/galeri_foto /var/www/html/public/guru /var/www/html/public/foto_prestasi
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/foto_berita /var/www/html/public/galeri_foto /var/www/html/public/guru /var/www/html/public/foto_prestasi
 
# Expose port 80 (Railway butuh ini)
EXPOSE 80

# Jalankan migration sebelum memulai Apache
CMD ["sh", "-c", "php artisan migrate && apache2-foreground"]

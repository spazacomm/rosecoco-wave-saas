# Use the official PHP image as base
FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd bcmath mbstring pdo pdo_mysql exif pcntl intl zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Change current user to www-data
USER www-data

# # Ensure .env file exists
# RUN if [ ! -f .env ]; then cp .env.example .env; fi

# # Install Laravel dependencies
# RUN composer install --optimize-autoloader --no-dev
# RUN php artisan key:generate

# # Set permissions
# RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
# RUN chmod 644 /var/www/.env


# # Copy Nginx configuration
# COPY nginx.conf /etc/nginx/sites-available/default

# Expose port
EXPOSE 9000

CMD ["php-fpm"]

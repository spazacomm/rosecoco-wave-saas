# Use the official PHP image as base
FROM php:8.4-fpm

# Set working directory
WORKDIR /var/www

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

RUN apt update && apt install -y nodejs npm

# Install Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=composer:latest /usr/local/bin/composer /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

# Copy existing application directory contents
COPY . .


#USER root

RUN ln -s $(which php) /usr/local/sbin/php



# # Ensure .env file exists
# RUN if [ ! -f .env ]; then cp .env.example .env; fi

# # Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev
RUN npm install
RUN npm run build
# RUN php artisan key:generate

# # Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# RUN chmod 644 /var/www/.env

# Change current user to www-data
USER www-data


# # Copy Nginx configuration
# COPY nginx.conf /etc/nginx/sites-available/default

# Expose port
EXPOSE 9000

CMD ["php-fpm"]

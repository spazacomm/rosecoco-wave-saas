# Use an official Ubuntu or Debian image as the base
FROM ubuntu:22.04



# Set environment variables to avoid interactive prompts
ENV DEBIAN_FRONTEND=noninteractive
ENV TZ=Etc/UTC

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    software-properties-common \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    jpegoptim \
    optipng \
    pngquant \
    gifsicle \
    vim \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update && apt-get install -y \
    php8.4-fpm \
    php8.4-cli \
    php8.4-gd \
    php8.4-bcmath \
    php8.4-mbstring \
    php8.4-pdo \
    php8.4-mysql \
    php8.4-exif \
    php8.4-intl \
    php8.4-zip \
    && apt-get clean

# Install Node.js and npm
RUN apt-get update && apt-get install -y nodejs npm

# Install Composer manually
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer

# Ensure the correct PATH is set
ENV PATH="/usr/local/bin:$PATH"

# Verify Composer installation
RUN composer --version

# Copy existing application directory contents
COPY . /var/www

# Install Laravel dependencies
RUN composer install
RUN npm install
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Change current user to www-data
USER www-data

# Expose port
EXPOSE 9000

CMD ["php-fpm"]

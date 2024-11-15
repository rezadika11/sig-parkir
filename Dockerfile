FROM php:8.1-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    libicu-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath intl

# Copy and install Composer dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-progress --prefer-dist


# Set Composer cache
RUN mkdir -p /root/.composer/cache

# Set working directory
WORKDIR /var/www

# Copy Laravel application
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 3000

# Start PHP-FPM
CMD ["php-fpm"]

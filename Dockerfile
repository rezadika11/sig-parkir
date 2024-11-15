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
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath intl

# Install Composer manually
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Verify composer installation
RUN composer --version

# Set working directory
WORKDIR /var/www

# Copy only Composer files for dependency installation
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-dev --no-scripts --no-progress --prefer-dist

# Copy the entire application
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]

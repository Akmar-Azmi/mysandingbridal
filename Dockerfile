FROM php:8.2-fpm

# Install system dependencies including PostgreSQL dev headers
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libonig-dev libxml2-dev \
    libpq-dev \
    npm nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all project files
COPY . .

# Install Laravel and Vite dependencies
RUN composer install --no-dev --optimize-autoloader
RUN npm install && npm run build

# Permissions
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Expose port 8000
EXPOSE 8000

# Start Laravel app
CMD php artisan config:clear && php artisan route:clear && php artisan key:generate && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000

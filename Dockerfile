### 🔧 Step 1: Build frontend with Node.js (Vite)
FROM node:18 AS node-builder

WORKDIR /app
COPY package.json package-lock.json ./
RUN npm install

COPY resources ./resources
COPY vite.config.js ./
COPY public ./public
RUN npm run build

---

### 🐘 Step 2: PHP with PostgreSQL for Laravel backend
FROM php:8.2-fpm

WORKDIR /var/www

# Install required OS packages
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libjpeg-dev libonig-dev libxml2-dev libzip-dev \
    libpq-dev \
    sqlite3 libsqlite3-dev \
    nodejs npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip

# Add Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app source code
COPY . .

# Copy frontend build from Node step
COPY --from=node-builder /app/public/build /var/www/public/build

# Fix permissions (optional but good)
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

# Install Laravel deps
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel key (will fail if no .env, so skip if handled by Render)
RUN php artisan config:clear
RUN php artisan key:generate || true

# Expose Laravel dev port
EXPOSE 8000

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000

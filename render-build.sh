#!/usr/bin/env bash
set -o errexit

# --- INSTALL PHP & COMPOSER IN NODE ENV ---
curl -sSL https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# --- INSTALL PHP DEPENDENCIES ---
composer install --no-dev --optimize-autoloader

# --- INSTALL NODE + VITE ---
npm install
npm run build

# --- LARAVEL CACHE SETUP ---
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link || true

#!/usr/bin/env bash
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node dependencies & build frontend with Vite
npm install
npm run build

# Laravel setup
php artisan config:cache
php artisan route:cache
php artisan view:cache

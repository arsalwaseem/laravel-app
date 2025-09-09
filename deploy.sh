#!/bin/bash

# Install/update Composer dependencies
composer install --no-dev --optimize-autoloader

# Run database migrations
php artisan migrate --force

# Clear and cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Restart PHP-FPM
sudo service php8.2-fpm reload

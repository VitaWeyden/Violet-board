#!/bin/sh
set -e

echo "Running database migrations..."
php artisan migrate --force

echo "Caching config, routes and views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Creating storage link..."
php artisan storage:link || true

echo "Starting PHP-FPM..."
exec php-fpm

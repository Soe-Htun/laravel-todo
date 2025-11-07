#!/usr/bin/env bash
set -e

APP_DIR=/var/www/laravel-app

echo "🚀 Starting Laravel deployment..."

cd $APP_DIR

echo "📦 Pulling latest code..."
git pull origin main

echo "📦 Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader

echo "🧰 Running migrations..."
php artisan migrate --force

echo "⚙️ Optimizing Laravel cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "🔑 Setting correct permissions..."
sudo chown -R www-data:www-data $APP_DIR
sudo chmod -R 775 $APP_DIR/storage $APP_DIR/bootstrap/cache

echo "🔄 Reloading Nginx..."
sudo systemctl reload nginx

echo "✅ Deployment complete!"


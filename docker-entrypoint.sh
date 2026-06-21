#!/bin/sh
set -e

if [ ! -f /var/www/html/.env ]; then
  cp /var/www/html/.env.example /var/www/html/.env
fi

if [ ! -f /var/www/html/database/database.sqlite ]; then
  touch /var/www/html/database/database.sqlite
fi

cd /var/www/html
composer install --no-interaction --prefer-dist --optimize-autoloader
php artisan key:generate --force
php artisan migrate --force

exec "$@"

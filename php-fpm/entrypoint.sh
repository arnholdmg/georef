#!bin/bash

cd /var/www/appdata &&
composer update &&
chgrp -R www-data storage bootstrap/cache &&
chmod -R ug+rwx storage bootstrap/cache &&
php artisan optimize:clear &&
php artisan optimize &&
php-fpm
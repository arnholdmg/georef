FROM php:8-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && apt-get install -y zip unzip libpq-dev && docker-php-ext-install pdo_pgsql

WORKDIR /var/www/appdata

CMD php-fpm
FROM php:8.2-fpm

# Installing php extensions
RUN docker-php-ext-install opcache pdo_mysql

RUN mkdir -p /var/www/api-music/storage

RUN mkdir -p /var/www/api-music/storage/framework \
    && mkdir -p /var/www/api-music/storage/framework/sessions \
    && mkdir -p /var/www/api-music/storage/framework/views \
    && mkdir -p /var/www/api-music/storage/framework/cache \
    && mkdir -p /var/www/api-server/storage/logs


RUN chown -R www-data:www-data /var/www/api-music/storage



FROM php:7.2-fpm-alpine

WORKDIR /app

COPY src /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --quiet --prefer-dist --no-ansi --no-interaction --no-progress -o -d /app
RUN cp /app/.env.example /app/.env
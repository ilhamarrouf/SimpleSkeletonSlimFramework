FROM composer:1.6.5 AS build

WORKDIR /app
COPY . /app
RUN composer install

FROM webdevops/php-nginx:7.3

LABEL maintainer="Ilham Arrouf <ilham.arrouf@gmail.com>"

ENV PHP_DATE_TIMEZONE Asia/Jakarta

RUN apt-get update
RUN apt-get install -y libpq-dev nano \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

EXPOSE 80

COPY --from=build /app /app
COPY docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY docker/nginx/vhost.conf /opt/docker/etc/nginx/vhost.conf
RUN chown -R application:application /app

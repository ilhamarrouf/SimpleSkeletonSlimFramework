FROM php:7.2-fpm

LABEL Muhamad Ilham Arrouf <ilham.arrouf@gmail.com>

RUN apt-get update
RUN apt-get install -y libpq-dev nano \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

ADD ./docker/php/php.ini /usr/local/etc/php/php.ini
ADD . /var/www

RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www

WORKDIR /var/www
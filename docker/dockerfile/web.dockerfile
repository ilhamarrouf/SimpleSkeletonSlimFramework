FROM nginx:1.16

LABEL Muhamad Ilham Arrouf <ilham.arrouf@gmail.com>

RUN apt-get update
RUN apt-get install -y libpq-dev supervisor varnish

ENV VARNISH_CONFIG  /etc/varnish/default.vcl
ENV CACHE_SIZE      512m
ENV VARNISHD_PARAMS -p default_ttl=3600 -p default_grace=3600
ENV VARNISH_PORT    80

ADD ./docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf
ADD ./docker/varnish/default.vcl /etc/varnish/default.vcl
ADD ./docker/supervisor/supervisor.conf /etc/supervisord.conf

WORKDIR /var/www
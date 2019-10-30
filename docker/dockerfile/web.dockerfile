FROM nginx:1.16

LABEL Muhamad Ilham Arrouf <ilham.arrouf@gmail.com>

RUN apt-get update
RUN apt-get install -y libpq-dev varnish

ADD ./docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf
ADD ./docker/varnish/default.vcl /etc/varnish/default.vcl

RUN /usr/sbin/varnishd -P /run/varnish.pid \
    -a :8786 -T localhost:6082 \
    -f /etc/varnish/default.vcl \
    -S /etc/varnish/secret \
    -s malloc,256m

WORKDIR /var/www
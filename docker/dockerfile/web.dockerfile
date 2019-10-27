FROM nginx:1.16

LABEL Muhamad Ilham Arrouf <ilham.arrouf@gmail.com>

ADD ./docker/nginx/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www
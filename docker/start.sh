#!/usr/bin/env bash
set -e

for name in VARNISH_PORT VARNISH_CONFIG CACHE_SIZE VARNISHD_PARAMS
do
    eval value=\$$name
    sed -i "s|\${${name}}|${value}|g" /etc/supervisord.conf
done

/usr/bin/supervisord -n -c /etc/supervisord.conf
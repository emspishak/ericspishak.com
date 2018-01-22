#!/bin/bash

CERTBOT_PATH=${CERTBOT_PATH:-/home/espishak}

renew () {
    domain=$1
    $CERTBOT_PATH/certbot-auto \
        certonly \
        --webroot \
        --webroot-path /var/www/$domain \
        --domain $domain \
        --domain www.$domain
}

renew "ericspishak.com"
renew "mandithomas.com"
renew "mandianderic2016.com"

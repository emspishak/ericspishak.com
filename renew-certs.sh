#!/bin/bash

LETS_ENCRYPT_PATH=${LETS_ENCRYPT_PATH:-/home/espishak/letsencrypt}

renew () {
    domain=$1
    $LETS_ENCRYPT_PATH/letsencrypt-auto \
        certonly \
        -a webroot \
        --webroot-path /var/www/$domain \
        -d $domain \
        -d www.$domain \
        --server https://acme-v01.api.letsencrypt.org/directory
}

renew "ericspishak.com"
renew "mandithomas.com"
renew "mandianderic2016.com"

#!/bin/bash

CERTBOT_PATH=${CERTBOT_PATH:-/home/espishak}

# from https://stackoverflow.com/a/17841619
join () {
    local IFS=","
    echo "$*"
}

renew () {
    domain=$1
    extra=$2
    joined=$(join $domain www.$domain $extra)
    $CERTBOT_PATH/certbot-auto \
        certonly \
        --webroot \
        --webroot-path /var/www/$domain \
        --domains $joined
}

renew "ericspishak.com" "mta-sts.ericspishak.com"
renew "mandithomas.com"
renew "mandianderic2016.com"

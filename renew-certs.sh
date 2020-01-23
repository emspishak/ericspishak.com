#!/bin/bash

CERTBOT_PATH=${CERTBOT_PATH:-/home/espishak}

# from https://stackoverflow.com/a/17841619
join () {
    local IFS=","
    echo "$*"
}

domains() {
    local domain=$1
    local extra=$2
    joined=$(join $domain $extra)
    echo "--webroot-path /var/www/$domain --domains $joined"
}

renew () {
    domain=$1
    extra=$2
    webroots=$(domains $domain www.$domain)
    if [ "$extra" ]; then
        webroots="$webroots $(domains $extra)"
    fi
    $CERTBOT_PATH/certbot-auto \
        certonly \
        --webroot \
        $webroots
}

renew "ericspishak.com" "mta-sts.ericspishak.com"
renew "mandithomas.com"
renew "mandianderic2016.com"
renew "aspishakthomas.com"

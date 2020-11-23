server {
    listen 80;
    server_name shoulditravelfortheholidays.com www.shoulditravelfortheholidays.com;
    return 301 https://shoulditravelfortheholidays.com$request_uri;
}

server {
    listen 443 ssl http2;
    server_name www.shoulditravelfortheholidays.com;
    return 301 https://shoulditravelfortheholidays.com$request_uri;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/shoulditravelfortheholidays.com-ssl.conf;
}

server {
    listen 443 ssl http2;
    server_name shoulditravelfortheholidays.com;
    root /var/www/shoulditravelfortheholidays.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/shoulditravelfortheholidays.com-ssl.conf;
}

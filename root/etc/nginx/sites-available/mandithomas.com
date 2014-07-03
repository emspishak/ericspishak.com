server {
    listen 80;
    server_name mandithomas.com www.mandithomas.com;
    return 301 https://mandithomas.com$request_uri;
}

server {
    listen 443 ssl spdy;
    server_name www.mandithomas.com;
    return 301 https://mandithomas.com$request_uri;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/mandithomas.com-ssl.conf;
}

server {
    listen 443 ssl spdy;
    server_name mandithomas.com;
    index index.html index.php;
    root /var/www/mandithomas.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/mandithomas.com-ssl.conf;
}

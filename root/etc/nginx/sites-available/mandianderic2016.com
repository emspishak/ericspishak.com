server {
    listen 80;
    server_name mandianderic2016.com www.mandianderic2016.com;
    return 301 https://mandianderic2016.com$request_uri;
}

server {
    listen 443 ssl http2;
    server_name www.mandianderic2016.com;
    return 301 https://mandianderic2016.com$request_uri;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/mandianderic2016.com-ssl.conf;
}

server {
    listen 443 ssl http2;
    server_name mandianderic2016.com;
    index index.html index.php;
    root /var/www/mandianderic2016.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/mandianderic2016.com-ssl.conf;

    location ~* \.php$ {
        try_files $uri =404;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi.conf;
    }
}

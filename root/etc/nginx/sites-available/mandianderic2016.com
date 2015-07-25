server {
    listen 80;
    server_name www.mandianderic2016.com;
    return 301 http://mandianderic2016.com$request_uri;
}

server {
    listen 80;
    server_name mandianderic2016.com;
    index index.html index.php;
    root /var/www/mandianderic2016.com;
    charset utf-8;

    location ~* \.php$ {
        try_files $uri =404;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi.conf;
    }
}

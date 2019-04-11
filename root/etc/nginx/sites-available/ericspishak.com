server {
    listen 80;
    server_name ericspishak.com www.ericspishak.com;
    return 301 https://ericspishak.com$request_uri;
}

server {
    listen 443 ssl http2;
    server_name www.ericspishak.com;
    return 301 https://ericspishak.com$request_uri;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/ericspishak.com-ssl.conf;
}

server {
    listen 443 ssl http2;
    server_name ericspishak.com;
    index index.html index.php;
    root /var/www/ericspishak.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/ericspishak.com-ssl.conf;

    location ~* \.php$ {
        try_files $uri =404;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi.conf;
    }
}

server {
    listen 443 ssl http2;
    server_name mta-sts.ericspishak.com;
    root /var/www/mta-sts.ericspishak.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/ericspishak.com-ssl.conf;
}

server {
    listen 80;
    server_name aspishakthomas.com www.aspishakthomas.com;
    return 301 https://aspishakthomas.com$request_uri;
}

server {
    listen 443 ssl http2;
    server_name www.aspishakthomas.com;
    return 301 https://aspishakthomas.com$request_uri;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/aspishakthomas.com-ssl.conf;
}

server {
    listen 443 ssl http2;
    server_name aspishakthomas.com;
    index index.html index.php;
    root /var/www/aspishakthomas.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    include /etc/nginx/ssl-conf/aspishakthomas.com-ssl.conf;
}

server {
    listen 80;
    server_name ericspishak.com www.ericspishak.com;
    return 301 https://ericspishak.com$request_uri;
}

server {
    listen 443 ssl;
    server_name ericspishak.com;
    index index.html;
    root /var/www/ericspishak.com;
    charset utf-8;

    ssl_certificate /etc/nginx/ssl/ericspishak.com/ericspishak.com.crt;
    ssl_certificate_key /etc/nginx/ssl/ericspishak.com/ericspishak.com.key;
}

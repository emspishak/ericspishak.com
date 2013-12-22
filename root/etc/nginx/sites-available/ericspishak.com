server {
    listen 80;
    server_name ericspishak.com;
    index index.html;
    root /var/www/ericspishak.com;
    charset utf-8;
}

server {
    listen 443 ssl;
    server_name ericspishak.com;
    ssl_certificate /etc/nginx/ssl/ericspishak.com/ericspishak.com.crt;
    ssl_certificate_key /etc/nginx/ssl/ericspishak.com/ericspishak.com.key;
}

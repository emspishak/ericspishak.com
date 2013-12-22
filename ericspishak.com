server {
    listen 80;
    server_name ericspishak.com;
    index index.html;
    root /var/www/ericspishak.com;
}

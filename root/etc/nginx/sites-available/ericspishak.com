server {
    listen 80;
    server_name ericspishak.com www.ericspishak.com;
    return 301 https://ericspishak.com$request_uri;
}

ssl_certificate /etc/nginx/ssl/ericspishak.com/ericspishak.com.crt;
ssl_certificate_key /etc/nginx/ssl/ericspishak.com/ericspishak.com.key;
# From https://wiki.mozilla.org/Security/Server_Side_TLS#Recommended_Ciphersuite
ssl_ciphers 'ECDHE-RSA-AES128-GCM-SHA256:ECDHE-ECDSA-AES128-GCM-SHA256:ECDHE-RSA-AES256-GCM-SHA384:ECDHE-ECDSA-AES256-GCM-SHA384:DHE-RSA-AES128-GCM-SHA256:DHE-DSS-AES128-GCM-SHA256:kEDH+AESGCM:ECDHE-RSA-AES128-SHA256:ECDHE-ECDSA-AES128-SHA256:ECDHE-RSA-AES128-SHA:ECDHE-ECDSA-AES128-SHA:ECDHE-RSA-AES256-SHA384:ECDHE-ECDSA-AES256-SHA384:ECDHE-RSA-AES256-SHA:ECDHE-ECDSA-AES256-SHA:DHE-RSA-AES128-SHA256:DHE-RSA-AES128-SHA:DHE-DSS-AES128-SHA256:DHE-RSA-AES256-SHA256:DHE-DSS-AES256-SHA:DHE-RSA-AES256-SHA:AES128-GCM-SHA256:AES256-GCM-SHA384:ECDHE-RSA-RC4-SHA:ECDHE-ECDSA-RC4-SHA:AES128:AES256:RC4-SHA:HIGH:!aNULL:!eNULL:!EXPORT:!DES:!3DES:!MD5:!PSK';
ssl_prefer_server_ciphers on;
ssl_session_cache shared:SSL:5m;

ssl_stapling on;
ssl_stapling_verify on;
resolver 8.8.8.8 8.8.4.4 valid=300s;
resolver_timeout 5s;
ssl_trusted_certificate /etc/nginx/ssl/ericspishak.com/ericspishak.com-stapling.crt;

server {
    listen 443 ssl spdy;
    server_name www.ericspishak.com;
    return 301 https://ericspishak.com$request_uri;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";
}

server {
    listen 443 ssl spdy;
    server_name ericspishak.com;
    index index.html index.php;
    root /var/www/ericspishak.com;
    charset utf-8;
    add_header Strict-Transport-Security "max-age=31536000; includeSubdomains";

    location ~* \.php$ {
        try_files $uri =404;
        fastcgi_pass unix:/var/run/php5-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
    }
}

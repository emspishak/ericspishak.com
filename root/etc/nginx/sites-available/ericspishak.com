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

server {
    listen 443 ssl;
    server_name www.ericspishak.com;
    return 301 https://ericspishak.com$request_uri;
}

server {
    listen 443 ssl;
    server_name ericspishak.com;
    index index.html;
    root /var/www/ericspishak.com;
    charset utf-8;
}

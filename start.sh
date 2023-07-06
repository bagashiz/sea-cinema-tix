(node /app/cron.js &) && (perl /assets/prestart.pl /assets/nginx.template.conf /nginx.conf && (php-fpm -y /assets/php-fpm.conf & nginx -c /nginx.conf))

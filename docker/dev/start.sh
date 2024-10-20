mkdir /var/log/laravel

composer i
npm install --no-audit --no-fund --legacy-peer-deps
php artisan key:generate
php artisan optimize:clear

/usr/bin/supervisord -c /etc/supervisord.conf

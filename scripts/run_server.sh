# /bin/bash

# Apacheサーバの起動
/usr/local/bin/docker-php-entrypoint
# service apache2 start
exec /usr/sbin/apache2ctl -D FOREGROUND
# 組み込みサーバの起動
# php artisan serve --host 0.0.0.0 --port 443

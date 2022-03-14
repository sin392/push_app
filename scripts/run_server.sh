# /bin/bash

# Apacheサーバの起動
/usr/local/bin/docker-php-entrypoint
# service apache2 start
# apache2-foregroundでもいけるぽい

if [$APP_ENV == 'local']; then
    echo 'apache server stated'
    exec /usr/sbin/apache2ctl -D FOREGROUND
else
    # 組み込みサーバの起動
    echo 'dev server stated'
    php artisan serve --host 0.0.0.0 --port 80
fi
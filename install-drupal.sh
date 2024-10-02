#/bin/env bash
docker compose run --rm -i --tty -v app:/app -e COMPOSER_PROCESS_TIMEOUT=1200 composer install
mkdir -p app/web/sites/default/files
chmod 0777 app/web/sites/default/files
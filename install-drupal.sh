#/bin/env bash
docker compose run --rm -i --tty -v app:/app -e COMPOSER_PROCESS_TIMEOUT=1200 composer install --no-interaction --ignore-platform-reqs
mkdir -p app/web/sites/default/files
chmod 0777 app/web/sites/default/files
cp app/web/sites/default/default.settings.php app/web/sites/default/settings.php
chmod 777 app/web/sites/default/settings.php

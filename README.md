# Local Dev

This was inspired by interviewing processes

The purpose is to setup, local development without having change my actual system.

There are various branches for different frameworks.
At this time current supported branches are:

- postgresql (DB only + persistent storage)
- npp (Nginx + PostgreSQL + PHP)
  - Make sure to change the database information in `app/config.php` 
- npp-drupal (Nginx + PostgreSQL + PHP (Drupal))
  - Install Drupal with `docker compose run --rm -i --tty -v app:/app -e COMPOSER_PROCESS_TIMEOUT=1200 composer install`
  - A few things are necessary first, need to setup permissions
  - `mkdir -p app/web/sites/default/files`
  - `chmod 0777 app/web/sites/default/files`
  - `cp app/web/sites/default/default.settings.php app/web/sites/default/settings.php`
  - `chmod 0666 app/web/sites/default/settings.php`
  - ... or just run `install-drupal.sh`
  - Run through the setup and then fix the permissions again...
  - `chmod 0655 app/web/sites/default/settings.php`

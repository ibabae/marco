#!/bin/bash

# php /var/www/woodzine/artisan schedule:work >> /dev/null 2>&1
# php /var/www/woodzine/artisan queue:work >> /dev/null 2>&1

php artisan schedule:work
php artisan queue:work

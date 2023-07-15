#!/bin/bash

(node cron.js &) && (php artisan optimize && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000)

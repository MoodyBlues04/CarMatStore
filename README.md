# CarMatStore

## Installation
1. ```git clone git@github.com:MoodyBlues04/CarMatStore.git```
2. ```composer install```
3. set up .env file ```cp .env.example .env```
4. run ```php artisan storage:link```
5. run ```php artisan migrate``` and ```php artisan db:seed``` to seed test data
6. Add ```credentials.json``` file for google sheets API
6. enjoy

## Dev env
+ run ```php artisan db:seed --class=DevMatSeeder``` to seed mats for each existing brand (without mat place template)

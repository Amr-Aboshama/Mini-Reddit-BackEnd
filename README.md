# Mini-Reddit-BackEnd

Edits:
Authenticate : Mini-Reddit Project\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php

At facing some seeder doesn't exist, run command: composer dump-autoload

To Run Tests: composer test

#Coding Style
camelCase => Variables
StudlyCaps => Objects

#After Cloning
1) Run : Composer install
2) Run : copy .env.example .env
3) Run : php artisan key:generate
4) Configure your .env file for database
5) Run : php artisan jwt:secret
6) Create a database with data you configured in .env
7) Run : php artisan migrate:fresh
8) Run : php artisan db:seed

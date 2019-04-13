# Mini-Reddit-BackEnd

Edits:
Authenticate : Mini-Reddit Project\vendor\laravel\framework\src\Illuminate\Auth\Middleware\Authenticate.php

At facing some seeder doesn't exist, run command: composer dump-autoload

To Run Tests: composer test

# Coding Style
camelCase => Variables
StudlyCaps => Objects

# After Cloning
1) Run : Composer install
2) Run : copy .env.example .env
3) Run : php artisan key:generate
4) Configure your .env file for database
5) Run : php artisan jwt:secret
6) Create a database with data you configured in .env
7) Run : php artisan migrate:fresh
8) Run : php artisan db:seed

**************************************************************

                          "function documentation"

@@@configuration:( done in the latest version  )

  1) composer require --dev victorjonsson/markdowndocs

  This will add victorjonsson/markdowndocs to the require-dev section of your project's composer.json file. The phpdoc-md executable 	will automatically be copied to your project's vendor/bin directory.


@@@Generating docs

   in our project Run this command

  .\vendor\bin\phpdoc-md --ignore=Console,Exceptions,Http,Providers generate app > api.md

  //this command is for Generating docs for all classes in a source directory (our directory is "app" which includes all model classes) and send output to the file api.md (ingnoring any extra files in the directory )

  note:(ignore Http , Exceptions , Providers , Console files as we do not need to generate function doc for their classes )

  api.md is markdown file so to perview it do the follwoing steps...

   1)install the package "atom-markdown-auto-preview" on atom..
   2)from the settings of this package activate "Observe Opens" option.
   3)go and open the file "api.md" with atom (the function doc will appear automatically )

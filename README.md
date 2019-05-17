# gymspiration
Gymspiration Scenario

Installation Instructions

Clone Repostiory into suitable directory

1) composer install
2) Copy the .env.example file and rename to .env - cp .env.example .env
3) Edit the .env file with your database information (db, username, pwd)
4) Set the application key - php artisan key:generate
  **important** set the admin email, password in .env** username is admin
5) This application comes with some test data generated via Faker
6) Migrate and Seed the databases - php artisan migrate then php artisan db:seed
7) If any errors occur, please check correct database credentials in the .env file
8) install npm if developing or testing
9) npm run watch to compile your js/sass

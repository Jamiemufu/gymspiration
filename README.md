# gymspiration
Gymspiration Scenario

Installation Instructions

Clone Repostiory into suitable directory

1) composer install
2) Copy the .env.example file and rename to .env - cp .env.example .env
3) Edit the .env file with your database information (db, username, pwd)
4) Set the application key - php artisan key:generate
  **important** set the admin email, password in **.env** username is **admin**
5) This application comes with some test data generated via Faker
6) Migrate and Seed the database - php artisan migrate then php artisan db:seed
	**if you want faker generated members un-comment from seed DatabaseSeeder**
	**scenario will install with no test members by default**
7) If any errors occur, please check correct database credentials in the .env file
8) install npm if developing or testing
9) npm run watch to compile your js/sass

**notes**

Member roles are not set yet with new member, as they don't login there is no requirement to do so, however it is there ready to implement with a mutli-auth.

FOR DEMO UsERNAME admin Password: password

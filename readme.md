## LaravelCoreApp
This application is a Base project with some functionalities that are common in all projects like:
- User autentication with private registration
- Permission Roles for users (mainly ADMIN and CUSTOMER)
- Dynamic menus generation in the TobBar
- CRUD sections for Roles, Users, Menus
- Seed adds 2 users:
  - `admin@admin.net` as ADMIN - password `password`
  - `customer@admin.net` as CUSTOMER - password `password`

## Installation:
- An Apache + PHP + Mysql environment is needed (or similar)
- Install last Composer version https://getcomposer.org/download/ 
- Install NodeJS from https://nodejs.org/
- Create a new database with utf8mb4_unicode_ci 
- Create a user with permissions to interact with the new database
- Download or Clone the Git repository https://github.com/abatlleca/LaravelCoreApp
- Copy and rename `.env.example` file to `.env` inside your project root 
- Fill the database information inside `.env`
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install``` to install the `vendor` files
- Run `php artisan key:generate` to create the secret key for the project
- Run `php artisan migrate` to create the tables
- Run `php artisan db:seed` to run seeders, if any
- Run `npm run dev` to create the public JS and CSS files
- Run `php artisan serve` to serve the project to Apache (default port 8000). Optional add `--port=8080`
- Open `httpd-vhosts.conf` file of Apache → <apache_folder>\conf\extra
- Add VirtualHost for the project

  Ex.:
  ```
  <VirtualHost <desiredURL>:80>
  	DocumentRoot "<laravel_project_folder>/public"
  	<Directory "<laravel_project_folder>/public">
  		Options Indexes FollowSymLinks
  		AllowOverride All
  		Require all granted
  	</Directory>
  </VirtualHost>
  ```
  Open `hosts` file
   
  (In Windows) C:\Windows\system32\drivers\etc\
  (Linux and Mac OS) /etc/hosts
  
  Add new line `127.0.0.1 <desiredURL>`

##### You can now access your project at `<desiredURL>:8000` 

#### If for some reason your project stop working do these:
- `composer install`
- `php artisan migrate:refresh --seed`

#### -- TODO --
- Improve the frontend
- Customer options
- User profile
- Disable/Enable menus
- Disable/Enable users
- Reset password from Admin panel

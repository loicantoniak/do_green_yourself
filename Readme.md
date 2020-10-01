# Do Green Yourself

Web application designed to present zero waste tutorials in order to adapt everyday habits to a more ecological lifestyle.

Example of features:

* Access to tutorials by categories.
* Consultation of essential products
for the realization of tutorial.
* List of ecological stores
* Possibility to create your own tutorials.

## Requirements

* PHP 7.2.9 or higher;
* PDO-SQLite PHP extension enabled;
* and the usual Symfony application requirements.

## Installation

Use the package manager [git](https://github.com/) to install Do Green Yourself app.

```bash
$ git clone https://iut-info.univ-reims.fr/gitlab/delm0011/projet_tuteure.git
```

## Usage

There's no need to configure anything to run the application. If you have installed Symfony, run this command and access the application in your browser at the given URL (https://localhost:8000 by default):

```bash
$ cd projet_tuteure/Symfony
$ composer install
$ symfony serve
```
If you don't have the Symfony binary installed, run php -S localhost:8000 -t public/ to use the built-in PHP web server or [configure a web server](https://symfony.com/doc/current/setup/web_server_configuration.html) like Nginx or Apache to run the application.

## Data_Base

   ##### Creation of the database
    
Create a .env.local file and integrate the information necessary to connect to your localhost.

Modify db_user and db_password by your database connection login.
```
DATABASE_URL=mysql://db_user:db_password@localhost:3306/Do_Green_Yourself?serverVersion=5.7
```

Create a new database: Do_Green_Yourself

   ##### Database script 
    
Generate the database with Doctrine :

```bash
$ bin/console doctrine:schema:create
```

   ##### Content of database  
    
Generate fixtures for your database with Doctrine :

```bash
php bin/console doctrine:fixtures:load -n
```

## Available Scripts

In the project directory, you can run:

```bash
$ npm install
$ npm start
```
Runs the app in the development mode.
Open http://localhost:3000 to view it in the browser.

The page will reload if you make edits.
You will also see any lint errors in the console.

## License
[IUT de Reims](https://www.iut-rcc.fr/)
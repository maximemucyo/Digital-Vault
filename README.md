#Welcome to Digital Vault 

> The project is a learning plaform for cryptocurrency trading. It connects instructors and learners, whereby instructors are the administrators. The project includes charts, with real-time updates to aid in learning, and teaching.

## Setup

### Prerequisites
* PHP >= 8.0
* Composer
* A web server (Apache, Nginx, etc.)
* MySQL or PostgreSQL
* Google App Password You can get this by following the steps bellow on this link https://knowledge.workspace.google.com/kb/how-to-create-app-passwords-000009237
* Pusher app key on https://pusher.com/


## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

* Clone the repository
* Switch to the repo folder

    cd digital-vault

* Install all the dependencies using composer

    composer install

* Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

* Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate
  
* Run the database seeder

    php artisan db:seed

* Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## On cPanel

* Compress the Laravel project folder.

Compress the project flder to a zip file on your local machine. This allows for easy upload to the Cpanel.

* Upload to Cpanel

Login to your Cpanel account and head over to file manager and open the file manager
On the file manager, create a new folder on the root directory and add a name to it and click on the newly created folder.

* Extract the Laravel project folder

Extract the files by right-clicking on the zip file. Extract them in the same folder you created in the previous step


* Create a Database on phpmyAdmin:
Go to the database tab in the Cpanel.
Create a database.
On the users section, create a user that will be associated with the databse.
Add the user to the database, allowing the account to have all privileges on the database.

* Update the .env
Update the .env file with the new databse credentials

* Export the mysql database data, and import it on the database you have newly created to get started.



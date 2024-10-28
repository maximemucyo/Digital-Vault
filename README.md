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







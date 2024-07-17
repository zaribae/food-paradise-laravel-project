# Optional

You need to setup, Pusher, PayPal, and SMTP Service KEYS in the Admin Dashboard page to use some of the features.
You can import "foodparadise_db.sql" file if you want a example of default Website layout.

# How to Run the Application guide

Clone the repository

    git clone https://github.com/zaribae/food-paradise-laravel-project.git

Switch to repo folder

    cd food-paradise-laravel-project

Install all the dependencies.

    composer install
    npm install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Migrate the database migration (if you dont want to use default database provided above)

    php artisan migrate

Start the local development server

    php artisan serve

# car-wash-laravel
Project for Carwash

Installation

    Pre-requisite (Download and Install)
    - Git
    - XAMPP PHP 7.4
    - Composer
    - Node JS v18.19.1

    Run these Commands
    - composer install
    - npm install
    - npm run dev
    - cp .env.example .env
    - php artisan key:generate
    - php artisan migrate
    - php artisan db:seed
    - php artisan optimize
    - php artisan serve

    SMTP
    If you have SMTP account edit this part in .env file
    # Mail
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=
    MAIL_PASSWORD=
    MAIL_ENCRYPTION=
    MAIL_FROM_NAME="${APP_NAME}"

    If you want to use smtp sanbox create an account in https://mailtrap.io
    Go to Email Testing -> Demo Inbox -> Integrations -> Laravel 7*
    and copy the credentials

    After editing the .env file always run this command
    - php artisan optimize


This project is using the following:
Laravel 8
rappasoft-boilerplate https://github.com/rappasoft/laravel-boilerplate

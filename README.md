## Stack

-   MySQL.
-   Php Laravel.
-   Nginx.

This is a Service-Action Pattern , with Modularized routing system

## Setup

Clone the project from github. Ensure LAMP/MAMP Server is set on your machine

-   Run composer install
-   within your project directory, run cp .env.example .env. Set your database credentials in .env
-   Run ` php artisan migrate`
-   Run `php artisan db:seed`
-   Login with this default login credentials : `"email": "eleanor.armstrong@appveam.co",
"password": "password"`

## Route

-   Login Route POST `auth/login`
-   Signup POST `auth/signup` using name, email, password, confirm_password
-   Authenticated User GET `auth/me`
-   Logout POST `auth/logout`
-   Create Feedback `/feedback/create`. Pass the title, category and description in the request body
-   All Feedback `/feedback`
-   Comment POST `/comments/{feedbackId}/comments` , using the content as the body parameter in the
-   Comment GET `/comments/`

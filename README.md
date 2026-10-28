# VPY Student Management System

A web-based Student Management System built with Laravel, PHP, and MySQL. This project is designed to help manage student records and related school information.

## Features

- Admin and user login
- Student record management
- Teacher and staff management
- Student academic information and general averages
- Student status and honors classification

*Note: Features depend on the current implementation of the project.*

## Technologies Used

- Laravel
- PHP
- MySQL / MariaDB
- HTML and CSS
- JavaScript
- XAMPP
- Git and GitHub

## Requirements

- PHP version compatible with the Laravel version used by this project
- Composer
- MySQL or MariaDB
- Node.js and npm, if frontend assets need to be built

## Local Installation

1. Clone this repository:

   ```bash
   git clone https://github.com/harbi-b20/vpystudentmanagement.github.io.git
   ```

2. Enter the project directory:

   ```bash
   cd vpystudentmanagement.github.io
   ```

3. Install PHP dependencies:

   ```bash
   composer install
   ```

4. Create your environment file:

   ```bash
   copy .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Create a database in MySQL or phpMyAdmin, then update the database settings in `.env`.

7. Run database migrations if the project uses them and the required migrations are available:

   ```bash
   php artisan migrate
   ```

8. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

9. Open `http://127.0.0.1:8000` in your browser.

## Database

Configure your own local database in `.env`. Do not upload `.env`, real student records, or database credentials to GitHub.

## Security Notice

This project is intended for educational and demonstration purposes. Use fake data for demonstrations and never publish real student information or passwords.

## Author

Student project by the repository owner.
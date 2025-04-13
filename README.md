# Propay
Propay TECH TEST_Developer Solution

# Installation Requirements
This project is a user management application for Propay Developer Tech.
- ubuntu22
- apache2
- mysql8
- php8.3
- laravel
- composer
- mailtrap account && credentials for mail sending

# SET UP HOST SERVER UBUNTU 
- sudo su
- sudo apt install openssl php8.3-bcmath php8.3-curl php8.3-json php8.3-mbstring php8.3-mysql php8.3-tokenizer php8.3-xml php8.3-zip php8.3-xmlrpc php8.3-gd
- vi /etc/hosts
- add the following line:
- 127.0.0.1       www.propay.local
- copy default file to propay
- cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/www.propay.local.conf
- copy contents of vhInstallation.txt and paste them in the propay conf file
- vi /etc/apache2/sites-available/propay.local.conf and paste the contents of vhInstallation.txt
- a2ensite propay.local
- systemctl reload apache2

# Application Setup
- clone github repo default branch main
- checkout tag current active tag release/2.0.1
- composer install
- from root path copy createdB.sql run in sql client.
- cp env.example -> .env update mailtrap credentials
- run the following commands on a terminal
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

# Using the application
- visit http://www.propay.local
- credentials are admin@propay.com & test@propay.com both have a password of 12345678
- open a new terminal run php artisan queue:work - for emails

# How the application works 
- created tables: languages, interests, user_interests, & users
- all the above have CRUD endpoints which are behind authentication
- languages: http://www.propay.local/languages
- interests: http://www.propay.local/interests
- user_interests: http://www.propay.local/user_interest
- users: http://www.propay.local/users




# propay
propay

# Installation Requirements
This project is a user management application for propay.
- ubuntu
- apache2
- mysql
- php8.3
-
cp env.example -> .env
- CREATE DATABASE propay;

# Apache configuration



# Setup 


# php artisan migrate
# php artisan serve --host=127.0.0.1 --port=8000


# SET UP HOST SERVER UBUNTU 
- sudo su
- vi /etc/hosts
- add the following line:
- 127.0.0.1       propay.local
- copy default file to propay
- cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/propay.local.conf
- copy contents of vhInstallation.txt and paste them in the propay file
- vi /etc/apache2/sites-available/propay.local.conf
- a2ensite propay.local
- systemctl reload apache2


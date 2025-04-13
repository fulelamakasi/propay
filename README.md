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
php artisan key:generate
# Apache configuration

# env
# QUEUE_CONNECTION=database
# terminal 
# php artisan queue:work

# Setup 
# username (admin@propay.com => 12345678), (test@propay.com => 12345678)

# php artisan migrate
# php artisan serve --host=127.0.0.1 --port=8000
# php artisan db:seed

# SET UP HOST SERVER UBUNTU 
- sudo su
- sudo apt install openssl php8.3-bcmath php8.3-curl php8.3-json php8.3-mbstring php8.3-mysql php8.3-tokenizer php8.3-xml php8.3-zip
- vi /etc/hosts
- add the following line:
- 127.0.0.1       www.propay.local
- copy default file to propay
- cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/www.propay.local.conf
- copy contents of vhInstallation.txt and paste them in the propay file
- vi /etc/apache2/sites-available/propay.local.conf
- a2ensite propay.local
- systemctl reload apache2
- sudo apt install php8.4-mbstring php8.4-xmlrpc php8.4-soap php8.4-gd php8.4-xml php8.4-cli php8.4-zip php8.4-bcmath php8.4-tokenizer php-json php-pear

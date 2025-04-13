DROP DATABASE IF EXISTS `propay`;
CREATE DATABASE `propay`;


CREATE USER 'propay_user'@'localhost' IDENTIFIED BY '12345678';
GRANT ALL PRIVILEGES ON 'propay'.* TO 'propay_user'@'localhost';
FLUSH PRIVILEGES;
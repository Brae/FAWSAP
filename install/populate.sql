CREATE DATABASE admin;
USE admin;
CREATE TABLE users(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(256) NOT NULL, password VARCHAR(256) NOT NULL, name VARCHAR(256) NOT NULL, active TINYINT(1));
CREATE TABLE scores(challengeid INT(6) UNSIGNED NOT NULL, username VARCHAR(256) NOT NULL, time INT(6) UNSIGNED NOT NULL, clickcount INT(10) NOT NULL, charcount INT(10) NOT NULL);
CREATE TABLE challenges(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, difficulty INT(1) NOT NULL, url VARCHAR(128) NOT NULL, category VARCHAR(64));

CREATE DATABASE bricks;
CREATE USER 'bricks'@'localhost' IDENTIFIED BY 'password';
CREATE DATABASE dvwa;
CREATE DATABASE inject;
CREATE DATABASE xvwa;
CREATE USER 'www'@'localhost' IDENTIFIED BY 'V6Zj7QxdUv10';
GRANT ALL PRIVILEGES ON admin.* TO 'www'@'localhost';
GRANT ALL PRIVILEGES ON bricks.* TO 'bricks'@'localhost';
GRANT ALL PRIVILEGES ON dvwa.* TO 'www'@'localhost';
GRANT ALL PRIVILEGES ON inject.* TO 'www'@'localhost';
GRANT ALL PRIVILEGES ON xvwa.* TO 'www'@'localhost'; 

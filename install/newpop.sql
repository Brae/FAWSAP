#DATABASES
CREATE DATABASE admin;
CREATE DATABASE bricks;
CREATE DATABASE dvwa;
CREATE DATABASE inject;
CREATE DATABASE xvwa;

#TABLES
USE admin;
CREATE TABLE challenges (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, difficulty INT(1) NOT NULL, src VARCHAR(128) NOT NULL, category VARCHAR(128));
CREATE TABLE playlists (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, name VARCHAR(128) NOT NULL, challenges VARCHAR(128) NOT NULL, creator VARCHAR(128) NOT NULL);
CREATE TABLE scores (challengeid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username VARCHAR(256) NOT NULL, time INT(6) UNSIGNED NOT NULL, clickcount INT(10) NOT NULL, charcount INT(10) NOT NULL);
CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, email VARCHAR(256) NOT NULL, password VARCHAR(256) NOT NULL, name VARCHAR(256) NOT NULL, isadmin TINYINT(1) NOT NULL);

#INITIALISATION
INSERT INTO challenges (difficulty, src, category) VALUES (1,'dvwa_sql_low.php','SQLi');
INSERT INTO challenges (difficulty, src, category) VALUES (1, 'xvwa_sql.php','SQLi');
INSERT INTO challenges (difficulty, src, category) VALUES (1,'bricks_get_1.php','URL');
INSERT INTO challenges (difficulty, src, category) VALUES (1, 'dvwa_cmdi_low.php', 'CMDi');
INSERT INTO challenges (difficulty, src, category) VALUES (1, 'dvwa_xss_reflected_low.php','XSS');

INSERT INTO playlists (name, challenges, creator) VALUES ('Easy', '1;2;3;4;5;','');

INSERT INTO users (email, password, name, isadmin) VALUES ('admin','$2y$11$aD2quO9Ip2aqyZPKAezwW.YcmhDdBKtnKYWXE5b/Grvj8b/n3PiDK','Admin',true);


CREATE USER 'admin'@'%' IDENTIFIED BY 'admin42';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%';

CREATE DATABASE camagrudb;
CREATE USER 'camagru'@'localhost' IDENTIFIED BY 'camagru42';
GRANT ALL PRIVILEGES ON camagrudb.* TO 'camagru'@'localhost';

CREATE DATABASE phpmyadmin;
USE camagrudb;
CREATE TABLE `camagrudb`.`users` ( `login` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , `mail` VARCHAR(255) NOT NULL , PRIMARY KEY (`login`)) ENGINE = InnoDB;
FLUSH PRIVILEGES;
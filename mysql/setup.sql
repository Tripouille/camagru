CREATE USER 'admin'@'%' IDENTIFIED BY PASSWORD 'admin42';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%';

CREATE DATABASE camagrudb;
CREATE USER 'camagru'@'localhost' IDENTIFIED BY PASSWORD 'camagru42';
GRANT ALL PRIVILEGES ON camagrudb.* TO 'camagru'@'localhost';

FLUSH PRIVILEGES;
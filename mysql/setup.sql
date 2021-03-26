CREATE USER 'admin'@'%' IDENTIFIED BY 'admin42';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%';

CREATE DATABASE camagrudb;
CREATE USER 'camagru'@'localhost' IDENTIFIED BY 'camagru42';
GRANT ALL PRIVILEGES ON camagrudb.* TO 'camagru'@'localhost';

FLUSH PRIVILEGES;
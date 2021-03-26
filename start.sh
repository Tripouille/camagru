#!/bin/sh
addgroup camagru
echo -e "42\n42\n" | adduser camagru -G camagru
addgroup nginx camagru
chown -R camagru:camagru /usr/share/webapps && chmod -R 750 /usr/share/webapps

/usr/bin/mysql_install_db --user=mysql
/etc/init.d/mariadb setup
rc-update add mariadb
rc-update add nginx
rc-update add php-fpm7
openrc
mysql -u root < setup.sql && rm setup.sql
tail -f /dev/null

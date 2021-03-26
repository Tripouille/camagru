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
mysql -u root < phpmyadmin.sql && rm phpmyadmin.sql

mkdir /usr/share/webapps/phpmyadmin/tmp && chmod 777 /usr/share/webapps/phpmyadmin/tmp \
&& ln -fs /usr/share/webapps/phpmyadmin/ /usr/share/webapps/site/pma
tail -f /dev/null

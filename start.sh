/usr/bin/mysql_install_db --user=mysql && /etc/init.d/mariadb setup
rc-update add mariadb
rc-update add nginx
rc-update add php-fpm7
openrc
mysql -u root < setup.sql && rm setup.sql
tail -f /dev/null
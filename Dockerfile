FROM alpine

EXPOSE 80 443
RUN apk -U upgrade --no-cache \
&& apk add openrc --no-cache && mkdir -p /run/openrc/ && touch /run/openrc/softlevel \
&& apk add mysql mysql-client gcompat libc6-compat vim wget unzip nginx \
php7-common php7-iconv php7-json php7-gd php7-curl php7-xml \
php7-mysqli php7-imap php7-cgi fcgi php7-pdo php7-pdo_mysql php7-soap \
php7-xmlrpc php7-posix php7-mcrypt php7-gettext php7-ldap php7-ctype \
phpmyadmin php-mbstring php-gettext gcompat libc6-compat php-fpm openssl

#mysql
COPY mysql/my.cnf /etc/
COPY mysql/setup.sql /
#nginx
COPY nginx/default /etc/nginx/http.d/default.conf
RUN openssl req -x509 -nodes -newkey rsa:4096 -days 365 -subj "/C=FR/ST=Lyon/L=Auvergne-Rhône-Alpes/O=42/CN=www.42.fr" \
	-keyout /etc/ssl/private/localhost.key -out /etc/ssl/certs/localhost.crt
#phpmyadmin
COPY mysql/pma/config.inc.php /etc/phpmyadmin/
RUN mkdir /usr/share/phpmyadmin/tmp && chmod 777 /usr/share/phpmyadmin/tmp
#PHP
COPY php/php.ini /etc/php7/
COPY php/camagru.conf /etc/php7/php-fpm.d/www.conf

COPY start.sh /
ENTRYPOINT ["sh", "start.sh"]
#SET THE BASE image
FROM debian:buster

#COPY SOURCES FROM REPO TO CONTAINER ROOT
COPY srcs/nginx.conf nginx.conf
COPY srcs/config.inc.php config.inc.php
COPY srcs/wordpress-5.3.2.tar.gz wordpress-5.3.2.tar.gz
COPY srcs/wp-config.php wp-config.php
COPY srcs/wordpress.sql wordpress.sql
COPY srcs/index.html index.html

#UPDATE AND UPGRADE
RUN apt-get update && apt-get -y upgrade

#NGINX INSTALL AND LAUNCH
RUN apt-get install -y nginx \
&& service nginx start

#MARIADB INSTALL AND LAUNCH
RUN apt-get install -y mariadb-server mariadb-client \
&& service mysql start

#PHP INSTALL AND LAUNCH
RUN apt-get install -y php7.3 php7.3-fpm php7.3-mysql php-common php7.3-cli php7.3-common php7.3-json php7.3-opcache php7.3-readline php-mbstring php-gd \
&& service php7.3-fpm start

# NGINX CONF
RUN cp nginx.conf /etc/nginx/sites-available/localhost \ 
&& rm /etc/nginx/sites-enabled/default  \
&& ln -s /etc/nginx/sites-available/localhost /etc/nginx/sites-enabled/localhost \
&& rm /usr/share/nginx/html/index.html  
RUN mv index.html /usr/share/nginx/html/index.html 

#MYSQL CONF
RUN service mysql start \
&& echo "CREATE DATABASE wordpress;" | mysql -u root \
&& echo "CREATE USER 'admin' IDENTIFIED BY 'admin';" | mysql -u root \
&& echo "GRANT USAGE ON wordpress.* TO 'admin'@'localhost' IDENTIFIED BY 'admin';" | mysql -u root \
&& echo "GRANT ALL PRIVILEGES ON wordpress.* TO 'admin'@'localhost';" | mysql -u root \
&& echo "FLUSH PRIVILEGES;" | mysql -u root 

#WORDPRESS INSTALL
RUN tar -zxvf wordpress-5.3.2.tar.gz \
&& mv wordpress/wp-config-sample.php wordpress/wp-config.php \
&& cp wp-config.php wordpress/wp-config.php \
&& mv wordpress /usr/share/nginx/html/wordpress \
&& rm wordpress-5.3.2.tar.gz

#PHPMYADMIN INSTALL
RUN apt-get install -y wget \
&& wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-all-languages.tar.gz \
&& tar -zxvf phpMyAdmin-4.9.0.1-all-languages.tar.gz \
&& mv phpMyAdmin-4.9.0.1-all-languages /usr/share/nginx/html/phpmyadmin \
&& cp config.inc.php /usr/share/nginx/html/phpmyadmin/

#SITES ACCESS 
RUN chown -R www-data:www-data /usr/share/nginx/html/ \
&& chmod -R 755 /usr/share/nginx/html/

#ADD SSL
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -subj '/C=FR/ST=IDF/L=Paris/O=42/CN=esoulard' -keyout /etc/ssl/certs/localhost.key -out /etc/ssl/certs/localhost.pem

#IMPORT WP .SQL DUMP
RUN service mysql start \
&& mysql wordpress -u admin --password=admin < wordpress.sql

#EXPOSE PORTS
EXPOSE 80 
EXPOSE 443

#RESTART ALL
RUN nginx -t
CMD service nginx restart \
&& service php7.3-fpm restart \
&& service mysql restart \
&& tail -f /dev/null


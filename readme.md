# [Archived] Ini adalah proyek website Lomba Genius 2016 Bagian untuk Administrator

## Desclaimer
This project done back to 2016 when I started my college year, first year. An updated version of 2015 version.

## Official About Statement
Latest version : version 1.27.2 RC Release Candidate

Developed by :

Condro Wiyono, Farid Hasan & TIM WEB GENIUS 2016

email : it-web@genius-sbbs.com

COPYRIGHT 2016 This web and content is copyrighted.
This work is not stock and it may not be reproduced, copied, edited,
published, transmitted or uploaded in any way without any permission.


## Tech Used
- Pure PHP
- Bootstrap

## Back then Issued 
- Performance is main issue

## Wanna see the memories
1 - set up by clone this repo
````
git clone https://github.com/condrowiyono/genius-2016-admin.git 
````
2 - set up virtual host, if using apache, by this
3 - set the port.conf in /etc/apache2/port.conf
````sh
# If you just change the port or add more ports here, you will likely also
# have to change the VirtualHost statement in
# /etc/apache2/sites-enabled/000-default.conf

Listen 80 
Listen 81 # your virual host this for genius-2016-client
Listen 82 # your virual host for genius-2016-admin

<IfModule ssl_module>
	Listen 443
</IfModule>

<IfModule mod_gnutls.c>
	Listen 443
</IfModule>

# vim: syntax=apache ts=4 sw=4 sts=4 sr noet

````
4 - set up virtual host file conf in /etc/apache2/site-available/genius-admin-conf
````
<VirtualHost *:82>
    ServerAdmin webmaster@localhost

    DocumentRoot "your genius-2016-admin folder"
    <Directory "your genius-2016-admin folder">
        # Don't show directory index
        Options -Indexes +FollowSymLinks +MultiViews

        # Allow .htaccess files
        AllowOverride All

        # Allow web access to this directory
        Require all granted
    </Directory>

    # Error and access logs
    ErrorLog ${APACHE_LOG_DIR}/my-site.error.log
    # Possible values include: debug, info, notice, warn, error, crit,
    # alert, emerg.
    LogLevel warn
    CustomLog ${APACHE_LOG_DIR}/my-site.access.log combined
</VirtualHost>

````
5 - enable virtual site restart apache2
````
sudo a2ensite genius-admin.conf
sudo service apache2 restart
````
6 - make a db in mysql
7 - import the sql file locate in sql folder
8 - edit set.koneksi.php
````php
<?php
	$server = "localhost";
	$username = "your-username"; 
	$password = "your-password"; 
	$db = "your-dbname";
	$port = your-port;
	...
?>
````
9 - now its live on ````localhost/82````
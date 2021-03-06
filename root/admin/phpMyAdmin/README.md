
# phpMyAdmin

phpMyAdmin is a free and open source administration tool for MySQL and MariaDB. As a portable web application written primarily in PHP, it has become one of the most popular MySQL administration tools, especially for web hosting services. phpMyAdmin is intended to handle the administration of MySQL over the web. You can get the newest version at http://www.phpmyadmin.net/.

Release Version 3.4.10.1

Requirements:

- PHP 5.2 or later
- MySQL 5.0 or later
- a web-browser (doh!)

## phpMyAdmin - Installation

Please have a look to the Documentation.txt or Documentation.html files.

## phpMyAdmin - hints for distributing phpMyAdmin

This document is intended to give advices to people who want to
redistribute phpMyAdmin inside other software package such as Linux
distribution or some all in one package including web server and MySQL
server.

Generally you can customize some basic aspects (paths to some files and
behavior) in libraries/vendor_config.php.

For example if you want setup script to generate config file in var,
change SETUP_CONFIG_FILE to /var/lib/phpmyadmin/config.inc.php and you
will also probably want to skip directory writable check, so set
SETUP_DIR_WRITABLE to false.

## External libraries

phpMyAdmin includes several external libraries, you might want to
replace them with system ones if they are available, but please note
that you should test whether version you provide is compatible with the
one we ship.

Currently known list of external libraries:

js/jquery
    jQuery js framework
js/colorpicker
    jQuery based color picker

libraries/php-gettext
    php-gettext library
libraries/tcpdf
    tcpdf library, modified for our needs!

 vim: et ts=4 sw=4 sts=4 tw=72 spell spelllang=en_us

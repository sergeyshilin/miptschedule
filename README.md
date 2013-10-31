MIPT Schedule
============

Moscow Institute of Physics and Technology schedule repo

Download necessary components
-----------------------------

### Windows

* [Apache HTTP Server](http://httpd.apache.org/download.cgi)
* [PHP 5](http://php.net/downloads.php)
* [MySQL Community Server](http://dev.mysql.com/downloads/mysql/)

### Linux

    $ sudo apt-get update && sudo apt-get upgrade
    
and then

    $ sudo apt-get install mysql-server mysql-client apache2 apache2-doc php5 php5-mysql libapache2-mod-php5
 
Installation
------------

There are many documentations how to install and set up Apache + PHP + MySQL in 
* [Windows](http://www.codenet.ru/webmast/apache/AMP/)
* [Linux](https://wiki.debian.org/ru/LaMp)
 

MIPT Schedule repo cloning
--------------------------
in your working directory do this:

    git clone https://github.com/sergeyshilin/miptschedule.git

Schedule settigs
----------------
* edit `utils/SQLConfig.php` -- write down your MySQL database server, user and password
* edit `classes/Schedule.php` -- change absolute paths like this
 
    /home/snape/projects/mipt-schedule/classes/MiptSchedule.php

to your own
* edit `classes/MiptSchedule.php` -- change absolute paths to your own
* edit `utils/GetData.php` -- change absolute paths to your own

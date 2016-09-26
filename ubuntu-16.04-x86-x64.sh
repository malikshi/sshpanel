#!/bin/bash

# Clear terminal first
clear

# Make sure user is root

if [[ $EUID -ne 0 ]]; then
   echo "INIT 0!, SCRIPT SHOULD BE RUN AS ROOT!" 1>&2
   exit 1
fi

default=Vm0wd2VHUXhTWGhXV0doV

# Installing webserver & configurate
# Powered by LAMP (Linux, Apche, MySQL, PHP)

# Installing Apache2

apt install apache2 -y

# Installing MySQL Server

apt install debconf-utils -y
echo "mysql-server mysql-server/root_password select $default" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again select $default" | debconf-set-selections
sudo apt-get -y install mysql-server

# Installing PHP

sudo apt install libapache2-mod-php php-mcrypt php-mysql php-mbstring php-curl php-tokenizer php-xml

#######################################################
#           WEBSERVER SUCCESSFULLY INSTALLED          #
#######################################################

#######################################################
#                CONFIGURING SSHPANEL                 #
#######################################################

# Changed webserver root directory
sed -i 's/var\/www/var\/www\/html\/sshpanel/g' /etc/apache2/apache2.conf

# Go to Webserver dir
cd /var/www/html

# Cloning SSHPANEL from GitHub
# Make sure Git has been installed
apt install git -y

# Cloning!
git clone git://github.com/rizalio/sshpanel.git

# Generating .env file & configure database
mysql -u root -p$default -e "CREATE DATABASE IF NOT EXISTS sshpanel;exit;"
cd /var/www/html/sshpanel
echo "DB_CONNECTION=mysql" >> .env
echo "DB_PORT=3306" >> .env
echo "DB_DATABASE=sshpanel" >> .env
echo "DB_USERNAME=root" >> .env
echo "DB_PASSWORD=$default" >> .env

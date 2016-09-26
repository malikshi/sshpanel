#!/bin/bash

# Clear terminal first
clear

# Make sure user is root

if [ "$(id -u)" != "0" ]; then
   echo "INIT 0!, You should be run this script with root user!" 1>&2
   exit 1
fi

# Installing webserver & configurate
# Powered by LAMP (Linux, Apche, MySQL, PHP)

# Installing Apache2

apt install apache2 -y

# Installing MySQL Server

apt install debconf-utils -y
echo "mysql-server mysql-server/root_password select Vm0wd2VHUXhTWGhXV0doV" | debconf-set-selections
echo "mysql-server mysql-server/root_password_again select Vm0wd2VHUXhTWGhXV0doV" | debconf-set-selections
sudo apt-get -y install mysql-server

# Installing PHP

sudo apt install libapache2-mod-php php-mcrypt php-mysql php-mbstring php-curl php-tokenizer php-xml

#######################################################
#           WEBSERVER SUCCESSFULLY INSTALLED          #
#######################################################

#!/bin/bash

sudo apt-get update
sudo apt-get install apache2 libapache2-mod-php5 mysql-server php5-mysql php5 git
sudo service apache2 restart
mysql_secure_installation

mkdir -p /home/ubuntu/git
cd /home/ubuntu/git

ssh-keyscan github.com >> ~/.ssh/known_hosts
git clone git@github.com:markie2902/grocery_list.git

sudo rm /etc/apache2/sites-available/000-default.conf
sudo cp /home/ubuntu/git/grocery_list/frontend/000-default.conf /etc/apache2/sites-available

sudo service apache2 restart

mysqladmin -h localhost -u root -p$1 create $2
mysql -u root -p$1 $2< /home/ubuntu/git/grocery_list/frontend/dump.sql 
mysql -u root -p$1 -e "CREATE USER '$3'@'localhost' IDENTIFIED BY '$1';"
mysql -u root -p$1 -e "GRANT ALL PRIVILEGES ON * . * TO '$3'@'localhost';"

sudo service apache2 restart


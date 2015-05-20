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

mysqladmin -h localhost -u root -p$1 create grocery_list
# mysql -u [username] -p[password] -e "create database my_family;" (add another table)
# mysql -u root -p$1 grocery_list< /home/ubuntu/git/grocery_list/frontend/dump.sql 
mysql -u root -p$1 -e "CREATE USER '$2'@'localhost' IDENTIFIED BY '$1';"
mysql -u root -p$1 -e "GRANT ALL PRIVILEGES ON * . * TO '$2'@'localhost';"
mysql -D grocery_list -u $2 -p$1 -e "CREATE TABLE create_account (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(30) DEFAULT NULL,
  password varchar(30) DEFAULT NULL,
  repeat_password varchar(30) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  join_date datetime DEFAULT NULL,
  first_name varchar(32) DEFAULT NULL,
  last_name varchar(32) DEFAULT NULL,
  gender varchar(6) DEFAULT NULL,
  birthdate date DEFAULT NULL,
  city varchar(32) DEFAULT NULL,
  state varchar(32) DEFAULT NULL,
  country varchar(32) DEFAULT NULL,
  zipcode int(5) DEFAULT NULL,
  picture varchar(64) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username),
  UNIQUE KEY email (email)
);"

sudo service apache2 restart


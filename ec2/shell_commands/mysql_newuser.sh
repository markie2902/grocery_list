#!/bin/bash

mysql -u root -p
create database grocery_list;
cd /home/ubuntu/git/grocery_list/frontend
mysql -u root -p grocery_list < ~/git/grocery_list/frontend/dump.sql
mysql -u root -p
CREATE USER 'markie2902'@'localhost' IDENTIFIED BY 'burlbus952';
grant all privileges on * . * to 'markie2902'@'localhost'; 
exit

#!/bin/bash


scp -i ~/Desktop/grocery_list.pem /Users/Markie/000-default.conf ubuntu@$1:/etc/apache2/sites-available 

scp -i ~/Desktop/grocery_list.pem /Users/Markie/apache2.conf ubuntu@$1:/etc/apache2

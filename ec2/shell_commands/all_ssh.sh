#!/bin/bash

scp -i ~/Desktop/grocery_list.pem /Users/Markie/git/grocery_list/ec2/shell_commands/install_apache.sh ubuntu@$1:/tmp

scp -i ~/Desktop/grocery_list.pem /Users/Markie/.ssh/id_rsa ubuntu@$1:/home/ubuntu/.ssh/

ssh -i ~/Desktop/grocery_list.pem ubuntu@$1 "sh /tmp/install_apache.sh $2 $3"




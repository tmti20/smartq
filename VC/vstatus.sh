#!/bin/bash

clear
echo "Version Status (good or bad)";
read vstatus 
echo "Sending Report from (fe or be)";
read sendto

#get version number from database
php-cgi -f vstatus.php type=vstatus vstatus=$vstatus des=qa sendto=$sendto

#sudo zip -r test.zip /var/www/html/smartq/
#echo "hello : $name"
#sudo scp /var/www/html/test.zip it490-003@192.168.1.101:/home/it490-003/Desktop/

#
#echo $v;
echo "Deploy Package Successfully"


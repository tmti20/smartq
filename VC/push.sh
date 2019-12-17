#!/bin/bash

clear
echo "Making Version of (fe or be)?"; 
# input of host name. who is sending
read sender 
#typename
 
echo $sender;
#get version number from database
php-cgi -f makev.php type=pushv sender=$sender

#sudo zip -r test.zip /var/www/html/smartq/
#echo "hello : $name"
#sudo scp /var/www/html/test.zip it490-003@192.168.1.101:/home/it490-003/Desktop/

#
#echo $v;
echo "Pushed Version successfully"


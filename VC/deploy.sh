#!/bin/bash

clear
echo "Destination (qa or pro)";
read des
echo "Deploy To ( fe or be )"; 
# input of host name. who is sending
read to 

if [[ $des = "qa" ]] && [[ $to = "fe" ]];
  then
  desip="192.168.1.142";
  echo Destination IP is : $desip
#echo $desip;
elif [[ $des = "qa" ]] && [[ $to = "be" ]];
  then
  desip="192.168.1.132";
  echo Destination IP is : $desip
elif [[ $des = "pro" ]] && [[ $to = "fe" ]];
  then
  desip="192.168.1.143";
  echo Destination IP is : $desip
#echo $desip;
elif [[ $des = "pro" ]] && [[ $to = "be" ]];
  then
  desip="192.168.1.133";
  echo Destination IP is : $desip
else
echo "Wrong Entry ! Try Again "
exit;
fi


#get version number from database
php-cgi -f depv.php type=depv to=$to des=$des desip=$desip

#sudo zip -r test.zip /var/www/html/smartq/
#echo "hello : $name"
#sudo scp /var/www/html/test.zip it490-003@192.168.1.101:/home/it490-003/Desktop/

#
#echo $v;
echo "Deploy Package Successfully"


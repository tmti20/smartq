#!/bin/bash

clear
echo "Rollback Destination (qa or pro) ?";
read des
echo "Rollback to (fe or be)?";
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
php-cgi -f rollback.php type=rollback to=$to des=$des desip=$desip
echo $desip;

echo "Roolback Hoice good vai"

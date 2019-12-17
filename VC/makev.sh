#!/bin/bash
clear
sender=$1;
nv=$2;
des=$3;
#zip the folder
#sudo zip  versions/"$sender"_"$nv".zip /var/www/html/smartq   sshpass -f "./pass"
sudo mkdir versions/"$sender"/"$sender"_"$nv"/
sudo sshpass -f "./pass" scp -r it490-003@"$des":/var/www/html/smartq/* versions/"$sender"/"$sender"_"$nv"
#sudo ssh it490-003@192.168.1.101 "mkdir /var/www/html/VC/versions/"$sender"/"$sender"_"$nv"; chmod 0777 /var/www/html/VC/versions/"$sender"/"$sender"_"$nv";"
#sudo scp -r /var/www/html/smartq/* it490-003@192.168.1.101:/var/www/html/VC/versions/"$sender"/"$sender"_"$nv"

#sudo scp -r /var/www/html/smartq/* it490-003@192.168.1.101:/var/www/html/VC/versions/"$sender"

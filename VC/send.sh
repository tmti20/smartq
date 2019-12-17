#!/bin/bash
clear
desip=$1;
to=$2;
nv=$3;

#zip the folder
#sudo zip -r versions/"$to"_"$nv".zip /var/www/html/smartq
#sudo ssh it490-003@"$desip" "sudo rm -r /var/www/html/smartq/*;"
sudo sshpass -f "./pass" ssh it490-003@"$desip" "rm -r /var/www/html/smartq/*"
#sudo scp /var/www/html/VC/versions/"$to"/"$to"_"$nv"/ it490-003@"$desip":/var/www/html/smartq/
sudo sshpass -f "./pass" scp -r  /var/www/html/VC/versions/"$to"/"$to"_"$nv"/* it490-003@"$desip":/var/www/html/smartq/

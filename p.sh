#!/bin/bash
clear
echo pushing into git add commit
read commit
sudo git add .
sudo git commit -m "$commit"
sudo git push origin master

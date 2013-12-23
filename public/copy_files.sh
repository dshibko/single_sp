#!/bin/bash

cd /var/virtualhosts/sp/admin/public/
#cd /home/dmitryshibko/public_html/sp-admin.loc/public/
cp assets/*.php /var/virtualhosts/sp/clone/config/autoload/;
cp assets/*.css /var/virtualhosts/sp/clone/public/css/;
cp assets/*.ico /var/virtualhosts/sp/clone/public/img/;

crontab assets/crontab;

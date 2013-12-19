#!/bin/bash

#cd /var/virtualhosts/sp/admin/public/
cd /home/dmitryshibko/public_html/sp-admin.loc/public/
cp assets/*.php /home/dmitryshibko/public_html/sp.hiqo-solutions.loc/config/autoload/;
cp assets/*.css /home/dmitryshibko/public_html/sp.hiqo-solutions.loc/public/css/;
cp assets/*.ico /home/dmitryshibko/public_html/sp.hiqo-solutions.loc/public/img/;

crontab assets/crontab;
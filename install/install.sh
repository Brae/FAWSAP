#!/bin/bash
echo Cloning Git Repo...
git clone https://github.com/6footGeek/FAWSAP.git
cd FAWSAP/install
echo Setting up MySQL databases/tables. Please enter the root mysql password when asked
mysql -u root -p < populate.sql


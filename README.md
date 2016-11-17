# RaspberryPiEnviroMonitor
Environment Monitor with graphs for the Raspberry Pi Zero with Enviro pHAT

## Installation
```
### Install Enviro pHAT
curl -sS get.pimoroni.com/envirophat | bash

### Update system
sudo apt-get update && sudo apt-get upgrade

### Install LAMP
sudo apt-get install apache2 -y
sudo apt-get install php5 libapache2-mod-php5 -y
sudo apt-get install mysql-server php5-mysql -y

# note down the password you choose for the mysql root user

### Install GIT
sudo apt-get install git

### Install Composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --filename=composer --install-dir=/usr/bin

# go to your web root
cd /var/www/html/

sudo chown pi:www-data *
sudo chown pi:www-data .

rm index.html

git clone git@github.com:robertclarkson/RaspberryPiEnviroMonitor.git .


```

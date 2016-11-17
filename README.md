# RaspberryPiEnviroMonitor
Environment Monitor with graphs for the Raspberry Pi Zero with Enviro pHAT

Requirements:
* Raspberry Pi Zero
* Enviro pHAT https://shop.pimoroni.com/products/enviro-phat
* Wifi Dongle

## Installation

### Install Enviro pHAT
```
curl -sS get.pimoroni.com/envirophat | bash
```
### Update system
```
sudo apt-get update && sudo apt-get upgrade
```
### Install LAMP
```
sudo apt-get install apache2 -y
sudo apt-get install php5 libapache2-mod-php5 -y
sudo apt-get install mysql-server php5-mysql -y

# note down the password you choose for the mysql root user
```

### Install GIT
```
sudo apt-get install git
```
### Install Composer
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
sudo php composer-setup.php --filename=composer --install-dir=/usr/bin
```
### go to your web root
```
cd /var/www/html/

```
### remove all existing files in this dir
```
sudo chown pi:www-data *
sudo chown pi:www-data .
rm index.html
```

### clone this repo into that folder
```
git clone https://github.com/robertclarkson/RaspberryPiEnviroMonitor.git .
```

### install all packages
```
composer install
```

### create the mysql DB
```
mysql -u root -p
(enter your root mysql pass)
create database enviro;
exit;
```
### allow override in your webroot
```
sudo nano /etc/apache2/apache2.conf
```

### Enable rewrite
```
sudo a2enmod rewrite
```
### Change this 
```
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>

# to this

<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>
```
### change php execution time to 2 mins
```
sudo nano /etc/php5/apache2/php.ini

# change 
max_execution_time = 30
# to 
max_execution_time = 120

```

### Restart Apache
```
sudo service apache2 restart
```

### Update Permissions
```
sudo chown pi:www-data . -R
sudo chmod 775 . -R
```
### 

### create config file and set root password
```
cp _ss_environment.sample _ss_environment.php
nano _ss_environment.php
#update SS_DATABASE_PASSWORD with your root password
```

### allow www-data to run the enviro update
```
sudo visudo

# then add this line
www-data ALL=NOPASSWD: /var/www/html/TakeReading.py
```

Go to your raspberry pi homepage in your browser
http://raspberrypi

Hopefully the database should build and you should see the homepage

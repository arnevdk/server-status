# Linux Server Status #
_This package is only tested on Ubuntu!_

Linux Server Status provides an easily adaptable info page that summarizes the
status of your server. It contains a public page, on which you can advertise
running public services, as well as a private administartion page. The admin
page shows info about running services, RAM, CPU and disk usage and the
system's software and hardware.

This software makes use a combination of a PHP framework and Linux CLI tools to
collect information about your system.

## Get Started ##

### 1. Command line tools ###
ServerStatus makes use of the systemctl package.
```
$ sudo apt-get install systemctl
```

### 2. Clone site ###
Clone this repository in your apache web directory, e.g. ```/var/www```, or
setup a virtual host and clone the repository in it's document root.

### 3. Setup apache ###
ServerStatus has an admin page which displays information that can expose
possible vulnerabilities in your server. It is good practice to password protect
the admin page. You can do this by adding the following directive to you apache
config in ```/etc/apache2/apache2.conf```:
```
        <Location /admin>
                AuthType Basic
                AuthName "Restricted Files"
                AuthUserFile /etc/apache2/htpasswd
                Require valid-user
        </Location>
```

### 4. Complete settings ###
Fill in the ```settings.php``` in the site's root directory as indicated in the
file.

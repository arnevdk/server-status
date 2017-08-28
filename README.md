# Get started #
## Installation ##

This package is only tested on Ubuntu!

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

# Linux Server Status #
__This package is only tested on Ubuntu Server!__

Linux Server Status provides an easily adaptable info page that summarizes the
status of your server. It contains a public page, on which you can advertise
running public services, as well as a private administartion page. The admin
page shows info about running services, RAM, CPU and disk usage and the
system's software and hardware.

This software makes use a combination of a PHP framework and Linux CLI tools to
collect information about your system.

## Get Started ##

### 1. Install command line tools ###
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
You can then set your user password with the following command:
```
$ sudo htpasswd -c /etc/apache2/htpasswd <username>
```

### 4. Complete settings ###
Fill in the ```settings.php``` in the site's root directory as indicated in the
file.

## Override Process Status ##
Linux Server Status can show the status (running/not running) of selected
processes on the front page and on the administration page. For installed
services, this status is retrieved using the Linux ```systemctl``` package. It
is sufficient to list the services of which you want the status displayed in the
```settings.php``` file. It is however also possible to display the status of
processes that are not services or can't be found by ```systemctl```.

### 1. Add the custom process name to the settings ###
Choose a name for your custom process and add it either to ```admin_services``` or
```featured_services``` in ```settings.php```.

### 2. Add an override behavior function ###
First, add an entry in the ```overrides```array in ```overrides.php```. The
entry should have your chosen process name as key and the name of the behavior
function as value.

Then add a behavior function in the file. This function should return a
boolean value and it's output is rendered on the site as the status of the
corresponding process.

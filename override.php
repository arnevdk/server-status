<?php

# In this file you can override behavior for the process status functions for
# processes in $featured_services and $admin_services set in settings.php.
#
# Add a key-value pair in $overrides with the process name defined in
# settings.php mapped to the function you would like to use instead of the
# standard systemctl service status check. You can define the functions below.
# A status function should not have any parameters and should return a boolean
# value.

# Example:
#
# $overrides = array(
#       'game-server' => 'gameserver_status_check'
# )
#
# function gameserver_status_check(){
#       return not(empty(exec('pgrep --user gameserver-user')))
# }

$overrides = array(

);

 ?>

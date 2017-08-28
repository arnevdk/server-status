<?php require_once('../resources/php/inc.php') ?>

<html>
  <head>
    <?php include('../includes/styles.inc.php'); ?>
    <title><?php echo $server_name; ?> | phpInfo</title>
  </head>
  <body>
    <?php echo phpinfo(); ?>
  </body>
</html>

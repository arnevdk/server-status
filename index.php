<?php require_once("resources/php/settings.php"); ?>
<?php require_once("resources/php/processchecker.php"); ?>

<?php

$processes = array(
	'plexmediaserver'	=> 'plex_logo.png',
	'minecraft-ftb'		=> 'ftb_logo.png',
	
);


	$externalIp='<span class="text-muted">Failed fetching external IP</span>';
	$context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));

	$externalContent = file_get_contents('http://checkip.dyndns.com', False, $context);
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	$externalIp = $m[1];

?>

<html>
        <head>
                <title>Alagaesia</title>
                <?php include_once("includes/styles.inc.php"); ?>
        </head>
        <body>
                <?php include_once("includes/navbar.inc.php"); ?>
        	<div class="container" style="padding-top: 50px;">
			<h2>Information</h2>
			<div class="row">
				<div class="col-md-6">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>External IP:</td>
								<td><b><?php echo $externalIp; ?></b></td>
							</tr>
							<tr>
								<td>Local IP:</td>
								<td><b><?php echo $_SERVER['SERVER_ADDR']; ?></b></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<hr>
			<h2>Status</h2>
			<?php include("includes/servicelist.inc.php"); ?>
		</div>
		<?php include("includes/footer.inc.php"); ?>
	</body>
</html>


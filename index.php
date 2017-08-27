<?php require_once("resources/php/inc.php"); ?>

<html>
        <head>
                <title><?php echo $server_name; ?></title>
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
								<td><b><?php echo get_external_ip(); ?></b></td>
							</tr>
							<tr>
								<td>Local IP:</td>
								<td><b><?php echo get_internal_ip(); ?></b></td>
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

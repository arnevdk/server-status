<?php require_once("../resources/php/settings.php"); ?>
<?php require_once("../resources/php/processchecker.php"); ?>
<?php

$processes = array(
	"ssh",
	"fail2ban",
	"slapd",
	"mysql",
	"plexmediaserver"

);

$disks = array(
	"/",
	"/media/mediaroot"
);

$num_cpus = 2;


function get_server_ram_usage(){

    $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[2];

    return $memory_usage;
}

function get_server_total_ram(){

 $free = shell_exec('free');
    $free = (string)trim($free);
    $free_arr = explode("\n", $free);
    $mem = explode(" ", $free_arr[1]);
    $mem = array_filter($mem);
    $mem = array_merge($mem);
    $memory_usage = $mem[1];

    return $memory_usage;


}

function get_server_cpu_usage(){

    $load = sys_getloadavg();
    return $load[0];

}

function get_server_max_cpu(){
	global $num_cpus;
	return  $num_cpus * 2;
}
?>


<html>
	<head>
		<title>Alagaesia | admin</title>
		
		<?php include_once("../includes/styles.inc.php") ?>
	
	</head>
	<body>
		<?php include_once("../includes/navbar.inc.php") ?>
		<div class="container" style="padding-top: 50px;">
			<h1>Alagaesia admin page</h1>
			<hr>
			<h2>Tools</h2>
			<div class="row">	
				<div class="col-md-3">
					<ul class="list-group">
						<li class="list-group-item"><a href="phpmyadmin">phpMyAdmin</a></li>
						<li class="list-group-item"><a href="phpldapadmin">phpLDAPAdmin</a></li>
					</ul>
				</div>
			</div>
			<hr>
			<h2>Status</h2>
			<div class="row">
				<div class="col-md-6">
					<?php foreach($disks as $disk): ?>
					<?php
						$total =  disk_total_space($disk);
						$used = $total - disk_free_space($disk);
						$ratio = ($used/$total)*100;
					?>
					<h4>Disk root: <em><?php echo $disk; ?></em></h4>
					<span class="text-muted"><?php echo round($used/1000000) ?> MiB of <?php echo round($total/1000000) ?> MiB used</span>
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $used; ?>" aria-valuemin="0" aria-valuemax="<?php echo $total ?>" style="width:<?php echo $ratio; ?>%">
    							<span class="sr-only"><?php echo $used ?> MB used</span>
  						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="col-md-6">
					<h4>RAM usage</h4>
					<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<canvas id="ram-chart" style="width: 50%"></canvas>
					</div>
					</div>
					 <h4>CPU usage</h4>

					<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<canvas id="cpu-chart" style="width: 50%"></canvas>
					</div>
					</div>
				</div>
			</div>
			<hr>
			<h2>Services</h2>
			<?php include("../includes/servicelist_admin.inc.php"); ?>
		</div>
		<?php include("../includes/footer.inc.php"); ?>
	</body>


	<script>
	var ctx = document.getElementById("cpu-chart").getContext('2d');
	var cpu_chart = new Chart(ctx, {
    		type: 'doughnut',
    		data: {
      		labels: ["Used", "Free"],
      		datasets: [
        			{
	  			label: "CPU usage",
          			data: [<?php echo get_server_cpu_usage(); ?>,<?php echo  get_server_max_cpu() - get_server_cpu_usage(); ?>],
          			backgroundColor: ['#337ab7', Chart.defaults.global.defaultColor]
				}
      			]
    		}
	});

	ctx = document.getElementById("ram-chart").getContext('2d');
        var ram_chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                labels: ["Used", "Free"],
                datasets: [
                                {
                                label: "RAM usage",
                                data: [<?php echo get_server_ram_usage(); ?>,<?php echo get_server_total_ram() - get_server_ram_usage(); ?>],
                                backgroundColor: ['#337ab7', Chart.defaults.global.defaultColor]
                                }
                        ]
                }
        });

	</script>


</html>

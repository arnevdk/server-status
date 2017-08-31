<?php

function check_process($pname){
	return exec("systemctl is-active ".$pname) == "active";
}

function get_external_ip(){
	$externalIp='<span class="text-muted">Failed fetching external IP</span>';
	$context = stream_context_create(array('http' => array('header'=>'Connection: close\r\n')));
	$externalContent = file_get_contents('http://checkip.dyndns.com', False, $context);
	preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
	$externalIp = $m[1];
	return $externalIp;
}

function get_internal_ip(){
	return $_SERVER['SERVER_ADDR'];
}

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
	$num_cpus = num_cpus();
	return  $num_cpus * 2;
}

function disk_total($mount_point){
	 $total =  disk_total_space($mount_point);
	 return round($total/1000000);
}

function disk_used($mount_point){
	$total =  disk_total_space($mount_point);
	$used = $total - disk_free_space($mount_point);
	return round($used/1000000);
}

function disk_free($mount_point){
  $free = disk_free_space($mount_point);
	return round($free/1000000);
}

function disk_percentage($mount_point){
	$total =  disk_total_space($mount_point);
	$used = $total - disk_free_space($mount_point);
	return ($used/$total)*100;
}

function check_disk($disk){
	return disk_total_space($disk);

}

function server_cpu_info(){
	$file = file('/proc/cpuinfo');
	$proc_details = $file[4];
	return substr($proc_details, 12);
}

function server_ram_info(){
	$file = file('/proc/meminfo');
	$proc_details = $file[0];
	$kb_string = substr($proc_details, 9, sizeof($proc_details) - 5);
	return (string)(round((int)$kb_string / 1000000))." GB RAM";
}

function num_cpus(){
	return exec('cat /proc/cpuinfo | grep "physical id" | sort | uniq | wc -l');
}



?>

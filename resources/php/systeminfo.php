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
	global $num_cpus;
	return  $num_cpus * 2;
}

?>

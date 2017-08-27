<?php

function check_process($pname){
	return exec("systemctl is-active ".$pname) == "active";	
}

?>

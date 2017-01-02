<?php
	$_SESSION['access_token'] = "";
	if($_SESSION['access_token'] === "") {	
		include('fb_script.html');		
	} else {
		print_r('access_token is present');
	}   
?>
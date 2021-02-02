<?php
	
	$db_server = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'prince';

	$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

	if ($con) {
		// echo "Successfully Connected";
	}else{
		echo "Connection Error";
	}
?>
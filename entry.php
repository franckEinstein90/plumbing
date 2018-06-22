<?php

	include_once "ez_sql_core.php";
	include_once "ez_sql_mysqli.php";
	//ABSPATH needs to be defined before 	
	require_once ABSPATH . 'config.php';


	$db = new ezSQL_mysqli(DB_USERNAME, 
		DB_PASSWORD, 
		DB_NAME, 
		DB_SERVER);
	include 'functions.php';

?>
	

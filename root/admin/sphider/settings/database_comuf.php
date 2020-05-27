<?php
	$database="a7973808_empro";
	$mysql_user = "a7973808_empro";
	$mysql_password = "password";
	$mysql_host = "mysql5.000webhost.com";
	$mysql_table_prefix = "spider_";


	$success = mysql_pconnect ($mysql_host, $mysql_user, $mysql_password);
	if (!$success)
		die ("<b>Cannot connect to database, check if username, password and host are correct.</b>");
    $success = mysql_select_db ($database);
	if (!$success) {
		print "<b>Cannot choose database, check if database name is correct.";
		die();
	}
?>

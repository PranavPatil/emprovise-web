<?php
	$database="emprovis_root";
	$mysql_user = "emprovis_user";
	$mysql_password = "user123"; 
	$mysql_host = "localhost";
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


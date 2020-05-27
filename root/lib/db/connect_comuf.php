<?php


/* Database config */

$db_host		= 'mysql5.000webhost.com';
$db_user		= 'a7973808_empro';
$db_pass		= 'password';
$db_database	= 'a7973808_empro';

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>

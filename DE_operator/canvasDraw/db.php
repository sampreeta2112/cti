<?php
error_reporting(0);

/*
#### LOCAL ###################################### 
define('SITE_ADDRESS','http://localhost/ii');
define('DOCROOT','C:/xampp/htdocs/ii');


//DATABASE VARIABLES
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','inet_fms5.0'); 
// 
 */

#### LIVE ###################################### 
define('SITE_ADDRESS','http://goitway.com/staging-projects/ii');
define('DOCROOT','/home/gitw18/public_html/staging-projects/ii');


//DATABASE VARIABLES
define('DB_HOST','localhost');
define('DB_USERNAME','gitw18_fleet');
define('DB_PASSWORD','Q27Me@,Z*!xY');
define('DB_NAME','gitw18_inet_fms5.0'); 
// 

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME)or die('Could not connect');
	//mysqli_select_db($link,DB_NAME) or die('Could not connect to DB');

	session_start();
	
?>
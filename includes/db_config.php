<?php
error_reporting(0);

/*
#### LOCAL ###################################### 
define('SITE_ADDRESS','http://localhost/public_html');
define('DOCROOT','C:/pro/htdocs/public_html');


//DATABASE VARIABLES
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME',''); 
// 
 */

#### LIVE ###################################### 
define('SITE_ADDRESS','http://localhost/public_html');
define('DOCROOT','C:/pro/htdocs/public_html');


//DATABASE VARIABLES
define('DB_HOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','odbiuyjtbtxh_inet'); 
// 

$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD,DB_NAME)or die('Could not connect');
	//mysqli_select_db($link,DB_NAME) or die('Could not connect to DB');

	session_start();
	
?>
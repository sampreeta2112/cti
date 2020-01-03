<?php
include('db_config.php');

include('functions.php');

include('define.php');



$logged = 0;

if(isset($_SESSION[SES_ADMIN]->log_stat)) // if the session variable has been set...
{	
	if($_SESSION[SES_ADMIN]->log_stat == "A")
	{
		$logged = 1;
		
	}
}

if(!$logged)
{
	header('location:login.php');
}

?>
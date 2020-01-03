<?php
include('../includes/db_config.php');

include('../includes/functions.php');

include('../includes/define.php');

//include('../includes/attendance_funct.php');



$logged = 0;

if(isset($_SESSION[SES_USER]->log_stat)) // if the session variable has been set...
{	
	if($_SESSION[SES_USER]->log_stat == "A")
	{
		$logged = 1;
		$sess_user_id = $_SESSION[SES_USER]->user_id;
		$sess_full_name = $_SESSION[SES_USER]->full_name;
		$sess_user_name = $_SESSION[SES_USER]->user_name;
		$sess_user_role = $_SESSION[SES_USER]->user_role;
		
	}
}

if(!$logged)
{
	header('location:'.SITE_ADDRESS.'/login.php');
}


	$SITE_TITLE=$SITE_TITLE." | DE Operator";
	
	$sess_user_dp='';
	
	
?>

<?php
date_default_timezone_set("Asia/Kolkata");
define("SES_ADMIN","MRFP_ADMIN");
define("SES_MANAGER","MRFP_MANAGER");
define("SES_USER","MRFP_USER");
define("SITE_HEADER","MRF Systems");
$SITE_TITLE="File Mgt Sytem";
define("PAGE_LIMIT",10);
define("PAGE_ADJUSTMENT",5);
define("DEFAULT_DP","<i id='dp_display' class='fa fa-user-circle'></i>");
define("DEFAULT_DP1","<i id='dp_display_main' class='fa fa-user-circle'></i>");
define("IMG_ADD","<i class='fa fa-plus edit_icon success'></i>");
define("IMG_ADD1","<i class='fa fa-plus-square edit_icon success'></i>");
define("IMG_EDIT","<i class='fa fa-pencil edit_icon warning' style=''></i>");
define("IMG_PRINT","<i class='fa fa-print' style='font-size: 32px;'></i>");
define("IMG_VIEW","<i class='fa fa-search search_icon info'></i>");
define("IMG_DELETE","<i class='fa fa-trash-o edit_icon error1'></i>");
define('LASTMONTH_YMD', date('Y-m-01'));
define('NEXTMONTH_YMD', date('Y-m-01', strtotime('+1 month')));
define('LASTDATE_YMD', date('Y-m-d', strtotime(NEXTMONTH_YMD.'-1 day')));
define('IMG_ACTIVE',SITE_ADDRESS.'/img/icons/active.png');
define('IMG_INACTIVE',SITE_ADDRESS.'/img/icons/block.png');
define('DATE_YMD', date("Y-m-d")); //, strtotime('-1 year')
define('TIME_YMD', date("H:i:s"));
define('DATE_dMY',date_format(date_create(DATE_YMD),"d M Y"));
define('DATETIME_YMD', date("Y-m-d H:i:s"));
define('NXTWEEKDATE_DMY', date('Y-m-d', strtotime(DATE_YMD.'+7 day')));
define('NEXTDATE_DMY', date('d-m-Y', strtotime('+1 day')));
define('YESTDATE_DMY', date('d-m-Y', strtotime('-1 day')));
define('NEXTDATE_YMD', date('Y-m-d', strtotime('+1 day')));
define('YESTDATE_YMD', date('Y-m-d', strtotime('-1 day')));
define('DATE_MD', date("m-d")); //, strtotime('-1 year')
define('NXTWEEKDATE_DM', date('m-d', strtotime(DATE_YMD.'+2 day')));
define('DATE_MY', date("m-Y"));
define('DATE_YM', date("Y-m"));
define('DATE_M', date("m"));
define('DATE_Y', date("Y"));
$update_config_url = "config_edit.php";
$popup="N";

$color_arr=array('DOB'=>"rgb(78, 81, 160)",'DOA'=>"rgb(21, 154, 128)",'END_PP'=>"rgb(183, 17, 17)");
$key_convertion=array('DOB'=>"B'day",'DOA'=>"Anniversary",'END_PP'=>"Probation completion");

/*
if(isset($_SESSION[SES_MANAGER]->popup)) $popup = $_SESSION[SES_MANAGER]->popup;
elseif(isset($_GET["popup"])) { $popup = $_GET["popup"]; $_SESSION[SES_MANAGER]->popup = $popup; }
else $popup = "N";
*/

if(isset($_GET["popup"])) $popup = "Y";
elseif(isset($_POST["popup"])) $popup = "Y";
else $popup = "N";

$EMP_STATUS=array("P"=>"Pending","A"=>"Active","I"=>"Inactive");
$main_STATUS=array("O"=>"Open","C"=>"Fullfilled","X"=>"Cancelled");
$project_sts_arr=array("N"=>"New","O"=>"In Progress","C"=>"Closed");
$tdl_STATUS=array("P"=>"Pending","C"=>"Fullfilled","X"=>"Cancelled");
$JAPPL_STATUS=array("P"=>"Pending","S"=>"Selected","R"=>"Rejected");
$LAPPL_STATUS=array("N"=>"Pending","Y"=>"Approved","R"=>"Rejected","X"=>"Cancelled");
$ar_STATUS=array("P"=>"Pending","Y"=>"Approved","R"=>"Rejected");
$USER_ROLE_ARR=array("Admin"=>"Admin","Manager"=>"Manager","Teamleader"=>"Teamleader","Agent"=>"Agent");
$blood_grp_arr=array("-"=>"-","A Positive"=>"A Positive","A Negative"=>"A Negative","B Positive"=>"B Positive","B Negative"=>"B Negative","AB Positive"=>"AB Positive","O Positive"=>"O Positive");
$maritual_sts_arr=array("M"=>"Married","UM"=>"Unmarried","D"=>"Divorced","W"=>"Widowed");

define("LQ_alert","Out of Leave Quota. \nSent for Approval");
$misc_entry_type=array("O"=>"Outward","I"=>"Inward");
$inv_type_arr=array("1"=>"Tax Invoice","2"=>"Cash Bill");
$tax_type_arr=array("1"=>"SGST & CGST","2"=>"IGST");
$order_sts_arr=array("N"=>"New","P"=>"Pending","C"=>"Complete");
$pay_mode_arr=array("CASH"=>"Cash","NEFT"=>"NEFT","CHEQUE"=>"Cheque");
$region_arr=GetArray("Select r_id, r_name from region_master order by r_name ");
if(DATE_YMD>(date('Y-m-d' , strtotime("31-03-".DATE_Y))))
{
	$curr_from_year = DATE_Y;

	$curr_to_year = DATE_Y+1;
}
else
{
	$curr_from_year = DATE_Y-1;

	$curr_to_year = DATE_Y;
}
$curr_from_year1 = date('Y-m-d' , strtotime("01-04-".$curr_from_year));

$curr_to_year1 = date('Y-m-d' , strtotime("31-03-".$curr_to_year));

$time_hr_arr='';
$time_min_arr='';
for($i=0;$i<=23;$i++)
{
	$time_hr_arr[$i]=sprintf("%02d",$i);
}
for($i=0;$i<=60;$i++)
{
	$time_min_arr[$i]=sprintf("%02d",$i);
}
?>
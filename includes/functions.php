<?php
include("pagination.php");


function check_inject($sql_in) 
{
	return (strstr($sql_in,'/*') || strstr($sql_in,'--') || stristr($sql_in,'<script>') || stristr($sql_in,'</script>'))? true: false;
} 

function StatusImg($ctrl,$val,$id)
{
    if($val=='N')
    {
        echo '<img style="cursor: pointer;"  src="'.IMG_INACTIVE.'" title="Not Approved" onclick="ChangesStatus(\''.$ctrl.'\',\'Y\',\''.$id.'\');">';    
    }
    elseif($val=='Y')
    {
        echo '<img style="cursor: pointer;"  src="'.IMG_ACTIVE.'" title="Approved" onclick="ChangesStatus(\''.$ctrl.'\',\'N\',\''.$id.'\');">';    
    }
}

function NextID($q,$tbl)
{
	global $link;
	$query = "SELECT max($q) FROM $tbl";
	check_inject($query); 				//Check for Sql Injection
	$result = mysqli_query($link,$query)or die("<strong>ERROR CODE : </strong> COM - 154".mysqli_error($link)); 
	list($rid)=mysqli_fetch_row($result);
	
	if(!is_numeric($rid))
		$rid=0;		
	$rid++;
	return $rid;			
}   

function GetArray($q, $type='1')
{
	global $link;
    $r = mysqli_query($link,$q);
	$numrow = mysqli_num_rows($r);
	$array=array();
	if($numrow)
	{	
		for($i=1; $row = mysqli_fetch_row($r); $i++)
		{
             if($type=='1'){
                $array[$row[0]]=$row[1];
             }elseif($type=='2'){
                $array[$row[0]]=$row[0];
             }elseif($type=='3'){
                $array[$i]=$row[0];
             }
             
        }
     }   
    return $array;
}
    
function RunQry($q, $err_code='ERR')
{
	global $link;
	$err_str = '<br>query: '.$q.' <br>error: '.mysqli_error($link);
	
	if(check_inject($q))
	{
		echo '<div class="err">Fatal Error: SQL Injection, Script Blocked.</div>';
		exit;
	}
	
	$r = mysqli_query($link,$q)or die('<br>query: '.$q.' <br>error: '.mysqli_error($link));
	return $r;
}

function myhash($password) {  
  
    $salt = "f#@V)Hu^%Hgfds";  
    $hash = sha1($salt . $password);  
  
    // make it take 1000 times longer  
    for ($i = 0; $i < 1000; $i++) {  
        $hash = sha1($hash);  
    }  
  
    return $hash;  
    }

function post_val($string)
{
	$string = strip_tags($string);
    $string = (!get_magic_quotes_gpc())? addslashes($string): $string; //stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

function GetSingleValue($q)
{
	global $link;
   $value=false; 
   $r = mysqli_query($link,$q);
   if(mysqli_num_rows($r))
   {
      list($value)=mysqli_fetch_row($r);
      
   }
     return $value;
}

function Changedateformat($value)
{
        $outputdate ='';
        if($value!='')
        {
         //this explodes the datetime into seperate parts
        array($datetime = explode(" ", $value));
		$time=(!empty($datetime[1]))? " ".$datetime[1]:'';
        //this explodes the date into seperate parts
        array($date = explode("-", $datetime[0]));
    
        //sets the outputdate to the correct format
        // date =  (0 = YEAR, 1 = MONTH, 2 = DAY)
        // datetime = (0 = date, 1 = TIME)
        $outputdate = $date[2]."-".$date[1]."-".$date[0].$time;
        }
        return $outputdate;
  
}

// To print date on pdf with all html formating
function cust_date_format($date_str,$date_frmt='full')
{
	$date_val=strtotime($date_str);
	if($date_frmt=='full')
	{
		return date("d", $date_val)."<sup>". date("S", $date_val)."</sup>".date(" F Y", $date_val);
	}
	if($date_frmt=='md')
	{
		return date("d", $date_val)."<sup>". date("S", $date_val)."</sup>".date(" F", $date_val);
	}
	if($date_frmt=='ym')
	{
		return date(" F Y", $date_val);
	}
}

function UItoDB($date_str)
{
	$date_str=$_POST['txtpay_rec_date'];
	$date_val=strtotime($date_str);
	return date("Y-m-d", $date_val);
}

function DBtoUI($date_str)
{
	$date_str=$_POST['txtpay_rec_date'];
	$date_val=strtotime($date_str);
	return date("d F Y", $date_val);
}

function get_sec($mduration)
{
	$mduration_arr=explode(":",$mduration);
	$mduration_HR_sec=$mduration_arr[0]*60*60;
	$mduration_MIN_sec=$mduration_arr[1]*60;
	$mduration_time_sec=$mduration_HR_sec+$mduration_MIN_sec+$mduration_arr[2];
	return $mduration_time_sec;
}

function get_std_time($mduration_sec)
{
	$mdurationhr=$mduration_sec/3600; //get hrs of time elapsed
	$mdurationminsec=$mduration_sec%3600; 
	$mdurationmin=$mdurationminsec/60; //get min of time elapsed
	$mdurationsec=$mdurationminsec%60; //get sec of time elapsed
	$mduration=sprintf("%02d",floor($mdurationhr)).":".sprintf("%02d",floor($mdurationmin)).":".sprintf("%02d",floor($mdurationsec));
	return $mduration;
}

function get_dayInMonth($date_val)
{
	$last_day_in_month = date('t', strtotime($date_val));
	return $last_day_in_month;
}

function getWorkingDays($startDate,$endDate,$holidays){
    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);


    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date("N", $startDate);
    $the_last_day_of_week = date("N", $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        //if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;

            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                /*$no_remaining_days--;*/
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 1;
        }
    }

    //The no. of business days is: (number of weeks between the two dates) * (6 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
   $workingDays = $no_full_weeks * 6; /*$no_full_weeks * 5;*/
    if ($no_remaining_days > 0 )
    {
      $workingDays += $no_remaining_days;
    }

    //We subtract the holidays
    foreach($holidays as $holiday){
        $time_stamp=strtotime($holiday);
        //If the holiday doesn't fall in weekend
        if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 7)
            $workingDays--;
    }

    return $workingDays;
}

function send_mail($row_id,$event)
{}

function convert_number_to_words($number) {
	
	$no = round($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  return $result . "Rupees  " . $points;
	
}

function send_msg($contact_no,$sms_text)
{
	
		if($sms_text!='')
		{
			//$sms_text = str_replace(' ', '%20', $sms_text);
			//$sms_text = str_replace('<br><br>', ',', $sms_text);
			
			$sms_text="R K Engineering Works: ".$sms_text;
			
			$sms_text=urlencode($sms_text);
			$usms_url="http://167.114.117.218/rest/services/sendSMS/sendGroupSms?AUTH_KEY=d7ef9e79122562b8752af026f7eb9f9a&message=".$sms_text."&senderId=RKENGW&routeId=3&mobileNos=".$contact_no."&smsContentType=english";
			
			$url = $usms_url;
			

			$ch = curl_init();
			curl_setopt ($ch, CURLOPT_URL,$url );
			 $buffer= curl_exec ($ch);
			if(empty ($buffer))
			{ echo " buffer is empty "; }
			else
			{ echo $buffer; } 
			curl_close($ch);
		}
}

?>

<?php

include('dynamic.php');

$disp_url = "view_files.php"."?page=1".$url_str;
$edit_url = "DE_home.php";

if(isset($_GET["mode"])) $mode = $_GET["mode"];
else if(isset($_POST["mode"])) $mode = $_POST["mode"];
else $mode = 'A';

if(isset($_GET["id"])) $txtid = $_GET["id"];
else if(isset($_POST["txtid"])) $txtid = $_POST["txtid"];
else $txtid = '0';


if($mode == 'A')
{
	
	$survey_date='';
	$expert_co='';
	$removed_date='';
	$removed_comp='';
	$location='';
	$s_location='';
	$items_detail='';
	$remark='';
	$report_no='';
	$check_pt='';
	$n_removed='';
	$n_ship='';
	$asbestos='';
	$pcb='';
	$ods='';
	$anti_fouling='';
	$pfos='';
	$cd='';
	
	$cr6='';
	$pb='';
	$hg='';
	$pbbs='';
	$pbedes='';
	$pcns='';
	$radioactive='';
	$sccps='';
	$hbccd='';	
	$Last_check='';
	$cond_chk='';
	$status='';
	//$fileprojectname=post_val($_POST['fileprojectname']);
	//$clientname=post_val($_POST['clientname']);
						
	$form_mode = "I";
	}
if($mode == 'I')
{
	// echo '<pre>';
	// print_r($_POST);exit;
		$fileid=NextID("file_id","file_records");
		$survey_date=post_val($_POST['survey_date']);
		$expert_co=post_val($_POST['expert_co']);
		$removed_date=post_val($_POST['removed_date']);
		$removed_comp=post_val($_POST['removed_comp']);
		$location=post_val($_POST['location']);
		$s_location=post_val($_POST['s_location']);
		$items_detail=post_val($_POST['items_detail']);
		$remark=post_val($_POST['remarks']);
		$report_no=post_val($_POST['report_no']);
		$check_pt=post_val($_POST['check_pt']);
		$n_removed=post_val($_POST['n_removed']);
		$n_ship=post_val($_POST['n_ship']);
		$asbestos=post_val($_POST['asbestos']);
		$pcb=post_val($_POST['pcb']);
		$ods=post_val($_POST['ods']);
		$anti_fouling=post_val($_POST['anti_fouling']);
		$cd=post_val($_POST['cd']);
		$pfos=post_val($_POST['pfos']);
		$cr6=post_val($_POST['cr6']);
		$pb=post_val($_POST['pb']);
		$hg=post_val($_POST['hg']);
		$pbbs=post_val($_POST['pbbs']);
		$pbedes=post_val($_POST['pbedes']);
		$pcns=post_val($_POST['pcns']);
		$radioactive=post_val($_POST['radioactive']);
		$sccps=post_val($_POST['sccps']);
		$hbccd=post_val($_POST['hbccd']);
		$rcf=post_val($_POST['rcf']);
		$Last_check=post_val($_POST['Last_check']);
		$cond_chk=post_val($_POST['cond_chk']);
		$status=post_val($_POST['status']);

		foreach($_POST['items_detail'] as $k=>$v)
		{

			$q="INSERT INTO `file_records`(`survey_date`, `expert_co`, `removed_date`, `removed_comp`, `location`, `s_location`, `items_detail`, `remarks`, `report_no`, `check_pt`, `n_removed`, `n_ship`, `asbestos`, `pcb`, `ods`, `anti_fouling`, `pfos`, `cd`, `cr6`, `pb`, `hg`, `pbbs`, `pbedes`, `pcns`, `radioactive`, `sccps`, `hbccd`) VALUES ('".$_POST['survey_date']."','".$_POST['expert_co']."','".$_POST['removed_date'][$k]."','".$_POST['removed_comp'][$k]."','".$_POST['location'][$k]."','".$_POST['s_location'][$k]."','".$_POST['items_detail'][$k]."','".$_POST['remarks'][$k]."','".$_POST['report_no']."','".$_POST['check_pt'][$k]."','".$_POST['n_removed'][$k]."','".$_POST['n_ship'][$k]."','".$_POST['asbestos'][$k]."','".$_POST['pcb'][$k]."','".$_POST['ods'][$k]."','".$_POST['anti_fouling'][$k]."','".$_POST['pfos'][$k]."','".$_POST['cd'][$k]."','".$_POST['cr6'][$k]."','".$_POST['pb'][$k]."','".$_POST['hg'][$k]."','".$_POST['pbbs'][$k]."','".$_POST['pbedes'][$k]."','".$_POST['pcns'][$k]."','".$_POST['radioactive'][$k]."','".$_POST['sccps'][$k]."','".$_POST['hbccd'][$k]."','".$_POST['rcf'][$k]."', '".$_POST['Last_check'][$k]."','".$_POST['cond_chk'][$k]."','".$_POST['status'][$k]."')";
			//echo $q;exit;
			$r = RunQry($q);
			//$response_query = mysqli_query($con, $q) or die('Error, insert query failed with query1');
  //   $id             = mysqli_insert_id($con);
		// $numrow = mysqli_num_rows($r);

			// $q="insert into file_records values('$fileid','$survey_date','$expert_co','$removed_date[$k]','$removed_comp[$k]','$location[$k]', '$s_location[$k]','$items_detail[$k]','$remarks[$k]','$report_no','$check_pt[$k]','$n_removed[$k]','$n_ship[$k]','$asbestos[$k]','$pcb[$k]','$ods[$k]','$anti_fouling[$k]', '$pfos','$cd[$k]','$cr6[$k]','$pb[$k]','$hg[$k]','$pbbs[$k]','$pbedes[$k]','$pcns[$k]','$radioactive[$k]','$sccps[$k]', '$hbccd[$k]')";	
			// //echo $q;exit;
			// $r = RunQry($q);
		}
		
					
		//echo "<script type='text/javascript'>
	 		//alert('".$fileid." File(s) added successfully');
	 //	</script>";
	// 	if($r)
	// 		{
	// 			echo "<script type='text/javascript'>
	// 				alert('Region added successfully');
	// 				</script>";
	// 		}
	// 		else
	// 		{
	// 			echo "<script type='text/javascript'>
	// 				alert('Error in adding Region');
	// 				</script>";
	// 		}
	
	 $loc_str = $disp_url;

	
	echo "<script>
	 		window.location.assign('".$loc_str."');
	 		</script>";
	 exit;
	//$_SESSION[SES_ADMIN]->success_msg = "Client".$txt_msg." Details Successfully Inserted";
	
}

elseif($mode == 'E')
{
$survey_date='';
	$expert_co='';
	$removed_date='';
	$removed_comp='';
	$location='';
	$s_location='';
	$items_detail='';
	$remark='';
	$report_no='';
	$check_pt='';
	$n_removed='';
	$n_ship='';
	$asbestos='';
	$pcb='';
	$ods='';
	$anti_fouling='';
	$pfos='';
	$cd='';
	$cr6='';
	$pb='';
	$hg='';
	$pbbs='';
	$pbedes='';
	$pcns='';
	$radioactive='';
	$sccps='';
	$hbccd='';	
	$rcf='';
	$Last_check='';
	$cond_chk='';
	$status='';

	$form_mode = "I";
	
	$q = "select * from  file_records where file_id=$txtid";
	
	$r = RunQry($q);
	if(!mysqli_num_rows($r))
	{
		header("location: $edit_url");
		exit;
	}
	$o = mysqli_fetch_object($r);
	

	
										
										$survey_date=$o->survey_date;
	$expert_co=$o->expert_co;
	$removed_date=$o->removed_date;
	$removed_comp=$o->removed_comp;
	$location=$o->location;
	$s_location=$o->s_location;
	$items_detail=$o->items_detail;
	$remark=$o->remark;
	$report_no=$o->report_no;
	$check_pt=$o->check_pt;
	$n_removed=$o->n_removed;
	$n_ship=$o->n_ship;
	$asbestos=$o->asbestos;
	$pcb=$o->pcb;
	$ods=$o->ods;
	$anti_fouling=$o->anti_fouling;
	$pfos=$o->pfos;
	$cd=$o->cd;
	$cr6=$o->cr6;
	$pb=$o->pb;
	$hg=$o->hg;
	$pbbs=$o->pbbs;
	$pbedes=$o->pbedes;
	$pcns=$o->pcns;
	$radioactive=$o->radioactive;
	$sccps=$o->sccps;
	$hbccd=$o->hbccd;
	$rcf=$o->rcf;	
		$Last_check=$o->Last_check;
	$cond_chk=$o->cond_chk;
	$status=$o->status;				
	$form_mode = "U";
	
}
elseif($mode == 'U')
{
	$survey_date=$o->survey_date;
	$expert_co=$o->expert_co;
	$removed_date=$o->removed_date;
	$removed_comp=$o->removed_comp;
	$location=$o->location;
	$s_location=$o->s_location;
	$items_detail=$o->items_detail;
	$remark=$o->remark;
	$report_no=$o->report_no;
	$check_pt=$o->check_pt;
	$n_removed=$o->n_removed;
	$n_ship=$o->n_ship;
	$asbestos=$o->asbestos;
	$pcb=$o->pcb;
	$ods=$o->ods;
	$anti_fouling=$o->anti_fouling;
	$pfos=$o->pfos;
	$cd=$o->cd;
	$cr6=$o->cr6;
	$pb=$o->pb;
	$hg=$o->hg;
	$pbbs=$o->pbbs;
	$pbedes=$o->pbedes;
	$pcns=$o->pcns;
	$radioactive=$o->radioactive;
	$sccps=$o->sccps;
	$hbccd=$o->hbccd;
	$rcf=$o->rcf;
	$Last_check=$o->Last_check;
	$cond_chk=$o->cond_chk;
	$status=$o->status;


	
     $q = "Update file_records set survey_date = '$survey_date', expert_co = '$expert_co', removed_date= '$removed_date', removed_comp= '$removed_comp', location='$location', s_location='$s_location', items_detail='$items_detail', remarks='$remarks', report_no='$report_no', check_pt='$check_pt', n_removed=$n_removed, n_ship=$n_ship, asbestos=$asbestos, pcb =$pcb, ods =$ods, anti_fouling=$anti_fouling, pfos=$pfos, cd=$cd, cr6=$cr6, pb=$pb, hg='$hg', pbbs='$pbbs', pbedes='$pbedes', pcns='$pcns', radioactive='$radioactive', sccps='$sccps', hbccd='$hbccd', rcf='$rcf', Last_check='$Last_check', cond_chk='$cond_chk', status='$status' where file_id = '$txtid'";
		//echo $q; exit();
		$r = RunQry($q);
		
		if($r)
			{
				echo "<script type='text/javascript'>
					alert('Region updated successfully');
					</script>";
			}
			else
			{
				echo "<script type='text/javascript'>
					alert('Error in updating Region type');
					</script>";
			}
	
}
	
if($mode == "I" || $mode == "U")
{
	
	$loc_str = $edit_url."?mode=E&id=$txtid";

	
	echo "<script>
			window.location.assign('".$loc_str."');
			</script>";
	exit;
}	




?>





<!DOCTYPE html>
<html>
<head>
	<?php include('_header.php'); ?>
	<title></title>
	<style>
	#textbox{
		width: 150px;
		 border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 140px;
	}
	.txtbx1{
		width: 40px;
		 border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 140px;
	}
	 #tb{
      	width: 28px;
      	 border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  
      }
      #tb1{

    
    transition: 0.5s;



      	width: 30px;
      	 border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
 
      }
      #tb1:focus {
    width:150px;
    transition: 0.5s;
}
	  </style>
	  <style>
	 #date{
  background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 140px;
}
#date::-webkit-inner-spin-button {
  display: none;
}
#date::-webkit-calendar-picker-indicator {
  opacity: 0;
}
 #date1{
  background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;
  border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
  padding: 3px 5px;
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
  width: 40px;
}
#date1::-webkit-inner-spin-button {
  display: none;
}
#date1::-webkit-calendar-picker-indicator {
  opacity: 0;
}
#date1:focus {
    width:150px;
    transition: 0.5s;
}


</style>


	<!-- Latest compiled and minified CSS -->
<script>
function goBack() {
  window.history.back();
}
</script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php include('_menu.php');?>
</head>
<body onload="goBack();" 
	onpageshow="if (event.persisted) goBack();" onunload="">
<div class="container">
<form id="" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"  enctype="multipart/form-data">
<input type="hidden" name="mode" id="mode" value="I">
<div class="row">
    <div class="col-sm-12" id="searchbox" style="margin-right: 40px; width: 800px;">
        				 	<label>Ship Name:</label>  CC BUTTERFLY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"   name="v_name" style="width: 120px;" value="<?php echo$v_name; ?>" placeholder="">&nbsp;&nbsp;&nbsp;
							<label >Fleet:</label>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"   name="file_no" style="width: 120px;" value="<?php echo$file_no; ?>" placeholder="">&nbsp;&nbsp;&nbsp;
							<label for="txtname">Flag:</label> GERMANY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"  style="width: 110px;"  name="file_no"  value="<?php echo$file_no; ?>" placeholder="">
							<label for="txtname">IMO No:</label> 9365790 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"  style="width: 110px;"  name="file_no"  value="<?php echo$file_no; ?>" placeholder=""><br><br>
					<label>Survey Date </label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="date"  id="date" name="survey_date" value="<?php echo$survey_date; ?>" placeholder="" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="txtname">Expert Company</label>&nbsp;&nbsp;&nbsp;&nbsp;
				<select id="textbox" name="expert_co" required> 
				<option value=" "></option>
    	<option value="CTI">CTI</option>
	    <option value="KIWA">KIWA</option>
	    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label>Report No</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="text"  id="textbox" name="report_no" value="<?php echo$report_no; ?>" placeholder="" required>



						
					<label>INSPECTION REPORT</label><input type="file" name="fileToUpload" id="fileToUpload">
					<button type="submit" style="margin-left:40%;float: left; margin-top:10px;" class="btn btn-info btn-md">IMPORT</button>

						</div>
</div>



<div class="table-responsive" style="margin-left:-100px; margin-top:20px;">
<table class="table" id="customFields" >
	<thead><tr><th>Items Details</th><th>check points</th><th>Location</th><th>Shipyard Location</th><th>Remarks</th><th>Removed Date</th><th>Removal company</th><th>Next Removal Date </th><th>Next Shipyard Entry Date </th><th>Asbestors</th><th>PCB</th><th>ODS</th><th>A/F</th><th>Cd</th><th>PFOs</th><th>Cr6+</th><th>Pb</th><th>Hg</th><th>PBBS</th><th>PBCEDEs</th><th>PCNs</th><th>Radioactive</th><th> Sccps</th><th>HBCCD</th><th>rcf</th><th>Last Checked</th><th>Condition of check points</th><th>“Hazmat (YES/NO)”</th><th>status</th><th>Delete</th></tr></thead>
	<tbody>
		<tr><td><input type="text" id="tb1" name="items_detail[]" value=""></td>
<td><input type="text" id="tb1"  name="check_pt[]" value=""></td>
<td><input type="text"  id="tb1" name="location[]" value=""></td>
<td><input type="text" id="tb1" name="s_location[]" value=""></td>
<td><input type="text" id="tb1" name="remarks[]" value=""></td>
<td><input type="date" id="date1" name="removed_date[]" value=""></td>
<td><input type="text" id="tb1" name="removed_comp[]" value=""></td>
<td><input type="date" id="date1" name="n_removed[]" value=""></td>
<td><input type="text" id="tb1" name="n_ship[]" value=""></td>
<td><input type="text" id="tb1" name="asbestos[]" value=""></td>
<td><input type="text" id="tb1" name="pcb[]" value=""></td>
<td><input type="text" id="tb1" name="ods[]" value=""></td>
<td><input type="text" id="tb1"  name="anti_fouling[]" value=""></td>
<td><input type="text" id="tb1" name="cd[]" value=""></td>
<td><input type="text" id="tb1" name="pfos[]" value=""></td>
<td><input type="text" id="tb1" name="cr6[]" value="" ></td>
<td><input type="text" id="tb1" name="pb[]"  value=""></td>
<td><input type="text" id="tb1" name="hg[]" value=""></td>
<td><input type="text" id="tb1" name="pbbs[]" value=""></td>
<td><input type="text" id="tb1" name="pbedes[]" value=""></td>
<td><input type="text" id="tb1" name="pcns[]" value=""></td>
<td><input type="text" id="tb1" name="radioactive[]" value=""></td>
<td><input type="text" id="tb1" name="sccps[]" value=""></td>
<td><input type="text"  id="tb1" name="hbccd[]" value=""></td>

<td><input type="text"  id="tb1" name="rcf[]" value=""></td>

<td><input type="date"  id="date1" name="Last_check[]" value=""></td>

<td><select id="tb1" name="cond_chk[]">
	<option value="Good/Need">Good/Need</option>
	<option value="Repair/Need">Repair/Need</option>
</select></td>
<td><select id="tb1" name="hazmat[]">
	<option value="YES">YES</option>
	<option value="NO">NO</option>
</select></td>
<td><select id="tb1" name="status[]">
	<option value="Marking">Marking</option>
	<option value="Containment">Containment</option>
	<option value="Removal">Removal</option>

</select></td>



	</tbody>
<td><a href="javascript:void(0);" class="addCF">ADD<?php echo IMG_ADD1;?></a></td></tr>
</table>
</div>
<tr>
<td><button type="submit" style="margin-left:40%;float: left; margin-top:10px;" class="btn btn-info btn-md">Submit</button></td>
<td><button  style="margin-left:2%;float: left;margin-top:10px;" class="btn btn-info btn-md"><a href=view_files.php>cancel</button></td>
</tr>
</form>
</div>
</body>
<script type="text/javascript">
	$(document).ready(function() {
$(".addCF").click(function(){
		$("#customFields").append('<tr valign="top"><td><input type="text" id="tb1" name="items_detail[]" value=""></td><td><input type="text" id="tb1" name="check_pt[]" value=""></td><td><input type="text"  id="tb1" name="location[]" value=""></td><td><input type="text" id="tb1" name="s_location[]" value=""></td><td><input type="text" id="tb1" name="remarks[]" value=""></td><td><input type="date" id="date1" name="removed_date[]" value=""></td><td><input type="text" id="tb1" name="removed_comp[]" value=""></td><td><input type="date" id="date1" name="n_removed[]" value=""></td><td><input type="text" id="tb1" name="n_ship[]" value=""></td><td><input type="text" id="tb1" name="asbestos[]" value=""></td><td><input type="text" id="tb1" name="pcb[]" value=""></td><td><input type="text" id="tb1" name="ods[]" value=""></td><td><input type="text" id="tb1"  name="anti_fouling[]" value=""></td><td><input type="text" id="tb1" name="cd[]" value=""></td><td><input type="text" id="tb1" name="pfos[]" value=""></td><td><input type="text" id="tb1" name="cr6[]" value="" ></td><td><input type="text" id="tb1" name="pb[]"  value=""></td><td><input type="text" id="tb1" name="hg[]" value=""></td><td><input type="text"  id="tb1" name="pbbs[]" value=""></td><td><input type="text"  id="tb" name="pbcedes[]" value=""></td><td><input type="text"  id="tb" name="pcns[]" value=""></td><td><input type="text" id="tb1" name="radioactive[]" value=""></td><td><input type="text" id="tb1" name="sccps[]" value=""></td><td><input type="text" id="tb"  name="hbccd[]" value=""></td><td><input type="text" id="tb1"  name="rcf[]" value=""></td><td><input type="date" id="date1"  name="Last_check[]" value=""></td><td><select id="tb1" name="cond_chk[]"><option value="Good/Need">Good/Need</option><option value="Repair/Need">Repair/Need</option></select></td><td><select id="tb1" name="hazmat[]"><option value="YES">YES</option><option value="NO">NO</option></select></td><td><select id="tb1" name="status[]"><option value="Marking">Marking</option><option value="Containment">Containment</option><option value="Removal">Removal</option></select></td><td><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
</script>
</html>
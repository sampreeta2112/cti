
<?php

include('dynamic.php');

$disp_url = "plan_haz.php"."?page=1".$url_str;
$edit_url = "add_plan.php";

if(isset($_GET["mode"])) $mode = $_GET["mode"];
else if(isset($_POST["mode"])) $mode = $_POST["mode"];
else $mode = 'A';

if(isset($_GET["id"])) $txtid = $_GET["id"];
else if(isset($_POST["txtid"])) $txtid = $_POST["txtid"];
else $txtid = '0';


if($mode == 'A')
{
	
	
	$itm_details='';
	$exp_co='';
	$loc='';
	$chk_pt='';
	$date='';
	
	//$fileprojectname=post_val($_POST['fileprojectname']);
	//$clientname=post_val($_POST['clientname']);
						
	$form_mode = "I";
	}
if($mode == 'I')
{
	// echo '<pre>';
	// print_r($_POST);exit;
		$p_id=NextID("p_id","plan_haz");
		$date=post_val($_POST['date']);
		$exp_co=post_val($_POST['exp_co']);
		
		$loc=post_val($_POST['loc']);
		
		$itm_details=post_val($_POST['itm_details']);
		
		$chk_pt=post_val($_POST['chk_pt']);
		
		foreach($_POST['itm_details'] as $k=>$v)
		{

			$q="INSERT INTO `plan_haz`(`exp_co`,   `loc`,  `itm_details`,  `chk_pt`, `date`) VALUES ('".$_POST['exp_co'][$k]."','".$_POST['loc'][$k]."','".$_POST['itm_details'][$k]."','".$_POST['chk_pt'][$k]."', '".$_POST['date'][$k]."')";
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
$date='';
	$exp_co='';
	
	
	$loc='';
	
	$itm_details='';
	
	$chk_pt='';
	
	
	$form_mode = "I";
	
	$q = "select * from plan_haz where p_id=$txtid";
	
	$r = RunQry($q);
	if(!mysqli_num_rows($r))
	{
		header("location: $edit_url");
		exit;
	}
	$o = mysqli_fetch_object($r);
	

	
										
										$date=$o->date;
	$exp_co=$o->exp_co;
	
	
	$loc=$o->loc;
	
	$itm_details=$o->itm_details;
	
	$chk_pt=$o->chk_pt;
	
						
	$form_mode = "U";
	
}
elseif($mode == 'U')
{
	$date=$o->date;
	$exp_co=$o->exp_co;
	
	$loc=$o->loc;
	
	$itm_details=$o->itm_details;
	
	$chk_pt=$o->chk_pt;
	
	
     $q = "Update plan_haz set date = '$date', exp_co = '$exp_co',loc='$loc', itm_details='$itm_details',  chk_pt='$chk_pt'";
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


elseif($mode=="D")
{
	
	
	$sql="DELETE  FROM `plan_haz` WHERE p_id='$txtid'";
					RunQry($sql);
					//$log_id=NextID("log_id","log_table");
					//$sqllog="DELETE  FROM `log_table` WHERE file_id='$txtid'";
					//RunQry($sqllog);
					//$att_id=NextID("att_id","attachments");
	//$sq="DELETE  FROM `attachments` WHERE file_id='$txtid'";
	//RunQry($sq);
	//$pdf_id=NextID("pdf_id","pdf");
					//$sqll="DELETE  FROM `pdf` WHERE pdf_id='$txtid'";
					
				//	$r=RunQry($sqll);

	//$file = '../pdf_output/pdf-'.$txtid.".pdf";

	
	
	
	
$loc_str =  $disp_url;	
	echo "<script type='text/javascript'> 
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

    
   



      	width: 150px;
      	 border: 1px solid #c4c4c4;
  border-radius: 5px;
  background-color: #fff;
 
  box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
 
      }
     
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
					<label>Date </label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="date"  id="date" name="date" value="<?php echo$survey_date; ?>" placeholder="" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
						</div>
</div>


<div class="table-responsive" style="margin-left:-100px; margin-top:20px;">
<table class="table" id="customFields" >
	<thead><tr><th>Items Details</th><th>Expert company</th><th>Location</th><th>check points</th></tr></thead>
	<tbody>
		<tr><td><input type="text" id="tb1" name="itm_details[]" value=""></td>
<td><input type="text" id="tb1"  name="exp_co[]" value=""></td>
<td><input type="text"  id="tb1" name="loc[]" value=""></td>
<td><input type="text" id="tb1" name="chk_pt[]" value=""></td>




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
		$("#customFields").append('<tr valign="top"><td><input type="text" id="tb1" name="itm_details[]" value=""></td><td><input type="text" id="tb1" name="exp_co[]" value=""></td><td><input type="text"  id="tb1" name="loc[]" value=""></td><td><input type="text" id="tb1" name="chk_pt[]" value=""></td><td><a href="javascript:void(0);" class="remCF">Remove</a></td></tr>');
	});
    $("#customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
</script>
</html>
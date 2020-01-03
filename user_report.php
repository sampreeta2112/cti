<?php
include('dynamic.php');

$disp_url = "user_report.php";
$export_url = "project_inv_exp.php";


$cond="";

$url_str="";

$txtproject_nm=GetSingleValue("select name from user_table where user_id=$sess_user_id");
if(isset($_GET["from"])) $txtfrom = $_GET["from"];
elseif(isset($_POST["txtfrom"])) $txtfrom = $_POST["txtfrom"];
else $txtfrom = Changedateformat(LASTMONTH_YMD);

if(isset($_GET["to"])) $txtto = $_GET["to"];
elseif(isset($_POST["txtto"])) $txtto = $_POST["txtto"];
else $txtto = Changedateformat(LASTDATE_YMD);


if($txtfrom!='')
{
     $txtfrom=Changedateformat($txtfrom);
     $cond.=" AND DATE_FORMAT(a.log_time, '%Y-%m-%d') >= '$txtfrom'";
    
	 $flag = true;
	  $txtfrom=Changedateformat($txtfrom);
	 $url_str.="&from=$txtfrom";
}

if($txtto!='')
{
     $txtto= Changedateformat($txtto); 
     $cond.=" AND DATE_FORMAT(a.log_time, '%Y-%m-%d') <= '$txtto'";
   
	 $flag = true;	 
     $txtto= Changedateformat($txtto); 
	 $url_str.="&to=$txtto";
}

$_SESSION[SES_ADMIN]->project_sts_rep_url_str=$url_str;
$_SESSION[SES_ADMIN]->project_sts_rep_cond=$cond;

$page = 1;
if((isset($_GET['page']))) 
{
	$page =$_GET['page'];
	$start = ($page - 1) * PAGE_LIMIT; 		//first item to display on this page
	
}
else
	$start = 0;	

if($cond!='')
{
	//$count=GetSingleValue("select count(*) from daily_status  where 1 $cond");
	$pagination=""; //GetPagination($page,$count,$disp_url,$url_str);
}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html lang="en">
<head>
<?php include('_header.php'); ?>
  <script src="../js1.3/script.js"></script>
  <script src="../js1.3/autocomplete_operator.js"></script>
  <script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
	  
		$( ".datepicker" ).datepicker({
			dateFormat:"dd-mm-yy",
			onSelect:function(){
				txtfrom=$("#txtfrom").datepicker('getDate');
				txtto=$("#txtto").datepicker('getDate');
				flag=0;
				disp_msg='';
				console.log(txtfrom+"=>"+txtto);
				if(txtfrom>txtto) { flag=1; disp_msg+="date ";}
				 if(flag==1)
				 {
					 //console.log(flag);
					 disp_msg=disp_msg.split(" ");
					 alert("Please enter proper range for "+disp_msg);
					 $("#btn_submit").addClass("disable_elements");
				 }
				 else
				 {
					 $("#btn_submit").removeClass("disable_elements");
				 }
			}
		});
		
		
		
  });
  
  
	</script>	

		<?php include('_menu.php');?>

	
		 <div id="row_wrap">
			<div class="col-sm-12" id="outer">
				<div class="row">
				<div class="col-sm-11" id="searchbox">
                <form method="post" name="frm_search" action="<?php echo $disp_url?>">
                <label for="txtname">Operater :</label>
                <input type="text" readonly name="txtproject_nm" id="txtproject_nm" value="<?php echo $txtproject_nm;?>" required>
				<input type="hidden" id="txtproject_id" name="txtproject_id" value="<?php echo $txtproject_id ?>"/>
                 &nbsp;&nbsp;
				 <label>From:</label>
				<input type="text" class="datepicker" id="txtfrom" name="txtfrom" value="<?php echo $txtfrom?>"/>
                 &nbsp;&nbsp;
				 <label>To:</label>
				<input type="text" class="datepicker" id="txtto" name="txtto" value="<?php echo $txtto?>"/>
                 &nbsp;&nbsp;&nbsp;
				 
				&nbsp;&nbsp;&nbsp;
           
                &nbsp;
				<div id="div-right" style = "padding-right:3%">
                <input type="submit" name="btn_submit" id="btn_submit" value="Search">
				<input type="button" name="btn_reset" value="Reset" onClick="window.location.assign('<?php echo $disp_url ?>')">
				</div>
                </form>
                </div>
				</div>
				
				<div class="row">
					<div class="col-sm-11" style="overflow-y:scroll;height:400px;">
					  <h3>Performance Report of[Operater: "<?php echo $txtproject_nm ?>" <span>][From: <?php echo $txtfrom ?> To: <?php echo $txtto ?>]</span></h3>
					  
						<table width="100%" align="center" border="0" cellspacing="1" cellpadding="1" class="tbl-cont" >
						  <thead>
							<tr>
							  <th width="5%">Sr.no</th>
							  <th >User Name</th>
							  <th width="15%">Files</th>
							  <th width="15%">Attachments</th>
							 
							</tr>
						  </thead>
						  <tbody>
						  
						  <?php
							$q = "create view userreport as SELECT a.file_id, a.user_id, b.name, COALESCE(COUNT(c.att_id), 0) AS attachments, DATE_FORMAT(a.log_time, '%Y-%m-%d') AS upload_date FROM user_table b INNER JOIN log_table a ON a.user_id = b.user_id INNER JOIN attachments c ON a.file_id = c.file_id WHERE 1 and log_type='INSERT' $cond AND a.user_id='$sess_user_id' GROUP BY a.file_id";
							 $q;
							$r = RunQry($q);
							$reportq="SELECT COALESCE(COUNT(user_id),0) as files,COALESCE(sum(attachments),0) as attachments,upload_date FROM userreport where user_id in (SELECT DISTINCT user_id from userreport) GROUP by upload_date";
							$rp=mysqli_query($link,$reportq);
							
							$numrow = mysqli_num_rows($rp);
							$i1 = 1;
							if($numrow)
							{	
								for($i=1; $o = mysqli_fetch_object($rp); $i++) 
								{	
								//print_r($o);	
									$x_file_id = $o->files;
								
									
									$x_upload_date = Changedateformat($o->upload_date);
									
									$x_attachments = $o->attachments;

									
						?>
									<tr>
									  <td><?php echo $i; ?></td>
									   <td><?php echo $x_upload_date; ?></td>
									  <td><?php echo $x_file_id; ?></td>
									 
									 
									  <td><?php echo $x_attachments; ?></td>
									 
									</tr>
									<?php
								}
							}
							mysqli_query($link,"drop view userreport");
							?>
						  </tbody>
						</table>
					  
					  
					</div>
				</div>

    
    
	</div>
  </div>
  </div>
  </div>
  
  
 <?php include('_footer.php'); ?>
  

  
</div>


</body>
</html>
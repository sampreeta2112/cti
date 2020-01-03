<?php
include('dynamic.php');

$disp_url = "view_files.php";
$edit_url = "DE_home.php";


$cond="";
$url_str="";

if(isset($_GET["file_no"])) $file_no = $_GET["file_no"];
elseif(isset($_POST["file_no"])) $file_no = $_POST["file_no"];
else $file_no = '';

if(isset($_GET["file_name"])) $file_name = $_GET["file_name"];
elseif(isset($_POST["file_name"])) $file_name = $_POST["file_name"];
else $file_name = '';

if(isset($_GET["file_desc"])) $file_desc = $_GET["file_desc"];
elseif(isset($_POST["file_desc"])) $file_desc = $_POST["file_desc"];
else $file_desc = '';

if(isset($_GET["inward_date"])) $inward_date = $_GET["inward_date"];
elseif(isset($_POST["inward_date"])) $inward_date = $_POST["inward_date"];
else $inward_date = '';

if(isset($_GET["closed_date"])) $closed_date = $_GET["closed_date"];
elseif(isset($_POST["closed_date"])) $closed_date = $_POST["closed_date"];
else $closed_date = '';



if($file_no!='')
{
	$url_str.="&file_no=$file_no";
    $cond.=" and file_no like '%$file_no%' ";
	$flag = true;
}

if($file_name!='')
{
	$url_str.="&file_name=$file_name";
    $cond.=" and file_name like '%$file_name%' ";
	$flag = true;
}

if($file_desc!='')
{
	$url_str.="&file_desc=$file_desc";
    $cond.=" and file_description like '%$file_desc%' ";
	$flag = true;
}

if($inward_date!='')
{
	$url_str.="&inward_date=$inward_date";
    $cond.=" and inward_date like '%$inward_date%' ";
	$flag = true;
}
if($closed_date!='')
{
	$url_str.="&closed_date=$closed_date";
    $cond.=" and closed_date like '%$closed_date%' ";
	$flag = true;
}


$_SESSION[SES_ADMIN]->inv_url_str=$url_str;
$_SESSION[SES_ADMIN]->inv_cond=$cond;

$page = 1;
if((isset($_GET['page']))) 
{
	$page =$_GET['page'];
	$start = ($page - 1) * PAGE_LIMIT; 		//first item to display on this page
	
}
else
	$start = 0;	

//if($cond!='')
{
	$count=GetSingleValue("select count(*) from file_records  where 1 $cond");
	$pagination=GetPagination($page,$count,$disp_url,$url_str);
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

  <script type="text/javascript">
	
  
  
 
	</script>

		<?php include('_menu.php');?>

	
		 <div id="row_wrap">
			<div class="col-sm-12" id="outer">
				<div class="row">
				<div class="col-sm-11" id="searchbox">
                <form method="post" name="frm_search" action="<?php echo $disp_url?>">
              
					
						<label>Meeting No.</label>
						<input type="text"  id="para1" name="file_no" value="<?php echo$file_no; ?>" placeholder="Meeting No."  />
					
						<label>Meeting Date.</label>
						<input type="text"  id="para2" name="file_name" value="<?php echo$file_name; ?>" placeholder="Meeting Date."  />
						<label> Name </label>
						<input type="text"  id="para4" name="inward_date" value="<?php echo$inward_date; ?>" placeholder="Name"  />
						<!--label>Parameter 3:</label>
						<input type="text"  id="para3" name="file_desc" value="<?php echo$file_desc; ?>" placeholder="parameter 3"  />
						
						
						
					
				
			
				
						
					
						<label>Parameter 5.:</label>
						<input type="text"  id="para5" name="closed_date" value="<?php echo$closed_date; ?>" placeholder="Parameter 5"  /-->
					
				
			  &nbsp;&nbsp;&nbsp;
           
                &nbsp;
				<div id="div-right" style = "padding-right:3%">
                <input type="submit" name="btn_submit" id="btn_submit" value="Search">
				<input type="button" name="btn_reset" value="Reset" onClick="window.location.assign('<?php echo $disp_url ?>')">
				</div>
                </form>
                </div>
				</div>
				<?php
					$q = "";
					if($cond!='')
					{
						$q = "select * from file_records  where 1 $cond order by file_timestamp desc LIMIT $start, ".PAGE_LIMIT;
					
					?>
					<div class="row">
					<div class="col-sm-11 list_div">
						<br>
					  <!--h3>Add File <a href="<?php echo $edit_url ?>"><?php echo IMG_ADD ?></a> </h3-->
					  
						<table width="100%" align="center" border="0" cellspacing="1" cellpadding="1" class="tbl-cont" >
						  <thead>
							<tr>
							  <th width="5%" align="center">Sr.no</th>
							  <th width="10%" align="center">CA No.</th>
							  <th width="12%" align="center">Installation Date</th>
							  <th width="17%">Name</th>
							  <!--th width="12%">Parameter 3</th>
							  
							  <th width="18%">Parameter 5</th>
							  
							  <th>TimeStamp</th-->
							 
							  <!--th width="5%">View</th-->
							  <th width="5%">pdf</th>
							  </th>
							</tr>
						  </thead>
						  <tbody>
							<?php
					$q = "";
					if($cond!='')
					{
						$q = "select * from file_records  where 1 $cond order by file_timestamp desc LIMIT $start, ".PAGE_LIMIT;
					}
					//echo $q;
					$r = RunQry($q);
					$numrow = mysqli_num_rows($r);
					$i = 1;
					if($numrow)
					{	
						for($i=1; $o = mysqli_fetch_object($r); $i++) 
						{		
							$file_id=$o->file_id;
							$file_no = $o->file_no;
							$file_name = $o->file_name;
							$file_description = $o->file_description;
							$inward_date = $o->inward_date;
							
							$closed_date = $o->closed_date;
							
							$file_timestamp=$o->file_timestamp;
							
				?>
							<tr>
								<td align="center"><?php echo $i; ?></td>

							 <td align="center"><?php echo $file_no;?></td>
							 <td align="center"><?php echo $file_name;?></td>
							 <td><?php echo $inward_date;?></td>
							 <!--td><?php echo $file_description;?></td>
							  
							   <td><?php echo $closed_date;?></td>
							    
							      <td><?php echo $file_timestamp;?></td-->
							      <!--td><?php echo"<a href='update_file_details.php?id=$file_id'>". IMG_VIEW."</a>";?></td-->
							       <td align="center"><?php echo"<a target ='_blank' 
							       href='../pdf_output/".$file_id."_CA_no_".$file_no."_".$inward_date."_dated_".$file_name.".pdf'>". IMG_PRINT."</a>";?></td>
							</tr>
							<?php
								
						}
						echo '<input type="hidden" id="count" value="'.$i.'"/>';
					}
					
					else
						echo "<tr><td colspan='4'> No record found...</td></tr>";
				?>
						  </tbody>
						</table>
					  <div align="right"><?php echo $pagination;?></div>
					  
					</div>
				</div>
<?php } 
else
{


?>
<center><span style="font-size: 72px;">Welcome to </span></center>
<img src="../img/test-gov.png" width="1150px">
    <?php
    }
    ?>
    
	</div>
  </div>
  </div>
  </div>
  
  
 <?php include('_footer.php'); ?>
  
</div>


</body>
</html>
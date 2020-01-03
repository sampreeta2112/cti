<?php
include('dynamic.php');

$disp_url = "add_files.php";
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
<script src="../js1.3/static_filter.js"></script>
  <link rel="stylesheet" href="../css1.3/static_filter.css">
  <script type="text/javascript">
	
  $(document).ready(function(){
  	$(".quick_save").click(function(){
  		var id=$(this).attr('id');
  		var file_name=$("#file_name_"+id).val();
  		var param1=$("#param1_"+id).val();
  		var param2=$("#param2_"+id).val();
  		var param3=$("#param3_"+id).val();
  		var senddata="file_name="+file_name+"&param1="+param1+"&param2="+param2+"&param3="+param3;
  		$.ajax({
  			method:"POST",
  			url:"save_file.php",
  			data:senddata,
  			success:function(data)
  			{
  				$('#'+id).removeClass("btn-warning");
  				$('#'+id).addClass("btn-success");
  			}

  		})
  	});
  });
  
 
	</script>

		<?php include('_menu.php');?>

	
		 <div id="row_wrap">
			<div class="col-sm-12" id="outer">
			
				
				<div class="row">
					<div class="col-sm-11 list_div">
					
					  <form method="POST" action='save_files.php'>
					  	
					  	<div class="panel">
					<div class="panel-heading">
					   <h3>Update Files Info  </h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter by File Name" />
					</div>
						<table width="100%" align="center" border="0" cellspacing="1" cellpadding="1" class="tbl-cont" id="dev-table" >
						  <thead>
							<tr>
								<th width="5%">Sr.no</th>
								<th>File Name</th>
							  
							  <th width="10%">CA No.</th>
							  <th width="12%">Installation Date.</th>
							 <th width="12%">Name</th>
							  <th>Action</th>
							 
							 
							 
							  
							</tr>
						  </thead>
						  <tbody>
						  	<?php
						  	$pdf_location="../pdf_output";
						  	$files = glob(''.$pdf_location.'/*.{pdf}', GLOB_BRACE);
						  	$count=count($files);
						  	$page;
							$pagination=GetPagination($page,$count,$disp_url,$url_str);
						  	$files = array_slice( $files, $start, PAGE_LIMIT );
						  //	print_r($files);
						  	//scandir($pdf_location);
						  	$i=1;
						  	foreach ($files as  $value) {
						  		$val=end(explode("/", $value));
						  		 if(strtoupper(pathinfo($value,PATHINFO_EXTENSION))=="PDF")
						  		 {
						  		 	$qry="select * from files where file_name='$val'";
						  		 	$res=RunQry($qry);
						  		 	$count=mysqli_num_rows($res);
						  		 	$o = mysqli_fetch_object($res);

						  		 	$param1=$o->param1;
									$param2 = $o->param2;
									$param3 = $o->param3;
						  		 	echo"<tr>
						  		 	<td>$i</td>
						  		 	<td class='emp_name'><a target='_blank' href='$pdf_location/$value'>$val</a>
						  		 		<input type='hidden' name='file_name[]' id='file_name_$i' value='$val'>
						  		 	</td>
									<td ><input type='text' name='param1[]' id='param1_$i' value='$param1'></td>
									<td ><input type='text' name='param2[]' id='param2_$i' value='$param2'></td>
									<td ><input type='text' name='param3[]' id='param3_$i' value='$param3'></td>
									<td><button type='button' id='$i' style='margin-left:0% !important;'class='quick_save btn ";
									if($count!='0')
										{
											echo"btn-success";
										}
										else
											{
											echo"btn-warning";
											}

									echo"'>Save</button></td>
									
						  		 	</tr>";
						  		 	$i++;
						  		 }
						  		
						  	}
						  	
						  	?>
							
							
							<?php
								
						
						
				?>
						  </tbody>
						  <tfoot >
						  	<tr>
						  		<td valign="bottom" >
						  			
						  		</td>
						  		<td></td>
						  		<td><center><button class="btn btn-info" >
						  		Save
						  	</button></center></td>
						  		<td><button class="btn btn-info" >
						  		Cancel
						  	</button></td>
						  		<td></td>
						  		<td></td>

						  	</tr>
						  	
						  </tfoot>
						</table>
					</form>
					   <div align="right"><?php echo $pagination;?></div>
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
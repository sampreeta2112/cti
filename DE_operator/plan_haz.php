


<?php
include('dynamic.php');

$disp_url = "plan_haz.php";
$edit_url = "add_plan.php";


$cond="";
$url_str="";

if(isset($_GET["file_no"])) $file_no = $_GET["file_no"];
elseif(isset($_POST["file_no"])) $file_no = $_POST["file_no"];
else $file_no = '';

if(isset($_GET["itm_details"])) $file_name = $_GET["file_name"];
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	#textbox{
		width: 140px;
	}
</style>
<style>
      .rotate_text
      {
         -moz-transform:rotate(-90deg); 
         -moz-transform-origin: top left;
         -webkit-transform: rotate(-90deg);
         -webkit-transform-origin: top left;
         -o-transform: rotate(-90deg);
         -o-transform-origin:  top left;
          position:relative;
         top:20px;
      }
   </style>
<!--<![endif]-->

   <style>  
      table
      {
         border: 1px solid black;
         table-layout:fixed;
        /*Table width must be set or it wont resize the cells*/
      }
      th, td
      {
      
          border: 1px solid black;
         
      }
      #tb{
      	width: 28px;
      }
      #tb1{
      	width: 70px;
      }

      #tb2{
      	width: 40px;
      }
      .rotated_cell
      {
      	width:100px;
         height:100px;
         vertical-align:bottom
      }
   </style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<?php include('_header.php'); ?>
  <script src="../js1.3/script.js"></script>

  <script type="text/javascript">
	
  
  
 
	</script>


		<?php include('_menu.php');?>

	
		 <div id="row_wrap" >
			<div class="col-sm-12" id="outer">
				
				<div class="col-sm-6" id="searchbox" style="width: 900px;">
                <form method="post" name="frm_search" action="<?php echo $disp_url?>">
              	<label>Ship Name:</label>  CC BUTTERFLY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"   name="v_name" style="width: 120px;" value="<?php echo$v_name; ?>" placeholder="">&nbsp;&nbsp;&nbsp;
							<label >Fleet:</label>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"   name="file_no" style="width: 120px;" value="<?php echo$file_no; ?>" placeholder="">&nbsp;&nbsp;&nbsp;
							<label for="txtname">Flag:</label> GERMANY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"  style="width: 110px;"  name="file_no"  value="<?php echo$file_no; ?>" placeholder="">
							<label for="txtname">IMO No:</label> 9365790 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="hidden"  style="width: 110px;"  name="file_no"  value="<?php echo$file_no; ?>" placeholder=""><br><br>
					<label>Date </label>&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="date"  id="date" name="survey_date" value="<?php echo$survey_date; ?>" placeholder="" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
         <label>ITEM DETAILS</label>
						<input type="text"  id="textbox" name="itm_details" value="<?php echo$itm_details; ?>" placeholder="">
							<label >CHECK POINT</label>
						<input type="text"  id="textbox" name="chk_pt" value="<?php echo$chk_pt; ?>" placeholder="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
              
    	<label for="txtname">EXPERT COMPANY </label>
	<input type="text"  id="textbox" name="exp_co" value="<?php echo$exp_co; ?>" placeholder="">
<label for="txtname">LOCATION </label>
	<input type="text"  id="textbox" name="loc" value="<?php echo$loc; ?>" placeholder="">
	
	
<tr>
<td><button type="submit" style="margin-left:40%;float: left; margin-top:10px;" class="btn btn-info btn-md">Search</button></td>
<td><button  style="margin-left:2%;float: left;margin-top:10px;" class="btn btn-info btn-md">Reset</button></td>
</tr>
	<br><br>
					
			
				
                </form>
           
               
				</div>
					
			
				<div class="row">
					<div class="col-sm-11 list_div" style="margin-left: -40px">
					  <h3>Add Plan <a href="<?php echo $edit_url ?>"><?php echo IMG_ADD ?></a>  </h3>
				<span style="float:right"><button name="create_excel" id="create_excel" class="btn btn-success">Create Excel File</button> </span>	 

       
					<div id="employee_table">
					
						<table   width="100%" align="center" border="0" cellspacing="1" cellpadding="1" class="tbl-cont" >
						  
							<tr>
							
				
							
							<td >
            <div >NO</div>
         </td>

							<td >
            <div >Items Details</div>
         </td><td >
            <div >Expert&nbsp;CO</div>
         </td><td >
            <div >Location</div>
         </td><td  >
            <div >Check&nbsp;point</div>


         </td>
         <td >
            <div  >Date</div>
            

         </td>
           <td >
            <div  >Edit</div>
            

         </td>
				
				  <td >
            <div  >Delete</div>
            

         </td>
				
							</tr>


							
						 
							<?php
						
											
					$cond1 =  $_POST['exp_co'];
					$cond2 =  $_POST['itm_details'];
					$cond3= $_POST['chk_pt'];
					$cond4= $_POST['loc'];
					$cond5= $_POST['date'];
					//$cond3= $_POST['asbestos'];
					
					


							$q = "";
						if($cond1!='' or $cond2!='' or $cond3!='' or $cond4!='')
							{
					 
					
								
								$q = " select * from plan_haz  where exp_co='$cond1' or itm_details='$cond2' or chk_pt='$cond3' or loc= '$cond4' or date='$cond5' "; 
							}
							
							else
							{
								$q = "select * from plan_haz  where 1";
							}
							//echo $q;
							$r = RunQry($q);
							$numrow = mysqli_num_rows($r);
							$i = 1;
								if($numrow)
								{	
									for($i=1;$o=mysqli_fetch_object($r);$i++) 
									{		
										
										
										$p_id=$o->p_id;
										
										
	$itm_details=$o->itm_details;
	$exp_co=$o->exp_co;
	
	$loc=$o->loc;
	$chk_pt=$o->chk_pt;
	$date=$o->date;

	
										
						?>
							<tr>
									
								<td><?php echo $i; ?></td>
								<td><?php echo $itm_details;?></td></td>
								
								<td><?php echo $exp_co;?></td></td>
								<td><?php echo $loc;?></td></td>
								
								<td><?php echo $chk_pt;?></td></td>
								<td><?php echo $date;?></td>
								
								
							
								 <td><a  href="<?php echo $edit_url; ?>?mode=E&id=<?php echo $p_id; ?>" title="Delete"><i class="fa fa-edit" style="font-size:27px;color:#ff4d4d"></i></td>
								<td><CENTER><a onClick="return confirm('Are you sure you want to delete?')" href="<?php echo $edit_url; ?>?mode=D&id=<?php echo $p_id; ?>" title="Delete"><i class="material-icons md-48" style="font-size: 27px;color: #ff4d4d;">delete</i></a></CENTER></td> 		
							</tr>
						
						
							<?php
								
						}
						echo '<input type="hidden" id="count" value="'.$i.'"/>';
					}
					else
						echo "<tr><td colspan='5'> No record found...</td></tr>";
				?>
						 
						</table>
					</div>
				</div>
					
				</div>

    
    
	</div>
  </div>
  </div>
  </div>
  
  
 <?php include('_footer.php'); ?>
  
</div>

<script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#employee_table').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script>  
</body>
</html>
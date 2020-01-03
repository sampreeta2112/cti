


<?php
include('dynamic.php');

$disp_url = "view_files1.php";
$edit_url = "DE_home.php";


$cond="";
$url_str="";

/*if(isset($_GET["file_no"])) $file_no = $_GET["file_no"];
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
else $closed_date = '';*/
/*if(isset($_GET["report_no"])) $closed_date = $_GET["report_no"];
elseif(isset($_POST["report_no"])) $closed_date = $_POST["report_no"];
else $report_no = '';


/*if($file_no!='')
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
}*/

/*if($report_no!='')
{
	$url_str.="&report_no=$report_no";
    $cond.=" and report_no like '%$report_no%' ";
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
//{
	//$count=GetSingleValue("select count(*) from file_records  where 1 $cond");
	//$pagination=GetPagination($page,$count,$disp_url,$url_str);
//}*/

	

/*if(isset($_POST['frm_search']))
{
    $report_no = $_POST['report_no'];
    // search in all table columns
    // using concat mysql function
    $cond = "SELECT * FROM `file_records` WHERE 'report_no' LIKE '%".$report_no."%'";
    $search_result = RunQry($q, $err_code='ERR');
    
}
 //else {
   // $cond = "SELECT * FROM `file_records`";
  // $search_result = RunQry($q, $err_code='ERR');
//}*/






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

</head>
<?php include('_header.php'); ?>
  <script src="../js1.3/script.js"></script>

  <script type="text/javascript">
	
  
  
 
	</script>


		<?php include('_menu.php');?>

	
		 <div id="row_wrap" >
			<div class="col-sm-12" id="outer">
				
				<div class="col-sm-6" id="searchbox" style="width: 900px;">
                <form method="post" name="frm_search" action="">
              	
					
         <label>Ship Name: CC BUTTERFLY</label>
						<input type="hidden"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label >Fleet: 1</label>
						<input type="hidden"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							 <label for="txtname">Flag: </label>GERMANY&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              
    	<label for="txtname">IMO NO: </label>9365790
	
	<br><br>
					
			<label>Report No</label>&nbsp;&nbsp;
								<input type="text"  id="textbox" name="report_no" value="<?php echo $report_no; ?>" placeholder="">
								<input type="submit" style="margin-left:40%;float: left;" class="btn btn-info btn-md" name="" value="Search">
				
                </form>
           
               
				</div>
					
			
				<div class="row">
					<div class="col-sm-11 list_div" style="margin-left: -40px">
					  <h3>Add Record <a href="<?php echo $edit_url ?>"><?php echo IMG_ADD ?></a>
					 

         </h3>
					  <div>
						<table width="100%" align="center" border="0" cellspacing="1" cellpadding="1" class="tbl-cont" >
						  <thead>
							<tr>
							
				
							
							<td class='rotated_cell' id="tb">
            <div class='rotate_text' >NO</div>
         </td>

							<td class='rotated_cell'>
            <div class=''>Survey&nbsp;Date</div>
         </td><td class='rotated_cell' id="tb1">
            <div class='rotate_text'>Expert&nbsp;CO</div>
         </td><td class='rotated_cell'>
            <div class='rotate_text'>Location</div>
         </td><td class='rotated_cell' >
            <div class=''>Removed&nbsp;Date</div>
         </td><td class='rotated_cell' id="tb1">
            <div class='rotate_text'>Removal &nbsp;company</div>
         </td>
         <td class='rotated_cell'>
            <div class=''>Items&nbsp;Details</div>
         </td><td class='rotated_cell'>
            <div class=''>Remarks</div>
         </td><td class='rotated_cell'>
            <div class=''>Report&nbsp;No</div>
         </td><td class='rotated_cell' id="tb1">
            <div class='rotate_text' >Check&nbsp;point</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text' >Asbestors</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>PCB</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>ODS</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>AntiFouling</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>Cd</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>PFOs</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>Cr6+</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>Pb</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>Hg</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>PBBS</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>PBCEDEs</div>
         </td>
         <td class='rotated_cell' id="tb">
            <div class='rotate_text' >PCNs</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>Radioactive</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text'>Sccps</div>
         </td><td class='rotated_cell' id="tb">
            <div class='rotate_text' >HBCCD</div>
							</tr>
						  </thead>
						  <tbody>
						  	<?php
						  	$q = "";
					if($cond!='')
					{
						$q = "select * from file_records  where 1 $cond" ;
					}
					$r = RunQry($q);
					$numrow = mysqli_num_rows($r);
					$i = 1;
					if($numrow)
					{	
						for($i=1; $o = mysqli_fetch_object($r); $i++) 
						{
								
										$file_id=$o->file_id;	
										$survey_date=$o->survey_date;
										$expert_co=$o->expert_co;
										$removed_date=$o->removed_date;
										$removed_comp=$o->removed_comp;
										$location=$o->location;
										$ods=$o->ods;
										$s_location=$o->s_location;
										$items_detail=$o->items_detail;
										$remark=$o->remarks;
										$report_no=$o->report_no;
										$check_pt=$o->check_pt;
										$asbestos=$o->asbestos;
										$pcb=$o->pcb;
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
										
								?>	
								<?php while($o = mysqli_fetch_array($search_result)):?>
							<tr>
								
								<td><?php echo $i; ?></td>
								<td><?php echo $survey_date;?>
								<td><?php echo $expert_co;?></td>
								<td><?php echo $location;?></td>
								<td><?php echo $removed_date;?></td>
								<td><?php echo $removed_comp;?></td>
							<!-- 	<td><?php //echo $s_location;?></td> -->
								<td><?php echo $items_detail;?></td>
								<td><?php echo $remark;?></td>
								<td><?php echo $report_no;?></td>
								<td><?php echo $check_pt;?></td>
								
								<td><?php echo $asbestos;?></td>
								<td><?php echo $pcb;?></td>
								<td><?php echo $ods;?></td>
								<td><?php echo $anti_fouling;?></td>
								
								<td><?php echo $cd;?></td>
								<td><?php echo $pfos;?></td>
								<td><?php echo $cr6;?></td>
								<td><?php echo $pb;?></td>
								<td><?php echo $hg;?></td>
								<td><?php echo $pbbs;?></td>
								<td><?php echo $pbedes;?></td>
								<td><?php echo $pcns;?></td>
								<td><?php echo $radioactive;?></td>
								<td><?php echo $sccps;?></td>
								<td><?php echo $hbccd;?></td>
		 
							      
							</tr>
							<?php endwhile;?>
							
								
						<?php
								
						}
						echo '<input type="hidden" id="count" value="'.$i.'"/>';
					}
					else
						echo "<tr><td colspan='9'> No record found...</td></tr>";
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
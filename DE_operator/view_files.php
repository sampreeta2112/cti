
<?php
include('dynamic.php');

$disp_url = "view_files.php";
$edit_url = "DE_home.php";


$cond="";
$url_str="";

if(isset($_GET["survey_date"])) $file_no = $_GET["survey_date"];
elseif(isset($_POST["survey_date"])) $file_no = $_POST["survey_date"];
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


if(isset($_GET["Asbestos"]))
{
	$cond .= "asbestos != ''";
}
if(isset($_GET["PCB"]))
{
	$cond .= "pcb != ''";
}
if(isset($_GET["ODS"]))
{
	$cond .= "ods != ''";
}
if(isset($_GET["Hg"]))
{
	$cond .= "Hg != ''";
}
if(isset($_GET["Anti_Fouling"]))
{
	$cond .= "anti_fouling != ''";
}
if(isset($_GET["PFOs"]))
{
	$cond .= "pfos != ''";
}
if(isset($_GET["Cd"]))
{
	$cond .= "cd != ''";
}
if(isset($_GET["PBBS"]))
{
	$cond .= "pbbs != ''";
}
if(isset($_GET["Sccps"]))
{
	$cond .= "sccps != ''";
}
if(isset($_GET["Cr6"]))
{
	$cond .= "cr6 != ''";
}
if(isset($_GET["Pb"]))
{
	$cond .= "pb != ''";
}
if(isset($_GET["PBCEDEs"]))
{
	$cond .= "pbedes != ''";
}
if(isset($_GET["PCNs"]))
{
	$cond .= "pcns != ''";
}
if(isset($_GET["HBCCD"]))
{
	$cond .= "hbccd != ''";
}
if(isset($_GET["Radioactive"]))
{
	$cond .= "radioactive != ''";
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

//echo $cond;exit;

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
	#left {
            margin-left: 58px;
        }
       
        #textbox1{
		
		margin-left: 20px;
	}
	#top{
	    margin-top:10px;
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
      	width: 53px;
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

	
<div id="row_wrap"  >
	<div class="col-sm-12" id="outer" >
				<div class="row">
		<div class="col-sm-6" id="searchbox" style="margin-right: 90px; width: 650px; ">

            <form method="post" name="frm_search" action="<?php echo $disp_url?>">
              	<div style="height:250px;">
					<label >SHOW ALL </label>
						<input type="checkbox"  id="para1" name="file_no" value="<?php echo$file_no; ?>" placeholder=""> 
           					<br>
           				
        				 	<label id="top">Ship Name: </label> CC BUTTERFLY
							<input type="hidden"  id="textbox" style="margin-top: 10px;" name="file_no" value="<?php echo$file_no; ?>" placeholder="">
							<label id="textbox1"  >Fleet: </label> 1
							<input type="hidden"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder="">
							<label id="textbox1" >Flag: </label>GERMANY
	<label id="textbox1" >IMO NO: </label>9365790<br>
	
	
					

		
						
								<label id="top">Survey Date&nbsp;&nbsp; From:</label>	<input type="date"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder="">
								<label id="textbox1">	To:</label>
								<input type="date"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder=""><br>
								<label id="top">Items Details</label>&nbsp;&nbsp;
								<input type="text"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label>Report No</label>&nbsp;&nbsp;
								<input type="text"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder=""><br>
								<label id="top">Check Point</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label>Expert CO</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder=""><br>
								<label id="top">Location</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="text"  id="textbox" name="file_no" value="<?php echo$file_no; ?>" placeholder=""><br>
						
				</div>
			</div>

		<!-- 	<div class="col-sm-4" id="" style="width: 450px; height: 120px;">
				
					Select All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""><br>
				 	Asbestos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					PCB  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					ODS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						Hg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> <br>  
					Anti Fouling&nbsp;<input type="radio" name="" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					PFOs &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Cd &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value="">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						PBBS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> <br> 
					Sccps&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
					Cr6+&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				  	Pb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  		PBCEDEs&nbsp;<input type="radio" name="" value=""><br>
				  
				  
				    
				  	PCNs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  	 
				  	HBCCD&nbsp;&nbsp;<input type="radio" name="" value=""> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  	Radioactive&nbsp;<input type="radio" name="" value=""> <br> 
				

				</div> -->
	  	
<div class="col-sm-4" id="" style="width: 470px; height: 300px;">

	  	   <div class="col-sm-9" id="" style="width: 450px; height: 120px; margin-top: 10px;">
  <input type="checkbox" name="items" id="selectitem" value="" onclick="checkAll();"> Select All <br>
    <input type="checkbox" name="items" value="Asbestos" class="first">Asbestos
    <input type="checkbox" name="items"  id="left"  value="PCB" class="first">PCB
    <input type="checkbox" name="items"  id="left"  value="ODS" class="first">ODS 
  <input type="checkbox" name="items"   id="left"  value="Hg" class="first"> Hg <br>  
  <input type="checkbox" name="items" value="Anti_Fouling" class="first" > Anti Fouling
   <input type="checkbox" name="items" value="PFOs" class="first" style="margin-left: 35px;"> PFOs
  <input type="checkbox" name="items" value="Cd" class="first" style="margin-left: 48px;">  Cd 
   <input type="checkbox" name="items" value="PBBS" class="first" style="margin-left: 67px;">PBBS <br> 
  <input type="checkbox" name="items" value="Sccps" class="first" > Sccps
   <input type="checkbox" name="items" value="Cr6+" class="first" style="margin-left: 75px;" > Cr6+
  <input type="checkbox" name="items" value="Pb" class="first" style="margin-left: 52px;" >  Pb
  <input type="checkbox" name="items" value="PBCEDEs" class="first" style="margin-left: 65px;"> PBCEDEs<br>
  <input type="checkbox" name="items" value="PCNs" class="first">PCNs
  <input type="checkbox" name="items" value="HBCCD" class="first" style="margin-left: 80px;"> HBCCD
   <input type="checkbox" name="items" value="Radioactive" class="first"style="margin-left: 37px;">Radioactive <br> 
   </div>

			<div class="col-sm-9"  style="margin-top: 10px; width: 100px">	
	  		
<table border="0" cellspacing="1" cellpadding="1" width="200">
						  <tr style="margin-top: 20px;">
						    <td class="tbl-cnt1" >Hazmat Survey Done:</td>
						    <td width="50%"><center><b>03</b></center></td>
						  </tr>
						  <tr>
						    <td width="">Cummulative Hazmats Found</td>
						    <td width="40%"><center><b>17</b></center></td>
						  </tr>
						  <tr>
						  	 <td>Cummulative Removed</td>
						    <td width="40%"><center><b>02</b></center></td>
						  </tr>
						  <tr>
						  	 <td>Outstanding Hazmats</td>
						    <td width="30%"><center><b>15</b></center></td>
						  </tr>
						</table>
						</div>
	  		
				
				
	  		</div>
	  		
					
		
				
				
        </form>
           
               
	</div>
	<tr>	
			<td colspan="6"><input type="submit" style="margin-left:40%;float: left;" class="btn btn-info btn-md" name="submit" value="Search" onclick="displayRadioValue()"></td> </tr>
        <tr> <td colspan="6"><input type="submit" style="margin-left:1%;float: left; " class="btn btn-info btn-md" name="submit" value="Reset" onclick="resetForm()"></td> </tr>
</div>
					
			
	<div class="row">
		<div class="col-sm-11 list_div" style="margin-left: -40px;">
		    <h3>Record Details
			<button type="button" class="btn btn-default btn-sm" style="margin-left: 780px;">
          		<span class="glyphicon glyphicon-print"></span> Print
        	</button>
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
            <div class='rotate_text' >Asbestos</div>
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
         </td><td class='rotated_cell' id="tb2"><div class='rotate_text'>Edit</div>
         </td><td class='rotated_cell' id="tb2">
        <div class='rotate_text'>Delete</div>
         </td>
						
							
						</tr>
					</thead>
					<tbody>
						<?php
							$q = "";
						if($cond!='')
							{
								$q = "select * from file_records  where $cond";
							}
							else
							{
								$q = "select * from file_records  where 1";
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
										
										$survey_date=$o->survey_date;
	$expert_co=$o->expert_co;
	$removed_date=$o->removed_date;
	$removed_comp=$o->removed_comp;
	$location=$o->location;
	$s_location=$o->s_location;
	$items_detail=$o->items_detail;
	$remark=$o->remarks;
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
										
						?>
							<tr>
									
								<td><?php echo $i; ?></td>
								<td><?php echo $survey_date;?></td>
								<td><?php echo $expert_co;?></td></td>
								<td><?php echo $location;?></td></td>
								<td><?php echo $removed_date;?></td></td>
								<td><?php echo $removed_comp;?></td></td>
								<td><?php echo $items_detail;?></td></td>
								<td><?php echo $remark;?></td></td>
								<td><?php echo 	$report_no;?></td></td>
								<td><?php echo $check_pt;?></td></td>
								
								
								
								
								
								<td><?php echo $asbestos;?></td></td>
								<td><?php echo $pcb;?></td></td>
								<td><?php echo $ods;?></td></td>
								<td><?php echo $anti_fouling;?></td></td>
								<td><?php echo $cd;?></td></td>
								<td><?php echo $pfos;?></td></td>
								
								<td><?php echo $cr6;?></td></td>
								<td><?php echo $pb;?></td></td>
								<td><?php echo $hg;?></td></td>
								<td><?php echo $pbbs;?></td></td>
								<td><?php echo $pbedes;?></td></td>
								<td><?php echo $pcns;?></td></td>
								<td><?php echo $radioactive;?></td></td>
								<td><?php echo $sccps;?></td></td>
								<td><?php echo $hbccd;?></td></td>
							
								 <td><?php echo"". IMG_EDIT."</a>";?></td>
								<td><CENTER><a href="<?php echo $edit_url; ?>?mode=D&id=<?php echo $x_id; ?>" title="Delete"><?php echo IMG_DELETE;?></a></CENTER></td> 		
							</tr>
						<?php
									
							}
								echo '<input type="hidden" id="count" value="'.$i.'"/>';
							}
							else
								echo "<tr><td colspan='5'> No record found...</td></tr>";
						?>
					</tbody>
				</table>
			</div>
		<div align="right"><?php echo $pagination;?></div>
					  
		</div>
		
	</div>
 <?php include('_footer.php'); ?>
  
</div>


</body>

   <script type="text/javascript">
		var checked=false;
		function checkAll (e) {
		    var aa =  document.getElementsByName("items");
		    checked = document.getElementById('selectitem').checked;
		    for (var i =0; i < aa.length; i++) 
		    {
		        aa[i].checked = checked;
		    }
		 }
      function displayRadioValue() { 
            var ele = document.getElementsByName('items'); 
            var items = [];
            for(i = 0; i < ele.length; i++) { 
                if(ele[i].checked && ele[i].value != '')
                {
                	items.push(ele[i].value);
                } 
            } 
            var url = window.location.href;
            for(var i=0;i<items.length;i++)
            {
            	if (url.indexOf('?') > -1){
				   url += '&'+items[i]+'='+items[i];
				}else{
				   url += '?'+items[i]+'='+items[i];
				}
            }  
		window.location.href = url;
        } 

        function resetForm() {
        	//debugger;
        	var url = window.location.href;
        	if(url.indexOf("?") != -1)
        	{
        		url = url.substring(0 , url.indexOf('?'));
        	window.location.href = url;
        	}
        	
        }

   </script>

</html>
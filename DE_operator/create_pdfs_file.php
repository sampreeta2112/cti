<?php

include('dynamic.php');

$disp_url = "create_pdfs.php";
$edit_url = "create_pdfs.php";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html lang="en">
<head>
<?php include('_header.php'); ?>
  <script src="../js1.3/script.js"></script>
  

  

  <?php include('_menu.php');?>


	<form action="progressbar_files.php" method="post"  enctype="multipart/form-data" >

				<input type="hidden" name="mode" id="mode" value="<?php echo$form_mode;?>">
				<input type="hidden" name="txtid" id="txtid" value="<?php echo$txtid;?>">
		 <div id="row_wrap">
		 <input type="text" name="files" id="files" placeholder="folder name">
			
			
<button type="submit">Process</button>
			

			
			
		</div>  
				
					
					
					
					
					
					

  		</div>
  		
  	</form>
  </div>
  </div>
  
  
 <?php include('_footer.php'); ?>
  

  
</div>


</body>
</html>

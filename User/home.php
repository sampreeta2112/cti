<?php
include('dynamic.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html lang="en">
<head>
<?php include('_header.php'); ?>
  <script src="../js1.3/script.js"></script>
  
  <script language="JavaScript" type="text/javascript">


		</script>
  
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
	//runEffect("#effect","bounce")
});	
</script>
  <?php include('_menu.php');?>


	
		 <div id="row_wrap">
			<div class="col-sm-12 no_border" style="padding-bottom:0%;margin-bottom:0%;">
			<div class="col-sm-6" id="enq_summary" style="height:250px"></div>
			<div class="col-sm-6" id="enq_summary">
			<div class="row">
				<h3>Summary for <?php echo date("M Y") ?></h3>
			</div>
				<div class="row">
					<div class="col-sm-6 error1">
						<h3>Total<br><strong>1<sup>st</sup></strong> <br>Div</h3>
					</div>
					<div class="col-sm-6 success">
						<h3>Total<br><strong>2<sup>nd</sup></strong> <br>Div</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6 warning1">
						<h3>Total<br><strong>3<sup>rd</sup></strong> <br>Div</h3>
					</div>
					<div class="col-sm-6 info">
						<h3>Total<br><strong>4<sup>th</sup></strong> <br>Div</h3>
					</div>
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
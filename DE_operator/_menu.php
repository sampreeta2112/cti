<script type="text/javascript">
	$(document).ready(function(){
        $
        ('.fancybox').fancybox({
             afterClose: function() {
                 //location.reload();
             },
             'width':400,
             'height':350,
             'autoSize' : false
        });
    });
</script>
<?php

if($popup!="Y")
{
	?>
	  <title><?php echo $SITE_TITLE?></title>
	<style>
nav {
  margin-bottom: 20px;
  padding: 24px;
  text-align: center;
  font-family: Raleway;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
}
	 #nav-3 {
  background: #EEA200;
  /* For browsers that do not support gradients */
  background-image: linear-gradient( #ccd9ff 20%,#1a53ff 70%,#0039e6 80%);
}




.link-3 {
  transition: 0.4s;
  color: #ffffff;
  font-size: 16px;
  text-decoration: none;
  padding: 0 10px;
  margin: 0 10px;
}
.link-3:hover {
  background-color: #002080;
  color: #ffffff;
  padding: 24px 10px;
}
</style> 
</head>
<body onLoad="noBack();">
	<nav id="nav-3">
   
    
      
      
		
			<a class="link-3" href="view_files.php"> HOME</a>
		

		
			<a class="link-3" href="view_files1.php">ADD HAZMAT</a>
		
 
			<a  class="link-3" href="plan_haz.php">INSPECTION ROAD MAP</a>
		

                                       
			<a class="link-3" href="test.php">MARK LOCATION</a>
		
		
                                       
			<a class="link-3" href="Help.php">HELP</a>
		
   
    

		
      <a href="#" class="link-3" title="Change Password" data-toggle="modal" data-target="#configModal"><span class="glyphicon glyphicon-cog"></span> CHANGE PASSWORD</a>
	 <a href="logout.php" class="link-3"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>

  
    
  </div>
</nav>

	
	
				
                    
               
				
                
               <!--
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Reports"><i class="glyphicon glyphicon-th-large"></i> &nbsp;Masters <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Masters</li>
					<li><a href="region.php"> Region Master</a></li>
					<li><a href="DE_operater.php"> User Master</a></li>
					<li><a href="client.php"> Client Master</a></li>
					<li><a href="project.php"> Project Master</a></li>
					
                  </ul>
                </li>
               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Reports"><i class="fa fa-table"></i> &nbsp;Reports <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Reports</li>
					<li><a href="#"> User Wise Report</a></li>
					<!--<li><a href="#"> Report-II</a></li>-->
                  
        
	
	<div class="col-sm-10" id="div-2">
  <?php
}
?>
	</body>
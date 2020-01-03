<?php
if($popup!="Y")
{
	?>
	  <title><?php echo $SITE_TITLE?></title>
</head>
<body onLoad="noBack();">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid toggled">
    <div class="navbar-header">
      <div class="logo_holder"><a class="navbar-brand" ><br>Company Logo</a></div>
    </div>
    <ul class="nav navbar-nav">
      <button type="button" class="hamburger is-open" data-toggle="offcanvas">
			<span class="hamb-top"></span>
			<span class="hamb-middle"></span>
			<span class="hamb-bottom"></span>
		</button>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" title="Change Password" data-toggle="modal" data-target="#configModal"><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
	  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

	<div class="container-fluid toggled">
	<div class="row">
	<div class="overlay"></div>
	<div class="col-sm-2" id="div-1">
		<nav class="navbar navbar-default navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
					<div class="form-group" style="text-align:center;">
					<?php 
					if($sess_user_dp=='')
					{
						echo DEFAULT_DP1;
					}
					else
					{
						?>
						<img id="dp_display_main" src="<?php echo $sess_user_dp ?>" style="width:100px;height:100px;">
						<?php
					}
					?>
					
					</div>
                    <a href="#">
                       Hello, <?php echo $sess_full_name ?>
                    </a>
                </li>
               
				<li>
					<a href="view_files.php"><i class="fa fa-tasks"></i> &nbsp;View Files</a>
				</li>
             <!--  <li>
					<a href="user_report.php"><i class="fa fa-tasks"></i>Performance Report</a>
				</li>
                
               
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
                  </ul>
                </li>
            </ul>
        </nav>
	</div>
	
	<div class="col-sm-10" id="div-2">
  <?php
}
?>
	
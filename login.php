<?php
include('includes/db_config.php');

include('includes/functions.php');

include('includes/define.php');



	
?>

<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script type="text/javascript">
        function noBack()
         {
             window.history.forward()
         }
        noBack();
        window.onload = noBack;
        window.onpageshow = function(evt) { if (evt.persisted) noBack() }
        window.onunload = function() { void (0) }
    </script>
  <title><?php echo $SITE_TITLE?></title>
  <style>
  .form-control{
	text-align:center;
    background-color: transparent;
  }
  .panel-heading {
    padding: 5px 15px;
}

.panel-footer {
	padding: 1px 15px;
	color: #A0A0A0;
}

#profile-img {
    width: 210px !important;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    /*-moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    border-radius: 60px;*/
    cursor: pointer;
    width: 130px;
    height: 130px;
    font-size: 100px;
    margin-top: 4%;
    color: #9dadbb;
}
body{
	background-color: #383838; /*#0e5b9c;*/
}
.panel-body {
    padding: 15px;
    background-color: #fef2e3;
}
  </style>
</head>
<body class="lgpage">
	<!--<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <a class="navbar-brand" style="color:#fff" href="#"><?php echo SITE_HEADER?></a>
		</div>
		
	  </div>
	</nav> -->
	    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form action="log_auth.php" method="post">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<img id='profile-img' src='../img/logo/What.jpeg'>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="pass_word" type="password" value="" required>
											</div>
										</div>
										
										
										
						<?php
						foreach($region_arr as $region_id => $region_val)
						{
							?>
							<option value="<?php echo $region_id ?>" <?php if($region_id==$txtregion) echo "selected" ?> ><?php echo $region_val ?></option>
							<?php
						}
						?>
						</select>
					</div>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" name="login_submit" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						
					</div>
                </div>
			</div>
		</div>
	</div>
<?php

?>
</body>
</html>
	
<?php	
	

?>
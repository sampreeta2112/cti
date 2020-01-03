<?php
include('dynamic.php');
$file_name=$_POST['file_name'];
					$param1=$_POST['param1'];
					$param2=$_POST['param2'];
					$param3=$_POST['param3'];
					
						RunQry("delete from files where file_name='$file_name'");
						RunQry("Insert into files values('$file_name','$param1','$param2','$param3')");

?>
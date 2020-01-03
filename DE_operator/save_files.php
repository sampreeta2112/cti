<?php
include('dynamic.php');
$file_name=$_POST['file_name'];
					$param1=$_POST['param1'];
					$param2=$_POST['param2'];
					$param3=$_POST['param3'];
					for($i=0;$i<count($file_name);$i++)
					{
						RunQry("delete from files where file_name='$file_name[$i]'");
						RunQry("Insert into files values('$file_name[$i]','$param1[$i]','$param2[$i]','$param3[$i]')");
						
						
					}
					header("location:add_files.php");
?>
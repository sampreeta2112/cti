<?php
include('dynamic.php');

header('Content-Type: application/xls');
header('Content-Disposition: attachement; filename="inet_report_'.DATE_MY.'.xls"');

$cond=$_SESSION[SES_ADMIN]->gstr_cond;
$url_str="";
$flag = false;
?>







<table width="100%" align="center" border="2" cellspacing="1" cellpadding="1" class="tbl-cont" >
						  <thead>
							<tr>
							  <th >Sr.no</th>
							     <th >items_detail</th>
							  <th >expert_co</th>							 
							  <th >location</th>
							 <th >check point</th>
							   <th >date</th>
							   
							 						 
							</tr>
						  </thead>
						  <tbody>
						    <?php
							//$q ="SELECT file_id,file_no,file_name,file_timestamp FROM `file_records`INNER JOIN file_records ORDER BY  ASC";
							
							//$q =SELECT file_records.file_id,file_records.file_no,file_records.file_name ,COALESCE(COUNT(attachments.att_id), 0)FROM file_records INNER JOIN  attachments ON file_records.att_id = attachments.att_id;
							
							

							
							
														$q = "SELECT a.p_id, a.itm_details, b.exp_co, d.loc,d.chk_pt, COALESCE(COUNT(c.att_id), 0) AS attachments, DATE_FORMAT(a.log_time, '%Y-%m-%d') AS upload_date FROM user_table b INNER JOIN log_table a ON a.user_id = b.user_id INNER JOIN attachments c ON a.p_id = c.p_id INNER JOIN file_records d ON d.file_id = a.p_id  WHERE 1 and log_type='INSERT' $cond  GROUP BY a.p_id";

							 //echo$q;
							$r = RunQry($q);
							//$reportq="SELECT COALESCE(COUNT(user_id),0) as files,COALESCE(sum(attachments),0) as attachments,upload_date FROM userreport where user_id in (SELECT DISTINCT user_id from userreport) GROUP by upload_date";
							$rp=mysqli_query($link,$q);
							
							$numrow = mysqli_num_rows($rp);
							$i1 = 1;
							if($numrow)
							{	
								for($i=1; $o = mysqli_fetch_object($rp); $i++) 
								{	
								//print_r($o);	
									$x_p_id = $o->itm_details;
								$exp_co = $o->exp_co;
									
									$date = Changedateformat($o->date(format));
									
									
									$chk_pt = $o->chk_pt;
										$loc = $o->loc;
									

									
						?>
									<tr>
									  <td><?php echo $i; ?></td>
									 	   	 <td><center><?php echo $itm_details;?></center></td>
									   <td><?php echo $exp_co; ?></td>
									 		<td><center><?php echo $date ; ?></center></td>				 
									   <td><?php echo $chk_pt; ?></td>									  
										
									  <td><?php echo $loc; ?></td>
									  
									</tr>
									<?php
									
									
									
									}
						?>

						

						<?php
					}
					else
						echo "<tr><td colspan='10'> No record found...</td></tr>";
				?>
						  </tbody>
						</table>
					  
					
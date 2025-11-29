<?php 
include("conn.php");
$ft=$_POST['ft'];
$dt=$_POST['dt'];
$phpdate0=strtotime($ft);
	$mysqldate0=date('Y-m-d H:i:s',$phpdate0);
	$phpdate1=strtotime($dt);
	$mysqldate1=date('Y-m-d H:i:s',$phpdate1);

?>
<div class="pb-20" id="record">
						<table id="myTable" class="table hover multiple-select-row data-table-export nowrap">
							<tr>
									<th>Id</th>
									<th>Customer Name</th>
									<th>Mobile Number</th>
									<th>Vehicle Number</th>
									<th>Vehicle Category</th>
									<th>Vehicle In Date&Time</th>
									<th>Parking Slot Name</th>
									<th>Total Park Duration</th>
									<th>Parking Charges</th>
								</tr>
							<tbody><?php

$sql="SELECT * FROM parking_customer LEFT JOIN p_category ON parking_customer.ca_id = p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id = parking_slot.ps_id WHERE parking_customer.v_indate_time BETWEEN '$mysqldate0' AND '$mysqldate1';";
// echo $sql;
 $res = mysqli_query($con,$sql);
           								 $count=mysqli_num_rows($res);
           								 if($count > 0)
           								{
               									 while($row = mysqli_fetch_assoc($res))
               									 {					
        						?> 
								<tr>
									<td><?php echo $row['cu_id']; ?></td>
									<td><?php echo $row['cu_name']; ?></td>
									<td><?php echo $row['mobile_no']; ?></td>
									<td><?php echo $row['vehicle_number']; ?></td>
									<td><?php echo $row['ca_name']; ?></td>
									<td><?php $bb=strtotime($row['v_indate_time']); echo date("j F Y g:i a",$bb); ?></td>
									<td><?php echo $row['ps_name']; ?></td>
									<td><?php if(empty($row['t_park_duration']))
												{
													echo "-";
													}
									else
										{
											echo $row['t_park_duration'];?> Hour<?php
										} ?></td>
									<td><?php if($row['p_charges']==0.00)
												{
													echo "-";
													}
									else
										{
											?>₹ <?php echo $row['p_charges'];
										} ?></td>

								</tr>
								 <?php
            								}
       								 }else{
       								 			echo"<script type='text/javascript'>
                                      					alert('NO Data Availabel');
                                     			 </script>";
       								 	echo "<b style='text-align:center;'>No Data Availabel</b>";
       								 }
        						?>
									
							</tbody>
						</table>
					</div>
				</div>


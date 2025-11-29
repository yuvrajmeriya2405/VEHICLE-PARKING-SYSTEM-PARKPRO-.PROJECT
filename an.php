<?php
include("conn.php");
if(isset($_GET['q']))
{
	$in=$_GET['q'];
	$a="all";
	if($in==$a) {
		$sql = "SELECT * FROM `parking_slot`  LEFT JOIN p_category ON
parking_slot.ca_id=p_category.ca_id  ORDER BY parking_slot.ps_id DESC";
           	$res = mysqli_query($con,$sql);
		
	}
	else{
		$sql = "SELECT * FROM `parking_slot`  LEFT JOIN p_category ON
parking_slot.ca_id=p_category.ca_id where parking_slot.ps_status='$in' ORDER BY parking_slot.ps_id DESC";
           	$res = mysqli_query($con,$sql);
	}
?>
<div class="pb-20">
						<table class="data-table table stripe hover nowrap" >
							<thead>
								<tr>
									<th>PS_ID</th>
									<th>Vehical Category</th>
									<th>Slot Name</th>
									<th>Status</th>

									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								 <?php
            							
           							
               									 while($row = mysqli_fetch_assoc($res))
               									 {
                    									
                    									
        						?> 
								<tr>
									
									<td><?php echo $row['ps_id']; ?></td>
									<td><?php echo $row['ca_name']; ?></td>
									<td><?php echo $row['ps_name']; ?></td>
									<td><span class="<?php 
									if ($row['ps_status']=='Available') {
										echo("btn btn-success");
										
									}
									else
									{
										echo("btn btn-danger");
									}
								?>"><?php if ($row['ps_status']=='Available') {
										echo("Yes_");
										
									} ?><?php echo $row['ps_status']; ?></span></td>

									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="update_parkingslot.php?psid=<?php echo $row['ps_id'];?>" ><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delete_parkingslot.php?psid=<?php echo $row['ps_id'];?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
								 <?php
            								}
       								 
       								}
        						?>
							
							</tbody>
						</table>
				
			</div> 

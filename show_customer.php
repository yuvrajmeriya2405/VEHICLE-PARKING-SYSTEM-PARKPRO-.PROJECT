<?php
include("conn.php");
include("nav.php");

?>
<div class="main-container"><div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">

				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>CUSTOMER</h4>
								<script>
								function showUser(str) {
 								
    						
    								var xmlhttp = new XMLHttpRequest();
    								xmlhttp.onreadystatechange = function() {
      								if (this.readyState == 4 && this.status == 200) {
        				document.getElementById("showcustomer").innerHTML = this.responseText;
      					}
    				};
    					xmlhttp.open("GET","inout.php?q="+str,true);
    					xmlhttp.send();
  				
				}
</script>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">SHOW CUSTOMER</li>
								</ol>
							</nav>
						</div>
			</div>			
					</div>
					<div class="card-box mb-30">
					<div class="pd-20">
						
						
						<div class="row">
							<div class="col"><h4 class="text-blue h4">CUSTOMER</h4></div>
							<div class="col">
								<div class="form-group" style="text-align:right;">
											<select class="selectpicker" style="text-align:right;" onchange="showUser(this.value)">
												<option value="all">Select All</option>
												<option value="in">IN</option>
												<option value="out">OUT</option>
												
											</select>
					</div>
							</div>
					</div>
					
					<div class="pb-20" id="showcustomer">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>Id</th>
									<th>Customer Name</th>
									<th>Mobile Number</th>
									<th>Vehicle Number</th>
									<th>Category</th>
									<th>Vehicle In Date&Time</th>
									<th>Total Park Duration</th>
									<th>Parking Charges</th>
									<th>Vehicle Status</th>

									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								 <?php
            							$sql = "SELECT * FROM parking_customer  LEFT JOIN p_category ON
parking_customer.ca_id=p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id=parking_slot.ps_id ORDER BY parking_customer.cu_id DESC";
           								 $res = mysqli_query($con,$sql);
           								 $count=mysqli_num_rows($res);
           								 if($count > 0)
           								{
               									 while($row = mysqli_fetch_assoc($res))
               									 {
                    									
                    									
        						?> 
								<tr>
									
									<td><?php echo $row['cu_id']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['cu_name']; ?></td>
									<td><?php echo $row['mobile_no']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['vehicle_number']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['ca_name']; ?></td>
									<td><?php $bb=strtotime($row['v_indate_time']); echo date("j F Y g:i a",$bb); ?></td>
									<td><?php if(empty($row['t_park_duration']))
												{
													echo "-";
													}
									else
										{
											echo $row['t_park_duration'];?> Hour<?php
										} ?></td>
									<td> <?php 
									if($row['p_charges']==0.00)
												{
													echo "-";
													}
									else
										{
											?>₹ <?php echo $row['p_charges'];
										} ?></td>
									<td><span class="<?php 
									if ($row['v_status']=='in') {
										echo("btn btn-success");
										
									}
									else
									{
										echo("btn btn-danger");
									}
								?>">-><?php echo  $row['v_status'] ; ?><-<?php if ($row['v_status']=='in') {
										echo("-");
										
									}?></span></td>

									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<?php if($row['v_status']=="in"){
													?>
												<a class="dropdown-item" href="update_customer.php?cuid=<?php echo $row['cu_id'];?>"><i class="dw dw-edit2"></i> Edit</a>
												<?php
											}?>
												<a class="dropdown-item" href="delete_customer.php?cuid=<?php echo $row['cu_id'];?>"><i class="dw dw-delete-3"></i> Delete</a>
												<?php if($row['v_status']=="out"){
													?>
													<a class="dropdown-item" href="print.php?cuid=<?php echo $row['cu_id'];?>"><i class="dw dw-print"></i>Print</a>
													<?php
												}?>
												<?php if($row['v_status']=="out"){
													?>
													<a class="dropdown-item" href="view.php?cuid=<?php echo $row['cu_id'];?>"><i class="fa fa-eye"></i>View</a>
													<?php
												}?>
												
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

				
			


<?php
include("footer.php");

?>
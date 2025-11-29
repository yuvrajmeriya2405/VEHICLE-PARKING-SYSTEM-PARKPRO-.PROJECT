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
								<h4>PARKING SLOT</h4>
								<script>
								function showUser(str) {
 								
    						
    								var xmlhttp = new XMLHttpRequest();
    								xmlhttp.onreadystatechange = function() {
      								if (this.readyState == 4 && this.status == 200) {
        				document.getElementById("showcustomer").innerHTML = this.responseText;
      					}
    				};
    					xmlhttp.open("GET","an.php?q="+str,true);
    					xmlhttp.send();
  				
				}
</script>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">SHOW PARKING SLOT</li>
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
												<option value="Available">Yes_Available</option>
												<option value="Not_Available">Not_Available</option>
												
											</select>
					</div>
							</div>
					
					</div>
			
				<div class="pb-20">
						<table class="data-table table stripe hover nowrap" id="showcustomer">
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
            							$sql = "SELECT * FROM `parking_slot`  LEFT JOIN p_category ON
parking_slot.ca_id=p_category.ca_id ORDER BY parking_slot.ps_id DESC";
           								 $res = mysqli_query($con,$sql);
           								 $count=mysqli_num_rows($res);
           								 if($count > 0)
           								{
               									 while($row = mysqli_fetch_assoc($res))
               									 {
                    									
                    									
        						?> 
								<tr>
									
									<td><?php echo $row['ps_id']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['ca_name']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['ps_name']; ?></td>
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

				
			


<?php
include("footer.php");

?>
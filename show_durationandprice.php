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
								<h4>DURATION & PRICE</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">SHOW PARKING DURATION & PRICE</li>
								</ol>
							</nav>
						</div>
			</div>			
					</div>
					<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">PARKING DURATION & PRICE</h4>
					</div>
			
				<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th>Id</th>
									<th>Category</th>
									<th>Price per hour</th>

									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								 <?php
            							$sql = "SELECT * FROM `p_duration_price`  LEFT JOIN p_category ON
p_duration_price.ca_id=p_category.ca_id ORDER BY p_duration_price.price_id DESC";
           								 $res = mysqli_query($con,$sql);
           								 $count=mysqli_num_rows($res);
           								 if($count > 0)
           								{
               									 while($row = mysqli_fetch_assoc($res))
               									 {
                    									
                    									
        						?> 
								<tr>
									
									<td><?php echo $row['price_id']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['ca_name']; ?></td>
									<td>₹ <?php echo $row['price_value']; ?></td>

									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="update_durationandprice.php?prid=<?php echo $row['price_id'];?>" ><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delete_durationandprice.php?prid=<?php echo $row['price_id'];?>"><i class="dw dw-delete-3"></i> Delete</a>
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
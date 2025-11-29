
<?php
include("conn.php");
include("nav.php");
?>

<div class="main-container">

                    <div class="card-box mb-30">
					<div class="col-md-6 col-sm-12 mb-30">
					
					</div>
					
					<div class="pb-20">
						<table id="myTable" class="table hover multiple-select-row data-table-export nowrap">
		<tr>
          <th colspan="4" style="text-align: center;"><img src="k.png" style="margin: auto; width: 100%; padding: 50px;"></th>
        </tr>
						<tr>
									<th>Id</th>
									<th>Customer Name</th>
									<th>Vehicle Number</th>
									<th>Vehicle Category</th>
									<th>Parking Slot Name</th>
									<th>Total Park Duration</th>
									<th>Parking Charges</th>
								</tr>
							<tbody>
							 <?php
            							$sql = "SELECT * FROM `parking_customer`  LEFT JOIN p_category ON
parking_customer.ca_id=p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id=parking_slot.ps_id";
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
									<td><?php echo $row['vehicle_number']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['ca_name']; ?></td>
									<td style="text-transform: uppercase;"><?php echo $row['ps_name']; ?></td>
									<td><?php echo $row['t_park_duration']; ?> Hour</td>
									<td>₹ <?php echo $row['p_charges']; ?></td>
								</tr>
								 <?php
            								}
       								 }
        						?>
									
							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
			</div>
			
</div>
</div>
    <script type="text/javascript">
            window.print();
       
            window.onafterprint = function()
            {
                window.location.href = 'report1.php';
            };
            
            

</script>

<?php
include('footer.php');
?>
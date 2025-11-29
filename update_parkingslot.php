<?php
include("conn.php");
include("nav.php");
if (isset($_GET['psid'])) {
			//print_r($_GET);
			$pid=$_GET['psid'];
			$q=mysqli_query($con,"SELECT * FROM `parking_slot`  LEFT JOIN p_category ON
				parking_slot.ca_id=p_category.ca_id where parking_slot.ps_id='$pid'");
             $row1=mysqli_fetch_array($q);

                
            
}

?>
<div class="main-container"><div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>UPDATE PARKING SLOT</h4>
							</div>
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">PARKING SLOT</li>
								</ol>
							</nav>
						</div>
						
					</div>
				
			</div>
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">ADD PARKING SLOT</h4>
							
						</div>

						
					</div>
					<form method="post">
						<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Select Category :</label>
											
											<select class="custom-select form-control" name="cid" style="text-transform: uppercase;">
												<option value="<?php echo $row1['ca_id'];?>"><?php echo $row1['ca_name'];?></option>
												 <?php
            										$sql = "SELECT * FROM p_category";
           								 			$res = mysqli_query($con, $sql);
           								 			$count=mysqli_num_rows($res);
           								 		if($count > 0)
           										{
               									 	while($row = mysqli_fetch_assoc($res))
               									 	{
               									 		echo '<option value="'.$row["ca_id"].'">'.$row["ca_name"].'</option>';
               									 	}
                    							}		
                    									
        						?> 
												
												</select>

										</div>
										<div class="form-group">
										<label>Parking Slot Name</label>
										<input class="form-control" type="text" name="pname" placeholder="Parking Slot Name" value="<?php echo $row1['ps_name'];?>" style="text-transform: uppercase;">
										</div>
										
										<div class="form-group">
											<label>Select Parking Slot Status :</label>
											<select class="custom-select form-control" name="pstat">
												<option value="<?php echo $row1['ps_status'];?>"><?php echo $row1['ps_status'];?></option>
												<option value="Available">Available</option>
												<option value="Not_Available">Not Available</option>
												
											</select>

										</div>

										<input class="btn btn-primary" type="submit" name="su" value="Update">
										<div class="check-message" id="checkmessage" style="    font-size: 20px;
    font-weight: 1000; color: red;"></div>
									</div>
						
					</form>
<?php
include("footer.php");

if (isset($_POST['su'])) {
	?>
<script src="ajax.js"></script>
<?php

	$c_id=$_POST["cid"];
	$ps_n=$_POST["pname"];
	$ps_s=$_POST['pstat'];

	if (!empty($c_id) && !empty($ps_n) && !empty($ps_s)) {

	  $update="UPDATE parking_slot SET 	ca_id ='$c_id',	ps_name='$ps_n',ps_status='$ps_s' WHERE ps_id=$pid ";
	  //echo"$update";
	  $u=mysqli_query($con,$update);
                if($u)
                {
                	?>
                    <script type='text/javascript'>
                     window.location.replace('show_parkingslot.php');
                     </script>
                     <?php
                }
                else
                {
                    echo"not data inserted";
                }
            }
            else
        {

           ?>

                              <script type="text/javascript">
                                
                                 $("#checkmessage").text(' ');
                                $("#checkmessage").text('please fill the all  field');
                                     
                                      </script>
		<?php


           }     

}


?>
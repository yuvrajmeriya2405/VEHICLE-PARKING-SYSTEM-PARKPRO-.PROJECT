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
												<option value="">SELECT CATEGORY</option>
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
										<input class="form-control" type="text" name="pname" placeholder="Parking Slot Name" style="text-transform: uppercase;">
										</div>
										
										<div class="form-group">
											<label>Select Parking Slot Status :</label>
											<select class="custom-select form-control" name="pstat">
												<option value="">select parking slot status</option>
												<option value="Available">Available</option>
												<option value="Not_Available">Not Available</option>
												
											</select>

										</div>

										<input class="btn btn-primary" type="submit" name="su" value="Add">
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

	 $e=mysqli_query($con,"insert into parking_slot values('?','$c_id','$ps_n','$ps_s')");
	 if ($e) 
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

	//print_r($_POST);
}


?>
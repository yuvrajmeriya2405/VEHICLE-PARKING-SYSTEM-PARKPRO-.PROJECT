<?php

include("conn.php");
include("nav.php");
if (isset($_GET['prid'])) {
			//print_r($_GET);
			$prid=$_GET['prid'];
			$q=mysqli_query($con,"SELECT * FROM `p_duration_price`  LEFT JOIN p_category ON
p_duration_price.ca_id=p_category.ca_id where p_duration_price.price_id='$prid'");
             $row1=mysqli_fetch_array($q);

                
            
}

?>
<div class="main-container"><div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>UPDATE PARKING DURATION & PRICE</h4>
							</div>
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">PARKING DURATION & PRICE</li>
								</ol>
							</nav>
						</div>
						
					</div>
				
			</div>
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">UPDATE PARKING DURATION & PRICE</h4>
							
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
								
								<div class="col-md-12">
								<div class="form-group">
									<label>Parking Prices</label>
									<input id="demo2" type="number"  value="<?php echo $row1['price_value'];?>" name="price">
								</div>
							</div>

						<input class="btn btn-primary" type="submit" name="su" value="UPDATE">
						<div class="check-message" id="checkmessage" style="    font-size: 20px;
    font-weight: 1000; color: red;"></div>
					</form>

						</div>
	</div>

<?php
include("footer.php");

if (isset($_POST['su'])) {
	?>
<script src="ajax.js"></script>
<?php

	$c_id=$_POST["cid"];
	$dp_price=$_POST['price'];
	if (!empty($c_id) && !empty($dp_price)) {

	  $update="UPDATE p_duration_price SET 	ca_id ='$c_id',price_value='$dp_price' WHERE 	price_id=$prid ";
	  //echo"$update";
	  $u=mysqli_query($con,$update);
                if($u)
                {
                	?>
                    <script type='text/javascript'>
                     window.location.replace('show_durationandprice.php');
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


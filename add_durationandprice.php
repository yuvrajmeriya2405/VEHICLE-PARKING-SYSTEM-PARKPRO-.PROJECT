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
								<h4>ADD DURATION & PRICE</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">ADD DURATION & PRICE</li>
								</ol>
							</nav>
						</div>
						
					</div>
				
			</div>
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">ADD DURATION & PRICE</h4>
							
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
												

								<div class="col-md-12">
								<div class="form-group">
									<label>Enter per hour price</label>
									<input id="demo2" type="number" placeholder="parking price" value="0" name="price">

								</div>
							</div>

						<input class="btn btn-primary" type="submit" name="su" value="Add">
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

	 $e=mysqli_query($con,"insert into p_duration_price values('?','$c_id','$dp_price')");
	 if ($e) 
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
	//print_r($_POST);
}
?>
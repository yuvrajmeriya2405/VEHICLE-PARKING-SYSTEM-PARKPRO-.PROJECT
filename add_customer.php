<?php
include("conn.php");
include("nav.php");


?>
<?php 
		if(!isset($_GET['caid']))
		{
		?>
<div class="main-container"><div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							 <?php
            										$sql = "SELECT * FROM p_category";
           								 			$res = mysqli_query($con, $sql);
           								 			$count=mysqli_num_rows($res);
           								 		if($count > 0)
												{
													$colo = array("btn btn-outline-success","btn btn-outline-info", "btn btn-outline-warning","btn btn-outline-danger","btn btn-outline-primary");
               									 	while($row = mysqli_fetch_assoc($res))
               									 	{
               									 	?>

										<a class="<?php echo $colo[rand(0,4)]; ?> ml-4" href="add_customer.php?caid=<?php echo $row['ca_id']; ?>"><?php echo  $row['ca_name'];?></a>
               									 <?php
               									 	}
                    							}		
                    									
        						?> 




							</div>
						</div>
						
					</div>
				
			</div>
		</div>
	</div>
	<?php
		}
	?>
		<!--buton section close-->
		<?php 
		if(isset($_GET['caid']))
			{
				$cid=$_GET['caid'];
		?>
		 <div class="main-container"><div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>PARK PRO</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add Parking Customer</li>
                            </ol>
                        </nav>
                    </div>	
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">ADD Customer</h4>			
                    </div>	
                </div>
                <form method="POST">
                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Customer Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" name="cuname" style="text-transform: uppercase;">
							</div>
						</div>
						 <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile No</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" value="" maxlength="10"  name="mnumber">
							</div>
						</div>
                       <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Vehicle Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="" type="tel" name="vnumber" style="text-transform: uppercase;">
							</div>
						</div>
						<input type="hidden" name="caid" value="<?php echo "$cid";?>">
                        <div class="form-group row">

							<label class="col-sm-12 col-md-2 col-form-label">Parking Slot Name</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="psid" style="text-transform: uppercase;">
									<option value="">SELECT SLOT</option>
									 <?php
            										$sql = "SELECT * FROM parking_slot where ca_id=$cid and ps_status='Available'";
           								 			$res = mysqli_query($con, $sql);
           								 			$count=mysqli_num_rows($res);
           								 		if($count > 0)
           										{
               									 	while($row = mysqli_fetch_assoc($res))
               									 	{
               									 		echo '<option value="'.$row["ps_id"].'">'.$row["ps_name"].'</option>';
               									 	}
                    							}		
                    									
        						?> 

								</select>
							</div>
						</div>
                        <div class="form-group row">
		                     <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">IN Date and time</label>
		                     <div class="col-sm-12 col-md-10">
		                     	<input class="form-control datetimepicker" placeholder="In Date Time" name="indatetime" type="text">
		                    </div>
	                    </div>
                      
                         
                  <button type="submit" name="sub" class="btn btn-primary">Add</button>
                  <div class="check-message" id="checkmessage" style="    font-size: 20px;
    font-weight: 1000; color: red;"></div>
            </form>
        </div>
    </div>
</div>
</div>

	<?php
		}
	?>
	
<?php
include("footer.php");
if(isset($_POST['sub']))
{
	?>
<script src="ajax.js"></script>
<?php

	$cusname=$_POST['cuname'];
	$monumber=$_POST['mnumber'];
	$venumber=$_POST['vnumber'];
	$catid=$_POST['caid'];
	$pslotid=$_POST['psid'];
	$idt=$_POST['indatetime'];

	if (!empty($cusname) && !empty($venumber) && !empty($catid) && !empty($pslotid) && !empty($idt) && !empty($monumber)) {

	
      $update="UPDATE parking_slot SET ps_status='Not_Available' WHERE 	ps_id=$pslotid";
		$u=mysqli_query($con,$update);
	$phpdate=strtotime($idt);
	$mysqldate=date('Y-m-d H:i:s',$phpdate);
	//echo($mysqldate);
	//print_r($_POST);
	$i="INSERT INTO parking_customer (ca_id, cu_name,mobile_no,vehicle_number,ps_id,v_indate_time) VALUES ('$catid', '$cusname','$monumber','$venumber', '$pslotid', '$mysqldate')";
	//echo($sqloo);
	$d=mysqli_query($con,$i);
	if($d)
	{
		?>
                    <script type='text/javascript'>
                     window.location.replace('show_customer.php');
                     </script>
                     <?php
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
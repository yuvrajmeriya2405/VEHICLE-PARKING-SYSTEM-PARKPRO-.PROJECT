<?php
include("conn.php");
include("nav.php");
if (isset($_GET['cuid'])) {
	$id=$_GET['cuid'];
	$sql = "SELECT * FROM `parking_customer`  LEFT JOIN p_category ON
parking_customer.ca_id=p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id=parking_slot.ps_id  where parking_customer.cu_id=$id";
  $res = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($res);
  $psi=$row['ps_id'];
//echo($psi);


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
                                <li class="breadcrumb-item active" aria-current="page">Update Customer</li>
                            </ol>
                        </nav>
                    </div>	
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Update Customer</h4>			
                    </div>	
                </div>
                <form method="POST">
                <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Customer Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" placeholder="" value="<?php echo  $row['cu_name'];?>"  name="cuname" style="text-transform: uppercase;" disabled>
							</div>
						</div>
						 <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Mobile No</label>
							<div class="col-sm-12 col-md-10">
								<input type="text" class="form-control" value="<?php echo $row['mobile_no'];?>" maxlength="10"   name="mnumber" disabled>
							</div>
						</div>
                       <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Vehicle Number</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo  $row['vehicle_number'];?>" type="tel"  name="vnumber" style="text-transform: uppercase;" disabled>
							</div>
						</div>
						  <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Vehicle Category</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo  $row['ca_name'];?>" type="tel" name="vnumber" style="text-transform: uppercase;" disabled>
							</div>
						</div>
						  <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Parking Slot Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" value="<?php echo  $row['ps_name'];?>" type="tel" name="vnumber" style="text-transform: uppercase;" disabled>
							</div>
						</div>
						
                       
                        <div class="form-group row">
		                     <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">IN Date and time</label>
		                     <div class="col-sm-12 col-md-10">
		                     	<input class="form-control datetimepicker" value="<?php $bb=strtotime($row['v_indate_time']); echo date("j F Y g:i a",$bb); ?>" placeholder="In Date Time" name="indatetime" type="text" disabled>
		                    </div>
	                    </div>
	                     <div class="form-group row">
		                     <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Out Date and time</label>
		                     <div class="col-sm-12 col-md-10">
		                     	<input class="form-control datetimepicker" onchange="updatecharge(this.value)" placeholder="Out Date Time" name="outdatetime" type="text">
		                     	<div class="check-message" id="checkmessage" style="    font-size: 20px;
    font-weight: 1000; color: red;"></div>
		                    </div>
		                    
	                    </div>
	                   <button type="submit" name="sub" class="btn btn-primary">Update</button>
	                   <div class="check-message" id="checkmessage" style="    font-size: 20px;
    font-weight: 1000; color: red;"></div>
	                   
            </form>
        </div>
    </div>
</div>
</div>
<?php
include("footer.php");
$caid=$row['ca_id'];
$sq = "SELECT * FROM p_duration_price WHERE ca_id=$caid";  
  $ress = mysqli_query($con,$sq);
  $roww = mysqli_fetch_assoc($ress);
  $charges=$roww['price_value'];

if(isset($_POST['sub']))
{

?>
<script src="ajax.js"></script>
<?php
	$odt=$_POST['outdatetime'];
	$phpdate=strtotime($odt);
	$mysqldate=date('Y-m-d H:i:s',$phpdate);
	$start_time = $row['v_indate_time'];

	if (!empty($odt) && !empty($phpdate) && !empty($mysqldate) && !empty($start_time)) {
?>
<script src="ajax.js"></script>
<?php


if ($start_time<=$mysqldate) 
{
	
$end_time =$mysqldate;

// Convert the times to Unix timestamps
$start_timestamp = strtotime($start_time);
$end_timestamp = strtotime($end_time);

// Calculate the time difference in seconds
$time_difference_seconds = $end_timestamp - $start_timestamp;

// Calculate days and hours
$days = floor($time_difference_seconds / 86400); // 86400 seconds in a day
$remaining_seconds = $time_difference_seconds % 86400;
$hours = floor($remaining_seconds / 3600);
$hudays=$days*24;
$thdh=$hudays+$hours;
if($thdh==0)
{
	$tzh=$thdh+1;
	$totcharges=$tzh*$charges;

	 $psi=$row['ps_id'];

	 $up="UPDATE parking_slot SET ps_status='Available' WHERE ps_id=$psi";
	 //echo($up);
	 	$u=mysqli_query($con,$up);

	 	$upd="UPDATE parking_customer SET v_outdate_time='$mysqldate',t_park_duration='$tzh',p_charges='$totcharges',v_status='out' WHERE cu_id=$id";
	 	//echo($upd);
		$s=mysqli_query($con,$upd);
		if ($s) 
		{
			?>
                    <script type='text/javascript'>
                     window.location.replace('print.php?cuid=<?php echo $row['cu_id'];?>');
                     </script>
                    
                     <?php
		}
	

}
else{
$totcharges=$thdh*$charges;
$psi=$row['ps_id'];

	 $up="UPDATE parking_slot SET ps_status='Available' WHERE ps_id=$psi";
	 //echo($up);
	 	$u=mysqli_query($con,$up);

	 	$upd="UPDATE parking_customer SET v_outdate_time='$mysqldate',t_park_duration='$thdh',p_charges='$totcharges',v_status='out' WHERE cu_id=$id";
	 	//echo($upd);
		$s=mysqli_query($con,$upd);
		if ($s) 
		{
			?>
                    <script type='text/javascript'>
                     window.location.replace('print.php?cuid=<?php echo $row['cu_id'];?>');
                     </script>
                    
                     <?php
		}
}
}
else
{
	?>
                              <script type="text/javascript">
                                
                                 $("#checkmessage").text(' ');
                                $("#checkmessage").text('Invalid date selected');
                                     
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

// Display the calculated time difference
//echo($thdh);
//echo("<br>");
//echo($totcharges);


	
}
}
?>
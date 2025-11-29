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
                                <li class="breadcrumb-item active" aria-current="page">Detail Customer</li>
                            </ol>
                        </nav>
                    </div>  
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Detail Customer</h4>     
                    </div>  
                </div>
                <form method="POST">
                <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Customer Name</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" type="text" placeholder="" value="<?php echo  $row['cu_name'];?>"  name="cuname" disabled>
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
                <input class="form-control" value="<?php echo  $row['vehicle_number'];?>" type="tel"  name="vnumber" disabled>
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Vehicle Category</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?php echo  $row['ca_name'];?>" type="tel" name="vnumber" disabled>
              </div>
            </div>
              <div class="form-group row">
              <label class="col-sm-12 col-md-2 col-form-label">Parking Slot Name</label>
              <div class="col-sm-12 col-md-10">
                <input class="form-control" value="<?php echo  $row['ps_name'];?>" type="tel" name="vnumber" disabled>
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
                          <input class="form-control datetimepicker"   value="<?php $bb=strtotime($row['v_outdate_time']); echo date("j F Y g:i a",$bb); ?>" placeholder="Out Date Time" name="outdatetime" type="text" disabled>
                         
                        </div>
                        
                      </div>
                      <div class="form-group row">
                         <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Total Parking Duration</label>
                         <div class="col-sm-12 col-md-10">
                          <input class="form-control datetimepicker"   value="<?php echo  $row['t_park_duration']; ?> Hour" placeholder="" name="" type="text" disabled>
                         
                        </div>
                        
                      </div>
                        <div class="form-group row">
                         <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Total Parking Charges</label>
                         <div class="col-sm-12 col-md-10">
                          <input class="form-control datetimepicker"   value="₹ <?php echo  $row['p_charges']; ?>" placeholder="" name="" type="text" disabled>
                         
                        </div>
                        
                      </div>
                       <div class="form-group row">
                         <label for="example-datetime-local-input" class="col-sm-12 col-md-2 col-form-label">Vehicle Status</label>
                         <div class="col-sm-12 col-md-10">
                          <input class="form-control datetimepicker"   value="<?php echo  $row['v_status']; ?>" placeholder="" name="" type="text" disabled>
                         
                        </div>
                        
                      </div>
                     
                     
            </form>
              <a href="show_customer.php"><button class="btn btn-primary" style="">Back</button></a>

        </div>
    </div>
</div>
</div>

<?php

}
include("footer.php");
?>
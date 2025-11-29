<?php
include("conn.php");
include("nav.php");
if (isset($_GET['cuid'])) {
  $id=$_GET['cuid'];
  $sql = "SELECT * FROM `parking_customer`  LEFT JOIN p_category ON
parking_customer.ca_id=p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id=parking_slot.ps_id where parking_customer.cu_id=$id";
  $res = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($res);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VPS</title>
	<link href="vendors/style/bootstrap.min.css" rel="stylesheet">
	<link href="vendors/style/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/style/datatable.css" rel="stylesheet">
	<link href="vendors/style/datepicker3.css" rel="stylesheet">
	<link href="vendors/style/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>

</style>

<div class="main-container">
		<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="row">
			
		</div>
</div>
	<a href="show_customer.php"><button class="btn btn-primary" style="">Back</button></a>
		
                
                <div  id="exampl">
                    <br>
      <table id="" class="table table-striped table-bordered">
        <tr>
          <th colspan="4" style="text-align: center;"><img src="k.png" style="height: 200px; width: 500px;"></th>
        </tr>

        <tr>

       <th>Customer Name:</th>
              <td style="text-transform: uppercase;"><?php echo  $row['cu_name'];?></td>
                       

          <th>Vehicle Number:</th>
              <td><?php echo  $row['vehicle_number'];?></td>
              </tr>

              <tr>
          <th>Vehicle Category:</th>
              <td style="text-transform: uppercase;"><?php echo  $row['ca_name'];?></td>
        
          <th>Parking Slot Name:</th>
              <td style="text-transform: uppercase;"><?php echo  $row['ps_name'];?></td>
              </tr>

            <tr>
          <th>Vehicle In-Date-Time:</th>
          <td><?php $bb=strtotime($row['v_indate_time']); echo date("j F Y g:i a",$bb); ?></td>

          <th>Total Park Duration:</th>
          <td><?php echo  $row['t_park_duration'];?> Hour</td>
            
          
      </tr>
      <tr>
        <th>Vehicle Out-Date-Time:</th>
        <td><?php $bb=strtotime($row['v_outdate_time']); echo date("j F Y g:i a",$bb); ?></td>

        <th>Total Charge:</th>
        <td>₹<?php echo  $row['p_charges'];?></td>
      </tr>
  <?php } ?>


</table>
          
          </div>
        <form action="print1.php" method="POST">
          <input type="hidden" name="cu_id" value="<?php echo $row['cu_id']; ?>">
          <input type="submit" value="print" class="btn btn-primary">  
        </form>
	</div>	<!--/.main-->




  
		
</body>
</html>


<?php
include("footer.php");

?>
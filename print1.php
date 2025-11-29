<?php
include("conn.php");
include("nav.php");
if (isset($_POST['cu_id'])) {
  $id=$_POST['cu_id'];
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
	<title>PARKING</title>
	<link href="vendors/style/bootstrap.min.css" rel="stylesheet">
	<link href="vendors/style/font-awesome.min.css" rel="stylesheet">
    <link href="vendors/style/datatable.css" rel="stylesheet">
	<link href="vendors/style/datepicker3.css" rel="stylesheet">
	<link href="vendors/style/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
 

<div class="main-container">
		<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="row">
</div>
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
	 </div>
 </div>	<!--/.main-->
 <script type="text/javascript">
            window.print();
            window.onafterprint = function()
            {
                window.location.href = 'show_customer.php';
            };
            //  window.onbefore = function()
            // {
            //     window.location.href = 'print.php';
            // };

</script>

</body>
</html>


<?php
include("footer.php");

?>
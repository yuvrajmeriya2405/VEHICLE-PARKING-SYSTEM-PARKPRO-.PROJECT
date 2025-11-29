<?php
include("conn.php");
if (isset($_GET['cuid'])) 
{
	$cid=$_GET['cuid'];
	$sql = "SELECT * FROM `parking_customer`  LEFT JOIN p_category ON
parking_customer.ca_id=p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id=parking_slot.ps_id where parking_customer.cu_id=$cid";
  $res = mysqli_query($con,$sql);
  $row = mysqli_fetch_assoc($res);
  $psi=$row['ps_id'];
  $up="UPDATE parking_slot SET ps_status='Available' WHERE ps_id=$psi";
	$u=mysqli_query($con,$up);
	$d="delete from parking_customer where cu_id=$cid";
		$s=mysqli_query($con,$d);
		if($s)
		{
			?>
                    <script type='text/javascript'>
                     window.location.replace('show_customer.php');
                     </script>
                     <?php
		}
		else
		{
			echo "data not deleted";
		}
	}
	else{
		echo "id is not found";
	}

	 
                
            

?>
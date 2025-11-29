<?php
include("conn.php");
if (isset($_GET['psid'])) 
{
	$ps_id=$_GET['psid'];
	$d="delete from parking_slot where ps_id=$ps_id";
		$s=mysqli_query($con,$d);
		if($s)
		{
			?>
                    <script type='text/javascript'>
                     window.location.replace('show_parkingslot.php');
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
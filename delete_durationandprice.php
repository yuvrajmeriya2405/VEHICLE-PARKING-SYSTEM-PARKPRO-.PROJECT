<?php
include("conn.php");
if (isset($_GET['prid'])) 
{
	$pr_id=$_GET['prid'];
	$d="delete from p_duration_price where price_id=$pr_id";
		$s=mysqli_query($con,$d);
		if($s)
		{
			?>
                    <script type='text/javascript'>
                     window.location.replace('show_durationandprice.php');
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
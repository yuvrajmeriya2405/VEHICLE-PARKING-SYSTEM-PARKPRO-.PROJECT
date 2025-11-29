<?php
include("conn.php");
if (isset($_GET['ca_id'])) 
{
	$id=$_GET['ca_id'];
	$d="delete from p_category where ca_id=$id";
		$s=mysqli_query($con,$d);
		if($s)
		{
			?>
                    <script type='text/javascript'>
                     window.location.replace('show_category.php');
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
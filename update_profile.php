<?php
include("conn.php");
include("nav.php");
//session_start();
if(isset($_SESSION['pm'])){
// if(empty($_SESSION['pm']))
// {
	$email=$_SESSION['pm'];

?>

<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>UPDATE-PROFILE</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>	
			</div>
			<div class="pd-20 card-box mb-20">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">UPDATE PROFILE</h4>							
						</div>	
					</div>
			<div class="card-body">
				<form method="post">
					<div class="mb-4">
						<?php
							$q=mysqli_query($con,"select * from  p_a where e_adress='$email'");
                			$row=mysqli_fetch_array($q);
                		
						?>
						<label> Email Address</label>
						<input type="email" class="form-control" name="eid" placeholder="Email Address" value="<?php echo $row['e_adress']; ?>">
					</div>
					<div class="mb-4">
					<label>Password</label>
						<input type="Password" class="form-control" name="pas" placeholder="Your Passwords">
					</div>
					<input type="hidden" name="user_id" value="">
					<button type="submit"  name="sub" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>









<?php
//print_r($_SESSION);
include("footer.php");
if (isset($_POST['sub'])) {
	print_r($_POST);
	$eeid=$_POST["eid"];
	$pss=$_POST["pas"];
	if(empty($pss))
	{
		$iiiid=$_SESSION ['iii'];
		 $up="UPDATE `p_a` SET e_adress='$eeid' WHERE `p_a`.`id`=".$iiiid;
	  //echo"$up";
	  $u=mysqli_query($con,$up);
                if($u)
                {
                	$_SESSION["pm"] =$eeid;
					?>
                    <script type='text/javascript'>
                     window.location.replace('update_profile.php');
                     </script>
                     <?php
                }
	}
	else
	{
		$iiiid=$_SESSION ['iii'];
	  $update='UPDATE p_a SET e_adress="'.$eeid.'", password="'.$pss.'" WHERE id='.$iiiid ;
	  echo $update;
	  //echo"$update";
	  $u=mysqli_query($con,$update);
                if($u)
                {
                	
                	?>
                    <script type='text/javascript'>
                     window.location.replace('logout.php');
                     </script>
                     <?php
                }
                else
                {
                    echo"not data inserted";
                }

}
}
} else{
	echo '<a href="index.php">Login</a>';
 	die("You Are Not Login Please Login");
	
 }	
// }


?></div>
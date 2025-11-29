<?php
include("conn.php");
include("nav.php");

?>
<div class="main-container"><div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Category</li>
								</ol>
							</nav>
						</div>
						
					</div>
				
			</div>
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">ADD CATEGORY</h4>
							
						</div>
						
					</div>
					<form method="post">
						<div class="form-group">
							<label>Vehicle Category Name</label>
							<input class="form-control" type="text" name="catname" placeholder="Vehicle Category Name" style="text-transform: uppercase;">
							<div class="check-message" id="checkmessage" style="    font-size: 20px;
    font-weight: 1000; color: red;"></div>
						</div>
						<input class="btn btn-primary" type="submit" name="sub" value="Add">
					</form>

						</div>
	</div>


<?php

include("footer.php");
if (isset($_POST['sub'])) {
	?>
<script src="ajax.js"></script>
<?php

	$catn=$_POST["catname"];
	if (!empty($catn)) {
		
  


	   $d=mysqli_query($con,"insert into p_category values('?','$catn')");
                if($d)
                {
                    ?>
                    <script type='text/javascript'>
                     window.location.replace('show_category.php');
                     </script>
                     <?php
                }
                else
                {
                    echo"not data inserted";
                }
       }
       else
        {

           ?>

                              <script type="text/javascript">
                                
                                 $("#checkmessage").text(' ');
                                $("#checkmessage").text('please fill the field');
                                     
                                      </script>
		<?php


           }


}
?>
	
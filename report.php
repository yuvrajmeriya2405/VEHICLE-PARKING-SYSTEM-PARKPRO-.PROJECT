<?php
include("conn.php");
include("nav.php");
?>

<div class="main-container">
<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Report</h4>
							</div>
							
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="wel.php">Dashboard</a></li>
									<li class="breadcrumb-item active" aria-current="page">Report</li>
								</ol>
							</nav>
						</div>
						
					</div>
				
			</div>
			
			<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Report</h4><br>
						</div>
					</div>
					<div class="form-group row">
		                     <label for="example-datetime-local-input" class="col-sm-8 col-md-2 col-form-label">Form To :</label>
		                     <div class="col-sm-12 col-md-10">
		                     	<input class="form-control date-picker" placeholder="Select Date" type="text">
		                    </div>
	                    </div>
                        <div class="form-group row">
		                     <label for="example-datetime-local-input" class="col-sm-8 col-md-2 col-form-label">Date To :</label>
		                     <div class="col-sm-12 col-md-10">
		                     	<input class="form-control date-picker" placeholder="Select Date" type="text"><br>
		                    </div>
	                    </div>
                        <div class="btn-list">
								<input class="btn btn-primary" type="submit" value="Submit">
							</div>
					</div>
</div>



<?php
include('footer.php');
?>
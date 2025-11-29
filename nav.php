<?php
	include("conn.php");
	 include('vf.php');
	?>	
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>PARK PRO</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="t.png">
	<link rel="icon" type="image/png" sizes="32x32" href="t.png">
	<link rel="icon" type="image/png" sizes="16x16" href="t.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="src/plugins/switchery/switchery.min.css">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	


	<div class="header">
	</div>

		
		
	</div>

	

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="k.png" alt="" class="dark-logo">
				<img src="k.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
                            <a href="wel.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-home"></span><span class="mtext">Dashboard</span>
						</a>
                    </li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon  fa fa-car"></span><span class="mtext">Vehical Category</span>
						</a>
						<ul class="submenu">
							<li><a href="add_category.php">Add  Category</a></li>
							<li><a href="show_category.php">Show Category</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon  ion-ios-clock"></span><span class="mtext">Duration & Price</span>
						</a>
						<ul class="submenu">
							<li><a href="add_durationandprice.php">Add Duration & Price</a></li>
							<li><a href="show_durationandprice.php">Show Duration & Price</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon fi-tablet-portrait"></span><span class="mtext">Parking Slot</span>
						</a>
						<ul class="submenu">
							<li><a href="add_parkingslot.php">Add Parking Slot</a></li>
							<li><a href="show_parkingslot.php">Show Parking Slot</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon fi-torsos-all"></span><span class="mtext">Customer</span>
						</a>
						<ul class="submenu">
							<li><a href="add_customer.php">Add Customer</a></li>
							<li><a href="show_customer.php">Show Customer</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="report1.php" class="dropdown-toggle no-arrow">
							<span class="micon  fa fa-book"></span><span class="mtext">Report</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="update_profile.php" class="dropdown-toggle no-arrow">
							<span class="micon  fa fa-user-plus"></span><span class="mtext">Update-Profile</span>
						</a>
					</li>
					<li>
						<a href="logout.php" class="dropdown-toggle no-arrow">
							<span class="micon fa fa-sign-in"></span><span class="mtext">Logout</span>
						</a>
					</li>
					
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
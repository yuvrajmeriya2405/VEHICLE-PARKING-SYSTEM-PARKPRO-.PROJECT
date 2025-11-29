<?php
include("conn.php");
include("nav.php");
?>

<script src="s.js"></script>

<script src="pdf.js"></script>
<script src="pdf1.js"></script>

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
						<h4 class="text-blue h4">Report</h4>
					</div>

				</div>

				<div class="card-box mb-30">
					<div class="col-md-6 col-sm-12 mb-30">
						<div class="btn-list">

							<button type="button" onclick="generatePDF()" class="btn" data-bgcolor="#bd081c"
								data-color="#ffffff"><i class="fa fa-file-pdf-o"></i> PDF</button>
							<button type="button" onclick="createExcel()" class="btn" data-bgcolor="#00b489"
								data-color="#ffffff"><i class="fa fa-file-excel-o"></i> EXCEL</button>



						</div>
					</div>
					<div class="pd-20 card-box mb-30">
						<div class="clearfix">

						</div>
						<form name="datereports" id="myForm">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>From To :</label>
											<input class="form-control datetimepicker" placeholder="" name="ft"
												type="text" required>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Date To :</label>
											<input class="form-control datetimepicker" placeholder="" name="dt"
												type="text" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>&nbsp;</label>
											<input type="submit" class="btn btn-primary btn-block" name="submit"
												value="Submit">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="pb-20" id="record">
						<table id="myTable" class="table hover multiple-select-row data-table-export nowrap">
							<tr>
								<th>Id</th>
								<th>Customer Name</th>
								<th>Mobile Number</th>
								<th>Vehicle Number</th>
								<th>Vehicle Category</th>
								<th>Vehicle In Date&Time</th>
								<th>Parking Slot Name</th>
								<th>Total Park Duration</th>
								<th>Parking Charges</th>
							</tr>
							<tbody>
								<?php
								$sql = "SELECT * FROM parking_customer  LEFT JOIN p_category ON
parking_customer.ca_id=p_category.ca_id LEFT JOIN parking_slot ON parking_customer.ps_id=parking_slot.ps_id";
								$res = mysqli_query($con, $sql);
								$count = mysqli_num_rows($res);
								if ($count > 0) {
									while ($row = mysqli_fetch_assoc($res)) {
										?>
										<tr>
											<td><?php echo $row['cu_id']; ?></td>
											<td style="text-transform: uppercase;"><?php echo $row['cu_name']; ?></td>
											<td><?php echo $row['mobile_no']; ?></td>
											<td style="text-transform: uppercase;"><?php echo $row['vehicle_number']; ?></td>
											<td><?php echo $row['ca_name']; ?></td>
											<td><?php $bb = strtotime($row['v_indate_time']);
											echo date("j F Y g:i a", $bb); ?>
											</td>

											<td style="text-transform: uppercase;"><?php echo $row['ps_name']; ?></td>

											<td><?php if (empty($row['t_park_duration'])) {
												echo "-";
											} else {
												echo $row['t_park_duration']; ?> Hour<?php
											} ?> </td>
											<td><?php if ($row['p_charges'] == 0.00) {
												echo "-";
											} else {
												?>₹ <?php echo $row['p_charges'];
											} ?></td>

										</tr>
										<?php
									}
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
				<!-- Export Datatable End -->
			</div>

		</div>
	</div>

	<script>
		function createExcel() {
			const table = document.getElementById('myTable');
			const wb = XLSX.utils.table_to_book(table);
			XLSX.writeFile(wb, 'PARKPRO.xlsx');
		}
	</script>
	<script type="text/javascript">
		function generatePDF() {

			// Choose the element id which you want to export.
			var element = document.getElementById('myTable');
			element.style.width = '10px';
			element.style.height = '50px';
			var opt = {
				margin: 0.5,
				filename: 'PARKPRO.pdf',
				image: { type: 'jpeg', quality: 1 },
				html2canvas: { scale: 1 },
				jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait', precision: '12' }
			};

			html2pdf().set(opt).from(element).save();
			//   if()
			//   {
			// 	window.location.href = 'report1.php';
			//   }


		}
	</script>

	<?php
	include('footer.php');
	?>
	<script>
		$(document).ready(function () {
			$('#myForm').submit(function (e) {
				e.preventDefault(); // Prevent default form submission

				var formData = $(this).serialize(); // Serialize form data   


				$.ajax({

					type: "POST",
					url: "rept.php", // Replace with your PHP script URL
					data: formData,
					success: function (response) {
						$('#myTable').html(response); // Replace the table container with the fetched table
					}
				});
			});
		});
	</script>
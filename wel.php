<?php
include("conn.php");
include("nav.php");

include("loader.php");


?>




<div class="main-container">
	<div class="row clearfix progress-box">
		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<div class="progress-box text-center">
					<?php
					$sql = "select COUNT(ps_id) as 'aslotcount' from parking_slot where ps_status='Available'";
					$res = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($res);
					$asc = $row['aslotcount'];
					//echo "$asc";
					$sql = "select COUNT(ps_id) as 'tslotcount' from parking_slot ";
					$res = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($res);
					$tsc = $row['tslotcount'];
					//echo "$tsc";
					$asp = ($asc / $tsc) * 100;
					//echo "$asp";
					
					?>
					<input type="text" class="knob dial1" value="0" data-width="120" data-height="120"
						data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#1b00ff"
						data-angleOffset="180" readonly>
					<h5 class="text-blue padding-top-10 h5">Available Slot</h5>
					<span class="d-block dt1"><?php echo (round(num: $asp)); ?>% Slot</span>

				</div>
			</div>
		</div>
		<?php
		$sql = "select COUNT(ps_id) as 'naslotcount' from parking_slot where ps_status='Not_Available'";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);
		$nasc = $row['naslotcount'];
		//echo "$nasc";
		

		$nasp = ($nasc / $tsc) * 100;
		//echo "$asp";
		
		?>

		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<div class="progress-box text-center">
					<input type="text" class="knob dial2" value="0" data-width="120" data-height="120"
						data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#00e091"
						data-angleOffset="180" readonly>
					<h5 class="text-light-green padding-top-10 h5">Not Available Slot</h5>
					<span class="d-block dt2"><?php echo (round($nasp)); ?>% Slot</span>

				</div>
			</div>
		</div>
		<?php
		$timestamp = time();
		$currentDate = gmdate('Y-m-d', $timestamp);
		$sql = "select COUNT(cu_id) as 'incuscount' from parking_customer where v_status='in' and v_indate_time>='DATE_SUB(NOW(), INTERVAL 30 DAY)'";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);
		$ic = $row['incuscount'];
		//echo "$asc";
		$sql = "select COUNT(cu_id) as 'tincuscount' from parking_customer where v_indate_time>='DATE_SUB(NOW(), INTERVAL 30 DAY)'";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);
		$tinc = $row['tincuscount'];
		//echo "$tsc";
		$incusp = ($ic / $tinc) * 100;
		//echo "$asp";
		

		?>
		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<div class="progress-box text-center">
					<input type="text" class="knob dial3" value="0" data-width="120" data-height="120"
						data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#f56767"
						data-angleOffset="180" readonly>
					<h5 class="text-light-orange padding-top-10 h5">In Customer</h5>
					<span class="d-block dt3"><?php echo (round($incusp)); ?>% Customer</span>

				</div>
			</div>
		</div>
		<?php

		$timestamp = time();
		$currentDate = gmdate('Y-m-d', $timestamp);
		$sql = "select COUNT(cu_id) as 'outcuscount' from parking_customer where v_status='out' and v_indate_time>='DATE_SUB(NOW(), INTERVAL 30 DAY)'";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);
		$outc = $row['outcuscount'];
		$outcusp = ($outc / $tinc) * 100;


		?>
		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<div class="progress-box text-center">
					<input type="text" class="knob dial4" value="65" data-width="120" data-height="120"
						data-linecap="round" data-thickness="0.12" data-bgColor="#fff" data-fgColor="#a683eb"
						data-angleOffset="180" readonly>
					<h5 class="text-light-purple padding-top-10 h5">Out Customer</h5>
					<span class="d-block dt4"><?php echo (round($outcusp)); ?>% Customer</span>

				</div>
			</div>
		</div>
	</div>
	<!--catagory-->
	<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-10 mb-30">
			<div class="card-box pd-30 pt-15 height-50-p">
				<h2 class="mb-30 h4">Vehicle Category</h2>
				<div class="browser-visits">

					<ul>
						<?php
						$s = "SELECT * FROM p_category";
						$res = mysqli_query($con, $s);
						$count = mysqli_num_rows($res);
						if ($count > 0) {
							while ($row = mysqli_fetch_assoc($res)) {
								?>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="t.png" alt=""></div>
									<div class="browser-name"><?php echo $row['ca_name']; ?></div>
									<div class="visit"><span><?php $cid = $row['ca_id'];
									$ss = "SELECT COUNT(cu_id)AS cacout FROM parking_customer WHERE ca_id=$cid";
									$i = mysqli_query($con, $ss);
									$arr = mysqli_fetch_assoc($i);
									echo $arr['cacout']; ?></span></div>
								</li>
							<?php }
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<!--total parking slot-->

		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<?php
		$sql = "select COUNT(ps_id) as 'totslotcount' from parking_slot";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);
		
		?>
				<h2 class=" padding-top-10 h2" style="text-align: center; color: #02CCFE;">Total Parking Slot</h2>
				<br>
				<br>
				<br>
				<br>
				<span>
					<h1 style="text-align: center; color: #02CCFE"><?php echo $row['totslotcount']; ?></h1>
				</span>
				<br>
				<br>
				<br>
			</div>
		</div>
		<!--today income-->
		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="card-box pd-30 height-100-p">
        <h2 class="padding-top-10 h2" style="text-align: center; color: #00e091;">Today's Income</h2>
        <?php
        $today = date('Y-m-d');
        $sql = "SELECT SUM(p_charges) as today_income 
                FROM parking_customer 
                WHERE DATE(v_indate_time) = '$today'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
        $todayIncome = $row['today_income'];
        ?>
        <br>
        <br>
        <br>
        <br>
        <span>
            <h1 style="text-align: center; color: #00e091;">
                <?php 
                if ($todayIncome === NULL || $todayIncome == 0) {
                    echo "₹0";
                } else {
                    echo "₹" . number_format($todayIncome, 2);
                }
                ?>
            </h1>
        </span>
        <br>
        <br>
        
    </div>
</div>

		<!--year of income-->
<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<?php
        $currentYear = date('Y');
        $sql = "SELECT SUM(p_charges) as total_income 
                FROM parking_customer 
                WHERE YEAR(v_indate_time) = $currentYear";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($res);
        $yearlyIncome = $row['total_income'];
        ?>
				<h2 class=" padding-top-10 h2" style="text-align: center; color: #f56767;">Year Of Income</h2>
				
				<br>
				<br>
				<br>
				<br>
				<span>
					<h1 style="text-align: center; color:#f56767;"> <?php 
                if ($yearlyIncome === NULL || $yearlyIncome == 0) {
                    echo "₹ 0";
                } else {
                    echo "₹ " . number_format($yearlyIncome, 2);
                }
                ?></h1>
				</span>
				<br>
				<br>
				<br>
			</div>
		</div>
	</div>
	


<!--available slot category vice-->
<div class="row">
		<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
			<div class="card-box pd-30 height-100-p">
				<?php
		$sql = "select COUNT(ps_id) as 'totslotcount' from parking_slot where ps_status='Available'";
		$res = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($res);
		$ts=$row['totslotcount'];
		
		?>
				<h2 class=" padding-top-10 h2" style="text-align: center; color: #02CCFE;">Total Available Slot</h2>
				<br>
				<br>
				<br>
				<br>
				<span>
					<h1 style="text-align: center; color: #02CCFE"><?php  if($ts==0)
					{
						echo("0");
					}
					else{
						echo("$ts");
					} ?></h1>
				</span>
				<br>
				<br>
				<br>
			</div>
		</div>
		 <?php
            							$sql = "SELECT * FROM p_category";
           								 $res = mysqli_query($con, $sql);
           								 $count=mysqli_num_rows($res);
           								 if($count > 0)
           								{
           									$colo = array("#02CCFE","#00e091", "#f56767");
               									 while($row = mysqli_fetch_assoc($res))
               									 {
                    									
                    									
        						?> 
        						<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="card-box pd-30 height-100-p">
        <h2 class="padding-top-10 h2" style="text-align: center; color:<?php echo $colo[rand(0,2)]; ?>;"><?php echo $row['ca_name']; ?></h2>
      
        <br>
        <br>
        <br>
        <br>
        <span>
            <h1 style="text-align: center; color:<?php echo $colo[rand(0,2)]; ?>;">
            	<?php $cid = $row['ca_id'];
									$ss = "SELECT COUNT(ps_id) AS avs FROM parking_slot WHERE ca_id=$cid AND ps_status='Available'";
									$i = mysqli_query($con, $ss);
									$arr = mysqli_fetch_assoc($i);
									$rr=$arr['avs'];
									if($rr==0)
									{
										echo("0");
									}
									else
									{
										echo("$rr");
									}
									 ?>
									
									
               
            </h1>
        </span>
        <br>
        <br>
        
    </div>
</div>
	 <?php
            								}
       								 }
        						?>



</div>

</div>
</div>






<?php include("footer.php"); ?>
<script>
	$(".dial1").knob();

	$({ animatedVal: 0 }).animate({ animatedVal: <?php echo ($asp); ?> }, {
		duration: 3000,
		easing: "swing",
		step: function () {
			const roundedValue = Math.round(this.animatedVal);
			$(".dial1").val(roundedValue).trigger("change");
			$(".dt1").text(roundedValue + "% Slot");
		}
	});

	$(".dial2").knob();
	$({ animatedVal: 0 }).animate({ animatedVal: <?php echo ($nasp); ?> }, {
		duration: 3000,
		easing: "swing",
		step: function () {
			const roundedValue = Math.round(this.animatedVal);
			$(".dial2").val(roundedValue).trigger("change");
			$(".dt2").text(roundedValue + "% Slot");
		}
	});

	$(".dial3").knob();
	$({ animatedVal: 0 }).animate({ animatedVal: <?php echo ($incusp); ?> }, {
		duration: 3000,
		easing: "swing",
		step: function () {
			const roundedValue = Math.round(this.animatedVal);
			$(".dial3").val(roundedValue).trigger("change");
			$(".dt3").text(roundedValue + "% Customer");
		}
	});

	$(".dial4").knob();
	$({ animatedVal: 0 }).animate({ animatedVal: <?php echo ($outcusp); ?> }, {
		duration: 3000,
		easing: "swing",
		step: function () {
			const roundedValue = Math.round(this.animatedVal);
			$(".dial4").val(roundedValue).trigger("change");
			$(".dt4").text(roundedValue + "% Customer");
		}
	});
</script>


<?php
// }
// else
// {
// 	header("location:index.php");
// }

?>
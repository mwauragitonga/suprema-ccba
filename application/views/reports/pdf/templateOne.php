<!DOCTYPE html>
<html>

<body>
<style type="text/css">
	html {
		background-color: #ffffff;
	}
	body {
		font-family: "trebuchet ms";
		overflow: hidden;
		margin: 0 auto;
		padding: 5px;
	}

	.details {
		position: relative;
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.left {
		width: 100%;
		float: left;
	}

	.right {
		width: 100%;
		float: left;
		margin-top: 3em;
	}

	small{
		font-size: 11px;
	}

	table {
		width: 100%;
		border-collapse: collapse;
	}

	th {
		padding: 10px 16px;
		border-color: rgba(120, 130, 140, 0.045);
		vertical-align: bottom;
		border-bottom: 2px solid #eceeef;
		text-align: left;
	}

	tbody > tr:nth-child(odd) {
		background-color: rgba(0, 0, 0, 0.025);
		background-clip: padding-box;
	}

	td {
		padding-left: 16px;
		padding-right: 16px;
		border-color: rgba(120, 130, 140, 0.045);
		padding: .75rem;
		vertical-align: top;
		border-top: 1px solid #eceeef;
	}

	svg {
		font-family:"Lucida Grande", "Lucida Sans Unicode", Arial, Helvetica, sans-serif;
		font-size:12px;
	}

	.reportImage{
		float: right;
		width: 100%;
	}

	.reportImage img{
		float: right;
	}

	.reportDetails{
		float: left;
	}
	.footer{
		font-size: 12px;
		clear: both;
		border-top: 1px solid;
		text-align: center;
	}
</style>
<div class="details">
	<div class="details-body">
		<div class="reportImage" style="float:right" >
			<img  src="https://www.ccbagroup.com/wp-content/themes/CSI/style/images/logo.png'" height="83px" width="370px" alt=""><br>
		</div>
		<p style="float:right"><b><?php echo "Report Generated on " . date("d/m/Y") . "<br>"; ?></b></p><br>

		<div class="reportDetails">
			<?php
			$count = 0;
			$sums = array();
			foreach($contents['contents'][0] as $vv){
				$v = $vv["costCenterCode"];
				if(!array_key_exists($v,$sums)){
					$sums[$v] = 0;
				}
				$sums[$v]++;
			}
			?>
			<h4 style="margin-left: 35%"><b>Report Summary</b></h4>
			<ul>
				<?php
				foreach ($sums as $key => $value) {
				$breakfastCounter = 0;
				$lunchCounter = 0;
				$dinnerCounter = 0;
				$lateNightCounter = 0;
				$outsideHours =0;

				foreach ($contents['contents'][0] as $user) {

					if ($user["costCenterCode"] == $key) {
						$hour = substr($user['datetime'], -12, 2);
						if ($hour >= 8 && $hour <= 10) {
							$breakfastCounter++;
						} elseif ($hour >= 11 && $hour <= 15) {
							$lunchCounter++;
						} elseif ($hour >= 20 && $hour <= 23) {
							$dinnerCounter++;
						} elseif ($hour >= 2 && $hour <= 4) {
							$lateNightCounter++;
						} else {
							$outsideHours++;
						}
					}
				}
				?>
			<?php 	$i = 0; ?>
				<style>
					ul li {
						float:left;
					}
					ul li.break {
						clear: right;
						display: inline-block;
						width: 33%;
						margin: 10px 0;
					}
				</style>
				<li <?php if ( $i % 3 == 0 ) echo ' class="break"' ?> ><p>Cost Center<b> <?php echo $key ?> </b> served <b><?php echo $value ?></b> meals</p>
					<?php
					echo "<b>Breakfast:- </b> ". $breakfastCounter ." Meals<br>";
					echo "<b>Lunch:-</b> ". $lunchCounter ." Meals<br>";
					echo "<b>Dinner:- </b> ". $dinnerCounter ." Meals<br>";
					echo "<b>Late Night:- </b> ". $lateNightCounter ." Meals<br>";
					echo "<b>Outside Hours:- </b>  ". $outsideHours ." Meals<br>";
					//	echo "<b>Total Meals Served </b>  ". $breakfastCounter + $lunchCounter+ $dinnerCounter + $outsideHours ."<br>";

					}?></li>
				<br>
				<br> <br>
				<?php
				$i++; ?></ul>

		</div>
	</div>
</div>




<div>
	<div class="left">
		<div class="table">
			<div class="table-responsive mb-4 mt-4">
				<table id="zero-config" class="table table-hover" style="width:100%">
					<thead>
					<h5 style="margin-left: 30%">Event Log Report Between <b>  <?php echo $startDate ;?> and   <?php echo $endDate ;?></b></h5>
					<tr>
						<th>#</th>
						<th>User ID</th>
						<th>Name</th>
						<th>Cost Center Code</th>
						<th>Cost Center Name</th>
						<th>Device</th>
						<th>Group ID</th>
						<th>User Group</th>
						<th>Event Type</th>
						<th>Date Time</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$count = 0;
					foreach ($contents['contents'][0] as $user) {

						?>
						<tr>
							<td><?php echo $count + 1 ?></td>
							<td><b><?php
									if(isset($user['user_id'] )){
										echo $user['user_id'];
									}else{
										echo "No User ID";
									}
									?></b></td>
							<td><?php
								if(isset($user['username'] )){
									echo $user['username'];
								}else{
									echo "No Username";
								}
								?></td>
							<td><?php echo $user['costCenterCode'] ?></td>
							<td><?php echo $user['costCenterName'] ?></td>
							<td><?php echo $user['device_id']['name'] ?></td>
							<td><b><?php echo $user['user_group_id']?></b></td>
							<td><?php echo $user['user_group_name'] ?></td>
							<td><b><?php
									if( $user['event_type'] == 4865) {
										echo strtoupper("Fingerprint Identification Successful");
									}?>
								</b></td>
							<td><b><?php echo $user['datetime'] ?></b></td>

						</tr>
						<?php
						$count++;
					} ?>

					</tbody>

				</table>
			</div>


		</div>
	</div>
	<div class="right">
		<div id="canvas">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 400"><?php echo $svg; ?></svg>
		</div>
	</div>
</div>

<div class="footer">

	<div class="footer-inner"> <?php echo date('Y'); ?> &copy; U70XDN.
		<p class="">Powered By Naya Solutions	</p>
<!--		<img src="--><?php //echo base_url(); ?><!--assets/assets/img/nayalogo.png" class="img-fluid mr-2" alt="avatar" style="float: right">-->

	</div>
</div>
</body>

</html>



<?php $this->load->view('template/header'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
<!--	<div class="layout-px-spacing">-->

<!--		<form method="post" action="--><?php //echo base_url() ?><!--prepare_report/email">-->
<!--		-->
<!--			<div class="row layout-top-spacing" id="cancel-row">-->
<!--				<div class="form-row col-9 mb-4">-->
<!--					<div class="form-group col-md-9">-->
<!--						<input type="text" class="form-control col-6" id="email" name="email"-->
<!--							   placeholder="Enter recipient's email" required>-->
<!--						<input type="text" class="form-control col-6" id="data" name="data"-->
<!--							   value="--><?php //echo htmlspecialchars(json_encode($dataPDF)); ?><!--" hidden>-->
<!--						<input type="text" class="form-control col-6" id="startDate" name="startDate"-->
<!--							   value="--><?php //echo $startDate; ?><!--" hidden>-->
<!--						<input type="text" class="form-control col-6" id="endDate" name="endDate"-->
<!--							   value="--><?php //echo $endDate; ?><!--" hidden>-->
<!---->
<!--						<button type="submit" class="btn btn-primary col-3 ">Email Report</button>-->
<!---->
<!--					</div>-->
<!--				</div>-->
<!---->
<!--		</form>-->

<!--	</div>-->

	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<?php
		$count = 0;
		$sums = array();
		if(isset($data)){
			foreach ($data as $vv) {
				$v = $vv["costCenterCode"];
				if (!array_key_exists($v, $sums)) {
					$sums[$v] = 0;
				}
				$sums[$v]++;
			}
			//create array to pass for download pdf
			$dataPDF = array(
					'data' => $data,
					'sums' => $sums
			);
		}


		?>

		<div class="widget-content widget-content-area ">
			<div id="chart">

			</div>
			<img src="<?php echo base_url(); ?>assets/assets/img/logo.png" class="img-fluid mr-2" alt="avatar"
				 style="float: right"><br>
			<h5 style="text-decoration: underline" >Event Log Report Between <b>  <?php if(isset($startData)){echo $startDate ;} ;?> and   <?php if(isset($endDate)){echo $endDate ;}?></b></h5>
		<br>
		 <p style="float:left"><b style="text-decoration: underline"><?php echo "Generated on " . date("d-m-Y") ."  At ". date("H:i:s"). "<br>"; ?></b></p>
			<br><br><h5 style="text-decoration: underline">Report Summary</h5>
					<?php 	$i = 0; ?>
<!--				<style>-->
<!--					ul li {-->
<!--						float:left;-->
<!--					}-->
<!--					ul li.break {-->
<!--						clear: right;-->
<!--						display: inline-block;-->
<!--						width: 33%;-->
<!--						margin: 10px 0;-->
<!--					}-->
<!--				</style>-->

<!--				<li --><?php //if ( $i % 3 == 0 ) echo ' class="break"' ?><!-- >-->

<!--					<p>Cost Center<b> --><?php //echo $key ?><!-- </b> served <b>--><?php //echo $value ?><!--</b> meals</p>-->
					<div class="table-responsive mb-4 mt-4">
						<table class="multi-table table table-hover" style="width:100%">
							<thead>
							<tr>
								<th>Cost Center Code</th>
								<th>Cost Center Name</th>
								<th>Breakfast</th>
								<th>Lunch</th>
								<th>Dinner</th>
								<th>LNT</th>
								<th>Outside Hours</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$costCenterName = '';
							if(isset($sums)){
									arsort($sums);
									//var_dump($sums);
								foreach ($sums as $key => $value) {

									$breakfastCounter = 0;
									$lunchCounter = 0;
									$dinnerCounter = 0;
									$lateNightCounter = 0;
									$outsideHours =0;
									if(isset($data)){
										foreach ($data as $user) {
											//	$costCenterName = $user["costCenterName"] ;

											//do  cost center meal time breakdown
											if ($user["costCenterCode"] == $key) {

												$hour = substr($user['datetime'], -12, 2);
												if ($hour >=$mealTimes[0]->start_hour  && $hour <= $mealTimes[0]->end_hour) {
													$breakfastCounter++;
												} elseif ($hour >= $mealTimes[1]->start_hour && $hour <= $mealTimes[1]->end_hour) {
													$lunchCounter++;
												} elseif ($hour >= $mealTimes[2]->start_hour && $hour <= $mealTimes[2]->end_hour) {
													$dinnerCounter++;
												} elseif ($hour >= $mealTimes[3]->end_hour && $hour <= $mealTimes[3]->end_hour) {
													$lateNightCounter++;
												} else {
													$outsideHours++;
												}

											}


										}
									}

									?>
									<tr>
										<td><b><?php echo $key ?></b></td>
										<td>
											<?php
											$costCenterNames = [];
											if(isset($data)){
												foreach($data as $user){
													$costCenterNames [] = array(
															'costCenterCode' => $user['costCenterCode'],
															'costCenterName' => $user['costCenterName']
													);
												}
											}

											if(isset($costCenterNames)){
												foreach ($costCenterNames as $costcenter){
													if($costcenter['costCenterCode']==$key) {
														$name =$costcenter['costCenterName'];
													}
												}
												echo $name;
											}


											?></td>
										<td><?php echo $breakfastCounter ?></td>
										<td><b><?php echo $lunchCounter ?></b></td>
										<td><b><?php echo $dinnerCounter ?></b></td>
										<td><b><?php echo $lateNightCounter ?></b></td>
										<td><b><?php echo $outsideHours ?></b></td>
										<td><b><?php echo $value ?></b></td>
									</tr>
									<?php
								}

							}
							?>
							</tbody>
							<tfoot>
							<?php
							$sumBreakfast= 0;
							$sumLunch = 0;
							$sumDinner = 0;
							$sumLNT = 0;
							$sumOutsideHours = 0;
							if(isset($data)){
								foreach ($data as $user) {
									//do overall meal time breakdown
									$hours  = substr($user['datetime'], -12, 2);
									if ($hours >= $mealTimes[0]->start_hour && $hours <= $mealTimes[0]->end_hour) {
										$sumBreakfast++;
									} elseif ($hours >= $mealTimes[1]->start_hour && $hours <= $mealTimes[1]->end_hour) {
										$sumLunch++;
									} elseif ($hours >= $mealTimes[2]->start_hour && $hours <= $mealTimes[2]->end_hour) {
										$sumDinner++;
									} elseif ($hours >= $mealTimes[3]->start_hour && $hours <= $mealTimes[3]->end_hour) {
										$sumLNT++;
									} else {
										$sumOutsideHours++;
									}

								}
							}
						?>
							<tr>
								<th class="text-center"></th>
								<th class="text-center">Total  Meals</th>
								<th><b><?php echo ($sumBreakfast) ?></b></th>
								<th><b><?php echo ($sumLunch) ?></th>
								<th><b><?php  echo ($sumDinner) ?></b></th>
								<th><b><?php echo ($sumLNT) ?></b></th>
								<th><b><?php echo ($sumOutsideHours) ?></b></th>
								<th><b><?php echo ($total_events) ?></b></th>
<!--								<th class="text-center">Action</th>-->

							</tr>
							</tfoot>
					</table>
					</div>
<!--	--><?php
//					echo "<b>Breakfast:- </b> ". $breakfastCounter ." Meals<br>";
//					echo "<b>Lunch:-</b> ". $lunchCounter ." Meals<br>";
//					echo "<b>Dinner:- </b> ". $dinnerCounter ." Meals<br>";
//					echo "<b>Late Night:- </b> ". $lateNightCounter ." Meals<br>";
//					echo "<b>Outside Hours:- </b>  ". $outsideHours ." Meals<br>";
//				//	echo "<b>Total Meals Served </b>  ". $breakfastCounter + $lunchCounter+ $dinnerCounter + $outsideHours ."<br>";
//
//				?>
				<?php
				$i++; ?>

<!--					<p style="margin-left: 2%">Total Meals Served:<b>--><?php //echo $total_events; ?><!-- </b></p>-->
					<div class="table-responsive mb-4 mt-4">
						<table id="zero-config" class="table table-hover" style="width:100%">
							<thead>
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
								<th>Date</th>
								<th>Time</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$count = 0;
							if(isset($data)){


								foreach ($data as $user) {
						//	if ($user["costCenterCode"] == $key) {
								?>
									<tr>
										<td><?php echo $count + 1 ?></td>
										<td><b><?php
												if (isset($user['user_id'])) {
													echo $user['user_id'];
												} else {
													echo "No User ID";
												}
												?></b></td>
										<td><?php
											if (isset($user['username'])) {
												echo $user['username'];
											} else {
												echo "No Username";
											}
											?></td>
										<td><?php echo $user['costCenterCode'] ?></td>
										<td><?php echo $user['costCenterName'] ?></td>
										<td><?php if(isset($user['device_id']['name'])){echo $user['device_id']['name'] ; }?></td>
										<td><b><?php echo $user['user_group_id'] ?></b></td>
										<td><?php echo $user['user_group_name'] ?></td>
										<td><b><?php
												if ($user['event_type'] == 4865) {
													echo strtoupper("Fingerprint Identification Successful");
												} ?>
											</b></td>
										<td><b><?php echo substr($user['datetime'], 0, 10);?></b></td>
										<td><b><?php echo substr($user['datetime'], 11, 8);?></b></td>

									</tr>
									<?php
									$count++;
							//	}
							}
							}
								?>

							</tbody>

						</table>
					</div>
					<?php
				//} ?>
			</ul>
		</div>

	</div>
	<p class="">Powered By: </p>
	<img src="<?php echo base_url(); ?>assets/assets/img/nayalogo.png" class="img-fluid mr-2" alt="avatar"
		 style="float: left">
	<form method="post" action="<?php echo base_url() ?>prepare_report/download">

	<div class="form-row col-9 mb-4">
		<?php
		$count = 0;
		$sums = array();
		if(isset($data)){
			foreach ($data as $vv) {
				$v = $vv["costCenterCode"];
				if (!array_key_exists($v, $sums)) {
					$sums[$v] = 0;
				}
				$sums[$v]++;
			}
			//create array to pass for download pdf
			$dataPDF = array(
					'data' => $data,
					'sums' => $sums
			);
		}

		?>
		<div class="form-group col-md-9">
			<input type="text" class="form-control col-6" id="data" name="dataDownload"
				   value="<?php if(isset($dataPDF)){echo htmlspecialchars(json_encode($dataPDF));} ?>" hidden>
			<input type="text" class="form-control col-6" id="startDate" name="startDate"
				   value="<?php if(isset($startDate)){echo $startDate;}; ?>" hidden>
			<input type="text" class="form-control col-6" id="endDate" name="endDate"
				   value="<?php if(isset($endDate)){echo $endDate; }?>" hidden>

			<button type="submit" class="btn btn-danger  mb-2 mr-2" style="float: right">Download
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
						 class="feather feather-download">
						<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">

						</path>
						<polyline points="7 10 12 15 17 10"></polyline>
						<line x1="12" y1="15" x2="12" y2="3"></line>
					</svg>
					Report
				</button></a>

		</div>
	</div>


</div>


<!--  END CONTENT AREA  -->
<?php $this->load->view('template/footer'); ?>
<script>
	var options = {
		series: [{
			<?php
			arsort($sums);
			$sums =  array_slice(	$sums, 0, 5, true) ;
		 ?>
			name: 'Total Meals',
			data: [<?php
				$values= array();
				foreach($sums as $key=> $value){
					$values[]=  $value;
				}
				echo implode(',', $values);
				?>]
		}, {
			name: 'Breakfast',
			data: [<?php
				arsort($sums);
				$sums =  array_slice(	$sums, 0, 5, true) ;
				$bfastValues= array();
				$vals = array();
				foreach($sums as $key=> $value) {
					if (isset($data)) {
						foreach ($data as $user) {
							if ($user["costCenterCode"] == $key) {

								$hour = substr($user['datetime'], -12, 2);
								if ($hour >= $mealTimes[0]->start_hour && $hour <= $mealTimes[0]->end_hour) {
									$bfastValues[] = $breakfastCounter++;
									$vals[] = $value;
								}
							}
						}
					}
				}
				var_dump($bfastValues);
				var_dump($vals);
			//	echo implode(',', $bfastValues);
				?>]
		}, {
			name: 'Lunch',
			data: [<?php
				arsort($sums);
				$sums =  array_slice(	$sums, 0, 5, true) ;
				$lunchValues= array();
				$vals = array();
				$lunchCounter = 0;
				foreach($sums as $key=> $value) {
					if (isset($data)) {
						foreach ($data as $user) {
							if ($user["costCenterCode"] == $key) {
								$hour = substr($user['datetime'], -12, 2);
								if ($hour >= $mealTimes[1]->start_hour && $hour <= $mealTimes[1]->end_hour) {
									$lunchValues= 	$lunchCounter++;
									$vals[] = $value;

								}
							}
						}
					}
				}
				var_dump($lunchValues);
				var_dump($vals);
				//echo implode(',', $lunchValues);
				?>]
		}, {
			name: 'Dinner',
			data: [<?php
				arsort($sums);
				$sums =  array_slice(	$sums, 0, 5, true) ;
				$dinnerValues= array();
				$vals= array();
				$dinnerCounter = 0;
				foreach($sums as $key=> $value) {
					if (isset($data)) {
						foreach ($data as $user) {
							if ($user["costCenterCode"] == $key) {
								$hour = substr($user['datetime'], -12, 2);
								if ($hour >= $mealTimes[2]->start_hour && $hour <= $mealTimes[2]->end_hour) {
									$dinnerValues= 	$dinnerCounter++;
									$vals[] = $value;
								}
							}
						}
					}
				}
				var_dump($dinnerValues);
				var_dump($vals);
				//echo implode(',', $dinnerValues);
				?>]
		}, {
			name: 'LNT',
			data: [<?php
				arsort($sums);
				$sums =  array_slice(	$sums, 0, 5, true) ;
				$LNTValues= array();
				$vals = array();
				$lateNightCounter = 0;
				foreach($sums as $key=> $value) {
					if (isset($data)) {
						foreach ($data as $user) {
							if ($user["costCenterCode"] == $key) {
								$hour = substr($user['datetime'], -12, 2);
								if ($hour >= $mealTimes[3]->start_hour && $hour <= $mealTimes[3]->end_hour) {
									$LNTValues=	$lateNightCounter++;
									$vals[] = $value;

								}
							}
						}
					}
				}
				var_dump($LNTValues);
				var_dump($vals);
				echo implode(',', $LNTValues);
				?>]
		}
		],
		chart: {
			type: 'bar',
			height: 350
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		xaxis: {
			categories: [<?php
				$keys= array();
				foreach($sums as $key=> $value){
					$keys[]=  $key;

				}
				echo implode(',', $keys);
				?>],
			},
			yaxis: {
				title: {
					text: ' (Meals)'
				}
			},
			fill: {
				opacity: 1
			},
			tooltip: {
				y: {
				formatter: function (val) {
					return "" + val + " Meals"
				}
			}
		}
	};

	var chart = new ApexCharts(document.querySelector("#chart"), options);
	chart.render();
</script>

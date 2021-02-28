<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Suprema Reports-CCBA</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/pdf/style.css" media="all" />
</head>
<body>
<header class="clearfix">
	<div id="logo">
		<img src="https://www.ccbagroup.com/wp-content/themes/CSI/style/images/logo.png" height="83px" width="370px" alt="">
	</div>
	<h4> Event Log Report Between:  <b><?php echo $startDate ;?></b>  and <b>  <?php echo $endDate ;?></b>
	 Generated On:-  <b><?php echo date("Y-m-d")  ;?>  at  <?php echo  date("H:i:s"); ?></b>
	</h4>
	<div id="company">
		<div></div>
		<div></div>
		<div id="duration">


		</div>
	</div>

</header>
<h1>Report Summary</h1>
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
<main>
	<table >
		<thead>
		<tr>
			<th class="service">Cost Center Code</th>
			<th class="desc">Cost Center Name</th>
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
		arsort($sums);
		foreach ($sums as $key => $value) {
			$breakfastCounter = 0;
			$lunchCounter = 0;
			$dinnerCounter = 0;
			$lateNightCounter = 0;
			$outsideHours =0;

			foreach ($contents['contents'][0] as $user) {

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
			?>
			<tr>
				<td  class="service"><b><?php echo $key ?></b></td>
				<td class="desc"><?php
					$costCenterNames = [];
					foreach($contents['contents'][0]  as $user){
						$costCenterNames [] = array(
							'costCenterCode' => $user['costCenterCode'],
							'costCenterName' => $user['costCenterName']
						);

					}
					foreach ($costCenterNames as $costcenter){
						if($costcenter['costCenterCode']==$key) {

							$name =$costcenter['costCenterName'];

						}
					}

					echo $name;

					?></td>
				<td class="unit"><?php echo $breakfastCounter ?></td>
				<td class="qty"><b><?php echo $lunchCounter ?></b></td>
				<td><?php echo $dinnerCounter ?></td>
				<td><?php echo $lateNightCounter ?></td>
				<td><?php echo $outsideHours ?></td>
				<td class="total"><b><?php echo $value ?></b></td>
			</tr>
			<?php
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
		foreach ($contents['contents'][0] as $user) {
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

		}?>
		<tr>
			<th class="text-center"></th>
			<th>Total  Meals</th>
			<th ><b><?php echo ($sumBreakfast) ?></b></th>
			<th><b><?php echo ($sumLunch) ?></b></th>
			<th><b><?php  echo ($sumDinner) ?></b></th>
			<th><b><?php echo ($sumLNT) ?></b></th>
			<th><b><?php echo ($outsideHours) ?></b></th>
			<th><b><?php echo  sizeof($contents['contents'][0]) ?></b></th>
			<!--								<th class="text-center">Action</th>-->

		</tr>
		</tfoot>
	</table>
	<h1></h1>
	<h1>Report</h1>

	<table >
		<thead>
		<tr>
			<th class="service">#</th>
			<th class="desc">User ID</th>
			<th class="service">Username</th>
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
		foreach ($contents['contents'][0] as $user) {

			?>
			<tr>
				<td  class="service"><b><?php echo $count + 1 ?></b></td>
				<td class="desc"><?php
					if(isset($user['user_id'] )){
						echo $user['user_id'];
					}else{
						echo "No User ID";
					}
					?></td>
				<td class="unit"><?php
					if(isset($user['username'] )){
						echo $user['username'];
					}else{
						echo "No Username";
					}
					?></td>
				<td class="qty"><b><?php echo $user['costCenterCode']  ?></b></td>
				<td><?php echo $user['costCenterName']  ?></td>
				<td><?php echo $user['device_id']['name'] ?></td>
				<td><?php echo  $user['user_group_id'] ?></td>
				<td><?php echo  $user['user_group_name']?></td>
				<td><?php
					if( $user['event_type'] == 4865) {
						echo strtoupper("Fingerprint Identification Successful");
					}?></td>
				<td><?php echo substr($user['datetime'], 0, 10);?></td>
				<td class="total"><b><?php echo substr($user['datetime'], 11, 8);?></b></td>
			</tr>
			<?php
			$count++;
		} ?>
		</tbody>
	</table>

</main>
</body>
</html>

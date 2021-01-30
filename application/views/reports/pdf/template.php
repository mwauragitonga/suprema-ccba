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
		float: left;
	}

	.reportImage img{
		float: left;
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
<!--		<div class="reportImage">-->
<!--			<img src="--><?php //echo base_url('profile_pictures/'.$user_details->prof_img); ?><!--"  height="120px" width="110px" alt="">-->
<!--			<p><small>--><?php //echo "Printed on " . date("d/m/Y") . "<br>"; ?><!--</small></p>-->
<!--		</div>-->
<!--		<div class="reportDetails">-->
<!--			<p>Student Name: --><?php //echo $user_details->fname.' '.$user_details->lname ?><!--</p>-->
<!--			<p>School: --><?php //echo $user_details->name ?><!--</p>-->
<!--			<p>Level: --><?php //echo $user_details->level_name ?><!--</p>-->
		</div>
	</div>
</div>




<div>
	<div class="left">
		<div class="table">
			<div class="table-responsive mb-4 mt-4">
				<table id="zero-config" class="table table-hover" style="width:100%">
					<thead>
					<h5 style="margin-left: 40%"><b> Event Log Report </b></h5>
					<tr>
						<th>#</th>
						<th>User ID</th>
						<th>Name</th>
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
					//	var_dump($contents);
					foreach ($contents as $user) { ?>
						<tr>
							<td><?php echo $count + 1 ?></td>
							<td><b><?php
									if(isset($user['user_id']['user_id'] )){
										echo $user['user_id']['user_id'];
									}else{
										echo "No User ID";
									}
									?></b></td>
							<td><?php
								if(isset($user['user_id']['name'] )){
									echo $user['user_id']['name'];
								}else{
									echo "No Username";
								}
								?></td>
							<td><?php echo $user['device_id']['name'] ?></td>
							<td><b><?php echo $user['user_group_id']['id'] ?></b></td>
							<td><?php echo $user['user_group_id']['name'] ?></td>
							<td><b><?php echo $user['event_type_id']['code'] ?></b></td>
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
	<div class="footer-inner"> <?php echo date('Y'); ?> &copy; Dawati.
		<a href="https://www.dawati.co.ke" title="Dawati" target="_blank">www.dawati.co.ke</a>
	</div>
</div>
</body>

</html>



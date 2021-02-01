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
		list-style-image: url('https://www.ccbagroup.com/wp-content/themes/CSI/style/images/logo.png');
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
		<div class="reportImage" >
			<img  height="120px" width="310px" alt=""><br>

		</div>
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
			<h4 style="margin-left: 5%"><b>Report Summary</b></h4>
			<ul>
				<?php
				foreach($sums as $key=>$value){ ?>
					<li>	<p>Cost Center<b> <?php  echo $key?> </b> served <b><?php  echo $value?></b> meals</p></li>
					<?php
				} ?>
		</div>
	</div>
</div></div>




<div>
	<div class="left">
		<div class="table">
			<div class="table-responsive mb-4 mt-4">
				<table id="zero-config" class="table table-hover" style="width:100%">
					<thead>
					<h5 style="margin-left: 40%"><b> Event Log Report </b></h5>
<!--					<p><small>--><?php //echo "Printed on " . date("d/m/Y") . "<br>"; ?><!--</small></p><br>-->
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



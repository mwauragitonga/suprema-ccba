<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Suprema Reports - Nairobi Bottlers Limited</title>
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/assets/img/favicon.ico"/>
	<link href="<?php echo base_url(); ?>assets/assets/css/loader.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>assets/assets/js/loader.js"></script>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/plugins/noUiSlider/nouislider.min.css" rel="stylesheet" type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/table/datatable/datatables.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/table/datatable/dt-global_style.css">
	<link href="<?php echo base_url(); ?>assets/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" class="dashboard-analytics" />
	<link href="<?php echo base_url(); ?>assets/assets/css/dashboard/dash_2.css" rel="stylesheet" type="text/css" class="dashboard-sales" />
	<link href="<?php echo base_url(); ?>assets/assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/plugins/noUiSlider/custom-nouiSlider.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-range-Slider/bootstrap-slider.css" rel="stylesheet" type="text/css">

	<style>
		.table-bordered td, .table-bordered th { border: 1px solid #ebedf2; }
	</style>
	<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="dashboard-analytics">

<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
			<div class="spinner-grow align-self-center"></div>
		</div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area ">

			<img src="<?php echo base_url(); ?>assets/assets/img/logo.png" class="img-fluid mr-2" alt="avatar" >
			<div class="table-responsive mb-4 mt-4">
				<table id="zero-config" class="table table-hover" style="width:100%">
					<thead>
					<h5 style="margin-left: 30%">Event Log Report Between <b>  <?php echo $startDate ;?> and   <?php echo $endDate ;?></b></h5>
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
					//var_dump($contents['contents'][0]);
					foreach ($contents['contents'][0] as $user) { ?>
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

	<div class="footer-wrapper">
		<div class="footer-section f-section-1">
<!--			<p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">U70XDN</a></p>-->
		</div>
		<div class="footer-section f-section-2">
			<img src="<?php echo base_url(); ?>assets/assets/img/nayalogo.png" class="img-fluid mr-2" alt="avatar" style="float: right">
			<p class="">Powered By Naya Solutions	</p>
		</div>
	</div>
</div>
<!--  END CONTENT AREA  -->


</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/app.js"></script>

<script>
	$(document).ready(function() {
		App.init();
	});
</script>
<script src="<?php echo base_url(); ?>assets/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/assets/js/dashboard/dash_1.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/dashboard/dash_2.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/scrollspyNav.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flatpickr/flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/noUiSlider/nouislider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/flatpickr/custom-flatpickr.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/noUiSlider/custom-nouiSlider.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-range-Slider/bootstrap-rangeSlider.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/table/datatable/datatables.js"></script>
<script>
	$('#zero-config').DataTable({
		"oLanguage": {
			"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
			"sInfo": "Showing page _PAGE_ of _PAGES_",
			"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
			"sSearchPlaceholder": "Search...",
			"sLengthMenu": "Results :  _MENU_",
		},
		"stripeClasses": [],
		"lengthMenu": [7, 10, 20, 50],
		"pageLength": 7
	});
</script>

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>

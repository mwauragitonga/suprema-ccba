<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>Suprema Reports - CocaCola Beverages Africa</title>
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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/table/datatable/custom_dt_multiple_tables.css">
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
	<header class="header navbar navbar-expand-sm">
		<ul class="navbar-item flex-row">
			<li class="nav-item align-self-center page-heading">
				<div class="page-header">
					<div class="page-title">
						<h3></h3>
					</div>
				</div>
			</li>
		</ul>
		<a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>

		<ul class="navbar-item flex-row search-ul">

		</ul>

		<ul class="navbar-item flex-row navbar-dropdown">


			<li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
				<a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
				</a>
				<div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
					<div class="user-profile-section">
						<div class="media mx-auto">
							<img src="<?php echo base_url(); ?>assets/assets/img/icon.png" class="img-fluid mr-2" alt="avatar">
							<div class="media-body">
								<h5>Admin</h5>
								<p> Embakasi</p>
							</div>
						</div>
					</div>
					<div class="dropdown-item">
						<a href="#">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
						</a>
					</div>
				</div>
			</li>
		</ul>
	</header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

	<div class="overlay"></div>
	<div class="search-overlay"></div>


	<?php $this->load->view('template/sidebar'); ?>


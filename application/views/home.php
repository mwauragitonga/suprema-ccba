<?php $this->load->view("template/header.php") ?>

	<!--  BEGIN CONTENT AREA  -->
	<div id="content" class="main-content">
		<div class="layout-px-spacing">

			<div class="row layout-top-spacing">

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
					<div class="widget widget-one">
						<div class="widget-heading">
							<h6 class="">Statistics</h6>
						</div>
						<div class="w-chart">
							<div class="w-chart-section">
								<div class="w-detail">
									<p class="w-title">Total Visits</p>
									<p class="w-stats">423,964</p>
								</div>

							</div>

							<div class="w-chart-section">
								<div class="w-detail">
									<p class="w-title">Paid Visits</p>
									<p class="w-stats">7,929</p>
								</div>

							</div>
							<div class="w-chart-section">
								<div class="w-detail">
									<p class="w-title">Paid Visits</p>
									<p class="w-stats">7,929</p>
								</div>

							</div>
							<div class="w-chart-section">
								<div class="w-detail">
									<p class="w-title">Paid Visits</p>
									<p class="w-stats">7,929</p>
								</div>

							</div>



						</div>
					</div>
				</div>
<br>
<br>
<br>


				<div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
					<div class="widget widget-chart-three">
						<div class="widget-heading">
							<div class="">
								<h5 class="">Unique Visitors</h5>
							</div>

							<div class="dropdown  custom-dropdown">
								<a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
									<a class="dropdown-item" href="javascript:void(0);">View</a>
									<a class="dropdown-item" href="javascript:void(0);">Update</a>
									<a class="dropdown-item" href="javascript:void(0);">Download</a>
								</div>
							</div>
						</div>

						<div class="widget-content">
							<div id="uniqueVisits"></div>
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
					<div class="widget widget-activity-three">

						<div class="widget-heading">
							<h5 class="">Notifications</h5>
						</div>

						<div class="widget-content">

							<div class="mt-container mx-auto">
								<div class="timeline-line">

									<div class="item-timeline timeline-new">
										<div class="t-dot">
											<div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
										</div>
										<div class="t-content">
											<div class="t-uppercontent">
												<h5>Logs</h5>
												<span class="">27 Feb, 2020</span>
											</div>
											<p><span>Updated</span> Server Logs</p>
											<div class="tags">
												<div class="badge badge-primary">Logs</div>
												<div class="badge badge-success">CPanel</div>
												<div class="badge badge-warning">Update</div>
											</div>
										</div>
									</div>

									<div class="item-timeline timeline-new">
										<div class="t-dot">
											<div class="t-success"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
										</div>
										<div class="t-content">
											<div class="t-uppercontent">
												<h5>Mail</h5>
												<span class="">28 Feb, 2020</span>
											</div>
											<p>Send Mail to <a href="javascript:void(0);">HR</a> and <a href="javascript:void(0);">Admin</a></p>
											<div class="tags">
												<div class="badge badge-primary">Admin</div>
												<div class="badge badge-success">HR</div>
												<div class="badge badge-warning">Mail</div>
											</div>
										</div>
									</div>

									<div class="item-timeline timeline-new">
										<div class="t-dot">
											<div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
										</div>
										<div class="t-content">
											<div class="t-uppercontent">
												<h5>Task Completed</h5>
												<span class="">01 Mar, 2020</span>
											</div>
											<p>Backup <span>Files EOD</span></p>
											<div class="tags">
												<div class="badge badge-primary">Backup</div>
												<div class="badge badge-success">EOD</div>
											</div>
										</div>
									</div>

									<div class="item-timeline timeline-new">
										<div class="t-dot">
											<div class="t-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg></div>
										</div>
										<div class="t-content">
											<div class="t-uppercontent">
												<h5>Collect Docs</h5>
												<span class="">10 Mar, 2020</span>
											</div>
											<p>Collected documents from <a href="javascript:void(0);">Sara</a></p>
											<div class="tags">
												<div class="badge badge-success">Collect</div>
												<div class="badge badge-warning">Docs</div>
											</div>
										</div>
									</div>

									<div class="item-timeline timeline-new">
										<div class="t-dot">
											<div class="t-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg></div>
										</div>
										<div class="t-content">
											<div class="t-uppercontent">
												<h5>Reboot</h5>
												<span class="">06 Apr, 2020</span>
											</div>
											<p>Server rebooted successfully</p>
											<div class="tags">
												<div class="badge badge-warning">Reboot</div>
												<div class="badge badge-primary">Server</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>

	<?php $this->load->view('template/footer');

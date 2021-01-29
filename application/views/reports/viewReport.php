<?php  $this->load->view('template/header'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="container">
		<div class="container">
			<div class="row layout-top-spacing" id="cancel-row">

				<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
					<div class="widget-content widget-content-area ">
						<div class="table-responsive mb-4 mt-4">
							<table id="zero-config" class="table table-hover" style="width:100%">
								<thead>
								<tr>
									<th>#</th>
									<th>User ID</th>
									<th>Name</th>
									<th>Cost Center</th>
									<th>Group ID</th>
									<th>User Group</th>
									<th>Event Type</th>
									<th>Date Time</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$count = 0;
								 		foreach($contents as $user){ ?>
								<tr>
									<td><?php echo   $count + 1  ?></td>
									<td ><b><?php echo   $user['user_id']['user_id']  ?></b></td>
									<td><?php echo   $user['user_id']['name']  ?></td>
									<td><?php echo   $user['device_id']['name']  ?></td>
									<td><b><?php echo   $user['user_group_id']['id']  ?></b></td>
									<td><?php echo   $user['user_group_id']['name']  ?></td>
									<td><b><?php echo   $user['event_type_id']['code']  ?></b></td>
									<td><b><?php echo   $user['datetime']  ?></b></td>

								</tr>
					<?php
								 		$count ++;
								 		} ?>

								</tbody>

							</table>
						</div>
					</div>
				</div>

			</div>


		</div>
	</div>


	<!--  END CONTENT AREA  -->
	<?php  $this->load->view('template/footer');?>

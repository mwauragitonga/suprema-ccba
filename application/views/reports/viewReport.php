<?php $this->load->view('template/header'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="layout-px-spacing">
		<form method="post" action="<?php echo base_url() ?>email_report">
			<?php
			$count = 0;
			$sums = array();
			foreach($data as $vv){
				$v = $vv["costCenterCode"];
				if(!array_key_exists($v,$sums)){
					$sums[$v] = 0;
				}
				$sums[$v]++;
			}

			//create array to pass for download pdf
			$dataPDF = array(
					'data'=> $data,
					'sums' => $sums
			);
			?>
			<div class="row layout-top-spacing" id="cancel-row">
				<div class="form-row col-9 mb-4">
					<div class="form-group col-md-9">
						<input type="text" class="form-control col-6" id="email" name="email"
							   placeholder="Enter recipient's email" required>
						<input type="text" class="form-control col-6" id="data" name="data"
							   value="<?php echo htmlspecialchars(json_encode($dataPDF));?>" hidden>
<input type="text" class="form-control col-6" id="startDate" name="startDate"
							   value="<?php echo $startDate;?>" hidden>
<input type="text" class="form-control col-6" id="endDate" name="endDate"
							   value="<?php echo $endDate;?>" hidden>

						<button type="submit" class="btn btn-primary col-3 ">Email Report</button>

					</div>
				</div>

		</form>

	</div>

	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area ">
			<img src="<?php echo base_url(); ?>assets/assets/img/logo.png" class="img-fluid mr-2" alt="avatar"style="float: right">

			<h5>Report Summary</h5>
			<ul>
				<?php
				 foreach($sums as $key=>$value){ ?>
			<li>	<p>Cost Center<b> <?php  echo $key?> </b> served <b><?php  echo $value?></b> meals</p></li>
			<?php
				 } ?>
			</ul>
			<p style="margin-left: 2%">Total Meals Served:<b><?php echo $total_events ;?> </b></p>
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


					foreach ($data as $user) {


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
	<p class="">Powered By:	</p>
	<img src="<?php echo base_url(); ?>assets/assets/img/nayalogo.png" class="img-fluid mr-2" alt="avatar" style="float: left">

	<button class="btn btn-danger  mb-2 mr-2" style="float: right">Download
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
			 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
			 class="feather feather-download">
			<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">

			</path>
			<polyline points="7 10 12 15 17 10"></polyline>
			<line x1="12" y1="15" x2="12" y2="3"></line>
		</svg>
		Report
	</button>


</div>




<!--  END CONTENT AREA  -->
<?php $this->load->view('template/footer'); ?>

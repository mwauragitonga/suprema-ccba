<?php  $this->load->view('template/header'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="col-lg-12 col-xl-12 col-12 layout-spacing">
		<div class="statbox widget box box-shadow">
			<div class="widget-header">
				<div class="row">
					<div class="col-xl-12 col-md-12 col-sm-12 col-12">
					</div>
				</div>
			</div>
			<div class="row">
				<div id="flFormsGrid" class="col-xl-10 col-lg-12 layout-spacing">
					<div class="widget-header">
						<div class="row">
							<div class="col-xl-12 col-md-12 col-sm-12 col-12" >
								<h4 style="margin-left: 50%">View Users</h4>
							</div>
						</div>
					</div>
					<div class="table-responsive mb-4 mt-4">
						<table id="zero-config" class="table table-hover" style="width:100%">
							<thead>
							<tr>
								<th>#</th>
								<th>User ID</th>
								<th>Name</th>
								<th>Cost Center Code</th>
								<th>Cost Center Name</th>
								<th>Group ID</th>
								<th>User Group</th>
								<th>Expiry Date</th>
							</tr>
							</thead>
							<tbody>
							<?php
							//var_dump($userArray);
							$count = 0;
							$costCentreName= '';
							$costCentreCode='';
							foreach($userArray  as $user)
								{
									if(isset($user['user_custom_fields'])) {
										$size = sizeof($user['user_custom_fields']);
										//var_dump($size);
										if ($size == 5) {

											if (isset($user['user_custom_fields'][1]['item'])) {
												$costCentreName = $user['user_custom_fields'][1]['item'];

											} else {
												$costCentreName = 'No Cost Center Name';
											}

											if (isset($user['user_custom_fields'][2]['item'])) {
												$costCentreCode = $user['user_custom_fields'][2]['item'];
											} else {
												$costCentreCode = 'No Cost Center Code';
											}

										}else if($size == 4) {

											if (isset($user['user_custom_fields'][1]['item'])) {
												$costCentreCode = $user['user_custom_fields'][1]['item'];
												$costCentreName = "No Cost Center Name";

											}else{
												$costCentreCode = "No Cost Center Code";
												$costCentreName =  "No Cost Center Name";
											}

										}else if($size < 4){

											$costCentreCode = "No Cost Center Code";
											$costCentreName =  "No Cost Center Name";
										}
									}
									else{
										$costCentreName= 'No Custom User Fields';
										$costCentreCode='No Custom User Fields';
									}
									?>
							<tr>
								<td><?php echo $count + 1 ?></td>
								<td><b><?php echo $user['user_id'] ?></b></td>
								<td><?php echo $user['name'] ?></td>
								<td><b><?php echo $costCentreCode ?></b></td>
								<td><?php echo $costCentreName ?></td>
								<td><b><?php echo $user['user_group_id']['id'] ?></b></td>
								<td><?php echo $user['user_group_id']['name'] ?></td>
								<td><?php echo $user['expiry_datetime'] ?></td>

							</tr>

						<?php
							$count++;
							}							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--  END CONTENT AREA  -->
	<?php  $this->load->view('template/footer');?>

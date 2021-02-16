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
								<h4 style="margin-left: 50%">Adjust Meal Times<small><h6>Use 24 Hour Clock System</h6></small></h4>
							</div>
						</div>
						<!--	message alerts-->
						<div class="form-group col-md-4">
						</div>
						<div class="col-xl-6 col-md-6 col-sm-12 col-7" style="margin-left: 40%">
							<?php if (!empty($message) && $messageType == 1) { ?>
								<div class="alert alert-success mb-4" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											 viewBox="0 0 24 24" fill="none" stroke="currentColor"
											 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
											 class="feather feather-x close" data-dismiss="alert">
											<line x1="18" y1="6" x2="6" y2="18"></line>
											<line x1="6" y1="6" x2="18" y2="18"></line>
										</svg>
									</button>
									<strong><?php echo $message; ?></strong>
								</div>
							<?php } elseif (!empty($message) && $messageType == 2) { ?>
								<div class="alert alert-danger mb-4" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
											 viewBox="0 0 24 24" fill="none" stroke="currentColor"
											 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
											 class="feather feather-x close" data-dismiss="alert">
											<line x1="18" y1="6" x2="6" y2="18"></line>
											<line x1="6" y1="6" x2="18" y2="18"></line>
										</svg>
									</button>
									<strong><?php echo $message; ?></strong>
								</div>
							<?php } ?>
						</div>
					</div>
					<form  method="post" action="<?php echo base_url() ?>adjustMealTimes">
						<div class="form-row mb-4">
							<div class="form-group col-md-4">
							</div>
							<div class="form-group col-md-4">
								<label for=""><b>BreakFast Start</b></label>
								<input type="number" min="0" max="10"  class="form-control" id="" placeholder="BreakFast Start Hour "
									   name="bFastStart" value="<?php echo $mealTimes[0]->start_hour ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4"><b>BreakFast End</b></label>
								<input type="number" min="0" max="10"  class="form-control" id="inputPassword4" placeholder="BreakFast End Hour"
									   name="bFastEnd" value="<?php echo $mealTimes[0]->end_hour ?>">
							</div>
						</div>
							<div class="form-row mb-4">
							<div class="form-group col-md-4">
							</div>
							<div class="form-group col-md-4">
								<label for=""><b>Lunch Start</b></label>
								<input type="number" min="11" max="17" class="form-control" id="inputPassword4" placeholder="Lunch Start Hour "
									   name="lunchStart" value="<?php echo $mealTimes[1]->start_hour ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4"><b>Lunch End</b></label>
								<input type="number"  min="11" max="17" class="form-control" id="inputPassword4" placeholder="Lunch End Hour"
									   name="lunchEnd" value="<?php echo $mealTimes[1]->end_hour ?>">
							</div>
						</div>

							<div class="form-row mb-4">
							<div class="form-group col-md-4">
							</div>
							<div class="form-group col-md-4">
								<label for=""><b>Dinner Start</b></label>
								<input type="number" min="18" max="23"  class="form-control" id="inputPassword4" placeholder="Dinner Start Hour "
									   name="dinnerStart" value="<?php echo $mealTimes[2]->start_hour ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4"><b>Dinner End</b></label>
								<input type="number"  min="18" max="23" class="form-control" id="inputPassword4" placeholder="Dinner End Hour"
									   name="dinnerEnd" value="<?php echo $mealTimes[2]->end_hour ?>">
							</div>
						</div>

							<div class="form-row mb-4">
							<div class="form-group col-md-4">
							</div>
							<div class="form-group col-md-4">
								<label for=""><b>Late Night Tea Start</b></label>
								<input type="number"  min="00" max="06"  class="form-control" id="inputPassword4" placeholder="Late Night Tea Start Start Hour "
									   name="LNTStart" value="<?php echo $mealTimes[3]->start_hour ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4"><b>Late Night Tea End</b></label>
								<input type="number"  min="00" max="06"  class="form-control" id="inputPassword4" placeholder="Late Night Tea Start End Hour"
									   name="LNTEnd" value="<?php echo $mealTimes[3]->end_hour ?>">
							</div>
						</div>
						<div class="form-row mb-4">
							<div class="form-group col-md-4">
							</div>
							<div class="form-group col-md-6">
								<button type="submit" class="btn btn-dark">Update</button>

							</div>
						</div>



					</form>

				</div>
			</div>
		</div>
	</div>


	<!--  END CONTENT AREA  -->
	<?php  $this->load->view('template/footer');?>

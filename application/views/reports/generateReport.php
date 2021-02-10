<?php  $this->load->view('template/header'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
	<div class="container">
		<div class="container">
			<div class="col-lg-12 col-12 layout-spacing">
				<div class="statbox widget box box-shadow">
					<div class="widget-header">
						<div class="row">
							<div class="col-xl-12 col-md-12 col-sm-12 col-12">
							</div>
						</div>
					</div>
					<div class="widget-content widget-content-area">
						<div class="row">
							<div id="flFormsGrid" class="col-lg-12 layout-spacing">
								<div class="statbox widget box box-shadow">
									<div class="widget-header">
										<div class="row">
											<div class="col-xl-12 col-md-12 col-sm-12 col-12" >
												<h4 style="margin-left: 50%">Generate Report</h4>
											</div>
										</div>
									</div>
									<div class="widget-content widget-content-area">
										<form  method="post" action="<?php echo base_url() ?>generate_report">
											<div class="form-row mb-4">
												<div class="form-group col-md-6">

												</div>
												<div class="form-group col-md-6">
													<label for="inputPassword4">Date</label>
													<input id="rangeCalendarFlatpickr" name="date" class="form-control flatpickr flatpickr-input active" type="text" placeholder="Select Date.." required>
												</div>
											</div>

<!--											<div class="form-row mb-4">-->
<!--												<div class="form-group col-md-6">-->
<!--												</div>-->
<!--												<div class="form-group col-md-6">-->
<!--													<label for="costcenter">Cost Center</label>-->
<!--													<select id="costcenter"  name="costcenter" class="form-control" required>-->
<!--														<option selected>Choose...</option>-->
<!--														<option value="1">Canteen</option>-->
<!--													</select>-->
<!--												</div>-->
<!--											</div>-->
<!--											<div class="form-row mb-4">-->
<!--												<div class="form-group col-md-6">-->
<!--												</div>-->
<!--												<div class="form-group col-md-6">-->
<!--													<label for="mealTime">Meal Time</label>-->
<!--													<select id="mealTime" name="mealTime" class="form-control" required>-->
<!--														<option selected>Choose...</option>-->
<!--														<option value="1">Breakfast</option>-->
<!--														<option value="2">Lunch </option>-->
<!--														<option value="3">Dinner</option>-->
<!--														<option value="4">Late Night Tea</option>-->
<!--													</select>-->
<!--												</div>-->
<!--											</div>-->
											<div class="form-row mb-4">
												<div class="form-group col-md-6">

												</div>
												<div class="form-group col-md-6">
													<label for="inputPassword4">Device</label>
													<input type="password" class="form-control" id="inputPassword4" placeholder="Embakasi Canteen ">
												</div>
											</div>
											<div class="form-row mb-4">
												<div class="form-group col-md-4">

												</div>
												<div class="form-group col-md-2">

												</div>
<!--												<div class="form-group col-md-6">-->
<!--													<div class="custom-control custom-checkbox checkbox-info">-->
<!--														<input type="checkbox" class="custom-control-input" id="gridCheck" name="check">-->
<!--														<label class="custom-control-label" for="gridCheck"></label>-->
<!--													</div>-->
<!--													<label for="inputCity">Email</label>-->
<!--													<input type="text" class="form-control" id="email" name="email">-->
<!--												</div>-->

											</div>
											<div class="form-row mb-4">
												<div class="form-group col-md-6">
												</div>
												<div class="form-group col-md-6">
													<button type="submit" class="btn btn-primary mt-9">Generate Report</button>

												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>



		</div>
	</div>


<!--  END CONTENT AREA  -->
<?php  $this->load->view('template/footer');?>

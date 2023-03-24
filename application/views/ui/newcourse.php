<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body>
	 
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css"
	      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="<?php echo base_url(); ?>assets/wizard/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>assets/wizard/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?php echo base_url(); ?>assets/wizard/css/demo.css" rel="stylesheet" />


	<div class="body-wrapper">
		<!-- partial:partials/_sidebar.html -->
		<?php include('sidebar.php'); ?>
		<!-- partial -->
<div class="main-wrapper mdc-drawer-app-content">
	<!-- partial:partials/_navbar.html -->
	<?php include('nav.php'); ?>
	<!-- partial -->

	<div class="page-wrapper mdc-toolbar-fixed-adjust">
		<main class="content-wrapper">
			<div class="mdc-layout-grid">
				<div class="mdc-layout-grid__inner">
					<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
						<div class="mdc-card">
							<div class="d-flex justify-content-between">
								<button
									class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
									style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">Add Course</button>
									
							 </div>
							 
							<div class="template-demo">
								<h5 class="card-sub-title mb-2 mb-sm-0"></h5>
								<div class="menu-button-container">
									<div class="mdc-card">
										<form id="courseadd" name="courseadd"
											action="<?php echo base_url(); ?>courses/course_adding"
											method="POST" enctype="multipart/form-data">
											<div class="mdc-layout-grid">
												<div class="mdc-layout-grid__inner">
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
														<div class="mdc-text-field w-100 mdc-ripple-upgraded">
															<input class="mdc-text-field__input"
																id="test_temp_id" name="test_temp_id"
																type="hidden"
																value="<?php echo $this->uri->segment(3); ?>">
															<input type="hidden" name="courseid"
																value="<?php echo $this->uri->segment(3); ?>" />
															<input class="mdc-text-field__input"
																id="course_title" name="course_title"
																type="text" class="form-control"
																placeholder="Title"
																value="<?php echo isset($details[0]) ? $details[0]->course_title : ""; ?>"
																onkeypress="return NumbersOnly(this,event)">
															<div class="mdc-line-ripple"></div>
															<label for="text-field-hero-input"
																class="mdc-floating-label">Title</label>
														</div>
													</div>

													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
														<div class="mdc-text-field w-100 mdc-ripple-upgraded">
															<div class="mdc-line-ripple"></div>
															<label for="text-field-hero-input"
																class="mdc-floating-label">Program Type </label>
															<select class="mdc-text-field__input training_type"
																name="training_type" id="training_type">
																<option disabled selected value> </option>

															</select>
														</div>
													</div>
													<input type="hidden" name="id" id="id"
														value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['id'] : '' ?>">

													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
														<div class="mdc-text-field w-100 mdc-ripple-upgraded">
															<div class="mdc-line-ripple"></div>
															<label for="text-field-hero-input"
																class="mdc-floating-label">Program Group
															</label>
															<select class="mdc-text-field__input training_type"
																name="program_group" id="program_group">
																<option disabled selected value> </option>

															</select>
														</div>
													</div>
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
														<div class="mdc-text-field w-100 mdc-ripple-upgraded">
															<div class="mdc-line-ripple"></div>
															<label for="text-field-hero-input"
																class="mdc-floating-label">Program Name </label>
															<select class="mdc-text-field__input training_type"
																name="program_name" id="program_name">
																<option disabled selected value> </option>

															</select>
														</div>
													</div>
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
														<div class="mdc-text-field w-100 mdc-ripple-upgraded">
															<div class="mdc-line-ripple"></div>
															<label for="text-field-hero-input"
																class="mdc-floating-label">PDF file </label>

														</div>
													</div>
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
														<input type="file" name="ssi-upload" multiple
															id="ssi-upload" / style="width: 474px;">
													</div>
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
														<div class="mdc-text-field w-100 mdc-ripple-upgraded">
															<div class="mdc-line-ripple"></div>
															<label for="text-field-hero-input"
																class="mdc-floating-label">Description </label>

														</div>
													</div>
													<div>

													</div>

													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
													</div>
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
														<button type="submit"
															class=" btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded 		vertical-center"
															style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right;     width: 200px;">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;

														<a href="<?php echo base_url('main/emp'); ?>"
															class=" mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded"
															style="--mdc-ripple-fg-size:70px; --mdc-ripple-fg-scale:1.90907; --mdc-ripple-fg-translate-start:8.11121px, -9.33333px; --mdc-ripple-fg-translate-end:24.1389px, -17px;     width: 200px;  ">Cancel</a>
													</div>
													<div
														class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
		<!--   Big container   -->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<!--      Wizard container        -->
						<div class="wizard-container">
							<div class="card wizard-card" data-color="red" id="wizard">
								<form action="" method="">
									<!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

									<div class="wizard-header">
										<h3 class="wizard-title">
											 Add Test Questions
										</h3>
										<h5></h5>
									</div>
									<div class="wizard-navigation">
										<ul>
											<li><a href="#details" data-toggle="tab">Pre Test</a></li>
											<li><a href="#captain" data-toggle="tab">Post Test</a></li>
											<li><a href="#description" data-toggle="tab">Pre/Post Test</a></li>
										</ul>
									</div>

									<div class="tab-content">
										<div class="tab-pane" id="details">
											<div class="row">
												<div class="col-sm-12">
													<h4 class="info-text"> Let's start with the basic details.
													</h4>
												</div>
											<div class="row">
												<div class="col-sm-10 col-sm-offset-1">
													<div class="form-group">
														<label>Question</label>
														<textarea class="form-control" placeholder=""
															rows="4"></textarea>
													</div>
												</div>
												<div class="col-sm-10 col-sm-offset-1">
													<div class="picture-container">
														<div class="picture">
															<img src="<?php echo base_url(); ?>assets/wizard/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
															<input type="file" id="wizard-picture">
														</div>
														<h6>Choose Image</h6>
													</div>
		                                	   </div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
													<div class="form-group label-floating">
														<label class="control-label">Option A</label>
														<input name="option1" type="text" class="form-control">
													</div>
												</div>

												<div class="input-group">
													 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
													<div class="form-group label-floating">
														<label class="control-label">Option B</label>
														<input name="option2" type="text"
															class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
													<div class="input-group">
														 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Option C</label>
															<input name="option3" type="text" class="form-control">
														</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Option D</label>
															<input name="option4" type="text"
																class="form-control">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="captain">
											 <div class="tab-pane" id="details">
											<div class="row">
												<div class="col-sm-12">
													<h4 class="info-text"> Let's start with the basic details.
													</h4>
												</div>
											<div class="row">
												<div class="col-sm-10 col-sm-offset-1">
													<div class="form-group">
														<label>Question</label>
														<textarea class="form-control" placeholder=""
															rows="4"></textarea>
													</div>
												</div>
												<div class="col-sm-10 col-sm-offset-1">
													<div class="picture-container">
														<div class="picture">
															<img src="<?php echo base_url(); ?>assets/wizard/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
															<input type="file" id="wizard-picture">
														</div>
														<h6>Choose Image</h6>
													</div>
		                                	   </div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
													<div class="form-group label-floating">
														<label class="control-label">Option A</label>
														<input name="option1" type="text" class="form-control">
													</div>
												</div>

												<div class="input-group">
													 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
													<div class="form-group label-floating">
														<label class="control-label">Option B</label>
														<input name="option2" type="text"
															class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
													<div class="input-group">
														 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Option C</label>
															<input name="option3" type="text" class="form-control">
														</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Option D</label>
															<input name="option4" type="text"
																class="form-control">
														</div>
													</div>
												</div>
											</div>
										</div>
										</div>
										<div class="tab-pane" id="description">
											<div class="tab-pane" id="details">
											<div class="row">
												<div class="col-sm-12">
													<h4 class="info-text"> Let's start with the basic details.
													</h4>
												</div>
											<div class="row">
												<div class="col-sm-10 col-sm-offset-1">
													<div class="form-group">
														<label>Question</label>
														<textarea class="form-control" placeholder=""
															rows="4"></textarea>
													</div>
												</div>
												<div class="col-sm-10 col-sm-offset-1">
													<div class="picture-container">
														<div class="picture">
															<img src="<?php echo base_url(); ?>assets/wizard/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
															<input type="file" id="wizard-picture">
														</div>
														<h6>Choose Image</h6>
													</div>
		                                	   </div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
													<div class="form-group label-floating">
														<label class="control-label">Option A</label>
														<input name="option1" type="text" class="form-control">
													</div>
												</div>

												<div class="input-group">
													 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
													<div class="form-group label-floating">
														<label class="control-label">Option B</label>
														<input name="option2" type="text"
															class="form-control">
													</div>
												</div>
											</div>
											<div class="col-sm-6">
													<div class="input-group">
														 <span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Option C</label>
															<input name="option3" type="text" class="form-control">
														</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">create</i>
														</span>
														<div class="form-group label-floating">
															<label class="control-label">Option D</label>
															<input name="option4" type="text"
																class="form-control">
														</div>
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
									<div class="wizard-footer">
										<div class="pull-right">
											<input type='button' class='btn btn-next btn-fill btn-success btn-wd'
												name='next' value='Submit' />
											<input type='button'
												class='btn btn-finish btn-fill btn-success btn-wd' name='finish'
												value='Submit' />
										</div>
										<div class="pull-left">
											<input type='button'
												class='btn btn-previous btn-fill btn-default btn-wd'
												name='previous' value='Previous' />

											 
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div> <!-- wizard container -->
					</div>
				</div> <!-- row -->
			</div> <!--  big container -->
	     </div>
	  </main>
	</div>
	
				<!-- partial:partials/_footer.html -->
				<?php include('footer.php'); ?>
				<!-- partial -->
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/wizard.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/courses.css" />
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/csweetalert2@11"></script>
	<!-- <script type="text/javascript" src="<//?//php// echo base_url(); ?>assets/js/courses.js"></script> -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/coursefeedbackform.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ssi-uploader.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.7/tinymce.min.js"></script>



	<!--   Core JS Files   -->
	<script src="<?php echo base_url(); ?>assets/wizard/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/wizard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/wizard/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?php echo base_url(); ?>assets/wizard/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="<?php echo base_url(); ?>assets/wizard/js/jquery.validate.min.js"></script>

    
</body>

</html>
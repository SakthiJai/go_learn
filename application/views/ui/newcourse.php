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


					<!--   Big container   -->

					<div class="row">
						<div class="col-sm-12">
							<!--      Wizard container        -->
							<div class="wizard-container">
								<div class="card wizard-card" data-color="red" id="wizard">
							
										<div class="wizard-header">
											<button
												class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
												style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">Add
												New Course</button>
										</div>
										<div class="wizard-navigation">
									<ul class="nav nav-pills">
										<li class="active" style="width: 33.3333%;"><a href="#coursedetails" data-toggle="tab" aria-expanded="true">Course Details</a></li>
										<li class="" style="width: 33.3333%;"><a href="#details" data-toggle="tab" aria-expanded="false">Pre Test questions</a></li>
										<li class="" style="width: 33.3333%;"><a href="#captain" data-toggle="tab" aria-expanded="false">Post Test questions</a></li>
										<li class="" style="width: 33.3333%;"><a href="#description" data-toggle="tab" aria-expanded="false">Feed Back</a></li>
									</ul>
								<div class="moving-tab" style="width: 250px; transform: translate3d(-8px, 0px, 0px); transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1) 0s;">Account</div></div>
										
										<div class="tab-content">
											<div class="tab-pane show active" id="coursedetails">
											<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
												<div class="row">
											
												<form id="courseadd" name="courseadd" method="POST" enctype="multipart/form-data">
												<input type="hidden" id="base_url" name="base_url" value="<?php echo $baseurl ?>"/>
												<input type="hidden" id="courseid" name="courseid" value="<?php echo $this->uri->segment(3); ?>"/>
													<div class="mdc-layout-grid">
														<div class="mdc-layout-grid__inner">
															
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	
																	<input required class="mdc-text-field__input"
																		id="course_title" name="course_title"type="text" class="form-control" value="<?php echo isset($details[0]) ? $details[0]->course_title : ""; ?>"
																		onkeypress="return NumbersOnly(this,event)">
																	<div class="mdc-line-ripple"></div>
																	<label for="text-field-hero-input"
																		class="mdc-floating-label">Tittle</label>
																</div>
															</div>
															<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded" style="--mdc-ripple-fg-size:198px; --mdc-ripple-fg-scale:1.7396; --mdc-ripple-fg-translate-start:-33.4px, -93.4px; --mdc-ripple-fg-translate-end:66.7px, -76.5px;">
								  <div class="mdc-line-ripple" style="transform-origin: 65.6px center;"></div>
								  <label for="text-field-hero-input" class="mdc-floating-label">Program Name</label>
								  <select name="program_name" id="program1_name" class="mdc-text-field__input" >
								  <option disabled selected value> </option>
													<?php foreach ($program_name->result() as $row) { ?>
														<?Php if ($row->id == $details[0]->program_id) { ?>
																<option  value="<?php echo $row->id; ?>" selected><?php echo $row->program_name; ?></option>
													   	<?php } else { ?>	
															   <option  value="<?php echo $row->id; ?>"><?php echo $row->program_name; ?></option>
															<?php } ?>
													<?php } ?>
													
													</select>
								</div>
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	<div class="mdc-line-ripple"></div>
																	<label for="text-field-hero-input"
																		class="mdc-floating-label">Program Type
																	</label>
																	<select name="training_type" id="training_type" class="mdc-text-field__input" >
																	<option disabled selected value> </option>
													<?php foreach ($program_types->result() as $rowss) { ?>
													 	<?Php if ($rowss->id == $details[0]->traning_type_id) { ?>
																<option  value="<?php echo $rowss->type; ?>" selected><?php echo $rowss->type; ?></option>
														<?php } else { ?>
																<option  value="<?php echo $rowss->id; ?>"><?php echo $rowss->type; ?></option>
														<?php } ?>
													<?php } ?>
													
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
																	<select name="program_group" id="program_group" class="mdc-text-field__input" >
																	<option disabled selected value> </option>
													<?php foreach ($program_group->result() as $rows) { ?>  
														<?Php if ($rows->id == $details[0]->program_group_id) { ?>
																<option  value="<?php echo $rows->id; ?>" selected><?php echo $rows->group_name; ?></option>
														<?php } else { ?>
																  <option  value="<?php echo $rows->id; ?>"><?php echo $rows->group_name; ?></option>
														<?php } ?>
													<?php } ?>
													
													</select> 
																</div>
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">


																<label for="text-field-hero-input"
																	class="mdc-floating-label" style="padding: 0%;">Course Description
																</label>
																
																<textarea id="description" name="description"
																	 class="mt-2"><?php echo isset($details[0]->description) ? $details[0]->description : ""; ?></textarea>
																	
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
																<div class="col-sm-8 col-lg-8 col-md-8 col-xs-12">
																	<label for> Course Images: </label>
																	<div class="form-file mb-3" style="width:100%">

																		<img id="blah" alt="your image"
																			onclick="document.getElementById('image').click()"
																			src="<?php echo base_url(); ?>assets/images/preview-icon_101018.png"
																			style="width:100%;border-radius:50%" />

																		<input id="image" name="image" type="file"
																			class="form-file-input"
																			style="visibility:hidden"
																			onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
																	</div>
																</div>
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	<div class="mdc-line-ripple"></div>
																	<label for="" class="mdc-floating-label">Course PDF
																		files
																	</label>
																	<input <input class="" mdc-text-field__input""
																		id="pdf" name="pdf_file" type="file" style="padding: 10px;margin-left: 150px;">
																</div>
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	<div class="mdc-line-ripple"></div>
																	<div class="mdc-form-field"> <label for>Learning Level Evaluation:</label>
																	</div>
																	<div class="mdc-form-field">
																		<div
																			class="mdc-checkbox mdc-checkbox--secondary">
																			<input type="checkbox" id="" name="test[]"
																				class="mdc-checkbox__native-control"  value="1" <?php echo (isset($details[0]->posttest_id) && $details[0]->pretest_id == 1) ? 'checked' : "" ?>>
																			<div class="mdc-checkbox__background">
																				<svg class="mdc-checkbox__checkmark"
																					viewBox="0 0 24 24">
																					<path
																						class="mdc-checkbox__checkmark-path"
																						fill="none"
																						d="M1.73,12.91 8.1,19.28 22.79,4.59">
																					</path>
																				</svg>
																				<div class="mdc-checkbox__mixedmark">
																				</div>
																			</div>
																		</div>
																		<span for="basic-disabled"
																			id="basic-disabled-checkbox-label">Pre
																			test</span>
																	</div>
																	<div class="mdc-form-field">
																		<div
																			class="mdc-checkbox mdc-checkbox--secondary">
																			<input type="checkbox"
																				id="" name="test[]"
																				class="mdc-checkbox__native-control" value="2"  <?php echo (isset($details[0]->posttest_id) && $details[0]->posttest_id == 1) ? 'checked' : "" ?> >
																			<div class="mdc-checkbox__background">
																				<svg class="mdc-checkbox__checkmark"
																					style="border-color: #ff420f;
					   " viewBox="0 0 24 24">
																					<path
																						class="mdc-checkbox__checkmark-path"
																						fill="none"
																						d="M1.73,12.91 8.1,19.28 22.79,4.59">
																					</path>
																				</svg>
																				<div class="mdc-checkbox__mixedmark">
																				</div>
																			</div>
																		</div>
																		<span for="basic-disabled"
																			id="basic-disabled-checkbox-label">Post
																			test</span>
																	</div>
																	<div class="mdc-form-field">
																		<div
																			class="mdc-checkbox mdc-checkbox--secondary mdc-checkbox--disabled">
																			<input type="checkbox"
																				id="" name="test[]"
																				class="mdc-checkbox__native-control" value="3" <?php echo (isset($details[0]->pre_and_post) && $details[0]->pre_and_post == 1) ? 'checked' : "checked" ?>>
																			<div class="mdc-checkbox__background">
																				<svg class="mdc-checkbox__checkmark"
																					viewBox="0 0 24 24">
																					<path
																						class="mdc-checkbox__checkmark-path"
																						fill="none" style="border-color: #ff420f;
						background-color: #ff420f;" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
																				</svg>
																				<div class="mdc-checkbox__mixedmark">
																				</div>
																			</div>
																		</div>
																		<span for="basic-disabled"
																			id="basic-disabled-checkbox-label">Feedback
																			</span>
																	</div>
																</div>
															</div>
															


															
															<input type="hidden" name="id" id="id"
																value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['id'] : '' ?>">



															
															<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-5"></div>
															<div class="mdc-4 ayout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
																<button   type="submit" class="   mt-3 mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded " style="--mdc-ripple-fg-size:56px;  width: 150px;   --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float:   ">
																	Save
																	</button>
																<!--	<a href="<?php echo base_url('main/course'); ?>"class=" mt-4 mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded"  style="--mdc-ripple-fg-size:70px; --mdc-ripple-fg-scale:1.90907; --mdc-ripple-fg-translate-start:8.11121px, -9.33333px; --mdc-ripple-fg-translate-end:24.1389px, -17px;   ">
																			Cancel
																			</a>-->
															</div>
															<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-5"></div>

														
														</div>


												</form>




													</div>
												</div>
											</div>
											<div class="tab-pane" id="details">
											<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="col-md-12">
							<?php //if(($this->uri->segment(4)=="")){ 
							?>
								<div class="card-box">
								<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
												<div class="row">
									<div class="row">
										<?php foreach ($testtile as $row) { ?>
											<div class="col-md-12"><center><h4 class="page-title"><?php //echo $row->course_title; ?> </h4><br></center></div><br>
										<?php } ?>
									</div>
									
									<form id ="questions" method="POST" enctype="multipart/form-data" >
											<div class="form-group"> 
												<div class="col-md-6 ">
													<label for="title" class="form-control-label col-md-2">Question: </label>
													<div class="col-md-12">
														<textarea id="info mce_0_ifr" name="quations" type="text" class="form-control"></textarea>
													</div>
												</div>
												<div class="col-md-6 mb-3">
													<label for="title" class="form-control-label">Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span></label>
													
														<input id="pretestimage" name="pretestimage" type="file" class="form-control"/>
												   
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 1:</label>
													<div class="col-md-10"><input id="option" name="option1" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 2:</label>
													<div class="col-md-10"><input id="option" name="option2" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 3:</label>
													<div class="col-md-10"><input id="option" name="option3" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 4:</label>
													<div class="col-md-10"><input id="option" name="option4" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="name" class="form-control-label col-md-2">Answer :</label>
													<div class="col-md-10">
														<select name="answer" class="form-control" required>
															<option value="">Select</option>
															<option value="1">Option 1</option>
															<option value="2">Option 2</option>
															<option value="3">Option 3</option>
															<option value="4">Option 4</option>
														</select>
													</div>
												</div>
												<div class="d-block text-center">
													<button type="submit" class="mb-2 mr-2 btn btn-success btn-sm">Add</button>
												</div>
											</div>
										</form>
								</div>
							
								<div class="row">
								<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
												<div class="row">
										<?php foreach ($testtile as $row) { ?>
												<div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
												<center><span class="btn-danger" id="alert_messages"> <?php echo $this->session->flashdata('msg'); ?></span></center>
												</div><br>
											
										<?php } ?>
											<div id="listgrid">
												
											</div>
									</div>
									<div class="main-card mb-3 card">
										 <table id="datatable-buttons" class="table table-bordered ">
										<thead>
										<tr>
											<th>S No</th>
											<th>Question</th>
											<th>Option 1</th>
											<th>Option 2</th>
											<th>Option 3</th>
											<th>Option 4</th>
											<th>Answer</th>	
											<th>Action</th>
										</tr>
										</thead>
										<tbody id="pretestquestions">
										
										</tbody>
									</table>
									</div>
									
								
							</div>
				</div>
			</div>
		</div>
											</div>
											</div>
											</div>
											<div class="tab-pane" id="details">
											<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="col-md-12">
							<?php //if(($this->uri->segment(4)=="")){ 
							?>
								<div class="card-box">
								<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
												<div class="row">
									<div class="row">
										<?php foreach ($testtile as $row) { ?>
											<div class="col-md-12"><center><h4 class="page-title"><?php //echo $row->course_title; ?> </h4><br></center></div><br>
										<?php } ?>
									</div>
									
									<form id ="questions" method="POST" enctype="multipart/form-data" >
											<div class="form-group"> 
												<div class="col-md-6 ">
													<label for="title" class="form-control-label col-md-2">Question: </label>
													<div class="col-md-12">
														<textarea id="info mce_0_ifr" name="quations" type="text" class="form-control"></textarea>
													</div>
												</div>
												<div class="col-md-6 mb-3">
													<label for="title" class="form-control-label">Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span></label>
													
														<input id="pretestimage" name="pretestimage" type="file" class="form-control"/>
												   
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 1:</label>
													<div class="col-md-10"><input id="option" name="option1" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 2:</label>
													<div class="col-md-10"><input id="option" name="option2" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 3:</label>
													<div class="col-md-10"><input id="option" name="option3" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 4:</label>
													<div class="col-md-10"><input id="option" name="option4" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="name" class="form-control-label col-md-2">Answer :</label>
													<div class="col-md-10">
														<select name="answer" class="form-control" required>
															<option value="">Select</option>
															<option value="1">Option 1</option>
															<option value="2">Option 2</option>
															<option value="3">Option 3</option>
															<option value="4">Option 4</option>
														</select>
													</div>
												</div>
												<div class="d-block text-center">
													<button type="submit" class="mb-2 mr-2 btn btn-success btn-sm">Add</button>
												</div>
											</div>
										</form>
								</div>
							
								<div class="row">
								<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
												<div class="row">
										<?php foreach ($testtile as $row) { ?>
												<div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
												<center><span class="btn-danger" id="alert_messages"> <?php echo $this->session->flashdata('msg'); ?></span></center>
												</div><br>
											
										<?php } ?>
											<div id="listgrid">
												
											</div>
									</div>
									<div class="main-card mb-3 card">
										 <table id="datatable-buttons" class="table table-bordered ">
										<thead>
										<tr>
											<th>S No</th>
											<th>Question</th>
											<th>Option 1</th>
											<th>Option 2</th>
											<th>Option 3</th>
											<th>Option 4</th>
											<th>Answer</th>	
											<th>Action</th>
										</tr>
										</thead>
										<tbody id="pretestquestions">
										
										</tbody>
									</table>
									</div>
									
								
							</div>
				</div>
			</div>
		</div>
											</div>
											</div>
											</div>
											<div class="tab-pane" id="captain">
											<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="col-md-12">
						   
								<div class="card-box">
									<div class="row">
									   
									<form id ="postquestions" method="POST" enctype="multipart/form-data" >
											<div class="form-group">
												<div class="col-md-6 ">
													<label for="title" class="form-control-label col-md-2">Question: </label>
													<div class="col-md-12">
														<textarea id="info mce_0_ifr" name="quations" type="text" class="form-control"></textarea>
													</div>
												</div>
												<div class="col-md-6 mb-3">
													<label for="title" class="form-control-label">Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span></label>
													
														<input id="postimage" name="postimage" type="file" class="form-control"/>
												   
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 1:</label>
													<div class="col-md-10"><input id="option" name="option1" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 2:</label>
													<div class="col-md-10"><input id="option" name="option2" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 3:</label>
													<div class="col-md-10"><input id="option" name="option3" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="title" class="form-control-label col-md-2">Option 4:</label>
													<div class="col-md-10"><input id="option" name="option4" type="text" class="form-control"  >
													</div>
												</div>
												<div class="col-md-6">
													<label for="name" class="form-control-label col-md-2">Answer :</label>
													<div class="col-md-10">
														<select name="answer" class="form-control" required>
															<option value="">Select</option>
															<option value="1">Option 1</option>
															<option value="2">Option 2</option>
															<option value="3">Option 3</option>
															<option value="4">Option 4</option>
														</select>
													</div>
												</div>
												<div class="d-block text-center">
													<button type="submit" class="mb-2 mr-2 btn btn-success btn-sm">Add</button>
												</div>
											</div>
										</form>
								</div>
							
								<div class="row">
										<?php foreach ($testtile as $row) { ?>
												<div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
												<center><span class="btn-danger" id="alert_messages"> <?php echo $this->session->flashdata('msg'); ?></span></center>
												</div><br>
											
										<?php } ?>
											<div id="listgrid">
												
											</div>
									</div>
									<div class="main-card mb-3 card">
										 <table id="datatable-buttons" class="table table-bordered">
										<thead>
										<tr>
											<th>S No</th>
											<th>Question</th>
											<th>Option 1</th>
											<th>Option 2</th>
											<th>Option 3</th>
											<th>Option 4</th>
											<th>Answer</th>
											
										   
											<th>Action</th>
										</tr>
										</thead>
										<tbody id="posttestquestions">
										
										</tbody>
									</table>
									</div>
									
								
							</div>
				</div>
			</div>
		</div>
</div>
</div>

<div class="tab-pane show active" id="description">
											<div class="row">
			<div class="col-md-12">
				<div class="main-card mb-3 card">
					<div class="col-md-12">
						   
								<div class="card-box">
								<div class="card-body">
													<center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
													<form class=""  id="feedback" method="POST" enctype="multipart/form-data">
														<div class="col-md-12">
															<div class="position-relative form-group">
																<label for="exampleText" class=""> Components:</label>
																<input name="quations" id="exampleText" placeholder="" type="text" class="form-control">
																<input id="name" name="type" type="text" class="form-control" value="Training Components" placeholder="Question" hidden>
																<input type="text"  name="course_id" class="form-control" value="<?php echo $c_id; ?>" hidden>
															</div>
														</div>
														<div class="d-block text-right">
															<button class="mb-2 mr-2 btn btn-success">ADD</button>
														</div>
													</form>
												</div>
							
								<div class="row">
										<?php foreach ($testtile as $row) { ?>
												<div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
												<center><span class="btn-danger" id="alert_messages"> <?php echo $this->session->flashdata('msg'); ?></span></center>
												</div><br>
											
										<?php } ?>
											<div id="listgrid">
												
											</div>
									</div>
									<div class="main-card mb-3 card">
										 <table id="datatable-buttons" class="table table-bordered">
										<thead>
										<tr>
											<th>S No</th>
											<th>Question</th>
											<th>Option 1</th>
											<th>Option 2</th>
											<th>Option 3</th>
											<th>Option 4</th>
											<th>Answer</th>
											
										   
											<th>Action</th>
										</tr>
										</thead>
										<tbody id="posttestquestions">
										
										</tbody>
									</table>
									</div>
									
								
							</div>
				</div>
			</div>
		</div>
</div>
</div>
</div>									<!--	<div class="tab-pane" id="description">
														
															<div class="main-card mb-3 card">
												<div class="card-body">
													<center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
													<form class=""  action="<?php echo base_url(); ?>main/addfeedback_quation" method="POST" enctype="multipart/form-data">
														<div class="col-md-12">
															<div class="position-relative form-group">
																<label for="exampleText" class=""> Components:</label>
																<input name="quations" id="exampleText" placeholder="" type="text" class="form-control">
																<input id="name" name="type" type="text" class="form-control" value="Training Components" placeholder="Question" hidden>
																<input type="text"  name="course_id" class="form-control" value="<?php echo $c_id; ?>" hidden>
															</div>
														</div>
														<div class="d-block text-right">
															<button class="mb-2 mr-2 btn btn-success">ADD</button>
														</div>
													</form>
												</div>
											</div>
															</div>-->
											
										
										<div class="wizard-footer">
											<div class="pull-right">
											
											</div>
											<div class="pull-left">
												


											</div>
											<div class="clearfix"></div>
										</div>
									
								
							</div> <!-- wizard container -->
						</div>
					    </div> <!-- row -->
					<!--  big container -->
			        </div>
			    </main>
		    </div>

		<!-- partial:partials/_footer.html -->
		<?php include('footer.php'); ?>
		<!-- partial -->
	  </div>
	</div>
	
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/daterangepicker.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/wizard.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url(); ?>assets/css/courses.css" />
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/csweetalert2@11"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	
<!--	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/coursefeedbackform.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ssi-uploader.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.7/tinymce.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/courses.js"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url(); ?>assets/wizard/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/wizard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/wizard/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?php echo base_url(); ?>assets/wizard/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="<?php echo base_url(); ?>assets/wizard/js/jquery.validate.min.js"></script>
	
	<style>
		.nav-tabs .nav-item.show .nav-link,
		.nav-tabs .nav-link.active {
			color: #495057;
			background-color: red;
			border-color: #dee2e6 #dee2e6 #fff;
		}

		.mce-panel {
			width: 100%;
		}

		.mdc-floating-label {
			padding: 1%
		}

		#mceu_17 {
			margin-top: 3%;
			margin-right: 1.5%
		}

		;
	</style>

	
</body>

</html>


<style>
	#mce_0_ifr {

		height: 200px !important;
	}
</style>
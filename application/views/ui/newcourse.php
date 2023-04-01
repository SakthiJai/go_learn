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
												<input type="hidden" value="<?php echo $this->uri->segment(3);?>"  id="editId"/>
										</div>
										<div class="wizard-navigation">
											<ul>
												<li><a href="#coursedetails" data-toggle="tab">Course Details</a></li>
												<li><a href="#details" data-toggle="tab">Pre Test questions</a></li>
												<li><a href="#captain" data-toggle="tab">Post Test questions</a></li>
												<li><a href="#description" data-toggle="tab">Feed Back</a></li>
											</ul>
										</div>

										<div class="tab-content">
											<div class="tab-pane" id="coursedetails">
												<div class="row">
												<form class="" id="courseadd" name="courseadd"  action="<?php echo base_url();?>main/course_adding" method="POST" enctype="multipart/form-data">
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
																		class="mdc-floating-label">Tittle</label>
																</div>
															</div>
															<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded" style="--mdc-ripple-fg-size:198px; --mdc-ripple-fg-scale:1.7396; --mdc-ripple-fg-translate-start:-33.4px, -93.4px; --mdc-ripple-fg-translate-end:66.7px, -76.5px;">
                                  <div class="mdc-line-ripple" style="transform-origin: 65.6px center;"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Employee Type</label>
								  <select name="program_name" id="program_name" class="mdc-text-field__input" required>
								  <option disabled selected value> </option>
                                                    <?php foreach($program_name->result() as $row) { ?>
													<?Php if($row->id==$details[0]->program_id){?>
														<option  value="<?php echo $row->id; ?>" selected><?php echo $row->program_name; ?></option>
													   <?php }else{?>	
													   <option  value="<?php echo $row->id; ?>"><?php echo $row->program_name; ?></option>
													    <?php }?>
                                                    <?php }?>
                                                    
                                                    </select>
                                </div>
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	<div class="mdc-line-ripple"></div>
																	<label for="text-field-hero-input"
																		class="mdc-floating-label">Program Type :
																	</label>
																	<select name="training_type" id="training_type" class="mdc-text-field__input" required>
																	<option disabled selected value> </option>
                                                    <?php foreach($program_types->result() as $rowss) {?>
                                                     <?Php if($rowss->id==$details[0]->traning_type_id){?>
														<option  value="<?php echo $rowss->type; ?>" selected><?php echo $rowss->type;?></option>
													<?php } else{?>
														<option  value="<?php echo $rowss->id; ?>"><?php echo $rowss->type;?></option>
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
																		class="mdc-floating-label">Program Group:
																	</label>
																	<select name="program_group" id="program_group" class="mdc-text-field__input" required>
																	<option disabled selected value> </option>
                                                    <?php foreach($program_group->result() as $rows) { ?>  
													<?Php if($rows->id==$details[0]->program_group_id){?>
														<option  value="<?php echo $rows->id; ?>" selected><?php echo $rows->group_name; ?></option>
													<?php }else{?>
														  <option  value="<?php echo $rows->id; ?>"><?php echo $rows->group_name; ?></option>
													<?php }?>
                                                    <?php } ?>
                                                    
                                                    </select> 
																</div>
															</div>
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">


																<label for="text-field-hero-input"
																	class="mdc-floating-label">Course Description:
																</label>
																
																<textarea id="description" name="description"
																	 class="mt-2"><?php echo  isset($details[0]->description)?$details[0]->description:""; ?></textarea>
																	
															</div>

															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	<div class="mdc-line-ripple"></div>
																	<div class="mdc-form-field"> <label for>Learning
																			Level
																			Evaluation:</label>
																	</div>
																	<div class="mdc-form-field">
																		<div
																			class="mdc-checkbox mdc-checkbox--secondary">
																			<input type="checkbox" id="" name="test"
																				class="mdc-checkbox__native-control"  value="1" <?php echo  (isset($details[0]->posttest_id) && $details[0]->pretest_id==1 )?'checked':""?>>
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
																			test1</span>
																	</div>
																	<div class="mdc-form-field">
																		<div
																			class="mdc-checkbox mdc-checkbox--secondary">
																			<input type="checkbox"
																				id="" name="test"
																				class="mdc-checkbox__native-control" value="2"  <?php echo  (isset($details[0]->posttest_id) && $details[0]->posttest_id==1 )?'checked':""?> >
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
																			class="mdc-checkbox mdc-checkbox--secondary">
																			<input type="checkbox"
																				id="" name="test"
																				class="mdc-checkbox__native-control" value="3" <?php echo  (isset($details[0]->pre_and_post) && $details[0]->pre_and_post==1 )?'checked':""?>>
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
															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
																	<label for> Course Images: </label>
																	<div class="form-file mb-3" style="width:100%">

																		<img id="blah" alt="your image"
																			onclick="document.getElementById('title').click()"
																			src="<?php echo base_url(); ?>assets/images/preview-icon_101018.png"
																			style="width:100%;border-radius:50%" />

																		<input id="title" name="image" type="file"
																			class="form-file-input"
																			style="visibility:hidden"
																			onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
																	</div>
																</div>
															</div>


															<!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
											 <label for="" class="">Course Cover Image </label>
											 <input type="file" name="ssi-upload" multiple id="ssi-upload"/ style="width: 474px;">
											 </div>-->

															<input type="hidden" name="id" id="id"
																value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['id'] : '' ?>">



															<div
																class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
																<div class="mdc-text-field w-100 mdc-ripple-upgraded">
																	<div class="mdc-line-ripple"></div>
																	<label for="" class="mdc-floating-label">Course PDF
																		files
																	</label>
																	<input <input class="" mdc-text-field__input""
																		id="title" name="pdf_file" type="file" style="padding: 10px;margin-left: 150px;">
																</div>
															</div>
															<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>
															<div class="mdc-3 ayout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
																<button   type="submit" class=" mt-4 btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center" style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float:   ">
																	Submit
																	</button>&nbsp;&nbsp;&nbsp;&nbsp;
																	<a href="<?php echo base_url('main/course'); ?>"class=" mt-4 mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded"  style="--mdc-ripple-fg-size:70px; --mdc-ripple-fg-scale:1.90907; --mdc-ripple-fg-translate-start:8.11121px, -9.33333px; --mdc-ripple-fg-translate-end:24.1389px, -17px;   ">
																			Cancel
																			</a>
															</div>
															<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>

														
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
                                    <div class="row">
                                        <?php foreach($testtile as $row) { ?>
                                        <div class="col-md-12"><center><h4 class="page-title"><?php //echo $row->course_title; ?> </h4><br></center></div><br>
                                        <?php } ?>
                                    </div>
									<form class="" action="<?php echo base_url();?>main/posttestquestions_adding/<?php echo $c_id; ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Question: </label>
                                                    <div class="col-md-12">
                                                        <textarea id="info mce_0_ifr" name="quations" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span></label>
                                                    <div class="col-md-10">
                                                        <input id="title" name="image" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 1:</label>
                                                    <div class="col-md-10"><input id="option" name="option1" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 2:</label>
                                                    <div class="col-md-10"><input id="option" name="option2" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 3:</label>
                                                    <div class="col-md-10"><input id="option" name="option3" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 4:</label>
                                                    <div class="col-md-10"><input id="option" name="option4" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Answer :</label><br>
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
                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            
                                <div class="row">
                                        <?php foreach($testtile as $row) { ?>
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
										    <!--<th>Program Type</th>-->
										    <!--<th>Course id</th>-->
										    <th>Option 2</th>
										    <th>Option 3</th>
										    <th>Option 4</th>
										    <th>Answer</th>
										    
										   
										    <th>Action</th>
									    </tr>
                                        </thead>
										<tbody>
										<?php $i=1; 
										  foreach($pertest_questions as $row)  { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row->quations;?></td>
											<td><?php echo $row->option1;?></td>
											<td><?php echo $row->option2;?></td>
										    <td><?php echo $row->option3;?></td>
											<td><?php echo $row->option4;?></td>
											<td><?php echo $row->answer;?></td>
								
							                <td>
							         
							         <a href="<?php echo base_url();?>questions/deletetestquation/<?php echo $row->id;?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a>
							             </td>
										</tr>
									<?php $i++; } ?>
                                        </tbody>
                                    </table>
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
                            <?php //if(($this->uri->segment(4)=="")){ 
							?>
                                <div class="card-box">
                                    <div class="row">
                                        <?php foreach($testtile as $row) { ?>
                                        <div class="col-md-12"><center><h4 class="page-title"><?php //echo $row->course_title; ?> </h4><br></center></div><br>
                                        <?php } ?>
                                    </div>
                                    <div class="d-block text-center"> <h6> <strong><?php echo $courese_name; ?></strong></h6></div>
                                        <form class="" action="<?php echo base_url();?>main/posttestquestions_adding/<?php echo $c_id; ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Question: </label>
                                                    <div class="col-md-12">
                                                        <textarea id="info" name="quations" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span></label>
                                                    <div class="col-md-10">
                                                        <input id="title" name="image" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 1:</label>
                                                    <div class="col-md-10"><input id="option" name="option1" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 2:</label>
                                                    <div class="col-md-10"><input id="option" name="option2" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 3:</label>
                                                    <div class="col-md-10"><input id="option" name="option3" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 4:</label>
                                                    <div class="col-md-10"><input id="option" name="option4" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Answer :</label><br>
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
                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            <?php //} ?>    
                                <div class="row">
								<?php foreach($testtile as $row) { ?>
                                            <div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
                                            <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                            </div><br>
                                            
                                        <?php } ?>
                                    </div>
									<div class="main-card mb-3 card">
										 <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
										    <th>S No</th>
										    <th>Question</th>
										    <th>Option 1</th>
										    <!--<th>Program Type</th>-->
										    <!--<th>Course id</th>-->
										    <th>Option 2</th>
										    <th>Option 3</th>
										    <th>Option 4</th>
										    <th>Answer</th>
										    
										   
										    <th>Action</th>
									    </tr>
                                        </thead>
										<tbody>
										<?php $i=1; 
										  foreach($testquation as $row)  { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row->quations;?></td>
											<td><?php echo $row->option1;?></td>
											<td><?php echo $row->option2;?></td>
										    <td><?php echo $row->option3;?></td>
											<td><?php echo $row->option4;?></td>
											<td><?php echo $row->answer;?></td>
								
							                <td>
							         
							         <a href="<?php echo base_url();?>questions/deletetestquation/<?php echo $row->id;?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a>
							             </td>
										</tr>
									<?php $i++; } ?>
                                        </tbody>
                                    </table>
									</div>
								
                                    
                                
						    </div>
                </div>
            </div>
        </div>
											</div>
											<div class="tab-pane" id="description">
															<div class="tab-pane" id="details">
															<div class="main-card mb-3 card">
												<div class="card-body">
													<center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
													<form class=""  action="<?php echo base_url();?>main/addfeedback_quation" method="POST" enctype="multipart/form-data">
														<div class="col-md-12">
															<div class="position-relative form-group">
																<label for="exampleText" class=""> Components:</label>
																<input name="quations" id="exampleText" placeholder="" type="text" class="form-control">
																<input id="name" name="type" type="text" class="form-control" value="Training Components" placeholder="Question" hidden>
																<input type="text"  name="course_id" class="form-control" value="<?php echo $c_id;?>" hidden>
															</div>
														</div>
														<div class="d-block text-right">
															<button class="mb-2 mr-2 btn btn-success">ADD</button>
														</div>
													</form>
												</div>
											</div>
															</div>
											</div>
										</div>
										<div class="wizard-footer">
											<div class="pull-right">
												<input type='button' class='btn btn-next btn-fill btn-success btn-wd'
													name='next' value='Next' />
												<input type='button' class='btn btn-finish btn-fill btn-success btn-wd'
													name='finish' value='Submit' />
											</div>
											<div class="pull-left">
												<input type='button'
													class='btn btn-previous btn-fill btn-default btn-wd' name='previous'
													value='Previous' />


											</div>
											<div class="clearfix"></div>
										</div>
									
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
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/courses.js"></script> -
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
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
	<script>
		function callListGrid() {
			console.log("222");
			setTimeout(function () {
				$('#listgrid').load("/main/coursequestionslist/" + $('.radioBtnClass:checked').val() + "/" + $('#test_temp_id').val())
			}, 3000);
		}
		function updateFeedBack() {
			console.log('<>', $('#fid').val());
			getCtiveLink();
			setTimeout(function () {
				$('#components').validate({
					rules: {
						quations:
						{
							required: true,
						}
					},
					messages: {
						quations: {
							required: "Enter component details"
						}
					},

					highlight: function (element) {
						$(element).closest('.form-control').addClass('error');
					},
					unhighlight: function (element) {
						$(element).closest('.form-control').removeClass('error');
					},
					submitHandler: function (form) {

						console.log("feed back form");
						var formdata = $("#components").serialize();
						//var id=$("#id").val();
						//form.submit();
						$.ajax({
							url: baseurl + '/main/addevaluation_quation', // point to server-side controller method
							dataType: 'text', // what to expect back from the server
							cache: false,
							/*contentType: false,
							processData: false,*/
							data: formdata,
							type: 'post',
							success: function (response) {
								console.log(response);
								$("#components")[0].reset();

								$('#feedbackquestions').load(baseurl + "main/feedbackevaluation_quation/" + $('#fid').val())
							},
							error: function (response) {
								// $(form)[0].reset();
								$('#msg').html(response); // display error response from the server
							}
						});

					}
				});
				$('#feedbackquestions').load(baseurl + "main/feedbackevaluation_quation/" + $('#fid').val())
			}, 3000)
		}
		$(".addnewbtn").click(function () {
			$('#showCourseAdd').show();
			$('#showCourseList').hide();
			$('.addnewbtn').hide();
			$('#courseadd')[0].reset();
			$('#update').hide();
		});

		function getFeedbcaklist() {
			setTimeout(function () {

				$('#feedbackquestions').load(baseurl + "main/feedbackevaluation_quation/" + $('#fid').val())

			}, 2000)

		}
		function getCtiveLink() {
			console.log("link1");
			setTimeout(function () {
				console.log("link");
				$(".activestatus").on('click', function (e) {
					console.log(e);
					if (confirm("Do you want to deactive?")) {
						$.ajax({
							type: "POST",
							url: baseurl + "main/activeevaluation_quation",
							data: { 'id': $(this).attr('id'), 'status': 1 },
							success: function (data) {
								if (data) {
									getFeedbcaklist()

								}
							}
						});
					}
				});
				$(".deactivatestatus").on('click', function (e) {
					if (confirm("do you want to change the status?")) {
						$.ajax({
							type: "POST",
							url: baseurl + "main/activeevaluation_quation",
							data: { 'id': $(this).attr('id'), 'status': 2 },
							success: function (data) {
								if (data) {
									getFeedbcaklist()
								}
							}
						});
					}
				});
			}, 5000)
		}

		$(document).ready(function () {

			var settings = {
				url: "upload.php",
				method: "POST",
				allowedTypes: "jpg,png,gif,doc,pdf,zip",
				fileName: "myfile",
				multiple: true,

				dragdropWidth: 800,
				onSuccess: function (files, data, xhr) {
					$("#status").html("<font color='green'>Upload is success</font>");

				},
				onError: function (files, status, errMsg) {
					$("#status").html("<font color='red'>Upload is Failed</font>");
				}
			}
			//$("#mulitplefileuploader").uploadFile(settings);

		});

		$("#startbutton").click(function () {
			extraObj.startUpload();

		});
		tinymce.init({
			selector: 'textarea',
			// plugins: ["bootstrapaccordion"],

			// plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
			//  toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
			plugins: [
				"advlist accordion autolink lists link image charmap print code preview anchor",
				"searchreplace visualblocks code fullscreen",
				"insertdatetime media table contextmenu paste",
			],
			toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | accordion code",

			toolbar_mode: 'floating',
			tinycomments_mode: 'embedded',
			tinycomments_author: 'Author name',
			height: '500',
		});
		tinymce.PluginManager.add('accordion', function (editor) {
			editor.addButton('accordion', {
				text: 'Accordion',
				icon: false,
				onclick: function onclick() {
					editor.windowManager.open({
						title: 'Accordion Picker',
						body: {
							type: 'textbox',
							name: 'my_textbox',
							layout: 'flow',
							label: '# of accordions'
						},
						onsubmit: function onsubmit(e) {
							var accordionSet = [];
							var curAccordion = Date.now();
							var accordionCount = parseInt(e.data.my_textbox);
							for (var i = 0; i < accordionCount; i++) {
								var panel = '\n                    <div class="panel panel-default">\n                      <div class="panel-heading mceNonEditable productAccordion" role="tab" id="heading' + (curAccordion + i) + '">\n                        <h4 class="panel-title">\n                          <a role="button" data-toggle="collapse" class="mceEditable collapsed" data-parent="#accordion' + curAccordion + '" href="#collapse' + (curAccordion + i) + '" aria-expanded="true" aria-controls="collapse' + (curAccordion + i) + '">\n                            Change this header!\n                          </a>\n                        </h4>\n                      </div>\n                      <div id="collapse' + (curAccordion + i) + '" class="panel-collapse collapse mceNonEditable" role="tabpanel" aria-labelledby="heading' + (curAccordion + i) + '">\n                        <div class="panel-body mceEditable">\n                          <p>Change this content</p>\n                        </div>\n                      </div>\n                    </div>\n                ';
								accordionSet.push(panel);
							}

							var accordion = '\n                    <div class="panel-group" id="accordion' + curAccordion + '" role="tablist" aria-multiselectable="true">\n                      ' + accordionSet.join('') + '\n                  </div>';
							editor.insertContent(accordion);
						}
					});
				}
			});
		});


		function addTerms() {

			var formdata = $("#terms").serialize();
			//alert($("#id").val());
			console.log(tinymce.get('description').getContent());
			var url = "addTermsandConditions";

			$.ajax({
				type: "POST",
				url: url,
				data: { data: tinymce.get('description').getContent(), type: $('#type').val() }, // serializes the form's elements.
				beforeSend: function (xhr, type) {
					if (!type.crossDomain) {
						xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
					}
				},
				success: function (data) {
					//console.log(data);
					if (data.result == 'Success') {
						location.reload();
					}
				}
			});
		}


		/*function getContent() {
			console.log('121S');
			$.ajax({
				url: "getTerms",
				type: "post",
				data: { _token: $('meta[name="_token"]').attr('content') },
				dataType: "JSON",
				beforeSend: function (xhr, type) {
					if (!type.crossDomain) {
						//  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
					}
				},
				success: function (data) {

					//console.log(data.content)
					//$('textarea[name="content"]').val(data.content);
					tinyMCE.activeEditor.setContent(data.data);


				},

				error: function (jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
			// body...
		}*/
		var notifyOptions = {
			iconButtons: {
				className: 'fa fa-question about',
				method: function (e, modal) {
					ssi_modal.closeAll('notify');
					var btn = $(this).addClass('disabled');
					ssi_modal.dialog({
						onClose: function () {
							btn.removeClass('disabled')
						},
						onShow: function () {
						},
						okBtn: { className: 'btn btn-primary btn-sm' },
						title: 'ssi-modal',
						content: 'ssi-modal is an open source modal window plugin that only depends on jquery. It has many options and it\'s super flexible, maybe the most flexible modal out there... For more details click <a class="sss" href="http://ssbeefeater.github.io/#ssi-modal" target="_blank">here</a>',
						sizeClass: 'small',
						animation: true
					});
				}
			}
		};

		// option 1


		// $('#ssi-upload').ssi_uploader({

		//     inForm:true
		// });

		// option 2

		var uploader = $('#ssi-upload').ssi_uploader({

		});

		$("#myForm").on("submit", function (event) {
			event.preventDefault();
			uploader.data('ssi_upload').uploadFiles();
			uploader.on('onUpload.ssi-uploader', function () {
				$("#myForm").submit();
			});
		});
		$(function () {
			$('input[name="daterange"]').daterangepicker({
				opens: 'left'
			}, function (start, end, label) {
				console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			});
		});



	</script>
</body>

</html>


<style>
	#mce_0_ifr {

		height: 200px !important;
	}
</style>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>
<body>
<script src="<?php echo base_url(); ?>/assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include('sidebar.php');?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
	 <!-- partial:partials/_navbar.html -->
      <?php include('nav.php');?>
      <!-- partial -->
  <div class="page-wrapper mdc-toolbar-fixed-adjust">
	   <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
               
							<?php  if($evaluation_sub == 1) { ?>
							 <div class="mdc-card">
								  <div class="d-flex justify-content-between">
									<button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
									  style="font-size: 14px;">
									  Evaluated Results
									</button>
								  </div><br>
                           <div class="tab-content card-body">
                            <div class="tab-pane active" id="first">
                                    <form  method="POST" name="evaluated_form" id="evaluated_form" class="form-horizontal" onsubmit="return formValid()" 
                                action="<?php echo base_url("index.php/Test/evaluation_submit2");?>">
									 <?php foreach($evaluation_quations_details->result() as $row) {  ?>
									  
									<div class="form-group row">
										<label for="name" class="col-sm-4 col-form-label">Title Of The Programme</label>
										<div class="col-sm-6 col-md-6">
											<input id="name" type="text" class="form-control" placeholder="Employee ID" value="<?php echo $row->title;?>" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-4 col-form-label">Name Of The Faculty</label>
										<div class="col-sm-6 col-md-6">
											<input id="name" type="text" class="form-control" placeholder="Employee ID" value="<?php echo $row->facult_name;?>" disabled>
										</div>
									</div>
									 	<?php } ?>
									<hr>
									
									
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Training Components</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead id="rome"class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Programme Components</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody  id="timr">
													<?php $i=1;?>
													<?php foreach($evaluatedResult->result() as $row) {  ?> 
													 
													<?php if($row->type == 1) { ?>
													 
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input name="type<?php echo $i;?>" type="hidden" value="Training Components">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
														 
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														 
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<script>document.evaluated_form.o<?php echo $i;?>.value="<?php echo $row->answer?>"</script>
														
													</tr>
													<?php $i++; } ?>
                                                 
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Training Methodology</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead  id="ben" class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Methodology</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody>
												    <?php foreach($evaluatedResult->result() as $row) {  ?> 
													<?php if($row->type == 2) { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="Training Methodology">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<script>document.evaluated_form.o<?php echo $i;?>.value="<?php echo $row->answer?>"</script>
														
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Faculty</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead id="ben33" class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Attributes</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody>
												    <?php foreach($evaluatedResult->result() as $row) {  ?> 
													<?php if($row->type == 3) { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="Faculty">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<script>document.evaluated_form.o<?php echo $i;?>.value="<?php echo $row->answer?>"</script>
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Arrangements and facilities</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead  id="ben66" class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Attributes</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody>
												    <?php foreach($evaluatedResult->result() as $row) {  ?> 
													<?php if($row->type == 4) { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="Arrangements And Facilities">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<script>document.evaluated_form.o<?php echo $i;?>.value="<?php echo $row->answer?>"</script>
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
							 
										
								 	<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label"><span class="h4">Suggestions for improvement</span> <br></label>
										<input  name="type<?php echo $i;?>" type="hidden" value="5">
										<input type="text" name="q<?php echo $i;?>" value="Suggestions for improvement" hidden>
										<div class="col-sm-12 col-md-12">
											<textarea id="" name="o<?php echo $i;?>" type="text" class="form-control" placeholder="Suggestions for improvement" value="" cols="200" ></textarea>
										</div>
										<script>document.evaluated_form.o<?php echo $i;?>.value="<?php echo $row->answer?>"</script>
									</div>  
									  
								 
                                </form>
								
                                <?php 
								 } else {  if($evaluation_quations_details->result()) { ?>
								  <div class="mdc-card">
								  <div class="d-flex justify-content-between">
									<button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
									  style="font-size: 14px;">
									  Evaluate Programs
									</button>
								  </div><br>
                           <div class="tab-content card-body">
                            <div class="tab-pane active" id="first">
							 <form  method="POST"  id="evaluation_form" class="form-horizontal" onsubmit="return formValid()" 
                                action="<?php echo base_url("index.php/Test/evaluation_submit2");?>">
									 <?php foreach($evaluation_quations_details->result() as $row) {  ?>
									 <input type="text" name="eva_id"  value="<?php echo $row->id;?>" hidden>
									<input type="text" name="event_id"  value="<?php echo $row->event_id;?>" hidden>
									<input type="text" name="event_id2"  value="<?php //echo $row->event_id2;?>" hidden>
									<div class="form-group row">
										<label for="name" class="col-sm-4 col-form-label">Title Of The Programme</label>
										<div class="col-sm-6 col-md-6">
											<input id="name" type="text" class="form-control" placeholder="Employee ID" value="<?php echo $row->title;?>" disabled>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-4 col-form-label">Name Of The Faculty</label>
										<div class="col-sm-6 col-md-6">
											<input id="name" type="text" class="form-control" placeholder="Employee ID" value="<?php echo $row->facult_name;?>" disabled>
										</div>
									</div>
									 	<?php } ?>
									<hr>
									
									
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Training Components</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead id="rome"class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Programme Components</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody  id="timr">
													<?php $i=1;?>
													<?php foreach($evaluation_quations2->result() as $row) {  ?> 
													<?php if($row->type == "Training Components") { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="1">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
									
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Training Methodology</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead  id="ben" class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Methodology</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody>
												    <?php foreach($evaluation_quations2->result() as $row) {  ?> 
													<?php if($row->type == "Training Methodology") { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="2">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Faculty</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead id="ben33" class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Attributes</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody>
												    <?php foreach($evaluation_quations2->result() as $row) {  ?> 
													<?php if($row->type == "Faculty") { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="3">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label h4">Arrangements and facilities</label>
										<div class="col-sm-12 col-md-12">
										<table class="table table-bordered">
												<thead  id="ben66" class="bg-primary white">
													<tr>
														<th rowspan="2">S.No</th>
														<th rowspan="2">Attributes</th>
														<th colspan="5">Rating</th>
													</tr>
													<tr>
														<th>5</th>
														<th>4</th>
														<th>3</th>
														<th>2</th>
														<th>1</th>
													</tr>
												</thead>
												<tbody>
												    <?php foreach($evaluation_quations2->result() as $row) {  ?> 
													<?php if($row->type == "Arrangements And Facilities") { ?>
													<tr>
														<th scope="row"><?php echo $i;?></th>
														<input  name="type<?php echo $i;?>" type="hidden" value="">
														<td><?php echo $row->quations;?> <input type="text" name="q<?php echo $i;?>" value="<?php echo $row->quations;?>" hidden></input></td>
														<td>
															<label class="custom-control custom-radio">
																<input id="radioStacked2" name="o<?php echo $i;?>" type="radio" value="5" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="4" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="3" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="2" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
														<td>
															<label class="custom-control custom-radio">
																<input id="" name="o<?php echo $i;?>" type="radio" value="1" class="custom-control-input">
																<span class="custom-control-indicator"></span>
															</label>
														</td>
													</tr>
													<?php $i++; } ?>
                                                    <?php  } ?>
												</tbody>
											</table>
										</div>
									</div>
							 
										
									<div class="form-group row">
										<label for="name" class="col-sm-12 col-form-label"><span class="h4">Suggestions for improvement</span> <br><small>(What would have made the program more effective)<small></label>
										<input  name="type<?php echo $i;?>" type="hidden" value="5">
										<input type="text" name="q<?php echo $i;?>" value="Suggestions for improvement" hidden>
										<div class="col-sm-12 col-md-12">
											<textarea id="" name="o<?php echo $i;?>" type="text" class="form-control" placeholder="Suggestions for improvement" value="" cols="200" ></textarea>
										</div>
									</div>
									<div class="form-group row">
                                        <div class="col-sm-8 offset-sm-3">
                                            <div class="media">
                                                <div class="media-left">
                                                    <button class="btn btn-success">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								 <?php }}?>
                                </form>
                               
                            </div>
						</div>
                </div>
              </div>
            </div>
          </div>
        </main>
     
        
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php');?>
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- Data table --> 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
<!-- Data table --> 
<script> $(document).ready(function() {
    $('#example').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

     $("[data-toggle=tooltip]").tooltip();
    
} );
</script>
</body>
</html> 
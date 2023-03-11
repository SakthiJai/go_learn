
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/prequestion.css">
<div class="app-main__outer">
   <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-list icon-gradient bg-deep-blue"></i>
                    </div>
                    <div><h5 id="courseTitle"></h5>
                        <div class="page-title-subheading">Add Test Questions</div>
                    </div>
                </div>
            </div>
        </div> 
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
                                    <form id="questions" method="POST" class="form-horizontal" enctype="multipart/form-data">
									
									<div class="form-group row">
										<input type="text"  name="test_id" class="form-control" value="<?php echo $id;?>" hidden>
										<input type="text"  name="test_type" id="test_type" class="form-control" value="<?php echo $type;?>" hidden>
										
										<div class="col-sm-12 col-md-12">
											<label for="name" class="col-form-label">Question :</label><br>
                                            <textarea required name="quations" id="info" rows="3" class="form-control"></textarea>
                                            
                                            <div id="cke_msgText"></div>
										</div>
									</div>
									<div class="form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label  for="input" class="col-form-label">Image</label>
                                            <input id="questionImage" name="image" type="file" class="form-control">
                                            <input id="test_id" name="test_id" type="text" class="form-control" value="<?php echo $courseid;?>" hidden>
                                            <input type="text"  name="test_type" id="test_type" class="form-control" value="<?php echo $type;?>" hidden>
                                        </div>
                                    </div>
									<div class="form-group row">
										<div class="col-sm-6 col-md-6">
										
											<label for="input" class="col-form-label" >option 1</label>
                                            <input type="text" id="option1"  name="option1" class="form-control" required>
										</div>
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 2</label>
                                            <input type="text" id="option2" name="option2" class="form-control" required>
										</div>
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 3</label>
                                            <input type="text" id="option3" name="option3" class="form-control">
										</div>
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 4</label>
                                            <input type="text" id="option4" name="option4" class="form-control">
										</div>
									</div>
									<div class="form-group row">
                                        <div class="form-group col-md-6">
											<label for="input" class="col-form-label" required>Answer</label>
                                            <!--<input type="text"  name="answer" class="form-control">-->
                                            <select name="answer" id="answer" class="form-control" required>
												<option value="">select</option>
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
                                        <div class="col-sm-12 col-md-12">
											<center>
												<button class="btn btn-success">Submit</button>
											</center>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            <?php //} ?>    
                                <div class="row">
                                        <?php foreach($testtile as $row) { ?>
                                            <div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
                                            <center><span class="btn-danger" id="alert_messages"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                            </div><br>
                                            
                                        <?php } ?>
                                            <div id="listgrid">
                                                
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
<!-- <script  nonce="xyz123" src="<?php echo base_url();?>assets/scripts/main.js"></script>
Required datatable js
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script>-->
 

       
</body>

</html>
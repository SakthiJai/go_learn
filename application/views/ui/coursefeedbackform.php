
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/coursefeedbackform.css">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div>Training Components
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="tab-content" >
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <center><span class="btn-danger" hidden id="evaluation_check">Add Components Only Five Components</span></center>
                                    <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                        <?php if(isset($editadmin_evaluation) && ($editadmin_evaluation->num_rows()>0)){ foreach($editadmin_evaluation->result() as $row){ ?>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <!-- action="<?php echo base_url();?>superadmin/updateadmin_evaluation/<?php echo $row->id;?>" -->
								        <form id="components" name="components"  method="POST" class="form-horizontal">
									        <div class="form-group row ">
										        										        <div class="col-sm-6 col-md-6 col-lg-6" id="addquestion">
											        <label for="name" class="col-form-label">Add Components :</label><br>
											        <input id="quations" type="text" name="quations" class="form-control">
											        <input id="evaluation_id" type="hidden" name="evaluation_id" value="<?php echo $row->id;?>" class="form-control">
											        <input id="type" type="hidden" name="type" value="Training Components" class="form-control">
													<input id="fid" type="hidden" name="fid" class="form-control" value="<?php echo $fid;?>">
										        </div>
									        </div>
									        <div class="form-group row">
                                                <div class="col-sm-12 col-md-12">
												<center>
													<button type="submit" class="btn btn-success">Save</button>
												</center>
                                                </div>
                                            </div>
                                           
                                        </form>
										 <div class="form-group row">
                                                        <div class="col-sm-12 col-md-12" id="feedbackquestions"> </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
							<?php } } else {?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-box">
        								        <form id="courseFeedbackForm"  name="courseFeedbackForm" class="form-horizontal">
        									        <div class="form-group row">
        									            <input id="evalution_id" type="hidden" name="evalution_id" class="form-control" >
        										        <div class="col-sm-6 col-md-6 col-lg-6" id="feedbackform">
        											        <label for="name" class="col-form-label">Feedback Form title :</label><br>
        											        <input id="name" type="text" name="name" class="form-control titlecls" >
        										        </div>
        										        <div class="col-sm-6 col-md-3" id="addquestion">
											        <label for="name" class="col-form-label">Add Question :</label><br>
											        <input id="addquestion_evalution" type="text" name="addquestion_evalution" class="form-control">
										        </div>
        										        <div class="col-sm-6 col-md-3 mt-3" >
        										            <label for="name" class="col-form-label"></label><br>
        											        <button type="submit" class="btn btn-success">Add</button>
        											        <button type="button" class="btn btn-info addQuest" onclick="addQuestion()">Add Questions</button>
        										        </div>
        									        </div>
        									        <div class="form-group row">
                                                        <div class="col-sm-12 col-md-12"> </div>
                                                    </div>
                                                </form>
                                                <form id="questionForm"  name="questionForm" class="form-horizontal">
                                                    <h3 id="feedbackTitle"></h3>
        									        <div class="form-group row">
        									           <input id="feedbackid" type="hidden" name="feedbackid" class="form-control" >
        										        <div class="col-sm-6 col-md-6 col-lg-6" id="addquestion">
											        <label for="name" class="col-form-label">Add Components :</label><br>
											        <input id="addquestion" type="text" name="addquestion" class="form-control">
											        <input id="fid" type="text" name="fid" class="form-control" value="<?php echo $fid;?>">
										        </div>
        										        <div class="col-sm-6 col-md-3 escsd" >
        										            <label for="name" class="col-form-label"></label><br>
        											        <button type="submit" class="btn btn-success">Add</button>
        										        </div>
        									        </div>
        									        
                                                </form>
                                            </div>
                                        </div>
                                   </div>
                                   	<?php } ?>
                            	
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog navitema" role="document" >
             <div class="modal-content p-4 mabxhgbx" >
                
                 
                 <div class="modal-body addquestionevalution"> 
                 <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-box">
        								        
                                            </div>
                                        </div>
                                   </div>
                 </div>
             </div>
         </div>
     </div>
<!--	 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples 
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples 
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>-->
</body>

</html>
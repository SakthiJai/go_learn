        
		<div class="app-main__outer  table-responsive">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-rocket icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Courses
                        <div class="page-title-subheading">Add course image, title, program type, attach files and add text
                       <input type="hidden" value="<?php echo $this->uri->segment(3);?>"  id="editId"/>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
       
        
        <div class="row">
            <div class="col-md-12" id="showCourseAdd">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        
                                        <form class="" id="courseadd" name="courseadd"  action="<?php echo base_url();?>courses/course_adding" method="POST" enctype="multipart/form-data">
										<input type="hidden" id="base_url" name="base_url" value="<?php echo $baseurl ?>"/>
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">
                                                        Image <br> <span class="image22" ></span>
                                                        </label>
                                                    <div class="col-md-10"><input id="title" name="image" type="file" class="form-control"/>
                                                    </div>
                                                </div>     

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Title</label>
                                                    <div class="col-md-10">
                                                         <input id="test_temp_id" name="test_temp_id" type="hidden" class="form-control" value="<?php echo $this->uri->segment(3);?>">
                                                         
                                                        <input type="hidden" name="courseid" value="<?php echo $this->uri->segment(3);?>"/>
                                                       
                                                        <input id="course_title" name="course_title" type="text" class="form-control" placeholder="Title"
                                                        value="<?php echo isset($details[0])?$details[0]->course_title:"";?>" onkeypress="return NumbersOnly(this,event)">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Program Name:</label><br>
                                                    <div class="col-md-10">
                                                    <select name="program_name" id="program_name" class="form-control" required>
                                                    <option value="">Select program name</option>
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
                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Program Group:</label><br>
                                                    <div class="col-md-10">
                                                    <select name="program_group" id="program_group" class="form-control" required>
                                                    <option value="">Select program group</option>
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
                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Program Type :</label><br>
                                                    <div class="col-md-10">
                                                    <select name="training_type" id="training_type" class="form-control" required>
                                                    <option value="">Select program type</option>
                                                    <?php foreach($program_types->result() as $rowss) {?>
                                                     <?Php if($rowss->id==$details[0]->traning_type_id){?>
														<option  value="<?php echo $rowss->id; ?>" selected><?php echo $rowss->type;?></option>
													<?php } else{?>
														<option  value="<?php echo $rowss->id; ?>"><?php echo $rowss->type;?></option>
													<?php } ?>
                                                    <?php } ?>
                                                    
                                                    </select> 
                                                    
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">PDF file 1</label>
                                                    <div class="col-md-10">
                                                    <input id="title" name="pdf_file" type="file" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">PDF file 2</label>
                                                    <div class="col-md-10">
                                                    <input id="title" name="pdf_file2" type="file" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">PDF file 3</label>
                                                    <div class="col-md-10">
                                                    <input id="title" name="pdf_file3" type="file" class="form-control"/>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Description</label>
                                                    <div class="col-md-12">
                                                    <textarea id="description" name="description" class="form-control" ><?php echo  isset($details[0]->description)?$details[0]->description:""; ?></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    
                                                    <label for="title" class="form-control-label col-md-3">Learning Level Evaluation</label>
                                                    <div class="col-md-4 col-lg-6">
                                                        <div class="row">
                                                            <input id="name name22" type="radio" class="radioBtnClass" name="test"  value="1" <?php echo  (isset($details[0]->posttest_id) && $details[0]->pretest_id==1 )?'checked':""?> >&nbsp;<label>Pre test</label>&nbsp;&nbsp;
                                                            <input id="name name33" type="radio" class="radioBtnClass" name="test"  value="2"  <?php echo  (isset($details[0]->posttest_id) && $details[0]->posttest_id==1 )?'checked':""?>  >&nbsp;<label>Post test</label>&nbsp;&nbsp;
                                                            <input id="name name44" type="radio"  class="radioBtnClass" name="test"  value="3" <?php echo  (isset($details[0]->pre_and_post) && $details[0]->pre_and_post==1 )?'checked':""?>  >&nbsp;<label>Pre and Post test</label>
                                                        </div>
                                                         
                                                    </div>
                                                    <?php if(isset($details[0])){?>
                                                    <div class="col-md-3 col-lg-3"><button type="button" class="mb-2 mr-2 btn btn-success" id="viewQuestion">View Questions</button></div>
                                                     
                                                     <?php } else{?>
                                                      <div class="col-md-3 col-lg-3"><button type="button" class="mb-2 mr-2 btn btn-success  viewq testview">View Questions</button></div>
                                                      <?php } ?>
                                                </div>
                                                <div class="form-group row">
                                                    
                                                    <label for="title" class="form-control-label col-md-3">Reaction Level Evaluation</label>
                                                    <div class="col-md-3 col-lg-3">
                                                        <div class="row">
				<input id="edit_feedback_id" name="edit_feedback_id" type="hidden" class="form-control" value="<?php echo isset($feedbackmainid[0])?$feedbackmainid[0]->id:"";?>">
              <input id="feedback_main_id" name="feedback_main_id" type="hidden" class="form-control" value="<?php echo isset($feedbackmainid[0])?$feedbackmainid[0]->id:"";?>">
                                                                <input id="radioBtnClassR"   class="radioBtnClassR"  type="radio" name="reactionlevel"   value="4"  <?php echo  (isset($details[0]->feedback) && $details[0]->feedback==1 )?'checked':""?>  >&nbsp;<label>Feedback Form</label>&nbsp;&nbsp;
                                                             </div>
                                                    </div><!-- viewq feedbackview -->
													
                                                    <div class="col-md-3 col-lg-3"><button type="button" class="mb-2 mr-2 btn btn-success feedbackview viewq">Components</button></div>
													 
                                                </div>
                                             <div class="row nauitem33" >
                                                <div class="d-block text-right">
                                                    <button type="submit" id="update" class="mb-2 mr-2 btn btn-success">Update</button>
                                                    <button type="submit" id="add" class="mb-2 mr-2 btn btn-success">Submit</button>
                                                    <button type="button" class="mb-2 mr-2 btn btn-danger" onclick="pageLoad()">Cancel</button>
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
            </div>
            
            <div class="col-md-12 mb-3 text-right">
                <a class="btn btn-success right col-lg-3 col-md-3 col-xl-3 addnewbtn" href="#">Add New Course</a>
            </div>
            
            <div class="col-md-12" id="showCourseList">
                
                <div class="main-card mb-3 card">
                        
                    <div class="card-body table-responsive">
                                        <center><span class="btn-success"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                        <table id="datatable-buttons" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">S.No</th>
                                                    <th class="th-sm">Course Title</th>
                                                    <th class="th-sm">Training Type</th>
                                                    <th class="th-sm">image</th>
                                                    <th class="th-sm">PDF</th>
                                                    <th class="th-sm">PDF2</th>
                                                    <th class="th-sm">PDF3</th>
                                                    <th class="th-sm">Action</th>
                                                    <!--<th class="th-sm">Edit</th>
                                                    <th class="th-sm">Delete</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($course->result() as $data) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $data->course_title; ?></td>
                                                   <td><?php echo $data->training_type; ?></td>
                                                     <td><?php if($data->image) { ?><img src="<?php echo base_url();?>assets/images/course/<?php echo $data->image; ?>" alt=" " width="30"><?php } ?></td>
                                                    <td><?php if($data->pdf_file) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file; ?>" target="_blank">PDF</a><?php } ?></td>
                                                    <td><?php if($data->pdf_file2) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file2; ?>" target="_blank">PDF2</a><?php } ?></td>
                                                    <td><?php if($data->pdf_file3) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file3; ?>" target="_blank">PDF3</a><?php } ?></td>
                                                    <td>
													<?php if($login_details['name']!='admin' && $login_details['admin_type']!='admin' && $login_details['status']!=2){?>
                                                        <a class="btn btn-success" href="<?php echo base_url();?>superadmin/editcourse/<?php echo $data->id; ?>">Edit</a>
                                                        <a class="btn btn-danger" href="<?php echo base_url();?>/courses/deleteCourse/<?php echo $data->id; ?>">Delete</a>
														<?php }?>
                                                        </td>
                                                    <!--<td><a class="btn btn-info"><i class="pe-7s-note" aria-hidden="true"></i></a></td>
                                                    <td><a class="btn btn-danger"><i class="pe-7s-trash" aria-hidden="true"></i></a></td>-->
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
    </div> 
</div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog elample" role="document" >
             <div class="modal-content p-4 nauitem44" >
                <!--  onclick="dismissModal()" 
						<button class="btn btn-info nauitem77"  aria-label="Close" >X</button>-->
						<div class="modal-header1 ">
							
							<button type="button" class="btn-close btn btn-info nauitem77" data-bs-dismiss="modal" aria-label="Close">Submit</button>
						</div>
                 
                 <div class="modal-body feedbackmodal nauitem99" > 
                 <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-box">
        								        
                                            </div>
                                        </div>
                                   </div>
                 </div>
				 <div class="modal-header1 ">
							
							<button type="button" class="btn-close btn btn-info nauitem77" data-bs-dismiss="modal" aria-label="Close">Submit</button>
						</div>
             </div>
         </div>
     </div>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/coures.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/courses.js"></script>
<!-- Required datatable js -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/vfs_fonts.js"></script>

<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/coursefeedbackform.js"></script>






</body>

</html>
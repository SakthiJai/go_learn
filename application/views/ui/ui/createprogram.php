<?php
/*$to = 'sakthimdk86@gmail.com';
   $subject = 'New Course Assigned';
   $message = 'New Course Assigned';
      $from = "From: Vidyeebeth <vinothrock5575@gmail.com>";
  if(mail($to,$subject,$message,$from))
  {
      echo '';
  }*/
  ?>
 <div id="divLoading" style="margin: 0px; padding: 0px; position: fixed; right: 0px;
    top: 0px; width: 100%; height: 100%; background-color: #666666; z-index: 30001;
    opacity: .8; filter: alpha(opacity=70);display:none">
    <p style="position: absolute; top: 30%; left: 45%; color: White;">
        <img src='<?php echo base_url(); ?>\assets\images\loading-icon-animated-gif-19' />
    </p>
</div> 
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div>Program
                        <div class="page-title-subheading">Create Program</div>
                    </div>
                </div>
            </div>
        </div>
       <?php if(isset($editprogramlist)){ ?>
       <?php foreach ($editprogramlist->result() as $value) { ?>
       <span><?php echo $value->program_name;?></span>
      <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                               
                                <form class="" id="createProgram" action="<?php echo base_url(); ?>superadmin/creatingprogram" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="program_id" name="program_id" value="<?php echo $value->id; ?>"/>
									<input type="hidden" id="base_url" name="base_url" value="<?php echo $base_url ?>"/>
                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="course_name" class=""> <strong> Course Name:</strong></label>
                                                <!--<input name="program_name" id="exampleText" placeholder="Program Name" type="text" class="form-control">-->
                                                <select type="select" id="course_name" name="course_name" class="custom-select" onchange="updateRelevents(this)">
                                                    <option value="">Select Course</option>        
                                                    <?php foreach ($course->result() as $row) { ?>
                                                        <?php if($row->id==$value->course_name){ ?>
                                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->course_title; ?> </option>
                                                        <?php }else{ ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->course_title; ?> </option>
                                                    <?php } ?> 
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="program_name" class=""><strong>Program Name: </strong></label>
                                                <!--<input name="program_name" id="exampleText" placeholder="Program Name" type="text" class="form-control">-->
                                                <select type="select" id="program_name" name="program_name" class="custom-select program_name" onchange="getProgramDetails(this)" disabled>
                                                    <option value="">Select Program</option>
                                                    <?php foreach ($program->result() as $row) { ?>
                                                        <?php if($row->id==$value->program_name){ ?>
                                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->program_name; ?> </option>
                                                          <?php }else{ ?> 
                                                          <option value="<?php echo $row->id; ?>"><?php echo $row->program_name; ?> </option>
                                                          <?php } ?> 
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="program_group_name" class=""> <strong> Program Group:</strong></label>
                                                <!--<input name="program_group" id="exampleText" placeholder="Program Group" type="text" class="form-control">-->
                                                <select type="select" id="program_group_name" name="program_group_name" class="custom-select program_group_name" disabled>
                                                    <option value="">Select Program Group</option>
                                                    <?php foreach ($program_group->result() as $row) { ?>
                                                        <?php if($row->id==$value->program_group_name){ ?>
                                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->group_name; ?> </option>
                                                        <?php }else{ ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->group_name; ?> </option>
                                                        <?php } ?> 
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="training_type" class=""> <strong> Training Type</strong></label>
                                                <!--<input name="training_type" id="exampleText" placeholder="Training Type" type="text" class="form-control">-->
                                                <select type="select" id="training_type" name="training_type" class="custom-select training_type" disabled>
                                                    <option value="">Select Course</option>
                                                    <?php foreach ($program_type->result() as $row) { ?>
                                                        <?php if($row->type==$value->training_type){ ?>
                                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->type; ?> </option>
                                                        <?php }else{ ?>
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->type; ?> </option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="nature_program" class=""> <strong>Nature of Program: </strong></label>
                                                <!--<input name="program" id="exampleText" placeholder="Nature of Program" type="text" class="form-control">-->
                                                <select type="select" id="nature_program" name="nature_program" class="custom-select">
                                                    <option value="">Select Nature Of Program</option>
                                                    
                                                    <option value="Calendared programs" <?php echo isset($value)?($value->nature_program=='Calendared programs'?'selected':''):''?>>Calendared Programs</option>
                                                    <option value="Coromandel Developed programs" <?php echo isset($value)?($value->nature_program=='Coromandel Developed programs'?'selected':''):''?>>Coromandel Developed Programs</option>
                                                    <option value="Murugappa Group designed Programs" <?php echo isset($value)?($value->nature_program=='Murugappa Group designed Programs'?'selected':''):''?>>Murugappa Group Designed Programs</option>
                                                    <option value="Broucher Programs" <?php echo isset($value)?($value->nature_program=='Broucher Programs'?'selected':''):''?>>Broucher Programs</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="tni_source" class=""> <strong>TNI Source:</strong></label>
                                                <select type="select" id="tni_source" name="tni_source" class="custom-select">
                                                    <option value="">Select TNI Source</option>
                                                    <option value="Competency Gaps" <?php echo isset($value)?($value->tni_source=='Competency Gaps'?'selected':''):''?>>Competency Gaps</option>
                                                    <option value="Succession Planning" <?php echo isset($value)?($value->tni_source=='Succession Planning'?'selected':''):''?>>Succession Planning</option>
                                                    <option value="Inputs from P M S" <?php echo isset($value)?($value->tni_source=='Inputs from P M S'?'selected':''):''?>>Inputs From P M S</option>
                                                    <option value="Inputs by Manager" <?php echo isset($value)?($value->tni_source=='Inputs by Manager'?'selected':''):''?>>Inputs By Manager</option>
                                                    <option value="Request from the trainee" <?php echo isset($value)?($value->tni_source=='Request from the trainee'?'selected':''):''?>>Request From The Trainee</option>
                                                    <option value="Compliance programs" <?php echo isset($value)?($value->tni_source=='Compliance programs'?'selected':''):''?>>Compliance Programs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                            
                                           
                                            
                                             <!--<div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="cost_per_emp" class=""> <strong> Projected Cost Per Employee:</strong></label>
                                                    <input name="cost_per_emp" id="cost_per_emp" placeholder="Cost Per Employee" type="text" class="form-control">
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-2">-->
                                        <!--    <div class="position-relative form-group">-->
                                        <!--        <label for="exampleSelect" class=""><strong>TTT: </strong></label><br>-->
                                        <!--        <input id="name" type="radio" name="ttt"  value="TTT" ><label>Yes</label>&nbsp;&nbsp;-->
                                        <!--        <input id="name" type="radio" name="ttt"  value="" checked required><label>No</label>-->
                                        <!--    </div>-->
                                        <!--</div>-->


                                        <!--<div class="col-md-5">-->
                                        <!--    <div class="position-relative form-group">-->
                                        <!--        <label for="exampleSelect" class=""><strong>TTT Programs: </strong></label>-->
                                        <!--        <select type="select" id="exampleCustomSelect" name="ttt_id" class="custom-select">-->
                                        <!--            <option value="">Select TTT Programs</option>-->
                                        <!--            <option value="1">aaa</option>-->
                                        <!--            <option value="2">bb</option>-->
                                        <!--        </select>-->
                                        <!--    </div>-->
                                        <!--</div>-->

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="faculty_name" class=""> <strong> Faculty Name:</strong></label>
                                                <select type="select" id="faculty_name" name="faculty_name" class="custom-select">
                                                    <option value="">Select</option>
                                                    <?php foreach ($faculty->result() as  $row) { ?>
                                                        <?php if($row->id==$value->faculty_name){ ?>
                                                            <option value="<?php echo $row->id; ?>" selected><?php echo $row->name; ?></option>
                                                        <?php }else{ ?> 
                                                            <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                        <?php } ?>    
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="faculty_type" class=""> <strong> Faculty Type:</strong></label>
                                                <select type="select" id="faculty_type" name="faculty_type" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1" <?php echo isset($value)?($value->faculty_type=='1'?'selected':''):''?>>Internal</option>
                                                    <option value="2" <?php echo isset($value)?($value->faculty_type=='2'?'selected':''):''?>>External</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="training_mode" class=""> <strong> Training Mode:</strong></label>
                                                <select type="select" id="training_mode" name="training_mode" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1" <?php echo isset($value)?($value->training_mode=='1'?'selected':''):''?>>Physical</option>
                                                    <option value="2" <?php echo isset($value)?($value->training_mode=='2'?'selected':''):''?>>Virtual</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-6  form-row"> 
                                         <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="no_of_hrs" class=""> <strong> No. of Hours:<?php echo $value->no_of_hrs;?></strong></label>
                                                <select type="select" id="no_of_hrs" name="no_of_hrs" class="custom-select">
                                                    <option value="">Select</option>
                                                    <!--<option value="0.1875">1.5</option>
                                                    <option value="0.25">2</option>
                                                    <option value="0.3125">2.5</option>
                                                    <option value="0.375">3</option>
                                                    <option value="0.4375">3.5</option>
                                                    <option value="0.5">4</option>
                                                    <option value="0.5625">4.5</option>
                                                    <option value="0.625">5</option>
                                                    <option value="0.6875">5.5</option>
                                                    <option value="0.75">6</option>
                                                    <option value="0.8125">6.5</option>
                                                    <option value="0.875">7</option>
                                                    <option value="0.9375">7.5</option>
                                                    <option value="1">8</option> -->
                                                     <option value="1" <?php echo isset($value)?($value->no_of_hrs=="1.30"?'selected':''):''?>>1.5</option>
                                                    <option value="2" <?php echo isset($value)?($value->no_of_hrs=="2"?'selected ':'yyy'):''?>>2</option>
                                                    <option value="3" <?php echo isset($value)?($value->no_of_hrs=="2.30"?'selected':''):''?>>2.5</option>
                                                    <option value="4" <?php echo isset($value)?($value->no_of_hrs=="3"?'selected':''):''?>>3</option>
                                                    <option value="5" <?php echo isset($value)?($value->no_of_hrs=="3.30"?'selected':''):''?>>3.5</option>
                                                    <option value="6" <?php echo isset($value)?($value->no_of_hrs=="4"?'selected':''):''?>>4</option>
                                                    <option value="7" <?php echo isset($value)?($value->no_of_hrs=="4.30"?'selected':''):''?>>4.5</option>
                                                    <option value="8" <?php echo isset($value)?($value->no_of_hrs=="5"?'selected':''):''?>>5</option>
                                                    <option value="9" <?php echo isset($value)?($value->no_of_hrs=="5.30"?'selected':''):''?>>5.5</option>
                                                    <option value="10" <?php echo isset($value)?($value->no_of_hrs=="6"?'selected':''):''?>>6</option>
                                                    <option value="11" <?php echo isset($value)?($value->no_of_hrs=="6.30"?'selected':''):''?>>6.5</option>
                                                    <option value="12" <?php echo isset($value)?($value->no_of_hrs=="7"?'selected':''):''?>>7</option>
                                                    <option value="13" <?php echo isset($value)?($value->no_of_hrs=="7.30"?'selected':''):''?>>7.5</option>
                                                    <option value="14" <?php echo isset($value)?($value->no_of_hrs=="8"?'selected':''):''?>>8</option>
                                                </select>
                                            </div>
                                         </div>
                                          <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="ttt" class=""> <strong>TTT</strong></label>
                                                <select type="select" id="ttt" name="ttt" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1"  <?php echo isset($value)?($value->ttt=='1'?'selected':''):''?>>Yes</option>
                                                    <option value="0"  <?php echo isset($value)?($value->ttt=='2'?'selected':''):''?>>No</option>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                       
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6  form-row">
                                           <div class="col-md-6">
                                             <div class="position-relative form-group">
                                                <label for="from_date" class=""> <strong>Start Date:</strong></label>
                                                <input name="from_date" input type="date" id="from_date" placeholder="From Date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->from_date; ?>" type="10/07/1984" class="form-control">
                                             </div>
                                           </div>
                                          <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="to_date" class=""> <strong>End Date:</strong></label>
                                                <input name="to_date" input type="date" id="to_date" placeholder="End Date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->to_date; ?>" type="10/07/1984" class="form-control">
                                            </div>
                                          </div>
                                        </div>
                                    <div class="col-md-6  form-row"> 
                                         <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="start_time" class=""> <strong>Start Time:</strong></label>
                                                <input name="start_time" type="time" id="start_time" placeholder="Start Time" min="09:00" max="22:00" value="<?php echo $value->start_time; ?>" class="form-control">
                                            </div>
                                         </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="end_time" class=""> <strong>End Time:</strong></label>
                                                <input name="end_time" input type="text" id="end_time" placeholder="End Time"  value="<?php echo $value->end_time; ?>" class="form-control" readonly>
                                            </div>
                                        </div>
                                      </div>
                                     </div>
                                     <div class="form-row">
                                       
                                    </div>
                                      
                                     
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="venue" class=""> <strong>Venue:</strong></label>
                                                <input name="venue" id="venue" placeholder="Venue" type="text" value="<?php echo $value->venue; ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="location" class=""> <strong> Location:</strong></label>
                                                <input name="location" id="location" placeholder="Location"  value="<?php echo $value->location; ?>" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                     
                                      
                                     <!--   <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="evaluation" class=""> <strong>Evaluation:</strong></label>
                                                <select type="select" id="evaluation" name="evaluation" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1">Level-1</option>
                                                    <option value="2">Level-2</option>
                                                    <option value="3">Level-3</option>
                                                    <option value="4">Level-4</option>
                                                    <option value="5">Level-5</option>
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="form-row">
                                         <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="cost_per_program" class=""> <strong> Total Cost Per Program:</strong></label>
                                                    <input name="cost_per_program" id="cost_per_program" placeholder="Cost Per Program" value="<?php echo $value->cost_per_program; ?>" type="text" class="form-control">
                                                </div>
                                            </div>
                                            </div>
 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="assignemployee" class=""> <strong>Assign Employee: (Enter Employee ID's separated by space ( ) like 123XXX 456XXX 789XXX)</strong></label>
                                                <?php
                                                 $employeeIds =array();
                                                if(isset($programEmployeelist) && ($programEmployeelist->num_rows() > 0)){
                                               
                                                ?>
                                                    <?php foreach ($programEmployeelist->result() as $row) {
                                                    array_push( $employeeIds , $row->employee_id);
                                                    ?>
                                                       <?php } ?>
                                                <?php } else{?>
                                                    
                                                <?php }
                                                 $employeeIds = implode(" ", $employeeIds);
                                                ?>
                                                 <input name="assignemployee" id="assignemployee" placeholder="Assign Employee" type="text" value="<?php echo $employeeIds; ?>" class="form-control">
                                                        
                                            </div>
                                            <div class="error" id="empnot1"></div>
                                            <div class="error" id="assign_emp_check1"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="d-block text-center">
                                                <button class="mb-2 mr-2 btn btn-success">SUBMIT</button>
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
        <?php } ?>
       <?php }else{ ?>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                <form class="" id="createProgram" action="<?php echo base_url(); ?>superadmin/creatingprogram" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" id="program_id" name="program_id" value=""/>
									<input type="hidden" id="base_url" name="base_url" value="<?php echo $base_url ?>"/>
                                    <div class="form-row">

                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="course_name" class=""> <strong> Course Name:</strong></label>
                                                <!--<input name="program_name" id="exampleText" placeholder="Program Name" type="text" class="form-control">-->
                                                <select type="select" id="course_name" name="course_name" class="custom-select">
                                                    <option value="">Select Course</option>        
                                                    <?php foreach ($course->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->course_title; ?> </option>
                                                    <?php } ?>      
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="program_name" class=""><strong>Program Name: </strong></label>
                                                <!--<input name="program_name" id="exampleText" placeholder="Program Name" type="text" class="form-control">-->
                                                <select type="select" id="program_name" name="program_name" class="custom-select program_name" onchange="getProgramDetails(this)" disabled>
                                                    <option value="">Select Program</option>
                                                    <?php foreach ($program->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->program_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="program_group_name" class=""> <strong> Program Group:</strong></label>
                                                <!--<input name="program_group" id="exampleText" placeholder="Program Group" type="text" class="form-control">-->
                                                <select type="select" id="program_group_name" name="program_group_name" class="custom-select program_group_name" disabled>
                                                    <option value="">Select Program Group</option>
                                                    <?php foreach ($program_group->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->group_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="training_type" class=""> <strong> Training Type</strong></label>
                                                <!--<input name="training_type" id="exampleText" placeholder="Training Type" type="text" class="form-control">-->
                                                <select type="select" id="training_type" name="training_type" class="custom-select training_type" disabled>
                                                    <option value="">Select Course</option>
                                                    <?php foreach ($program_type->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->type; ?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="nature_program" class=""> <strong>Nature of Program:</strong></label>
                                                <!--<input name="program" id="exampleText" placeholder="Nature of Program" type="text" class="form-control">-->
                                                <select type="select" id="nature_program" name="nature_program" class="custom-select">
                                                    <option value="">Select Nature Of Program</option>
                                                    <option value="Calendared programs">Calendared Programs</option>
                                                    <option value="Coromandel Developed programs">Coromandel Developed Programs</option>
                                                    <option value="Murugappa Group designed Programs">Murugappa Group Designed Programs</option>
                                                    <option value="Broucher Programs">Broucher Programs</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="tni_source" class=""> <strong>TNI Source:</strong></label>
                                                <select type="select" id="tni_source" name="tni_source" class="custom-select">
                                                    <option value="">Select TNI Source</option>
                                                    <option value="Competency Gaps">Competency Gaps</option>
                                                    <option value="Succession Planning">Succession Planning</option>
                                                    <option value="Inputs from P M S">Inputs From P M S</option>
                                                    <option value="Inputs by Manager">Inputs By Manager</option>
                                                    <option value="Request from the trainee">Request From The Trainee</option>
                                                    <option value="Compliance programs">Compliance Programs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                      

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="faculty_name" class=""> <strong> Faculty Name:</strong></label>
                                                <select type="select" id="faculty_name" name="faculty_name" class="custom-select">
                                                    <option value="">Select</option>
                                                    <?php foreach ($faculty->result() as  $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="faculty_type" class=""> <strong> Faculty Type:</strong></label>
                                                <select type="select" id="faculty_type" name="faculty_type" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1">Internal</option>
                                                    <option value="2">External</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="training_mode" class=""> <strong> Training Mode:</strong></label>
                                                <select type="select" id="training_mode" name="training_mode" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1">Physical</option>
                                                    <option value="2">Virtual</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-6  form-row"> 
                                         <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="no_of_hrs" class=""> <strong> No. of Hours:</strong></label>
                                                <select type="select" id="no_of_hrs" name="no_of_hrs" class="custom-select">
                                                    <option value="">Select</option>
                                                    
                                                     <option value="1.30">1.5</option>
                                                    <option value="2">2</option>
                                                    <option value="2.30">2.5</option>
                                                    <option value="3">3</option>
                                                    <option value="3.30">3.5</option>
                                                    <option value="4">4</option>
                                                    <option value="4.30">4.5</option>
                                                    <option value="5">5</option>
                                                    <option value="5.30">5.5</option>
                                                    <option value="6">6</option>
                                                    <option value="6.30">6.5</option>
                                                    <option value="7">7</option>
                                                    <option value="7.30">7.5</option>
                                                    <option value="8">8</option>
                                                </select>
                                            </div>
                                         </div>
                                          <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="ttt" class=""> <strong>TTT</strong></label>
                                                <select type="select" id="ttt" name="ttt" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                      </div>
                                       
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6  form-row">
                                           <div class="col-md-6">
                                             <div class="position-relative form-group">
                                                <label for="from_date" class=""> <strong>Start Date:</strong></label>
                                                <input name="from_date" input type="date" id="from_date" placeholder="From Date" min="<?php echo date("Y-m-d"); ?>" type="10/07/1984" class="form-control">
                                             </div>
                                           </div>
                                          <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="to_date" class=""> <strong>End Date:</strong></label>
                                                <input name="to_date" input type="date" id="to_date" placeholder="End Date" min="<?php echo date("Y-m-d"); ?>" type="10/07/1984" class="form-control">
                                            </div>
                                          </div>
                                        </div>
                                    <div class="col-md-6  form-row"> 
                                         <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="start_time" class=""> <strong>Start Time:</strong></label>
                                                <input name="start_time" type="time" id="start_time" placeholder="Start Time" min="09:00" max="22:00" value="<?php echo date("H:i"); ?>" class="form-control">
                                            </div>
                                         </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="end_time" class=""> <strong>End Time:</strong></label>
                                                <input name="end_time" input type="text" id="end_time" placeholder="End Time"  value=" " class="form-control" readonly>
                                            </div>
                                        </div>
                                      </div>
                                     </div>
                                     <div class="form-row">
                                       
                                    </div>
                                      
                                     
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="venue" class=""> <strong>Venue:</strong></label>
                                                <input name="venue" id="venue" placeholder="Venue" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="location" class=""> <strong> Location:</strong></label>
                                                <input name="location" id="location" placeholder="Location" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                     
                                      
                                     <!--   <div class="col-md-6">
                                            <div class="position-relative form-group">
                                                <label for="evaluation" class=""> <strong>Evaluation:</strong></label>
                                                <select type="select" id="evaluation" name="evaluation" class="custom-select">
                                                    <option value="">Select</option>
                                                    <option value="1">Level-1</option>
                                                    <option value="2">Level-2</option>
                                                    <option value="3">Level-3</option>
                                                    <option value="4">Level-4</option>
                                                    <option value="5">Level-5</option>
                                                </select>
                                            </div>
                                        </div>-->
                                        <div class="form-row">
                                         <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="cost_per_program" class=""> <strong> Total Cost Per Program:</strong></label>
                                                    <input name="cost_per_program" id="cost_per_program" placeholder="Cost Per Program" type="text" class="form-control">
                                                </div>
                                            </div>
                                            </div>
 
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="assignemployee" class=""> <strong>Assign Employee: (Enter Employee ID's separated by space ( ) like 123XXX 456XXX 789XXX)</strong></label>
                                                <input name="assignemployee" id="assignemployee" placeholder="Assign Employee" type="text" class="form-control">
                                            </div>
                                            <div class="error" id="empnot"></div>
                                            <div class="error" id="assign_emp_check"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="d-block text-center">
                                                <button class="mb-2 mr-2 btn btn-success">SUBMIT</button>
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
   <?php } ?>     
        
    </div>
</div>
</div>
</div>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/createprogram.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/createprogram.js"></script>




</body>

</html>
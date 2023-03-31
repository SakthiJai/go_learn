<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<body>
  <script src="<?php echo base_url(); ?>/assets/js/preloader.js"></script>

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
                    <button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
                      style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">
                     
                      Create Program
                    </button>
                    
                  </div>
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                       <?php if(isset($editprogramlist)){ ?><?php foreach ($editprogramlist->result() as $value) { ?><span><?php echo $value->program_name;?></span>
                        <form id="createProgram" action="<?php echo base_url('main/creatingprogram'); ?>" method="POST">
                        <input type="hidden" id="program_id" name="program_id" value>
                        <input type="hidden" id="base_url" name="base_url" value="<?php echo $base_url ?>"/>
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                            
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Course Name</label>
                                  <select class="mdc-text-field__input" id="course_name" name="course_name"  onchange="updateRelevents(this)">
                                        <option disabled selected value> </option>
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
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Program Name </label>
                                  <select class="mdc-text-field__input program_name" id="program_name" name="program_name"  onchange="getProgramDetails(this)" disabled>
                                        <option disabled selected value> </option>
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
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Program Group </label>
                                  <select class="mdc-text-field__input program_group_name" id="program_group_name" name="program_group_name"  disabled>
                                        <option disabled selected value> </option>
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
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Training Type </label>
                                  <select class="mdc-text-field__input training_type" id="training_type" name="training_type"  disabled>
                                       <option disabled selected value> </option>
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
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Nature of Program </label>
                                  <select class="mdc-text-field__input training_type" id="nature_program" name="nature_program">
														 <option disabled selected value> </option>
                                                      <option value="Calendared programs" <?php echo isset($value)?($value->nature_program=='Calendared programs'?'selected':''):''?>>Calendared Programs</option>
                                                    <option value="Coromandel Developed programs" <?php echo isset($value)?($value->nature_program=='Coromandel Developed programs'?'selected':''):''?>>Coromandel Developed Programs</option>
                                                    <option value="Murugappa Group designed Programs" <?php echo isset($value)?($value->nature_program=='Murugappa Group designed Programs'?'selected':''):''?>>Murugappa Group Designed Programs</option>
                                                    <option value="Broucher Programs" <?php echo isset($value)?($value->nature_program=='Broucher Programs'?'selected':''):''?>>Broucher Programs</option>
                                                    
                                                </select>
                                </div>
                              </div> 
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">TNI Source </label>
                                  <select class="mdc-text-field__input training_type"id="tni_source" name="tni_source">
													 <option disabled selected value> </option>
                                                    <option value="Competency Gaps" <?php echo isset($value)?($value->tni_source=='Competency Gaps'?'selected':''):''?>>Competency Gaps</option>
                                                    <option value="Succession Planning" <?php echo isset($value)?($value->tni_source=='Succession Planning'?'selected':''):''?>>Succession Planning</option>
                                                    <option value="Inputs from P M S" <?php echo isset($value)?($value->tni_source=='Inputs from P M S'?'selected':''):''?>>Inputs From P M S</option>
                                                    <option value="Inputs by Manager" <?php echo isset($value)?($value->tni_source=='Inputs by Manager'?'selected':''):''?>>Inputs By Manager</option>
                                                    <option value="Request from the trainee" <?php echo isset($value)?($value->tni_source=='Request from the trainee'?'selected':''):''?>>Request From The Trainee</option>
                                                    <option value="Compliance programs" <?php echo isset($value)?($value->tni_source=='Compliance programs'?'selected':''):''?>>Compliance Programs</option>
                                                </select>
                                </div>
                              </div> 
							     <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Faculty Name </label>
                                  <select class="mdc-text-field__input training_type" id="faculty_name" name="faculty_name">
                                       <option disabled selected value> </option>
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
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Faculty Type </label>
                                  <select class="mdc-text-field__input training_type" id="faculty_type" name="faculty_type" >
                                       
                                                    <option disabled selected value> </option>
                                                    <option value="1" <?php echo isset($value)?($value->faculty_type=='1'?'selected':''):''?>>Internal</option>
                                                    <option value="2" <?php echo isset($value)?($value->faculty_type=='2'?'selected':''):''?>>External</option>
                                                </select>
                                </div>
                              </div>
							    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Training Mode</label>
                                  <select class="mdc-text-field__input training_type" id="faculty_type" name="faculty_type" >
                                       
                                                  <option disabled selected value> </option>
                                                    <option value="1" <?php echo isset($value)?($value->training_mode=='1'?'selected':''):''?>>Physical</option>
                                                    <option value="2" <?php echo isset($value)?($value->training_mode=='2'?'selected':''):''?>>Virtual</option>
                                                </select>
                                </div>
                              </div>
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">No. of Hours:<?php echo $value->no_of_hrs;?></label>
                                  <select class="mdc-text-field__input training_type" id="no_of_hrs" name="no_of_hrs" >
                                        <option disabled selected value> </option>
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
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">TTT</label>
                                  <select class="mdc-text-field__input training_type" id="ttt" name="ttt" >
                                       
                                                    <option disabled selected value> </option>
                                                    <option value="1"  <?php echo isset($value)?($value->ttt=='1'?'selected':''):''?>>Yes</option>
                                                    <option value="0"  <?php echo isset($value)?($value->ttt=='2'?'selected':''):''?>>No</option>
                                                </select>
                                </div>
                              </div>
							
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label"> Training Mode </label>
                                  <select class="mdc-text-field__input training_type" id="training_mode" name="training_mode" >
                                       
                                                   <option disabled selected value> </option>
                                                    <option value="1" <?php echo isset($value)?($value->faculty_type=='1'?'selected':''):''?>>Internal</option>
                                                    <option value="2" <?php echo isset($value)?($value->faculty_type=='2'?'selected':''):''?>>External</option>
                                                </select>
                                </div>
                              </div>
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" id="  from_date" name="from_date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->from_date; ?>" type="10/07/1984"  >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="" class="mdc-floating-label">Start Date:</label>
                                </div>
                              </div>
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="to_date" input type="date" id="to_date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->to_date; ?>" type="10/07/1984">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="" class="mdc-floating-label">End Date:</label>
                                </div>
                              </div>
							  
                              <input type="hidden" name="id" id="id" value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['id'] : '' ?>">
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="start_time" type="text" id="start_time" placeholder="Start Time" value="<?php echo $value->start_time; ?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Start Time:</label>
                                </div>
                              </div>
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="end_time"  type="text" id="end_time" placeholder="End Time"  value="<?php echo $value->end_time; ?>"  readonly>
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">End Time:</label>
                                </div>
                              </div>
                              
                             
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="venue" id="venue" placeholder="Venue" type="text" value="<?php echo $value->venue; ?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Venue</label>
                                </div>
                              </div>
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input"  name="location" id="location"   value="<?php echo $value->location; ?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Location</label>
                                </div>
                              </div>
							  
                             
						 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input"  name="cost_per_program" id="cost_per_program" placeholder="Cost Per Program" value="<?php echo $value->cost_per_program; ?>" type="text">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Total Cost Per Program</label>
                                </div>
                              </div>
                           
                              

                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <button
                                  class=" mt-1 btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right; ">
                                  Submit
                                </button>&nbsp;&nbsp;&nbsp;&nbsp; 
                                  
                                <button
                                  class=" mt-1 btn btn-primary mdc-button mdc-button--unelevated filled-button--info mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px; --mdc-ripple-fg-scale:2.19553; --mdc-ripple-fg-translate-start:8.23752px, -2.59998px; --mdc-ripple-fg-translate-end:13px, -1px;">
                                  Cancel
                                </button>
                              </div>


                            </div>
                          </div>
                        </form>
						<?php } ?>
       <?php }else{ ?>
	   <form id="createProgram" action="<?php echo base_url('main/creatingprogram'); ?>" method="POST">
                        <input type="hidden" id="program_id" name="program_id" value>
                        <input type="hidden" id="base_url" name="base_url" value="<?php echo $base_url ?>"/>
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                            
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Course Name</label>
                                  <select class="mdc-text-field__input" id="course_name" name="course_name"  onchange="updateRelevents(this)">
                                        <option disabled selected value> </option>
                                                   <option value="">Select Course</option>        
                                                    <?php foreach ($course->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->course_title; ?> </option>
                                                    <?php } ?> 
                                                </select>
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Program Name </label>
                                  <select class="mdc-text-field__input program_name" id="program_name" name="program_name"  onchange="getProgramDetails(this)" disabled>
                                        <option disabled selected value> </option>
                                                   <option value="">Select Program</option>
                                                    <?php foreach ($program->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->program_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                </div>
                              </div> 
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Program Group </label>
                                  <select class="mdc-text-field__input program_group_name" id="program_group_name" name="program_group_name"  disabled>
                                        <option disabled selected value> </option>
                                                   <option value="">Select Program Group</option>
                                                    <?php foreach ($program_group->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->group_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                </div>
                              </div> 
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Training Type </label>
                                  <select class="mdc-text-field__input training_type" id="training_type" name="training_type"  disabled>
                                       <option disabled selected value> </option>
                                                     <option value="">Select Course</option>
                                                    <?php foreach ($program_type->result() as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->type; ?> </option>
                                                    <?php } ?>
                                                </select>
                                </div>
                              </div> 
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Nature of Program </label>
                                  <select class="mdc-text-field__input training_type" id="nature_program" name="nature_program">
														 <option disabled selected value> </option>
                                                       <option value="">Select Nature Of Program</option>
                                                    <option value="Calendared programs">Calendared Programs</option>
                                                    <option value="Coromandel Developed programs">Coromandel Developed Programs</option>
                                                    <option value="Murugappa Group designed Programs">Murugappa Group Designed Programs</option>
                                                    <option value="Broucher Programs">Broucher Programs</option>
                                                    
                                                </select>
                                </div>
                              </div> 
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">TNI Source </label>
                                  <select class="mdc-text-field__input training_type"id="tni_source" name="tni_source">
													 <option disabled selected value> </option>
                                                    <option value="Competency Gaps">Competency Gaps</option>
                                                    <option value="Succession Planning">Succession Planning</option>
                                                    <option value="Inputs from P M S">Inputs From P M S</option>
                                                    <option value="Inputs by Manager">Inputs By Manager</option>
                                                    <option value="Request from the trainee">Request From The Trainee</option>
                                                    <option value="Compliance programs">Compliance Programs</option>
                                                </select>
                                </div>
                              </div> 
							     <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Faculty Name </label>
                                  <select class="mdc-text-field__input training_type" id="faculty_name" name="faculty_name">
                                       <option disabled selected value> </option>
                                                     <?php foreach ($faculty->result() as  $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                </div>
                              </div> 
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Faculty Type </label>
                                  <select class="mdc-text-field__input training_type" id="faculty_type" name="faculty_type" >
                                       
                                                    <option disabled selected value> </option>
                                                     <option value="1">Internal</option>
                                                    <option value="2">External</option>
                                                </select>
                                </div>
                              </div>
							    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Training Mode</label>
                                  <select class="mdc-text-field__input training_type" id="training_mode" name="training_mode" >
                                       
                                                  <option disabled selected value> </option>
                                                   <option value="1">Physical</option>
                                                    <option value="2">Virtual</option>
                                                </select>
                                </div>
                              </div>
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">No. of Hours:<?php echo $value->no_of_hrs;?></label>
                                  <select class="mdc-text-field__input training_type" id="no_of_hrs" name="no_of_hrs" >
                                        <option disabled selected value> </option>
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
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">TTT</label>
                                  <select class="mdc-text-field__input training_type" id="ttt" name="ttt" >
                                       
                                                    <option disabled selected value> </option>
                                                     <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                </div>
                              </div>
							  
							  
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
								 <input id="dp1" type="text" class="form-control clickable input-md mdc-text-field__input" id="  from_date" name="from_date"   min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->from_date; ?>">
                                  <!--<input class="mdc-text-field__input" id="  from_date" name="from_date"   min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->from_date; ?>"   >-->
                                  <label for="text-field-hero-input" class="mdc-floating-label">Start Date:</label>
                                </div>
                              </div>
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
								<input id="dp2" type="text" class="form-control clickable input-md mdc-text-field__input" name="to_date" input type="date" id="to_date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->to_date; ?>" type="10/07/1984">
                                  <!--<input class="mdc-text-field__input" name="to_date" input type="date" id="to_date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $value->to_date; ?>" type="10/07/1984">-->
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">End Date:</label>
                                </div>
                              </div>
                              <input type="hidden" name="id" id="id" value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['id'] : '' ?>">
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded ">
                                  <input class="mdc-text-field__input" name="start_time" type="text" id="start_time"  value="<?php echo $value->start_time; ?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="start_time" class="mdc-floating-label">Start Time:</label>
                                </div>
                              </div>
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
								  
                                  <input class="mdc-text-field__input" name="end_time"  type="text" id="end_time"   value="<?php echo $value->end_time; ?>"  >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="end_time" class="mdc-floating-label">End Time:</label>
                                </div>
                              </div>
                              
                             
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="venue" id="venue" placeholder="Venue" type="text" value="<?php echo $value->venue; ?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Venue</label>
                                </div>
                              </div>
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input"  name="location" id="location"   value="<?php echo $value->location; ?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Location</label>
                                </div>
                              </div>
							  
                             
						 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input"  name="cost_per_program" id="cost_per_program" placeholder="Cost Per Program" value="<?php echo $value->cost_per_program; ?>" type="text">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Total Cost Per Program</label>
                                </div>
                              </div>
                           
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>
                              
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <button
                                  class=" mt-1 btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right; ">
                                  Submit
                                </button>&nbsp;&nbsp;&nbsp;&nbsp; 
                                  
                                <button type="reset" id="configreset"
                                  class=" mt-1 btn btn-primary mdc-button mdc-button--unelevated filled-button--info mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px; --mdc-ripple-fg-scale:2.19553; --mdc-ripple-fg-translate-start:8.23752px, -2.59998px; --mdc-ripple-fg-translate-end:13px, -1px;"  onclick="myFunction()">
                                  Cancel
                                </button>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>

                            </div>
                          </div>
                        </form>
						 <?php } ?> 
                      </div>
                    </div>
                  </div>
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php'); ?>
        <!-- partial -->
      </div>
    </div>
  </div>
   <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/datepicker.min.css.css" />
  <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/gijgo.min.css" />
  <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/jquery-clockpicker.min.css" />
  <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/create_program.css" />
<script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/createprogram.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/clockpicker.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/gijgo.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.min.js"></script>
 <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/datepicker.min.css.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css"></link>
  
     <script>

$(document).ready(function(){

$('.input-daterange').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    calendarWeeks : true,
    clearBtn: true,
    disableTouchKeyboard: true
});

});
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#dp1').datepicker({

  beforeShowDay: function(date) {
    return date.valueOf() >= now.valueOf();
  },
  autoclose: true

}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

    var newDate = new Date(ev.date);
    newDate.setDate(newDate.getDate() + 1);
    checkout.datepicker("update", newDate);

  }
  $('#dp2')[0].focus();
});


var checkout = $('#dp2').datepicker({
  beforeShowDay: function(date) {
    if (!checkin.datepicker("getDate").valueOf()) {
      return date.valueOf() >= new Date().valueOf();
    } else {
      return date.valueOf() > checkin.datepicker("getDate").valueOf();
    }
  },
  autoclose: true

}).on('changeDate', function(ev) {});

    </script>
</body>

</html>
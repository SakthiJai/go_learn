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
                <div class="mdc-card">
                  <div class="d-flex justify-content-between">
                    
                   <button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">
                   Assign employees
                      </button>
                  
                  </div>
				  &nbsp;&nbsp;&nbsp;&nbsp;
				  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <center><span class="">
                            <?php echo $this->session->flashdata('msg'); ?>
                          </span></center>
                        <form   action="<?php echo base_url('main/assign_emp/'.$program_id);?>" method="POST" enctype="multipart/form-data">
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">

                            
                              
                                  <div class="mdc-line-ripple"></div>
                                
                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                    <button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">
                   Course Details
                      </button>
                                  </div>
                                  <?php if(isset($course_detial)){foreach($course_detial->result() as $row) {  ?>
                                  
                                 
                               
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Course Tittle</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo $row->course_name;?>" readonly >			
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Program Name</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo $row->program_name;?>" readonly>			
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Program Group:</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo $row->program_group_name;?>" readonly>			
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Faculty Name</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo $row->faculty_name;?>" readonly>			
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Location</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo $row->location;?>"readonly >			
                                </div>
                              </div>
                           
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">From Date</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo date('d-m-Y', strtotime($row->from_date));?>"readonly >			
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">End Date</label>
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="branch_plant" value="<?php echo date('d-m-Y', strtotime($row->to_date));?>"readonly >			
                                </div>
                              </div>
                              <?php } }?>
                               
                            
                           

                            
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                     
                        <center><span class="">
                            <?php echo $this->session->flashdata('msg'); ?>
                          </span></center>
                        <form    id="tasts" action="<?php echo base_url('main/assign_emp/'.$program_id);?>" method="POST" enctype="multipart/form-data">
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">

                             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">SBU</label>
                                  <select class="mdc-text-field__input" name="sbu"  id="sbu" placeholder="SBU">
                                    <option value="" disabled selected value> </option>
                                    <?php foreach ($sbu->result() as $sbu) { ?>
                                      <?php if ($sbu->sbu != null): ?>
                                        <option value="<?php echo $sbu->id; ?>">
                                          <?php echo $sbu->sbu; ?>
                                        </option>
                                      <?php endif; ?>
                                    <?php } ?>

                                  </select>
                                </div>
                              </div>

                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Branch/Plant</label>
                                  <select class="mdc-text-field__input" name="branch_plant" placeholder="SBU">
                                    <option value="" disabled selected value> </option>
                                    <?php foreach ($branch->result() as $branch) { ?>
                                      <?php if ($branch->branch != null): ?>
                                        <option value="<?php echo $branch->id; ?>">
                                          <?php echo $branch->branch; ?>
                                        </option>
                                      <?php endif; ?>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Employee Type</label>
                                  <select class="mdc-text-field__input" name="emp_type" value="">
                                    <option value="" disabled selected value></option>
                                    <?php foreach ($employee_type->result() as $employee_type) { ?>
                                      <?php if ($employee_type->type != null): ?>
                                        <option value="<?php echo $employee_type->id; ?>">
                                          <?php echo $employee_type->type; ?>
                                        </option>
                                      <?php endif; ?>
                                    <?php } ?>
                                  </select>
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                              <div class="mdc-text-field w-100 mdc-ripple-upgraded" style="background: white;">
                              <button class="btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded " >Find</button>&nbsp;&nbsp;
                              <button type="button" class="btn btn-primary mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" >Cancel</button>
                                      </div>
                              </div>
                              

                            
                            </div>
                          </div>
                        </form>
                     
                    </div>
                  
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <center><span class="">
                            <?php echo $this->session->flashdata('msg'); ?>
                          </span></center>
                          <form id="assigns" method="POST" action="<?php echo base_url(); ?>main/store_assign_emp" onsubmit=" myfunction()">
                          <input type="hidden" id="base_url" name="base_url" value="<?php echo $baseurl ?>"/>
                          <div class="error" id="empnot1"></div>
                        <div class="error" id="assign_emp_check1"></div>
                          <input type="hidden" value="<?php echo $program_id;?>" name="program_id" >
                          <input type="hidden" value="<?php echo $emp_id;?>" name="emp_id" >
				    <input type="hidden" value="<?php echo $program_id;?>" name="program_id" >
					<input type="hidden" id="admin_type" name="admin_type" value="<?php echo $login_details['admin_type']; ?>"/>
					<input type="hidden" id="admin_status" name="admin_status" value="<?php echo $login_details['name']; ?>"/>
					<input type="hidden" id="admin_id" name="admin_id" value="<?php echo $login_details['id']; ?>"/>
					<input type="hidden" id="admin_id" name="admin_id" value="<?php echo $login_details['admin_location']; ?>"/>
                            <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
                            <thead>
                               <tr style="background: white;">
                               <th style="text-align:center"class="th-sm">S.no</th>
                                   <th style="text-align:center"class="th-sm">Employee ID</th>
                                   <th style="text-align:center" class="th-sm">Employee Name</th>
                                   <th style="text-align:center">
                     <div class="mdc-checkbox mdc-checkbox--secondary">
																			<input input="" type="checkbox" name="assign_emp" id="selectAll" class="mdc-checkbox__native-control">
																			<div class="mdc-checkbox__background">
																				<svg class="mdc-checkbox__checkmark" style="border-color: #ff420f;
					   " viewBox="0 0 24 24">
																					<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59">
																					</path>
																				</svg>
																				<div class="mdc-checkbox__mixedmark">
																				</div>
																			</div>
																		</div>
																		<span for="basic-disabled" id="basic-disabled-checkbox-label">Select All
																			</span>
																	
                                </th>
                               </tr>
                           
                            </thead>
                            <tbody>
                              <?php if( !empty($findemp)){?>
                                <?php  $i=1; foreach($findemp->result() as $emp){?>
                                  <tr style="background: white;">
                                  <td style="text-align:center"><?php echo $i++; ?></td>
										<td style="text-align:center"><?php echo $emp->emp_id; ?></td>
										<td style="text-align:center"><?php echo $emp->name; ?></td>
                    <td style="text-align:center">
                    <div class="mdc-checkbox mdc-checkbox--secondary">
																			<input input type="checkbox"   name="assign_empid[]" value="<?php echo $emp->emp_id; ?>" class="mdc-checkbox__native-control" >
																			<div class="mdc-checkbox__background">
																				<svg class="mdc-checkbox__checkmark" style="border-color: #ff420f;
					   " viewBox="0 0 24 24">
																					<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59">
																					</path>
																				</svg>
																				<div class="mdc-checkbox__mixedmark">
																				</div>
																			</div>
																		</div></td>
									</tr>
								<?php } ?>
                                  <?php } else {?>
                                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Location</label>
                                 			
                                </div>
                              </div>

                                    <?php } ?>
								
                            </tbody>
                        </table>
                   
                        <div  class="col-sm-4" ></div>
                        <div class="col-sm-4" id="button_div" ><button   class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92918; --mdc-ripple-fg-translate-start:8.3125px, -2.7px; --mdc-ripple-fg-translate-end:22.3188px, -14.5px;">
                      Assign
                    </button></div>
                    <div  class="col-sm-4" ></div>
                                </from>
                      </div>
                    </div>
                  </div>
                 
                                </from>
                 <!-- <div class="template-demo">
                      <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                      <div class="menu-button-container">
                        <div class="mdc-card">
						  <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-tablet">
                        <div class="table-responsive border">
						</div>
						<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
                        <form method="POST" action="<?php echo base_url(); ?>main/store_assign_emp">
				    <input type="hidden" value="<?php echo $program_id;?>" name="program_id" >
					<!--<input type="hidden" value="<?php echo $division_id; ?>" name="division_id" >
                    <div class="card-body  table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm mzxcc">
                            <thead>
                               <tr>
                                   <th class="th-sm">S.No</th>
                                   <th class="th-sm">Employee ID</th>
                                   <th class="th-sm">Employee Name</th>
                                   <th class="th-sm">Select</th>
                               </tr>
                               <tr>
							       <th></th>
							       <th></th>
							       <th></th>
							       <th><input type="checkbox"  name="assign_emp" id="selectAll"> Select All</th>
							   </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($emp_list)){ $i=1; foreach($emp_list as $emp){?>
								    <tr>
								    	<td><?php echo $i++; ?></td>
								    	<td><?php echo $emp->emp_id; ?></td>
								    	<td><?php echo $emp->name; ?></td>
								    	<td><input type="checkbox"  name="assign_empid[]" value="<?php echo $emp->emp_id; ?>"></td>
								    </tr>
							    <?php } } ?>
                            </tbody>
                        </table>
						<div class="col-sm-12" id="button_div" ><button class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92918; --mdc-ripple-fg-translate-start:8.3125px, -2.7px; --mdc-ripple-fg-translate-end:22.3188px, -14.5px;">
                      Assign
                    </button></div>
                    </div>
                    </form>
                </div>
                      </div>
                  </div>
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                      <?php if(isset($assigned_emp)  && ($assigned_emp->num_rows() > 0)){ ?>
                 
                        <h4>Assigned Employee List :</h4><br>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
                            <thead>
                               <tr>
                                   <th class="th-sm">S.No</th>
                                   <th class="th-sm">Employee ID</th>
                                   <th class="th-sm">Employee Name</th>
                                   <th class="th-sm">Delete</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php  $i=1; foreach($assigned_emp->result() as $emp){?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $emp->employee_id; ?></td>
										<td><?php echo $emp->name; ?></td>
										<td>	<a   class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:12.375px, 18.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px; background-color: #ff420f;" ><i class="material-icons mdc-button__icon"  onclick="showConfirmation(<?php echo $emp->id;?>)" style="margin-right: 10px;margin-left: 9px;text-align: center;"; >delete</i>
												</a>
                                            </td>
									</tr>
								<?php } ?>
                            </tbody>
                        </table>
                    
                    <?php } ?>
                       
                      </div>
                    </div>
                  </div>
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive">
                        
                        </div>
                    </div>
                  
                  </div>
                </div> -->
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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/assign_emp.css">
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" />
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/assignemp.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/csweetalert2@11"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">


	<style>.error {
        color: #fa4040;
        font-size: 12px;
		margin-top: 2%;
    }
	.demo{  background-color: #f2f2f2;
  color: #333;
  font-weight: bold;
  

}
.alert {
    font-size: 0.75rem;
}
.alert {
    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;
}
.btn, .fc button, .ajax-upload-dragdrop .ajax-file-upload, .swal2-modal .swal2-buttonswrapper .swal2-styled, .swal2-modal .swal2-buttonswrapper .swal2-styled.swal2-confirm, .swal2-modal .swal2-buttonswrapper .swal2-styled.swal2-cancel, .wizard > .actions a, .btn-group.open .dropdown-toggle, .fc .open.fc-button-group .dropdown-toggle, .btn:active, .fc button:active, .ajax-upload-dragdrop .ajax-file-upload:active, .swal2-modal .swal2-buttonswrapper .swal2-styled:active, .wizard > .actions a:active, .btn:focus, .fc button:focus, .ajax-upload-dragdrop .ajax-file-upload:focus, .swal2-modal .swal2-buttonswrapper .swal2-styled:focus, .wizard > .actions a:focus, .btn:hover, .fc button:hover, .ajax-upload-dragdrop .ajax-file-upload:hover, .swal2-modal .swal2-buttonswrapper .swal2-styled:hover, .wizard > .actions a:hover, .btn:visited, .fc button:visited, .ajax-upload-dragdrop .ajax-file-upload:visited, .swal2-modal .swal2-buttonswrapper .swal2-styled:visited, .wizard > .actions a:visited, a, a:active, a:checked, a:focus, a:hover, a:visited, body, button, button:active, button:hover, button:visited, div, input, input:active, input:focus, input:hover, input:visited, select, select:active, select:focus, select:visited, textarea, textarea:active, textarea:focus, textarea:hover, textarea:visited {
    -webkit-box-shadow: none;
    box-shadow: none;
}
<script>
$(document).ready(function() {
  $('#dtBasicExample').dataTable();
  buttons: [
                  'copy', 'csv', 'excel', 'pdf', 'print'
              ]

   $("[data-toggle=tooltip]").tooltip();
} );</script>
</style>
</body>
</html> 
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
                    <button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded" id="emp">
                      Edit Employee Details
                    </button>
                   <!-- <div>
                      <i class="material-icons refresh-icon">Refresh</i>
                      <i class="material-icons options-icon ml-2">more_vert</i>
                    </div> -->
                  </div>
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <form id="employee" name="employeeView" action="<?php echo base_url('main/updateEmp');?>" method="POST">
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText"
                                    name="emp_id" value="<?php echo (isset($editEmployee))? $editEmployee[0]['emp_id']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Employee ID</label>
                                </div>
                              </div>
							  <input type="hidden" name="id" id="id" value="<?php echo (isset($editEmployee))? $editEmployee[0]['id']:''?>">
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" id="text-field-hero-input 1" name="firstname" value="<?php echo (isset($editEmployee))? $editEmployee[0]['name']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">First Name</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" id="text-field-hero-input 2" name="lastname" >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Last Name</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Division</label>
                                  <select class="mdc-text-field__input" name="division_id">
                                    <option disabled selected value> </option>
                                    <?php foreach($division->result() as $divisions){ ?>
                                    <option value="<?php echo $divisions->id; ?>" >
                                      <?php echo $divisions->divisions; ?>
                                    </option>
                                    <?php } ?>
                                  </select>
<script>document.employeeView.division_id.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['division_id']:'' ?>"</script>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" type="phone" name="phone" id="phone" value="<?php echo (isset($editEmployee))? $editEmployee[0]['mobile']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Phone</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="email"
                                    placeholder="Email" type="email" value="<?php echo (isset($editEmployee))? $editEmployee[0]['email']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Email</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="passwords" id="passwords" type="password"
                                    value="<?php echo (isset($editEmployee))? $editEmployee[0]['password']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Password</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">SBU</label>
                                  <select class="mdc-text-field__input" name="sbu" placeholder="SBU">
                                    <option value="" disabled selected value> </option>
									<?php foreach($sbu->result() as $sbu){ ?>
										<?php if ($sbu->sbu != null): ?>
											<option value="<?php echo $sbu->id; ?>">
											  <?php echo $sbu->sbu; ?>
											</option>
										<?php endif; ?>
                                    <?php } ?>
		<script>document.employeeView.sbu.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['sbu']:'' ?>"</script>	
                                  </select>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Branch/Plant</label>
                                  <select class="mdc-text-field__input" name="branch_plant" placeholder="Branch/Plant">
                                    <option value="" disabled selected value> </option>
										<?php foreach($branch->result() as $branch){ ?>
											<?php if ($branch->branch != null): ?>
												<option value="<?php echo $branch->id; ?>">
												  <?php echo $branch->branch; ?>
												</option>
											<?php endif; ?>
										<?php } ?>
                                  </select>
						<script>document.employeeView.branch_plant.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['branch_plant']:'' ?>"</script>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Grade</label>
                                  <select class="mdc-text-field__input" name="grade" placeholder="Grade" required>
                                    <option value="" disabled selected value> </option>
										<?php foreach($grade->result() as $grade){ ?>
											<?php if ($grade->grade != null): ?>
												<option value="<?php echo $grade->id; ?>">
												  <?php echo $grade->grade; ?>
												</option>
											 <?php endif; ?>
										<?php } ?>
                                  </select>
					<script>document.employeeView.grade.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['grade']:'' ?>"</script> 
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Employee Type</label>
                                  <select class="mdc-text-field__input" name="emp_type">
                                     <option value=""  disabled selected value></option>
										  <?php foreach($employee_type->result() as $employee_type){ ?>
												 <?php if ($employee_type->type != null): ?>
													<option value="<?php echo $employee_type->id; ?>">
													  <?php echo $employee_type->type; ?>
													</option>
												 <?php endif; ?>
										  <?php } ?>
                                  </select>
					<script>document.employeeView.emp_type.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['emp_type']:'' ?>"</script>			  
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                    <label for="text-field-hero-input" class="mdc-floating-label">Designation</label>
									  <select class="mdc-text-field__input" name="designation" placeholder="Designation">
										<option value=""  disabled selected value></option>
										  <?php foreach($designation->result() as $designation){ ?>
											  <?php if ($designation->designation != null): ?>
												<option value="<?php echo $designation->designation; ?>">
												  <?php echo $designation->designation; ?>
												</option>
											 <?php endif; ?>
										 <?php } ?>
									  </select>
									  <script>document.employeeView.designation.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['designation']:'' ?>"</script>
                                </div>
                              </div>

                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Organization Unit</label>
                                  <select class="mdc-text-field__input" name="organisation_unit"
                                    placeholder="Organization Unit">
                                    <option value="" disabled selected value></option>
										<?php foreach($organization->result() as $organization){ ?>
										  <?php if ($organization->organication != null): ?>
											<option value="<?php echo $organization->id; ?>">
											  <?php echo $organization->organication; ?>
											</option>
										   <?php endif; ?>
										<?php } ?>
                                  </select>
								   <script>document.employeeView.organisation_unit.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['organisation_unit']:'' ?>"</script>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Function</label>
                                  <select class="mdc-text-field__input" name="function" placeholder="Function">
                                    <option value="" disabled selected value></option>
									<?php foreach($function_master->result() as $function_master){ ?>
										<?php if ($function_master->function != null): ?>
											<option value="<?php echo $function_master->id; ?>">
											  <?php echo $function_master->function; ?>
											</option>
										<?php endif; ?>
									<?php } ?>
                                  </select>
								  <script>document.employeeView.function.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['function']:'' ?>"</script>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="prev_exp" id="exampleText"
                                    placeholder="Previous Experience" type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['prev_exp']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Previous Experience</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Gender</label>
                                  <select class="mdc-text-field__input" name="gender" placeholder="Gender">
                                    <option value="" disabled selected value></option>
									<?php foreach($gender->result() as $gender){ ?>
									  <?php if ($gender->gender != null): ?>
											<option value="<?php echo $gender->id; ?>">
											  <?php echo $gender->gender; ?>
											</option>
									  <?php endif; ?>
								    <?php } ?>
                                  </select>
								  <script>document.employeeView.gender.value="<?php echo (isset($editEmployee)) ? $editEmployee[0]['gender']:'' ?>"</script>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="io_id" id="io_id" placeholder="IO ID"
                                    type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['io_id']:''?>" >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">IO ID</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="io_name" id="io_name" placeholder="IO Name"
                                    type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['io_name']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">IO Name</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="fro_id" id="fro_id" placeholder="FRO ID"
                                    type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['fro_id']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label"> FRO ID</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="fro_name" id="fro_name"
                                    placeholder="FRO Name" type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['fro_name']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">FRO Name</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="ro_id" id="ro_id" placeholder="RO ID"
                                    type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['ro_id']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">RO ID</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" name="ro_name" id="ro_name" placeholder="RO Name"
                                    type="text" value="<?php echo (isset($editEmployee))? $editEmployee[0]['ro_name']:''?>">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">RO Name</label>
                                </div>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8"></div>
                      <!--       <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-1">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded" name="dob" id='dob'
                                  style='padding-right: 114px;' >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">DOB</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded" name="dob" id="reportrange">
                                  <!--<span style="padding: 10px;"></span><i class="fa fa-caret-down"></i>  
                                  <div class="mdc-line-ripple"></div>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-1">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded" name="doj" id='doj'
                                  style='padding-right: 114px;'>
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">DOJ</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3">
                                 <div class="mdc-text-field w-100 mdc-ripple-upgraded" name="doj" id="reportrange1">
                                 <!-- <span style="padding: 10px;"></span><i class="fa fa-caret-down"></i>  
                                  <div class="mdc-line-ripple">
                                    </div>
                                  </div>
                               </div>
                              </div>   -->
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <button
                                  class=" mt-1 btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right; ">
                               Update
                                </button>&nbsp;&nbsp;&nbsp;&nbsp; 
								  
                                <button
                                  class=" mt-1 btn btn-primary mdc-button mdc-button--unelevated filled-button--info mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px; --mdc-ripple-fg-scale:2.19553; --mdc-ripple-fg-translate-start:8.23752px, -2.59998px; --mdc-ripple-fg-translate-end:13px, -1px;">
                                  Cancel
                                </button>
                              </div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>


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
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php');?>
        <!-- partial -->
      </div>
    </div>
  </div>
  
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/addemp.js"></script>
	
  <style>
    .error {
      color: #fa4040;
      font-size: 12px;
      margin-top: 2%;
    }
  </style>
   
</body>

</html>
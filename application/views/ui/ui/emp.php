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
                    
					<button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92333; --mdc-ripple-fg-translate-start:-21.6875px, -3.5px; --mdc-ripple-fg-translate-end:22.1188px, -14.5px;">
                        Emplyoee Details
                      </button>
                    <div>
					 <a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" href="<?php echo base_url('main/addemp'); ?>">
                                    New Employee
                                </a>&nbsp;&nbsp;
                        <i class="material-icons refresh-icon">refresh</i>
                        <i class="material-icons options-icon ml-2">more_vert</i>
						
                    </div>
                  </div>
                 
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive border">
                          <table class="table table-hoverable">
						  <thead>
							<tr>
                                        <th>S No</th>
                                        <th>Employee ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Designation</th>
                                        <th>staus</th>
                                        <th>Action</th>
                                    </tr>
							</thead>		
                            <tbody>
							<?php $i=1; foreach($emp->result() as $row) { ?>
                                      <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row->emp_id;?></td>
                                            <td><?php echo $row->name;?></td>
                                            <td><?php echo $row->mobile;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->designation;?></td>
											<td>
													<?php if($row->emp_status==2){ ?>
													 <td>
														<div class="mdc-form-field">
																  <div class="mdc-checkbox mdc-checkbox--success">
																	<input type="checkbox" id="basic-disabled-checkbox" class="mdc-checkbox__native-control" checked=""disabled>
																	<div class="mdc-checkbox__background">
																	  <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
																		<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
																	  </svg>
																	  <div class="mdc-checkbox__mixedmark"></div>
																	</div>
																  </div>
																  <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label"></label>
														</div>  
													   <?php }else{ ?>
														<div class="mdc-form-field">
															  <div class="mdc-checkbox mdc-checkbox--secondary">
																<input type="checkbox" id="basic-disabled-checkbox" class="mdc-checkbox__native-control" checked="" disabled>
																<div class="mdc-checkbox__background">
																  <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
																	<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
																  </svg>
																  <div class="mdc-checkbox__mixedmark"></div>
																</div>
															  </div>
															  <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label"></label>
															</div> 
														<?php } ?>
                                            <td>
                                            <?php if($row->admin=='admin'){ ?>
											<a  class="btn btn-danger"></a>
                      <?php }else{ ?>
                        
											<a href="<?php echo base_url('superadmin/addemp'); ?>" class="mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:56px; --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:8.5px, -4.40001px; --mdc-ripple-fg-translate-end:18.8px, -10px;">
                      View
                    </a>
											
											<?php } ?>
                                            
                                          </td>
                                        </tr>
										<?php $i++;   }  ?>
                              
                            </tbody>
                          </table>
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
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>	
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/addemp.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
</body>
</html> 
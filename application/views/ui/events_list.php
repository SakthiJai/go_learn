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
                       Program List
                      </button>
                   
                  </div>
				   &nbsp;&nbsp;&nbsp;&nbsp;
				  
                 	<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
					
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive border">
                           <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
										    <th style="text-align: center;">S No</th>
										    <th style="text-align: center;">Program Created</th>
										    <th style="text-align: center;">Program Name</th>
										     <th style="text-align: center;">Course Name</th>
										    <th style="text-align: center;">From Date</th>
										    <th style="text-align: center;">To Date</th>
										    <th style="text-align: center;">Venue</th>
										    <th style="text-align: center;">Location</th>
										    <th style="text-align: center;">TTT</th>
										    <th style="text-align: center;">Nature of program</th>
										    <th style="text-align: center;">Edit</th>
										    <th style="text-align: center;">Assign</th>
										    <!--<th>Add course</th>-->
										    <th style="text-align: center;">Delete</th>
									    </tr>
                                        </thead>
										<tbody>
										<?php $i=1; foreach($events->result() as $row) {  ?>
										<tr>
											<td style="text-align: center;"><?php echo $i;?></td>
											<td style="text-align: center;"><?php echo $row->created_user;?></td>
											<td style="text-align: center;"><?php echo $row->program_name;?></td>
											<td style="text-align: center;"><?php echo $row->course_title;?></td>
											<td style="text-align: center;"> <?php echo date('d-m-Y', strtotime($row->from_date));?></td>
											<td style="text-align: center;"><?php echo date('d-m-Y', strtotime($row->to_date));?></td>
											<td style="text-align: center;"><?php echo $row->venue;?></td>
											<td style="text-align: center;"><?php echo $row->location;?></td>
											<td style="text-align: center;"><?php echo $row->ttt;?></td>
											<td style="text-align: center;"><?php echo $row->nature_program;?></td>
											<?php if($row->from_date > date('Y-m-d')){ 	?><td><a href="<?php echo base_url();?>index.php/superadmin/createprogram/<?php echo $row->id;?>"class="btn btn-info">Edit </a></td> <?php  }else{ ?><td></td><?php } ?>
											<td><a href="<?php echo base_url();?>index.php/superadmin/assign_emp/<?php echo $row->id;?>/0"class="btn btn-primary">Assign <br> Employee </a></td>
										<!--	<td><a href="<?php echo base_url();?>index.php/superadmin/add_course/<?php echo $row->id;?>"class="btn btn-info">Add course </a></td>-->
							            	<?php if($row->from_date > date('Y-m-d')){ 	?><td><a href="<?php echo base_url();?>index.php/superadmin/programdelete/<?php echo $row->id;?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a></td> <?php  }else{ ?><td></td><?php } ?>
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
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/faculty.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/csweetalert2@11"></script>


	<style>.error {
        color: #fa4040;
        font-size: 12px;
		margin-top: 2%;
    }
	
</style>
</body>
</html> 



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
                       Faulty
                      </button>
                    <div>
					 <a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" href="<?php echo base_url('main/addfaculty'); ?>">
                                     Add Faulty
                                </a>&nbsp;&nbsp;
                        
                    </div>
                  </div>
				   &nbsp;&nbsp;&nbsp;&nbsp;
				  
				   <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                 	<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
					</div>
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive border">
                           <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Faculty Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Company name</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>

                                <?php foreach ($faculty->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->mobile; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->company_name; ?></td>
                                        <td><?php echo $row->city; ?></td>
                                        <td><?php echo $row->state; ?></td>
                                        <td><?php echo $row->country; ?></td>
                                        <td><a href="<?php echo base_url(); ?>superadmin/faculty/<?php echo $row->id; ?>" class="btn btn-info">Edit</a></td>
                                        <td><a href="<?php echo base_url(); ?>superadmin/faculty_delete/<?php echo $row->id; ?>" onclick="return confirm ('Do you want to Delete this record?');" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php $i++;
                                }  ?>

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
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/division.js"></script>
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



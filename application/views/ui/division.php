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
                       Unit Name
                      </button>
                    <div>
					 <a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" href="<?php echo base_url('main/adddivision'); ?>">
                                     Add Unit
                                </a>&nbsp;&nbsp;
                        
                    </div>
                  </div>
				   &nbsp;&nbsp;&nbsp;&nbsp;
				
					<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
					&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive border">
                          <table class="table table-hoverable">
						  <thead>
                          <tr>
                                            <th  style="text-align: center;">S.No</th>
                                            <th  style='text-align: center;'>Unit Name</th>
											<th  style='text-align: center;'>Action</th>
                                        </tr>
							</thead>		
                            <tbody>
							<?php $i=1; foreach($division->result() as $row) { ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $i;?></td>
											<td style="text-align: center;"><?php echo $row->divisions;?></td>
											
											<td style='text-align: center;'><a href="<?php echo base_url(); ?>main/division/<?php echo $row->id; ?>"  class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:12.375px, 18.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px; background-color: #00bbdd;">
											 <img alt="Eye icon" srcset="https://img.icons8.com/material/2x/visible.png 2x, https://img.icons8.com/material/1x/visible.png 1x" src="https://img.icons8.com/material/1x/visible.png" style="filter: invert(0%) sepia(0%) saturate(7465%) hue-rotate(196deg) brightness(93%) contrast(95%);">
												 
												</a>
												<a   class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:12.375px, 18.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px; background-color: #ff420f;" ><i class="material-icons mdc-button__icon"  onclick="showConfirmation(<?php echo $row->id;?>)" style="margin-right: 10px;margin-left: 9px;text-align: center;"; >delete</i>
												</a></td>
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



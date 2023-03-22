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
                     Division Report data
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
                                        <th class="th-sm">S.No</th>
                                        <th class="th-sm">Division</th>
                                        <th class="th-sm">Behavioural</th>
                                        <th class="th-sm">Technical</th>
                                        <th class="th-sm">Functional</th>
                                        <th class="th-sm">SHE</th>
                                        <th class="th-sm">OJT</th>
                                        <th class="th-sm">Others</th>
                                        <th class="th-sm">Total</th>
                                        <th class="th-sm">No. of MS employees</th>
                                        <th class="th-sm">No. of NMS employees</th>
                                        <th class="th-sm">No. of Contract employees</th>
                                        <th class="th-sm">Mandays per MS employee</th>
                                        <th class="th-sm">Mandays per NMS employee</th>
                                        <th class="th-sm">Mandays per contract employee</th>
                                    </tr>
                                </thead>
                            <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>Ankleshwar Pl</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                    </tr>
                                    <tr>
                                      <td>2</td>
                                      <td>Central</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                    </tr>
                                    <tr>
                                      <td>3</td>
                                      <td>Corporate</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                
                                    </tr>
                                    <tr>
                                      <td>4</td>
                                      <td>Shameerpet Br</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                    </tr>
                                    <tr>
                                      <td>5</td>
                                      <td>Dahej Pl</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                
                                    </tr>
                                    <tr>
                                      <td>6</td>
                                      <td>East</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                    </tr>
                                    <tr>
                                      <td>7</td>
                                      <td>Ennore Pl</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                
                                    </tr>
                                    <tr>
                                      <td>8</td>
                                      <td>Foskar</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                    </tr>
                                    <tr>
                                      <td>9</td>
                                      <td>Hospet Pl</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                
                                    </tr>
                                    <tr>
                                      <td>11</td>
                                      <td>Kakinada Pl</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      
                                    </tr>
                                    <tr>
                                      <td>10</td>
                                      <td>Jammu Pl</td>
                                      <td>6.5</td>
                                      <td>50</td>
                                      <td>19.75</td>
                                      <td>3</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>79.25</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                      <td>0.00</td>
                                    </tr>
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



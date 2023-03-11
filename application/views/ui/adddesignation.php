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
                       Grade Master
                      </button>
                    <div>
                    </div>
                  </div>
                  <div class="template-demo">
                      <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                      <div class="menu-button-container">
                        <div class="mdc-card">
						    <?php if (isset($editdes) && ($editdes->num_rows() > 0)) {
            foreach ($editdes->result() as $row) { ?>
                  <form  id="employee" class="" action="<?php echo base_url('main/addgrade');?>" method="POST">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
					 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Designation</label>
							<input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="designation"value="<?php echo $row->designation;?>">
                          </div>
                        </div>
                       
                        <div class="mdc-4 layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                          <button class=" mt-1 btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center" style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right; border-radius: 18px;padding: 27px 27px;width: 100px;"type="">
                              Submit
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
							<button class=" mdc-4 btn btn-primarymdc-button mdc-button--unelevated filled-button--info mdc-ripple-upgraded" style="--mdc-ripple-fg-size:38px; --mdc-ripple-fg-scale:2.19553; --mdc-ripple-fg-translate-start:8.23752px, -2.59998px; --mdc-ripple-fg-translate-end:13px, -1px;border-radius: 18px;padding: 27px 27px;width: 100px;">
                            Cancel 
                           </button>
                        </div>
					
						
                      </div>
                    </div>
                  </form>
				    <?php } ?>   <?php }else { ?>
					 <form  id="employee" class="" action="<?php echo base_url('main/addgrade');?>" method="POST">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
					 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Designation</label>
							<input class="mdc-text-field__input" id="text-field-hero-input exampleText" name="designation" >
                          </div>
                        </div>
                       
                        <div class="mdc-4 ayout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                          <button class=" mt-1 btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center" style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right; border-radius: 18px;padding: 27px 27px;width: 100px;"type="">
                              Submit
                            </button>&nbsp;&nbsp;&nbsp;&nbsp;
							<button class=" mdc-4 btn btn-primarymdc-button mdc-button--unelevated filled-button--info mdc-ripple-upgraded" style="--mdc-ripple-fg-size:38px; --mdc-ripple-fg-scale:2.19553; --mdc-ripple-fg-translate-start:8.23752px, -2.59998px; --mdc-ripple-fg-translate-end:13px, -1px;border-radius: 18px;padding: 27px 27px;width: 100px;">
                            Cancel 
                           </button>
                        </div>
					
						
                      </div>
                    </div>
                  </form>
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
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/designation.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
	<style>.error {
        color: #fa4040;
        font-size: 12px;
		margin-top: 2%;
    }</style>
</body>
</html> 
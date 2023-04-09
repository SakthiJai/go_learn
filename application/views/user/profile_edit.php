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
                    <button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
                      style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">
                     Profile
                    </button>
                  </div>
				     <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <form id="employee" method="POST">
						 <?php foreach($profile->result() as $row) { ?>
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
							
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" id="text-field-hero-input exampleText"
                                    name="emp_id" value="<?php echo $row->emp_id; ?>"  >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Employee ID</label>
                                </div>
                              </div>
							  
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
								  <input type="email" id="email" name="email" class="mdc-text-field__input" value="<?php echo $row->email; ?>"  >
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Email</label>
                                </div>
                              </div>
                            </div>
                          </div>
						   <?php } ?>
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
  
</body>
</html> 




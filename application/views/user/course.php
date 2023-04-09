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
                     Courses
                    </button>
                   <!-- <div>	
                      <i class="material-icons refresh-icon">Refresh</i>
                      <i class="material-icons options-icon ml-2">more_vert</i>
                    </div> -->
                  </div>  
                          <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                      <div class="table-responsive border">
                        <table class="table table-hoverable">
                          <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Course Title</th>
                              <th>Image</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                             <?php $i=1; foreach($courses->result() as $row) { ?>
							 
                            <tr>
                              <td>
                                <?php echo $i;?>
                              </td>
                              <td>
                                <?php echo $row->course_title;?>
                              </td>
							  <td>
                                <?php echo $row->image;?>
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
  
</body>
</html> 


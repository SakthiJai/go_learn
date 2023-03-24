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
                       Courses
                      </button>
                    <div>
					 <a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" href="<?php echo base_url('main/newcourse'); ?>">
					  <input type="hidden" value="<?php echo $this->uri->segment(3);?>"  id="editId"/>
                                    Add New Course
                                </a>&nbsp;&nbsp;
                        
                    </div>
                  </div>
				  &nbsp;&nbsp;&nbsp;&nbsp;
				  
                  <div class="template-demo">
                      <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                      <div class="menu-button-container">
                        <div class="mdc-card">
						  <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-tablet">
                        <div class="table-responsive border">
						</div>
						<center><span class=""> <?php echo $this->session->flashdata('msg'); ?></span></center>
                  <form  id="employee" class="" action="<?php echo base_url('main/sbu_master');?>" method="POST">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-tablet">
                        <div class="table-responsive border">
                         <table id="datatable-buttons" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style='text-align: center;' class="">S.No</th>
                                                    <th style='text-align: center;' class="">Course Title</th>
                                                    <th style='text-align: center;' class="">Training Type</th>
                                                    <th style='text-align: center;' class="">image</th>
                                                    <th style='text-align: center;' class="">PDF</th>
                                                    <th  style='text-align: center;'class="">Action</th>
                                                    <!--<th class="th-sm">Edit</th>
                                                    <th class="th-sm">Delete</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($course->result() as $data) { ?>
                                                <tr>
                                                    <td style='text-align: center;'><?php echo $i; ?></td>
                                                    <td style='text-align: center;'><?php echo $data->course_title; ?></td>
                                                   <td style='text-align: center;'><?php echo $data->training_type; ?></td>
                                                     <td style='text-align: center;'><?php if($data->image) { ?><img src="<?php echo base_url();?>assets/images/course/<?php echo $data->image; ?>" alt=" " width="30"><?php } ?></td>
                                                    <td style='text-align: center;'ss><?php if($data->pdf_file) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file; ?>" target="_blank">PDF</a><?php } ?></td>
                                                    
													<?php if($login_details['name']!='admin' && $login_details['admin_type']!='admin' && $login_details['status']!=2){?>
													 <td style='text-align: center;'><a href="<?php echo base_url(); ?>main/editcourse/<?php echo $row->id; ?>"  class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:12.375px, 18.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px; background-color: #00bbdd;">
											 <img alt="Eye icon" srcset="https://img.icons8.com/material/2x/visible.png 2x, https://img.icons8.com/material/1x/visible.png 1x" src="https://img.icons8.com/material/1x/visible.png" style="filter: invert(0%) sepia(0%) saturate(7465%) hue-rotate(196deg) brightness(93%) contrast(95%);">
												 
												</a>
												<a   href="<?php echo base_url();?>/courses/deleteCourse/<?php echo $data->id; ?>"  class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:12.375px, 18.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px; background-color: #ff420f;" ><i class="material-icons mdc-button__icon"  onclick="showConfirmation(<?php echo $row->id;?>)" style="margin-right: 10px;margin-left: 9px;text-align: center;"; >delete</i>
												</a></td>
													
														<?php }?>
                                                        </td>
                                                    <!--<td><a class="btn btn-info"><i class="pe-7s-note" aria-hidden="true"></i></a></td>
                                                    <td><a class="btn btn-danger"><i class="pe-7s-trash" aria-hidden="true"></i></a></td>-->
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                            
                                        </table>
                        </div>
                    </div>
                   
                       
						
                        
                      </div>
                    </div>
                  </form>
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
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/csweetalert2@11"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/courses.js"></script>
<!-- Required datatable js -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/vfs_fonts.js"></script>

<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/coursefeedbackform.js"></script>

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
</style>
</body>
</html> 
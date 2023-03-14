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
                       SBU Master
                      </button>
                    
                  </div>
                  <div class="template-demo">
                      <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                      <div class="menu-button-container">
                        <div class="mdc-card">
						
						       <?php if (isset($editfaculty) && ($editfaculty->num_rows() > 0)) {
            foreach ($editfaculty->result() as $row) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                                <form class="" id="faculty" action="<?php echo base_url(); ?>superadmin/updatefaculty/<?php echo $row->id; ?>" method="POST">

                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="faculty_type" class=""> <strong> Faculty Type:</strong></label>
                                                                <select type="select" id="faculty_type" name="faculty_type" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <option value="1">Internal</option>
                                                                    <option value="2">External</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleText" class="">Faculty Name</label>
                                                                <input name="name" value="<?php echo $row->name; ?>" id="facultyname" placeholder="" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleText" class="">Company Name</label>
                                                                <input name="company_name" value="<?php echo $row->company_name; ?>" id="facultycomp" placeholder="" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group"><label for="exampleText" class="">Mobile</label>
                                                                <input name="mobile" value="<?php echo $row->mobile; ?>" id="facultymobile" placeholder="" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                                                                <input name="email" value="<?php echo $row->email; ?>" id="email" placeholder="" type="exampleEmail" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group"><label for="exampleCity" class="">City</label>
                                                                <input name="city" value="<?php echo $row->city; ?>" id="facultycity" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleState" class="">State</label>
                                                                <input name="state" value="<?php echo $row->state; ?>" id="facultystate" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="position-relative form-group"><label for="exampleZip" class="">Country</label>
                                                                <input name="country" value="<?php echo $row->country; ?>" id="facultyzip" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-block text-right">
                                                        <button type="submit" class="mb-2 mr-2 btn btn-success">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                            <form class="" id="addFaculty" action="<?php echo base_url('superadmin/addfaculty'); ?>" method="POST">

                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label for="faculty_type" class=""> <strong> Faculty Type:</strong></label>
                                                            <select type="select" id="faculty_type" name="faculty_type" class="custom-select" >
                                                                <option value="">Select</option>
                                                                <option value="1">Internal</option>
                                                                <option value="2">External</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="facultyiddiv">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Employee Id(Only for internal)</label>
                                                            <input name="facultyid"  id="facultyid" placeholder="" type="text" class="form-control " readonly>
                                                        </div>
                                                         <div class="error" id="empnot"></div>
                                                    </div>
                                                   
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Faculty Name</label>
                                                            <input name="facultyname" id="facultyname" placeholder="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Company Name</label>
                                                            <input name="company_name" id="facultycomp" placeholder="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Mobile</label>
                                                            <input name="mobile" id="exampleText" placeholder="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                                                            <input name="email" id="email" placeholder="" type="exampleEmail" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleCity" class="">City</label>
                                                            <input name="city" id="exampleCity" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleState" class="">State</label>
                                                            <input name="state" id="exampleState" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group"><label for="exampleZip" class="">Country</label>
                                                            <input name="country" id="exampleZip" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">ADD</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/sbu.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
	<style>.error {
        color: #fa4040;
        font-size: 12px;
		margin-top: 2%;
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
}</style>
</body>
</html> 
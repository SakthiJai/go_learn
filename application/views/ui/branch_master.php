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
                       Branch/Plant 
                      </button>
                    <div>
					<a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded"  href="<?php echo base_url('main/addbranch'); ?>">
                                    Add Branch
                                </a>
                        
                    </div>
                  </div>
                  <div class="template-demo">
                      <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                      <div class="menu-button-container">
                        <div class="mdc-card">
						<center><span class="mdc-typography mdc-theme--secondary"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                  <form  id="employee" class="" action="<?php echo base_url('main/branch_master');?>" method="POST">
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
					   <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-tablet">
                        <div class="table-responsive border">
                          <table id="branchtable" class="table table-striped table-bordered dt-responsive nowrap table table-hoverable">
						  <thead>
							<tr>
                                        <th  style='text-align: center;'>S No</th>
                                        <th  style='text-align: center;'>Branch/Plants</th>
                                        <th  style='text-align: center;'>Action</th>
                                    </tr>
							</thead>		
                            <tbody>
							<?php $i=1; foreach($branch_master->result() as $row) { ?>
                                      <tr>
                                            <td style='text-align: center;'><?php echo $i;?></td>
                                            <td style='text-align: center;'><?php echo $row->branch;?></td>
											 
												<td style='text-align: center;'><a href="<?php echo base_url(); ?>main/branch_master/<?php echo $row->id; ?>"  class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="background-color: #00bbdd;padding: 2%;text-decoration:none">
											 
                       <i class="glyphicon glyphicon-search" ></i>
												</a>
											
                        <button type="button" onclick="showConfirmation(<?php echo $row->id;?>)"  class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
                      </td>
                                        </tr>
										<?php $i++;   }  ?>
                              
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
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
   <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>	
 <script type="text/javascript" src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>	
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/branch.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/csweetalert2@11"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
  <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
	<style>.error {
        color: #fa4040;
        font-size: 12px;
		margin-top: 2%;
    }
	
	</style>
  <script>

$(document).ready(function() {
    $('#branchta').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

     $("[data-toggle=tooltip]").tooltip();
    
} );
</script>
</body>
</html> 
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
                    
					<button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92333; --mdc-ripple-fg-translate-start:-21.6875px, -3.5px; --mdc-ripple-fg-translate-end:22.1188px, -14.5px;">
                       
                Assign Training course
              
                      </button>
                      <div>
					 <a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" href="<?php echo base_url('main/createprogram'); ?>">
                                    New Assign Training course
                                </a>&nbsp;&nbsp;
                        
                    </div>
                  </div>
                 
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive border">
                          <table  id="sbutable" class="table table-striped table-bordered dt-responsive nowrap table table-hoverable">
                          <thead>
                                        <tr>
										    <th>S No</th>
										    <th>Program Created</th>
										    <th>Program Name</th>
										     <th>Course Name</th>
										    <th>From Date</th>
										    <th>To Date</th>
										    <th>Action</th>
									    </tr>
                                        </thead>
										<tbody>
										<?php $i=1; foreach($events->result() as $row) {  ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row->created_user;?></td>
											<td><?php echo $row->program_name;?></td>
											<td><?php echo $row->course_title;?></td>
											<td><?php echo date('d-m-Y', strtotime($row->from_date));?></td>
											<td><?php echo date('d-m-Y', strtotime($row->to_date));?></td>
									
											<td style='text-align: center;'>
											
											
											<a href="<?php echo base_url();?>index.php/main/assign_emp/<?php echo $row->id;?>/0"class="btn btn-primary">Assign </a>
                      <?php if($login_details['name']!='admin' && $login_details['admin_type']!='admin' && $login_details['status']!=2){?>
											<?php if($row->from_date > date('Y-m-d')){ 	?> <a href="<?php echo base_url();?>index.php/main/createprogram/<?php echo $row->id;?>"  class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="background-color: #00bbdd;padding: 8%;text-decoration:none">
											 
                       <i class="glyphicon glyphicon-search" ></i>
												</a>
											<?php } ?>
											<?php } ?>
											
                      <button type="button" onclick="showConfirmation(<?php echo $row->id;?>)"  class="btn btn-danger btn-xs" style="padding:8px;" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
											<!--<?php if($login_details['name']!='admin' && $login_details['admin_type']!='admin' && $login_details['status']!=2){?>
							            	<?php if($row->from_date > date('Y-m-d')){ 	?><button type="button" onclick="showConfirmation(<?php echo $row->id;?>)"  class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button>
											<?php  }?>
											<?php  }?>-->
											</td> 
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
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" />
  <script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/events_list.js"></script> 
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
<!-- Responsive examples --><script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<script type="text/javascript" src="<?php echo base_url();?>assets/js/csweetalert2@11"></script>
       
        <script type="text/javascript">
            $(document).ready(function() {
                $('#sbutable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

            function showConfirmation(id)
	{
		
	  Swal.fire({
      title: 'Do you want delete this details ?',
      text: "",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: 'green',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href= 'programdelete/'+id;
      } else {
        console.log('clicked cancel');
      }
    })
	  
	}
	
        </script>
<style> 
. {text-align: center;}
</style>
</body>
</html> 
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
                                  <th class="th-sm test">S.No</th>
                                  <th class="th-sm test">Program Created User</th>
                                  <th class="th-sm test">Course Name</th>
                                  <th class="th-sm test ">Program Name</th>
                                  <th class="th-sm test ">Program Group Name</th>
                                  <th class="th-sm test">Training Type</th>
                                
                                <th class="th-sm test">Assign</th> 
                                </tr>
							</thead>		
                            <tbody>
							<?php $i=1; foreach($programs->result() as $row) { ?>
                                <tr>
                                    <td class="test"><?php echo $i; ?></td>
                                    <td class="test"><?php echo $row->created_user;?></td>
                                    <td class="test"><?php echo $row->course_name;?></td>
                                    <td class="test"><?php echo $row->program_name;?></td>
                                    <td class="test"><?php echo $row->program_group_name;?></td>
                                    <td class="test"><?php echo $row->training_type;?></td>
                                   
                                   <td class="test">
                                   <button  href="<?php echo base_url('main/assign_emp/'.$row->id);?>" class="mdc-button mdc-button--raised mdc-button--dense mdc-ripple-upgraded" style="--mdc-ripple-fg-size:44px; --mdc-ripple-fg-scale:2.06378; --mdc-ripple-fg-translate-start:35.3375px, -10.2px; --mdc-ripple-fg-translate-end:15.1px, -6px;">
                                   Assign Employee
                                        </button></td>
                                    <!--<td><a href="addcourse.html"><button class="mt-1 btn btn-success">Add Course</button></a></td>-->
                                    <!--<td><a class="btn btn-info"><i class="pe-7s-note" aria-hidden="true"></i></a></td>-->
                                    <!--<td><a class="btn btn-danger"><i class="pe-7s-trash" aria-hidden="true"></i></a></td>-->
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
  <script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
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
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
       
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

        </script>
<style> 
.{text-align: center;}
</style>
</body>
</html> 
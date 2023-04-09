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
                      style="font-size: 14px;">
                         Pre Test
                    </button>
                     
                  </div><br>

                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                      <div class="table-responsive border">
                        <table id="branchtable" class="table table-striped table-bordered dt-responsive nowrap table table-hoverable">
                          <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Test Title</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php $i=1; foreach($pre_test_list->result() as $row) { ?>
							 
                            <tr>
                              <td>
                                <?php echo $i;?>
                              </td>
                              <td>
                                <?php echo $row->course_title;?>
                              </td>
							  <td>
								<?php if($row->admin=='admin'){ ?>
								  <a class="btn btn-danger"></a>
								<?php }else{ ?>
								
									<?php if ($row->status == 1){ ?>
								 <a href="<?php echo base_url();?>Test/preTestResults/<?php echo $row->test_id;?>/<?php echo $row->course_id;?>/<?php echo $row->program_id;?>" 
									  class="mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded"
									  style="font-size: 14px;">
									 View Result 
									</a> 
									<?php } else if ($row->status == 2) { ?>
								
								<a href="<?php echo base_url();?>Test/pre_test/<?php echo $row->test_id;?>/<?php echo $row->course;?>" 
									  class="mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded"
									  style="--mdc-ripple-fg-size:56px; --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:8.5px, -4.40001px; --mdc-ripple-fg-translate-end:18.8px, -10px;">
									 Take Test
									</a>
									<?php } else if ($row->status == 3) { ?>
										 <a href="<?php echo base_url();?>Test/pre_test/<?php echo $row->test_id;?>"
									  class="mdc-button mdc-button--raised filled-button--danger mdc-ripple-upgraded"
									  style="--mdc-ripple-fg-size:56px; --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:8.5px, -4.40001px; --mdc-ripple-fg-translate-end:18.8px, -10px;" disabled> 
									 Expired 
									</a> 
									<?php } ?>
									
									<?php } ?>
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
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
  <script>
  $(document).ready(function() {
    $('#branchtable').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

</script>
   
</body>

</html>
<style>
.table thead tr th {
     text-align:center !important; 
}
</style>
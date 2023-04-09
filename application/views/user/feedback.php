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
                      Evaluation Programs
                    </button>
                  </div><br>
                   <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                      <div class="table-responsive border">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap table table-hoverable">
                          <thead>
                            <tr>
                              <th>S.No</th>
                              <th>Evaluation Title</th>
                              <th>Action</th>
                            </tr>
                          </thead>
						  <tbody>
								<?php 
								/*$eve = array(); $e1 = array(); $e2 = array(); foreach($evaluation_cmp as $erow) {  array_push($eve,$erow->eve_id); array_push($e1,$erow->event_id); array_push($e2,$erow->event_id2);
								}*/ ?>
								<?php $i=1; ?>
								<?php foreach($evaluation_list as $row) { ?>
								<tr class="tbl_view">
									<td><?php echo $i;?></td>
									<td><?php echo $row->title;?></td>
									<?php 
									/*if (in_array($row->ids, $eve) &&  in_array($row->event_id, $e1) && in_array($row->id, $e2))*/
									if ($row->answer_id>0 && $row->evalu_test_complete!=null)
									{ ?>
									<td><a href="<?php echo base_url('index.php/Test/evaluation2/'.$row->eva_id.'/'.$row->event_id.'/'.$row->id);?>" class="btn btn-success">Evaluated</a></td>
									<?php }else { ?>
									<td><a href="<?php echo base_url('index.php/Test/evaluation2/'.$row->eva_id.'/'.$row->event_id.'/'.$row->id);?>" class="btn btn-success">Evaluate Form</a></td>
									<?php } ?>
								</tr>
								<?php $i++;  }  ?>
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
  <!-- Data table --> 
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script language="JavaScript" src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css" />
<!-- Data table --> 
<script> $(document).ready(function() {
    $('#example').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

     $("[data-toggle=tooltip]").tooltip();
    
} );
</script>
</body>
</html> 
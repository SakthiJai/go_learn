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
                      Master data
                    </button>

                  </div>
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <center><span class="mdc-typography mdc-theme--secondary">
                            <?php echo $this->session->flashdata('msg'); ?>
                          </span></center>
                        <form id="masterForm" class="">
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
                              <div
                                class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-12-tablet">
                                <div class="table-responsive border">



                                  <table id="sbutable" class="table table-striped table-bordered dt-responsive nowrap table table-hoverable">
                                    <thead>
                                      <tr>
                                        <th>S No</th>
                                        <th>Employee Code</th>
                                        <th>Employee Name</th>
                                        <th>SBU</th>
                                        <th>Divisions</th>
                                        <th>Grade</th>
                                        <th>Function</th>
                                        <th>Designation</th>
                                        <th>Program name</th>
                                        <th>Program Group</th>
                                        <th>Course</th>
                                        <th>Training type</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>No.of Hours</th>
                                        <th>Total Mandays</th>
                                        <th>Pre test Max marks</th>
                                        <th>Pre test Marks scored</th>
                                        <th>Pre test Marks %</th>
                                        <th>Post test Max marks</th>
                                        <th>Post test Marks scored</th>
                                        <th>Post test Marks %</th>
                                        <th>Growth Percentage%</th>
                                        <th>Venue</th>
                                        <th>Training Mode</th>
                                        <th>Faculty Type</th>
                                        <th>Faculty Name</th>
                                        <th>TNI Source</th>
                                        <th>Nature of program</th>
                                        <th>Location</th>
                                        <th>Feedback Given</th>
                                        <th>Total Cost per Program</th>
                                        <th>Employee Cost per Program</th>


                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>

                                    </tfoot>
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
                    <div
                      class="mdc-layout-grid__cell mdc-layout-grid__cell--span-6 mdc-layout-grid__cell--span-8-tablet">
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
  
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/dataTables.bootstrap.css" />
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/materreport.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materreport.js"></script>
  <!-- Required datatable js -->
  <script src="<?php echo base_url()?>assets/js/datatable.fixed.min.js"></script>
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
  
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/dataTables.bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
  <script
    src="https://www.bootstrapdash.com/demo/material-dash-bootstrap/template/assets/vendors/sweetalert/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>.table-responsive {
   
   overflow-x: hidden;
}</style>
  <style>
    .error {
      color: #fa4040;
      font-size: 12px;
      margin-top: 2%;
    }

    .demo {
      background-color: #f2f2f2;
      color: #333;
      font-weight: bold;
      padding: 12px;
      border: 1px solid #ccc;
    }
  </style>
  <script>

$(document).ready(function() {
    $('#sbutable').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

     $("[data-toggle=tooltip]").tooltip();
    
} );
</script>
</body>

</html>
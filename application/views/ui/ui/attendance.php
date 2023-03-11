<div class="app-main__outer  table-responsive">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-map-signs icon-gradient bg-warm-flame"></i>
                    </div>
                    <div>Attendance
                        <div class="page-title-subheading">Add Attendance
                        </div>
                    </div>
                </div>
    
        </div>
        
       
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
								    <div class="row">
                                    <?php foreach($attendance_events->result() as $row) { ?>
                                        <div class="col-sm-6 col-md-3">
                                            <a href="<?php echo base_url();?>Reports/attendance_events/<?php echo $row->id;?>/<?php echo $row->event_id;?>">
                                                <div class="divclass">
                                                
                                                    <label for="name" class="col-form-label"><?php echo $row->course_title; ?></label><br>
                                                    <label for="name" class="col-form-label" ><?php echo $row->faculty_name; ?></label><br>
                                                    <label for="name" class="col-form-label" ><?php $to_date2= $row->to_date; $to_date3=date('d-m-Y', strtotime($to_date2)); echo $to_date3; ?></label><br>
                                                    
                                                </div>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
								</div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        	
        
  </div>
</div>               

   <link rel="stylesheet" href="<?= base_url() ?>/assets/css/attendence.css">  
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/attendance.js"></script>
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
</body>


</html>
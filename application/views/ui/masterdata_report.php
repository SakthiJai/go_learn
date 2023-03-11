<div class="app-main__outer table-responsive">
    <div class="app-main__inner " >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-users icon-gradient bg-sunny-morning"></i>
                    </div>
                    <div>Master data
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form class="">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleDate" class="">  <strong> From Date :</strong></label>
                                                        <input name="fromdate" input type="date" id="exampleDate" placeholder="10/7/2010" type="Date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleDate" class="">  <strong> End Date :</strong></label>
                                                        <input name="enddate" input type="date" id="exampleDate" placeholder="10/7/2010" type="Date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block text-right">
                                                <button class="mb-2 mr-2 btn btn-success">submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>-->
        <div class="row ">
            <div class="col-md-12">
                <div class="main-card mb-3 card ">
                    <div class="card-body table-responsive">
                        <form class="" id="masterForm">
						<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url(); ?>"/>
                            <div class="col-md-6  form-row">
                                           <div class="col-md-5">
                                             <div class="position-relative form-group">
                                                <label for="from_date" class=""> <strong>From Date:</strong></label>
                                                <input name="from_date" input type="date" id="from_date" placeholder="From Date" type="10/07/1984" class="form-control">
                                             </div>
                                           </div>
                                          <div class="col-md-5">
                                            <div class="position-relative form-group">
                                                <label for="to_date" class=""> <strong>To Date:</strong></label>
                                                <input name="to_date" input type="date" id="to_date" placeholder="End Date" type="10/07/1984" class="form-control">
                                            </div>
                                          </div>
                                           <div class="col-md-1">
                                               </div>
                                           <div class="col-md-1">
                                            <div class="position-relative form-group">
                                                <button class="mb-2 mr-2 btn btn-success" id="submit" type="submit">SUBMIT</button>
                                            </div>
                                          </div>
                                        </div>
                        <table id="datatable-buttons" class="table table-bordered datatable">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>
</div>                  

     <link rel="stylesheet" href="<?= base_url() ?>/assets/css/materreport.css">
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>

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
</body>
</html>




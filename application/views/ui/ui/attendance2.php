<div class="app-main__outer  table-responsive">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-map-signs icon-gradient bg-warm-flame"></i>
                    </div>
                    <div>Attendance
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                 <div class="col-lg-9 col-md-9 mt-3">
                                       <a class="btn btn-sm btn-danger text-right " href="<?php echo base_url(); ?>/Reports/attendance" style="float:right;">Back</a>
                                       
                                        </div>
            </div>
            
            
		<div class="tab_container">
			<input id="tab1" type="radio" name="tabs" checked>
			<label for="tab1"><span>Assigned</span></label>

			<input id="tab2" type="radio" name="tabs">
			<label for="tab2"><i class="fa fa-pencil-square-o"></i><span>Attended</span></label>
			

			<input id="tab3" type="radio" name="tabs">
			<label for="tab3"><span>Absent</span></label>
			<section id="content1" class="tab-content">
				
				
		      <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
						<!-- ---------------------------------------------- view ---------------------------------- -->
                     <div class="row">
                        <div class="col-md-12">
                                <div class="card-body  table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Employee ID</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Mail Id</th>
                                                <th>State</th>
                                                <th>Division/Plant</th>
                                                <th>SBU</th>
                                                <th>Grade</th>
                                                <th>Unit</th>
                                                <th>Function</th>
                                                <th>Designation</th>
                                                <th>Date of birth</th>
                                                <th>Date of join</th>
                                            </tr>
                                        </thead>
                                        <?php $i=1; ?>
                                        <tbody>
                                
                                                
                                                
                                            <?php foreach($attendance->result() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->emp_id; ?></td>
                                                    
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo $row->mobile; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <!--<td></td>-->
                                                    <td><?php echo $row->state; ?></td>
                                                    <td><?php echo $row->division; ?></td>
                                                    <td><?php echo $row->sbu; ?></td>
                                                    <td><?php echo $row->grade; ?></td>
                                                    <td><?php echo $row->organisation_unit; ?></td>
                                                    <td><?php echo $row->function; ?></td>
                                                    <td><?php echo $row->designation; ?></td>
                                                    <td><?php $dob2= $row->dob; $dob3=date('d-m-Y', strtotime($dob2)); echo $dob3; ?></td>
                                                    <td><?php $doj2= $row->doj; $doj3=date('d-m-Y', strtotime($doj2)); echo $doj3; ?></td>
                                                </tr>
                                            <?php $i++; } ?>
                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>
		      	
			</section>

			<section id="content2" class="tab-content">
			    		      <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
						<!-- ---------------------------------------------- view ---------------------------------- -->
                     <div class="row">
                        <div class="col-md-12">
                                <div class="card-body  table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Employee ID</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Mail Id</th>
                                                <th>State</th>
                                                <th>Division/Plant</th>
                                                <th>SBU</th>
                                                <th>Grade</th>
                                                <th>Unit</th>
                                                <th>Function</th>
                                                <th>Designation</th>
                                                <th>Date of birth</th>
                                                <th>Date of join</th>
                                            </tr>
                                        </thead>
                                        <?php $i=1; ?>
                                        <tbody>
                                        
                                            <?php
                                            $s=0;
                                            foreach($attend_attendance->result() as $row) {  ?>
                                             <?php  if($row->evaluation_result_status!=null  && $row->post_test_status!=null){
                                             $s=$s+1;
                                             ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->emp_id; ?></td> 
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo $row->mobile; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <!--<td></td>-->
                                                    <td><?php echo $row->state; ?></td>
                                                    <td><?php echo $row->division; ?></td>
                                                    <td><?php echo $row->sbu; ?></td>
                                                    <td><?php echo $row->grade; ?></td>
                                                    <td><?php echo $row->organisation_unit; ?></td>
                                                    <td><?php echo $row->function; ?></td>
                                                    <td><?php echo $row->designation; ?></td>
                                                    <td><?php $dob2= $row->dob; $dob3=date('d-m-Y', strtotime($dob2)); echo $dob3; ?></td>
                                                    <td><?php $doj2= $row->doj; $doj3=date('d-m-Y', strtotime($doj2)); echo $doj3; ?></td>
                                                </tr>
                                                
                                                <?php }?>
                                            <?php $i++; } 
                                            if($s==0){
                                            ?>
                                            
                                                <tr>
                                                     <td colspan="14" align="center">No Data Found</td> 
                                                </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>
			</section>

			<section id="content3" class="tab-content">
			    <div class="col-lg-12 col-md-12 mt-3">
			        
                                        <a href="javascript:void(0)"  onclick="updateEmp(<?php echo $row->program_id ?>)"  id="demo" class="btn btn-sm empcls btn-success"style="float:right;margin-top:-25px;">Update</a>
                                       
                                        </div>
						      <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
						<!-- ---------------------------------------------- view ---------------------------------- -->
                     <div class="">
                        <div class="col-md-12">
                                <div class="card-body  table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>#</th>
                                                <th>Employee ID</th>
                                                <th>Name</th>
                                                <th>Mobile No.</th>
                                                <th>Mail Id</th>
                                                <th>State</th>
                                                <th>Division/Plant</th>
                                                <th>SBU</th>
                                                <th>Grade</th>
                                                <th>Unit</th>
                                                <th>Function</th>
                                                <th>Designation</th>
                                                <th>Date of birth</th>
                                                <th>Date of join</th>
                                            </tr>
                                        </thead>
                                        <?php $i=1; ?>
                                        <tbody>
                                               
                                                 <?php foreach($absent_attendance->result() as $row) { ?>
                                                  <?php  if($row->post_test_status==null || $row->evaluation_result_status==null){?>
                                                <tr>
                                                    
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php if($row->expiredDate>6){ ?>
                                                        <input type="checkbox" id="emp" class="empcls" name="emp[]" value="<?php echo $row->emp_id; ?>" ></td>
                                                    <?php } ?>
                                                    <td><?php echo $row->emp_id; ?></td> 
                                                    
                                                    <td><?php echo $row->name; ?></td>
                                                    <td><?php echo $row->mobile; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <!--<td></td>-->
                                                    <td><?php echo $row->state; ?></td>
                                                    <td><?php echo $row->division; ?></td>
                                                    <td><?php echo $row->sbu; ?></td>
                                                    <td><?php echo $row->grade; ?></td>
                                                    <td><?php echo $row->organisation_unit; ?></td>
                                                    <td><?php echo $row->function; ?></td>
                                                    <td><?php echo $row->designation; ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($row->dob));  ?></td>
                                                    <td><?php echo  date('d-m-Y', strtotime($row->doj));  ?></td>
                                                </tr>
                                                <?php }else{?>
                                                <tr>
                                                     <td colspan="14" align="center">No Data Found</td> 
                                                </tr>
                                                <?php }?>
                                            <?php $i++; } ?>
                                                
                                                
                                        
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->

                    </div> <!-- container -->

                </div> <!-- content -->

            </div>
		    
			</section>

		
		</div>
		


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
    </div>
</div>
</div>
</div>

<link rel="stylesheet" href="<?= base_url() ?>/assets/css/attendence.css">
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/attendance.js"></script>
<!-- Required datatable js -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
 
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>


</html>


         


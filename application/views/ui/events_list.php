<div class="app-main__outer  table-responsive">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-map-signs icon-gradient bg-warm-flame"></i>
                    </div>
                    <div>Programs List
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body  table-responsive">
                             <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
										    <th>S No</th>
										    <th>Program Created</th>
										    <th>Program Name</th>
										     <th>Course Name</th>
										    <th>From Date</th>
										    <th>To Date</th>
										    <th>Venue</th>
										    <th>Location</th>
										    <th>TTT</th>
										    <th>Nature of program</th>
										    <th>Edit</th>
										    <th>Assign</th>
										    <!--<th>Add course</th>-->
										    <th>Delete</th>
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
											<td><?php echo $row->venue;?></td>
											<td><?php echo $row->location;?></td>
											<td><?php echo $row->ttt;?></td>
											<td><?php echo $row->nature_program;?></td>
											<?php if($row->from_date > date('Y-m-d')){ 	?><td><a href="<?php echo base_url();?>index.php/superadmin/createprogram/<?php echo $row->id;?>"class="btn btn-info">Edit </a></td> <?php  }else{ ?><td></td><?php } ?>
											<td><a href="<?php echo base_url();?>index.php/superadmin/assign_emp/<?php echo $row->id;?>/0"class="btn btn-primary">Assign <br> Employee </a></td>
										<!--	<td><a href="<?php echo base_url();?>index.php/superadmin/add_course/<?php echo $row->id;?>"class="btn btn-info">Add course </a></td>-->
							            	<?php if($row->from_date > date('Y-m-d')){ 	?><td><a href="<?php echo base_url();?>index.php/superadmin/programdelete/<?php echo $row->id;?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a></td> <?php  }else{ ?><td></td><?php } ?>
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
        </div>                

     
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
<!-- Responsive examples -->
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
</body>


</html>
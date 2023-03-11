
<div class="card-body  table-responsive">
                             <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
										    <th>S No</th>
										    <th>Question</th>
										    <th>Option 1</th>
										    <!--<th>Program Type</th>-->
										    <!--<th>Course id</th>-->
										    <th>Option 2</th>
										    <th>Option 3</th>
										    <th>Option 4</th>
										    <th>Answer</th>
										    
										   
										    <th>Action</th>
									    </tr>
                                        </thead>
										<tbody>
										<?php $i=1; 
										  foreach($testquation as $row)  { ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row->quations;?></td>
											<td><?php echo $row->option1;?></td>
											<td><?php echo $row->option2;?></td>
										    <td><?php echo $row->option3;?></td>
											<td><?php echo $row->option4;?></td>
											<td><?php echo $row->answer;?></td>
								
							                <td>
							         
							         <a href="<?php echo base_url();?>questions/deletetestquation/<?php echo $row->id;?>/<?php echo $this->uri->segment(3);?>" class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a>
							             </td>
										</tr>
									<?php $i++; } ?>
                                        </tbody>
                                    </table>
                                    </div>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
<!-- Required datatable js -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestionlist.js"></script>

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
 
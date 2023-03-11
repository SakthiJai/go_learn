                                <div class="app-main__outer table-responsive">
                    <div class="app-main__inner " >
                        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-users icon-gradient bg-sunny-morning"></i>
                    </div>
                    <div>Admin Details
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
            </div>
        </div>  
<input type="hidden" id="base_url" name="base_url" value="<?php echo base_url();?>">		
		<button type="button" class="btn btn-primary adminDetails"  id="adminDetails">Add Admin</button>
		<select id="example-filter-placeholder" multiple="multiple">
    <option value="a">Option 1</option>
    <option value="b">Option 2</option>
    <option value="c">Option 3</option>
    <option value="d">Option 4</option>
    <option value="e">Option 5</option>
    <option value="f">Option 6</option>
    <option value="g">Option 7</option>
    <option value="h">Option 8</option>
    <option value="i">Option 9</option>
    <option value="j">Option 10</option>
    <option value="k">Option 11</option>
    <option value="l">Option 12</option>
    <option value="m">Option 13</option>
    <option value="n">Option 14</option>
</select>
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card ">
                                    <div class="card-body table-responsive">
                                        <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
                                        <th>S No</th>
										<th>Employee ID</th>
										<th>Name</th>
										<th>Action</th>
                                    </tr>
                                        </thead>
										<?php $i=1; ?>
                                        <tbody>
										
										<?php foreach($admin_list as $row) { ?>
                                      <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row->emp_id;?></td>
											<td><?php echo $row->name;?></td>
											<td>
											<button id="<?php echo $row->id; ?>" class="btn btn-info editadmin" type="button">Edit</button>
                                            <a class="btn btn-danger" href="<?php echo base_url(); ?>superadmin/deleteAdmin/<?php  echo $row->id; ?>">Delete</a>
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
        </div>                  

<div class="modal fade" id="addRowModal"  tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      
        </button>
      </div>
      <div class="modal-body">
		<div class="alert alert-success" id="insert_success" role="alert">
			Admin Details Insert Successfully!
		</div>
		<div class="alert alert-danger" id="insert_fail" role="alert">
			while Insert Issue Occured!
		</div>
		<div class="alert alert-success" id="update_success" role="alert">
			Admin Details Updated Successfully!
		</div>
		<div class="alert alert-danger"  id="update_fail" role="alert">
			Admin Details Updated Occured!
		</div>
		<div class="alert alert-danger"  id="employee_check" role="alert">
			Entered Employee Id Not In The Employee List!
		</div>
        <form id="admin_form">
		<input type="hidden" id="id" name="id" value="">
		<div class="form-group">
		
            <div class="col-md-4">
                <div class="position-relative form-group"><label for="divisions" class=""> <strong>Employee ID</strong></label>
                    <input name="emp_id"  type="text" id="emp_id" placeholder="Employee ID"  value="" class="form-control" >
                        </div>
                </div>
          </div>
          <!--<div class="form-group">
            <div class="col-md-12">
                <div class="position-relative form-group"><label for="divisions" class=""> <strong>Divisions</strong></label>
                    <select type="select" id="divisions" name="divisions" class="custom-select divisions">
						<option value="">Select Divisions</option>
                    </select>
                </div>
            </div>
          </div>-->
          <div class="form-group">
            <div class="col-md-4">
			<div class="position-relative form-group"><label for="divisions" class=""> <strong>Bu</strong></label>
                <div class="multiselect">
					<div class="selectBox" id="showCheckboxes">
					  <select class="custom-select divisions" id="butype">
						<option>Select Bu</option>
					  </select>
					  <div class="overSelect"></div>
					</div>
					<div id="checkboxes">
					</div>
				</div>
			</div>	
            </div>
          </div>
		  <div class="form-group">
            <div class="col-md-4">
			 <div class="position-relative form-group"><label for="divisions" class=""> <strong>Location</strong></label>
                <div class="multiselect">
					<div class="selectBox" id="showCheckboxes2">
					  <select class="custom-select divisions">
						<option>Select Location</option>
					  </select>
					  <div class="overSelect"></div>
					</div>
					<div id="location_checkboxes">
					</div>
				</div>
			</div>	
            </div>
          </div>
        <div class="modal-footer">
		 <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
	  </form>
      </div>
      
    </div>
  </div>
</div> 
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/adminDetails.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-multiselect.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>


</body>

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
<script src="<?php echo base_url();?>assets/js/boostrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/adminDetails.js"></script>

</html>

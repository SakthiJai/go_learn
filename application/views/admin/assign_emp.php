<div class="app-main__outer">
   <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-bookmark icon-gradient bg-plum-plate"></i>
                    </div>
                    <div>Assign employees to Program

                        <div class="page-title-subheading">Assign employees</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                        <form class=""  action="<?php echo base_url('superadmin/assign_emp/'.$program_id.'/'.$division_id);?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleText" class="">Employee ID's :</label><br>
                                                        <span>(Enter Employee ID's separated by space ( ) like 123XXX 456XXX 789XXX)</span>
                                                        <input name="emp_ids" id="exampleText" placeholder="" type="text" class="form-control">
										            </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="position-relative form-group"><br><br>
                                                        <button class="mt-2 btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <form method="POST" action="<?php echo base_url(); ?>superadmin/store_assign_emp">
				    <input type="hidden" value="<?php echo $program_id;?>" name="program_id" >
					<input type="hidden" value="<?php echo $division_id; ?>" name="division_id" >
                    <div class="card-body  table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                   <th class="th-sm">S.No</th>
                                   <th class="th-sm">Employee ID</th>
                                   <th class="th-sm">Employee Name</th>
                                   <th class="th-sm"></th>
                               </tr>
                               <tr>
							       <th></th>
							       <th></th>
							       <th></th>
							       <th><input type="checkbox"  name="assign_emp" id="selectAll"> Select All</th>
							   </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($emp_list)){ $i=1; foreach($emp_list as $emp){?>
								    <tr>
								    	<td><?php echo $i++; ?></td>
								    	<td><?php echo $emp->emp_id; ?></td>
								    	<td><?php echo $emp->name; ?></td>
								    	<td><input type="checkbox"  name="assign_empid[]" value="<?php echo $emp->emp_id; ?>"></td>
								    </tr>
							    <?php } } ?>
                            </tbody>
                        </table>
						<div class="col-sm-12" style="text-align:right;"><button type="submit" class="btn btn-warning">Assign</div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <?php if(isset($assigned_emp)  && ($assigned_emp->num_rows() > 0)){ ?>
                    <div class="card-body  table-responsive">
                        <h4>Assigned Employee List :</h4><br>
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                   <th class="th-sm">S.No</th>
                                   <th class="th-sm">Employee ID</th>
                                   <th class="th-sm">Employee Name</th>
                                   <th class="th-sm">Delete</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php  $i=1; foreach($assigned_emp->result() as $emp){?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $emp->employee_id; ?></td>
										<td><?php echo $emp->name; ?></td>
										<td><a href="<?php echo base_url();?>superadmin/assigned_empdelete/<?php echo $emp->id;?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a></td>
									</tr>
								<?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div> 
</div>
</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$('#selectAll').click(function(e){
	
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});
</script>
</body>
</html>
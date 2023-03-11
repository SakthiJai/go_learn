<div class="app-main__outer">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div>Course
                        <div class="page-title-subheading">Add course</div>
                    </div>
                </div>
            </div>
        </div>
            <div class="tab-content" >
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                    <form class="" action="<?php echo base_url();?>superadmin/adding_course" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="pid" class="form-control" value='<?php echo $pid ?>'>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="card-body  table-responsive">
                                                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="th-sm">Faculty Name</th>
                                                                <th class="th-sm">Faculty Type</th>
                                                                <th class="th-sm">From date</th>
                                                                <th class="th-sm">To date</th>
                                                              
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><select type="select" id="exampleCustomSelect" name="faculty_id" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <?php foreach($faculty->result() as  $row) { ?>
                                                                    <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td><select type="select" id="exampleCustomSelect" name="faculty_type" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <option>Internal</option>
                                                                    <option>External</option>
                                                                    </select>
                                                                </td>
                                                                <td><input name="cfrom_date" input type="date" id="exampleDate" placeholder="Date of birth" type="10/07/1984" class="form-control"></td>
                                                                <td><input name="cto_date" input type="date" id="exampleDate" placeholder="Date of birth" type="10/07/1984" class="form-control"></td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <th class="th-sm" colspan="2">Course</th>
                                                                <th class="th-sm">Training Type</th>
                                                                <th class="th-sm">No. of Hours</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2"><select type="select" id="exampleCustomSelect" name="course_id" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <?php foreach($course->result() as  $row) { ?>
                                                                    <option value="<?php echo $row->id;?>"><?php echo $row->course_title;?></option>
                                                                    <?php } ?>
                                                                    </select>
                                                                </td>
                                                                <td><select type="select" id="exampleCustomSelect" name="training_type" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <option>Physical</option>
                                                                    <option>Virtual</option>
                                                                    </select>
                                                                </td>
                                                                <td><select type="select" id="exampleCustomSelect" name="man_days" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <option value="0.1875">1.5</option>
																	<option value="0.25">2</option>
																	<option value="0.3125">2.5</option>
																	<option value="0.375">3</option>
																	<option value="0.4375">3.5</option>
																	<option value="0.5">4</option>
																	<option value="0.5625">4.5</option>
																	<option value="0.625">5</option>
																	<option value="0.6875">5.5</option>
																	<option value="0.75">6</option>
																	<option value="0.8125">6.5</option>
																	<option value="0.875">7</option>
																	<option value="0.9375">7.5</option>
																	<option value="1">8</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>    
                                            </div>        
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="d-block text-center">
                                                    <button class="mb-2 mr-2 btn btn-success">SUBMIT</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body  table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                   <th class="th-sm">S.No</th>
                                   <th class="th-sm">Faculty name</th>
                                   <th class="th-sm">Faculty type</th>
                                   <th class="th-sm">From date</th>
                                   <th class="th-sm">TO date</th>
                                   <th class="th-sm">Course</th>
                                   <th class="th-sm">Training Type</th>
                                   <th class="th-sm">mandays</th>
                                   <!--<th class="th-sm">Delete</th>-->
                               </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($p_course->result() as $row) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $row->faculty_name; ?></td>
                                  <td><?php echo $row->faculty_type; ?></td>
                                  <td><?php echo $row->from_date; ?></td>
                                  <td><?php echo $row->to_date; ?></td>
                                  <td><?php echo $row->course; ?></td>
                                  <td><?php echo $row->training_type; ?></td>
                                  <td><?php echo $row->man_days; ?></td>
                                  <!--<td><a href="<?php echo base_url('index.php/superadmin/delete_course/'.$row->id);?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete</a></td>-->
                                  
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
</div>
</div>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
</body>

</html>
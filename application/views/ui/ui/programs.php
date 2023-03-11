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
                    
					<button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded" style="--mdc-ripple-fg-size:65px; --mdc-ripple-fg-scale:1.92333; --mdc-ripple-fg-translate-start:-21.6875px, -3.5px; --mdc-ripple-fg-translate-end:22.1188px, -14.5px;">
                        Emplyoee Details
                      </button>
                    <div>
					 <a class="mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded" href="<?php echo base_url('superadmin/addemp'); ?>">
                                    New Employee
                                </a>&nbsp;&nbsp;
                        <i class="material-icons refresh-icon">refresh</i>
                        <i class="material-icons options-icon ml-2">more_vert</i>
						
                    </div>
                  </div>
                 
                  <div class="mdc-layout-grid__inner mt-2">
                    <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-12 mdc-layout-grid__cell--span-8-tablet">
                        <div class="table-responsive border">
                          <table class="table table-hoverable">
						  <thead>
                          <tr>
                                  <th class="th-sm">S.No</th>
                                  <th class="th-sm">Program Created User</th>
                                  <th class="th-sm">Course Name</th>
                                  <th class="th-sm">Program Name</th>
                                  <th class="th-sm">Program Group Name</th>
                                  <th class="th-sm">Training Type</th>
                                  <th class="th-sm">Nature of Program</th>
                                  <th class="th-sm">Tni Source</th>
                                  <th class="th-sm">Cost Per Program</th>
                                  <th class="th-sm">Cost Per Emp</th>
                                  <th class="th-sm">Faculty Name</th>
                                  <th class="th-sm">Faculty Type</th>
                                  <th class="th-sm">Training Mode</th>
                                  <th class="th-sm">No Of Hrs</th>
                                  <th class="th-sm">Venue</th>
                                  <th class="th-sm">Location</th>
                                  <th class="th-sm">TTT</th>
                                  <th class="th-sm">Evaluation Type</th>
                              <!--    <th class="th-sm">Assign</th> -->
                                </tr>
							</thead>		
                            <tbody>
							<?php $i=1; foreach($programs->result() as $row) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->created_user;?></td>
                                    <td><?php echo $row->course_name;?></td>
                                    <td><?php echo $row->program_name;?></td>
                                    <td><?php echo $row->program_group_name;?></td>
                                    <td><?php echo $row->training_type;?></td>
                                    <td><?php echo $row->nature_program;?></td>
                                    <td><?php echo $row->tni_source;?></td>
                                    <td><?php echo $row->cost_per_program;?></td>
                                    <td><?php echo $row->cost_per_emp;?></td>
                                    <td><?php echo $row->faculty_name;?></td>
                                    <td><?php echo $row->faculty_type;?></td>
                                    <td><?php echo $row->training_mode;?></td>
                                    <td><?php echo $row->no_of_hrs;?></td>
                                    <td><?php echo $row->venue;?></td>
                                    <td><?php echo $row->location;?></td>
                                    <td><?php echo $row->ttt;?></td>
                                    <td><?php echo $row->evaluation;?></td>
                                   <!-- <td><a href="<//?php echo base_url('superadmin/assign_emp/'.$row->id);?>"><button class="mt-1 btn btn-success">Assign Employee</button></a></td>-->
                                    <!--<td><a href="addcourse.html"><button class="mt-1 btn btn-success">Add Course</button></a></td>-->
                                    <!--<td><a class="btn btn-info"><i class="pe-7s-note" aria-hidden="true"></i></a></td>-->
                                    <!--<td><a class="btn btn-danger"><i class="pe-7s-trash" aria-hidden="true"></i></a></td>-->
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
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php');?>
        <!-- partial -->
      </div>
    </div>
  </div>
  
</body>
</html> 
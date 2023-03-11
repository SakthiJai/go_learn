                                <div class="app-main__outer table-responsive">
                    <div class="app-main__inner " >
                        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-users icon-gradient bg-sunny-morning"></i>
                    </div>
                    <div>Employees
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
            </div>
        </div>     
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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>SBU</th>
                                        <th>Branch/plant</th>
                                        <th>Division</th>
                                        <th>Grade</th>
                                        <th>Employee Type</th>
                                        <th>Designation</th>
                                        <th>Date of birth</th>
                                        <th>Date of join</th>
                                        <th>Organisation unit</th>
                                        <th>Function</th>
                                        <th>Previous experience</th>
                                        <th>Experience</th>
                                        <th>Gender</th>
                                        <th>IO ID</th>
                                        <th>IO name</th>
                                        <th>FRO ID</th>
                                        <th>FRO name</th>
                                        <th>RO ID</th>
                                        <th>RO name</th>
                                        <!--<th>Blood Group</th>
                                        <th>Religion</th>
                                        <th>Birth place</th>
                                        <th>State</th>
                                        <th>Father name</th>
                                        <th>PF nominee 1</th>
                                        <th>Nominee 1 relationship</th>
                                        <th>PF nominee 2</th>
                                        <th>Nominee 2 relationship</th>
                                        <th>T-shirt size</th>
                                        <th>preferred food</th>
                                        <th>Passport NO</th>
                                        <th>Passport expiry date</th>
                                        <th>Admin</th>
                                        <th>Resign</th>
                                        <th>Edit</th>-->
                                    </tr>
                                        </thead>
										<?php $i=1; ?>
                                        <tbody>
										
										<?php foreach($emp->result() as $row) { ?>
                                      <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row->emp_id;?></td>
                                            <td><?php echo $row->name;?></td>
                                            <td><?php echo $row->mobile;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->password;?></td>
                                            <td><?php echo $row->sbu;?></td>
                                            <td><?php echo $row->branch_plant;?></td>
                                            <td><?php echo $row->division;?></td>
                                            <td><?php echo $row->grade;?></td>
                                            <td><?php echo $row->emp_type;?></td>
                                            <td><?php echo $row->designation;?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row->dob));?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row->doj));?></td>
                                            <td><?php echo $row->organisation_unit;?></td>
                                            <td><?php echo $row->function;?></td>
                                            <td><?php echo $row->prev_exp;?></td>
                                            <td><?php if($row->doj != '0000-00-00') { $date1 = new DateTime($row->doj); $date2 = date('Y-m-d'); $date3 = $date1->diff(new DateTime($date2)); echo $date3->y.'.'.$date3->m; } ?></td>
											<td><?php echo $row->gender;?></td>
                                            <td><?php echo $row->io_id;?></td>
                                            <td><?php echo $row->io_name;?></td>
                                            <td><?php echo $row->fro_id;?></td>
                                            <td><?php echo $row->fro_name;?></td>
                                            <td><?php echo $row->ro_id;?></td>
                                            <td><?php echo $row->ro_name;?></td>
                                            <!--<td><?php echo $row->blood_group;?></td>
                                            <td><?php echo $row->religion;?></td>
                                            <td><?php echo $row->birth_place;?></td>
                                            <td><?php echo $row->state;?></td>
                                            <td><?php echo $row->father_name;?></td>
                                            <td><?php echo $row->pf_nominee1;?></td>
                                            <td><?php echo $row->relationship1;?></td>
                                            <td><?php echo $row->pf_nominee2;?></td>
                                            <td><?php echo $row->relationship2;?></td>
                                            <td><?php echo $row->tshirt_size;?></td>
                                            <td><?php echo $row->food_pref;?></td>
                                            <td><?php echo $row->passport_no;?></td>
                                            <td><?php echo $row->passport_expiry_date;?></td>
                                            <?php if($row->admin=='admin'){ ?><td><a href="#" class="btn btn-danger">Remove Admin</a></td> <?php }else{ ?><td><a href="#" class="btn btn-info">Make Admin</a></td><?php } ?>
                                            <?php if($row->emp_status==2){ ?><td><a  class="btn btn-danger">Resigned</a></td> <?php }else{ ?><td><a href="#" class="btn btn-info">Resign</a></td><?php } ?>
                                            <td><a href="#" class="btn btn-info">Edit </a></td>-->
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

     
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>

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
        <!--<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
</body>
</html>

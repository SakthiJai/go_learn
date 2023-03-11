<div class="app-main__outer">
   <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-list icon-gradient bg-deep-blue"></i>
                    </div>
                    <div>Programs List
                        <div class="page-title-subheading">List of programs</div>
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
                                  <th class="th-sm">S.No</th>
                                  <th class="th-sm">Program Created</th>
                                  <th class="th-sm">Program Name</th>
                                  <!--<th class="th-sm">From Date</th>-->
                                  <!--<th class="th-sm">To Date</th>-->
                                  <th class="th-sm">Venue</th>
                                  <th class="th-sm">Location</th>
                                  <th class="th-sm">Training Type</th>
                                  <th class="th-sm">Nature of Program</th>
                                  <th class="th-sm">TNI SOURCE</th>
                                  <!--<th class="th-sm">Cost per emp</th>-->
                                  <!--<th class="th-sm">Division</th>-->
                                  <th class="th-sm">Assign</th>
                                  <!--<th class="th-sm">Add Course</th>
                                  <th class="th-sm">Edit</th>
                                  <th class="th-sm">Delete</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($programs->result() as $row) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row->owner_name;?><br><?php echo $row->owner_id;?></td>
                                    <td><?php echo $row->program_name;?></td>
                                    <!--<td><?php echo $row->from_date;?></td>-->
                                    <!--<td><?php echo $row->to_date;?></td>-->
                                    <td><?php echo $row->venue;?></td>
                                    <td><?php echo $row->location;?></td>
                                    <td><?php echo $row->ttt;?></td>
                                    <td><?php echo $row->nature_program;?></td>
                                    <td><?php echo $row->tni_source;?></td>
                                    <!--<td><?php echo $row->cost_emp;?></td>-->
                                    <!--<td><?php echo $row->division;?></td>-->
                                    <td><a href="<?php echo base_url('superadmin/assign_emp/'.$row->id.'/'.$row->division_id);?>"><button class="mt-1 btn btn-success">Assign Employee</button></a></td>
                                    <!--<td><a href="addcourse.html"><button class="mt-1 btn btn-success">Add Course</button></a></td>
                                    <td><a class="btn btn-info"><i class="pe-7s-note" aria-hidden="true"></i></a></td>
                                    <td><a class="btn btn-danger"><i class="pe-7s-trash" aria-hidden="true"></i></a></td>-->
                                </tr>
                                <?php $i++; } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="th-sm">S.No</th>
                                    <th class="th-sm">Program Created</th>
                                    <th class="th-sm">Program Name</th>
                                    <!--<th class="th-sm">From Date</th>-->
                                    <!--<th class="th-sm">To Date</th>-->
                                    <th class="th-sm">Venue</th>
                                    <th class="th-sm">Location</th>
                                    <th class="th-sm">Training Type</th>
                                    <th class="th-sm">Nature of Program</th>
                                    <th class="th-sm">TNI SOURCE</th>
                                    <!--<th class="th-sm">Cost per emp</th>-->
                                    <!--<th class="th-sm">Division</th>-->
                                    <th class="th-sm">Assign</th>
                                    <!--<th class="th-sm">Add Course</th>
                                    <th class="th-sm">Edit</th>
                                    <th class="th-sm">Delete</th>-->
                                </tr>
                             </tfoot>
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
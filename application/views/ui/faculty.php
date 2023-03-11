<div class="app-main__outer  table-responsive">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-map-signs icon-gradient bg-warm-flame"></i>
                    </div>
                    <div>Faculty
                        <div class="page-title-subheading">Add Faculty
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($editfaculty) && ($editfaculty->num_rows() > 0)) {
            foreach ($editfaculty->result() as $row) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                                <form class="" id="faculty" action="<?php echo base_url(); ?>superadmin/updatefaculty/<?php echo $row->id; ?>" method="POST">

                                                    <div class="form-row">
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group">
                                                                <label for="faculty_type" class=""> <strong> Faculty Type:</strong></label>
                                                                <select type="select" id="faculty_type" name="faculty_type" class="custom-select">
                                                                    <option value="">Select</option>
                                                                    <option value="1">Internal</option>
                                                                    <option value="2">External</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleText" class="">Faculty Name</label>
                                                                <input name="name" value="<?php echo $row->name; ?>" id="facultyname" placeholder="" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleText" class="">Company Name</label>
                                                                <input name="company_name" value="<?php echo $row->company_name; ?>" id="facultycomp" placeholder="" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group"><label for="exampleText" class="">Mobile</label>
                                                                <input name="mobile" value="<?php echo $row->mobile; ?>" id="facultymobile" placeholder="" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                                                                <input name="email" value="<?php echo $row->email; ?>" id="email" placeholder="" type="exampleEmail" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="position-relative form-group"><label for="exampleCity" class="">City</label>
                                                                <input name="city" value="<?php echo $row->city; ?>" id="facultycity" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="position-relative form-group"><label for="exampleState" class="">State</label>
                                                                <input name="state" value="<?php echo $row->state; ?>" id="facultystate" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="position-relative form-group"><label for="exampleZip" class="">Country</label>
                                                                <input name="country" value="<?php echo $row->country; ?>" id="facultyzip" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-block text-right">
                                                        <button type="submit" class="mb-2 mr-2 btn btn-success">Update</button>
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
            <?php }
        } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                            <form class="" id="addFaculty" action="<?php echo base_url('superadmin/addfaculty'); ?>" method="POST">

                                                <div class="form-row">
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group">
                                                            <label for="faculty_type" class=""> <strong> Faculty Type:</strong></label>
                                                            <select type="select" id="faculty_type" name="faculty_type" class="custom-select" >
                                                                <option value="">Select</option>
                                                                <option value="1">Internal</option>
                                                                <option value="2">External</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" id="facultyiddiv">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Employee Id(Only for internal)</label>
                                                            <input name="facultyid"  id="facultyid" placeholder="" type="text" class="form-control " readonly>
                                                        </div>
                                                         <div class="error" id="empnot"></div>
                                                    </div>
                                                   
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Faculty Name</label>
                                                            <input name="facultyname" id="facultyname" placeholder="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Company Name</label>
                                                            <input name="company_name" id="facultycomp" placeholder="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleText" class="">Mobile</label>
                                                            <input name="mobile" id="exampleText" placeholder="" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                                                            <input name="email" id="email" placeholder="" type="exampleEmail" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="position-relative form-group"><label for="exampleCity" class="">City</label>
                                                            <input name="city" id="exampleCity" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="position-relative form-group"><label for="exampleState" class="">State</label>
                                                            <input name="state" id="exampleState" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="position-relative form-group"><label for="exampleZip" class="">Country</label>
                                                            <input name="country" id="exampleZip" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">ADD</button>
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
        <?php } ?>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body  table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Faculty Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Company name</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>

                                <?php foreach ($faculty->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row->name; ?></td>
                                        <td><?php echo $row->mobile; ?></td>
                                        <td><?php echo $row->email; ?></td>
                                        <td><?php echo $row->company_name; ?></td>
                                        <td><?php echo $row->city; ?></td>
                                        <td><?php echo $row->state; ?></td>
                                        <td><?php echo $row->country; ?></td>
                                        <td><a href="<?php echo base_url(); ?>superadmin/faculty/<?php echo $row->id; ?>" class="btn btn-info">Edit</a></td>
                                        <td><a href="<?php echo base_url(); ?>superadmin/faculty_delete/<?php echo $row->id; ?>" onclick="return confirm ('Do you want to Delete this record?');" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                <?php $i++;
                                }  ?>

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

<link rel="stylesheet" href="<?= base_url() ?>/assets/css/faculty.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/main.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/faculty.js"></script> 
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
</body>


</html>
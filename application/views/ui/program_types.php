<div class="app-main__outer  table-responsive">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-map-signs icon-gradient bg-warm-flame"></i>
                    </div>
                    <div>Program Type
                        <div class="page-title-subheading">Add Program Type
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($editprogram_types) && ($editprogram_types->num_rows() > 0)) {
            foreach ($editprogram_types->result() as $row) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                                <form class="" action="<?php echo base_url(); ?>superadmin/updateprogram_types/<?php echo $row->id; ?>" method="POST">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group"><label for="type" class=""> Program Type:</label>
                                                            <input name="type" value="<?php echo $row->type; ?>" id="type" placeholder="" type="text" class="form-control">
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
                                            <form class="" id="addProgramType" action="<?php echo base_url('superadmin/addprogram_types'); ?>" method="POST">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group"><label for="type" class=""> Program Type:</label>
                                                        <input name="type" id="type" placeholder="" type="text" class="form-control">
                                                    </div>
                                                </div>



                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">Add</button>
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
                        <table id="" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Program Types</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>

                                <?php foreach ($program_types->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $row->type; ?></td>
                                        <td><a href="<?php echo base_url(); ?>superadmin/program_types/<?php echo $row->id; ?>" class="btn btn-info">Edit</a>
                                        <a class="btn btn-danger" href="<?php echo base_url(); ?>Program/deleteProgramtypes/<?php  echo $row->id; ?>">Delete</a>
                                        </td>
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
<link rel="stylesheet" href="<?= base_url() ?>/assets/css/programtypes.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/programtypes.js"></script>

</body>

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
</html>
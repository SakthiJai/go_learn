<div class="app-main__outer">
   <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-bookmark icon-gradient bg-plum-plate"></i>
                    </div>
                    <div>Training Components
                        <div class="page-title-subheading">Add training components</div>
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
                                        <form class=""  action="<?php echo base_url();?>superadmin/addfeedback_quation" method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> Components:</label>
                                                    <input name="quations" id="exampleText" placeholder="" type="text" class="form-control">
                                                    <input id="name" name="type" type="text" class="form-control" value="Training Components" placeholder="Question" hidden>
										            <input type="text"  name="course_id" class="form-control" value="<?php echo $c_id;?>" hidden>
                                                </div>
                                            </div>
                                            <div class="d-block text-right">
                                                <button class="mb-2 mr-2 btn btn-success">ADD</button>
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
                    <div class="card-body  table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                            <thead>
                               <tr>
                                   <th class="th-sm">S.No</th>
                                   <th class="th-sm">Components</th>
                                   <th class="th-sm">Type</th>
                                   <th class="th-sm">Delete</th>
                                   <th class="th-sm">Active/Inactive</th>
                               </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($feedback_questions->result() as $row) { ?>
                                <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $row->quations; ?></td>
                                  <td><?php echo $row->type; ?></td>
                                  <td><?php if($row->type== 'Training Components') { ?><a href="<?php echo base_url('index.php/superadmin/delete_feedback_quations/'.$row->id);?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete</a><?php } ?></td>
                                  <td>
                                        <?php if($row->type !== 'Training Components') { if($row->status == 1) {?>
                                            <a href="<?php echo base_url('superadmin/inactivefeedback_quation/'.$row->id);?>"><button class="mt-1 btn btn-success">Active</button></a>
                                        <?php } else {?>
                                            <a href="<?php echo base_url('superadmin/activefeedback_quation/'.$row->id);?>"><button class="mt-1 btn btn-primary">Inactive</button></a>
                                        <?php } } ?>
                                  </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th class="th-sm">S.No</th>
                                  <th class="th-sm">Components</th>
                                  <th class="th-sm">Type</th>
                                  <th class="th-sm">Delete</th>
                                  <th class="th-sm">Active/Inactive</th>
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
</body>
</html>
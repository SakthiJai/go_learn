
 
<div class="app-main__outer">
    <div class="app-main__inner">
        
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                               
                                <input type="hidden" id="baseurl" name="baseurl" value="<?php echo base_url();?>">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S No</th>
                                                <th>Components</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($evaluation_quations->result() as $row) {  ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->quations; ?></td>
                                                    <td><?php echo $row->type; ?></td>
                                                    <td><?php if ($row->type == 'Training Components') { ?><a href="<?php echo base_url('superadmin/delete_evaluation_quations/' . $row->id); ?>" class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete</a><?php } ?></td>
                                                    <td><?php if ($row->type != 'Training Components') {
                                                            if ($row->status == '2') { ?>
                                                                <button type="button" class="btn btn-primary deactivatestatus" id="<?php echo $row->id; ?>"> Inactive </button>
																 <input type="hidden" id="baseurl" name="baseurl" value="<?php echo $row->status;?>">
                                                            <?php } else if($row->status=='1'){ ?>
                                                                <button  type="button" class="btn btn-success activestatus" id="<?php echo $row->id; ?>"> Active </button>
																<input type="hidden" id="baseurl" name="baseurl" value="<?php echo $row->status;?>">
                                                        <?php }
                                                        } ?>
                                                    </td>
                                                </tr>
                                            <?php $i++;
                                            } ?>
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




 
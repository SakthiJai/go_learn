<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
 
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div>Training Components
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <form action="<?php echo base_url(); ?>superadmin/addevaluation_quation/<?php echo $row->id; ?>" method="POST" class="form-horizontal">
                                                <div class="form-group row">
                                                    <input type="text"  name="evaluation_id" class="form-control" value="<?php echo $id;?>" hidden>
                                                    <div class="col-sm-6 col-md-3">
                                                        <label for="name" class="col-form-label">Components:</label><br>
                                                         <input id="name" name="quations" type="text" class="form-control" placeholder="Components">
                                                         <input id="name" name="type" type="text" class="form-control" value="Training Components" placeholder="Question" hidden>
                                                       <!-- <input id="name" type="text" name="title" class="form-control" value="<?php echo $row->title; ?>" onkeypress="return NumbersOnly(this,event)" required> -->
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <center>
                                                            <button class="btn btn-success">Add</button>
                                                        </center>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                                            if ($row->status != '1') { ?>
                                                                <button class="btn btn-primary" onclick="statuss(<?php echo $row->id; ?>, 1)"> Inactive </button>
                                                            <?php } else { ?>
                                                                <button class="btn btn-success" onclick="statuss(<?php echo $row->id; ?>, 2)"> Active </button>
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
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>

<script>
	function statuss(id,status) {
	$.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>superadmin/activeevaluation_quation",
            data: {'id':id, 'status':status},
            success: function(data) {
                if(data) {
                	//alert("Status successfully changed");
                	window.location.reload();
                }
            }
        });
	}
</script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery.min.js"></script>






<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/main.js"></script>

 
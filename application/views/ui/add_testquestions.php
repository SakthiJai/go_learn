<div class="app-main__outer  table-responsive">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-question icon-gradient bg-premium-dark"></i>
                    </div>
                    <div>Add Test Questions
                        <div class="page-title-subheading">Add Test Questions</div>
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
                                        <div class="d-block text-center"> <h6> <strong><?php echo $courese_name; ?></strong></h6></div>
                                        <form class="" action="<?php echo base_url();?>superadmin/testquestions_adding/<?php echo $c_id; ?>" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Question: </label>
                                                    <div class="col-md-12">
                                                        <textarea id="info" name="quations" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span></label>
                                                    <div class="col-md-10">
                                                        <input id="title" name="image" type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 1:</label>
                                                    <div class="col-md-10"><input id="option" name="option1" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 2:</label>
                                                    <div class="col-md-10"><input id="option" name="option2" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 3:</label>
                                                    <div class="col-md-10"><input id="option" name="option3" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Option 4:</label>
                                                    <div class="col-md-10"><input id="option" name="option4" type="text" class="form-control" placeholder="Title" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Answer :</label><br>
                                                    <div class="col-md-10">
                                                        <select name="answer" class="form-control" required>
                                                            <option value="">Select</option>
                                                            <option value="1">Option 1</option>
                                                            <option value="2">Option 2</option>
                                                            <option value="3">Option 3</option>
                                                            <option value="4">Option 4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">SUBMIT</button>
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
                    <div class="d-block text-center"> <h6> <strong> Pre test </strong></h6></div>
                    <?php $i=1; foreach($pre_questions->result() as $row)  { ?>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-form-label"><p> <strong>Q<?php echo $i; ?>:</strong><?php echo $row->question; ?> </p>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 1: </span><?php echo $row->option1; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 2: </span><?php echo $row->option2; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 3: </span><?php echo $row->option3; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 4: </span><?php echo $row->option4; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <p><span style="color: #008000;">Answer: </span><?php echo $row->answer; ?></p>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <hr>
                    <?php $i++; } ?>
                    <div class="d-block text-center"> <h6> <strong> Post test </strong></h6></div>
                    <?php $i=1; foreach($post_questions->result() as $row)  { ?>
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12">
                            <div class="col-form-label"><p> <strong>Q<?php echo $i; ?>:</strong><?php echo $row->question; ?> </p>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 1: </span><?php echo $row->option1; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 2: </span><?php echo $row->option2; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 3: </span><?php echo $row->option3; ?></p>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <p><span style="color: #2196f3;">Option 4: </span><?php echo $row->option4; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <p><span style="color: #008000;">Answer: </span><?php echo $row->answer; ?></p>
                                </div>
                            </div>
                            <!--<div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <a href="" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-danger">Delete</a>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <hr>
                    <?php $i++; } ?>
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
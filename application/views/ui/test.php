  
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title"> 
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="fa fa-home icon-gradient bg-love-kiss">
                                    </i>
                                </div>
                                <div>Course : <?php echo $courese_name; ?>
                                    <div class="page-title-subheading">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                        <div class="row">
                            <?php if($coursedata['test']==1) { ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Pre Test</div>
                                            <div class="widget-subheading">Add Test Questions</div>
                                        </div>
                                        <div class="widget-content-right text-white">
                                            <a href="<?php echo base_url();?>superadmin/pretest_questions/<?php echo $c_id; ?>">
                                            <button class="mb-2 mr-2 btn btn-success"><strong>Add</strong></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($coursedata['test']==2) { ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Post Test</div>
                                            <div class="widget-subheading">Add Test Questions</div>
                                        </div>
                                        <div class="widget-content-right text-white">
                                            <a href="<?php echo base_url();?>superadmin/posttest_questions/<?php echo $c_id; ?>">
                                            <button class="mb-2 mr-2 btn btn-success"><strong>Add</strong></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($coursedata['test']==3) { ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Post and Pre Test</div>
                                            <div class="widget-subheading">Add Test Questions</div>
                                        </div>
                                        <div class="widget-content-right text-white">
                                            <a href="<?php echo base_url();?>superadmin/test_questions/<?php echo $c_id; ?>">
                                            <button class="mb-2 mr-2 btn btn-success"><strong>Add</strong></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Feedback form</div>
                                            <div class="widget-subheading">Add Questions</div>
                                        </div>
                                        <div class="widget-content-right text-white">
                                            <a href="<?php echo base_url();?>superadmin/feedback_questions/<?php echo $c_id; ?>">
                                            <button class="mb-2 mr-2 btn btn-success"><strong>Add</strong></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
        </div>
    </div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
</html>

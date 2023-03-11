<div class="app-main__outer">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div>Program
                        <div class="page-title-subheading">Create Program</div>
                    </div>
                </div>
            </div>
        </div>
            <div class="tab-content" >
                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                    <form class="" action="<?php echo base_url();?>superadmin/creatingprogram" method="POST" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <!--<div class="col-md-6">-->
                                            <!--   <div class="position-relative form-group">-->
                                            <!--        <label for="exampleSelect" class=""><strong>Division: </strong></label>-->
                                            <!--        <select type="select" id="exampleCustomSelect" name="division_id" class="custom-select">-->
                                            <!--            <option value="">Select Divison</option>-->
                                            <!--            <?php foreach($division->result() as $row) { ?>-->
                                            <!--            <option value="<?php echo $row->id;?>"><?php echo $row->divisions;?> </option>-->
                                            <!--            <?php } ?>-->
                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Course Name:</strong></label>
                                                <!--<input name="program_name" id="exampleText" placeholder="Program Name" type="text" class="form-control">-->
                                                    <select type="select" id="exampleCustomSelect" name="division_id" class="custom-select">
                                                        <option value="">Select Course</option>
                                                        <?php foreach($course->result() as $row) { ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->course_title;?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                               <div class="position-relative form-group">
                                                    <label for="exampleSelect" class=""><strong>Program Name: </strong></label>
                                                    <input name="program_name" id="exampleText" placeholder="Program Name" type="text" class="form-control">

                                                    <!--<select type="select" id="exampleCustomSelect" name="division_id" class="custom-select">-->
                                                    <!--    <option value="">Select Divison</option>-->
                                                    <!--    <?php foreach($division->result() as $row) { ?>-->
                                                    <!--    <option value="<?php echo $row->id;?>"><?php echo $row->divisions;?> </option>-->
                                                    <!--    <?php } ?>-->
                                                    <!--</select>-->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleText" class=""> <strong>  Program Group:</strong></label>
                                                <input name="program_group" id="exampleText" placeholder="Program Group" type="text" class="form-control">
                                                    <!--<select type="select" id="exampleCustomSelect" name="division_id" class="custom-select">-->
                                                    <!--    <option value="">Select Course</option>-->
                                                    <!--    <?php foreach($course->result() as $row) { ?>-->
                                                    <!--    <option value="<?php echo $row->id;?>"><?php echo $row->course_title;?> </option>-->
                                                    <!--    <?php } ?>-->
                                                    <!--</select>-->
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group"><label for="exampleText" class=""> <strong> Training Type</strong></label>
                                                <input name="training_type" id="exampleText" placeholder="Training Type" type="text" class="form-control">
                                                    <!--<select type="select" id="exampleCustomSelect" name="division_id" class="custom-select">-->
                                                    <!--    <option value="">Select Course</option>-->
                                                    <!--    <?php foreach($course->result() as $row) { ?>-->
                                                    <!--    <option value="<?php echo $row->id;?>"><?php echo $row->course_title;?> </option>-->
                                                    <!--    <?php } ?>-->
                                                    <!--</select>-->
                                                </div>
                                            </div>
                                            
                                        </div>
                                       
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class="">  <strong>Nature of Program:</strong></label>
                                                    <!--<input name="program" id="exampleText" placeholder="Nature of Program" type="text" class="form-control">-->
                                                    <select type="select" id="exampleCustomSelect" name="nature_program" class="custom-select">
                                                        <option value="">Select Nature Of Program</option>
					                    			    <option value="Calendared programs">Calendared Programs</option>
					                    			    <option value="Coromandel Developed programs">Coromandel Developed Programs</option>
					                    			    <option value="Murugappa Group designed Programs">Murugappa Group Designed Programs</option>
					                    			    <option value="Broucher Programs">Broucher Programs</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class="">  <strong>TNI Source:</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="tni_source" class="custom-select">
                                                        <option value="">Select TNI Source</option>
					                    			    <option value="Competency Gaps">Competency Gaps</option>
					                    			    <option value="Succession Planning">Succession Planning</option>
					                    			    <option value="Inputs from P M S">Inputs From P M S</option>
					                    			    <option value="Inputs by Manager">Inputs By Manager</option>
					                    			    <option value="Request from the trainee">Request From The Trainee</option>
					                    			    <option value="Compliance programs">Compliance Programs</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> Cost Per Program:</strong></label>
                                                    <input name="cost_emp" id="exampleText" placeholder="Cost Per Program" type="text" class="form-control">
                                                </div>
                                            </div>
                                            
                                           
                                            
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> Projected Cost Per Employee:</strong></label>
                                                    <input name="cost_emp" id="exampleText" placeholder="Cost Per Employee" type="text" class="form-control">
                                                </div>
                                            
                                            
                                            
                                            <!--<div class="col-md-2">-->
                                            <!--    <div class="position-relative form-group">-->
                                            <!--        <label for="exampleSelect" class=""><strong>TTT: </strong></label><br>-->
                                            <!--        <input id="name" type="radio" name="ttt"  value="TTT" ><label>Yes</label>&nbsp;&nbsp;-->
                                            <!--        <input id="name" type="radio" name="ttt"  value="" checked required><label>No</label>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            
                                           
                                            <!--<div class="col-md-5">-->
                                            <!--    <div class="position-relative form-group">-->
                                            <!--        <label for="exampleSelect" class=""><strong>TTT Programs: </strong></label>-->
                                            <!--        <select type="select" id="exampleCustomSelect" name="ttt_id" class="custom-select">-->
                                            <!--            <option value="">Select TTT Programs</option>-->
                                            <!--            <option value="1">aaa</option>-->
                                            <!--            <option value="2">bb</option>-->
                                            <!--        </select>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                        </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> Faculty Name:</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="faculty_id" class="custom-select">
                                                        <option value="">Select</option>
                                                        <?php foreach($faculty->result() as  $row) { ?>
                                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> Faculty Type:</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="faculty_type" class="custom-select">
                                                        <option value="">Select</option>
                                                        <option>Internal</option>
                                                        <option>External</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> Training Mode:</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="training_type" class="custom-select">
                                                        <option value="">Select</option>
                                                        <option>Physical</option>
                                                        <option>Virtual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> No. of Hours:</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="man_days" class="custom-select">
                                                        <option value="">Select</option>
                                                        <option value="0.1875">1.5</option>
														<option value="0.25">2</option>
														<option value="0.3125">2.5</option>
														<option value="0.375">3</option>
														<option value="0.4375">3.5</option>
														<option value="0.5">4</option>
														<option value="0.5625">4.5</option>
														<option value="0.625">5</option>
														<option value="0.6875">5.5</option>
														<option value="0.75">6</option>
														<option value="0.8125">6.5</option>
														<option value="0.875">7</option>
														<option value="0.9375">7.5</option>
														<option value="1">8</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleDate" class=""> <strong>From Date:</strong></label>
                                                    <input name="from_date" input type="date" id="exampleDate" placeholder="From Date" type="10/07/1984" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleDate" class=""> <strong>End Date:</strong></label>
                                                    <input name="to_date" input type="date" id="exampleDate" placeholder="End Date" type="10/07/1984" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class="">  <strong>Venue:</strong></label>
                                                    <input name="venue" id="exampleText" placeholder="Venue" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class=""> <strong> Location:</strong></label>
                                                    <input name="location" id="exampleText" placeholder="Location" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class="">  <strong>TTT</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="Evaluation_type" class="custom-select">
                                                        <option value="">Select</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="exampleText" class="">  <strong>Evaluation:</strong></label>
                                                    <select type="select" id="exampleCustomSelect" name="Evaluation_type" class="custom-select">
                                                        <option value="">Select</option>
                                                        <option>Level-1 </option>
                                                        <option>Level-2 </option>
                                                    </select>
                                                </div>
                                                
                                                <!--<div class="position-relative form-group">-->
                                                <!--    <label for="exampleText" class="">  <strong>Evaluation:</strong></label>-->
                                                <!--    <select type="select" id="exampleCustomSelect" name="Evaluation_type" class="custom-select">-->
                                                <!--        <option value="">Select</option>-->
                                                <!--        <option>Level-1 : Feedback</option>-->
                                                <!--        <option>Level-2 : Pre Test, Post Test, Pre and Post Test</option>-->
                                                <!--    </select>-->
                                                <!--</div>-->
                                            </div>
                                            
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="d-block text-center">
                                                    <button class="mb-2 mr-2 btn btn-success">SUBMIT</button>
                                                </div>
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
</div>
</div>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
</body>

</html>
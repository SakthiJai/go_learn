<div class="app-main__outer">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div><?php echo $h_title;?>
                        <div class="page-title-subheading">Feedback</div>
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
                        <?php if(isset($editadmin_evaluation) && ($editadmin_evaluation->num_rows()>0)){ foreach($editadmin_evaluation->result() as $row){ ?>
							<div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
								        <form action="<?php echo base_url();?>superadmin/updateadmin_evaluation/<?php echo $row->id;?>" method="POST" class="form-horizontal">
									        <div class="form-group row">
										        <div class="col-sm-6 col-md-3">
											        <label for="name" class="col-form-label">Feedback Form title :</label><br>
											        <input id="name" type="text" name="title" class="form-control" value="<?php echo $row->title;?>" onkeypress="return NumbersOnly(this,event)" required>
										        </div>
									        </div>
									        <div class="form-group row">
                                                <div class="col-sm-12 col-md-12">
												<center>
													<button class="btn btn-success">Update</button>
												</center>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
							<?php } } else {?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-box">
        								        <form action="<?php echo base_url();?>superadmin/admin_addevaluation/<?php echo $row->id;?>" method="POST" class="form-horizontal">
        									        <div class="form-group row">
        										        <div class="col-sm-6 col-md-3">
        											        <label for="name" class="col-form-label">Feedback Form title :</label><br>
        											        <input id="name" type="text" name="title" class="form-control" value="<?php echo $row->title;?>" onkeypress="return NumbersOnly(this,event)" required>
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
                                   	<?php } ?>
                            	<div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
											<th>S No</th>
											<th>Feedback Form title</th>
											<th>ADD</th>
										
											<th>Edit</th>
										</tr>
                                        </thead>
										 <tbody>
										<?php $i=1; foreach($admin_evaluation->result() as $row) {  ?>
										<tr>
                                            <td><?php echo $i;?></td>
											<td><?php echo $row->title;?></td>
									    <!--<td><?php echo $row->from_date;?></td>
											<td><?php echo $row->to_date;?></td>
											<td><?php echo $row->submit_time;?></td>
											<td><?php echo $row->faculty;?></td>-->
									
											<td><a href="<?php echo base_url('superadmin/evaluation_quation/'.$row->id);?>"  class="btn btn-success">Add Components</a></td>
										<!--<td><a href="<?php echo base_url('index.php/welcome/evaluation_quation1/'.$row->id);?>"  class="btn btn-success">More Questions</a></td>-->
                                        	<td><a href="<?php echo base_url();?>superadmin/feedbackform/<?php echo $row->id;?>"class="btn btn-info">Edit </a></td>
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
</div>
</div>
</div>
<style>
    .error{
    color: red;
    font-size: 12px;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>
    $(document).ready(function(){
        $('#createProgram').validate({
    rules: {
        course_name: 
        {
            required: true,
        },
        program_name: 
        {
            required: true,
        },
        program_group_name: 
        {
            required: true,
        },                        
        training_type: 
        {
            required: true,
        },
        nature_program: 
        {
            required: true,
        },
        tni_source: 
        {
            required: true,
        },
        cost_per_program: 
        {
            required: true,
        },
        cost_per_emp: 
        {
            required: true,
        },
        faculty_name: 
        {
            required: true,
        },
        faculty_type: 
        {
            required: true,
        },
        training_mode: 
        {
            required: true,
        },
        no_of_hrs: 
        {
            required: true,
        },
        from_date: 
        {
            required: true,
        },
        to_date: 
        {
            required: true,
        },
        venue: 
        {
            required: true,
        },
        location: 
        {
            required: true,
        },
        ttt: 
        {
            required: true,
        },
        evaluation: 
        {
            required: true,
        },
        assignemployee: 
        {
            required: true,
        },
    },
messages : {
    course_name:{
        required: "Select course name"
    },
    program_name: {
        required: "Select program name"
    },
    program_group_name: {
        required: "Select program group"
    },
    training_type: {
        required: "Select training type"
    },
    nature_program: {
        required: "Select nature of program"
    },
    tni_source: {
        required: "Select TNI source"
    },
    cost_per_program: {
        required: "Enter cost per program"
    },
    cost_per_emp: {
        required: "Enter projected cost per employee"
    },
    faculty_name: {
        required: "Enter faculty name"
    },
    faculty_type: {
        required: "Select faculty type"
    },
    training_mode:{
         required: "Select training mode"
    },
    no_of_hrs: {
        required: "Select number of hours"
    },
    from_date: {
        required: "Enter from date"
    },
    to_date: {
        required: "Enter to date"
    },
    venue: {
        required: "Enter venue"
    },
    location: {
        required: "Enter location"
    },
    ttt: {
        required: "Select TTT"
    },
    evaluation: {
        required: "Select Evaluation"
    },
    assignemployee: {
        required: "Enter Employee id"
    },

 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    submitHandler: function (form) {
            
     
      var formdata=$("#createProgram").serialize();
      var id=$("#id").val();
    if(id!=""){
       
       //    var url="updateProgram";
    }
    else{
        
        //   var url="createprogram";
              
    }

    checkEmpValue();
  
      }
   });
 });
   
</script>
<script>
    function updateRelevents(that)
    {
        
        console.log($(that).val());
        $.post( 
                  "getCourseDetails",
                  { id: $(that).val() },
                  function(data) {
                     console.log(JSON.parse(data));
                     var list  = JSON.parse(data);
                     if(list.length>0)
                     {
                         $('.program_name option[value="'+list[0]['program_id']+'"]').attr("selected", "selected");
                         $('.program_group_name option[value="'+list[0]['program_group_id']+'"]').attr("selected", "selected");
                         $('.training_type option[value="'+list[0]['traning_type_id']+'"]').attr("selected", "selected");
                     }
                  }
               );
    }
    function checkEmpValue()
    {
         $('#empnot').text("");
      //  console.log($(that).val());
        $.post( 
                  "checkEmpValue",
                  { id: $('#assignemployee').val() },
                  function(data) { console.log(data);
                     if(data ==0)
                     {
                         return false;
                     }
                     else
                     {
                         $('#empnot').text("Employee id not avaliable :"+data);
                        return false; 
                     }
                     
                  }
               );
    }
    function getProgramDetails(that)
    {
        
        $('.program_group_name option[value=""]').attr("selected", "selected");
        $('.training_type option[value=""]').attr("selected", "selected");
        console.log($(that).val());
        $.post( 
                  "getProgramDetails",
                  { id: $(that).val() },
                  function(data) {
                     console.log(JSON.parse(data));
                     var list  = JSON.parse(data);
                     if(list.length>0)
                     {
                         //$('.program_name option[value="'+list[0]['program_id']+'"]').attr("selected", "selected");
                         $('.program_group_name option[value="'+list[0]['program_group_id']+'"]').attr("selected", "selected");
                         $('.training_type option[value="'+list[0]['training_type_id']+'"]').attr("selected", "selected");
                     }
                  }
               );
    }
</script>

<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
  
</body>

</html>
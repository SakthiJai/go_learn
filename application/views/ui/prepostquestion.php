1<div class="app-main__outer">
   <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-list icon-gradient bg-deep-blue"></i>
                    </div>
                    <div>Pre Post Test
                        <div class="page-title-subheading">Add Test Questions</div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="col-md-12">
                            <?php if(($this->uri->segment(4)=="")){?>
                                <div class="card-box">
                                    <div class="row">
                                        <?php foreach($testtile as $row) { ?>
                                        <div class="col-md-12"><center><h4 class="page-title"><?php echo $row->course_title; ?> </h4><br></center></div><br>
                                        <?php } ?>
                                    </div>
                                    <form id="questions" action="<?php echo base_url('questions/addprepostquation');?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
									
									<div class="form-group row">
										<input type="text"  name="test_id" class="form-control" value="<?php echo $id;?>" hidden>
										<div class="col-sm-12 col-md-12">
											<label for="name" class="col-form-label">Question :</label><br>
                                            <textarea required name="quations" id="info" rows="3" class="form-control"></textarea>
                                            <div id="cke_msgText"></div>
										</div>
									</div>
									<div class="form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label  for="input" class="col-form-label">Image</label>
                                            <input id="title" name="image" type="file" class="form-control">
                                        </div>
                                    </div>
									<div class="form-group row">
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 1</label>
                                            <input type="text" id="option1"  name="option1" class="form-control" required>
										</div>
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 2</label>
                                            <input type="text" id="option2" name="option2" class="form-control" required>
										</div>
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 3</label>
                                            <input type="text"  name="option3" class="form-control">
										</div>
										<div class="col-sm-6 col-md-6">
											<label for="input" class="col-form-label" >option 4</label>
                                            <input type="text"  name="option4" class="form-control">
										</div>
									</div>
									<div class="form-group row">
                                        <div class="form-group col-md-6">
											<label for="input" class="col-form-label" required>Answer</label>
                                            <!--<input type="text"  name="answer" class="form-control">-->
                                            <select name="answer" id="answer" class="form-control" required>
												<option value="">select</option>
												<option value="1">Option 1</option>
												<option value="2">Option 2</option>
												<option value="3">Option 3</option>
												<option value="4">Option 4</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
                                        <div class="col-sm-12 col-md-12">
											<center>
												<button class="btn btn-success">Submit</button>
											</center>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            <?php } ?>    
                                <div class="row">
                                        <?php foreach($testtile as $row) { ?>
                                            <div class="col-md-12"><center><h4 class="page-title">Questions</h4><br></center>
                                            <center><span class="btn-danger"> <?php echo $this->session->flashdata('msg'); ?></span></center>
                                            </div><br>
                                            
                                        <?php } ?>
                                        
                                    </div>
                                <div class="card-body  table-responsive">
                             <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                        <tr>
										    <th>S No</th>
										    <th>Question</th>
										    <th>Option 1</th>
										    <!--<th>Program Type</th>-->
										    <!--<th>Course id</th>-->
										    <th>Option 2</th>
										    <th>Option 3</th>
										    <th>Option 4</th>
										    <th>Answer</th>
										    
										    <th>Edit</th>
										    <th>Delete</th>
									    </tr>
                                        </thead>
										<tbody>
										<?php $i=1; foreach($testquation->result() as $row)  {  ?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row->quations;?></td>
											<td><?php echo $row->option1;?></td>
											<td><?php echo $row->option2;?></td>
											<td><?php echo $row->option3;?></td>
											<td><?php echo $row->option4;?></td>
											<td><?php echo $row->answer;?></td>
											
										    <td><a href="#"class="btn btn-info">Edit</a></td>
											
							                <td><a href="<?php echo base_url();?>questions/deletetestquation/<?php echo $row->id;?>/<?php echo $this->uri->segment(3);?>"class="btn btn-danger" onclick="return confirm ('Do you want to Delete this record?');">Delete </a></td>
										</tr>
									<?php $i++; } ?>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>
<style>
    .error{
    color: #bb3434;
    font-size: 12px;
}
input.error{border-color:#bb3434 !important;} 
select.error{border-color:#bb3434 !important;} 
</style>
 <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

       
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();
     CKEDITOR.replace('info');
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
$('#questions').validate({
    ignore: "input:hidden:not(input:hidden.required)",
    rules: {
        info: 
        {
            required: true,
        },
        option1: 
        {
            required: true,
        },
        option1: 
        {
            required: true,
        },                        
        answer: 
        {
            required: true,
        },
        
        
    },
messages : {
    info:{
        required: "Please Enter the Question"
    },
    option1: {
        required: "Please Enter Option 1 value"
    },
    option2: {
        required: "Please Enter Option 2 value"
    },
    answer: {
        required: "Select Answer value"
    },
    
    

 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    errorPlacement: function (error, element) {
                  if ($(element).attr('id') == 'info') {
                      $('#cke_msgText').after(error);
                  } else {
                      element.after(error);
                  }
              },
    submitHandler: function (form) {
            
     
      form.submit();
  
      }
   
 });
                           
            } );

        </script>
</body>

</html>
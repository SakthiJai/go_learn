        <div class="app-main__outer  table-responsive">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-rocket icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Courses
                        <div class="page-title-subheading">Add course image, title, program type, attach files and add text
                        </div>
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
                                        <form class=""  action="<?php echo base_url();?>superadmin/course_adding" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">
                                                        Image <br> <span style = "color:#10adf5;">(size : 500 * 300)</span>
                                                        </label>
                                                    <div class="col-md-10"><input id="title" name="image" type="file" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Title</label>
                                                    <div class="col-md-10"><input id="title" name="course_title" type="text" class="form-control" placeholder="Title" onkeypress="return NumbersOnly(this,event)">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="name" class="form-control-label col-md-2">Program Type :</label><br>
                                                    <div class="col-md-10">
                                                    <select name="training_type" class="form-control" required>
                                                    <option value="">Select program type</option>
                                                    <?php foreach($program_types->result() as $row) { ?>
                                                    <option  value="<?php echo $row->type; ?>"><?php echo $row->type; ?></option>
                                                    <?php } ?>
                                                    </select>  
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">PDF file 1</label>
                                                    <div class="col-md-10">
                                                    <input id="title" name="pdf_file" type="file" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">PDF file 2</label>
                                                    <div class="col-md-10">
                                                    <input id="title" name="pdf_file2" type="file" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">PDF file 3</label>
                                                    <div class="col-md-10">
                                                    <input id="title" name="pdf_file3" type="file" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="title" class="form-control-label col-md-2">Info</label>
                                                    <div class="col-md-12">
                                                    <textarea id="info" name="text" type="text" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    
                                                    <label for="title" class="form-control-label col-md-2">Test</label>
                                                    <div class="col-md-10">
                                                        <div class="">
                                                            <input id="name" type="radio" name="test"  value="1" >&nbsp;<label>Pre test</label>&nbsp;&nbsp;
                                                            <input id="name" type="radio" name="test"  value="2" >&nbsp;<label>Post test</label>&nbsp;&nbsp;
                                                            <input id="name" type="radio" name="test"  value="3" >&nbsp;<label>Pre and post test</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-block text-right">
                                                    <button type="submit" class="mb-2 mr-2 btn btn-success">ADD</button>
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

       
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body table-responsive">
                        
                                        <table id="datatable-buttons" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">S.No</th>
                                                    <th class="th-sm">Course Title</th>
                                                    <th class="th-sm">Training Type</th>
                                                    <th class="th-sm">image</th>
                                                    <th class="th-sm">PDF</th>
                                                    <th class="th-sm">PDF2</th>
                                                    <th class="th-sm">PDF3</th>
                                                    <th class="th-sm">Action</th>
                                                    <!--<th class="th-sm">Edit</th>
                                                    <th class="th-sm">Delete</th>-->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1; foreach($course->result() as $data) { ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $data->course_title; ?></td>
                                                    <td><?php echo $data->training_type; ?></td>
                                                    <td><?php if($data->image) { ?><img src="<?php echo base_url();?>assets/images/course/<?php echo $data->image; ?>" alt=" " width="30"><?php } ?></td>
                                                    <td><?php if($data->pdf_file) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file; ?>" target="_blank">PDF</a><?php } ?></td>
                                                    <td><?php if($data->pdf_file2) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file2; ?>" target="_blank">PDF2</a><?php } ?></td>
                                                    <td><?php if($data->pdf_file3) { ?><a href="<?php echo base_url();?>assets/pdf/<?php echo $data->pdf_file3; ?>" target="_blank">PDF3</a><?php } ?></td>
                                                    <td><a class="btn btn-success" href="<?php echo base_url();?>superadmin/test/<?php echo $data->id; ?>">Click</a></td>
                                                    <!--<td><a class="btn btn-info"><i class="pe-7s-note" aria-hidden="true"></i></a></td>
                                                    <td><a class="btn btn-danger"><i class="pe-7s-trash" aria-hidden="true"></i></a></td>-->
                                                </tr>
                                                <?php $i++; } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th class="th-sm">S.No</th>
                                                    <th class="th-sm">Course Title</th>
                                                    <th class="th-sm">Training Type</th>
                                                    <th class="th-sm">image</th>
                                                    <th class="th-sm">PDF</th>
                                                    <th class="th-sm">PDF2</th>
                                                    <th class="th-sm">PDF3</th>
                                                    <th class="th-sm">Action</th>
                                                    <!--<th class="th-sm">Edit</th>
                                                    <th class="th-sm">Delete</th>-->
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
        <!--<script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>
    <script>
function NumbersOnly(MyField, e, dec)		
	  {			
		var key;			
		var keychar;						
		if (window.event)			   
			key = window.event.keyCode;			
		else if (e)			   
			key = e.which;			
		else			   
			return true;			
		keychar = String.fromCharCode(key);						
		if ((key==null) || (key==0) || (key==8) ||	(key==9) || (key==13) || (key==27) )
			return true;						
		else if ((("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_=& ").indexOf(keychar) > -1))			   
			return true;						
		else if (dec && (keychar == "."))			   {			   MyField.form.elements[dec].focus();			   
			return false;			   }			
		else			   
			return false;		
		}
	
	</script>
</body>

</html>
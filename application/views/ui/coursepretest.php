<div class="app-main__outer">
    <div class="app-main__inner" >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-crosshairs icon-gradient bg-happy-fisher"></i>
                    </div>
                    <div>L2 - Pre Test
                        <div class="page-title-subheading">PreTest </div>
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
                                
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Course Title</th>
                                                <th>Status</th>
                                                <th>Add</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; 
                                            foreach ($pretestlist->result() as $row) {  ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                  <!--  <td><?php echo $row->title;?></td> -->
									    	    	<td><?php echo $row->course_title;?></td>
                                                   	<td><?php if($row->status != 'active') { ?>
									    		    	<button class="btn btn-primary"  onclick="statuss(<?php echo $row->id;?>,'active')"> Inactive </button>
									    			       <?php }else{ ?>
									    			    <button class="btn btn-success"  onclick="statuss(<?php echo $row->id;?>, 'inactive')"> Active </button>
									    			    <?php } ?>
									    	    	</td>
                                                    <td><a href="<?php echo base_url('questions/prequestion/'.$row->id);?>"  class="btn btn-success">Add Questions</a></td>
									    	     	<td><a href="<?php echo base_url('questions/prequestion/'.$row->id."/view");?>"  class="btn btn-success">View</a></td>
									    	        	<?php $id1 =  $row->id;?>
									    	    <!--<td><a href="<?php echo base_url('superadmin/test/'.$row->id);?>"class="btn btn-info">Edit </a></td> -->
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
 
 
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
 
 

<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
  
</body>

</html>
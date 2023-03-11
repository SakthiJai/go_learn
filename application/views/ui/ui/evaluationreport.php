<div class="app-main__outer table-responsive">
    <div class="app-main__inner " >
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-users icon-gradient bg-sunny-morning"></i>
                    </div>
                    <div>Evaluation Feedback Report
                        <div class="page-title-subheading"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form class="">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleDate" class="">  <strong> From Date :</strong></label>
                                                        <input name="fromdate" input type="date" id="exampleDate" placeholder="10/7/2010" type="Date" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="position-relative form-group">
                                                        <label for="exampleDate" class="">  <strong> End Date :</strong></label>
                                                        <input name="enddate" input type="date" id="exampleDate" placeholder="10/7/2010" type="Date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-block text-right">
                                                <button class="mb-2 mr-2 btn btn-success">submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>-->
        <div class="row ">
            <div class="col-md-12">
                <div class="main-card mb-3 card ">
                    <div class="card-body table-responsive">
                        <table id="datatable-buttons1" class="table table-bordered datatable" border="1" id="datatables">
                            <thead>
                                <tr>
                                     <th>S No</th>
                                     <th>Program name</th>
                                     <th>Program Group</th>
                                     <th>Course</th>
                                     <th>Training type</th>
                                     <?php $i = 1; 
                                            foreach ($evaluationqus as $row) { ?>
                                            <th style="text-align:center"><?php echo $row->type;?></th>
                                            <th style="text-align:center">Avg</th>
                                            
                                                
                                    <?php } ?> 
                                    <th style="text-align:center">Training Components</th>
                                    <th style="text-align:center">Avg</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $k=1;
                                $pid =null;
                                $type = null;
                                $avg =0;
                                $count= 0;
                                foreach ($evaluationdata->result() as $row) {
                                   
                                    ?>
                                    <?php  if($pid == null) {  ?>
                                    <tr>
                                        <td><?php echo $k; ?></td>
                                         <td><?php echo $row->course_title; ?></td>
                                          <td><?php echo $row->program_name; ?></td>
                                           <td><?php echo  $row->group_name;; ?></td>
                                            <td><?php echo  $row->training_type;; ?></td>
                                            <td>
                                                <?php $questions = explode(",",$row->groupquations);?>
                                                <table><tr><?php $sum =0; $index=0; foreach($questions as $val):?>
                                                <td><?php $sum = $sum +($row->answer>0?$row->answer:0); $index= $index+1;
                                                    echo  $val; ?></td>
                                                <?php endforeach; ?>
                                                
                                               </tr></table>
                                                </td>
                                                <td><?php echo(number_format($sum/$index));?></td>
                                            
                                    
                                    <?php $k=$k+1; } else if($pid != $row->pid){ ?>
                                        </tr><tr>
                                        <td><?php echo $k; ?></td>
                                         <td><?php echo $row->course_title; ?></td>
                                          <td><?php echo $row->program_name; ?></td>
                                           <td><?php echo  $row->group_name;; ?></td>
                                            <td><?php echo  $row->training_type;; ?></td>
                                           <td>
                                                <?php $questions = explode(",",$row->groupquations);?>
                                                <table><tr><?php $sum =0; $index=0; foreach($questions as $val):?>
                                                <td><?php $sum = $sum +($row->answer>0?$row->answer:0); $index= $index+1;
                                                    echo  $val; ?></td>
                                                <?php endforeach; ?>
                                                
                                               </tr></table>
                                                </td>
                                                <td><?php echo(number_format($sum/$index));?></td>
                                    
                                    <?php $k=$k+1; }  else if($pid == $row->pid){?>
                                    `
                                     <td>
                                                <?php $questions = explode(",",$row->groupquations);?>
                                                <table><tr><?php $sum =0; $index=0; foreach($questions as $val):?>
                                                <td><?php $sum = $sum +($row->answer>0?$row->answer:0); $index= $index+1;
                                                    echo  $val; ?></td>
                                                <?php endforeach; ?>
                                                
                                               </tr></table>
                                                </td>
                                                <td><?php echo(number_format($sum/$index));?></td>
                                <?php }
                                    $pid = $row->pid;
                                    
                                } ?>    
                            </tr></tbody>
                            <tfoot>
                               
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

  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/programtypes.css">   
<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/evaluationreport.js"></script>
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
</body>
</html>




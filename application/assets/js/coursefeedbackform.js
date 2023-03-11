console.log('12233443332222222222');  
  $(document).ready(function() {
                
              // $('#datatable-buttons').DataTable();
                
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
                        <?php if($fid>0) {?>
                        $('#feedbackquestions').load("<?php echo base_url();?>superadmin/feedbackevaluation_quation/"+<?php echo $fid;?>)
                        <?php } ?>
            } );

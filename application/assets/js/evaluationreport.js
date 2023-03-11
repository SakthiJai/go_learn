$(document).ready(function() {
                

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    "ajax" : "<?php echo base_url('superadmin/masterdataList'); ?>",
			     	"order": [],
			     	"aLengthMenu": [100],
			     	dom: 'Bfrtip',
                    "buttons": ['excel']
                    
                });
                

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

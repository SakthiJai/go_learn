 $(document).ready(function() {
            
                /*var table = $('#datatable-buttons').DataTable({
                    "ajax" : "<?php echo base_url('superadmin/masterdataList'); ?>",
			     	"order": [],
			     	"aLengthMenu": [100],
			     	dom: 'Bfrtip',
                    "buttons": ['excel']
                });
                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');*/
                         $('#datatable-buttons').DataTable({
                     "destroy": true,
                     "processing": false,
                    //"serverSide": true,
                        "paging": true,
                        "pageLength": 10,
                        "searching": true,
                        "bSort": false,
                        "info": true,
                        orderCellsTop: true,
                        fixedHeader: true,
                        "lengthChange": false,
                    
                        ajax: {
                            url:"<?php echo base_url('superadmin/masterdataList'); ?>",
                           // data: {fromdate:fromdate,todate:todate },
                            dataSrc: "data"
                        },
                        "columns": [
                                {
                                    "data": null, "sortable": false,
                                    render: function (data, type, row, meta) {
                                        return  meta.row + 1;
                                    }
                                },
                                { "data": "employee_id" },
                                { "data": "name" },
                                { "data": "sbu" },
                                { "data": "divisions" },
                                { "data": "grade" },
                                { "data": "function" },
                                { "data": "designation" }, 
                                { "data": "program_name" },
                                { "data": "group_name" },
                                { "data": "course_title" },
                                { "data": "training_type" },
                                { "data": "from_date" },
                                { "data": "to_date" },
                                { "data": "no_of_hrs" },
                                { "data": "no_of_hours2" },
                                { "data": "no_of_que_pre_test" },
                                { "data": "no_of_ans_pre_test" },
                                { "data": "pre_test_complete" },
                                { "data": "no_of_qus_post_test" },
                                { "data": "no_of_ans_post_test" },
                                { "data": "post_test_complete" },
                                { "data": "growth_percentage" },
                                { "data": "venue" },
                                { "data": "training_mode" },
                                { "data": "faculty_type" },
                                { "data": "fac_name" },
                                { "data": "tni_source" },
                                { "data": "nature_program" },
                                { "data": "location" },
                                { "data": "eva_complete" },
                                { "data": "cost_per_program" },
                                { "data": "program_cost" },
                        ],
                    
                });
    $('#masterForm').validate({
            rules: {
                from_date: {
                    required: true,
                },
                to_date: {
                   required: true,
                },
            },
            messages: {
               
                from_date: {
                    required: "Select Form Date"
                },
                to_date: {
                    required: "Select To Date"
                },

            },

            highlight: function(element) {
                $(element).closest('.form-control').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('error');
            },
            submitHandler: function(form) {
                var fromdate= $('#from_date').val();
                var todate  = $('#to_date').val();
                getmasterData(fromdate,todate);
            }
        });
            } );
    function getmasterData(fromdate,todate){
        $('#datatable-buttons').DataTable({
                     "destroy": true,
                     "processing": false,
                    //"serverSide": true,
                        "paging": true,
                        "pageLength": 10,
                        "searching": true,
                        "bSort": false,
                        "info": true,
                        orderCellsTop: true,
                        fixedHeader: true,
                        "lengthChange": false,
                    
                        ajax: {
                            url:"<?php echo base_url('superadmin/masterfilter'); ?>",
                            data: {fromdate:fromdate,todate:todate },
                            dataSrc: "data"
                        },
                        "columns": [
                                {
                                    "data": null, "sortable": false,
                                    render: function (data, type, row, meta) {
                                        return  meta.row + 1;
                                    }
                                },
                                { "data": "employee_id" },
                                { "data": "name" },
                                { "data": "sbu" },
                                { "data": "divisions" },
                                { "data": "grade" },
                                { "data": "function" },
                                { "data": "designation" }, 
                                { "data": "program_name" },
                                { "data": "group_name" },
                                { "data": "course_title" },
                                { "data": "training_type" },
                                { "data": "from_date" },
                                { "data": "to_date" },
                                { "data": "no_of_hrs" },
                                { "data": "no_of_hours2" },
                                { "data": "no_of_que_pre_test" },
                                { "data": "no_of_ans_pre_test" },
                                { "data": "pre_test_complete" },
                                { "data": "no_of_qus_post_test" },
                                { "data": "no_of_ans_post_test" },
                                { "data": "post_test_complete" },
                                { "data": "growth_percentage" },
                                { "data": "venue" },
                                { "data": "training_mode" },
                                { "data": "faculty_type" },
                                { "data": "fac_name" },
                                { "data": "tni_source" },
                                { "data": "nature_program" },
                                { "data": "location" },
                                { "data": "eva_complete" },
                                { "data": "cost_per_program" },
                                { "data": "program_cost" },
                        ],
                    
                });
                return false;
    }
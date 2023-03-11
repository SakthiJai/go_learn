$(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['excel']
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
 $(document).ready(function() {
        $('#addProgramType').validate({
            rules: {
                type: {
                    required: true,
                },
            },
            messages: {
                type: {
                    required: "Enter Program Type"
                },
            },

            highlight: function(element) {
                $(element).closest('.form-control').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('error');
            },
            submitHandler: function(form) {


                var formdata = $("#addProgramType").serialize();
                var id = $("#id").val();
                if (id != "") {

                    //    var url=" ";
                } else {

                    //   var url=" ";

                }
                if ($('#faculty_type').val() == 1) {
                    //checkFaculty(form);  
                } else {
                    form.submit();
                }


            }
        });
    });
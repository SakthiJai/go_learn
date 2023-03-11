$(document).ready(function() {
        $('#employee').validate({
            rules: {
				emp_type: {
                    required: true,
                },	
            },
            messages: {
				emp_type: {
                   required: "Enter Employee Type"
                },
            },

            highlight: function(element) {
                $(element).closest('.mdc-line-ripple').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.mdc-line-ripple').removeClass('error');
            },
            submitHandler: function(form) {


                var formdata = $("#employee").serialize();
              
                if (formdata != "") {
                      form.submit();
                } else {
                      form.submit();
                }
                


            }
        });
    });
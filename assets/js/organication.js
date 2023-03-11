$(document).ready(function() {
        $('#employee').validate({
            rules: {
				designation: {
                    required: true,
                },	
            },
            messages: {
				designation: {
                   required: "Enter Designation"
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
$(document).ready(function() {
        $('#employee').validate({
            rules: {
				gender: {
                    required: true,
                },	
            },
            messages: {
				gender: {
                   required: "Enter Gender"
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
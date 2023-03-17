setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);
$(document).ready(function() {
        $('#employee').validate({
            rules: {
				grade: {
                    required: true,
                },	
            },
            messages: {
				grade: {
                   required: "Enter Grade"
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

                    //    var url=" ";
                } else {
                      form.submit();
                }
                


            }
        });
    });
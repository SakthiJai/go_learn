$(document).ready(function() {
        $('#employee').validate({
            rules: {
				sbu: {
                    required: true,
                },	
            },
            messages: {
				sbu: {
                   required: "Enter SBU"
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
	$('#trw').on('shown.bs.modal', function () {
  $('#exampleModal').trigger('focus')
})
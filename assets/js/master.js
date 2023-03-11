setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

$(document).ready(function(){
		    CKEDITOR.replace('info');
		
	});
	
$(document).ready(function() {
        $('#employee').validate({
            rules: {
				emp_id: {
                    required: true,
                },
				
				sbu: {
                    required: true,
                },
				branch_plant: {
                    required: true,
                },
				grade: {
                    required: true,
                },
				emp_type: {
                    required: true,
                },
				designation: {
                    required: true,
                },
				dob: {
                    required: true,
                },
				doj: {
                    required: true,
                },
				organisation_unit: {
                    required: true,
                },
				
				
				gender: {
                    required: true,
                },
				
            },
            messages: {
                
				emp_id: {
                    required: "Enter  Employee Id"
                }, 
				gender: {
                    required: "select the genter",
                },
				
				sbu: {
                     required: "Enter Sbu"
                },
				branch_plant: {
                     required: "Enter Branch/Plant "
                },
				grade: {
                   required: "Enter Grade"
                },
				emp_type: {
                   required: "Select Employee Type"
                },
				designation: {
                   required: "Enter Designation"
                },
				
				organisation_unit: {
                     required: "Select Organisation "
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
                var id = $("#id").val();
                if (formdata != "") {

                    //    var url=" ";
                } else {
                      form.submit();
                }
                


            }
        });
    });
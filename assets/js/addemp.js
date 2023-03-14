setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

	$(document).ready(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
	
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    //$('#reportrange').daterangepicker();
	  $('#reportrange').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
	  });
                                

    cb(start, end);

});
$(document).ready(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange1').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
      });
              
    cb(start, end);
});
$(document).ready(function() {
        $('#employee').validate({
            rules: {
				emp_id: {
                    required: true,
                },
			 	firstname: {
                    required: true,
                },
				lastname: {
                    required: true,
                },
                division_id: {
                    required: true,
                },
				phone: {
                    required: true,
                },
				exampleEmail: {
                     required: true,
                },
				passwords: {
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
				
				prev_exp: {
                    required: true,
                },
				gender: {
                    required: true,
                },
				io_id: {
                    required: true,
                },
				io_name: {
                    required: true,
                },
				fro_id: {
                    required: true,
                },
				fro_name: {
                    required: true,
                },
				ro_id: {
                    required: true,
                },
				ro_name: {
                    required: true,
                },
				function: {
                    required: true,
                },  
				
            },
            messages: {
                
				emp_id: {
                    required: "Please Enter  Employee Id"
                },
			 	firstname: {
                     required: "Please Enter First Name"
                },
				lastname: {
                    required: "Please Enter Last Name"
                },
				division_id: {
                     required: "Please Enter Division"
                },
				phone: {
                     required: "Please Enter Phone Number"
                },
				exampleEmail: {
                     required: "Please Enter Email"
                },
				passwords: {
                     required: "Please Enter Password"
                },
				sbu: {
                     required: "Please Select Sbu"
                },
				branch_plant: {
                     required: "Please Select Branch/Plant "
                },
				grade: {
                   required: "Please Select Grade"
                },
				emp_type: {
                   required: "Please Select Employee Type"
                },
				designation: {
                   required: "Please Select Designation"
                },
				dob: {
                   required: "Please Select Date Of Birth"
                },
				doj: {
                   required: "Please Select Date Of Join"
                },
				organisation_unit: {
                     required: "Please Select Organisation "
                },
				prev_exp: {
                     required: "Please Enter Previous Experience"
                },
				gender: {
                     required: "Please Select Gender"
                },
				io_id: {
                     required: "Please Enter Io Id"
                },
				io_name: {
                     required: "Please Enter Io Name"
                },
				fro_id: {
                     required: "Please Enter Fro Id"
                },
				fro_name: {
                     required: "Please Enter Fro Name"
                },
				ro_id: {
                     required: "Please Enter  Ro Id"
                },
				ro_name: {
                     required: "Please Enter  Ro Name"
                },
				function: {
                     required: "Please Select Function"
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
                        form.submit();
                    //    var url=" ";
                } else {
                    
                }
            }
        });
  });
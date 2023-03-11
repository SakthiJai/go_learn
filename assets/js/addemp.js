setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

$(document).ready(function(){
		    CKEDITOR.replace('info');
		
	});
	$(document).ready(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();
	
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
$(document).ready(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange1 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange1').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

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
                    required: "Enter  Employee Id"
                },
				firstname: {
                     required: "Enter First Number"
                },
				lastname: {
                    required: "Enter Last Name"
                },
				division_id: {
                     required: "Enter Division"
                },
				phone: {
                     required: "Enter phone Number"
                },
				exampleEmail: {
                     required: "Enter Email"
                },
				passwords: {
                     required: "Enter Password"
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
				dob: {
                   required: "Enter Date Of Birth"
                },
				doj: {
                   required: "Enter Date Of Join"
                },
				organisation_unit: {
                     required: "Select Organisation "
                },
				prev_exp: {
                     required: "Enter Previous Experience"
                },
				gender: {
                     required: "Select Gender"
                },
				io_id: {
                     required: "Enter Io Id"
                },
				io_name: {
                     required: "Enter Io Name"
                },
				fro_id: {
                     required: "Enter Fro Id"
                },
				fro_name: {
                     required: "Enter Fro Name"
                },
				ro_id: {
                     required: "Enter  Ro Id"
                },
				ro_name: {
                     required: "Enter  Ro Name"
                },
				function: {
                     required: "Select Function"
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
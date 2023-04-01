setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

$(document).ready(function() {


    function cb(start, end) {
        $('#dob span').html("Select Date");
    }

    $('#dob').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
		minYear: 1901,
		maxYear: parseInt(moment().format('YYYY'),10)
      });
              
    cb(start, end);
});

$(document).ready(function() {


    function cb(start, end) {
        $('#reportrange1 span').html("Select Date");
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
                      var url="updateEmployee";
                }
            }
        });
  });
  
  function viewEmployeeDetails(id) {
    //alert($('meta[name="_token"]').attr('content'));
    window.location.href=baseUrl+"/viewEmployee/"+id;
    return true;
     $.ajax({
          url:"viewEmployee",
          type: "post",
          data:{id:id},
          dataType: "JSON",
          beforeSend: function(xhr, type) {
          if (!type.crossDomain) {
              xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
          }
      },
          success: function(data)
          {
               
              $('[name="emp_id"]').val(data.emp_id);
              $('[name="first_name"]').val(data.name);
              $('[name="email_id"]').val(data.email_id);
              $('[name="division_id"]').val(data.division);  
              $('[name="phone"]').val(data.mobile);     
              $('[name="email"]').val(data.email);     
              $('[name="passwords"]').val(data.password);      
              $('[name="sbu"]').val(data.sbu);        
              $('[name="branch_plant"]').val(data.branch_plant);
              $('[name="grade"]').val(data.grade);    
              $('[name="emp_type"]').val(data.emp_type);   
              $('[name="designation"]').val(data.designation);   
              $('[name="organisation_unit"]').val(data.organisation_unit); 
              $('[name="function"]').val(data.function); 
              $('[name="prev_exp"]').val(data.prev_exp); 
              $('[name="gender"]').val(data.gender); 
              $('[name="io_id"]').val(data.io_id); 
              $('[name="io_name"]').val(data.io_name); 
              $('[name="fro_id"]').val(data.fro_id); 
              $('[name="fro_name"]').val(data.fro_name); 
              $('[name="ro_id"]').val(data.ro_id); 
              $('[name="ro_name"]').val(data.ro_name); 
              $('[name="dob"]').val(data.dob); 
              $('[name="doj"]').val(data.doj); 
              
             
              $('#employee input').attr('disabled', true); // Disable it.
              $('#submit').hide(); 
  
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
      });
  
    
  }
 

$(document).ready(function() {
    $('#sbutable').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

     $("[data-toggle=tooltip]").tooltip();
    
} );

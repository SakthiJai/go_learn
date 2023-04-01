//document.getElementById("facultyid").addEventListener("blur", checkFaculty());\
setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);
$(document).ready(function() {
        $('#addFaculty').validate({
            rules: {
                faculty_type: {
                    required: true,
                },
                facultyid:{
                            required: {
                        depends: function(element) {
                            return ($('#faculty_type').val()==1?true:false)
                        }
                    }
                },
                facultyname: {
                    required: true,
                },
                company_name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                city: {
                    required: true,
                },
                state: {
                    required: true,
                },
                country: {
                    required: true,
                }
            },
            messages: {
                faculty_type: {
                    required: "Select faculty type"
                },
                facultyname: {
                    required: "Enter faculty name"
                },
                facultyid:{
                    required: "Enter Employee ID"
                },
                company_name: {
                    required: "Enter company name"
                },
                mobile: {
                    required: "Enter mobile number"
                },
                email: {
                    required: "Enter email"
                },
                city: {
                    required: "Enter city"
                },
                state: {
                    required: "Enter state"
                },
                country: {
                    required: "Enter country"
                }
            },

            highlight: function(element) {
                $(element).closest('.form-control').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('error');
            },
            submitHandler: function(form) {


                var formdata = $("#addFaculty").serialize();
                var id = $("#id").val();
                if (id != "") {

                    //    var url=" ";
                } else {

                    //   var url=" ";

                }
                if($('#faculty_type').val()==1){
                  checkFaculty(form);  
                }
                else
                {
                    form.submit();
                }
                

            }
        });
    });
$(document).ready(function() {
        $('#datatable').DataTable();
$('#facultyiddiv').hide();
        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['excel']
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });
 $('#faculty_type').on('change', function() {
        var select_input = this.value;
	$('#facultyid').attr('readonly', true)
        $('#facultyiddiv').hide();
         if(select_input ==1){
             $('#facultyiddiv').show();
             $('#facultyid').attr('readonly', false)
         }
         else{
             $('#facultyiddiv').hide();
         }
       });

$("#facultyid").on("keyup", function() {
        $('#empnot').text("");
          console.log($('#facultyid').val());
        $.post(
            "checkFaculty", {
                id: $('#facultyid').val()
            },
            function(data) {
                console.log(data);
                var list = JSON.parse(data);
                if (data!=500) {
                    $('#facultyname').val(list.name);
                    $('#email').val(list.email);
                    $('#mobile').val(list.mobile);
                    $('#exampleState').val(list.state);
                }else {
                    $('#empnot').text("Employee id not avaliable :" + data);
                    return false;
                }

            }
        );
})
    function checkFaculty(form) {
console.log('8ygeiqfvhbiykhjnfc');
        $('#empnot').text("");
          console.log($('#facultyid').val());
        $.post(
            "checkFaculty", {
                id: $('#facultyid').val()
            },
            function(data) {
                console.log(JSON.parse(data));
                var list = JSON.parse(data);
                if (data!=500) {
                    $('#facultyname').val(list.name);
                    $('#email').val(list.email);
                    $('#mobile').val(list.mobile);
                    $('#exampleState').val(list.state);
                }else {
                    $('#empnot').text("Employee id not avaliable :" + data);
                    return false;
                }

            }
        );
    }

    function NumbersOnly(MyField, e, dec) {
        var key;
        var keychar;
        if (window.event)
            key = window.event.keyCode;
        else if (e)
            key = e.which;
        else
            return true;
        keychar = String.fromCharCode(key);
        if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27))
            return true;
        else if ((("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_=& ").indexOf(keychar) > -1))
            return true;
        else if (dec && (keychar == ".")) {
            MyField.form.elements[dec].focus();
            return false;
        } else
            return false;
    }
		function showConfirmation(id)
	{
	  Swal.fire({
      title: 'Do you want delete this details ?',
      text: "",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: 'green',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href= 'faculty_delete/'+id;
      } else {
        console.log('clicked cancel');
      }
    })
	  
	}
    
$(document).ready(function() {
    $('#sbutable').dataTable();
    buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

     $("[data-toggle=tooltip]").tooltip();
    
} );
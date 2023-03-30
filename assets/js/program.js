setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

$(document).ready(function() {
        $('#addProgram').validate({
            rules: {
                programname: {
                    required: true,
                },
            },
            messages: {
                programname: {
                    required: "Enter Program Name"
                },
            },

            highlight: function(element) {
                $(element).closest('.form-control').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('error');
            },
            submitHandler: function(form) {


                var formdata = $("#addProgram").serialize();
                var id = $("#id").val();
                if (id != "") {

                    //    var url=" ";
                } else {

                    //   var url=" ";

                }
                if ($('#faculty_type').val() == 1) {
                    //checkFaculty(form);  
                } else {
                    form.submit();
                }


            }
        });
    });

$(document).ready(function() {
        $('#datatable').DataTable();

        //Buttons examples
        var table = $('#datatable-buttons').DataTable({
            lengthChange: false,
            buttons: ['excel']
        });

        table.buttons().container()
            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    });

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
          window.location.href= 'delete_programname/'+id;
        } else {
          console.log('clicked cancel');
        }
      })
      
    }
 
   setTimeout(function() { 
    $(".alert-success").hide();
  }, 2000);
    
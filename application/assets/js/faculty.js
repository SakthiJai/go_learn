 console.log('7523957092');
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

    function showbox(that) {
        $('#facultyid').attr('readonly', true)
        $('#facultyiddiv').hide();
        if ($(that).val() == 1) {
            $('#facultyid').removeAttr('readonly')
            $('#facultyid').val('');
            $('#facultyiddiv').show();
        }
    }

    function checkFaculty(form) {
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
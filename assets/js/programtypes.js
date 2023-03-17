setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

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
 $(document).ready(function() {
        $('#addProgramType').validate({
            rules: {
                type: {
                    required: true,
                },
            },
            messages: {
                type: {
                    required: "Enter Program Type"
                },
            },

            highlight: function(element) {
                $(element).closest('.form-control').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('error');
            },
            submitHandler: function(form) {


                var formdata = $("#addProgramType").serialize();
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
	function showConfirmation(id)
	{
		/*swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3f51b5',
        cancelButtonColor: '#ff4081',
        confirmButtonText: 'Great ',
        buttons: {
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true
          }
        }
      })*/
	  
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
        window.location.href= 'deleteProgramtypes/'+id;
      } else {
        console.log('clicked cancel');
      }
    })
	  
	}
	//function functionToExecute(){
  //window.location.href= 'sbu_master/';
 // }
 setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);
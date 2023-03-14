setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

$(document).ready(function(){
		    CKEDITOR.replace('info');
		
	});
	
$(document).ready(function() {
        $('#employee').validate({
            rules: {
				
				emp_type: {
                    required: true,
                },
			
            },
            messages: {
                
				
				emp_type: {
                   required: "Select Employee Type"
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
        window.location.href= 'delete_emp_type/'+id;
      } else {
        console.log('clicked cancel');
      }
    })
	  
	}
$(document).ready(function() {
        $('#employee').validate({
            rules: {
				branch_plant: {
                    required: true,
                },	
            },
            messages: {
				branch_plant: {
                   required: "Enter Branch"
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
        window.location.href= 'delete_branch/'+id;
      } else {
        console.log('clicked cancel');
      }
    })
	  
	}
	setTimeout(function() { 
  $(".alert-success").hide();
}, 2000);

$(document).ready(function() {
  $('#branchtable').dataTable();
  
   $("[data-toggle=tooltip]").tooltip();
  
} );
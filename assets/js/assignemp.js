console.log('23898523');
/*$('#selectAll').click(function(e){
	
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});
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
      window.location.href= 'assigned_empdelete/'+id;
    } else {
      console.log('clicked cancel');
    }
  })
    
  }
  */
setTimeout(function() { 
$(".alert-success").hide();
}, 2000);
$(document).ready(function() {
  $('#tasts').validate({
      rules: {
  sbu: {
              required: true,
          },	
      },
      messages: {
  sbu: {
   
             required: "Enter SBU"
          },
      },

      highlight: function(element) {
          $(element).closest('.mdc-line-ripple').addClass('error');
      },
      unhighlight: function(element) {
          $(element).closest('.mdc-line-ripple').removeClass('error');
      },
      submitHandler: function(form) {


          var formdata = $("#tasts").serialize();
        
          if (formdata != "") {
                form.submit();
      //window.location.href= 'sbu_master';
          } else {
                //form.submit();
          }
          


      }
  });
});
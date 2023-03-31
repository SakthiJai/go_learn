console.log('23898523');
$('#selectAll').click(function(e){
	
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
  
setTimeout(function() { 
$(".alert-success").hide();
}, 2000);

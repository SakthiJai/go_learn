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
        //  console.log($(that).val());
        $.post(
            "checkFaculty", {
                id: $('#facultyid').val()
            },
            function(data) {
                console.log(JSON.parse(data));
                var list = JSON.parse(data);
                if (data == 0) {
                    form.submit();
                } else {
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
    
    $(document).ready(function() {
    $('#datatable-buttons').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );

  function myFunction(){
 
  // $("alertBox").hide();
   //$("#demo").show();
   //$("#demo1").hide();
}
function updateEmp(pid,tid){
   // alert(pid);
    var checkedVals = $('.empcls:checkbox:checked').map(function() {
    return this.value;
}).get();
console.log(checkedVals)
    if(checkedVals.length>0)
    {
        confirm('Do you want to Update Selected Employees?');
        $.ajax({
        url : "<?php echo base_url()?>reports/empolyee",
        type: "Post",
        data:{program_id:pid,emp_id:checkedVals},
        dataType: "JSON",
        success: function(data)
        {
             console.log(data)
             if(data==200)
             {
                alert("Employees are updated successfully"); 
                window.location.reload()
             }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Issue while update..');
        }
    });
    }
    else
    {
             alert("Please select employee to update !");
    }
  
  //$("#demo1").hide();
  //$("#demo").hide();
}

function NumbersOnly(MyField, e, dec)		
	  {			
		var key;			
		var keychar;						
		if (window.event)			   
			key = window.event.keyCode;			
		else if (e)			   
			key = e.which;			
		else			   
			return true;			
		keychar = String.fromCharCode(key);						
		if ((key==null) || (key==0) || (key==8) ||	(key==9) || (key==13) || (key==27) )
			return true;						
		else if ((("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_=& ").indexOf(keychar) > -1))			   
			return true;						
		else if (dec && (keychar == "."))			   {			   MyField.form.elements[dec].focus();			   
			return false;			   }			
		else			   
			return false;		
		}
		
		function viewservice()
{
    //location.href = baseUrl+"/attendance";
    <?php $send=$_SERVER['HTTP_REFERER'];?> 
            var redirect_to="<?php echo $attendance;?>";             
            window.location = redirect_to;
}
	  
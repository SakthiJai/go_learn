 $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

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
	
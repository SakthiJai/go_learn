$(this).removeAttr('novalidate');
var baseUrl = $('#base_url').val();
var expanded = false;
//getdivision();
getBuValues();
getLocation();
$('#insert_success').hide();
$('#insert_fail').hide();
$('#update_success').hide();
$('#update_fail').hide();
$('#divisions_check').hide();
$('#employee_check').hide();

var buValues 		= [];
var locationValues 	= [];
/*function getdivision() {
        $.get(
            baseUrl+"superadmin/getdivision", {
            },
            function(data) {
                var details = JSON.parse(data);
				details.forEach(function(element) {
					$("#divisions").append('<option value='+element.id+'>'+element.divisions+'</option>');
				});
            }
        );
    }*/
$('#example-filter-placeholder').multiselect({
            enableFiltering: true,
            filterPlaceholder: 'Search for something...'
        });	
function getBuValues() {
        $.get(
            baseUrl+"superadmin/getBuValues", {
            },
            function(data) {
                var details = JSON.parse(data);
				details.forEach(function(element) {
					buValues.push(element.personal_area_text);
					//$("#butype").append('<input type="checkbox" value='+element.personal_area_text+' name="bu[]" id="bu'+element.emp_id+'" class="checkboxes">&nbsp;&nbsp;'+element.personal_area_text+'</label>');
					$("#butype").append('<option value='+element.personal_area_text+'>'+element.personal_area_text+'</option>');
				});
				
            }
        );
    }
function getLocation() {
        $.get(
            baseUrl+"superadmin/getLocation", {
            },
            function(data) {
                var details = JSON.parse(data);
				details.forEach(function(element) {
				locationValues.push(element.ps_text);
				$("#location_checkboxes").append('&nbsp;&nbsp;<label class="lables"><input type="checkbox" value='+element.ps_text+' name="location[]" id="location'+element.emp_id+'" class="checkboxes">&nbsp;&nbsp;'+element.ps_text+'</label>');
				});
            }
        );
    }	
	 $(document).ready(function() {
        $('#admin_form').validate({
            rules: {
                divisions: {
                    required: true,
                },
                emp_id: {
                    required: true,
                },
				'location[]':{
					required: true,
				},
				'bu[]':{
					required: true,
				}
            },
            messages: {
                divisions: {
                    required: "Select Divisions"
                },
                emp_id: {
                    required: "Enter The Employee Id"
                },
				'location[]': {
                    required: "Select location"
                },
				'bu[]': {
                    required: "Select Bu"
                },
            },
            highlight: function(element) {
                $(element).closest('.form-control').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-control').removeClass('error');
            },
            submitHandler: function(form) {
            var formdata 	= $("#admin_form").serialize();
            var id 			= $("#id").val();
			if(id=='')
			{
				var url	= baseUrl+"superadmin/createAdmin"
			}
			else{
				var url = baseUrl+"superadmin/updateAdmin"
			}
			$.ajax({
                type: "POST",
                url:url,
                data: formdata,
                success: function(data)
                    {
						setTimeout(function(){$('.alert').hide();},2000);
						if(data!=502){
							if(data==200){$('#insert_success').show();}
							else if(data==500){$('#insert_fail').show();}
							else if(data==201){$('#update_success').show();}
							else if(data==501){$('#update_fail').show();}
							
							setTimeout(function(){$("#addRowModal").modal('hide');},1000);
							setTimeout(function(){location.reload();},2000);
						}else{
							$('#employee_check').show();
						}
                    }
               });
			}
        });
    });
$(".editadmin").click(function() {
  $.post(
            baseUrl+"superadmin/editadmin", {
				id: $(this).attr('id')
            },
            function(data) {
				$("#showCheckboxes2").click();
            var details = JSON.parse(data);
			$('#id').val(details.id);
			$('#divisions').val(details.divisions);
			$('#emp_id').val(details.user_name);
			var bu = details.bu;
			var buArray = bu.split(",");
			buArray.forEach(function(element) {
				$('#bu'+element).prop('checked', true);
			});
			var location = details.location;
			var locationArray = location.split(",");
			locationArray.forEach(function(element) {
				$('#location'+element).prop('checked', true);
			});
			$("#checkboxes").css("display", "block");
			$("#location_checkboxes").css("display", "block");
			$("#addRowModal").modal('show');
            $('.modal-title').text('Edit Add Admin'); 
            }
        );
});
$(".adminDetails").click(function() {
	$("#addRowModal").modal('show');
	$('.modal-title').text('Add Admin');
	$('#id').val('');
	$('#divisions').val('');
	$('#emp_id').val('');
	/*$("#checkboxes").css("display", "none");
			$("#location_checkboxes").css("display", "none");
	$('.checkboxes').prop('checked', false);*/
		$('#butype').multiselect({
					enableFiltering: true,
					filterPlaceholder: 'Search for something...'
				});
});
$("#showCheckboxes").click(function() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
});
$("#showCheckboxes2").click(function() {
  var checkboxes = document.getElementById("location_checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
});
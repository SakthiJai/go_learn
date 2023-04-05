console.log('23898523');
var baseurl = $('#base_url').val();
console.log(baseurl);
/*
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
  $('#selectAll').click(function(e){
	
    var table= $(e.target).closest('table');
    $('td input:checkbox',table).prop('checked',this.checked);
});
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
   
             required: "Select SBU"
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
		  form.submit();
        
      }
  });
});


function myfunction() {
	
	
  var list = $("input[name='assign_empid[]']:checked").map(function () {
    return this.value;
}).get();
 console.log(list.join(" "));
 $.ajax({
      type: 'POST',
      url:  baseurl+"main/checkEmpValue",
      data: {id: list.join(" ")},
     
      success: function(data) {  
        if (data == 0) {
           // form.submit();
           // $('#empnot').text("Employee Assign :" + data); 
           var valid=asignemployeecheck(list);
        } else {
            if(list.join(" ")==""){
                $('#empnot').text("Employee id not avaliable :" + data);
            }else{
                $('#empnot1').text("Employee id not avaliable :" + data);
            }
            $('#divLoading').hide();
            $( ".btn-success" ).prop( "disabled", false );
            return false;
        }
      }
});
	return false;
  }
function checkEmpValue(list) {
	 
  //  $('#divLoading').hide();
  $('#divLoading').show();
 
    
	return false;
}

function asignemployeecheck(list){
    
    $.ajax({
        type: 'POST',
        url:  baseurl+"main/asignemployeecheck",
        data: {id: list.join(" "),fromdate:$('#from_date').val(),todate:$('#to_date').val()},
       
        success: function(data) {  
            if(data!=""){
                if(list.join(" ")==""){
                    $('#assign_emp_check').text("Date already allocated by this:"+data);
                }else{
                    $('#assign_emp_check1').text("Date already allocated by this:"+data);
                }
                $('#divLoading').hide();
                return false;
            }else{
             //   return true;
                form.submit();
            }
        }
  });
    
 
}

function getProgramDetails(that) {

    $('.program_group_name option[value=""]').attr("selected", "selected");
    $('.training_type option[value=""]').attr("selected", "selected");
    console.log($(that).val());
    $.post(
        baseurl+"main/getProgramDetails", {
            id: $(that).val()
        },
        function(data) {
            console.log(JSON.parse(data));
            var list = JSON.parse(data);
            if (list.length > 0) {
                //$('.program_name option[value="'+list[0]['program_id']+'"]').attr("selected", "selected");
                $('.program_group_name option[value="' + list[0]['program_group_id'] + '"]').attr("selected", "selected");
                $('.training_type option[value="' + list[0]['training_type_id'] + '"]').attr("selected", "selected");
            }
        }
    );
}


 
/*


document.getElementById("course_name").addEventListener("change", updateRelevents);
setTimeout(function(){
$('.btn-danger').hide();
},1000);
$(function(){
var dtToday = new Date();

var month = dtToday.getMonth() + 1;
var day = dtToday.getDate();
var year = dtToday.getFullYear();

if(month < 10)
    month = '0' + month.toString();
if(day < 10)
    day = '0' + day.toString();

var maxDate = year + '-' + month + '-' + day;    
$('#txtDate').attr('max', maxDate);
});


$( document ).ready(function() {
var date_input = document.getElementById('start_time');
//date_input.valueAsDate = new Date();

date_input.onchange = function(){
$('#end_time').val('');
var spiltTime= this.value.split(":");
var no_of_hours = $('#no_of_hrs').val().split('.');
let min = no_of_hours[1];
let time = parseInt(spiltTime[0])+parseInt($('#no_of_hrs').val())+":"+spiltTime[1]+":"+0+0;
var endtime= addTimes('0:'+ min, time).split(':');	
$('#end_time').val(endtime[0]+":"+endtime[1])
}
function addTimes(t0, t1) {
return secsToTime(timeToSecs(t0) + timeToSecs(t1));
}
function timeToSecs(time) {
let [h, m, s] = time.split(':');
return h*3600 + (m|0)*60 + (s|0)*1;
}
function secsToTime(seconds) {
let z = n => (n<10? '0' : '') + n; 
return (seconds / 3600 | 0) + ':' +
   z((seconds % 3600) / 60 | 0) + ':' +
    z(seconds % 60);
}
   jQuery.validator.addMethod("greaterThan", 
function(value, element, params) {

if (!/Invalid|NaN/.test(new Date(value))) {
    return new Date(value) >= new Date($(params).val());
}

return isNaN(value) && isNaN($(params).val()) 
    || (Number(value) >= Number($(params).val())); 
},'Must be greater than From Date.');;

});


$("input[name='from_date']").change(function() {
$("input[name='to_date']").val($(this).val());
})
*/


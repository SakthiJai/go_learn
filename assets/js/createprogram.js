

var baseurl = $('#base_url').val();
console.log(baseurl);


$('#divLoading').hide();
 $(document).ready(function() {
        $('#createProgram').validate({
            rules: {
                course_name: {
                    required: true,
                },
                program_name: {
                    required: true,
                },
                program_group_name: {
                    required: true,
                },
                training_type: {
                    required: true,
                },
                nature_program: {
                    required: true,
                },
                tni_source: {
                    required: true,
                },

                faculty_name: {
                    required: true,
                },
                faculty_type: {
                    required: true,
                },
                training_mode: {
                    required: true,
                },
                no_of_hrs: {
                    required: true,
                },
                from_date: {
                    required: true,
                },
                to_date: {
                   required: true,
                   greaterThan: "#from_date" 
                },
                start_time:{
                    required: true,
                },
                end_time:{
                    required: true,
                },
                venue: {
                    required: true,
                },
                location: {
                    required: true,
                },
                ttt: {
                    required: true,
                },
                evaluation: {
                    required: true,
                },
                
                cost_per_program: {
                    required: true,
                },
                
                assignemployee: {
                    required: true,
                },
            },
            messages: {
                course_name: {
                    required: "Select course name"
                },
                program_name: {
                    required: "Select program name"
                },
                program_group_name: {
                    required: "Select program group"
                },
                training_type: {
                    required: "Select training type"
                },
                nature_program: {
                    required: "Select nature of program"
                },
                tni_source: {
                    required: "Select TNI source"
                },

                faculty_name: {
                    required: "Enter Faculty Name"
                },
                faculty_type: {
                    required: "Select Faculty Type"
                },
                training_mode: {
                    required: "Select Training Mode"
                },
                no_of_hrs: {
                    required: "Select Number of Hours"
                },
                from_date: {
                    required: "Select Start Date"
                },
                to_date: {
                    required: "Select End Date"
                },
                start_time:{
                    required: "Select Start Time"
                },
                end_time:{
                    required: "Select End Time"
                },
                venue: {
                    required: "Enter Venue"
                },
                location: {
                    required: "Enter Location"
                },
                ttt: {
                    required: "Select TTT"
                },
                evaluation: {
                    required: "Select Evaluation"
                },
                cost_per_program: {
                    required: "Enter   Total Cost Per Program "
                },
                assignemployee: {
                    required: "Enter Employee id"
                },

            },

            highlight: function(element) {
                $(element).closest('.mdc-line-ripple').addClass('error');
            },
            unhighlight: function(element) {
                $(element).closest('.mdc-line-ripple').removeClass('error');
            },
            submitHandler: function(form) {
             
              
               
                var formdata = $("#createPrograms").serialize();
				console.log(formdata);
               // var id = $("#id").val();
				
                if (formdata != "") {
					 form.submit();
                } else {
            }

                //checkEmpValue(form);
                form.submit();
            }
        });
    });
 $(document).ready(function() {
             $("input[name=start_time]").clockpicker({       
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  default: 'now',
  donetext: "Select",
  init: function() { 
                            console.log("colorpicker initiated");
                        },
                        beforeShow: function() {
                            console.log("before show");
                        },
                        afterShow: function() {
                            console.log("after show");
                        },
                        beforeHide: function() {
                            console.log("before hide");
                        },
                        afterHide: function() {
                            console.log("after hide");
                        },
                        beforeHourSelect: function() {
                            console.log("before hour selected");
                        },
                        afterHourSelect: function() {
                            console.log("after hour selected");
                        },
                        beforeDone: function() {
                            console.log("before done");
                        },
                        afterDone: function() {
                            console.log("after done");
                        }
});
        $("input[name=end_time]").clockpicker({       
  placement: 'bottom',
  align: 'left',
  autoclose: true,
  default: 'now',
  donetext: "Select",
  init: function() { 
                            console.log("colorpicker initiated");
                        },
                        beforeShow: function() {
                            console.log("before show");
                        },
                        afterShow: function() {
                            console.log("after show");
                        },
                        beforeHide: function() {
                            console.log("before hide");
                        },
                        afterHide: function() {
                            console.log("after hide");
                        },
                        beforeHourSelect: function() {
                            console.log("before hour selected");
                        },
                        afterHourSelect: function() {
                            console.log("after hour selected");
                        },
                        beforeDone: function() {
                            console.log("before done");
                        },
                        afterDone: function() {
                            console.log("after done");
                        }
});
 });

$(document).ready(function(){

$('.input-daterange').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: true,
    calendarWeeks : true,
    clearBtn: true,
    disableTouchKeyboard: true
});

});
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#dp1').datepicker({

  beforeShowDay: function(date) {
    return date.valueOf() >= now.valueOf();
  },
  autoclose: true

}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.datepicker("getDate").valueOf() || !checkout.datepicker("getDate").valueOf()) {

    var newDate = new Date(ev.date);
    newDate.setDate(newDate.getDate() + 1);
    checkout.datepicker("update", newDate);

  }
  $('#dp2')[0].focus();
});


var checkout = $('#dp2').datepicker({
  beforeShowDay: function(date) {
    if (!checkin.datepicker("getDate").valueOf()) {
      return date.valueOf() >= new Date().valueOf();
    } else {
      return date.valueOf() > checkin.datepicker("getDate").valueOf();
    }
  },
  autoclose: true

}).on('changeDate', function(ev) {});

   

    function updateRelevents() {

        console.log('test');
        $.post(
           baseurl+ "main/getCourseDetails", {
                id: $('#course_name').val()
            },
            function(data) {
                console.log(JSON.parse(data));
                var list = JSON.parse(data);
                if (list.length > 0) {
                    $('.program_name option[value="' + list[0]['program_id'] + '"]').attr("selected", "selected");
                    $('.program_group_name option[value="' + list[0]['program_group_id'] + '"]').attr("selected", "selected");
                    $('.training_type option[value="' + list[0]['traning_type_id'] + '"]').attr("selected", "selected");
                }
            }
        );
    }

    function checkEmpValue(form) {
      //  $('#divLoading').hide();
      $('#divLoading').show();
        var program_id= $('#program_id').val();
        $('#empnot').text("");
        //  console.log($(that).val());
        $.post(
            baseurl+"main/checkEmpValue", {
                id: $('#assignemployee').val(),
            },
            function(data) {
                if (data == 0) {
                    var valid=asignemployeecheck(form);
                } else {
                    if(program_id==""){
                       
                        $('#empnot').text("Employee id not avaliable :" + data);
                    }else{
                        $('#empnot1').text("Employee id not avaliable :" + data);
                       
                    }
                    $('#divLoading').hide();
                    return false;
                }

            }
        );
    }
    function asignemployeecheck(form){
        var program_id= $('#program_id').val();
          $('#assign_emp_check').text("");
        $.post(
            baseurl+"main/asignemployeecheck", {
                id: $('#assignemployee').val(),fromdate:$('#from_date').val(),todate:$('#to_date').val(),program_id : program_id
            },
            function(data) {
                console.log(data);
                if(data!=""){
                    if(program_id==""){
                        $('#assign_emp_check').text("Date already allocated by this:"+data);
                    }else{
                        $('#assign_emp_check1').text("Date already allocated by this:"+data);
                    }
                    $('#divLoading').hide();
                    return false;
                }else{
                    form.submit();
                }
            }
        );
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


   function myFunction() {
  document.getElementById("createProgram").reset();
}
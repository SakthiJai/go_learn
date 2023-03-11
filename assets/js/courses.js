var baseurl = $('#base_url').val();
//CKEDITOR.replace('description');
$( "#viewQuestion" ).click(function() {
 document.getElementById("viewQuestion").addEventListener("click",editTestView);
});
console.log(baseurl);
getrandomnumber();
function getrandomnumber(){
let characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
let result = ''
let length = 20 // Customize the length here.
for (let i = length; i > 0; --i) result += characters[Math.round(Math.random() * (characters.length - 1))]
}
//document.courseadd.program_name.value="<?php echo $details[0]->program_id;?>";
//document.courseadd.program_group.value="<?php echo $details[0]->program_group_id;?>"
//document.courseadd.training_type.value="<?php echo $details[0]->traning_type_id;?>"

function pageLoad(){window.location.href='baseurl+superadmin/course';}
document.courseadd.onclick = function(){
    var radVal = document.courseadd.test.value;
}
//var editId = '<?php echo $this->uri->segment(3);?>';
var editId = $('#editId').val();
    $(document).ready(function(){
	console.log($('#test_temp_id').val());
        if($('#test_temp_id').val()==""){
        $('.viewq').hide();
        }
		   // CKEDITOR.replace('description');
		   //CKEDITOR.replace( 'textarea' )
		    //testview
		    $(".radioBtnClass").change(function() {
		                console.log($('.radioBtnClass').val());
                       // $('#exampleModal').modal('show');
                       if($('#course_title').val()=="" || $('#course_title').val().trim()=="")
                        {
                            $('#courseadd').submit();
                            return false;
                        }
                        $('#exampleModal').modal({backdrop: 'static', keyboard: false})
                    
                        $('.feedbackmodal').html("<img src='/superadmin/assets/images/dotsloader.gif'/>");
                        
                        setTimeout(function(){
                            $('.testview').show();
                            if($('#test_temp_id').val()==""){
								$('.feedbackmodal').load("/superadmin/superadmin/coursequestions/"+ $("input[name=test]:checked").val()+"/"+$('#test_temp_id').val());
								
                            }
                            else {
                                $('.feedbackmodal').load("/superadmin/superadmin/coursequestions/"+  $("input[name=test]:checked").val()+"/"+$('#test_temp_id').val());
                            }
							updateDetails()
                           // setTimeout(function(){$('#test_type').val($('.radioBtnClass').val())},2000)
                        },2000);
                        
                        
                    });
                    $(".testview").click(function() {
		                console.log($('.radioBtnClass').val());
                       // $('#exampleModal').modal('show');
                        $('#exampleModal').modal({backdrop: 'static', keyboard: false})
                    
                         $('.feedbackmodal').html("<img src='/superadmin/assets/images/dotsloader.gif'/>");
                        
                        setTimeout(function(){
                            $('.testview').show();
                            if($('#test_temp_id').val()==""){
                            $('.feedbackmodal').load("coursequestions");
                            }
                            else {
                                $('.feedbackmodal').load("/superadmin/superadmin/coursequestions/"+$('.radioBtnClass:checked').val()+"/"+$('#test_temp_id').val());

                            }
							updateDetails()
                        },2000);
                        
                       
                    });
                    
            $(".radioBtnClassR").click(function() {
		                console.log($('.radioBtnClassR').val());
                        //$('#exampleModal').modal('show');
                        if($('#course_title').val()=="" || $('#course_title').val().trim()=="")
                        {
                            $('#courseadd').submit();
                            return false;
                        }
                        else if($('#feedback_main_id').val()==""){
                              var formdata=$("#courseadd").serialize();
                                $.ajax({
                            			type: "POST",
                                        url:"https://vidhyapeeth.coromandel.biz/superadmin/superadmin/course_addevaluation",
                            			data: formdata,
                                       success: function(data)
                                       {
                                           if(data>0){
                                            $('#feedback_main_id').val(data)
                                            $('#exampleModal').modal({backdrop: 'static',keyboard: false})
                                            $('.feedbackmodal').html("<img src='https://vidhyapeeth.coromandel.biz/superadmin/assets/images/dotsloader.gif'/>");
                                            setTimeout(function(){
												$('.feedbackmodal').load("https://vidhyapeeth.coromandel.biz/superadmin/superadmin/coursefeedbackform/"+$('#feedback_main_id').val());
												$('.feedbackview').show();
												updateFeedBack();
												},2000);
                                           }
                                           else
                                           {
                                               
                                           }
                                           
                                       }
                                     });
                        }
                        else
                        {
                                $('#exampleModal').modal({backdrop: 'static',keyboard: false})
                                $('.feedbackmodal').html("<img src='https://vidhyapeeth.coromandel.biz/superadmin/assets/images/dotsloader.gif'/>");
                                setTimeout(function(){$('.feedbackmodal').load("https://vidhyapeeth.coromandel.biz/superadmin/superadmin/coursefeedbackform/"+$('#feedback_main_id').val()); $('.feedbackview').show();
								updateFeedBack();
								},2000);
                        }
                        
                    });  
    $(".feedbackview").click(function() {
					var edit_main_id= $('#edit_feedback_id').val();
					if(edit_main_id!=""){
						$id = edit_main_id;
						$('#feedback_main_id').val(edit_main_id);
					}else{
						$id = $('#feedback_main_id').val();
					}
                        if($('#course_title').val()=="" || $('#course_title').val().trim()=="")
                        {
                            $('#courseadd').submit();
                            return false;
                        }
                    $('#exampleModal').modal({ backdrop: 'static',keyboard: false})
                         $('.feedbackmodal').html("<img src='/superadmin/assets/images/dotsloader.gif'/>");
                        setTimeout(function(){$('.feedbackmodal').load("/superadmin/superadmin/coursefeedbackform/"+$id); $('.feedbackview').show();getFeedbcaklist();
		updateFeedBack();},2000);
						
                        
                    });                
		    if(editId>0){
		        $('#showCourseAdd').click();
		        $('#showCourseList').hide();
		        $('.addnewbtn').hide();
		         $('#update').show();
		          $('#add').hide();
		    }
		    else{
		    $('#showCourseAdd').hide();
		    }
		     $('#courseadd').validate({
    rules: {
        course_title: 
        {
            required: true,
        },
        program_name: 
        {
            required: true,
        },
        program_group: 
        {
            required: true,
        },
        training_type: 
        {
            required: true,
        },
        
    },
messages : {
    course_title:{
        required: "Enter course Title"
    },
    training_type: {
        required: "Select Program Type"
    },
    program_name: {
        required: "Select Program Name"
    },
    program_group: {
        required: "Select Program Group"
    },
    
 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    submitHandler: function (form) {
            
     
      var formdata=$("#createProgram").serialize();
      var id=$("#id").val();
   form.submit();
  
      }
   });
   
  
		
	});
	
	$(".nauitem77").on('click', function(event){
		$('#exampleModal').modal('hide')
	}
	);
	function dismissModal()
	{
	    $('#exampleModal').modal('hide')
	}
    
            $(document).ready(function() {
               // $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons3').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        
        
        /*
            $(document).ready(function() {
               // $('#datatable').DataTable();
                
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['excel']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );*/
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
function editTestView(){
  console.log($('.radioBtnClass:checked').val());
		                if($('.radioBtnClass:checked').val()==""){ return false;}
                        $('#exampleModal').modal({backdrop: 'static', keyboard: false})
                    
                         $('.feedbackmodal').html("<img src='/superadmin/assets/images/dotsloader.gif'/>");
                        
                        setTimeout(function(){
                            $('.testview').show();
                            if($('#test_temp_id').val()==""){
                            $('.feedbackmodal').load("/superadminsuperadmin/coursequestions");
                            }
                            else {
                                $('.feedbackmodal').load("/superadmin/superadmin/coursequestions/"+$('.radioBtnClass:checked').val()+"/"+$('#test_temp_id').val());
								
								
                            }
                            updateDetails();
                        },2000);
}
function updateDetails()
{
	setTimeout(function(){ 
		console.log($('#course_title').val(),$('#courseTitle').text($('#course_title').val()));
		
		 $('#questions').validate({
    ignore: "input:hidden:not(input:hidden.required)",
    rules: {
        info: 
        {
            required: true,
        },
        option1: 
        {
            required: true,
        },
        option1: 
        {
            required: true,
        },                        
        answer: 
        {
            required: true,
        },
        
        
    },
messages : {
    info:{
        required: "Please Enter the Question"
    },
    option1: {
        required: "Please Enter Option 1 value"
    },
    option2: {
        required: "Please Enter Option 2 value"
    },
    answer: {
        required: "Select Answer value"
    },
    
    

 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    errorPlacement: function (error, element) {
                  if ($(element).attr('id') == 'info') {
                      $('#cke_msgText').after(error);
                  } else {
                      element.after(error);
                  }
              },
    submitHandler: function (form) {
            
     
      var file_data = $('#questionImage').prop('files')[0];
                        var form_data = new FormData();
                        form_data.append('name', file_data);
                        form_data.append('quations',$('#info').val());
                          form_data.append('test_type',  $('#test_type').val());
                        form_data.append('option1', $('#option1').val());
                        form_data.append('option2', $('#option2').val());
                        form_data.append('option3', $('#option3').val());
                        form_data.append('option4', $('#option4').val());
                        form_data.append('answer', $('#answer').val());
                        form_data.append('test_id', ($('#test_id').val()==""?Math.floor((Math.random() * 1000000) + 1):$('#test_id').val()));
						//return false;
                        $.ajax({
                            url:'https://vidhyapeeth.coromandel.biz/superadmin/questions/addquation', // point to server-side controller method
                            dataType: 'text', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (response) {
                                $(form)[0].reset();
                                $('#msg').html(response); // display success response from the server
                                $('#test_temp_id').val(response);
                                 $('#test_id').val(response);
                                $('#listgrid').load('https://vidhyapeeth.coromandel.biz/superadmin/superadmin/coursequestionslist/'+response+'/'+$('#test_type').val())
                            },
                            error: function (response) {
                               // $(form)[0].reset();
                                $('#msg').html(response); // display error response from the server
                            }
                        });
  
      }
   
 });
 if($('#test_temp_id').val()!=""){
 $('#listgrid').load('https://vidhyapeeth.coromandel.biz/superadmin/superadmin/coursequestionslist/'+$('#test_temp_id').val()+'/'+$('#test_type').val())
 }
		},3000);
}
function callListGrid()
{ console.log("222");
	setTimeout(function(){
	$('#listgrid').load("/superadmin/coursequestionslist/"+$('.radioBtnClass:checked').val()+"/"+$('#test_temp_id').val())
	},3000);
}
function updateFeedBack()
{
	console.log('<>',$('#fid').val());
getCtiveLink();
	setTimeout(function(){ 
			     $('#components').validate({
    rules: {
        quations: 
        {
            required: true,
        }
    },
messages : {
    quations:{
        required: "Enter component details"
    }
 },
  
    highlight: function(element) {
        $(element).closest('.form-control').addClass('error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-control').removeClass('error');
    },
    submitHandler: function (form) {
            
     console.log("feed back form");
      var formdata=$("#components").serialize();
		//var id=$("#id").val();
		//form.submit();
		$.ajax({
                            url:'https://vidhyapeeth.coromandel.biz/superadmin/superadmin/addevaluation_quation', // point to server-side controller method
                            dataType: 'text', // what to expect back from the server
                            cache: false,
                            /*contentType: false,
                            processData: false,*/
                            data: formdata,
                            type: 'post',
                            success: function (response) { console.log(response);
                                $("#components")[0].reset();
                               
                               $('#feedbackquestions').load("https://vidhyapeeth.coromandel.biz/superadmin/superadmin/feedbackevaluation_quation/"+$('#fid').val())
                            },
                            error: function (response) {
                               // $(form)[0].reset();
                                $('#msg').html(response); // display error response from the server
                            }
                        });
  
      }
   });
	$('#feedbackquestions').load("https://vidhyapeeth.coromandel.biz/superadmin/superadmin/feedbackevaluation_quation/"+$('#fid').val())},3000)
}
$(".addnewbtn").click(function() {
$('#showCourseAdd').show();
$('#showCourseList').hide();
$('.addnewbtn').hide();
$('#courseadd')[0].reset(); 
$('#update').hide();
});		

function getFeedbcaklist(){
 setTimeout(function(){

$('#feedbackquestions').load("https://vidhyapeeth.coromandel.biz/superadmin/superadmin/feedbackevaluation_quation/"+$('#fid').val())

},2000)

}
function getCtiveLink()
{
console.log("link1");
setTimeout(function(){console.log("link");
$( ".activestatus").on('click',function(e) { console.log(e);
	if(confirm("Do you want to deactive?"))
	{
		$.ajax({
            type: "POST",
            url: baseurl+"superadmin/activeevaluation_quation",
            data: {'id':$(this).attr('id'), 'status':1},
            success: function(data) {
                if(data) {
				 getFeedbcaklist()
                    
                }
            }
        });
	}
});
$(".deactivatestatus").on('click', function(e){
	if(confirm("do you want to change the status?"))
	{
		$.ajax({
            type: "POST",
            url: baseurl+"superadmin/activeevaluation_quation",
            data: {'id':$(this).attr('id'), 'status':2},
            success: function(data) {
                if(data) {
                   getFeedbcaklist()
                }
            }
        });
	}
});
},5000)
}



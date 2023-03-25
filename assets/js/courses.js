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

function pageLoad(){window.location.href='baseurl+main/course';}
document.courseadd.onclick = function(){
  //  var radVal = document.courseadd.test.value;
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
                    
                        $('.feedbackmodal').html("<img src='/go_learn/assets/images/dotsloader.gif'/>");
                        
                        setTimeout(function(){
                            $('.testview').show();
                            if($('#test_temp_id').val()==""){
								$('.feedbackmodal').load("/go_learn/main/coursequestions/"+ $("input[name=test]:checked").val()+"/"+$('#test_temp_id').val());
								
                            }
                            else {
                                $('.feedbackmodal').load("/go_learn/main/coursequestions/"+  $("input[name=test]:checked").val()+"/"+$('#test_temp_id').val());
                            }
							updateDetails()
                           // setTimeout(function(){$('#test_type').val($('.radioBtnClass').val())},2000)
                        },2000);
                        
                        
                    });
                    $(".testview").click(function() {
		                console.log($('.radioBtnClass').val());
                       // $('#exampleModal').modal('show');
                        $('#exampleModal').modal({backdrop: 'static', keyboard: false})
                    
                         $('.feedbackmodal').html("<img src='/go_learn/assets/images/dotsloader.gif'/>");
                        
                        setTimeout(function(){
                            $('.testview').show();
                            if($('#test_temp_id').val()==""){
                            $('.feedbackmodal').load("coursequestions");
                            }
                            else {
                                $('.feedbackmodal').load("/go_learn/main/coursequestions/"+$('.radioBtnClass:checked').val()+"/"+$('#test_temp_id').val());

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
                                        url:baseUrl+"/main/course_addevaluation",
                            			data: formdata,
                                       success: function(data)
                                       {
                                           if(data>0){
                                            $('#feedback_main_id').val(data)
                                            $('#exampleModal').modal({backdrop: 'static',keyboard: false})
                                            $('.feedbackmodal').html("<img src='baseUrl+/go_learn/assets/images/dotsloader.gif'/>");
                                            setTimeout(function(){
												$('.feedbackmodal').load("baseUrl+/go_learn/main/coursefeedbackform/"+$('#feedback_main_id').val());
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
                                $('.feedbackmodal').html("<img src='baseUrl+/go_learn/assets/images/dotsloader.gif'/>");
                                setTimeout(function(){$('.feedbackmodal').load("baseUrl+/go_learn/main/coursefeedbackform/"+$('#feedback_main_id').val()); $('.feedbackview').show();
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
                         $('.feedbackmodal').html("<img src='baseUrl+/go_learn/assets/images/dotsloader.gif'/>");
                        setTimeout(function(){$('.feedbackmodal').load("baseUrl+/go_learn/main/coursefeedbackform/"+$id); $('.feedbackview').show();getFeedbcaklist();
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
	/*function dismissModal()
	{
	    $('#exampleModal').modal('hide')
	}*/
    
         /*   $(document).ready(function() {
               // $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons3').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
*/
        
        
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
                    
                         $('.feedbackmodal').html("<img src='/go_learn/assets/images/dotsloader.gif'/>");
                        
                        setTimeout(function(){
                            $('.testview').show();
                            if($('#test_temp_id').val()==""){
                            $('.feedbackmodal').load("baseUrl+/go_learn/main/coursequestions");
                            }
                            else {
                                $('.feedbackmodal').load("baseUrl+/go_learn/main/coursequestions/"+$('.radioBtnClass:checked').val()+"/"+$('#test_temp_id').val());
								
								
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
                            url:baseUrl+'/main/questions/addquation', // point to server-side controller method
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
                                $('#listgrid').load('baseUrl+/go_learn/main/coursequestionslist/'+response+'/'+$('#test_type').val())
                            },
                            error: function (response) {
                               // $(form)[0].reset();
                                $('#msg').html(response); // display error response from the server
                            }
                        });
  
      }
   
 });
 if($('#test_temp_id').val()!=""){
 $('#listgrid').load('baseUrl+/go_learn/main/coursequestionslist/'+$('#test_temp_id').val()+'/'+$('#test_type').val())
 }
		},3000);
}
function callListGrid()
{ console.log("222");
	setTimeout(function(){
	$('#listgrid').load("baseUrl+/go_learn/main/coursequestionslist/"+$('.radioBtnClass:checked').val()+"/"+$('#test_temp_id').val())
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
                            url:baseUrl+'/main/addevaluation_quation', // point to server-side controller method
                            dataType: 'text', // what to expect back from the server
                            cache: false,
                            /*contentType: false,
                            processData: false,*/
                            data: formdata,
                            type: 'post',
                            success: function (response) { console.log(response);
                                $("#components")[0].reset();
                               
                               $('#feedbackquestions').load(baseUrl+"/main/feedbackevaluation_quation/"+$('#fid').val())
                            },
                            error: function (response) {
                               // $(form)[0].reset();
                                $('#msg').html(response); // display error response from the server
                            }
                        });
  
      }
   });
	$('#feedbackquestions').load("baseUrl+/go_learn/main/feedbackevaluation_quation/"+$('#fid').val())},3000)
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

$('#feedbackquestions').load("baseUrl+/go_learn/main/feedbackevaluation_quation/"+$('#fid').val())

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
            url: baseurl+"main/activeevaluation_quation",
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
   
$(document).ready(function()
{

var settings = {
	url: "upload.php",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip",
	fileName: "myfile",
	multiple: true,
	
	dragdropWidth:800,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
//$("#mulitplefileuploader").uploadFile(settings);

});
	
$("#startbutton").click(function()
	{
		extraObj.startUpload();
		
	});
	/*
    tinymce.init({
      selector: 'textarea',
      // plugins: ["bootstrapaccordion"],

      // plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      //  toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      plugins: [
        "advlist accordion autolink lists link image charmap print code preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | accordion code",

      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      height: '500',
    });
    tinymce.PluginManager.add('accordion', function (editor) {
      editor.addButton('accordion', {
        text: 'Accordion',
        icon: false,
        onclick: function onclick() {
          editor.windowManager.open({
            title: 'Accordion Picker',
            body: {
              type: 'textbox',
              name: 'my_textbox',
              layout: 'flow',
              label: '# of accordions'
            },
            onsubmit: function onsubmit(e) {
              var accordionSet = [];
              var curAccordion = Date.now();
              var accordionCount = parseInt(e.data.my_textbox);
              for (var i = 0; i < accordionCount; i++) {
                var panel = '\n                    <div class="panel panel-default">\n                      <div class="panel-heading mceNonEditable productAccordion" role="tab" id="heading' + (curAccordion + i) + '">\n                        <h4 class="panel-title">\n                          <a role="button" data-toggle="collapse" class="mceEditable collapsed" data-parent="#accordion' + curAccordion + '" href="#collapse' + (curAccordion + i) + '" aria-expanded="true" aria-controls="collapse' + (curAccordion + i) + '">\n                            Change this header!\n                          </a>\n                        </h4>\n                      </div>\n                      <div id="collapse' + (curAccordion + i) + '" class="panel-collapse collapse mceNonEditable" role="tabpanel" aria-labelledby="heading' + (curAccordion + i) + '">\n                        <div class="panel-body mceEditable">\n                          <p>Change this content</p>\n                        </div>\n                      </div>\n                    </div>\n                ';
                accordionSet.push(panel);
              }

              var accordion = '\n                    <div class="panel-group" id="accordion' + curAccordion + '" role="tablist" aria-multiselectable="true">\n                      ' + accordionSet.join('') + '\n                  </div>';
              editor.insertContent(accordion);
            }
          });
        }
      });
    });
*/
    setTimeout(function () { getContent() }, 3000);
  /*  function addTerms() {

      var formdata = $("#terms").serialize();
      //alert($("#id").val());
      console.log(tinymce.get('description').getContent());
      var url = "addTermsandConditions";

      $.ajax({
        type: "POST",
        url: url,
        data: { data: tinymce.get('description').getContent(), type: $('#type').val() }, // serializes the form's elements.
        beforeSend: function (xhr, type) {
          if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
          }
        },
        success: function (data) {
          //console.log(data);
          if (data.result == 'Success') {
            location.reload();
          }
        }
      });
    }*/


    function getContent() {
      console.log('121S');
      $.ajax({
        url: "getTerms",
        type: "post",
        data: { _token: $('meta[name="_token"]').attr('content') },
        dataType: "JSON",
        beforeSend: function (xhr, type) {
          if (!type.crossDomain) {
            //  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
          }
        },
        success: function (data) {

          //console.log(data.content)
          //$('textarea[name="content"]').val(data.content);
          tinyMCE.activeEditor.setContent(data.data);


        },

        error: function (jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
      // body...
    }
	  var notifyOptions = {
        iconButtons: {
            className: 'fa fa-question about',
            method: function (e, modal) {
                ssi_modal.closeAll('notify');
                var btn = $(this).addClass('disabled');
                ssi_modal.dialog({
                    onClose: function () {
                        btn.removeClass('disabled')
                    },
                    onShow: function () {
                    },
                    okBtn: {className: 'btn btn-primary btn-sm'},
                    title: 'ssi-modal',
                    content: 'ssi-modal is an open source modal window plugin that only depends on jquery. It has many options and it\'s super flexible, maybe the most flexible modal out there... For more details click <a class="sss" href="http://ssbeefeater.github.io/#ssi-modal" target="_blank">here</a>',
                    sizeClass: 'small',
                    animation: true
                });
            }
        }
    };

    // option 1


    $('#ssi-upload').ssi_uploader({
        
        inForm:true
    });

    // option 2

    var uploader = $('#ssi-upload').ssi_uploader({
        
    });

 
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
                            url:baseurl+'/main/addevaluation_quation', // point to server-side controller method
                            dataType: 'text', // what to expect back from the server
                            cache: false,
                            /*contentType: false,
                            processData: false,*/
                            data: formdata,
                            type: 'post',
                            success: function (response) { console.log(response);
                                $("#components")[0].reset();
                               
                               $('#feedbackquestions').load(baseurl+"main/feedbackevaluation_quation/"+$('#fid').val())
                            },
                            error: function (response) {
                               // $(form)[0].reset();
                                $('#msg').html(response); // display error response from the server
                            }
                        });
  
      }
   });
	$('#feedbackquestions').load(baseurl+"main/feedbackevaluation_quation/"+$('#fid').val())},3000)
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

$('#feedbackquestions').load(baseurl+"main/feedbackevaluation_quation/"+$('#fid').val())

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
            url: baseurl+"main/activeevaluation_quation",
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
            url: baseurl+"main/activeevaluation_quation",
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
   
$(document).ready(function()
{

var settings = {
	url: "upload.php",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip",
	fileName: "myfile",
	multiple: true,
	
	dragdropWidth:800,
	onSuccess:function(files,data,xhr)
	{
		$("#status").html("<font color='green'>Upload is success</font>");
		
	},
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
//$("#mulitplefileuploader").uploadFile(settings);

});
	
$("#startbutton").click(function()
	{
		extraObj.startUpload();
		
	});
    tinymce.init({
      selector: 'textarea',
      // plugins: ["bootstrapaccordion"],

      // plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      //  toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      plugins: [
        "advlist accordion autolink lists link image charmap print code preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste",
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | accordion code",

      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      height: '500',
    });
    tinymce.PluginManager.add('accordion', function (editor) {
      editor.addButton('accordion', {
        text: 'Accordion',
        icon: false,
        onclick: function onclick() {
          editor.windowManager.open({
            title: 'Accordion Picker',
            body: {
              type: 'textbox',
              name: 'my_textbox',
              layout: 'flow',
              label: '# of accordions'
            },
            onsubmit: function onsubmit(e) {
              var accordionSet = [];
              var curAccordion = Date.now();
              var accordionCount = parseInt(e.data.my_textbox);
              for (var i = 0; i < accordionCount; i++) {
                var panel = '\n                    <div class="panel panel-default">\n                      <div class="panel-heading mceNonEditable productAccordion" role="tab" id="heading' + (curAccordion + i) + '">\n                        <h4 class="panel-title">\n                          <a role="button" data-toggle="collapse" class="mceEditable collapsed" data-parent="#accordion' + curAccordion + '" href="#collapse' + (curAccordion + i) + '" aria-expanded="true" aria-controls="collapse' + (curAccordion + i) + '">\n                            Change this header!\n                          </a>\n                        </h4>\n                      </div>\n                      <div id="collapse' + (curAccordion + i) + '" class="panel-collapse collapse mceNonEditable" role="tabpanel" aria-labelledby="heading' + (curAccordion + i) + '">\n                        <div class="panel-body mceEditable">\n                          <p>Change this content</p>\n                        </div>\n                      </div>\n                    </div>\n                ';
                accordionSet.push(panel);
              }

              var accordion = '\n                    <div class="panel-group" id="accordion' + curAccordion + '" role="tablist" aria-multiselectable="true">\n                      ' + accordionSet.join('') + '\n                  </div>';
              editor.insertContent(accordion);
            }
          });
        }
      });
    });

    setTimeout(function () { getContent() }, 3000);
    function addTerms() {

      var formdata = $("#terms").serialize();
      //alert($("#id").val());
      console.log(tinymce.get('description').getContent());
      var url = "addTermsandConditions";

      $.ajax({
        type: "POST",
        url: url,
        data: { data: tinymce.get('description').getContent(), type: $('#type').val() }, // serializes the form's elements.
        beforeSend: function (xhr, type) {
          if (!type.crossDomain) {
            xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
          }
        },
        success: function (data) {
          //console.log(data);
          if (data.result == 'Success') {
            location.reload();
          }
        }
      });
    }


    function getContent() {
      console.log('121S');
      $.ajax({
        url: "getTerms",
        type: "post",
        data: { _token: $('meta[name="_token"]').attr('content') },
        dataType: "JSON",
        beforeSend: function (xhr, type) {
          if (!type.crossDomain) {
            //  xhr.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
          }
        },
        success: function (data) {

          //console.log(data.content)
          //$('textarea[name="content"]').val(data.content);
          tinyMCE.activeEditor.setContent(data.data);


        },

        error: function (jqXHR, textStatus, errorThrown) {
          alert('Error get data from ajax');
        }
      });
      // body...
    }
	  var notifyOptions = {
        iconButtons: {
            className: 'fa fa-question about',
            method: function (e, modal) {
                ssi_modal.closeAll('notify');
                var btn = $(this).addClass('disabled');
                ssi_modal.dialog({
                    onClose: function () {
                        btn.removeClass('disabled')
                    },
                    onShow: function () {
                    },
                    okBtn: {className: 'btn btn-primary btn-sm'},
                    title: 'ssi-modal',
                    content: 'ssi-modal is an open source modal window plugin that only depends on jquery. It has many options and it\'s super flexible, maybe the most flexible modal out there... For more details click <a class="sss" href="http://ssbeefeater.github.io/#ssi-modal" target="_blank">here</a>',
                    sizeClass: 'small',
                    animation: true
                });
            }
        }
    };

    // option 1


    $('#ssi-upload').ssi_uploader({
        
        inForm:true
    });

    // option 2

    var uploader = $('#ssi-upload').ssi_uploader({
        
    });

    $( "#myForm" ).on( "submit", function( event ) {
        event.preventDefault();
        uploader.data('ssi_upload').uploadFiles();
        uploader.on('onUpload.ssi-uploader',function(){
            $( "#myForm" ).submit();
        });
    });
   $(function () {
      $('input[name="daterange"]').daterangepicker({
        opens: 'left'
      }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });





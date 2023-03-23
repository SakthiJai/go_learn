<!DOCTYPE html>
<html lang="en">
<?php include('header.php');?>

<body>
  <script src="<?php echo base_url(); ?>/assets/js/preloader.js"></script>

  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include('sidebar.php');?>
    <!-- partial -->
    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:partials/_navbar.html -->
      <?php include('nav.php');?>
      <!-- partial -->

      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <div class="d-flex justify-content-between">
                    <button class="mdc-button mdc-button--outlined outlined-button--secondary mdc-ripple-upgraded"
                      style="--mdc-ripple-fg-size:95px; --mdc-ripple-fg-scale:1.82773; --mdc-ripple-fg-translate-start:-36.7px, -39.1px; --mdc-ripple-fg-translate-end:32.3125px, -29.5px;">
                      Add Course
                    </button>
                  </div>
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <form id="courseadd" name="courseadd"  action="<?php echo base_url();?>courses/course_adding" method="POST" enctype="multipart/form-data">
						<input type="hidden" id="base_url" name="base_url" value="<?php echo $baseurl ?>"/>
                          <div class="mdc-layout-grid">
                            <div class="mdc-layout-grid__inner">
							
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                                <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                                  <input class="mdc-text-field__input" id="test_temp_id" name="test_temp_id" type="hidden"  value="<?php echo $this->uri->segment(3);?>">
								   <input type="hidden" name="courseid" value="<?php echo $this->uri->segment(3);?>"/>
								    <input class="mdc-text-field__input" id="course_title" name="course_title" type="text" class="form-control" placeholder="Title"
                                        value="<?php echo isset($details[0])?$details[0]->course_title:"";?>" onkeypress="return NumbersOnly(this,event)">
                                  <div class="mdc-line-ripple"></div>
                                  <label for="text-field-hero-input" class="mdc-floating-label">Tittle</label>
                                </div>
                              </div>
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Program Name: </label>
                            <select class="mdc-text-field__input training_type" name="program_name" id="program_name">
                              <option disabled selected value> </option>
<option >7 </option>
                            </select>
                          </div>
                        </div>
						  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Program Type : </label>
                            <select class="mdc-text-field__input training_type" name="training_type" id="training_type">
                              <option disabled selected value> </option>
<option >7 </option>
                            </select>
                          </div>
                        </div>
						<input type="hidden" name="id" id="id" value="<?php echo (isset($editEmployee))? $editEmployee[0]['id']:''?>">
							  
                             <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Program Group: </label>
                            <select class="mdc-text-field__input training_type" name="program_group" id="program_group">
                              <option disabled selected value> </option>
<option >7 </option>
                            </select>
                          </div>
                        </div>
						 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                           <div class="mdc-form-field"> <label for>Learning Level Evaluation:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
						   <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--secondary">
                        <input type="checkbox" id="checkbox-1" class="mdc-checkbox__native-control" >
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled" id="basic-disabled-checkbox-label" >Pre test</label>
                    </div>
					<div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--secondary">
                        <input type="checkbox" id=" basic-disabled-checkbox" class="mdc-checkbox__native-control" >
                        <div class="mdc-checkbox__background" >
                          <svg class="mdc-checkbox__checkmark" style="border-color: #ff420f;
   " viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled" id="basic-disabled-checkbox-label">Post test</label>
                    </div>
					<div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--secondary">
                        <input type="checkbox" id="basic-disabled-checkbox" class="mdc-checkbox__native-control" >
                        <div class="mdc-checkbox__background" >
                          <svg class="mdc-checkbox__checkmark"   viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path" fill="none" style="border-color: #ff420f;
    background-color: #ff420f;" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled" id="basic-disabled-checkbox-label">Pre and Post test</label>
                    </div>
                          </div>
                        </div> 
							 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
							   <div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
                            <label for> Images: </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="form-file mb-3">
                                <label class="form-file-label">
                                    <img id="blah" alt="your image"
                                        onclick="document.getElementById('title').click()"
                                      src="<?php echo base_url();?>assets/images/preview-icon_101018.png" width="200"
                                        height="200" />
                                </label>
                                <input id="title" name="image" type="file"  class="form-file-input"
                                    style="visibility:hidden" 
                                    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
						 </div>
                            
							 
							   <!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
						 <label for="" class="">Course Cover Image </label>
						 <input type="file" name="ssi-upload" multiple id="ssi-upload"/ style="width: 474px;">
						 </div>-->
							  
							  <input type="hidden" name="id" id="id" value="<?php echo (isset($editEmployee))? $editEmployee[0]['id']:''?>">
							  
                           
						
						
						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
						<div class="col-sm-4 col-lg-4 col-md-4 col-xs-12">
						  <label for>PDF files :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 <input type="file"  class="mdc-floating-label" name="ssi-upload" multiple id="ssi-upload"/ style="width: 474px;">
						 </div>
						 </div>
					
                </div>
                        
						
					
				
					
						
					
                            </div>
                          </div>
						  
						   <div class="card-body">
							 <input type="hidden" name="tid" id="tid" value="1">
							  <input type="hidden" name="type" id="type" value="terms">
							 <label  > Description:</label>
							   <textarea id="description" name="description" name="content"></textarea>
						</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
						 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>
						 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12" style="margin-left: 26%;
">
                                <button type="submit"
                                  class=" btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right;     width: 200px;">
                                  Submit

                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="<?php echo base_url('main/course'); ?>"class=" mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded"  style="--mdc-ripple-fg-size:70px; --mdc-ripple-fg-scale:1.90907; --mdc-ripple-fg-translate-start:8.11121px, -9.33333px; --mdc-ripple-fg-translate-end:24.1389px, -17px;     width: 200px;  ">
									 Cancel
									</a>
                              </div>
						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>
						
                        </form>
						
                      </div>
                    </div>
                  </div>
				  
                  
				  
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:partials/_footer.html -->
        <?php include('footer.php');?>
        <!-- partial -->
      </div>
    </div>
  </div>
  
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/daterangepicker.css" />
  
  <link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url();?>assets/css/courses.css" />
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/ckeditor.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/csweetalert2@11"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/courses.js"></script>
  <!-- Required datatable js -->
  <!-- Responsive examples  <script type="text/javascript" src="<?php echo base_url();?>assets/js/coursefeedbackform.js"></script> -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
 
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/ssi-uploader.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.7/tinymce.min.js"></script>
  

 
 

<style>
</style>
<script>
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


   // $('#ssi-upload').ssi_uploader({
        
   //     inForm:true
   // });

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



</script>
</body>

</html>
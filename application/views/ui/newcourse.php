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
                      Add Employee
                    </button>
                  </div>
                  <div class="template-demo">
                    <h5 class="card-sub-title mb-2 mb-sm-0"></h5>
                    <div class="menu-button-container">
                      <div class="mdc-card">
                        <form id="courseadd" name="courseadd"  action="<?php echo base_url();?>courses/course_adding" method="POST" enctype="multipart/form-data">
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
							   <!-- <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
						 <label for="" class="">Course Cover Image </label>
						 <input type="file" name="ssi-upload" multiple id="ssi-upload"/ style="width: 474px;">
						 </div>-->
							  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Program Type : </label>
                            <select class="mdc-text-field__input training_type" name="training_type" id="training_type">
                              <option disabled selected value> </option>

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

                            </select>
                          </div>
                        </div>
						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Program Name: </label>
                            <select class="mdc-text-field__input training_type" name="program_name" id="program_name">
                              <option disabled selected value> </option>

                            </select>
                          </div>
                        </div>
						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">PDF file: </label>
                          
                          </div>
                        </div>
						 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop">
						 <input type="file" name="ssi-upload" multiple id="ssi-upload"/ style="width: 474px;">
						 </div>
						<div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                          <div class="mdc-text-field w-100 mdc-ripple-upgraded">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Description : </label>
							 
                          </div>
                        </div>
						<div >
							
						</div>
							  
                             
							

                          
							    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>
                              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                                <button type="submit"
                                  class=" btn btn-primary mdc-button mdc-button--raised filled-button--success mdc-ripple-upgraded vertical-center"
                                  style="--mdc-ripple-fg-size:56px;     --mdc-ripple-fg-scale:1.96936; --mdc-ripple-fg-translate-start:22.9px, -19.6px; --mdc-ripple-fg-translate-end:18.8px, -10px ,float: right;     width: 200px;">
                                  Submit

                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="<?php echo base_url('main/emp'); ?>"class=" mdc-button mdc-button--raised filled-button--secondary mdc-ripple-upgraded"  style="--mdc-ripple-fg-size:70px; --mdc-ripple-fg-scale:1.90907; --mdc-ripple-fg-translate-start:8.11121px, -9.33333px; --mdc-ripple-fg-translate-end:24.1389px, -17px;     width: 200px;  ">
									 Cancel
									</a>
                              </div>
							   <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4"></div>

                            </div>
                          </div>
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
  <script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/jszip.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/pdfmake.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/vfs_fonts.js"></script>

  <script src="<?php echo base_url()?>assets/plugins/datatables/buttons.html5.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/buttons.print.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/buttons.colVis.min.js"></script>
  <!-- Responsive examples -->
  <script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url()?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/prequestion.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/coursefeedbackform.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>assets/js/ssi-uploader.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.3.7/tinymce.min.js"></script>

 

<style>
 .error {
      color: red !important;
      font-size: 12px !important;
    }

    .table-responsive {
      overflow-x: none !important;
    }

    .center {
      margin-top: 50px;
    }

    .modal-header {
      padding-bottom: 5px;
    }

    .modal-footer {
      padding: 0;
    }

    .modal-footer .btn-group button {
      height: 40px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      border: none;
      border-right: 1px solid #ddd;
    }

    .modal-footer .btn-group:last-child>button {
      border-right: 0;
    }

    #service_image-error {
      float: left;
    }
	$ban-10: -0px -0px 18px 18px;
$ban-7: -0px -18px 18px 18px;
$ban-7w: -0px -36px 18px 18px;
$Check-7: -0px -54px 18px 18px;
$Exclamation-7: -0px -72px 18px 18px;
$trash-10: -0px -90px 18px 18px;
$trash-7: -0px -108px 18px 18px;
$ban-23: -0px -126px 31px 31px;
$Check-23: -0px -157px 31px 31px;
$Exclamation23: -0px -188px 31px 31px;
@mixin sprite-width($sprite) {
  width: nth($sprite, 3);
}
@mixin sprite-height($sprite) {
  height: nth($sprite, 4);
}
@function sprite-width($sprite) {
   @return nth($sprite, 3);
}
@function sprite-height($sprite) {
   @return nth($sprite, 4);
}
@mixin sprite-position($sprite) {
  $sprite-offset-x: nth($sprite, 1);
  $sprite-offset-y: nth($sprite, 2);
  background-position: $sprite-offset-x $sprite-offset-y;
}
@mixin sprite($sprite, $display: block) {
   @include sprite-position($sprite);
  background-repeat: no-repeat;
  overflow: hidden;
  display: $display;
  @include sprite-width($sprite);
  @include sprite-height($sprite);
}

.icon {
  background-image: url('images/sprite.png');
}


.icon, span.ban7, span.ban7w, span.ban10, span.ban23, span.check7, span.check23, span.exclamation7, span.exclamation23, span.trash7, span.trash10 {
  background-image: url("images/sprite.png");
}

.icon, span.ban7, span.ban7w, span.ban10, span.ban23, span.check7, span.check23, span.exclamation7, span.exclamation23, span.trash7, span.trash10 {
  background-image: url("images/sprite.png");
}

.ssi-tooltipText {
  border: 1px #b7b7b7 solid;
  border-radius: 6px;
  padding: 7px;
  color: #fff;
  display: block;
  white-space: nowrap;
  max-width: 200px;
  overflow: hidden;
  text-overflow: ellipsis;
  background-color: #151515;
  position: absolute;
  font-size: 14px;
  font-weight: 500;
  opacity: 1;
  z-index: 30000;
}

.ssi-tooltipText.ssi-fade {
  -webkit-transition: opacity .8s;
  transition: opacity .8s;
}

.ssi-tooltipText.ssi-fadeOut {
  opacity: 0;
}

.ssi-tooltipText.ssi-fadeIn {
  opacity: 1;
}

.ssi-button {
  display: inline-block;
  text-align: center;
  vertical-align: middle;
  font-size: 12px;
  text-decoration: none;
  border: 1px solid #aeaeae;
  cursor: pointer;
  padding: 6px 6px;
  margin: 0 0 0 2px;
  border-radius: 3px;
  color: whitesmoke;
}

.ssi-button.error {
  background: #cf5144;
}

.ssi-button.error:hover {
  background: #ab4b3f;
}

.ssi-button.error:active {
  background: #8f493e;
}

.ssi-button.info {
  background: #006cbc;
}

.ssi-button.info:hover {
  background: #0054a0;
}

.ssi-button.info:active {
  background: #004d8e;
}

.ssi-button.success {
  background: #40b056;
      width: 223px;
    height: 46px;
    font-size: 20px;
}

.ssi-button.success:hover {
  background: #389e48;
}

.ssi-button.success:active {
  background: #2f963b;
}

.ssi-button[disabled] {
  opacity: 0.8;
  pointer-events: none;
}

.ssi-statusLabel {
  padding: 2px 6px;
  text-align: center;
  font-size: 10px;
  color: #fff;
  font-weight: 600;
  border-radius: 2px;
}

.ssi-statusLabel.error {
  background: #cf5144;
}

.ssi-statusLabel.success {
  background: #40b056;
}

.selected {
  opacity: 0.4;
}

.ssi-previewBox {
  float: left;
  width: 100%;
  color: #ccc;
  padding: 10px;
}

.ssi-dropZonePreview {
  min-height: 175px;
  border: 2px dashed #ccc;
  content: 'Drag n Drop Files';
}

.ssi-removeBtn {
  margin: 5px 0 5px 0;
  padding: 0;
}

#ssi-info::after {
  content: ' ';
  display: block;
  clear: both;
}

#ssi-info #ssi-DropZoneBack {
  z-index: -1;
  float: left;
  overflow: hidden;
}

#ssi-info #ssi-fileNumber {
  float: right;
}

#ssi-info #ssi-fileNumber:hover {
  cursor: pointer;
  color: #636363;
}

.ssi-uploader::after {
  content: ' ';
  display: block;
  clear: both;
}

.ssi-uploadFiles {
  position: relative;
  float: left;
  border: 1px solid #aaaaaa;
  overflow: hidden;
  border-radius: 3px;
  width: 180px;
  min-height: 32px;
  margin: 2px 2px 2px 0;
  font-size: 15px;
  vertical-align: middle;
  line-height: 30px;
  -webkit-transition: height .3s;
  transition: height .3s;
  background: #FFFFFF;
  padding-right: 1px;
}

span.ban7 {
  background-position: 0px -18px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
}

span.ban7w {
  background-position: 0px -36px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
  background-color: #cf5144;
  margin-top: 2px;
  height: 17px;
}

span.ban10 {
  background-position: 0px 0px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
}

span.ban23 {
  background-position: 0px -126px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 31px;
  height: 31px;
}

span.check7 {
  background-position: 0px -54px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
  background-color: #40b056;
  margin-top: 2px;
  height: 17px;
}

span.check23 {
  background-position: 0px -157px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 31px;
  height: 31px;
}

span.exclamation7 {
  background-position: 0px -72px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
  margin-top: 2px;
  background-color: #cf5144;
  height: 17px;
  border-radius: 3px;
}

span.exclamation23 {
  background-position: 0px -188px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 31px;
  height: 31px;
}

span.trash7 {
  background-position: 0px -108px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
}

span.trash10 {
  background-position: 0px -90px;
  background-repeat: no-repeat;
  overflow: hidden;
  display: block;
  width: 18px;
  height: 18px;
}

.ssi-previewBox.ssi-dragOver, .ssi-dragOver .ssi-dropZone {
  color: #ba2919;
  border-color: #ba2919;
}

.ssi-buttonWrapper {
  float: left;
  padding: 5px;
}

.ssi-noPreviewMessage {
  position: relative;
  z-index: 1;
  border-radius: 4px;
  margin: 1px;
  float: right;
  width: 35px;
  height: 31px;
  padding: 0;
}

.ssi-noPreviewMessage span {
  margin: 0 auto;
}

.ssi-noPreviewSubMessage {
  width: 15px;
  height: 15px;
  padding: 0;
}

.ssi-totalvalue {
  float: right;
  margin: 2px;
}

.ssi-upImgTd {
  position: relative;
}

.ssi-upImgTd .fa-spin {
  display: inline-block;
  position: absolute;
  top: 45%;
  left: 45%;
}

.ssi-uploadProgressNoPreview {
  position: absolute;
  display: block;
  text-align: center;
  width: 0;
  height: 35px;
  background: #5cb85c;
  -webkit-transition: width .3s;
  transition: width .3s;
  opacity: 0.6;
}

.ssi-uploadNoDropZone {
  border: 1px solid #ccc;
}

.ssi-uploadProgress {
  margin-top: 4px;
  display: block;
  text-align: center;
  width: 0;
  height: 10px;
  background: #5cb85c;
  -webkit-transition: width .3s;
  transition: width .3s;
}

.ssi-uploadProgressNoPre {
  position: absolute;
  height: 19px;
  margin-top: 0;
  opacity: 0.6;
}

.ssi-uploaderNP {
  position: relative;
}

.ssi-uploaderNP::after {
  content: ' ';
  display: block;
  clear: both;
}

.ssi-uploadDetails {
  width: 180px;
  max-height: 0;
  top: 37px;
  background: #FFFFFF;
  position: absolute;
  -webkit-transition: max-height .2s ease-out;
  transition: max-height .2s ease-out;
  border-radius: 3px;
  overflow: hidden;
  padding-right: 2px;
}

.ssi-uploadBoxWrapper {
  float: left;
}

.ssi-uploadBoxOpened {
  max-height: 200px;
  z-index: 2000;
  overflow: auto;
  border: 0.1mm solid #dcdcdc;
  -webkit-transition: max-height .5s ease-out;
  transition: max-height .5s ease-out;
}

table.ssi-fileList {
  font-size: 10px;
  margin: 5px;
}

table.ssi-fileList tr td:first-child {
  border: 0.1mm solid #dcdcdc;
  /*border: 0.1mm solid black;*/
  width: 89%;
  position: relative;
}

table.ssi-fileList tr td:nth-child(2) {
  padding-left: 7px;
}

table.ssi-fileList tr {
  line-height: 18px;
}

table.ssi-fileList tr.ssi-space > td {
  border: none;
  padding-bottom: 2px;
}

.ssi-uploadProgress.hide {
  margin-top: 0;
  opacity: 0;
  -webkit-transition: opacity 1.3s;
  transition: opacity 1.3s;
}

.ssi-canceledProgressBar {
  width: 100% !important;
  background: #d9534f;
}

.ssi-imgToUploadTable h2 {
  margin: 0;
}

.ssi-hidden {
  display: none;
}

.ssi-imgToUploadTable tr:first-child td:first-child {
  height: 126px;
}

.ssi-imgToUploadTable tr td {
  width: 140px;
}

.ssi-imgToUploadTable {
  border: 1px solid #e1e1e1;
  color: #000000;
  font-size: 15px;
  margin-right: 4px;
  box-shadow: 0 10px 6px -6px #777;
  padding: 5px;
  display: inline-block;
  width: 150px;
  -ms-word-break: break-all;
  word-break: break-all;
  word-break: break-word;
  -webkit-hyphens: auto;
  -ms-hyphens: auto;
      hyphens: auto;
}

.ssi-imgToUpload {
  width: 140px;
  height: 128px;
}

.ssi-btnIn {
  float: left;
}

.ssi-ieCompatibilityForm {
  display: none;
}

span.ssi-InputLabel input[type="file"] {
  display: none;
}

.ssi-abortUpload {
  padding: 0;
}

.ssi-abortUpload .ban7w {
  margin: 0;
}

.ssi-removeBtnNP {
  border: none;
  color: #ff696d;
  font-size: 11px;
  margin: 0;
  padding: 0;
}

.ssi-InputLabel.disabled, .ssi-InputLabel.disabled:hover, .ssi-InputLabel.disabled:active {
  cursor: not-allowed;
  background: #5cb85c;
  opacity: .65;
}

.ssi-check {
  color: #005900;
}

.ssi-boxHover {
  cursor: pointer;
}

.ssi-upI.imgTd {
  position: relative;
}

/*@author http://codepen.io/tevko/pen/DdsnK*/
.document-item {
  display: inline-block;
  width: 69px;
  height: 74px;
  color: black;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  background: inherit;
}

.document-item::before {
  position: absolute;
  width: 69px;
  height: 74px;
  left: 0;
  top: -7px;
  content: '';
  border: solid 2px #920035;
}

.document-item::after {
  content: attr(filetype);
  left: -4px;
  padding: 0px 2px;
  text-align: right;
  line-height: 1.3;
  position: absolute;
  background-color: #000;
  color: #fff;
  font-size: 11px;
  text-transform: uppercase;
  letter-spacing: 1px;
  top: 9px;
}

.document-item .fileCorner {
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 13px 0 0 13px;
  border-color: white transparent transparent #920035;
  position: absolute;
  top: -7px;
  left: 61px;
}
 .error {
      color: #fa4040;
      font-size: 12px;
      margin-top: 2%;
    }
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
$("#mulitplefileuploader").uploadFile(settings);

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



</script>
</body>

</html>
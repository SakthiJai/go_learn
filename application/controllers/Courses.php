<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Courses extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Super_model');
		$this->load->model('Admin_model');
		$this->load->model('Event_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('upload');
		//$this->session->keep_flashdata('msg');
        $this->load->helper('cookie');
    }
    public function index(){
        $data['program']=$this->Super_model->program();
		$data['program_types']=$this->Super_model->program_types();
		$data['program_name']=$this->Super_model->program_name();
		// print_r($data);exit;
		if(isset($id) && !empty($id)){
			$data['editprogram'] = $this->Super_model->editprogram($id);
		}
		$data['h_title'] = "Courses"; 	    
		$this->load->view('superadmin/header',$data);
		$this->load->view('superadmin/course.php',$data);
    }
    	public function course_adding(){
//print_r($_POST); exit;
	    $course = $this->input->post('course_title');
	    
	    $exitcourse = $this->Admin_model->exitcourse($course,$this->input->post('courseid'));
	    if($exitcourse == 2){
	        $this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Course title already exist. Try another title</div>');
	        redirect(base_url().'/superadmin/course','refresh');
	    } 
	    
	  $picture1 ='';
        if($_FILES['image']['name']){
         $config['upload_path'] = 'assets/images/course/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['image']['name'];
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('image')){
            $uploadData = $this->upload->data();
             $picture1 =$uploadData['file_name'];
            }
        }
       
        $picture2 ='';
        if(!empty($_FILES['pdf_file']['name'])){
        $config['upload_path'] = 'assets/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $_FILES['pdf_file']['name']; 
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('pdf_file')){
            $uploadData = $this->upload->data();
            $picture2 = $uploadData['file_name'];
            }
        }
        $picture3 ='';
        if(!empty($_FILES['pdf_file2']['name'])){
        $config['upload_path'] = '../assets/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $_FILES['pdf_file2']['name']; 
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('pdf_file2')){
            $uploadData = $this->upload->data();
            $picture3 = $uploadData['file_name'];
            }
        }
        $picture4 ='';
        if(!empty($_FILES['pdf_file3']['name'])){
        $config['upload_path'] = '../assets/pdf/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $_FILES['pdf_file3']['name']; 
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('pdf_file3')){
            $uploadData = $this->upload->data();
            $picture4 = $uploadData['file_name'];
            }
        }
        $course = $this->input->post('course_title');
        $training_type = $this->input->post('training_type');
        $test =$this->input->post('description');
        //$data['details'] = $this->Admin_model->get($id);
        $data = array(
            'image'=>$picture1,
            'course_title' => $course,
            'training_type' => $training_type,
             'program_id' => $this->input->post('program_name'),
             'training_type'=>$this->Admin_model->getprogramTypes($training_type),
              'program_group_id' =>$this->input->post('program_group'),
             'traning_type_id' =>$training_type,
            'pdf_file' => $picture2,
            'pdf_file2' => $picture3,
            'pdf_file3' => $picture4,
            'description' => $test, 
            'status' => 1, 
            'pretest_id'=>$this->input->post('test')==1?1:0,
            'posttest_id'=>$this->input->post('test')==2?1:0,
            'pre_and_post'=>$this->input->post('test')==3?1:0,
            'feedback'=>$this->input->post('reactionlevel')==4?1:0
        );
            
            if($this->input->post('courseid')==""){
                $updateUserData = $this->Admin_model->course_adding($data);
                $newCourseid= $updateUserData;
                //$this->Admin_model->evalutionUpdate(777,$this->input->post('feedback_main_id'));
                 $this->session->set_flashdata('msg','<div class="alert alert-success" style="padding: 7px; margin-top: 8px;">Course Successfully added</div>');
            }
            else
            {
               
                $updateUserData = $this->Admin_model->course_updating($data,$this->input->post('courseid'));
                 $this->session->set_flashdata('msg','<div class="alert alert-success" style="padding: 7px; margin-top: 8px;">Course Successfully Updated</div>');
                  
            }
       
            if($this->input->post('test_temp_id')>0){
                $updateUserData = $this->Admin_model->updateFeedBackCourseId($this->input->post('test_temp_id'), $updateUserData);
            }
             if($this->input->post('feedback_main_id')>0){
				 if($this->input->post('courseid')!=""){$newCourseid = $this->input->post('courseid');}
                $updateUserData = $this->Admin_model->updateFeedBackId($this->input->post('feedback_main_id'), $newCourseid);
            }
        redirect(base_url().'superadmin/course','refresh');   
	    
	    
	}
	public function editcourse($id)
	    {
	        $data['details'] = $this->Admin_model->getCourse($id);
	        $data['course']=$this->Super_model->course(); 
	        $data['program_types']=$this->Super_model->program_types();
	        $data['program_name']=$this->Super_model->program();
	        $data['program_group']=$this->Super_model->program_group1();
	       
        	
	          $data['h_title'] = "Edit Course"; 	    
		    $this->load->view('superadmin/header',$data);
		    $this->load->view('superadmin/course.php',$data);
	    }
	public function deleteCourse($id)
	{
	    $updateUserData = $this->Admin_model->deleteCourse($id);
                $this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Course Deleted Updated</div>');
        redirect(base_url().'superadmin/course','refresh'); 

	}
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Admin extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Admin_model');
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
    
    // ------------------------------- login ----------------------//

	
	public function index(){
		$this->load->view('admin/login');
	}
    public function loginn(){
	    $this->load->view('admin/login');
	}
	// ------------------------------- login ----------------------//
	public function log_in() {
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE) {	
			 redirect(base_url().'index.php/admin/loginn');
		} else {
			$data = array(
				'user_name' => $this->input->post('user_name'),
				'password' => $this->input->post('password')
			);
			if ($result['res'] = $this->Admin_model->login($data))  {
				$result = $result['res']->result();
				if ($result != 0) {
				$session_data = array(
				    'name' => $result[0]->name,
				    'user_name' => $result[0]->user_name,
				    'id' => $result[0]->id,
				);
				
			$this->session->set_userdata('admin_login', $session_data);
             redirect(base_url().'admin/dashboard');
				}else{
					$this->session->set_flashdata('signinmsg', '<div class="alert alert-danger text-center"> Your Email Id was not Activated !Please Activate Your Email</div>');
                }
			} else {
				$this->session->set_flashdata('signinmsg', '<div class="alert alert-danger text-center">Invalid Username or Password! Please try with correct details </div>');
							 redirect(base_url().'admin/loginn');
			}
		}
	}
	//------------------------------------ logout --------------------
	public function logout(){
        $sess_array = array('username' => '');
        $this->session->unset_userdata('admin_login', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        redirect(base_url().'admin');
            
    }
	public function dashboard(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $data['h_title'] = "Vidhyapeeth";
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/dashboard');
	}
	public function emp(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $data['emp']=$this->Admin_model->emp();
	    $data['h_title'] = "Vidhyapeeth";
	    $this->load->view('admin/header',$data);
	    $this->load->view('admin/emp',$data);
	}
    public function addemp(){
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['division']=$this->Admin_model->divisions1();
		$data['h_title'] = "Vidhyapeeth"; 	    
		$this->load->view('admin/header',$data);
	    $this->load->view('admin/addemp',$data);
	}
	public function addingemp(){
    	//print_r($_POST);exit();
        $division=$this->input->post('division_id');
        $sql="select * from divisions where id='".$division."'";
        $q=$this->db->query($sql);
        $division_id= $q->row();
        $divisions=$division_id->divisions;
        $emp_id = $this->input->post('emp_id');
        
		$data = array(
		'division' =>$divisions,
		'division_id' => $this->input->post('division_id'),
		'emp_id' => $this->input->post('emp_id'),
		'name' => $this->input->post('name'),
		'mobile' => $this->input->post('phone'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('password'),
		'sbu' => $this->input->post('sbu'),
		'branch_plant' => $this->input->post('branch_plant'),
		'designation' => $this->input->post('designation'),
		'grade' => $this->input->post('grade'),
		'emp_type' => $this->input->post('emp_type'),
		'dob' => $this->input->post('dob'),
		'doj' => $this->input->post('doj'),
		'organisation_unit' => $this->input->post('organisation_unit'),
		'function' => $this->input->post('function'),
		'prev_exp' => $this->input->post('prev_exp'),
		'gender' => $this->input->post('gender'),
		'io_id' => $this->input->post('io_id'),
		'io_name' => $this->input->post('io_name'),
		'fro_id' => $this->input->post('fro_id'),
		'fro_name' => $this->input->post('fro_name'),
		'ro_id' => $this->input->post('ro_id'),
		'ro_name' => $this->input->post('ro_name'),
		'blood_group' => $this->input->post('blood_group'),
		'religion' => $this->input->post('religion'),
		'birth_place' => $this->input->post('birth_place'),
		'state' => $this->input->post('state'),
		'father_name' => $this->input->post('father_name'),
		'pf_nominee1' => $this->input->post('pf_nominee1'),
		'relationship1' => $this->input->post('relationship1'),
		'pf_nominee2' => $this->input->post('pf_nominee2'),
		'relationship2' => $this->input->post('relationship2'),
		'tshirt_size' => $this->input->post('tshirt_size'),
		'food_pref' => $this->input->post('food_pref'),
		'passport_no' => $this->input->post('passport_no'),
		'passport_expiry_date' => $this->input->post('passport_expiry_date'),
		'emp_status'=> '1',
		'last_updated' => date('Y-m-d H:i:s')
		//'zone' => $this->input->post('zone')
		);
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addingemp($emp_id,$data);
        if($insertUserData){
        	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully submitted. Thank you. </div>');
        } else {     
        	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Employee ID already Exist. </div>');
        }
        redirect(base_url().'admin/addemp','refresh');            
    }
    public function employee_history(){
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['emp_history']=$this->Admin_model->emp_history();
		$data['h_title'] = "Vidhyapeeth"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/employee_history',$data);
		
	}
	public function division($id=false)
	{
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['division']=$this->Admin_model->divisions();
		if(isset($id) && !empty($id)){
			$data['editdivision'] = $this->Admin_model->editdivision($id);
		}
		$data['h_title'] = "Vidhyapeeth"; 	    
		$this->load->view('admin/header',$data);
	    $this->load->view('admin/division',$data);
	}
	public function adddivision(){
		$data = array(
	        	'divisions' => $this->input->post('division')
			    );
        $insertUserData = $this->Admin_model->adddivision($data);
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
        redirect(base_url().'admin/division','refresh');            
    }
	public function updatedivision($id){
		$data['division']=$this->Admin_model->division();
		$data['editdivision'] = $this->Admin_model->editdivision($id);	
			$inputdata = array(
				'divisions' => $this->input->post('division'),
				);
			$res=$this->Admin_model->updatedivision($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successed.</div>');
				redirect(base_url().'admindivision','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'admin/division','refresh'); 
			}
	}
	/*----------------faculty----------------------------*/
    public function faculty($id=false)
	{
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['faculty']=$this->Admin_model->faculty();
		if(isset($id) && !empty($id)){
			$data['editfaculty'] = $this->Admin_model->editfaculty($id);
		}
		$data['h_title'] = "Vidhyapeeth"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/faculty.php',$data);
	}
		public function addfaculty()
    {
    	//print_r($_POST);exit();
    
		$data = array(
		'name' => $this->input->post('name'),
		'mobile' => $this->input->post('mobile'),
        'email' => $this->input->post('email'),
        'company_name' => $this->input->post('company_name'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'country' => $this->input->post('country'),
			);
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addfaculty($data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">submit Successed.</div>');  
        redirect(base_url().'admin/faculty','refresh');            
    }

	
	public function updatefaculty($id)
	{
		$data['faculty']=$this->Admin_model->faculty();
		$data['editfaculty'] = $this->Admin_model->editfaculty($id);	

			$inputdata = array(
				'name' => $this->input->post('name'),
				'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'company_name' => $this->input->post('company_name'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
				);
				
			$res=$this->Admin_model->updatefaculty($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successed.</div>');
				redirect(base_url().'admin/faculty','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'admin/faculty','refresh'); 
			}
			
	}
	public function faculty_delete($id){
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
        $result= $this->Admin_model->faculty_delete($id);
		$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">deleted.</div>');
        redirect($_SERVER['HTTP_REFERER']);
	}
	/*----------------------program types-------------------------*/
	public function program_types($id=false){
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['program_types']=$this->Admin_model->program_types();
		if(isset($id) && !empty($id)){
			$data['editprogram_types'] = $this->Admin_model->editprogram_types($id);
		}
		$data['h_title'] = "Vidhyapeeth"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/program_types.php',$data);
	}
	
	public function addprogram_types()
    {
    	//print_r($_POST);exit();
		$data = array(
		    'type' => $this->input->post('type'),
		);
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addprogram_types($data);
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">submit Successed.</div>');
        redirect(base_url().'admin/program_types','refresh');            
    }

	
	public function updateprogram_types($id)
	{
		$data['program_types']=$this->Admin_model->program_types();
		$data['editprogram_types'] = $this->Admin_model->editprogram_types($id);	

			$inputdata = array(
				'type' => $this->input->post('type'),
				);
				
			$res=$this->Admin_model->updateprogram_types($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">updated successfully.</div>'); 
				redirect(base_url().'admin/program_types','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">update faild.</div>');
				redirect(base_url().'admin/program_types','refresh'); 
			}
			
	}
	
	public function course($id=false)
	{
		if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['course']=$this->Admin_model->course();
		$data['program_types']=$this->Admin_model->program_types();
		if(isset($id) && !empty($id)){
			$data['editcourse'] = $this->Admin_model->editcourse($id);
		}
		$data['h_title'] = "Vidhyapeeth Course List"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/course.php',$data);
	}
	
	public function course_adding(){
	    //print_r($_POST);exit();
	    $course = $this->input->post('course_title');
	    
	    /*$exitcourse = $this->Admin_model->exitcourse($course);
	    if($exitcourse == 2){
	        $this->session->set_flashdata('msg1','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Course title already exist. Try another title</div>');
	        redirect(base_url().'index.php/welcome/course_add','refresh');
	    } else { */
	    
	  $picture1 ='';
        if(!empty($_FILES['image']['name'])){
        $config['upload_path'] = 'assets/images/course/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['image']['name'];
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('image')){
            $uploadData = $this->upload->data();
            $picture1 = $uploadData['file_name'];
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
        $config['upload_path'] = 'assets/pdf/';
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
        $config['upload_path'] = 'assets/pdf/';
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
        $text =$this->input->post('text');
        $test =$this->input->post('test');
        $data = array(
            'image'=>$picture1,
            'course_title' => $course,
            'training_type' => $training_type,
            'pdf_file' => $picture2,
            'pdf_file2' => $picture3,
            'pdf_file3' => $picture4,
            'text' => $text,  
            'test' => $test,  
        );
            //print_r($data);exit(); 
            $updateUserData = $this->Admin_model->course_adding($data);
            /*if($test == 1){
                $this->Admin_model->pretestadd(); 
            } elseif($test == 2){
                $this->Admin_model->posttestadd();
            } else{
                $this->Admin_model->pretestadd();
            }*/
            $evaluationqus = $this->Admin_model->feedback_question();
            foreach($evaluationqus as $row) {
                 $quations = $row->quations;
                 $type = $row->type;
                    $data1 = array(
		                'course_id' => $updateUserData,
		                'quations' => $quations,
		                'type' => $type,
		                'status' => 1,
                    ) ;
                $this->Admin_model->feedback_questionadd($data1);
            }
        //print_r($evaluationqus);exit();
            if($updateUserData >0){
               // echo "<script>alert('Successfully submitted. Thank you. ');</script>";
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
            }else{
               // echo "<script>alert('Faild Please Try Again. ');</script>"; 
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild Please Try Again. .</div>');
            }
        
        redirect(base_url().'admin/course','refresh');   
	    //}
	}
	
	public function test($id=false){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $data['coursedata'] = $this->Admin_model->coursedata($id);
	    //print_r($data['coursedata']);exit();
	    $data['courese_name']=$this->Admin_model->courese_name($id);
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['h_title'] = "Vidhyapeeth test"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/test.php',$data);
	}
	public function pretest_questions($id=false){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['courese_name']=$this->Admin_model->courese_name($id);
		$data['questions']=$this->Admin_model->pertest_questions($id);
		$data['h_title'] = "Vidhyapeeth test";
		$this->load->view('admin/header',$data);
		$this->load->view('admin/add_pretestquestions.php',$data);
	}
	public function pretestquestions_adding($id=false){
	            $picture1 ='';
        if(!empty($_FILES['image']['name'])){
        $config['upload_path'] = '../assets/images/test/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['image']['name'];
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('image')){
            $uploadData = $this->upload->data();
            $picture1 = $uploadData['file_name'];
            }
        }
        
    	//print_r($picture1);exit();
		$course_id = $id;
		$quations=	$this->input->post('quations');
		$option1 =  $this->input->post('option1');
		$option2 =  $this->input->post('option2');
		$option3 =  $this->input->post('option3');
		$option4 =  $this->input->post('option4');
		
		$answer1  =  $this->input->post('answer');
		 if($answer1 == 1){
			$answer = $this->input->post('option1');
		 } elseif($answer1 == 2) {
			$answer = $this->input->post('option2'); 
		 } elseif($answer1 == 3) {
			$answer = $this->input->post('option3'); 
		 } elseif($answer1 == 4) {
			$answer = $this->input->post('option4'); 
		 }
		 
		$data = array(
		'course_id' => $course_id,
		'test_type' => 1,
		'question'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4,
		'answer'  => $answer,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
			);
		if(!empty($picture1)){
				$data['image']=$picture1;
		}
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->pretestquestions_adding($data);
        redirect(base_url('admin/pretest_questions/'.$id),'refresh');
	}
	public function posttest_questions($id=false){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['courese_name']=$this->Admin_model->courese_name($id);
		$data['questions']=$this->Admin_model->posttest_questions($id);
		$data['h_title'] = "Vidhyapeeth test";
		$this->load->view('admin/header',$data);
		$this->load->view('admin/add_posttestquestions.php',$data);
	}
	public function posttestquestions_adding($id=false){
	            $picture1 ='';
        if(!empty($_FILES['image']['name'])){
        $config['upload_path'] = '../assets/images/test/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['image']['name'];
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('image')){
            $uploadData = $this->upload->data();
            $picture1 = $uploadData['file_name'];
            }
        }
        
    	//print_r($picture1);exit();
		$course_id = $id;
		$quations=	$this->input->post('quations');
		$option1 =  $this->input->post('option1');
		$option2 =  $this->input->post('option2');
		$option3 =  $this->input->post('option3');
		$option4 =  $this->input->post('option4');
		
		$answer1  =  $this->input->post('answer');
		 if($answer1 == 1){
			$answer = $this->input->post('option1');
		 } elseif($answer1 == 2) {
			$answer = $this->input->post('option2'); 
		 } elseif($answer1 == 3) {
			$answer = $this->input->post('option3'); 
		 } elseif($answer1 == 4) {
			$answer = $this->input->post('option4'); 
		 }
		 
		$data = array(
		'course_id' => $course_id,
		'test_type' => 2,
		'question'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4,
		'answer'  => $answer,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
			);
		if(!empty($picture1)){
				$data['image']=$picture1;
		}
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->posttestquestions_adding($data);
        redirect(base_url('admin/posttest_questions/'.$id),'refresh');
	}
	public function test_questions($id=false){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['courese_name']=$this->Admin_model->courese_name($id);
		$data['pre_questions']=$this->Admin_model->pertest_questions($id);
		$data['post_questions']=$this->Admin_model->posttest_questions($id);
		$data['h_title'] = "Vidhyapeeth test";
		$this->load->view('admin/header',$data);
		$this->load->view('admin/add_testquestions.php',$data);
	}
	public function testquestions_adding($id=false){
	            $picture1 ='';
        if(!empty($_FILES['image']['name'])){
        $config['upload_path'] = '../assets/images/test/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES['image']['name'];
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);   
        if($this->upload->do_upload('image')){
            $uploadData = $this->upload->data();
            $picture1 = $uploadData['file_name'];
            }
        }
        
    	//print_r($picture1);exit();
		$course_id = $id;
		$quations=	$this->input->post('quations');
		$option1 =  $this->input->post('option1');
		$option2 =  $this->input->post('option2');
		$option3 =  $this->input->post('option3');
		$option4 =  $this->input->post('option4');
		
		$answer1  =  $this->input->post('answer');
		 if($answer1 == 1){
			$answer = $this->input->post('option1');
		 } elseif($answer1 == 2) {
			$answer = $this->input->post('option2'); 
		 } elseif($answer1 == 3) {
			$answer = $this->input->post('option3'); 
		 } elseif($answer1 == 4) {
			$answer = $this->input->post('option4'); 
		 }
		 
		$data = array(
		'course_id' => $course_id,
		'test_type' => 1,
		'question'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4,
		'answer'  => $answer,
		'created_at' => date('Y-m-d H:i:s'),
		'updated_at' => date('Y-m-d H:i:s')
			);
		if(!empty($picture1)){
				$data['image']=$picture1;
		}
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->pretestquestions_adding($data);
        $insertUserData = $this->Admin_model->posttestquestions_adding($data);
        redirect(base_url('admin/test_questions/'.$id),'refresh');
	}
	public function feedback_questions($id){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $data['feedback_questions'] = $this->Admin_model->feedback_questions($id);
		$data['h_title'] = "Vidhyapeeth Feedback"; 	    
		$data['c_id'] = $id; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/feedback_questions.php',$data);	    
	}
	public function addfeedback_quation()
    {
        if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
    	//print_r($_POST);exit();
		$course_id = $this->input->post('course_id');
		$quations=	$this->input->post('quations');
		$type=	$this->input->post('type');
		$status = 1;
		$data = array(
		    'course_id' => $course_id,
		    'quations'=> $quations,  
		    'type'=> $type,  
		    'status'=> $status,  
		);
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addfeedback_quation($data);
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function delete_feedback_quations($id)
    {
        $result= $this->Admin_model->delete_feedback_quations($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function activefeedback_quation($id){
	 	$res = $this->Admin_model->activefeedback_quation($id);
	 	redirect($_SERVER['HTTP_REFERER']);
	}
	public function inactivefeedback_quation($id){
	 	$res = $this->Admin_model->inactivefeedback_quation($id);
	 	redirect($_SERVER['HTTP_REFERER']);
	}
	
	
	
	
	
	
	
	
	
	
	
	public function createprogram(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['division']=$this->Admin_model->divisions1();
		$data['faculty']=$this->Admin_model->faculty1();
		$data['course']=$this->Admin_model->course1();
		$data['h_title'] = "Vidhyapeeth create program"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/createprogram.php',$data);
	}
	public function creatingprogram(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    //print_r($_POST);exit();
        $ownername = $this->session->userdata['admin_login']['name'];
        $ownerid = $this->session->userdata['admin_login']['user_name'];
	    $data = array(
	        'owner_name'=>$ownername,
	        'owner_id'=>$ownerid,
	    	'division_id' => $this->input->post('division_id'),
	    	'program_name' => $this->input->post('program_name'),
	    	'from_date' => $this->input->post('from_date'),
	    	'to_date' => $this->input->post('to_date'),
	    	'venue' => $this->input->post('venue'),
	    	'location' => $this->input->post('location'),
	    	'nature_program' => $this->input->post('nature_program'),
	    	'tni_source' => $this->input->post('tni_source'),
	    	'cost_emp' => $this->input->post('cost_emp'),
	    	'ttt' => $this->input->post('ttt'),
	    	'ttt_id' => $this->input->post('ttt_id'),
	    	'created_at'=>date('Y-m-d h:i:s'),
	    );

        $insertid = $this->Admin_model->creatingprogram($data);
        
        if($insertid!=''){
            $faculty_id = $this->input->post("faculty_id");
            $faculty_type = $this->input->post("faculty_type");
            $cfrom_date = $this->input->post("cfrom_date");
            $cto_date =   $this->input->post("cto_date");
            $course_id =    $this->input->post("course_id");
            $training_type = $this->input->post("training_type");
            $man_days = $this->input->post("man_days");
            $data1 = array(
                'owner_name' => $ownername,
                'onwer_id' => $ownerid,
                'program_id' => $insertid,
                'faculty_id' => $faculty_id,
                'faculty_type' => $faculty_type,
                'from_date' =>    $cfrom_date,
                'to_date' =>      $cto_date,
                'course_id' =>    $course_id,
                'training_type' =>   $training_type,
                'man_days' =>    $man_days,
                'created_at' =>date('Y-m-d h:i:s')
            );
            $insertid = $this->Admin_model->creatingevent($data1);
        }
        if($insertid>0){
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
            redirect(base_url().'admin/createprogram','refresh'); 
        }
        else{
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild please try again</div>');
            redirect(base_url().'admin/createprogram','refresh'); 
        }
    }
	public function programs(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		$data['programs']=$this->Admin_model->programs();
		$data['h_title'] = "Vidhyapeeth programs"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/programs.php',$data);
	}
	public function assign_emp($id=false, $division_id=false){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    //$data['sbu'] = $this->Admin_model->selectsbu($division_id);
        //print_r($data['sbu']);exit;
        if(isset($_POST) && !empty($_POST)){
        $emp_ids=$this->input->post('emp_ids');
        $emp_ids1=trim($emp_ids);
        $emp_ids2= str_replace(" ",",","$emp_ids1");
        $emp_ids3= str_replace(",,",",","$emp_ids2");
            if(isset($emp_ids) && !empty($emp_ids)){
                $data['emp_list'] = $this->Admin_model->selectemp_ids($division_id,$emp_ids3);
            }
        }
        $data['program_id']=$id;
        $data['division_id']=$division_id;
        $data['assigned_emp']  = $this->Admin_model->assigned_emp($id);
        //$data['program_name']  = $this->Admin_model->program_name($id);
		//$data['division']=$this->Admin_model->divisions1();
		$data['h_title'] = "Vidhyapeeth"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/assign_emp.php',$data);
	}
	public function store_assign_emp(){
	    
        if($this->input->post('assign_empid')){
            $emp_id=$this->input->post('assign_empid');
        }
        if($this->input->post('program_id')){
            $program_id=$this->input->post('program_id');
        }
        if($this->input->post('division_id')){
            $division_id=$this->input->post('division_id');
        }
         //$checkttt = $this->Admin_model->checkttt($program_id);
         
        foreach($emp_id as $empid){
            $divisionaa = $this->db->query("select division_id,sbu from emp where emp.emp_id=$empid")->row();
            $division_id = $divisionaa->division_id;
            //$sbu = $divisionaa->sbu;
            //print_r($division_id);exit();
            $data=array(
                'program_id'=>$program_id,
                'division_id'=>$division_id,
                'employee_id'=>$empid,
            );
            $rs= $this->Admin_model->addassignemp($data);
            /*if($checkttt == 1){
                $insertfaculty = $this->Admin_model->insertfaculty($empid,$program_id);
            } */
        }
    
        if($rs==1){
            redirect(base_url().'admin/assign_emp/'.$program_id.'/'.$division_id,'refresh'); 
        }else{
            redirect(base_url().'admin/assign_emp/'.$program_id.'/'.$division_id,'refresh'); 
        }
	}
	public function assigned_empdelete($id){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $rs=$this->Admin_model->assigned_empdelete($id);
	    if($rs==1){
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully Deleted</div>');
            redirect($_SERVER['HTTP_REFERER']); 
        }else{
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Not Deleted Please Try Again. .</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
	public function add_course($id){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $data['p_course']=$this->Admin_model->p_course($id);
	    //print_r($data['course']->result());exit();
		$data['division']=$this->Admin_model->divisions1();
		$data['faculty']=$this->Admin_model->faculty1();
		$data['course']=$this->Admin_model->course1();
		$data['pid'] = $id; 	    
		$data['h_title'] = "Vidhyapeeth create program"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/add_course.php',$data);
	}
	public function adding_course(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
	    $ownername = $this->session->userdata['admin_login']['name'];
        $ownerid = $this->session->userdata['admin_login']['user_name'];
	    
            $pid = $this->input->post("pid");
            $faculty_id = $this->input->post("faculty_id");
            $faculty_type = $this->input->post("faculty_type");
            $cfrom_date = $this->input->post("cfrom_date");
            $cto_date =   $this->input->post("cto_date");
            $course_id =    $this->input->post("course_id");
            $training_type = $this->input->post("training_type");
            $man_days = $this->input->post("man_days");
            $data1 = array(
                'owner_name' => $ownername,
                'onwer_id' => $ownerid,
                'program_id' => $pid,
                'faculty_id' => $faculty_id,
                'faculty_type' => $faculty_type,
                'from_date' =>    $cfrom_date,
                'to_date' =>      $cto_date,
                'course_id' =>    $course_id,
                'training_type' =>   $training_type,
                'man_days' =>    $man_days,
                'created_at' =>date('Y-m-d h:i:s')
            );
            $insertid = $this->Admin_model->creatingevent($data1);
        
        if($insertid>0){
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
            redirect(base_url().'admin/add_course/'.$pid,'refresh'); 
        }
        else{
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild please try again</div>');
            redirect(base_url().'admin/add_course/'.$pid,'refresh'); 
        }
	}
	public function sbureport(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		//$data['programs']=$this->Admin_model->programs();
		$data['h_title'] = "Vidhyapeeth sbu report"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sbu_report.php',$data);
	}
	public function divisionreport(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		//$data['programs']=$this->Admin_model->programs();
		$data['h_title'] = "Vidhyapeeth division report"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/division_report.php');
	}
	public function masterdatareport(){
	    if($this->session->userdata('admin_login')==NULL) redirect(base_url().'admin');
		//$data['programs']=$this->Admin_model->programs();
		$data['h_title'] = "Vidhyapeeth masterdata report"; 	    
		$this->load->view('admin/header',$data);
		$this->load->view('admin/masterdata_report.php');
	}
	
}
?>
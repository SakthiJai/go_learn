<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Main extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Super_model');
		$this->load->model('Admin_model');
		$this->load->model('Master_model');
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
    
    // ------------------------------- login ----------------------//

	
	public function index(){
		$this->load->view('ui/login');
	}
    public function loginn(){
	    $this->load->view('ui/login');
	}
	// ------------------------------- login ----------------------//
	public function log_in() {
		$this->form_validation->set_rules('user_name', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');
		if ($this->form_validation->run() == FALSE) {	
			// redirect(base_url().'index.php/main/loginn');
			redirect(base_url().'main/loginn');
		} else {
			$data = array(
				'user_name' => $this->input->post('user_name'),
				'password' => $this->input->post('password')
			);
			if ($result['res'] = $this->Super_model->login($data))  {
				$result = $result['res']->result();
				if ($result != 0) {
				$session_data = array(
				    'name' => $result[0]->name,
				    'user_name' => $result[0]->user_name,
				    'id' => $result[0]->id,
				);
				
			$this->session->set_userdata('superadmin_login', $session_data);
             redirect(base_url().'main/dashboard');
				}else{
					$this->session->set_flashdata('signinmsg', '<div class="alert alert-danger text-center"> Your Email Id was not Activated !Please Activate Your Email</div>');
                }
			} 
			else {
				$this->session->set_flashdata('signinmsg', '<div class="alert alert-danger text-center">Invalid Username or Password! Please try with correct details </div>');
							 redirect(base_url().'main/loginn');
			}
		}
	}
	//------------------------------------ logout --------------------
	public function logout(){
        $sess_array = array('username' => '');
        $this->session->unset_userdata('superadmin_login', $sess_array);
        $data['message_display'] = 'Successfully Logout';
		$this->load->view('ui/login');
       // redirect(base_url().'main/logout');
            
    }
	public function dashboard(){
	    ////if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['h_title'] = "Go Learn Dashboard";
	   
	    $this->load->view('ui/dashboard',$data);
	}
	public function emp(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['emp']=$this->Super_model->emp();
	    $data['h_title'] = "Go Learn ";
	    $this->load->view('ui/emp',$data);
	}
    public function addemp(){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		//$employeeId = $this->request->getGet('empid');
		$data['division']=$this->Super_model->divisions1();
		$data['grade']=$this->Super_model->grade();
		$data['sbu']=$this->Super_model->sbu();
		$data['branch']=$this->Super_model->branch();
		$data['employee_type']=$this->Super_model->employee_type();
		$data['designation']=$this->Super_model->designation();
		$data['organization']=$this->Super_model->organization();
		$data['function_master']=$this->Super_model->function_master();
		$data['gender']=$this->Super_model->gender();
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addemp',$data);
	}
	 public function viewEmployee($id){
		 $data['division']=$this->Super_model->divisions1();
		$data['grade']=$this->Super_model->grade();
		$data['sbu']=$this->Super_model->sbu();
		$data['branch']=$this->Super_model->branch();
		$data['employee_type']=$this->Super_model->employee_type();
		$data['designation']=$this->Super_model->designation();
		$data['organization']=$this->Super_model->organization();
		$data['function_master']=$this->Super_model->function_master();
		$data['gender']=$this->Super_model->gender();
		$data['h_title'] = "Go Learn "; 	    
		 
	    $data['editEmployee'] = $this->Super_model->editEmployee($id);
		 //print_r($data['editEmployee']);exit;
		 
	    $this->load->view('ui/viewEmp',$data); 
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
		'name' => $this->input->post('firstname'),
		'mobile' => $this->input->post('phone'),
		'email' => $this->input->post('email'),
		'password' => $this->input->post('passwords'),
		'sbu' => $this->input->post('sbu'),
		'branch_plant' => $this->input->post('branch_plant'),
		'designation' => $this->input->post('designation'),
		'grade' => $this->input->post('grade'),
		'emp_type' => $this->input->post('emp_type'),
		//'dob' => $this->input->post('dob'),
		//'doj' => $this->input->post('doj'),
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
		/*'blood_group' => $this->input->post('blood_group'),
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
		//'zone' => $this->input->post('zone') */
		);
		// print_r($data);exit();
        $insertUserData = $this->Super_model->addingemp($emp_id,$data);
		 
        if($insertUserData){
        	$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Submitted</div>');
        } else {     
        	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Employee ID Already Exist</div>');
        }
        redirect(base_url().'main/addemp','refresh');            
    }
	 
	public function updateEmp()
	{ 
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
					'name' => $this->input->post('firstname'),
					'mobile' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('passwords'),
					'sbu' => $this->input->post('sbu'),
					'branch_plant' => $this->input->post('branch_plant'),
					'designation' => $this->input->post('designation'),
					'grade' => $this->input->post('grade'),
					'emp_type' => $this->input->post('emp_type'),
					//'dob' => $this->input->post('dob'),
					//'doj' => $this->input->post('doj'),
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
				);
				
			$result=$this->Super_model->updateEmp($this->input->post('id'),$data);
			if($result) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successfully!</div>'); 
				redirect(base_url().'main/emp','refresh');  
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Update Failed.</div>');
				redirect(base_url().'main/emp','refresh');  
			}
			
	}
	
    public function employee_history(){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['emp_history']=$this->Super_model->emp_history();
		$data['h_title'] = "Go Learn "; 	    
		$this->load->view('ui/dashboards',$data);
		$this->load->view('ui/employee_history',$data);
		
	}
	public function division($id=false)
	{
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['division']=$this->Super_model->divisions();
		if(isset($id) && !empty($id)){
			$data['editdivision'] = $this->Super_model->editdivision($id);
			$this->load->view('ui/adddivision',$data);
		}
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/division',$data);
	}
	public function adddivision(){
       $data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/adddivision',$data);        
    }
	public function adddivision_master(){
		$data = array(
	        	'divisions' => $this->input->post('division')
			    );
        $insertUserData = $this->Super_model->adddivision($data);
		if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/division'); 
			
			}else{
				redirect('main/adddivision'); 
			}
	}
	public function updatedivision($id){
		$data['division']=$this->Super_model->division();
		$data['editdivision'] = $this->Super_model->editdivision($id);	
			$inputdata = array(
				'divisions' => $this->input->post('division'),
				);
			$res=$this->Super_model->updatedivision($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
					padding: 0.75rem 1.25rem;
					margin-bottom: 1rem;
					border: 1px solid transparent;
					border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/division','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
				background-color: rgba(0, 182, 122, 0.2);
				border-color: #00a770;    position: relative;
				padding: 0.75rem 1.25rem;
				margin-bottom: 1rem;
				border: 1px solid transparent;
				border-radius: 0.25rem;">Update Not Successfully.</div>');
				redirect(base_url().'main/division','refresh'); 
			}
	}
	public function delete_division($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_division($id);
		$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert" style="color: #c04444;
    background-color: rgba(252, 90, 90, 0.2);
    border-color: #e85353;font-size: 0.75rem;color: #832f2f;
    background-color: #fedede;
    border-color: #fed1d1;position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    ;"> Delete Successfully. </div>');
        redirect(base_url().'main/division','refresh');
	}
	/*----------------faculty----------------------------*/
    public function faculty($id=false)
	{
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['faculty']=$this->Super_model->faculty();
		if(isset($id) && !empty($id)){
			//print_r($id);exit;
			$data['editfaculty'] = $this->Super_model->editfaculty($id);
			$this->load->view('ui/addfaculty',$data);
		}else{
		$data['h_title'] = "Go Learn "; 	    
		$this->load->view('ui/faculty',$data);
		}
	}
	
		public function addfaculty()
    {
    	$data['h_title'] = "Go Learn ";
        $this->load->view('ui/addfaculty',$data);		
    }
     public function addfaculty_master(){
		$data = array(
		'name' => $this->input->post('name'),
		'mobile' => $this->input->post('mobile'),
        'email' => $this->input->post('email'),
        'company_name' => $this->input->post('company_name'),
        'city' => $this->input->post('city'),
        'state' => $this->input->post('state'),
        'country' => $this->input->post('country'),
       'faculty_type'=>$this->input->post('faculty_type'),
        'emp_id'=>$this->input->post('facultyid')
			);
		//print_r($data['name']);exit();
        $insertUserData = $this->Super_model->addfaculty($data);
		if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/faculty'); 
			
			}else{
				redirect('main/addfaculty'); 
			}
	}
	public function updatefaculty($id)
	{
		//$data['faculty']=$this->Super_model->faculty();
		$data['editfaculty'] = $this->Super_model->editfaculty($id);	
			$inputdata = array(
				'name' => $this->input->post('name'),
				'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'company_name' => $this->input->post('company_name'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
				);
				
			$res=$this->Super_model->updatefaculty($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/faculty','refresh');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'ui/addfaculty','refresh'); 
			}
			
	}
	public function faculty_delete($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
        $result= $this->Super_model->faculty_delete($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Deleted Successfully.</div>');
		//print_r($id);exit;
        redirect($_SERVER['HTTP_REFERER']);
	}
	/*----------------------program types-------------------------*/
	public function program_types($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['program_types']=$this->Super_model->program_types();
		if(isset($id) && !empty($id)){
			//print_r($id);exit;
			$data['editprogram_types'] = $this->Super_model->editprogram_types($id);
			$this->load->view('ui/addprogram_types',$data);
		}else{
		$data['h_title'] = "Go Learn "; 	    
		$this->load->view('ui/program_types',$data);
	}
	}
	public function addprogram_types()
    {
    	$data['h_title'] = "Go Learn "; 	    
		$this->load->view('ui/addprogram_types',$data);
                 
    }
	public function addprogram_types_master(){
			$data = array(
		    'type' => $this->input->post('type'),
		);
        $insertUserData = $this->Super_model->addprogram_types($data);
		if($insertUserData){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/program_types'); 
			
			}else{
				redirect('main/addprogram_types'); 
			}
	}
	public function deleteProgramtypes($id)
    
	{
	     //print_r($id);exit();
	    $updateUserData = $this->Super_model->deleteProgramtypes($id);
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Deleted  Successfully.</div>');
        redirect(base_url().'main/program_types','refresh'); 
	
	}
	public function updateprogram_types($id)
	{
		//$data['program_types']=$this->Super_model->program_types();
		$data['editprogram_types'] = $this->Super_model->editprogram_types($id);	

			$inputdata = array(
				'type' => $this->input->post('type'),
				);
				//print_r($inputdata);exit;
			$res=$this->Super_model->updateprogram_types($id,$inputdata);
			//print_r($res);exit;
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>'); 
				redirect(base_url().'main/program_types','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Update Failed.</div>');
				redirect(base_url().'main/program_types','refresh'); 
			}
			
	}
		
	public function newcourse($id=false){
		
		$data['baseurl']=base_url();
		$data['course']=$this->Super_model->course();
		$data['program_name']=$this->Super_model->program1();
		$data['program_type']=$this->Super_model->program_type1();
		$data['program_group']=$this->Super_model->program_group1();
		$data['program_types']=$this->Super_model->program_types();
		if(isset($id) && !empty($id)){
			
			$data['editcourse'] = $this->Super_model->editcourse($id);
		}
		$data['h_title'] = "Go Learn  "; 	    
		$this->load->view('ui/newcourse',$data);
		
	}
	public function course($id=false)
	{
		
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['baseurl']=base_url();
		$data['course']=$this->Super_model->course();
		$data['program_name']=$this->Super_model->program1();
		$data['program_type']=$this->Super_model->program_type1();
		$data['program_group']=$this->Super_model->program_group1();
		$data['program_types']=$this->Super_model->program_types();
		
		$data['h_title'] = "Go Learn  Course List"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/course',$data);
	}
	public function editcourse($id)
	    {

			
			$data['feedbackmainid'] = $this->Admin_model->getfeedbackmainid($id);
	        $data['details'] = $this->Admin_model->getCourse($id);
			//print_r($data['details'] );exit;
	        $data['course']=$this->Super_model->course(); 
	        $data['program_types']=$this->Super_model->program_types();
	        $data['program_name']=$this->Super_model->program();
	        $data['program_group']=$this->Super_model->program_group1();
			//print_r(  $data['details'] );exit;
	          $data['h_title'] = "Edit Course"; 	    
		    $this->load->view('ui/newcourse',$data);
	    }
		public function course_adding(){
			
			$course = $this->input->post('course_title');
			
			$exitcourse = $this->Admin_model->exitcourse($course,$this->input->post('courseid'));
			if($exitcourse == 2){
				$this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Course title already exist. Try another title</div>');
				redirect(base_url().'main/course','refresh');
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
			//print_r($data);exit;
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
			redirect(base_url().'main/course','refresh');   
			
			
		}
	public function deleteCourse($id)
	{
	    $updateUserData = $this->Admin_model->deleteCourse($id);
                $this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Course Deleted Updated</div>');
        redirect(base_url().'main/course','refresh'); 

	}
	public function test($id=false){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['coursedata'] = $this->Super_model->coursedata($id);
	    //print_r($data['coursedata']);exit();
	    $data['courese_name']=$this->Super_model->courese_name($id);
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['h_title'] = "Go Learn  test"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/test.php',$data);
	}
	public function pretest_questions($id=false){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['courese_name']=$this->Super_model->courese_name($id);
		$data['questions']=$this->Super_model->pertest_questions($id);
		$data['h_title'] = "Go Learn  test";
		$this->load->view('ui/header',$data);
		$this->load->view('ui/add_pretestquestions.php',$data);
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
        $insertUserData = $this->Super_model->pretestquestions_adding($data);
        redirect(base_url('ui/pretest_questions/'.$id),'refresh');
	}
	public function posttest_questions($id=false){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['courese_name']=$this->Super_model->courese_name($id);
		$data['questions']=$this->Super_model->posttest_questions($id);
		$data['h_title'] = "Go Learn  test";
		$this->load->view('ui/header',$data);
		$this->load->view('ui/add_posttestquestions.php',$data);
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
        $insertUserData = $this->Super_model->posttestquestions_adding($data);
        redirect(base_url('ui/posttest_questions/'.$id),'refresh');
	}
	public function test_questions($id=false){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		if(isset($id) && !empty($id)){
			$data['c_id'] = $id;
		} else {
		    $data['c_id'] = "";
		}
		$data['courese_name']=$this->Super_model->courese_name($id);
		$data['pre_questions']=$this->Super_model->pertest_questions($id);
		$data['post_questions']=$this->Super_model->posttest_questions($id);
		$data['h_title'] = "Go Learn  test";
		$this->load->view('ui/header',$data);
		$this->load->view('ui/add_testquestions.php',$data);
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
        $insertUserData = $this->Super_model->pretestquestions_adding($data);
        $insertUserData = $this->Super_model->posttestquestions_adding($data);
        redirect(base_url('ui/test_questions/'.$id),'refresh');
	}
	public function feedback_questions($id){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['feedback_questions'] = $this->Super_model->feedback_questions($id);
		$data['h_title'] = "Go Learn  Feedback"; 	    
		$data['c_id'] = $id; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/feedback_questions.php',$data);	    
	}
	public function addfeedback_quation()
    {
        //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
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
        $insertUserData = $this->Super_model->addfeedback_quation($data);
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function delete_feedback_quations($id)
    {
        $result= $this->Super_model->delete_feedback_quations($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
	public function activefeedback_quation($id){
	 	$res = $this->Super_model->activefeedback_quation($id);
	 	redirect($_SERVER['HTTP_REFERER']);
	}
	public function inactivefeedback_quation($id){
	 	$res = $this->Super_model->inactivefeedback_quation($id);
	 	redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function updateprogram($id)
	{
		$data['program']=$this->Super_model->program();
		$data['editprogram'] = $this->Super_model->editprogram($id);	

			$inputdata = array(
				'name' => $this->input->post('name'),
				'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'company_name' => $this->input->post('company_name'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country'),
				);
				
			$res=$this->Super_model->updateprogram($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successfully.</div>');
				redirect(base_url().'ui/program','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'ui/program','refresh'); 
			}
			
	}
	
	public function createprogram($id=false){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		//print_r(base_url());exit;
		$data['division']=$this->Super_model->divisions1();
		$data['faculty']=$this->Super_model->faculty1();
		$data['course']=$this->Super_model->course1();
		$data['program']=$this->Super_model->program1();
		$data['program_type']=$this->Super_model->program_type1();
		$data['program_group']=$this->Super_model->program_group1();
		if(isset($id) && !empty($id)){
			$data['editprogramlist'] = $this->Super_model->editprogramlist($id);
			$data['programEmployeelist'] = $this->Super_model->programEmployeelist($id);
			//print_r($data['programEmployeelist']);exit;
		}
		$data['base_url']=base_url();
		$data['h_title'] = "Go Learn  create program"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/createprogram.php',$data);
	}
	public function creatingprogram(){
		//print_r($_POST);exit;
	    $programList_id = $this->input->post('program_id');
	    //print_r($programList_id);exit;
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $course = $this->input->post('course_name');
	    $courseDetails = $this->db->query("SELECT id,course_title,training_type,program_id,program_group_id,traning_type_id FROM course WHERE id=$course")->row();
	    $evalutionDetails = $this->db->query("SELECT id FROM `evaluation` where  course_id=$course ")->row();
	    //print_r($courseDetails);
	     $course_title = $courseDetails ->course_title;
	     $training_type = $courseDetails->training_type;
         $program_id = $courseDetails -> program_id;
         $program_group_id= $courseDetails -> program_group_id;
         $traning_type_id= $courseDetails -> traning_type_id;
        $ownername = $this->session->userdata['superadmin_login']['name'];
        $ownerid = $this->session->userdata['superadmin_login']['user_name'];
	    $data = array(
	        'created_user'=>$ownername,
	    	'course_name' => $this->input->post('course_name'),
	    	'program_name' =>$program_id,
	    	'program_group_name' => $program_group_id,
	    	'training_type' => $training_type,
	    	'nature_program' => $this->input->post('nature_program'),
	    	'tni_source' => $this->input->post('tni_source'),
	    	'cost_per_program' => $this->input->post('cost_per_program'),
	    	//'cost_per_emp' => $this->input->post('cost_per_emp'),
	    	'faculty_name' => $this->input->post('faculty_name'),
	    	'faculty_type' => $this->input->post('faculty_type'),
	    	'training_mode' => $this->input->post('training_mode'),
	    	'no_of_hrs' => $this->input->post('no_of_hrs'),
	    	'from_date' => date("Y-m-d", strtotime($this->input->post('from_date'))) ,
	    	'to_date' => date("Y-m-d", strtotime($this->input->post('to_date'))) ,
	    	'start_time' => $this->input->post('start_time'),
	    	'end_time' => $this->input->post('end_time'),
	    	'venue' => $this->input->post('venue'),
	    	'location' => $this->input->post('location'),
	    	'ttt' => $this->input->post('ttt'),
	    	'evaluation' => $this->input->post('evaluation'),
	    	'created_at'=>date('Y-m-d h:i:s'),
	    	'updated_at'=>date('Y-m-d h:i:s'),
	    );
        if($programList_id==""){
            $insertid = $this->Super_model->creatingprograms($data);
            $programId  =  $insertid ;
        }else{
            $updateid = $this->Super_model->updatingprograms($data,$programList_id);
             $programId  =  $updateid ;
        }
      
        
        //print_r($programId);exit;
        if($insertid!=''){
            //$programId =$this->input->post("event_id");
            $faculty_id = $this->input->post("faculty_name");
            $faculty_type = $this->input->post("faculty_type");
           // $faculty_name = $this->input->post("faculty_name");
            $cfrom_date = $this->input->post("from_date");
            $cto_date =   $this->input->post("to_date");
            $course_id =    $this->input->post("course_name");
            $training_type = $this->input->post("training_type");
            $man_days = $this->input->post("no_of_hrs");
            $data1 = array(
             //   'owner_name' => $ownername,
                'event_id' => $programId,
                'evaluation' => $evalutionDetails->id,
                'facult_name' => $faculty_id,
                'faculty_type' => $faculty_type,
                'from_date' =>    $cfrom_date,
                'to_date' =>      $cto_date,
                //'faculty_name' =>$faculty_name,
                'course' =>    $course_id,
                //'training_type' =>   $training_type,
                'man_hours' =>    $man_days,
                'created_at' =>date('Y-m-d h:i:s')
            );
           
        //$insertid = $this->Super_model->creatingevent($data1);
         //print_r($data1);exit;
        }
        
            if($programId){
                if($programList_id==""){
                    $this->store_assign_emp_fromCreateProgram($programId,$this->input->post("assignemployee"), $this->input->post('course_name'),$this->input->post('venue'),date("d-m-Y", strtotime($this->input->post('from_date'))),$this->input->post('start_time'),$this->input->post("faculty_name"),date("d-m-Y", strtotime($this->input->post('to_date'))));
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
                 redirect(base_url().'ui/createprogram','refresh'); 
                }else{
                    $this->update_assign_emp_fromCreateProgram($programList_id,$this->input->post("assignemployee"), $this->input->post('course_name'),$this->input->post('venue'),date("d-m-Y", strtotime($this->input->post('from_date'))),$this->input->post('start_time'),$this->input->post("faculty_name"));
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
                 redirect(base_url().'ui/createprogram','refresh');
                }
                       
            }
            else{
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild please try again</div>');
                    redirect(base_url().'ui/createprogram','refresh'); 
            }
        
        
    }
   
	public function program($id=false)
	{
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['program']=$this->Super_model->program();
		$data['program_types']=$this->Super_model->program_types();
		if(isset($id) && !empty($id)){
			$data['editprogram'] = $this->Super_model->editprogram($id);
			$this->load->view('ui/addprogramname',$data);
		}
		else{
			$data['h_title'] = "Go Learn  Program"; 	    
			$this->load->view('ui/header',$data);
			$this->load->view('ui/program.php',$data);
		}
		
	}
	public function addprogramname(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addprogramname',$data);
	}	

	public function addprogram()
    {
    	//print_r($_POST);exit();
		$data = array(
		    'program_name' => $this->input->post('programname'),
		);
		//print_r($data);exit();
        $insertUserData = $this->Super_model->creatingprogram($data);
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">submit Successed.</div>');
        redirect(base_url().'main/program','refresh');            
    }
	public function updateprogramname($id)
	{
		//print_r($id);exit;
	//$data['program']=$this->Super_model->program();
		$data['editprogram'] = $this->Super_model->editprogram($id);	
			$inputdata = array(
				'program_name' => $this->input->post('programname')
				);
				
			$res=$this->Super_model->updateprogramname($id,$inputdata);
			//print_r($res);exit;
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/program','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/program','refresh'); 
			}		
			
	}
	public function delete_programname($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_programname($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Deleted Successfully. </div>');
        redirect(base_url().'main/program','refresh');
	}
	
// 	public function program(){
// 	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
// 		$data['program']=$this->Super_model->program();
// 		$data['h_title'] = "Go Learn  program"; 	    
// 		$this->load->view('ui/header',$data);
// 		$this->load->view('ui/program.php',$data);
// 	}
	public function programs(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['programs']=$this->Super_model->programs();
		//print_r($data['programs']);exit;
		$data['h_title'] = "Go Learn  programs"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/programs.php',$data);
	}
	public function assign_emp($id=false){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    //$data['sbu'] = $this->Super_model->selectsbu($division_id);
        //print_r($data['sbu']);exit;
        if(isset($_POST) && !empty($_POST)){
        $emp_ids=$this->input->post('emp_ids');
        $emp_ids1=trim($emp_ids);
        $emp_ids2= str_replace(" ",",","$emp_ids1");
        $emp_ids3= str_replace(",,",",","$emp_ids2");
            if(isset($emp_ids) && !empty($emp_ids)){
                $data['emp_list'] = $this->Super_model->selectemp_ids($emp_ids3);
            }
        }
        $data['program_id']=$id;
        // $data['division_id']=$division_id;
        $data['assigned_emp']  = $this->Super_model->assigned_emp($id);
        //print_r($id);exit;
        //$data['program_name']  = $this->Super_model->program_name($id);
		//$data['division']=$this->Super_model->divisions1();
		$data['h_title'] = "Go Learn "; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/assign_emp.php',$data);
	}
		public function store_assign_emp_fromCreateProgram($programId,$emplyoeeList,$course,$venue,$fromDate,$start_time,$faculty_name,$to_date){
	    //print_r($faculty_name);exit();
       // $sql ="SELECT * FROM course WHERE id='".."'";
        $emp_id = explode(' ',$emplyoeeList);
		
        $user = $this->session->userdata['superadmin_login']['id'];
        $superadminEmpId = $this->db->query("SELECT emp.id,email,superadmin.name FROM emp inner join superadmin on superadmin.user_name=emp.emp_id where superadmin.id=$user")->row();
        $courseDetails = $this->db->query("SELECT id,course_title FROM course WHERE id=$course")->row();
        $faculty=$this->db->query("SELECT id,name From faculty A where A.id=$faculty_name")->row();
        //echo $faculty->name;exit();
        //$facultyname->faculty_name='1';
        $superadminEmail = $superadminEmpId->email;
        $sendMail = true;
		
        foreach($emp_id as $empid){
            if($sendMail==true){
            $divisionaa[0] = $this->db->query("SELECT id,email,division_id,sbu,name FROM emp WHERE emp.emp_id=$empid")->row();
			
            $division_id = $divisionaa[0]->division_id;
            $email_id = $divisionaa[0] ->email;
            //$sbu = $divisionaa->sbu;
            //print_r($division_id);exit();
            $data=array(     
                'program_id'=>$programId,
                'division_id'=>$division_id,
                'employee_id'=>$empid,
            );
            $rs= $this->Super_model->addassignemp($data);
           // $to = $email_id.',PawanP@coromandel.murugappa.com,kumarbs@coromandel.murugappa.com,sakthimdk86@gmail.com';
           // $to = $email_id.'sakthimdk86@gmail.com';
            $to = $email_id;
            //$to = 'sakthimdk86@gmail.com';
            $subject = 'New Course Assigned';
            $from = "From: $superadminEmpId->name <$superadminEmpId->email>";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
           // $message = $courseDetails->course_title. ' has been assigned to you by '. $superadminEmpId->name;
           
            $messages = $this->getMailContent($courseDetails->course_title,$venue,$fromDate,$start_time,$divisionaa->name,$to_date);
       //print_r($messages);exit();
            if(!mail($to,$subject,$messages,$headers))
            {
                $sendMail = false;
            }
			/*else{
				echo 'Mail sent success '.$email_id; exit;
			}*/
			
            }
        }
   // exit;
        if($sendMail){
            redirect(base_url().'ui/assign_emp/'.$programId.'/'.$division_id,'refresh'); 
        }else{
			print_r(error_get_last()); exit;
            redirect(base_url().'ui/assign_emp1/'.$programId.'/'.$division_id,'refresh'); 
        }
	}
	public function getMailContent($course_tittle,$venue,$fromDate,$start_time,$faculty_name,$to_date)
	{
	 return
	 //print_r($start_time);exit();
// Compose a simple HTML email message
$message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Oxygen Welcome</title>
  <style type="text/css">
    /* Take care of image borders and formatting, client hacks */
    img { max-width: 600px; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic;}
    a img { border: none; } 
    table { border-collapse: collapse !important;}
    #outlook a { padding:0; }
    .ReadMsgBody { width: 100%; }
    .ExternalClass { width: 100%; }
    .backgroundTable { margin: 0 auto; padding: 0; width: 100% !important; }
    table td { border-collapse: collapse; }
    .ExternalClass * { line-height: 115%; }
    .container-for-gmail-android { min-width: 600px; }


    /* General styling */
    * {
      font-family: Helvetica, Arial, sans-serif;
    }

    body {
      -webkit-font-smoothing: antialiased;
      -webkit-text-size-adjust: none;
      width: 100% !important;
      margin: 0 !important;
      height: 100%;
      color: #676767;
    }

    td {
      font-family: Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #777777;
      text-align: center;
      line-height: 21px;
    }

    a {
      color: #676767;
      text-decoration: none !important;
    }

    .pull-left {
      text-align: left;
    }

    .pull-right {
      text-align: right;
    }

    .header-lg,
    .header-md,
    .header-sm {
      font-size: 18px;
      font-weight: 700;
      line-height: normal;
      padding: 35px 0 0;
      color: #4d4d4d;
    }

    .header-md {
      font-size: 24px;
    }

    .header-sm {
      padding: 5px 0;
      font-size: 18px;
      line-height: 1.3;
    }

    .content-padding {
      padding: 20px 0 30px;
    }

    .mobile-header-padding-right {
      width: 290px;
      text-align: right;
      padding-left: 10px;
    }

    .mobile-header-padding-left {
      width: 290px;
      text-align: left;
      padding-left: 10px;
    }

    .free-text {
      width: 100% !important;
      padding: 10px 60px 0px;
    }

    .block-rounded {
      border-radius: 5px;
      border: 1px solid #e5e5e5;
      vertical-align: top;
    }

    .button {
      padding: 30px 0;
    }

    .info-block {
      padding: 0 20px;
      width: 260px;
    }

    .block-rounded {
      width: 260px;
    }

    .info-img {
      width: 258px;
      border-radius: 5px 5px 0 0;
    }

    .force-width-gmail {
      min-width:600px;
      height: 0px !important;
      line-height: 1px !important;
      font-size: 1px !important;
    }

    .button-width {
      width: 228px;
    }
 

  </style>

  <style type="text/css" media="screen">
    @import url(http://fonts.googleapis.com/css?family=Oxygen:400,700);
  </style>

  <style type="text/css" media="screen">
    @media screen {
      /* Thanks Outlook 2013! */
      * {
        font-family: "Oxygen", "Helvetica Neue", "Arial", "sans-serif" !important;
      }
    }
  </style>

  <style type="text/css" media="only screen and (max-width: 480px)">
    /* Mobile styles */
    @media only screen and (max-width: 480px) {

      table[class*="container-for-gmail-android"] {
        min-width: 290px !important;
        width: 100% !important;
      }

      table[class="w320"] {
        width: 320px !important;
      }

      img[class="force-width-gmail"] {
        display: none !important;
        width: 0 !important;
        height: 0 !important;
      }

      a[class="button-width"],
      a[class="button-mobile"] {
        width: 248px !important;
      }

      td[class*="mobile-header-padding-left"] {
        width: 160px !important;
        padding-left: 0 !important;
      }

      td[class*="mobile-header-padding-right"] {
        width: 160px !important;
        padding-right: 0 !important;
      }

      td[class="header-lg"] {
        font-size: 24px !important;
        padding-bottom: 5px !important;
      }

      td[class="header-md"] {
        font-size: 18px !important;
        padding-bottom: 5px !important;
      }

      td[class="content-padding"] {
        padding: 5px 0 30px !important;
      }

       td[class="button"] {
        padding: 5px !important;
      }

      td[class*="free-text"] {
        padding: 10px 18px 30px !important;
      }

      td[class="info-block"] {
        display: block !important;
        width: 280px !important;
        padding-bottom: 40px !important;
      }

      td[class="info-img"],
      img[class="info-img"] {
        width: 278px !important;
      }
    }
  </style>
</head>

<body bgcolor="#f7f7f7">
<table align="center" cellpadding="0" cellspacing="0" class="table" width="100%">
  <tr>
    <td align="left" valign="top" width="100%"  #ffffff;">
      <center>
     
        <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff" >
          <tr>
            <td width="100%" height="80" valign="top" style="text-align: center; vertical-align:middle;">
            <!--[if gte mso 9]>
            
            <![endif]-->
              <center>
                <table cellpadding="0" cellspacing="0" width="600" class="w320">
                  <tr>
                    <td class="pull-left mobile-header-padding-left" style="vertical-align: middle;">
                      <a href="">Go Learn </a>
                    </td>
                    
                  </tr>
                </table>
              </center>
              <!--[if gte mso 9]>
              </v:textbox>
            </v:rect>
            <![endif]-->
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top" width="100%" style="background-color: white;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
           <tr>
                                    <td class="header-lg">
                                        Dear '.$faculty_name.'  
                                    </td>
                                    
                                    
                                   
                                </tr>
          
          <tr>
                      <td  valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                <table cellspacing="0" cellpadding="0" border="0" align="center">
                                    <tr>
                                        <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                            <p>Welcome to Go Learn </p>
                                        </td>
                                        <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
           <tr>
          <td>
             You have been nominated to attend a training program as per the details given below:
          </td>
          </tr>
          <tr>
                        <td align="left" style="padding-top: 20px;">
                            <table cellspacing="0" cellpadding="0" border="0" width="72%" class="border">
                            <tr>
                                    <td>
                                        Program
                                    </td>
                                    <td>
                                        '.$course_tittle.'
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                        Program Start Date
                                    </td>
                                    <td>
                                        '.$fromDate.'
                                    </td>
                                </tr>
								<tr>
                                    <td>
                                        Program End Date
                                    </td>
                                    <td>
                                        '.$to_date.'
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Timing
                                    </td>
                                 
                                     
                                    <td>
                                      '.$start_time.'  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Venue
                                    </td>
                                    <td>
                                      '.$venue.'  
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
          <tr>
          <td style="line-height:28.5px;">
          Please block your calendar and make your travel plans (if required) accordingly.
          </td>
          </tr>
          <tr>                                                                                                            
          <td style="line-height:32px;">
          For any queries, please contact Admin Name
          </td>
          </tr>
          <tr>
          <td>
          Best wishes for happy learning.
          </td>
          </tr>
          </table>
   <tr>
    <td align="center" valign="top" width="100%" style="background-color: white; height: 100px;">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          
        </table>
      </center>
    </td>
  </tr>
</body>
</html>';   
}
	public function checkEmpValue()
	{
	    $emp_id = explode(' ',$_POST['id']);
	    //print_r($emp_id);exit;
	    $error = 0;
        foreach($emp_id as $empid){
             $divisionaa = $this->db->query("select division_id,sbu from emp where emp.emp_id=$empid")->row();
            if(!$divisionaa)
            {
                $error = $empid;
               break; 
            }
        }
        echo $error;
	}
	public function asignemployeecheck()
	{
             $assignemployee= $this->Super_model->asign_employee_check($_POST['id'],$this->input->post('fromdate'),$this->input->post('todate'),$this->input->post('program_id')); 
             echo $assignemployee;
	}
		public function checkFaculty()
	{
	    $emp_id = explode(' ',$_POST['id']);
		//print_r($emp_id);exit;
	    $error = 0;
        foreach($emp_id as $empid){
             $divisionaa = $this->db->query("SELECT name,email,mobile,state FROM emp WHERE emp.emp_id=$empid")->row();
           
            if(!$divisionaa)
            {
                $error = $empid;
                break; 
            }
        }
		//print_r($divisionaa);exit;
        //echo $error;
	}
	public function store_assign_emp(){
	    //print_r($this->input->post('assign_empid'));exit;
        if($this->input->post('assign_empid')){
            $emp_id=$this->input->post('assign_empid');
        }
        if($this->input->post('program_id')){
            $program_id=$this->input->post('program_id');
        }
        if($this->input->post('division_id')){
            $division_id=$this->input->post('division_id');
        }
         //$checkttt = $this->Super_model->checkttt($program_id);
         
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
            $rs= $this->Super_model->addassignemp($data);
			//print_r($rs);exit;
            /*if($checkttt == 1){
                $insertfaculty = $this->Super_model->insertfaculty($empid,$program_id);
            } */
        }
    
        if($rs==1){
            redirect(base_url().'ui/assign_emp/'.$program_id.'/'.$division_id,'refresh'); 
        }else{
            redirect(base_url().'ui/assign_emp/'.$program_id.'/'.$division_id,'refresh'); 
        }
	}
	public function assigned_empdelete($id){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $rs=$this->Super_model->assigned_empdelete($id);
	    if($rs==1){
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully Deleted</div>');
            redirect($_SERVER['HTTP_REFERER']); 
        }else{
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Not Deleted Please Try Again. .</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}
	public function add_course($id){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['p_course']=$this->Super_model->p_course($id);
	    //print_r($data['course']->result());exit();
		$data['division']=$this->Super_model->divisions1();
		$data['faculty']=$this->Super_model->faculty1();
		$data['course']=$this->Super_model->course1();
		$data['pid'] = $id; 	    
		$data['h_title'] = "Go Learn  create program"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/add_course.php',$data);
	}
	public function adding_course(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $ownername = $this->session->userdata['superadmin_login']['name'];
        $ownerid = $this->session->userdata['superadmin_login']['user_name'];
	    
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
            $insertid = $this->Super_model->creatingevent($data1);
        
        if($insertid>0){
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
            redirect(base_url().'ui/add_course/'.$pid,'refresh'); 
        }
        else{
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild please try again</div>');
            redirect(base_url().'ui/add_course/'.$pid,'refresh'); 
        }
	}
	public function sbureport(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		//$data['programs']=$this->Super_model->programs();
		$data['h_title'] = "Go Learn  sbu report"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/sbu_report.php',$data);
	}
	public function divisionreport(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		//$data['programs']=$this->Super_model->programs();
		$data['h_title'] = "Go Learn  division report"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/division_report.php');
	}
	public function masterdatareport(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['programs']=$this->Super_model->programs();
		$data['h_title'] = "Go Learn  masterdata report"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/masterdata_report.php');
	}
	public function evaluationreport(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['programs']=$this->Super_model->programs();
		$data['evaluationqus'] = $this->Admin_model->admin_evaluationqusgroup();
		$data['evaluationdata'] = $this->Admin_model->admin_evaluationdata();
		$data['h_title'] = "Go Learn  Evaluation report"; 	    
		$this->load->view('ui/header',$data);
		$this->load->view('ui/evaluationreport.php');
	}
	public function getCourseDetails()
	{
	    //print_r($_POST);
	   $data = $this->Super_model->getCourseDetails($_POST['id']);
	    echo json_encode($data);
	}
	public function getProgramDetails()
	{
	     $data = $this->Super_model->getProgramDetails($_POST['id']);
	    echo json_encode($data);
	}
	public function feedbackform($id= false)
	{
	    $data['admin_evaluation']=$this->Admin_model->admin_evaluation();
		if(isset($id) && !empty($id)){
			$data['editadmin_evaluation'] = $this->Admin_model->editadmin_evaluation($id);
		}
	    	$data['h_title'] = "L1-Feedback Form"; 	
	    
	        	$this->load->view('ui/header',$data);
		$this->load->view('ui/feedbackform.php',$data);
	}
	public function coursefeedbackform($id= false)
	{
	    $data['admin_evaluation']=$this->Admin_model->admin_evaluation();
	    $data['fid'] =$id;
		if(isset($id) && !empty($id)){
			//print_r($id);exit;
			$data['editadmin_evaluation'] = $this->Admin_model->editadmin_evaluation($id);
			//print_r($data);exit;
		}
	    //	$data['h_title'] = "L1-Feedback Form"; 	
	    
	       // 	$this->load->view('ui/header',$data);
		$this->load->view('ui/coursefeedbackform.php',$data);
	}

	public function updateadmin_evaluation($id)
	{
		$data['admin_evaluation']=$this->Admin_model->admin_evaluation();
		$data['editadmin_evaluation'] = $this->Admin_model->editadmin_evaluation($id);	   
		$inputdata = array(
			'title' => $this->input->post('title'),
			);
		$res=$this->Admin_model->updateadmin_evaluation($inputdata,$id);
		if($res) {
			echo "<script>alert('Successfully Updated. Thank you. ');</script>";
			redirect(base_url().'ui/feedbackform.php','refresh'); 
		}else{
			redirect(base_url().'ui/feedbackform.php','refresh'); 
		}
			
	}
	public function admin_addevaluation()
    { //evaluationreport
		$data = array(
		'title' => $this->input->post('title'),
		);
        $insertedid = $this->Admin_model->admin_addevaluation($data);
        $evaluationqus = $this->Admin_model->admin_evaluationqus();
            foreach($evaluationqus as $row) {
                 $quations = $row->quations;
                 $type = $row->type;
                    $data1 = array(
		                'evaluation_id' => $insertedid,
		                'quations' => $quations,
		                'type' => $type,
		                'status' => 1,
                    ) ;
                //    print_r($data1);
                $this->Admin_model->admin_addevaluation2($data1);
            }
       // print_r($evaluationqus);exit();
      ///  echo "<script>alert('Successfully submitted. Thank you.');</script>";
      $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Feedback Title added Successfully</div>');
        redirect(base_url().'index.php/ui/feedbackform','refresh');
    }
     public function course_addevaluation()
    {
        $error = null;
		$data = array(
		'title' => $this->input->post('course_title'),
		);
        $insertedid = $this->Admin_model->admin_addevaluation($data);
        $evaluationqus = $this->Admin_model->admin_evaluationqus();
        
            foreach($evaluationqus as $row) {
                 $quations = $row->quations;
                 $type = $row->type;
                    $data1 = array(
		                'evaluation_id' => $insertedid,
		                'quations' => $quations,
		                'type' => $type,
		                'status' => 1,
                    ) ;
                $this->Admin_model->admin_addevaluation2($data1);
            }
            
           
        if( $insertedid>0)
        {
            echo  $insertedid;
            
        }
        else
        {
            echo 0;
        }
        //print_r($evaluationqus);exit();
        
    }
    	public function evaluation_quation($id)
	{

	  //  if($this->session->userdata('admin_login')==NULL) redirect(base_url());
	//	$this->load->view('header.php');
		$data['evaluation_quations'] = $this->Admin_model->evaluation_quations($id);
		$data['id']=$id;
		$this->load->view('ui/header',$data);
		$this->load->view('ui/evaluation_quation',$data);
		
		
	}
		public function feedbackevaluation_quation($id,$type=false)
	{

	  //  if($this->session->userdata('admin_login')==NULL) redirect(base_url());
	//	$this->load->view('header.php');
		$data['evaluation_quations'] = $this->Admin_model->evaluation_quations($id);
		$data['id']=$id;
		$data['type']=$type;
	//	$this->load->view('ui/header',$data);
		$this->load->view('ui/feedbackquestions',$data);
		
		
	}
		public function addevaluation_quation()
    {
       // if($this->session->userdata('admin_login')==NULL) redirect(base_url());
    	//print_r($_POST);exit();
		$evaluation_id = $this->input->post('evaluation_id');
		$quations=	$this->input->post('quations');
		$type=	$this->input->post('type');
		$status = 1;
		$data = array(
		'evaluation_id' => $evaluation_id,
		'quations'=> $quations,  
		'type'=> $type,  
		'status'=> $status,  
			);
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addevaluation_quation($data);
       // echo "<script>alert('Successfully Submitted. Thank you!');</script>";
       $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully added</div>');
        redirect(base_url('ui/evaluation_quation/'.	$evaluation_id),'refresh');
    }
    	public function courseaddevaluation_quation()
    {
       // if($this->session->userdata('admin_login')==NULL) redirect(base_url());
    	//print_r($_POST);exit();
		$evaluation_id = $this->input->post('evaluation_id');
		$quations=	$this->input->post('quations');
		$type=	$this->input->post('type');
		$status = 1;
		$data = array(
		'evaluation_id' => $evaluation_id,
		'quations'=> $quations,  
		'type'=> $type,  
		'status'=> $status,  
			);
			$check_evaluation = $this->Admin_model->check_evaluation($evaluation_id,$quations,$type);
		if($check_evaluation>5){
		    
			echo 500;
		    exit;
		}
		//print_r($data);
        $insertUserData = $this->Admin_model->addevaluation_quation($data);
        
       // echo "<script>alert('Successfully Submitted. Thank you!');</script>";
       if($insertUserData )
       {
            echo 1;
       }
       else
       {
           echo 0;
       }
    }
    	public function courseFeedBackquation()
    {
       // if($this->session->userdata('admin_login')==NULL) redirect(base_url());
    	//print_r($_POST);exit();
		$evaluation_id = $this->input->post('feedbackid');
		$quations=	$this->input->post('addquestion');
		$type=	4;// feedback questions
		$status = 1;
		$data = array(
		'evaluation_id' => $evaluation_id,
		'quations'=> $quations,  
		'type'=> $type,  
		'status'=> $status,  
			);
		//print_r($data);exit();
        echo $insertUserData = $this->Admin_model->addevaluation_quation($data);
      
    }
       public function delete_evaluation_quations($id)
    {
        $result= $this->Admin_model->delete_evaluation_quations($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
        public function activeevaluation_quation()
    {
     	if(isset($_POST['id']) && !empty($_POST['id'])) {
	 		$res = $this->Admin_model->activeevaluation_quation($_POST['id'], $_POST['status']);
	 		if($res) {
	 			$this->output->set_output(json_encode(1));
	 		} else {
	 			$this->output->set_output(json_encode(0));
	 		}
	 	}
    }
      public function pretest()
	{
	    
	     $data['pretestlist']=$this->db->select('course.*')
		                ->from('course')->where('pretest_id',1)
		                ->order_by('id','desc')->get();
	
	    	$data['h_title'] = "L2- Pre Test"; 	    
	        $this->load->view('ui/header',$data);
		    $this->load->view('ui/pretest.php',$data);
	}
	   public function coursepretest()
	{
	    
	     $data['pretestlist']=$this->db->select('course.*')
		                ->from('course')->where('pretest_id',1)
		                ->order_by('id','desc')->get();
	
	    	/*$data['h_title'] = "L2- Pre Test"; 	    
	        $this->load->view('ui/header',$data);*/
		    $this->load->view('ui/coursepretest.php',$data);
	}
	 public function posttest()
	{
	    
	    $data['posttestlist']=$this->db->select('course.*')
		                ->from('course')->where('posttest_id',1)
		                ->order_by('id','desc')->get();
		//print_r($data); exit;
	    	$data['h_title'] = "L3- Post Test"; 	    
	        $this->load->view('ui/header',$data);
		    $this->load->view('ui/posttest.php',$data);
	}
	 public function courseposttest()
	{
	    
	    $data['posttestlist']=$this->db->select('course.*')
		                ->from('course')->where('posttest_id',1)
		                ->order_by('id','desc')->get();
		//print_r($data); exit;
	    	/*$data['h_title'] = "L3- Post Test"; 	    
	        $this->load->view('ui/header',$data);*/
		    $this->load->view('ui/posttest.php',$data);
	}
	public function preposttest()
	{
	    
	    $data['preposttestlist']=$this->db->select('course.*')
		                ->from('course')->where('pre_and_post',1)
		                ->order_by('id','desc')->get();
		//print_r($data); exit;
	    	$data['h_title'] = "L3- Post Test"; 	    
	        $this->load->view('ui/header',$data);
		    $this->load->view('ui/preposttest.php',$data);
	}
	public function coursequestions($type=false,$id=false)
	{
	    $data['id']=$id;
	    $data['courseid']=$id;
		$data['testquation']=$this->Admin_model->testquation($id,$type);
        $data['testtile']=$this->Admin_model->testtile($id);
        $data['test_id']=$id;
         $data['type']=$type;
		$data['h_title'] = "Go Learn  Program"; 	    
	//	$this->load->view('ui/header',$data);
		$this->load->view('ui/prequestion.php',$data);
	
	}
	public function coursequestionslist($id=false,$type=false)
	{  //echo $type;
	    $data['id']=$id;
		$data['testquation']=$this->Admin_model->testquation($id,$type);
        
		$this->load->view('ui/prequestionlist.php',$data);
	
	}
	public function coursepreposttest()
	{
	    
	    $data['preposttestlist']=$this->db->select('course.*')
		                ->from('course')->where('pre_and_post',1)
		                ->order_by('id','desc')->get();
		//print_r($data); exit;
	    	/*$data['h_title'] = "L3- Post Test"; 	    
	        $this->load->view('ui/header',$data);*/
		    $this->load->view('ui/preposttest.php',$data);
	}
	public function events_list()
	{
	     $data['events']=   $this->Event_model->events();
        	$data['h_title'] = "Programs List"; 	    
	        $this->load->view('ui/header',$data);
		    $this->load->view('ui/events_list.php',$data);
	}
/*	   public function test($id=false)
    {
        if($this->session->userdata('admin_login')==NULL) redirect(base_url());
        $data['test']=$this->Admin_model->test();
        $data['course']=$this->Admin_model->course();
        if(isset($id) && !empty($id)){
            $data['edittest'] = $this->Admin_model->edittest($id);
        }
        $this->load->view('header.php');
        $this->load->view('sidenav.php');
        $this->load->view('tests',$data);
       	$this->load->view('footer.php');
        
        
    }*/
    public function addfeedbackEvalution(Request $request){
    $data1 = array(
                'name' => $this->input->post('name')
            );
            $insertid = $this->Super_model->addfeedbackEvalution($data1);
        
        if($insertid>0){
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
            redirect(base_url().'ui/coursefeedbackform/'.$pid,'refresh'); 
        }
        else{
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild please try again</div>');
            redirect(base_url().'ui/coursefeedbackform/'.$pid,'refresh'); 
        }
    }
    
    public function masterdataList()
	{
		//$resultList = $this->Master_model->fetchMasterData();
		/*$result = array();
		$i = 1;
		foreach ($resultList as $key => $value) {
		    if($value['post_test_complete']!=null && $value['evalu_test_complete']!=null){
			$result['data'][] = array(
				$i++,
				$value['employee_id'],
				$value['name'],
				$value['sbu'],
				$value['divisions'],
				$value['grade'],
				$value['function'],
				$value['designation'],
				$value['program_name'],
				$value['group_name'],
				$value['course_title'],
				$value['training_type'],
				date('d-M-Y',strtotime($value['from_date'])),
				date('d-M-Y',strtotime($value['to_date'])),
				$value['no_of_hrs'],
				number_format($value['no_of_hrs']/8,2),
				$value['no_of_que_pre_test'],
				$value['no_of_ans_pre_test'],
				$value['pre_test_complete'],
				$value['no_of_qus_post_test'],
				$value['no_of_ans_post_test'],
				$value['post_test_complete'],
				$value['growth_percentage'],
				$value['venue'],
				$value['training_mode'],
				$value['faculty_type'],
				$value['fac_name'],
				$value['tni_source'],
				$value['nature_program'],
				$value['location'],
				$value['eva_complete'],
				$value['cost_per_program'],
				$value['program_cost'],
			);
		    }
		}
		echo json_encode($result);*/
		 
	   	$resultList['data'] = $this->Master_model->fetchMasterData();
		//array_push(, );
		echo json_encode($resultList);
	}
	public function CourseMig()
	{
	    $emp_id=[2003105,2004815,2002851,2004471];
	    foreach($emp_id as $empid){
	        /*$this->db->query("delete FROM assign_emp WHERE employee_id=".$empid);*/
            $divisionaa = $this->db->query("SELECT id,email,division_id,sbu FROM emp WHERE emp.emp_id=$empid")->row();
            $division_id = $divisionaa->division_id;
            $email_id = $divisionaa -> email;
            //$sbu = $divisionaa->sbu;
            //print_r($division_id);exit();
            $data=array(
                'program_id'=>79,
                'division_id'=>$division_id,
                'employee_id'=>$empid,
            );
            $rs= $this->Super_model->addassignemp($data);
            
        }
	}
	public function masterfilter()
	{
	    //print_r($_GET); exit;
	    $from_date = $this->input->get('fromdate');
		$to_date=	$this->input->get('todate');
	//	$result = $this->Master_model->MasterData($from_date,$to_date);
	//;
	   $resultList = [];
	   	$resultList['data'] = $this->Master_model->MasterData($_GET['fromdate'],$_GET['todate']);
		//array_push(, );
		echo json_encode($resultList);
	}
	public function update_assign_emp_fromCreateProgram($programList_id,$emplyoeeList,$course,$venue,$fromDate,$start_time,$faculty_name){
	    $deleteprogra= $this->Super_model->deleteprogra($programList_id);
        $emp_id = explode(' ',$emplyoeeList);
        //print_r($emp_id);exit;
        $user = $this->session->userdata['superadmin_login']['id'];
        $superadminEmpId = $this->db->query("SELECT emp.id,email,superadmin.name FROM emp inner join superadmin on superadmin.user_name=emp.emp_id where superadmin.id=$user")->row();
        $courseDetails = $this->db->query("SELECT id,course_title FROM course WHERE id=$course")->row();
        $faculty=$this->db->query("SELECT id,name From faculty A where A.id=$faculty_name")->row();
        $superadminEmail = $superadminEmpId->email;
        $sendMail = true;
        foreach($emp_id as $empid){
            if($sendMail==true){
            $divisionaa[0] = $this->db->query("SELECT id,email,division_id,sbu,name FROM emp WHERE emp.emp_id=$empid")->row();
            $division_id = $divisionaa[0]->division_id;
            $email_id = $divisionaa -> email;
            $data=array(     
                'program_id'=>$programList_id,
                'division_id'=>$division_id,
                'employee_id'=>$empid,
            );
            $rs= $this->Super_model->updateassignemp($data,$programList_id);
             //print_r($rs);exit;
            //$to = $email_id.',msdvickey202@gmail.com';
            $to = $email_id.',sakthimdk86@gmail.com';
            $subject = 'New Course Assigned';
            $from = "From: $superadminEmpId->name <$superadminEmpId->email>";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
            $messages = $this->getMailContent($courseDetails->course_title,$venue,$fromDate,$start_time,$divisionaa->name,null);
            if(!mail($to,$subject,$messages,$headers))
            {
                $sendMail = false;
            }
            }
        }
    
        if($sendMail){
            redirect(base_url().'ui/assign_emp/'.$programList_id.'/'.$division_id,'refresh'); 
        }else{
            redirect(base_url().'ui/assign_emp/'.$programList_id.'/'.$division_id,'refresh'); 
        }
	}
	public function programdelete($id)
	{
	    //print_r($id);exit;
	    $delete= $this->Super_model->programdelete($id);
	    if($delete){
	    $data['events']=   $this->Event_model->events();
        	$data['h_title'] = "Programs List"; 	    
	        $this->load->view('ui/header',$data);
		    $this->load->view('ui/events_list.php',$data);
	    }
	}
	public function admindetails(){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['emp_history']=$this->Super_model->emp_history();
		$data['h_title'] = "Go Learn "; 	    
		$this->load->view('ui/adminDetails.php',$data);
	}
	///master
	/*public function sbu_master(){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['sbu_master']=$this->Super_model->sbu_master();
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/sbu_master',$data);
	}*/
	public function sbu_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['sbu_master']=$this->Super_model->sbu_master();
		if(isset($id) && !empty($id)){
			$data['editsbu'] = $this->Super_model->editsbu($id);
			 $this->load->view('ui/addsbu',$data);
			// print_r($data['editsbu']);exit;
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/sbu_master',$data);
		}
	}
	public function addsbu(){
		
		     $data['h_title'] = "Go Learn "; 	
			 $this->load->view('ui/addsbu',$data);	 
	}
	public function addSbu_master(){
			$data = array(
			'sbu' => $this->input->post('sbu')
			);
			
			$data=$this->Super_model->addsbu($data);
			if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/sbu_master'); 
			
			}else{
				redirect('main/addsbu'); 
			}
	}
	public function updatesbu($id)
	{
		//$data['sbu']=$this->Super_model->sbu();
		$data['editsbu'] = $this->Super_model->editsbu($id);	
			$inputdata = array(
				'sbu' => $this->input->post('sbu'));
			$res=$this->Super_model->updatesbu($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/sbu_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/sbu_master','refresh'); 
			}
	}		
	public function delete_sbu($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_sbu($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Deleted Successfully. </div>');
        redirect(base_url().'main/sbu_master','refresh');
	}
	
	
	public function branch_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['branch_master']=$this->Super_model->branch_master();
		if(isset($id) && !empty($id)){
			$data['editbranch'] = $this->Super_model->editbranch($id);
			 $this->load->view('ui/addbranch',$data);
			// print_r($data['editsbu']);exit;
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/branch_master',$data);
		//print_r($data);exit;
		}
	}
	public function addbranch(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addbranch',$data);
	}
	public function addbranch_master(){
			$data = array(
			'branch' => $this->input->post('branch_plant')
			);
			//print_r($data);exit;
			$data['addbranch']=$this->Super_model->addbranch($data);
			if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/branch_master'); 
			
			}else{
				redirect('main/addbranch'); 
			}
	}
	public function updatebranch($id)
	{
		//$data['sbu']=$this->Super_model->sbu();
		$data['editsbu'] = $this->Super_model->editsbu($id);	
			$inputdata = array(
				'branch' => $this->input->post('branch_plant'));
			$res=$this->Super_model->updatebranch($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/branch_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/branch_master','refresh'); 
			}	
	}
	public function delete_branch($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_branch($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;"> Deleted Successfully. </div>');
        redirect(base_url().'main/branch_master','refresh');
	}
	
	public function grade_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['grade']=$this->Super_model->grade_master();
		if(isset($id) && !empty($id)){
			$data['editgrade'] = $this->Super_model->editgrade($id);
			 $this->load->view('ui/addgrade',$data);
			// print_r($data['editsbu']);exit;
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/grade_master',$data);
		}
	}
	
	public function addgrade(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addgrade',$data);
	}
	public function addgrade_master(){
			$data = array(
		'grade' => $this->input->post('grade'));
		//print_r($data);exit;
		$data['addgrade']=$this->Super_model->addgrade($data);
			if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/grade_master'); 
			
			}else{
				redirect('main/addgrade'); 
			}
	}
	public function updategrade($id)
	{
		//$data['sbu']=$this->Super_model->sbu();
		$data['editgrade'] = $this->Super_model->editgrade($id);	
			$inputdata = array(
				'grade' => $this->input->post('grade'));
			$res=$this->Super_model->updategrade($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/grade_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/grade_master','refresh'); 
			}	
	}
	public function delete_grade($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_grade($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;"> Deleted Successfully. </div>');
        redirect(base_url().'main/grade_master','refresh');
	}
	
	public function employee_type_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['emp_type']=$this->Super_model->employee_type_master();
		if(isset($id) && !empty($id)){
			$data['editemptype'] = $this->Super_model->editemptype($id);
			 $this->load->view('ui/addemployee_type',$data);
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/employee_type_master',$data);
		}
	}
	public function addemployee_type(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addemployee_type',$data);
	
	}
   public function addemployee_master(){
		$data = array(
		'type' => $this->input->post('emp_type'));
		$data['addemployee_type']=$this->Super_model->addemployee_type($data);
			if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/employee_type_master'); 
			
			}else{
				redirect('main/addemployee_type'); 
			}
	}
	public function update_emp_type($id)
	{
		//print_r($id);exit;
		$data['editemptype'] = $this->Super_model->editemptype($id);	
			$inputdata = array(
				'type' => $this->input->post('emp_type'));
			$res=$this->Super_model->update_emp_type($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/employee_type_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/employee_type_master','refresh'); 
			}	
	}
	public function delete_emp_type($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_emp_type($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;"> Deleted Successfully. </div>');
        redirect(base_url().'main/employee_type_master','refresh');
	}
	public function designation_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['designation_master']=$this->Super_model->designation_master();
		if(isset($id) && !empty($id)){
			$data['editdes'] = $this->Super_model->editdes($id);
			 $this->load->view('ui/adddesignation',$data);
			// print_r($data['editsbu']);exit;
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/designation_master',$data);
		}
	}
	
	public function adddesignation(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/adddesignation',$data);
	}	
	 public function adddesignation_master(){
			$data = array(
		'designation' => $this->input->post('designation'));
		$data['adddesignation']=$this->Super_model->adddesignation($data);
			if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/designation_master'); 
			
			}else{
				redirect('main/adddesignation'); 
			}
	}
	public function update_des($id)
	{
		//$data['sbu']=$this->Super_model->sbu();
		$data['editdes'] = $this->Super_model->editdes($id);	
			$inputdata = array(
				'designation' => $this->input->post('designation'));
			$res=$this->Super_model->update_des($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/designation_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/designation_master','refresh'); 
			}		
	}
	public function delete_des($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_des($id);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;"> Deleted Successfully. </div>');
        redirect(base_url().'main/designation_master','refresh');
	}
	
    public function organization_master($id=false){
		$data['organization_master']=$this->Super_model->organization_master();
		if(isset($id) && !empty($id)){
			$data['editorg'] = $this->Super_model->editorg($id);
			 $this->load->view('ui/addorganization',$data);
			// print_r($data['editsbu']);exit;
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/organization_master',$data);
		}
	}
	public function addorganization(){
		
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addorganization',$data);
	}	
	 public function addorganization_master(){
		$data = array(
		'organization' => $this->input->post('organization'));
		$data['addorganization']=$this->Super_model->addorganization($data);
		if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/organization_master'); 
			
			}else{
				redirect('main/addorganization'); 
			}
	}
	public function updateorg($id)
	{
		//$data['sbu']=$this->Super_model->sbu();
		$data['editorg'] = $this->Super_model->editorg($id);	
			$inputdata = array(
				'organization' => $this->input->post('organization'));
				//print_r(oraganization);exit;
			$res=$this->Super_model->updateorg($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/organization_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/organization_master','refresh'); 
			}	
	}
	public function delete_org($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_org($id);
		$this->session->set_flashdata('msg',' <div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;"> Deleted Successfully. </div>');
        redirect(base_url().'main/organization_master','refresh');
	}
	 public function function_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['function_master']=$this->Super_model->function_master();
		if(isset($id) && !empty($id)){
			$data['editfunction'] = $this->Super_model->editfunction($id);
			 $this->load->view('ui/addfunction',$data);
			// print_r($data['editsbu']);exit;
		}else{
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/function_master',$data);
		//print_r($data);exit;
		}
	}
	public function addfunction(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addfunction',$data);
	}	  
	public function addfunction_master(){
		$data = array(
		'function' => $this->input->post('function'));
		$data['addfunction']=$this->Super_model->addfunction($data);
		if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/function_master'); 
			
			}else{
				redirect('main/addfunction'); 
			}
	}
	public function updatefunction($id)
	{
		//$data['sbu']=$this->Super_model->sbu();
		$data['editfunction'] = $this->Super_model->editfunction($id);	
			$inputdata = array(
				'function' => $this->input->post('function'));
			$res=$this->Super_model->updatefunction($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/function_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/function_master','refresh'); 
			}		
	}
	public function delete_function($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_function($id);
		$this->session->set_flashdata('msg',' <div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Deleted Successfully. </div>');
        redirect(base_url().'main/function_master','refresh');
	}
	 public function gender_master($id=false){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['gender_master']=$this->Super_model->gender_master();
		if(isset($id) && !empty($id)){
			$data['editgender'] = $this->Super_model->editgender($id);
			 $this->load->view('ui/addgender',$data);
			// print_r($data['editsbu']);exit;
		}else{
			$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/gender_master',$data);
		}
	}
	public function addgender(){
		$data['h_title'] = "Go Learn "; 	    
	    $this->load->view('ui/addgender',$data);
	}	
	public function addgender_master(){
			$data = array(
		'gender' => $this->input->post('gender'));
		$data['addgender']=$this->Super_model->addgender($data);
		if($data){
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Added Successfully.</div>');
			redirect('main/gender_master'); 
			
			}else{
				redirect('main/addgender'); 
			}
	}
	public function updategender($id)
	{
		$data['editgender'] = $this->Super_model->editgender($id);	
			$inputdata = array(
				'gender' => $this->input->post('gender'));
			$res=$this->Super_model->updategender($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center" style="color: #008a5d;
					background-color: rgba(0, 182, 122, 0.2);
					border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;">Updated Successfully.</div>');
				redirect(base_url().'main/gender_master','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'main/gender_master','refresh'); 
			}	
	}
	public function delete_gender($id){
		//if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$result= $this->Super_model->delete_gender($id);
		$this->session->set_flashdata('msg',' <div class="alert alert-success text-center" style="color: #008a5d;
    background-color: rgba(0, 182, 122, 0.2);
    border-color: #00a770;    position: relative;
    padding: 0.75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: 0.25rem;"> Deleted Successfully. </div>');
        redirect(base_url().'main/gender_master','refresh');
	}

}
?>
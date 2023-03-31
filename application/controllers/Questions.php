<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Questions extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Super_model');
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
    	public function prequestion($id=false,$view=false)
	{
	    //if($this->session->userdata('admin_login')==NULL) redirect(base_url());
		$data['id']=$id;
		$data['testquation']=$this->Admin_model->testquation($id);
        $data['testtile']=$this->Admin_model->testtile($id);
        $data['test_id']=$id;
		$data['h_title'] = "Vidhyapeeth Program"; 	    
		$this->load->view('superadmin/header',$data);
		$this->load->view('superadmin/prequestion.php',$data);
		
	
	}
	public function postquestion($id=false,$view=false)
	{
	    //if($this->session->userdata('admin_login')==NULL) redirect(base_url());
		$data['id']=$id;
		$data['testquation']=$this->Admin_model->testquation($id);
        $data['testtile']=$this->Admin_model->testtile($id);
        $data['test_id']=$id;
		$data['h_title'] = "Vidhyapeeth Program"; 	    
		$this->load->view('superadmin/header',$data);
		$this->load->view('superadmin/postquestion.php',$data);
		
	
	}
		public function prepostquestion($id=false,$view=false)
	{
	    //if($this->session->userdata('admin_login')==NULL) redirect(base_url());
		$data['id']=$id;
		$data['testquation']=$this->Admin_model->testquation($id);
        $data['testtile']=$this->Admin_model->testtile($id);
        $data['test_id']=$id;
		$data['h_title'] = "Vidhyapeeth Program"; 	    
		$this->load->view('superadmin/header',$data);
		$this->load->view('superadmin/prepostquestion.php',$data);
		
	
	}
	
	public function addquation()
    {
        $picture1 ='';
        if(isset($_FILES['image']['name'])){
        $config['upload_path'] = 'assets/images/test/';
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
		$test_id = $this->input->post('test_id');
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
		 $testtype=$this->input->post('test_type');
		  if($testtype==3){
            $data = array(
		'test_id' => $test_id,
		'quations'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4, 
		'answer'  => $answer,  
		'temp'=>1,
		'test_type'=>1
			);
			$insertUserData = $this->Admin_model->addquation($data);
			$datas = array(
		'test_id' => $test_id,
		'quations'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4, 
		'answer'  => $answer,  
		'temp'=>1,
		'test_type'=>2
			);
			$insertUserData = $this->Admin_model->addquation($datas);
        }else{
		$data1 = array(
		'test_id' => $test_id,
		'quations'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4, 
		'answer'  => $answer,  
		'temp'=>1,
		'test_type'=>$this->input->post('test_type')
			);
				$insertUserData = $this->Admin_model->addquation($data1);
        }
		if(!empty($picture1)){
				$data['image']=$picture1;
		}
		//print_r($data);exit();
        
        echo $test_id;
        // "<script>alert('Successfully submitted. Thank you.');</script>";
        //redirect(base_url('questions/prequestion/'.$test_id),'refresh');
    }
    public function addpostquation()
    {
        $picture1 ='';
        if($_FILES['image']['name']){
        $config['upload_path'] = 'assets/images/test/';
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
		$test_id = $this->input->post('test_id');
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
		'test_id' => $test_id,
		'quations'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4, 
		'answer'  => $answer  
			);
		if(!empty($picture1)){
				$data['image']=$picture1;
		}
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addpostquation($data);
         "<script>alert('Successfully submitted. Thank you.');</script>";
        redirect(base_url('questions/postquestion/'.$test_id),'refresh');
    }
    public function addprepostquation()
    {
		//print_r($_POST);exit;
        $picture1 ='';
        if($_FILES['image']['name']){
        $config['upload_path'] = 'assets/images/test/';
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
    
    	print_r($picture1);exit();
		$test_id = $this->input->post('test_id');
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
		'test_id' => $test_id,
		'quations'=> $quations,
		'option1' => $option1,
		'option2' => $option2,
		'option3' => $option3, 
		'option4' => $option4, 
		'answer'  => $answer  
			);
		if(!empty($picture1)){
				$data['image']=$picture1;
		}
		//print_r($data);exit();
        $insertUserData = $this->Admin_model->addprepostquation($data);
         "<script>alert('Successfully submitted. Thank you.');</script>";
        redirect(base_url('questions/prepostquestion/'.$test_id),'refresh');
    }

	/*-----------------------------quation------------------------------*/
	/*-----------------------------test quations------------------------*/
    public function testquation($id=false)
    {
      if($this->session->userdata('admin_login')==NULL) redirect(base_url());
        $data['testquation']=$this->Admin_model->testquation($id);
        $data['testtile']=$this->Admin_model->testtile($id);
        $data['test_id']=$id;
        $this->load->view('header.php');
        $this->load->view('sidenav.php');
        $this->load->view('testquation',$data);
       	$this->load->view('footer.php');
    }
    public function deletetestquation($id,$test_id){
        $data=$this->Admin_model->deletetestquation($id);
       $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Question Deleted Successfully.</div>');
        redirect(base_url('superadmin/editcourse/'.$test_id),'refresh');
    }
    public function edittestquation($id=false,$test_id=false){
        if($this->session->userdata('admin_login')== NULL) redirect('Welcome/loginn_admin');
        $data['testquation']=$this->Admin_model->edittestquation($id);
        $data['testtile']=$this->Admin_model->testtile($test_id);
        $data['test_id']=$test_id;
        //$this->load->view('header.php');
        //$this->load->view('sidenav.php');
        $this->load->view('edit-testquation',$data);
        //$this->load->view('footer.php');
    }
    
    public function updatequation($id){
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
        
        $test_id=$this->input->post('test_id');
        $quations=	$this->input->post('quations');
        $option1 = $this->input->post('option1');
        $option2 = $this->input->post('option2');
        $option3 = $this->input->post('option3');
        $option4 = $this->input->post('option4');
        $answer1 = $this->input->post('answer');
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
        'test_id'=>$test_id,
        'quations'=> $quations,
        'option1' => $option1,
        'option2' => $option2,
        'option3' => $option3, 
        'option4' => $option4, 
        'answer' => $answer 
        );
        if(!empty($picture1)){
				$data['image']=$picture1;
		}
        //print_r($data);exit();
        $res = $this->Admin_model->updatequation($id,$data);
         "<script>alert('Successfully submitted. Thank you. ');</script>";
        redirect(base_url('index.php/welcome/testquation/'.$test_id),'refresh');	
    }
    
/*-----------------------------test quations------------------------*/

    
}    
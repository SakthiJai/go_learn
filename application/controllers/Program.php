<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Program extends CI_Controller {
	
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
    
    // ------------------------------- login ----------------------//

	
	public function program($id=false){
	if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['program']=$this->Super_model->program();
		$data['program_types']=$this->Super_model->program_types();
		if(isset($id) && !empty($id)){
			$data['editprogram'] = $this->Super_model->editprogram($id);
		}
		$data['h_title'] = "Vidhyapeeth Program"; 	    
		$this->load->view('superadmin/header',$data);
		$this->load->view('superadmin/program.php',$data);
	}
	
    public function loginn(){
	    $this->load->view('superadmin/login');
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
        redirect(base_url().'superadmin/program','refresh');            
    }
	public function updateprogram($id)
	{
		$data['program']=$this->Super_model->program();
		$data['editprogram'] = $this->Super_model->editprogram($id);	

			$inputdata = array(
				'program_name' => $this->input->post('name')
				);
				
			$res=$this->Super_model->updateprogram($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successed.</div>');
				redirect(base_url().'superadmin/program','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'superadmin/program','refresh'); 
			}
			
	}
	public function programGroup($id=false){
	if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['group']=$this->Super_model->group();
	//	print_r($data);
		if(isset($id) && !empty($id)){
			$data['editprogramGroup'] = $this->Super_model->editprogramGroup($id);
		}
		$data['h_title'] = "Program Group"; 	    
		$this->load->view('ui/programGroup.php',$data);
	}
	public function addprogramGroup()
    {
    	//print_r($_POST);exit();
		$data = array(
		    'group_name' => $this->input->post('name'),
		);
		//print_r($data);exit();
        $insertUserData = $this->Super_model->addprogramGroup($data);
        $this->session->set_flashdata('msg','<div class="alert alert-success text-center">submit Successed.</div>');
        redirect(base_url().'Program/programGroup','refresh');            
    }
    	public function updateprogramGroup($id)
	{
		$data['program']=$this->Super_model->program();
		$data['editprogramGroup'] = $this->Super_model->editprogramGroup($id);	

			$inputdata = array(
				'group_name' => $this->input->post('name')
				);
				
			$res=$this->Super_model->updateprogramGroup($id,$inputdata);
			if($res) {
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Updated Successed.</div>');
				redirect(base_url().'Program/programGroup','refresh'); 
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> Updated Failed! Try Again </div>');
				redirect(base_url().'Program/programGroup','refresh'); 
			}
			
	}
	public function addEvalutionfeedbackForm(){
	    if($this->input->post('name')!=""){
            $data1 = array(
                        'title' => $this->input->post('name')
                    );
                    $insertid = $this->Super_model->addfeedbackEvalution($data1);
	    } 
	    else{
	        $data1 = array(
                        'evaluation_id' => $this->input->post('evalution_id'),
                        'quations' => $this->input->post('addquestion_evalution')
                    );
                    $insertid = $this->Super_model->addquestionEvalution($data1);
	    }
        if($insertid){
               $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Successfully submitted. Thank you.</div>');
            redirect(base_url().'superadmin/course','refresh'); 
        }
        else{
            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Faild please try again</div>');
            redirect(base_url().'superadmin/course','refresh'); 
        }
    }
    public function coursefeedbackForm(){
	    if($this->input->post('name')!=""){
            $data1 = array(
                        'title' => $this->input->post('name')
                    );
                    $insertid = $this->Super_model->addfeedbackEvalution($data1);
	    } 
	    else{
	        $data1 = array(
                        'evaluation_id' => $this->input->post('evalution_id'),
                        'quations' => $this->input->post('addquestion_evalution')
                    );
                    $insertid = $this->Super_model->addquestionEvalution($data1);
	    }
	    echo $insertid;
        
    }
    
    public function deleteProgram($id)
    
	{
	     //print_r($id);exit();
	    $updateUserData = $this->Super_model->deleteprogram($id);
                 $this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Program Deleted Updated</div>');
        redirect(base_url().'superadmin/program','refresh'); 
	
	}
	
	 public function deleteProgramgroup($id)
    
	{
	     //print_r($id);exit();
	    $updateUserData = $this->Super_model->deleteProgramgroup($id);
                 $this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Program Group Deleted Updated</div>');
        redirect(base_url().'program/programGroup','refresh'); 
	
	}
	public function deleteProgramtypes($id)
    
	{
	     //print_r($id);exit();
	    $updateUserData = $this->Super_model->deleteProgramtypes($id);
                 $this->session->set_flashdata('msg','<div class="alert alert-danger" style="padding: 7px; margin-top: 8px;">Program Group Deleted Updated</div>');
        redirect(base_url().'superadmin/program_types','refresh'); 
	
	}
}	
?>
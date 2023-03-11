<?php

defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Reports extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Super_model');
		$this->load->model('Admin_model');
		$this->load->model('User_model');
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
	public function attendance(){
		if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
		$data['programEvents']=$this->Super_model->programEvents();
		$data['program']=$this->Super_model->program();
		$data['attendance_events'] = $this->Admin_model->attendance_events();
		//print_r(	$data['attendance_events']->result()); exit;
		$data['h_title'] = "Attendance"; 	    
		$this->load->view('superadmin/header',$data);
	    $this->load->view('superadmin/attendance');
	}
	public function attendance_events($id,$event_id2)
    {
       // if($this->session->userdata('admin_login')==NULL) redirect(base_url());
         $data['attendance'] = $this->Admin_model->attendance($id,$event_id2);
         $data['attend_attendance'] = $this->Admin_model->attend_attendance($id,$event_id2);
         $data['absent_attendance'] = $this->Admin_model->absent_attendance($id,$event_id2);
        $data['p_name'] = $this->Admin_model->p_name($id);
        $data['event_id'] = $id;
        $data['event_id2'] = $event_id2;
        $data['h_title'] = "Attendance"; 	    
		$this->load->view('superadmin/header',$data);
        $this->load->view('superadmin/attendance2',$data);
       // $this->load->view('sidenav');
	//	$this->load->view('footer');
    }
    
    public function empolyee(){
		
		$program_id=$this->input->post('program_id');
		$emp_id=$this->input->post('emp_id');
		
		$questions = $this->Admin_model->fetchQuestions($program_id);
		foreach($emp_id as $emp):
		    if( $this->Admin_model->checkPostTestStatus($program_id, $emp)){
		    foreach($questions->result() as $question):
		       // print_r($question);
		$updata = array(
			'emp_id' =>$emp,
			'program_id' =>$program_id,
			'test_id' => $question->test_id,
			'q_id' => $question->id,
			'answer' => $question->answer,
				'points' => 1,
		'completed'=>1
			);
			
	    	$this->User_model->exam($updata);
			endforeach;
		    }
		endforeach;	
		$evaquestions = $this->Admin_model->fetchEvaQuestions($program_id);
	foreach($emp_id as $emp):
		    //if( $this->Admin_model->checkEvaTestStatus($program_id, $emp)){
		    foreach($evaquestions->result() as $question):
		      // print_r( $question);
    		$updata = array(
			'emp_id' =>$emp,
			'type' =>$question->type,
			'eve_id' =>$question->evaluation_id,
			'event_id' =>$program_id,
			'event_id2' =>2400,
			'quations' => $question->quations,
			'answer' => 1,
			);
			//print_r($updata);
			 $this->User_model->evaluation_submit($updata);
    			endforeach;
    		   // }
		endforeach;
        echo 200;
        
	}
	

    	
		public function addattendance()
    {
		$data = array(
		'program_id' => $this->input->post('program_events'),
		'attendance_type' => $this->input->post('attendance_type'),
			);
		//print_r($data);exit();
        $addattendance= $this->Super_model->addattendance($data);
		$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Attendance Added Successfully.</div>');  
        redirect(base_url().'Reports/attendance','refresh');            
    }
}	
?>
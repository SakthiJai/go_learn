<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->model('Super_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('email');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->session->keep_flashdata('msg');
        $this->load->helper('cookie');
    }
	public function index()
	{
		redirect(base_url().'superadmin','refresh');
	}
	public function CourseMig()
	{
	    $emp_id=[
	        
10006766,10005014,10002109,10002080,10004021,10013685,10006951,10009312,10012571,10012654,10008634,10013347,10012722,10012821,10009009,10009365,11004614,10002108,11004795,11004739,10004666,10013778,10012761,10001805,11004898,10012297,10010429,11004330,10004870,10002567,10012137,10012818,10003821,10007876,10001789,10012243,10006985


];
	    foreach($emp_id as $empid){
            $divisionaa = $this->db->query("SELECT id,email,division_id,sbu FROM emp WHERE emp.emp_id=$empid")->row();
            $division_id = $divisionaa->division_id;
            $email_id = $divisionaa -> email;
            //$sbu = $divisionaa->sbu;
            //print_r($division_id);exit();
            $data=array(
                'program_id'=>   1113


,

                'division_id'=>$division_id,
                'employee_id'=>$empid,
            );
            $rs= $this->Super_model->addassignemp($data);
            
        }
	}
	public function userDashboard(){
	    ////if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['h_title'] = "Go Learn Dashboard";
	   
	    $this->load->view('user/dashboard',$data);
	}
	public function courses(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['courses'] = $this->User_model->course();
	    $data['h_title'] = "Go Learn ";
	    $this->load->view('user/course',$data);
	}
    
	public function pre_test_list(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    
		$data['pre_test_list']=$this->User_model->pre_test_list();
	   // $data['course']=$this->Super_model->emp();
	    $data['h_title'] = "Go Learn ";
	    $this->load->view('user/pretest_list',$data);
	}
	
	public function pre_test($event_id,$test_id,$course_id)
	{
		//if($this->session->userdata('logged_in')==NULL) redirect(base_url());
		$emp_id =  $this->session->userdata['logged_in']['emp_id'];
		//$category_id =  $this->session->userdata['logged_in']['category_id'];
		$division_id =  $this->session->userdata['logged_in']['division_id'];
		$data['test_detail']=$this->User_model->pre_test_detail($event_id,$test_id,$course_id);
		$data['test']=$this->User_model->pre_test($test_id);
		//$data['test1']=$this->User_model->post_test1($division_id);
		$data['test_sub']=$this->User_model->pre_test_sub($event_id,$test_id);
		$data['test_result']=$this->User_model->pre_test_result($emp_id);
		//$data['test_event_id']=$this->User_model->get_posttest_event_id($division_id);
		$this->load->view('header');
		$this->load->view('pretest',$data);
		$this->load->view('sidenav');
		//print($data['test_sub']);exit();
	}
	
	public function post_test_list(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    
		$data['post_test_list']=$this->User_model->post_test_list();
	   
	    $data['h_title'] = "Go Learn ";
	    $this->load->view('user/posttest_list',$data);
	}
	public function profile(){
	    //if($this->session->userdata('superadmin_login')==NULL) redirect(base_url().'superadmin');
	    $data['emp']=$this->Super_model->emp();
		$data['division']=$this->Super_model->divisions1();
		$data['grade']=$this->Super_model->grade();
		$data['sbu']=$this->Super_model->sbu();
		$data['branch']=$this->Super_model->branch();
		$data['employee_type']=$this->Super_model->employee_type();
		$data['designation']=$this->Super_model->designation();
		$data['organization']=$this->Super_model->organization();
		$data['function_master']=$this->Super_model->function_master();
		$data['gender']=$this->Super_model->gender();
		
		$data['profile']=$this->User_model->profile($id);
		
	    $data['h_title'] = "Go Learn ";
	    $this->load->view('user/profile',$data);
	}
	public function post_test($event_id,$test_id,$course_id)
	{
		if($this->session->userdata('logged_in')==NULL) redirect(base_url());
		$emp_id =  $this->session->userdata['logged_in']['emp_id'];
		//$category_id =  $this->session->userdata['logged_in']['category_id'];
		$division_id =  $this->session->userdata['logged_in']['division_id'];
		$data['test_detail']=$this->User_model->post_test_detail($event_id,$test_id,$course_id);
		$data['test']=$this->User_model->post_test($test_id);
		//$data['test1']=$this->User_model->post_test1($division_id);
		$data['test_sub']=$this->User_model->post_test_sub($event_id,$test_id);
		$data['test_result']=$this->User_model->post_test_result($emp_id);
		//$data['test_event_id']=$this->User_model->get_posttest_event_id($division_id);
		$this->load->view('header');
		$this->load->view('post_test',$data);
		$this->load->view('sidenav');
		//print($data['test_sub']);exit();
	}
	public function logout(){
        $sess_array = array('username' => '');
        $this->session->unset_userdata('superadmin_login', $sess_array);
        $data['message_display'] = 'Successfully Logout';
		$this->load->view('ui/login');
       // redirect(base_url().'main/logout');
            
    }
}

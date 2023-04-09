<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Test extends CI_Controller {

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
	public function logout(){
        $sess_array = array('username' => '');
        $this->session->unset_userdata('superadmin_login', $sess_array);
        $data['message_display'] = 'Successfully Logout';
		$this->load->view('ui/login');
       // redirect(base_url().'main/logout');
            
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
    
	public function before(){
	    if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
		$emp_id =  $this->session->userdata['superadmin_login']['id'];
		$data['pre_test_list']=$this->User_model->pre_test_list();
		$data['test_result']=$this->User_model->pre_test_result($emp_id);
	    $data['h_title'] = "Go Learn ";
	    $this->load->view('user/pretest_list',$data);
	}
	
	public function postTest(){
	    if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
		 $emp_id =  $this->session->userdata['superadmin_login']['id'];
		//$data['pre_test_list']=$this->User_model->pre_test_list();
		 $data['post_test_list']=$this->User_model->post_test_list(); 
		 
		 $data['test_result']=$this->User_model->post_test_result($emp_id);
		 $data['h_title'] = "Go Learn ";
		 $this->load->view('user/posttest_list',$data);
	}
	
	public function pre_test($test_id,$course_id)
	{ 
		if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
		 $emp_id =  $this->session->userdata['logged_in']['emp_id'];
		 
		 $data['pre_test_list']=$this->User_model->pre_test_list($program_id);  
	 	 $data['test_detail']    =   $this->User_model->pre_test_detail($test_id,$course_id);
	  
		 
		//print_r($test_id);exit();
		$data['test_sub']       =   $this->User_model->pre_test_sub($course_id,$test_id);
		//$pre_test_competed      =   $this->User_model->pre_test_sub($event_id,$test_id);
		//print_r($pre_test_competed);exit;
		$data['test_result']    =   $this->User_model->pre_test_resultbycourse($emp_id,$test_id);
		
		//$test_start_pretest=$this->User_model->test_start_pretest($event_id,$emp_id);

		 
		$this->load->view('user/pretest',$data);
	}
	public function post_test($test_id,$course_id)
	{ 
		if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
		 $emp_id =  $this->session->userdata['logged_in']['emp_id'];
		 
		 $data['post_test_list']  =$this->User_model->post_test_list($program_id);  
		 $data['post_test_detail']=$this->User_model->post_test_detail($test_id,$course_id);
		// print_r($post_test_list);exit();
	     $data['post_test_sub']   =$this->User_model->post_test_sub($course_id,$test_id);
		 $data['post_test_result']=$this->User_model->post_test_resultbycourse($emp_id,$test_id);
		
		 
		$this->load->view('user/posttest',$data);
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
	 
	  
	    public function preTestResults($test_id,$course_id,$program_id)
		{ 
			if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
			//print_r($this->session->userdata['superadmin_login']);
			 $emp_id =  $this->session->userdata['superadmin_login']['id'];
			 
			 $data['test']=$this->User_model->test2($emp_id,$course_id,$program_id,1);
			 // print_r($test_id);exit();
			 $data['test_result'] =  $this->User_model->pre_test_resultbycourse($emp_id,$test_id);
			 
			$this->load->view('user/pretestResults',$data);
		}
		
         public function postTestResults($test_id,$course_id,$program_id)
		{ 
			if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
			//print_r($this->session->userdata['superadmin_login']);
			 $emp_id =  $this->session->userdata['superadmin_login']['id'];
			 
			 $data['test']=$this->User_model->test2($emp_id,$course_id,$program_id,2);
			 // print_r($test_id);exit();
			 $data['test_result'] =  $this->User_model->post_test_resultbycourse($emp_id,$test_id);
			 
			 $this->load->view('user/posttestResults',$data);
		}
		
		public function exam(){
	    
		$test = $_POST;
																	//print_r($test); exit();
																	//$test_id=$this->input->post('test');
		$program_id= $this->input->post('program_id');
		//print_r($program_id); exit();
		$test_type= $this->input->post('test_type');
		 //print_r($test_type);exit;
		$i = 1;
		$emp_id =  $this->session->userdata['superadmin_login']['id'];
		foreach($test as $row){
			
		$test_id = $this->input->post("t".$i);
																	//print_r($test_id); exit();
		$q_id = $this->input->post("q".$i);
		$answer = $this->input->post("o".$i);
		if(empty($answer))
			{
				$answer = "Not answered";
			}
		$updata = array(
			'emp_id' =>$emp_id,
			'program_id' =>$program_id,
			'test_id' => $test_id,
			'q_id' => $q_id,
			'answer' => $answer,
    		'completed'=>1,
		    'test_type1'=>$test_type,
			);
			//print_r($updata);exit();
		    $updata  = $this->User_model->exam($updata);
																     //print_r($data);exit;
																	 //print_r($updata);exit();
																	 // redirect(base_url().'index.php/welcome/evaluation','refresh');
			$i++;
			}
			echo "<script>alert('Test Submitted Successfully!');</script>";
			$data = $this->User_model->percentage_result($emp_id,$program_id,$test_id,$q_id,$test_type);
		
			 if($test_type==2){
				//echo 2;exit;
				//redirect(base_url().'index.php/welcome/post_test_list','refresh');
				$emp_id =  $this->session->userdata['logged_in']['emp_id'];
				$data['post_test_list']=$this->User_model->post_test_list(); 
				$data['post_test_result']=$this->User_model->post_test_result($emp_id);
				$data['h_title'] = "Go Learn ";
	             $this->load->view('user/posttest_list',$data);
			 }else{
				 $emp_id =  $this->session->userdata['logged_in']['emp_id'];
				 $data['pre_test_list']=$this->User_model->pre_test_list();
				 $data['test_result']=$this->User_model->pre_test_result($emp_id);
				 $data['h_title'] = "Go Learn ";
				 $this->load->view('user/pretest_list',$data);
		     }
		 
	    }
		public function feedback(){
			
			if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
			$data['evaluation_list']=$this->User_model->evaluation_list();
			  //print_r($data['evaluation_list']);exit;
			//$data['evaluation_cmp'] = $this->User_model->evaluation_cmp();
			$data['h_title'] = "Go Learn ";
			$this->load->view('user/feedback',$data);
	   }
	   public function evaluation2($id,$event_id1,$event_id2){
			 if($this->session->userdata('superadmin_login')==NULL) redirect(base_url());
			 $emp_id =  $this->session->userdata['superadmin_login']['id'];
		 
	    	$test_start_posttest=$this->User_model->test_start_evaluationtest($emp_id);
		     //print_r($test_start_posttest);exit;
    		 $data['evaluation_sub']= $this->User_model->evaluation_sub($id,$event_id1,$event_id2); //,$event_id1,$event_id2
    		 $data['evaluatedResult']= $this->User_model->evaluatedResult($id,$event_id1,$event_id2); 
			   
    		$data['evaluation_quations_details']= $this->User_model->evaluation_quations_details($id,$event_id1,$event_id2);
    	    $data['evaluation_quations2'] = $this->User_model->evaluation_quations2($id);
            $data['h_title'] = "Go Learn ";
			$this->load->view('user/evaluation2',$data);
	 
	}
	/*
	public function evaluation2($id,$event_id1,$event_id2){
		if($this->session->userdata('logged_in')==NULL) redirect(base_url());
		$emp_id =  $this->session->userdata['logged_in']['emp_id'];
		$test_start_posttest=$this->User_model->test_start_evaluationtest($event_id1,$emp_id);
		//print_r($test_start_posttest);exit;
    		$data['evaluation_sub']= $this->User_model->evaluation_sub($id,$event_id1,$event_id2);
    		$data['evaluation_quations_details']= $this->User_model->evaluation_quations_details($id,$event_id1,$event_id2);
    		$data['evaluation_quations2'] = $this->User_model->evaluation_quations2($id);
    //if($test_start_posttest>0){
    		$this->load->view('header');
    		$this->load->view('evaluation2',$data);
    		$this->load->view('sidenav');
		/*}else{
		  //  echo "<script>alert('Your test not start yet');</script>";
		   $data['testDateNotReached']=true;
		   $data['evaluation_list']=$this->User_model->evaluation_list();
		$data['evaluation_cmp'] = $this->User_model->evaluation_cmp();
		$this->load->view('header');
		$this->load->view('evaluations',$data);
		$this->load->view('sidenav');
		    
		}*/
		public function evaluation_submit2(){
		$test = $_POST;
	//	print_r($test); exit();
		$emp_id =  $this->session->userdata['superadmin_login']['id'];
		//$division_id =  $this->session->userdata['logged_in']['division_id'];
		//$sbu =  $this->session->userdata['logged_in']['sbu'];
		$eva_id =  $this->input->post('eva_id');
		$event_id =  $this->input->post('event_id');
		$event_id2 =  '';//$this->input->post('event_id2');
		$i = 1;
		//print_r($eva_id);print_r($event_id);print_r($event_id2);exit();
		
		 /*$data = array(
		     'emp_id' =>$emp_id,
		     'division_id' =>$division_id,
		     'sbu' =>$sbu,
		     'event_id' =>$event_id,
	         'event_id2' =>$event_id2,
		     );
		 $data1= $this->User_model->event_attend($data);*/
	//	if($data1 == 2){
		foreach($test as $row){
		$type = $this->input->post("type".$i);
		$q_id = $this->input->post("q".$i);
		$answer = $this->input->post("o".$i);
	    //print_r($q_id); exit();
		
		if(empty($answer))
			{
				$answer = 1;
			}
		 
		$updata = array(
			'emp_id' =>$emp_id,
			'type' =>$type,
			'eve_id' =>$eva_id,
			'event_id' =>$event_id,
			'event_id2' =>$event_id2,
			'quations' => $q_id,
			'answer' => $answer,
			);
			//print_r($updata);exit();
			$updata1  = $this->User_model->evaluation_submit($updata);
			// print_r($updata);exit();
			//redirect(base_url().'index.php/welcome/evaluation','refresh');
			$i++;
			}
		   // }
		    $update            = $this->User_model->update_ass_emp($event_id,$emp_id);
		    $update_test_complete = $this->User_model->update_test_complete($event_id,$emp_id);
		    $update_cost = $this->User_model->update_cost($event_id,$emp_id);
		    //print_r($update_cost);exit;
			//echo "<script>alert('test successfully submitted');</script>";
			//redirect($_SERVER['HTTP_REFERER']);
			//redirect(base_url().'welcome/evaluation2/'.$eva_id.$event_id.$event_id2);
		
		$data['evaluation_sub']= $this->User_model->evaluation_sub($eva_id,$event_id,$event_id2);
		$data['evaluation_quations_details']= $this->User_model->evaluation_quations_details($eva_id,$event_id,$event_id2);
		$data['evaluation_quations2'] = $this->User_model->evaluation_quations2($eva_id);
		
		$data['h_title'] = "Go Learn ";
		$this->load->view('user/evaluation2',$data);
	}
	 
	
	
}

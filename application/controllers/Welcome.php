<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->model('Super_model');
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
}

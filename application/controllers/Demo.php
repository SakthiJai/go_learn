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
		$this->load->view('ui/zzz');
	}
    public function loginn(){
	    $this->load->view('ui/zzz');
	}
}
?>
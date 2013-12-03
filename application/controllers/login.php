<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
		{
			parent::__construct();
		 	$this->load->helper('url');
			$this->load->database();
			$this->load->library('form_validation');
		}
// view  login
	public function index()
	{
		$this->load->view('viewLogin');  
	}
//check_login
	public function check_login()
	{
			    $this->form_validation->set_rules('User_Name','required|min_length[4]|xss_clean');
				$this->form_validation->set_rules('User_Pass','required|min_length[4]|xss_clean');
				
				if ($this->form_validation->run() === false)
				 {
					 $this->session->set_flashdata('msg','Please login again.');
					 $this->session->set_flashdata('msg_class','alert-danger');
					 redirect('login', 'location'); 
				 }else
				  {
					 $data['User_Name'] = str_replace(" " , "" ,mysql_real_escape_string(
					 $this->input->post('User_Name')));
					 
					 $data['User_Pass'] = str_replace(" " , "" , md5("saad".mysql_real_escape_string(
					 $this->input->post('User_Pass')))); 
					 $this->load->model('login_model');
					 if($this->login_model->check_login($data) == TRUE)
					 { 
					 	redirect('login/c_panel', 'location'); 
					 }
					 else{
					   $this->session->set_flashdata('msg','Please login again.');
					   $this->session->set_flashdata('msg_class','alert-danger');
					   redirect('login', 'location'); 
						  }
				  }  
	}
/// log out
	public function log_out()
	{
		$this->session->sess_destroy();
		 redirect('home', 'location'); 
	}
//check_login
	public function c_panel()
	{
		$Type =  $this->session->userdata('Type');
		switch($Type){
			case"admin":
				$this->load->view('view_cpanel'); 
				break;
			default: 
				redirect('login', 'location'); 
		}
	}
}

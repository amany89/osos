<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
		{
			parent::__construct();
		 	$this->load->helper('url');
			$this->load->database();
		}
// view  login
	public function index()
	{
		$this->load->view('viewLogin');  
	}
}

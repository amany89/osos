<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setDataNews extends CI_Controller {

	function __construct()
		{
			parent::__construct();
		 	$this->load->helper('url');
			$this->load->database();
			$this->load->library('grocery_CRUD');
			$this->load->library('grocery_CRUD_multi');
		}
// view  login
	public function index()
	{
		$this->load->view('viewLogin');  
	}

function setNewsOsos()
{   
	   $companyName="News for OSOS Main";
	   $GCM = new Grocery_crud_multi();
	
	   $GCM->grid_add(1);
	
	   $GCM->grids[1]->set_table('newssite');
	   
	   
	
	   $GCM->grid_add(2);
	
	   $GCM->grids[2]->set_table('slider');
	   $output = $GCM->render();
	   $this->load->view('viewSetDataLang',$output);
	   $this->_example_output_multi($output);
	   $this->load->view('viewSetDataLangEnd');
}
	
function _example_output_multi($output = null)
{
   if(is_array($output['output']))
	$output['output'] = implode(' ',$output['output']);
  
   $this->load->view('SetDataLang',$output);
}
}

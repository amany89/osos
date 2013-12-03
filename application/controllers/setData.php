<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SetData extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('maindata_model');
	   		$this->load->helper(array('form', 'url'));
		    $this->load->library('form_validation');
			$this->load->library('grocery_CRUD');
			$this->load->library('upload');
		}
// view  login
	public function index()
	{
		redirect('login/log_out', 'location');
	}
//setAbout
	public function setAbout()
	{
		$ID = (int)$this->uri->segment(3);
		if($ID>0&&$ID<=5){
			switch($ID){
				case 1:
					$companyName="About OSOS Main";
					break;
				case 2:
					$companyName="About Air Condition";
					break;
				case 3:
					$companyName="About Fire Fighting";
					break;
				case 4:
					$companyName="About Contracting";
					break;
				case 5:
					$companyName="About Commercial";
					break;
				default:
					$companyName="";
				}
			 $this->session->set_userdata('companyName', $companyName);
			 $Data['about_ar'] = $this->maindata_model->get_about($ID,1);
			 $Data['about_eng'] = $this->maindata_model->get_about($ID,2);
		     $this->load->view('SetAbout',$Data);
			
			}else{
				redirect('login/log_out', 'location');
				}		    
	}

//update_about_eng
	public function update_about_eng()
	{
		$com_id_eng   = (int)$this->input->post('com_id_eng');
		if($com_id_eng>1&&$com_id_eng<12){
		$this->form_validation->set_rules('name_eng' ,'title','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('content_eng','content' ,'required|min_length[5]|xss_clean');
		if ($this->form_validation->run() == false) {
			
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('setData/setAbout/'.$com_id_eng, 'location');
			
		}
		else
		{
			$this->load->model('maindata_model');
			if($this->maindata_model->update_about_eng()){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/setAbout/'.$com_id_eng, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error conent');
				redirect('setData/setAbout/'.$com_id_eng, 'location');
				}
		}
		}
	}
//update_about_ar
	public function update_about_ar()
	{
		$com_id_ar   = (int)$this->input->post('com_id_ar');
		if($com_id_ar>1&&$com_id_ar<12){
		$this->form_validation->set_rules('name_ar' ,'title','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('content_ar','content' ,'required|min_length[5]|xss_clean');
		if ($this->form_validation->run() == false) {
			
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('setData/setAbout/'.$com_id_ar.'#horizontalTab2', 'location');
			
		}
		else
		{
			$this->load->model('maindata_model');
			if($this->maindata_model->update_about_ar()){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/setAbout/'.$com_id_ar.'#horizontalTab2', 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error conent');
				redirect('setData/setAbout/'.$com_id_ar.'#horizontalTab2', 'location');
				}
		}
		}
	}
//setSlider
	public function setSlider()
	{
		$ID = (int)$this->uri->segment(3);
		if($ID>0&&$ID<=5){
			switch($ID){
				case 1:
					$companyName="Slider for OSOS Main";
					break;
				case 2:
					$companyName="Slider for Air Condition";
					break;
				case 3:
					$companyName="Slider for Fire Fighting";
					break;
				case 4:
					$companyName="Slider for Contracting";
					break;
				case 5:
					$companyName="Slider for Commercial";
					break;
				default:
					$companyName="";
				}
			$this->session->set_userdata('companyName', $companyName);
			$crud = new grocery_CRUD(); 
			$crud->set_theme('datatables');
			$crud->set_subject($companyName);
			$crud->set_table('slider');
			$crud->or_where('CompanyID',$ID);
			$crud->unset_read();
			$crud->required_fields('captionAR','captionEN','imagePath');
			$crud->columns('captionAR','captionEN','urlImage','imagePath');
			$crud->display_as('captionAR','النص')->display_as('captionEN','caption')->display_as('urlImage','رابط الصورة')->display_as('imagePath','الصورة');  
			$crud->set_rules('urlImage','urlImage','required|callback_checking_url'); 
			$crud->change_field_type('CompanyID','hidden',$ID);
			$TimeNow       = date("Y-m-d H:i:s") ;
			$crud->change_field_type('Date','hidden',$TimeNow);  
			$crud->change_field_type('isActive','hidden',1);
			$crud->set_field_upload('imagePath','assets/uploads/files');
			$output = $crud->render();
			$this->_example_output($output); 
			}
	}

//setNewsletter
	public function setNewsletter()
	{
		$ID = (int)$this->uri->segment(3);
	
		if($ID>0&&$ID<=5){
			switch($ID){
				case 1:
					$companyName="Newsletter for OSOS Main";
					break;
				case 2:
					$companyName="Newsletter for Air Condition";
					break;
				case 3:
					$companyName="Newsletter for Fire Fighting";
					break;
				case 4:
					$companyName="Newsletter for Contracting";
					break;
				case 5:
					$companyName="Newsletter for Commercial";
					break;
				default:
					$companyName="";
				}	
			$this->session->set_userdata('companyName', $companyName);
			$crud = new grocery_CRUD(); $crud->set_theme('datatables');
			$crud->set_subject($companyName);
			$crud->set_table('newslsubsc');
			$crud->unset_read();
			$crud->or_where('CompanyID',$ID);
			$crud->required_fields('Mail');
			$crud->columns('Mail');
			$crud->display_as('Mail','البريد الإلكترونى');  
			$crud->set_rules('Mail','Mail','required|valid_email'); 
			$crud->change_field_type('CompanyID','hidden',$ID);
			$TimeNow       = date("Y-m-d H:i:s") ;
			$crud->change_field_type('Date','hidden',$TimeNow);  
			$crud->change_field_type('isActive','hidden',1);
			$output = $crud->render();
			$this->_example_output($output); 
			}
	}
function checking_url($urlImage)
	{
		if(filter_var($urlImage, FILTER_VALIDATE_URL) === FALSE)
		{
			$this->form_validation->set_message('checking_url', 'The %'.$urlImage.' is not valid url');
			return false;
		}else{ return true;}
	}
public function _example_output($output = null)
	{
		$this->load->view('viewGrudData',$output);
	}

//setNews
	public function setNews()
	{
		$ID = (int)$this->uri->segment(3);
		if($ID>0&&$ID<=5){
			switch($ID){
				case 1:
					$companyName="News OSOS Main";
					break;
				case 2:
					$companyName="News Air Condition";
					break;
				case 3:
					$companyName="News Fire Fighting";
					break;
				case 4:
					$companyName="News Contracting";
					break;
				case 5:
					$companyName="News Commercial";
					break;
				default:
					$companyName="";
				}
			 $this->session->set_userdata('companyName', $companyName);
			 $Data['news_ar'] = $this->maindata_model->get_news($ID,1);
			 $Data['news_eng'] = $this->maindata_model->get_news($ID,2);
			 $Data['CompanyID'] = $ID;
		     $this->load->view('SetNews',$Data);
			
			}else{
				redirect('login/log_out', 'location');
				}		    
	}

//addENews
	public function addENews()
	{
		$Data['comp_ID'] = (int)$this->uri->segment(3);
		if($Data['comp_ID']>0&&$Data['comp_ID']<=5){
			$this->load->view('addENews',$Data);
		}else{
			redirect('login/log_out', 'location');
			}
	}
//addANews
	public function addANews()
	{
		$Data['comp_ID'] = (int)$this->uri->segment(3);
		if($Data['comp_ID']>0&&$Data['comp_ID']<=5){
			$this->load->view('addANews',$Data);
		}else{
			redirect('login/log_out', 'location');
			}
	}
//edit_news_eng
	public function editENews()
	{
		$ID  = (int)$this->uri->segment(3);
	    $Data['news'] = $this->maindata_model->get_item_news($ID);
	    $this->load->view('editENews',$Data);
		    
	}
//edit_news_eng
	public function editANews()
	{
		$ID  = (int)$this->uri->segment(3);
	    $Data['news'] = $this->maindata_model->get_item_news($ID);
	    $this->load->view('editANews',$Data);
		    
	}
//update_news_eng
	public function update_news_eng()
	{
		$ID  = (int)$this->input->post('txt_ID');
		$this->form_validation->set_rules('name_eng' ,'title','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('content','content' ,'required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('urlImage','image url' ,'min_length[5]|xss_clean|callback_checking_url');
				
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('setData/editENews/'.$ID, 'location');
			
		}
		else
		{ 
		$txt_attach_f = $_FILES['txt_attach']['name'];	
		
		if(!empty($txt_attach_f)){
		$config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']    = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        $field_name = "userfile";
        
		if($this->upload->do_upload("userfile")){
				
			$uploaded_image = $this->upload->file_name;
			$this->load->model('maindata_model');
			if($this->maindata_model->update_news($uploaded_image)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/editENews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/editENews/'.$ID, 'location');
				}

    	}  else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg',$error);
				redirect('setData/editENews/'.$ID, 'location');
				}
		}else{
			
			$uploaded_image="";
			if($this->maindata_model->update_news($uploaded_image)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/editANews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/editANews/'.$ID, 'location');
				}
			
			}
		}
	}
//insert_news_eng
	public function insert_news_eng()
	{
		$ID  = (int)$this->input->post('comp_ID');
		$this->form_validation->set_rules('name_eng' ,'title','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('content','content' ,'required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('urlImage','image url' ,'min_length[5]|xss_clean|callback_checking_url');	
		if (empty($_FILES['userfile']['name']))
					{
						$this->form_validation->set_rules('userfile', 'image', 'upload image');
					}
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('setData/setNews/'.$ID, 'location');
		}
		else
		{ 

		$config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']    = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        $field_name = "userfile";
        
		if($this->upload->do_upload("userfile")){
				
			$uploaded_image = $this->upload->file_name;
			$this->load->model('maindata_model');
			if($this->maindata_model->add_news($uploaded_image,2)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/setNews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/setNews/'.$ID, 'location');
				}

    	}  else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg',$error);
				redirect('setData/setNews/'.$ID, 'location');
				}
		}
	}
//insert_news_eng
	public function insert_news_ar()
	{
		$ID  = (int)$this->input->post('comp_ID');
		$this->form_validation->set_rules('name_eng' ,'title','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('content','content' ,'required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('urlImage','image url' ,'min_length[5]|xss_clean|callback_checking_url');	
		if (empty($_FILES['userfile']['name']))
					{
						$this->form_validation->set_rules('userfile', 'image', 'upload image');
					}
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('setData/setNews/'.$ID, 'location');
		}
		else
		{ 

		$config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']    = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        $field_name = "userfile";
        
		if($this->upload->do_upload("userfile")){
				
			$uploaded_image = $this->upload->file_name;
			$this->load->model('maindata_model');
			if($this->maindata_model->add_news($uploaded_image,1)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/setNews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/setNews/'.$ID, 'location');
				}

    	}  else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg',$error);
				redirect('setData/setNews/'.$ID, 'location');
				}
		}
	}
//update_news_ar
	public function update_news_ar()
	{
		$ID  = (int)$this->input->post('txt_ID');
		$this->form_validation->set_rules('name_eng' ,'title','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('content','content' ,'required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('urlImage','image url' ,'min_length[5]|xss_clean|callback_checking_url');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('setData/editENews/'.$ID, 'location');
		}
		else
		{ 
		$txt_attach_f = $_FILES['txt_attach']['name'];	
		
		if(!empty($txt_attach_f)){

		$config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']    = '10000';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config); 
        $field_name = "userfile";
        
		if($this->upload->do_upload("userfile")){
				
			$uploaded_image = $this->upload->file_name;
			$this->load->model('maindata_model');
			if($this->maindata_model->update_news($uploaded_image)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/editANews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/editANews/'.$ID, 'location');
				}

    	}  else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg',$error);
				redirect('setData/editANews/'.$ID, 'location');
				}
		}else{
			
			$uploaded_image="";
			if($this->maindata_model->update_news($uploaded_image)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/editANews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/editANews/'.$ID, 'location');
				}
			
			}
		}	
	}
//deleteNews
	public function deleteNews()
	{
		$ID  = (int)$this->uri->segment(3);
		$ID  = (int)$this->uri->segment(3);
		$delete_id= $this->maindata_model->del_news($ID);
	    if($delete_id==false){
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-success');
				$this->session->set_flashdata('msg','success');
	  	    	redirect('setData/setNews/'.$delete_id, 'location');
				}
	}

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {

	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->model('projects_model');
			$this->load->model('name_space_Model');
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
//setProjects
	public function setProjects()
	{
		$ID = (int)$this->uri->segment(3);
		if($ID>0&&$ID<=5){
			switch($ID){
				case 1:
					$companyName="Projects OSOS Main";
					break;
				case 2:
					$companyName="Projects Air Condition";
					break;
				case 3:
					$companyName="Projects Fire Fighting";
					break;
				case 4:
					$companyName="Projects Contracting";
					break;
				case 5:
					$companyName="Projects Commercial";
					break;
				default:
					$companyName="";
				}
			 $this->session->set_userdata('companyName', $companyName);
			 $Data['proj_ar'] = $this->projects_model->get_projects($ID,1);
			 $Data['proj_eng'] = $this->projects_model->get_projects($ID,2);
			 $Data['CompanyID'] = $ID;
		     $this->load->view('SetProjects',$Data);
			
			}else{
				redirect('login/log_out', 'location');
				}		    
	}
//add projects arabic	
public function addAProj()
	{
		$Data['comp_ID'] = (int)$this->uri->segment(3);
		$Data['country'] = $this->name_space_Model->get_items(3);
		$Data['city']    = $this->name_space_Model->get_items(4);
		$Data['region']  = $this->name_space_Model->get_items(5);
		if($Data['comp_ID']>0&&$Data['comp_ID']<=5){
			$this->load->view('addAproject',$Data);
		}else{
			redirect('login/log_out', 'location');
			}
	}
//insert projects arabic	
public function insert_project_ar()
	{
		$com_id   = (int)$this->input->post('comp_ID');
		$this->form_validation->set_rules('txt_title_prj' ,'العنوان','required|min_length[5]|xss_clean');
		if (empty($_FILES['userfile']['name']))
			{
			$this->form_validation->set_rules('userfile', 'image', 'upload image');
		}
		$this->form_validation->set_rules('txt_image_main','النص الخاص بالصورة الرئبسية' ,'required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('txt_title_prj' ,'العنوان','required|min_length[5]|xss_clean');
		$this->form_validation->set_rules('txt_country_pj','بلد المشروع ','required|greater_than[0]');
		$this->form_validation->set_rules('txt_city_pj','مدينة المشروع ','required|greater_than[0]');
		$this->form_validation->set_rules('txt_region_pj','منطقة المشروع ','required|greater_than[0]');
		$this->form_validation->set_rules('txt_desc_pj' ,'وصف المشروع','required|min_length[5]|xss_clean');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('msg_class','alert alert-danger');
			$this->session->set_flashdata('msg','error conent');
			redirect('projects/addAProj/'.$com_id.'#horizontalTab2', 'location');
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
			$count_images   = (int)$this->input->post('count_images');
			$CaptionArrayAR = "";
			$CaptionArrayEN = "";
			$ImageArray     = "";
			while($count_images>0){
				if (!empty($_FILES['userfile_'.$count_images]['name'])){
					if($this->upload->do_upload("userfile")){
						$CaptionArrayAR   = $CaptionArrayAR.$this->input->post('txt_image_ar_'.$count_images).',';
						$CaptionArrayEN   = $CaptionArrayEN.$this->input->post('txt_image_en_'.$count_images).',';
						$ImageArray       = $ImageArray.$this->upload->file_name.',';
					}
					}
				$count_images--;
				}print_r($ImageArray);
			/*if($this->maindata_model->add_news($uploaded_image,2)){
				$this->session->set_flashdata('msg_class','alert alert-success');
			$this->session->set_flashdata('msg','success');
				redirect('setData/setNews/'.$ID, 'location');
			}else{
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg','error  conent');
				redirect('setData/setNews/'.$ID, 'location');
				}*/

    	}  else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('msg_class','alert alert-danger');
			    $this->session->set_flashdata('msg',$error);
				redirect('projects/addAProj/'.$ID, 'location');
				}
			}
	}
//edit Projects eng
	public function editEProj()
	{
		$ID = (int)$this->uri->segment(3);
		$this->session->set_userdata('companyName', $companyName);
		$project_data = $this->projects_model->get_item_proj($ID);
		$this->load->view('SetProjects',$Data);
	}
function check_default($array)
{
  foreach($array as $element)
  {
    if($element == '0')
    { 
      return FALSE;
    }
  }
 return TRUE;
}
}

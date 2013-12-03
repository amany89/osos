<?php
class Maindata_Model  extends CI_Model 
 {
	private $ID ;
	private $CompanyID ; 
	private $langID ;
    const Is_Active = 1 ; 
//get about
 public function get_about ($ID_about,$lang_id)
	 {
        (int)$this->CompanyID     = $ID_about;
        (int)$this->langID        = $lang_id;
		$Where = array('CompanyID'=>(int)$this->CompanyID,'langID'=>(int)$this->langID,'isActive'=>(bool)self::Is_Active  );
		
		$this->db->select('ID, Title,Content,CompanyID');
        $this->db->from('about');
        $this->db->where($Where);
		$this->db->order_by('Date');
		$this->db->limit(1);
        $Result = $this->db->get();	
		$NumRow  = $Result->num_rows() ; 
			if($NumRow >0){
				foreach($Result ->result() as $ResultRow)
						{
							
							   $Data[] = $ResultRow;  
						}
			   return $Data ; 
			   
			}else{  return $NumRow;return FALSE ;}
       } 
//get news
 public function get_news ($ID_news,$lang_id)
	 {
        (int)$this->CompanyID     = $ID_news;
        (int)$this->langID        = $lang_id;
		$Where = array('CompanyID'=>(int)$this->CompanyID,'langID'=>(int)$this->langID,'isActive'=>(bool)self::Is_Active  );
		
		$this->db->select('ID, Title,Content,urlImage,imagePath,CompanyID');
        $this->db->from('newssite');
        $this->db->where($Where);
		$this->db->order_by('Date');
        $Result = $this->db->get();			
		$NumRow = $Result->num_rows() ; 
			if($NumRow >0){
				$Result     = $Result ->result() ;
			   return $Result ; 
			   
			}else{  return $NumRow;return FALSE ;}
       } 
//get news
 public function get_item_news ($ID_news)
	 {
        (int)$this->ID        = $ID_news;
		$Where = array('ID'=>(int)$this->ID);
		$this->db->select('*');
        $this->db->from('newssite');
        $this->db->where($Where);
		$this->db->order_by('Date');
        $Result = $this->db->get();			
		$NumRow = $Result->num_rows() ; 
			if($NumRow >0){
				$Result     = $Result->row_array() ;
			   return $Result ; 
			   
			}else{  return $NumRow;return FALSE ;}
       }
//update_news
 public function update_news ($image_upload)
	 {
		 (int)$this->ID = $this->input->post('txt_ID');
		 $Title         = $this->input->post('name_eng');
		 $Content       = $this->input->post('content');
		 $urlImage       = $this->input->post('urlImage');
		 if($this->ID>0){
		if($image_upload!=""){
			 $updae_array = array(
							 'Title'       =>$Title  ,
							 'Content'       =>$Content ,
							 'urlImage'       =>$urlImage  ,
							 'imagePath'       =>$image_upload
							 );
			}else{
				$updae_array = array(
							 'Title'       =>$Title  ,
							 'Content'       =>$Content ,
							 'urlImage'       =>$urlImage  
							 );
				}
		
		$this->db->where('ID', $this->ID );
		if($updae_rule     =  $this->db->update('newssite', $updae_array)){
			return true;
			}else{
				echo mysql_error();
				}
		
		}
	 }
//update_news
 public function add_news ($image_upload,$lang_id)
	 {
		 (int)$this->ID = $this->input->post('comp_ID');
		 $Title         = $this->input->post('name_eng');
		 $Content       = $this->input->post('content');
		 $urlImage       = $this->input->post('urlImage');
		 if($this->ID>0){
		 $updae_array = array(
							 'Title'       =>$Title  ,
							 'Content'     =>$Content ,
							 'CompanyID'   =>$this->ID  ,
							 'langID'      =>(int)$lang_id  ,
							 'urlImage'    =>$urlImage  ,
							 'imagePath'   =>$image_upload
							 );
		if($updae_rule     =  $this->db->insert('newssite', $updae_array)){
			return true;
			}else{
				echo mysql_error();
				}
		
		}
	 }
 public function update_about_eng ()
	 {
		 (int)$this->ID = $this->input->post('txt_ID_eng');
		 $Title         = $this->input->post('name_eng');
		 $Content       = $this->input->post('content_eng');
		 if($this->ID>0){
		 $updae_array = array(
							 'Title'       =>$Title  ,
							 'Content'       =>$Content 
							 );
		$this->db->where('ID', $this->ID );
		if($updae_rule     =  $this->db->update('about', $updae_array)){
			return true;
			}else{
				echo mysql_error();
				}
		
		}
	 }
 public function update_about_ar ()
	 {
		 (int)$this->ID = $this->input->post('txt_ID_ar');
		 $Title         = $this->input->post('name_ar');
		 $Content       = $this->input->post('content_ar');
		 if($this->ID>0){
		 $updae_array = array(
							 'Title'       =>$Title  ,
							 'Content'       =>$Content 
							 );
		$this->db->where('ID', $this->ID );
		if($updae_rule     =  $this->db->update('about', $updae_array)){
			return true;
			}else{
				echo mysql_error();
				}
		
		}
	 }
//delete news
 public function del_news ($del_id)
	 {
		(int)$this->ID = $del_id;
		$Where = array('ID'=>(int)$this->ID);
		$this->db->select('ID as delete_id');
        $this->db->from('newssite');
        $this->db->where($Where);
		$this->db->order_by('Date');
        $Result = $this->db->get();			
		$NumRow = $Result->num_rows() ; 
			if($NumRow >0){
				$Result     = $Result->row_array() ;
			   extract( $Result ); 
				 if($this->ID>0){
				 $this->db->where('id', $this->ID);
				 if($this->db->delete('newssite')){
					 return $delete_id;			 
				 }else{
					 return false;
					 }
				 }
			}else{ return FALSE ;}
	 }
//get_projects
 public function get_projects ($ID_proj,$lang_id)
	 {
        (int)$this->CompanyID     = $ID_proj;
        (int)$this->langID        = $lang_id;
		$Where = array('CompanyID'=>(int)$this->CompanyID );
		
		$this->db->select('ID, Title,Content,urlImage,imagePath,CompanyID');
        $this->db->from('projects');
		$this->db->join('namespaces', 'projects.CompanyID = namespaces.ID', 'INNER');	
        $this->db->where($Where);
		$this->db->order_by('Date');
        $Result = $this->db->get();			
		$NumRow = $Result->num_rows() ; 
			if($NumRow >0){
				$Result     = $Result ->result() ;
			   return $Result ; 
			   
			}else{  return $NumRow;return FALSE ;}
       } 
}
?>
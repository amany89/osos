<?php
class Projects_Model  extends CI_Model 
 {
	private $ID ;
	private $CompanyID ; 
	private $langID ;
    const Is_Active = 1 ; 
//get_projects
 public function get_projects ($comp_id,$lang_id)
	 {
        (int)$this->CompanyID     = $comp_id;
        (int)$this->langID        = $lang_id;
		$Where = array('CompanyID'=>(int)$this->CompanyID,'langID'=>(int)$this->langID,'isActive'=>(bool)self::Is_Active  );
		
		$this->db->select('prj_id,ProjectTitle,ImageArray,Project_year,country,city');
        $this->db->from('view_projects');
        $this->db->where($Where);
		$this->db->order_by('Date');
        $Result = $this->db->get();			
		$NumRow = $Result->num_rows() ; 
			if($NumRow >0){
				$Result     = $Result ->result() ;
			   return $Result ; 
			   
			}else{  return $NumRow;return FALSE ;}
       } 
//get_projects
 public function get_item_proj ($proj_id)
	 {
        (int)$this->ID     = $proj_id;
		$Where = array('CompanyID'=>(int)$this->CompanyID,'langID'=>(int)$this->langID,'isActive'=>(bool)self::Is_Active  );
		
		$this->db->select('prj_id,ImageArray,CaptionArray,Project_year,ProjectTitle,description,status,isActive,Date,country,city,region,Company,CompanyID,lang,langID');
        $this->db->from('view_projects');
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
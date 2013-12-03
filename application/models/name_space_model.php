<?php
class Name_Space_Model  extends CI_Model 
 {
	private $ID ;
	private $ParentID ; 
    const Is_Active = 1 ; 
//get_country
 public function get_items ($p_id)
	 {
		 (int)$this->ParentID     = $p_id;
		$Where = array('ParentID'=>$this->ParentID ,'IsActive'=>(bool)self::Is_Active  );
		$this->db->select('ID,Name');
        $this->db->from('namespaces');
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
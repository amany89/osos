<?php
class Login_Model  extends CI_Model 
 {
 	 private $User_Name ; 
	 private $Password ;
	 const Is_Active = 1 ; 
     public function check_login ($data)
	 {
        (string)$this->User_Name = $data['User_Name'];
	    (string)$this->Password  = $data['User_Pass'];
		$Where = array('userName'=>(string)$this->User_Name ,'password'=>(string)$this->Password ,
		'Isactive'=>(bool)self::Is_Active   );
		
		$this->db->select('ID, firstName,lastName,type');
        $this->db->from('users');
        $this->db->where($Where);
		$this->db->limit(1);
        $ResultLogin = $this->db->get();			
		$NumRowResultLogin  = $ResultLogin->num_rows() ; 
			if($NumRowResultLogin >0){
				$ReturnUserData     = $ResultLogin->row_array() ;
	
							 $ID           = $ReturnUserData['ID'];
							 $firstName    = $ReturnUserData['firstName'];
							 $lastName     = $ReturnUserData['lastName'];
							 $Type         = $ReturnUserData['type'];
							 
							 $SessionData = array (
							  'id'=>$ID ,
							  'firstName'=>$firstName ,
							  'lastName'=>$lastName,
							  'Type'=>$Type,
							  'login'=>TRUE);
							 $this->session->set_userdata($SessionData);
							 return TRUE ; 
			}else{return FALSE ;}
       } 
/////////////////////////////////////////end insert details /////////////////////////////////////////////////////////////////////////////////////

}
?>
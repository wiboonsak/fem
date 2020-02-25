<?php 
 class alumni_model extends CI_Model
 { 
     function list_alumniData(){
		//$userupdate=$this->session->userdata('user_id'); 
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_alumni_data');
		
		return $query;		
	}  
	/////////////////////////////////////////////
		 
	function get_alumniDetail($data_id=NULL){
		//$userupdate=$this->session->userdata('user_id'); 		
		$this->db->where('id', $data_id);
		$this->db->where('data_status', '1');
		$this->db->select('*');		
		$query = $this->db->get('tbl_alumni_data');
		
		return $query;		
	}	  
	//--------------------------- 
		 
	function addAlumni($name=NULL ,$old_name=NULL ,$studentID_number=NULL ,$email=NULL ,$telephone=NULL ,$password=NULL){
		
		 $today = date("Y-m-d");	 
		
		 $data = array(
         'name' => $name,
         'old_name' => $old_name,
         'ID_card' => $studentID_number,
         'email' => $email,                 
         'telephone' => $telephone,                 
         'password' => md5($password),                 
         'date_add' => $today);
         		  
         if($this->db->insert('tbl_alumni_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;		
			 
		    $this->session->set_userdata('login', 'yes');
		    //$this->session->set_userdata('chceckRegis', '1');
		 
		 }else{			 
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	} 
	//---------------------------
		 
	function do_alumniLogin($email , $password){
           $password = md5($password);
           $this->db->where('email', $email);
           $this->db->where('password', $password);
           $this->db->where('data_status', '1');
           $query = $this->db->get('tbl_alumni_data');

           //SELECT * FROM users WHERE username = '$username' AND password = '$password'
           if($query->num_rows() > 0){
			   
			    $this->db->where('email', $email);
           		$this->db->where('password', $password);
           		$this->db->where('data_status', '1');
				$this->db->select('id');
				$query = $this->db->get('tbl_alumni_data');
				$row=$query->row();
				$alumni_id=$row->id;					
			   
           		$this->session->set_userdata('login', 'yes');
			    return $alumni_id;
			   
           } else {
			   
                return '0';
           }
    } 
		
	//---------------------------
	 
	 function do_editAlumniData($txt=NULL,$dataID=NULL,$field=NULL){	 
		
		 $data = array(
         $field => $txt,); 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_alumni_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	 	
	
	 //---------------------------	 
	 function do_searchAlumni($txt_search){
		
		$sql = "SELECT name FROM tbl_alumni_data WHERE data_status = '1' AND name LIKE '%".$txt_search."%' ORDER BY name ASC  ";
        $query = $this->db->query($sql);
		//return $query;	
			 
		if($query->num_rows() > 0){
			return $query;	
			
		} else {
			return '0';
		} 
	 }  
	 
	//---------------------------	 
	 function do_logout(){
		 
		$this->session->set_userdata('login', '');
		return '0'; 
	 }	 		 
	//---------------------------  
		 
	function Insert_Alumni($allData=NULL){
		
		 $today = date("Y-m-d");	 
		
		 $data = array(
         'name' => $allData['name'],
         'old_name' => $allData['old_name'],
		 'telephone' => $allData['telephone'], 
		 'email' => $allData['email'], 
         'ID_card' => $allData['ID_card'],
         'facebook' => $allData['facebook'],
         'ID_line' => $allData['ID_line'],
         'house_number' => $allData['house_number'],
         'village_no' => $allData['village_no'],
         'alley' => $allData['alley'],
         'road' => $allData['road'],
         'district' => $allData['district'],
         'prefecture' => $allData['prefecture'],
         'province' => $allData['province'],
         'postcode' => $allData['postcode'],
         'institution_name' => $allData['institution_name'],
         'institution_number' => $allData['institution_number'],
         'institutionVillage_no' => $allData['institutionVillage_no'],
         'institution_alley' => $allData['institution_alley'],
         'institution_road' => $allData['institution_road'],
         'institution_district' => $allData['institution_district'],
         'institution_prefecture' => $allData['institution_prefecture'],
         'institution_province' => $allData['institution_province'],
         'institution_postcode' => $allData['institution_postcode'],
         'position' => $allData['position'],
         'Thesis_titleTH' => $allData['Thesis_titleTH'],
         'Thesis_titleEN' => $allData['Thesis_titleEN'],
         'adviser' => $allData['adviser'],
         'studentID_number' => $allData['studentID_number'],
         'graduation_certificate' => $allData['graduation_certificate'],
         'graduation_certificate' => $allData['graduation_certificate'],                    
         'user_update' =>$this->session->userdata('user_id'),  
         'date_add' => $today);
         		  
         if($this->db->insert('tbl_alumni_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;	
			 
		 }else{			 
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	} 	 
	//--------------------------- 	 
		 
	function edit_Alumni($allData=NULL,$dataID=NULL){	 
		
		 $data = array(
         'name' => $allData['name'],
         'old_name' => $allData['old_name'],
		 'telephone' => $allData['telephone'], 
		 'email' => $allData['email'], 
         'ID_card' => $allData['ID_card'],
         'facebook' => $allData['facebook'],
         'ID_line' => $allData['ID_line'],
         'house_number' => $allData['house_number'],
         'village_no' => $allData['village_no'],
         'alley' => $allData['alley'],
         'road' => $allData['road'],
         'district' => $allData['district'],
         'prefecture' => $allData['prefecture'],
         'province' => $allData['province'],
         'postcode' => $allData['postcode'],
         'institution_name' => $allData['institution_name'],
         'institution_number' => $allData['institution_number'],
         'institutionVillage_no' => $allData['institutionVillage_no'],
         'institution_alley' => $allData['institution_alley'],
         'institution_road' => $allData['institution_road'],
         'institution_district' => $allData['institution_district'],
         'institution_prefecture' => $allData['institution_prefecture'],
         'institution_province' => $allData['institution_province'],
         'institution_postcode' => $allData['institution_postcode'],
         'position' => $allData['position'],
         'Thesis_titleTH' => $allData['Thesis_titleTH'],
         'Thesis_titleEN' => $allData['Thesis_titleEN'],
         'adviser' => $allData['adviser'],
         'studentID_number' => $allData['studentID_number'],
         'graduation_certificate' => $allData['graduation_certificate'],
         'graduation_certificate' => $allData['graduation_certificate'],                    
         'user_update' =>$this->session->userdata('user_id'));
         		  
         $this->db->where('id', $dataID);
		 if($this->db->update('tbl_alumni_data', $data)){
			$pass = $dataID;
			 
		 }else{			 
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}
	//---------------------------  
		 
	function insertDescription($desc_th=NULL,$desc_en=NULL){		 	 
		 	
		 $data = array(
         'desc_th' => $desc_th,
         'desc_en' => $desc_en,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_alumni_desc', $data)){
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}		 
	 
	//---------------------------
	 
	 function updateDescription($desc_th=NULL,$desc_en=NULL){	 
		
		 $data = array(
         'desc_th' => $desc_th,
         'desc_en' => $desc_en,                        
         'user_update' =>$this->session->userdata('user_id')); 
		 
		 //$this->db->where('id', $dataID);
		 if($this->db->update('tbl_alumni_desc', $data)){
		 	$pass = 1;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }
	 
	//---------------------------
		 
	 function get_descriptionData(){		 
		
		$sql = "SELECT * FROM `tbl_alumni_desc` ";
        $query = $this->db->query($sql);
		return $query;		
	}
	 
	//----------------------------
	 
	 function do_checkEmail($mail=NULL){
		  $sql2 = "SELECT * FROM `tbl_alumni_data` WHERE email ='".$mail."' AND data_status = '1' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  if($numberCount > 0){
			  //$pass=1;
			  
			  $sql = "SELECT * FROM `tbl_alumni_data` WHERE email ='".$mail."' AND data_status = '1' ";
          	 // $query = $this->db->query($sql);
			  
			  $query = $this->db->query($sql);
			  $row=$query->row();
			  $pass = $row->id;
		  
		  } else {
			  $pass=0;			  
		  }
		 return $pass;
	 }
	 
	 //---------------------------
	 
	 function update_keyValue($key_value2=NULL,$userID=NULL){			 
		
		 $data = array(
         'key_value' => $key_value2,                 
         'user_update' =>$userID);
		 
		 $this->db->where('id', $userID);
		 if($this->db->update('tbl_alumni_data', $data)){
		 	$pass = 1;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }
	 
	 //---------------------------
	 
	 function update_newPass($password=NULL,$dataID=NULL){			 
		 $txt ='';
		 $password = md5($password);
		 
		 $data = array(
         'password' => $password,                 
         'key_value' => $txt,                 
         'user_update' =>$dataID);
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_alumni_data', $data)){
		 	$pass = 1;
		 }else{
		    $pass=0;
		 }
		return $pass;
	 }	
	 
	 //---------------------------
	 
	 function count_email($mail=NULL){
				 
		$sql = "SELECT * FROM `tbl_alumni_data` WHERE email ='".$mail."' AND data_status = '1' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();			
		return $numberCount;		
	}
 }

<?php 
 class administrator_model extends CI_Model
 { 
     function list_administratorData($dataID=NULL){
		//$userupdate=$this->session->userdata('user_id'); 
		
		//$this->db->where('user_update', $userupdate);
		 
		if($dataID !=''){ 
			$this->db->where('id', $dataID);
		}
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('sort_number','asc');
		$query = $this->db->get('tbl_administrator_data');
		
		return $query;		
	}  
	//--------------------------- 		 
	function InsertDataAdministrator($allData=NULL){		 	 
		 $today = date("Y-m-d");
		
		 $data = array(
         'name_th' => $allData['name_th'],
         'name_en' => $allData['name_en'],
         'telephone' => $allData['telephone'],
         'email' => $allData['email'],
         'position_th' => $allData['position_th'],
         'position_en' => $allData['position_en'],
         'url_appointment' => $allData['url_appointment'],
		 'date_add' => $today,                   
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_administrator_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
	//---------------------------
	 
	 function UpdateDataAdministrator($allData=NULL,$dataID=NULL){	  
		
		 $data = array(
         'name_th' => $allData['name_th'],
         'name_en' => $allData['name_en'],
         'telephone' => $allData['telephone'],
         'email' => $allData['email'],
         'position_th' => $allData['position_th'],
         'position_en' => $allData['position_en'],
         'url_appointment' => $allData['url_appointment'],
		 'user_update' =>$this->session->userdata('user_id'));		 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_administrator_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	
	 
 }

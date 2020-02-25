<?php 
 class staff_model extends CI_Model
 { 
     function list_staffData($CategoryID=NULL,$dataID=NULL){
		//$userupdate=$this->session->userdata('user_id'); 
		
		//$this->db->where('user_update', $userupdate);
		if($CategoryID != ''){ 
			$this->db->where('category_id', $CategoryID); 
		}
		if($dataID !=''){ 
			$this->db->where('id', $dataID);
		} 
			
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('sort_number','asc');
		$query = $this->db->get('tbl_staff_data');
		
		return $query;		
	}  
	//---------------------------	 
	function list_staffCategory($show=NULL){
		//$userupdate=$this->session->userdata('user_id'); 
		
		if($show == '1'){
			$this->db->where('show_onWeb', '1');
		} 
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_staff_category');
		
		return $query;		
	}	
	//--------------------------- 	 
	 function get_categoryName($CategoryID=NULL){		 
		$this->db->where('id', $CategoryID);
		$this->db->where('data_status', '1');
		$this->db->select('name_th');		
		$query = $this->db->get('tbl_staff_category');
		
		return $query;		
	}	 
	//--------------------------- 		 
	function insert_staffCategory($name_th=NULL , $name_en=NULL){		
		  
		$today = date("Y-m-d H:i:s");   
		  
		$data = array(
         'name_th' => $name_th,
         'name_en' => $name_en,
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         if($this->db->insert('tbl_staff_category', $data)){
              $pass=1;
         }else{
            $pass=0;
         }
		
		 return $pass;
	}
	//--------------------------- 
	function update_staffCategory($name_th=NULL , $name_en=NULL , $dataID=NULL){		
		  
		$data = array(
         'name_th' => $name_th,
         'name_en' => $name_en,              
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         $this->db->where('id', $dataID);
		 if($this->db->update('tbl_staff_category', $data)){	 
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		 return $pass;		
	}	 
	//---------------------------	 
	function delete_StaffCategory($dataID=NULL){	
		
		 $sql = "SELECT * FROM `tbl_staff_data` WHERE category_id ='".$dataID."' AND data_status = '1' ";
         $query = $this->db->query($sql);
		 $numberCount = $query->num_rows();	  
			
		  if($numberCount < 1){
			  
			$data = array(
			 'data_status' => '0',                       
			 'user_update' =>$this->session->userdata('user_id')
			);

			 $this->db->where('id', $dataID);
			 if($this->db->update('tbl_staff_category', $data)){	 
				$pass=1;
			 }else{
				$pass=0;
				//$this->db->_error_message(); 
			 }	  
		  }	else {
			  
			  $pass=0;
		  }  
		
		 return $pass;		
	}		
	//--------------------------- 		 
	function InsertDataStaff($allData=NULL){		 	 
		 $today = date("Y-m-d");
		
		 $data = array(
         'category_id' => $allData['category_id'],
         'name_th' => $allData['name_th'],
         'name_en' => $allData['name_en'],
         'telephone' => $allData['telephone'],
         'email' => $allData['email'],
         'position_th' => $allData['position_th'],
         'position_en' => $allData['position_en'],
		 'date_add' => $today,                   
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_staff_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
	 
	//---------------------------
	 
	 function UpdateDataStaff($allData=NULL,$dataID=NULL){	  
		
		 $data = array(
         'category_id' => $allData['category_id'],
         'name_th' => $allData['name_th'],
         'name_en' => $allData['name_en'],
         'telephone' => $allData['telephone'],
         'email' => $allData['email'],
         'position_th' => $allData['position_th'],
         'position_en' => $allData['position_en'],		                   
         'user_update' =>$this->session->userdata('user_id'));		 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_staff_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	 
	 
	 //--------------------------- 
	 function do_sortNumber($dataID=NULL,$num=NULL,$table=NULL){		
		  
		$data = array(
         'sort_number' => $num,
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         $this->db->where('id', $dataID);
		 if($this->db->update($table, $data)){	 
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		 return $pass;		
	 }	 
	 
 }

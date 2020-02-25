<?php 
 class contactus_model extends CI_Model
 {  
	 function DateThai($strDate=NULL){		
		
		$dateArray = explode("-",$strDate);
		$date2= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray = array("01"=>"ม.ค.","02"=>"ก.พ.","03"=>"มี.ค.","04"=>"เม.ย.", "05"=>"พ.ค.","06"=>"มิ.ย.","07"=>"ก.ค.","08"=>"ส.ค.","09"=>"ก.ย.","10"=>"ต.ค.","11"=>"พ.ย.","12"=>"ธ.ค.");

		if($dateArray[0] == 2018){ $year = $dateArray[0]+543; }
		if($date2 < 10){ $date2 = str_replace("0", "", $date2); } 
		$day=$date2."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
		return $day;		
	} 
	 
//---------------------------  
		 
	function insertContactUs($allData=NULL,$dataID=NULL){	 	 
		 	
		 $data = array(
         'address_th' => $allData['address_th'],
         'address_en' => $allData['address_en'],         
         'telephone' => $allData['telephone'],         
         'fax' => $allData['fax'],         
         'location' => $allData['location'],         
         'map' => $allData['map'],         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_contactUs_data', $data)){
			//$pass=1;
			$pass = $this->db->insert_id(); 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}		 
	 
//---------------------------
	 
	 function updateContactUs($allData=NULL,$dataID=NULL){	 
		
		 $data = array(
         'address_th' => $allData['address_th'],
         'address_en' => $allData['address_en'],         
         'telephone' => $allData['telephone'],         
         'fax' => $allData['fax'],         
         'location' => $allData['location'],         
         'map' => $allData['map'],         
         'user_update' =>$this->session->userdata('user_id')); 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_contactUs_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }		 

//---------------------------
		 
	 function get_contactUsData(){		 
		
		$sql = "SELECT * FROM `tbl_contactUs_data` ";
        $query = $this->db->query($sql);
		return $query;		
	} 	
	 
//---------------------------
		 
	 function get_aboutusData(){		 
		
		$sql = "SELECT * FROM `tbl_aboutus_data` ";
        $query = $this->db->query($sql);
		return $query;		
	} 	 
		 
//---------------------------  
		 
	function insert_aboutUs($desc_th=NULL, $desc_en=NULL, $history_th=NULL, $history_en=NULL, $vision_th=NULL, $vision_en=NULL, $mission_th=NULL, $mission_en=NULL, $dataID=NULL){	 	 
		 	
		 $data = array(
         'desc_th' => $desc_th,
         'desc_en' => $desc_en,         
         'history_th' => $history_th,         
         'history_en' => $history_en,         
         'vision_th' => $vision_th,         
         'vision_en' => $vision_en,         
         'mission_th' => $mission_th,         
         'mission_en' => $mission_en,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_aboutus_data', $data)){
			//$pass=1;
			$pass = $this->db->insert_id(); 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}		 
	 
//---------------------------
	 
	 function update_aboutUs($desc_th=NULL, $desc_en=NULL, $history_th=NULL, $history_en=NULL, $vision_th=NULL, $vision_en=NULL, $mission_th=NULL, $mission_en=NULL, $dataID=NULL){	 
		
		 $data = array(
         'desc_th' => $desc_th,
         'desc_en' => $desc_en,         
         'history_th' => $history_th,         
         'history_en' => $history_en,         
         'vision_th' => $vision_th,         
         'vision_en' => $vision_en,         
         'mission_th' => $mission_th,         
         'mission_en' => $mission_en,         
         'user_update' =>$this->session->userdata('user_id'));
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_aboutus_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }			 
	 
 }

<?php 
 class facility_model extends CI_Model
 { 
     function list_facilitiesData($show=NULL,$dataID=NULL){
		 
		if($show == '1'){
			$this->db->where('show_onWeb', '1');
		}  
		 
		if($dataID !=''){ 
			$this->db->where('id', $dataID);
		} 
		//$userupdate=$this->session->userdata('user_id'); 
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_facilities_data');
		
		return $query;		
	} 
//---------------------------
	 
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
		 
	function InsertDataFacility($allData=NULL){		 	 
		 $today = date("Y-m-d");	 
		
		 $data = array(
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],                         
         'url' => $allData['url'],                         
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_facilities_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
		
//---------------------------
	 
	 function UpdateDatafacility($allData=NULL,$dataID=NULL){	 
		
		 $data = array(
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],    
		 'url' => $allData['url'], 	 
         'user_update' =>$this->session->userdata('user_id')); 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_facilities_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	 		
	 
 }

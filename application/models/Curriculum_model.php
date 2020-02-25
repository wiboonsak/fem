<?php 
 class curriculum_model extends CI_Model
 { 
     function list_curriculumsData($show=NULL,$dataID=NULL){
		 
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
		$query = $this->db->get('tbl_curriculum_files');
		
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
	 
	 function InsertDataCurriculum($curriculum_nameTH=NULL, $curriculum_nameEN=NULL, $url=NULL, $icon_class=NULL){		 	 
		 $today = date("Y-m-d");	 
		
		 $data = array(
         'curriculum_nameTH' => $curriculum_nameTH,
         'curriculum_nameEN' => $curriculum_nameEN,                         
         'url' => $url,                         
         'icon_class' => $icon_class,                         
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_curriculum_files', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
		
//---------------------------	 
	 
	 function UpdateDataCurriculum($curriculum_nameTH=NULL , $curriculum_nameEN=NULL , $dataID=NULL , $url=NULL , $icon_class=NULL){	 
		
		 $data = array(
         'curriculum_nameTH' => $curriculum_nameTH,
         'curriculum_nameEN' => $curriculum_nameEN,                        
         'url' => $url,                        
         'icon_class' => $icon_class,                        
         'user_update' =>$this->session->userdata('user_id')); 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_curriculum_files', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	
	 
//---------------------------  
		 
	function insertDescription($desc_th=NULL,$desc_en=NULL){		 	 
		 	
		 $data = array(
         'desc_th' => $desc_th,
         'desc_en' => $desc_en,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_curriculum_desc', $data)){
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
		 if($this->db->update('tbl_curriculum_desc', $data)){
		 	$pass = 1;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }		 

//---------------------------
		 
	 function get_descriptionData(){		 
		
		$sql = "SELECT * FROM `tbl_curriculum_desc` ";
        $query = $this->db->query($sql);
		return $query;		
	} 	 
	 
//---------------------------
		 
	function list_topicData($show=NULL,$dataID=NULL){
		 
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
		$query = $this->db->get('tbl_moreInformation');
		
		return $query;		
	} 
	 
//---------------------------  
		 
	function insert_otherTopicData($topic_th=NULL, $topic_en=NULL, $detail_th=NULL, $detail_en=NULL, $dataID=NULL){ 	 
		 $today = date("Y-m-d");
		 	
		 $data = array(
         'topic_th' => $topic_th,
         'topic_en' => $topic_en,         
         'detail_th' => $detail_th,         
         'detail_en' => $detail_en,         
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_moreInformation', $data)){
			$pass = $this->db->insert_id(); 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}		
	 
//---------------------------
	 
	 function update_otherTopicData($topic_th=NULL, $topic_en=NULL, $detail_th=NULL, $detail_en=NULL, $dataID=NULL){	 
		
		 $data = array(
         'topic_th' => $topic_th,
         'topic_en' => $topic_en,         
         'detail_th' => $detail_th,         
         'detail_en' => $detail_en,         
         'user_update' =>$this->session->userdata('user_id'));
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_moreInformation', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }			 
		 
 }

<?php 
 class slide_model extends CI_Model
 { 
      function insert_TextSlide($topic_th=NULL , $topic_en=NULL){		
		  
		$today = date("Y-m-d H:i:s");   
		  
		$data = array(
         'topic_th' => $topic_th,
         'topic_en' => $topic_en,
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         if($this->db->insert('tbl_textSlide_data', $data)){
              $pass=1;
         }else{
            $pass=0;
         }
		
		 return $pass;
	}	 
 //---------------------------
	 
	function list_TextSlide($font_back=NULL){
		if($font_back =='b'){
			$userupdate = $this->session->userdata('user_id'); 		
			$this->db->where('user_update', $userupdate);
		}
		
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_textSlide_data');
		
		return $query;		
	}	
//---------------------------	 
	 
	function update_text($name_th=NULL , $name_en=NULL , $dataID=NULL){		
		  
		$data = array(
         'topic_th' => $name_th,
         'topic_en' => $name_en,              
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         $this->db->where('id', $dataID);
		 if($this->db->update('tbl_textSlide_data', $data)){	 
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		 return $pass;		
	}	
//---------------------------
	 
	 function list_slideIMG($show=NULL,$dataID=NULL,$font_back=NULL){	
		if($font_back =='b'){
			$userupdate = $this->session->userdata('user_id'); 		
			$this->db->where('user_update', $userupdate);
		}
		 
		if($show == '1'){
			$this->db->where('show_onWeb', '1');
		} 
		 
		if($dataID !=''){ 
			$this->db->where('id', $dataID);
		}  
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_slide_data');
		
		return $query;		
	}
//----------------
		 
	function list_slideIMG02(){	
		
		$today = date("Y-m-d"); 
		
		$sql = "SELECT * FROM `tbl_slide_data` WHERE data_status = '1' AND show_onWeb = '1'  AND date_start != '0000-00-00' AND  date_start <= '".$today."' AND (date_end = '0000-00-00' OR date_end > '".$today."') ";		
        $query = $this->db->query($sql);
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
	 
	function InsertDataSlideIMG($allData=NULL){		 	 
		 $today = date("Y-m-d");
		 if(($allData['date_start'] =='') || ($allData['date_start'] == '0000-00-00')){
			 
			 $allData['date_start'] = $today;
		 }
		
		 $data = array(
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],
         'desc_th' => $allData['desc_th'],
         'desc_en' => $allData['desc_en'],
         'url' => $allData['url'],
		 'date_start' => $allData['date_start'],
         'date_end' => $allData['date_end'],	 
		 'date_add' => $today,                   
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_slide_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}  
		
//---------------------------
	 
	 function Update_slideIMG($allData=NULL,$dataID=NULL){	
		 $today = date("Y-m-d");
		 if(($allData['date_start'] =='') || ($allData['date_start'] == '0000-00-00')){
			 
			 $allData['date_start'] = $today;
		 }
		
		 $data = array(
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],
         'desc_th' => $allData['desc_th'],
         'desc_en' => $allData['desc_en'],
         'url' => $allData['url'], 
		 'date_start' => $allData['date_start'],
         'date_end' => $allData['date_end'],		 
		 'user_update' =>$this->session->userdata('user_id'));
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_slide_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }			
	 
 }

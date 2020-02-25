<?php 
 class video_model extends CI_Model
 { 
     function list_videoData(){
		//$userupdate=$this->session->userdata('user_id'); 
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_linkYoutube_data');
		
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
	 
	function insert_Link_data($topic_th=NULL , $topic_en=NULL , $link=NULL){		
		  
		$today = date("Y-m-d H:i:s");   
		  
		$data = array(
         'topic_th' => $topic_th,
         'topic_en' => $topic_en,
         'link' => $link,
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         if($this->db->insert('tbl_linkYoutube_data', $data)){
              $pass=1;
         }else{
            $pass=0;
         }
		
		 return $pass;
	}	 		 
	 
 }

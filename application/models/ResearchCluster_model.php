<?php 
 class researchCluster_model extends CI_Model
 { 
     function list_researchClusters($show=NULL,$dataID=NULL,$font_back=NULL){
		 
		if($show == '1'){
			$this->db->where('show_onWeb', '1');
		}  
		 
		if($dataID !=''){ 
			$this->db->where('id', $dataID);
		} 
		 
		if($font_back =='b'){
			$userupdate = $this->session->userdata('user_id'); 		
			$this->db->where('user_update', $userupdate);
		}
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_research_clusters');
		
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
		 
	function Insert_researchCluster($allData=NULL){		 	 
		 $today = date("Y-m-d");	 
		
		 $data = array(
         'name_th' => $allData['name_th'],
         'name_en' => $allData['name_en'],                         
         'icon_class' => $allData['icon_class'],         
         'contact_nameTH' => $allData['contact_nameTH'],         
         'contact_nameEN' => $allData['contact_nameEN'],         
         'contact_tel' => $allData['contact_tel'],         
         'contact_mail' => $allData['contact_mail'],         
         'url_website' => $allData['url_website'],         
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_research_clusters', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
		
//---------------------------
	 
	 function Update_researchCluster($allData=NULL,$dataID=NULL){	 
		
		 $data = array(
         'name_th' => $allData['name_th'],
         'name_en' => $allData['name_en'],                         
         'icon_class' => $allData['icon_class'],         
         'contact_nameTH' => $allData['contact_nameTH'],         
         'contact_nameEN' => $allData['contact_nameEN'],         
         'contact_tel' => $allData['contact_tel'],         
         'contact_mail' => $allData['contact_mail'],         
         'url_website' => $allData['url_website'],         
         'user_update' =>$this->session->userdata('user_id'));
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_research_clusters', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	 		
	 
 }

<?php 
 class events_model extends CI_Model
 { 
     function list_eventData($show=NULL,$dataID=NULL,$font_back=NULL){
		 
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
		 
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_events_data');
		
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
		 
	function InsertDataEvent($allData=NULL){		 	 
		 $today = date("Y-m-d");	 
		
		 $data = array(
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],
         'event_date' => $allData['event_date'],
         'url' => $allData['url'],
         //'detail_th' => $detail_th,
         //'detail_en' => $detail_en,                 
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_events_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
		
//---------------------------
	 
	 function UpdateDataEvent($allData=NULL,$dataID=NULL){	 
		
		 $data = array(
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],
         'event_date' => $allData['event_date'],
         'url' => $allData['url'],
         //'detail_th' => $detail_th,
         //'detail_en' => $detail_en,                 
         'user_update' =>$this->session->userdata('user_id')); 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_events_data', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }	 
	 
//---------------------------
	 
	 function do_importDB($name=NULL){	 
		 
		 
		
		 $this->load->dbforge();
		 $this->load->database(); 
	
		 
		  $dbName = $this->db->database;
		  $this->dbforge->drop_database($dbName);
		  $this->dbforge->create_database($dbName);  
		 
		 
					//$this->load->database($dbName);  
					 
					  
					  $sql=file_get_contents($name);
				/*		foreach (explode(";\n", $sql) as $sql){
							$sql = trim($sql);
							  //echo  $sql.'<br>============<br>';
							if($sql){ $this->db->query($sql); } 
						}*/
		 
		 $query_array = explode(";", $sql);
foreach($query_array as $qr)
   $this->db->query($qr);
		 
		 
		
		// echo "333";
		// $this->load->helper("file");	
		//@unlink($name);
					  
					$pass = "444";
		 
		 
		return $pass;
	 }
	 
	 
	 
	function import_dump($folder_name = null) {
		 $this->load->dbutil();
		 $this->load->dbforge();
		 $this->load->database(); 
	
		 
		// / $dbName = $this->db->database;
		//  $this->dbforge->drop_database($dbName);
		//  $this->dbforge->create_database($dbName); 
		
		$folder_name = 'uploadfile';
//$path = 'assets/backup_db/'; // Codeigniter application /assets
		
		$sql_filename = 'b3923094c8ecb450d676cb4785e65037.sql';
		
		$file_restore = $this->load->file($folder_name.'/'.$sql_filename, true);
		$file_array = explode(';', $file_restore);

		foreach ($file_array as $query) {
		 $this->db->query("SET FOREIGN_KEY_CHECKS = 0");
		// $query = htmlentities($query);
		// $query = $this->db->escape_str($query);	
		 $this->db->query($query);
		 $this->db->query("SET FOREIGN_KEY_CHECKS = 1");
		 }
		
		

				return '111';  
		} 
	 
	 
 }

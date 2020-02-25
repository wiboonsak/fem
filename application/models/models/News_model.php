<?php 
 class news_model extends CI_Model
 { 
      function insert_NewsCategory($name_th=NULL , $name_en=NULL){		
		  
		$today = date("Y-m-d H:i:s");   
		  
		$data = array(
         'name_th' => $name_th,
         'name_en' => $name_en,
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         if($this->db->insert('tbl_news_category', $data)){
              $pass=1;
         }else{
            $pass=0;
         }
		
		 return $pass;
	}	 
 //---------------------------
	 
	function list_newsCategory($show=NULL){
		
		if($show == '1'){
			$this->db->where('show_onWeb', '1');
		} 
		//$userupdate=$this->session->userdata('user_id'); 
		
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_news_category');
		
		return $query;		
	} 
//---------------------------
	 
	function list_newsCategory2($show=NULL){
		
		$userID = $this->session->userdata('user_id');	   
		   
		  $sql = "SELECT * FROM `tbl_setUser_newsCategory` AS u LEFT JOIN tbl_news_category AS n ON u.category_id = n.id WHERE u.user_id = '".$userID."' AND data_status = '1' ORDER BY n.id DESC ";
          $query=$this->db->query($sql);
          return $query;
		
		return $query;		
	}	
//---------------------------	 
	function update_newsCate($name_th=NULL , $name_en=NULL , $dataID=NULL){		
		  
		$data = array(
         'name_th' => $name_th,
         'name_en' => $name_en,              
         'user_update' =>$this->session->userdata('user_id')
		);
         		  
         $this->db->where('id', $dataID);
		 if($this->db->update('tbl_news_category', $data)){	 
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		 return $pass;		
	}	
//---------------------------
	 
	function delete_NewsCategory($dataID=NULL){	
		
		 $sql = "SELECT * FROM `tbl_news_data` WHERE category_id ='".$dataID."' ";
         $query = $this->db->query($sql);
		 $numberCount = $query->num_rows();	  
			
		  if($numberCount < 1){
			  
			$data = array(
			 'data_status' => '0',                       
			 'user_update' =>$this->session->userdata('user_id')
			);

			 $this->db->where('id', $dataID);
			 if($this->db->update('tbl_news_category', $data)){	 
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
	 
	 function news_data($CategoryID=NULL,$font_back=NULL){	
		 
		if($font_back =='b'){
			$userupdate = $this->session->userdata('user_id'); 		
			$this->db->where('user_update', $userupdate);
		}
		 
		$this->db->where('category_id', $CategoryID);
		$this->db->where('data_status', '1');
		//$this->db->where('user_update', $userupdate);
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_news_data');
		
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
	 
	 function get_categoryName($CategoryID=NULL,$lang=NULL){	
		 
		if($lang == 'th'){
			$f = 'name_th';
			
		} else {
			$f = 'name_en';
		} 
		 
		$this->db->where('id', $CategoryID);
		$this->db->where('data_status', '1');
		//$this->db->select('name_th');		
		$this->db->select($f);		
		$query = $this->db->get('tbl_news_category');
		
		return $query;		
	}	 
//--------------------------- 
		 
	function InsertDataNews($allData=NULL,$detail_th=NULL,$detail_en=NULL){		 	 
		 $today = date("Y-m-d");	
		
		 if(($allData['date_start'] =='') || ($allData['date_start'] == '0000-00-00')){
			 
			 $allData['date_start'] = $today;
		 }
		
		 $data = array(
         'category_id' => $allData['category_id'],
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],
         'desc_th' => $allData['desc_th'],
         'desc_en' => $allData['desc_en'],
         'detail_th' => $detail_th,
         'detail_en' => $detail_en,
         'date_start' => $allData['date_start'],
         'date_end' => $allData['date_end'],         
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_news_data', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}
//----------------------------
	 
	 function updateFile($newsID=NULL,$first_pic_file=NULL,$field=NULL){
		 
		 $userupdate=$this->session->userdata('user_id');
		 
		/* $relative_url = '';
		 if($_FILES['first_pic']['error'] == 0){	 
				$relative_url = 'uploadfile/'.$this->upload->file_name;				
		 }	*/		
		 
		 	 $data = array(
			 $field => $first_pic_file,
         	 'user_update' => $userupdate ); 		 
			 $this->db->where('id', $newsID);
		     if($this->db->update('tbl_news_data', $data)){
			      $pass=1;
			 }else{
				  $pass=0;
			 }

		return $pass;		 
	 } 	
//----------------------------
	 
	 function updateFile_multiple($newsID=NULL,$first_pic_file=NULL,$language=NULL){		 
		 
		 	 $data = array(
				 'news_id' => $newsID,
				 'file_name' => $first_pic_file,
				 'language' => $language,         
			 );

			 $this->db->insert('tbl_news_files', $data);
					 	 
	 } 	 
	 
//---------------------------------
	function delete_data($dataID=NULL,$table=NULL){
		$data = array(
         'data_status' => '0',
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
//---------------------------	 
	function update_ShowOnWeb($dataID=NULL , $check=NULL , $table=NULL){		
		  
		$data = array(
         'show_onWeb' => $check,
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
//----------------------------
	 
	 function updateFile2($dataID=NULL,$first_pic_file=NULL,$field=NULL,$table=NULL){
		 
		 $userupdate=$this->session->userdata('user_id');
		 
		/* $relative_url = '';
		 if($_FILES['first_pic']['error'] == 0){	 
				$relative_url = 'uploadfile/'.$this->upload->file_name;				
		 }	*/		
		 
		 	 $data = array(
			 $field => $first_pic_file,
         	 'user_update' => $userupdate ); 		 
			 $this->db->where('id', $dataID);
		     if($this->db->update($table, $data)){
			      $pass=1;
			 }else{
				  $pass=0;
			 }

		return $pass;		 
	 } 	 
//----------------
		 
	function get_news_data($show=NULL, $limit=NULL, $Category=NULL, $dataID=NULL, $font_back=NULL){
		
		if($limit !=''){
			$txtLimit = 'LIMIT '.$limit;
		} else {
			$txtLimit = '';
		}
		
		if($dataID !=''){
			$txtWhere2 = "AND id !='".$dataID."' ";
		} else {
			$txtWhere2 = '';
		}
		
		if($font_back =='b'){
			$userupdate = $this->session->userdata('user_id'); 		
			$txtWhere3 = "AND user_update ='".$userupdate."' ";
		} else {
			$txtWhere3 = '';
		}
		
		$today = date("Y-m-d"); 
		
		$sql = "SELECT * FROM `tbl_news_data` WHERE category_id = '".$Category."' AND show_onWeb = '1' AND data_status = '1' $txtWhere2  $txtWhere3 AND date_start != '0000-00-00' AND  date_start <= '".$today."' AND (date_end = '0000-00-00' OR date_end > '".$today."') ORDER BY id DESC $txtLimit ";
		
		//$sql = "SELECT * FROM `tbl_news_data` WHERE category_id ='".$Category."' AND show_onWeb = '1' AND data_status = '1' $txtWhere2  $txtWhere3 ORDER BY id DESC $txtLimit  ";
        $query = $this->db->query($sql);
		return $query;
	}	
//----------------	 
	 
	function get_dateENG($date2){
		//$News_Date = $AddDate['LastUpdate'];		
		$dateArray = explode("-",$date2);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April", "05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		$LastUpdate =  $monthArray[$mon]." ".$date.", ".$year;		
		return $LastUpdate ;
	} 
//----------------
	 
	 function get_news_data02($dataID=NULL, $show=NULL, $limit=NULL, $Category=NULL, $font_back=NULL){
		
		if($limit !=''){
			$txtLimit = 'LIMIT '.$limit;
		} else {
			$txtLimit = '';
		}
		
		if($Category !=''){
			$txtWhere = "'category_id ='".$Category."' AND  ";
		} else {
			$txtWhere = '';
		}
		
		if($dataID !=''){
			$txtWhere2 = "AND id ='".$dataID."' ";
		} else {
			$txtWhere2 = '';
		}
		 
		if($font_back =='b'){
			$userupdate = $this->session->userdata('user_id'); 		
			$txtWhere3 = "AND user_update ='".$userupdate."' ";
		} else {
			$txtWhere3 = '';
		} 
		 
		if($show == 'all'){
			$txtShow = "";
		} else {
			$txtShow = "show_onWeb = '1' AND";
		}
		
		$sql = "SELECT * FROM `tbl_news_data` WHERE $txtShow $txtWhere data_status = '1' $txtWhere2  $txtWhere3 ORDER BY id DESC $txtLimit  ";
        $query = $this->db->query($sql);
		return $query;
	}	
//---------------------------
	 
	 function UpdateDataNews($allData=NULL,$detail_th=NULL,$detail_en=NULL,$dataID=NULL){	
		 
		 $today = date("Y-m-d");	
		
		 if(($allData['date_start'] =='') || ($allData['date_start'] == '0000-00-00')){
			 
			 $allData['date_start'] = $today;
		 }
		
		 $data = array(
         'category_id' => $allData['category_id'],
         'topic_th' => $allData['topic_th'],
         'topic_en' => $allData['topic_en'],
         'desc_th' => $allData['desc_th'],
         'desc_en' => $allData['desc_en'],
         'detail_th' => $detail_th,
         'detail_en' => $detail_en,
         'date_start' => $allData['date_start'],
         'date_end' => $allData['date_end'],                 
         'user_update' =>$this->session->userdata('user_id'));		 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_news_data', $data)){
			 $pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }
//---------------------------	 
	 
	 function remove_file2($dataID=NULL,$table=NULL,$field=NULL){	  
		
		 $data = array(
         $field => '',                       
         'user_update' =>$this->session->userdata('user_id'));		 
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update($table, $data)){
			 echo "1";
		 }else{
		   echo "0";
		 }
	 }
//---------------------------	 	 
	 
	 function do_insertUser_newsCategory($userID=NULL,$cateId=NULL){
		 
		 $today = date("Y-m-d");	 
		
		 $data = array(
			 'user_id' => $userID,
			 'category_id' => $cateId,			       
			 'date_add' => $today,         
			 'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_setUser_newsCategory', $data)){
			$pass = $this->db->insert_id(); 
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;	
		 
		/*$allUserId2 = explode(",",$allUserId);
		
		$today = date("Y-m-d");	 
		 
		for($i=0; $i< count($allUserId2); $i++){
			
			$data = array(
			 'user_id' => $allUserId2[$i],
			 'category_id' => $cateId,			       
			 'date_add' => $today,         
			 'user_update' =>$this->session->userdata('user_id'));
			
			$this->db->insert('tbl_setUser_newsCategory', $data);
		} 	 
         		  
         if($i == count($allUserId2)){			
			$pass=1;
			 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 } 
		return $pass;*/
		 
	 }
//----------------
		 
	function getUser_newsCategory($userID2 , $category_id){		
		
		if($userID2 !=''){
			$txtWhere = " AND user_id = '".$userID2."' ";
		} else {
			$txtWhere = '';
		}
		
		$sql = "SELECT * FROM `tbl_setUser_newsCategory` WHERE category_id = '".$category_id."' $txtWhere ";
        $query = $this->db->query($sql);
		return $query;
	}	
//----------------		
		
	function do_deleteUser_newsCategory($userID,$cateId){ 
		
		$sql = "DELETE FROM tbl_setUser_newsCategory WHERE category_id = '".$cateId."' AND user_id = '".$userID."' ";
		  
		if($this->db->query($sql)){
			$pass=1;
		}else{
			$pass=0;
		}
		return $pass; 
    }
		
//----------------
		 
	function getLink_newsDetail($check=NULL,$id=NULL){		
		
		if($check =='n'){
			
			$sql = "SELECT id FROM `tbl_news_data` WHERE id > ".$id." AND data_status = '1' AND show_onWeb = '1' LIMIT 1 ";
		}
		
		if($check =='p'){
			
			$sql = "SELECT MAX(id) AS id FROM `tbl_news_data` WHERE data_status = '1' AND show_onWeb = '1' AND id < ".$id;
		}
		
        $query = $this->db->query($sql);
		$row=$query->row();
		
		if(isset($row->id)){
			$id3 = $row->id;
		
		} else {
			$id3 = 'x';
		}
		
		return $id3;
	}	
	 
//---------------------------
	 
	function index_NewsCategory($category_id=NULL){			
	
		 if($category_id !=''){
			 
			 $txt = "AND tbl_news_category.id = '".$category_id."' ";
		 
		 } else {
			 $txt = "";
		 }
		
		 $today = date("Y-m-d"); 
		
		 $sql = "SELECT COUNT(tbl_news_data.id) AS num  FROM tbl_news_data  LEFT JOIN `tbl_news_category` ON tbl_news_data.category_id = tbl_news_category.id WHERE tbl_news_data.data_status = '1' AND tbl_news_data.show_onWeb = '1'   ".$txt."  AND date_start != '0000-00-00' AND  date_start <= '".$today."' AND (date_end = '0000-00-00' OR date_end > '".$today."') ";
         
		 $query = $this->db->query($sql);
		 $row=$query->row();
		
		 if(isset($row->num)){
			$id3 = $row->num;
		
		 } else {
			$id3 = 0;
		 }
		
		 return $id3;	
	}
	 
//---------------------------
	 
	function list_newsFile($news_id=NULL,$language=NULL){
		$txt ='';  $where ='';
		
		if($language != ''){
			$where = "AND language = '".$language."'";			
		}
		if($language == ''){
			$txt = 'language DESC , ';			
		} 
		
		$sql = "SELECT * FROM `tbl_news_files` WHERE news_id = '".$news_id."' ".$where." ORDER BY ".$txt." id DESC ";
		$query = $this->db->query($sql);
		return $query;	
	} 	 
		
//----------------		
		
	function do_deleteFile($dataID){ 
		
		$sql = "DELETE FROM tbl_news_files WHERE id = '".$dataID."' ";		
		  
		if($this->db->query($sql)){
			$pass=1;
		}else{
			$pass=0;
		}
		return $pass; 
    }		
		 
 }

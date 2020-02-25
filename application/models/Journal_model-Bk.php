<?php 
 class journal_model extends CI_Model
 { 
    function count_email($mail=NULL){
				 
		$sql = "SELECT * FROM `tbl_authors_data` WHERE email ='".$mail."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();			
		return $numberCount;		
	}  
	//--------------------------- 	
	function count_username($username=NULL){
				 
		$sql = "SELECT * FROM `tbl_authors_data` WHERE username ='".$username."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();			
		return $numberCount;		
	}  
	//--------------------------- 		 
	//function author_register($allData=NULL){		 
	function author_register($salutation=NULL, $first_name=NULL, $middle_name=NULL, $password=NULL, $email=NULL, $affliation=NULL, $country=NULL, $last_name=NULL, $check_request=NULL){
		
		 $today = date("Y-m-d H:i:s");
		 $password = md5($allData['password']);
		
		 if($check_request == '1'){
			 
			 $name = $first_name.' '.$last_name;
			 
			 $data2 = array(
			 'name_sname' => $name,
			 'email' => $email,                 
			 'password' => $password,                 
			 'admin_type' => '3',                 
			 'accept_from_fontend' => $check_request,                 
			 'date_add' => $today);

			 $this->db->insert('tbl_journal_user', $data2);
		 }	
		
		 $data = array(
         'salutation' => $salutation,
         'first_name' => $first_name,
         'last_name' => $last_name,
         'middle_name' => $middle_name,
         //'username' => $allData['username'],
         'password' => $password,
         'email' => $email,
         'affliation' => $affliation,
         'country' => $country,
		 'date_add' => $today);
         		  
         if($this->db->insert('tbl_authors_data', $data)){			
			$pass = $this->db->insert_id(); 
			$this->session->set_userdata('jlogin', $pass);  
			//$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}	
	//--------------------------- 	
	function author_login($username=NULL,$password=NULL){		
		 
		$password = md5($password);
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_authors_data');

        //SELECT * FROM users WHERE username = '$username' AND password = '$password'
        if($query->num_rows() > 0){
			   
			$this->db->where('email', $username);
           	$this->db->where('password', $password);
           	$this->db->select('id');
			$query = $this->db->get('tbl_authors_data');
			$row=$query->row();
			$id=$row->id;
			
			date_default_timezone_set('Asia/Bangkok');
            $now = date("Y-m-d H:i:s");
            $data = array(
               'last_login' => $now);
            $this->db->where('id', $row->id);
            $this->db->update('tbl_authors_data', $data);
			   
           	$this->session->set_userdata('jlogin', $id);
			return $id;
			   
        } else {
			   
            return '0';
        } 
	} 
	//---------------------------  
	function listPaper($author_id=NULL,$paper_no=NULL,$paper_id=NULL){
		
		if($author_id !=''){
			$this->db->where('author_id', $author_id);
		}
		if($paper_no !=''){
			$this->db->where('paper_no', $paper_no);
		}
		if($paper_id !=''){
			$this->db->where('id', $paper_id);
		}
		
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_papers_data');
		
		return $query;		
	} 
	//---------------------------  
	function GetShortEngDate($day2){
		$dateArray = explode("-",$day2);
		//$dateArray = explode("-",$dateArray2[0]);
		
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
	} 
	//---------------------------  
	function get_shortEngDate($day2){
		$DateTimeArray= explode(" ",$day2);
		$dateArray = explode("-",$DateTimeArray[0]);
		
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"Apr","05"=>"May","06"=>"Jun","07"=>"Jul","08"=>"Aug","09"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
	}  
	//--------------------------- 	 
	function insertPaper($author_id=NULL, $title=NULL, $remarks=NULL, $section=NULL, $abstract=NULL){		 
	//function insertPaper($author_id=NULL, $allData=NULL){		 
		$today2 = date("Y-m-d");
		//$today = date("Y-m-d H:i:s");
		
		$this->db->select_max('id');
		$result = $this->db->get('tbl_papers_data')->row();		
		$top_id2 = $result->id;
		
		/*$sql = "SELECT * FROM `tbl_papers_data`  ";
        $query = $this->db->query($sql);
		$row=$query->row();
		$pass = $row->id;		
		
        $this->db->where('date_add', $today2);
        $query = $this->db->get('tbl_papers_data');
        
        if($query->num_rows() > 0){			
			
			$top_id2 = $query->num_rows();		
			$top_id = $top_id2+1;
		
		} else {
			$top_id = 1;
		}*/
		$top_id = $top_id2+1;	
		$count = strlen($top_id); 
		$loop = 3 - $count;
		$x = '';
		$today = date('Y');			
		for ($i = 1; $i <= $loop; $i++) {
    		$x = $x."0";
		} 	
		$paper_no = 'JEMES'.$today.'-'.$x.$top_id;		
		 		
		 $data = array(
         'title' => $title,
         'remarks' => $remarks,
         'author_id' => $author_id,
         'section' => $section,
         'abstract' => $abstract,			 
         'paper_no' => $paper_no,               
		 'date_add' => $today2);
         		  
         if($this->db->insert('tbl_papers_data', $data)){			
			$pass = $this->db->insert_id(); 
			 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}		
	//--------------------------- 	 
	function updateFile($paperID=NULL , $file_word=NULL ,$file_pdf=NULL ,$remarks=NULL ,$round_number=NULL ,$editor_id=NULL){		 
		 //$today = date("Y-m-d H:i:s");
		 $today = date("Y-m-d");
		 
		if($editor_id ==''){
			$editor_id = '0';
		}
		
		 $data = array(
         'paper_id' => $paperID,
         'file_word' => $file_word,
         'file_pdf' => $file_pdf,
         'remarks' => $remarks,
         'round_number' => $round_number,         
         'editor_id' => $editor_id,         
		 'date_add' => $today);
         		  
         if($this->db->insert('tbl_paper_file', $data)){				 
			//$pass=1;
			$pass = $this->db->insert_id();  
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}	
	//---------------------------	 
	function list_paperData($userID=NULL, $status1=NULL){	
		
		if($userID ==''){
			
			$sql = "SELECT * FROM `tbl_papers_data` WHERE status_process IN(".$status1.") ORDER BY id DESC ";
			$query=$this->db->query($sql);	
			return $query;	
		} else {
			
		/*	$txtWhere2 = "AND editor_id ='".$userID."' ";
			
			$sql = "SELECT * FROM `tbl_papers_data` WHERE status_process IN(".$status1.") $txtWhere2 ORDER BY id DESC ";
			$query=$this->db->query($sql);		
			$numberCount = $query->num_rows();
			
			if($numberCount >0){
				return $query;

			} else {

				$sql = "SELECT * FROM `tbl_papers_data` As p LEFT JOIN tbl_reviewer_data AS e ON p.id = e.paper_id WHERE p.status_process IN(".$status1.") AND (e.reviewer_id = '".$userID."' OR p.editor_id ='".$userID."')  ";*/
			
			//	SELECT * FROM `tbl_papers_data` WHERE status_process IN('1') AND editor_id ='2' OR id IN('4')
					
				$sql1 = "SELECT paper_id FROM `tbl_reviewer_data` WHERE reviewer_id = '".$userID."' AND status IN('0','1') ";
        		$query1 = $this->db->query($sql1);			
				$numberCount = $query1->num_rows();	
				$txt ='';
				if($numberCount >0){
					foreach ($query1->result() as $data){
                        $txt = $txt.','.$data->paper_id;
                    }
					$txt = substr($txt,1);
				}
				if($txt !=''){
					$txt2 = "OR id IN(".$txt.") ";
				} else {
					$txt2 ='';
				}
				$sql = "SELECT * FROM `tbl_papers_data` WHERE status_process IN(".$status1.") AND editor_id = '".$userID."' $txt2 ORDER BY id DESC ";
				$query=$this->db->query($sql);	
				return $query;	
			//}			
		}		
	}	
	//---------------------------  
	function get_author($author_id=NULL){		
		
		$sql = "SELECT * FROM `tbl_authors_data` WHERE id ='".$author_id."' ";
        $query = $this->db->query($sql);
		$row=$query->row();
		$pass = $row->salutation.' '.$row->first_name.' '.$row->last_name;
		
		return $pass;		
	}  
	//---------------------------  
	function GetEngDate($day2){
		$dateArray = explode("-",$day2);
		//echo "Day 2 = ".$day2."<br>";
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		$date1 = $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
		return $date1; 
	}
	//---------------------------  
	function get_paperFile($paper_id=NULL,$round_number=NULL){
		
		if($paper_id !=''){
			$this->db->where('paper_id', $paper_id);
		}
		if($round_number !=''){
			$this->db->where('round_number', $round_number);
		}
		
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_paper_file');
		
		return $query;		
	}  
	//----------------		 
	function name_paperFile($name=NULL){
		
		$nArray = explode("/",$name);		
		$nameF= $nArray[1];
				
		return $nameF ;
	}  
	//--------------------------- 	
	function do_addEditor($name=NULL,$email=NULL,$password=NULL){		 
		 $today = date("Y-m-d H:i:s");
		 //$today = date("Y-m-d");	
		 $password2 = md5($password);
		
		 $data = array(
         'name_sname' => $name,
         'email' => $email,                 
         'password' => $password2,                 
         'password_temp' => $password,                 
         'admin_type' => '3',                 
		 'date_add' => $today);
         		  
         if($this->db->insert('tbl_journal_user', $data)){				 
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}	
	//--------------------------- 
	function do_setEditor($paper_id=NULL, $editor_id=NULL, $message_id=NULL, $editor_id1=NULL){		 
		 //$today = date("Y-m-d H:i:s");
		 $today = date("Y-m-d");
		
		if($editor_id1 !=''){
		 $this->db->where('paper_id', $paper_id);
	 	 $this->db->where('editor_id', $editor_id1);
         $query = $this->db->get('tbl_editor_data');
           
         if($query->num_rows() > 0){
			 
			/*$this->db->where('paper_id', $paper_id);
	 		$this->db->where('editor_id', $editor_id1);
			$this->db->delete('tbl_editor_data');*/
			 
			$data4 = array(
				   'editor_id' => $editor_id
				);
			$this->db->where('paper_id', $paper_id);
	 		$this->db->where('editor_id', $editor_id1);
			if($this->db->update('tbl_editor_data', $data4)){			

				$data2 = array(
				   'editor_id' => $editor_id
				);
				$this->db->where('id', $paper_id);
				$this->db->update('tbl_papers_data', $data2);

				$data3 = array(
					   'editor_id' => $editor_id
					);
				$this->db->where('paper_id', $paper_id);
				$this->db->update('tbl_paper_file', $data3);			 

				//$pass = $this->db->insert_id(); 
				$pass = 1; 
			 }else{
				$pass = 0;
				//$this->db->_error_message(); 
			 } 
			 
		 }  }  else  {
			
			$data = array(
			 'paper_id' => $paper_id,
			 'editor_id' => $editor_id,                 
			 'message_id' => $message_id,                 
			 'status' => '0',                 
			 'date_add' => $today);

			//$this->db->insert('tbl_editor_data', $data);
			 if($this->db->insert('tbl_editor_data', $data)){	

				$data2 = array(
				   'editor_id' => $editor_id
				);
				$this->db->where('id', $paper_id);
				$this->db->update('tbl_papers_data', $data2);

				$data3 = array(
					   'editor_id' => $editor_id
					);
				$this->db->where('paper_id', $paper_id);
				$this->db->update('tbl_paper_file', $data3);			 

				//$pass = $this->db->insert_id(); 
				$pass = 1; 
			 }else{
				$pass = 0;
				//$this->db->_error_message(); 
			 }			
		}			 
		return $pass;			
	}	
	//---------------------------  
	function removeEditor($paper_id=NULL, $editor_id=NULL){
	 
	 	$this->db->where('paper_id', $paper_id);
	 	$this->db->where('editor_id', $editor_id);
		$this->db->delete('tbl_editor_data');
		
		$data2 = array(
            'editor_id' => '0'
        );
		$this->db->where('id', $paper_id);
		$this->db->where('editor_id', $editor_id);
		$this->db->update('tbl_papers_data', $data2);

		$data3 = array(
			'editor_id' => '0'
		);
		$this->db->where('paper_id', $paper_id);
		$this->db->where('editor_id', $editor_id);
		$this->db->update('tbl_paper_file', $data3);	
		return 1;
	}	 
	//---------------------------	 
	function get_listEditor($editor_id=NULL,$check=NULL){	
		
		if(($editor_id !='') || ($editor_id !='0')){
			$txtWhere2 = "AND id ='".$editor_id."' ";
		} else if($editor_id =='') {
			$txtWhere2 = '';
		}
		if($check !=''){
			$txtWhere = "AND id !='".$editor_id."' ";
			$txtWhere2 = '';
		} else {
			$txtWhere = '';
		}		
		if(($this->session->userdata('juserLv') =='1') || ($this->session->userdata('juserLv') =='2')){
			$txtWhere2 = '';
			$txtWhere = "AND accept_from_fontend != '1' ";
		}
		   
		$sql = "SELECT * FROM `tbl_journal_user` WHERE admin_type = '3' AND data_status = '1' $txtWhere2 $txtWhere  ORDER BY id DESC ";
        $query=$this->db->query($sql);
        return $query;			
	}	
	//--------------------------- 	
	function insert_Message_inMail($type=NULL, $paper_id=NULL, $paper_no=NULL, $date_start=NULL, $date_end=NULL, $message=NULL){		 
		 $today = date("Y-m-d H:i:s");
		 //$today = date("Y-m-d");	
		if($date_start != '0000-00-00'){			
			$dateArray = explode("/",$date_start);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$date_start = $year."-".$mon."-".$date;
		}
		if($date_end != '0000-00-00'){			
			$dateArray = explode("/",$date_end);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$date_end = $year."-".$mon."-".$date;
		}
		
		 $data = array(
         'message' => $message,
         'date_start' => $date_start,                 
         'date_end' => $date_end,                 
         'for_type' => $type,                 
         'paper_id' => $paper_id,                 
         'paper_no' => $paper_no,                 
		 'date_add' => $today);
         		  
         if($this->db->insert('tbl_message_inMail', $data)){				 
			$pass = $this->db->insert_id();
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}
	//--------------------------- 	
	function update_Message_inMail($type=NULL, $paper_id=NULL, $paper_no=NULL, $date_start=NULL, $date_end=NULL, $message=NULL, $message_id=NULL){		 
		 $today = date("Y-m-d H:i:s");
		 //$today = date("Y-m-d");	
		
		if($date_start != '0000-00-00'){			
			$dateArray = explode("/",$date_start);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$date_start = $year."-".$mon."-".$date;
		}
		if($date_end != '0000-00-00'){			
			$dateArray = explode("/",$date_end);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$date_end = $year."-".$mon."-".$date;
		}
		
		 $data = array(
         'message' => $message,
         'date_start' => $date_start,                 
         'date_end' => $date_end,                 
         'for_type' => $type,                 
         'paper_id' => $paper_id,                 
         'paper_no' => $paper_no);
         		  
		 $this->db->where('id', $message_id);
         if($this->db->update('tbl_message_inMail', $data)){				 
			//$pass = $this->db->insert_id();
			$pass = $message_id;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}	
	//---------------------------	 
	function get_Message_inMail($type=NULL, $paper_id=NULL){	   
		   
		 $sql = "SELECT * FROM `tbl_message_inMail` WHERE for_type = '".$type."' AND paper_id = '".$paper_id."' ORDER BY id DESC ";
         $query=$this->db->query($sql);
         return $query;			
	} 
	//---------------------------	 
	function get_author2($author_id=NULL){	   
		   
		 $sql = "SELECT * FROM `tbl_authors_data` WHERE id ='".$author_id."' ORDER BY id DESC ";
         $query=$this->db->query($sql);
         return $query;			
	}	
	//---------------------------  
	function insert_mailData($subject=NULL, $editor_id=NULL, $to_email=NULL, $paper_no=NULL, $paper_id=NULL, $type_mail=NULL, $name=NULL){		 
		 $today = date("Y-m-d H:i:s");   
		 //$today = date("Y-m-d");		 
		
		 $data = array(
         'subject' => $subject,
         'user_id' => $editor_id,                 
         'name' => $name,                 
         'mail_receiver' => $to_email, 
         'paper_id' => $paper_id,                 
         'paper_no' => $paper_no,                 
         'type_mail' => $type_mail,                 
		 'date_sent' => $today);
         		  
         if($this->db->insert('tbl_mail_data', $data)){				 
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}	
	//---------------------------
	function change_statusPaper($status=NULL,$admin=NULL,$paper_id=NULL,$paper_no=NULL){		 
		$today = date("Y-m-d H:i:s");
		//$today = date("Y-m-d");		 
		
		$data = array(
        'status_process' => $status,
        'id_submitted' => $admin,     
        'submitted_date' => $today);         		  
         
		$this->db->where('id', $paper_id);
		$this->db->where('paper_no', $paper_no);
		if($this->db->update('tbl_papers_data', $data)){	
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}	
	//---------------------------
	function do_setReviewer($paper_id=NULL, $reviewer_id=NULL, $message_id=NULL, $round=NULL){		 
		 //$today = date("Y-m-d H:i:s");
		 $today = date("Y-m-d");		 
		
		 $data = array(
         'paper_id' => $paper_id,
         'reviewer_id' => $reviewer_id,                 
         'status' => '3', 
         'message_id' => $message_id,                 
         'round_number' => $round,               
         'date_add' => $today);
         		  
         if($this->db->insert('tbl_reviewer_data', $data)){				 
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}
	//---------------------------  
	function removeReviewer($paper_id=NULL, $reviewer_id=NULL, $round=NULL){
	 
	 	$this->db->where('paper_id', $paper_id);
	 	$this->db->where('reviewer_id', $reviewer_id);
	 	$this->db->where('round_number', $round);
		$this->db->delete('tbl_reviewer_data');		
			
		return 1;
	} 
	//---------------------------  
	function get_reviewerList($paper_id=NULL,$round_number=NULL,$userID=NULL){
		
		if($paper_id !=''){
			$this->db->where('paper_id', $paper_id);
		}
		if($round_number !=''){
			$this->db->where('round_number', $round_number);
		}
		if($userID !=''){
			$this->db->where('reviewer_id', $userID);
		}		
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_reviewer_data');
		
		return $query;		
	}   	
	//---------------------------  
	function get_nameEditor($data_id=NULL){				
			
		$this->db->where('id', $data_id);				
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_journal_user');		
		return $query;		
	}
	//---------------------------  
	function GetDate2($day2=NULL){
		$dateArray = explode("-",$day2);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];			
		$date1 = $date."/".$mon."/".$year;
		return $date1; 
	}
	//---------------------------  
	function insert_comment($reviewer_id=NULL, $comment=NULL, $result_status=NULL, $paper_id=NULL, $paper_no=NULL, $user_type=NULL, $paper_file_id=NULL, $send_mail=NULL, $round=NULL){
		 $today = date("Y-m-d H:i:s");
		 //$today = date("Y-m-d");
		 if($user_type =='1'){
			 $table = 'tbl_editor_data';
			 $field = 'editor_id';
		 }
		 if($user_type =='2'){
			 $table = 'tbl_reviewer_data';
			 $field = 'reviewer_id';
		 }
		
		 $data = array(
         'paper_id' => $paper_id,
         'reviewer_id' => $reviewer_id,                 
         'comment' => $comment,                 
         'user_type' => $user_type,      
         'result_status' => $result_status,                 
         'paper_no' => $paper_no,                 
         'paper_file_id' => $paper_file_id,                 
         'send_mail' => $send_mail,                 
         'review_date' => $today);
         		  
         if($this->db->insert('tbl_review_comment', $data)){				 
			$pass = $this->db->insert_id();
			 
			$data = array(			  
			'status' => '1');         		  

			if($table == 'tbl_reviewer_data'){
				$this->db->where('round_number', $round);
			} 			 
			$this->db->where('paper_id', $paper_id);
			$this->db->where($field, $reviewer_id);
			$this->db->update($table, $data);
			 
			if($user_type =='1'){				
				
					$data3 = array(					   
					'editor_changeStatus_date' => $today); 

				$this->db->where('id', $paper_id);
				$this->db->where('paper_no', $paper_no);
				$this->db->update('tbl_papers_data', $data3);
				
					$data4 = array(					   
					'editor_result' => $result_status); 

				$this->db->where('paper_id', $paper_id);
				$this->db->where('editor_id', $reviewer_id);
				$this->db->update('tbl_paper_file', $data4);
			} 
			if($user_type =='2'){
				
				$data5 = array(
					'edit_result' => $result_status
				);         		  
				$this->db->where('round_number', $round);			 			 
				$this->db->where('paper_id', $paper_id);
				$this->db->where('reviewer_id', $reviewer_id);
				$this->db->update('tbl_reviewer_data', $data5);				
			}		 
			 
			//$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;
	}
	//---------------------------  
	function updateFile_comment($commentID=NULL,$uploadData=NULL){
		 	
		 $data = array(
         'comment_id' => $commentID,                          
         'file_name' => $uploadData);
         		  
         if($this->db->insert('tbl_reviewComment_files', $data)){				 
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;
	} 
	//---------------------------  
	function get_comment($paper_no=NULL,$userID=NULL,$paper_id=NULL,$round=NULL){
		
		if($paper_no !=''){
			$txtWhere2 = "AND r.paper_no = '".$paper_no."'";
		} else {
			$txtWhere2 = '';
		}
		if($paper_id !=''){
			$txtWhere = "AND r.paper_id ='".$paper_id."' ";
		} else {
			$txtWhere = '';
		}		
		$sql = "SELECT r.id AS reID , r.result_status , r.comment , r.paper_no , r.review_date , r.send_mail , r.reviewer_id FROM `tbl_review_comment` AS r LEFT JOIN tbl_paper_file As f ON r.paper_file_id = f.id WHERE r.reviewer_id = '".$userID."' $txtWhere2  $txtWhere AND f.round_number = '".$round."'  ";
		$query=$this->db->query($sql);	
		return $query;	
	} 
	//--------------------------- 
	function get_commentFile($commentID=NULL){
		
		$sql = "SELECT * FROM `tbl_reviewComment_files` WHERE comment_id = '".$commentID."' ";
		$query=$this->db->query($sql);	
		return $query;	
	} 
	//---------------------------  
	function get_roundNumber($paper_id=NULL,$check=NULL){
		
		if($paper_id !=''){
			$this->db->where('paper_id', $paper_id);
		}
		if($check =='y'){
			$this->db->where_in('editor_result', array('2','3'));
		}		
		//$this->db->where_in('id', array('2','3'));
		$this->db->select_max('round_number');
		$result = $this->db->get('tbl_paper_file')->row();		
		return $result->round_number;		
	} 
	//--------------------------- 
	function GetShortEngDate2($day){
		$DateTimeArray= explode(" ",$day);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$year= substr($year,2);		
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $date."/".$mon."/".$year;
	} 
	//---------------------------
	function managingUpdateStatus($status_process=NULL, $paperID=NULL){		 
		$today = date("Y-m-d H:i:s");
		//$today = date("Y-m-d");		 
		$userID = $this->session->userdata('juser_id');
		
		$data = array(
        'status_process' => $status_process,
        'id_submitted' => $userID,     
        'submitted_date' => $today);         		  
         
		$this->db->where('id', $paperID);		
		if($this->db->update('tbl_papers_data', $data)){	
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	}
	//---------------------------
	//function editorUpdateStatus($status_process=NULL, $paperID=NULL){		 
	function editorUpdateStatus($status_process, $paperID, $userID, $user_type, $paper_no, $paperFile_id, $commentNum, $round){
		
		if($commentNum >0){
			
			$data = array(
				'result_status' => $status_process
			);    		  
			$this->db->where('paper_id', $paperID);		
			$this->db->where('reviewer_id', $userID);		
			$this->db->where('user_type', $user_type);		
			$this->db->where('paper_no', $paper_no);		
			$this->db->where('paper_file_id', $paperFile_id);		
			$this->db->update('tbl_review_comment', $data);
			
		if($user_type == '1'){
			
			$data2 = array(
				'editor_result' => $status_process
			);         		  
			$this->db->where('id', $paperFile_id);		
			$this->db->where('paper_id', $paperID);							
			$this->db->where('round_number', $round);							
			$this->db->update('tbl_paper_file', $data2);
		}
			
	 } else {
			
		if($user_type == '1'){
			
			$data2 = array(
				'editor_result' => $status_process
			);         		  
			$this->db->where('id', $paperFile_id);		
			$this->db->where('paper_id', $paperID);							
			$this->db->where('round_number', $round);							
			$this->db->update('tbl_paper_file', $data2);
		
		} else {
			
			$data = array(
				'edit_result' => $status_process
			);         		  
			$this->db->where('paper_id', $paperID);		
			$this->db->where('reviewer_id', $userID);							
			$this->db->where('round_number', $round);							
			$this->db->update('tbl_reviewer_data', $data);
		}			
	 }
	    return 1;		 
	}	
	//---------------------------
	function update_comment($reviewer_id=NULL, $comment=NULL, $result_status=NULL, $paper_id=NULL, $paper_no=NULL, $user_type=NULL, $paper_file_id=NULL, $dataID=NULL, $send_mail=NULL, $round=NULL){
		 $today = date("Y-m-d H:i:s");
		 //$today = date("Y-m-d");
		 if($user_type =='1'){
			 $table = 'tbl_editor_data';
			 $field = 'editor_id';
		 }
		 if($user_type =='2'){
			 $table = 'tbl_reviewer_data';
			 $field = 'reviewer_id';
		 }
		
		 $data = array(
         'paper_id' => $paper_id,
         'reviewer_id' => $reviewer_id,                 
         'comment' => $comment,                 
         'user_type' => $user_type,      
         'result_status' => $result_status,                 
         'paper_no' => $paper_no,                 
         'paper_file_id' => $paper_file_id,                 
         'send_mail' => $send_mail,                 
         'review_date' => $today);
         	
		 $this->db->where('id', $dataID);
         $this->db->update('tbl_review_comment', $data);			 
		 $pass = $dataID;
			 
			$data = array(			  
			'status' => '1');         		  

			if($table == 'tbl_reviewer_data'){
				$this->db->where('round_number', $round);
			}
			$this->db->where('paper_id', $paper_id);
			$this->db->where($field, $reviewer_id);
			$this->db->update($table, $data);
			 
			if($user_type =='1'){				
				
					$data3 = array(					   
					'editor_changeStatus_date' => $today); 

				$this->db->where('id', $paper_id);
				$this->db->where('paper_no', $paper_no);
				$this->db->update('tbl_papers_data', $data3);
				
					$data4 = array(					   
					'editor_result' => $result_status); 

				$this->db->where('paper_id', $paper_id);
				$this->db->where('editor_id', $reviewer_id);
				$this->db->update('tbl_paper_file', $data4);
			} 
			 
			//$pass=1; 
		 //}else{
			//$pass=0;
			//$this->db->_error_message(); 
		 //}		
		 return $pass;
	}
	//---------------------------  
	function get_comment2($data_id=NULL){						
			
		$sql = "SELECT r.* , r.id AS reID , f.* , f.id AS fileID FROM `tbl_review_comment` AS r LEFT JOIN tbl_paper_file As f ON r.paper_file_id = f.id WHERE r.id = '".$data_id."' ";
		$query=$this->db->query($sql);	
		return $query;
	} 
	//---------------------------  
	function get_managing(){				
			
		$this->db->where('admin_type', '1');				
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_journal_user');		
		return $query;		
	} 
	//---------------------------  
	function count_email2($mail=NULL){
				 
		$sql = "SELECT * FROM `tbl_journal_user` WHERE email ='".$mail."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();			
		return $numberCount;		
	}
	//---------------------------  
	function count_emailauthor($mail=NULL){
				 
		$sql = "SELECT * FROM `tbl_authors_data` WHERE email ='".$mail."' ";
        $query = $this->db->query($sql);
		$numberCount = $query->num_rows();			
		return $numberCount;		
	}
	//---------------------------  
	function list_paperAccepted($userID=NULL,$status1=NULL,$author_id=NULL){
		
		if($userID !=''){
			$txtWhere2 = "reviewer_id = '".$userID."' AND";
		} else {
			$txtWhere2 = "user_type = '1' AND";
		}
		if($author_id !=''){
			$txtWhere3 = "AND author_id = '".$author_id."' ";
		} else {
			$txtWhere3 = "";
		}
		
		//$sql1 = "SELECT paper_id FROM `tbl_reviewer_data` WHERE reviewer_id = '".$userID."' ";
		$sql1 = "SELECT * FROM `tbl_review_comment` WHERE $txtWhere2 result_status = $status1 GROUP BY paper_id ";
        $query1 = $this->db->query($sql1);			
		$numberCount = $query1->num_rows();	
		$txt ='';
		if($numberCount >0){
			foreach ($query1->result() as $data){
               $txt = $txt.','.$data->paper_id;
            }
			$txt = substr($txt,1);
		}
		if($txt !=''){
			//$txt2 = "OR id IN(".$txt.") ";
			$txt2 = "id IN(".$txt.") ";
		} else {
			$txt2 ='';
		}
		if($numberCount >0){
			$sql = "SELECT * FROM `tbl_papers_data` WHERE $txt2 $txtWhere3 ORDER BY id DESC ";
			$query=$this->db->query($sql);	
			return $query;
		
		} else {
			return $query1;
		}
	}
	//---------------------------  
	function list_paperArchived(){				
			
		$this->db->where('payment', '1');				
		$this->db->where('archive', '1');				
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_papers_data');		
		return $query;		
	}	
	//---------------------------  
	function result_fromMail($result=NULL, $paper_id=NULL, $reviewer_id=NULL, $round=NULL){
		
		$this->db->where('paper_id', $paper_id);		
		$this->db->where('reviewer_id', $reviewer_id);							
		$this->db->where('status', '3');							
		$this->db->where('round_number', $round);				
		$this->db->select('*');
		$query1 = $this->db->get('tbl_reviewer_data');
		$numberCount = $query1->num_rows();	
		
		if($numberCount >0){	
		
			 $today = date("Y-m-d");
			 if($result == 'agree'){
				 $result = '0';
			 } else {
				 $result = '2';
			 }

			 $data = array(   
			 'status' => $result);

			 $this->db->where('paper_id', $paper_id);		
			 $this->db->where('reviewer_id', $reviewer_id);							
			 $this->db->where('status', '3');							
			 $this->db->where('round_number', $round);	 
			 if($this->db->update('tbl_reviewer_data', $data)){				 
				//$pass = $this->db->insert_id();
				$pass=1; 
			 }else{
				$pass=0;
				//$this->db->_error_message(); 
			 }
		} else {
			$pass=0;
		}
		 return $pass;
	} 
	//---------------------------  
	function setPayment_forPaper($accountName=NULL, $accountNo=NULL, $bank=NULL, $swiftCode=NULL, $paper_no=NULL, $paper_id=NULL){		 
		 	
		 $data = array(   
         'accountName' => $accountName,                          
         'accountNo' => $accountNo,                          
         'bank' => $bank,                          
         'swiftCode' => $swiftCode);         	
									
		 $this->db->where('paper_no', $paper_no);							
		 $this->db->where('id', $paper_id);	 
         if($this->db->update('tbl_papers_data', $data)){				 
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;
	} 
	//---------------------------  
	function GetEngDateTime($day){
		$DateTimeArray= explode(" ",$day);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
		//$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
       $monthArray=Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $date."&nbsp;".$monthArray[$mon]."&nbsp;".$year." ".$DateTimeArray[1];
	} 
	//---------------------------  
	function list_paperPaid(){				
			
		$this->db->where('payment', '1');						
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_papers_data');		
		return $query;		
	} 
	//---------------------------  
	function paper_authorEdit(){				
			
		$sql = "SELECT * FROM `tbl_paper_file` WHERE editor_result = '0' AND round_number > 0 ";
		$query=$this->db->query($sql);	
		return $query;		
	}
	//---------------------------  
	function paper_authorEdit2($userID=NULL,$type=NULL){				
		
		if($type == '2'){
			$sql = "SELECT * FROM `tbl_reviewer_data` WHERE reviewer_id = '".$userID."' AND status = '0' AND edit_result = '0' GROUP BY paper_id ";
		
		} else {
			//$sql = "SELECT * FROM `tbl_editor_data` WHERE editor_id = '".$userID."' AND status = '0' ";
			$sql = "SELECT * FROM `tbl_paper_file` WHERE editor_id = '".$userID."' AND editor_result = '0' ";
		}		
		$query=$this->db->query($sql);	
		return $query;		
	} 
	//--------------------------- 	
	function add_otherFiles($paper_file_id=NULL,$file_name=NULL){		 
		 //$today = date("Y-m-d H:i:s");
		 $today = date("Y-m-d");	
		 		
		 $data = array(
         'paper_file_id' => $name,
         'file_name' => $email,   
         'date_add' => $today);
         		  
         if($this->db->insert('tbl_otherFiles_data', $data)){				 
			$pass=1;
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
	} 
	//---------------------------  
	function get_otherFiles($paper_file_id=NULL){				
			
		$sql = "SELECT * FROM `tbl_otherFiles_data` WHERE paper_file_id = '".$paper_file_id."' ORDER BY id DESC ";
		$query=$this->db->query($sql);	
		return $query;		
	} 
	//---------------------------	 
	function update_keyValue($key_value2=NULL,$userID=NULL,$table=NULL){			 
		
		 $data = array(
         'key_value' => $key_value2);
		 
		 $this->db->where('id', $userID);
		 if($this->db->update($table, $data)){
		 	$pass = 1;
		 }else{
		     $pass=0;
		 }
		return $pass;
	} 
	//----------------------------	 
	function do_checkEmail($mail=NULL,$table=NULL){
		  $sql2 = "SELECT * FROM $table WHERE email ='".$mail."' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  if($numberCount > 0){
			  //$pass=1;
			  
			  $sql = "SELECT * FROM $table WHERE email ='".$mail."' ";
          	 // $query = $this->db->query($sql);
			  
			  $query = $this->db->query($sql);
			  $row=$query->row();
			  $pass = $row->id;
		  
		  } else {
			  $pass=0;			  
		  }
		 return $pass;
	} 
	//---------------------------  
	function searchPaper($dateStart=NULL,$dateEnd=NULL,$status=NULL){ 
		$txtWhere2 ='';
		
		/*if($dateStart != '0000-00-00'){			
			$dateArray = explode("/",$dateStart);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$dateStart = $year."-".$mon."-".$date;
		}
		if($dateEnd != '0000-00-00'){			
			$dateArray = explode("/",$dateEnd);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$dateEnd = $year."-".$mon."-".$date;
		}*/
		
		//if(($dateStart == '0000-00-00') && ($dateEnd == '0000-00-00') && ($status == '0')){
		if(($dateStart == '') && ($dateEnd == '') && ($status == '')){
			$txtWhere2 = "GROUP BY paper_id ";
		/*} else {
			$txtWhere2 = '';*/
		}
		
		//if(($dateStart != '0000-00-00') && ($dateEnd != '0000-00-00')){
		else if(($dateStart != '') && ($dateEnd != '')){
			
			$dateArray = explode("/",$dateStart);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$dateStart = $year."-".$mon."-".$date;
			
			$dateArray = explode("/",$dateEnd);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$dateEnd = $year."-".$mon."-".$date;
			
			$dateEnd = date('Y-m-d',strtotime($dateEnd . "+1 days"));
			$txtWhere2 = "AND review_date BETWEEN '".$dateStart."' AND '".$dateEnd."' ";
		/*} else {
			$txtWhere2 = '';*/
		}
		
		//if(($dateStart != '0000-00-00') && ($dateEnd == '0000-00-00')){
	else if(($dateStart != '') && ($dateEnd == '')){
			
			$dateArray = explode("/",$dateStart);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$dateStart = $year."-".$mon."-".$date;
			
			$txtWhere2 = "AND review_date >= '".$dateStart."' ";
		/*} else {
			$txtWhere2 = '';*/
		}
		
		//if(($dateStart == '0000-00-00') && ($dateEnd != '0000-00-00')){
		else if(($dateStart == '') && ($dateEnd != '')){
			
			$dateArray = explode("/",$dateEnd);
			$date= $dateArray[0];
			$mon= $dateArray[1];
			$year= $dateArray[2];			
			$dateEnd = $year."-".$mon."-".$date;
			
			$dateEnd = date('Y-m-d',strtotime($dateEnd . "+1 days"));
			$txtWhere2 = "AND review_date <= '".$dateEnd."' ";
		/*} else {
			$txtWhere2 = '';*/
		}
		
		if($status != ''){
			$txtWhere = "AND result_status ='".$status."' ";
		} else {
			$txtWhere = '';
		}
		
		$sql = "SELECT * FROM `tbl_review_comment` WHERE user_type = '1' $txtWhere2  $txtWhere ORDER BY review_date DESC  ";
		$query=$this->db->query($sql);	
		return $query;	
	}  
	 
	 /*
	 searchPaper($dateStart,$dateEnd,$status)
		 
		 SELECT * FROM `tbl_review_comment` WHERE user_type = '1' AND review_date BETWEEN '2018-11-01' AND '2018-11-13' AND result_status = '3' ORDER BY review_date DESC ครบ
		 
		 SELECT * FROM `tbl_review_comment` WHERE user_type = '1' AND review_date BETWEEN '2018-11-01' AND '2018-11-13' ORDER BY review_date DESC วันที่อย่างเดียว
		 
		 SELECT * FROM `tbl_review_comment` WHERE user_type = '1' AND '2018-11-13' ORDER BY review_date DESC สถานะอย่างเดียว
		 
		 SELECT * FROM `tbl_review_comment` WHERE user_type = '1' GROUP BY paper_id ORDER BY review_date DESC  ไม่กำหนดอะไรเลย
		 
		วันที่เริ่มต้น อย่างเดียว  ,  วันที่สิ้นสุดอย่างเดียว */
	 
 }

<?php 
 class user_model extends CI_Model
 { 
     function list_user($dataID=NULL){
		//$userupdate=$this->session->userdata('user_id'); 
		
		if($dataID !=''){ 
			$this->db->where('id', $dataID);
		}
		 
		//$this->db->where('user_update', $userupdate);
		$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$query = $this->db->get('tbl_user_webpage');
		
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
		 
	function can_login($username=NULL, $password=NULL)
      {
           $password = md5($password);
           $this->db->where('user_name', $username);
           $this->db->where('password', $password);
           $this->db->where('data_status', '1');
           $query = $this->db->get('tbl_user_webpage');

           //SELECT * FROM users WHERE username = '$username' AND password = '$password'
           if($query->num_rows() > 0)
           {
            foreach ($query->result() as $row);
            $userdata = array(
                 'user_id'         => $row->id,
                 'name'              => $row->name_sname,
                 'userLv'            => $row->user_type,
                 //'depart_id'     => $row->depart_id ,
                 //'branch_id'     => $row->brach_id
                 );

           $this->session->set_userdata($userdata);
           //-----------last update----------//
           date_default_timezone_set('Asia/Bangkok');
           $now = date("Y-m-d H:i:s");
           $data = array(
               'last_login' => $now
            );
          $this->db->where('id', $row->id);
          $this->db->update('tbl_user_webpage', $data);
			   //return '1';
			   return $row->id;
           }
           else
           {
                return '0';
           }
      }
//---------------------------------	 
	  
	  function get_menu($menu_type=NULL , $cate=NULL){
		//$userupdate=$this->session->userdata('user_id'); 
		  
		if($menu_type !=''){
		    $this->db->where('menu_type', $menu_type);
		}
		if($cate !=''){
		    $this->db->where('menu_cate', $cate);
		}
		  
		//$this->db->where('user_update', $userupdate);
		//$this->db->where('data_status', '1');
		$this->db->select('*');
		$this->db->order_by('menu_number','asc');
		$query = $this->db->get('tbl_menu_data');
		
		return $query;		
	 } 
//----------------------------
	 
	  	function getPermissionData($menuID=NULL,$userID=NULL){
		  $sql2 = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuID."' AND user_id ='".$userID."' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  if($numberCount > 0){
			   $sql = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuID."' AND user_id ='".$userID."' ";
			   $query=$this->db->query($sql);
			   return $query;
		  }
	  	}	 
//---------------------------  
	 
	 	function update_permission($userID ,$menuId ,$permission ,$menu_url){
		  $sql = "SELECT * FROM `tbl_permission_data` WHERE menu_id ='".$menuId."' AND user_id ='".$userID."' ";
          $query = $this->db->query($sql);
		  $numberCount = $query->num_rows();

		  $menu_url = '';

		  if($numberCount < 1){

			$data = array(
			  'user_id' => $userID,
			  'menu_id' => $menuId,
			  'menu_url' => $menu_url,
			  'permission' => $permission
		   	);


		   	if($this->db->insert('tbl_permission_data', $data)){
				$pass=1;
			}else{
				$pass=0;
			}


		  }

		  if($numberCount > 0){

			$data = array(
			  'user_id' => $userID,
			  'menu_id' => $menuId,
			  'menu_url' => $menu_url,
			  'permission' => $permission
		   	);

		   	$this->db->where('user_id', $userID);
			$this->db->where('menu_id', $menuId);
		 	if($this->db->update('tbl_permission_data', $data)){
			 $pass=1;
		 	}else{
		   	 $pass=0;
		 	}

		  }

		  return $pass;

	  	}	 
//---------------------------  
		 
	function addUserData($allData=NULL,$dataID=NULL){			
		 
		 $today = date("Y-m-d");	
				 	
		 $data = array(
         'name_sname' => $allData['name_sname'],
         'user_name' => $allData['user_name'],         
         'password' => md5($allData['password']),         
         'email' => $allData['email'],         
         'position_level' => $allData['position_level'],         
         'position_name' => $allData['position_name'],         
         'date_add' => $today,         
         'user_update' =>$this->session->userdata('user_id'));
         		  
         if($this->db->insert('tbl_user_webpage', $data)){
			//$pass=1;
			$pass = $this->db->insert_id(); 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }
		
		 return $pass;		 
	}		
//---------------------------
	 
	 function editUserData($allData=NULL,$dataID=NULL){	 
		 
		 if($allData['password'] ==''){
			 $password = $allData['hpassword'];
			 
		 } else {
			 $password = md5($allData['password']);
		 }
		
		 $data = array(
         'name_sname' => $allData['name_sname'],
         'user_name' => $allData['user_name'],         
         'password' => $password,         
         'email' => $allData['email'],           
         'position_level' => $allData['position_level'],         
         'position_name' => $allData['position_name'],         
         'user_update' =>$this->session->userdata('user_id'));
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_user_webpage', $data)){
		 	$pass = $dataID;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }		 
//---------------------------
	 
	 function getMenuList($menu_type=NULL,$menu_cate=NULL){
		
		  $userID = $this->session->userdata('user_id');	   
		   
		  $sql = "SELECT m.menu_name , m.menu_type , m.menu_number , m.menu_cate , m.menu_url , m.id FROM `tbl_permission_data` AS p LEFT JOIN tbl_menu_data AS m ON p.menu_id = m.id WHERE p.user_id = '".$userID."' AND p.permission IN ('2','3') AND m.menu_type = '".$menu_type."' AND m.menu_cate = '".$menu_cate."' ORDER BY m.menu_number ASC ";
          $query=$this->db->query($sql);
          return $query;
	 } 
//----------------------------
	 
	 function do_checkEmail($mail=NULL){
		  $sql2 = "SELECT * FROM `tbl_user_webpage` WHERE email ='".$mail."' AND data_status = '1' ";
          $query2 = $this->db->query($sql2);
		  $numberCount = $query2->num_rows();

		  if($numberCount > 0){
			  //$pass=1;
			  
			  $sql = "SELECT * FROM `tbl_user_webpage` WHERE email ='".$mail."' AND data_status = '1' ";
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
	 
	 //function generateRandomString($length = 6) {
	 function generateRandomString() {
		/*$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;*/
		 
		 
		   $alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ=";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 5; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
	 } 		 
//---------------------------
	 
	 function update_keyValue($key_value2=NULL,$userID=NULL){			 
		
		 $data = array(
         'key_value' => $key_value2,                 
         'user_update' =>$userID);
		 
		 $this->db->where('id', $userID);
		 if($this->db->update('tbl_user_webpage', $data)){
		 	$pass = 1;
		 }else{
		     $pass=0;
		 }
		return $pass;
	 }
//---------------------------
	 
	 function update_newPass($password=NULL,$dataID=NULL){			 
		 $txt ='';
		 
		 $data = array(
         'password' => md5($password),                 
         'key_value' => $txt,                 
         'user_update' =>$dataID);
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_user_webpage', $data)){
		 	$pass = 1;
		 }else{
		    $pass=0;
		 }
		return $pass;
	 }	
//---------------------------
		 
	function can_login2($username=NULL, $password=NULL){
           $password = md5($password);
           $this->db->where('email', $username);
           $this->db->where('password', $password);
           $this->db->where('data_status', '1');
           $query = $this->db->get('tbl_journal_user');

           //SELECT * FROM users WHERE username = '$username' AND password = '$password'
           if($query->num_rows() > 0)
           {
            foreach ($query->result() as $row);
            $userdata = array(
                 'juser_id'         => $row->id,
                 'jname'              => $row->name_sname,
                 'juserLv'            => $row->admin_type,
                 //'depart_id'     => $row->depart_id ,
                 //'branch_id'     => $row->brach_id
                 );

           $this->session->set_userdata($userdata);
           //-----------last update----------//
           date_default_timezone_set('Asia/Bangkok');
           $now = date("Y-m-d H:i:s");
           $data = array(
               'last_login' => $now,
               'password_temp' => '');
          $this->db->where('id', $row->id);
          $this->db->update('tbl_journal_user', $data);
			   //return '1';
			   return $row->id;
           }
           else
           {
                return '0';
           }
      }	 
	 
 }

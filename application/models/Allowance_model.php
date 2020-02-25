<?php
    class Allowance_model extends CI_Model{
        var $table = "manage_allowance";

        /**----------------- get count ---------------------- */
       function getcountfaildoc(){
            $this->load->database(); 
		    $reasonAdmin = $this->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
			foreach($reasonAdmin->result() as $reasonAdmin2){};
            //$sql = "SELECT COUNT(*) as count FROM `tbl_outbound_document` WHERE check_doc2 = '0' AND check_doc = '1' AND approve_status = '1' AND withdraw = '1' ";		   
		    $sql = "SELECT
  						(SELECT COUNT(*) FROM tbl_outbound_document WHERE check_doc2 = '0' AND check_doc = '1' AND approve_status = '1' AND withdraw = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ) as table1Count, 
  						(SELECT COUNT(*) FROM tbl_local_document WHERE check_doc = '0' AND withdraw = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ) as table2Count";	
		   
		    $query = $this->db->query($sql);
			$row = $query->row();
			$pass = $row->table1Count + $row->table2Count;
		   
            //$query = $this->db->query($sql);
            //return $query->result_array();
		    return $pass;
        }
		/**----------------- get count ---------------------- */
        function getcountpending(){
            $this->load->database(); 
			$reasonAdmin = $this->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
			foreach($reasonAdmin->result() as $reasonAdmin2){};
			
            //$sql = "SELECT COUNT(*) as count FROM `tbl_outbound_document` WHERE check_doc2 = '2' AND check_doc = '1' AND approve_status = '1' AND withdraw = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ";			
			$sql = "SELECT
  						(SELECT COUNT(*) FROM tbl_outbound_document WHERE check_doc2 = '2' AND check_doc = '1' AND approve_status = '1' AND withdraw = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ) as table1Count, 
  						(SELECT COUNT(*) FROM tbl_local_document WHERE check_doc = '2' AND withdraw = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ) as table2Count";
			
			$query = $this->db->query($sql);
			$row = $query->row();
			$pass = $row->table1Count + $row->table2Count;
			
            //$query = $this->db->query($sql);
            //return $query->result_array();
			return $pass;
        }
		/**----------------- get count ---------------------- */
        function getcountalldoc(){
            $this->load->database();
			$this->load->database(); 
			$reasonAdmin = $this->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
			foreach($reasonAdmin->result() as $reasonAdmin2){};
            //$sql = "SELECT COUNT(*) as count FROM `tbl_outbound_document` WHERE check_doc2 != '3' AND check_doc2 != '4' AND check_doc = '1' AND approve_status = '1' AND withdraw = '1' ";			
			
			$sql = "SELECT
  						(SELECT COUNT(*) FROM tbl_outbound_document WHERE finishform = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ) as table1Count, 
  						(SELECT COUNT(*) FROM tbl_local_document WHERE finishform = '1' AND reason_request = '".$reasonAdmin2->reason_type."' ) as table2Count";
			$query = $this->db->query($sql);
			$row = $query->row();
			$pass = $row->table1Count + $row->table2Count;
			
            //$query = $this->db->query($sql);
            //return $query->result_array();
			return $pass;
        }
		/**----------------- get count ---------------------- */
        function getcountallmemberallow(){ 
            $this->load->database();
            $sql = "SELECT COUNT(*) as count FROM `tbl_user_data` where data_status = '1' ";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        /**-------------------End get count ------------------------- */        
        function getdata($sql){ 
            $this->load->database();
            $query = $this->db->query($sql);
            return $query->result_array();
        }
		/**----------------- get count ---------------------- */
        function update($data,$id_allowance,$table){
            $this->db->where('id_allowance',"$id_allowance");
            $this->db->update($table,$data);
             
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){ 
                $chksubmit = false; 
            }

            return $chksubmit;
        }
		/**----------------- get count ---------------------- */
        function updateUser($data=NULL,$id=NULL,$table=NULL){
            $this->db->where('id',$id);
            $this->db->update($table,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){ 
                $chksubmit = false; 
            }
            return $chksubmit;
        }
		/**----------------- get count ---------------------- */
        function insert($data,$table){ 
            $this->load->database(); 
            $this->db->insert( $table , $data);

            if ($this->db->affected_rows() > 0) {
                return true;
            }else{
                return false;
            }
        } 
		/**----------------- get count ---------------------- */
    	function chk_username($id,$user_name,$table){

           // $condition = "user_name =" . "'" . $username . "' AND data_status = '1'";
            $condition = "id <>".$id." and user_name =" . "'" . $user_name . "'";
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
		/**----------------- get count ---------------------- */
        function chk_email($id,$email,$table){

           // $condition = "user_name =" . "'" . $username . "' AND data_status = '1'";
            $condition = "id <>".$id." and email =" . "'" . $email . "'";
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
		/*--------------------user--------------------------*/
		function edit_pass($data,$username,$table){
            $this->db->where('user_name',$username); 
            $this->db->update($table,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }
		/**----------------- get count ---------------------- */
         // Read data using  password
        function chk_old_pass($oldpass,$username,$table) {

            $condition = "user_name =" . "'" . $username . "' AND " . "password =" . "'" . $oldpass . "' AND data_status = '1'";
            $this->db->select('*');
            $this->db->from($table);
            $this->db->where($condition);
            $this->db->limit(1);
            $query = $this->db->get();

            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
        /*--------------------user--------------------------*/
        function chk_update($user_create){

            $sql = "SELECT id_allowance FROM manage_allowance WHERE user_create =".$user_create." ORDER BY id_allowance DESC LIMIT 1";

            $this->load->database(); 
            $query = $this->db->query($sql); 

            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false ;
            }
        }
		/**----------------- get count ---------------------- */
        function insert_allowance($data){ 
            $this->load->database(); 
            if($this->db->insert('tbl_outbound_document' , $data)){
				
				$pass = $this->db->insert_id(); 
				
		 	}else{
				$pass = 0;
			}
			
			return trim($pass);            
        }
		//--------------------------- 
        function insert_allowancelocal($data){ 
            $this->load->database(); 
            if($this->db->insert('tbl_local_document' , $data)){
				
				$pass = $this->db->insert_id(); 
				
		 	}else{
				$pass = 0;
			}
			
			return trim($pass);            
        }
		/**----------------- get count ---------------------- */
      /*  function update_allowance($data,$id_allowance){   ####### original #######

            $condition = "id_allowance =" . "'" .$id_allowance. "' and data_status = '1'";

            $this->db->where($condition);
            $this->db->update($this->table ,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){ 
                $chksubmit = false; 
            }

            return $chksubmit;
        }*/
		/**----------------- get count ---------------------- */
        function update_allowance($data=NULL,$id_allowance=NULL){
           
            $this->db->where('id', $id_allowance);  
            if($this->db->update('tbl_outbound_document', $data)){ 
				
				$pass = $id_allowance;
				
		 	}else{
				$pass = 0;
			}			
			return $pass;
        }
		/**----------------- get count ---------------------- */
        function update_allowancelocal($data=NULL,$id_allowance=NULL){
           
            $this->db->where('id', $id_allowance);  
            if($this->db->update('tbl_local_document', $data)){ 
				
				$pass = $id_allowance;
				
		 	}else{
				$pass = 0;
			}			
			return $pass;
        }
		/**----------------- get count ---------------------- */
        function getdatalist_saraban($sql){
            $this->load->database(); 
            $query = $this->db->query($sql); 

            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false ;
            }
        }
		/**----------------- get count ---------------------- */
        function getdatalist_allowance($sql){
            $this->load->database(); 
            $query = $this->db->query($sql); 

                if($query->num_rows()>0){
                  return $query->result_array();
                }else{
                  return false ;
                }
        }
		/**----------------- get count ---------------------- */
        function edit_allowance($id_allowance){

            $sql = "DELETE FROM tbl_outbound_document WHERE id = '".$id_allowance."'";

			if($this->db->query($sql)){
				$pass = true;
			}else{
				$pass = false;
			}
			return $pass; 
        }
		/**----------------- get count ---------------------- */
        function edit_allowance2($id_allowance){

            $sql = "DELETE FROM tbl_local_document WHERE id = '".$id_allowance."'";

			if($this->db->query($sql)){
				$pass = true;
			}else{
				$pass = false;
			}
			return $pass; 
        }
		/**----------------- get count ---------------------- */
    	// Read data from database to show data in user page
    	function read_email_admin($table){

		   // $condition = "user_name =" . "'" . $username . "'";
			$this->db->select('email');
			$this->db->from($table);
		   // $this->db->where($condition);
		   /* $this->db->limit(1);*/
			$query = $this->db->get();

			if ($query->num_rows() >0) {
				return $query->result();
			} else {
				return false;
			}
    	}
		/**------------------------------------- */
		function get_userDetail($dataId=NULL){	   
		   
		 	$sql = "SELECT * FROM `tbl_user_data` WHERE id ='".$dataId."' ORDER BY id DESC ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		/**------------------------------------- */
		function get_career($dataId=NULL){	
			
			if($dataId !=''){
				$txtWhere = "WHERE id ='".$dataId."'";
			} else {
				$txtWhere = '';
			}
		   
		 	$sql = "SELECT * FROM `tbl_career_data` $txtWhere ORDER BY id DESC ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		/**------------------------------------- */
		function get_position($dataId=NULL){
			
			if($dataId !=''){
				$txtWhere = "WHERE id ='".$dataId."'";
			} else {
				$txtWhere = '';
			}
		   
		 	$sql = "SELECT * FROM `tbl_position_data` $txtWhere ORDER BY id DESC ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		//---------------------------	 
	 	function DateThai($strDate=NULL){		
		
			$dateArray = explode("-",$strDate);
			$date2 = $dateArray[2];
			$mon = $dateArray[1];
			$year = $dateArray[0] + 543;
			$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
			
			//$currentYear = date("Y"); 

			//if($dateArray[0] == 2018){ $year = $dateArray[0]+543; }
			if($date2 < 10){ $date2 = str_replace("0", "", $date2); } 
			$day=$date2."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
			return $day;		
		} 
		//---------------------------	 
	 	function DateThai1($strDate=NULL){		
		
			$dateArray = explode("-",$strDate);
			$date2 = $dateArray[2];
			$mon = $dateArray[1];
			$year = $dateArray[0] + 543;
			$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
			
			//$currentYear = date("Y"); 

			//if($dateArray[0] == 2018){ $year = $dateArray[0]+543; }
			if($date2 < 10){ $date2 = str_replace("0", "", $date2); } 
			$day=$date2." ".$monthArray[$mon]." ".$year;
			return $day;		
		} 
		//---------------------------	 
	 	function insert_withdraw($data=NULL,$table2=NULL){ 
            $this->load->database(); 
            if($this->db->insert($table2 , $data)){
				
				$pass = $this->db->insert_id(); 
				
		 	}else{
				$pass = 0;
			}			
			return $pass;            
        }
		/*------------------------------------- */
        function update_vacation($dataID=NULL,$data=NULL,$table=NULL){

            $this->db->where('id', $dataID);  
            if($this->db->update($table, $data)){ 
				
				$pass = 1;
				
		 	}else{
				$pass = 0;
			}			
			return $pass; 
        }
		//---------------------------  
		function get_documentData($document_id=NULL,$withdraw=NULL,$user_create=NULL,$orderby=NULL){

			if($document_id !=''){
				$this->db->where('id', $document_id);
				
			}if($withdraw !=''){
				$this->db->where('withdraw', $withdraw);
			}
			if($user_create !=''){
				$this->db->where('user_create', $user_create);
			}			
			$this->db->select('*');
			
			if($orderby !=''){
				$this->db->order_by('id', 'desc');
			}
			
			$query = $this->db->get('tbl_outbound_document');
			return $query;		
		}
        //---------------------------  
		function get_documentDataall($user_create=null){

                $sql = "SELECT *, CONCAT('1') AS typeData  FROM tbl_local_document WHERE user_create = '".$user_create."'
				UNION 
				SELECT *, CONCAT('2') AS typeData FROM tbl_outbound_document WHERE user_create = '".$user_create."'
				ORDER BY date_create desc,id DESC";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		//--------------------------- 
		function get_localData($document_id=NULL,$withdraw=NULL,$user_create=NULL,$orderby=NULL){

			if($document_id !=''){
				$this->db->where('id', $document_id);
				
			}if($withdraw !=''){
				$this->db->where('withdraw', $withdraw);
			}
			if($user_create !=''){
				$this->db->where('user_create', $user_create);
			}			
			$this->db->select('*');
			
			if($orderby !=''){
				$this->db->order_by('id', 'desc');
			}
			
			$query = $this->db->get('tbl_local_document');
			return $query;		
		}
		//---------------------------  
		function get_listNameData($document_id=NULL,$type_travel=NULL,$user_create=NULL){  

			if($document_id !=''){
				$this->db->where('document_id', $document_id);
			}
			if($type_travel !=''){
				$this->db->where('type_travel', $type_travel);
			}
			if($user_create !=''){
				$this->db->where('user_update', $user_create);
			}			
			$this->db->select('*');
			$query = $this->db->get('tbl_group_listName');

			return $query;		
		} 
		//---------------------------  
		function get_vacation($document_id=NULL,$type_travel=NULL,$user_create=NULL){  

			if($document_id !=''){
				$this->db->where('document_id', $document_id);
			}
			if($type_travel !=''){
				$this->db->where('type_travel', $type_travel);
			}
			if($user_create !=''){
				$this->db->where('user_update', $user_create);
			}			
			$this->db->select('*');
			$query = $this->db->get('tbl_vacation_data');

			return $query;		
		} 
		//---------------------------   
		function get_withdrawData($document_id=NULL, $type_travel=NULL, $user_create=NULL, $field=NULL, $order=NULL){  

			if($document_id !=''){
				$this->db->where('document_id', $document_id);
			}
			if($type_travel !=''){
				$this->db->where('type_travel', $type_travel);
			}
			if($type_travel ==''){
				$this->db->where('type_travel != 3');
			}
			if($user_create !=''){
				$this->db->where('user_update', $user_create);
			}			
			$this->db->select('*');
			$this->db->order_by($field, $order);			
			$query = $this->db->get('tbl_withdraw_data');

			return $query;		
		} 
		//---------------------------  
		function get_month($day2=NULL,$type1=NULL){
			$dateArray = explode("-",$day2);
			$month= $dateArray[1];
			$day= $dateArray[2];
			$year= $dateArray[0];
			
			$monthArray3 = Array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน","05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฎาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
			
			if($type1 == '1'){
				
				return $month;
			}
			if($type1 == '2'){
				
				return $monthArray3[$month];
			}
                        if($type1 == '3'){
				
				return $day;
			}
                        if($type1 == '4'){
				
				return $year;
			}
		} 
		//---------------------------  
		function get_someField($mainID=NULL,$field=NULL,$table=NULL,$field2=NULL){	
			
			if($mainID !=''){
				$txtWhere = "WHERE $field2 = '".$mainID."'";
			} else {
				$txtWhere = '';
			}			

			$sql = "SELECT * FROM $table $txtWhere ";			
			$query = $this->db->query($sql);
			$row=$query->row();
			$pass = $row->$field;

			return $pass;		
		}
		//-----------------------------	
		function do_removeFromListName($listName_id=NULL,$document_id=NULL){ 

			$sql = "DELETE FROM tbl_group_listName WHERE id = '".$listName_id."' AND document_id = '".$document_id."' ";

			if($this->db->query($sql)){
				$pass=1;
			}else{
				$pass=0;
			}
			return $pass; 
		}
		//-----------------------------		
		function do_removeFromVacation($listName_id=NULL,$document_id=NULL){ 
			
			if($listName_id != 'x'){
			
				$txtWhere = "grouplist_id = '".$listName_id."' AND ";

			} else {			
				$listName_id = '';
			}

			$sql = "DELETE FROM tbl_vacation_data WHERE $txtWhere document_id = '".$document_id."' ";

			if($this->db->query($sql)){
				$pass=2;
			}else{
				$pass=0;
			}
			return $pass; 
		}
		//-----------------------------		
		function update_listName($listName_id=NULL,$document_id=NULL){ 
		
			$sql = "SELECT * FROM `tbl_vacation_data` WHERE document_id = '".$document_id."' ";
        	$query = $this->db->query($sql);
        	$numberCount = $query->num_rows();			
				
			$data = array('vacation' => '0'	);
			if($listName_id != 'x'){
			$this->db->where('id', $listName_id);
			}
			$this->db->where('document_id', $document_id);
				
			if($this->db->update('tbl_group_listName', $data)){
				$pass = 1;
			} else {
				$pass = 0;
			}
			
			if($numberCount == 0){       
					
				$data2 = array(	
					'vacation' => '0',
					'all_vacation' => '0' );				
				$this->db->where('id', $document_id);
				//$this->db->update('tbl_outbound_document', $data2);
					
				if($this->db->update('tbl_outbound_document', $data2)){
					$pass = 2;
				} else {
					$pass = 0;
				}
			}
			return $pass;		
		}	
		/*------------------------------------- */
        function update_withdraw($document_id=NULL,$data=NULL,$table=NULL,$type_travel=NULL){

            $this->db->where('document_id', $document_id);  
            $this->db->where('type_travel', $type_travel);  
            if($this->db->update($table, $data)){ 
				
				$pass = 1;
				
		 	}else{
				$pass = 0;
			}			
			return $pass; 
        }
		/*------------------------------------- */
        function edit_txt_listName($document_id=NULL, $data=NULL, $idEdit=NULL, $field=NULL, $table=NULL){

            $this->db->where('document_id', $document_id);  
            $this->db->where($field, $idEdit);  
            if($this->db->update($table, $data)){ 
				
				$pass = $idEdit;
				
		 	}else{
				$pass = 0;
			}			
			return $pass; 
        }
		/*------------------------------------- */        
		function update_outboundDocument($document_id=NULL,$data=NULL){
            $this->db->where('id',$document_id);
            if($this->db->update('tbl_outbound_document', $data)){ 
				
				$pass = 1;
				
		 	}else{
				$pass = 0;
			}			
			return $pass; 
        } 
		/*------------------------------------- */        
		function update_localDocument($document_id=NULL,$data=NULL){
            $this->db->where('id',$document_id);
            if($this->db->update('tbl_local_document', $data)){ 
				
				$pass = 1;
				
		 	}else{
				$pass = 0;
			}			
			return $pass; 
        } 
		//---------------------------		 
		function do_insert_dataAdmin($allData=NULL){				
				
			//INSERT INTO `tbl_setadmin_document` (`id`, `user_id`, `group_type`, `reason_type`, `system_permissions`, `type_travel`, `user_update`, `date_modified`, `date_add`) VALUES (NULL, '', '', '', '', '', '', CURRENT_TIMESTAMP, '')
				
			if($allData['group_type'] == '1'){
				
				$table = 'tbl_admin_saraban';				
			}
			if($allData['group_type'] == '2'){
				
				$table = 'tbl_admin_allowance';			
			}				
			$today = date("Y-m-d H:i:s");	
				
			$data = array(
			 'titlename' => $allData['titlename'],
			 'firstname' => $allData['firstname'],
			 'lastname' => $allData['lastname'],
			 'email' => $allData['email'], 
			 'user_name' => $allData['user_name'],			
			 'position_id' => $allData['position'],			
			 'password' => md5($allData['password']),
			 'user_update' => $this->session->userdata['logged_in']['id'],				  
			 'date_add' => $today,				  
			 'chk_authen' => $this->session->userdata['logged_in']['status']);			

			 if($this->db->insert($table, $data)){
				 
				$user_id = $this->db->insert_id(); 				
				 
				$data2 = array(
				 'user_id' => $user_id,
				 'group_type' => $allData['group_type'],
				 'reason_type' => $allData['reason_type'], 
				 'system_permissions' => $allData['system_permissions'],			
				 'user_update' => $this->session->userdata['logged_in']['id'],				  
				 'date_add' => $today);
				 $this->db->insert('tbl_setadmin_document', $data2);			 

			 }else{			 
				$user_id=0;
				//$this->db->_error_message(); 
			 }

			 return $user_id;		 
		}
		//---------------------------		 
		function do_update_dataAdmin($allData=NULL){
			
			if($allData['group_type'] == '1'){
				
				$table = 'tbl_admin_saraban';				
			}
			if($allData['group_type'] == '2'){
				
				$table = 'tbl_admin_allowance';			
			}				
			$today = date("Y-m-d H:i:s");
			$user_id = 0;
			$group_type = 'x';
			
			$sql = "SELECT group_type FROM tbl_setadmin_document WHERE user_id = '".$allData['dataID']."' AND group_type = '".$allData['group_type2']."' ";	
			$query = $this->db->query($sql);
			$row = $query->row();
			$num2 = $query->num_rows(); 
			if($num2 > 0){
				$group_type = $row->group_type;	
			}
			
			if(($allData['group_type'] != $group_type) && ($group_type != 'x')){
				
				if($num2 > 0){
				
					if($group_type == '1'){

						$tableDel = 'tbl_admin_saraban';				
					}
					if($group_type == '2'){

						$tableDel = 'tbl_admin_allowance';			
					}				
					$this->db->where('id', $allData['dataID']);
					$this->db->delete($tableDel);
				}
				
					$data = array(
					 'titlename' => $allData['titlename'],
					 'firstname' => $allData['firstname'],
					 'lastname' => $allData['lastname'],
					 'email' => $allData['email'], 
					 'user_name' => $allData['user_name'],
                                         'position_id' => $allData['position'],	
					 'password' => md5($allData['password']),
					 'user_update' => $this->session->userdata['logged_in']['id'],				  
					 'date_add' => $today,				  
					 'chk_authen' => $this->session->userdata['logged_in']['status']);	
					$this->db->insert($table, $data);
					$user_id = $this->db->insert_id();					
				
			} else if(($allData['group_type'] != $group_type) && ($group_type == 'x')){
				
					$data3 = array(
					 'user_id' => $allData['dataID'],
					 'group_type' => $allData['group_type'],
					 'reason_type' => $allData['reason_type'], 
					 'system_permissions' => $allData['system_permissions'],	
					 'user_update' => $this->session->userdata['logged_in']['id'],	
					 'date_add' => $today);	
					$this->db->insert('tbl_setadmin_document', $data3);
					
					$data = array(
					 'titlename' => $allData['titlename'],
					 'firstname' => $allData['firstname'],
					 'lastname' => $allData['lastname'],
					 'email' => $allData['email'], 
					 'user_name' => $allData['user_name'],
                                         'position_id' => $allData['position'],	
					 'password' => $allData['password_old'],				
					 'user_update' => $this->session->userdata['logged_in']['id']);
					$this->db->where('id', $allData['dataID']);
					$this->db->update($table, $data);

					$user_id = $allData['dataID'];					
				
			} else {
				
				$data = array(
				 'titlename' => $allData['titlename'],
				 'firstname' => $allData['firstname'],
				 'lastname' => $allData['lastname'],
				 'email' => $allData['email'], 
				 'user_name' => $allData['user_name'],
                                 'position_id' => $allData['position'],	
				 'password' => $allData['password_old'],				
				 'user_update' => $this->session->userdata['logged_in']['id']);
				$this->db->where('id', $allData['dataID']);
				$this->db->update($table, $data);
				
				$user_id = $allData['dataID'];
			}
			
				$data2 = array(
				 'group_type' => $allData['group_type'],
				 'reason_type' => $allData['reason_type'], 
				 'system_permissions' => $allData['system_permissions'],			
				 'user_update' => $this->session->userdata['logged_in']['id']);
				$this->db->where('user_id', $allData['dataID']);
				$this->db->where('group_type', $allData['group_type']);
				$this->db->update('tbl_setadmin_document', $data2);			
			
			return $user_id;		 
		}	
		//---------------------------
		function get_adminList($dataId=NULL){
			
			if($dataId !=''){
				
				$txtWhere = "WHERE id = '".$dataId."' ";
				
			} else {
				$txtWhere = '';
			}		
		 	$sql = "SELECT id, firstname, lastname, email, user_name, approve AS checkType,data_status FROM tbl_admin_allowance UNION SELECT id, firstname, lastname, email, user_name, lastname,data_status FROM `tbl_admin_saraban` $txtWhere ORDER BY firstname ASC";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		/**------------------------------------- */
		function get_setadminDocument($dataId=NULL,$where_in=NULL){
			
			if($dataId !=''){
				$this->db->where('user_id', $dataId);
			}
			if($where_in !=''){
				$this->db->where_in('group_type', array($where_in));
			}			
			$this->db->select('*');
			$query = $this->db->get('tbl_setadmin_document');

			return $query;			
		}
		/**------------------------------------- */
		function get_adminDetail($dataId=NULL,$table=NULL){
			
			if($dataId !=''){
				$this->db->where('id', $dataId);
			}			
			$this->db->select('*');
			$query = $this->db->get($table);

			return $query;		
		}
		/**------------------------------------- */		     
	    function checkuser($table=null,$f=null,$userid = null,$sar=null){
			$sql = "SELECT * FROM $table WHERE $f = '$userid' AND chk_authen = '$sar' ";
			$query = $this->db->query($sql);
	  		$numberCount = $query->num_rows();   
	  		return $numberCount;
	  	}
      	//---------------------------	 
		function set_ShowOnWebauthor($dataID=NULL, $check=NULL, $table=NULL){		

			$data = array(
				'data_status' => $check);
			$this->db->where('id', $dataID);
			if($this->db->update($table, $data)){
				$pass = 1;
			} else {
				$pass = 0;
				//$this->db->_error_message(); 
			}
			return $pass;
		}
		//--------------------------- 
		function DateDiff2($strDate1=NULL,$strDate2=NULL){
			return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
		}
		//---------------------------
		function convert($number=null){
			
			$txtnum1 = array('ศูนย์','หนึ่ง','สอง','สาม','สี่','ห้า','หก','เจ็ด','แปด','เก้า','สิบ');
			$txtnum2 = array('','สิบ','ร้อย','พัน','หมื่น','แสน','ล้าน');
			$number = str_replace(",","",$number);
			$number = str_replace(" ","",$number);
			$number = str_replace("บาท","",$number);
			$number = explode(".",$number);
			if(sizeof($number)>2){
			return 'ทศนิยมหลายตัวนะจ๊ะ';
			exit;}
			$strlen = strlen($number[0]);
			$convert = '';
			for($i=0;$i<$strlen;$i++){$n = substr($number[0], $i,1);
			if($n!=0){if($i==($strlen-1) AND $n==1){ $convert .='เอ็ด'; }
			elseif($i==($strlen-2) AND $n==2){$convert .= 'ยี่'; }elseif($i==($strlen-2) AND $n==1){
			$convert .= ''; }else{ $convert .= $txtnum1[$n]; }$convert .= $txtnum2[$strlen-$i-1];}
			}$convert .= 'บาท';
			if($number[1]=='0' OR $number[1]=='00' OR
			$number[1]==''){
			$convert .= 'ถ้วน';
			}else{
			$strlen = strlen($number[1]);
			for($i=0;$i<$strlen;$i++){
			$n = substr($number[1], $i,1);
			if($n!=0){
			if($i==($strlen-1) AND $n==1){$convert
			.= 'เอ็ด';}
			elseif($i==($strlen-2) AND
			$n==2){$convert .= 'ยี่';}
			elseif($i==($strlen-2) AND
			$n==1){$convert .= '';}
			else{ $convert .= $txtnum1[$n];}
			$convert .= $txtnum2[$strlen-$i-1];
			}}
			$convert .= 'สตางค์';}
			return $convert;
		}
		//---------------------------
		function getdoc_file($doc_id=null){
            $sql = "SELECT COUNT(*) AS Count FROM tbl_doc_file WHERE doc1_id = '".$doc_id."'";
         	$query=$this->db->query($sql);
         	return $query;		
        }
		//---------------------------
        function getdoc_filegroup($doc_id=null){
            $sql = "SELECT COUNT(*) AS Count FROM tbl_doc_file WHERE outbound_id = '".$doc_id."'";
         	$query=$this->db->query($sql);
         	return $query;		
        }
        	function careerDATA($datatype = null){
			$sql = $this->db->query("SELECT * FROM tbl_career_data WHERE data_status = '".$datatype."' ORDER BY id ASC");
			return $sql;
			/// SELECT * FROM tbl_career_data WHERE  data_status = '1' WHERE id = '4' 
		}
        //---------------------------  
		function workgroupDATA($datatype = null){
			$sql = $this->db->query("SELECT * FROM tbl_workgroup_data WHERE data_status = '".$datatype."' ORDER BY id ASC");
			return $sql;
			/// SELECT * FROM tbl_career_data WHERE  data_status = '1' WHERE id = '4' 
		}
        //-----------------------------------
		function addusermember($name= null, $Password= null, $titlename= null, $firstname= null, $lastname= null, $telephone= null, $career= null, $position= null, $position_number= null, $wage= null, $id_update= null, $chk_authen= null, $currentID= null, $workgroup=null,$password_old=null) {

			if ($currentID == '') {
                            $Password1 = md5($Password);
                            $data = array(
				'user_name' => $name,
				'password' => $Password1,
				'titlename' => $titlename,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'telephone' => $telephone,
				'career_id' => $career,
				'position_id' => $position,
				'position_number' => $position_number,
				'wage' => $wage,
				'user_update' => $id_update,
				'data_status' => '1',
				'workgroupID' => $workgroup,
				'chk_authen' => $chk_authen);
				if ($this->db->insert('tbl_user_data', $data)) {
					$currentID = $this->db->insert_id();
				} else {
					$currentID = 'Error';
				}
			} else {
                            
				$data = array(
				'user_name' => $name,
				'password' => $Password1,
				'titlename' => $titlename,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'telephone' => $telephone,
				'career_id' => $career,
				'position_id' => $position,
				'position_number' => $position_number,
				'wage' => $wage,
				'user_update' => $id_update,
				'data_status' => '1',
                                'workgroupID' => $workgroup,
				'chk_authen' => $chk_authen);
				$this->db->where('id', $currentID);
				if($this->db->update('tbl_user_data', $data)){
					$currentID = $currentID;
				} else {
					$currentID = 'Error';
				}
			}
			return $currentID;
		}
        //-------------------------------
    	function addemail ($dataID=null,$value=null){
       		$today = date("Y-m-d H:i:s");
        	$data = array('email' => $value,
            	'user_id' =>$dataID,
            	'date_add' => $today
        	);
            if($this->db->insert('tbl_user_email', $data)){
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }   
    	}
        //------------------------------------
    	function setDefault($id_email=NULL,$data_status=NULL,$userid=NULL){
			if($userid == ''){
				$sessionuser = $this->session->userdata['logged_in']['id'];
			}else{
			    $sessionuser =  $userid;
			}
			$data1 = array('data_status' => '0');
			$this->db->where('user_id', $sessionuser);
			$this->db->update(' tbl_user_email', $data1);

			$data = array('data_status' => $data_status);
			$this->db->where('id', $id_email);
			if($this->db->update(' tbl_user_email', $data)){
				$pass = 1;
			} else {
				$pass = 0;
			}
			return $pass;
    	}
        //------------------------------------------
        function delete_data($dataID=NULL, $table=NULL){
			$data = array('id' => $dataID,);
			if ($this->db->delete($table, $data)) {
				$pass = 1;
			} else {
				$pass = 0;
				//$this->db->_error_message(); 
			}
			return $pass;
    	}
		//-------------------
		function check_withdraw($val2=NULL){
			
			if($val2 == '1'){
				
				$sql = "SELECT document_id, GROUP_CONCAT(type_travel) as new_travel, count(document_id) as Numrow FROM `tbl_withdraw_data` GROUP BY document_id HAVING COUNT(document_id) = 1 ";				
			}
			if($val2 == '2'){
				
				$sql = "SELECT document_id, GROUP_CONCAT(type_travel) as new_travel, count(document_id) as Numrow FROM `tbl_withdraw_data` GROUP BY document_id HAVING COUNT(document_id) = 2 ";				
			}		
			
			 $query=$this->db->query($sql);
			 return $query;			
		}
        /**------------------------------------- */
		function getdocuser($dataId=NULL){	   
		   
		 	$sql = "SELECT a.*,b.email,c.position FROM `tbl_outbound_document` AS a LEFT JOIN `tbl_user_data` AS b ON a.user_create = b.id LEFT JOIN `tbl_position_data` AS c ON b.position_id = c.id WHERE a.id ='".$dataId."'  ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
        /**------------------------------------- */
		function getdocuser2($dataId=NULL){	   
		   
		 	$sql = "SELECT a.*,b.email,c.position FROM `tbl_local_document` AS a LEFT JOIN `tbl_user_data` AS b ON a.user_create = b.id LEFT JOIN `tbl_position_data` AS c ON b.position_id = c.id WHERE a.id ='".$dataId."'  ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
        //-------------------------------------------------
		function dataFor_adminSaraban($type_travel=NULL,$withdraw=NULL){
			
			if($type_travel == '1'){
				$table = 'tbl_local_document';				
			}
			if($type_travel == '2'){
				$table = 'tbl_outbound_document';				
			}
			if($withdraw != ''){
				$where_withdraw = "AND withdraw = '".$withdraw."' ";				
			} else {
				$where_withdraw = "";				
			}
           
            $sql = "SELECT * FROM $table WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '2' $where_withdraw ORDER BY date_submit DESC , id DESC";            
            $query = $this->db->query($sql);
            return $query;
        }
		//-------------------------------------------------
		function dataFor_adminAllow(){ 
           
            $sql = "SELECT * FROM tbl_outbound_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') ORDER BY date_submit DESC , id DESC";
            $query = $this->db->query($sql);
            return $query;
        }
		/**--------------------quota----------------- */ 
		function calculate_money($userID=NULL){	
			
			$sumprice = 0;
			$today = date("Y-m-d");
			$thisYear = date("Y");
			$date_start2 = $thisYear.'-10-01';			
			
			$nextYear = date('Y', strtotime('+1 year', strtotime($thisYear)));
			$date_end2 = $nextYear.'-09-30';			
		   
		 	$sqlOut = "SELECT id FROM `tbl_outbound_document` WHERE withdraw = '1' AND user_create = '".$userID."' AND reason_request = '1' AND finishform = '1' AND take_money = '1' AND date_create BETWEEN '".$date_start2."' AND '".$date_end2."' ";
			$queryOut = $this->db->query($sqlOut);			
			$numberOut = $queryOut->num_rows();	
			$txt ='';
			if($numberOut >0){
				foreach($queryOut->result() as $dataOut){
				   $txt = $txt.",".$dataOut->id;
				}				
			}  
			$sqlLocal = "SELECT id FROM `tbl_local_document` WHERE withdraw = '1' AND user_create = '".$userID."' AND reason_request = '1' AND finishform = '1' AND take_money = '1' AND date_create BETWEEN '".$date_start2."' AND '".$date_end2."' ";
			$queryLocal = $this->db->query($sqlLocal);			
			$numberLocal = $queryLocal->num_rows();	
			
			if($numberLocal >0){				
				
				foreach($queryLocal->result() as $dataLocal){
				  					   
					   $txt = $txt.",".$dataLocal->id;				  					
				}				
			} 
			if($txt != ''){
			   $txt = substr($txt,1); 						   
						   
			   $sql = "SELECT SUM(sumprice) AS sumprice FROM `tbl_doc_1` WHERE user_update = '".$userID."' AND doc_id IN ($txt) ";
			   $query = $this->db->query($sql); 
			   foreach($query->result() as $row){
					$sumprice = $row->sumprice; 
			   }
			}         	
         	return $sumprice;			
		}
        //--------------------------------------
        function dosubmit_take($id_doc=NULL,$type=NULL){
			
            if($type=='1'){
                $table = 'tbl_local_document';
				
            }else{
                 $table = 'tbl_outbound_document';
            }
            $data = array(
				'take_money' => '1',
				'date_takemoney' => date("Y-m-d H:i:s")
			);
            $this->db->where('id',$id_doc);
            if($this->db->update($table , $data)){
				$pass = 1;
			} else {
				$pass = 0;
			}
            return $pass;
        }
		//--------------------------------------
        function checkName_forGroup($name2=NULL){			
			
            $sql = "SELECT * FROM `tbl_user_data` WHERE '".$name2."' = CONCAT (titlename, '', firstname, ' ', lastname) ";
			$query = $this->db->query($sql);			
			$numCheck = $query->num_rows();
			$dataReturn = '0';
			
			if($numCheck >0){				
				
				foreach($query->result() as $data){
				  					   
					$dataReturn = $data->position_id.'/'.$data->position_number; 			  					
				}				
			} 
			
            return $dataReturn;
        }
		//--------------------------------------
        function check_quota($userID=NULL){
			
			$today = date("Y-m-d");
			$thisYear = date("Y");
			$date_start2 = $thisYear.'-10-01';
			//$date_end2 = $thisYear.'-09-30';

			$date_end2 = date('Y-m-d', strtotime('+1 year', strtotime($date_start2)));
			$date_end2 = date('Y-m-d', strtotime('-1 day', strtotime($date_end2)));
			
            $sql = "SELECT * FROM `tbl_user_quota` WHERE user_id = '".$userID."' AND '".$today."' BETWEEN '".$date_start2."' AND '".$date_end2."' ";
			$query = $this->db->query($sql);
            return $query;
        }
        //--------------------------------------
        function getdataPending(){
			
			$sql = "SELECT * FROM tbl_outbound_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') ORDER BY date_submit DESC , id DESC"; 
			$query = $this->db->query($sql);
            return $query;
        }
        //--------------------------------------
        function getdataLocal(){
			
			$sql = "SELECT * FROM tbl_local_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') ORDER BY date_submit DESC , id DESC"; 
			$query = $this->db->query($sql);
            return $query;
        }
		//--------------------------------------
        function setquotaoct(){
            $thisYear = date("Y");
            $nextYear = date('Y', strtotime('+1 year', strtotime($thisYear)));
            
            $date_end = $nextYear.'-09-30';
            $date_start = $thisYear.'-10-01';
			$sql = $this->db->query("SELECT id FROM tbl_user_data");//ค้นหาuser data
                        foreach ($sql->result() AS $quota){
                         $sql1 = $this->db->query("SELECT quota,user_id FROM tbl_user_quota WHERE user_id = '".$quota->id."' AND date_start = '".$date_start."' AND  date_end = '".$date_end."' ");
                         $numquota = $sql1->num_rows();
                         if($numquota<1){
  
   //$date_end2 = $nextYear.'-09-30';    
   $data = array(
    "user_id"  => $quota->id,
    "quota"   => '0',
    "date_start"    => $date_start,
    "date_end"  => $date_end,
    "date_add"  => date("Y-m-d H:i:s")
   );
   $this->db->insert('tbl_user_quota' , $data);
		
                        }
                        }
                        
			//return $sql;
			/// SELECT * FROM tbl_career_data WHERE  data_status = '1' WHERE id = '4' 
		}
		
	/**--------------------------------- */
    function do_check_travelReport($dataid=NULL,$check_4step=NULL,$remark_4step=NULL,$table=NULL){
           
        $data = array(
			"check_4step"  => $check_4step,
			"remark_4step" => $remark_4step);
		
		$this->db->where('id', $dataid);  
        if($this->db->update($table, $data)){ 
				
			$pass = 1;
				
		}else{
			$pass = 0;
		}			
		return $pass;
    }
     //----------------------------------
     function getsetadmin($group_type=NULL,$reason_type=NULL){ 
            $sql = "SELECT a.user_id,b.titlename,b.firstname,b.lastname,c.position FROM `tbl_setadmin_document` AS a LEFT JOIN tbl_admin_allowance AS b ON a.user_id = b.id LEFT JOIN tbl_position_data AS c ON b.position_id = c.id WHERE a.group_type = '$group_type' AND a.reason_type = '$reason_type'"; 
			$query = $this->db->query($sql);
            return $query;
        }
     function getsetadminsystem($group_type=NULL,$system=NULL){ 
            $sql = "SELECT a.user_id,b.titlename,b.firstname,b.lastname,c.position FROM `tbl_setadmin_document` AS a LEFT JOIN tbl_admin_allowance AS b ON a.user_id = b.id LEFT JOIN tbl_position_data AS c ON b.position_id = c.id WHERE a.group_type = '$group_type' AND a.system_permissions IN ('$system')"; 
			$query = $this->db->query($sql);
            return $query;
        }
     //----------------------------------
     function getreason_request($doc1_doc_id=NULL,$type_travel=NULL){ 
         if($type_travel=='1'){
             $table = 'tbl_local_document';
         }else{
             $table = 'tbl_outbound_document';
         }
            $sql = "SELECT reason_request FROM $table WHERE id = '$doc1_doc_id' "; 
			$query = $this->db->query($sql);
            return $query;
        }
	/**------------------------------------ */	
        function getdocument($idsaraban=null,$table=null){
            $sql = "SELECT * FROM `$table` WHERE id = '$idsaraban'";
            $query = $this->db->query($sql);
            return $query;
        } 
}
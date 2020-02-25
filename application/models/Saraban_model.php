<?php 
    class Saraban_model extends CI_Model{

        var $table = "manage_saraban";

        function getalluser($sql){
            $this->load->database();
            $query = $this->db->query($sql);
            return $query->result_array();
        }
		//-----------------------------------------------
        function updateUser($data,$id,$table){
            $this->db->where('id',"$id");
            $this->db->update($table,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){  
                $chksubmit = false; 
            }

            return $chksubmit;
        }
		//-----------------------------------------------
        function getcountidsaraban(){
            $this->load->database(); 
            $sql = "SELECT COUNT(*) as count FROM `manage_saraban` where data_status = '1'";
            $query = $this->db->query($sql);
            return $query->result_array(); 
        }
		//-----------------------------------------------
        function getcountmember(){
            $this->load->database();
            $sql = "SELECT COUNT(*) as count FROM `tbl_saraban_previous` where data_status = '1'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
		//-----------------------------------------------
        function getcountcancel(){ 
            $this->load->database();
            $sql = "SELECT COUNT(*) as count FROM `manage_saraban` where data_status = '0'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
		//-----------------------------------------------
        function getcountprevious(){ 
            $this->load->database();
            $sql = "SELECT COUNT(*) as count FROM `tbl_saraban_previous` where data_status = '0'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        //---------------------------------------------
        function maxcount($circular_letter=NULL,$in_out=NULL){
			
		   $thisYear = date("Y");  
		   $date1 = $thisYear.'-01-01';  
		   $date2 = $thisYear.'-12-31';	
			
		   if($circular_letter !=''){
				$txtWhere = "AND circular_letter = '".$circular_letter."' ";				
		   } else {
				$txtWhere = '';
		   }
		   if($in_out !=''){
				$txtWhere2 = "AND in_out = '".$in_out."' ";				
		   } else {
				$txtWhere2 = '';
		   }		
			
           $sql = "SELECT * FROM `manage_saraban` WHERE DATE(date_add) BETWEEN '".$date1."' AND '".$date2."' $txtWhere $txtWhere2 ORDER BY `count_saraban` DESC LIMIT 1";
           //$sql = "SELECT MAX(count_saraban) As maxcount FROM manage_saraban ";
           $query = $this->db->query($sql); 
		   if($query->num_rows() > 0){		
			   foreach($query->result() as $row){
				   $result = $row->count_saraban; 
			   }
		   } else {
			   
			   $result = 0;
		   }			
           return $result;    
        }
        //-----------------------------------------------
        function insert_topic($data=NULL,$user_update=NULL,$type=NULL){
            $this->load->database(); 
            $chk = $this->db->insert($this->table, $data);
            if($chk){
                $sql = "SELECT id_saraban , id FROM manage_saraban WHERE user_create = '".$user_update."' ORDER BY id DESC LIMIT 1";
                $query = $this->db->query($sql);  
				if($type == '2'){
					foreach($query->result() as $row){
						$result = $row->id_saraban.','.$row->id; 
					}
				} else {
					foreach($query->result() as $row){
						$result = $row->id_saraban; 
					}
				}				
                return $result;
				
            } else {
				
                return false;
            }
        }
		//-----------------------------------------------
        function edit_saraban($data,$id_saraban){ 

            $this->db->where('id_saraban',$id_saraban);
            $this->db->update('manage_saraban',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }
 		//-----------------------------------------------
        function addprevios($data){ 

            $this->db->insert('tbl_saraban_previous',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }
		//-----------------------------------------------
        function edit_previousSaraban($data,$iddata){ 

            $this->db->where('id',$iddata);
            $this->db->update('tbl_saraban_previous',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }
 		//-----------------------------------------------
        /*function edit_allow($data,$id_saraban){ 

            $this->db->where('id_saraban',$id_saraban);
            $this->db->update('manage_allowance',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }*/
		//-----------------------------------------------
        function edit_pass($data,$username,$table){
            $this->db->where('user_name',$username); 
            $this->db->update($table,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }
		//-----------------------------------------------
        function edit_pass_mail($data,$email,$table){
            $this->db->where('email',$email); 
            $this->db->update($table,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
        }
		//-----------------------------------------------
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
		//-----------------------------------------------
        function getdatalist($sql){
            $this->load->database(); 
            $query = $this->db->query($sql); 

                if($query->num_rows()>0){
                  return $query->result_array();
                }else{
                  return false ;
                }
        }   
		//-----------------------------------------------
//
//        function getdata(){ 
//            $this->load->database(); 
//            $this->db->from($this->table);
//            $this->db->where("data_status", "1"); 
//            $this->db->order_by("date_add", "DESC"); 
//            $query = $this->db->get(); 
//            return $query->result_array();
//        } 
		//-----------------------------------------------
        function getdata(){ 
            $this->load->database(); 
            $sql = "SELECT sp.* , user.user_name , CONCAT('1') AS main_saraban FROM `manage_saraban` as sp
            INNER JOIN tbl_user_data as user on sp.user_update = user.id
            WHERE sp.data_status = '1'
            order by sp.date_modify DESC";                
            $query = $this->db->query($sql);
            return $query->result_array();
        }  
		//-----------------------------------------------
        function getdataindex(){ 
            $this->load->database(); 
            $this->db->from($this->table);
            $this->db->order_by("date_add", "DESC"); 
            $this->db->limit("5");
            $query = $this->db->get(); 
            return $query->result_array();
        }  
		//-----------------------------------------------
        function getuser($sql){
            $this->load->database();
            $query = $this->db->query($sql);
            return $query->result_array();
        } 
		//-----------------------------------------------
        function getcancel(){
            $this->load->database(); 
                $sql = "SELECT
                mn.id_saraban,
                mn.firstname,
                mn.remark,
                mn.ref_no,
                mn.lastname,
                mn.date_add,
                mn.date_modify,
                mn.data_status,
                mn.user_update,
                mn.topic,
                mn.to_name,
                mn.from_name,
                mn.user_create,
                mn.chk_authen,
                user.user_name
            FROM
                `manage_saraban` as mn
            INNER JOIN tbl_user_data as user on mn.user_create = user.id
            WHERE mn.data_status = '0'
            order by mn.date_modify DESC";
                
            $query = $this->db->query($sql);
            return $query->result_array();
        } 
		//-----------------------------------------------
        function getprevious(){
            
//             sp.id_saraban,
//                sp.firstname,
//                sp.remark,
//                sp.ref_no,
//                sp.lastname,
//                sp.date_add,
//                sp.date_modify,
//                sp.date_saraban,
//                sp.id,
//                sp.data_status,
//                sp.user_update,
//                sp.topic,
//                sp.user_create,
//                sp.chk_authen,
//                user.user_name
            $this->load->database(); 
                $sql = "SELECT sp.* , user.user_name FROM `tbl_saraban_previous` as sp
            INNER JOIN tbl_user_data as user on sp.user_id = user.id
            WHERE sp.data_status = '1'
            order by sp.date_modify DESC";
                
            $query = $this->db->query($sql);
            return $query->result_array();
        } 
		//-----------------------------------------------
        function confirm_cancel($data,$id){
            $this->load->database(); 
            $this->db->where('id_saraban', $id); 
            $query = $this->db->update($this->table, $data);
            if($query){
                return true;
            }else{
                return false;
            }
        }
        //----------------------------------
    	function usernamesearh($changeValue=null) {
        	$sql = $this->db->query("SELECT * FROM `tbl_user_data` WHERE user_name = '".$changeValue."' AND data_status = '1' ");
			return $sql;
    	}
        //---------------------------
    	function list_previousData($ID = NULL) {
            $sql = "SELECT * FROM `tbl_saraban_previous` WHERE id = '$ID' ";
            $query = $this->db->query($sql);
        	return $query;
    	}
        //---------------------------
    	function listuser($ID = NULL) {
            $sql = "SELECT * FROM `tbl_user_data` WHERE id = '$ID' ";
            $query = $this->db->query($sql);
        	return $query;
    	}
        //---------------------------------
    	function deleteData($dataID =null , $table =null) {
        	$this->db->where('id', $dataID);
        	if ($this->db->delete($table)) {
            	$pass = 1;
			} else {
            	$pass = 0;
			}
    		return $pass; 
        }
        //----------------
    	function addimg($img = null,$saraban_id = null) {
           	$data = array('copy_file' => $img);
        	$this->db->where('id', $saraban_id);
        	if ($this->db->update('manage_saraban', $data)) {
            	$pass = 1;
        	} else {
            	$pass = 0;
        	}
        	return $pass;
    	}
        //----------------
    	function addimg1($img = null,$saraban_id = null) {
           	$data = array('copy_file' => $img);
        	$this->db->where('id', $saraban_id);
        	if ($this->db->update('tbl_saraban_previous', $data)) {
            	$pass = 1;
        	} else {
            	$pass = 0;
        	}
        	return $pass;
    	}
        //------------------------------ 
		function checknumber($changeValue=NULL){
				 
			$sql = "SELECT * FROM `tbl_saraban_previous` WHERE id_saraban = '".$changeValue."' ";
        	$query = $this->db->query($sql);
			$numberCount = $query->num_rows();			
			return $numberCount;		
		}
        //---------------------------
    	function listsarabanprevious($ID = NULL) {
            $sql = "SELECT * FROM `tbl_saraban_previous` WHERE main_saraban = '$ID' ";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
        //-------------------------------
    	function addemail ($dataID=null , $value=null) {
       		$today = date("Y-m-d H:i:s");
        	$data = array('email' => $value,
            	'user_id' =>$dataID,
            	'date_add' => $today
        	);
            if ($this->db->insert('tbl_user_email', $data)) {
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }   
    	}
        //-----------------------
        function list_email($currentID = NULL) {
			if ($currentID != '') {
				$this->db->where('user_id', $currentID);
			}
			$this->db->select('*'); 
			$query = $this->db->get('tbl_user_email');
			return $query;
    	}
        //------------------------------------
    	function setDefault($id_email = NULL,$data_status = NULL,$userid = NULL) {
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
			if ($this->db->update(' tbl_user_email', $data)) {
				$pass = 1;
			} else {
				$pass = 0;
			}

			return $pass;
    	}
       //-----------------------------------
    	function addedit($name=null, $titlename=null, $firstname=null, $lastname=null, $telephone=null, $position_level=null, $position_name=null, $id_update=null, $chk_authen=null, $currentID=null){
			$data = array(
				'user_name' => $name,
				'titlename' => $titlename,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'telephone' => $telephone,
				'position_level' => $position_level,
				'position_name' => $position_name,
				'user_update' => $id_update,
				'data_status' => '1',
				'chk_authen' => $chk_authen);
			if($currentID == ''){
				if ($this->db->insert('tbl_user_data', $data)) {
					$currentID = $this->db->insert_id();
				} else {
					$currentID = 'Error';
				}
			} else {
				$data = array(
				'user_name' => $name,
				'titlename' => $titlename,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'telephone' => $telephone,
				'position_level' => $position_level,
				'position_name' => $position_name,
				'user_update' => $id_update,
				'data_status' => '1',
				'chk_authen' => $chk_authen);
				$this->db->where('id', $currentID);
				if ($this->db->update('tbl_user_data', $data)) {
					$currentID = $currentID;
				} else {
					$currentID = 'Error';
				}
			}
			return $currentID;
    	}
        //------------------------------------------
        function delete_data($dataID = NULL, $table = NULL) {
			$data = array('id' => $dataID,);
			if ($this->db->delete($table, $data)) {
				$pass = 1;
			} else {
				$pass = 0;
				//$this->db->_error_message(); 
			}
			return $pass;
    	}
        //------------------------------------------
        function delete_datauser($dataID = NULL, $table = NULL) {
			$data = array('data_status' => '0');
			 $this->db->where('id', $dataID);
			if ($this->db->update($table, $data)) {
				$pass = 1;
			} else {
				$pass = 0;
				//$this->db->_error_message(); 
			}
			return $pass;
    	}
        //---------------------------
		function getuserdata($ID = NULL){
			$sql = "SELECT * FROM `tbl_user_data` WHERE id = '".$ID."' ";
			$query = $this->db->query($sql);
			return $query;
		}
        //-------------------------
		function careerDATA($datatype = null){
			$sql = $this->db->query("SELECT * FROM tbl_career_data WHERE data_status = '".$datatype."' ORDER BY id ASC");
			return $sql;
			/// SELECT * FROM tbl_career_data WHERE  data_status = '1' WHERE id = '4' 
		}
        //-------------------------
		function posData($datatype = null){
			$sql = $this->db->query("SELECT * FROM tbl_position_data WHERE data_status = '".$datatype."' ORDER BY id ASC");
			return $sql;
		}
        //-----------------------------------
		function addusermember($name= null, $Password= null, $titlename= null, $firstname= null, $lastname= null, $telephone= null, $career= null, $position= null, $position_number= null, $wage= null, $id_update= null, $chk_authen= null, $currentID= null, $workgroup=null, $password_old = null) {
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
                        if($Password ==''){
                            $Password1 = $password_old;
                        }else{
                            $Password1 = md5($Password);
                        }
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
        //------------------------------ 
		function count_user($changeValue=NULL){

			$sql = "SELECT * FROM `tbl_user_data` WHERE user_name ='" . $changeValue . "' ";
			$query = $this->db->query($sql);
			$numberCount = $query->num_rows();
			return $numberCount;
		}
        //------------------------------ 
		function count_mail($changeValue=NULL){

			$sql = "SELECT * FROM `tbl_user_email` WHERE email ='" . $changeValue . "' ";
			$query = $this->db->query($sql);
			$numberCount = $query->num_rows();
			return $numberCount;
		}
		//---------------------------  
		function explode_sarabanNumber($sarabanNumber=NULL,$key=NULL){
			
			$saraban = explode(",",$sarabanNumber);
			$saraban_data = $saraban[$key];
			return $saraban_data;			
		}
		//---------------------------  
		function workgroupDATA($datatype = null){
			$sql = $this->db->query("SELECT * FROM tbl_workgroup_data WHERE data_status = '".$datatype."' ORDER BY id ASC");
			return $sql;
			/// SELECT * FROM tbl_career_data WHERE  data_status = '1' WHERE id = '4' 
		}
		//--------------------------- 
		function GetThaiDateTime($day){
			$DateTimeArray= explode(" ",$day);
			$dateArray = explode("-",$DateTimeArray[0]);
			$date= $dateArray[2];
			$mon= $dateArray[1];
			$year= $dateArray[0]+543;
			$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

			if($date < 10){ $date = str_replace("0", "", $date); } 
			return $date."&nbsp;".$monthArray[$mon]."&nbsp;".$year;
		}
                	//-----------------------------------------------
        function checkpass($name=null,$Password=null){ 
            $sql = "SELECT * FROM `tbl_user_data` where user_name = '$name' AND password = '$Password' ";
			$query = $this->db->query($sql);
			$numberCount = $query->num_rows();
			return $numberCount;

        }
    }
    
?>
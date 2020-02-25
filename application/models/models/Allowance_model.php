<?php
    class Allowance_model extends CI_Model{
        var $table = "manage_allowance";

        /**----------------- get count ---------------------- */
        function getcountfaildoc(){
            $this->load->database(); 
            $sql = "SELECT COUNT(*) as count FROM `manage_allowance` where data_status = '1' and check_doc = '0' and text6 = '1'";
            $query = $this->db->query($sql);
            return $query->result_array(); 
        }
		/**----------------- get count ---------------------- */
        function getcountpending(){
            $this->load->database(); 
            $sql = "SELECT COUNT(*) as count FROM `manage_allowance` where data_status = '1' and check_doc = '2' and text6 = '1'";
            $query = $this->db->query($sql);
            return $query->result_array(); 
        }
		/**----------------- get count ---------------------- */
        function getcountalldoc(){
            $this->load->database();
            $sql = "SELECT COUNT(*) as count FROM `manage_allowance` where data_status = '1' and text6 = '1'";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
		/**----------------- get count ---------------------- */
        function getcountallmemberallow(){ 
            $this->load->database();
            $sql = "SELECT COUNT(*) as count FROM `tbl_user_data` where data_status = '0'";
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
        function updateUser($data,$id,$table){
            $this->db->where('id',"$id");
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
            $this->db->insert( $this->table , $data);

            if ($this->db->affected_rows() > 0) {
                return true;
            }else{
                return false;
                }
        }
		/**----------------- get count ---------------------- */
        function update_allowance($data,$id_allowance){

            $condition = "id_allowance =" . "'" .$id_allowance. "' and data_status = '1'";

            $this->db->where($condition);
            $this->db->update($this->table ,$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){ 
                $chksubmit = false; 
            }

            return $chksubmit;
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
        function edit_allowance($data,$id_allowance){

            $this->db->where('id_allowance',$id_allowance);
            $this->db->update('manage_allowance',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
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
		   
		 	$sql = "SELECT * FROM `tbl_career_data` WHERE id ='".$dataId."' ORDER BY id DESC ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		/**------------------------------------- */
		function get_position($dataId=NULL){	   
		   
		 	$sql = "SELECT * FROM `tbl_position_data` WHERE id ='".$dataId."' ORDER BY id DESC ";
         	$query=$this->db->query($sql);
         	return $query;			
		}
		//---------------------------	 
	 	function DateThai($strDate=NULL){		
		
			$dateArray = explode("-",$strDate);
			$date2 = $dateArray[2];
			$mon = $dateArray[1];
			$year = $dateArray[0];
			$monthArray = array("01"=>"มกราคม","02"=>"กุมภาพันธ์","03"=>"มีนาคม","04"=>"เมษายน", "05"=>"พฤษภาคม","06"=>"มิถุนายน","07"=>"กรกฏาคม","08"=>"สิงหาคม","09"=>"กันยายน","10"=>"ตุลาคม","11"=>"พฤศจิกายน","12"=>"ธันวาคม");

			if($dateArray[0] == 2018){ $year = $dateArray[0]+543; }
			if($date2 < 10){ $date2 = str_replace("0", "", $date2); } 
			$day=$date2."&nbsp;&nbsp;".$monthArray[$mon]."&nbsp;&nbsp;".$year;
			return $day;		
		}
		
}

?>
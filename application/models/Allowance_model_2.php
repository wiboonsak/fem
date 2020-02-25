<?php
    class Allowance_model_2 extends CI_Model{
        var $table = "manage_allowance";

        /**----------------- get count ---------------------- */
        function getdata(){ 
           
//            $sql = "SELECT * FROM tbl_outbound_document WHERE saraban_id != '0' AND saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '2' ORDER BY date_submit DESC , id DESC";
            $sql = "SELECT *, CONCAT('1') AS typeData FROM tbl_outbound_document WHERE saraban_id != '0' AND saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '2' UNION SELECT *, CONCAT('2') AS typeData FROM tbl_local_document WHERE saraban_id != '0' AND saraban_number != '' AND date_submit != '0000-00-00' AND withdraw = '0' AND check_doc = '2' ORDER BY date_submit DESC , id DESC";
            $query = $this->db->query($sql);
            return $query;
        }
        function getdata1(){ 
            
            $sql = "SELECT *, CONCAT('1') AS typeData FROM tbl_outbound_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') UNION SELECT *, CONCAT('2') AS typeData FROM tbl_local_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') ORDER BY date_submit DESC , id DESC";
            $query = $this->db->query($sql);
            return $query;
        }
	
}

?>
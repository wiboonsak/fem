<?php
    class Inputform_model extends CI_Model{
        
        function insert($sql){
            $this->load->database(); 
            $query = $this->db->query($sql);

            if ($this->db->affected_rows() > 0) {
                return true;
            }else{
                return false;
                }
        }

        //update status ว่ากรอกฟอร์มแล้ว
        function update($data,$id_saraban,$table){
            $this->db->where('id_saraban',"$id_saraban");
            $this->db->update($table,$data);
             
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){ 
                $chksubmit = false; 
            }

            return $chksubmit;
        }

        function edit($id_saraban){
            $this->load->database(); 
            $sql = "DELETE t1, t2, t3 ,t4
                    FROM doc_1 t1
                    JOIN doc_2 t2 ON t2.id_saraban = t1.id_saraban
                    JOIN doc_3 t3 ON t3.id_saraban = t1.id_saraban
                    JOIN doc_4 t4 ON t4.id_saraban = t1.id_saraban
                    WHERE t1.id_saraban = '$id_saraban'";
            $query = $this->db->query($sql);
            if ($this->db->affected_rows() > 0) {
                return true;
            }else{
                return false;
                }
        }
         function getdocument($idsaraban=null,$table=null){
            $sql = "SELECT * FROM `$table` WHERE id = '$idsaraban'";
            $query = $this->db->query($sql);
            return $query;
        } 
         function getuser($user_id=null){
            $sql = "SELECT a.*,b.position FROM `tbl_user_data` AS a LEFT JOIN `tbl_position_data` AS b ON a.position_id = b.id WHERE a.id = '$user_id'";
            $query = $this->db->query($sql);
            return $query;
        } 
        //---------------------------
           //-------------------------------
    	function savedoc_1 ($idsaraban=null,$where=null,$date=null,$title=null,$to=null,$idsaraban1=null,$dateinput=null,$name=null,$position=null,$major=null,$with=null,$goto=null,$start=null,$datestart=null,$end=null,$dateend=null,$sumdate=null,$allowfor=null,$travelday=null,$residentday=null,$sumprice=null,$sum=null,$sumtotal=null,$user_update=null,$chk_authen=null,$chkshowdiv=null,$chkshowauthor=null,$doc_1_id=null,$type_travel1=null,$timestart=null,$time_end=null) {
       		$today = date("Y-m-d H:i:s");
        	$data = array('doc_id' => $idsaraban,
            	'doc_where' =>$where,
            	'date' =>$date,
            	'title' =>$title,
            	'doc_to' =>$to,
            	'id_saraban' =>$idsaraban1,
            	'dateinput' =>$dateinput,
            	'name' =>$name,
            	'position' =>$position,
            	'major' =>$major,
            	'doc_with' =>$with,
            	'goto' =>$goto,
            	'start' =>$start,
            	'datestart' =>$datestart,
            	'end' =>$end,
            	'dateend' =>$dateend,
            	'sumdate' =>$sumdate,
            	'allowfor' =>$allowfor,
            	'travelday' =>$travelday,
            	'residentday' =>$residentday,
            	'sumprice' =>$sumprice,
            	'date_create' =>$today,
            	'Incomplete_receipt' =>$sum,
            	'sumtotal_price' =>$sumtotal,
            	'chk_authen' => $chk_authen,
            	'user_update' => $user_update,
            	'checkno' => $chkshowdiv,
            	'type_travel' => $type_travel1,
            	'time_start' => $timestart,
            	'time_end' => $time_end,
            	'checkexpenses' => $chkshowauthor
        	);
            if($doc_1_id==0){
            if ($this->db->insert('tbl_doc_1', $data)) {
                $dataID = $this->db->insert_id();
            } else {
                $dataID = '0';
            }
            }else{
                $this->db->where('id', $doc_1_id);
                if ($this->db->update('tbl_doc_1', $data)) {
				$dataID = $doc_1_id;
			} else {
				$dataID = 0;
			}
            }
            return $dataID;
    	}
        //-------------------------------
             //-------------------------------
    	function savedoc_3 ($idsaraban=null,$idsaraban1=null,$date1_31=null,$detail1_31=null,$price1_31=null,$other1_31=null,$user_update=null,$chk_authen=null,$textselect=null,$resultdoc1=null,$type_travel1=null) { 
      
       		$today = date("Y-m-d H:i:s");
        	$data = array('doc_id' => $idsaraban,
            	'date' =>$date1_31,
            	'detail' =>$detail1_31,
            	'price' =>$price1_31,
            	'other' =>$other1_31,
            	'date_create' =>$today,
            	'user_update' =>$user_update,
            	'chk_authen' =>$chk_authen,
            	'type_text' =>$textselect,
            	'doc_1_id' =>$resultdoc1,
            	'type_travel' =>$type_travel1,
            	'id_saraban' => $idsaraban1
        	);
            if ($this->db->insert('tbl_doc_3', $data)) {
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            } 
          
            return $dataID;
    	}
        //---------------------------
    	function getdoc1($doc_id = NULL,$type_travel = NULL) {
            $sql = "SELECT * FROM `tbl_doc_1` WHERE id = '$doc_id' AND type_travel = '$type_travel' ";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
        //---------------------------
    	function getdoc1idsaraban($doc_id = NULL,$type_travel = NULL) {
            $sql = "SELECT * FROM `tbl_doc_1` WHERE doc_id = '$doc_id' AND type_travel = '$type_travel' ";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
        //---------------------------
    	function getdoc3($idsaraban = NULL,$type_travel = NULL) {
            $sql = "SELECT * FROM `tbl_doc_3` WHERE doc_id = '$idsaraban' AND type_text = '1'  AND type_travel = '$type_travel'";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
        //---------------------------
    	function getdoc3_1($idsaraban = NULL,$type_travel = NULL) {
            $sql = "SELECT * FROM `tbl_doc_3` WHERE doc_id = '$idsaraban' AND type_text = '2'  AND type_travel = '$type_travel'";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
        //---------------------------
    	function getdocfile($idsaraban = NULL,$type_travel = NULL) {
            $sql = "SELECT * FROM `tbl_doc_file` WHERE outbound_id = '$idsaraban'  AND type_travel = '$type_travel' ";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
          //---------------------------
    	function deletedoc_3($iddoc_3 = NULL,$table=null) {
           $data = array('id' => $iddoc_3,);
			if ($this->db->delete($table, $data)) {
				$pass = 1;
			} else {
				$pass = 0;
				//$this->db->_error_message(); 
			}
			return $pass;
   	 	}
          //---------------------------
    	function deletedoc_3insert($doc_1_id = NULL,$type_text=null) {
           $this->db->where('doc_1_id', $doc_1_id);
           $this->db->where('type_text', $type_text);
        	if ($this->db->delete('tbl_doc_3')) {
            	$pass = 1;
			} else {
            	$pass = 0;
			}
    		return $pass; 
   	 	}
          //---------------------------
    	function savedata($idsaraban = NULL,$table = NULL) {
           $data = array(
            	'finishform' => '1',
            	'check_4step' => '2'
        	);
        	 $this->db->where('id', $idsaraban);
                if ($this->db->update($table, $data)) {
				$dataID = 1;
			} else {
				$dataID = 0;
			}
            return $dataID;
        }
        //-----------------------------
               //-------------------------------
    	function savedoc_2 ($idsaraban=null,$name=null,$date=null,$sumA=null,$sumB=null,$sumC=null,$sumD=null,$sumAll=null,$n1=null,$p1=null,$priceA1=null,$priceB1=null,$priceC1=null,$priceD1=null,$sum1=null,$other1=null,$user_update=null,$chk_authen=null,$type_travel1=null,$withdraw_type=NULL) { 
      
       		$today = date("Y-m-d H:i:s");
        	$data = array('id_saraban' => $idsaraban,
            	'name' =>$name,
            	'date' =>$date,
            	'n' =>$n1,
            	'p' =>$p1,
            	'priceA' =>$priceA1,
            	'priceB' =>$priceB1,
            	'priceC' =>$priceC1,
            	'priceD' =>$priceD1,
            	'sum' =>$sum1,
            	'other' => $other1,
            	'sumA' => $sumA,
            	'sumB' => $sumB,
            	'sumC' => $sumC,
            	'sumD' => $sumD,
            	'sumAll' => $sumAll,
            	'date_create' => $today,
            	'user_create' => $user_update,
            	'type_travel' => $type_travel1,
            	'withdraw_type' => $withdraw_type,
            	'chk_authen' => $chk_authen
        	);
            if ($this->db->insert('tbl_doc_2', $data)) {
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            } 
          
            return $dataID;
    	}
             //---------------------------
    	function getdoc2($idsaraban = NULL, $type_travel = NULL,$withdraw_type=NULL) {
            $sql = "SELECT * FROM `tbl_doc_2` WHERE id_saraban = '$idsaraban' AND type_travel = '$type_travel' AND withdraw_type = '$withdraw_type'";
            $query = $this->db->query($sql);
        	return $query;
   	 	}
                 //---------------------------
    	function deletedoc_2insert($idsaraban = NULL,$type_travel1 = NULL) {
           $this->db->where('id_saraban', $idsaraban);
           $this->db->where('type_travel', $type_travel1);
        	if ($this->db->delete('tbl_doc_2')) {
            	$pass = 1;
			} else {
            	$pass = 0;
			}
    		return $pass; 
   	 	}
                    //---------------------------
    	function addimg($img = NULL, $doc1_id = NULL,$outboundid = NULL,$user_update = NULL,$type_travel = NULL) {
            $today = date("Y-m-d H:i:s");
           $data = array(
            	'doc1_id' => $doc1_id,
            	'outbound_id' => $outboundid,
            	'file_name' => $img,
            	'user_update' => $user_update,
            	'type_travel' => $type_travel,
            	'date_add' => $today
        	);
                if ($this->db->insert('tbl_doc_file', $data)) {
				$dataID = 1;
			} else {
				$dataID = 0;
			}
            return $dataID;
        }
            //----------------------------------------
     function comfirmDelete($idsaraban=null, $file_name=null) {
            $this->db->where('file_name', $file_name);
            if ($this->db->delete('tbl_doc_file')) {
                $pass = 1;
                @unlink('./' . $file_name);
            } else {
                $pass = 0;
            }
        return $pass;
    }
            //----------------------------------------
     function calculatedate($datestart=null, $timestart=null,$dateend=null, $timeend=null) {
            $datetime1 = $datestart.' '.$timestart;
            $datetime2 = $dateend.' '.$timeend;
            //$interval = $datetime1->diff($datetime2);
            $x= '';
//            if($interval->format('%d')!=0){
//                $x = $x.$interval->format('%d วัน ');
//            }
//            if($interval->format('%h')!=0){
//                $x = $x.$interval->format('%h ชั่วโมง ');
//            }
//            if($interval->format('%i')!=0){
//                $x = $x.$interval->format('%i นาที ');
//            }
            $remain=intval(strtotime($datetime2)-strtotime($datetime1));
    $wan=floor($remain/86400);
    $l_wan=$remain%86400;
    $hour=floor($l_wan/3600);
    $l_hour=$l_wan%3600;
    $minute=floor($l_hour/60);
    $second=$l_hour%60;
    if($wan>0){
    $wans = $wan." วัน ";
    }else{
    $wans = "" ;
    }
     if($hour>0){
    $hours = $hour." ชั่วโมง ";
    }else{
    $hours = " " ;
    }
      if($minute>0){
    $minutes = $minute." นาที ";
    }else{
    $minutes = " " ;
    }
    $x = $wans."".$hours."".$minutes;
            return $x; 
            //$interval->format('%d วัน %h ชั่วโมง %i นาที');
 
    
    }

    }
?> 
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
       

    }
?> 
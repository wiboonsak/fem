<?php

Class Login_database_allowance extends CI_Model {

	// Insert registration data in database
	public function registration_insert($data) {

		// Query to check whether username already exist or not
		$condition = "user_name =" . "'" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from('tbl_user_data');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('tbl_user_data', $data); 
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function user_login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' AND data_status = '1'";
		$this->db->select('*');
		$this->db->from('tbl_user_data');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();;
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function approve_login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' AND data_status = '1' AND approve = '1'";
		$this->db->select('*');
		$this->db->from('tbl_user_data');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();;
		} else {
			return false;
		}
	}


	public function admin_login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' AND data_status = '1'";
		$this->db->select('*');
		$this->db->from('tbl_admin_allowance');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();;
		} else {
			return false;
		}
	}

	public function log_last_login_user($data,$user_name){

            $this->db->where('user_name',$user_name);
            $this->db->update('tbl_user_data',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
    }
       
    public function log_last_login_admin($data,$user_name){

            $this->db->where('user_name',$user_name);
            $this->db->update('tbl_admin_allowance',$data);
            
            $chksubmit = true;
            if ($this->db->trans_status() === FALSE){
                $chksubmit = false; 
            }

            return $chksubmit;
    }

	// Read data from database to show data in user page
	public function read_user_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('tbl_user_data');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	// Read data from database to show data in user page
	public function read_user_information_id($id) {

		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('tbl_user_data');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_admin_information($username) {

		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('tbl_admin_allowance');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
		// Read data from database to show data in admin page
	public function read_admin_information_id($id) {

		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('tbl_admin_allowance');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

}

?>
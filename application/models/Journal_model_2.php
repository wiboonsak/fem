<?php

class journal_model_2 extends CI_Model {

    function count_email($mail=NULL){
        $sql = "SELECT * FROM `tbl_authors_data` WHERE email = '". $mail."' ";
        $query = $this->db->query($sql);
        $numberCount = $query->num_rows();
        return $numberCount;
    }
    //--------------------------- 	
    function count_username($username=NULL){
        $sql = "SELECT * FROM `tbl_authors_data` WHERE username = '".$username."' ";
        $query = $this->db->query($sql);
        $numberCount = $query->num_rows();
        return $numberCount;
    }
    //--------------------------- 		 
    function author_update($email=NULL, $password=null, $salutation=null, $first_name=null, $middle_name=null, $last_name=null, $affliation=null, $country=null, $author_id=null){
 
        $data = array(
            'email' => $email,
            'password' => $password,
            'salutation' => $salutation,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'affliation' => $affliation,
            'country' => $country);
          $this->db->where('id', $author_id);  
        if ($this->db->update('tbl_authors_data', $data)){
            $pass = $author_id;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }
    //--------------------------- 	
    function author_login($username=NULL, $password=NULL){
        $password = md5($password);
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_authors_data');
        //SELECT * FROM users WHERE username = '$username' AND password = '$password'
        if($query->num_rows() > 0){
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->select('id');
            $query = $this->db->get('tbl_authors_data');
            $row = $query->row();
            $alumni_id = $row->id;
            $this->session->set_userdata('jlogin', $alumni_id);
            return $alumni_id;
        } else {
            return '0';
        }
    }
    //---------------------------  
    function listPaper($author_id=NULL, $paper_no=NULL){
        if($author_id != ''){
            $this->db->where('author_id', $author_id);
        }
        if($paper_no != ''){
            $this->db->where('paper_no', $paper_no);
        }
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tbl_papers_data');
        return $query;
    }
    //---------------------------  
    function GetShortEngDate($day2){
        $dateArray = explode("-", $day2);
        //$dateArray = explode("-",$dateArray2[0]);		
        $date = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];
        $monthArray3 = Array("01" => "Jan", "02" => "Feb", "03" => "March", "04" => "Apr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec");
        if($date < 10){
            $date = str_replace("0", "", $date);
        }
        return $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
    }
    //--------------------------- 	 
    function insertPaper($author_id=NULL, $title=NULL, $remarks=NULL, $section=NULL, $abstract=NULL){
        //function insertPaper($author_id=NULL, $allData=NULL){		 
        $today2 = date("Y-m-d");
        //$today = date("Y-m-d H:i:s");		 		
        $sql = "SELECT * FROM `tbl_papers_data` ";
        $query = $this->db->query($sql);
        $row = $query->row();
        $pass = $row->id;
        $this->db->where('date_add', $today2);
        $query = $this->db->get('tbl_papers_data');
        if ($query->num_rows() > 0) {
            $top_id2 = $query->num_rows();
            $top_id = $top_id2 + 1;
        } else {
            $top_id = 1;
        }
        $count = strlen($top_id);
        $loop = 3 - $count;
        $x = '';
        $today = date('Y-md');
        for ($i = 1; $i <= $loop; $i++) {
            $x = $x . "0";
        }
        $paper_no = 'JEMES' . $today . $x . $top_id;
        $data = array(
            'title' => $title,
            'remarks' => $remarks,
            'author_id' => $author_id,
            'section' => $section,
            'abstract' => $abstract,
            'paper_no' => $paper_no,
            'date_add' => $today2);
        if ($this->db->insert('tbl_papers_data', $data)) {
            $pass = $this->db->insert_id();
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }

    //--------------------------- 	 
    function updateFile($paperID = NULL, $file_word = NULL, $file_pdf = NULL, $remarks = NULL){
        //$today = date("Y-m-d H:i:s");
        $today = date("Y-m-d");
        $data = array(
            'paper_id' => $paperID,
            'file_word' => $file_word,
            'file_pdf' => $file_pdf,
            'remarks' => $remarks,
            'round_number' => '1',
            'date_add' => $today);
        if($this->db->insert('tbl_paper_file', $data)){
            $pass = 1;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }

    //---------------------------	 
    function list_paperData($userID=NULL, $status1=NULL){
        $sql = "SELECT * FROM `tbl_papers_data` WHERE status_process = '" . $status1 . "' ORDER BY id DESC ";
        $query = $this->db->query($sql);
        return $query;
    }

    //---------------------------
    function get_homeData() {
        $sql = "SELECT * FROM `tbl_journal_home` ";
        $query = $this->db->query($sql);
        return $query;
    }
    
    //---------------------------
    function get_contactData() {
        $sql = "SELECT * FROM `tbl_journal_contactUs` ";
        $query = $this->db->query($sql);
        return $query;
    }
    
    //---------------------------
    function get_paymentData() {
        $sql = "SELECT * FROM tbl_journal_payment ";
        $query = $this->db->query($sql);
        return $query;
    }

    function gethomeDetail($homeID) {
        $sql = $this->db->query("SELECT * FROM tbl_journal_home WHERE id = '" . $homeID . "' ");
        return $sql;
    }

    //--------------------------- 
    function addHome($topic = null, $comment = null, $img = null) {
        $today = date("Y-m-d");
        $data = array('topic' => $topic,
            'desc' => $comment,
            'img' => $img,
            'show_onweb' => '1',
            'date_add' => $today
        );
        if ($this->db->insert('tbl_journal_home', $data)) {
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //--------------------------- 
    function addPublish($journal_name=null, $sub_title=null,$issue=null, $published_date=null, $img=null, $currentID=null){		
        $today = date("Y-m-d");		
		$status = '0';
		
		if($published_date > $today){
			$status = '3';
		}	
		
        $data = array(
			'journal_name' => $journal_name,
            'sub_title' => $sub_title,
            'issue' => $issue,
            'published_date' => $published_date,
            'img' => $img,
            'status' => $status,
            'date_add' => $today);
        if($currentID == ''){
			if($this->db->insert('tbl_published_journal', $data)){
				$currentID = $this->db->insert_id();
			} else {
				 $currentID = 'Error';
			}
        } else {
            $data = array(
			'journal_name' => $journal_name,
            'sub_title' => $sub_title,
            'issue' => $issue,
            'published_date' => $published_date,
            'img' => $img,
            'status' => $status);
            $this->db->where('id', $currentID);
            if($this->db->update('tbl_published_journal', $data)){
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }
        return $currentID;
    }
    //--------------------------- 
    function addcontact($phone=null, $mail=null, $comment=null){
        $today = date("Y-m-d");
        $data = array('phone' => $phone,
            'mail' => $mail,
            'location' => $comment,
            'date_add' => $today
        );
        if($this->db->insert('tbl_journal_contactUs', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //---------------------------
    function list_editcateData($show = NULL, $dataID = NULL){
        if($show == '1'){
            $this->db->where('show_onweb', '1');
        }
        if($dataID != ''){
            $this->db->where('id', $dataID);
        }
        $this->db->select('*');
        $this->db->order_by('id');
        $query = $this->db->get('tbl_journal_editorial_cate');
        return $query;
    }
    //---------------------------
    function list_editData($dataID = NULL){
        if($dataID != ''){
            $this->db->where('id', $dataID);
        }
        $this->db->where('show_onweb', '1');
        $this->db->select('*');
        $query = $this->db->get('tbl_journal_editorial');
        return $query;
    }
    //---------------------------
    function DateThai($strDate = NULL){
        $dateArray = explode("-", $strDate);
        $date2 = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];
        $monthArray = array("01" => "ม.ค.", "02" => "ก.พ.", "03" => "มี.ค.", "04" => "เม.ย.", "05" => "พ.ค.", "06" => "มิ.ย.", "07" => "ก.ค.", "08" => "ส.ค.", "09" => "ก.ย.", "10" => "ต.ค.", "11" => "พ.ย.", "12" => "ธ.ค.");
        if($dateArray[0] == 2018){
            $year = $dateArray[0] + 543;
        }
        if($date2 < 10){
            $date2 = str_replace("0", "", $date2);
        }
        $day = $date2 . "&nbsp;&nbsp;" . $monthArray[$mon] . "&nbsp;&nbsp;" . $year;
        return $day;
    }
    //--------------------------- 
    function addAbout($currentID = null, $topic = null, $comment = null){
        $today = date("Y-m-d");
        $data = array('topic' => $topic,
            'desc' => $comment,
            'show_onweb' => '1',
            'date_add' => $today
        );
        if($currentID == ''){
            if($this->db->insert('tbl_journal_aboutus', $data)){
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
        } else {
            $this->db->where('id', $currentID);
            if($this->db->update('tbl_journal_aboutus', $data)){
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }
        return $currentID;
    }
    //--------------------------- 
    function adduser($dataID =null ,$name =null, $Password =null, $email=null, $adminType=null){
        $today = date("Y-m-d H:i:s");
        //$Password1 = md5($Password);
        $data = array('name_sname' => $name,
            'password'  => $Password,
            'email' => $email,
            'admin_type' => $adminType,
            'date_add'=>$today
        );
        if($dataID == ''){
            if($this->db->insert('tbl_journal_user', $data)){
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }
        } else {
            $data = array('name_sname' => $name,
            'password'  => $Password,
            'email' => $email,
            'admin_type' => $adminType);
            $this->db->where('id', $dataID);
            if($this->db->update('tbl_journal_user', $data)){
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }
        }
        return $dataID;
    }
    //--------------------------- 
    function addsection($name=null,$currentID=null,$dataID=null){
         if($dataID == ''){
				$sql = $this->db->query("SELECT MAX(sort_number) AS nNax FROM tbl_section_data WHERE show_onweb='1' AND journal_id = '".$currentID."' ");
				foreach($sql->result() AS $data){}
				$nMaxIns = $data->nNax + 1;
				$today = date("Y-m-d");
				$data = array('name' => $name,
				'journal_id' => $currentID,
				'show_onweb' => '1',
				'date_add' => $today,
				'sort_number' => $nMaxIns);
			 
			if($this->db->insert('tbl_section_data', $data)){
					 $pass = $this->db->insert_id();
			} else {
					$pass = 'Error';
			}
			 
        } else {
            $data = array('name' => $name,
            'journal_id' => $currentID,
            'show_onweb' => '1',
            'date_add' => $today);
            $this->db->where('id', $dataID);
            if($this->db->update('tbl_section_data', $data)){
                $pass = $dataID;
            } else {
                $pass = 'Error';
            }
        }
        return $pass;
    }   
    //---------------------------	 
    function update_ShowOnWeb($dataID=NULL, $check=NULL, $table=NULL){
        $data = array(
            'show_onweb' => $check
        );
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
    function set_ShowOnWebauthor($dataID=NULL, $check=NULL, $table=NULL){
        $data = array(
            'data_status' => $check
        );
        $this->db->where('id', $dataID);
        if ($this->db->update($table, $data)) {
            $pass = 1;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }
	//------------------------------
    function updateHome($topic=null, $comment=null, $img=null){
        $data = array('topic' => $topic,
            'desc' => $comment,
            'img' => $img,
            'show_onweb' => '1');
		
        if($this->db->update('tbl_journal_home', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }    
	//------------------------------
    function updatecontact($phone=null, $mail=null, $comment=null){
        $data = array('phone' => $phone,
            'mail' => $mail,
            'location' => $comment);
        if($this->db->update('tbl_journal_contactUs', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //------------------------------
    function updateAbout($topic=null, $comment=null){
        $data = array('topic' => $topic,
            'desc' => $comment,
            'show_onweb' => '1'
        );
        if($this->db->update('tbl_journal_aboutus', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //---------------------------------
    function delete_data($dataID = NULL, $table = NULL){
        $data = array('id' => $dataID);
        if($this->db->delete($table, $data)){
            $pass = 1;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }
    //---------------------------------
    function deleteData_publish($dataID=NULL, $table=NULL){
        $data = array('data_status' => '0');
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
    function get_author($author_id = NULL){
        $sql = "SELECT * FROM `tbl_authors_data` WHERE id ='".$author_id."' ";
        $query = $this->db->query($sql);
        $row = $query->row();
        $pass = $row->salutation.' '.$row->first_name.' '.$row->last_name;
        return $pass;
    }
    //---------------------------  
    function GetEngDate($day2){
        $dateArray = explode("-", $day2);
        //echo "Day 2 = ".$day2."<br>";
        $date = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];
        $monthArray3 = Array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
        if($date < 10){
            $date = str_replace("0", "", $date);
        }
        echo $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year;
    }
    //---------------------------  
    function get_paperFile($paper_id=NULL, $round_number=NULL){
        if($paper_id != ''){
            $this->db->where('paper_id', $paper_id);
        }
        if($round_number != ''){
            $this->db->where('round_number', $round_number);
        }
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('tbl_paper_file');
        return $query;
    }
    //----------------		 
    function name_paperFile($name=NULL){
        $nArray = explode("/", $name);
        $nameF = $nArray[1];
        return $nameF;
    }
    //---------------------------        
    function do_addEditor($name=NULL, $email=NULL){
        $today = date("Y-m-d H:i:s");
        //$today = date("Y-m-d");		 
        $data = array(
            'name_sname' => $name,
            'email' => $email,
            'admin_type' => '3',
            'date_add' => $today);
        if($this->db->insert('tbl_journal_user', $data)){
            $pass = 1;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }
    //--------------------------- 	INSERT INTO `tbl_editor_data` (`id`, `paper_id`, `editor_id`, `status`) 
    function setEditor($table=NULL, $field=NULL, $userID=NULL, $paperID=NULL){
        //$today = date("Y-m-d H:i:s");
        $today = date("Y-m-d");

        $data = array(
            'paper_id' => $paper_id,
            $field => $userID,
            'status' => '0',
            'date_add' => $today);
        if($this->db->insert($table, $data)){
            $pass = $this->db->insert_id();
        } else {
            $pass = 'x';
            //$this->db->_error_message(); 
        }
        return $pass;
    }
    //---------------------------	 
    function get_listEditor(){
        $sql = "SELECT * FROM `tbl_journal_user` WHERE admin_type = '3' AND data_status = '1' ORDER BY id DESC ";
        $query = $this->db->query($sql);
        return $query;
    }
    //---------------------------	 
    function get_listmanage(){
        $sql = "SELECT * FROM `tbl_journal_user` WHERE admin_type = '2' AND data_status = '1' ORDER BY id DESC ";
        $query = $this->db->query($sql);
        return $query;
    }
    //---------------------------	 
    function get_listSection($currentID=NULL){
        $sql = "SELECT * FROM `tbl_section_data` WHERE journal_id = '".$currentID."' AND data_status='1' ORDER BY sort_number ASC    ";
        $query = $this->db->query($sql);
        return $query;
    }
    //---------------------------
    function get_journalHomeData(){
        $sql = "SELECT * FROM ` tbl_journal_home` ";
        $query = $this->db->query($sql);
        return $query;
    }
    //---------------------------   
    function remove_file2($img=null){
        $data = array('img' => $img);
        if($this->db->update('tbl_journal_home', $data)){
            return "1";
        } else {
            return "0";
        }
    }
    //---------------------------   
    function remove_file3($img = null){
        $data = array('img' => $img);
        if($this->db->update('tbl_published_journal', $data)){
            return "1";
        } else {
            return "0";
        }
    }
    //---------------------------  
    function updateFile_home($result_id = NULL, $uploadData = NULL){
        $data = array(
            'id' => $result_id,
            'img' => $uploadData);

        if($this->db->insert('tbl_journal_home', $data)){
            //$pass = $this->db->insert_id();
            $pass = 1;
        } else {
            $pass = 0;
            //$this->db->_error_message(); 
        }
        return $pass;
    }
    //-----------------------------
    function CategoryDetail1($dataID){
        $sql = $this->db->query("SELECT * FROM tbl_journal_editorial_cate WHERE id = '".$dataID."' ");
        return $sql;
    }
    //----------------------------
    function DoAddProductCategory1($category_title, $dataID = NULL){
        $today = date("Y-m-d");
        $data = array('category_title' => $category_title,
            'show_onweb' => '1',
            'date_add' => $today
        );
        if($dataID == ''){
            if($this->db->insert('tbl_journal_editorial_cate', $data)){
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }
        } else {
            $this->db->where('id', $dataID);
            if($this->db->update('tbl_journal_editorial_cate', $data)){
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }
        }
        return $dataID;
    }    
    //----------------------------
    function Addedit($editorial_name=null,$editorial_category=null, $dataID=null){
        $today = date("Y-m-d");
        $data = array('editorial_name' => $editorial_name,
            'editorial_category' =>$editorial_category,
            'show_onweb' => '1',
            'date_add' => $today
        );
        if($dataID == ''){
            if($this->db->insert('tbl_journal_editorial', $data)){
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }
        } else {
            $this->db->where('id', $dataID);
            if($this->db->update('tbl_journal_editorial', $data)){
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }
        }
        return $dataID;
    }
	//----------------------------
    function getCategory($datatype){
		 $sql=$this->db->query("SELECT * FROM tbl_journal_editorial_cate WHERE show_onweb = '".$datatype."' ORDER BY id ASC ");
		 return $sql;
	}
    //------------------------------
    function geteditList(){
         $sql = $this->db->query("SELECT a.* , b.category_title FROM tbl_journal_editorial a LEFT JOIN tbl_journal_editorial_cate b ON a.editorial_category = b.id WHERE a.show_onweb = '1' AND b.show_onweb = '1' ORDER BY a.editorial_category ASC , a.id ASC ");
		 return $sql;    
	}
    //--------------------------- 
    function addinstruction($currentID=null, $topic=null, $desc=null){
        $today = date("Y-m-d");
        $data = array('topic' => $topic,
            'desc' => $desc,
            'show_onweb' => '1',
            'date_add' => $today
        );
        if($currentID == ''){
            if($this->db->insert('tbl_journal_instruction', $data)){
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
			
        } else {
            $this->db->where('id', $currentID);
            if($this->db->update('tbl_journal_instruction', $data)){
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }
        return $currentID;
    }
    //--------------------------- 
    function addpayment($accountName=null, $accountNo=null, $bank=null,$swiftCode=null){
        $today = date("Y-m-d");
        $data = array('accountName' => $accountName,
            'accountNo' => $accountNo,
            'bank' => $bank,
            'swiftCode' => $swiftCode,
            'date_add' => $today
        );
        if($this->db->insert('tbl_journal_payment', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //------------------------------
    function updatepayment($accountName=null, $accountNo=null, $bank=null,$swiftCode=null){
        $data = array('accountName' => $accountName,
            'accountNo' => $accountNo,
            'bank' => $bank,
            'swiftCode' => $swiftCode);
        if($this->db->update('tbl_journal_payment', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
    //---------------------------
    function list_aboutData($dataID=NULL){
        if($dataID != ''){
            $this->db->where('id', $dataID);
        }
        $this->db->where('show_onweb', '1');
        $this->db->select('*'); 
		$this->db->order_by('id', 'asc');
        $query = $this->db->get('tbl_journal_aboutus');
        return $query;
    }
    //---------------------------
    function list_publishData( $dataID = NULL){
        if($dataID != ''){
            $sql = "SELECT * FROM `tbl_published_journal` WHERE id = '$dataID' AND data_status = '1' ";
        	$query = $this->db->query($sql);      
        }      
        return $query;
    }
    //---------------------------
    function list_pdfData( $dataID = NULL){
        if($dataID != ''){
            $this->db->where('id', $dataID);
        }
        $this->db->where('data_status = "1"');
        $this->db->select('*'); 
        $query = $this->db->get('tbl_journal_PDF');
        return $query;
    }
	//----------------------------
    function list_authorData( $currentID = NULL){
        if($currentID != ''){
            $this->db->where('journalPDF_id', $currentID);
        }
        $this->db->select('*'); 
        $query = $this->db->get('tbl_authors_pdf');
        return $query;
    }
    //======================================
    function get_publish(){
        $sql=$this->db->query('SELECT * FROM `tbl_published_journal` WHERE data_status = "1" ');
        return $sql;
    }
    //======================================
    function get_publishbyid($currentID = NULL){
        $sql=$this->db->query("SELECT * FROM `tbl_published_journal` WHERE id = '".$currentID."' AND data_status = '1' ");
        return $sql;
    }
    //======================================
    function get_current($txt=NULL){
//        $sql=$this->db->query('SELECT * FROM `tbl_published_journal` WHERE data_status = "1" AND status = "1" AND published_date >= CURDATE()  ');
//        return $sql;
//    }
      //$sql = 'SELECT id FROM `tbl_published_journal` WHERE data_status = "1" AND published_date >= CURDATE() ORDER BY id DESC LIMIT 1 ';
      $sql = "SELECT id FROM `tbl_published_journal` WHERE data_status = '1' AND published_date != '0000-00-00' AND published_date <= CURDATE() ORDER BY published_date DESC LIMIT 1 ";
      //$sql = "SELECT id FROM `tbl_published_journal` WHERE data_status = '1' AND published_date != '0000-00-00' AND published_date <= CURDATE() ORDER BY id DESC LIMIT 1 ";
      $query = $this->db->query($sql);
	  $row=$query->row();
	  $first_id = $row->id;	 
		
	  $data2 = array(         
   		'status' => '1');
	  $this->db->where('id', $first_id);   
	  $this->db->update('tbl_published_journal', $data2);	
  
  	  $data = array(         
   		'status' => '2');
  
  	  //$query2 = $this->db->query("SELECT * FROM tbl_published_journal WHERE id != '".$first_id."' ");
  	  $query2 = $this->db->query("SELECT * FROM tbl_published_journal WHERE id != '".$first_id."' AND published_date <= CURDATE() AND data_status = '1' AND published_date != '0000-00-00' ");
      foreach($query2->result() as $result){        
   
	  $this->db->where('id', $result->id);   
	  $this->db->update('tbl_published_journal', $data);   
	  }	
		
      //$sql2=$this->db->query('SELECT * FROM `tbl_published_journal` WHERE data_status = "1" AND status = "1" AND published_date >= CURDATE() ');
	  if($txt == 'yes'){	
      	$sql2=$this->db->query('SELECT * FROM `tbl_published_journal` WHERE data_status = "1" AND status = "1" ');
      	return $sql2;
	  }
   }
   //---------------------------
   function list_sectionData($dataID = NULL){
        if($dataID != ''){
            $this->db->where('journal_id', $dataID);
        }
        $this->db->where('show_onweb', '1');
        $this->db->select('*'); 
        $query = $this->db->get('tbl_section_data');
        return $query;
   }
   //---------------------------
   function list_instructionData($dataID = NULL){  
        if($dataID != ''){
            $this->db->where('id', $dataID);
        }
        $this->db->where('show_onweb', '1');
        $this->db->select('*'); 
		$this->db->order_by('id', 'asc');										 
        $query = $this->db->get('tbl_journal_instruction');
        return $query;
   }
   //---------------------------
   function managingUpdateStatus($status=NULL, $publishID=NULL){		 
		$today = date("Y-m-d H:i:s");
		$data = array(
        'status' => $status,     
        'date_modified' => $today);         		  
         
		$this->db->where('id', $publishID);		
		if($this->db->update('tbl_published_journal', $data)){	
			//$pass = $this->db->insert_id();
			$pass=1; 
		 }else{
			$pass=0;
			//$this->db->_error_message(); 
		 }		
		 return $pass;		 
  }	
  //==============================         
  function updateOrderCate($dataID, $changeValue){
        $data = array('sort_number' => $changeValue);
        $this->db->where('id', $dataID);
        if($this->db->update('tbl_section_data', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
  }
  //------------------------------------
  function updatePDF($dataID, $changeValue){
        $data = array('sort_number' => $changeValue);
        $this->db->where('id', $dataID);
        if($this->db->update(' tbl_journal_PDF', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
  }
  //------------------------------------
  function updateauthor($dataID, $changeValue){
        $data = array('name' => $changeValue);
        $this->db->where('id', $dataID);
        if($this->db->update(' tbl_authors_pdf', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
  }
  //----------------------------------
     function addPDF($dataID=null ,$sectionData=null ,$publishedData=null ,$title=null, $Page=null, $file_name=null){
       if ($dataID == '') {
            $sql = $this->db->query("SELECT MAX(sort_number) AS nNax FROM tbl_journal_PDF WHERE show_onweb='1' AND journal_id ='".$publishedData."'");
            foreach ($sql->result() AS $data) {
                
            }
            $nMaxIns = $data->nNax + 1;
        $today = date("Y-m-d");
        $data = array('section_id' => $sectionData,
            'journal_id' => $publishedData,
            'title' => $title,
            'pageNo' => $Page,
            'show_onweb' => '1',
            'date_add' => $today,
            'sort_number' => $nMaxIns,
            'file_name' => $file_name
        );
if ($this->db->insert('tbl_journal_PDF', $data)) {
                 $pass = $this->db->insert_id();
            } else {
                $pass = 'Error';
            }
        } else {
            $data = array('section_id' => $sectionData,
            'journal_id' => $publishedData,
            'title' => $title,
            'pageNo' => $Page,
            'file_name' => $file_name
        );
            $this->db->where('id', $dataID);
            if ($this->db->update('tbl_journal_PDF', $data)) {
                $pass = $dataID;
            } else {
                $pass = 'Error';
            }
        }
        return $pass;
    }
    //-------------------------------
    function addauthor ($dataID=null , $value=null) {
       
        $data = array('name' => $value,
            'journalPDF_id' =>$dataID,
        );
            if ($this->db->insert('tbl_authors_pdf', $data)) {
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }
   
    }
    //-------------------------------------
    function getPDFDetail($productID) {
        $sql = $this->db->query("SELECT * FROM tbl_journal_PDF WHERE id = '" . $productID . "' ");
        return $sql;
    }
    //-------------------------------------
    function PDF_view($currentID=null) {

        $sql = $this->db->query("SELECT a.* ,  b.name FROM tbl_journal_PDF a LEFT JOIN tbl_section_data b ON a.section_id=b.id WHERE a.journal_id ='".$currentID."' AND a.data_status='1' AND b.data_status='1' ORDER BY sort_number ASC ");
        return $sql;
    }
    //---------------------------------------
    function getDay($strDate = NULL) {
        $dateArray = explode("-", $strDate);
        $date2 = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];


        $monthArray = array("01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec");
        if ($dateArray[0] == 2018) {
            $year = $dateArray[0] + 543;
        }
        if ($date2 < 10) {
            $date2 = str_replace("0", "", $date2);
        }
        $day = $date2 . "&nbsp;&nbsp;" . $monthArray[$mon] . "&nbsp;&nbsp;" . $year;
        return $date2;
    }
    //------------------------------------
    function getIncluded($strDate = NULL) {
        $dateArray = explode("-", $strDate);
        $date2 = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];


        $monthArray = Array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
        if ($dateArray[0] == 2018) {
            $year = $dateArray[0];
        }
        if ($date2 < 10) {
            $date2 = str_replace("0", "", $date2);
        }
        $day = $date2 . "&nbsp;&nbsp;" . $monthArray[$mon] . "&nbsp;&nbsp;" . $year;
        return $day;
    }
    //------------------------------------
    function getmonth($strDate = NULL) {
        $dateArray = explode("-", $strDate);
        $date2 = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];


        $monthArray = array("01" => "Jan", "02" => "Feb", "03" => "Mar", "04" => "Apr", "05" => "May", "06" => "Jun", "07" => "Jul", "08" => "Aug", "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec");
        if ($dateArray[0] == 2018) {
            $year = $dateArray[0] - 2000;
        }
        if ($date2 < 10) {
            $date2 = str_replace("0", "", $date2);
        }
        $day = $monthArray[$mon] . "&nbsp;&nbsp;" . $year;
        return $day;
    }
    //---------------------------	 
    function get_listPDF($journal=null,$sectionId=null) {
        $sql = "SELECT * FROM `tbl_journal_PDF` WHERE journal_id='".$journal."' AND section_id='".$sectionId."' AND data_status='1' ORDER BY sort_number ASC    ";
        $query = $this->db->query($sql);
        return $query;
    }
    //------------------------------
    function get_archive($perpage = null, $start = null){
        if(($start >= 0) && ($perpage >= 0)){
			
            $txtStart = 'LIMIT '.$start.','.$perpage;
			
        }else {			
            $txtStart = '';
        }
       //$sql = "SELECT * FROM `tbl_published_journal` WHERE data_status = '1' AND status = '2' AND published_date >= CURDATE() $txtStart "  ;
       $sql = "SELECT * FROM `tbl_published_journal` WHERE data_status = '1' AND status = '2' ORDER BY published_date DESC $txtStart  ";
       $query = $this->db->query($sql);
       return $query;
   }
   //------------------------------
      function get_archivedetail($dataid=null){
       $sql = $this->db->query("SELECT * FROM  tbl_published_journal WHERE id = '".$dataid."' AND data_status = '1' AND status = '2' ");
       return $sql;       
   }
   //-------------------------------------
   function userData($currentID=null) {
        $sql = $this->db->query("SELECT * FROM tbl_journal_user WHERE id = '".$currentID."' AND data_status = '1' ");
        return $sql;
   }
   //-------------------------------------
   function userdetail() {
        $userID = $this->session->userdata('juser_id');
        $sql = $this->db->query("SELECT * FROM tbl_journal_user WHERE  admin_type !='1' AND id != '".$userID."' ORDER BY admin_type ASC ");
        return $sql;
   }
   //----------------------
   function search($txtSearch=null){
		 	 
		 $sql="SELECT b.* FROM  tbl_journal_PDF a LEFT JOIN tbl_published_journal b ON a.journal_id=b.id LEFT JOIN tbl_authors_pdf c ON a.id = c.journalPDF_id WHERE (a.title LIKE '%".$txtSearch."%' OR b.journal_name LIKE '%".$txtSearch."%' OR c.name LIKE '%".$txtSearch."%') AND b.data_status = '1' AND b.status !='3' GROUP BY b.id ";
		 $query=$this->db->query($sql);
		 return $query;
    }       
    //--------------------------- 
    function addPayment_no($payment_no=null, $payment_id=null, $Amount=null, $Date=null, $Time=null, $Note=null, $img=null, $currentID=null){
		
        $today = date("Y-m-d H:i:s");
		
		$dateArray = explode("/",$Date);
		$date= $dateArray[0];
		$mon= $dateArray[1];
		$year= $dateArray[2];			
		$Date = $year."-".$mon."-".$date;		
		
        $data = array(
			'paper_no' => $payment_no,
            'paper_id' => $payment_id,
            'Amount' => $Amount,
            'Date' => $Date,
            'Time' => $Time,
            'Slip' => $img,
            'Note' => $Note,
            'Date_add' => $today);
		
        if ($currentID == '') {
			if ($this->db->insert('tbl_payment_data', $data)) {
				$currentID = $this->db->insert_id();
				
                $data2 = array('payment'=> '1');
                $this->db->where('id',$payment_id);
                $this->db->where('paper_no',$payment_no);
                $this->db->update('tbl_papers_data',$data2);
				
			} else {
				 $currentID = 'Error';
			}
        } else {
            $data = array(
			'paper_no' => $payment_no,
            'paper_id' => $payment_id,
            'Amount' => $Amount,
            'Date' => $Date,
            'Time' => $Time,
            'Slip' => $img,
            'Note' => $Note,);
            $this->db->where('id', $currentID);
            if ($this->db->update('tbl_payment_data', $data)) {
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }
        return $currentID;
    }
    //---------------------------
    function list_paymentData($currentID = NULL){
       
        /*$sql = "SELECT * FROM `tbl_payment_data` WHERE paper_no = '".$currentID."' ";
        $query = $this->db->query($sql);
        return $query;*/
		
		
		$sql = "SELECT * FROM `tbl_payment_data` WHERE paper_no = '".$currentID."' ";
		$query=$this->db->query($sql);	
		return $query;
    }
    //----------------
    function updateconfirm ($NotebAdmin=null,$payment_no=null,$currentID=null){
        $data = array(
            'Notebyadmin' => $NotebAdmin,
            'paper_no' => $payment_no,
            'Comfirmed' => '1');
		
		$this->db->where('id', $currentID);
        if ($this->db->update('tbl_payment_data', $data)){
            $pass = '1';
        } else {
            $pass = '0';
        }
        return $pass;
    }
    //------------------------------
    function getauthorBypaper($paper_no=NULL){
         $sql=$this->db->query("SELECT b.* FROM tbl_papers_data a LEFT JOIN tbl_authors_data b ON a.author_id = b.id WHERE a.paper_no = '".$paper_no."' ");
		 return $sql;    
	}
    //---------------------------  
	function listemail(){
		 $sql=$this->db->query("SELECT DISTINCT paper_no FROM tbl_mail_data ORDER BY paper_no DESC ");
		 return $sql;    
		
	} 
    //---------------------------  
	function listemailpaper($paper_no=null){
		 $sql=$this->db->query("SELECT * FROM tbl_mail_data WHERE paper_no = '".$paper_no."' ORDER BY id DESC");
		 return $sql; 		
	} 
    //---------------------------  
	function listemaildetail($emailId=null,$paper_no=null){
		 $sql=$this->db->query("SELECT * FROM tbl_mail_data WHERE id = '".$emailId."' AND paper_no = '".$paper_no."' ORDER BY id DESC");
		 return $sql;		
	} 
    //---------------------------
    function generateRandomString() {
		$alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ=";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 5; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}        
    //---------------------------------
	function update_newPass($password=NULL,$dataID=NULL){			 
		 $txt ='';
		 
		 $data = array(
         'password' => md5($password),                 
         'key_value' => $txt                 
         );
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_authors_data', $data)){
		 	$pass = 1;
		 }else{
		    $pass=0;
		 }
		return $pass;
	}	
    //---------------------------------
	function update_newPass2($password=NULL,$dataID=NULL){			 
		 $txt ='';
		 
		 $data = array(
         'password' => md5($password),                 
         'key_value' => $txt                 
         );
		 
		 $this->db->where('id', $dataID);
		 if($this->db->update('tbl_journal_user', $data)){
		 	$pass = 1;
		 }else{
		    $pass=0;
		 }
		return $pass;
	}
    //--------------------------- 
    function addauthordata($dataID =null, $email=null, $Password=null, $Salutation=null, $name=null, $Middle=null, $Last=null, $Affliation=null, $Country=null){
        $today = date("Y-m-d H:i:s");
        //$Password1 = md5($Password);
        $data = array('email' => $email,
            'password'  => $Password,
            'salutation' => $Salutation,
            'first_name' => $name,
            'middle_name' => $Middle,
            'last_name' => $Last,
            'affliation' => $Affliation,
            'country' => $Country,
            'date_add'=>$today
        );
        if ($dataID == '') {
            if ($this->db->insert('tbl_authors_data', $data)) {
                $dataID = $this->db->insert_id();
            } else {
                $dataID = 'Error';
            }
        } else {
            $data = array('email' => $email,
            'password'  => $Password,
            'salutation' => $Salutation,
            'first_name' => $name,
            'middle_name' => $Middle,
            'last_name' => $Last,
            'affliation' => $Affliation,
            'country' => $Country);
            $this->db->where('id', $dataID);
            if ($this->db->update('tbl_authors_data', $data)) {
                $dataID = $dataID;
            } else {
                $dataID = 'Error';
            }
        }
        return $dataID;
    }
       //-------------------------------------
   function authorData($currentID=null) {
        $sql = $this->db->query("SELECT * FROM tbl_authors_data WHERE id = '".$currentID."'");
        return $sql;
   }
      //-------------------------------------
   function authordetail() {
        $sql = $this->db->query("SELECT * FROM tbl_authors_data ORDER BY date_add ASC ");
        return $sql;
   }
      //-------------------------------------
   function checkuser($table=null,$f=null,$userid = null) {
        $sql = "SELECT * FROM $table WHERE $f = '$userid' ";
        $query = $this->db->query($sql);
  $numberCount = $query->num_rows();   
  return $numberCount;
   }
}
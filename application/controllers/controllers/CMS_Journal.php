<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMS_Journal extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
       parent::__construct();
          $this->load->model('journal_model');
          $this->load->model('user_model');
          $this->load->model('journal_model_2');
          //$this->load->model('news_model');
		 
		  /*if($this->session->userdata('user_id')){     
		 	}else{
    		 	redirect(base_url().'login', 'refresh');
		 	}*/
		  /*if($this->session->userdata('user_id')==''){
				redirect(base_url('CMS_Journal'));		
		  }*/		 
    }
	//--------------------
	public function index(){
		
		if($this->session->userdata('juser_id') !=''){
			$this->load->view('journal_files/paperData_view');	
			$this->load->view('journal_files/paperData_script');	
		
		} else {		
			$this->load->view('journal_files/login_view');  
		}			
	}
	//-------------------	
	public function paperDetail($paper_no=NULL){
		$x = '';
		
		$data['paperDetail']=$this->journal_model->listPaper($x,$paper_no);
		$this->load->view('journal_files/paperDetail_view' , $data);	
	}	
	//-------------------	
	public function add_Editor(){		
					
		$name = $this->input->post('name');				
		$email = $this->input->post('email');	
		$password = $this->input->post('password');	
		$result = $this->journal_model->do_addEditor($name,$email,$password);
		echo $result;	
	}
	//-------------------	
	public function list_editor(){	
		
		$editor_id = $this->input->post('dataID');	
		$paperID = $this->input->post('paperID');	
		$functionName = 'setEditor';	
		
		if($editor_id =='0'){ $x ='';  $editor_id =''; }  else  { $x = '1'; }	
		
		$data = $this->journal_model->get_listEditor($editor_id,$x);
		
		if($this->session->userdata('juserLv') =='3'){
			$functionName = 'setReviewer';  $arr = array();	
			$round = $this->journal_model->get_roundNumber($paperID);
			/*if($round >0){
				$round2 = $round - 1;
			}*/
			$reviewer = $this->journal_model->get_reviewerList($paperID,$round);
			$countRows = $reviewer->num_rows();
			if($countRows == 0){
				$reviewer = $this->journal_model->get_reviewerList($paperID,$round - 1);
			}			
			foreach($reviewer->result() as $reviewer2){
				array_push($arr,$reviewer2->reviewer_id);
			} 
		}
	?>	
	
		<table class="table table-hover table-centered m-0">
			<thead>
              <tr>
                <th>No.</th>
				<th>Select</th>
                <th>Name Surname</th>
                <th>E-mail</th> 
				<?php if($this->session->userdata('juserLv') =='3'){?>  
				<th>Sent Mail Date</th>
                <th>Status</th> 
				<?php } ?>  
              </tr>
            </thead>
            <tbody>
			<?php $n=1; foreach($data->result() as $data2){   
				
				  $txt =''; $status2 =''; $disabled = ''; $send_mail ='';
				
				  		if($this->session->userdata('juserLv') =='3'){	

						  if(in_array($data2->id, $arr)){  $bb = 'checked';  }else { $bb = ''; }
							
							$reviewerData = $this->journal_model->get_reviewerList($paperID,$round,$data2->id);
							$countRows2 = $reviewerData->num_rows(); 
							if($countRows2 == 0){
								$reviewerData = $this->journal_model->get_reviewerList($paperID,$round-1,$data2->id);
								$countRows3 = $reviewerData->num_rows();
								if($countRows3 > 0){
									foreach($reviewerData->result() as $reviewerData2){}
									$txt = $this->journal_model->GetEngDate($reviewerData2->date_add);
									//$status2 = $reviewerData2->status;
									$status2 = $reviewerData2->agree;
									$send_mail = $reviewerData2->send_mail;
								}  
							} else {
								foreach($reviewerData->result() as $reviewerData2){}
								$txt = $this->journal_model->GetEngDate($reviewerData2->date_add);
								//$status2 = $reviewerData2->status;
								$status2 = $reviewerData2->agree;
								$send_mail = $reviewerData2->send_mail;
							}
							//echo '...'.$status2;
							if(($status2 == '1') || ($status2 == '2')){ $disabled = 'disabled';  } else { $disabled = ''; }
							
				  		} else {	
							
						  $disabled = '';
		 				  if($data2->id == $editor_id){ $bb = 'checked';  } else { $bb = ''; }  
						}						
						//if($status2 != '0'){ $disabled = 'disabled';  } else { $disabled = ''; }			
				?>
                <tr>
                  	<td><?php echo $n?></td>
					<td><div class="checkbox checkbox-primary">
						<input id="checkbox<?php echo $data2->id?>" type="checkbox" class="checkboxName" name="checkbox[]" onClick="<?php echo $functionName?>('<?php echo $data2->id?>',this.checked)" <?php echo $bb.' '.$disabled; ?> >
                        <label for="checkbox<?php echo $data2->id?>"></label>
                        </div>                                                   
                    </td>  
                    <td><?php echo $data2->name_sname?></td>
                    <td><?php echo $data2->email?></td>
				<?php if($this->session->userdata('juserLv') =='3'){?>
					<td><?php if($send_mail == '1'){ echo $txt; }?></td>
                    <td><?php if($send_mail == '1'){
								switch($status2){  
									case "1":
										echo "Agree";
										break;
									case "2":
										echo "Not Agree";
										break;
									case "0":
										echo "No Response";
										break;
						} } ?>					
					</td> 
				<?php } ?>
				</tr>   
			<?php $n++; } ?>
			</tbody>
       </table>	
<?php	}

	//-------------------
	public function save_Message_inMail(){
		
		$type = $this->input->post('type');				
		$paper_id = $this->input->post('paper_id');				
		$paper_no = $this->input->post('paper_no');				
		$date_start = $this->input->post('date_start');				
		$date_end = $this->input->post('date_end');	
		$message = $this->input->post('message');		
		$message_id = $this->input->post('message_id');		
		
		if($message_id !=''){
			$result = $this->journal_model->update_Message_inMail($type, $paper_id, $paper_no, $date_start, $date_end, $message, $message_id);	
		
		} else {
			$result = $this->journal_model->insert_Message_inMail($type, $paper_id, $paper_no, $date_start, $date_end, $message);
		}	
		echo $result;	
	}
	//-------------------
	public function set_editor(){
		
		$paper_id = $this->input->post('paper_id');				
		$editor_id = $this->input->post('dataID');				
		$message_id = $this->input->post('message_id');		
		$editor_id1 = $this->input->post('editor_id1');		
		if($message_id ==''){  $message_id = '0'; }
		$result = $this->journal_model->do_setEditor($paper_id, $editor_id, $message_id, $editor_id1);		
		echo $result;	
	}
	//-------------------
	public function remove_editor(){
		
		$paper_id = $this->input->post('paper_id');				
		$editor_id = $this->input->post('dataID');			
		$result = $this->journal_model->removeEditor($paper_id, $editor_id);		
		echo $result;	
	}	
	//-------------------
	public function logout(){
		
		$this->session->unset_userdata(array("juser_id"=>"","jname"=>"","juserLv"=>""));
		$this->session->sess_destroy();
		redirect(base_url('CMS_Journal'));
	}
	//-------------------	
	public function reviewers($paperID=NULL){	
		
		$previous = $_SERVER['HTTP_REFERER'];
		
		if($previous == base_url('CMS_Journal/statusAccepted')){
		  //$data['check'] = 'have ACC';	
		  $data['url'] = base_url('CMS_Journal/statusAccepted');
			
		} else if($previous == base_url('CMS_Journal/statusRejected')){
		  //$data['check'] = 'have ACC';	
		  $data['url'] = base_url('CMS_Journal/statusRejected');
			
		} else if($previous == base_url('CMS_Journal')){
		  //$data['check'] = 'have base';
		  $data['url'] = base_url('CMS_Journal');	
		}
		
		$data['paperID'] = $paperID;
		$this->load->view('journal_files/reviewersData_view2' , $data);	
	}	
	//-------------------	
	public function reviewers33($paperID=NULL){		
		
		$data['paperID'] = $paperID;
		$this->load->view('journal_files/reviewersData_view2' , $data);
	}
	//-------------------	
	public function comment_by_reviewers($paper_no=NULL){		
		
		$x = '';		
		$data['paperDetail']=$this->journal_model->listPaper($x,$paper_no);
		$this->load->view('journal_files/showReview_view' , $data);	
	}	
	//-------------------		
	public function review($paper_no=NULL){
		$x = '';		
		$data['paperDetail']=$this->journal_model->listPaper($x,$paper_no);
		$this->load->view('journal_files/review_view2' , $data);	
		//$this->load->view('journal_files/paperData_script');	
	}		
	//-------------------
	public function remove_reviewer(){
		
		$paper_id = $this->input->post('paper_id');				
		$reviewer_id = $this->input->post('dataID');			
		$round = $this->input->post('round');			
		$result = $this->journal_model->removeReviewer($paper_id, $reviewer_id, $round);	
		echo $result;	
	}	
	//-------------------
	public function set_reviewer(){
		
		$paper_id = $this->input->post('paper_id');				
		$reviewer_id = $this->input->post('dataID');				
		$message_id = $this->input->post('message_id');	
		$round = $this->journal_model->get_roundNumber($paper_id);
			
		if($message_id ==''){  $message_id = '0'; }
		$result = $this->journal_model->do_setReviewer($paper_id, $reviewer_id, $message_id, $round);		
		echo $result;	
	}	
	//-------------------	
	public function commentPaper(){		
		
		$reviewer_id = $this->session->userdata('juser_id');		
		$comment = $this->input->post('comment');		
		$result_status = $this->input->post('result_status');	
		$paper_id = $this->input->post('paper_id');	
		$paper_no = $this->input->post('paper_no');	
		$user_type = $this->input->post('userType');
		$send_mail = $this->input->post('send_mail');
		$round = $this->journal_model->get_roundNumber($paper_id);
		$paper_file_id = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($paper_file_id->result() as $paper_file_id2){} 
		$paper_file_id = $paper_file_id2->id;
		$commentID = $this->journal_model->insert_comment($reviewer_id, $comment, $result_status, $paper_id, $paper_no, $user_type, $paper_file_id, $send_mail ,$round);	
		$Result = $commentID;
		
		if(($result_status == '1') && ($user_type =='1')){
			
			$managing = $this->journal_model->get_managing();
			foreach($managing->result() as $managing2){}			
			$change = $this->journal_model->change_statusPaper('4', $managing2->id, $paper_id, $paper_no);
		}
		
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX|xls|xlsx';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		//$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		//$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		//$Result = 0;		
		
		$this->load->library('upload', $config);
		$countFiles = count($_FILES['file_upload']['name']);
				
		 if(($countFiles >0) && ($commentID >0)){ 
			 
			for($i=0; $i<$countFiles; $i++){           
				//---------------------------
				$_FILES['file_upload2']['name'] = $_FILES['file_upload']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['file_upload']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['file_upload']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['file_upload']['size'][$i];
				
                $this->upload->initialize($config);
                if($this->upload->do_upload('file_upload2')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					$Result = $this->journal_model->updateFile_comment($commentID,$uploadData[$i]['file_name']);	
                }				
			}  
			if($Result == 1){ $Result = $commentID; }
		}		
		echo $Result;
	}	
	//-------------------
	public function managing_updateStatus_paper(){
		
		$status_process = $this->input->post('val');				
		$paperID = $this->input->post('element2');	
		
		if(($this->session->userdata('juserLv') =='1') || ($this->session->userdata('juserLv') =='2')){ 
			
			$result = $this->journal_model->managingUpdateStatus($status_process, $paperID);
		
		} else {
			
			$x ='';
			$userID = $this->session->userdata('juser_id');
			
			$round = $this->journal_model->get_roundNumber($paperID);
			$paper = $this->journal_model->listPaper($x,$x,$paperID);
			foreach($paper->result() as $paperData){}
			
			if($paperData->editor_id == $userID){
				
				$user_type = '1';
			
			} else {
				$user_type = '2';
			}	
			$paperFile = $this->journal_model->get_paperFile($paperID,$round);
			foreach($paperFile->result() as $paperFile2){}
								
			$comment = $this->journal_model->get_comment($x, $userID, $paperID, $round);			  
			$commentNum = $comment->num_rows();
			
			//if($commentNum >0){
				//foreach($comment->result() as $comment2){}
				$result = $this->journal_model->editorUpdateStatus($status_process, $paperID, $userID, $user_type, $paperData->paper_no, $paperFile2->id, $commentNum, $round);
			//}
			
			
			//$result = $this->journal_model->managingUpdateStatus($status_process, $paperID);
			
			
			//$model = 'editorUpdateStatus';
		}		
		//$result = $this->journal_model->managingUpdateStatus($status_process, $paperID);		
		echo $result;	
	} 
	//-------------------	
	public function update_commentPaper(){		
		
		$reviewer_id = $this->session->userdata('juser_id');		
		$comment = $this->input->post('comment');		
		$result_status = $this->input->post('result_status');	
		$paper_id = $this->input->post('paper_id');	
		$paper_no = $this->input->post('paper_no');	
		$user_type = $this->input->post('userType');
		$dataID = $this->input->post('commentID');
		$send_mail = $this->input->post('send_mail');
		$round = $this->journal_model->get_roundNumber($paper_id);
		$paper_file_id = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($paper_file_id->result() as $paper_file_id2){} 
		$paper_file_id = $paper_file_id2->id;
		$commentID = $this->journal_model->update_comment($reviewer_id, $comment, $result_status, $paper_id, $paper_no, $user_type, $paper_file_id, $dataID ,$send_mail ,$round);	
		$Result = $commentID;
		
		if(($result_status == '1') && ($user_type =='1')){
			
			$managing = $this->journal_model->get_managing();
			foreach($managing->result() as $managing2){}			
			$change = $this->journal_model->change_statusPaper('4', $managing2->id, $paper_id, $paper_no);
		
		} else if(($result_status != '1') && ($user_type =='1')){
			
			$managing = $this->journal_model->get_managing();
			foreach($managing->result() as $managing2){}			
			$change = $this->journal_model->change_statusPaper('1', $managing2->id, $paper_id, $paper_no);
		}
				
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX|xls|xlsx';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		//$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		//$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		//$Result = 0;		
		
		$this->load->library('upload', $config);
		$countFiles = count($_FILES['file_upload']['name']);
				
		 if(($countFiles >0) && ($commentID >0)){ 
			 
			for($i=0; $i<$countFiles; $i++){           
				//---------------------------
				$_FILES['file_upload2']['name'] = $_FILES['file_upload']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['file_upload']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['file_upload']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['file_upload']['size'][$i];
				
                $this->upload->initialize($config);
                if($this->upload->do_upload('file_upload2')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					$Result = $this->journal_model->updateFile_comment($commentID,$uploadData[$i]['file_name']);	
                }				
			}  
			if($Result == 1){ $Result = $commentID; }
		}		
		echo $Result;
	}	
	//-------------------	
	public function statusAccepted(){		
		
		$data['statusF'] = '1';
		$data['check'] = ''; 
		$data['page_title'] = 'บทความสถานะ Accepted ';	
		$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/paperData_script');
	}	
	//-------------------	
	public function Detail($paper_no=NULL){
		$x = '';
		
		$data['paperDetail']=$this->journal_model->listPaper($x,$paper_no);
		$this->load->view('journal_files/paperDetail_view2' , $data);	
	}	
	//-------------------
	public function statusRejected(){		
		
		$data['statusF'] = '4';
		$data['check'] = '';
		$data['page_title'] = 'บทความสถานะ Rejected ';
		$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/paperData_script');
	}	
	//-------------------
	public function statusArchived(){		
		
		$data['statusF'] = '';
		$data['check'] = 'yes';
		$data['page_title'] = 'บทความสถานะ Archived ';
		$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/paperData_script');
	}	
	//-------------------	
	public function action_from_mail(){		 
		
		$data['result'] = $this->uri->segment(3);
		$data['paper_id'] = $this->uri->segment(4);
		$data['reviewer_id'] = $this->uri->segment(5);
		$data['paper_no'] = $this->uri->segment(6);		
		
		$round = $this->journal_model->get_roundNumber($this->uri->segment(4));			   
		$result = $this->journal_model->result_fromMail($this->uri->segment(3), $this->uri->segment(4), $this->uri->segment(5), $round);
		
		$data['round'] = $round;	
		
		if($result == 1){
			if($this->uri->segment(3) == 'agree'){
			
				$this->load->view('journal_files/Reviewer_Agree' , $data);
				
			} else {
				echo '<script>window.top.close();</script>';
			}		
		} else { 
			echo '<script>window.top.close();</script>';
		}			
	}	
	//---------------------------
    public function edit_myData(){
        $currentID = $this->session->userdata('juser_id');
		$data['dataID'] = $currentID;
        $data['userData'] = $this->journal_model_2->userData($currentID);
        $this->load->view('journal_files/Add_user' , $data);
        $this->load->view('journal_files/Add_user_script');
    }
	//-------------------
	public function Report_by_Status(){		
		
		$data['page_title'] = 'รายงานสถานะการส่ง Paper ';
		$data['check'] = '1';
		//$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/report_view' , $data);
	}
	//-------------------
	public function Report_Number_Paper(){		
		
		$data['page_title'] = 'รายงานแสดงจำนวนผู้ส่ง Paper ';
		$data['check'] = '2';
		//$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/report_view' , $data);
	}//-------------------
	public function Report_by_Author(){		
		
		$data['page_title'] = 'รายงานผู้ส่ง Paper รายบุคคล ';
		$data['check'] = '3';
		//$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/report_view' , $data);
	}
	//------------------- 
	public function search_paper(){
		
		$dateStart = $this->input->post('dateStart');				
		$dateEnd = $this->input->post('dateEnd');				
		$status = $this->input->post('status');	
		$paperData = $this->journal_model->searchPaper($dateStart,$dateEnd,$status);
	?>	
			
		<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
           <thead>
           <tr>
              <th>#</th>
              <th>No.</th>
              <th>Manuscript Type</th>
              <th>Submission Date – Original</th>
              <th>First Decision Date</th>
              <th>Type of First Decision</th>
              <th>Date of Last Revision rec'd</th>
              <th>Type of Decision</th>
              <th>Date of Last Decision</th>
              <th>Country/Region</th>
              <th>Editor</th>
           </tr>
           </thead>
		   <tbody>
		<?php $n=1; $x=''; $section =''; $dateSubmit =''; $status2 =''; $review_date =''; $review_date2 ='';
				foreach($paperData->result() as $paperData2){ 
			   
			  	$paper = $this->journal_model->listPaper($x,$paperData2->paper_no,$paperData2->id);
			  	//$paper = $this->journal_model->listPaper($x,$paperData2->paper_no,$paperData2->paper_id);
				foreach($paper->result() as $paper2){ }	
				if($paper2->section == '1'){ 
					$section = "Research Articles"; 
				} else { 
					$section = "Review Articles"; 
				} 
				//$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add);	
				$dateSubmit = $this->journal_model->GetShortEngDate($paper2->date_add);	
				
				$comment = $this->journal_model->get_comment($paperData2->paper_no, $paper2->editor_id, $paperData2->id, '0');
				//$comment = $this->journal_model->get_comment($paperData2->paper_no, $paper2->editor_id, $paperData2->paper_id, '0');
				foreach($comment->result() as $comment2){ 	
				$status2 = $comment2->result_status;	
				//$review_date = $this->journal_model->GetEngDateTime($comment2->review_date); }
				//$review_date = $this->journal_model->GetShortEngDate($comment2->review_date); }
				$review_date = $this->journal_model->get_shortEngDate($comment2->review_date);  }
					
				$round = $this->journal_model->get_roundNumber($paperData2->id);
				//$round = $this->journal_model->get_roundNumber($paperData2->paper_id);
				$comment3 = $this->journal_model->get_comment($paperData2->paper_no, $paper2->editor_id, $paperData2->id, $round);
				//$comment3 = $this->journal_model->get_comment($paperData2->paper_no, $paper2->editor_id, $paperData2->paper_id, $round);
				foreach($comment3->result() as $comment4){ 	
				$status = $comment4 ->result_status;	
				//$review_date2 = $this->journal_model->GetEngDateTime($comment4->review_date);	 get_shortEngDate
				$review_date2 = $this->journal_model->get_shortEngDate($comment4->review_date);  }
				
				if($paper2->editor_id != 0){	
					$nameEditor = $this->journal_model->get_nameEditor($paper2->editor_id);	
					foreach($nameEditor->result() as $nameEditor2){ }
				}
					
				$author = $this->journal_model->get_author2($paper2->author_id);	
				foreach($author->result() as $author2){ }					
					
			    $last_revision = $this->journal_model->get_paperFile($paperData2->id,$round);	
			    //$last_revision = $this->journal_model->get_paperFile($paperData2->paper_id,$round);	
				foreach($last_revision->result() as $last_revision2){ }
			   ?>	
              <tr>
                 <td align="center"><?php echo $n?></td>
                 <td><a href="<?php echo base_url('CMS_Journal/Detail/').$paperData2->paper_no?>" target="_blank"><?php echo $paperData2->paper_no?></a></td>
                 <td><?php echo $section;   //echo '**'.$comment2->result_status;?></td>
                 <td><?php echo $dateSubmit?></td>
                 <td><?php echo $review_date?></td>  
                 <td><?php switch($status2){
								case "1":
									echo "Accepted";
									break;
								case "2":
									echo "Minor Revision";
									break;
								case "3":
									echo "Major Revision";
									break;
								case "4":
									echo "Rejected";
									break;
								case "0":
									echo "";
									break;
								case "":
									echo "";
									break;
							}				 
					 ?>			  
				 </td>
				 <td><?php echo $this->journal_model->GetShortEngDate($last_revision2->date_add);?></td>
                 <td><?php switch($status){
								case "1":
									echo "Accepted";
									break;
								case "2":
									echo "Minor Revision";
									break;
								case "3":
									echo "Major Revision";
									break;
								case "4":
									echo "Rejected";
									break;
								case "0":
									echo "";
									break;
								case "":
									echo "";
									break;
							}				 
					 ?>			  
				 </td>
                 <td><?php echo $review_date2?></td>
                 <td><?php echo $author2->country?></td>
                 <td><?php if($paper2->editor_id != 0){ echo $nameEditor2->name_sname; } ?></td>
              </tr>
        <?php $status =''; $status2 =''; $n++; } ?>                                        
           </tbody>
      </table>

 <script type="text/javascript">
     $(document).ready(function() {
                
          //Buttons examples
          var table = $('#datatable-buttons').DataTable({
               lengthChange: false,
               buttons: ['print', 'excel']
          });                

          table.buttons().container()
              .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');		 
		 
     });
</script>	 

<?php
	}		
	//------------------- 
	
	public function searchNumber_Paper(){
		
		$dateStart = $this->input->post('dateStart');				
		$dateEnd = $this->input->post('dateEnd');	
		$paperData = $this->journal_model->numberPaper_data($dateStart,$dateEnd);
	?>	
			
		<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
           <thead>
           <tr>
              <th>#</th>
              <th>No.</th>
              <th>Title</th>
			  <th>Author Name</th> 
              <th>Submitted Date</th>
              <th>Editor</th>              
              <th>Type of Decision</th>
              <th>#Days</th>
              <th>Revision Number</th>
              
           </tr>
           </thead>
		   <tbody>
		<?php $n=1; $dateSubmit =''; $status2 =''; $nameEditor =''; 
				foreach($paperData->result() as $paperData2){ 		  		
				
				$dateSubmit = $this->journal_model->GetEngDate($paperData2->f_date_add);	
				//$dateSubmit = $this->journal_model->GetShortEngDate($paperData2->f_date_add);	
				$status2 = $paperData2->editor_result;	
				$DateDiff = $this->journal_model->DateDiff2($paperData2->p_date_add,$paperData2->f_date_add);	
				
				if($paperData2->editor_id != '0'){	
					$nameEditor = $this->journal_model->get_nameEditor($paperData2->editor_id);	
					foreach($nameEditor->result() as $nameEditor2){ 
					$nameEditor = $nameEditor2->name_sname;
					}	
				}
		?>	
              <tr>
                 <td align="center"><?php echo $n?></td>
                 <td><a href="<?php echo base_url('CMS_Journal/Detail/').$paperData2->paper_no?>" target="_blank"><?php echo $paperData2->paper_no; if($paperData2->round_number > 0){ echo '.R'.$paperData2->round_number; }?></a></td>
				 <td><?php echo $paperData2->title?></td>
				 <td><?php echo $this->journal_model->get_author($paperData2->author_id);?></td> 
				 <td><?php echo $dateSubmit?></td> 
				 <td><?php echo $nameEditor;?></td>     
                 <td><?php switch($status2){ 
								case "1":
									echo "Accepted";
									break;
								case "2":
									echo "Minor Revision";
									break;
								case "3":
									echo "Major Revision";
									break;
								case "4":
									echo "Rejected";
									break;
								case "5":
									echo "in process";
									break;
								case "0":
									echo "";
									break;
								case "":
									echo "";
									break;
							}				 
					 ?>			  
				 </td>				 
                 <td><?php if($DateDiff != 0){ echo $DateDiff; }?></td>             
                 <td><?php echo $paperData2->round_number?></td>               
              </tr>
        <?php $n++; } ?>                                        
           </tbody>
      </table>

 <script type="text/javascript">
     $(document).ready(function() {
                
          //Buttons examples
          var table = $('#datatable-buttons').DataTable({
               lengthChange: false,
               buttons: ['print', 'excel']
          });                

          table.buttons().container()
              .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');		 
		 
     });
</script>	 

<?php
	}	
	//------------------- 
	
	public function search_byAuthor(){
		
		$name = $this->input->post('name');		
		$authorID = $this->journal_model->list_authorID($name); 
		if($authorID !=''){
			$paperData = $this->journal_model->paper_byAuthor($authorID);
		}		
	?>	
			
		<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
           <thead>
           <tr>
              <th>#</th>
              <th>No.</th>
              <th>Title</th>
			  <th>Author Name</th> 
              <th>Submitted Date</th>
              <th>Editor</th>              
              <th>Type of Decision</th>
              <th>#Days</th>
              <th>Revision Number</th>
              
           </tr>
           </thead>
		   <tbody>
		<?php $n=1; $dateSubmit =''; $status2 =''; $nameEditor =''; 
				if($authorID !=''){
				foreach($paperData->result() as $paperData2){ 		  		
				
				$dateSubmit = $this->journal_model->GetEngDate($paperData2->f_date_add);	
				//$dateSubmit = $this->journal_model->GetShortEngDate($paperData2->f_date_add);	
				$status2 = $paperData2->editor_result;	
				$DateDiff = $this->journal_model->DateDiff2($paperData2->p_date_add,$paperData2->f_date_add);	
				
				if($paperData2->editor_id != '0'){	
					$nameEditor = $this->journal_model->get_nameEditor($paperData2->editor_id);	
					foreach($nameEditor->result() as $nameEditor2){ 
					$nameEditor = $nameEditor2->name_sname;
					}	
				}
		?>	
              <tr>
                 <td align="center"><?php echo $n?></td>
                 <td><a href="<?php echo base_url('CMS_Journal/Detail/').$paperData2->paper_no?>" target="_blank"><?php echo $paperData2->paper_no; if($paperData2->round_number > 0){ echo '.R'.$paperData2->round_number; }?></a></td>
				 <td><?php echo $paperData2->title?></td>
				 <td><?php echo $this->journal_model->get_author($paperData2->author_id);?></td> 
				 <td><?php echo $dateSubmit?></td> 
				 <td><?php echo $nameEditor;?></td>     
                 <td><?php switch($status2){ 
								case "1":
									echo "Accepted";
									break;
								case "2":
									echo "Minor Revision";
									break;
								case "3":
									echo "Major Revision";
									break;
								case "4":
									echo "Rejected";
									break;
								case "5":
									echo "in process";
									break;
								case "0":
									echo "";
									break;
								case "":
									echo "";
									break;
							}				 
					 ?>			  
				 </td>				 
                 <td><?php if($DateDiff != 0){ echo $DateDiff; }?></td>             
                 <td><?php echo $paperData2->round_number?></td>               
              </tr>
        <?php $n++; } } ?>                                        
           </tbody>
      </table>

 <script type="text/javascript">
     $(document).ready(function() {
                
          //Buttons examples
          var table = $('#datatable-buttons').DataTable({
               lengthChange: false,
               buttons: ['print', 'excel']
          });                

          table.buttons().container()
              .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');		 
		 
     });
</script>	 

<?php
	}
	//-------------------
	public function test($paperID=NULL){		
		
	/*	$previous = $_SERVER['HTTP_REFERER'];
		
		if($previous == base_url('CMS_Journal/statusAccepted')){
		  //$data['check'] = 'have ACC';	
		  $data['url'] = base_url('CMS_Journal/statusAccepted');
			
		} else if($previous == base_url('CMS_Journal/statusRejected')){
		  //$data['check'] = 'have ACC';	
		  $data['url'] = base_url('CMS_Journal/statusRejected');
			
		} else if($previous == base_url('CMS_Journal')){
		  //$data['check'] = 'have base';
		  $data['url'] = base_url('CMS_Journal');	
		}*/
		$data['paperID'] = $paperID;
		//$this->load->view('journal_files/paperAccepted' , $data);
		$this->load->view('journal_files/xxx' , $data);
	}
	//------------------- 
	public function home() {
        $this->load->view('journal_files/home_add');
        $this->load->view('journal_files/home_add_script');
    }
    
    //-------------------	
    public function contact() {
        $this->load->view('journal_files/contactus');
        $this->load->view('journal_files/contactus_script');
    }
    
    //-------------------	
    public function payment() {
        $this->load->view('journal_files/payment');
        $this->load->view('journal_files/payment_script');
    }

    //-------------------	
    public function edit_cate() {
        $show = '';
        $dataID = '';
        $data['editcateData'] = $this->journal_model_2->list_editcateData($show, $dataID);
        $this->load->view('journal_files/edit_cate', $data);
        $this->load->view('journal_files/edit_cate_script');
    }
    
    //-------------------	
    public function edit_view() {
        $data['editList']=$this->journal_model_2->geteditList();
        $this->load->view('journal_files/edit_view', $data);
        $this->load->view('journal_files/edit_view_script');
    }

    //-------------------	
    public function edit_cate_add($dataID = null) {
        $data['dataID'] = $dataID;
        $this->load->view('journal_files/edit_cate_add', $data);
        $this->load->view('journal_files/edit_cate_script');
    }

    //--------------------
    public function DoAddProductCategory1() {
        $category_title = $this->input->post('category_title');
        $dataID = $this->input->post('dataID');
        $resultUpdateBooking = $this->journal_model_2->DoAddProductCategory1($category_title, $dataID);
        echo $resultUpdateBooking;
    }
    
    //--------------------
    public function Addedit() {
        $editorial_name = $this->input->post('editorial_name');
        $editorial_category = $this->input->post('editorial_category');
        $dataID = $this->input->post('dataID');
        $resultUpdateBooking = $this->journal_model_2->Addedit($editorial_name,$editorial_category, $dataID);
        echo $resultUpdateBooking;
    }

    //-------------------
    public function aboutjemes($currentID = null) {
        $data['currentID'] = $currentID;
        $this->load->view('journal_files/aboutjemes_add', $data);
        $this->load->view('journal_files/aboutjemes_add_script');
    }

    //--------------------
    public function aboutData() {
        $currentID = '';
        $data['aboutData'] = $this->journal_model_2->list_aboutData($currentID);
        $this->load->view('journal_files/aboutjemes_view', $data);
        $this->load->view('journal_files/aboutjemes_add_script');
    }
    //--------------------
    public function published_view() {
        
        $data['publishedData'] = $this->journal_model_2->get_publish();
        $this->load->view('journal_files/published_journal_view', $data);
        $this->load->view('journal_files/pudlished_journal_view_script');
    }
    //--------------------
    public function published_PDF_view($currentID=null) {
         $data['publishbyid'] = $this->journal_model_2->get_publishbyid($currentID);
        $data['PDF_view']=$this->journal_model_2->PDF_view($currentID);
        $this->load->view('journal_files/published_PDF_view',$data);
        $this->load->view('journal_files/pudlished_PDF_view_script');
    }
    //----------------------------
    public function changeSection(){
        $currentID = $this->input->post('changeValue');
        $result_id = $this->journal_model_2->get_listSection($currentID); ?>

        <select id="sectionData" name="sectionData"  class="form-control form-control-sm" > 
          <option value="">---Select---</option>
          <?php	foreach($result_id->result() as $sectionData2){?>
           <option value="<?php echo $sectionData2->id?>"><?php echo $sectionData2->name?></option>
          <?php } ?>
        </select>
    
    <?php }
    //---------------------------
    public function Add_user($currentID = null){
        $data['dataID'] = $currentID;
        $data['userData']=$this->journal_model_2->userData($currentID);
        $this->load->view('journal_files/Add_user',$data);
        $this->load->view('journal_files/Add_user_script');
    }
    //---------------------------
    public function published_journal($currentID = null,$dataID=null) {
        $data['currentID'] = $currentID;
        $data['dataID'] = $dataID;
        $this->load->view('journal_files/published_journal_add', $data);
        $this->load->view('journal_files/published_journal_add_script');
    }
    //---------------------------
    public function published_PDF($currentID = null) {
        $data['currentID'] = $currentID;
        if($currentID == '0'){
           $data['currentID']=''; 
     $data['journalID'] = $this->uri->segment(4);
     $data['pdf2'] = $this->uri->segment(4);
        }else{
            $data['journalID'] = '';
            $data['pdf2'] = $currentID; 
        }
        $data['publishedData'] = $this->journal_model_2->get_publish();
     
        $this->load->view('journal_files/published_PDF', $data);
        $this->load->view('journal_files/published_PDF_script');
    }
    //-------------------
    public function instructions_add ($currentID = null) {
        $data['currentID'] = $currentID;
        $this->load->view('journal_files/instructions_add', $data);
        $this->load->view('journal_files/instructions_script');
    }
    
    //--------------------
    public function instructions_view() {
        $currentID = '';
        $data['instructionData'] = $this->journal_model_2->list_instructionData( $currentID);
        $this->load->view('journal_files/instructions_view', $data);
        $this->load->view('journal_files/instructions_script');
    }
    //-------------------
    public function remove_file() {
        $file_name = $this->input->post('file_name');
        $file_name = 'uploadfile/'.$file_name;
        $img = '';
        $result = $this->journal_model_2->remove_file2($img);
        if($result == '1'){
            $this->load->helper("file");					   
            @unlink($file_name); 
			echo $result;
        }        
    }
    //-------------------
    public function remove_file3() {
        $file_name = $this->input->post('file_name');
        $file_name = 'uploadfile/'.$file_name;
        $img = '';
        $result = $this->journal_model_2->remove_file3($img);
        if($result == '1'){
            $this->load->helper("file");					   
            @unlink($file_name); 
			echo $result;
        }        
    }

    //-------------------
    public function deleteData() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->delete_data($dataID, $table);
        echo $result;
    }
    //-------------------
    public function deleteData_publish() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->deleteData_publish($dataID, $table);
        echo $result;
    }

    //-------------------
    public function set_ShowOnWeb() {
        $dataID = $this->input->post('dataID');
        $check = $this->input->post('check');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->update_ShowOnWeb($dataID, $check, $table);
        echo $result;
    }

    //------------------------------- 	
    public function addHome() {
        $topic = $this->input->post('topic');
        $comment = $this->input->post('comment');
        $currentID = $this->input->post('currentID');
        $img = $this->input->post('img_old');
        //$img = '';
        //$result_id = $this->journal_model_2-> addHome($currentID , $topic, $desc ,$img);
        $upload_path = './uploadfile/';
        $upload_pathName = 'uploadfile/';
        $config['upload_path'] = $upload_path;
        //allowed file types. * means all types
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX|xls|xlsx';
        //allowed max file size. 0 means unlimited file size
        $config['max_size'] = '0';
        //max file name size
        //$config['max_filename'] = '255';
        //whether file name should be encrypted or not
        //$config['encrypt_name'] = TRUE;
        //store image info once uploaded
        $image_data = array();
        //check for errors
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img']['name']);
        if ($countFiles > 0) {
            $this->load->helper("file");					   
            @unlink('uploadfile/'.$img);
            for ($i = 0; $i < $countFiles; $i++) {
    //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                }
            }
        }
        if ($currentID != '0') {
            $result_id = $this->journal_model_2->updateHome($topic, $comment, $img);
        } else {
            $result_id = $this->journal_model_2->addHome($topic, $comment, $img);
        }
//        $result_id = $this->journal_model_2->addHome($currentID, $topic, $comment, $img);
        echo $result_id;
    }
    //------------------------------- 	
    public function addPublish() {
        $journal_name = $this->input->post('journal_name');
        $sub_title = $this->input->post('sub_title');
        $issue = $this->input->post('issue');
        $published_date = $this->input->post('published_date');
        $currentID = $this->input->post('currentID');
        $img = $this->input->post('img_old');
        $upload_path = './uploadfile/';
        $upload_pathName = 'uploadfile/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX|xls|xlsx';
        $config['max_size'] = '0';
        $image_data = array();
        //check for errors
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img']['name']);
		//print_r($_FILES['img']['name']);
		
        if($_FILES['img']['name'][0] != ''){
            $this->load->helper("file");					   
            @unlink('uploadfile/'.$img);
            for ($i = 0; $i < $countFiles; $i++) {
    //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                }
            }
        }
            $result_id = $this->journal_model_2->addPublish($journal_name, $sub_title,$issue, $published_date,$img,$currentID);
        
        echo $result_id;       
    }

    //------------------------------- 	
    public function addAbout() {
        $topic = $this->input->post('topic');
        $comment = $this->input->post('comment');
        $currentID = $this->input->post('currentID');
        $result_id = $this->journal_model_2->addAbout($currentID, $topic, $comment);
        echo $result_id;
    }
    //------------------------------- 	
    public function addsection() {
        $currentID =$this->input->post('currentID');
        $name = $this->input->post('name');
        $dataID = $this->input->post('dataID');
        $result_id = $this->journal_model_2->addsection($name,$currentID,$dataID);
        echo $result_id;
    }
    //----------------------------
    public function List_show() {
        $currentID =$this->input->post('currentID');
        $result_id = $this->journal_model_2->get_listSection($currentID);
        ?><br>
        <br>
        <table id="table2" class="table table-bordered table-hover">
			<thead>
              <tr>
                <th>No.</th>
				<th>Manuscript Type</th>
                <th>Sort Number</th>
                <th>Show / Hide</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
                <?php $n=1; foreach($result_id->result() as $data2){ ?>
				
			 <tr id="row<?php echo $data2->id?>">
                                                <td><?php echo $n?></td>
                                                <td><?php echo $data2->name?></td>
                                                <td><input id="order<?php echo $data2->id?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $data2->sort_number?>" onChange="updateOrder('<?php echo $data2->id?>','sort_number', this.value)">
                                                    <input type="hidden" id="chkOrder<?php echo $data2->id?>" value="<?php echo $data2->sort_number?>"></td>
                                                <td align="center">
                                                                            <label>
                                                                                <input id="ch<?php echo $data2->id?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data2->id?>', this.value, 'tbl_section_data')" value="<?php echo $data2->show_onweb?>" <?php if ($data2->show_onweb == '1') { echo 'checked'; }?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>
                                                                        </td>
                                                <td><button type="button" class="btn btn-success btn-sm" onClick="update('<?php echo $data2->id?>','<?php echo $data2->name?> ')"><i class="icon-pencil"></i></button></td>
                                                <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $data2->id?>', 'tbl_section_data')"><i class="icon-trash"></i></button>

                                                </td>
                                            </tr>
			<?php $n++;  } ?>
			</tbody>
       </table>	
       <script type="text/javascript">
    $(document).ready(function () {
        $('[data-plugin="switchery"]').each(function (idx, obj) {
       new Switchery($(this)[0], $(this).data());
});
$('#table2').DataTable({
     searching: true ,
     pageLength : 15     
});
    });
    </script>
<?php	}
    
    //=================================
    // //------------------dataID changeValue //

	public  function updateOrderCate(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->journal_model_2->updateOrderCate($dataID,$changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function updatePDF(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->journal_model_2->updatePDF($dataID,$changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function checkemail(){
		$changeValue = $this->input->post('email');
		$result = $this->journal_model->count_email2($changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function updateauthor(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->journal_model_2->updateauthor($dataID,$changeValue);
		echo $result;
		
	} 
   
    //------------------------------- 	
    public function addinstruction(){
        $topic = $this->input->post('topic');
        $desc = $this->input->post('desc');
        $currentID = $this->input->post('currentID');
        $result_id = $this->journal_model_2->addinstruction($currentID, $topic, $desc);
        echo $result_id;
    }

   
    //-------------------
    public function edit_add($dataID=null){
        $data['dataID'] = $dataID;
        $datatype='1';
	$data['listCategory']=$this->journal_model_2->getCategory($datatype);
        $this->load->view('journal_files/edit_add',$data);
        $this->load->view('journal_files/edit_add_script');
    }
    
     //------------------------------- 	
    public function addcontact(){
        $phone = $this->input->post('phone'); 
        $mail = $this->input->post('mail'); 
        $comment = $this->input->post('comment');
        $currentID = $this->input->post('currentID');
         if ($currentID != '0') {
            $result_id = $this->journal_model_2->updatecontact($phone, $mail, $comment);
        } else {
            $result_id = $this->journal_model_2->addcontact($phone, $mail, $comment);
        }
        echo $result_id;
    }
    
     //------------------------------- 	
    public function addpayment(){
        $accountName = $this->input->post('accountName'); 
        $accountNo = $this->input->post('accountNo');  
        $bank = $this->input->post('bank'); 
        $swiftCode = $this->input->post('swiftCode');
        $currentID = $this->input->post('currentID');
         if ($currentID != '0') {
            $result_id = $this->journal_model_2->updatepayment($accountName, $accountNo, $bank,$swiftCode);
        } else {
            $result_id = $this->journal_model_2->addpayment($accountName, $accountNo, $bank,$swiftCode);
        }
        echo $result_id;
    }    
    //-------------------
	public function managing_updateStatus(){
		
		$status = $this->input->post('val');				
		$publishID = $this->input->post('element2');	
		$result = $this->journal_model_2->managingUpdateStatus($status, $publishID);		
		echo $result;	
	} 
//============================================
         public function addPDF(){
             $publishedData =$this->input->post('publishedData');
		 $sectionData =$this->input->post('sectionData');
		 $title =$this->input->post('title');
		 $Page =$this->input->post('Page');
		 $dataID =$this->input->post('dataID');
		 $Author =$this->input->post('Author');
                 $img = $this->input->post('img_old');
                 
//                  $dataID2 = '';
                 	//-----------------------------------
		     
		 		$upload_path = './uploadfile/';
				$upload_pathName = 'uploadfile/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'pdf|PDF';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = TRUE;
				//store image info once uploaded
				$image_data = array();
		 		//check for errors
				$is_file_error = FALSE;
		 	
		    $this->load->library('upload', $config);
                      $countFiles = count($_FILES['file_upload']['name']);
		   
       if ($countFiles > 0) {
            $this->load->helper("file");					   
            @unlink('uploadfile/'.$img);
            for ($i = 0; $i < $countFiles; $i++) { 
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['file_upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['file_upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['file_upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['file_upload']['size'][$i];

                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    //$uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $fileData['file_name'];
                  
                    //$dataID = $this->journal_model_2->addPDF($dataID ,$sectionData , $publishedData , $title, $Page,$uploadData[$i]['file_name'] );
                }
				
			}
		} 
                $dataID = $this->journal_model_2->addPDF($dataID ,$sectionData , $publishedData , $title, $Page,$img);
		//--------------------------                  
                 foreach($Author AS $value){
                     if($value !=''){
                         $dataID2 = $this->journal_model_2->addauthor($dataID , $value);
                         //$dataID = $dataID2;
                     }  //else {
                       //  $dataID = $dataID;
                    // }                     
                     
                 }                 
		 echo $dataID;
		
	 }
         //---------------------
         public function UserAdd(){
             $name =$this->input->post('name');
             $Password =$this->input->post('Password');
             $password_old =$this->input->post('password_old');
             $email =$this->input->post('email');
             $adminType =$this->input->post('adminType');
             $dataID =$this->input->post('dataID');
             if($Password==''){
                 $Password=$password_old;
             }else{
                  $Password=md5($Password);
             }
             $result = $this->journal_model_2->adduser($dataID ,$name , $Password , $email, $adminType);
             echo $result;
         }
         //--------------------
    public function user_data(){
        
        $data['userData']=$this->journal_model_2->userdetail();
        $this->load->view('journal_files/User_data',$data);
        $this->load->view('journal_files/User_data_script');
    }
    //--------------------------------
    public function payment_detail(){
        //$author ='';
    //$data['payment'] = $this->journal_model->listPaper($author,$paper_no);
        $data['statusF'] = '1';
		$data['check'] = '';
		
        $this->load->view('journal_files/payment_detail',$data);
        $this->load->view('journal_files/paperData_script');
    }
 //--------------------------------
    public function payment_action($paper_no){
        $author ='';
    $data['payment'] = $this->journal_model->listPaper($author,$paper_no);
        $this->load->view('journal_files/payment_action',$data);
        $this->load->view('journal_files/payment_action_script');
    }
     //---------------------
     public function updateconfirm(){
         $NotebAdmin = $this->input->post('NotebAdmin');
         $payment_no = $this->input->post('payment_no');
         $currentID = $this->input->post('currentID');
         $updateconfirm = $this->journal_model_2->updateconfirm($NotebAdmin,$payment_no,$currentID );
         echo $updateconfirm;
     }    
     //---------------------
     public function sendemail(){
         
        $data['email'] = $this->journal_model_2->listemail();
        $this->load->view('journal_files/sendemail_view',$data);	
		$this->load->view('journal_files/sendemail_view_script');
     }    
     //---------------------
     public function emaildata($paper_no){
      
    	$data['emailpaper'] = $this->journal_model_2->listemailpaper($paper_no);
         $this->load->view('journal_files/sendemail_data',$data);	
     }    
     //---------------------
     public function emailDetail($emailId=NULL,$paper_no=NULL){
	   $data['print'] = ''; 
	   $data['password_temp'] = '';	 
	   //$data['paper_no'] = $this->uri->segment(4);
	   $data['paper_no'] = $paper_no;
	   //$email_id = $this->uri->segment(3);	 
	   $data['email_id'] = $emailId;	 
	   $emaildetail = $this->journal_model_2->listemaildetail($emailId,$paper_no);
	   foreach($emaildetail->result() as $emaildetail2){}
	   $data['date2'] = $emaildetail2->date_sent;	
	   //$reviewer_id = $emaildetail2->user_id;	 
	   $data['reviewer_id'] = $emaildetail2->user_id;	 
	   switch ($emaildetail2->type_mail){
		   case "1";
			   $this->load->view('journal_files/sendMailEditor_view',$data);
			   break;
		   case "2";
			   $this->load->view('journal_files/sendMailReviewer_view',$data);
			   break;
		   case "3";
			   $this->load->view('journal_files/sendMail_afterReviewerAction_view',$data);
			   break;
		   case "4";
			   $this->load->view('journal_files/reviewer_to_editor_view',$data);
			   break;
		   case "5";
			   $this->load->view('journal_files/editor_to_author_view',$data);
			   break;
		   case "6";
			   $this->load->view('journal_files/author_mailEdit_view',$data);
			   break;
		   case "7";
			   $this->load->view('journal_files/mail_authorSubmission_view_1',$data);
			   break;
		   case "8";
			   $this->load->view('journal_files/mail_authorSubmission_view_2',$data);
			   break;
		   case "9";
			   $this->load->view('journal_files/managingReject_view',$data);
			   break;
	   }
    }  
    //---------------------------------
    public function print_mail(){
        
        $this->load->view('journal_files/print_mail');
    }
    //----------------------------
    public function reset_password(){ 
        $txt = $this->uri->segment(3);
		$data['txt'] = $txt;
        $this->load->view('journal_files/forgotPassword_journal',$data);
    }
	/*//---------------------
     public function printMail($paper_no=NULL, $typeMail=NULL, $dataID=NULL, $key=NULL){
		 
	   $data['print'] = 'yes'; 
	   $emaildetail = $this->journal_model_2->listemaildetail($emailId,$paper_no);
	   foreach($emaildetail->result() as $emaildetail2){}
		 
	   switch ($emaildetail2->type_mail){
		   case "1";
			   $this->load->view('journal_files/sendMailEditor_view',$data);
			   break;
		   case "2";
			   $this->load->view('journal_files/sendMailReviewer_view',$data);
			   break;
		   case "3";
			   $this->load->view('journal_files/sendMail_afterReviewerAction_view',$data);
			   break;
		   case "4";
			   $this->load->view('journal_files/reviewer_to_editor_view',$data);
			   break;
		   case "5";
			   $this->load->view('journal_files/editor_to_author_view',$data);
			   break;
		   case "6";
			   $this->load->view('journal_files/author_mailEdit_view',$data);
			   break;
		   case "7";
			   $this->load->view('journal_files/mail_authorSubmission_view_1',$data);
			   break;
		   case "8";
			   $this->load->view('journal_files/mail_authorSubmission_view_2',$data);
			   break;
	   }
    }*/
}
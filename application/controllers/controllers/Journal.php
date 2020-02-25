<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal extends CI_Controller {

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
          $this->load->model('journal_model_2');
		  //$this->load->library('encrypt');
          //$this->load->model('pp_model');
		 
		  /*if($this->session->userdata('user_id')){     
		 	}else{
    		 	redirect(base_url().'login', 'refresh');
		 	}*/
		  if($this->session->userdata('weblang')==''){
			 $this->session->set_userdata('weblang', 'en');
		  }
		 
    }
	//--------------------
	public function index()
	{
		$this->load->view('journal_files/index');
                $this->load->view('journal_files/login_script');
	}	
	//-------------------	
	public function register($page=null){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
             $perpage = 5;
             if ($page == ''){
				 
				   $auto = $this->journal_model_2->get_current();	
				 
                   $page = 1;
               }else{
                   $page = $page;
               }
               $start = ($page - 1) * $perpage;
               $data['page'] = $page;
               $data['perpage'] = $perpage;
               $data['getarchive'] = $this->journal_model_2->get_archive($perpage,$start);
		$this->load->view('journal_files/register',$data);
		$this->load->view('journal_files/login_script');
                
	}
	//-------------------	
	public function current($page=null){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
            $perpage = 5;
             if ($page == ''){
				 
				   $auto = $this->journal_model_2->get_current();	
				 
                   $page = 1;
               }else{
                   $page = $page;
               }
               $start = ($page - 1) * $perpage;
               $data['page'] = $page;
               $data['perpage'] = $perpage;
               $data['getarchive'] = $this->journal_model_2->get_archive($perpage,$start);
		$this->load->view('journal_files/current',$data);
                $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function archive($page=null){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
            $perpage = 5;
             if ($page == ''){
				 
				   $auto = $this->journal_model_2->get_current();	
				 
                   $page = 1;
               }else{
                   $page = $page;
               }
               $start = ($page - 1) * $perpage;
               $data['page'] = $page;
               $data['perpage'] = $perpage;
               $data['getarchive'] = $this->journal_model_2->get_archive($perpage,$start);
		$this->load->view('journal_files/archive',$data);
                $this->load->view('journal_files/login_script');
	}
	//-------------------
	public function archive_detail($dataID=null,$page=null){ 
               $perpage = 5;
             if ($page == ''){
				 
				   $auto = $this->journal_model_2->get_current();	
				 
                   $page = 1;
               }else{
                   $page = $page;
               }
               $start = ($page - 1) * $perpage;
               $data['page'] = $page;
               $data['perpage'] = $perpage;
               $data['getarchive'] = $this->journal_model_2->get_archive($perpage,$start);
		
        $data['aechive_datail'] = $this->journal_model_2->get_archivedetail($dataID);
		$this->load->view('journal_files/archive_detail',$data);
                $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function about(){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
       
		$this->load->view('journal_files/about');
                $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function instruction(){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('journal_files/instruction');
                $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function editor(){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('journal_files/editor');
                $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function contact(){ 
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('journal_files/contact');
                $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function AuthorRegister(){
		
		if($_POST['g-recaptcha-response'] !=''){
		
			$private_key = '6LdtZIYUAAAAACod_66pahyDuRQsUPzTCP9VjPHV';
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$response_key = $_POST['g-recaptcha-response'];
			$response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
			$response = json_decode($response);
			
			if($response->success ==1){			
				
				$salutation = $this->input->post('salutation');
				$first_name = $this->input->post('first_name');
				$middle_name = $this->input->post('middle_name');
				$password = $this->input->post('password');
				$email = $this->input->post('email');
				$affliation = $this->input->post('affliation');
				$country = $this->input->post('country');
				$last_name = $this->input->post('last_name');
				$check_request = $this->input->post('check_request');
				
				//$form_data = $this->input->post('form_data');		
				//$params = array();
				//parse_str($form_data, $params);
				  //print_r($params);
				$Result = $this->journal_model->author_register($salutation, $first_name, $middle_name, $password, $email, $affliation, $country, $last_name, $check_request);
				//echo $Result;				
				
		if($Result > 0){  
			
		$name = $salutation.' '.$first_name.' '.$last_name;	

		$from_email = 'jemes.envi@gmail.com';
		$to_email = $email;
		$subject = "Journal of Environmental Management and Energy System - Account Created";
			
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title></title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Journal of Environmental Management and Energy System - Account Created</td>
    </tr>
    <tr>
      <td height="200" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td colspan="3"><br>Welcome to the Journal of Environmental Management and Energy System - Manuscripts site for online manuscript submission and review.<br><br>Your email '.$email.' for your account is as follows:<br><br>SITE URL: '.base_url().'Journal/Submission<br>EMAIL : '.$email.'<br>PASSWORD : '.$password.'<br><br>Thank you for your participation.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>            
			</tbody>
        </table>
        <p>&nbsp;</p>
		       	
		  <a href="'.base_url().'Journal/Submission" target="_blank" style="text-align: center;"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer; text-align: center;">More Details</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td height="60" bgcolor="#EFEFEF" align="center" valign="bottom"><img src="'.base_url().'journal-html/images/social.jpg" width="237" height="49" alt=""/></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';	 
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 

        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
				if($this->email->send()){ ?>

					<script>alert('Thank you, Register Successful.'); window.location.href = "<?php echo base_url('Journal/myData')?>";</script>
<?php  
				}else{ 
				   //$result = 0;
				   echo "error";	
				}			
		//echo $result;
		}	}
	}	  }
	//-------------------	
	public function countEmail(){
		$mail = $this->input->post('mail');				
		$result = $this->journal_model->count_email($mail);
		echo $result;	
	}
	//-------------------	
	public function countUsername(){
		$username = $this->input->post('username');				
		$result = $this->journal_model->count_username($username);
		echo $result;	
	}
	//-------------------	
	public function myData(){
		
		$this->load->view('journal_files/submission');	
	}
	//-------------------	
	public function Submission(){
		
		$this->load->view('journal_files/submission');
        $this->load->view('journal_files/login_script');
	}
	//-------------------	
	public function Paper_Detail($paper_no=NULL){
		$data['paper_no'] = $paper_no;
		$this->load->view('journal_files/review_submission' , $data);	
	}
	//-------------------	
	public function AuthorLogin(){
		$username = $this->input->post('username');				
		$password = $this->input->post('password');				
		$result = $this->journal_model->author_login($username,$password);
		echo $result;	
	}
	//-------------------	
	public function get_listPaper(){
		$author_id = $this->input->post('author_id');						
		$paper = $this->journal_model->listPaper($author_id);  
		$countRows = $paper->num_rows();
		
		if($countRows >0){
?>
		
		<table class="table table-bordered">
		<thead>
			<tr>
				<th style="font-weight: bold">Date</th>
				<th style="font-weight: bold">No.</th>
				<th style="font-weight: bold">Title</th>
				<th style="font-weight: bold">Status</th>
				<th style="font-weight: bold">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $txt =''; foreach($paper->result() as $paper2){			
				  $round = $this->journal_model->get_roundNumber($paper2->id);				
				  $status = $this->journal_model->get_comment($paper2->paper_no, $paper2->editor_id, $paper2->id, $round);
				  $commentNum = $status->num_rows(); 
				  if($commentNum >0){
				  	foreach($status->result() as $status2){	
						if($status2->send_mail == '1'){
					  	   $txt = $status2->result_status;					  
				  		
						} else { $txt = '0'; } 
					}	
					  
				  } else {
					  $txt = '0';
				  }
				 /* $status = $this->journal_model->get_paperFile($paper2->id,$round);	
				  foreach($status->result() as $status2){					  
					  $txt = $status2->editor_result;					  
				  }		
				  if($txt == '0'){
					  	$c = 'y';
					  	$round = $this->journal_model->get_roundNumber($paper2->id,$c);	
				  		$status = $this->journal_model->get_paperFile($paper2->id,$round);	
				  		foreach($status->result() as $status2){					  
					  		$txt = $status2->editor_result;					  
				  		}
				  }	*/			
			?>
			<!--<button type="button" class="btn btn-warning" style="color: #FFFFFF">Revision</button>
			
			<button type="button" class="btn btn-success" style="color: #FFFFFF">Accept</button>-->
			
			<tr class="tr-bg">
				<td><?php echo $this->journal_model->GetShortEngDate($paper2->date_add);?></td>
				<td><?php echo $paper2->paper_no; if($round > 0){ echo '.R'.$round; }?></td>
				<td style="text-align: left">&nbsp;&nbsp;<?php echo $paper2->title?></td>
				<td>
				<?php if($txt =='2'){ ?>
					<button type="button" class="btn btn-warning" style="color: #FFFFFF">Minor Revision</button>	
					
				<?php } else if($txt =='3'){ ?>				
					<button type="button" class="btn btn-warning" style="color: #FFFFFF">Major Revision</button>
					
				<?php } else if($txt =='4'){ ?>				
					<button type="button" class="btn btn-danger" style="color: #FFFFFF">Rejected</button>
					
				<?php } else if($txt =='1'){ ?>			
					<button type="button" class="btn btn-success" style="color: #FFFFFF">Accepted</button>
					
				<?php } else if(($txt =='0') && ($paper2->status_process =='1') && ($paper2->editor_id == 0)){ ?>
					<button type="button" class="btn btn-primary" style="color: #FFFFFF">Submitted</button>
					
				<?php } else if(($txt =='0') && ($paper2->editor_id != 0) && ($paper2->status_process =='1')){ ?>
					<button type="button" class="btn btn-primary" style="color: #FFFFFF">in process</button>
					
				<?php } else if(($txt =='0') && ($paper2->status_process =='3') && ($paper2->editor_id == 0)){ ?>
					<button type="button" class="btn btn-danger" style="color: #FFFFFF">Rejected</button>
				<?php } ?>
					
				</td>
				<td style="text-align: center"><a href="<?php echo base_url('Journal/Paper_Detail/').$paper2->paper_no?>"><button type="button" class="btn btn-secondary"><i class="fa fa-search-plus"></i> Details</button></a></td>
			</tr>						  
			<?php $txt =''; } ?>			  
		</tbody>
		</table>
		
<?php	}	}
	//-------------------	
	public function submissionPaper(){
		//$author_id = $this->input->post('author_id');	
		$author_id = $this->session->userdata('jlogin');
		$title = $this->input->post('title');		
		$remarks = $this->input->post('remarks');		
		$section = $this->input->post('section');		
		$abstract = $this->input->post('abstract');	
		
		//$file1 = $this->input->post('file1');		
		//$file2 = $this->input->post('file2');		
		//$form_data = $this->input->post('form_data');		
		//$params = array();
		//parse_str($form_data, $params);
		  //print_r($params);
		$paperID = $this->journal_model->insertPaper($author_id, $title, $remarks, $section, $abstract);		
		//$paperID = $this->journal_model->insertPaper($author_id, $form_data);		
		
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		//$config['allowed_types'] = 'pdf|doc|docx|PDF|DOC|DOCX';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX';
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
		$imgNameUpdate2 = '';
		$imgNameUpdate3 = '';
		
//////////////////////////		
		
		//if (isset($_FILES['file_name2']['name'])) {
		if($_FILES['file1']['name'] !=''){
           
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('file1')){
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    //$config['width'] = 1024;
                    //$config['height'] = 1024;
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 
				  					  
					  
						//$this->load->helper("file");
						
					   // @unlink($old_file);				
						//$filed='file_name';
						
						$imgNameUpdate2 = $upload_pathName.$this->upload->data('file_name');
						
					//}
				}
				//----------------
		}
		
		if($_FILES['file2']['name'] !=''){
           
				$this->load->library('upload', $config);
				if(!$this->upload->do_upload('file2')){
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    //$config['width'] = 1024;
                    //$config['height'] = 1024;
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 
				  					  
					  
						//$this->load->helper("file");
						
					   // @unlink($old_file);				
						//$filed='file_name';
						
						$imgNameUpdate3 = $upload_pathName.$this->upload->data('file_name');
						
					//}
				}				
		}
		
		if(($imgNameUpdate2 !='') && ($imgNameUpdate3 !='')){
			
			$x = '0';
			$up_file1 = $this->journal_model->updateFile($paperID ,$imgNameUpdate2 ,$imgNameUpdate3 ,$remarks ,$x);
			
			if($up_file1 >0){ 
				//$Result = 2;
				$Result = $paperID;
			}else{ 
				$Result = 0;
			}			
		}
	/////////////////////////////	
		$countFiles = count($_FILES['Other_file']['name']); 		
		if($countFiles >0){ 
			 
			$this->load->library('upload', $config);
			 
			for($i=0; $i<$countFiles; $i++){           
				//---------------------------
				$_FILES['file_upload2']['name'] = $_FILES['Other_file']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['Other_file']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['Other_file']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['Other_file']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['Other_file']['size'][$i];
				
                $this->upload->initialize($config);
                if($this->upload->do_upload('file_upload2')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					$Result3 = $this->journal_model->add_otherFiles($up_file1,$uploadData[$i]['file_name']);
                }				
			}			
		}		
		echo $Result;	
	}
	//-------------------
	public function logout(){
		
		$this->session->unset_userdata(array("jlogin"=>""));
		$this->session->sess_destroy();
		redirect(base_url('Journal'));
	}
	//-------------------
	public function submissionEdit(){
		
		$author_id = $this->session->userdata('jlogin');				
		$remarks = $this->input->post('remarks');		
		$paperID = $this->input->post('paper_id');		
		$round = $this->input->post('round');	
		$editor_id = $this->input->post('editor_id');	
		//$round = $round;	
		
		//$file1 = $this->input->post('file1');		
		//$file2 = $this->input->post('file2');		
		//$form_data = $this->input->post('form_data');		
		//$params = array();
		//parse_str($form_data, $params);
		  //print_r($params);
		//$paperID = $this->journal_model->insertPaper($author_id, $title, $remarks, $section, $abstract);		
		//$paperID = $this->journal_model->insertPaper($author_id, $form_data);		
		
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'pdf|doc|docx|PDF|DOC|DOCX';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		//$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		$Result = 0;
		$imgNameUpdate2 = '';
		$imgNameUpdate3 = '';
		
		//if (isset($_FILES['file_name2']['name'])) {
		if($_FILES['file1']['name'] !=''){
           
				 $this->load->library('upload', $config);
				  if(!$this->upload->do_upload('file1')){
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    //$config['width'] = 1024;
                    //$config['height'] = 1024;
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 
				  					  
					  
						//$this->load->helper("file");
						
					   // @unlink($old_file);				
						//$filed='file_name';
						
						$imgNameUpdate2 = $upload_pathName.$this->upload->data('file_name');
						
					//}
				}
				//----------------
		}
		
		if($_FILES['file2']['name'] !=''){
           
				 $this->load->library('upload', $config);
				  if(!$this->upload->do_upload('file2')){
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    //$config['width'] = 1024;
                    //$config['height'] = 1024;
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 
				  					  
					  
						//$this->load->helper("file");
						
					   // @unlink($old_file);				
						//$filed='file_name';
						
						$imgNameUpdate3 = $upload_pathName.$this->upload->data('file_name');
						
					//}
				}
				//----------------
		}
		
		if(($imgNameUpdate2 !='') && ($imgNameUpdate3 !='')){
			
			$up_file1 = $this->journal_model->updateFile($paperID ,$imgNameUpdate2 ,$imgNameUpdate3 ,$remarks ,$round ,$editor_id);
			
			if($up_file1 >0){ 
				$Result = 2;
			}else{ 
				$Result = 0;
			}			
		}		
		echo $Result;
	}
    //-------------------	
	public function author_update(){
		//$author_id = $this->input->post('author_id');	
		$author_id = $this->session->userdata('jlogin');
		$email = $this->input->post('email');		
		$password = $this->input->post('password');		
		$passwordA = $this->input->post('passwordA');		
		$salutation = $this->input->post('salutation');		
		$first_name = $this->input->post('first_name');	
		$middle_name = $this->input->post('middle_name');	
		$last_name = $this->input->post('last_name');	
		$affliation = $this->input->post('affliation');	
		$country = $this->input->post('country');
                 
		if($password==''){
            $password=$passwordA;
        }else{
            $password=md5($password);
        }
        $result_id = $this->journal_model_2->author_update($email, $password, $salutation,$first_name, $middle_name, $last_name, $affliation, $country, $author_id);
        echo $result_id;
     }
	//--------------------------------------
	public function checkemail(){
		$changeValue = $this->input->post('email');
		$result = $this->journal_model->count_email($changeValue);
		echo $result;
		
	} 
	//--------------------------------------
	public function paper_payment(){
		$author_id = $this->input->post('author_id');	
		$x ='';
		$paper = $this->journal_model->list_paperAccepted($x,'1',$author_id);  
		$countRows = $paper->num_rows();
		
		if($countRows >0){  ?>
		
		<table class="table table-bordered">
		<thead>
			<tr>				
				<th style="font-weight: bold">No.</th>
				<th style="font-weight: bold">Title</th>
				<th style="font-weight: bold">Date Payment</th>
				<th style="font-weight: bold">Status</th>
				<th style="font-weight: bold">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $txt ='';$txtdate ='';$txttime =''; foreach($paper->result() as $paper2){			
				  $round = $this->journal_model->get_roundNumber($paper2->id);				
				  $status = $this->journal_model->get_comment($paper2->paper_no, $paper2->editor_id, $paper2->id, $round);
				  $commentNum = $status->num_rows(); 
				  if($commentNum >0){
				  	foreach($status->result() as $status2){	
						if($status2->send_mail == '1'){
					  	   $txt = $status2->result_status;					  
				  		
						} else { $txt = '0'; } 
					}					  
				  } else {
					  $txt = '0';
				  }
                      $paymentData = $this->journal_model_2->list_paymentData($paper2->paper_no); 
                      $paperNum = $paymentData->num_rows();
                      if($paperNum >0){
                          foreach($paymentData->result() as $paymentData2){}
                          $txtdate = $this->journal_model->GetShortEngDate($paymentData2->Date);
                          $txttime = $paymentData2->Time;
                      }
				 /* $status = $this->journal_model->get_paperFile($paper2->id,$round);	
				  foreach($status->result() as $status2){					  
					  $txt = $status2->editor_result;					  
				  }		
				  if($txt == '0'){
					  	$c = 'y';
					  	$round = $this->journal_model->get_roundNumber($paper2->id,$c);	
				  		$status = $this->journal_model->get_paperFile($paper2->id,$round);	
				  		foreach($status->result() as $status2){					  
					  		$txt = $status2->editor_result;					  
				  		}
				  }	*/			
			?>			
			<tr class="tr-bg">				
				<td><?php echo $paper2->paper_no; if($round > 0){ echo '.R'.$round; }?></td>
				<td style="text-align: left">&nbsp;&nbsp;<?php echo $paper2->title?></td>
                <td><?php if($paperNum >0){echo $txtdate.'<br>'.$txttime;}?></td>
				<td>
				<?php if($paperNum ==0){ ?>
					<button type="button" class="btn btn-warning" style="color: #FFFFFF">Waiting</button>	
				<?php } else { ?>			
					<button type="button" class="btn btn-success" style="color: #FFFFFF">Paid</button>	
				<?php } ?>			
				</td>
                <td style="text-align: center"><a href="<?php echo base_url('Journal/payment_noti/').$paper2->paper_no?>"><button type="button" class="btn btn-secondary"><i class="fa fa-search"></i> <?php if($paperNum ==0){ echo 'upload file';}else{echo 'Detail';}?></button></a></td>
			</tr>						  
			<?php $txt =''; } ?>			  
		</tbody>
		</table>
		
<?php  }  }
	
	//--------------------------------
    public function payment_noti($paper_no=null){
        $author ='';
    	$data['payment'] = $this->journal_model->listPaper($author,$paper_no);
        $this->load->view('journal_files/payment_notification',$data);
    }
    //---------------------------
    public function addPayment_no() {
        $payment_no = $this->input->post('payment_no');
        $payment_id = $this->input->post('payment_id');
        $Amount = $this->input->post('Amount');
        $Date = $this->input->post('Date');
        $Time = $this->input->post('Time');
        $Note = $this->input->post('Note');
        $img = $this->input->post('img_old');
        $currentID = $this->input->post('currentID');
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
            $result_id = $this->journal_model_2->addPayment_no($payment_no, $payment_id, $Amount,$Date,$Time,$Note,$img,$currentID);
        
        echo $result_id;       
          }
	//---------------------------	
	public function searchdata(){
		
        $searchtext = $this->input->post('searchtext');
        $result_id = $this->journal_model_2->search($searchtext);?>

		<h4 class="pull-left" >Showing <span id="result"><?php echo $result_id->num_rows();?></span> results</h4><br>

        <?php foreach ($result_id->result() as $result_id2) { ?> 
			<div class="post">
                <div class="post-image clearfix"><img alt="" width="550" height="714" src="<?php echo base_url().'uploadfile/'.$result_id2->img ?>" class="img-responsive"></div>
                <div class="post-date"><?php echo $this->journal_model_2->getDay($result_id2->published_date);?><span><?php echo $this->journal_model_2->getmonth($result_id2->published_date);?></span></div>
                <div class="post-details">
                    <div class="post-title"><h4 class="title" style="font-size: 14pt;"><a href="#"><?php echo $result_id2->journal_name?></a></h4></div>
                    <div class="post-content"><p><?php echo $result_id2->issue?></p>
                    </div>
                    <a href="<?php echo base_url('Journal/archive_detail/').$result_id2->id?>" class="button small border animated right-icn"><span>Read More<i aria-hidden="true" class="fa fa-long-arrow-right"></i></span></a>
                    <hr>
                </div>                
			</div> 
<?php 	}	 } 
	
	//---------------------------
	public function check_Email(){ 		
		
		$mail = $this->input->post('email');		
		$table = $this->input->post('table');		
		$result = $this->journal_model->do_checkEmail($mail,$table);
		echo $result;
			
	}
    //------------------------
    public function reset_password(){ 
        $txt = $this->uri->segment(3);
		$data['txt'] = $txt;
        $this->load->view('journal_files/resetPassword',$data);
    }
    //---------------------------
    public function save_newPass(){ 		
		
		$password = $this->input->post('Password');		
		$dataID = $this->input->post('myId');		
		$result = $this->journal_model_2->update_newPass($password,$dataID);
		echo $result;			
	}	
    //---------------------------
    public function save_newPass2(){ 		
		
		$password = $this->input->post('Password');		
		$dataID = $this->input->post('myId');		
		$result = $this->journal_model_2->update_newPass2($password,$dataID);
		echo $result;			
	}
    //--------------
    public function author_printMail($authorID){
        $data['authorData'] = $this->journal_model->get_author2($authorID);
        $this->load->view('journal_files/mail_authorregister',$data);
    }
	//---------------------
    public function printMail($paper_no=NULL, $typeMail=NULL, $dataID=NULL, $key=NULL){
	   //$this->load->library('encrypt');		 
	   $data['print'] = 'yes'; 
	   $data['paper_no'] = $paper_no;		
	   $data['password_temp'] = $key;		
	   $data['dataID'] = $dataID;
	   $data['reviewer_id'] = $dataID;
	   $emaildetail = $this->journal_model->listemaildetail2($dataID,$paper_no,$typeMail);
	   foreach($emaildetail->result() as $emaildetail2){}
	   $data['date2'] = $emaildetail2->date_sent;
	   $data['email_id'] = $emaildetail2->id;		
	
	   switch($typeMail){
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
}
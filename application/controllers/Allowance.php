<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowance extends CI_Controller {

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

	//--------------------
	public function __construct() 
	{
		parent::__construct();

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Login_database_allowance');
		$this->load->model('Allowance_model');
		$this->load->model('Allowance_model_2');
		$this->load->model('Inputform_model');
		$this->load->model('Saraban_model');
	}
	//--------------------login----------------------//
	public function login_user(){
		$this->load->view('allowance_files/login_user');				
	}
	//--------------------
	public function login_approve(){
		$this->load->view('allowance_files/login_approve');				
	}
	//--------------------	
	public function login_admin(){
		$this->load->view('allowance_files/login_admin');				
	}
	//--------------------
	public function register(){
		$this->load->view('allowance_files/register_user');				
	}
	//--------------------
	public function forgotpassword(){
		$this->load->view('allowance_files/forgot-password.php');				
	}
	//--------------------
	// Check for user login process
	public function user_login_process(){

		# Response Data Array
		$resp = array();

		// Fields Submitted
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// Fields Submitted
		$data = array(
					'username' => $username, 
					'password' => md5($password)
				);

		// This array of data is returned for demo purpose, see assets_saraban/js/neon-forgotpassword.js
		$resp['submitted_data'] = $data;

		// Login success or invalid login data [success|invalid]
		// Your code will decide if username and password are correct

		$login_status = 'invalid'; 

		$result = $this->Login_database_allowance->user_login($data);

		if ($result != false) {

			$data = array(
					'last_login' => date("Y-m-d H:i:sa")
				);

			$log = $this->Login_database_allowance->log_last_login_user($data,$username);

			if($log != false){

				$login_status = 'success';
			}
		} 

		$resp['login_status'] = $login_status;

		// Login Success URL
		if($login_status == 'success')
		{
			// If you validate the user you may set the user cookies/sessions here
			$resultuser = $this->Login_database_allowance->read_user_information($username);

			if ($resultuser != false) {
				
				if($resultuser[0]->approve=='1'){
					$statusApprove ='Yes';
				}else if($resultuser[0]->approve=='0'){
					$statusApprove ='No';
				}
				$session_data = array(
					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'user_type'   	=> $resultuser[0]->user_type,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "user",
					'statusApprove' => $statusApprove
				);

				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);

			}
			
			// Set the redirect url after successful login
			$resp['redirect_url'] = 'index'; 
		}

		echo json_encode($resp);			
	}
	//--------------------
	// Check for approve login process
	public function approve_login_process(){

		# Response Data Array
		$resp = array();

		// Fields Submitted
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// Fields Submitted
		$data = array(
					'username' => $username, 
					'password' => md5($password)
				);

		// This array of data is returned for demo purpose, see assets_saraban/js/neon-forgotpassword.js
		$resp['submitted_data'] = $data;

		// Login success or invalid login data [success|invalid]
		// Your code will decide if username and password are correct

		$login_status = 'invalid'; 

		$result = $this->Login_database_allowance->approve_login($data);

		if ($result != false) {
                             
			$data = array(
					'last_login' => date("Y-m-d H:i:sa")
				);

			$log = $this->Login_database_allowance->log_last_login_user($data,$username);

			if($log != false){

				$login_status = 'success';
			}

		} 

		$resp['login_status'] = $login_status;


		// Login Success URL
		if($login_status == 'success')
		{
			// If you validate the user you may set the user cookies/sessions here
			$resultuser = $this->Login_database_allowance->read_user_information($username);

			if ($resultuser != false) {
                               if($resultuser[0]->approve=='1'){
					$statusApprove ='Yes';
				}else if($resultuser[0]->approve=='0'){
					$statusApprove ='No';
				}
				$session_data = array(
					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'user_type'   	=> $resultuser[0]->user_type,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "approve",
                    'statusApprove' => $statusApprove
				);

				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);

			}
			
					// Set the redirect url after successful login
					$resp['redirect_url'] = 'index_approve';
		}

		echo json_encode($resp);			
	}
	//--------------------
	// Check for Admin login process
	public function admin_login_process(){

		# Response Data Array
		$resp = array();

		// Fields Submitted
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		// Fields Submitted
		$data = array(
					'username' => $username,
					'password' => md5($password)
				);

		// This array of data is returned for demo purpose, see assets_saraban/js/neon-forgotpassword.js
		$resp['submitted_data'] = $data;

		// Login success or invalid login data [success|invalid]
		// Your code will decide if username and password are correct

		$login_status = 'invalid';

		$result = $this->Login_database_allowance->admin_login($data);
 
		if ($result != false) {

			$data = array(
					'last_login' => date("Y-m-d H:i:sa")
				);
			
			$log = $this->Login_database_allowance->log_last_login_admin($data,$username);

			if($log != false){

				$login_status = 'success';
			}

				} 

		$resp['login_status'] = $login_status;


		// Login Success URL
		if($login_status == 'success')
		{
			// If you validate the user you may set the user cookies/sessions here
			$resultuser = $this->Login_database_allowance->read_admin_information($username);

			if ($resultuser != false) {

				
				if($resultuser[0]->approve == '0'){
					$session_data = array(

					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "admin",
					'statusApprove' => "No"

				);

				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);


					// Set the redirect url after successful login
					$resp['redirect_url'] = 'index_admin'; 

				}/*else if($resultuser[0]->approve == '1'){
					$session_data = array(

					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "approve"

				);

				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);


					// Set the redirect url after successful login
					$resp['redirect_url'] = 'index_approve';

				}	*/

			}
			
			
		}

		echo json_encode($resp);			
	}
	//--------------------
	// Validate and store registration data in database
	public function new_user_registration(){

			# Response Data Array
			$resp = array();

			// Fields Submitted		
			$tname 		= $this->input->post("tname");			
			$fname 		= $this->input->post("fname");
			$lname 		= $this->input->post("lname");
			$phone 		= $this->input->post("phone");
			$username 	= $this->input->post("username");
			$email 		= $this->input->post("email");
			$password 	= $this->input->post("password");
			$position_level = $this->input->post("position_level");
			$position_name 	= $this->input->post("position_name");

		
			$data = array(
				'titlename' 	=> $tname,
				'firstname' 	=> $fname,
				'lastname' 		=> $lname,
				'telephone' 	=> $phone,
				'user_name' 	=> $username,
				'email' 		=> $email,
				'password' 		=> md5($password),
				'date_add'		=> date("Y-m-d H:i:sa"),
				'user_type'		=> "1",
				'position_level'=> $position_level,
				'position_name' => $position_name 
			);

			$register_status = 'invalid';
			$result = $this->Login_database_allowance->registration_insert($data);

			if ($result == TRUE) {
				$register_status = 'success';
			} 

			$resp['register_status'] = $register_status;

			if($register_status == 'success')
			{
				// Set the redirect url after successful register
				$resp['redirect_url'] = 'login_user';
			}

			echo json_encode($resp);	
	}
	//--------------------
	public function forgotpassword_User(){

		# Response Data Array
			$resp = array();

			$email 	= $this->input->post('email');

			// Load database
			$this->load->model('Login_database_saraban');

			$data1 = array();              
			$data1 = $this->Login_database_saraban->getdataemailUser($email);


			if ($data1 != false) {
							   	
					    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
					    $pass = array(); //remember to declare $pass as an array
					    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
					    for ($i = 0; $i < 8; $i++) {
					        $n = rand(0, $alphaLength);
					        $pass[] = $alphabet[$n];
					    }

				$data = array(
					"user_update"	=> "System",
					"password"		=> md5(implode($pass)),
					"chk_authen"	=> "System"
				);

				$table 		= "tbl_user_data";

				$this->load->model("Saraban_model"); 
				$result = $this->Saraban_model->edit_pass_mail($data,$email,$table);
				
				if($result != false){

				   	$from_email    = "puvaresjandoung@gmail.com"; 
				   	$subject	   = "รีเซ็ตรหัสผ่าน";
			        $to_email      = $email;
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน&nbsp; '.$data1[0]->titlename.' '.$data1[0]->firstname.' '.$data1[0]->lastname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="80%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td height="40" colspan="3" align="center" bgcolor="#E7E5E5"><strong>RESET PASSWORD</strong></td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Username :</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.$data1[0]->user_name.'</td>
            </tr>
            <tr>
              <td width="25%" height="40" align="right" bgcolor="#F7F7F7"><strong>New Password :</strong></td>
              <td width="2%" height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td width="73%" height="40" bgcolor="#F7F7F7" style="font-size: 18pt; color:#549400">'.implode($pass).'</td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Link  Login:</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/login_user</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="108" align="left">&nbsp;</td>
      <td height="108" colspan="2" align="center" valign="top"><a href="http://www.fempsu.com.122.155.167.147.no-domain.name/allowance/Login_user" target="_blank" class="share">งานเบิกค่าเดินทาง</a> <a href="http://www.fempsu.com.122.155.167.147.no-domain.name/Saraban/login_user" target="_blank" class="book">งานสารบรรณ</a></td>
      <td height="108" align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="100" align="left" bgcolor="#f0f0f0">&nbsp;</td>
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบงานการเงิน'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 
			         //Send mail 

			         if($this->email->send()){ 
			            $resp['chksendmail'] = true;
			         }else{ 
			            $resp['chksendmail'] = false;
			          }
				
					$resp['email_status'] = true;
				}	

			}else{

				$resp['email_status'] = false;

			}

			//$resp['redirect_url'] = 'login_user';
			
			echo json_encode($resp);	
	}
	//--------------------
	// Logout from admin page
	public function logout(){
		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->load->view('allowance_files/login_user');
	}	
	//--------------------chang password--------------------//	
	public function change_password(){

		if(($this->session->userdata['logged_in']['status']) == "admin"){

			$this->load->view('templates/allowance/header1'); 
			$this->load->view('templates/allowance/menu_null_admin'); 
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/change_password/change_password');
			$this->load->view('allowance_files/change_password/change_password_js');

		}else if(($this->session->userdata['logged_in']['status']) == "user"){

			$this->load->view('templates/allowance/header1'); 
			$this->load->view('templates/allowance/menu_null_user'); 
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/change_password/change_password');
			$this->load->view('allowance_files/change_password/change_password_js');

		}else if(($this->session->userdata['logged_in']['status']) == "approve"){

			$this->load->view('templates/allowance/header1'); 
			$this->load->view('templates/allowance/menu_edit_approve'); 
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/change_password/change_password');
			$this->load->view('allowance_files/change_password/change_password_js');	
		}
	}
	//-----------------personal Information---------------//
	public function personal_Information(){

		if(($this->session->userdata['logged_in']['status']) == "admin"){

			$this->load->model("Login_database_allowance");
			$id = $this->session->userdata['logged_in']['id'];
			$data = array();
			$data['getdata'] = $this->Login_database_allowance->read_admin_information_id($id);

            $datastatus = '1';
            $data['careerData'] = $this->Saraban_model->careerDATA($datastatus);
            $data['posData'] = $this->Saraban_model->posData($datastatus);
			$this->load->view('templates/allowance/header1'); 
			$this->load->view('templates/allowance/menu_null_admin');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/personal_Information/edit_infor_admin',$data);
			$this->load->view('allowance_files/personal_Information/edit_infor_admin_js');

		}else if(($this->session->userdata['logged_in']['status']) == "user"){

			$id = $this->session->userdata['logged_in']['id'];
			$data = array();
			$this->load->model("Login_database_allowance");
			$datatt['getdata'] = $this->Login_database_allowance->read_user_information_id($id);
            $datastatus = '1';
            $datatt['careerData'] = $this->Saraban_model->careerDATA($datastatus);
            $datatt['workgroupDATA'] = $this->Saraban_model->workgroupDATA($datastatus);
			$datatt['posData'] = $this->Saraban_model->posData($datastatus);
			$this->load->view('templates/allowance/header1'); 
			//$this->load->view('templates/allowance/menu_null_user'); 
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/personal_Information/edit_infor',$datatt);
			$this->load->view('allowance_files/personal_Information/edit_infor_js');

		}else if(($this->session->userdata['logged_in']['status']) == "approve"){

			$id = $this->session->userdata['logged_in']['id'];
			$data = array();
			$this->load->model("Login_database_allowance");
			$datatt['getdata'] = $this->Login_database_allowance->read_user_information_id($id);

			$this->load->view('templates/allowance/header1'); 
			$this->load->view('templates/allowance/menu_edit_approve'); 
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/personal_Information/edit_infor',$datatt);
			$this->load->view('allowance_files/personal_Information/edit_infor_js');
		}
	}
	//--------------------
	public function edit_personal_Information(){

		if(($this->session->userdata['logged_in']['status']) == "admin"){

			$data = array(
				"user_update"	=> $this->input->post('id'),
				"chk_authen"	=> $this->input->post('chk_authen'),
				"user_name"		=> $this->input->post('user_name'), 
				"email"			=> $this->input->post('email'),
                                "titlename"		=> $this->input->post('titlename'),
				"firstname"		=> $this->input->post('firstname'),
				"position_id"		=> $this->input->post('position'),
				"lastname"		=> $this->input->post('lastname')
			);

			$table = "tbl_admin_allowance";
			$id	= $this->input->post('id');

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->updateUser($data,$id,$table);
			echo json_encode($result); 
			exit;
			

		}else if(($this->session->userdata['logged_in']['status']) == "user"  || ($this->session->userdata['logged_in']['status']) == "approve"){
			
			$data = array(
				"user_update"	=> $this->input->post('id'),
				"chk_authen"	=> $this->input->post('chk_authen'),
				"user_name"		=> $this->input->post('user_name'),
				"email"			=> $this->input->post('email'),
				"titlename"		=> $this->input->post('titlename'),
				"firstname"		=> $this->input->post('firstname'),
				"lastname"		=> $this->input->post('lastname'),
				"telephone"		=> $this->input->post('telephone'),
				"position_level"=> $this->input->post('position_level'),
				"position_name"	=> $this->input->post('position_name')
			);

			 $table = "tbl_user_data";
			 $id	= $this->input->post('id');

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->updateUser($data,$id,$table);
			echo json_encode($result); 
			exit;			
		}
	}
	//--------------------
	public function chk_username(){

		if(($this->session->userdata['logged_in']['status']) == "admin"){

			
			$user_name	= $this->input->post('user_name');
			$id			= $this->input->post('id');
			$table 		= "tbl_admin_allowance";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;
			

		} else if(($this->session->userdata['logged_in']['status']) == "user" || ($this->session->userdata['logged_in']['status']) == "approve"){
			
			 $user_name	= $this->input->post('user_name');
			 $table 	= "tbl_user_data";
			 $id		= $this->input->post('id');

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;			
		}
	}
	//--------------------
	public function chk_email(){

		if(($this->session->userdata['logged_in']['status']) == "admin" ){

			
			$email	= $this->input->post('email');
			$id	    = $this->input->post('id');

			 $table = "tbl_admin_allowance";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_email($id,$email,$table);
			echo json_encode($result); 
			exit;			

		} else if(($this->session->userdata['logged_in']['status']) == "user" || ($this->session->userdata['logged_in']['status']) == "approve"){
			
			$email	= $this->input->post('email');
			$id	    = $this->input->post('id');

			$table = "tbl_user_data";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_email($id,$email,$table);
			echo json_encode($result); 
			exit;			
		}
	}
	//--------------------
	public function edit_pass(){
		if(($this->session->userdata['logged_in']['status']) == "admin" ){

			$data = array(
				"user_update"	=> $this->input->post('id'),
				"password"		=> md5($this->input->post('new_pass')),
				"chk_authen"	=> $this->input->post('chk_authen')
			);
			$table 		= "tbl_admin_allowance";
			$username 	=  $this->input->post('username');
			$oldpass 	=  md5($this->input->post('old_pass'));

			$this->load->model("Allowance_model"); 

			$resultoldpass = $this->Allowance_model->chk_old_pass($oldpass,$username,$table);

			if($resultoldpass == true){
				$result = $this->Allowance_model->edit_pass($data,$username,$table);
				echo json_encode($result); 
				exit;
			}else{
				echo json_encode("errorpass"); 
				exit;
			}

		} else if(($this->session->userdata['logged_in']['status']) == "user"  || ($this->session->userdata['logged_in']['status']) == "approve"){


			$data = array(
				"user_update"	=> $this->input->post('id'),
				"password"		=> md5($this->input->post('new_pass')),
				"chk_authen"	=> $this->input->post('chk_authen')
			);

			$table 		= "tbl_user_data";
			$username 	=  $this->input->post('username');
			$oldpass 	= md5($this->input->post('old_pass'));

			$this->load->model("Allowance_model"); 

			$resultoldpass = $this->Allowance_model->chk_old_pass($oldpass,$username,$table);

			if($resultoldpass == true){
				$result = $this->Allowance_model->edit_pass($data,$username,$table);
				echo json_encode($result); 
				exit;
			}else{
				echo json_encode("errorpass"); 
				exit;
			}

			
		}
	}

	//--------------------for index user--------------------//
	public function index(){		
             
	  if(isset($this->session->userdata['logged_in'])){
		$thisYear = date("Y");
                $date_start = $thisYear.'-12-20';
                $today = date('Y-m-d');
                if($today==$date_start){
                $this->Allowance_model->setquotaoct();
                }
		  	$user_create = $this->session->userdata['logged_in']['id'];
		  	$txt ='';
			$this->load->model("Allowance_model"); 
			$data = array();
			//$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			//$data['getdata'] = $this->Allowance_model->get_documentDataall($user_create,'1');
			$data['getdata'] = $this->Allowance_model->get_documentData($txt,$txt,$user_create,'yes');		  
			$data['getdataLocal'] = $this->Allowance_model->get_localData($txt,$txt,$user_create,'yes');  

			//$sql2 = "SELECT * from doc_1";
			//$data['getotherdoc'] = $this->Allowance_model->getdata($sql2);
			
			$this->load->view('templates/allowance/header_user');
			//$this->load->view('templates/allowance/menu_ilst_user');
		    $this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/allowance_user/user_document',$data); 
			$this->load->view('allowance_files/allowance_user/user_document_js');
		  
	  } else {
		  
	    	header("location:".base_url('allowance/login_user'));
	  }
		
		
		/*if(isset($this->session->userdata['logged_in'])){     //// original
	  
			$sql = "SELECT DISTINCT allowance.finishform,allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);

			$sql2 = "SELECT * from doc_1";
			$data['getotherdoc'] = $this->Allowance_model->getdata($sql2);
			
			$this->load->view('templates/allowance/header_user');
			//$this->load->view('templates/allowance/menu_ilst_user');
		    $this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/allowance_user/proceed_allowance',$data); 
			$this->load->view('allowance_files/allowance_user/proceed_allowance_js');			
		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}*/
	}
	//--------------------
	public function index1(){  //saraban_id  saraban_number date_create subject_document  date_submit  check_doc//

	  if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic,allowance.finishform FROM manage_allowance as allowance WHERE allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1'  AND allowance.text6 = 1 or  allowance.text6 = 2 or  allowance.text6 = 3 ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/allowance/header_user');
			$this->load->view('templates/allowance/menu_ilst_user');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/allowance_user/proceed1_allowance',$data); 
			$this->load->view('allowance_files/allowance_user/proceed1_allowance_js');			
		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//--------------------
	public function index2(){

	  if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' AND allowance.text6 = 0  ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/allowance/header_user');
			$this->load->view('templates/allowance/menu_ilst_user');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/allowance_user/proceed2_allowance',$data); 
			$this->load->view('allowance_files/allowance_user/proceed2_allowance_js');			
		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//--------------------
	public function create_allowance(){
		
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_create_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/detail_allowance'); 
		$this->load->view('allowance_files/allowance_user/detail_allowance_js');			
	}
	//--------------------
	/*public function create_outbound(){	//คนเดียว ไม่เบิก	***********  ############## *****
		
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '0';		
				
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		//if($chFor =='1'){
			$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		/*}
		if($chFor =='2'){		
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
		}*/		
/*		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}*/
	//--------------------
	public function create_outbound($for_type=NULL,$reason_request=NULL){ // คนเดียว เบิก		
		$data['documentData'] = $this->Allowance_model->get_documentData();
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '0';
		$data['url_preview'] = 'preview_outbound';
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();
		
			
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		//if($chFor =='1'){
			//$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
			$this->load->view('allowance_files/allowance_user/outbound_withdraw' , $data);
		/*}
		if($chFor =='2'){		
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
		}*/		
		//$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
		$this->load->view('allowance_files/allowance_user/outbound_withdraw_js',$data);			
	}	
	//--------------------
	public function outbound_withdraw($for_type=NULL,$reason_request=NULL){ // คนเดียว เบิก		
		$data['documentData'] = $this->Allowance_model->get_documentData();
		
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '1';
		$data['url_preview'] = 'preview_outboundWithdraw';
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		//if($chFor =='1'){
			//$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
			$this->load->view('allowance_files/allowance_user/outbound_withdraw' , $data);
		/*}
		if($chFor =='2'){		
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
		}*/		
		//$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
		$this->load->view('allowance_files/allowance_user/outbound_withdraw_js' , $data);			
	}
	//--------------------
	public function outboundGroup_withdraw($for_type=NULL,$reason_request=NULL){	// คณะ เบิก	
		
		$data['documentData'] = $this->Allowance_model->get_documentData();
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '1';		
		$data['url_preview'] = 'preview_outboundGroup';		
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();		
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		/*if($chFor =='1'){
			$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		}
		if($chFor =='2'){	*/	
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
			//$this->load->view('allowance_files/allowance_user/outbound_group-BK2' , $data);
		//}		
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js' , $data);			
	}
	//--------------------
	public function outboundGroup($for_type=NULL,$reason_request=NULL){  // คณะ ไม่เบิก		
		
		$data['documentData'] = $this->Allowance_model->get_documentData();
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '0';	
		$data['url_preview'] = 'outboundGroup_noWithdraw';
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		/*if($chFor =='1'){
			$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		}
		if($chFor =='2'){	*/	
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
		//}		
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js' , $data);			
	}
	//--------------------
	/*public function createAbroad(){
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/detail2_allowance'); 
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}*/
	//--------------------
	public function createAbroad(){
		$data['documentData'] = $this->Allowance_model->get_documentData();
        $data['in'] = '';
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/select_outbound',$data); 
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js',$data);			
	}
	//--------------------
	public function createcountry(){
		$data['documentData'] = $this->Allowance_model->get_documentData();
		$data['in'] = '1';
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/select_outbound',$data); 
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js',$data);			
	}
	//--------------------
	public function createAllowance(){
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/select_outbound'); 
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}
	//--------------------
	public function edit_allowance(){

		$id_allowance =  $this->input->get('id_allowance');

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update,mnall.budget_datail , mnall.topic ,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/edit_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/edit_allowance_js');			
	}

	public function edit1_allowance(){

		$id_allowance =  $this->input->get('id_allowance');

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update,mnall.budget_datail , mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/edit1_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/edit1_allowance_js');			
	}

	public function edit2_allowance(){

		$id_allowance =  $this->input->get('id_allowance');

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update,mnall.budget_datail , mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/edit2_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/edit2_allowance_js');			
	}

	public function getdatalist_saraban(){

		$this->load->model("Allowance_model");  
		$id_saraban = $this->input->post("id_saraban");

		// Fields Submitted
		$sql = "SELECT * FROM `manage_saraban` WHERE `id_saraban` = ".$id_saraban."  AND data_status = '1' ORDER by date_add DESC";
		$result = $this->Allowance_model->getdatalist_saraban($sql);
		echo json_encode($result); 
	}

	public function insert_allowance(){

		$chk_update	 =  $this->input->post('chk_update');
		$user_create =  $this->input->post('username');
		$id_allowance=  $this->input->post('id_allowance'); 

		$data = array(  
			//"id_saraban"   	=> $this->input->post('id_saraban'),
			"topic"			=> $this->input->post('topic'),
			"user_create" 	=> $this->input->post('username'),
			"text1"    		=> $this->input->post('to'), 
			"text2"    		=> $this->input->post('detail1'),
			"text3" 		=> $this->input->post('detail2'),
			"text4" 		=> $this->input->post('total'),
			"text5" 		=> $this->input->post('Reason'), 
			"text6" 		=> $this->input->post('budget'), 
			"budget_datail" => $this->input->post('budget_datail'), 
			"footer" 		=> $this->input->post('footer'), 
			"file_name1" 	=> $this->input->post('file1'),
			"file_name2" 	=> $this->input->post('file2'),
			"file_name3" 	=> $this->input->post('file3'),
			"file_name4" 	=> $this->input->post('file4'),
			"file_name5" 	=> $this->input->post('file5'),
			"file_Orig1" 	=> $this->input->post('Orig1'),
			"file_Orig2" 	=> $this->input->post('Orig2'),
			"file_Orig3" 	=> $this->input->post('Orig3'),
			"file_Orig4" 	=> $this->input->post('Orig4'),
			"file_Orig5" 	=> $this->input->post('Orig5'),
			"expenses1"   => $this->input->post('Expenses1'),
			"expenses2"   => $this->input->post('Expenses2'), 
			"expenses3"   => $this->input->post('Expenses3'),
			"expenses4"   => $this->input->post('Expenses4'),
			"date_expenses1" => $this->input->post('Expenses_date1'),
			"date_expenses2" => $this->input->post('Expenses_date2'),
			"date_expenses3" => $this->input->post('Expenses_date3'),
			//"date_expenses4" => $this->input->post('Expenses_date4'),
			"remark_Expenses4" => $this->input->post('remark_Expenses4'),
			"approve_status"=> null,
			"check_doc"		=> $this->input->post('check_doc'),
			"date_add"		=> $this->input->post('date'),
			"user_update"	=> $this->input->post('username'),
			"chk_authen"    => $this->input->post('chk_authen'),
			"ref_saraban"   => $this->input->post('ref_saraban'),
			
		);

		$this->load->model("Allowance_model");
		
		if($chk_update == 'false'){

			$result = $this->Allowance_model->insert_allowance($data);
 			
 			if($result == true){
			$chk_update1 = $this->Allowance_model->chk_update($user_create);

				if($chk_update1 != false){
						$data = [];
						$data['detail']['id_allowance'] = $chk_update1[0]['id_allowance'];
						$data['chk'] = true;
						echo json_encode($data); 
						exit;
				}
			}

		}else{

			$result = $this->Allowance_model->update_allowance($data,$id_allowance);
			$data = [];
			$data['detail']['id_allowance'] = $id_allowance;
			$data['chk'] = true;
			echo json_encode($data); 
			exit;

		}
	}

	public function insert2_allowance(){

		$chk_update	 =  $this->input->post('chk_update');
		$user_create =  $this->input->post('username');
		$id_allowance=  $this->input->post('id_allowance'); 

		$data = array(

			"topic"			=> $this->input->post('topic'),
			"user_create" 	=> $this->input->post('username'),
			"text1"    		=> $this->input->post('to'), 
			"text2"    		=> $this->input->post('detail1'),
			"text3" 		=> $this->input->post('detail2'),
			"text5" 		=> $this->input->post('Reason'), 
			"text6" 		=> $this->input->post('budget'),  
			"footer" 		=> $this->input->post('footer'), 
			"file_name1" 	=> $this->input->post('file1'),
			"file_name2" 	=> $this->input->post('file2'),
			"file_name3" 	=> $this->input->post('file3'),
			"file_name4" 	=> $this->input->post('file4'),
			"file_name5" 	=> $this->input->post('file5'),
			"file_Orig1" 	=> $this->input->post('Orig1'),
			"file_Orig2" 	=> $this->input->post('Orig2'),
			"file_Orig3" 	=> $this->input->post('Orig3'),
			"file_Orig4" 	=> $this->input->post('Orig4'),
			"file_Orig5" 	=> $this->input->post('Orig5'),
			"approve_status"=> null,
			"check_doc"		=> $this->input->post('check_doc'),
			"date_add"		=> $this->input->post('date'),
			"user_update"	=> $this->input->post('username'),
			"chk_authen"    => $this->input->post('chk_authen'),			
		);

		$this->load->model("Allowance_model");
		
		if($chk_update == 'false'){

			$result = $this->Allowance_model->insert_allowance($data);
 			
 			if($result == true){
			$chk_update1 = $this->Allowance_model->chk_update($user_create);

				if($chk_update1 != false){
						$data = [];
						$data['detail']['id_allowance'] = $chk_update1[0]['id_allowance'];
						$data['chk'] = true;
						echo json_encode($data); 
						exit;
				}
			}

		}else{

			$result = $this->Allowance_model->update_allowance($data,$id_allowance);
			$data = [];
			$data['detail']['id_allowance'] = $id_allowance;
			$data['chk'] = true;
			echo json_encode($data); 
			exit;
		}
	}
	
	public function update_allowance(){

		$id_allowance  		 = 	$this->input->post('id_allowance');
		$id_saraban    		 = 	$this->input->post('id_saraban');

		$data = array(  
			"id_saraban"   	 => $this->input->post('id_saraban'),
			"topic"			 => $this->input->post('topic'),
			"user_create" 	 => $this->input->post('username'),
			"text1"    		 => $this->input->post('to'), 
			"text2"    		 => $this->input->post('detail1'),
			"text3" 		 => $this->input->post('detail2'),
			"text4" 		 => $this->input->post('total'),
			"text5" 		 => $this->input->post('Reason'), 
			"text6" 		 => $this->input->post('budget'), 
			"budget_datail"  =>  $this->input->post('budget_datail'), 
			"footer" 		 => $this->input->post('footer'),
			"expenses1"      => $this->input->post('Expenses1'),
			"expenses2"      => $this->input->post('Expenses2'), 
			"expenses3"      => $this->input->post('Expenses3'),
			"expenses4"      => $this->input->post('Expenses4'),
			"date_expenses1" => $this->input->post('Expenses_date1'),
			"date_expenses2" => $this->input->post('Expenses_date2'),
			"date_expenses3" => $this->input->post('Expenses_date3'),
			"date_expenses4" => $this->input->post('Expenses_date4'),
			"remark_Expenses4" => $this->input->post('remark_Expenses4'),
			"approve_status" => null,
			"check_doc"		 => $this->input->post('check_doc'),
			"date_add"		 => $this->input->post('date'),
			"user_update"	 => $this->input->post('username'),
			"chk_authen"     => $this->input->post('chk_authen'),
			"ref_saraban"   => $this->input->post('ref_saraban'),
			
		);

		$data_saraban = array(
			"topic"			 => $this->input->post('topic')
		);

		  //  $this->load->model("Saraban_model"); 
		  //	$result_saraban = $this->Saraban_model->edit_saraban($data_saraban,$id_saraban);

		  //	if($result_saraban != false){

				$this->load->model("Allowance_model"); 
				$result = $this->Allowance_model->update_allowance($data,$id_allowance);
				echo json_encode($result); 
				exit;

			//}else{

				//echo json_encode($result_saraban); 
				//exit;

			//}	
	}


	public function Delete_allowance(){

		$id_allowance 	= $this->input->post('id_allowance');

		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->edit_allowance($id_allowance);
		echo json_encode($result); 
		exit;
	}
	public function Delete_allowance2(){

		$id_allowance 	= $this->input->post('id_allowance');

		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->edit_allowance2($id_allowance);
		echo json_encode($result); 
		exit;
	}

	public function view_allowance(){

		$id_allowance =  $this->input->get('id_allowance');
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		//$this->load->view('allowance_files/allowance_user/view_allowance',$data); 
		//$this->load->view('allowance_files/allowance_user/view_allowance_js');
		$this->load->view('saraban_files/allowance_admin/detail/detail3',$data); 
		$this->load->view('saraban_files/allowance_admin/detail/detail_js');
	}
	
	/*public function view_allowance(){   //original

		$id_allowance =  $this->input->get('id_allowance');
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
	/*			where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/view_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/view_allowance_js');
	}*/
	public function view1_allowance(){

		$id_allowance =  $this->input->get('id_allowance');
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/view1_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/view1_allowance_js');
	}
	public function view2_allowance(){

		$id_allowance =  $this->input->get('id_allowance');
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				/*INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban*/
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_null_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/view2_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/view2_allowance_js');
	}
	//--------------------for admin--------------------//
	/******************************Page************************************ */
	/**
	 * 
	 * 
	 * MENU 1
	 * 
	 * 
	 */
	//---------------------------------------------------
	public function index_admin(){ //pending
		
		$this->load->model("Allowance_model");   
		$data = array(); 		
		$thisYear = date("Y");
                $date_start = $thisYear.'-10-01';
                if(date('Y-m-d')==$date_start){
                $this->Allowance_model->setquotaoct();
                }
		$reasonAdmin = $this->Allowance_model->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
		foreach($reasonAdmin->result() as $reasonAdmin2){};
		
		$sql = "SELECT * FROM tbl_outbound_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND reason_request = '".$reasonAdmin2->reason_type."' AND withdraw = '1' AND check_doc = '1' AND approve_status = '1' AND check_doc2 = '2' ORDER BY date_submit DESC , id DESC";	
		
		$sql2 = "SELECT * FROM tbl_local_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND reason_request = '".$reasonAdmin2->reason_type."' AND withdraw = '1' AND check_doc = '2' ORDER BY date_submit DESC , id DESC";	
		             
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$data['getdataLocal'] = $this->Allowance_model->getdata($sql2);
		$data['columnStatus'] = 'No';
		$data['pageTopic'] = 'รายการคำขอรอดำเนินการตรวจเช็ค';

		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   

		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin_js');			
	}
	//---------------------------------------------------
	public function fail_admin(){
		
        $reasonAdmin = $this->Allowance_model->get_setadminDocument($this->session->userdata['logged_in']['id'], '2');
		foreach($reasonAdmin->result() as $reasonAdmin2){};

		$sql = "SELECT * FROM tbl_outbound_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND reason_request = '".$reasonAdmin2->reason_type."' AND withdraw = '1' AND check_doc2 = '0' AND check_doc = '1' AND approve_status = '1' ORDER BY date_submit DESC , id DESC";	
		
		$sql2 = "SELECT * FROM tbl_local_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND reason_request = '".$reasonAdmin2->reason_type."' AND withdraw = '1' AND check_doc = '0' ORDER BY date_submit DESC , id DESC";		
		
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$data['getdataLocal'] = $this->Allowance_model->getdata($sql2);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow(); 
		$data['columnStatus'] = 'Yes';
		$data['pageTopic'] = 'รายการเอกสารคำขอไม่ถูกต้อง';
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin_js');			
	}
	//---------------------------------------------------
	public function chkstatus_admin(){ 
		
		$this->load->model("Allowance_model");
		$data = array();		
		$reasonAdmin = $this->Allowance_model->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
		foreach($reasonAdmin->result() as $reasonAdmin2){};

		$sql = "SELECT * FROM tbl_outbound_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND reason_request = '".$reasonAdmin2->reason_type."' AND withdraw = '1' AND check_doc2 = '1' AND approve_id != '0' AND approve_id2 != '0' ORDER BY date_submit DESC , id DESC"; 
		
		$sql2 = "SELECT * FROM tbl_local_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND reason_request = '".$reasonAdmin2->reason_type."' AND withdraw = '1' AND approve_id != '0' ORDER BY date_submit DESC , id DESC";		
		              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$data['getdataLocal'] = $this->Allowance_model->getdata($sql2);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();
		$data['columnStatus'] = 'approve';
		$data['pageTopic'] = 'รายการสถานะการอนุมัติ';
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin_js');			
	}

	/*public function detail(){  ******************************  original
		$id_allow =  $this->uri->segment(3);
		$sql = "SELECT user.titlename ,mnall.id_allowance as id_allow,mnall.type_allow,mnall.footer, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic ,user.firstname ,user.lastname,user.email,mnall.ref_saraban
				FROM manage_allowance as mnall 
				INNER JOIN tbl_user_data as user on mnall.user_create = user.id
				where  mnall.id_allowance = '$id_allow' and mnall.data_status = '1' and mnall.text6 = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/detail/detail',$data); 
		$this->load->view('allowance_files/allowance_admin/detail/detail_js');
	}*/
	//---------------------------------------------------
	public function detail_notedit(){ 
		$data = array(); 
		$id_allow =  $this->uri->segment(3);
		$chkfail = $this->uri->segment(4);
		if($chkfail == "faildoc"){ 
			$sql = "SELECT mnall.id_allowance,mnall.type_allow,mnall.footer, mnall.command, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				where  mnall.id_allowance = '$id_allow' and mnall.data_status = '1' and mnall.text6 = '1'";
			$data['chkfail'] = "true";
		}else{
			$sql = "SELECT  user.titlename ,mnall.id_allowance,mnall.type_allow,mnall.footer, mnall.command, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic,user.position_level,user.position_name, user.firstname ,user.lastname,mnall.ref_saraban
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user on user.id = mnall.send_to
				where  mnall.id_allowance = '$id_allow' and mnall.data_status = '1' and mnall.text6 = '1'";
			$data['chkfail'] = "false";
		}
		$this->load->model("Allowance_model");
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/pending/pending_admin_js');
	}
	//---------------------------------------------------
	public function otherdoc(){ 
		
		$reasonAdmin = $this->Allowance_model->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
		foreach($reasonAdmin->result() as $reasonAdmin2){};

		$sql = "SELECT a.*,b.id AS dic1_id FROM tbl_outbound_document AS a LEFT JOIN tbl_doc_1 AS b ON a.id = b.doc_id WHERE a.saraban_number != '' AND a.date_submit != '0000-00-00' AND a.reason_request = '".$reasonAdmin2->reason_type."' AND a.id = b.doc_id AND a.finishform = '1' AND a.take_money = '0' AND b.type_travel = '2' AND a.check_4step IN ('0','2') ORDER BY a.date_submit DESC , a.id DESC"; 
		
		$sql2 = "SELECT a.*,b.id AS dic1_id FROM tbl_local_document AS a LEFT JOIN tbl_doc_1 AS b ON a.id = b.doc_id WHERE a.saraban_number != '' AND a.date_submit != '0000-00-00' AND a.reason_request = '".$reasonAdmin2->reason_type."' AND a.id = b.doc_id AND a.finishform = '1' AND a.take_money = '0' AND b.type_travel = '1' AND a.check_4step IN ('0','2') ORDER BY a.date_submit DESC , a.id DESC";	
		
		//$this->load->model("Allowance_model"); 
		//$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$data['getdataLocal'] = $this->Allowance_model->getdata($sql2);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc();
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/otherdoc/otherdoc',$data); 
		$this->load->view('allowance_files/allowance_admin/otherdoc/otherdoc_js');
	}
	//---------------------------------------------------
	public function add_approvers($dataID=NULL){		
		 
		$this->load->model("Allowance_model");
		$data = array();
		$data['dataApprove'] = '0';
		
		if($dataID != ''){  
			
			$data['dataApprove'] = $this->Allowance_model->get_userDetail($dataID);
			$sql = "SELECT * FROM tbl_user_data WHERE approve = '0' AND data_status = '1' OR id = '".$dataID."' ORDER BY firstname ASC";
			
		} else {
			
			$sql = "SELECT * FROM tbl_user_data WHERE approve = '0' AND data_status = '1' ORDER BY firstname ASC";
		}		
		$data['getdatauser'] = $this->Allowance_model->getdata($sql);		
		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_3_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_approvers/add_approvers',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_approvers/add_approvers_js'); 
	}

//	public function edit_approvers(){ 
//		$id_saraban =  $this->uri->segment(3);
//		$sql = "SELECT * FROM tbl_user_data where approve = '1' and data_status = '1'";
//		$this->load->model("Allowance_model");
//		$data = array();               
//		$data['getApprovers'] = $this->Allowance_model->getdata($sql);
//
//		$this->load->view('templates/allowance/header1'); 
//		$this->load->view('templates/allowance/menu_3_admin');
//		$this->load->view('templates/allowance/header2');
//		$this->load->view('allowance_files/allowance_admin/mn_approvers/edit_approvers',$data); 
//		$this->load->view('allowance_files/allowance_admin/mn_approvers/edit_approvers_js');
//	}
	//---------------------------------------------------
	public function all_approvers(){ 
		//$id_saraban =  $this->uri->segment(3);
		$sql = "SELECT * FROM tbl_user_data WHERE approve = '1' AND data_status = '1' ORDER BY firstname ASC ";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getApprovers'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header1'); 
		$this->load->view('templates/allowance/menu_3_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_approvers/edit_approvers',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_approvers/edit_approvers_js');
	}
	//-------------------
	public function edit_member(){ 
		$id_saraban =  $this->uri->segment(3);
		$sql = "SELECT * FROM tbl_user_data where approve = '0' and data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getmember'] = $this->Allowance_model->getdata($sql);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_4_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_member/edit_member',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_member/edit_member_js');
	}
	//-------------------
	public function all_member(){ 
		//$id_saraban =  $this->uri->segment(3); 
		$sql = "SELECT user.*,ca.career,po.position FROM tbl_user_data as user LEFT JOIN tbl_career_data as ca on user.career_id = ca.id LEFT JOIN  tbl_position_data as po on user.position_id = po.id WHERE user.data_status = '1' AND user_type != '2' ORDER BY user.firstname ASC";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getmember'] = $this->Allowance_model->getdata($sql);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_4_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_member/all_member',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_member/all_member_js');
	}
	//-------------------
	 /**
	 * 
	 * 
	 * MENU 5
	 * 
	 * 
	 */

	public function add_position(){ 
		/*$sql = "SELECT * FROM tbl_user_data where approve = '0' and data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdatauser'] = $this->Allowance_model->getdata($sql);*/

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_5_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_position/add_position'/*,$data*/); 
		$this->load->view('allowance_files/allowance_admin/mn_position/add_position_js'); 
	}
	//-------------------
	public function edit_position(){ 
		$sql = "SELECT * FROM allowance where data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getposition'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_5_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_position/edit_position',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_position/edit_position_js');
	}
	//-------------------
	public function all_position(){ 
		$sql = "SELECT * FROM allowance where data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getposition'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_5_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_position/all_position',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_position/all_position_js');
	}
	//---------------------------------------------------
	public function wait_toPay(){ 
		
		$reasonAdmin = $this->Allowance_model->get_setadminDocument($this->session->userdata['logged_in']['id'],'2');
		foreach($reasonAdmin->result() as $reasonAdmin2){};

		$sql = "SELECT * FROM tbl_outbound_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND finishform = '1' AND check_4step = '1' ORDER BY date_submit DESC , id DESC"; 
		//$sql = "SELECT a.*,b.id AS dic1_id FROM tbl_outbound_document AS a LEFT JOIN tbl_doc_1 AS b ON a.id = b.doc_id WHERE a.saraban_number != '' AND a.date_submit != '0000-00-00' AND a.reason_request = '".$reasonAdmin2->reason_type."' AND a.id = b.doc_id AND a.finishform = '1' AND a.check_4step = '1' AND b.type_travel = '2' ORDER BY a.date_submit DESC , a.id DESC"; 
		
		$sql2 = "SELECT * FROM tbl_local_document WHERE saraban_number != '' AND date_submit != '0000-00-00' AND finishform = '1' AND check_4step = '1' ORDER BY date_submit DESC , id DESC";	
		//$sql2 = "SELECT a.*,b.id AS dic1_id FROM tbl_local_document AS a LEFT JOIN tbl_doc_1 AS b ON a.id = b.doc_id WHERE a.saraban_number != '' AND a.date_submit != '0000-00-00' AND a.reason_request = '".$reasonAdmin2->reason_type."' AND a.id = b.doc_id AND a.finishform = '1' AND a.check_4step = '1' AND b.type_travel = '1' ORDER BY a.date_submit DESC , a.id DESC";	
		
		//$this->load->model("Allowance_model");
		//$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$data['getdataLocal'] = $this->Allowance_model->getdata($sql2);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc();
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/otherdoc/wait_toPay',$data); 
		$this->load->view('allowance_files/allowance_admin/otherdoc/wait_toPay_js');
	}

	//--------------------for admin--------------------//	

		public function update_chk_doc(){
			$chkprocess = $this->input->post('process');
			if($chkprocess == "pass"){
				$data = array(
					"check_doc"			=> "1",
					"approve_status"	=> "2",
					"command"			=> $this->input->post('command'),
					"id_saraban"		=> $this->input->post('id_saraban'),
					"user_update"		=> $this->input->post('userupdate'),
					"chk_authen"		=> $this->input->post('chkauthen'),
					"send_to"			=> $this->input->post('sendto') 
				);
			}elseif($chkprocess == "fail"){
				$data = array(
					"check_doc"			=> "0",
					"approve_status"	=> null,
					"command"			=> $this->input->post('command'),
					"user_update"		=> $this->input->post('userupdate'),
					"chk_authen"		=> $this->input->post('chkauthen'), 
					"send_to"			=> null,
					"remark"			=> $this->input->post('remark'),
				);
			}elseif($chkprocess == "edittype"){
				$data = array(
					"type_allow"		=> $this->input->post('type'),
					"user_update"		=> $this->input->post('userupdate'),
					"chk_authen"		=> $this->input->post('chkauthen')
				);
			}
			$table = "manage_allowance"; 
			$id_allowance = $this->input->post('id_allowance'); 
			

			$this->load->model("Allowance_model"); 
			$result = $this->Allowance_model->update($data,$id_allowance,$table);
			echo json_encode($result); 
			exit;
	}
	//-------------------
	public function update_approver(){
			$chkprocess = $this->input->post('process');
			if($chkprocess == "add"){
				$data = array(
					"approve"			=> "1",
					"user_update"		=> $this->input->post('userupdate'),
					"chk_authen"		=> $this->input->post('chk'),
					"position_manage"	=> $this->input->post('position_manage'),
					"act_for_else"		=> $this->input->post('act_for_else')
				);
			}else if($chkprocess == "edit"){
				$data = array(
					"firstname"			=> $this->input->post('fname'),
					"lastname"			=> $this->input->post('lname'),
					"telephone"			=> $this->input->post('tel'),
					"email"				=> $this->input->post('mail'),
					"position_level"	=> $this->input->post('plevel'),
					"position_name"		=> $this->input->post('pname'),
					"user_update"		=> $this->input->post('user_update'),
					"approve" 			=> $this->input->post('approve'),
					"chk_authen"		=> $this->input->post('chk')
				);
			}else if($chkprocess == "delete"){
				$data = array(
					"user_update"		=> $this->input->post('user_update'),
					"chk_authen"		=> $this->input->post('chk'),
					"approve" 			=> "0",
					"position_manage"	=> "0",
					"act_for_else"		=> "0"
				);
			}else if($chkprocess == "chgP"){
				$data = array(
					"user_update"		=> $this->input->post('user_update'),
					"chk_authen"		=> $this->input->post('chk'),
					"user_name"			=> $this->input->post('username'),
					"password"			=> md5($this->input->post('newpass'))
				);
			}
			
			$table = "tbl_user_data";
			$id = $this->input->post('id');

			$this->load->model("Allowance_model"); 
			$result = $this->Allowance_model->updateUser($data,$id,$table);
			echo json_encode($result); 
			exit;
	}
	//-------------------
	public function insert_position(){
		$chkprocess = $this->input->post('process');
		
			$data = array(
				"user_update"			=> $this->input->post('userupdate'),
				"chk_authen"			=> $this->input->post('chk'),
				"allowance"				=> $this->input->post('allowance'),
				"position_level"		=> $this->input->post('position') 
			);
		
		$table = "allowance"; 
		

		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->insert($data,$table);
		echo json_encode($result); 
		exit;
	}
	//-------------------
	public function update_position(){
		$chkprocess = $this->input->post('process');
		if($chkprocess == "edit_position"){
			$data = array(
				"user_update"			=> $this->input->post('user_update'),
				"allowance" 			=> $this->input->post('allow'),
				"chk_authen"			=> $this->input->post('chk')
			);
		}else if($chkprocess == "delete_position"){
			$data = array(
				"user_update"		=> $this->input->post('user_update'),
				"chk_authen"		=> $this->input->post('chk'),
				"data_status" 		=> "0" 
			);
		}
		
		$table = "allowance";
		$id = $this->input->post('id');

		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->updateUser($data,$id,$table);
		echo json_encode($result); 
		exit;
	}


/************************************* Approve *****************************************/

	public function index_approve(){
		
		$this->load->model("Allowance_model");   
		$data = array();
		
		$sql = "SELECT * FROM tbl_outbound_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') ORDER BY date_submit DESC , id DESC"; 
		
		$sql2 = "SELECT * FROM tbl_local_document WHERE (approve_id = '".($this->session->userdata['logged_in']['id'])."' OR approve_id2 = '".($this->session->userdata['logged_in']['id'])."') AND (check_doc = '1' OR check_doc2 = '1') AND (approve_status = '2' OR approve_status2 = '2') ORDER BY date_submit DESC , id DESC"; 
		              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$data['getdataLocal'] = $this->Allowance_model->getdata($sql2);
        //$data['getdataPending'] = $this->Allowance_model_2->getdata1();
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_0_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_js');			
	}
	//-------------------
	public function index_approve1($status=null,$withdraw=null){
		
		if(($status == 1) && ($withdraw == 0)){
			
			$data['pageTopic'] = 'รายการขออนุมัติเดินทางไปต่างประเทศ';
			$data['showExpenses'] = '/1';
			$data['link2'] = 'detail_approve';
			$data['type2'] = 'out';
			
			$sql2 = "SELECT * FROM `tbl_outbound_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND check_doc2 = '3' AND approve_status = '2' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC ";
			$sql1 = "SELECT * FROM `tbl_outbound_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND approve_status = '1' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC";
			$sql0 = "SELECT * FROM `tbl_outbound_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND approve_status = '0' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC";
			
		} else if (($status == 0) && ($withdraw == 0)){	
			
			$data['pageTopic'] = 'รายการขออนุมัติเดินทางภายในประเทศ';
			$data['showExpenses'] = '';
			$data['link2'] = 'detail_approvelocal';
			$data['type2'] = 'local';
			
			$sql2 = "SELECT * FROM `tbl_local_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND withdraw = '0' AND approve_status = '2' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC";
			$sql1 = "SELECT * FROM `tbl_local_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND withdraw = '0' AND approve_status = '1' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC";
			$sql0 = "SELECT * FROM `tbl_local_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND withdraw = '0' AND approve_status = '0' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC";			
			
		} else if (($status == 1)&&($withdraw == 1)){
			
			$data['pageTopic'] = 'รายการขออนุมัติเบิกค่าเดินทางไปต่างประเทศ';
			$data['showExpenses'] = '/2';
			$data['link2'] = 'detail_approve';
			$data['type2'] = 'out';
			
			$sql2 = "SELECT * FROM `tbl_outbound_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND check_doc2 = '1' AND approve_status = '1' AND approve_status2 = '2' AND approve_id != '0' AND approve_id2 = '".($this->session->userdata['logged_in']['id'])."' AND withdraw = '".$withdraw."' ORDER BY date_submit DESC , id DESC";
			$sql1 = "SELECT * FROM `tbl_outbound_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND check_doc2 = '1' AND approve_status = '1' AND approve_status2 = '1' AND approve_id != '0' AND approve_id2 = '".($this->session->userdata['logged_in']['id'])."' AND withdraw = '".$withdraw."' ORDER BY date_submit DESC , id DESC";
			$sql0 = "SELECT * FROM `tbl_outbound_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND check_doc2 = '1' AND approve_status = '1' AND approve_status2 = '0' AND approve_id != '0' AND approve_id2 = '".($this->session->userdata['logged_in']['id'])."' AND withdraw = '".$withdraw."' ORDER BY date_submit DESC , id DESC";
			
		} else if (($status == 0)&&($withdraw == 1)){
			
			$data['pageTopic'] = 'รายการขออนุมัติเบิกค่าเดินทางภายในประเทศ';
			$data['showExpenses'] = '';
			$data['link2'] = 'detail_approvelocal';
			$data['type2'] = 'local';
			
			$sql2 = "SELECT * FROM `tbl_local_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND withdraw = '1' AND approve_status = '2' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' AND withdraw = '".$withdraw."' ORDER BY date_submit DESC , id DESC";
			$sql1 = "SELECT * FROM `tbl_local_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND withdraw = '1' AND approve_status = '1' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' AND withdraw = '".$withdraw."' ORDER BY date_submit DESC , id DESC";
			$sql0 = "SELECT * FROM `tbl_local_document` WHERE saraban_number != '' AND date_submit != '0000-00-00' AND check_doc = '1' AND withdraw = '1' AND approve_status = '0' AND approve_id = '".($this->session->userdata['logged_in']['id'])."' AND withdraw = '".$withdraw."' ORDER BY date_submit DESC , id DESC";		
		}
		$this->load->model("Allowance_model");   
		//$data = array();              
		$data['getdataPending2'] = $this->Allowance_model->getdata($sql2);
		$data['getdataPending1'] = $this->Allowance_model->getdata($sql1);
		$data['getdataPending0'] = $this->Allowance_model->getdata($sql0);
		$data['withdraw'] = $withdraw ;

		$this->load->view('templates/allowance/header_approve');
        if(($status == 1)&&($withdraw == 1)){
          	$this->load->view('templates/allowance/menu_2_approve');
        }else if (($status == 0)&&($withdraw == 1)){
            $this->load->view('templates/allowance/menu_2_approve');
        }else{
            $this->load->view('templates/allowance/menu_1_approve');
        }
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_1',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_1_js');			
	}
	//-------------------
	public function index_approve2(){ 

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic, user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id'])." and mnall.approve_status = '1'  and mnall.text6 = '0'  ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_1_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_2',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_2_js');			
	}
	//-------------------
	public function index_approve3(){ 

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic , user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id'])."  and mnall.approve_status = '0'  and mnall.text6 = '0'  ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_1_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_3',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_3_js');			
	}
	//-------------------
	public function index_approve4(){ 

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic , user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id'])." and mnall.approve_status = '2'  and mnall.text6 = '1' or  mnall.text6 = '2' or  mnall.text6 = '3'  ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_2_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_4',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_4_js');			
	}
	//-------------------
	public function index_approve5(){ 

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic , user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = '".($this->session->userdata['logged_in']['id'])."' and  mnall.approve_status = '1'  and mnall.text6 = '1' or  mnall.text6 = '2' or  mnall.text6 = '3'  ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_2_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_5',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_5_js');			
	}
	//-------------------
	public function index_approve6(){ 

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic, user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id'])." and mnall.approve_status = '0'  and mnall.text6 = '1' or  mnall.text6 = '2' or  mnall.text6 = '3'
				ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_2_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_6',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_6_js');			
	}
	//-------------------
	public function detail_approve($money=NULL,$for_type=NULL,$document_id=NULL){
		
		$get_documentData = $this->Allowance_model->get_documentData($document_id,$money);
        foreach($get_documentData->result() AS $get_documentData2){}
		$user_create = $get_documentData2->user_create; 
		
		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		
		if($for_type == '1'){ 
			
			if($money == '0'){	
				$data['url_preview'] = 'preview_outbound';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_outboundWithdraw';
			}		
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,$money,$user_create);
			//$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '1', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '2', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_approve');
			$this->load->view('templates/allowance/menu_1_approve');
			$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/allowance_user/edit_outbound1Person' , $data);
			$this->load->view('allowance_files/allowance_user/outbound_withdraw_js' , $data);
		}
		
		if($for_type == '2'){		
						
			if($money == '0'){	
				$data['url_preview'] = 'outboundGroup_noWithdraw';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_outboundGroup';
			}			
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,$money,$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '1', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '2', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_approve');
			$this->load->view('templates/allowance/menu_2_approve');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/allowance_user/edit_outboundGroup' , $data);
			$this->load->view('allowance_files/allowance_user/detail2_allowance_js' , $data);
		}
	}
	//------------------------------------------
    public function detail_approvelocal($money=NULL,$for_type=NULL,$document_id=NULL){
		$get_documentData = $this->Allowance_model->get_localData($document_id,$money);
        foreach($get_documentData->result() AS $get_documentData2){
           $user_create = $get_documentData2->user_create;    
        }
		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		
		if($for_type == '1'){ 
			
			if($money == '0'){	
				$data['url_preview'] = 'preview_Local';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_LocalWithdraw';
			}		
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,$money,$user_create);
			//$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_1_approve');
		$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/local_document/edit_outbound1Person' , $data);
			$this->load->view('allowance_files/local_document/outbound_withdraw_js' , $data);
		}
		
		if($for_type == '2'){		
						
			if($money == '0'){	
				$data['url_preview'] = 'LocalGroup_noWithdraw';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_LocalGroup';
			}			
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,$money,$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_2_approve');
		$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/local_document/edit_outboundGroup' , $data);
			$this->load->view('allowance_files/local_document/detail2_allowance_js' , $data);
		}
	}
	//------------------------------------------
	public function view_approve_2(){
		$id_allowance =  $this->uri->segment(3);
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id']);
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_edit_approve');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_2',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_2_js');
	}
	//------------------------------------------
	public function view_approve_3(){
		$id_allowance =  $this->uri->segment(3);
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id']);
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_edit_approve');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_3',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_3_js');
	}
	//------------------------------------------
	public function view_approve_5(){
		$id_allowance =  $this->uri->segment(3);
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id']);
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_edit_approve');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_5',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_5_js');
	}
	//------------------------------------------
	public function view_approve_6(){
		$id_allowance =  $this->uri->segment(3);
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				where  mnall.id_allowance = '$id_allowance' and mnall.data_status = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id']);
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_edit_approve');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_6',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/view_approve_6_js');
	}
	//------------------------------------------	
	public function approve_allowance(){

		$id_allowance = $this->input->post('id_allowance');
		$chk_approve = $this->input->post('chk_approve');
		
		if($chk_approve == '2'){
			
			$data = array(  
				"approve_status"  => $this->input->post('approve_status'),
				"notapproved_approvers"  => $this->input->post('notapproved'),
				"check_doc2" => '2'	
			);
			
		} else if($chk_approve == '1'){
			
			$data = array(  
				"approve_status2"  => $this->input->post('approve_status'),				
				"notapproved_approvers2"  => $this->input->post('notapproved')				
			);			
		}
		
		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->update_outboundDocument($id_allowance,$data);
		echo $result; 
		exit;
	}
	//------------------------------------------
	public function approve_allowancelocal(){

		$id_allowance = $this->input->post('id_allowance');
		$chk_approve = $this->input->post('chk_approve');
		
		if($chk_approve == '2'){
			
			$data = array(  
				"approve_status"  => $this->input->post('approve_status'),
				"notapproved_approvers"  => $this->input->post('notapproved'),
				"check_doc2" => '2'	
			);
			
		} else if($chk_approve == '1'){
			
			$data = array(  
				"approve_status2"  => $this->input->post('approve_status'),				
				"notapproved_approvers2"  => $this->input->post('notapproved')				
			);			
		}
		
		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->update_localDocument($id_allowance,$data);
		echo $result; 
		exit;
	}

	/***********************************REPORT**************************************/
	public function report(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/allowance/header_user'); 
			//$this->load->view('templates/allowance/menu_report_user',$data);
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/report/report');
			$this->load->view('allowance_files/report/report_js');

		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//------------------------------------------
	public function reportLocal(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/allowance/header_user'); 
			//$this->load->view('templates/allowance/menu_report_user',$data);
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/report/reportLocal');
			$this->load->view('allowance_files/report/reportLocal_js');

		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//------------------------------------------
	public function reportBudget(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT * FROM tbl_outbound_document  WHERE saraban_number != '' AND date_submit != '0000-00-00' AND withdraw = '1' AND user_create = '".($this->session->userdata['logged_in']['id'])."' ORDER BY date_submit DESC , id DESC";
                        
			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/allowance/header_user'); 
			//$this->load->view('templates/allowance/menu_report_user',$data);
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/report/reportBudget',$data);
			$this->load->view('allowance_files/report/reportBudget_js');
 
		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//------------------------------------------
	public function get_report(){

		$key			= "";

		$id 			= $this->input->post('id');
		$typeBudget 	= $this->input->post('typeBudget');
		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
		$dd 			= $this->input->post('dd');
		$mm 			= $this->input->post('mm');
		$yy 			= $this->input->post('yy');
		$checkdoc       = $this->input->post('checkdoc');
		$approve        = $this->input->post('approve');

		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');
		$ch        = $this->input->post('ch');

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			} else{
				$key = $key.' and allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			}
		}
		

		if( $id != ''){
			if($key==""){
				//$key = $key.' allowance.user_create='.$id;
				$key = $key.' user_create='.$id;
			} else{
				//$key = $key.' and allowance.user_create ='.$id;
				$key = $key.' and user_create ='.$id;
			}
		}
		 if($typeBudget != 'null'){
			if($key==""){
				$key = $key.' allowance.text6 ='.$typeBudget;
			} else{
				$key = $key.' and allowance.text6='.$typeBudget;
			}
		}
		 if($id_saraban != '0'){
			if($key==""){
				$key = $key.' allowance.id_saraban='.$id_saraban;
			} else{
				$key = $key.' and allowance.id_saraban='.$id_saraban;
			}	
		}
		 if($topic != '0'){
			if($key==""){
				$key = $key.' allowance.topic="'.$topic.'"';
			} else{
				$key = $key.' and allowance.topic="'.$topic.'"';
			}
		}
		 if($dd != '0'){
			if($key==""){
				$key = $key.' DAY(allowance.date_add) = "'.$dd.'"';
			} else{
				$key = $key.' and DAY(allowance.date_add) = "'.$dd.'"';
			}
		}
		 if($mm != '0'){
			if($key==""){
				$key = $key.' MONTH(allowance.date_add) = "'.$mm.'"';
			} else{
				$key = $key.' and MONTH(allowance.date_add) = "'.$mm.'"';
			}
		}
		 if($yy != '0'){
			if($key==""){
				$key = $key.' YEAR(allowance.date_add) = "'.$yy.'"';
			} else{
				$key = $key.' and YEAR(allowance.date_add) = "'.$yy.'"';
			}
		}
		 if($checkdoc != 'null'){
			if($key==""){
				$key = $key.' allowance.check_doc = '.$checkdoc;
			} else{
				$key = $key.' and allowance.check_doc = '.$checkdoc;
			}
		}
		 if($approve != 'null'){
			if($key==""){
				$key = $key.' allowance.approve_status = '.$approve;
			} else{
				$key = $key.' and allowance.approve_status = '.$approve;
			}
		}

			//$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE ".$key." AND allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' ORDER by allowance.date_add DESC";
		if($ch == '1'){
			$sql = "SELECT * FROM tbl_outbound_document WHERE ".$key." ORDER BY id DESC";
		}
		if($ch == '2'){
			$sql = "SELECT * FROM tbl_local_document WHERE ".$key." ORDER BY id DESC";
		}
		
		

			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
            $data['sql']   = $sql;
			
			echo json_encode($data); 
			exit;
	}
	//------------------------------------------
	public function get_report_Budget(){

		$key			= "";

		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
//		$dd 			= $this->input->post('dd');
//		$mm 			= $this->input->post('mm');
//		$yy 			= $this->input->post('yy');

		//$user_create     = $this->input->post('user_create');

		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');

	if(($date1 != '') && ($date2 != '')){
                   
			if($key==""){
				$key = $key." a.date_create BETWEEN '".$date1."' AND '".$date2."'";
			} else{
				$key = $key." and a.date_create BETWEEN '".$date1."' AND '".$date2."'";
			}
		}

		 if($id_saraban != ''){
			if($key==""){
				$key = $key." a.saraban_number = '".$id_saraban."'";
			} else{
				$key = $key." and a.saraban_number = '".$id_saraban."'";
			}	
		}
                
                $withdraw = '';
			if($topic == '1'){
				
				$withdraw = array();
				
				$check_1row = $this->Allowance_model->check_withdraw('1');
				$num1 = $check_1row->num_rows();
				if($num1 > 0){
					foreach($check_1row->result() as $Check_1row){ 
				
						if($Check_1row->new_travel == '1'){
							
							array_push($withdraw,$Check_1row->document_id);
						}						
					}
				}
				$check_2row = $this->Allowance_model->check_withdraw('2');
				$num2 = $check_2row->num_rows();
				if($num2 > 0){
					foreach($check_2row->result() as $Check_2row){ 
				
						array_push($withdraw,$Check_2row->document_id);						
					}
				}
				
				if($withdraw != ''){ 
					
					if($key==""){
						$key = $key.' a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
					} else {
						$key = $key.' AND a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
					}
				}				
			}
			if($topic == '2'){
				
				$withdraw = array();
				
				$check_1row = $this->Allowance_model->check_withdraw('1');
				$num1 = $check_1row->num_rows();
				if($num1 > 0){
					foreach($check_1row->result() as $Check_1row){ 
				
						if($Check_1row->new_travel == '2'){
							
							array_push($withdraw,$Check_1row->document_id);
						}						
					}
					if($withdraw != ''){ 
					
						if($key==""){
							$key = $key.' a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
						} else {
							$key = $key.' AND a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
						}
					}					
				}							
			}
   if($key!=''){

			$sql = "SELECT 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document,
sum(b.allowance1_total) as new_allowance1_total,
sum(b.allowance2_total) as new_allowance2_total,
sum(b.accommodation1_total) as new_accommodation1_total,
sum(b.accommodation2_total) as  new_accommodtion2_total,
sum(b.passage_baht) as new_passage_baht ,
sum(b.other_baht) as  new_other_baht
FROM tbl_outbound_document AS a LEFT JOIN tbl_withdraw_data AS b ON a.id = b.document_id WHERE a.approve_status = '1' AND a.check_doc = '1' AND a.check_doc2 != '3' AND a.check_doc2 != '2' AND a.date_submit != '0000-00-00' AND a.withdraw = '1' AND a.user_create = '".$this->session->userdata['logged_in']['id']."' AND $key
GROUP BY 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document
ORDER by date_create DESC";
                }else{
                    $sql = "SELECT 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document,
sum(b.allowance1_total) as new_allowance1_total,
sum(b.allowance2_total) as new_allowance2_total,
sum(b.accommodation1_total) as new_accommodation1_total,
sum(b.accommodation2_total) as  new_accommodtion2_total,
sum(b.passage_baht) as new_passage_baht ,
sum(b.other_baht) as  new_other_baht
FROM tbl_outbound_document AS a LEFT JOIN tbl_withdraw_data AS b ON a.id = b.document_id WHERE a.approve_status = '1' AND a.check_doc = '1' AND a.check_doc2 != '3' AND a.check_doc2 != '2' AND a.date_submit != '0000-00-00' AND a.withdraw = '1' AND a.user_create = '".$this->session->userdata['logged_in']['id']."'
GROUP BY 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document
ORDER by date_create DESC";
                }
                
			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			echo json_encode($data); 
			exit;
	}
	//------------------------------------------
	public function admin_report(){
		if(isset($this->session->userdata['logged_in'])){
	  
			$sql = "SELECT * FROM tbl_outbound_document  WHERE saraban_number != '' AND date_submit != '0000-00-00' AND withdraw = '1' ORDER BY date_submit DESC , id DESC";

            $sqluser = "SELECT * FROM tbl_user_data  WHERE data_status = '1' ORDER BY id DESC";
			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			$data['userdata'] = $this->Allowance_model->getdatalist_allowance($sqluser);
			$data['count1'] = $this->Allowance_model->getcountfaildoc();
			$data['count2'] = $this->Allowance_model->getcountpending();
			$data['count3'] = $this->Allowance_model->getcountalldoc(); 
			$data['count4'] = $this->Allowance_model->getcountallmemberallow();   
			
			$this->load->view('templates/allowance/header_admin'); 
			$this->load->view('templates/allowance/menu_report_admin',$data);
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/report/report_admin');
			$this->load->view('allowance_files/report/report_admin_js'); 

		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//------------------------------------------
	public function admin_reportBudget(){
		if(isset($this->session->userdata['logged_in'])){
	  
			$sql = "SELECT * FROM tbl_outbound_document  WHERE saraban_number != '' AND date_submit != '0000-00-00' AND withdraw = '1' ORDER BY date_submit DESC , id DESC";

            $sqluser = "SELECT * FROM tbl_user_data  WHERE data_status = '1' ORDER BY id DESC";
			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
            $data['userdata'] = $this->Allowance_model->getdatalist_allowance($sqluser);
			$data['count1'] = $this->Allowance_model->getcountfaildoc();
			$data['count2'] = $this->Allowance_model->getcountpending();
			$data['count3'] = $this->Allowance_model->getcountalldoc(); 
			$data['count4'] = $this->Allowance_model->getcountallmemberallow();   
			
			$this->load->view('templates/allowance/header_admin');
			$this->load->view('templates/allowance/menu_report_admin',$data);
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/report/reportBudget_admin');
			$this->load->view('allowance_files/report/reportBudget_admin_js');

		} else {
	    	 header("location:".base_url('allowance/login_user')); 
	  	}
	}
	//------------------------------------------
	public function get_report_admin(){
		
		$this->load->model("Allowance_model");

		$key		  = "";
		//$typeBudget 	= $this->input->post('typeBudget');
		$id_saraban	  = $this->input->post('id_saraban');
		$topic 		  = $this->input->post('topic');		
//		$dd 			= $this->input->post('dd');
//		$mm 			= $this->input->post('mm');
//		$yy 			= $this->input->post('yy');
		$checkdoc     = $this->input->post('checkdoc');
		$approve      = $this->input->post('approve');
		$user_create  = $this->input->post('user_create');
		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');
        $withdraw     = '1';

		if(($date1 != '') && ($date2 != '')){
                   
			if($key==""){
				$key = $key." date_create BETWEEN '".$date1."' AND '".$date2."'";
			} else{
				$key = $key." and date_create BETWEEN '".$date1."' AND '".$date2."'";
			}
		}
		
//			if($key==""){
//				$key = $key." allowance.data_status = '1'";
//			} else{
//				$key = $key." and allowance.data_status = '1'";
//			}

		if($user_create != ''){
			if($key==""){
				$key = $key.' user_create = '.$user_create;
			} else{
				$key = $key.' and user_create = '.$user_create;
			}	
		}	

//		 if($typeBudget != 'null'){
//			if($key==""){
//				$key = $key.' allowance.text6 ='.$typeBudget;
//			} else{
//				$key = $key.' and allowance.text6='.$typeBudget;
//			}
//		}
		if($id_saraban != ''){
			if($key==""){
				$key = $key." saraban_number = '".$id_saraban."'";
			} else{
				$key = $key." and saraban_number = '".$id_saraban."'";
			}	
		}
		//if($topic != ''){
			
			$withdraw = '';
			if($topic == '1'){
				
				$withdraw = array();
				
				$check_1row = $this->Allowance_model->check_withdraw('1');
				$num1 = $check_1row->num_rows();
				if($num1 > 0){
					foreach($check_1row->result() as $Check_1row){ 
				
						if($Check_1row->new_travel == '1'){
							
							array_push($withdraw,$Check_1row->document_id);
						}						
					}
				}
				$check_2row = $this->Allowance_model->check_withdraw('2');
				$num2 = $check_2row->num_rows();
				if($num2 > 0){
					foreach($check_2row->result() as $Check_2row){ 
				
						array_push($withdraw,$Check_2row->document_id);						
					}
				}
				
				if($withdraw != ''){ 
					
					if($key==""){
						$key = $key.' id IN ('.implode(',', array_map('intval', $withdraw)).')';
					} else {
						$key = $key.' AND id IN ('.implode(',', array_map('intval', $withdraw)).')';
					}
				}				
			}
			if($topic == '2'){
				
				$withdraw = array();
				
				$check_1row = $this->Allowance_model->check_withdraw('1');
				$num1 = $check_1row->num_rows();
				if($num1 > 0){
					foreach($check_1row->result() as $Check_1row){ 
				
						if($Check_1row->new_travel == '2'){
							
							array_push($withdraw,$Check_1row->document_id);
						}						
					}
					if($withdraw != ''){ 
					
						if($key==""){
							$key = $key.' id IN ('.implode(',', array_map('intval', $withdraw)).')';
						} else {
							$key = $key.' AND id IN ('.implode(',', array_map('intval', $withdraw)).')';
						}
					}					
				}							
			}			
		//}		
		
//		 if($topic != '0'){
//			if($key==""){
//				$key = $key.' saraban_number = LIKE "'.$topic.'"';
//			} else{
//				$key = $key.' saraban_number = "'.$topic.'"';
//			}
//		}
//		 if($dd != '0'){
//			if($key==""){
//				$key = $key.' DAY(allowance.date_add) = "'.$dd.'"';
//			} else{
//				$key = $key.' and DAY(allowance.date_add) = "'.$dd.'"';
//			}
//		}
//		 if($mm != '0'){
//			if($key==""){
//				$key = $key.' MONTH(allowance.date_add) = "'.$mm.'"';
//			} else{
//				$key = $key.' and MONTH(allowance.date_add) = "'.$mm.'"';
//			}
//		}
//		 if($yy != '0'){
//			if($key==""){
//				$key = $key.' YEAR(allowance.date_add) = "'.$yy.'"';
//			} else{
//				$key = $key.' and YEAR(allowance.date_add) = "'.$yy.'"';
//			}
//		}
		 if($checkdoc != ''){
			if($key==""){
				$key = $key.' check_doc2 = '.$checkdoc;
			} else{
				$key = $key.' and check_doc2 = '.$checkdoc;
			}
		}
		 if($approve != ''){
			if($key==""){
				$key = $key.' approve_status2 = '.$approve;
			} else{
				$key = $key.' and approve_status2 = '.$approve;
			}
		}               
                
                if($key!=''){

			$sql = "SELECT date_create,id,saraban_number,check_doc2,approve_status2,subject_document FROM tbl_outbound_document WHERE withdraw = '1' AND approve_status = '1' AND check_doc = '1' AND date_submit != '0000-00-00' AND $key ORDER by date_create DESC";
                }else{
                    $sql = "SELECT date_create,id,saraban_number,check_doc2,approve_status2,subject_document FROM tbl_outbound_document WHERE approve_status = '1' AND check_doc = '1' AND check_doc2 != '3' AND check_doc2 != '2' AND date_submit != '0000-00-00' AND withdraw = '1' ORDER by date_create DESC";
                }			 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
            
          //  $data['sql']  = $sql;
			
			echo json_encode($data); 
			exit;
	}
	//------------------------------------------
	public function get_report_Budget_admin(){

		$key			= "";

		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
//		$dd 			= $this->input->post('dd');
//		$mm 			= $this->input->post('mm');
//		$yy 			= $this->input->post('yy');

		$user_create     = $this->input->post('user_create');

		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');

	if(($date1 != '') && ($date2 != '')){
                   
			if($key==""){
				$key = $key." a.date_create BETWEEN '".$date1."' AND '".$date2."'";
			} else{
				$key = $key." and a.date_create BETWEEN '".$date1."' AND '".$date2."'";
			}
		}
		if($user_create != ''){
			if($key==""){
				$key = $key.' a.user_create = '.$user_create;
			} else{
				$key = $key.' and a.user_create = '.$user_create;
			}	
		}
	
	

		 if($id_saraban != ''){
			if($key==""){
				$key = $key." a.saraban_number = '".$id_saraban."'";
			} else{
				$key = $key." and a.saraban_number = '".$id_saraban."'";
			}	
		}
                	$withdraw = '';
			if($topic == '1'){
				
				$withdraw = array();
				
				$check_1row = $this->Allowance_model->check_withdraw('1');
				$num1 = $check_1row->num_rows();
				if($num1 > 0){
					foreach($check_1row->result() as $Check_1row){ 
				
						if($Check_1row->new_travel == '1'){
							
							array_push($withdraw,$Check_1row->document_id);
						}						
					}
				}
				$check_2row = $this->Allowance_model->check_withdraw('2');
				$num2 = $check_2row->num_rows();
				if($num2 > 0){
					foreach($check_2row->result() as $Check_2row){ 
				
						array_push($withdraw,$Check_2row->document_id);						
					}
				}
				
				if($withdraw != ''){ 
					
					if($key==""){
						$key = $key.' a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
					} else {
						$key = $key.' AND a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
					}
				}				
			}
			if($topic == '2'){
				
				$withdraw = array();
				
				$check_1row = $this->Allowance_model->check_withdraw('1');
				$num1 = $check_1row->num_rows();
				if($num1 > 0){
					foreach($check_1row->result() as $Check_1row){ 
				
						if($Check_1row->new_travel == '2'){
							
							array_push($withdraw,$Check_1row->document_id);
						}						
					}
					if($withdraw != ''){ 
					
						if($key==""){
							$key = $key.' a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
						} else {
							$key = $key.' AND a.id IN ('.implode(',', array_map('intval', $withdraw)).')';
						}
					}					
				}							
			}
                
   if($key!=''){

			$sql = "SELECT 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document,
sum(b.allowance1_total) as new_allowance1_total,
sum(b.allowance2_total) as new_allowance2_total,
sum(b.accommodation1_total) as new_accommodation1_total,
sum(b.accommodation2_total) as  new_accommodation2_total,
sum(b.passage_baht) as new_passage_baht ,
sum(b.other_baht) as  new_other_baht
FROM tbl_outbound_document AS a LEFT JOIN tbl_withdraw_data AS b ON a.id = b.document_id WHERE a.approve_status = '1' AND a.check_doc = '1' AND a.check_doc2 != '3' AND a.check_doc2 != '2' AND a.date_submit != '0000-00-00' AND a.withdraw = '1' AND $key
GROUP BY 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document
ORDER by date_create DESC";
                }else{
                    $sql = "SELECT 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document,
sum(b.allowance1_total) as new_allowance1_total,
sum(b.allowance2_total) as new_allowance2_total,
sum(b.accommodation1_total) as new_accommodation1_total,
sum(b.accommodation2_total) as  new_accommodation2_total,
sum(b.passage_baht) as new_passage_baht ,
sum(b.other_baht) as  new_other_baht
FROM tbl_outbound_document AS a LEFT JOIN tbl_withdraw_data AS b ON a.id = b.document_id WHERE a.approve_status = '1' AND a.check_doc = '1' AND a.check_doc2 != '3' AND a.check_doc2 != '2' AND a.date_submit != '0000-00-00' AND a.withdraw = '1' 
GROUP BY 
a.date_create,a.id,a.saraban_number,a.check_doc2,a.approve_status2,a.subject_document
ORDER by date_create DESC";
                }

			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			echo json_encode($data); 
			exit;
	}
	//------------------- 
	public function Add_Admin($currentID=NULL){
		
        $this->load->model("Saraban_model"); 
        if($currentID !=''){
             $data['currentID'] = $currentID;
             $data['getuserdata'] = $this->Saraban_model->getuserdata($currentID);
        } else {
             $data['currentID'] = 'x';
        }
        $datastatus = '1';
        $data['careerData'] = $this->Saraban_model->careerDATA($datastatus);
        $data['posData'] = $this->Saraban_model->posData($datastatus);
        //$data['currentID'] = $currentID;
        //$getuserdata = $this->Saraban_model->getuserdata($id);		
		
		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_6_admin');
		$this->load->view('templates/allowance/header2');	
		
		$this->load->view('allowance_files/allowance_admin/mn_admins/Add_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_admins/Add_admin_js');	
	}
	//------------------- 
	public function admin_data(){		
		
		$data['getadmin'] = $this->Allowance_model->get_adminList();
		$this->load->view('templates/allowance/header1'); 
		$this->load->view('templates/allowance/menu_6_admin');
		$this->load->view('templates/allowance/header2');
		
		$this->load->view('allowance_files/allowance_admin/mn_admins/list_admin',$data);
		$this->load->view('allowance_files/allowance_admin/mn_admins/Add_admin_js');		
	}
	//------------------- 
	public function Edit_Admin($currentID=NULL,$getFrom=NULL){
		
        $this->load->model("Saraban_model"); 
        if($currentID !=''){
			 
			 if($getFrom == '1'){
				
				$table = 'tbl_admin_allowance';	
				$where_in = '2'; 
			 }
			 if($getFrom == '2'){

				$table = 'tbl_admin_saraban';
				$where_in = '1'; 
			 }			
             $data['currentID'] = $currentID;
             $data['getuserdata'] = $this->Allowance_model->get_adminDetail($currentID,$table);
			
        } else {
             $data['currentID'] = 'x';
        }
        $datastatus = '1';
        $data['careerData'] = $this->Saraban_model->careerDATA($datastatus);
        $data['posData'] = $this->Saraban_model->posData($datastatus);
		$data['setAdmin'] = $this->Allowance_model->get_setadminDocument($currentID,$where_in);
        //$data['currentID'] = $currentID;
        //$getuserdata = $this->Saraban_model->getuserdata($id);		
		
		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_6_admin');
		$this->load->view('templates/allowance/header2');	
		
		$this->load->view('allowance_files/allowance_admin/mn_admins/Add_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_admins/Add_admin_js');	
	}
	//------------------- 
	 public function set_ShowOnWebauthor() {
        $dataID = $this->input->post('dataID');
        $check = $this->input->post('check');
        $table = $this->input->post('table');
        $result = $this->Allowance_model->set_ShowOnWebauthor($dataID,$check,$table);
        echo $result;
    }
    //------------------------------------------
	public function detaill($money=NULL,$for_type=NULL,$document_id=NULL){

        //$money = $this->uri->segment(3); 
		//$document_id = $this->uri->segment(5);
		$get_documentData = $this->Allowance_model->get_documentData($document_id,$money);
        foreach($get_documentData->result() AS $get_documentData2){
           $user_create = $get_documentData2->user_create;    
        }
		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		
		if($for_type == '1'){ 
			
			if($money == '0'){	
				$data['url_preview'] = 'preview_outbound';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_outboundWithdraw';
			}		
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,$money,$user_create);
			//$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '1', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '2', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);			

			$this->load->view('templates/allowance/header_admin');
			$this->load->view('templates/allowance/menu_1_admin');
			$this->load->view('templates/allowance/header2');		

			$this->load->view('allowance_files/allowance_user/edit_outbound1Person' , $data);
			$this->load->view('allowance_files/allowance_user/outbound_withdraw_js' , $data);
		}
		
		if($for_type == '2'){		
						
			if($money == '0'){	
				$data['url_preview'] = 'outboundGroup_noWithdraw';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_outboundGroup';
			}			
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,$money,$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '1', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '2', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_admin');
			$this->load->view('templates/allowance/menu_1_admin');
			$this->load->view('templates/allowance/header2');		

			$this->load->view('allowance_files/allowance_user/edit_outboundGroup' , $data);
			$this->load->view('allowance_files/allowance_user/detail2_allowance_js' , $data);
		}	
	}
    //------------------------------- 	
    public function addusermember() {
        $name = $this->input->post('user_name');
        $Password = $this->input->post('Password');
        $password_old = $this->input->post('password_old');
        $email = $this->input->post('email');
        $titlename = $this->input->post('titlename');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $telephone = $this->input->post('telephone');
        $career =$this->input->post('career');
        $workgroup =$this->input->post('workgroup');
        $position =$this->input->post('position');
        $position_number =$this->input->post('position_number');
        $wage =$this->input->post('wage');
        $id_update =$this->input->post('id_update');
        $chk_authen =$this->input->post('chk_authen');
        $currentID = $this->input->post('idemail');
        $result_id = $this->Allowance_model->addusermember($name,$Password,$titlename,$firstname,$lastname,$telephone,$career,$position,$position_number,$wage,$id_update,$chk_authen, $currentID,$workgroup,$password_old);
        //--------------------------                  
           foreach($email AS $value){
              if($value !=''){
                   $result_id2 = $this->Allowance_model->addemail($result_id , $value);
                         //$dataID = $dataID2;
              }  //else {
                       //  $dataID = $dataID;
              // }                    
           }                 
        echo $result_id;
    }
    //-------------------
    public function deleteemail(){
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Allowance_model->delete_data($dataID, $table);
        echo $result;
    }
    //------------------dataID changeValue //
	public function setDefault(){
		$id_email = $this->input->post('id_email');
		$data_status = $this->input->post('data_status');
		$userid = $this->input->post('userid');
		$result = $this->Allowance_model->setDefault($id_email,$data_status,$userid);
		echo $result;		
	}
    //----------------------------
	public function local_withdraw($for_type=NULL,$reason_request=NULL){ // คนเดียว เบิก		
		$data['documentData'] = $this->Allowance_model->get_localData();
		
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '1';
		$data['url_preview'] = 'preview_LocalWithdraw';
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		//if($chFor =='1'){
			//$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		$this->load->view('allowance_files/local_document/outbound_withdraw' , $data);
		/*}
		if($chFor =='2'){		
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
		}*/		
		//$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
		$this->load->view('allowance_files/local_document/outbound_withdraw_js' , $data);			
	}
	//--------------------
        public function create_local($for_type=NULL,$reason_request=NULL){ // คนเดียว เบิก		
		$data['documentData'] = $this->Allowance_model->get_localData();
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '0';
		$data['url_preview'] = 'preview_Local';
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();
		
			
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		//if($chFor =='1'){
			//$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		$this->load->view('allowance_files/local_document/outbound_withdraw' , $data);
		/*}
		if($chFor =='2'){		
			$this->load->view('allowance_files/allowance_user/outbound_group' , $data);
		}*/		
		//$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
		$this->load->view('allowance_files/local_document/outbound_withdraw_js',$data);			
	}
    //--------------------
	public function localGroup_withdraw($for_type=NULL,$reason_request=NULL){	// คณะ เบิก	localGroup_withdraw
		
		$data['documentData'] = $this->Allowance_model->get_localData();
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '1';		
		$data['url_preview'] = 'preview_LocalGroup';		
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();		
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		/*if($chFor =='1'){
			$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		}
		if($chFor =='2'){	*/	
		$this->load->view('allowance_files/local_document/outbound_group', $data);
			//$this->load->view('allowance_files/allowance_user/outbound_group-BK2' , $data);
		//}		
		$this->load->view('allowance_files/local_document/detail2_allowance_js', $data);			
	}
    //--------------------
	public function localGroup($for_type=NULL,$reason_request=NULL){  // คณะ ไม่เบิก		
		
		$data['documentData'] = $this->Allowance_model->get_localData();
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '0';	
		$data['url_preview'] = 'LocalGroup_noWithdraw';
		$data['for_type'] = $for_type;		
		$data['reason_request'] = $reason_request;
		$data['getposition'] = $this->Allowance_model->get_position();		
		$data['getcareer'] = $this->Allowance_model->get_career();
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		
		/*if($chFor =='1'){
			$this->load->view('allowance_files/allowance_user/detail2_allowance' , $data);
		}
		if($chFor =='2'){	*/	
		$this->load->view('allowance_files/local_document/outbound_group' , $data);
		//}		
		$this->load->view('allowance_files/local_document/detail2_allowance_js' , $data);			
	}
    //--------------------
	public function detailLocal($money=NULL,$for_type=NULL,$document_id=NULL){

        //$money = $this->uri->segment(3); 
		//$document_id = $this->uri->segment(5);
		$get_documentData = $this->Allowance_model->get_localData($document_id,$money);
        foreach($get_documentData->result() AS $get_documentData2){
           $user_create = $get_documentData2->user_create;    
        }
		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		
		if($for_type == '1'){ 
			
			if($money == '0'){	
				$data['url_preview'] = 'preview_Local';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_LocalWithdraw';
			}		
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,$money,$user_create);
			//$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_admin');
			$this->load->view('templates/allowance/menu_1_admin');
			$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/local_document/edit_outbound1Person' , $data);
			$this->load->view('allowance_files/local_document/outbound_withdraw_js' , $data);
		}
		
		if($for_type == '2'){		
						
			if($money == '0'){	
				$data['url_preview'] = 'LocalGroup_noWithdraw';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_LocalGroup';
			}			
			$data['money'] = $money;
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,$money,$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_admin');
			$this->load->view('templates/allowance/menu_1_admin');
			$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/local_document/edit_outboundGroup' , $data);
			$this->load->view('allowance_files/local_document/detail2_allowance_js' , $data);
		}	
	}
	//--------------------
	public function modalQuota(){
		
		$user_id = $this->input->post('user_id');
		$quota = 0;
		
		$userDetail = $this->Allowance_model->get_userDetail($user_id);
		foreach($userDetail->result() as $userDetail2){}
		
		$careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
		foreach($careerData->result() as $careerData2){}
							
		$positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
		foreach($positionData->result() as $positionData2){}
		
		$checkQuota = $this->Allowance_model->check_quota($user_id);
	    $numQuota = $checkQuota->num_rows();

	    if($numQuota > 0){

		  foreach($checkQuota->result() as $checkQuota2){}
		  $quota = $checkQuota2->quota;	  	
	    }
		
		$data = $userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.'+'.$careerData2->career.'+'.$positionData2->position.'+'.number_format($quota);
		echo $data;
	}
	//--------------------
	public function do_saveQuota(){
		
		$user_id = $this->input->post('user_id');		
		$user_update = $this->input->post('user_update');		
		
		$checkQuota = $this->Allowance_model->check_quota($user_id);
		$numQuota = $checkQuota->num_rows();
		
		if($numQuota > 0){
			
			foreach($checkQuota->result() as $checkQuota2){}
			
			$data = array(

				"quota"			=> $this->input->post('quota'),													
				"user_update"	=> $user_update,
			);
			$result = $this->Allowance_model->update_vacation($checkQuota2->id,$data,'tbl_user_quota');
			
		} else if($numQuota < 1){
			
			$thisYear = date("Y");
			$date_start2 = $thisYear.'-10-01';
			$nextYear = date('Y', strtotime('+1 year', strtotime($thisYear)));
			$date_end2 = $nextYear.'-09-30';				

			$data = array(

				"user_id"		=> $user_id,
				"quota"			=> $this->input->post('quota'),
				"date_start"   	=> $date_start2,
				"date_end"		=> $date_end2,
				"date_add"		=> date("Y-m-d H:i:s"),											
				"user_update"	=> $user_update,
			);
			$result = $this->Allowance_model->insert_withdraw($data,'tbl_user_quota');			
		}			
		
		echo $result;				
	}
	//---------------------------------------
    public function dosubmit_take(){

		$id_doc = $this->input->post('id');
		$type = $this->input->post('type');

		$result = $this->Allowance_model->dosubmit_take($id_doc,$type);
		echo $result;		
	}
	//---------------------------------------
    public function do_getDataposition(){

		$name2 = $this->input->post('name2');
		$result = $this->Allowance_model->checkName_forGroup($name2);
		echo $result;		
	}
	//-------------------
	public function travelReport($dataID=NULL,$data_doc=NULL,$type_travel=NULL){	
		
		if($type_travel == '1'){
			$data_forType = $this->Allowance_model->get_localData($dataID);
			
		} else if($type_travel == '2'){
			$data_forType = $this->Allowance_model->get_documentData($dataID);
		}
		foreach($data_forType->result() as $data_forType2){};
		
		if($data_forType2->for_type == '1'){
			$data['url'] = base_url().'Printer_controller/Preview_doc/'.$data_doc.'/'.$type_travel;		
			
		} else if($data_forType2->for_type == '2'){
			$data['url'] = base_url().'Printer_controller/Preview_doc_group/'.$data_doc.'/'.$type_travel;
		}
		//$data['dataID'] = $dataID;		

		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('form/detail_form', $data); 
		$this->load->view('form/detail_form_js');
	}
	//-------------------  
	public function check_travelReport(){   

		$dataid = $this->input->post('dataid');
		$remark_4step = $this->input->post('notapproved');
		$check_4step = $this->input->post('check_val');
		$type_travel = $this->input->post('type_travel');
										 
		if($type_travel == '1'){
			$table = 'tbl_local_document';
		
		} else if($type_travel == '2'){
			$table = 'tbl_outbound_document';
		}								 
		
		$result = $this->Allowance_model->do_check_travelReport($dataid,$check_4step,$remark_4step,$table);
		echo $result;		
	}
	//---------------------------------------
	
	
}
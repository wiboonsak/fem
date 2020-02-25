<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Allowance2 extends CI_Controller {

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
				$session_data = array(
					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'user_type'   	=> $resultuser[0]->user_type,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "user"
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
				$session_data = array(
					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'user_type'   	=> $resultuser[0]->user_type,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "approve"
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
					'status'   		=> "admin"

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
			      
			        $email_body    = "<div>".$subject."</div><div>username -->".$data1[0]->user_name."</div><div>new password -->".implode($pass)."</div><div>link login --> ".base_url('allowance/login_user')."</div>"; 

			      
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

			$this->load->view('templates/allowance/header1'); 
			$this->load->view('templates/allowance/menu_null_user'); 
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
				"firstname"		=> $this->input->post('firstname'),
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

	  if (isset($this->session->userdata['logged_in'])) {
	  
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
	  	}
	}
	//--------------------
	public function index1(){

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
	public function create_outbound(){	//คนเดียว ไม่เบิก	
		
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
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}
	//--------------------
	public function outbound_withdraw(){ // คนเดียว เบิก		
		
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '1';		
		
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
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}
	//--------------------
	public function outboundGroup_withdraw($for_type=NULL,$reason_request=NULL){	// คณะ เบิก	  chFor+'/'+chReason  
		
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '1';		
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
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}
	//--------------------
	public function outboundGroup(){  // คณะ ไม่เบิก		
		
		//$chFor = $this->input->post('chFor');				
		$data['money'] = '0';		
		
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
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
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
		
		$this->load->view('templates/allowance/header_user');
		//$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header_new');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/select_outbound'); 
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
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

		$data = array(  
			"data_status"   => '0',
			"user_update" 	=> $this->input->post('id'),
			"chk_authen"	=> $this->input->post('chk_authen')		
		);

		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->edit_allowance($data,$id_allowance);
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

	public function index_admin(){ //pending
		$sql = "SELECT mnall.id_allowance,mnall.type_allow,mnall.footer, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update , user.firstname , user.lastname ,user.telephone,mnall.topic
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				WHERE mnall.data_status = '1' and mnall.check_doc = '2' and mnall.text6 = '1'
				ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);

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

	public function fail_admin(){
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban,mnall.footer, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2 ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.file_Orig2 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic, mnall.remark , user.firstname , user.lastname ,user.telephone,mnall.ref_saraban
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				WHERE mnall.data_status = '1' and mnall.check_doc = '0' and mnall.text6 = '1'
				ORDER BY date_modify ASC"; 
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdata'] = $this->Allowance_model->getdata($sql);
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/faildoc/fail_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/faildoc/fail_admin_js');			
	}

	public function chkstatus_admin(){ //pending
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban,mnall.footer, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic, user.firstname , user.lastname ,user.telephone,mnall.ref_saraban
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.text6 = '1'
				ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdata'] = $this->Allowance_model->getdata($sql); 
		$data['count1'] = $this->Allowance_model->getcountfaildoc();
		$data['count2'] = $this->Allowance_model->getcountpending();
		$data['count3'] = $this->Allowance_model->getcountalldoc(); 
		$data['count4'] = $this->Allowance_model->getcountallmemberallow();   
		 
		$this->load->view('templates/allowance/header_admin');
		$this->load->view('templates/allowance/menu_1_admin');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/chkstatus/chkstatus_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/chkstatus/chkstatus_admin_js');			
	}

	public function detail(){
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
	}

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
		$this->load->view('allowance_files/allowance_admin/detail_notedit/detail',$data); 
		$this->load->view('allowance_files/allowance_admin/detail_notedit/detail_js');
	}

	public function otherdoc(){ 
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban,mnall.footer, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic, user.firstname , user.lastname ,user.telephone,mnall.ref_saraban
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN doc_1 on mnall.id_saraban = doc_1.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.text6 = '1' and mnall.approve_status = '1'
				ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdata'] = $this->Allowance_model->getdata($sql);
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

	/**
	 * 
	 * 
	 * MENU 2
	 * 
	 * 
	 */



	 /**
	 * 
	 * 
	 * MENU 3
	 * 
	 * 
	 */

	public function add_approvers(){ 
		$sql = "SELECT * FROM tbl_user_data where approve = '0' and data_status = '1'"; 
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdatauser'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_3_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_approvers/add_approvers',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_approvers/add_approvers_js'); 
	}

	public function edit_approvers(){ 
		$id_saraban =  $this->uri->segment(3);
		$sql = "SELECT * FROM tbl_user_data where approve = '1' and data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getApprovers'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header1'); 
		$this->load->view('templates/allowance/menu_3_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_approvers/edit_approvers',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_approvers/edit_approvers_js');
	}
	//----------------------------------
	public function all_approvers(){ 
		$id_saraban =  $this->uri->segment(3);
		$sql = "SELECT * FROM tbl_user_data where approve = '1' and data_status = '1'";
		$this->load->model("Allowance_model");
		$data = array();               
		$data['getApprovers'] = $this->Allowance_model->getdata($sql);

		$this->load->view('templates/allowance/header1');
		$this->load->view('templates/allowance/menu_3_admin');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_admin/mn_approvers/all_approvers',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_approvers/all_approvers_js');
	}
	//----------------------------------
	/**
	 * 
	 * 
	 * MENU 4
	 * 
	 * 
	 */

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
	//----------------------------------
	public function all_member(){ 
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
		$this->load->view('allowance_files/allowance_admin/mn_member/all_member',$data); 
		$this->load->view('allowance_files/allowance_admin/mn_member/all_member_js');
	}
	//----------------------------------
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
	//----------------------------------
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


	//--------------------for admin--------------------//
	/******************************Script************************************ */

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


	public function update_approver(){
			$chkprocess = $this->input->post('process');
			if($chkprocess == "add"){
				$data = array(
					"approve"			=> "1",
					"user_update"		=> $this->input->post('userupdate'),
					"chk_authen"		=> $this->input->post('chk')
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
					"data_status" 		=> "0"
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

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic , user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id'])."  and mnall.approve_status = '2'  ORDER BY date_modify ASC"; 
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_0_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_js');			
	}

	public function index_approve1(){ 

		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic, user.firstname , user.lastname ,user.telephone,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				INNER JOIN manage_saraban as mnsa ON mnall.id_saraban = mnsa.id_saraban
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.send_to = ".($this->session->userdata['logged_in']['id'])." and mnall.approve_status = '2'  and mnall.text6 = '0' ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		 
		$this->load->view('templates/allowance/header_approve');
		$this->load->view('templates/allowance/menu_1_approve');
		$this->load->view('templates/allowance/header2'); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_1',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/approve_admin_1_js');			
	}

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
	public function detail_approve(){
		$id_allowance =  $this->uri->segment(3);
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,mnall.budget_datail, mnsa.topic,user.email,mnall.ref_saraban,mnall.command
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
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
		$this->load->view('allowance_files/allowance_admin/approve/edit_approve',$data); 
		$this->load->view('allowance_files/allowance_admin/approve/edit_approve_js');
	}


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

	public function approve_allowance(){

		$id_allowance 	= $this->input->post('id_allowance');

		$data = array(  
			"approve_status"   => $this->input->post('approve_status'),
			"user_update" 	=> $this->input->post('username'),
			"chk_authen"	=> $this->input->post('chk_authen')		
		);

		$this->load->model("Allowance_model"); 
		$result = $this->Allowance_model->edit_allowance($data,$id_allowance);
		echo json_encode($result); 
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
	public function reportBudget(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' AND allowance.approve_status = 1 AND allowance.check_doc = 1 AND allowance.text6 = 1 ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/allowance/header_user'); 
			//$this->load->view('templates/allowance/menu_report_user',$data);
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/report/reportBudget');
			$this->load->view('allowance_files/report/reportBudget_js');

		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
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

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			} else{
				$key = $key.' and allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			}
		}
		

		if( $id != ''){
			if($key==""){
				$key = $key.' allowance.user_create='.$id;
			} else{
				$key = $key.' and allowance.user_create ='.$id;
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

			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE ".$key." AND allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.data_status = '1' ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
            $data['sql']   = $sql;
			
			echo json_encode($data); 
			exit;
	}
	public function get_report_Budget(){

		$key			= "";

		$id 			= $this->input->post('id');
		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
		$dd 			= $this->input->post('dd');
		$mm 			= $this->input->post('mm');
		$yy 			= $this->input->post('yy');

		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			} else{
				$key = $key.' and allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			}
		}


		if( $id != ''){
			if($key==""){
				$key = $key.' allowance.user_create='.$id;
			} else{
				$key = $key.' and allowance.user_create ='.$id;
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

			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic,allowance.text4 FROM manage_allowance as allowance WHERE ".$key." AND allowance.data_status = '1' AND allowance.user_create = ".($this->session->userdata['logged_in']['id'])." AND allowance.approve_status = 1 AND allowance.check_doc = 1 AND allowance.text6 = 1 ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			echo json_encode($data); 
			exit;
	}


	public function admin_report(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE allowance.data_status = '1' ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
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
	public function admin_reportBudget(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE  allowance.data_status = '1' AND allowance.approve_status = 1 AND allowance.check_doc = 1 AND allowance.text6 = 1 ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
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
	public function get_report_admin(){

		$key			= "";

		$typeBudget 	= $this->input->post('typeBudget');
		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
		$dd 			= $this->input->post('dd');
		$mm 			= $this->input->post('mm');
		$yy 			= $this->input->post('yy');
		$checkdoc       = $this->input->post('checkdoc');
		$approve        = $this->input->post('approve');

		$user_create     = $this->input->post('user_create');

		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			} else{
				$key = $key.' and allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			}
		}


		
			if($key==""){
				$key = $key." allowance.data_status = '1'";
			} else{
				$key = $key." and allowance.data_status = '1'";
			}


		if($user_create != '0'){
			if($key==""){
				$key = $key.' allowance.user_create ='.$user_create;
			} else{
				$key = $key.' and allowance.user_create ='.$user_create;
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

			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance WHERE ".$key." ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
          //  $data['sql']  = $sql;
			
			echo json_encode($data); 
			exit;
	}
	public function get_report_Budget_admin(){

		$key			= "";

		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
		$dd 			= $this->input->post('dd');
		$mm 			= $this->input->post('mm');
		$yy 			= $this->input->post('yy');

		$user_create     = $this->input->post('user_create');

		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			} else{
				$key = $key.' and allowance.date_add BETWEEN "'.$date1.'" AND  "'.$date2.'"';
			}
		}

		if($key==""){
				$key = $key." allowance.data_status = '1'";
			} else{
				$key = $key." and allowance.data_status = '1'";
		}

		if($user_create != '0'){
			if($key==""){
				$key = $key.' allowance.user_create ='.$user_create;
			} else{
				$key = $key.' and allowance.user_create ='.$user_create;
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

			$sql = "SELECT DISTINCT allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic,allowance.text4 FROM manage_allowance as allowance WHERE ".$key." AND allowance.approve_status = 1 AND allowance.check_doc = 1 AND allowance.text6 = 1 ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 

			$data=array();              
            $data['allow'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			echo json_encode($data); 
			exit;
	}
	//--------------------
	public function modal_listName(){		
		
		$name = $this->input->post('name');	
		$career_id = $this->input->post('career_id');	
		$position_id = $this->input->post('position_id');	
		$position_number = $this->input->post('position_number'); ?>

		<div class="form-group">
			<label for="date_office" class="col-sm-3 control-label">วันที่เดินทางออกจากสำนักงาน</label>
			<div class="col-sm-5">
				<div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="dayoffice" name="dayoffice" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='dayoffice_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 120px;padding-left: 0px">
                                                       <select   id="monthoffice" name="monthoffice" style="font-size: 14px;">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monthoffice_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearoffice" name="yearoffice" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearoffice_error'></span>		
								</div>
			</div>
		</div>

		<div class="form-group">
			<label for="date_office2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงสำนักงาน</label>
			<div class="col-sm-5">
				<div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="dayoffice2" name="dayoffice2" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='dayoffice2_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 120px;padding-left: 0px">
                                                       <select   id="monthoffice2" name="monthoffice2" style="font-size: 14px">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monthoffice2_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearoffice2" name="yearoffice2" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearoffice2_error'></span>		
								</div>
			</div>
		</div>

		<div class="form-group">
			<label for="date_thailand" class="col-sm-3 control-label">วันที่เดินทางออกจากประเทศไทย</label>
			<div class="col-sm-5">
				<div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="daythailand" name="daythailand" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='daythailand_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 120px;padding-left: 0px">
                                                       <select   id="monththailand" name="monththailand" style="font-size: 14px">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monththailand_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearthailand" name="yearthailand" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearthailand_error'></span>		
								</div>
			</div>
		</div>

		<div class="form-group">
			<label for="date_thailand2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงประเทศไทย</label>
			
				<div class="col-sm-5">
				<div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="daythailand2" name="daythailand2" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='daythailand2_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 120px;padding-left: 0px">
                                                       <select   id="monththailand2" name="monththailand2" style="font-size: 14px">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monththailand2_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearthailand2" name="yearthailand2" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearthailand2_error'></span>		
								</div>
			</div>
			
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">รายชื่อผู้เดินทาง</label>			
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label><input type="checkbox" id="vacation" name="vacationAll" value="1" onClick="select_listName(this.checked,'1','date_vacationA')">ทุกคน</label>
				</div>		
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control input-data checkName" id="date_vacationA" name="date_vacationA" placeholder="ตัวอย่าง 10 ม.ค. 2562 , 15 ม.ค. 2562 หรือ 10-12 ม.ค. 2562" >
			</div>
		</div>

		<?php 	$numName = 1; $arrCount =0;
				foreach($name AS $name2){
            		
					if($name2 != ''){
		?>
		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label><input type="checkbox" id="vacation<?php echo $arrCount?>" name="vacation[]" class="checkName" onClick="select_listName(this.checked,'2','date_vacation<?php echo $arrCount?>')" value="<?php echo $name2?>" ><?php echo $numName.'. '.$name2?></label>
				</div>				
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control input-data checkName" id="date_vacation<?php echo $arrCount?>" name="date_vacation[]" placeholder="ตัวอย่าง 10 ม.ค. 2562 , 15 ม.ค. 2562 หรือ 10-12 ม.ค. 2562" onChange="keyInput_changeCheckbox('<?php echo $arrCount?>',this.value)" >
			</div>
		</div>
		<?php $numName++;  $arrCount++; }  } 
				
	}
	//--------------------
	public function modal_listNamelocal(){		
		
		$name = $this->input->post('name');	
		$career_id = $this->input->post('career_id');	
		$position_id = $this->input->post('position_id');	
		$position_number = $this->input->post('position_number'); ?>

		<div class="form-group">
			<label for="date_office" class="col-sm-3 control-label">วันที่เดินทางออกจากสำนักงาน</label>
			<div class="col-sm-5">
				<div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="dayoffice" name="dayoffice" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='dayoffice_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 120px;padding-left: 0px">
                                                       <select   id="monthoffice" name="monthoffice" style="font-size: 14px;">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monthoffice_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearoffice" name="yearoffice" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearoffice_error'></span>		
								</div>
			</div>
		</div>

		<div class="form-group">
			<label for="date_office2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงสำนักงาน</label>
			<div class="col-sm-5">
				<div class="col-sm-3" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="dayoffice2" name="dayoffice2" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='dayoffice2_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" style="width: 120px;padding-left: 0px">
                                                       <select   id="monthoffice2" name="monthoffice2" style="font-size: 14px">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monthoffice2_error'></span>
                                                                </div>
                                                                <div class="col-sm-4" >
                                                       <select   id="yearoffice2" name="yearoffice2" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearoffice2_error'></span>		
								</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">รายชื่อผู้เดินทาง</label>			
		</div>

		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label><input type="checkbox" id="vacation" name="vacationAll" value="1" onClick="select_listName(this.checked,'1','date_vacationA')">ทุกคน</label>
				</div>		
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control input-data checkName" id="date_vacationA" name="date_vacationA" placeholder="ตัวอย่าง 10 ม.ค. 2562 , 15 ม.ค. 2562 หรือ 10-12 ม.ค. 2562" >
			</div>
		</div>

		<?php 	$numName = 1; $arrCount =0;
				foreach($name AS $name2){
            		
					if($name2 != ''){
		?>
		<div class="form-group">
			<div class="col-sm-2"></div>
			<div class="col-sm-3">
				<div class="checkbox">
					<label><input type="checkbox" id="vacation<?php echo $arrCount?>" name="vacation[]" class="checkName" onClick="select_listName(this.checked,'2','date_vacation<?php echo $arrCount?>')" value="<?php echo $name2?>" ><?php echo $numName.'. '.$name2?></label>
				</div>				
			</div>
			<div class="col-sm-7">
				<input type="text" class="form-control input-data checkName" id="date_vacation<?php echo $arrCount?>" name="date_vacation[]" placeholder="ตัวอย่าง 10 ม.ค. 2562 , 15 ม.ค. 2562 หรือ 10-12 ม.ค. 2562" onChange="keyInput_changeCheckbox('<?php echo $arrCount?>',this.value)" >
			</div>
		</div>
		<?php $numName++;  $arrCount++; }  } 
				
	}
	//------------------- 
	public function saveData_outbound(){	
		
		$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		$date_create = date("Y-m-d");
		$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = $this->input->post('vacationAll');
		
		if($vacation == ''){ $vacation = '0'; }
		if($all_vacation == ''){ $all_vacation = '0'; }			
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
//		} else {
//			
//			$totalPrice = $this->input->post('total_price');
//		}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
                
                $daythailand = $this->input->post('daythailand');
                $monththailand = $this->input->post('monththailand');
                $yearthailand = $this->input->post('yearthailand');
                $date_thailand = $yearthailand.'-'.$monththailand.'-'.$daythailand;
                
                $daythailand2 = $this->input->post('daythailand2');
                $monththailand2 = $this->input->post('monththailand2');
                $yearthailand2 = $this->input->post('yearthailand2');
                $date_thailand2 = $yearthailand2.'-'.$monththailand2.'-'.$daythailand2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			"date_create" 		=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"group_name" 		=> $this->input->post('group_name'),
			"number_people" 	=> $this->input->post('number_people'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> '0',
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"date_thailand" 	=> $date_thailand,			
			"date_thailand2" 	=> $date_thailand2,			
			"all_vacation" 		=> $all_vacation,			
			"date_add"			=> $date_add,			
		);

		$this->load->model("Allowance_model");
		$document_id = $this->Allowance_model->insert_allowance($data);		
				
		if($for_type == '2'){
			
			$num_tr = $this->input->post('num_tr');			
			if($num_tr > 0){
				
				for($x=1; $x <= $num_tr; $x++){	
					
					$position = $this->input->post('position_id')[$x];
					
					if($position != ''){
						$position2 = $this->Allowance_model->get_position($position);
						foreach($position2->result() as $position3){}
						$position_txt = $position3->position;
					
					} else {
						
						$position_txt ='';
					}	
					
					if($vacation != '0'){				
					
					if($all_vacation != '0'){	
						
						$vacation2 = $all_vacation;	
					
						$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							"date_add"			=> $date_add,			
						);	
						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');
						
						$dataVacation = array(

							"document_id"		=> $document_id,
							"grouplist_id"		=> $grouplist_id,
							"name"   			=> $this->input->post('name')[$x],
							"date_vacation"		=> $this->input->post('date_vacationA'),
							"type_travel"		=> '2',											
							"user_update"		=> $user_create,
						);
						$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');
					
					} else {						
						
						$vacation2 = $all_vacation;	
					
						$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							"date_add"			=> $date_add,			
						);	
						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');	
						$name_vacation = $this->input->post('vacation');						
						$date_vacation = $this->input->post('date_vacation');						
							
						if(in_array($this->input->post('name')[$x], $name_vacation)){				
							
							$keys_nameVacation = array_search($this->input->post('name')[$x],$name_vacation);
							
							$date_vacation = array_values(array_filter($date_vacation));		
						
							$dataVacation = array(

								"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
								"date_vacation"		=> $date_vacation[$keys_nameVacation],
								"type_travel"		=> '2',											
								"user_update"		=> $user_create,
							);
							
							$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');			
							
							$dataUpdate = array(  "vacation" => '1', );		
							$this->Allowance_model->update_vacation($grouplist_id, $dataUpdate, 'tbl_group_listName');
						}					
					}					
					} else {
						
						$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> '0',					
							"date_add"			=> $date_add,			
						);						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');	
					}					
				}							
			}	
		}		
				
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
			if(($total_price != '') && ($total_price > 0)){	
				
				$total_price = str_replace(",", "", $total_price);			
				$data3 = array(

					"document_id"			=> $document_id,
					"type_travel"			=> '2',
					"allowance1_days"		=> $this->input->post('allowance1_days'),
					"allowance2_days"   	=> $this->input->post('allowance2_days'),
					"allowance1_baht"		=> $this->input->post('allowance1_baht'),
					"allowance2_baht"		=> $this->input->post('allowance2_baht'),
					"accommodation1_days"	=> $this->input->post('accommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('accommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('accommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('accommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('allowance1_total'),
					"allowance2_total" 		=> $this->input->post('allowance2_total'),
					"accommodation1_total" 	=> $this->input->post('accommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('accommodation2_total'),
					"passage_baht" 			=> $this->input->post('passage_baht'),
					"other_text" 			=> $this->input->post('other_text'),
					"other_baht" 			=> $this->input->post('other_baht'),
					"total_price" 			=> $total_price,
					"user_update" 			=> $user_create,					
					"date_add"				=> $date_add,			
				);
				$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');				
			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					"document_id"			=> $document_id,
					"type_travel"			=> '1',
					"allowance1_days"		=> $this->input->post('Nallowance1_days'),
					"allowance2_days"   	=> $this->input->post('Nallowance2_days'),
					"allowance1_baht"		=> $this->input->post('Nallowance1_baht'),
					"allowance2_baht"		=> $this->input->post('Nallowance2_baht'),				
					"accommodation1_days"	=> $this->input->post('Naccommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('Naccommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('Naccommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('Naccommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('Nallowance1_total'),
					"allowance2_total" 		=> $this->input->post('Nallowance2_total'),
					"accommodation1_total" 	=> $this->input->post('Naccommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('Naccommodation2_total'),
					"passage_baht" 			=> $this->input->post('Npassage_baht'),
					"other_text" 			=> $this->input->post('Nother_text'),
					"other_baht" 			=> $this->input->post('Nother_baht'),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					"date_add"				=> $date_add,			
				);

				$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');	
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function editData_outbound($document_id=NULL){	
		
		//$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		//$date_create = date("Y-m-d");
		//$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = $this->input->post('vacationAll');
		
		if($vacation == ''){ $vacation = '0'; }
		if($all_vacation == ''){ $all_vacation = '0'; }			
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
//		} else {
//			
//			$totalPrice = $this->input->post('total_price');
//			$totalPrice = str_replace(",", "", $totalPrice);
//		}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
                
                $daythailand = $this->input->post('daythailand');
                $monththailand = $this->input->post('monththailand');
                $yearthailand = $this->input->post('yearthailand');
                $date_thailand = $yearthailand.'-'.$monththailand.'-'.$daythailand;
                
                $daythailand2 = $this->input->post('daythailand2');
                $monththailand2 = $this->input->post('monththailand2');
                $yearthailand2 = $this->input->post('yearthailand2');
                $date_thailand2 = $yearthailand2.'-'.$monththailand2.'-'.$daythailand2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			//"date_create" 		=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"group_name" 		=> $this->input->post('group_name'),
			"number_people" 	=> $this->input->post('number_people'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> '0',
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"date_thailand" 	=> $date_thailand,			
			"date_thailand2" 	=> $date_thailand2,			
			"all_vacation" 		=> $all_vacation,			
			//"date_add"			=> $date_add,			
		);

		$this->load->model("Allowance_model");
		//$document_id = $this->Allowance_model->insert_allowance($data);		
		$this->Allowance_model->update_allowance($data,$document_id);	
				
		if($for_type == '2'){
			
			$num_tr = $this->input->post('num_tr');			
			if($num_tr > 0){
				
				for($x=1; $x <= $num_tr; $x++){	
					
					$position = $this->input->post('position_id')[$x];
					
					if($position != ''){
						$position2 = $this->Allowance_model->get_position($position);
						foreach($position2->result() as $position3){}
						$position_txt = $position3->position;
					
					} else {
						
						$position_txt ='';
					}	
					
					if($vacation != '0'){				
					
					if($all_vacation != '0'){	
						
						$vacation2 = $all_vacation;	
						$id_listName = $this->input->post('id_listName')[$x];
					
						/*$data2 = array(

							//"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							//"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							//"date_add"			=> $date_add,			
						);*/
						
						if($id_listName == 'x'){
							
							$data2 = array(

								"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								"type_travel" 		=> '2',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								"date_add"			=> $date_add,			
							);
							$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');
						
						} else {
							
							$data2 = array(
								//"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								//"type_travel" 		=> '2',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								//"date_add"			=> $date_add,			
							);							
							$grouplist_id = $this->Allowance_model->edit_txt_listName($document_id, $data2, $id_listName, 'id', 'tbl_group_listName');
						}						
						
						/*$dataVacation = array(

							//"document_id"		=> $document_id,
							"grouplist_id"		=> $grouplist_id,
							"name"   			=> $this->input->post('name')[$x],
							"date_vacation"		=> $this->input->post('date_vacationA'),
							//"type_travel"		=> '2',											
							"user_update"		=> $user_create,
						);*/
						
						if($id_listName == 'x'){
							
							$dataVacation = array(

								"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('name')[$x],
								"date_vacation"		=> $this->input->post('date_vacationA'),
								"type_travel"		=> '2',											
								"user_update"		=> $user_create,
							);
							$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');
							
						} else {
							
							$dataVacation = array(

								//"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('name')[$x],
								"date_vacation"		=> $this->input->post('date_vacationA'),
								//"type_travel"		=> '2',											
								"user_update"		=> $user_create,
							);
							
							$this->Allowance_model->edit_txt_listName($document_id, $dataVacation, $id_listName, 'grouplist_id', 'tbl_vacation_data');
						}
					
					} else {						
						
						$vacation2 = $all_vacation;				
					
						/*$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							"date_add"			=> $date_add,			
						);	
						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');*/
						
						if($id_listName == 'x'){
							
							$data2 = array(

								"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								"type_travel" 		=> '2',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								"date_add"			=> $date_add,			
							);
							$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');
						
						} else {
							
							$data2 = array(
								//"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								//"type_travel" 		=> '2',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								//"date_add"			=> $date_add,			
							);							
							$grouplist_id = $this->Allowance_model->edit_txt_listName($document_id, $data2, $id_listName, 'id', 'tbl_group_listName');
						}						
						
						$name_vacation = $this->input->post('vacation');						
						$date_vacation = $this->input->post('date_vacation');						
							
						if(in_array($this->input->post('name')[$x], $name_vacation)){						
							
							$keys_nameVacation = array_search($this->input->post('name')[$x],$name_vacation);	
							$date_vacation = array_values(array_filter($date_vacation));						
							
							/*$dataVacation = array(

								"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
								"date_vacation"		=> $date_vacation[$keys_nameVacation],
								"type_travel"		=> '2',											
								"user_update"		=> $user_create,
							);							
							$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');*/		
							
							if($id_listName == 'x'){
							
								$dataVacation = array(

									"document_id"		=> $document_id,
									"grouplist_id"		=> $grouplist_id,
									"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
									"date_vacation"		=> $date_vacation[$keys_nameVacation],
									"type_travel"		=> '2',											
									"user_update"		=> $user_create,
								);
								$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');

							} else {

								$dataVacation = array(

									//"document_id"		=> $document_id,
									"grouplist_id"		=> $grouplist_id,
									"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
									"date_vacation"		=> $date_vacation[$keys_nameVacation],
									//"type_travel"		=> '2',											
									"user_update"		=> $user_create,
								);

								$this->Allowance_model->edit_txt_listName($document_id, $dataVacation, $id_listName, 'grouplist_id', 'tbl_vacation_data');
							}						
							
							$dataUpdate = array(  "vacation" => '1', );		
							$this->Allowance_model->update_vacation($grouplist_id, $dataUpdate, 'tbl_group_listName');
						}						
					}					
					} else {
						
						$data2 = array(
							//"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							//"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation,					
							//"date_add"			=> $date_add,			
						);							
						$grouplist_id = $this->Allowance_model->edit_txt_listName($document_id, $data2, $this->input->post('id_listName')[$x], 'id', 'tbl_group_listName');						
					}				
				}							
			}	
		}		
				
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
			if(($total_price != '') && ($total_price > 0)){	
				
				$total_price = str_replace(",", "", $total_price);			
				$data3 = array(

					//"document_id"			=> $document_id,
					//"type_travel"			=> '2',
					"allowance1_days"		=> str_replace(",", "", $this->input->post('allowance1_days')),
					"allowance2_days"   	=> str_replace(",", "", $this->input->post('allowance2_days')),
					"allowance1_baht"		=> str_replace(",", "", $this->input->post('allowance1_baht')),
					"allowance2_baht"		=> str_replace(",", "", $this->input->post('allowance2_baht')),
					"accommodation1_days"	=> str_replace(",", "", $this->input->post('accommodation1_days')),
					"accommodation2_days" 	=> str_replace(",", "", $this->input->post('accommodation2_days')),
					"accommodation1_baht" 	=> str_replace(",", "", $this->input->post('accommodation1_baht')),
					"accommodation2_baht" 	=> str_replace(",", "", $this->input->post('accommodation2_baht')),
					"allowance1_total" 		=> str_replace(",", "", $this->input->post('allowance1_total')),
					"allowance2_total" 		=> str_replace(",", "", $this->input->post('allowance2_total')),
					"accommodation1_total" 	=> str_replace(",", "", $this->input->post('accommodation1_total')),
					"accommodation2_total" 	=> str_replace(",", "", $this->input->post('accommodation2_total')),
					"passage_baht" 			=> str_replace(",", "", $this->input->post('passage_baht')),
					"other_text" 			=> str_replace(",", "", $this->input->post('other_text')),
					"other_baht" 			=> str_replace(",", "", $this->input->post('other_baht')),
					"total_price" 			=> $total_price,
					"user_update" 			=> $user_create,					
					//"date_add"				=> $date_add,			
				);
				//$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');				
				$this->Allowance_model->update_withdraw($document_id,$data3,'tbl_withdraw_data','2');
			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					//"document_id"			=> $document_id,
					//"type_travel"			=> '1',
					"allowance1_days"		=> str_replace(",", "", $this->input->post('Nallowance1_days')),
					"allowance2_days"   	=> str_replace(",", "", $this->input->post('Nallowance2_days')),
					"allowance1_baht"		=> str_replace(",", "", $this->input->post('Nallowance1_baht')),
					"allowance2_baht"		=> str_replace(",", "", $this->input->post('Nallowance2_baht')),
					"accommodation1_days"	=> str_replace(",", "", $this->input->post('Naccommodation1_days')),
					"accommodation2_days" 	=> str_replace(",", "", $this->input->post('Naccommodation2_days')),
					"accommodation1_baht" 	=> str_replace(",", "", $this->input->post('Naccommodation1_baht')),
					"accommodation2_baht" 	=> str_replace(",", "", $this->input->post('Naccommodation2_baht')),
					"allowance1_total" 		=> str_replace(",", "", $this->input->post('Nallowance1_total')),
					"allowance2_total" 		=> str_replace(",", "", $this->input->post('Nallowance2_total')),
					"accommodation1_total" 	=> str_replace(",", "", $this->input->post('Naccommodation1_total')),
					"accommodation2_total" 	=> str_replace(",", "", $this->input->post('Naccommodation2_total')),
					"passage_baht" 			=> str_replace(",", "", $this->input->post('Npassage_baht')),
					"other_text" 			=> str_replace(",", "", $this->input->post('Nother_text')),
					"other_baht" 			=> str_replace(",", "", $this->input->post('Nother_baht')),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					//"date_add"				=> $date_add,			
				);
				//$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');
				$this->Allowance_model->update_withdraw($document_id,$data4,'tbl_withdraw_data','1');
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function save_outboundWithdraw(){
			
		$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		$date_create = date("Y-m-d");
		$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = '0';
		$select_checkbox = '0';
		$numSelect_checkbox = count($this->input->post('select_checkbox'));
		
		if($numSelect_checkbox == 1){
			
			$select_checkbox = $this->input->post('select_checkbox')[0];			
		}
		if($numSelect_checkbox == 2){
			
			$select_checkbox = '4';			
		}		
		if($vacation == ''){ $vacation = '0'; }
		
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
//		} else {
//			
//			$totalPrice = $this->input->post('total_price');
//		}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
                
                $daythailand = $this->input->post('daythailand');
                $monththailand = $this->input->post('monththailand');
                $yearthailand = $this->input->post('yearthailand');
                $date_thailand = $yearthailand.'-'.$monththailand.'-'.$daythailand;
                
                $daythailand2 = $this->input->post('daythailand2');
                $monththailand2 = $this->input->post('monththailand2');
                $yearthailand2 = $this->input->post('yearthailand2');
                $date_thailand2 = $yearthailand2.'-'.$monththailand2.'-'.$daythailand2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			"date_create" 		=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> $select_checkbox,
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"date_thailand" 	=> $date_thailand,			
			"date_thailand2" 	=> $date_thailand2,			
			"all_vacation" 		=> $all_vacation,			
			"date_add"			=> $date_add,			
		);

		$this->load->model("Allowance_model");
		$document_id = $this->Allowance_model->insert_allowance($data);	
		
		if($vacation != '0'){		
		
			$dataVacation = array(

				"document_id"		=> $document_id,
				"grouplist_id"		=> '0',
				"name"   			=> $this->input->post('name_surname'),
				"date_vacation"		=> $this->input->post('date_vacation'),
				"type_travel"		=> '2',											
				"user_update"		=> $user_create,
			);
			$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');		
		}
					
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
			if(($total_price != '') && ($total_price > 0)){	
				
				$total_price = str_replace(",", "", $total_price);			
				$data3 = array(

					"document_id"			=> $document_id,
					"type_travel"			=> '2',
					"allowance1_days"		=> $this->input->post('allowance1_days'),
					"allowance2_days"   	=> $this->input->post('allowance2_days'),
					"allowance1_baht"		=> $this->input->post('allowance1_baht'),
					"allowance2_baht"		=> $this->input->post('allowance2_baht'),
					"accommodation1_days"	=> $this->input->post('accommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('accommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('accommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('accommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('allowance1_total'),
					"allowance2_total" 		=> $this->input->post('allowance2_total'),
					"accommodation1_total" 	=> $this->input->post('accommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('accommodation2_total'),
					"passage_baht" 			=> $this->input->post('passage_baht'),
					"other_text" 			=> $this->input->post('other_text'),
					"other_baht" 			=> $this->input->post('other_baht'),
					"total_price" 			=> $total_price,
					"user_update" 			=> $user_create,					
					"date_add"				=> $date_add,			
				);
				$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');				
			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					"document_id"			=> $document_id,
					"type_travel"			=> '1',
					"allowance1_days"		=> $this->input->post('Nallowance1_days'),
					"allowance2_days"   	=> $this->input->post('Nallowance2_days'),
					"allowance1_baht"		=> $this->input->post('Nallowance1_baht'),
					"allowance2_baht"		=> $this->input->post('Nallowance2_baht'),				
					"accommodation1_days"	=> $this->input->post('Naccommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('Naccommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('Naccommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('Naccommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('Nallowance1_total'),
					"allowance2_total" 		=> $this->input->post('Nallowance2_total'),
					"accommodation1_total" 	=> $this->input->post('Naccommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('Naccommodation2_total'),
					"passage_baht" 			=> $this->input->post('Npassage_baht'),
					"other_text" 			=> $this->input->post('Nother_text'),
					"other_baht" 			=> $this->input->post('Nother_baht'),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					"date_add"				=> $date_add,			
				);

				$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');	
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function edit_outboundWithdraw($document_id=NULL){
			
		//$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		$date_create = date("Y-m-d");
		$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = '0';
		$select_checkbox = '0';
		$numSelect_checkbox = count($this->input->post('select_checkbox'));
		
		
		
		if($numSelect_checkbox == 1){
			
			$select_checkbox = $this->input->post('select_checkbox')[0];			
		}
		if($numSelect_checkbox == 2){
			
			$select_checkbox = '4';			
		}		
		if($vacation == ''){		
			
			$vacation = '0';
			$date_office = '';
			$date_office2 = '';
								
		}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
                
                $daythailand = $this->input->post('daythailand');
                $monththailand = $this->input->post('monththailand');
                $yearthailand = $this->input->post('yearthailand');
                $date_thailand = $yearthailand.'-'.$monththailand.'-'.$daythailand;
                
                $daythailand2 = $this->input->post('daythailand2');
                $monththailand2 = $this->input->post('monththailand2');
                $yearthailand2 = $this->input->post('yearthailand2');
                $date_thailand2 = $yearthailand2.'-'.$monththailand2.'-'.$daythailand2;
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
//		} else {
//			
//			$totalPrice = $this->input->post('total_price');
//			$totalPrice = str_replace(",", "", $totalPrice);
//		}
			
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			//"date_create" 	=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> $select_checkbox,
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"date_thailand" 	=> $date_thailand,			
			"date_thailand2" 	=> $date_thailand2,			
			"all_vacation" 		=> $all_vacation,			
			//"date_add"		=> $date_add,			
		);

		$this->load->model("Allowance_model");
		//$document_id = $this->Allowance_model->insert_allowance($data);	
		$this->Allowance_model->update_allowance($data,$document_id);	
		
		if($vacation != '0'){
			
			$num_vacation = $this->Allowance_model->get_vacation($document_id,'2',$user_create);
			$num_vacation2 = $num_vacation->num_rows();
			
			if($num_vacation2 > 0){
				
				$dataVacation = array(

					//"document_id"		=> $document_id,
					"grouplist_id"		=> '0',
					"name"   			=> $this->input->post('name_surname'),
					"date_vacation"		=> $this->input->post('date_vacation'),
					//"type_travel"		=> '2',											
					"user_update"		=> $user_create,
				);
							
				$this->Allowance_model->edit_txt_listName($document_id, $dataVacation, '0', 'grouplist_id', 'tbl_vacation_data');				
			
			} else {
		
				$dataVacation = array(

					"document_id"		=> $document_id,
					"grouplist_id"		=> '0',
					"name"   			=> $this->input->post('name_surname'),
					"date_vacation"		=> $this->input->post('date_vacation'),
					"type_travel"		=> '2',											
					"user_update"		=> $user_create,
				);
				$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');	
			}			
		} else if($vacation == '0'){
			
			$num_vacation = $this->Allowance_model->get_vacation($document_id,'2',$user_create);
			$num_vacation2 = $num_vacation->num_rows();
			
			if($num_vacation2 > 0){
				
				$this->Allowance_model->do_removeFromVacation('0',$document_id);			
			}			
		}
					
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
			if(($total_price != '') && ($total_price > 0)){	
				
				$total_price = str_replace(",", "", $total_price);			
				$data3 = array(

					//"document_id"			=> $document_id,
					//"type_travel"			=> '2',
					"allowance1_days"		=> $this->input->post('allowance1_days'),
					"allowance2_days"   	=> $this->input->post('allowance2_days'),
					"allowance1_baht"		=> $this->input->post('allowance1_baht'),
					"allowance2_baht"		=> $this->input->post('allowance2_baht'),
					"accommodation1_days"	=> $this->input->post('accommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('accommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('accommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('accommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('allowance1_total'),
					"allowance2_total" 		=> $this->input->post('allowance2_total'),
					"accommodation1_total" 	=> $this->input->post('accommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('accommodation2_total'),
					"passage_baht" 			=> $this->input->post('passage_baht'),
					"other_text" 			=> $this->input->post('other_text'),
					"other_baht" 			=> $this->input->post('other_baht'),
					"total_price" 			=> $total_price,
					"user_update" 			=> $user_create,					
					//"date_add"				=> $date_add,			
				);
				//$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');
				$this->Allowance_model->update_withdraw($document_id,$data3,'tbl_withdraw_data','2');
			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					//"document_id"			=> $document_id,
					//"type_travel"			=> '1',
					"allowance1_days"		=> $this->input->post('Nallowance1_days'),
					"allowance2_days"   	=> $this->input->post('Nallowance2_days'),
					"allowance1_baht"		=> $this->input->post('Nallowance1_baht'),
					"allowance2_baht"		=> $this->input->post('Nallowance2_baht'),				
					"accommodation1_days"	=> $this->input->post('Naccommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('Naccommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('Naccommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('Naccommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('Nallowance1_total'),
					"allowance2_total" 		=> $this->input->post('Nallowance2_total'),
					"accommodation1_total" 	=> $this->input->post('Naccommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('Naccommodation2_total'),
					"passage_baht" 			=> $this->input->post('Npassage_baht'),
					"other_text" 			=> $this->input->post('Nother_text'),
					"other_baht" 			=> $this->input->post('Nother_baht'),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					//"date_add"				=> $date_add,			
				);
				//$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');
				$this->Allowance_model->update_withdraw($document_id,$data4,'tbl_withdraw_data','1');
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function detailOutbound($money=NULL,$for_type=NULL,$document_id=NULL){		
		
		//$money = $this->uri->segment(3); 
		//$document_id = $this->uri->segment(5);
		$user_create = $this->session->userdata['logged_in']['id'];   
		
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

			$this->load->view('templates/allowance/header_user');
			//$this->load->view('templates/allowance/menu_create2_user');
			$this->load->view('templates/allowance/header_new');
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

			$this->load->view('templates/allowance/header_user');
			//$this->load->view('templates/allowance/menu_create2_user');
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/allowance_user/edit_outboundGroup' , $data);
			$this->load->view('allowance_files/allowance_user/detail2_allowance_js' , $data);
		}		
	} 
    //------------------- 
	public function detailLocal($money=NULL,$for_type=NULL,$document_id=NULL){		
		
		//$money = $this->uri->segment(3); 
		//$document_id = $this->uri->segment(5);
		$user_create = $this->session->userdata['logged_in']['id'];   
		
		if($for_type == '1'){ 
			
			if($money == '0'){	
				$data['url_preview'] = 'preview_Local';
			
			} else if($money == '1'){			
			
				$data['url_preview'] = 'preview_LocalWithdraw';
			}		
			$data['money'] = $money;
            $data['for_type'] = $for_type;
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,$money,$user_create);
			//$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_user');
			//$this->load->view('templates/allowance/menu_create2_user');
			$this->load->view('templates/allowance/header_new');
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
			$data['for_type'] = $for_type;
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,$money,$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawNum'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['withdrawData_out'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->view('templates/allowance/header_user');
			//$this->load->view('templates/allowance/menu_create2_user');
			$this->load->view('templates/allowance/header_new');
			$this->load->view('templates/allowance/header2');

			$this->load->view('allowance_files/local_document/edit_outboundGroup' , $data);
			$this->load->view('allowance_files/local_document/detail2_allowance_js' , $data);
		}		
	} 
	//-------------------
	public function removeFromListName(){
		
		$listName_id = $this->input->post('listName_id');		
		$document_id = $this->input->post('document_id');
		$vacation = $this->input->post('vacation');
		
		$action1 = $this->Allowance_model->do_removeFromListName($listName_id,$document_id);
		
		if($vacation == '1'){
			
			$action1 = $this->Allowance_model->do_removeFromVacation($listName_id,$document_id);
		}
		echo $action1;		
	}
	//-------------------
	public function remove_vacationList(){  
		
		//$vacation_id = $this->input->post('vacation_id');		
		$grouplist_id = $this->input->post('grouplist_id');
		$document_id = $this->input->post('document_id');
		$type = $this->input->post('type');
		
		if($type == '2'){
										  
			$action1 = $this->Allowance_model->do_removeFromVacation($grouplist_id,$document_id);

			if($action1 == '2'){

				$action1 = $this->Allowance_model->update_listName($listName_id,$document_id);
			}		
			echo $action1;	
		
		}		
		if($type == '1'){
										  
			$action1 = $this->Allowance_model->do_removeFromVacation($grouplist_id,$document_id);

			if($action1 == '2'){

				$action1 = $this->Allowance_model->update_listName($listName_id,$document_id);
			}		
			echo $action1;	
		
		}
	}	
	//-------------------  
	public function do_submit_andSend(){
		
		$document_id = $this->input->post('document_id');		
		$subject_document = $this->input->post('subject_document');		
		$withdraw = $this->input->post('withdraw');		
		$withdrawNum = $this->input->post('withdrawNum');		
		$num_withdrawDataOut = $this->input->post('num_withdrawDataOut');		
		$num_withdrawData = $this->input->post('num_withdrawData');
		$user_create = $this->session->userdata['logged_in']['id'];
		$subject_doc2 = '';
		$saraban_id2 = '';
		$saraban_number2 = '';
		$this->load->model("Saraban_model");
		
		if($withdraw == '1'){
			
			if(($withdrawNum == 1) && ($num_withdrawData > 0)){
					
				$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
				
			} else if(($withdrawNum == 1) && ($num_withdrawDataOut > 0)){
					
				$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';
				
			} else if($withdrawNum == 2){
					
				$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
			}
		}
		
        $maxcount = $this->Saraban_model->maxcount('0','1');		
        $maxcount1 = $maxcount + 1;
        $loop = 4 - strlen($maxcount1);
		$x = '';
        for($i = 1; $i <= $loop; $i++){
            $x = $x."0";
		}
		$maxcount2 = 'มอ 820/'.$x.$maxcount1;	 
        
		$data = array(  
			"in_out"   		   	=> '1',
			"circular_letter"  	=> '0',
			"id_saraban"   		=> $maxcount2,
			"count_saraban"   	=> $maxcount1,
			"firstname"   		=> $this->session->userdata['logged_in']['firstname'],
			"lastname"    		=> $this->session->userdata['logged_in']['lastname'],
			"chk_authen" 		=> $this->session->userdata['logged_in']['status'],
			"user_update" 		=> $user_create,
			"user_create" 		=> $user_create, 
			"topic" 			=> $subject_document,
			"date_add"      	=> date("Y-m-d H:i:sa")
		);		
		$result = $this->Saraban_model->insert_topic($data,$user_create,'2');
		$saraban_id = $this->Saraban_model->explode_sarabanNumber($result,'1');
		$saraban_number = $this->Saraban_model->explode_sarabanNumber($result,'0');		
		
		if($withdraw == '1'){
			
			//$maxcount3 = $this->Saraban_model->maxcount();
			//$maxcount4 = $maxcount3 + 1;
			$maxcount4 = $maxcount1 + 1;
			$loop = 4 - strlen($maxcount4);
			$x = '';
			for($i = 1; $i <= $loop; $i++){
				$x = $x."0";
			}
			$maxcount5 = 'มอ 820/'.$x.$maxcount4;
			
			$data2 = array(  
				"in_out"   		   	=> '1',
				"circular_letter"  	=> '0',
				"id_saraban"   		=> $maxcount5,
				"count_saraban"   	=> $maxcount4,
				"firstname"   		=> $this->session->userdata['logged_in']['firstname'],
				"lastname"    		=> $this->session->userdata['logged_in']['lastname'],
				"chk_authen" 		=> $this->session->userdata['logged_in']['status'],
				"user_update" 		=> $user_create,
				"user_create" 		=> $user_create, 
				"topic" 			=> $subject_doc2,
				"date_add"      	=> date("Y-m-d H:i:sa")
			);		
			$result2 = $this->Saraban_model->insert_topic($data2,$user_create,'2');	
			$saraban_id = $saraban_id.','.$this->Saraban_model->explode_sarabanNumber($result2,'1');
			$saraban_number = $saraban_number.','.$this->Saraban_model->explode_sarabanNumber($result2,'0');
		} 
		
		$data3 = array(  				
				"saraban_id"   		=> $saraban_id,
				"saraban_number"   	=> $saraban_number,
				"date_submit"   	=> date("Y-m-d"),
				"date_create"    	=> date("Y-m-d"),
				"check_doc" 		=> '2',
				"check_doc2" 		=> '3'
		);		
		$result_update = $this->Allowance_model->update_outboundDocument($document_id,$data3);		
		echo $result_update;		
	}	
	//-------------------  
	public function do_submit_andSend2(){
		
		$document_id = $this->input->post('document_id');		
		$subject_document = $this->input->post('subject_document');		
		$withdraw = $this->input->post('withdraw');		
		$withdrawNum = $this->input->post('withdrawNum');		
		$num_withdrawDataOut = $this->input->post('num_withdrawDataOut');		
		$num_withdrawData = $this->input->post('num_withdrawData');
		$user_create = $this->session->userdata['logged_in']['id'];
		$subject_doc2 = '';
		$saraban_id2 = '';
		$saraban_number2 = '';
		$this->load->model("Saraban_model");
		
//		if($withdraw == '1'){
//			
//			if(($withdrawNum == 1) && ($num_withdrawData > 0)){
//					
//				$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
//				
//			} else if(($withdrawNum == 1) && ($num_withdrawDataOut > 0)){
//					
//				$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';
//				
//			} else if($withdrawNum == 2){
//					
//				$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
//			}
//		}		
		
        $maxcount = $this->Saraban_model->maxcount('0','1');		
        $maxcount1 = $maxcount + 1;
        $loop = 4 - strlen($maxcount1);
		$x = '';
        for($i = 1; $i <= $loop; $i++){
            $x = $x."0";
		}
		$maxcount2 = 'มอ 820/'.$x.$maxcount1;	 
        
		$data = array(  
			"in_out"   		   	=> '1',
			"circular_letter"  	=> '0',
			"id_saraban"   		=> $maxcount2,
			"count_saraban"   	=> $maxcount1,
			"firstname"   		=> $this->session->userdata['logged_in']['firstname'],
			"lastname"    		=> $this->session->userdata['logged_in']['lastname'],
			"chk_authen" 		=> $this->session->userdata['logged_in']['status'],
			"user_update" 		=> $user_create,
			"user_create" 		=> $user_create, 
			"topic" 			=> $subject_document,
			"date_add"      	=> date("Y-m-d H:i:sa")
		);		
		$result = $this->Saraban_model->insert_topic($data,$user_create,'2');
		$saraban_id = $this->Saraban_model->explode_sarabanNumber($result,'1');
		$saraban_number = $this->Saraban_model->explode_sarabanNumber($result,'0');		
		
		/*if($withdraw == '1'){
			
			//$maxcount3 = $this->Saraban_model->maxcount();
			//$maxcount4 = $maxcount3 + 1;
			$maxcount4 = $maxcount1 + 1;
			$loop = 4 - strlen($maxcount4);
			$x = '';
			for($i = 1; $i <= $loop; $i++){
				$x = $x."0";
			}
			$maxcount5 = 'มอ 820/'.$x.$maxcount4;
			
			$data2 = array(  
				"in_out"   		   	=> '1',
				"circular_letter"  	=> '0',
				"id_saraban"   		=> $maxcount5,
				"count_saraban"   	=> $maxcount4,
				"firstname"   		=> $this->session->userdata['logged_in']['firstname'],
				"lastname"    		=> $this->session->userdata['logged_in']['lastname'],
				"chk_authen" 		=> $this->session->userdata['logged_in']['status'],
				"user_update" 		=> $user_create,
				"user_create" 		=> $user_create, 
				"topic" 			=> $subject_document,
				"date_add"      	=> date("Y-m-d H:i:sa")
			);		
			$result2 = $this->Saraban_model->insert_topic($data2,$user_create,'2');	
			$saraban_id = $saraban_id.','.$this->Saraban_model->explode_sarabanNumber($result2,'1');
			$saraban_number = $saraban_number.','.$this->Saraban_model->explode_sarabanNumber($result2,'0');
		}*/ 
		
		$data3 = array(  				
				"saraban_id"   		=> $saraban_id,
				"saraban_number"   	=> $saraban_number,
				"date_submit"   	=> date("Y-m-d"),
				"date_create"    	=> date("Y-m-d"),
				"check_doc" 		=> '2',
				"check_doc2" 		=> '3'
		);		
		$result_update = $this->Allowance_model->update_localDocument($document_id,$data3);		
		echo $result_update;		
	}	
	//------------------------------------------
	public function modal_setPosition(){
		
		$position = $this->input->post('position');
		
		if($position == '2'){   ?>
		
			<form role="form" class="form-horizontal form-groups-bordered">
				<div class="form-group">
				<div class="col-sm-12">
					<div class="checkbox" style="padding-left: 5%;">
						<label><input type="checkbox" id="reason_type1" name="reason_type2[]" onClick="select_reasonType(this.checked,'1','reason_type')" >มีความประสงค์</label>
					</div>				
				</div>					
					
				<div class="col-sm-12" >
					<div class="checkbox" style="padding-left: 5%;">
						<label><input type="checkbox" id="reason_type2" name="reason_type2[]" onClick="select_reasonType(this.checked,'2','reason_type')" >ได้รับมอบหมาย</label>
					</div>				
				</div>	
				<input type="hidden" id="position" value="<?php echo $position?>">
				</div>
			</form>		
	<?php	}
		
		if($position == '1'){   ?>
		
			<form role="form" class="form-horizontal form-groups-bordered">
				<div class="form-group">
				<div class="col-sm-12">
					<div class="checkbox" style="padding-left: 5%;">
						<label><input type="checkbox" id="system_permissions1" name="system_permissions2[]" onClick="select_reasonType(this.checked,'1','system_permissions')" >ระบบสารบรรณ</label>
					</div>				
				</div>					
					
				<div class="col-sm-12" >
					<div class="checkbox" style="padding-left: 5%;">
						<label><input type="checkbox" id="system_permissions2" name="system_permissions2[]" onClick="select_reasonType(this.checked,'2','system_permissions')" >ระบบการเดินทาง</label>
					</div>				
				</div>
				<input type="hidden" id="position" value="<?php echo $position?>">	
				</div>
			</form>		
	<?php	} 
	}
	//------------------------------- 
	public function insert_dataAdmin(){
		
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->Allowance_model->do_insert_dataAdmin($params);
		echo $Result;
	}
	//------------------------------- 
	public function edit_dataAdmin(){
		
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->Allowance_model->do_update_dataAdmin($params);
		echo $Result;
	}
	//------------------------------- 
	public function testFile(){
	
		$dirname = date("Y");		//**************************************** 22222222
		$filename = "./uploadfile/".$dirname."/";

		if(!file_exists($filename)){
			//mkdir($filename, 0777);
			//mkdir($filename, 0777, true);
			mkdir($filename); chmod($filename, 0777);
			echo "The directory $dirname was successfully created.";
			exit;
		} else {
			echo "The directory $dirname exists.";
		}
	}
        	//------------------- 
	public function save_outboundWithdrawlocal(){
			
		$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		$date_create = date("Y-m-d");
		$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = '0';
		$select_checkbox = '0';
		$numSelect_checkbox = count($this->input->post('select_checkbox'));
		
		if($numSelect_checkbox == 1){
			
			$select_checkbox = $this->input->post('select_checkbox')[0];			
		}
		if($numSelect_checkbox == 2){
			
			$select_checkbox = '4';			
		}		
		if($vacation == ''){ $vacation = '0'; }
		
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
		//} else {
			
		//	$totalPrice = $this->input->post('total_price');
		//}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;	
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			"date_create" 		=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> $select_checkbox,
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"all_vacation" 		=> $all_vacation,			
			"date_add"			=> $date_add,			
		);

		$this->load->model("Allowance_model");
		$document_id = $this->Allowance_model->insert_allowancelocal($data);	
		
		if($vacation != '0'){		
		
			$dataVacation = array(

				"document_id"		=> $document_id,
				"grouplist_id"		=> '0',
				"name"   			=> $this->input->post('name_surname'),
				"date_vacation"		=> $this->input->post('date_vacation'),
				"type_travel"		=> '1',											
				"user_update"		=> $user_create,
			);
			$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');		
		}
					
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
//			if(($total_price != '') && ($total_price > 0)){	
//				
//				$total_price = str_replace(",", "", $total_price);			
//				$data3 = array(
//
//					"document_id"			=> $document_id,
//					"type_travel"			=> '2',
//					"allowance1_days"		=> $this->input->post('allowance1_days'),
//					"allowance2_days"   	=> $this->input->post('allowance2_days'),
//					"allowance1_baht"		=> $this->input->post('allowance1_baht'),
//					"allowance2_baht"		=> $this->input->post('allowance2_baht'),
//					"accommodation1_days"	=> $this->input->post('accommodation1_days'),  
//					"accommodation2_days" 	=> $this->input->post('accommodation2_days'), 
//					"accommodation1_baht" 	=> $this->input->post('accommodation1_baht'),
//					"accommodation2_baht" 	=> $this->input->post('accommodation2_baht'),
//					"allowance1_total" 		=> $this->input->post('allowance1_total'),
//					"allowance2_total" 		=> $this->input->post('allowance2_total'),
//					"accommodation1_total" 	=> $this->input->post('accommodation1_total'),
//					"accommodation2_total" 	=> $this->input->post('accommodation2_total'),
//					"passage_baht" 			=> $this->input->post('passage_baht'),
//					"other_text" 			=> $this->input->post('other_text'),
//					"other_baht" 			=> $this->input->post('other_baht'),
//					"total_price" 			=> $total_price,
//					"user_update" 			=> $user_create,					
//					"date_add"				=> $date_add,			
//				);
//				$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');				
//			}
//			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					"document_id"			=> $document_id,
					"type_travel"			=> '3',
					"allowance1_days"		=> $this->input->post('Nallowance1_days'),
					"allowance2_days"   	=> $this->input->post('Nallowance2_days'),
					"allowance1_baht"		=> $this->input->post('Nallowance1_baht'),
					"allowance2_baht"		=> $this->input->post('Nallowance2_baht'),				
					"accommodation1_days"	=> $this->input->post('Naccommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('Naccommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('Naccommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('Naccommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('Nallowance1_total'),
					"allowance2_total" 		=> $this->input->post('Nallowance2_total'),
					"accommodation1_total" 	=> $this->input->post('Naccommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('Naccommodation2_total'),
					"passage_baht" 			=> $this->input->post('Npassage_baht'),
					"other_text" 			=> $this->input->post('Nother_text'),
					"other_baht" 			=> $this->input->post('Nother_baht'),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					"date_add"				=> $date_add,			
				);

				$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');	
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function edit_outboundWithdrawlocal($document_id=NULL){
			
		//$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		$date_create = date("Y-m-d");
		$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = '0';
		$select_checkbox = '0';
		$numSelect_checkbox = count($this->input->post('select_checkbox'));
		
		$date_office = $this->input->post('date_office');
		$date_office2 = $this->input->post('date_office2');
		$date_thailand = $this->input->post('date_thailand');
		$date_thailand2 = $this->input->post('date_thailand2');
		
		if($numSelect_checkbox == 1){
			
			$select_checkbox = $this->input->post('select_checkbox')[0];			
		}
		if($numSelect_checkbox == 2){
			
			$select_checkbox = '4';			
		}		
		if($vacation == ''){		
			
			$vacation = '0';
			$date_office = '';
			$date_office2 = '';
			$date_thailand = '';
			$date_thailand2 = '';					
		}
		
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
//		} else {
//			
//			$totalPrice = $this->input->post('total_price');
//			$totalPrice = str_replace(",", "", $totalPrice);
//		}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;	
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			//"date_create" 	=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> $select_checkbox,
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"all_vacation" 		=> $all_vacation,			
			//"date_add"		=> $date_add,			
		);

		$this->load->model("Allowance_model");
		//$document_id = $this->Allowance_model->insert_allowance($data);	
		$this->Allowance_model->update_allowancelocal($data,$document_id);	
		
		if($vacation != '0'){
			
			$num_vacation = $this->Allowance_model->get_vacation($document_id,'2',$user_create);
			$num_vacation2 = $num_vacation->num_rows();
			
			if($num_vacation2 > 0){
				
				$dataVacation = array(

					//"document_id"		=> $document_id,
					"grouplist_id"		=> '0',
					"name"   			=> $this->input->post('name_surname'),
					"date_vacation"		=> $this->input->post('date_vacation'),
					//"type_travel"		=> '2',											
					"user_update"		=> $user_create,
				);
							
				$this->Allowance_model->edit_txt_listName($document_id, $dataVacation, '0', 'grouplist_id', 'tbl_vacation_data');				
			
			} else {
		
				$dataVacation = array(

					"document_id"		=> $document_id,
					"grouplist_id"		=> '0',
					"name"   			=> $this->input->post('name_surname'),
					"date_vacation"		=> $this->input->post('date_vacation'),
					"type_travel"		=> '2',											
					"user_update"		=> $user_create,
				);
				$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');	
			}			
		} else if($vacation == '0'){
			
			$num_vacation = $this->Allowance_model->get_vacation($document_id,'2',$user_create);
			$num_vacation2 = $num_vacation->num_rows();
			
			if($num_vacation2 > 0){
				
				$this->Allowance_model->do_removeFromVacation('0',$document_id);			
			}			
		}
					
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
//			if(($total_price != '') && ($total_price > 0)){	
//				
//				$total_price = str_replace(",", "", $total_price);			
//				$data3 = array(
//
//					//"document_id"			=> $document_id,
//					//"type_travel"			=> '2',
//					"allowance1_days"		=> $this->input->post('allowance1_days'),
//					"allowance2_days"   	=> $this->input->post('allowance2_days'),
//					"allowance1_baht"		=> $this->input->post('allowance1_baht'),
//					"allowance2_baht"		=> $this->input->post('allowance2_baht'),
//					"accommodation1_days"	=> $this->input->post('accommodation1_days'),  
//					"accommodation2_days" 	=> $this->input->post('accommodation2_days'), 
//					"accommodation1_baht" 	=> $this->input->post('accommodation1_baht'),
//					"accommodation2_baht" 	=> $this->input->post('accommodation2_baht'),
//					"allowance1_total" 		=> $this->input->post('allowance1_total'),
//					"allowance2_total" 		=> $this->input->post('allowance2_total'),
//					"accommodation1_total" 	=> $this->input->post('accommodation1_total'),
//					"accommodation2_total" 	=> $this->input->post('accommodation2_total'),
//					"passage_baht" 			=> $this->input->post('passage_baht'),
//					"other_text" 			=> $this->input->post('other_text'),
//					"other_baht" 			=> $this->input->post('other_baht'),
//					"total_price" 			=> $total_price,
//					"user_update" 			=> $user_create,					
//					//"date_add"				=> $date_add,			
//				);
//				//$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');
//				$this->Allowance_model->update_withdraw($document_id,$data3,'tbl_withdraw_data','2');
//			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					//"document_id"			=> $document_id,
					//"type_travel"			=> '1',
					"allowance1_days"		=> $this->input->post('Nallowance1_days'),
					"allowance2_days"   	=> $this->input->post('Nallowance2_days'),
					"allowance1_baht"		=> $this->input->post('Nallowance1_baht'),
					"allowance2_baht"		=> $this->input->post('Nallowance2_baht'),				
					"accommodation1_days"	=> $this->input->post('Naccommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('Naccommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('Naccommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('Naccommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('Nallowance1_total'),
					"allowance2_total" 		=> $this->input->post('Nallowance2_total'),
					"accommodation1_total" 	=> $this->input->post('Naccommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('Naccommodation2_total'),
					"passage_baht" 			=> $this->input->post('Npassage_baht'),
					"other_text" 			=> $this->input->post('Nother_text'),
					"other_baht" 			=> $this->input->post('Nother_baht'),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					//"date_add"				=> $date_add,			
				);
				//$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');
				$this->Allowance_model->update_withdraw($document_id,$data4,'tbl_withdraw_data','3');
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function saveData_outboundlocal(){	
		
		$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		$date_create = date("Y-m-d");
		$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = $this->input->post('vacationAll');
		
		if($vacation == ''){ $vacation = '0'; }
		if($all_vacation == ''){ $all_vacation = '0'; }			
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
		/*} else {
			
			$totalPrice = $this->input->post('total_price');
		}*/
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			"date_create" 		=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"group_name" 		=> $this->input->post('group_name'),
			"number_people" 	=> $this->input->post('number_people'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> '0',
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"all_vacation" 		=> $all_vacation,			
			"date_add"			=> $date_add,			
		);

		$this->load->model("Allowance_model");
		$document_id = $this->Allowance_model->insert_allowancelocal($data);		
				
		if($for_type == '2'){
			
			$num_tr = $this->input->post('num_tr');			
			if($num_tr > 0){
				
				for($x=1; $x <= $num_tr; $x++){	
					
					$position = $this->input->post('position_id')[$x];
					
					if($position != ''){
						$position2 = $this->Allowance_model->get_position($position);
						foreach($position2->result() as $position3){}
						$position_txt = $position3->position;
					
					} else {
						
						$position_txt ='';
					}	
					
					if($vacation != '0'){				
					
					if($all_vacation != '0'){	
						
						$vacation2 = $all_vacation;	
					
						$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '1',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							"date_add"			=> $date_add,			
						);	
						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');
						
						$dataVacation = array(

							"document_id"		=> $document_id,
							"grouplist_id"		=> $grouplist_id,
							"name"   			=> $this->input->post('name')[$x],
							"date_vacation"		=> $this->input->post('date_vacationA'),
							"type_travel"		=> '1',											
							"user_update"		=> $user_create,
						);
						$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');
					
					} else {						
						
						$vacation2 = $all_vacation;	
					
						$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '1',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							"date_add"			=> $date_add,			
						);	
						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');	
						$name_vacation = $this->input->post('vacation');						
						$date_vacation = $this->input->post('date_vacation');						
							
						if(in_array($this->input->post('name')[$x], $name_vacation)){				
							
							$keys_nameVacation = array_search($this->input->post('name')[$x],$name_vacation);
							
							$date_vacation = array_values(array_filter($date_vacation));		
						
							$dataVacation = array(

								"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
								"date_vacation"		=> $date_vacation[$keys_nameVacation],
								"type_travel"		=> '1',											
								"user_update"		=> $user_create,
							);
							
							$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');			
							
							$dataUpdate = array(  "vacation" => '1', );		
							$this->Allowance_model->update_vacation($grouplist_id, $dataUpdate, 'tbl_group_listName');
						}					
					}					
					} else {
						
						$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '1',				
							"user_update"		=> $user_create,					
							"vacation"			=> '0',					
							"date_add"			=> $date_add,			
						);						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');	
					}					
				}							
			}	
		}		
				
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
//			if(($total_price != '') && ($total_price > 0)){	
//				
//				$total_price = str_replace(",", "", $total_price);			
//				$data3 = array(
//
//					"document_id"			=> $document_id,
//					"type_travel"			=> '2',
//					"allowance1_days"		=> $this->input->post('allowance1_days'),
//					"allowance2_days"   	=> $this->input->post('allowance2_days'),
//					"allowance1_baht"		=> $this->input->post('allowance1_baht'),
//					"allowance2_baht"		=> $this->input->post('allowance2_baht'),
//					"accommodation1_days"	=> $this->input->post('accommodation1_days'),  
//					"accommodation2_days" 	=> $this->input->post('accommodation2_days'), 
//					"accommodation1_baht" 	=> $this->input->post('accommodation1_baht'),
//					"accommodation2_baht" 	=> $this->input->post('accommodation2_baht'),
//					"allowance1_total" 		=> $this->input->post('allowance1_total'),
//					"allowance2_total" 		=> $this->input->post('allowance2_total'),
//					"accommodation1_total" 	=> $this->input->post('accommodation1_total'),
//					"accommodation2_total" 	=> $this->input->post('accommodation2_total'),
//					"passage_baht" 			=> $this->input->post('passage_baht'),
//					"other_text" 			=> $this->input->post('other_text'),
//					"other_baht" 			=> $this->input->post('other_baht'),
//					"total_price" 			=> $total_price,
//					"user_update" 			=> $user_create,					
//					"date_add"				=> $date_add,			
//				);
//				$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');				
//			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					"document_id"			=> $document_id,
					"type_travel"			=> '3',
					"allowance1_days"		=> $this->input->post('Nallowance1_days'),
					"allowance2_days"   	=> $this->input->post('Nallowance2_days'),
					"allowance1_baht"		=> $this->input->post('Nallowance1_baht'),
					"allowance2_baht"		=> $this->input->post('Nallowance2_baht'),				
					"accommodation1_days"	=> $this->input->post('Naccommodation1_days'),  
					"accommodation2_days" 	=> $this->input->post('Naccommodation2_days'), 
					"accommodation1_baht" 	=> $this->input->post('Naccommodation1_baht'),
					"accommodation2_baht" 	=> $this->input->post('Naccommodation2_baht'),
					"allowance1_total" 		=> $this->input->post('Nallowance1_total'),
					"allowance2_total" 		=> $this->input->post('Nallowance2_total'),
					"accommodation1_total" 	=> $this->input->post('Naccommodation1_total'),
					"accommodation2_total" 	=> $this->input->post('Naccommodation2_total'),
					"passage_baht" 			=> $this->input->post('Npassage_baht'),
					"other_text" 			=> $this->input->post('Nother_text'),
					"other_baht" 			=> $this->input->post('Nother_baht'),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					"date_add"				=> $date_add,			
				);

				$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');	
			}
		}
		echo $document_id;		
	}
	//------------------- 
	public function editData_outboundlocal($document_id=NULL){	
		
		//$document_id = 'x';
		$user_create = $this->session->userdata['logged_in']['id'];
		$withdraw = $this->input->post('withdraw');		
		$for_type = $this->input->post('for_type');
		//$date_create = date("Y-m-d");
		//$date_add = date("Y-m-d H:i:s");
		$vacation = $this->input->post('CHvacation');
		$all_vacation = $this->input->post('vacationAll');
		
		if($vacation == ''){ $vacation = '0'; }
		if($all_vacation == ''){ $all_vacation = '0'; }			
		//if($withdraw != '1'){
			
			$totalPrice = '0.00';
			
//		} else {
//			
//			$totalPrice = $this->input->post('total_price');
//			$totalPrice = str_replace(",", "", $totalPrice);
//		}
		$daystart = $this->input->post('daystart');
                $monthstart = $this->input->post('monthstart');
                $yearstart = $this->input->post('yearstart');
                $date_start = $yearstart.'-'.$monthstart.'-'.$daystart;
                
		$dayend = $this->input->post('dayend');
                $monthend = $this->input->post('monthend');
                $yearend = $this->input->post('yearend');
                $date_end = $yearend.'-'.$monthend.'-'.$dayend;
                
                $dayoffice = $this->input->post('dayoffice');
                $monthoffice = $this->input->post('monthoffice');
                $yearoffice = $this->input->post('yearoffice');
                $date_office = $yearoffice.'-'.$monthoffice.'-'.$dayoffice;
                
                $dayoffice2 = $this->input->post('dayoffice2');
                $monthoffice2 = $this->input->post('monthoffice2');
                $yearoffice2 = $this->input->post('yearoffice2');
                $date_office2 = $yearoffice2.'-'.$monthoffice2.'-'.$dayoffice2;
		$data = array(

			"for_type"			=> $for_type,
			"reason_request"	=> $this->input->post('reason_request'),
			"withdraw"    		=> $withdraw, 
			"user_create"    	=> $user_create,
			"telephone_number"	=> $this->input->post('telephone_number'),
			//"date_create" 		=> $date_create, 
			"subject_document"	=> $this->input->post('subject_document'),  
			"travel_for" 		=> $this->input->post('travel_for'), 
			"subject_form" 		=> $this->input->post('subject_form'),
			"group_name" 		=> $this->input->post('group_name'),
			"number_people" 	=> $this->input->post('number_people'),
			"place" 			=> $this->input->post('place'),
			"date_start" 		=> $date_start,
			"date_end" 			=> $date_end,
			"money_source" 		=> $this->input->post('money_source'),
			"select_checkbox" 	=> '0',
			"vacation" 			=> $vacation,
			"total_price" 		=> $totalPrice,
			"file_name1" 		=> $this->input->post('file_name1'),
			"file_name2" 		=> $this->input->post('file_name2'),
			"file_name3" 		=> $this->input->post('file_name3'),
			"file_name4" 		=> $this->input->post('file_name4'),
			"file_name5" 		=> $this->input->post('file_name5'),			
			"name_surname" 		=> $this->input->post('name_surname'),			
			"date_office" 		=> $date_office,			
			"date_office2" 		=> $date_office2,			
			"all_vacation" 		=> $all_vacation,			
			//"date_add"			=> $date_add,			
		);

		$this->load->model("Allowance_model");
		//$document_id = $this->Allowance_model->insert_allowance($data);		
		$this->Allowance_model->update_allowancelocal($data,$document_id);	
				
		if($for_type == '2'){
			
			$num_tr = $this->input->post('num_tr');			
			if($num_tr > 0){
				
				for($x=1; $x <= $num_tr; $x++){	
					
					$position = $this->input->post('position_id')[$x];
					
					if($position != ''){
						$position2 = $this->Allowance_model->get_position($position);
						foreach($position2->result() as $position3){}
						$position_txt = $position3->position;
					
					} else {
						
						$position_txt ='';
					}	
					
					if($vacation != '0'){				
					
					if($all_vacation != '0'){	
						
						$vacation2 = $all_vacation;	
						$id_listName = $this->input->post('id_listName')[$x];
					
						/*$data2 = array(

							//"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							//"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							//"date_add"			=> $date_add,			
						);*/
						
						if($id_listName == 'x'){
							
							$data2 = array(

								"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								"type_travel" 		=> '1',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								"date_add"			=> $date_add,			
							);
							$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');
						
						} else {
							
							$data2 = array(
								//"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								//"type_travel" 		=> '2',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								//"date_add"			=> $date_add,			
							);							
							$grouplist_id = $this->Allowance_model->edit_txt_listName($document_id, $data2, $id_listName, 'id', 'tbl_group_listName');
						}						
						
						/*$dataVacation = array(

							//"document_id"		=> $document_id,
							"grouplist_id"		=> $grouplist_id,
							"name"   			=> $this->input->post('name')[$x],
							"date_vacation"		=> $this->input->post('date_vacationA'),
							//"type_travel"		=> '2',											
							"user_update"		=> $user_create,
						);*/
						
						if($id_listName == 'x'){
							
							$dataVacation = array(

								"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('name')[$x],
								"date_vacation"		=> $this->input->post('date_vacationA'),
								"type_travel"		=> '1',											
								"user_update"		=> $user_create,
							);
							$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');
							
						} else {
							
							$dataVacation = array(

								//"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('name')[$x],
								"date_vacation"		=> $this->input->post('date_vacationA'),
								//"type_travel"		=> '2',											
								"user_update"		=> $user_create,
							);
							
							$this->Allowance_model->edit_txt_listName($document_id, $dataVacation, $id_listName, 'grouplist_id', 'tbl_vacation_data');
						}
					
					} else {						
						
						$vacation2 = $all_vacation;				
					
						/*$data2 = array(

							"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation2,					
							"date_add"			=> $date_add,			
						);	
						
						$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');*/
						
						if($id_listName == 'x'){
							
							$data2 = array(

								"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								"type_travel" 		=> '1',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								"date_add"			=> $date_add,			
							);
							$grouplist_id = $this->Allowance_model->insert_withdraw($data2,'tbl_group_listName');
						
						} else {
							
							$data2 = array(
								//"document_id"		=> $document_id,
								"name"				=> $this->input->post('name')[$x],
								"position_id"   	=> $this->input->post('position_id')[$x],
								"position"			=> $position_txt,
								"position_number"	=> $this->input->post('position_number')[$x],				
								"career_id"			=> $this->input->post('career_id')[$x],  
								//"type_travel" 		=> '2',				
								"user_update"		=> $user_create,					
								"vacation"			=> $vacation2,					
								//"date_add"			=> $date_add,			
							);							
							$grouplist_id = $this->Allowance_model->edit_txt_listName($document_id, $data2, $id_listName, 'id', 'tbl_group_listName');
						}						
						
						$name_vacation = $this->input->post('vacation');						
						$date_vacation = $this->input->post('date_vacation');						
							
						if(in_array($this->input->post('name')[$x], $name_vacation)){						
							
							$keys_nameVacation = array_search($this->input->post('name')[$x],$name_vacation);	
							$date_vacation = array_values(array_filter($date_vacation));						
							
							/*$dataVacation = array(

								"document_id"		=> $document_id,
								"grouplist_id"		=> $grouplist_id,
								"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
								"date_vacation"		=> $date_vacation[$keys_nameVacation],
								"type_travel"		=> '2',											
								"user_update"		=> $user_create,
							);							
							$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');*/		
							
							if($id_listName == 'x'){
							
								$dataVacation = array(

									"document_id"		=> $document_id,
									"grouplist_id"		=> $grouplist_id,
									"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
									"date_vacation"		=> $date_vacation[$keys_nameVacation],
									"type_travel"		=> '1',											
									"user_update"		=> $user_create,
								);
								$this->Allowance_model->insert_withdraw($dataVacation,'tbl_vacation_data');

							} else {

								$dataVacation = array(

									//"document_id"		=> $document_id,
									"grouplist_id"		=> $grouplist_id,
									"name"   			=> $this->input->post('vacation')[$keys_nameVacation],
									"date_vacation"		=> $date_vacation[$keys_nameVacation],
									//"type_travel"		=> '2',											
									"user_update"		=> $user_create,
								);

								$this->Allowance_model->edit_txt_listName($document_id, $dataVacation, $id_listName, 'grouplist_id', 'tbl_vacation_data');
							}						
							
							$dataUpdate = array(  "vacation" => '1', );		
							$this->Allowance_model->update_vacation($grouplist_id, $dataUpdate, 'tbl_group_listName');
						}						
					}					
					} else {
						
						$data2 = array(
							//"document_id"		=> $document_id,
							"name"				=> $this->input->post('name')[$x],
							"position_id"   	=> $this->input->post('position_id')[$x],
							"position"			=> $position_txt,
							"position_number"	=> $this->input->post('position_number')[$x],				
							"career_id"			=> $this->input->post('career_id')[$x],  
							//"type_travel" 		=> '2',				
							"user_update"		=> $user_create,					
							"vacation"			=> $vacation,					
							//"date_add"			=> $date_add,			
						);							
						$grouplist_id = $this->Allowance_model->edit_txt_listName($document_id, $data2, $this->input->post('id_listName')[$x], 'id', 'tbl_group_listName');						
					}				
				}							
			}	
		}		
				
		if($withdraw == '1'){  
			
			$total_price = $this->input->post('total_price2');
			$total_price2 = $this->input->post('Ntotal_price2');				
					
//			if(($total_price != '') && ($total_price > 0)){	
//				
//				$total_price = str_replace(",", "", $total_price);			
//				$data3 = array(
//
//					//"document_id"			=> $document_id,
//					//"type_travel"			=> '2',
//					"allowance1_days"		=> str_replace(",", "", $this->input->post('allowance1_days')),
//					"allowance2_days"   	=> str_replace(",", "", $this->input->post('allowance2_days')),
//					"allowance1_baht"		=> str_replace(",", "", $this->input->post('allowance1_baht')),
//					"allowance2_baht"		=> str_replace(",", "", $this->input->post('allowance2_baht')),
//					"accommodation1_days"	=> str_replace(",", "", $this->input->post('accommodation1_days')),
//					"accommodation2_days" 	=> str_replace(",", "", $this->input->post('accommodation2_days')),
//					"accommodation1_baht" 	=> str_replace(",", "", $this->input->post('accommodation1_baht')),
//					"accommodation2_baht" 	=> str_replace(",", "", $this->input->post('accommodation2_baht')),
//					"allowance1_total" 		=> str_replace(",", "", $this->input->post('allowance1_total')),
//					"allowance2_total" 		=> str_replace(",", "", $this->input->post('allowance2_total')),
//					"accommodation1_total" 	=> str_replace(",", "", $this->input->post('accommodation1_total')),
//					"accommodation2_total" 	=> str_replace(",", "", $this->input->post('accommodation2_total')),
//					"passage_baht" 			=> str_replace(",", "", $this->input->post('passage_baht')),
//					"other_text" 			=> str_replace(",", "", $this->input->post('other_text')),
//					"other_baht" 			=> str_replace(",", "", $this->input->post('other_baht')),
//					"total_price" 			=> $total_price,
//					"user_update" 			=> $user_create,					
//					//"date_add"				=> $date_add,			
//				);
//				//$this->Allowance_model->insert_withdraw($data3,'tbl_withdraw_data');				
//				$this->Allowance_model->update_withdraw($document_id,$data3,'tbl_withdraw_data','2');
//			}
			
			if(($total_price2 != '') && ($total_price2 > 0)){	
				
				$total_price2 = str_replace(",", "", $total_price2);
				$data4 = array(

					//"document_id"			=> $document_id,
					//"type_travel"			=> '1',
					"allowance1_days"		=> str_replace(",", "", $this->input->post('Nallowance1_days')),
					"allowance2_days"   	=> str_replace(",", "", $this->input->post('Nallowance2_days')),
					"allowance1_baht"		=> str_replace(",", "", $this->input->post('Nallowance1_baht')),
					"allowance2_baht"		=> str_replace(",", "", $this->input->post('Nallowance2_baht')),
					"accommodation1_days"	=> str_replace(",", "", $this->input->post('Naccommodation1_days')),
					"accommodation2_days" 	=> str_replace(",", "", $this->input->post('Naccommodation2_days')),
					"accommodation1_baht" 	=> str_replace(",", "", $this->input->post('Naccommodation1_baht')),
					"accommodation2_baht" 	=> str_replace(",", "", $this->input->post('Naccommodation2_baht')),
					"allowance1_total" 		=> str_replace(",", "", $this->input->post('Nallowance1_total')),
					"allowance2_total" 		=> str_replace(",", "", $this->input->post('Nallowance2_total')),
					"accommodation1_total" 	=> str_replace(",", "", $this->input->post('Naccommodation1_total')),
					"accommodation2_total" 	=> str_replace(",", "", $this->input->post('Naccommodation2_total')),
					"passage_baht" 			=> str_replace(",", "", $this->input->post('Npassage_baht')),
					"other_text" 			=> str_replace(",", "", $this->input->post('Nother_text')),
					"other_baht" 			=> str_replace(",", "", $this->input->post('Nother_baht')),
					"total_price" 			=> $total_price2,
					"user_update" 			=> $user_create,					
					//"date_add"				=> $date_add,			
				);
				//$this->Allowance_model->insert_withdraw($data4,'tbl_withdraw_data');
				$this->Allowance_model->update_withdraw($document_id,$data4,'tbl_withdraw_data','3');
			}
		}
		echo $document_id;		
	}
}
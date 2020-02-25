<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class allowance extends CI_Controller {

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
	}	

	//--------------------login----------------------//
	public function login_user()
	{
		$this->load->view('allowance_files/login_user');
				
	}

	public function login_approve()
	{
		$this->load->view('allowance_files/login_approve');
				
	}

	
	
	public function login_admin()
	{
		$this->load->view('allowance_files/login_admin'); 
				
	}

	public function register()
	{
		$this->load->view('allowance_files/register_user');
				
	}

	public function forgotpassword()
	{
		$this->load->view('allowance_files/forgot-password.php');
				
	}

	// Check for user login process
	public function user_login_process() 
	{

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

	// Check for approve login process
	public function approve_login_process() 
	{

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

	// Check for Admin login process
	public function admin_login_process() 
	{

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

	// Validate and store registration data in database
	public function new_user_registration() 
	{

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

	// Logout from admin page
	public function logout() 
	{
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

	public function chk_username(){

		if(($this->session->userdata['logged_in']['status']) == "admin"){

			
			$user_name	= $this->input->post('user_name');
			$id			= $this->input->post('id');
			$table 		= "tbl_admin_allowance";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;
			

		}else if(($this->session->userdata['logged_in']['status']) == "user" || ($this->session->userdata['logged_in']['status']) == "approve"){
			
			 $user_name	= $this->input->post('user_name');
			 $table 	= "tbl_user_data";
			 $id		= $this->input->post('id');

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;

			
		}

	}

	public function chk_email(){

		if(($this->session->userdata['logged_in']['status']) == "admin" ){

			
			$email	= $this->input->post('email');
			$id	    = $this->input->post('id');

			 $table = "tbl_admin_allowance";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_email($id,$email,$table);
			echo json_encode($result); 
			exit;
			

		}else if(($this->session->userdata['logged_in']['status']) == "user" || ($this->session->userdata['logged_in']['status']) == "approve"){
			
			$email	= $this->input->post('email');
			$id	    = $this->input->post('id');

			$table = "tbl_user_email";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_email($id,$email,$table);
			echo json_encode($result); 
			exit;

			
		}
	}



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

		}else if(($this->session->userdata['logged_in']['status']) == "user"  || ($this->session->userdata['logged_in']['status']) == "approve"){


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
			$this->load->view('templates/allowance/menu_ilst_user');
			$this->load->view('templates/allowance/header2');
			$this->load->view('allowance_files/allowance_user/proceed_allowance',$data); 
			$this->load->view('allowance_files/allowance_user/proceed_allowance_js');			
		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}

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


	public function create_allowance(){
		
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_create_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/detail_allowance'); 
		$this->load->view('allowance_files/allowance_user/detail_allowance_js');			
	}

	public function create2_allowance(){
		
		$this->load->view('templates/allowance/header_user');
		$this->load->view('templates/allowance/menu_create2_user');
		$this->load->view('templates/allowance/header2');
		$this->load->view('allowance_files/allowance_user/detail2_allowance'); 
		$this->load->view('allowance_files/allowance_user/detail2_allowance_js');			
	}


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
		$this->load->view('allowance_files/allowance_user/view_allowance',$data); 
		$this->load->view('allowance_files/allowance_user/view_allowance_js');
	}
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
			$this->load->view('templates/allowance/menu_report_user',$data);
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
			$this->load->view('templates/allowance/menu_report_user',$data);
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
          //----------------------------------------
        public function ch_usermember() {
            $user_name	= $this->input->post('user_name');
			 $table 	= "tbl_user_data";
			 $id		= $this->input->post('id');

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;
        }
}
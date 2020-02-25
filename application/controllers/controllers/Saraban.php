<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saraban extends CI_Controller {
 
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
	
	public function __construct() 
	{
		parent::__construct();

		// Load session library
		$this->load->library('session');
                $this->load->model("Saraban_model"); 
		// Load database
		$this->load->model('Login_database_saraban');
		$this->load->model('Allowance_model');
	}	
	//--------------------for index user--------------------//
	public function index(){ 
		$this->load->model("Saraban_model");  
		$data = array();              
		$data['getdata'] = $this->Saraban_model->getdataindex(); 
		
		$sql = "SELECT `firstname`, `lastname` FROM `tbl_user_data` WHERE `id` = '".($this->session->userdata['logged_in']['id'])."'";
		$data['getname'] = $this->Saraban_model->getdatalist($sql);
		
		$this->load->view('templates/saraban/header_user'); 
		$this->load->view('templates/saraban/menu_index');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/index/index_body',$data); 
		$this->load->view('saraban_files/index/index_js');			
	}

	//--------------------login----------------------//
	public function login_user(){
		$this->load->view('saraban_files/login_user');
				
	}
	//------------------------------------------
	public function login_admin(){
		$this->load->view('saraban_files/login_admin'); 
				
	}
	//------------------------------------------
	public function register(){
		$this->load->view('saraban_files/register_user');
				
	}
	//------------------------------------------
	public function forgotpassword(){
		$this->load->view('saraban_files/forgot-password.php');
				
	}
	//------------------------------------------
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

		$result = $this->Login_database_saraban->user_login($data);

		if ($result != false) {

			$data = array(
					'last_login' => date("Y-m-d H:i:sa")
				);

			$log = $this->Login_database_saraban->log_last_login_user($data,$username);

			if($log != false){

				$login_status = 'success';
			}

		} 

		$resp['login_status'] = $login_status;


		// Login Success URL
		if($login_status == 'success')
		{
			// If you validate the user you may set the user cookies/sessions here
			$resultuser = $this->Login_database_saraban->read_user_information($username);

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
	//------------------------------------------
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

		$result = $this->Login_database_saraban->admin_login($data);
 
		if ($result != false) {

			$data = array(
					'last_login' => date("Y-m-d H:i:sa")
				);
			
			$log = $this->Login_database_saraban->log_last_login_admin($data,$username);

			if($log != false){

				$login_status = 'success';
			}

				} 

		$resp['login_status'] = $login_status;


		// Login Success URL
		if($login_status == 'success')
		{
			// If you validate the user you may set the user cookies/sessions here
			$resultuser = $this->Login_database_saraban->read_admin_information($username);

			if ($resultuser != false) {

				$session_data = array(
					'firstname' 	=> $resultuser[0]->firstname,
					'lastname' 		=> $resultuser[0]->lastname,
					'username' 		=> $resultuser[0]->user_name,
					'id'   			=> $resultuser[0]->id,
					'status'   		=> "admin_saraban"
				);

				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);	

			}
			
			// Set the redirect url after successful login
			$resp['redirect_url'] = 'list_saraban'; 
		}

		echo json_encode($resp);			
	}
	//------------------------------------------
	// Validate and store registration data in database
	public function new_user_registration(){

			# Response Data Array
			$resp = array();

			// Fields Submitted					
			$fname 		= $this->input->post("fname");
			$lname 		= $this->input->post("lname");
			$phone 		= $this->input->post("phone");
			$username 	= $this->input->post("username");
			$email 		= $this->input->post("email");
			$password 	= $this->input->post("password");
			$position_level = $this->input->post("position_level");
			$position_name 	= $this->input->post("position_name");

			$data = array(
				'firstname' 	=> $fname,
				'lastname' 		=> $lname,
				'telephone' 	=> $phone,
				'user_name' 	=> $username,
				'email' 		=> $email,
				'password' 		=> md5($password),
				'date_add'		=> date("Y-m-d H:i:sa"),
				'user_type'		=> "1",
				'position_level'=> (int)$position_level,
				'position_name' => $position_name 
			);

			$register_status = 'invalid';
			$result = $this->Login_database_saraban->registration_insert($data);

			$register_status = $result;
			
			$resp['register_status'] = $register_status;

			if($register_status == 'success')
			{
				// Set the redirect url after successful register
				$resp['redirect_url'] = 'login_user';
			}

			echo json_encode($resp);	
	}
	//------------------------------------------
	public function forgotpassword_User(){

		# Response Data Array
			$resp = array();

			$email 	= $this->input->post('email');

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
			      
			        $email_body    = "<div>".$subject."</div><div>username -->".$data1[0]->user_name."</div><div>new password -->".implode($pass)."</div><div>link login --> ".base_url('saraban/login_user')."</div>"; 
			      
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
	//------------------------------------------
	// Logout from admin page
	public function logout(){
		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$this->load->view('saraban_files/login_user');
	}
	//-----------------personal Information---------------//

	public function personal_Information(){

		if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){

			$this->load->model("Login_database_saraban");
			$id = $this->session->userdata['logged_in']['id'];
			$data = array();
			$data['getdata'] = $this->Login_database_saraban->read_admin_information_id($id);

			$this->load->view('templates/saraban/header1'); 
			$this->load->view('templates/saraban/menu_list_admin_chp');
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/personal_Information/edit_infor_admin',$data);
			$this->load->view('saraban_files/personal_Information/edit_infor_admin_js');

		}else if(($this->session->userdata['logged_in']['status']) == "user"){

			$id = $this->session->userdata['logged_in']['id'];
			$data = array();
			$this->load->model("Login_database_saraban");
			$datatt['getdata'] = $this->Login_database_saraban->read_user_information_id($id);

			$this->load->view('templates/saraban/header1');
			$this->load->view('templates/saraban/menu_ilst_user_chp'); 
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/personal_Information/edit_infor',$datatt);
			$this->load->view('saraban_files/personal_Information/edit_infor_js');

		}
	}
        //----------------------------------
	public function Add_member($currentID=null){
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
       // $getuserdata = $this->Saraban_model->getuserdata($id);

		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_manageuser_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/managemember_admin/Add_member',$data);
		$this->load->view('saraban_files/managemember_admin/Add_member_js');
		}
	//------------------------------------------
	public function edit_personal_Information(){

		if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){

			$data = array(
				"user_update"	=> $this->input->post('id'),
				"chk_authen"	=> $this->input->post('chk_authen'),
				"user_name"		=> $this->input->post('user_name'), 
				"email"			=> $this->input->post('email'),
				"firstname"		=> $this->input->post('firstname'),
				"lastname"		=> $this->input->post('lastname')
			);

			 $table = "tbl_admin_saraban";
			 $id	= $this->input->post('id');

			$this->load->model("Saraban_model"); 

			$result = $this->Saraban_model->updateUser($data,$id,$table);
			echo json_encode($result); 
			exit;
			

		}else if(($this->session->userdata['logged_in']['status']) == "user"){
			
			$data = array(
				"user_update"	=> $this->input->post('id'),
				"chk_authen"	=> $this->input->post('chk_authen'),
				"user_name"		=> $this->input->post('user_name'),
				"email"		=> $this->input->post('email'),
				"titlename"		=> $this->input->post('titlename'),
				"firstname"		=> $this->input->post('firstname'),
				"lastname"		=> $this->input->post('lastname'),
				"telephone"		=> $this->input->post('telephone'),
				"position_level"=> $this->input->post('position_level'),
				"position_name"	=> $this->input->post('position_name')
			);

			 $table = "tbl_user_data";
			 $id	= $this->input->post('id');

			$this->load->model("Saraban_model"); 

			$result = $this->Saraban_model->updateUser($data,$id,$table);
			echo json_encode($result); 
			exit;

			
		}
	}	
 	//------------------------------------------
	public function insert_topic(){

		$user_update =  $this->input->post('user_update');
                $maxcount = $this->Saraban_model->maxcount();
                $maxcount1 = $maxcount+1;
                $loop = 3;
		$x = '';
                for ($i = 1; $i <= $loop; $i++) {
                $x = $x."0";
		}
                $maxcount2 = $this->input->post('numbersarabun').$x.$maxcount1;
		$data = array(  
			"in_out"   	=> $this->input->post('inorout'),
			"circular_letter"   	=> $this->input->post('circular_letter'),
			"id_saraban"   	=> $maxcount2,
			"count_saraban"   	=> $maxcount1,
			"firstname"   	=> $this->input->post('fname'),
			"lastname"    	=> $this->input->post('lname'),
			"chk_authen" 	=> $this->input->post('chk'),
			"user_update" 	=> $this->input->post('user_update'),
			"user_create" 	=> $this->input->post('user_create'), 
			"topic" 		=> $this->input->post('topic'),
			"date_add"      => date("Y-m-d H:i:sa")
		);
	 
		$this->load->model("Saraban_model"); 
		$result = $this->Saraban_model->insert_topic($data,$user_update);
		echo json_encode($result); 
		exit;
	}
	//------------------------------------------
	public function edit_saraban(){

		$id_saraban 	= $this->input->post('id_saraban');

		$data = array(  
			"firstname"   	=> $this->input->post('fname'),
			"lastname"    	=> $this->input->post('lname'),
			"remark"   		=> $this->input->post('remark'),
			"ref_no"    	=> $this->input->post('refno'), 
			"user_update" 	=> $this->input->post('user_update'),
			"topic" 		=> $this->input->post('topic'),
			"chk_authen"	=> $this->input->post('chk_authen')
		);
		$this->load->model("Saraban_model"); 
		$result = $this->Saraban_model->edit_saraban($data,$id_saraban);

		$data2 = array(  
			"user_update" 	=> $this->input->post('user_update'),
			"topic" 		=> $this->input->post('topic'),
			"chk_authen"	=> $this->input->post('chk_authen')
		);

		$result2 = $this->Saraban_model->edit_allow($data2,$id_saraban);
		echo json_encode($result); 
		exit; 
	}
	//------------------------------------------
	public function delect_saraban(){

		$id_saraban 	= $this->input->post('id_saraban');

		$data = array(  
			"data_status"   => '0',
			"user_update" 	=> $this->input->post('user_update'),
			"chk_authen"	=> $this->input->post('chk_authen')

			
		);

		$this->load->model("Saraban_model"); 
		$result = $this->Saraban_model->edit_saraban($data,$id_saraban);
		echo json_encode($result); 
		exit;
	}
	//------------------------------------------
	public function list_saraban(){

		if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){
			
			$this->load->model("Saraban_model");
			$data = array();              
			$data['getdata'] = $this->Saraban_model->getdata();  
			$data['count1'] = $this->Saraban_model->getcountidsaraban();
			$data['count2'] = $this->Saraban_model->getcountmember();
			$data['count3'] = $this->Saraban_model->getcountcancel(); 
			$sql = "SELECT id, user_name as user , firstname as fname , lastname as lname FROM `tbl_user_data` where data_status = '1'";
		$data['getuser'] = $this->Saraban_model->getalluser($sql); 
			$this->load->view('templates/saraban/header1'); 
			$this->load->view('templates/saraban/menu_list_admin');  
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/list_user/list_saraban',$data);
			$this->load->view('saraban_files/list_user/list_saraban_js');	

		}else if(($this->session->userdata['logged_in']['status']) == "user"){
			$sql = "SELECT * FROM `manage_saraban` 
			WHERE `user_create` = ".($this->session->userdata['logged_in']['id'])." 
			and data_status = '1' ORDER by date_add DESC";

			$this->load->model("Saraban_model"); 
			$data = array();
			$data['getdata'] = $this->Saraban_model->getdatalist($sql); 
			
			$this->load->view('templates/saraban/header1');
			$this->load->view('templates/saraban/menu_ilst_user'); 
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/list_user/list_saraban',$data);
			$this->load->view('saraban_files/list_user/list_saraban_js');	
		}				
	}

	//--------------------for manageuser admin--------------------//
	public function manageuser_admin(){
		$this->load->model("Saraban_model");   
		$data = array();               
		$sql = "SELECT DISTINCT user.firstname,user.lastname,user.position_level,user.id 
				FROM tbl_user_data as user 
				INNER JOIN manage_saraban as mn on user.id = mn.user_create";
		$data['getuser'] = $this->Saraban_model->getuser($sql);
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel();
		
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_manageuser_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/manageuser_admin/manageuser_admin_body',$data);
		$this->load->view('saraban_files/manageuser_admin/manageuser_admin_js');
	}
        //-----------------------------------------------------------------------
	public function managemember_admin(){
		$this->load->model("Saraban_model");   
		$data = array();               
		$sql = "SELECT  user.*,ca.career,po.position FROM tbl_user_data as user LEFT JOIN tbl_career_data as ca on user.career_id = ca.id LEFT JOIN  tbl_position_data as po on user.position_id = po.id WHERE user.data_status = '1' AND user_type != '2' ORDER BY user.firstname ASC";
		$data['getuser'] = $this->Saraban_model->getuser($sql);
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel();
		
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_managemember_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/managemember_admin/managemember_admin_body',$data);
		$this->load->view('saraban_files/managemember_admin/managemember_admin_js');
	}
	//------------------------------------------
	public function adminviewlist(){
		$id =  $this->uri->segment(3);   
		
		$sql = "SELECT mn.id,mn.id_saraban, mn.firstname,mn.remark,mn.ref_no,mn.in_out,mn.circular_letter, mn.lastname, mn.date_add, mn.date_modify, mn.data_status, mn.user_update, mn.topic, mn.user_create,mn.copy_file, user.firstname as create_fname , user.lastname as create_lname,user.user_name
				FROM `manage_saraban` as mn
				INNER JOIN tbl_user_data as user on user.id = '$id'
				WHERE `user_create` = '$id' AND mn.data_status = '1' ORDER by mn.date_add DESC";

		$this->load->model("Saraban_model"); 
		$data = array();  
		$data['getdata'] = $this->Saraban_model->getdatalist($sql); 
		$data['username'] = $id; 
                $sql1 = "SELECT id, user_name as user , firstname as fname , lastname as lname FROM `tbl_user_data` where data_status = '1'";
		$data['getuser'] = $this->Saraban_model->getalluser($sql1); 
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel();
		
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_list_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/list_user/list_saraban',$data); 
		$this->load->view('saraban_files/list_user/list_saraban_js');
	}
	//--------------------for managecancel admin--------------------//	
	public function managecancel_admin(){ 
		$this->load->model("Saraban_model");    
		$data = array();  
		$user = array();             
		$data['getcancel'] = $this->Saraban_model->getcancel();  
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		$sql = "SELECT id, user_name as user , firstname as fname , lastname as lname FROM `tbl_user_data` where data_status = '1'";
		$data['getuser'] = $this->Saraban_model->getalluser($sql); 
		 
		$this->load->view('templates/saraban/header_admin'); 
		$this->load->view('templates/saraban/menu_managecancel_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/managecancel_admin/managecancel_admin_body',$data);
		$this->load->view('saraban_files/managecancel_admin/managecancel_admin_js'); 
	}
        //------------------------------------------
        	public function manageprevious_admin(){ 
		$this->load->model("Saraban_model");    
		$data = array();  
		$user = array();             
		$data['getprevious'] = $this->Saraban_model->getprevious();  
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		$sql = "SELECT id, user_name as user , firstname as fname , lastname as lname FROM `tbl_user_data` where data_status = '1'";
		$data['getuser'] = $this->Saraban_model->getalluser($sql); 
		 
		$this->load->view('templates/saraban/header_admin'); 
		$this->load->view('templates/saraban/menu_manageprevious_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/manageprevious_admin/manageprevious_admin_body',$data);
		$this->load->view('saraban_files/manageprevious_admin/manageprevious_admin_js'); 
	}
	//------------------------------------------
	public function reset_saraban(){

		$id_saraban 	= $this->input->post('id_saraban');

		$data = array(  
			"firstname"   	=> $this->input->post('fname'),
			"lastname"    	=> $this->input->post('lname'),
			"user_update" 	=> $this->input->post('user_update'),
			"chk_authen" 	=> $this->input->post('chk'), 
			"remark"   		=> $this->input->post('remark'),
			"ref_no"    	=> $this->input->post('refno'),
			"topic" 		=> $this->input->post('topic'),
			"data_status"	=> "1",
			"user_create" 	=> $this->input->post('user_create')
		);
		$this->load->model("Saraban_model"); 
		$result = $this->Saraban_model->edit_saraban($data,$id_saraban);

		$data2 = array(  
			"user_update" 	=> $this->input->post('user_update'),
			"topic" 		=> $this->input->post('topic'),
			"chk_authen"	=> $this->input->post('chk_authen')
		);

		$result2 = $this->Saraban_model->edit_allow($data2,$id_saraban);
		echo json_encode($result); 
		exit; 
	}
	//------------------------------------------
	public function addprevios(){
        
            $today = date("Y-m-d H:i:s");

		$data = array(  
			"id_saraban"   	=> $this->input->post('numbersarabun'),
			"main_saraban"   	=> $this->input->post('mainsarabun'),
			"firstname"   	=> $this->input->post('fname'),
			"lastname"    	=> $this->input->post('lname'),
			"user_update" 	=> $this->input->post('user_update'),
			"chk_authen" 	=> $this->input->post('chk'), 
			"remark"   		=> $this->input->post('remark'),
			"ref_no"    	=> $this->input->post('refno'),
			"topic" 		=> $this->input->post('topic'),
			"in_out" 		=> $this->input->post('inorout'),
			"circular_letter" 		=> $this->input->post('circular_letter'),
			"data_status"	=> "1",
			"date_saraban"	=> $this->input->post('date'),
			"date_add"	=> $today,
			"user_id" 	=> $this->input->post('user_id')
		);
		$this->load->model("Saraban_model"); 
		$result = $this->Saraban_model->addprevios($data);
		echo json_encode($result); 
		exit; 
	}
	//------------------------------------------
	public function edit_previousSaraban(){
        
            $iddata = $this->input->post('iddata');
            $today = date("Y-m-d H:i:s");

		$data = array(  
			"id_saraban"   	=> $this->input->post('numbersarabun'),
			"firstname"   	=> $this->input->post('fname'),
			"lastname"    	=> $this->input->post('lname'),
			"user_update" 	=> $this->input->post('user_update'),
			"chk_authen" 	=> $this->input->post('chk'), 
			"remark"   		=> $this->input->post('remark'),
			"ref_no"    	=> $this->input->post('refno'),
			"topic" 		=> $this->input->post('topic'),
			"in_out" 		=> $this->input->post('inorout'),
			"circular_letter" 		=> $this->input->post('circular_letter'),
			"data_status"	=> "1",
			"date_saraban"	=> $this->input->post('date'),
			"date_add"	=> $today,
			"user_id" 	=> $this->input->post('user_id')
		);
		$this->load->model("Saraban_model"); 
		$result = $this->Saraban_model->edit_previousSaraban($data,$iddata);
		echo json_encode($result); 
		exit; 
	}
	//--------------------chang password--------------------//	
	public function change_password(){ 
		if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){
			$this->load->view('templates/saraban/header1'); 
			$this->load->view('templates/saraban/menu_list_admin_chp');
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/change_password/change_password');
			$this->load->view('saraban_files/change_password/change_password_js');

		}else if(($this->session->userdata['logged_in']['status']) == "user"){
			$this->load->view('templates/saraban/header1');
			$this->load->view('templates/saraban/menu_ilst_user_chp');
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/change_password/change_password');
			$this->load->view('saraban_files/change_password/change_password_js');
		}
	}
	//------------------------------------------	
	public function chk_username(){

		if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){

			
			$user_name	= $this->input->post('user_name');
			$id			= $this->input->post('id');
			$table 		= "tbl_admin_allowance";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;
			

		}else if(($this->session->userdata['logged_in']['status']) == "user" ){
			
			 $user_name	= $this->input->post('user_name');
			 $table 	= "tbl_user_data";
			 $id		= $this->input->post('id');

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_username($id,$user_name,$table);
			echo json_encode($result); 
			exit;			
		}
	}
	//------------------------------------------
	public function chk_email(){

		if(($this->session->userdata['logged_in']['status']) == "admin_saraban" ){

			
			$email	= $this->input->post('email');
			$id	    = $this->input->post('id');

			 $table = "tbl_admin_allowance";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_email($id,$email,$table);
			echo json_encode($result); 
			exit;
			

		}else if(($this->session->userdata['logged_in']['status']) == "user"){
			
			$email	= $this->input->post('email');
			$id	    = $this->input->post('id');

			$table = "tbl_user_data";

			$this->load->model("Allowance_model"); 

			$result = $this->Allowance_model->chk_email($id,$email,$table);
			echo json_encode($result); 
			exit;
			
		}
	}
        //----------------------------------------
        public function ch_emailmember() {
            $this->load->model("Saraban_model");  
       $changeValue = $this->input->post('email');
        $result = $this->Saraban_model->count_mail($changeValue);
        echo $result;
        }
        //----------------------------------------
        public function ch_usermember() {
        $this->load->model("Saraban_model");  
       $changeValue = $this->input->post('user');
        $result = $this->Saraban_model->count_user($changeValue);
        echo $result;
        }
	//------------------------------------------
	public function edit_pass(){
		if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){


			$data = array(
				"user_update"	=> $this->input->post('id'),
				"password"		=> md5($this->input->post('new_pass')),
				"chk_authen"	=> $this->input->post('chk_authen')
			);
			$table 		= "tbl_admin_saraban";
			$username 	=  $this->input->post('username');
			$oldpass 	=  md5($this->input->post('old_pass'));

			$this->load->model("Saraban_model"); 

			$resultoldpass = $this->Saraban_model->chk_old_pass($oldpass,$username,$table);

			if($resultoldpass == true){
				$result = $this->Saraban_model->edit_pass($data,$username,$table);
				echo json_encode($result); 
				exit;
			}else{
				echo json_encode("errorpass"); 
				exit;
			}

		}else if(($this->session->userdata['logged_in']['status']) == "user"){


			$data = array(
				"user_update"	=> $this->input->post('id'),
				"password"		=> md5($this->input->post('new_pass')),
				"chk_authen"	=> $this->input->post('chk_authen')
			);

			$table 		= "tbl_user_data";
			$username 	=  $this->input->post('username');
			$oldpass 	= md5($this->input->post('old_pass'));

			$this->load->model("Saraban_model"); 

			$resultoldpass = $this->Saraban_model->chk_old_pass($oldpass,$username,$table);

			if($resultoldpass == true){
				$result = $this->Saraban_model->edit_pass($data,$username,$table);
				echo json_encode($result); 
				exit;
			}else{
				echo json_encode("errorpass"); 
				exit;
			}
		}
	}	
	//--------------------allowance--------------------//
	public function index_admin(){ //pending
		$sql = "SELECT mnall.id_allowance,mnall.type_allow,mnall.footer, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update , user.firstname , user.lastname ,user.telephone,mnall.topic
				FROM manage_allowance as mnall 
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				WHERE mnall.data_status = '1' and mnall.check_doc = '2' and mnall.text6 = '0' or mnall.text6 = '2' or mnall.text6 = '3'
				ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdataPending'] = $this->Allowance_model->getdata($sql);
		$this->load->model("Saraban_model");     
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		 
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_1_admin');
		$this->load->view('templates/saraban/header2'); 
		$this->load->view('saraban_files/allowance_admin/pending/pending_admin',$data); 
		$this->load->view('saraban_files/allowance_admin/pending/pending_admin_js');			
	}
 	//------------------------------------------
	public function fail_admin(){
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban,mnall.footer, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2 ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.file_Orig2 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic, mnall.remark , user.firstname , user.lastname ,user.telephone
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				WHERE mnall.data_status = '1' and mnall.check_doc = '0' and mnall.text6 = '0' or mnall.text6 = '2' or mnall.text6 = '3'
				ORDER BY date_modify ASC"; 
		$this->load->model("Allowance_model");   
		$data = array();              
		$data['getdata'] = $this->Allowance_model->getdata($sql);
		$this->load->model("Saraban_model");     
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		 
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_1_admin');
		$this->load->view('templates/saraban/header2'); 
		$this->load->view('saraban_files/allowance_admin/faildoc/fail_admin',$data); 
		$this->load->view('saraban_files/allowance_admin/faildoc/fail_admin_js');			
	}
	//------------------------------------------
	public function chkstatus_admin(){ //pending
		$sql = "SELECT mnall.id_allowance, mnall.id_saraban,mnall.footer, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic, user.firstname , user.lastname ,user.telephone
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
				WHERE mnall.data_status = '1' and mnall.check_doc = '1' and mnall.text6 = '0' or mnall.text6 = '2' or mnall.text6 = '3'
				ORDER BY date_modify ASC";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdata'] = $this->Allowance_model->getdata($sql); 
		$this->load->model("Saraban_model");     
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		 
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_1_admin');
		$this->load->view('templates/saraban/header2'); 
		$this->load->view('saraban_files/allowance_admin/chkstatus/chkstatus_admin',$data); 
		$this->load->view('saraban_files/allowance_admin/chkstatus/chkstatus_admin_js');			
	}
	//------------------------------------------
	public function detail(){
		$id_allow =  $this->uri->segment(3);
		$sql = "SELECT user.titlename,user.email,mnall.id_allowance as id_allow,mnall.type_allow,mnall.footer, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic ,user.firstname ,user.lastname
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user on mnall.user_create = user.id
				where mnall.id_allowance = '$id_allow' and mnall.data_status = '1' and (mnall.text6 = '0' or mnall.text6 = '2' or mnall.text6 = '3')";
		$this->load->model("Allowance_model");
		$data = array();              
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql);
		$data['sql'] = $sql;

		$sql = "SELECT * FROM `tbl_user_data` where approve = '1' and data_status = '1'";
		$data['getapprove'] = $this->Allowance_model->getdata($sql);
		$this->load->model("Saraban_model");     
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		 
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_1_admin');
		$this->load->view('templates/saraban/header2');
		$this->load->view('saraban_files/allowance_admin/detail/detail',$data); 
		$this->load->view('saraban_files/allowance_admin/detail/detail_js');
	}
	//------------------------------------------
	public function detail_notedit(){ 
		$data = array(); 
		$id_allow =  $this->uri->segment(3);
		$chkfail = $this->uri->segment(4);
		if($chkfail == "faildoc"){ 
			$sql = "SELECT mnall.id_allowance,mnall.type_allow,mnall.footer, mnall.command, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic,mnall.ref_saraban
				FROM manage_allowance as mnall
				where  mnall.id_allowance = '$id_allow' and mnall.data_status = '1' and (mnall.text6 = '0' or mnall.text6 = '2' or mnall.text6 = '3')";
			$data['chkfail'] = "true";
		}else{
			$sql = "SELECT user.titlename,mnall.id_allowance,mnall.type_allow,mnall.footer, mnall.command, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1 , mnall.file_name2  ,mnall.file_name3 , mnall.file_name4 ,mnall.file_name5, mnall.file_Orig1 , mnall.file_Orig2 ,mnall.file_Orig3 , mnall.file_Orig4 ,mnall.file_Orig5 , mnall.expenses1 , mnall.expenses2 , mnall.expenses3 , mnall.expenses4 , mnall.remark_Expenses4 , mnall.date_expenses1 , mnall.date_expenses2 , mnall.date_expenses3 , mnall.date_expenses4 , mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update ,  mnall.topic,user.position_level,user.position_name, user.firstname ,user.lastname,mnall.ref_saraban
				FROM manage_allowance as mnall
				INNER JOIN tbl_user_data as user on user.id = mnall.send_to
				where  mnall.id_allowance = '$id_allow' and mnall.data_status = '1' and mnall.text6 = '0'";
			$data['chkfail'] = "false";
		}            
		$this->load->model("Allowance_model"); 
		$data['getdataAllow'] = $this->Allowance_model->getdata($sql); 
		$this->load->model("Saraban_model");     
		$data['count1'] = $this->Saraban_model->getcountidsaraban();
		$data['count2'] = $this->Saraban_model->getcountmember();
		$data['count3'] = $this->Saraban_model->getcountcancel(); 
		 
		$this->load->view('templates/saraban/header_admin');
		$this->load->view('templates/saraban/menu_1_admin');
		$this->load->view('templates/saraban/header2'); 
		$this->load->view('saraban_files/allowance_admin/detail_notedit/detail',$data); 
		$this->load->view('saraban_files/allowance_admin/detail_notedit/detail_js');
	} 
	//------------------------------------------
	public function update_chk_doc(){
		$chkprocess = $this->input->post('process');
		if($chkprocess == "pass"){
			$data = array(
				"check_doc"			=> "1",
				"approve_status"	=> "2",
				"id_saraban"		=> $this->input->post('id_saraban'),
				"command"			=> $this->input->post('command'),
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
	/***********************************REPORT**************************************/
	public function report(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT saraban.date_add,saraban.id_saraban,saraban.topic FROM manage_saraban as saraban WHERE saraban.user_create = ".($this->session->userdata['logged_in']['id'])." AND saraban.data_status = '1' ORDER by saraban.date_add DESC";

			$this->load->model("Saraban_model"); 
			$data = array();
			$data['getdata'] = $this->Saraban_model->getdatalist($sql);
			
			$this->load->view('templates/saraban/header1'); 
			$this->load->view('templates/saraban/menu_report_user',$data);
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/report/report');
			$this->load->view('saraban_files/report/report_js');

		} else {
	    	 header("location:".base_url('saraban/login_user'));
	  	}
	}
	//------------------------------------------
	public function report_saraban_admin(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT saraban.firstname,saraban.lastname,saraban.user_create,saraban.date_add,saraban.id_saraban,saraban.topic FROM manage_saraban as saraban WHERE  saraban.data_status = '1' ORDER by saraban.date_add DESC";
                        $sql1 = "SELECT DISTINCT manage_saraban.id_saraban FROM manage_saraban UNION 
SELECT DISTINCT  tbl_saraban_previous.id_saraban FROM tbl_saraban_previous";
			$this->load->model("Saraban_model"); 
			$data = array();
			$data['getdata'] = $this->Saraban_model->getdatalist($sql);
			$data['idsarabandata'] = $this->Saraban_model->getdatalist($sql1);
			
			$this->load->view('templates/saraban/header_admin'); 
			$this->load->view('templates/saraban/menu1_report_admin');
			$this->load->view('templates/saraban/header2');
			$this->load->view('saraban_files/report/report_admin',$data);
			$this->load->view('saraban_files/report/report_admin_js');

		} else {
	    	 header("location:".base_url('saraban/login_user'));
	  	}
	}
	//------------------------------------------
	public function get_report(){

		$key			= "";

		$id 			= $this->input->post('id');
		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
//		$dd 			= $this->input->post('dd');
//		$mm 			= $this->input->post('mm');
//		$yy 			= $this->input->post('yy');
		
		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' saraban.date_add BETWEEN \''.$date1.'\' AND  \''.$date2.'\'';
			} else{
				$key = $key.' and saraban.date_add BETWEEN \''.$date1.'\' AND  \''.$date2.'\'';
			}
		}
		

		if( $id != ''){
			if($key==""){
				$key = $key.' saraban.user_create='.$id;
			} else{
				$key = $key.' and saraban.user_create ='.$id;
			}
		}
		 
		 if($id_saraban != '0'){
			if($key==""){
				$key = $key.' saraban.id_saraban=\''.$id_saraban.'\'';
			} else{
				$key = $key.' and saraban.id_saraban=\''.$id_saraban.'\'';
			}	
		}
		 if($topic != '0'){
			if($key==""){
				$key = $key.' saraban.topic=\''.$topic.'\'';
			} else{
				$key = $key.' and saraban.topic=\''.$topic.'\'';
			}
		}
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
	

			$sql = "SELECT DISTINCT saraban.date_add,saraban.id_saraban,saraban.topic FROM manage_saraban as saraban WHERE ".$key." AND saraban.data_status = '1' ORDER by saraban.date_add DESC";

			$this->load->model("Saraban_model"); 

			$data=array();              
            $data['allow'] = $this->Saraban_model->getdatalist($sql);
			
			echo json_encode($data); 
			exit;
	}
	//------------------------------------------
	public function get_report_saraban_admin(){

		$key			= "";
                $key_p                  = "";
		$id_saraban 	= $this->input->post('id_saraban');
		$topic 			= $this->input->post('topic');
//		$dd 			= $this->input->post('dd');
//		$mm 			= $this->input->post('mm');
//		$yy 			= $this->input->post('yy');		
		$date1        = $this->input->post('date1');
		$date2        = $this->input->post('date2');
		$firstname     = $this->input->post('firstname');
		$lastname     = $this->input->post('lastname');

		if($key==""){
				$key = $key." saraban.data_status = '1'";
                                $key_p  = $key_p." previous.data_status = '1'";
		} else{
				$key = $key." and saraban.data_status = '1'";
                                $key_p  = $key_p." and previous.data_status = '1'";
		}	

		if($firstname != '0'){
			if($key==""){
				$key = $key.' saraban.firstname =\''.$firstname.'\'';
                                 $key_p  = $key_p.' previous.firstname =\''.$firstname.'\'';
			} else{
				$key = $key.' and saraban.firstname =\''.$firstname.'\'';
                                 $key_p  = $key_p.' and previous.firstname =\''.$firstname.'\'';
			}	
		}

		if($lastname != '0'){
			if($key==""){
				$key = $key.' saraban.lastname= \''.$lastname.'\'';
                                 $key_p  = $key_p.' previous.lastname= \''.$lastname.'\'';
			} else{
				$key = $key.' and saraban.lastname=\''.$lastname.'\'';
                                 $key_p  = $key_p.' and previous.lastname=\''.$lastname.'\'';
			}	
		}

		if( $date1 != '' && $date2 != ''){
			if($key==""){
				$key = $key.' saraban.date_add BETWEEN \''.$date1.'\' AND  \''.$date2.'\'';
                                $key_p  = $key_p.' previous.date_add BETWEEN \''.$date1.'\' AND  \''.$date2.'\'';
			} else{
				$key = $key.' and saraban.date_add BETWEEN \''.$date1.'\' AND  \''.$date2.'\'';
                                 $key_p  = $key_p.' and previous.date_add BETWEEN \''.$date1.'\' AND  \''.$date2.'\'';
			}
		}

		 
		 if($id_saraban != '0'){
			if($key==""){
				$key = $key.' saraban.id_saraban=\''.$id_saraban.'\'';
                                 $key_p  = $key_p.' previous.id_saraban=\''.$id_saraban.'\'';
			} else{
				$key = $key.' and saraban.id_saraban=\''.$id_saraban.'\'';
                                 $key_p  = $key_p.' and previous.id_saraban=\''.$id_saraban.'\'';
			}	
		}
		 if($topic != '0'){
			if($key==""){
				$key = $key.' saraban.topic=\''.$topic.'\'';
                                 $key_p  = $key_p.' previous.topic=\''.$topic.'\'';
			} else{
				$key = $key.' and saraban.topic=\''.$topic.'\'';
                                 $key_p  = $key_p.' and previous.topic=\''.$topic.'\'';
			}
		}
//		 if($dd != '0'){
//			if($key==""){
//				$key = $key.' saraban.date_add LIKE "%_%_%_%_%_%_%_%_%_%_%_%_%'.$dd.'"';
//			} else{
//				$key = $key.' and saraban.date_add LIKE "%_%_%_%_%_%_%_%_%_%_%_%_%'.$dd.'"';
//			}
//		}
//		 if($mm != '0'){
//			if($key==""){
//				$key = $key.' saraban.date_add LIKE "_%_%_%_%_%'.$mm.'_%_%_%'.'"';
//			} else{
//				$key = $key.' and saraban.date_add LIKE "_%_%_%_%_%'.$mm.'_%_%_%'.'"';
//			}
//		}
//		 if($yy != '0'){
//			if($key==""){
//				$key = $key.' saraban.date_add LIKE "'.$yy.'%'.'"';
//			} else{
//				$key = $key.' and saraban.date_add LIKE "'.$yy.'%'.'"';
//			}
//		}
	

//			$sql = "SELECT DISTINCT saraban.firstname,saraban.lastname,saraban.date_add,saraban.id_saraban,saraban.topic,previous.firstname,previous.lastname,previous.date_add,previous.id_saraban,previous.topic,previous.date_saraban FROM manage_saraban as saraban LEFT JOIN tbl_saraban_previous as previous ON saraban.id = previous.main_saraban WHERE ".$key." ORDER by saraban.id_saraban ASC,saraban.date_add ASC";
                     $sql = 'SELECT saraban.id, saraban.firstname, saraban.lastname, saraban.date_add, saraban.id_saraban, saraban.topic, 

GROUP_CONCAT(
  IF('.$key_p.',
    CONCAT(previous.id_saraban,\'->\',previous.firstname,\'->\',previous.lastname,\'->\',previous.date_saraban,\'->\',previous.date_add,\'->\',previous.topic) 
 ,"")
    ORDER BY previous.id_saraban ASC ) AS grp_sub_name
FROM manage_saraban AS saraban 
LEFT JOIN tbl_saraban_previous AS previous ON previous.main_saraban= saraban.id 
WHERE '.$key.'
GROUP BY
saraban.id,
saraban.firstname, 
saraban.lastname, saraban.date_add, 
saraban.id_saraban, saraban.topic 
order by saraban.id ASC';

                     $sql1 = 'SELECT DISTINCT previous.id, previous.firstname, previous.lastname, previous.date_add, previous.id_saraban, previous.topic FROM tbl_saraban_previous AS previous WHERE '.$key_p.' AND previous.data_status = "1" ORDER by previous.date_add DESC';
                     
                     
                     
			$this->load->model("Saraban_model"); 

			$data=array();              
            $data['allow'] = $this->Saraban_model->getdatalist($sql);
            $data['previous'] = $this->Saraban_model->getdatalist($sql1);
			
			echo json_encode($data); 
			exit;
	}
	//------------------------------------------
	public function report_allowance_admin(){
		if (isset($this->session->userdata['logged_in'])) {
	  
			$sql = "SELECT DISTINCT  user.firstname , user.lastname ,allowance.user_create,allowance.date_add,allowance.id_allowance,allowance.id_saraban,allowance.check_doc,allowance.approve_status,allowance.remark,allowance.topic FROM manage_allowance as allowance 
				INNER JOIN tbl_user_data as user ON allowance.user_create = user.id
			WHERE allowance.data_status = '1' ORDER by allowance.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			
			$this->load->view('templates/saraban/header_admin'); 
			$this->load->view('templates/saraban/menu1_report_admin',$data);
			$this->load->view('templates/saraban/header2');
			$this->load->view('allowance_files/report/report_admin');
			$this->load->view('allowance_files/report/report_admin_js');

		} else {
	    	 header("location:".base_url('allowance/login_user'));
	  	}
	}
	//------------------------------------------
	public  function usernamesearh(){
			$changeValue = $this->input->post('changeValue');
		$result = $this->Saraban_model->usernamesearh($changeValue);
                $countrow = $result->num_rows();
                if($countrow >0){
            foreach ($result->result() as $result2){}
            $nameuser = $result2->firstname.'/'.$result2->lastname.'/'.$result2->id;
                }else{
                    $nameuser = 'error';
                }
            echo $nameuser;
         }
         //-------------------------------------------------
         public  function editsaraban(){
		$ID = $this->input->post('id');
		$previousData = $this->Saraban_model->list_previousData($ID);
                foreach ($previousData->result() as $previousData2){}?>

<div class="modal-dialog modal-lg " >
<div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button> 
                        ขอเลขสารบรรณย้อนหลัง
                    </div>
                </div>

                <div class="modal-body">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" role="form" id="frmpre">
                        <div class="row">

                            <label for="field-4" class="col-sm-2 text-left">วันที่ขอใช้เลข</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="date" name="date" placeholder="" value="<?php echo $previousData2->date_saraban?>">
                            </div>
                            <div class="col-md-3">
                                <input type="hidden" id="inorout" name="inorout">
                                <div class="radio radio-replace recheck <?php //if($previousData2->in_out == '1'){echo 'checked';}?>">
                                    <input type="radio" name="in_out[]" id="in_out" value="1"  onClick="inout(this.value)" <?php //if($previousData2->in_out == '1'){echo 'checked';}?>>
                                    <label>หนังสือภายใน</label>
                                </div>
                                <div class="radio radio-replace recheck <?php //if($previousData2->in_out == '2'){echo 'checked';}?>">
                                    <input type="radio" name="in_out[]" id="in_out1" value="2"  onClick="inout(this.value)" <?php //if($previousData2->in_out == '2'){echo 'checked';}?>>
                                    <label>หนังสือภายนอก</label>
                                </div>
                                <div class="radio radio-replace recheck neon-cb-replacement">
                                    <label class="cb-wrapper"><input type="checkbox" name="circular_letter" id="circular_letter" value="0" onclick="circular(this.checked)"><div class="checked"></div></label>
                                    <label>หนังสือเวียน</label>
                                </div>
<!--                                <div class="radio radio-replace recheck <?php //if($previousData2->circular_letter == '1'){echo 'checked';}?>">
                                    
                                    <input type="checkbox" name="circular_letter" id="circular_letter" value="0" onClick="circular(this.checked)" <?php //if($previousData2->circular_letter == '1'){echo 'checked';}?>>
                                    <label>หนังสือเวียน</label>
                                </div>-->
                                <br>
                            </div>
                            <label for="field-4" class="col-sm-2 text-left">เลขสารบรรณ</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="numbersarabun" name="numbersarabun" placeholder="เลขสารบรรณ" value="<?php echo $previousData2->id_saraban?>">
                            </div>

                            <label for="field-5" class="col-sm-3 text-left">username ผู้ใช้เลข</label>
                            <?php $listuser = $this->Saraban_model->listuser($previousData2->user_create);
                foreach ($listuser->result() as $listuser2){}?>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username" onchange="usernamesearh(this.value)" value="<?php echo $listuser2->user_name?>">
                            </div>
                            <div class="clear"></div>
                            <br>

                            <label  class="col-sm-2 text-left">ชื่อ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nameuser" name="nameuser" placeholder="ชื่อ" readonly value="<?php echo $previousData2->firstname?>">
                            </div>

                            <label  class="col-sm-2 text-left">นามสกุล</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="lastnameuser" name="lastnameuser" placeholder="นามสกุล" readonly value="<?php echo $previousData2->lastname?>">
                            </div>
                            <input type="hidden" class="form-control" id="iduser" name="iduser"  >
                            <div class="clear"></div>
                            <br>

                            <label for="field-3" class="col-sm-2 text-left ">ชื่อเรื่อง</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="topic" name="topic" placeholder="ชื่อเรื่อง" value="<?php echo $previousData2->topic?>">
                            </div> 

                            <div class="clear"></div>
                            <br>

                            <label for="field-1" class="col-sm-2 text-left">หมายเหตุ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="remark" name="remark" placeholder="หมายเหตุ" value="<?php echo $previousData2->remark?>">
                            </div>

                            <label for="field-2" class="col-sm-2 text-left">Ref No.</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="refno" name="refno" placeholder="Reference Number" value="<?php echo $previousData2->ref_no?>">
                            </div>

                        </div>	
                    </form>
                </div>

                <div class="modal-footer no-margin-top">
                    <button type="button" class="btn btn-lg btn-success" onclick="addprevios()" data-dismiss="modal">
                        <i class="ace-icon fa fa-check"></i>
                        บันทึก
                    </button>
                    <button class="btn btn-lg btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        ปิด
                    </button>

                </div>
            </div>
            </div>

        <?php }
        //------------------------------
    public function deleteData() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $this->load->model("Saraban_model"); 
        $result = $this->Saraban_model->deleteData($dataID, $table);
        echo $result;
    }
      //----------------------------
    public function addimg($saraban_id) {
$upload_path = './uploadfile/';
  $upload_pathName = 'uploadfile/';
  $config['upload_path'] = $upload_path;
  //allowed file types. * means all types
  $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|docx|GIF|JPG|PNG|JPEG|PDF|DOCX';
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

if ($_FILES['img2']['name'] !='') {
           
     $this->load->library('upload', $config);
      if (!$this->upload->do_upload('img2')) {
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
       echo "ErrorUpload";
                } else { 
       $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 1024;
                    $config['height'] = 1024;
                    $this->load->library('image_lib', $config);
     //if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize1:";
                   // }else{ 
            
       
//      $this->load->helper("file");        
//         @unlink($old_pic);
    
       
      $imgNameUpdate = $upload_pathName.$this->upload->data('file_name');
                 $result_id = $this->Saraban_model->addimg($imgNameUpdate, $saraban_id);
      if($result_id==1){  
       echo $Result = 1;
       /*echo $imgNameUpdate;
       $this->load->helper("file");
       $path = base_url('./');
       @unlink('./'.$oldImg);*/
         }else{ 
       echo $Result = 0;
       //echo 'ไม่สามารถเพิ่มรูปได้';
       }
     //}
    }
    //----------------
  }
    }
                //------------------------------------------
	public  function checknumber(){
		$changeValue = $this->input->post('numbersaraban2');
		$result = $this->Saraban_model->checknumber($changeValue);
		echo $result;
		
	}
               // //------------------dataID changeValue //
	public  function updateemail(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->Saraban_model->updateemail($dataID,$changeValue);
		echo $result;
		
	}
        //------------------------------- 	
    public function addedit() {
        $name = $this->input->post('user_name');
        $email = $this->input->post('email');
        $titlename = $this->input->post('titlename');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $telephone = $this->input->post('telephone');
        $position_level =$this->input->post('position_level');
        $position_name =$this->input->post('position_name');
        $id_update =$this->input->post('id_update');
        $chk_authen =$this->input->post('chk_authen');
        $currentID = $this->input->post('idemail');
        $result_id = $this->Saraban_model->addedit($name,$titlename,$firstname,$lastname,$telephone,$position_level,$position_name,$id_update,$chk_authen, $currentID);
        //--------------------------                  
                 foreach($email AS $value){
                     if($value !=''){
                         $result_id2 = $this->Saraban_model->addemail($currentID , $value);
                         //$dataID = $dataID2;
                     }  //else {
                       //  $dataID = $dataID;
                    // }                     
                     
                 }                 
        echo $result_id;
    }
                   // //------------------dataID changeValue //
	public  function setDefault(){
		$id_email = $this->input->post('id_email');
		$data_status = $this->input->post('data_status');
		$userid = $this->input->post('userid');
		$result = $this->Saraban_model->setDefault($id_email,$data_status,$userid);
		echo $result;
		
	}
                 //-------------------
    public function deleteemail() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Saraban_model->delete_data($dataID, $table);
        echo $result;
    }
                 //-------------------
    public function delete_datauser() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Saraban_model->delete_datauser($dataID, $table);
        echo $result;
    }
           //------------------------------- 	
    public function addusermember() {
        $name = $this->input->post('user_name');
        $Password = $this->input->post('Password');
        $email = $this->input->post('email');
        $titlename = $this->input->post('titlename');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $telephone = $this->input->post('telephone');
        $career =$this->input->post('career');
        $position =$this->input->post('position');
        $position_number =$this->input->post('position_number');
        $wage =$this->input->post('wage');
        $id_update =$this->input->post('id_update');
        $chk_authen =$this->input->post('chk_authen');
        $currentID = $this->input->post('idemail');
        $result_id = $this->Saraban_model->addusermember($name,$Password,$titlename,$firstname,$lastname,$telephone,$career,$position,$position_number,$wage,$id_update,$chk_authen, $currentID);
        //--------------------------                  
                 foreach($email AS $value){
                     if($value !=''){
                         $result_id2 = $this->Saraban_model->addemail($result_id , $value);
                         //$dataID = $dataID2;
                     }  //else {
                       //  $dataID = $dataID;
                    // }                     
                     
                 }                 
        echo $result_id;
    }
  
}

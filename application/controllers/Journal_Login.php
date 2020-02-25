<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_Login extends CI_Controller {
	
	function __construct() {
       parent::__construct();
		  $this->load->model('User_model');

    }
	
	  public function index(){
			$this->load->view('journal_files/login_view');
	  }

	  public function LoginUser(){  

			$username = $this->input->post('Username');
			$password = $this->input->post('Password');
			$result = $this->User_model->can_login2($username, $password);
			echo $result;
	  }
 }
 
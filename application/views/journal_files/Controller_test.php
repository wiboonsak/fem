<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Controller_test extends CI_Controller {
	
	function __construct() {
       parent::__construct();
         
		  $this->load->model('contactus_model');
		  
		 
    }
	//--------------------
	public function index()
	{
		//$data['msg'] = '';
		//$this->load->view('backend/login_view' , $data);
	}

public function contactUs(){
		$this->load->view('backend/header');
		$this->load->view('backend/contactUs');
		$this->load->view('backend/footer');
		$this->load->view('backend/contactUs_script');	
	}		
	//-------------------------------
	public function add_contactUs(){
		$form_data = $this->input->post('form_data');		
		$check = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		
		if($check != ''){
			$model = 'updateContactUs';
			
		} else {
			$model = 'insertContactUs';
		}
						
		$Result = $this->contactus_model->$model($params,$check);
		echo $Result;
	}

}
?>
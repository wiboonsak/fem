<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
          $this->load->model('slide_model');
          $this->load->model('news_model');
          $this->load->model('events_model');
          $this->load->model('curriculum_model');
          $this->load->model('contactus_model');
          $this->load->model('staff_model');
          $this->load->model('user_model');
          
		 
		  /*if($this->session->userdata('user_id')){     
		 	}else{
    		 	redirect(base_url().'login', 'refresh');
		 	}*/
		 if($this->session->userdata('weblang')==''){
			 $this->session->set_userdata('weblang', 'th');
		 }
		
    }
	//--------------------
	
	
	public function index($lang = '')	{
		
		$this->load->view('fontend/index');
	}
}

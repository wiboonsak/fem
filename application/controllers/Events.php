<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

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
          $this->load->model('events_model');
          $this->load->model('curriculum_model');
          $this->load->model('contactus_model');
          $this->load->model('staff_model');
		 
		  /*if($this->session->userdata('user_id')){     
		 	}else{
    		 	redirect(base_url().'login', 'refresh');
		 	}*/
		 
    }
	//--------------------
	public function index()
	{
		$this->load->view('header');
		$this->load->view('index_body');
		$this->load->view('footer');		
	}
	//-------------------
	public function eventAdd(){		
		$this->load->view('header');
		$this->load->view('eventAdd_view');
		$this->load->view('footer');
		$this->load->view('events_script');
	}	
	//--------------------
	public function eventData(){
		$show=''; $dataID=''; $font_back = 'f';
		$data['eventData'] = $this->events_model->list_eventData($show,$dataID,$font_back);	
		$this->load->view('header');
		$this->load->view('eventData_view' , $data);
		$this->load->view('footer');
		$this->load->view('events_script');		
	}
	
	
}
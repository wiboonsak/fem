<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
          $this->load->model('video_model');
          //$this->load->model('pp_model');
		 
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
	public function videoAdd(){		
		$this->load->view('header');
		$this->load->view('addVideo_view');
		$this->load->view('footer');
		$this->load->view('video_script');
	}	
	//-------------------- 
	public function videoData(){
		$data['videoData'] = $this->video_model->list_videoData();	
		$this->load->view('header');
		$this->load->view('videoData_view' , $data);
		$this->load->view('footer');
		$this->load->view('video_script');		
	}
	
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload_Controller extends CI_Controller {
		public function __construct() {
			parent::__construct();

		}

		public function index(){
			$this->load->view('fileupload/custom_view');
		}

		

    public function process()
	{	
		$data = array();
	      //upload file
        $config['upload_path'] = 'uploadfile/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 M

	    if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo json_encode('Error during file upload' . $_FILES['file']['error']);
            } else {
                if (file_exists('uploadfile/' . $_FILES['file']['name'])) {
                    echo json_encode('File already exists : uploadfile/' . $_FILES['file']['name']);
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo json_encode($this->upload->display_errors());
                    } else {
                    	$data['chk'] = true;
                    	$data['defail'] = $this->upload->data();
                        echo json_encode($data);
                    }
                }
            }
        } else {
            echo json_encode('Please choose a file');
        }
	}
	public function processUpdate()
	{	
		$data = array();

	    $id_allownace 	= $this->input->post("id_allownace");
	    $id_user 		= $this->input->post("id_user");
	    $chk_authen 	= $this->input->post("chk_authen");
	    $file_name		= $this->input->post("file_name");
	    $file_Orig		= $this->input->post("file_Orig");

	      //upload file
        $config['upload_path'] = 'uploadfile/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 M

	    if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo json_encode('Error during file upload' . $_FILES['file']['error']);
            } else {
	                if (file_exists('uploadfile/' . $_FILES['file']['name'])) {
	                    echo json_encode('File already exists : uploadfile/' . $_FILES['file']['name']);
	                } else {
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('file')) {
	                        echo json_encode($this->upload->display_errors());
	                    } else {

	                    	
	                    	$data['defail'] = $this->upload->data();
	                       

	                    	$dataupdate = array( 

								$file_name	 	=> $data['defail']['file_name'],
								$file_Orig	 	=> $data['defail']['client_name'],
								"user_update"	=> $id_user,
								"chk_authen"    => $chk_authen
								
							);

							$this->load->model("Allowance_model"); 
						

							$result = $this->Allowance_model->update_allowance($dataupdate,$id_allownace);
							if($result==true){
								$data['chk'] = true;
							}
						
							 echo json_encode($data);
						}
	   	
	                 }
                }
        } else {
            echo json_encode('Please choose a file');
        }
	}

	public function remove(){
		
		$return_text = 0;
		$filename = $this->input->post("filename");
		$path = 'uploadfile/'.$filename;

		if( file_exists($path) ){
			 unlink($path);
			 $return_text = 1;
		}else{
		 	$return_text = 0;
		}

		echo $return_text;
	}
	public function removeUpdate(){
		
		$return_text = 0;
		$filename = $this->input->post("filename");
		$id_allownace 	= $this->input->post("id_allownace");
	    $id_user 		= $this->input->post("id_user");
	    $chk_authen 	= $this->input->post("chk_authen");
	    $file_name		= $this->input->post("file_name");
	    $file_Orig		= $this->input->post("file_Orig");
		$path = 'uploadfile/'.$filename;

		if( file_exists($path) ){
							
			 				$dataupdate = array( 

								$file_name	 	=> null,
								$file_Orig	 	=> null,
								"user_update"	=> $id_user,
								"chk_authen"    => $chk_authen
								
							);
							unlink($path);

							$this->load->model("Allowance_model"); 
						

							$result = $this->Allowance_model->update_allowance($dataupdate,$id_allownace);
							if($result==true){
								$return_text = 1;
								echo $return_text;
							}
						
			 
		}else{
		 	$return_text = 0;
		 	echo $return_text;
		}

		
	}
}
?>
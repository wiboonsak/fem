<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

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
		  $this->load->model('events_model');
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
	public function addSlideIMG(){		
		$this->load->view('header');
		$this->load->view('slideIMG_view');
		$this->load->view('footer');
		$this->load->view('slide_script');
	}
	//-------------------
	public function slideIMG(){	
		$data['slideIMGData'] = $this->slide_model->list_slideIMG();	
		$this->load->view('header');
		$this->load->view('slideimgData_view' , $data);
		$this->load->view('footer');
		$this->load->view('slide_script');
	}
	//-------------------
	public function slideText(){		
		$this->load->view('header');
		$this->load->view('slideText_view');
		$this->load->view('footer');
		$this->load->view('slide_script');
	}	
	//------------------------
	public function listTextSlide(){ 
		$TextSlide = $this->slide_model->list_TextSlide();						   		

?>
	<div class="card-box table-responsive">
		<table class="table table-bordered table-hover" id="table1">
		<thead>	
        <tr style="background-color: #f2f2f2"> 
           <th width="10">ลำดับ</th>
           <th>ข้อความ (ภาษาไทย)</th>
           <th>ข้อความ (ภาษาอังกฤษ)</th>
		   <th style="text-align: center">กำหนดแสดงหน้าเว็บ</th>	
           <th width="5" style="text-align: center">แก้ไข</th>
           <th width="5" style="text-align: center">ลบ</th>
        </tr>
		</thead>	
		<tbody>	
        <?php $n=1;	foreach($TextSlide->result() as $TextSlide2){ ?>
        <tr>
           <td style="text-align: center"><?php echo $n?></td>
           <td><?php echo $TextSlide2->topic_th?></td>
           <td><?php echo $TextSlide2->topic_en?></td>
           <td><div class="switchery-demo" style="text-align: center"><input type="checkbox" checked data-plugin="switchery" data-color="#007bff" data-size="small"/></div></td>
           <td><button type="button" class="btn btn-success btn-sm" onClick="edit_textSlide('<?php echo $TextSlide2->id?>' , '<?php echo $TextSlide2->topic_th?>' , '<?php echo $TextSlide2->topic_en?>')">แก้ไข</button></td><!--onClick="openEdit('<?php// echo $branch->id?>' , '<?php //echo $branch->corp_name?>' ,'<?php //echo $branch->data_status?>')"-->
           <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_newsCategory('<?php echo $TextSlide2->id?>')">ลบ</button></td>
        </tr>
        <?php 	$n++;	} ?>
		</tbody>	
        </table> 
	</div>	

	<script>
		$(document).ready(function(){ 
			$('#table1').DataTable({
				searching: true ,
				ordering : true ,
				pageLength : 15 ,
				lengthChange : false
			});
		///////////////////////////////////////	
			
			 $('[data-plugin="switchery"]').each(function (idx, obj) {
            	new Switchery($(this)[0], $(this).data());
        	});
		})

	</script>
	
<?php	
		
	} 
	//-------------------
	public function update_Text(){ 
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$dataID = $this->input->post('dataID');		
		$result = $this->slide_model->update_text($name_th , $name_en , $dataID);
		echo $result;
	}
}
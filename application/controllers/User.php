<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
          $this->load->model('user_model');
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
	public function userData(){		
		$this->load->view('header');
		$this->load->view('user');
		$this->load->view('footer');
		$this->load->view('user_script');
	}	
	//--------------------
	public function showStaffData($CategoryID=NULL){
		$data['staffData'] = $this->staff_model->list_staffData($CategoryID);	
		$this->load->view('header');
		$this->load->view('staffData_view' , $data);
		$this->load->view('footer');
		$this->load->view('staff_script');		
	}
	//-------------------
	public function staffCategory(){
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('header');
		$this->load->view('staffCate_view');
		$this->load->view('footer');
		$this->load->view('staff_script');
	}
	//------------------------
	public function userAll(){ 
		$user = $this->user_model->list_user();						   		

?>
	<div class="card-box table-responsive">
		<table class="table table-bordered table-hover" id="table1">
		<thead>	
        <tr style="background-color: #f2f2f2"> 
           <th width="10">ลำดับ</th>
           <th >ชื่อพนักงาน</th>
           <th>Username</th>
           <th width="7" style="text-align: center">กำหนดสิทธิ์</th>	
           <th width="5" style="text-align: center">แก้ไข</th>
           <th width="5" style="text-align: center">ลบ</th>
        </tr>
		</thead>	
		<tbody>	
        <?php $n=1;	foreach($user->result() as $user2){ ?>
        <tr>
           <td style="text-align: center"><?php echo $n?></td>
           <td><?php echo $user2->name_sname?></td>
           <td><?php echo $user2->user_name?></td>
           <td><button type="button" class="btn btn-primary btn-sm" onClick="showPermissionForm()">กำหนดสิทธิ์</button></td>
           <td><button type="button" class="btn btn-success btn-sm" onClick="editU()">แก้ไข</button></td><!--onClick="openEdit('<?php// echo $branch->id?>' , '<?php //echo $branch->corp_name?>' ,'<?php //echo $branch->data_status?>')"-->
           <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_newsCategory('<?php echo $user2->id?>')">ลบ</button></td>
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
				pageLength : 25 ,
				lengthChange : false
			});
		///////////////////////////////////////	
			
			/* $('[data-plugin="switchery"]').each(function (idx, obj) {
            	new Switchery($(this)[0], $(this).data());
        	});*/
		})

	</script> 
	
<?php	
		
	} 	
	//--------------------
	public function staffData(){
		$data['staffCategory'] = $this->staff_model->list_staffCategory();	
		$this->load->view('header');
		$this->load->view('staff_category_view' , $data);
		$this->load->view('footer');
		$this->load->view('staff_script');		
	}	
	
}
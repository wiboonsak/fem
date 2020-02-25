<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Control extends CI_Controller {
	
	function __construct() {
       parent::__construct();
          $this->load->model('news_model');
		  $this->load->model('user_model');
          $this->load->model('administrator_model');
		  $this->load->model('staff_model');
		  $this->load->model('events_model');
		  $this->load->model('slide_model');
		  $this->load->model('video_model');
		  $this->load->model('alumni_model');		  
		  $this->load->model('facility_model');
		  $this->load->model('curriculum_model');
		  $this->load->model('contactus_model');
		  $this->load->model('researchCluster_model');
		
		if($this->session->userdata('user_id')==''){
				redirect(base_url('Login'));		
		}
		 
    }
	//--------------------
	public function index(){
		$this->load->view('backend/header');
		$this->load->view('backend/index_body');
		$this->load->view('backend/footer');	
	}
	
	//-------------------
	public function NewsCategory(){
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('backend/header');
		$this->load->view('backend/addNewsCate_view');
		$this->load->view('backend/footer');
		$this->load->view('backend/addNews_script');
	}
	//-------------------
	public function AddNewsCate(){
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$result = $this->news_model->insert_NewsCategory($name_th , $name_en);
		echo $result;
	}                                         
    //------------------------
	public function listNewsCategory(){ 
		$newsCategory = $this->news_model->list_newsCategory();						   		

?>
	<div class="card-box table-responsive">
		<table class="table table-bordered table-hover" id="table1">
		<thead>	
        <tr style="background-color: #f2f2f2"> 
           <th width="10">ลำดับ</th>
           <th>หมวดข่าวสาร (ภาษาไทย)</th>
           <th>หมวดข่าวสาร (ภาษาอังกฤษ)</th>
           <th>ผู้ดูแล</th>
           <th>กำหนดผู้ดูแล</th>
		   <th style="text-align: center">กำหนดแสดงหน้าเว็บ</th>	
           <th width="5" style="text-align: center">แก้ไข</th>
           <th width="5" style="text-align: center">ลบ</th>
        </tr>
		</thead>	
		<tbody>	
        <?php $n=1;	foreach($newsCategory->result() as $newsCategory2){ ?>
        <tr>
           <td style="text-align: center"><?php echo $n?></td>
           <td><?php echo $newsCategory2->name_th?></td>
           <td><?php echo $newsCategory2->name_en?></td>			
		   <td>
		   <?php 	$userID2 = '';  $category_id = $newsCategory2->id;  $dataID = '';
					$user_newsCategory = $this->news_model->getUser_newsCategory($userID2 , $category_id);
			
					$countRows = $user_newsCategory->num_rows();	 
					if($countRows >0){ 
						foreach($user_newsCategory->result() as $user_newsCategory2){ 
							
			   				$user = $this->user_model->list_user($user_newsCategory2->user_id);
							foreach($user->result() as $user2){ }
		   ?>
							<i class="mdi mdi-account-check"></i> <?php echo $user2->name_sname; if($countRows >1){ echo "<br>"; }			
					    }				
					}																	   
		   ?>
		   </td>			
		   <td align="center"><button type="button" class="btn btn-primary btn-sm" onClick="modal_setUser('<?php echo $newsCategory2->id?>' , '<?php echo $newsCategory2->name_th?>')">กำหนดผู้ดูแล</button>   
		   </td>		
           <td align="center"><label>
          		<input id="ch<?php echo $newsCategory2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $newsCategory2->id?>' , this.value , 'tbl_news_category')" value="<?php echo $newsCategory2->show_onWeb?>"  <?php if($newsCategory2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" />
          	   </label>	   
		   </td>
           <td><button type="button" class="btn btn-success btn-sm" onClick="edit_newsCategory('<?php echo $newsCategory2->id?>' , '<?php echo $newsCategory2->name_th?>' , '<?php echo $newsCategory2->name_en?>')">แก้ไข</button></td>
           <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_newsCategory('<?php echo $newsCategory2->id?>')">ลบ</button></td>
        </tr>
        <?php 	$n++;	} ?>
		</tbody>	
        </table> 
	</div>	


<script src="<?php echo base_url('assets/plugins/switchery/switchery.min.js')?>"></script>
	<script>
		$(document).ready(function(){ 
			$('#table1').DataTable({
				searching: true ,
				ordering : false ,
				pageLength : 15 ,
				lengthChange : false
			});
		///////////////////////////////////////	
			
			$('.js-switch').each(function (idx, obj) {
            	new Switchery($(this)[0], $(this).data());
        	});
		})

	</script>
	
<?php	
		
	} 
	//-------------------
	public function updateNewsCate(){ 
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$dataID = $this->input->post('dataID');		
		$result = $this->news_model->update_newsCate($name_th , $name_en , $dataID);
		echo $result;
	} 
	//-------------------
	public function deleteNewsCategory(){ 
		$dataID = $this->input->post('dataID');		
		$result = $this->news_model->delete_NewsCategory($dataID);
		echo $result;
	}
	//-------------------
	public function AddNews($dataID=NULL){
		$data['dataID']=$dataID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('backend/header');
		$this->load->view('backend/addNews_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/addNews_script');
	}
	//--------------------
	public function Newsdata(){
		$data['newsCategory'] = $this->news_model->list_newsCategory2();	
		$this->load->view('backend/header');
		$this->load->view('backend/news_category_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/addNews_script');		
	}
	//--------------------
	public function ShowNewsdata($CategoryID=NULL){
		$font_back = 'b';
		$data['newsData'] = $this->news_model->news_data($CategoryID,$font_back);	
		$this->load->view('backend/header');
		$this->load->view('backend/newsData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/addNews_script');		
	}
	//-------------------
	public function administratorAdd($dataID=NULL){	
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/addAdministrator_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/administrator_script');
	}	
	//--------------------
	public function administratorData(){
		$data['administratorData'] = $this->administrator_model->list_administratorData();	
		$this->load->view('backend/header');
		$this->load->view('backend/administratorData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/administrator_script');		
	}
	//-------------------
	public function staffAdd($dataID=NULL){	
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/addStaff_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/staff_script');
	}	
	//--------------------
	public function showStaffData($CategoryID=NULL){
		$data['staffData'] = $this->staff_model->list_staffData($CategoryID);	
		$this->load->view('backend/header');
		$this->load->view('backend/staffData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/staff_script');		
	}
	//-------------------
	public function staffCategory(){
		//$data['ppID']=$ppID;
		//$data['ppData']=$this->pp_model->getppdata($ppID);
		$this->load->view('backend/header');
		$this->load->view('backend/staffCate_view');
		$this->load->view('backend/footer');
		$this->load->view('backend/staff_script');
	}
	//------------------------
	public function listStaffCategory(){ 
		$staffCategory = $this->staff_model->list_staffCategory();	   		
?>
	<div class="card-box table-responsive">
		<table class="table table-bordered table-hover" id="table1">
		<thead>	
        <tr style="background-color: #f2f2f2"> 
           <th width="10">ลำดับ</th>
           <th>หมวดบุคลากร (ภาษาไทย)</th>
           <th>หมวดบุคลากร (ภาษาอังกฤษ)</th>
		   <th style="text-align: center">กำหนดแสดงหน้าเว็บ</th>	
           <th width="5" style="text-align: center">แก้ไข</th>
           <th width="5" style="text-align: center">ลบ</th>
        </tr>
		</thead>	
		<tbody>	
        <?php $n=1;	foreach($staffCategory->result() as $staffCategory2){ ?>
        <tr>
           <td style="text-align: center"><?php echo $n?></td>
           <td><?php echo $staffCategory2->name_th?></td>
           <td><?php echo $staffCategory2->name_en?></td>
           <td align="center"><label>
			   <input id="ch<?php echo $staffCategory2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $staffCategory2->id?>' , this.value , 'tbl_staff_category')" value="<?php echo $staffCategory2->show_onWeb?>"  <?php if($staffCategory2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>	 
		   </td>
           <td><button type="button" class="btn btn-success btn-sm" onClick="edit_StaffCategory('<?php echo $staffCategory2->id?>' , '<?php echo $staffCategory2->name_th?>' , '<?php echo $staffCategory2->name_en?>')">แก้ไข</button></td>
           <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_staffCategory('<?php echo $staffCategory2->id?>')">ลบ</button></td>
        </tr>
        <?php 	$n++;	} ?>
		</tbody>	
        </table> 
	</div>	

	<script>
		$(document).ready(function(){ 
			$('#table1').DataTable({
				searching: true ,
				ordering : false ,
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
	//--------------------
	public function staffData(){
		$data['staffCategory'] = $this->staff_model->list_staffCategory();	
		$this->load->view('backend/header');
		$this->load->view('backend/staff_category_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/staff_script');		
	}
	//-------------------
	public function eventAdd($dataID=NULL){	
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/eventAdd_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/events_script');
	}	
	//--------------------
	public function eventData(){
		$show=''; $dataID=''; $font_back = 'b';
		$data['eventData'] = $this->events_model->list_eventData($show,$dataID,$font_back);	
		$this->load->view('backend/header');
		$this->load->view('backend/eventData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/events_script');		
	}
	//-------------------
	public function addSlideIMG($dataID=NULL){	
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/slideIMG_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_script');
	}
	//-------------------
	public function slideIMG(){	
		$show = ''; $dataID = '';  $font_back = 'b';
		
		$data['slideIMGData'] = $this->slide_model->list_slideIMG($show,$dataID,$font_back);
		$this->load->view('backend/header');
		$this->load->view('backend/slideimgData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_script');
	}
	//-------------------
	public function slideText(){		
		$this->load->view('backend/header');
		$this->load->view('backend/slideText_view');
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_script');
	}	
	//------------------------
	public function listTextSlide(){ 
		$font_back = 'b';
		$TextSlide = $this->slide_model->list_TextSlide($font_back);				   		

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
           <td align="center"><label>
			   <input id="ch<?php echo $TextSlide2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $TextSlide2->id?>' , this.value , 'tbl_textSlide_data' , '1')" value="<?php echo $TextSlide2->show_onWeb?>"  <?php if($TextSlide2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>	 
           </td>
           <td><button type="button" class="btn btn-success btn-sm" onClick="edit_textSlide('<?php echo $TextSlide2->id?>' , '<?php echo $TextSlide2->topic_th?>' , '<?php echo $TextSlide2->topic_en?>')">แก้ไข</button></td>
           <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $TextSlide2->id?>' , 'tbl_textSlide_data')">ลบ</button></td>
        </tr>
        <?php 	$n++;	} ?>
		</tbody>	
        </table> 
	</div>	

	<script>
		$(document).ready(function(){ 
			$('#table1').DataTable({
				searching: true ,
				ordering : false ,
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
	//-------------------
	public function videoAdd(){		
		$this->load->view('backend/header');
		$this->load->view('backend/addVideo_view');
		$this->load->view('backend/footer');
		$this->load->view('backend/video_script');
	}	
	//-------------------- 
	public function videoData(){
		$data['videoData'] = $this->video_model->list_videoData();	
		$this->load->view('backend/header');
		$this->load->view('backend/videoData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/video_script');		
	}
	//-------------------
	public function alumniDetail(){		
		$data_id= $this->uri->segment(3);
		//if(!isset($data['booking_id'])){ redirect(base_url().'pp/listpp', 'refresh'); }
		//$data['custInfo']="";
		
		//$data['alumni']=$this->alumni_model->get_alumniDetail($data_id);	
		$data['dataID']=$data_id;			
		
		$this->load->view('backend/header');
		$this->load->view('backend/alumniDetail_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/alumni_script');	
		
	}	
	//--------------------
	public function alumniData(){
		$data['alumniData'] = $this->alumni_model->list_alumniData();	
		$this->load->view('backend/header');
		$this->load->view('backend/alumniList_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/alumni_script');		
	}
	//-------------------
	public function userData(){		
		$this->load->view('backend/header');
		$this->load->view('backend/user');
		$this->load->view('backend/footer');
		$this->load->view('backend/user_script');
	}		
	//------------------------
	public function userAll(){ 
		$dataID = '';
		$user = $this->user_model->list_user($dataID);						   		

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
           <td><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href ='<?php echo base_url('control/permission/').$user2->id?>'">กำหนดสิทธิ์</button></td><!--onClick="showPermissionForm()"-->
           <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href ='<?php echo base_url('control/addUser/').$user2->id?>'" >แก้ไข</button></td><!--onClick="openEdit('<?php// echo $branch->id?>' , '<?php //echo $branch->corp_name?>' ,'<?php //echo $branch->data_status?>')"-->
           <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $user2->id?>' , 'tbl_user_webpage' , '')">ลบ</button></td>
        </tr>
        <?php 	$n++;	} ?>
		</tbody>	
        </table> 
	</div>	

	<script>
		$(document).ready(function(){ 
			$('#table1').DataTable({
				searching: true ,
				ordering : false ,
				pageLength : 15 ,
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
	//-------------------------------
	public function AddDataNews(){
		$form_data = $this->input->post('form_data');
		$detail_th = $this->input->post('detail_th');
		$detail_en = $this->input->post('detail_en');
		$dataID = $this->input->post('dataID');
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->news_model->InsertDataNews($params,$detail_th,$detail_en);
		echo $Result;
	}
	//-------------------------------
	public function upload_first_pic($newsID=NULL){		
		
		//$old_file = $this->input->post('old_file');
		$old_pic = $this->input->post('old_pic');
		//$oldImg = $this->input->post('oldImg');
		//$booking_id = $this->input->post('booking_id');
		
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		//$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		$Result = 0;
		
		//if (isset($_FILES['file_name2']['name'])) {
	/*	if ($_FILES['file_name2']['name'] !='') {
           
				 $this->load->library('upload', $config);
				  if (!$this->upload->do_upload('file_name2')) {
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 1024;
                    $config['height'] = 1024;
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 
				  					  
					  
						$this->load->helper("file");
						
					    @unlink($old_file);				
						$filed='file_name';
						
						$imgNameUpdate2 = $upload_pathName.$this->upload->data('file_name');
						$resultUpdateBooking = $this->news_model->updateFile($newsID , $imgNameUpdate2 ,$filed );
						if($resultUpdateBooking==1){ 
							$Result = 2;
						}else{ 
							$Result = 0;
						 }
					//}
				}
				//----------------
		}*/
		$this->load->library('upload', $config);
		$countFilesTH = count($_FILES['file_th']['name']);
		$countFilesEN = count($_FILES['file_en']['name']);
		
		 if($countFilesTH>0){ 
			 
			$language = 'th'; 
			for($i=0; $i<$countFilesTH; $i++)
			{           
				//---------------------------
				$_FILES['file_th2']['name'] = $_FILES['file_th']['name'][$i];
                $_FILES['file_th2']['type'] = $_FILES['file_th']['type'][$i];
                $_FILES['file_th2']['tmp_name'] = $_FILES['file_th']['tmp_name'][$i];
                $_FILES['file_th2']['error'] = $_FILES['file_th']['error'][$i];
                $_FILES['file_th2']['size'] = $_FILES['file_th']['size'][$i];
				
                $this->upload->initialize($config);
                if($this->upload->do_upload('file_th2')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					$this->news_model->updateFile_multiple($newsID,$uploadData[$i]['file_name'],$language);	
                }
				
			}  $Result = 1;
		}
		
		if($countFilesEN>0){ 
			 
			$language = 'en'; 
			for($i=0; $i<$countFilesEN; $i++)
			{           
				//---------------------------
				$_FILES['file_en2']['name'] = $_FILES['file_en']['name'][$i];
                $_FILES['file_en2']['type'] = $_FILES['file_en']['type'][$i];
                $_FILES['file_en2']['tmp_name'] = $_FILES['file_en']['tmp_name'][$i];
                $_FILES['file_en2']['error'] = $_FILES['file_en']['error'][$i];
                $_FILES['file_en2']['size'] = $_FILES['file_en']['size'][$i];
				
                $this->upload->initialize($config);
                if($this->upload->do_upload('file_en2')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					$this->news_model->updateFile_multiple($newsID,$uploadData[$i]['file_name'],$language);	
                }
				
			}  $Result = 1;
		}
		
		if ($_FILES['first_pic']['name'] !='') {
           
				 $this->load->library('upload', $config);
				  if (!$this->upload->do_upload('first_pic')) {
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
				  				  
					  
						$this->load->helper("file");					   
					    @unlink($old_pic);
				
					  
						$filed='first_pic';
						$imgNameUpdate = $upload_pathName.$this->upload->data('file_name');
						$resultUpdateBooking = $this->news_model->updateFile($newsID , $imgNameUpdate , $filed);
						if($resultUpdateBooking==1){ 	
							$Result = 1;
							/*echo $imgNameUpdate;
							$this->load->helper("file");
							$path = base_url('./');
							@unlink('./'.$oldImg);*/
						   }else{ 
							$Result = 0;
							//echo 'ไม่สามารถเพิ่มรูปได้';
						 }
					//}
				}
				//----------------
		}		
		  echo $Result;		  
		
	}	
	//-------------------
	public function deleteData(){ 
		$dataID = $this->input->post('dataID');		
		$table = $this->input->post('table');		
		$result = $this->news_model->delete_data($dataID,$table);
		echo $result;
	}	
	//-------------------
	public function set_ShowOnWeb(){ 				
		$dataID = $this->input->post('dataID');	
		$check = $this->input->post('check');
		$table = $this->input->post('table');
		$result = $this->news_model->update_ShowOnWeb($dataID , $check , $table);
		echo $result;
	} 	
	//-------------------
	public function Add_staffCategory(){
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$result = $this->staff_model->insert_staffCategory($name_th , $name_en);
		echo $result;
	}   	
	//-------------------
	public function updateStaffCategory(){ 
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$dataID = $this->input->post('dataID');		
		$result = $this->staff_model->update_staffCategory($name_th , $name_en , $dataID);
		echo $result;
	} 
	//-------------------
	public function deleteStaffCategory(){ 
		$dataID = $this->input->post('dataID');		
		$result = $this->staff_model->delete_StaffCategory($dataID);
		echo $result;
	}
	//-------------------------------
	public function AddDataStaff(){
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->staff_model->InsertDataStaff($params);
		echo $Result;
	}	
	//-------------------------------
	public function AddFile(){		
		
		$num = $this->input->post('num');	  
		$table = $this->input->post('table');	  
		$dataID = $this->input->post('dataID');	  
		 
		$y='fileupload';
		$of='old_file';
		$feild = 'feildf';
		$upload_pathName = 'uploadfile/';
		
    for( $i = 1; $i <= $num; $i++ ){		 
		 
		 $z = $y.$i;
		 $feild2 = $feild.$i;		
		 $feild_val = $this->input->post($feild2);	
		
		 $of2 = $of.$i;
		 $old_file = $this->input->post($of2);
		
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = '*';
		//$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml|docx|GIF|JPG|PNG|JPEG|PDF|DOC|XML|DOCX|xls|xlsx';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
					
		$path =  $_FILES[$z]['name'];
				
		if ($_FILES[$z]['name'] !='') {   //echo  $_FILES[$z]['name'];
		
		$Result = 0;	
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$img_ext_chk = array('jpg','png','gif','jpeg','GIF','JPG','PNG','JPEG');
		$doc_ext_chk = array('pdf','doc','docx','PDF','DOC','DOCX','xls','xlsx');
			
		$this->load->helper("file");					   
		@unlink($old_file);	

		if (in_array($ext,$img_ext_chk)){				
			
			//$config['allowed_types'] = 'jpg|png|gif|jpeg|GIF|JPG|PNG|JPEG';
			$this->load->library('upload', $config);
				  if (!$this->upload->do_upload($z)) {
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
						//$filed='first_pic';
						$imgNameUpdate = $upload_pathName.$this->upload->data('file_name');
						$resultUpdateBooking = $this->news_model->updateFile2($dataID , $imgNameUpdate ,$feild_val ,$table);
						if($resultUpdateBooking=='1'){ 	
							$Result = 1;
							/*echo $imgNameUpdate;
							$this->load->helper("file");
							$path = base_url('./');
							@unlink('./'.$oldImg);*/
						   }else{ 
							$Result = 0;
							//echo 'ไม่สามารถเพิ่มรูปได้';
						 }
					//}
				}
		}  elseif (in_array($ext,$doc_ext_chk)){   			
			
			//$config['allowed_types'] = 'pdf|doc|docx|PDF|DOC|DOCX|xls|xlsx';
			
			 $this->load->library('upload', $config);
			/*$this->load->library('excel');
			$this->load->library('PHPExcel');  
    		$this->load->library('PHPExcel/IOFactory');*/
				if (!$this->upload->do_upload($z)) {
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 1024;
                    $config['height'] = 1024;
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 
						//$filed='file_name';
						
						$imgNameUpdate2 = $upload_pathName.$this->upload->data('file_name');
						$resultUpdateBooking = $this->news_model->updateFile2($dataID , $imgNameUpdate2 ,$feild_val ,$table);
						if($resultUpdateBooking==1){ 
							$Result = 2;
							/*echo $imgNameUpdate;
							$this->load->helper("file");
							$path = base_url('./');
							@unlink('./'.$oldImg);*/
						   }else{ 
							$Result = 0;
						 }
					//}
				}
		} 	}  
	  }  
		
		echo $Result;
	}
	//-------------------------------  
	
	public function AddDataAdministrator(){
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->administrator_model->InsertDataAdministrator($params);
		echo $Result;
	}
	//-------------------------------
		
	public function AddDataEvent(){
		$form_data = $this->input->post('form_data');
		//$detail_th = $this->input->post('detail_th');
		//$detail_en = $this->input->post('detail_en');
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->events_model->InsertDataEvent($params);
		echo $Result;
	}			
	//-------------------
	
	public function AddTextSlide(){
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$result = $this->slide_model->insert_TextSlide($name_th , $name_en);
		echo $result;
	} 		
	//-------------------------------	
	public function add_slideIMG(){
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->slide_model->InsertDataSlideIMG($params);
		echo $Result;
	}			
	//-------------------------------  	
	public function AddLink_data(){
		$name_th = $this->input->post('name_th');
		$name_en = $this->input->post('name_en');		
		$link = $this->input->post('link');		
		$result = $this->video_model->insert_Link_data($name_th , $name_en , $link);
		echo $result;
	} 		
	//-------------------------------
	public function EditDataNews(){
		$form_data = $this->input->post('form_data');
		$detail_th = $this->input->post('detail_th');
		$detail_en = $this->input->post('detail_en');
		$dataID = $this->input->post('dataID');
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->news_model->UpdateDataNews($params,$detail_th,$detail_en,$dataID);
		echo $Result;
	}			
	//------------------------------- 	
	public function remove_file(){
		$dataID = $this->input->post('dataID');
		$table = $this->input->post('table');
		$file_name = $this->input->post('file_name');
		$field = $this->input->post('field');
		
		$this->load->helper("file");					   
		@unlink($file_name);
			
		$result = $this->news_model->remove_file2($dataID , $table , $field);
		echo $result;
	} 	
	//-------------------------------
	public function EditDataAdministrator(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->administrator_model->UpdateDataAdministrator($params,$dataID);
		echo $Result;
	}	
	//-------------------------------
	public function EditDataStaff(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->staff_model->UpdateDataStaff($params,$dataID);
		echo $Result;
	}
	//-------------------------------
	public function EditDataEvent(){
		$form_data = $this->input->post('form_data');
		//$detail_th = $this->input->post('detail_th');
		//$detail_en = $this->input->post('detail_en');
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->events_model->UpdateDataEvent($params,$dataID);
		echo $Result;
	}
	//-------------------------------
	public function edit_slideIMG(){
		$form_data = $this->input->post('form_data');
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->slide_model->Update_slideIMG($params,$dataID);
		echo $Result;
	} 
	//-------------------------------  	
	public function facilityAdd($dataID=NULL){
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/facilityAdd' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/facility_script');	
	}
	//------------------------------- 	
	public function add_facilityData(){
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->facility_model->InsertDataFacility($params);
		echo $Result;
	}
	//--------------------
	public function facilitiesData(){
		$data['facilityData'] = $this->facility_model->list_facilitiesData();	
		$this->load->view('backend/header');
		$this->load->view('backend/facilityData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/facility_script');		
	}
	//-------------------------------
	public function edit_facilityData(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->facility_model->UpdateDatafacility($params,$dataID);
		echo $Result;
	}	
	//-------------------------------  	
	public function curriculumAdd($dataID=NULL){
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/curriculumAdd' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/curriculum_script');	
	}
	//-------------------------------
	public function add_curriculumData(){
		$curriculum_nameTH = $this->input->post('curriculum_nameTH');		
		$curriculum_nameEN = $this->input->post('curriculum_nameEN');		
		$url = $this->input->post('url');		
		$icon_class = $this->input->post('icon_class');		
		
		$Result = $this->curriculum_model->InsertDataCurriculum($curriculum_nameTH, $curriculum_nameEN, $url, $icon_class);
		echo $Result;
	}		
	//-------------------------------
	public function edit_curriculumData(){
		$curriculum_nameTH = $this->input->post('curriculum_nameTH');		
		$curriculum_nameEN = $this->input->post('curriculum_nameEN');	
		$url = $this->input->post('url');	
		$dataID = $this->input->post('dataID');
		$icon_class = $this->input->post('icon_class');	
				
		$Result = $this->curriculum_model->UpdateDataCurriculum($curriculum_nameTH, $curriculum_nameEN, $dataID, $url, $icon_class);
		echo $Result;  
	}
	//--------------------
	public function curriculumsData(){
		$data['curriculumData'] = $this->curriculum_model->list_curriculumsData();	
		$this->load->view('backend/header');
		$this->load->view('backend/curriculumData_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/curriculum_script');		
	}
	//-------------------------------  	
	public function curriculumDescription(){
		$this->load->view('backend/header');
		$this->load->view('backend/curriculum_description');
		$this->load->view('backend/footer');
		$this->load->view('backend/curriculum_script');	
	}	
	//-------------------------------
	public function addDescription(){
		$desc_th = $this->input->post('desc_th');		
		$desc_en = $this->input->post('desc_en');	
		$check = $this->input->post('check');	
		if($check != '0'){
			$model = 'updateDescription';
			
		} else {
			$model = 'insertDescription';
		}
						
		$Result = $this->curriculum_model->$model($desc_th,$desc_en);
		echo $Result; 
	}	
	//-------------------------------  	
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
	//-------------------------------  	
	public function aboutUs(){
		$this->load->view('backend/header');
		$this->load->view('backend/aboutUs');
		$this->load->view('backend/footer');
		$this->load->view('backend/contactUs_script');	
		//$this->load->view('backend/aa');	
	}
	//-------------------------------	
	public function add_aboutUs(){
		$desc_th = $this->input->post('desc_th');		
		$desc_en = $this->input->post('desc_en');		
		$history_th = $this->input->post('history_th');		
		$history_en = $this->input->post('history_en');		
		$vision_th = $this->input->post('vision_th');		
		$vision_en = $this->input->post('vision_en');		
		$mission_th = $this->input->post('mission_th');		
		$mission_en = $this->input->post('mission_en');		
		$dataID = $this->input->post('dataID');
				
		if($dataID != ''){
			$model = 'update_aboutUs';
			
		} else {
			$model = 'insert_aboutUs';
		}
						
		$Result = $this->contactus_model->$model($desc_th, $desc_en, $history_th, $history_en, $vision_th, $vision_en, $mission_th, $mission_en, $dataID);
		echo $Result;
	}
	//-------------------------------  	
	public function AddOtherTopic($dataID=NULL){
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/addOtherTopic' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/curriculum_script');	
	}			
	//-------------------------------
	public function add_otherTopicData(){
		$topic_th = $this->input->post('topic_th');		
		$topic_en = $this->input->post('topic_en');		
		$detail_th = $this->input->post('detail_th');		
		$detail_en = $this->input->post('detail_en');		
		$dataID = $this->input->post('dataID');		
		
		$Result = $this->curriculum_model->insert_otherTopicData($topic_th, $topic_en, $detail_th, $detail_en, $dataID);
		echo $Result;
	}		
	//-------------------------------
	public function edit_otherTopicData(){
		$topic_th = $this->input->post('topic_th');		
		$topic_en = $this->input->post('topic_en');		
		$detail_th = $this->input->post('detail_th');		
		$detail_en = $this->input->post('detail_en');		
		$dataID = $this->input->post('dataID');
				
		$Result = $this->curriculum_model->update_otherTopicData($topic_th, $topic_en, $detail_th, $detail_en, $dataID);
		echo $Result; 
	}		
	//-------------------------------  	
	public function OtherTopicData(){
		$data['topicData'] = $this->curriculum_model->list_topicData();	
		$this->load->view('backend/header');
		$this->load->view('backend/otherTopicData' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/curriculum_script');	
	} 
	//-------------------------------  	
	public function researchClusterAdd($dataID=NULL){
		$data['dataID']=$dataID;
		$this->load->view('backend/header');
		$this->load->view('backend/researchClusterAdd' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/researchCluster_script');	
	}
	//------------------------------- 
	public function add_researchClusterData(){
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->researchCluster_model->Insert_researchCluster($params);
		echo $Result;
	}
	//--------------------
	public function researchClustersData(){
		$show=''; $dataID=''; $font_back = 'b';
		$data['researchData'] = $this->researchCluster_model->list_researchClusters($show,$dataID,$font_back);		
		$this->load->view('backend/header');
		$this->load->view('backend/researchCluster_list' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/researchCluster_script');		
	}
	//-------------------------------
	public function edit_researchClusterData(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->researchCluster_model->Update_researchCluster($params,$dataID);
		echo $Result;
	}	
	//-------------------
	public function permission($userID=NULL ){	
		$data['userID'] = $userID;
		//$data['name'] = $name;, $name=NULL
		$this->load->view('backend/header');
		$this->load->view('backend/set_permission' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/user_script');
	}
	//-------------------------------  
	public function do_setPermission(){
		$userID = $this->input->post('userID');		
		$menuId = $this->input->post('menuId');
		$permission = $this->input->post('permission');
		$menu_url = $this->input->post('menu_url');
		
		$Result = $this->user_model->update_permission($userID ,$menuId ,$permission ,$menu_url);
		echo $Result;
	}	
	//-------------------
	public function addUser($dataID=NULL ){	
		$data['dataID'] = $dataID;
		//$data['name'] = $name;, $name=NULL
		$this->load->view('backend/header');
		$this->load->view('backend/addUser' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/user_script'); 
	}
	//-------------------------------
	public function add_userData(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->user_model->addUserData($params,$dataID);
		echo $Result;
	} 
	//-------------------------------
	public function edit_userData(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->user_model->editUserData($params,$dataID);
		echo $Result;
	}	
	//-------------------------------
	public function	get_user(){ 
		$category_id = $this->input->post('category_id');
		$dataID = '';
		$user = $this->user_model->list_user($dataID);	?>

		<div class="row">
                    <div class="col-12">
                        <div class="card-box">                             
                            <div class="table-responsive">
                                <table class="table table-hover table-centered m-0">

                                    <thead>
                                    <tr>
                                        <th style="text-align: center"><strong>เลือก</strong></th>   
										<th><strong>ชื่อ-นามสกุล</strong></th>                                 
                                        <th><strong>ตำแหน่ง</strong></th>                                     
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php $n=1; $check = ''; 
										  foreach($user->result() as $user2){ 
			
										  $userID2 = $user2->id;
										  $user_newsCategory = $this->news_model->getUser_newsCategory($userID2 , $category_id);
			
										  $countRows = 	$user_newsCategory->num_rows();	 
										  if($countRows >0){   	  
										  	foreach($user_newsCategory->result() as $user_newsCategory2){}
			
										  	if($user2->id == $user_newsCategory2->user_id){
											  	$check = 'checked';
										  	}	
										  }
									?>
                                 	
									<tr>                     
										<td align="center">                                            
											<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="check<?php echo $user2->id; ?>" name="check_box[]" onClick="selectUser('<?php echo $user2->id; ?>')" <?php echo $check;?> >
                                            <label class="custom-control-label" for="check<?php echo $user2->id; ?>"></label>
                                        </div>
                                        </td>
										<td><?php echo $user2->name_sname; ?></td> 
										<td><?php echo $user2->position_name; ?></td> 
									</tr>	
									<?php $check = ''; } ?>
									                               

                                    </tbody>
                                </table>
                            </div>
							
							<!--<input type="hidden" id="allUserId" name="allUserId" value="<?php //echo $userSelect; ?>" >
							<input type="hidden" id="allUserId2" name="allUserId2" value="<?php// echo $userSelect; ?>" >-->
							<input type="hidden" id="cateId" name="cateId" value="<?php echo $category_id?>" >
						
                            <!-- end row -->
                        </div>
                    </div>
                </div>
	
	<?php
	} 
	//-------------------------------
	public function	insertUser_newsCategory(){
		//$allUserId = $this->input->post('allUserId');	
		$userID = $this->input->post('userID');	
		$cateId = $this->input->post('cateId');
		
		$Result = $this->news_model->do_insertUser_newsCategory($userID,$cateId);
		echo $Result;
	}
	//------------------------------- 
	public function	deleteUser_newsCategory(){
		$userID = $this->input->post('userID');	
		$cateId = $this->input->post('cateId');
		
		$Result = $this->news_model->do_deleteUser_newsCategory($userID,$cateId);
		echo $Result;
	}
	//------------------------------- 
	public function	sortNumber(){
		$dataID = $this->input->post('dataID');	
		$num = $this->input->post('num');
		$table = $this->input->post('table');
		
		$Result = $this->staff_model->do_sortNumber($dataID,$num,$table);
		echo $Result;
	}	
	//-------------------------------  	
	public function description(){	
		
		$this->load->view('backend/header');
		$this->load->view('backend/alumni_description');
		$this->load->view('backend/footer');
		$this->load->view('backend/alumni_script'); 
   }
   //-------------------------------  	
	public function BackupDatabase(){	
		
		$this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('download');
        $this->load->library('zip');
		
		$this->load->dbutil();
		$db_format=array('format'=>'zip','filename'=>'my_db_backup.sql');
		$backup=& $this->dbutil->backup($db_format);
		$dbname='backup-on-'.date('Y-m-d').'.zip';
		$save='application/'.$dbname;
		write_file($save,$backup);
		force_download($dbname,$backup);
   } 
   //-------------------------------  	
	public function formImportDB(){  ?>



 <!-- sample modal content -->
                          
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel1">Import Database</h4>
                                        </div>
                                        <div class="modal-body" id="modalbody1">
										
										<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm_import" name="frm_import">	
		<p class="text-danger">คำเตือน การ Import Database ระบบจะทำการลบข้อมูลทั้งหมด</p>
		
	
	
	<div class="form-group row">
                                       
                                        <div class="col-md-12 col-sm-12">                      
                                                                  
                                           
                                            <div class="fileupload fileupload-new" data-provides="fileupload" id="up_file1" >
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="import1" name="import1" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <!--<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>-->
                                        </div>                                       
                                       
                                      <small class="text-danger">(รองรับไฟล์นามสกุล .sql เท่านั้น)</small>
                                        </div>
                                    </div>
	
	

		
	<div class="col-12" style="text-align: center">
											<button type="button" class="btn btn-primary btn-sm" id="btnimp10" onclick="addFile_Import()">Import</button>
		
	 <img src="<?php echo base_url('assets/images/LOADING.gif')?>" alt="" height="80" width="80" id="load20" style="display: none">	
		
										</div>
		</form>
										
										</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->         

<?php	}		
	  
	//-------------------------------  	 if ($_FILES['first_pic']['name'] !='') {
	public function importDB(){	
		
		$this->load->dbforge();
		
		$path = $_FILES['import1']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);		
		$doc_ext_chk = array('sql','SQL');			
		$this->load->helper("file");					   
		
		if(in_array($ext,$doc_ext_chk)){			
			
			
		$upload_path = './uploadfile/';
		$upload_pathName = 'uploadfile/';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = '*';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		//$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		$Result = 0;
		
		//if (isset($_FILES['file_name2']['name'])) {
		if ($_FILES['import1']['name'] !='') {			
			
			$tables = $this->db->list_tables();

foreach ($tables as $table){
   //echo $table;
	$this->dbforge->drop_table($table);
}
	//echo "1111";		
			           
				 $this->load->library('upload', $config);
				  if (!$this->upload->do_upload('import1')) {
                    //if file upload failed then catch the errors
                   // $this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
					  echo "ErrorUpload";
                } else { 
				  	$image_data = $this->upload->data();
                    //$config['image_library'] = 'gd2';
                    
                    $this->load->library('image_lib', $config);
					//if (!$this->image_lib->resize()) {
                    //   echo "ErrorResize";
                   // }else{ 				  					  
					  
						$this->load->helper("file");				   
						
						$imgNameUpdate2 = $upload_pathName.$this->upload->data('file_name');
						/*$resultUpdateBooking = $this->events_model->do_importDB($imgNameUpdate2);
						if($resultUpdateBooking!=''){ 
							//$Result = 2;
							
							@unlink($imgNameUpdate2);
							echo "111";
						}else{ 
							//$Result = 0;
							echo "222";
						 }*/
					//}
					  
					// echo "222"; 
					  
			/*		  $dbName = $this->db->database;
					  $this->dbforge->drop_database($dbName);
					  $this->dbforge->create_database($dbName);  echo "222";
					  
					  
					  $sql=file_get_contents($imgNameUpdate2);
						foreach (explode(";\n", $sql) as $sql){
							$sql = trim($sql);
							  //echo  $sql.'<br>============<br>';
							if($sql){ $this->db->query($sql); } 
						}
					  		echo "333";		   
		@unlink($imgNameUpdate2);
					  
					echo "444";*/
					  
					  $file = $imgNameUpdate2;
		if (file_exists($file)) {
			$lines = file($file);
			$statement = '';
			foreach ($lines as $line){
				$statement .= $line;
				if (substr(trim($line), -1) === ';')
				{
					$this->db->simple_query($statement);
					$statement = '';
				}
			}//echo "333";
    	}
					  
			@unlink($imgNameUpdate2);
					  
					//echo "444";		  
					  
				}
				//----------------
		}
			
		echo 1;		
			
		}
				
		/*$sql=file_get_contents('uploads/backup/2012-01-07_16_25_mybackup.sql');
      foreach (explode(";\n", $sql) as $sql) 
       {
         $sql = trim($sql);
          //echo  $sql.'<br>============<br>';
            if($sql) 
          {
            $this->db->query($sql);
           } 
      }*/
   }
	
	public function import_database() {
		
		/*$this->load->dbforge();
		$this->load->database();  
		
		$dbName = $this->db->database;
		$this->dbforge->drop_database($dbName);
		$this->dbforge->create_database($dbName);
		
	$path = 'uploadfile/';
	$sql_filename = 'b3923094c8ecb450d676cb4785e65037.sql';

	$sql_contents = file_get_contents($path.$sql_filename);
	$sql_contents = explode(";", $sql_contents);

	foreach($sql_contents as $query)
	{
		$pos = strpos($query,'ci_sessions');
		var_dump($pos);
		if($pos == false)
		{
			$result = $this->db->query($query);
		}
		else 
		{
			continue;
		}
	}*/
/////////////////////////////////////////////////
		/*$this->load->dbutil();
		$resultUpdateBooking = $this->events_model->import_dump();
						if($resultUpdateBooking!=''){ 
							//$Result = 2;
							
							//@unlink($imgNameUpdate2);
							echo "111";
						}else{ 
							//$Result = 0;
							echo "222";
						 }*/
		$file = 'uploadfile/b3923094c8ecb450d676cb4785e65037.sql';
		if (file_exists($file)) {
			$lines = file($file);
			$statement = '';
			foreach ($lines as $line)
			{
				$statement .= $line;
				if (substr(trim($line), -1) === ';')
				{
					$this->db->simple_query($statement);
					$statement = '';
				}
			}echo "111";
    	}
		
}
	
	public function list33() {
	
	$tables = $this->db->list_tables();

foreach ($tables as $table)
{
   echo $table;
}
	} 
//------------------------------- 
	public function add_alumni(){
		$form_data = $this->input->post('form_data');		
		$params = array();
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->alumni_model->Insert_Alumni($params);
		echo $Result;
	}			
/////////////////////////////////////////////////
		
	public function edit_alumni(){
		$form_data = $this->input->post('form_data');		
		$dataID = $this->input->post('dataID');
		parse_str($form_data, $params);
		  //print_r($params);
		$Result = $this->alumni_model->edit_Alumni($params,$dataID);
		echo $Result;
	}	
	
//-------------------
	public function addAlumni($dataID=NULL){	
		$data['dataID'] = $dataID;
		//$data['name'] = $name;, $name=NULL
		$this->load->view('backend/header');
		$this->load->view('backend/alumniDetail_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/alumni_script'); 
	}
//-------------------
	public function editAlumni($dataID=NULL){	
		$data['dataID'] = $dataID;
		//$data['name'] = $name;, $name=NULL
		$this->load->view('backend/header');
		$this->load->view('backend/alumniDetail_view' , $data);
		$this->load->view('backend/footer');
		$this->load->view('backend/alumni_script'); 
	}	
//-------------------------------
	public function addDescription_alumni(){
		$desc_th = $this->input->post('desc_th');		
		$desc_en = $this->input->post('desc_en');	
		$check = $this->input->post('check');	
		if($check != '0'){
			$model = 'updateDescription';
			
		} else {
			$model = 'insertDescription';
		}
						
		$Result = $this->alumni_model->$model($desc_th,$desc_en);
		echo $Result; 
	}		
//-------------------
		
	public function delete_file(){
		$dataID = $this->input->post('dataID');		
		$fileName = $this->input->post('fileName');		
		$Result = $this->news_model->do_deleteFile($dataID);
		
		if($Result ==1){
			$this->load->helper("file");					   
			@unlink('uploadfile/'.$fileName);
			echo $Result;
		}		
	}	
	
//-------------------		
	
}
?>

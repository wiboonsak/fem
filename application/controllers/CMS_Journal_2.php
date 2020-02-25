<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CMS_Journal_2 extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('journal_model');
        $this->load->model('journal_model_2');
        $this->load->model('user_model');
        //$this->load->model('news_model');

        /* if($this->session->userdata('user_id')){     
          }else{
          redirect(base_url().'login', 'refresh');
          } */
        /* if($this->session->userdata('user_id')==''){
          redirect(base_url('CMS_Journal'));
          } */
    }


    //-------------------	
    public function home() {
        $this->load->view('journal_files/home_add');
        $this->load->view('journal_files/home_add_script');
    }
    
    //-------------------	
    public function contact() {
        $this->load->view('journal_files/contactus');
        $this->load->view('journal_files/contactus_script');
    }
    
    //-------------------	
    public function payment() {
        $this->load->view('journal_files/payment');
        $this->load->view('journal_files/payment_script');
    }

    //-------------------	
    public function edit_cate() {
        $show = '';
        $dataID = '';
        $data['editcateData'] = $this->journal_model_2->list_editcateData($show, $dataID);
        $this->load->view('journal_files/edit_cate', $data);
        $this->load->view('journal_files/edit_cate_script');
    }
    
    //-------------------	
    public function edit_view() {
        $data['editList']=$this->journal_model_2->geteditList();
        $this->load->view('journal_files/edit_view', $data);
        $this->load->view('journal_files/edit_view_script');
    }

    //-------------------	
    public function edit_cate_add($dataID = null) {
        $data['dataID'] = $dataID;
        $this->load->view('journal_files/edit_cate_add', $data);
        $this->load->view('journal_files/edit_cate_script');
    }

    //--------------------
    public function DoAddProductCategory1() {
        $category_title = $this->input->post('category_title');
        $dataID = $this->input->post('dataID');
        $resultUpdateBooking = $this->journal_model_2->DoAddProductCategory1($category_title, $dataID);
        echo $resultUpdateBooking;
    }
    
    //--------------------
    public function Addedit() {
        $editorial_name = $this->input->post('editorial_name');
        $editorial_category = $this->input->post('editorial_category');
        $dataID = $this->input->post('dataID');
        $resultUpdateBooking = $this->journal_model_2->Addedit($editorial_name,$editorial_category, $dataID);
        echo $resultUpdateBooking;
    }

    //-------------------
    public function aboutjemes($currentID = null) {
        $data['currentID'] = $currentID;
        $this->load->view('journal_files/aboutjemes_add', $data);
        $this->load->view('journal_files/aboutjemes_add_script');
    }

    //--------------------
    public function aboutData() {
        $currentID = '';
        $data['aboutData'] = $this->journal_model_2->list_aboutData($currentID);
        $this->load->view('journal_files/aboutjemes_view', $data);
        $this->load->view('journal_files/aboutjemes_add_script');
    }
    //--------------------
    public function published_view() {
        
        $data['publishedData'] = $this->journal_model_2->get_publish();
        $this->load->view('journal_files/published_journal_view', $data);
        $this->load->view('journal_files/pudlished_journal_view_script');
    }
    //--------------------
    public function published_PDF_view($currentID=null) {
         $data['publishbyid'] = $this->journal_model_2->get_publishbyid($currentID);
        $data['PDF_view']=$this->journal_model_2->PDF_view($currentID);
        $this->load->view('journal_files/published_PDF_view',$data);
        $this->load->view('journal_files/pudlished_PDF_view_script');
    }
    //----------------------------
    public function changeSection(){
        $currentID = $this->input->post('changeValue');
        $result_id = $this->journal_model_2->get_listSection($currentID);
        ?>

        <select id="sectionData" name="sectionData"  class="form-control form-control-sm" > 
          <option value="">---เลือกหัวเรื่องหลัก---</option>
          <?php
                                                            foreach ($result_id->result() as $sectionData2) {?>
           <option value="<?php echo $sectionData2->id ?>"><?php echo $sectionData2->name ?></option>
                                                            <?php } ?>
          </select>
    
    <?php }
    //---------------------------
    public function Add_author($currentID = null) {
        $data['dataID'] = $currentID;
        $data['authorData']=$this->journal_model_2->authorData($currentID);
        $this->load->view('journal_files/Add_author',$data);
        $this->load->view('journal_files/Add_author_script');
    }
    //---------------------------
    public function published_journal($currentID = null,$dataID=null) {
        $data['currentID'] = $currentID;
        $data['dataID'] = $dataID;
        $this->load->view('journal_files/published_journal_add', $data);
        $this->load->view('journal_files/published_journal_add_script');
    }
    //---------------------------
    public function published_PDF($currentID = null) {
        $data['currentID'] = $currentID;
        if($currentID == '0'){
           $data['currentID']=''; 
     $data['journalID'] = $this->uri->segment(4);
     $data['pdf2'] = $this->uri->segment(4);
        }else{
            $data['journalID'] = '';
            $data['pdf2'] = $currentID; 
        }
        $data['publishedData'] = $this->journal_model_2->get_publish();
     
        $this->load->view('journal_files/published_PDF', $data);
        $this->load->view('journal_files/published_PDF_script');
    }
    //-------------------
    public function instructions_add ($currentID = null) {
        $data['currentID'] = $currentID;
        $this->load->view('journal_files/instructions_add', $data);
        $this->load->view('journal_files/instructions_script');
    }
    
    //--------------------
    public function instructions_view() {
        $currentID = '';
        $data['instructionData'] = $this->journal_model_2->list_instructionData( $currentID);
        $this->load->view('journal_files/instructions_view', $data);
        $this->load->view('journal_files/instructions_script');
    }
    //-------------------
    public function remove_file() {
        $file_name = $this->input->post('file_name');
        $file_name = 'uploadfile/'.$file_name;
        $img = '';
        $result = $this->journal_model_2->remove_file2($img);
        if($result == '1'){
            $this->load->helper("file");					   
            @unlink($file_name); 
			echo $result;
        }        
    }
    //-------------------
    public function remove_file3() {
        $file_name = $this->input->post('file_name');
        $file_name = 'uploadfile/'.$file_name;
        $img = '';
        $result = $this->journal_model_2->remove_file3($img);
        if($result == '1'){
            $this->load->helper("file");					   
            @unlink($file_name); 
			echo $result;
        }        
    }

    //-------------------
    public function deleteData() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->delete_data($dataID, $table);
        echo $result;
    }
    //-------------------
    public function deleteData_publish() {
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->deleteData_publish($dataID, $table);
        echo $result;
    }

    //-------------------
    public function set_ShowOnWeb() {
        $dataID = $this->input->post('dataID');
        $check = $this->input->post('check');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->update_ShowOnWeb($dataID, $check, $table);
        echo $result;
    }
    public function set_ShowOnWebauthor() {
        $dataID = $this->input->post('dataID');
        $check = $this->input->post('check');
        $table = $this->input->post('table');
        $result = $this->journal_model_2->set_ShowOnWebauthor($dataID, $check, $table);
        echo $result;
    }

    //------------------------------- 	
    public function addHome() {
        $topic = $this->input->post('topic');
        $comment = $this->input->post('comment');
        $currentID = $this->input->post('currentID');
        $img = $this->input->post('img_old');
        //$img = '';
        //$result_id = $this->journal_model_2-> addHome($currentID , $topic, $desc ,$img);
        $upload_path = './uploadfile/';
        $upload_pathName = 'uploadfile/';
        $config['upload_path'] = $upload_path;
        //allowed file types. * means all types
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX|xls|xlsx';
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
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img']['name']);
        if ($countFiles > 0) {
            $this->load->helper("file");					   
            @unlink('uploadfile/'.$img);
            for ($i = 0; $i < $countFiles; $i++) {
    //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                }
            }
        }
        if ($currentID != '0') {
            $result_id = $this->journal_model_2->updateHome($topic, $comment, $img);
        } else {
            $result_id = $this->journal_model_2->addHome($topic, $comment, $img);
        }
//        $result_id = $this->journal_model_2->addHome($currentID, $topic, $comment, $img);
        echo $result_id;
    }
    //------------------------------- 	
    public function addPublish() {
        $journal_name = $this->input->post('journal_name');
        $sub_title = $this->input->post('sub_title');
        $issue = $this->input->post('issue');
        $published_date = $this->input->post('published_date');
        $currentID = $this->input->post('currentID');
        $img = $this->input->post('img_old');
        $upload_path = './uploadfile/';
        $upload_pathName = 'uploadfile/';
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|GIF|JPG|PNG|JPEG|PDF|DOC|DOCX|xls|xlsx';
        $config['max_size'] = '0';
        $image_data = array();
        //check for errors
        $is_file_error = FALSE;
        $Result = 0;
        $this->load->library('upload', $config);
        $countFiles = count($_FILES['img']['name']);
		//print_r($_FILES['img']['name']);
		
        if($_FILES['img']['name'][0] != ''){
            $this->load->helper("file");					   
            @unlink('uploadfile/'.$img);
            for ($i = 0; $i < $countFiles; $i++) {
    //---------------------------
                $_FILES['file_upload2']['name'] = $_FILES['img']['name'][$i];
                $_FILES['file_upload2']['type'] = $_FILES['img']['type'][$i];
                $_FILES['file_upload2']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                $_FILES['file_upload2']['error'] = $_FILES['img']['error'][$i];
                $_FILES['file_upload2']['size'] = $_FILES['img']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_upload2')) {
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $uploadData[$i]['file_name'];
                }
            }
        }
            $result_id = $this->journal_model_2->addPublish($journal_name, $sub_title,$issue, $published_date,$img,$currentID);
        
        echo $result_id;       
    }

    //------------------------------- 	
    public function addAbout() {
        $topic = $this->input->post('topic');
        $comment = $this->input->post('comment');
        $currentID = $this->input->post('currentID');
        $result_id = $this->journal_model_2->addAbout($currentID, $topic, $comment);
        echo $result_id;
    }
    //------------------------------- 	
    public function addsection() {
        $currentID =$this->input->post('currentID');
        $name = $this->input->post('name');
        $dataID = $this->input->post('dataID');
        $result_id = $this->journal_model_2->addsection($name,$currentID,$dataID);
        echo $result_id;
    }
    //----------------------------
    public function List_show() {
        $currentID =$this->input->post('currentID');
        $result_id = $this->journal_model_2->get_listSection($currentID);
        ?><br>
        <br>
        <table id="table2" class="table table-bordered table-hover">
			<thead>
              <tr>
                <th>No.</th>
				<th>หัวข้อหลัก</th>
                <th>เรียงลำดับ</th>
                <th>กำหนดแสดงหน้าเว็บ</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
              </tr>
            </thead>
            <tbody>
                <?php $n=1; foreach($result_id->result() as $data2){ ?>
				
			 <tr id="row<?php echo $data2->id ?>">
                                                <td><?php echo $n ?></td>
                                                <td><?php echo $data2->name ?></td>
                                                <td><input id="order<?php echo $data2->id ?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $data2->sort_number ?>" onChange="updateOrder('<?php echo $data2->id ?>','sort_number', this.value)">
                                                    <input type="hidden" id="chkOrder<?php echo $data2->id ?>" value="<?php echo $data2->sort_number ?>"></td>
                                                <td align="center">
                                                                            <label>
                                                                                <input id="ch<?php echo $data2->id ?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data2->id ?>', this.value, 'tbl_section_data')" value="<?php echo $data2->show_onweb ?>"  <?php
                                                                                       if ($data2->show_onweb == '1') {
                                                                                           echo 'checked';
                                                                                      }
                                                                                       ?> data-plugin="switchery" data-color="#007bff" data-size="small"  /></label>
                                                                        </td>
                                                <td><button type="button" class="btn btn-success btn-sm" onClick="update('<?php echo $data2->id ?>','<?php echo $data2->name ?> ')"><i class="icon-pencil"></i></button></td>
                                                <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $data2->id ?>', 'tbl_section_data')"><i class="icon-trash"></i></button>

                                                </td>
                                            </tr>
			<?php $n++;  } ?>
			</tbody>
       </table>	
       <script type="text/javascript">
    $(document).ready(function () {
        $('[data-plugin="switchery"]').each(function (idx, obj) {
       new Switchery($(this)[0], $(this).data());
});
$('#table2').DataTable({
     searching: true ,
     pageLength : 15     
});
    });
    </script>
<?php	}
    
    //=================================
    // //------------------dataID changeValue //
	public  function updateOrderCate(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->journal_model_2->updateOrderCate($dataID,$changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function updatePDF(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->journal_model_2->updatePDF($dataID,$changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function checkemail(){
		$changeValue = $this->input->post('email');
		$result = $this->journal_model->count_email2($changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function checkemailauthor(){
		$changeValue = $this->input->post('email');
		$result = $this->journal_model->count_emailauthor($changeValue);
		echo $result;
		
	} 
    // //------------------dataID changeValue //
	public  function updateauthor(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->journal_model_2->updateauthor($dataID,$changeValue);
		echo $result;
		
	} 
   
    //------------------------------- 	
    public function addinstruction() {
        $topic = $this->input->post('topic');
        $desc = $this->input->post('desc');
        $currentID = $this->input->post('currentID');
        $result_id = $this->journal_model_2->addinstruction($currentID, $topic, $desc);
        echo $result_id;
    }

   
    //-------------------
    public function edit_add($dataID=null) {
        $data['dataID'] = $dataID;
        $datatype='1';
	$data['listCategory']=$this->journal_model_2->getCategory($datatype);
        $this->load->view('journal_files/edit_add',$data);
        $this->load->view('journal_files/edit_add_script');
    }
    
     //------------------------------- 	
    public function addcontact() {
        $phone = $this->input->post('phone'); 
        $mail = $this->input->post('mail'); 
        $comment = $this->input->post('comment');
        $currentID = $this->input->post('currentID');
         if ($currentID != '0') {
            $result_id = $this->journal_model_2->updatecontact($phone, $mail, $comment);
        } else {
            $result_id = $this->journal_model_2->addcontact($phone, $mail, $comment);
        }
        echo $result_id;
    }
    
     //------------------------------- 	
    public function addpayment() {
        $accountName = $this->input->post('accountName'); 
        $accountNo = $this->input->post('accountNo');  
        $bank = $this->input->post('bank'); 
        $swiftCode = $this->input->post('swiftCode');
        $currentID = $this->input->post('currentID');
         if ($currentID != '0') {
            $result_id = $this->journal_model_2->updatepayment($accountName, $accountNo, $bank,$swiftCode);
        } else {
            $result_id = $this->journal_model_2->addpayment($accountName, $accountNo, $bank,$swiftCode);
        }
        echo $result_id;
    }
    //======================
    //-------------------
	public function managing_updateStatus(){
		
		$status = $this->input->post('val');				
		$publishID = $this->input->post('element2');	
		$result = $this->journal_model_2->managingUpdateStatus($status, $publishID);		
		echo $result;	
	} 
//============================================
         public function addPDF(){
             $publishedData =$this->input->post('publishedData');
		 $sectionData =$this->input->post('sectionData');
		 $title =$this->input->post('title');
		 $Page =$this->input->post('Page');
		 $dataID =$this->input->post('dataID');
		 $Author =$this->input->post('Author');
                 $img = $this->input->post('img_old');
                 
//                  $dataID2 = '';
                 	//-----------------------------------
		     
		 		$upload_path = './uploadfile/';
				$upload_pathName = 'uploadfile/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'pdf|PDF';
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
		 	
		    $this->load->library('upload', $config);
                      $countFiles = count($_FILES['file_upload']['name']);
		   
       if ($countFiles > 0) {
            $this->load->helper("file");					   
            @unlink('uploadfile/'.$img);
            for ($i = 0; $i < $countFiles; $i++) { 
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['file_upload']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['file_upload']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['file_upload']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['file_upload']['size'][$i];

                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    //$uploadData[$i]['file_name'] = $fileData['file_name'];
                    $img = $fileData['file_name'];
                  
                    //$dataID = $this->journal_model_2->addPDF($dataID ,$sectionData , $publishedData , $title, $Page,$uploadData[$i]['file_name'] );
                }
				
			}
		} 
                $dataID = $this->journal_model_2->addPDF($dataID ,$sectionData , $publishedData , $title, $Page,$img);
		//--------------------------                  
                 foreach($Author AS $value){
                     if($value !=''){
                         $dataID2 = $this->journal_model_2->addauthor($dataID , $value);
                         //$dataID = $dataID2;
                     }  //else {
                       //  $dataID = $dataID;
                    // }                     
                     
                 }                 
		 echo $dataID;
		
	 }
         //---------------------
         public function UserAdd(){
             $name =$this->input->post('name');
             $Password =$this->input->post('Password');
             $password_old =$this->input->post('password_old');
             $email =$this->input->post('email');
             $adminType =$this->input->post('adminType');
             $dataID =$this->input->post('dataID');
             if($Password==''){
                 $Password=$password_old;
             }else{
                  $Password=md5($Password);
             }
             $result = $this->journal_model_2->adduser($dataID ,$name , $Password , $email, $adminType);
             echo $result;
         }
         //---------------------
         public function AuthorAdd(){
             $email =$this->input->post('email');
             $Password =$this->input->post('Password');
             $password_old =$this->input->post('password_old');
             $Salutation =$this->input->post('Salutation');
             $name =$this->input->post('name');
             $Middle =$this->input->post('Middle');
             $Last =$this->input->post('Last');
             $Affliation =$this->input->post('Affliation');
             $Country =$this->input->post('Country');
             $dataID =$this->input->post('dataID');
             if($Password==''){
                 $Password=$password_old;
             }else{
                  $Password=md5($Password);
             }
             $result = $this->journal_model_2->addauthordata($dataID ,$email,$Password,$Salutation,$name,$Middle,$Last,$Affliation,$Country);
             echo $result;
         }
         //--------------------
    public function user_data() {
        
        $data['userData']=$this->journal_model_2->userdetail();
        $this->load->view('journal_files/User_data',$data);
        $this->load->view('journal_files/User_data_script');
    }
         //--------------------
    public function author_data(){
        
        $data['authorData']=$this->journal_model_2->authordetail();
        $this->load->view('journal_files/author_data',$data);
        $this->load->view('journal_files/author_data_script');
    }
    //--------------------------------
    public function payment_detail() {
        //$author ='';
    //$data['payment'] = $this->journal_model->listPaper($author,$paper_no);
        $data['statusF'] = '1';
		$data['check'] = '';
		
        $this->load->view('journal_files/payment_detail',$data);
        $this->load->view('journal_files/paperData_script');
    }
 //--------------------------------
    public function payment_action($paper_no) {
        $author ='';
    $data['payment'] = $this->journal_model->listPaper($author,$paper_no);
        $this->load->view('journal_files/payment_action',$data);
        $this->load->view('journal_files/payment_action_script');
    }
     //---------------------
     public function updateconfirm() {
         $NotebAdmin = $this->input->post('NotebAdmin');
         $payment_no = $this->input->post('payment_no');
         $currentID = $this->input->post('currentID');
         $updateconfirm = $this->journal_model_2->updateconfirm($NotebAdmin,$payment_no,$currentID );
             echo $updateconfirm;
     }    
     //---------------------
     public function sendemail() {
         
         $data['email'] = $this->journal_model_2->listemail();
         $this->load->view('journal_files/sendemail_view',$data);	
	$this->load->view('journal_files/sendemail_view_script');
     }    
     //---------------------
     public function emaildata($paper_no) {
      
    $data['emailpaper'] = $this->journal_model_2->listemailpaper($paper_no);
         $this->load->view('journal_files/sendemail_data',$data);	
     }    
     //---------------------
     public function emailDetail($emailId,$paper_no) {
        $data['print'] = $this->uri->segment(5); 
   $emaildetail = $this->journal_model_2->listemaildetail($emailId,$paper_no);
   foreach($emaildetail->result() as $emaildetail2){}
   switch ($emaildetail2->type_mail){
       case "1";
           $this->load->view('journal_files/sendMailEditor_view',$data);
           break;
       case "2";
           $this->load->view('journal_files/sendMailReviewer_view',$data);
           break;
       case "3";
           $this->load->view('journal_files/sendMail_afterReviewerAction_view',$data);
           break;
       case "4";
           $this->load->view('journal_files/reviewer_to_editor_view',$data);
           break;
       case "5";
           $this->load->view('journal_files/editor_to_author_view',$data);
           break;
       case "6";
           $this->load->view('journal_files/author_mailEdit_view',$data);
           break;
       case "7";
           $this->load->view('journal_files/mail_authorSubmission_view_1',$data);
           break;
       case "8";
           $this->load->view('journal_files/mail_authorSubmission_view_2',$data);
           break;
   }
     }  
    //---------------------------------
    public function print_mail(){
        
        $this->load->view('journal_files/print_mail');
    }
    //----------------------------
        public function reset_password(){ 
            $txt = $this->uri->segment(3);
		$data['txt'] = $txt;
            $this->load->view('journal_files/forgotPassword_journal',$data);
        }
}

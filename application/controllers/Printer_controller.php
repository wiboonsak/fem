<?php
	class Printer_controller extends CI_Controller{

		public function __construct(){
		parent::__construct();
			
			$this->load->model('Allowance_model');
			$this->load->model('Saraban_model');

		// Load session library
		$this->load->library('session');

	}	

		/*function Preview(){   *************original

			$id_allownace = $this->input->get("id_allownace");

			$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update,mnall.budget_datail , mnall.topic,mnall.send_to, user.firstname , user.lastname,user.position_level,user.position_name , user.titlename
			 FROM manage_allowance as mnall 
			/* INNER JOIN manage_saraban as mnsa 
			 on mnall.id_saraban = mnsa.id_saraban*/ 
/*			 INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
			 WHERE mnall.user_create = ".($this->session->userdata['logged_in']['id'])." AND mnall.data_status = '1' AND mnall.id_allowance =".$id_allownace." ORDER by mnall.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			$data['send_to'] = null;

			if($data['getdata'][0]['send_to'] != null){
				$sql2 = "SELECT  titlename ,firstname , lastname,position_level,position_name FROM tbl_user_data WHERE id =".$data['getdata'][0]['send_to'];
				$data['send_to'] =  $this->Allowance_model->getdatalist_allowance($sql2);
			}
			

			$this->load->library('Pdf');
			$this->load->view('Print/view_file',$data);
		}*/
/////////////////////////////////////////////////////////////////
		
		function Preview(){
			$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/test' , $data);
			//$this->load->view('Print/test2');
		}
		
		function Preview2(){
			$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/test2' , $data);
			//$this->load->view('Print/test2');
		}
		
		function Preview3(){
			$data['money'] = '1';

			$this->load->library('Pdf');
			$this->load->view('Print/test' , $data);
			//$this->load->view('Print/test2');
		}
		
		function Preview4(){
			$data['money'] = '1';

			$this->load->library('Pdf');
			$this->load->view('Print/test2' , $data);
			//$this->load->view('Print/test2');
		}
/////////////////////////////////////////////////////////////////		

		function Preview_admin(){

			$id_allownace = $this->input->get("id_allownace");

			$sql = "SELECT mnall.id_allowance, mnall.id_saraban, mnall.user_create, mnall.text1, mnall.text2, mnall.text3, mnall.text4, mnall.text5, mnall.text6, mnall.file_name1,mnall.file_name2,mnall.file_name3,mnall.file_name4,mnall.file_name5,mnall.file_Orig1,mnall.file_Orig2,mnall.file_Orig3,mnall.file_Orig4,mnall.file_Orig5,mnall.expenses1,mnall.expenses2,mnall.expenses3,mnall.expenses4,mnall.remark_Expenses4,mnall.date_expenses1,mnall.date_expenses2,mnall.date_expenses3,mnall.date_expenses4,mnall.footer, mnall.date_add, mnall.approve_status, mnall.send_to, mnall.check_doc, mnall.date_add, mnall.date_modify, mnall.data_status, mnall.user_update,mnall.budget_datail , mnall.topic,mnall.send_to, user.firstname , user.lastname,user.position_level,user.position_name,user.titlename	
			 FROM manage_allowance as mnall 
			/* INNER JOIN manage_saraban as mnsa 
			 on mnall.id_saraban = mnsa.id_saraban */
			 	INNER JOIN tbl_user_data as user ON mnall.user_create = user.id
			 WHERE mnall.data_status = '1' AND mnall.id_allowance =".$id_allownace." ORDER by mnall.date_add DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
			$data['getdata'] = $this->Allowance_model->getdatalist_allowance($sql);
			$data['send_to'] = null;
			
			if($data['getdata'][0]['send_to'] != null){
				$sql2 = "SELECT  firstname , titlename, lastname,position_level,position_name FROM tbl_user_data WHERE id =".$data['getdata'][0]['send_to'];
				$data['send_to'] =  $this->Allowance_model->getdatalist_allowance($sql2);
			}
			$this->load->library('Pdf');
			$this->load->view('Print/view_file',$data);
		}
/////////////////////////////////////////////////////////////////
		
		function Preview_doc(){

			$doc1_id =  $this->uri->segment(3);
			$type_travel =  $this->uri->segment(4);

			$doc_1 = "SELECT doc_1.doc_id,doc_1.doc_where, doc_1.date, doc_1.title, doc_1.doc_to, doc_1.id_saraban, doc_1.dateinput, doc_1.name, doc_1.position, doc_1.major, doc_1.doc_with, doc_1.goto, doc_1.start, doc_1.datestart,doc_1.time_start,doc_1.time_end, doc_1.end, doc_1.dateend, doc_1.sumdate, doc_1.allowfor, doc_1.travel, doc_1.travelday, doc_1.travelprice, doc_1.resident, doc_1.residentday, doc_1.residentprice, doc_1.vehical, doc_1.vehicalprice, doc_1.other, doc_1.otherprice, doc_1.sumprice, doc_1.date_create,doc_1.Incomplete_receipt,doc_1.sumtotal_price , user.firstname, user.lastname,user.position_name,user.titlename
			FROM tbl_doc_1  as doc_1 
			INNER JOIN tbl_user_data as user ON doc_1.user_update = user.id
			WHERE doc_1.data_status = '1' AND doc_1.id = '".$doc1_id."' AND doc_1.type_travel = '".$type_travel."' 
			ORDER by doc_1.date_create DESC";

//			$doc_2 = "SELECT * FROM doc_2  WHERE data_status = '1' AND id_saraban =".$id_saraban." ORDER by date_create DESC";

			$doc_3 = "SELECT * FROM tbl_doc_3  WHERE data_status = '1' AND doc_1_id = '".$doc1_id."' AND type_travel = '".$type_travel."' ORDER by date_create DESC";

			$doc_4 = "SELECT * FROM tbl_doc_3  WHERE data_status = '1' AND doc_1_id = '".$doc1_id."' AND type_travel = '".$type_travel."' ORDER by date_create DESC";

			$this->load->model("Allowance_model"); 
			$data = array();
                        if($type_travel == '1'){
                        $table = 'tbl_local_document';
                        }else{
                        $table = 'tbl_outbound_document';
                        }
                        $data['table'] = $table;
                        $data['getdocument'] = $this->Allowance_model->getdocument($doc1_id,$table);
			$data['doc_1'] = $this->Allowance_model->getdatalist_allowance($doc_1);
			//$data['doc_2'] = $this->Allowance_model->getdatalist_allowance($doc_2);
			$data['doc_3'] = $this->Allowance_model->getdatalist_allowance($doc_3);
			$data['doc_4'] = $this->Allowance_model->getdatalist_allowance($doc_4);
			//$data['doc_2_1'] = $this->Allowance_model->getdatalist_allowance($doc_2);
			$data['doc_3_1'] = $this->Allowance_model->getdatalist_allowance($doc_3);
			$data['doc_4_1'] = $this->Allowance_model->getdatalist_allowance($doc_4);
                        $data['doc_file'] = $this->Allowance_model->getdoc_file($doc1_id);
                        $data['type_travel']=$type_travel;
			$this->load->library('Pdf');
			$this->load->view('Print/view_file_doc',$data);
		}
                //-------------------------------------------------------------------
                		function Preview_doc_group(){

			$idsaraban =  $this->uri->segment(3);
                        $type_travel =  $this->uri->segment(4);

			$doc_1 = "SELECT doc_1.doc_id,doc_1.doc_where, doc_1.date, doc_1.title, doc_1.doc_to, doc_1.id_saraban, doc_1.dateinput, doc_1.name, doc_1.position, doc_1.major, doc_1.doc_with, doc_1.goto, doc_1.start, doc_1.datestart, doc_1.end, doc_1.dateend,doc_1.time_start,doc_1.time_end, doc_1.sumdate, doc_1.allowfor, doc_1.travel, doc_1.travelday, doc_1.travelprice, doc_1.resident, doc_1.residentday, doc_1.residentprice, doc_1.vehical, doc_1.vehicalprice, doc_1.other, doc_1.otherprice, doc_1.sumprice, doc_1.date_create,doc_1.Incomplete_receipt,doc_1.sumtotal_price , user.firstname, user.lastname,user.position_name,user.titlename
			FROM tbl_doc_1  as doc_1 
			INNER JOIN tbl_user_data as user ON doc_1.user_update = user.id
			WHERE doc_1.data_status = '1' AND doc_1.doc_id = '".$idsaraban."' AND doc_1.type_travel = '".$type_travel."' 
			ORDER by doc_1.date_create DESC";

			$doc_2 = "SELECT * FROM tbl_doc_2  WHERE data_status = '1' AND id_saraban =".$idsaraban." AND type_travel = '".$type_travel."'  ORDER by date_create DESC";

			$doc_3 = "SELECT * FROM tbl_doc_3  WHERE data_status = '1' AND doc_id = '".$idsaraban."' AND type_travel = '".$type_travel."'  ORDER by date_create DESC";

			$doc_4 = "SELECT * FROM tbl_doc_3  WHERE data_status = '1' AND doc_id = '".$idsaraban."' AND type_travel = '".$type_travel."'  ORDER by date_create DESC";
                        
		

			$this->load->model("Allowance_model"); 
			$data = array();
                        if($type_travel == '1'){
                        $table = 'tbl_local_document';
                        }else{
                        $table = 'tbl_outbound_document';
                        }
                        $data['table'] = $table;
                        $data['getdocument'] = $this->Allowance_model->getdocument($idsaraban,$table);
			$data['doc_1'] = $this->Allowance_model->getdatalist_allowance($doc_1);
			$data['doc_2'] = $this->Allowance_model->getdatalist_allowance($doc_2);
			$data['doc_3'] = $this->Allowance_model->getdatalist_allowance($doc_3);
			$data['doc_4'] = $this->Allowance_model->getdatalist_allowance($doc_4);
			$data['doc_2_1'] = $this->Allowance_model->getdatalist_allowance($doc_2);
			$data['doc_3_1'] = $this->Allowance_model->getdatalist_allowance($doc_3);
			$data['doc_4_1'] = $this->Allowance_model->getdatalist_allowance($doc_4);
			$data['doc_file'] = $this->Allowance_model->getdoc_filegroup($idsaraban);
                        $data['type_travel']=$type_travel;
			$this->load->library('Pdf');
			$this->load->view('Print/view_file_doc_group',$data);
		}
		/////////////////////////////////////////////////////////////////
		
		function PreviewGroup(){
			$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/groupM',$data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function PreviewGroup2(){
			$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/groupM2',$data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function PreviewGroup3(){	
			$data['money'] = '1';

			$this->load->library('Pdf');
			$this->load->view('Print/groupM',$data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function PreviewGroup4(){	
			$data['money'] = '1';

			$this->load->library('Pdf');
			$this->load->view('Print/groupM2',$data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function preview_outboundGroup($document_id=NULL,$user_create=null){
			
            if($user_create!=''){
                $user_create = $user_create;
            }else{
				$user_create = $this->session->userdata['logged_in']['id'];
            }
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,'1',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);
			
			//$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/outboundGroup' , $data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function preview_outboundWithdraw($document_id=NULL,$user_create=null){
			
			if($user_create!=''){
                $user_create = $user_create;
            }else{
				$user_create = $this->session->userdata['logged_in']['id'];
            }
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,'1',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);			
			
			//$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/outbound_PDF' , $data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function preview_outbound($document_id=NULL,$user_create=null){
			
			if($user_create!=''){
                $user_create = $user_create;
            }else{
				$user_create = $this->session->userdata['logged_in']['id'];
            }
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,'0',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);			
			$typetravel = '2';
			//$data['money'] = '0';
                        $data['typetravel'] = $typetravel;
			//$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/outbound_1person' , $data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function outboundGroup_noWithdraw($document_id=NULL,$user_create=null){
			
			if($user_create!=''){
				
                $user_create = $user_create;
				
            }else{
				
				$user_create = $this->session->userdata['logged_in']['id'];
            }
			$data['documentData'] = $this->Allowance_model->get_documentData($document_id,'0',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'2',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'2',$user_create);		
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->library('Pdf');
			$this->load->view('Print/outboundGroup_noWithdraw' , $data);
			//$this->load->view('Print/test2');
		}
		//-------------------------------------------------------
		
        function preview_LocalGroup($document_id=NULL,$user_create=null){
			
            if($user_create!=''){
                $user_create = $user_create;
            }else{
				$user_create = $this->session->userdata['logged_in']['id'];
            }
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,'1',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);
			
			//$data['money'] = '0';			

			$this->load->library('Pdf');
			$this->load->view('Print/localGroup' , $data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function preview_LocalWithdraw($document_id=NULL,$user_create=null){  
			 if($user_create!=''){
                            $user_create = $user_create;
                        }else{
			$user_create = $this->session->userdata['logged_in']['id'];
                        }
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,'1',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['withdrawData'] = $this->Allowance_model->get_withdrawData($document_id, '3', $user_create, 'type_travel', 'desc');
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);			
			
			//$data['money'] = '0';

			$this->load->library('Pdf');
			$this->load->view('Print/local_PDF' , $data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function preview_Local($document_id=NULL,$user_create=null){  
			 if($user_create!=''){
                            $user_create = $user_create;
                        }else{
			$user_create = $this->session->userdata['logged_in']['id'];
                        }
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,'0',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);			
			$typetravel = '1';
			//$data['money'] = '0';
                        $data['typetravel'] = $typetravel;

			$this->load->library('Pdf');
			$this->load->view('Print/local_1person' , $data);
			//$this->load->view('Print/test2');
		}
		/////////////////////////////////////////////////////////////////
		
		function LocalGroup_noWithdraw($document_id=NULL,$user_create=null){  
			 if($user_create!=''){
                            $user_create = $user_create;
                        }else{
			$user_create = $this->session->userdata['logged_in']['id'];
                        }
			$data['documentData'] = $this->Allowance_model->get_localData($document_id,'0',$user_create);
			$data['listNameData'] = $this->Allowance_model->get_listNameData($document_id,'1',$user_create);
			$data['vacationData'] = $this->Allowance_model->get_vacation($document_id,'1',$user_create);		
			$data['userDetail'] = $this->Allowance_model->get_userDetail($user_create);		

			$this->load->library('Pdf');
			$this->load->view('Print/LocalGroup_noWithdraw' , $data);
			//$this->load->view('Print/test2');
		}
		
	}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class document_sendmail extends CI_Controller {

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

	//--------------------
	public function __construct() 
	{
		parent::__construct();

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Login_database_allowance');
		$this->load->model('Allowance_model');
		$this->load->model('Allowance_model_2');
		$this->load->model('Inputform_model');
		$this->load->model('Saraban_model');
	}
        	//--------------------
	public function send_mail(){
		
        $dataid = $this->input->post('dataid');
        $edit = $this->input->post('edit');
        $n = ''; $in = '1'; $result = 'x'; $sarabannum = '';
		$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
		//$Nresult_setadmin = $result_setadmin->num_rows();
		foreach($result_setadmin->result() as $result_setadmin2){
			
			if(strpos($result_setadmin2->system_permissions, '2') !== false){
                $adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_saraban');
                foreach ($adminsaraban->result() AS $adminsaraban1){}
		
                $getdocuser = $this->Allowance_model->getdocuser($dataid);  
              
                foreach ($getdocuser->result() AS $data){}
                if($data->withdraw =='0'){
                  $sarabannum = $data->saraban_number; 
                }else{
                  $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
                }
                
                if($edit !=''){
                	$edittxt = 'การแก้ไข';
                }else{
                 	$edittxt = '';   
                }
				$from_email    = $data->email; 
				$subject	   = "ตรวจสอบหนังสือขออนุมัติเดินทาง ที่ ".$sarabannum;
			       
			    $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
            
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$data->name_surname.' ได้ทำ'.$edittxt.'หนังสือขออนุมัติเดินทาง  เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบสารบรรณ  Link : '.base_url().'saraban</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'<br>'.$data->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  
     
			         //Load email library 
             
                     $to_email   =  $adminsaraban1->email;
                                
			         //$this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			          }
                                }else{
                                    $result = '0'; 
                                }
                                }
                            
			         //Send mail			       

			echo $result;	
	}
    //--------------------
	public function send_mailfail(){
                  $dataid = $this->input->post('dataid');
                  $userid = $this->input->post('userid');
                  
                  $adminsaraban = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_saraban');
                  $adminallow = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_allowance');
                  $sarabannum = '';  $sarabannum2 = ''; $topic = '';
                    foreach ($adminsaraban->result() AS $adminsaraban1){}
                    foreach ($adminallow->result() AS $adminallow1){}
                    
                 
                   $getdocuser = $this->Allowance_model->getdocuser($dataid);  
    
                foreach ($getdocuser->result() AS $data){}
                if($data->withdraw =='0'){
                  $sarabannum = $data->saraban_number; 
                }else{
                  $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
                  $sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
                }
                $approve_id = $data->approve_id;
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach ($get_userDetail->result() AS $get_userDetail2){}
                $get_position = $this->Allowance_model->get_position($adminsaraban1->position_id);
                foreach ($get_position->result() AS $get_position1){}
                $get_positionallow = $this->Allowance_model->get_position($adminallow1->position_id);
                foreach ($get_positionallow->result() AS $get_positionallow1){}
 
                 $withdrawData = $this->Allowance_model->get_withdrawData($dataid, '', $data->user_create, 'type_travel', 'desc');
						  $withdrawNum = $withdrawData->num_rows();	

						  if($withdrawNum > 0){			

							foreach($withdrawData->result() as $withdrawData2){	

								if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

								} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){
                                                                        $topic = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

								} else if($withdrawNum == 2){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
								}
						  } }
                if(($data->check_doc == '0')&&($data->check_doc2 == '3')&&($data->approve_status2 == '')){
				$from_email    = $adminsaraban1->email; 
				$subject	   = "แจ้งผลการตรวจสอบข้อมูลหนังสือขออนุมัติเดินทาง ที่ $sarabannum  ";
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ ไม่ผ่าน เนื่องจาก '.$data->notapproved_saraban.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			          }
                }
                
                if(($data->check_doc2 == '0')&&($data->check_doc == '1')&&($data->approve_status != '')){
				$from_email    = $adminallow1->email; 
				$subject	   = "แจ้งผลการตรวจสอบข้อมูลหนังสือ$topic ที่ $sarabannum2  ";
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง  '.$topic.'  ที่  '.$sarabannum2.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ ไม่ผ่าน เนื่องจาก '.$data->notapproved_admin.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '2';
			         }else{ 
			            $result = '0';
			          }
                }
			echo $result;
        }
       	//------------------------------------------------
        public function send_mailpass(){
                  $dataid = $this->input->post('dataid');
                  $userid = $this->input->post('userid');
                  
                  $approve_id = $this->input->post('sendto');
                  $adminsaraban = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_saraban');
                  $adminallow = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_allowance');
                  $sarabannum = '';  $sarabannum2 = ''; $topic = '';
                    foreach ($adminsaraban->result() AS $adminsaraban1){}
                    foreach ($adminallow->result() AS $adminallow1){}
                 
                   $getdocuser = $this->Allowance_model->getdocuser($dataid);  

                foreach ($getdocuser->result() AS $data){}
                if($data->withdraw =='0'){
                  $sarabannum = $data->saraban_number; 
                }else{
                  $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
                  $sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
                }
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach ($get_userDetail->result() AS $get_userDetail2){}
                $get_position = $this->Allowance_model->get_position($adminsaraban1->position_id);
                foreach ($get_position->result() AS $get_position1){}
                $get_positionallow = $this->Allowance_model->get_position($adminallow1->position_id);
                foreach ($get_positionallow->result() AS $get_positionallow1){}
 
                 $withdrawData = $this->Allowance_model->get_withdrawData($dataid, '', $data->user_create, 'type_travel', 'desc');
						  $withdrawNum = $withdrawData->num_rows();	

						  if($withdrawNum > 0){			

							foreach($withdrawData->result() as $withdrawData2){	

								if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

								} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){
                                                                        $topic = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

								} else if($withdrawNum == 2){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
								}
						  } }
                
                if(($data->check_doc == '1')&&($data->check_doc2 == '3')&&($data->approve_status == '2')&&($data->approve_id != '0')){
                
                $from_email    = $adminsaraban1->email; 
                $subject	  = "แจ้งผลการตรวจสอบข้อมูลหนังสือขออนุมัติเดินทาง ที่ $sarabannum  ";
		$email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน&nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ ผ่าน  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 

$from_email    = $adminsaraban1->email; 
$subject       = "พิจารณาอนุมัติหนังสือขออนุมัติเดินทาง ที่ $sarabannum  ";
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$data->name_surname.' ได้ทำหนังสือขออนุมัติเดินทาง  เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  และได้รับการตรวจสอบข้อมูลจากผู้ปฏิบัติงานบริหารเรียบร้อยแล้ว  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อพิจารณาอนุมัติ/ไม่อนุมัติหนังสือขออนุมัติเดินทางดังกล่าว   โดยท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบการเดินทาง  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $get_userDetail2->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
                                   if($this->email->send()){ 
                                        $result = '1';
                                   }else{
                                        $result = '0';
                                   }
			         }else{ 
			            $result = '0';
			          }
                }
                
                if(($data->check_doc2 == '1')&&($data->check_doc == '1')&&($data->approve_status == '1')&&($data->approve_status2 == '2')&&($data->approve_id != '0')){
                    
                     $from_email    = $adminallow1->email; 
                $subject	  = "แจ้งผลการตรวจสอบข้อมูลหนังสือ$topic ที่ $sarabannum2  ";
		$email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง  '.$topic.'  ที่  '.$sarabannum2.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ ผ่าน  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 

$from_email    = $adminallow1->email; 
$subject       = "พิจารณาอนุมัติหนังสือ$topic ที่ $sarabannum2  ";
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$data->name_surname.' ได้ทำหนังสือขออนุมัติ  เรื่อง  '.$topic.'  ที่  '.$sarabannum2.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  และได้รับการตรวจสอบข้อมูลจากผู้ปฏิบัติงานบริหารเรียบร้อยแล้ว  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อพิจารณาอนุมัติ/ไม่อนุมัติหนังสือขออนุมัติเดินทางดังกล่าว   โดยท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบการเดินทาง  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $get_userDetail2->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
                                   if($this->email->send()){ 
                                        $result = '2';
                                   }else{
                                        $result = '0';
                                   }
			         }else{ 
			            $result = '0';
			          }
                }
                                   echo $result;
        }
          	//--------------------
	public function send_mailapprove0(){
                $dataid = $this->input->post('id_allownace');
                $approve_status = $this->input->post('approve_status');                
                $sarabannum = '';     
                $getdocuser = $this->Allowance_model->getdocuser($dataid);  
                
                foreach ($getdocuser->result() AS $data){}
                $sarabannum = $data->saraban_number; 
                $approve_id = $data->approve_id;
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach ($get_userDetail->result() AS $get_userDetail2){}
                $get_position = $this->Allowance_model->get_position($get_userDetail2->position_id);
                foreach ($get_position->result() AS $get_position1){}
 
				$from_email    = $get_userDetail2->email; 
				$subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือขออนุมัติเดินทาง ที่ ".$sarabannum;
			       
		if($approve_status == '0'){	      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง '.$data->subject_document.' ที่ '.$sarabannum.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  ไม่อนุมัติ  เนื่องจาก '.$data->notapproved_approvers.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>'; 
                }else{
                          $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง '.$data->subject_document.' ที่ '.$sarabannum.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  อนุมัติ </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   
                }

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			          }
			echo $result;
	}
    //--------------------
	public function send_mailapprove1(){
		
                $dataid = $this->input->post('id_allownace');
                $approve_status = $this->input->post('approve_status');
                $sarabannum = ''; $sarabannum2 = ''; $topic = ''; $n = ''; $in = '2'; 
                $getdocuser = $this->Allowance_model->getdocuser($dataid);  
                foreach($getdocuser->result() AS $data){}
                $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
                $sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
                $approve_id = $data->approve_id;
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach($get_userDetail->result() AS $get_userDetail2){}
                $get_position = $this->Allowance_model->get_position($get_userDetail2->position_id);
                foreach($get_position->result() AS $get_position1){}
                
				$adminAllow = array();
				$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
				foreach($result_setadmin->result() as $result_setadmin2){
			
					if($data->reason_request == $result_setadmin2->reason_type){
						
						array_push($adminAllow,$result_setadmin2->user_id);
					}		
				}
                
                $withdrawData = $this->Allowance_model->get_withdrawData($dataid, '', $data->user_create, 'type_travel', 'desc');
				$withdrawNum = $withdrawData->num_rows();	

				if($withdrawNum > 0){			

					foreach($withdrawData->result() as $withdrawData2){	

						if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

							$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

						} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){
                            $topic = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

						} else if($withdrawNum == 2){

							$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
						}
				} }
                
                if($approve_status == '0'){
                    
                    if(($data->check_doc == '1') && ($data->check_doc2 == '2') && ($data->approve_id2 == '0') && ($data->approve_status == '0')){
						$from_email    = $get_userDetail2->email; 
						$subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือขออนุมัติเดินทาง ที่ ".$sarabannum;
			        	$email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง '.$data->subject_document.' ที่ '.$sarabannum.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  ไม่อนุมัติ  เนื่องจาก '.$data->notapproved_approvers.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>'; 

                     $to_email = $data->email;                                
			         $this->load->library('email');
			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                     if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			         }
       }
           if(($data->check_doc == '1') && ($data->check_doc2 == '1') && ($data->approve_id2 != '0') && ($data->approve_status2 == '0') && ($data->approve_status == '1')){
                    
			   		$from_email    = $get_userDetail2->email; 
					$subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือ$topic ที่ ".$sarabannum2;
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง '.$topic.' ที่ '.$sarabannum2.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  ไม่อนุมัติ  เนื่องจาก '.$data->notapproved_approvers2.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>'; 
                     $to_email = $data->email;                                
			         $this->load->library('email');
			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                     if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			         } 
             }
      }else{
					
             if(($data->check_doc == '1') && ($data->check_doc2 == '2') && ($data->approve_id != '0') && ($data->approve_status == '1')){
				 
                    $from_email    = $get_userDetail2->email; 
                    $subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือขออนุมัติเดินทาง ที่ ".$sarabannum;
                    $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224" bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70" bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38" bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง '.$data->subject_document.' ที่ '.$sarabannum.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  อนุมัติ </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   

                     $to_email = $data->email;                                
			         $this->load->library('email');
			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   
				 if($this->email->send()){
							
					if(count($adminAllow) > 0){
						$from_email = $data->email;
						//$from_email = $get_userDetail2->email;
		
						for($x = 0; $x < count($adminAllow); $x++){		
       
        					$adminsaraban = $this->Allowance_model->get_adminDetail($adminAllow[$x],'tbl_admin_allowance');
                    		foreach($adminsaraban->result() AS $adminsaraban1){}
			             	//$from_email = $get_userDetail2->email; 
                            //$topic         = $data->subject_document;
                            //$subject = "พิจารณาอนุมัติ ".$topic." ที่ ".$sarabannum2;
                            $subject = "ตรวจสอบหนังสือ".$topic." ที่ ".$sarabannum2;							
                            $email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224" bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70" bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38" bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ&nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.' ฝ่ายการเงิน </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$data->name_surname.' ได้ทำหนังสือขออนุมัติเดินทาง เรื่อง '.$topic.' ที่ '.$sarabannum2.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  ได้รับการตรวจสอบข้อมูลและอนุมัติหนังสือขออนุมัติเดินทางเรียบร้อยแล้ว </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อตรวจสอบข้อมูลได้ที่ระบบจัดการข้อมูลสารบรรณ  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'<br>'.$data->position.'</p></td>
            </tr>
     <tr>      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   

                     $to_email = $adminsaraban1->email;                                
			         $this->load->library('email');
			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
    		} 
					if($this->email->send()){ 
                        $result = '2';
                    }else{
                        $result = '0';
                    }
		}                     
			}else{ 
			         $result = '0';
			}
     }
           if(($data->check_doc == '1') && ($data->check_doc2 == '1') && ($data->approve_id != '0') && ($data->approve_status2 == '1') && ($data->approve_status == '1')){
			   
                    $from_email    = $get_userDetail2->email; 
                    $subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือ".$topic." ที่ ".$sarabannum2;
                    $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224" bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70" bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38" bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง '.$topic.' ที่ '.$sarabannum2.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  อนุมัติ </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เมื่อท่านได้ปฎิบัติงานดังกล่าวเรียบร้อยแล้ว กรุณาเข้าสู่ระบบการเดินทาง และทำรายงานการเดินทาง เพื่อส่งรายละเอียดและหลักฐานค่าใช้จ่าย</p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   

                     $to_email = $data->email;                               
			         $this->load->library('email');
			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                     if($this->email->send()){
                          $result = '3';
                     }else{
                          $result = '0';
                     }
            }
        }
		echo $result;
	}        
    //--------------------
	public function send_mailapprovelocal(){
                $dataid = $this->input->post('id_allownace');
                $approve_status = $this->input->post('approve_status');
                $withdraw = $this->input->post('withdraw');
                 $n = ''; $in = '2'; 
                   $getdocuser = $this->Allowance_model->getdocuser2($dataid);  
                foreach($getdocuser->result() AS $data){}
                //$sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
                //$sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
                $approve_id = $data->approve_id;
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach($get_userDetail->result() AS $get_userDetail2){}
                $get_position = $this->Allowance_model->get_position($get_userDetail2->position_id);
                foreach($get_position->result() AS $get_position1){}
                
				$adminAllow = array();
				$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
				foreach($result_setadmin->result() as $result_setadmin2){
			
					if($data->reason_request == $result_setadmin2->reason_type){
						
						array_push($adminAllow,$result_setadmin2->user_id);
					}		
				}
                if($approve_status == '0'){
 
				$from_email    = $get_userDetail2->email; 
				$subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือขออนุมัติเดินทาง ที่ $data->saraban_number  ";
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติเดินทาง เรื่อง '.$data->subject_document.' ที่ '.$data->saraban_number.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  ไม่อนุมัติ  เนื่องจาก '.$data->notapproved_approvers.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>'; 

                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			          }
                }else{       
                 if($withdraw == '0'){
                     $txttr = '';
                 }else{
                     $txttr = '<tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เมื่อท่านได้ปฎิบัติงานดังกล่าวเรียบร้อยแล้ว กรุณาเข้าสู่ระบบการเดินทาง และทำรายงานการเดินทาง เพื่อส่งรายละเอียดและหลักฐานค่าใช้จ่าย</p></td>
            </tr>';
                 }
                     $from_email    = $get_userDetail2->email; 
                    $subject	   = "แจ้งผลพิจารณาอนุมัติหนังสือ$data->subject_document ที่ $data->saraban_number  ";
                      $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>  
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง '.$data->subject_document.' ที่ '.$data->saraban_number.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการพิจารณาของท่านคือ  อนุมัติ </p></td>
            </tr>
            '.$txttr.'
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.'<br>'.$get_position1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   

                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){
                                         $result = '3';
                                   }else{
                                        $result = '0';
                                   }
                 }
			echo $result;
	}
        
        
        //--------------------
	public function send_mail4step(){
                  $dataid = $this->input->post('idsaraban');
                  $n = ''; $in = '2'; $datethai='';
                $getdocuser = $this->Allowance_model->getdocuser($dataid);
                foreach($getdocuser->result() AS $data){}
                $sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
                $datethai = $this->Allowance_model->DateThai1($data->date_create);

				$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
				foreach($result_setadmin->result() as $result_setadmin2){
			
					if($data->reason_request == $result_setadmin2->reason_type){

          $withdrawData = $this->Allowance_model->get_withdrawData($dataid, '', $data->user_create, 'type_travel', 'desc');
						  $withdrawNum = $withdrawData->num_rows();	

						  if($withdrawNum > 0){			

							foreach($withdrawData->result() as $withdrawData2){	

								if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

								} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){
                                                                        $topic = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

								} else if($withdrawNum == 2){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
								}
						  } }
        $adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_allowance');
        //$adminsaraban = $this->Allowance_model->get_adminDetail($adminAllow[$x],'tbl_admin_allowance');
                    foreach ($adminsaraban->result() AS $adminsaraban1){}
			             $from_email    = $data->email; 
                                     //$topic         = $data->subject_document;
                                     $subject	    = "รายงานการเดินทาง ตามคำสั่ง/บันทึกที่ $sarabannum2 ลงวันที่ $datethai";
                                     $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ&nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.' ฝ่ายการเงิน </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>   
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->name_surname.' ได้ทำรายงานการเดินทาง ส่งรายละเอียดและหลักฐานค่าใช้จ่ายในระบบเรียบร้อยแล้ว  อ้างอิงหนังสือขออนุมัติเดินทาง  เรื่อง '.$topic.' ที่ '.$sarabannum2.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' 
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบจัดการข้อมูลสารบรรณ  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   

                                 $to_email   =  $adminsaraban1->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
    
                                   if($this->email->send()){ 
                                        $result = '2';
                                   }else{
                                        $result = '0';
                                   }
                                   }
                                   }
	echo 	$result;	        
        }
          	//--------------------
	public function send_maillocal(){
                  $dataid = $this->input->post('dataid');
                  $edit = $this->input->post('edit');
                  $withdraw = $this->input->post('withdraw');
                  $n = ''; $in = '2'; $result = 'x'; $sarabannum = '';
		//$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
		//$Nresult_setadmin = $result_setadmin->num_rows();
                  if($withdraw !=1){
                      $txt = 'ตรวจสอบหนังสือขออนุมัติเดินทาง';
                      $txt2 = 'ระบบสารบรรณ';
                  }else{
                      $txt = 'ตรวจสอบหนังสือขออนุมัติเบิกค่าใช้จ่ายในการเดินทาง';
                      $txt2 = 'ระบบการเดินทาง';
                  }
		
                   $getdocuser = $this->Allowance_model->getdocuser2($dataid);  
              
                foreach ($getdocuser->result() AS $data){}
                //if($data->withdraw =='0'){
                  $sarabannum = $data->saraban_number; 
               // }else{
               //   $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
               // }
                
                if($edit !=''){
                $edittxt = 'การแก้ไข';
                }else{
                 $edittxt = '';   
                }
                 
				$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
				foreach($result_setadmin->result() as $result_setadmin2){
			
					if($data->reason_request == $result_setadmin2->reason_type){
						
						
				
                
                
		
        $adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_allowance');
                   
        //$adminsaraban = $this->Allowance_model->get_adminDetail($adminAllow[$x],'tbl_admin_allowance');
                    foreach ($adminsaraban->result() AS $adminsaraban1){}
				$from_email    = $data->email; 
				$subject	   = $txt." ที่ ".$sarabannum;
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
            
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->name_surname.' ได้ทำ'.$edittxt.$txt.'  เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าตรวจสอบข้อมูลได้ที่'.$txt2.'  Link : '.base_url().'allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'<br>'.$data->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $adminsaraban1->email;
                                
			         //$this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 
                                  
                                   if($this->email->send()){ 
			            $result = '1local';
			         }else{ 
			            $result = '0';
			          }
                                }
                                }
                            
			         //Send mail 

			       

			echo $result;	
	}
             	//--------------------
	public function send_mailnowithdraw(){
		
        $dataid = $this->input->post('dataid');
        $edit = $this->input->post('edit');
        $n = ''; $in = '1'; $result = 'x'; $sarabannum = '';
		$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
		//$Nresult_setadmin = $result_setadmin->num_rows();
		foreach($result_setadmin->result() as $result_setadmin2){
			
			if(strpos($result_setadmin2->system_permissions, '2') !== false){
                $adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_saraban');
                foreach ($adminsaraban->result() AS $adminsaraban1){}
		
                $getdocuser = $this->Allowance_model->getdocuser2($dataid); 
              
                foreach ($getdocuser->result() AS $data){}
                if($data->withdraw =='0'){
                  $sarabannum = $data->saraban_number; 
                }else{
                  $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
                }
                
                if($edit !=''){
                	$edittxt = 'การแก้ไข';
                }else{
                 	$edittxt = '';   
                }
				$from_email    = $data->email; 
				$subject	   = "ตรวจสอบหนังสือขออนุมัติเดินทาง ที่ ".$sarabannum;
			       
			    $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
            
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->name_surname.' ได้ทำ'.$edittxt.'หนังสือขออนุมัติเดินทาง  เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบสารบรรณ  Link : '.base_url().'saraban</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'<br>'.$data->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  
     
			         //Load email library 
             
                     $to_email   =  $adminsaraban1->email;
                                
			         //$this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			          }
                                }else{
                                    $result = '0'; 
                                }
                                }
                            
			         //Send mail			       

			echo $result;	
	}
   	//--------------------
	public function send_mailfaillocal(){
                  $dataid = $this->input->post('dataid');
                  $userid = $this->input->post('userid');

                  $adminallow = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_allowance');
                  $sarabannum = '';  $sarabannum2 = ''; $topic = '';
                    foreach ($adminallow->result() AS $adminallow1){}
                    
                 
                   $getdocuser = $this->Allowance_model->getdocuser2($dataid);  
    
                foreach ($getdocuser->result() AS $data){}
               // if($data->withdraw =='0'){
                  $sarabannum = $data->saraban_number; 
               // }else{
//                  $sarabannum = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'0');
//                  $sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
//                }
                $approve_id = $data->approve_id;
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach ($get_userDetail->result() AS $get_userDetail2){}
                $get_positionallow = $this->Allowance_model->get_position($adminallow1->position_id);
                foreach ($get_positionallow->result() AS $get_positionallow1){}
                
                if($data->withdraw=='0'){
                    $notapp = $data->notapproved_saraban;
                }else{
                    $notapp = $data->notapproved_admin;
                }

				$from_email    = $adminallow1->email; 
				$subject	   = "แจ้งผลการตรวจสอบข้อมูลหนังสือ$data->subject_document ที่ $sarabannum  ";
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ ไม่ผ่าน เนื่องจาก '.$notapp.'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '2';
			         }else{ 
			            $result = '0';
			          }
                
			echo $result;
        }
		//--------------------
        public function send_mailpasslocal(){
                  $dataid = $this->input->post('dataid');
                  $userid = $this->input->post('userid');
                  
                  $approve_id = $this->input->post('sendto');
                  
                  $adminallow = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_allowance');
                  $sarabannum = '';  $sarabannum2 = ''; $topic = '';
                    foreach ($adminallow->result() AS $adminallow1){}
                 
                   $getdocuser = $this->Allowance_model->getdocuser2($dataid);  

                foreach ($getdocuser->result() AS $data){}
  
                  $sarabannum = $data->saraban_number; 
             
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach ($get_userDetail->result() AS $get_userDetail2){}

                $get_positionallow = $this->Allowance_model->get_position($adminallow1->position_id);
                foreach ($get_positionallow->result() AS $get_positionallow1){}
 
         
      
                     $from_email    = $adminallow1->email; 
                $subject	  = "แจ้งผลการตรวจสอบข้อมูลหนังสือ$data->subject_document ที่ $sarabannum  ";
		$email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ส่งหนังสือขออนุมัติ เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น  ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ ผ่าน  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่  074-286-810</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $data->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 

$from_email    = $adminallow1->email; 
$subject       = "พิจารณาอนุมัติหนังสือ$data->subject_document ที่ $sarabannum  ";
			       
			      
			        $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$get_userDetail2->firstname.' '.$get_userDetail2->lastname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->name_surname.' ได้ทำหนังสือขออนุมัติ  เรื่อง  '.$data->subject_document.'  ที่  '.$sarabannum.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  และได้รับการตรวจสอบข้อมูลจากผู้ปฏิบัติงานบริหารเรียบร้อยแล้ว  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อพิจารณาอนุมัติ/ไม่อนุมัติหนังสือขออนุมัติเดินทางดังกล่าว   โดยท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบการเดินทาง  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  

			      
			         //Load email library 
             
                                 $to_email   =  $get_userDetail2->email;
                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
                                   if($this->email->send()){ 
                                        $result = '2';
                                   }else{
                                        $result = '0';
                                   }
			         }else{ 
			            $result = '0';
			          }
              
                                   echo $result;
        }                	
        //--------------------
		public function send_mail4steplocal(){
			
                $dataid = $this->input->post('idsaraban');
                $ch4step = $this->input->post('ch4step');
                $n =''; $in ='2'; $datethai =''; $txtEdit =''; $txtEdit2 ='';
                $getdocuser = $this->Allowance_model->getdocuser2($dataid);
                foreach($getdocuser->result() AS $data){}                
               
                $datethai = $this->Allowance_model->DateThai1($data->date_create);
			
				if($ch4step == '0'){
					$txtEdit = '(แก้ไข) ';
					$txtEdit2 = 'การแก้ไข';
				}			

				$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
				foreach($result_setadmin->result() as $result_setadmin2){
			
				if($data->reason_request == $result_setadmin2->reason_type){

        			$adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_allowance');
        			//$adminsaraban = $this->Allowance_model->get_adminDetail($adminAllow[$x],'tbl_admin_allowance');
                    foreach($adminsaraban->result() AS $adminsaraban1){}
			        $from_email = $data->email; 
                    //$topic         = $data->subject_document;
                    $subject = $txtEdit."รายงานการเดินทาง ตามคำสั่ง/บันทึกที่ $data->saraban_number ลงวันที่ $datethai";
                    $email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ&nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.' ฝ่ายการเงิน </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>   
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$data->name_surname.' ได้ทำ'.$txtEdit2.'รายงานการเดินทาง ส่งรายละเอียดและหลักฐานค่าใช้จ่ายในระบบเรียบร้อยแล้ว  อ้างอิงหนังสือขออนุมัติเดินทาง  เรื่อง '.$data->subject_document.' ที่ '.$data->saraban_number.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' 
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบจัดการข้อมูลสารบรรณ  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';   

                     $to_email   =  $adminsaraban1->email;                                
			         $this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
    
                     if($this->email->send()){ 
                         $result = '2';
                     }else{
                         $result = '0';
                     }
              }
        }
		echo $result;	        
    }
    //--------------------
	public function send_mailallow(){
		
        $dataid = $this->input->post('dataid');
        $edit = $this->input->post('edit');
        $n = ''; $in = '2'; $result = 'x'; $sarabannum = '';
		$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
		//$Nresult_setadmin = $result_setadmin->num_rows();
                $getdocuser = $this->Allowance_model->getdocuser($dataid);  
              
                foreach ($getdocuser->result() AS $data){}
		foreach($result_setadmin->result() as $result_setadmin2){
                    if($data->reason_request == $result_setadmin2->reason_type){
                $adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_allowance');
                foreach ($adminsaraban->result() AS $adminsaraban1){}
		
                
                if($data->withdraw =='0'){
                  $sarabannum2 = $data->saraban_number; 
                }else{
                  $sarabannum2 = $this->Saraban_model->explode_sarabanNumber($data->saraban_number,'1');
                }
                
                if($edit !=''){
                	$edittxt = 'การแก้ไข';
                }else{
                 	$edittxt = '';   
                }
                $withdrawData = $this->Allowance_model->get_withdrawData($dataid, '', $data->user_create, 'type_travel', 'desc');
						  $withdrawNum = $withdrawData->num_rows();	

						  if($withdrawNum > 0){			

							foreach($withdrawData->result() as $withdrawData2){	

								if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';

								} else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){
                                                                        $topic = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';

								} else if($withdrawNum == 2){

									$topic = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
								}
						  } }
				$from_email    = $data->email; 
				$subject	   = "ตรวจสอบหนังสือขออนุมัติเดินทาง ที่ ".$sarabannum2;
			       
			    $email_body    = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน คุณ &nbsp; '.$adminsaraban1->firstname.' '.$adminsaraban1->lastname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
            
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$data->name_surname.' ได้ทำ'.$edittxt.'หนังสือขออนุมัติเดินทาง  เรื่อง  '.$topic.'  ที่  '.$sarabannum2.'  ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).'  </p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ท่านสามารถเข้าตรวจสอบข้อมูลได้ที่ระบบสารบรรณ  Link : '.base_url().'Allowance</p></td>
            </tr>
            <tr>
              <td  align="center"><p>ขอแสดงความนับถือ<br>'.$data->name_surname.'<br>'.$data->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';  
     
			         //Load email library 
             
                     $to_email   =  $adminsaraban1->email;
                                
			         //$this->load->library('email'); 

			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body); 	
                                   if($this->email->send()){ 
			            $result = '1';
			         }else{ 
			            $result = '0';
			          }
                                }
                                }
                            
			         //Send mail			       

			echo $result;	
	}
	//--------------------
	
	public function send_mailpass_report(){
		
		$doc_id = $this->input->post('doc_id');
        $type_travel = $this->input->post('type_travel');
        $process = $this->input->post('process');
		$adminID = $this->session->userdata['logged_in']['id'];
		
		//$getdocuser = $this->Allowance_model->getdocuser2($doc_id); /// get local
        //foreach($getdocuser->result() AS $data){}
		
		$datethai =''; $sarabannum ='';
		if($type_travel == '1'){
			$getdocuser = $this->Allowance_model->getdocuser2($doc_id);
			
		} else if($type_travel == '2'){
			$getdocuser = $this->Allowance_model->getdocuser($doc_id);
		}
		//$getdocuser = $this->Allowance_model->getdocuser2($doc_id); /// get local
        foreach($getdocuser->result() AS $data){}
		
		$adminallow = $this->Allowance_model->get_adminDetail($adminID,'tbl_admin_allowance');
        foreach($adminallow->result() AS $adminallow1){}
		
		$get_positionallow = $this->Allowance_model->get_position($adminallow1->position_id);
        foreach ($get_positionallow->result() AS $get_positionallow1){}
		
		$datethai = $this->Allowance_model->DateThai1($data->date_create);
		
		$sarabannum = $data->saraban_number;      
		
		if($process != 'pass'){
            $txt_pass = 'ไม่ผ่าน เนื่องจาก '.$data->remark_4step;
			
        }else{
			
            $txt_pass = 'ผ่าน'; 
        }
		
		
		
		/////////////////////////////
             /*     $dataid = $this->input->post('dataid');
                  $userid = $this->input->post('userid');
                  
                  $approve_id = $this->input->post('sendto');
                  
                  $adminallow = $this->Allowance_model->get_adminDetail($userid,'tbl_admin_allowance');
                  $sarabannum = '';  $sarabannum2 = ''; $topic = '';
                    foreach ($adminallow->result() AS $adminallow1){}
                 
                   $getdocuser = $this->Allowance_model->getdocuser2($dataid);  

                foreach ($getdocuser->result() AS $data){}
  
                  $sarabannum = $data->saraban_number; 
             
                $get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
                foreach ($get_userDetail->result() AS $get_userDetail2){}

                $get_positionallow = $this->Allowance_model->get_position($adminallow1->position_id);
                foreach ($get_positionallow->result() AS $get_positionallow1){}
		
		
		////////////////////////////////////////////
		
		$dataid = $this->input->post('idsaraban');
                  $n = ''; $in = '2'; $datethai='';
                $getdocuser = $this->Allowance_model->getdocuser2($dataid);
                foreach($getdocuser->result() AS $data){}
                
               
                $datethai = $this->Allowance_model->DateThai1($data->date_create);

				$result_setadmin = $this->Allowance_model->get_setadminDocument($n,$in);
				foreach($result_setadmin->result() as $result_setadmin2){
			
					if($data->reason_request == $result_setadmin2->reason_type){


        $adminsaraban = $this->Allowance_model->get_adminDetail($result_setadmin2->user_id,'tbl_admin_allowance');
        //$adminsaraban = $this->Allowance_model->get_adminDetail($adminAllow[$x],'tbl_admin_allowance');
                    foreach ($adminsaraban->result() AS $adminsaraban1){}
			             $from_email    = $data->email; 
                                     //$topic         = $data->subject_document;
                                     $subject	    = "รายงานการเดินทาง ตามคำสั่ง/บันทึกที่ $data->saraban_number ลงวันที่ $datethai";
		*/
 //////////////////////////////
         
      
                $from_email = $adminallow1->email; 
                //$subject	  = "แจ้งผลการตรวจสอบข้อมูลหนังสือ$data->subject_document ที่ $sarabannum  "
				$subject = "แจ้งผลการตรวจสอบข้อมูลรายงานการเดินทาง ตามคำสั่ง/บันทึกที่ $sarabannum ลงวันที่ $datethai";	
				$email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="772" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" bgcolor="#26ab93">&nbsp;</td>
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url().'assets_saraban/img/logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน &nbsp; '.$data->name_surname.' </td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>			
              <td><p style = "text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ตามที่ท่านได้ทำรายงานการเดินทาง ส่งรายละเอียดและหลักฐานค่าใช้จ่ายในระบบเรียบร้อยแล้ว อ้างอิงหนังสือขออนุมัติเดินทาง เรื่อง '.$data->subject_document.' ที่  '.$sarabannum.' ลงวันทึ่ '.$this->Allowance_model->DateThai($data->date_create).' นั้น ขอเรียนแจ้งผลการตรวจสอบข้อมูลของท่านคือ '.$txt_pass.'</p></td>
            </tr>
            <tr>
              <td bgcolor=""><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หากต้องการสอบถามเพิ่มเติม ติดต่อได้ที่ 074-286-810</p></td>
            </tr>
            <tr>
              <td align="center"><p>ขอแสดงความนับถือ<br>'.$adminallow1->firstname.' '.$adminallow1->lastname.'<br>'.$get_positionallow1->position.'</p></td>
            </tr>
    <tr>
      
      <td height="100" colspan="2" align="center" bgcolor="#f0f0f0" style="font-size: 9pt; color: #666666; line-height: 20px;"><h3><br>
        Faculty of Environmental Management Prince of Songkla University</h3>        
            <p>P.O.Box 50 Kor-Hong, Hatyai, Songkhla 90112 Thailand<br>
      Tel. +66-7428-6810 , +66-74-28-6899   Fax. +66-7442-9758  </p></td>
      <td height="100" align="left" valign="top" bgcolor="#f0f0f0">&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';
			      
			         //Load email library 
             
                     $to_email = $data->email;                                
			         $this->load->library('email');
			         $this->email->from($from_email, 'ระบบการเดินทาง'); 
			         $this->email->to($to_email);
			         $this->email->subject($subject); 
			         $this->email->message($email_body);
						
                     if($this->email->send()){              
                        echo '1';
        			
					 } else {
						echo '0';
					 } 
	} 
	
	
	
	
	
}
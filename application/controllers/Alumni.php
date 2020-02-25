<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

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
          $this->load->model('alumni_model');
		  $this->load->model('contactus_model');
          $this->load->model('curriculum_model');
          $this->load->model('staff_model');
          $this->load->model('user_model');
		 
		  /*if($this->session->userdata('user_id')){     
		 	}else{
    		 	redirect(base_url().'login', 'refresh');
		 	}*/
		 if($this->session->userdata('weblang')==''){
			 $this->session->set_userdata('weblang', 'en');
		 }
		 
    }
	//--------------------
	public function index($dataID=NULL)
	{
		$data['alumni'] = $dataID;
		//$this->load->view('header');
		//$this->load->view('index_body');
		//$this->load->view('footer');
		$this->load->view('fontend/register' , $data);
		$this->load->view('backend/alumni_script');
	}
	//------------------- 
	public function AlumniRegister(){
		
		//echo $_POST['g-recaptcha-response'];
		
		if($_POST['g-recaptcha-response'] !=''){
		
			$private_key = '6Le_jW0UAAAAAAss-SEndLdcpsTw5mSdVPWVkgLr';
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$response_key = $_POST['g-recaptcha-response'];
			$response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
			$response = json_decode($response);
			
			if($response->success ==1){
				//echo 'success';
				$name = $this->input->post('name');
				$old_name = $this->input->post('old_name');
				$studentID_number = $this->input->post('ID_card');
				$email = $this->input->post('email');
				$telephone = $this->input->post('telephone');
				$password = $this->input->post('password');

				$Result = $this->alumni_model->addAlumni($name ,$old_name ,$studentID_number ,$email ,$telephone ,$password);
				echo $Result;
				
				if($Result >0){    ?>

					<script>
						var lang = '<?php echo $this->session->userdata('weblang')?>';
						
						if(lang == 'en'){
							var txt = 'Thank you, Register Successful.';
						} else{
							var txt = 'สมัครสมาชิกศิษย์เก่าเรียบร้อยแล้ว';
						}			
						alert(txt);
						window.location.href = "<?php echo base_url('Alumni/Detail/').$Result?>";		
					</script>

					
	<?php		}
				
				//$data['chceckRegis'] = '1';
		
				//$this->load->view('fontend/register' , $data);
				//$this->load->view('backend/alumni_script');
				
				
			} /*else {
				echo 'no';
			}*/
		}
		
		/*$name = $this->input->post('name');
		$old_name = $this->input->post('old_name');
		$studentID_number = $this->input->post('ID_card');
		$email = $this->input->post('email');
		$telephone = $this->input->post('telephone');
		$password = $this->input->post('password');
		
		$Result = $this->alumni_model->addAlumni($name ,$old_name ,$studentID_number ,$email ,$telephone ,$password);
		echo $Result;*/
		
		
		
		
	}
	//-------------------- 
	public function Detail($dataID=NULL){
		$data['alumni'] = $this->alumni_model->get_alumniDetail($dataID);	
		$this->load->view('fontend/alumni_detail' , $data);
		$this->load->view('backend/alumni_script');	
	} 
	//-------------------
	public function AlumniLogin(){
		
//		if($_POST['g-recaptcha-response'] !=''){
//		
//			$private_key = '6Le_jW0UAAAAAAss-SEndLdcpsTw5mSdVPWVkgLr';
//			$url = 'https://www.google.com/recaptcha/api/siteverify';
//			$response_key = $_POST['g-recaptcha-response'];
//			$response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
//			$response = json_decode($response);
			
//			if($response->success ==1){  
				//echo 'success';
				$email = $this->input->post('email3');
				$password = $this->input->post('password3');		
				$Result = $this->alumni_model->do_alumniLogin($email , $password);
				//echo $Result;
				
				if($Result !='0'){    ?>

					<script>						
						window.location.href = "<?php echo base_url('Alumni/Detail/').$Result?>";		
					</script>	

					
	<?php		}  else {  ?>

					<script>
						var lang = '<?php echo $this->session->userdata('weblang')?>';
						
						if(lang == 'en'){
							var txt = 'E-mail or Password Incorrect !';
						} else{
							var txt = 'อีเมล์หรือรหัสผ่านไม่ถูกต้อง';
						}			
						alert(txt);
						window.location.href = "<?php echo base_url('Alumni')?>";		
					</script>
					
	<?php		}
				
				//$data['chceckRegis'] = '1';
		
				//$this->load->view('fontend/register' , $data);
				//$this->load->view('backend/alumni_script');
				
				
			//} 
                        /*else {
				echo 'no';
			}*/
		//}
		
		
		
		/*$email = $this->input->post('email');
		$password = $this->input->post('password');		
		$result = $this->alumni_model->do_alumniLogin($email , $password);
		echo $result;*/
	} 
	//-------------------
	public function edit_alumniData(){
		$txt = $this->input->post('val2');
		$dataID = $this->input->post('dataID');		
		$field = $this->input->post('field');		
		$result = $this->alumni_model->do_editAlumniData($txt , $dataID , $field);
		echo $result;
	}   	
	//-------------------
	public function searchAlumni(){
		$txt_search = $this->input->post('txt_search');			
		$alumni = $this->alumni_model->do_searchAlumni($txt_search);
		//$countRows = $alumni->num_rows();
		//if($countRows > 0) {
		//echo $result;
		if($alumni == '0'){  
$result2 = 0;
			echo $result2;

		} else { ?>
			
			<div class="container">
						<div class="row">
							<!-- product-_-overview -->
							<div class="col-xs-12 col-sm-12">
								<div class="product-_-overview">
									
									<table class="shop_attributes">
												<tbody>												
												<?php foreach($alumni->result() as $alumni2){ ?>	
													<tr>													
														<td><span><?php echo $alumni2->name?></span></td>
													</tr>	
												<?php } ?>	
													
												</tbody>												
											</table>									
									
								</div>
							</div>
						</div>  <!-- // row -->
					</div>
			
<?php			
		}
	} 	
	//-------------------
	public function Logout(){
				
		$result = $this->alumni_model->do_logout();
		//echo $result;
		if($result =='0'){
			 //redirect('Alumni', 'refresh');
			 redirect(base_url('Alumni'));
		}
	}
	
	//-------------------
	public function alumniCheckmail(){
		
		if($_POST['g-recaptcha-response'] !=''){
		
			$private_key = '6Le_jW0UAAAAAAss-SEndLdcpsTw5mSdVPWVkgLr';
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$response_key = $_POST['g-recaptcha-response'];
			$response = file_get_contents($url.'?secret='.$private_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);
			$response = json_decode($response);
			
			if($response->success ==1){  
				//echo 'success';
				$email = $this->input->post('email_forgot');					
				$Result = $this->alumni_model->do_checkEmail($email);
				//echo $Result;
				
				if($Result !=0){    ?>
					<script>	
						/*var lang = '<?php //echo $this->session->userdata('weblang')?>';
						
						if(lang == 'en'){
							var txt = 'A link to reset your password has been successfully sent to your email.';
						} else{
							var txt = 'ลิงก์ URL การรีเซ็ตรหัสผ่านของคุณได้ถูกส่งไปยังอีเมล์เรียบร้อยแล้ว';
						}			
						alert(txt);*/
						window.location.href = "<?php echo base_url('Alumni/sendMail_alumni/').$Result?>";		
					</script>	

					
	<?php		}  else {  ?>

					<script>
						var lang = '<?php echo $this->session->userdata('weblang')?>';
						
						if(lang == 'en'){
							var txt = 'This email is invalid or not available in the system.';
						} else{
							var txt = 'อีเมล์นี้ไม่ถูกต้องหรือไม่มีในระบบ !';
						}			
						alert(txt);
						window.location.href = "<?php echo base_url('Alumni')?>";		
					</script>
					
	<?php		}
				
				//$data['chceckRegis'] = '1';
		
				//$this->load->view('fontend/register' , $data);
				//$this->load->view('backend/alumni_script');
				
				
			} /*else {
				echo 'no';
			}*/
		}
		
		
		
		/*$email = $this->input->post('email');
		$password = $this->input->post('password');		
		$result = $this->alumni_model->do_alumniLogin($email , $password);
		echo $result;*/
	} 
	
	////////////////////////
	public function sendMail_alumni(){ 	
		
		$userID = $this->uri->segment(3);
				
		//$mail = $this->input->post('mail');		
		//$userID = $this->input->post('userID');	
		$user = $this->alumni_model->get_alumniDetail($userID);
		foreach($user->result() as $user2){ }	
		
		$from_email = 'envi.psu.mailsender@gmail.com';
		$to_email = $user2->email;
		//$user_name = $user2->user_name;
		$name_sname = $user2->name;
		$key_value1 = $this->user_model->generateRandomString();	
		$key_value3 = $this->user_model->generateRandomString();	
		$date1 = date("d");
		$key_value2 = $key_value1.$userID.'#'.$date1.$key_value3;
			
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
      <td width="224"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;"><img src="'.base_url("assets_saraban/img/").'logo-white-header.png" width="500" height="95" alt=""/></td>
      <td width="1063" height="70"  bgcolor="#26ab93" style="color:#FFFFFF; font-size: 16pt;">&nbsp;</td>
      <td width="38"  bgcolor="#26ab93">&nbsp;</td>
    </tr>
    <tr>
      <td width="43" height="67">&nbsp;</td>
      <td height="67" colspan="2" align="left" valign="bottom" style="font-size: 16pt; color: #666666; font-weight: 400;">เรียน&nbsp; '.$name_sname.'</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="223" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; . </td>
      <td height="223" colspan="2" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="88%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td height="40" colspan="3" align="center" bgcolor="#E7E5E5"><strong>RESET PASSWORD</strong></td>
            </tr>
            <tr>
              <td height="40" width="30%" align="right"><strong>E-mail :</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.$to_email.'</td>
            </tr>
            
            <tr>
              <td height="40" align="right"><strong>Reset password page :</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.base_url().'Alumni/resetPassword/'.$key_value2.'</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
	<tr>
      <td height="108" align="left">&nbsp;</td>
      <td height="108" colspan="2" align="center" valign="top"><a href="'.base_url().'Alumni/resetPassword/'.$key_value2.'" target="_blank" class="book">Click Here!</a> </td>
      <td height="108" align="left" valign="top">&nbsp;</td>
    </tr>
    
    <tr>
      <td height="100" align="left" bgcolor="#f0f0f0">&nbsp;</td>
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
		 
		
		$this->email->from($from_email, 'ENVI FEM'); 
        $this->email->to($to_email);
        $this->email->subject("Alumni reset password [".base_url()."]"); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
		   $result2 = $this->alumni_model->update_keyValue($key_value2,$userID);			
			
           $result = 1;

        }else{ 
           $result = 0;
        }		
		
		//echo $result;
		if($result == 1){ ?>
<script>
			var lang = '<?php echo $this->session->userdata('weblang')?>';
						
						if(lang == 'en'){
							var txt = 'A link to reset your password has been successfully sent to your email.';
						} else{
							var txt = 'ลิงก์ URL การรีเซ็ตรหัสผ่านของคุณได้ถูกส่งไปยังอีเมล์เรียบร้อยแล้ว';
						}			
						alert(txt);
						window.location.href = "<?php echo base_url('Alumni')?>";
	</script>
<?php		}
			
	}	 
		
	/////////////////////////////////////	
	public function resetPassword(){
		
		$txt = $this->uri->segment(3);
		$data['txt'] = $txt;
		
		$this->load->view('fontend/resetPassword' , $data);
		$this->load->view('backend/alumni_script');
	}
		
	////////////////////////
	public function save_newPass(){ 		
		
		$password = $this->input->post('Password');		
		$dataID = $this->input->post('myId');		
		$result = $this->alumni_model->update_newPass($password,$dataID);
		echo $result;
			
	}
	
	////////////////////////
	public function countMail(){ 		
		
		$mail = $this->input->post('mail');				
		$result = $this->alumni_model->count_email($mail);
		echo $result;
			
	}		
	
}
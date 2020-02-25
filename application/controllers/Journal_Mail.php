<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Journal_Mail extends CI_Controller {

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
          $this->load->model('journal_model');
          $this->load->model('user_model');
          $this->load->model('journal_model_2');
		 //$this->load->library('encrypt');
          //$this->load->model('news_model');
		 
		  /*if($this->session->userdata('user_id')){     
		 	}else{
    		 	redirect(base_url().'login', 'refresh');
		 	}*/
		  /*if($this->session->userdata('user_id')==''){
				redirect(base_url('CMS_Journal'));		
		  }*/		 
    }
	//--------------------
	public function index(){		
				
	}
	//-------------------
	public function sendMailEditor(){
		
		//$message = $this->input->post('message');				
		$editor_id = $this->input->post('editor_id');				
		$paper_id = $this->input->post('paper_id');		
		$paper_no = $this->input->post('paper_no');		
		$author_id = $this->input->post('author_id');	
		$result2 = 'x'; $other_file3 =''; $key =''; $txtRound =''; $other_file ='';
		//$today3 = date("j F Y");  
		$today3 = date('j F Y', strtotime("+10 day"));
		
		$editor_data = $this->journal_model->get_nameEditor($editor_id);
		foreach($editor_data->result() as $editor_data2){ }	
		if($editor_data2->password_temp !=''){			
			$key = '/'.base64_encode($editor_data2->password_temp);			
		}
		
		$author_data = $this->journal_model->get_author2($author_id);
		foreach($author_data->result() as $author_data2){ }	
		
		$paper = $this->journal_model->listPaper($author_id,$paper_no);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add);		
		$round = $this->journal_model->get_roundNumber($paper2->id);
		//$round = '0';		
		
		$paperFile = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($paperFile->result() as $paperFile2){ }	
        if($round >0){
			$txtRound = '.R'.$round;
            $paper2->remarks = $paperFile2->remarks;
		}
		
		$admin = $this->session->userdata('juser_id');  $status = '1';
		$update_data = $this->journal_model->change_statusPaper($status,$admin,$paper_id,$paper_no);		
			
		$OtherFile = $this->journal_model->get_otherFiles($paperFile2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }				
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++; }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}		
		$from_email = 'jemes.envi@gmail.com';
		$to_email = $editor_data2->email;
		$subject = "Manuscript ID ".$paper_no.$txtRound." now in your Editor Center";
			
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title></title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Manuscript ID '.$paper_no.$txtRound.' now in your Editor Center</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">  
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper_no.$txtRound.'/1/'.$editor_id.$key.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>	  
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$editor_data2->name_sname.',</td>
            </tr>
            <tr>
              <td colspan="3"><br>Manuscript ID '.$paper_no.$txtRound.' entitled &ldquo;'.$paper2->title.'&rdquo; with '.$author_data2->salutation.' '.$author_data2->first_name.' '.$author_data2->last_name.' as contact author has been assigned to you and is currently sitting in your Editor Center at '.base_url('CMS_Journal').'.<br><br>Kindly select reviewers for this manuscript by '.$today3.'.<br>Please select at least 3 reviewers who are NOT in the same affiliation as Submitting Author. To add new reviewers, you can go to &ldquo;'.base_url('CMS_Journal').'&rdquo;<br>If, for any reason, you are unable to serve as Editor for this manuscript, please notify me immediately so that I can reassign it.<br><br>When assigning reviewers, be sure to check if the author has any suggested/non-preferred reviewers.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
			  <td width="14%" height="28" colspan="3" bgcolor="#F3F3F3"><strong><font color="#48b3ba">&nbsp; Author Profile:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right" width="14%"><strong>Name:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" width="85%">'.$author_data2->salutation.' '.$author_data2->first_name.' '.$author_data2->last_name.'</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$author_data2->email.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>              
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3 .'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>';
			
	if($editor_data2->password_temp !=''){
		
			$email_body = $email_body.'<tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; User & Password For Login:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$editor_data2->email.'</td>
            </tr>
			<tr>
              <td height="28" align="right"><strong>Password:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$editor_data2->password_temp.'</td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>';
	}	
						            
        $email_body = $email_body.'</tbody>
        </table>
        <p>&nbsp;</p>
		       	
		  <a href="'.base_url().'CMS_Journal" target="_blank" style="text-align: center;"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer; text-align: center;">More Details</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td height="60" bgcolor="#EFEFEF" align="center" valign="bottom"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';	 
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 

        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $editor_id, $to_email, $paper_no.$txtRound, $paper_id, '1', $editor_data2->name_sname);			
			
           $result = $result2;

        }else{ 
           $result = 0;
        }			
		echo $result;		
	}
	//-------------------
	public function sendMailReviewer(){
		
		//$message = $this->input->post('message');				
		//$editor_id = $this->input->post('editor_id');				
		$paper_id = $this->input->post('paper_id');		
		$paper_no = $this->input->post('paper_no');		
		$author_id = $this->input->post('author_id');	
		//$date_start = $this->input->post('date_start');	
		$date_start = date("j F Y");	
		$date_end = date('j F Y', strtotime("+30 day"));	
		//$date_end = $this->input->post('date_end');	
		$result2 = 'x'; $txtRound =''; $other_file3 =''; $other_file ='';	
		
		$author_data = $this->journal_model->get_author2($author_id);
		foreach($author_data->result() as $author_data2){ }	
		
		$paper = $this->journal_model->listPaper($author_id,$paper_no);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add); 			
		$round = $this->journal_model->get_roundNumber($paper2->id);
		//$round = '0';
		$paperFile = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($paperFile->result() as $paperFile2){ }	
		
		if($round >0){
			$txtRound = '.R'.$round;
			$paper2->remarks = $paperFile2->remarks;
		}		
		//$admin = $this->session->userdata('juser_id');  $status = '1';
		//$update_data = $this->journal_model->change_statusPaper($status,$admin,$paper_id,$paper_no);	
		$OtherFile = $this->journal_model->get_otherFiles($paperFile2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }				
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++;  }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}	
		
		$from_email = 'jemes.envi@gmail.com';
		//$to_email = $editor_data2->email;
		$subject = "Invitation to Review for the Journal of Environmental Management and Energy System";
			
		$reviewer = $this->journal_model->get_reviewerList3($paper_id,$round,'0');
		foreach($reviewer->result() as $reviewer2){
			
		$txt = 'agree/'.$paper_id.'/'.$reviewer2->reviewer_id.'/'.$paper_no;	
		$txt2 = 'notagree/'.$paper_id.'/'.$reviewer2->reviewer_id.'/'.$paper_no;
					
		$editor_data = $this->journal_model->get_nameEditor($reviewer2->reviewer_id);
		foreach($editor_data->result() as $editor_data2){ }		
		
		$to_email = $editor_data2->email;
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title></title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor set reviewer</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$editor_data2->name_sname.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID '.$paper_no.$txtRound.' entitled “'.$paper2->title.'” with '.$author_data2->salutation.' '.$author_data2->first_name.' '.$author_data2->last_name.' as contact author has been submitted to the Journal of Environmental Management and Energy System (JEMES).<br><br>Journal of Environmental Management and Energy System is a scientific and technological journal published by Faculty of Environmental Management, Prince of Songkla University (PSU). We have published a wide variety of articles and features from researchers and scientists at PSU and also other institutions. All articles must be reviewed by expert reviewers in each field before publishing.<br><br>We, the editorial board of Journal of Environmental Management and Energy System would like to invite you to review the manuscript as an expert in this field.<br><br>Please let me know as soon as possible if you will be able to accept my invitation to review. If you are unable to review at this time, I would appreciate you recommending another expert reviewer. You may e-mail me with your reply or click the appropriate link at the bottom of the page to automatically register your reply with our online manuscript submission and review system.<br><br>I realize that our expert reviewers greatly contribute to the high standards of the Journal, and I thank you for your present and/or future participation.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="14%" height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Author Profile:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right" width="14%"><strong>Name:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" width="85%">'.$author_data2->salutation.' '.$author_data2->first_name.' '.$author_data2->last_name.'</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$author_data2->email.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>              
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>			
			</tbody>
        </table>       	
		  
		  <a href="'.base_url().'CMS_Journal/action_from_mail/'.$txt.'"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 125px; height: 60px; font-size: 16pt; font-weight: 600; color: #ffffff; border:0px; cursor: pointer;">Agree</button></a>&nbsp;&nbsp;&nbsp;
		  
		  <a href="'.base_url().'CMS_Journal/action_from_mail/'.$txt2.'"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #999; width: 175px; height: 60px; font-size: 16pt; font-weight: 600; color: #ffffff; border:0px; cursor: pointer;">Not Agree</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#EFEFEF" height="60" align="center" valign="bottom"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 		
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
		//$this->email->send();  
		if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $reviewer2->reviewer_id, $to_email, $paper_no.$txtRound, $paper_id, '2', $editor_data2->name_sname);	
			
		   $result3 = $this->journal_model->update_sendmailReviewer($reviewer2->id, $reviewer2->reviewer_id, $paper_id);			
          // $result = $result2;
        }			
	} 	
		
		$result4 = $this->journal_model->editorUpdateStatus('5', $paper_id, '0', '1', $paper_no, $paperFile2->id, 0, $round);
		
		$result=1;
		
        /*if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $editor_id, $to_email, $paper_no, $paper_id);			
			
           $result = $result2;

        }else{ 
           $result = 0;
        }	*/		
		echo $result;		
	}		
	//-------------------
	public function sendMail_afterReviewerAction(){		
		
		$name = $this->input->post('name');				
		$email = $this->input->post('email');				
		$reviewer_id = $this->input->post('reviewer_id');				
		$paper_id = $this->input->post('paper_id');		
		$paper_no = $this->input->post('paper_no');		
		$round = $this->input->post('round');	
		$title = $this->input->post('title');				
		$date_end = $this->input->post('date_end');	
		$result2 = 'x'; $txtRound =''; $x =''; $other_file3 =''; $other_file =''; $key ='';
		
		$date_start = date("j F Y");
		
		$paper = $this->journal_model->listPaper($x,$paper_no);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add); 			
		//$round = $this->journal_model->get_roundNumber($paper2->id);
		//$round = '0';
		$paperFile = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($paperFile->result() as $paperFile2){ }	
		
		$OtherFile = $this->journal_model->get_otherFiles($paperFile2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }	
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++;  }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}
		
		$author_data = $this->journal_model->get_author2($paper2->author_id);
		foreach($author_data->result() as $author_data2){ }	
		
		if($round >0){
			$txtRound = '.R'.$round;
			$paper2->remarks = $paperFile2->remarks;
		}		
		$editor_data = $this->journal_model->get_nameEditor($reviewer_id);
		foreach($editor_data->result() as $editor_data2){ }	
		if($editor_data2->password_temp !=''){			
			$key = '/'.base64_encode($editor_data2->password_temp);			
		}
		
		$from_email = 'jemes.envi@gmail.com';
		$subject = "Manuscript ID ".$paper_no.$txtRound." now in your Reviewer";		
		$to_email = $email;
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title></title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor set reviewer</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper_no.$txtRound.'/3/'.$reviewer_id.$key.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Thank you for agreeing to review Manuscript ID '.$paper_no.$txtRound.' entitled “'.$title.'” for Journal of Environmental Management and Energy System. Please try your best to complete your review by '.$date_end.'<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td width="14%" height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Author Profile:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right" width="14%"><strong>Name:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" width="85%">'.$author_data2->salutation.' '.$author_data2->first_name.' '.$author_data2->last_name.'</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$author_data2->email.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>              
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
			<tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment Period:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right" ><strong>Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$date_start.' - '.$date_end.'</td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>';			
			
			if($editor_data2->password_temp !=''){				
		
			$email_body = $email_body.'<tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; User & Password For Login:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$email.'</td>
            </tr>
			<tr>
              <td height="28" align="right"><strong>Password:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$editor_data2->password_temp.'</td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>';
	}		
			
    $email_body = $email_body.'</tbody>
        </table>
        <p>&nbsp;</p>
		        	
		  <a href="'.base_url().'CMS_Journal" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i></button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#EFEFEF" height="60" align="center" valign="bottom"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 		
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
         
		if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $reviewer_id, $to_email, $paper_no.$txtRound, $paper_id, '3', $name);	         
        }		
		 		
		$result=1;       	
		echo $result;		
	}		
	//-------------------
	public function reviewer_to_editor(){
		
		$commentID = $this->input->post('dataID');
		$comment = $this->journal_model->get_comment2($commentID);
		foreach($comment->result() as $comment2){} 
		
		$commentFile = $this->journal_model->get_commentFile($comment2->reID);
		$commentNum2 = $commentFile->num_rows();  $txt ='';
		if($commentNum2 >0){  $n=1;
			foreach($commentFile->result() as $commentFile2){
				
				if($commentNum2 > $n){
					$txt2 ='<br>';
				} else { $txt2 =''; }

				$txt = $txt.$n.'. <a href="'.base_url().'uploadfile/'.$commentFile2->file_name.'" target="_blank">'.$commentFile2->file_name.'</a>'.$txt2;
				
			$n++; }  						  
		}
		
		$DateTimeArray = explode(" ",$comment2->review_date);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		$review_date = $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year."&nbsp;&nbsp;".$DateTimeArray[1];
		
		$x=''; $other_file3 =''; $other_file ='';
		$paper = $this->journal_model->listPaper($x,$comment2->paper_no);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add); 
		$round = $this->journal_model->get_roundNumber($paper2->id);	
		//$round = '0';	
		$paperFile = $this->journal_model->get_paperFile($paper2->id,$round);
		foreach($paperFile->result() as $paperFile2){ }	
		
		$editor_data = $this->journal_model->get_nameEditor($paper2->editor_id);
		foreach($editor_data->result() as $editor_data2){ }	
		$to_email = $editor_data2->email;	
		
		$editor_data3 = $this->journal_model->get_nameEditor($comment2->reviewer_id);
		foreach($editor_data3->result() as $editor_data4){ }
		
		$author_data = $this->journal_model->get_author2($paper2->author_id);
		foreach($author_data->result() as $author_data2){ }
		
		$OtherFile = $this->journal_model->get_otherFiles($paperFile2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }	
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++;  }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}
		
		if($round >0){
			$txtRound = 'Round'.$round;
			$txtRound2 = '.R'.$round;
			$paper2->remarks = $paperFile2->remarks;
		
		} else {
			$txtRound = 'For Submission';
			$txtRound2 ='';
		}
		
		$result2 = 'x';		
		$from_email = 'jemes.envi@gmail.com';		
		$subject = "Journal of Environmental Management and Energy System - Decision on Manuscript ID ".$comment2->paper_no.$txtRound2;		
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Reviewer Comment</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$comment2->paper_no.$txtRound2.'/4/'.$editor_data2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$editor_data2->name_sname.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID '.$comment2->paper_no.$txtRound2.' entitled “'.$paper2->title.'” with '.$author_data2->salutation.' '.$author_data2->first_name.' '.$author_data2->last_name.' as submitting author, has received the review from '.$editor_data4->name_sname.'. The manuscript has received the required number of reviews and is now ready for your recommendation.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Reviewer Comment '.$txtRound.'</font></strong></td>
             
            </tr>
            <tr>
              <td width="14%" height="28" align="right" valign="top"><p><strong>Note:</strong></p></td>
              <td valign="top">&nbsp;</td>
              <td width="85%" height="28" align="left" valign="top">'.$comment2->comment.'</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$txt.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Review Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Review Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$review_date.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #878787;">
          <tbody>
            <tr>
              <td width="14%" height="10">&nbsp;</td>
              <td width="1%" height="10">&nbsp;</td>
              <td width="85%" height="10" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>              
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>			
          </tbody>
        </table>
        <p>&nbsp;</p>		
        	
		  <a href="'.base_url().'CMS_Journal" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;" >More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#EFEFEF" height="60" align="center" valign="bottom"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="http://www.jemes.envi.psu.ac.th" target="_blank">www.jemes.envi.psu.ac.th</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 		
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
		//$this->email->send();  
		if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $editor_data2->id, $to_email, $comment2->paper_no.$txtRound2, $comment2->paper_id, '4', $editor_data2->name_sname);			
           $result = $result2;
        }			
		echo $result;		
	}
	//-------------------
	public function editor_to_author(){
		
		$commentID = $this->input->post('dataID');
		//echo $commentID." post->".$this->input->post('dataID');
		$comment = $this->journal_model->get_comment2($commentID);
		foreach($comment->result() as $comment2){} 
		
		$txt =''; $other_file3 =''; $other_file ='';
		
		$commentFile = $this->journal_model->get_commentFile($comment2->reID);
		$commentNum2 = $commentFile->num_rows();   
		
		if($commentNum2 >0){  $n=1;
			foreach($commentFile->result() as $commentFile2){
				
				if($commentNum2 > $n){
					$txt2 ='<br>';
				} else { $txt2 =''; }

				$txt = $txt.$n.'. <a href="'.base_url().'uploadfile/'.$commentFile2->file_name.'" target="_blank">'.$commentFile2->file_name.'</a>'.$txt2;
				
			$n++; }  						  
		}
		
		$DateTimeArray = explode(" ",$comment2->review_date);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0];
		$monthArray3 = Array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		$review_date = $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year."&nbsp;&nbsp;".$DateTimeArray[1];
		
		$paymentData = $this->journal_model_2->get_paymentData();
		foreach($paymentData->result() as $paymentData2){ }	
		if($comment2->result_status =='1'){
			$set = $this->journal_model->setPayment_forPaper($paymentData2->accountName, $paymentData2->accountNo, $paymentData2->bank, $paymentData2->swiftCode, $comment2->paper_no, $comment2->paper_id);
		}
		
		$x='';
		$paper = $this->journal_model->listPaper($x,$comment2->paper_no);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add); 
		$round = $this->journal_model->get_roundNumber($paper2->id);	
		//$round = '0';	
		$paperFile = $this->journal_model->get_paperFile($paper2->id,$round);
		foreach($paperFile->result() as $paperFile2){ }	
		
		$OtherFile = $this->journal_model->get_otherFiles($paperFile2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }	
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++; }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}
		
		/*$paymentData = $this->journal_model_2->get_paymentData();
		foreach($paymentData->result() as $paymentData2){ }*/	
		
		$author = $this->journal_model->get_author2($paper2->author_id);
		foreach($author->result() as $author2){ }	
		$name = $author2->salutation.' '.$author2->first_name.' '.$author2->last_name;
		$to_email = $author2->email;
		
		/*if($comment2->result_status =='1'){
			$set = $this->journal_model->setPayment_forPaper($paymentData2->accountName, $paymentData2->accountNo, $paymentData2->bank, $paymentData2->swiftCode, $comment2->paper_no, $paper2->id);
		}*/
		
		if($round >0){
			$txtRound = 'Round'.$round;
			$txtRound2 = '.R'.$round;
			$paper2->remarks = $paperFile2->remarks;
		
		} else {
			$txtRound = 'For Submission';
			$txtRound2 ='';
		}		
		$result2 = 'x';		
		$from_email = 'jemes.envi@gmail.com';
		$subject = "Journal of Environmental Management and Energy System - Decision on Manuscript ID ".$paper2->paper_no.$txtRound2;		
		
		if($comment2->result_status =='1'){
			
			//$subject = "Accepted & Payment";	
			$today3 = date('j F Y', strtotime("+10 day"));
			$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
	<style type="text/css">
	body {
		background-color: #efefef;
		margin: 0px;
		font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
		font-size: 10pt;
		color:#262626;
	}
	a {
		font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
		font-size: 10pt;	
	}
	a:link 		{color: #8A8A8A; text-decoration: none;}
	a:visited 	{text-decoration: none;	color: #22A8B0;}
	a:hover 	{text-decoration: none;	color: #22A8B0;}
	a:active 	{text-decoration: none;	color: #8A8A8A;}

	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
	  <tbody>
		<tr>
		  <td bgcolor="#EFEFEF">	
	<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
		</tr>
		<tr>
		  <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Accepted &amp; Payment</td>
		</tr>
		<tr>
		  <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
		  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.$txtRound2.'/5/'.$author2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
		  
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td height="28" colspan="3">Dear '.$name.',</td>
				</tr>
				<tr>
				  <td height="81" colspan="3"><br>I am pleased to inform you that your work has now been accepted for publication in Journal of Environmental Management and Energy System. This letter serves as an acceptance certificate. Your article has been sent to the production service and you will receive the proofs soon. Your article has been sent to the production service and you will receive the proofs soon.<br><br>According to journal policy may you please send payment and send me the receipt through this email within 10 days (Deadline : '.$today3.') so that we can publish your paper.<br><br>Thank you for submitting your work to this journal.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
				</tr>
				<tr>
				  <td height="10" colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Bank transfer:</font></strong></td>			  
				</tr>
				<tr>
				  <td height="25" align="right" width="14%"><strong>Account Name:</strong></td>
				  <td height="25">&nbsp;</td>
				  <td height="25" align="left" width="85%">'.$paper2->accountName.'</td>
				</tr>
				<tr>
				  <td height="25" align="right"><strong>Account No:</strong></td>
				  <td height="25">&nbsp;</td>
				  <td height="25" align="left">'.$paper2->accountNo.'</td>
				</tr>
				<tr>
				  <td height="25" align="right"><strong>Bank: </strong></td>
				  <td height="25">&nbsp;</td>
				  <td height="25" align="left">'.$paper2->bank.'</td>
				</tr>
				<tr>
				  <td height="25" align="right"><strong>Code:</strong></td>
				  <td height="25">&nbsp;</td>
				  <td height="25" align="left">'.$paper2->swiftCode.'</td>
				</tr>
				<tr>
				  <td height="25">&nbsp;</td>
				  <td height="25">&nbsp;</td>
				  <td height="25" align="left">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Within Date:</font></strong></td>				  
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Within Date:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left" style="color:#FF0004">'.$today3.'</td>
				</tr>				
				<tr>
				  <td height="28">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">&nbsp;</td>
				</tr>
			  </tbody>
			</table>
			<p>&nbsp;</p>			

			  <a href="'.base_url().'Journal/Submission" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;" >Payment</button></a>

		  <p>&nbsp;</p>
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #878787;">
			  <tbody>
				<tr>
				  <td height="10">&nbsp;</td>
				  <td height="10">&nbsp;</td>
				  <td height="10" align="left">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>		  
				</tr>
				<tr>
				  <td height="10" align="right" valign="top">&nbsp;</td>
				  <td height="10" valign="top">&nbsp;</td>
				  <td height="10" align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" align="right" width="14%"><strong>Title:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left" width="85%">'.$paper2->title.'</td>
				</tr>
				<tr>
				  <td height="27" align="right"><strong>Section:</strong></td>
				  <td>&nbsp;</td>
				  <td height="27" align="left">'.$section.'</td>
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Abstract:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">'.$paper2->abstract.'</td>
				</tr>
				<tr>
				  <td height="10">&nbsp;</td>
				  <td height="10">&nbsp;</td>
				  <td height="10">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Accept Date:</font></strong></td>				  
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Accept Date:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left" style="color:#FF0004">'.$review_date.'</td>
				</tr>
				<tr>
				  <td height="10" align="right">&nbsp;</td>
				  <td height="10">&nbsp;</td>
				  <td height="10" align="left">&nbsp;</td>
				</tr>
			  </tbody>
			</table>
			<p>&nbsp;</p>			

		  </td>
		</tr>
		<tr>
		  <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
		</tr>
		<tr>
		  <td height="38" align="center"><a href="http://www.jemes.envi.psu.ac.th" target="_blank">www.jemes.envi.psu.ac.th</a></td>
		</tr>
		<tr>
		  <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
			Hat Yai, Songkhla 90112 Thailand<br>
		  Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
		</tr>    
	  </tbody>
	</table></td>
		</tr>
	  </tbody>
	</table>
	</body>
	</html>';
		
}  else if($comment2->result_status =='4'){
			
		//$subject = "Editor sent to author";		
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">	
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor sent to author</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.$txtRound2.'/5/'.$author2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>I write you in regards to manuscript ID '.$paper2->paper_no.$txtRound2.' entitled “'.$paper2->title.'” which you submitted to the Journal of Environmental Management and Energy System.<br><br>In view of the criticisms of the reviewer(s), your manuscript has been denied publication in the Journal of Environmental Management and Energy System.<br><br>Thank you for considering the Journal of Environmental Management and Energy System for the publication of your research. I hope the outcome of this specific submission will not discourage you from the submission of future manuscripts.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment '.$txtRound.'</font></strong></td>             
            </tr>
            <tr>
              <td height="28" align="right" valign="top" width="14%"><p><strong>Comment:</strong></p></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top" width="85%">'.$comment2->comment.'</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$txt.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment Date:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Review Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$review_date.'</td>
            </tr>			
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #878787;">
          <tbody>
            <tr>
              <td width="14%" height="10">&nbsp;</td>
              <td width="1%" height="10">&nbsp;</td>
              <td width="85%" height="10" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" align="left" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong> File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
		         
		  <a href="'.base_url().'Journal/Submission" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Submission &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
		  </a>              
      <p>&nbsp;</p>
	  
      </td>
    </tr>
    <tr>
      <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="http://www.jemes.envi.psu.ac.th" target="_blank">www.jemes.envi.psu.ac.th</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';	
			
}  else if(($comment2->result_status =='2') || ($comment2->result_status =='3')){
			
		//$subject = "Editor sent to author";
		$deadline = date('j F Y', strtotime("+30 day"));	
		$x = "' ";	
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">	
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor sent to author</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.$txtRound2.'/5/'.$author2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>The reviewers have commented on your above paper. They indicated that it is not acceptable for publication in its present form.<br><br>However, if you feel that you can suitably address the reviewers'.$x.'comments, I invite you to revise and resubmit your manuscript.<br><br>Please carefully address the issues raised in the comments.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment '.$txtRound.'</font></strong></td>             
            </tr>
            <tr>
              <td height="28" align="right" valign="top" width="14%"><p><strong>Comment:</strong></p></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top" width="85%">'.$comment2->comment.'</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$txt.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment Date:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Review Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$review_date.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #878787;">
          <tbody>
            <tr>
              <td width="14%" height="10">&nbsp;</td>
              <td width="1%" height="10">&nbsp;</td>
              <td width="85%" height="10" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" align="left" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong> File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>
			<tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Deadline:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Deadline:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$deadline.'</td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>		
          
		  <a href="'.base_url().'Journal/Submission" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Submission &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
		  </a>              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="http://www.jemes.envi.psu.ac.th" target="_blank">www.jemes.envi.psu.ac.th</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';	
}	
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
		//$this->email->send();  
		if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $author2->id, $to_email, $comment2->paper_no.$txtRound2, $comment2->paper_id, '5', $name);				
           $result = $result2;
        }			
		echo $result2;		
	}	
	//-------------------
	public function author_mailEdit(){  
		
		//$message = $this->input->post('message');				
		//$editor_id = $this->input->post('editor_id');				
		$paper_id = $this->input->post('paperID');		
		$paper_no = $this->input->post('paper_no');		
		$round = $this->input->post('round');		
		$author_id = $this->session->userdata('jlogin');	
		$result2 = 'x';  $txtRound ='';	 	
		//$today3 = date("j F Y");
		$today3 = date('j F Y', strtotime("+10 day"));
		
		if($round >0){
			$txtRound = '.R'.$round;			
		}
		
		$paper = $this->journal_model->listPaper($author_id,$paper_no);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add);
		
		$editData = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($editData->result() as $editData2){}
		$sentDate = $this->journal_model->GetEngDate($editData2->date_add);
		
		$editor_data = $this->journal_model->get_nameEditor($paper2->editor_id);
		foreach($editor_data->result() as $editor_data2){ }	
		
		$author = $this->journal_model->get_author2($author_id);
		foreach($author->result() as $author2){ }	
		$name = $author2->salutation.' '.$author2->first_name.' '.$author2->last_name;
		
		$from_email = 'jemes.envi@gmail.com';
		$to_email = $editor_data2->email;
		$subject = "Manuscript ID ".$paper_no.$txtRound." now in your Editor Center";
			
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">	
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Author sent edit</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper_no.$txtRound.'/6/'.$editor_data2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$editor_data2->name_sname.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID '.$paper_no.$txtRound.' entitled “'.$paper2->title.'” with '.$name.' as contact author has been assigned to you and is currently sitting in your Editor Center at '.base_url('CMS_Journal').'.<br><br>Kindly select reviewers for this manuscript by '.$today3.'.<br>Please select at least 3 reviewers who are NOT in the same affiliation as Submitting Author. To add new reviewers, you can go to “'.base_url('CMS_Journal').'.”<br>If, for any reason, you are unable to serve as Editor for this manuscript, please notify me immediately so that I can reassign it.<br><br>When assigning reviewers, be sure to check if the author has any suggested/non-preferred reviewers.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Edit Round '.$round.'</font></strong></td>             
            </tr>
            <tr>
              <td height="28" align="right" valign="top" width="10%"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top" width="87%">'.$editData2->remarks.'</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$editData2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_pdf).'</a><br>
                2. <a href="'.base_url().$editData2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_word).'</a></td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Sent Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Sent Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$sentDate.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #878787;">
          <tbody>
            <tr>
              <td height="10">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>              
            </tr>
            <tr>
              <td height="10" align="right" valign="top" width="10%">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top" width="87%">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Title:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Abstract:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>			
          </tbody>
        </table>
        <p>&nbsp;</p>
		        	
		  <a href="'.base_url().'CMS_Journal" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th');
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $paper2->editor_id, $to_email, $paper_no.$txtRound, $paper_id, '6', $editor_data2->name_sname);		
           $result = $result2;

        }else{ 
           $result = 0;
        }			
		echo $result;		
	}
	//-------------------
	public function mail_authorSubmission(){  		
					
		$paper_id = $this->input->post('dataID');			
		$author_id = $this->session->userdata('jlogin');	
		$result2 = 'x'; $a =''; $round = '0'; $other_file3 ='';	$other_file ='';
		
		$paper = $this->journal_model->listPaper($author_id,$a,$paper_id);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		//$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add);		
		
		$author = $this->journal_model->get_author2($author_id);
		foreach($author->result() as $author2){ }
		$name = $author2->salutation.' '.$author2->first_name.' '.$author2->last_name;
		
		$editData = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($editData->result() as $editData2){}
		
		$OtherFile = $this->journal_model->get_otherFiles($editData2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }	
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++; }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}
		
		$managing = $this->journal_model->get_managing();
		foreach($managing->result() as $managing2){}
		//$sentDate = $this->journal_model->GetEngDate($editData2->date_add);                               	
		
		$from_email = 'jemes.envi@gmail.com';
		$to_email = $managing2->email;		
		$subject = "Manuscript ID ".$paper2->paper_no." is now in your Admin Center";
			
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">	
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Submission Details</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.'/7/'.$managing2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
		    <tr>
              <td height="28" colspan="3">Dear Journal of Environmental Management and Energy System,</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID '.$paper2->paper_no.' entitled “'.$paper2->title.'” with '.$name.' as submitting author, has been submitted to the Journal of Environmental Management and Energy System.<br><br>Please complete the checklist for this manuscript as soon as possible.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Author Profile:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right" width="14%"><strong>Name:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" width="85%">'.$name.'</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$author2->email.'</td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>              
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$editData2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_pdf).'</a><br>
                2. <a href="'.base_url().$editData2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Abstract:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
			<tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>			
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        	
	    <div style="text-align: center;"><a href="'.base_url().'CMS_Journal" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a></div>
              
      <p>&nbsp;</p>	  
      </td>
    </tr>
    <tr>
      <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="http://www.jemes.envi.psu.ac.th" target="_blank">www.jemes.envi.psu.ac.th</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';	 
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th');
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $managing2->id, $to_email, $paper2->paper_no, $paper_id, '7', 'Journal of Environmental Management and Energy System');		
           //$result = $result2;

/////////////////////////////////////////////////////			
			
		    $to_email = $author2->email;
			$subject = "Journal of Environmental Management and Energy System - Manuscript ID ".$paper2->paper_no;

			$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
	<style type="text/css">
	body {
		background-color: #efefef;
		margin: 0px;
		font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
		font-size: 10pt;
		color:#262626;
	}
	a {
		font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
		font-size: 10pt;	
	}
	a:link 		{color: #8A8A8A; text-decoration: none;}
	a:visited 	{text-decoration: none;	color: #22A8B0;}
	a:hover 	{text-decoration: none;	color: #22A8B0;}
	a:active 	{text-decoration: none;	color: #8A8A8A;}		
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
	  <tbody>
		<tr>
		  <td bgcolor="#EFEFEF">	
	<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
		</tr>
		<tr>
		  <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Submission Details</td>
		</tr>
		<tr>
		  <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
		  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.'/8/'.$author2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
		  
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td height="28" colspan="3">Dear '.$name.',</td>
				</tr>
				<tr>
				  <td height="81" colspan="3"><br>Your manuscript entitled “'.$paper2->title.'” has been successfully submitted online and is presently being given full consideration for publication in the Journal of Environmental Management and Energy System.<br><br>Your manuscript ID is '.$paper2->paper_no.'.<br><br>Please mention the above manuscript ID in all future correspondence or when calling the office for questions. You can also view the status of your manuscript at any time by checking your Author Center after logging in to '.base_url().'submission.<br><br>Thank you for submitting your manuscript to the Journal of Environmental Management and Energy System.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
				</tr>
				<tr>
				  <td height="10" colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Author Profile:</font></strong></td>			  
				</tr>
				<tr>
				  <td height="28" align="right" width="14%"><strong>Name:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left" width="85%">'.$name.'</td>
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Email:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">'.$author2->email.'</td>
				</tr>
				<tr>
				  <td height="28">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>				  
				</tr>
				<tr>
				  <td height="10" align="right" valign="top">&nbsp;</td>
				  <td height="10" valign="top">&nbsp;</td>
				  <td height="10" align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" align="right" valign="top"><strong>Title:</strong></td>
				  <td valign="top">&nbsp;</td>
				  <td height="28" align="left" valign="top">'.$paper2->title.'</td>
				</tr>
				<tr>
				  <td height="28" align="right" valign="top"><strong>File:</strong></td>
				  <td valign="top">&nbsp;</td>
				  <td height="28" align="left" valign="top">1. <a href="'.base_url().$editData2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_pdf).'</a><br>
					2. <a href="'.base_url().$editData2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_word).'</a></td>
				</tr>'.$other_file3.'
				<tr>
				  <td height="27" align="right"><strong>Section:</strong></td>
				  <td>&nbsp;</td>
				  <td height="27" align="left">'.$section.'</td>
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Abstract:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">'.$paper2->abstract.'</td>
				</tr>
				<tr>
				  <td height="28" align="right" valign="top"><strong>Note:</strong></td>
				  <td valign="top">&nbsp;</td>
				  <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
				</tr>
				<tr>
				  <td height="10" align="right">&nbsp;</td>
				  <td height="10">&nbsp;</td>
				  <td height="10" align="left">&nbsp;</td>
				</tr>				
			  </tbody>
			</table>
			<p>&nbsp;</p>
			
			<a href="'.base_url().'Journal/Submission" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>

		  <p>&nbsp;</p>		  
		  </td>
		</tr>
		<tr>
		  <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
		</tr>
		<tr>
		  <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
		</tr>
		<tr>
		  <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
			Hat Yai, Songkhla 90112 Thailand<br>
		  Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
		</tr>    
	  </tbody>
	</table></td>
		</tr>
	  </tbody>
	</table>
	</body>
	</html>
	';	 

			$this->email->from($from_email, 'www.jemes.envi.psu.ac.th');
			$this->email->to($to_email);
			$this->email->subject($subject); 
			$this->email->message($email_body);	
			if($this->email->send()){ 
		   		$result2 = $this->journal_model->insert_mailData($subject, $author2->id, $to_email, $paper2->paper_no, $paper_id, '8', $name);		
           		//$result = $result2;
                                 $name2 = '';
                        $listmanage = $this->journal_model_2->get_listmanage();
                        foreach($listmanage->result() as $listmanage2){
                        $name2 = $listmanage2->name_sname;
                        $from_email = 'jemes.envi@gmail.com';
                        $to_email = $listmanage2->email;
			$subject = "Journal of Environmental Management and Energy System - Manuscript ID ".$paper2->paper_no;

			$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
	<style type="text/css">
	body {
		background-color: #efefef;
		margin: 0px;
		font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
		font-size: 10pt;
		color:#262626;
	}
	a {
		font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
		font-size: 10pt;	
	}
	a:link 		{color: #8A8A8A; text-decoration: none;}
	a:visited 	{text-decoration: none;	color: #22A8B0;}
	a:hover 	{text-decoration: none;	color: #22A8B0;}
	a:active 	{text-decoration: none;	color: #8A8A8A;}		
	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
	  <tbody>
		<tr>
		  <td bgcolor="#EFEFEF">	
	<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tbody>
		<tr>
		  <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
		</tr>
		<tr>
		  <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Submission Details</td>
		</tr>
		<tr>
		  <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
		  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.'/7/'.$author2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
		  
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
			  <tbody>
				<tr>
				  <td height="28" colspan="3">Dear '.$name2.',</td>
				</tr>
				<tr>
				  <td height="81" colspan="3"><br>Your manuscript entitled “'.$paper2->title.'” has been successfully submitted online and is presently being given full consideration for publication in the Journal of Environmental Management and Energy System.<br><br>Your manuscript ID is '.$paper2->paper_no.'.<br><br>Please mention the above manuscript ID in all future correspondence or when calling the office for questions. You can also view the status of your manuscript at any time by checking your Author Center after logging in to '.base_url().'submission.<br><br>Thank you for submitting your manuscript to the Journal of Environmental Management and Energy System.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
				</tr>
				<tr>
				  <td height="10" colspan="3">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Author Profile:</font></strong></td>			  
				</tr>
				<tr>
				  <td height="28" align="right" width="14%"><strong>Name:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left" width="85%">'.$name2.'</td>
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Email:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">'.$author2->email.'</td>
				</tr>
				<tr>
				  <td height="28">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>				  
				</tr>
				<tr>
				  <td height="10" align="right" valign="top">&nbsp;</td>
				  <td height="10" valign="top">&nbsp;</td>
				  <td height="10" align="left" valign="top">&nbsp;</td>
				</tr>
				<tr>
				  <td height="28" align="right" valign="top"><strong>Title:</strong></td>
				  <td valign="top">&nbsp;</td>
				  <td height="28" align="left" valign="top">'.$paper2->title.'</td>
				</tr>
				<tr>
				  <td height="28" align="right" valign="top"><strong>File:</strong></td>
				  <td valign="top">&nbsp;</td>
				  <td height="28" align="left" valign="top">1. <a href="'.base_url().$editData2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_pdf).'</a><br>
					2. <a href="'.base_url().$editData2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($editData2->file_word).'</a></td>
				</tr>'.$other_file3.'
				<tr>
				  <td height="27" align="right"><strong>Section:</strong></td>
				  <td>&nbsp;</td>
				  <td height="27" align="left">'.$section.'</td>
				</tr>
				<tr>
				  <td height="28" align="right"><strong>Abstract:</strong></td>
				  <td>&nbsp;</td>
				  <td height="28" align="left">'.$paper2->abstract.'</td>
				</tr>
				<tr>
				  <td height="28" align="right" valign="top"><strong>Note:</strong></td>
				  <td valign="top">&nbsp;</td>
				  <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
				</tr>
				<tr>
				  <td height="10" align="right">&nbsp;</td>
				  <td height="10">&nbsp;</td>
				  <td height="10" align="left">&nbsp;</td>
				</tr>				
			  </tbody>
			</table>
			<p>&nbsp;</p>
			
			<a href="'.base_url().'Journal/Submission" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>

		  <p>&nbsp;</p>		  
		  </td>
		</tr>
		<tr>
		  <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
		</tr>
		<tr>
		  <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
		</tr>
		<tr>
		  <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
			Hat Yai, Songkhla 90112 Thailand<br>
		  Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
		</tr>    
	  </tbody>
	</table></td>
		</tr>
	  </tbody>
	</table>
	</body>
	</html>
	';	 

			$this->email->from($from_email, 'www.jemes.envi.psu.ac.th');
			$this->email->to($to_email);
			$this->email->subject($subject); 
			$this->email->message($email_body);	
			if($this->email->send()){ 
		   		 $result2 = $this->journal_model->insert_mailData($subject, $managing2->id, $to_email, $paper2->paper_no, $paper_id, '7', $name2);	
           		$result = $result2;
                        }else{
                          $result = 0;  
                        }
                        }
                        }else{
                          $result = 0;
                        }
                       
        }else{ 
           $result = 0;
        }			
		echo $result;		
	}
	//-------------------
	public function mail_forgotPassword(){	 
		
		/*$emaildata = $this->input->post('email');
		$typedata = $this->input->post('type');
		$userID = $this->input->post('userID');*/		
		$email = $this->input->post('email');				
		$type = $this->input->post('type');
		$userID = $this->input->post('userID');
               
        if($type == '1'){
			
             $editor_data = $this->journal_model->get_author2($userID);
             foreach($editor_data->result() as $editor_data2){ }
             $name = $editor_data2->salutation.' '.$editor_data2->first_name.' '.$editor_data2->last_name;
             $table = 'tbl_authors_data';
             $url = 'Journal/reset_password';
		}
        if($type == '2'){
			
			$editor_data = $this->journal_model->get_nameEditor($userID);
            foreach($editor_data->result() as $editor_data2){ }
            $name = $editor_data2->name_sname;
            $table = 'tbl_journal_user';
            $url = 'CMS_Journal/reset_password';
        }
		$key_value1 = $this->journal_model_2->generateRandomString();	
		$key_value3 = $this->journal_model_2->generateRandomString();	
		$date1 = date("d");
		$key_value2 = $key_value1.$userID.'#'.$date1.$key_value3;		
		
		$from_email = 'jemes.envi@gmail.com';
		$subject = "Journal of Environmental Management and Energy System - Profile Password Updated";		
		//$to_email = $editor_data2->email;
		//$to_email = $emaildata;
		$to_email = $email;
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title></title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head><body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Journal of Environmental Management and Energy System - Profile Password Updated</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>We have received your request to reset your password for JEMES. Please click on the following link: '.base_url().$url.'" and you will be prompted for the new password you wish to use.<br><br>Your password will not be changed unless you click on the link above and complete the form.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>            
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
			</tbody>
        </table>
        <p>&nbsp;</p>
		        	
		  <a href="'.base_url().$url.'/'.$key_value2.'" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Reset Password</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#EFEFEF" height="60" align="center" valign="bottom"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>';	 	
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
       	$this->email->message($email_body); 
        //Send mail 
		//$this->email->send();  
		if($this->email->send()){ 
		   	$result2 = $this->journal_model->update_keyValue($key_value2,$userID,$table);	
			
          	$result = $result2;  
        }			
		echo $result;		
	}		
	//-------------------
	
	public function managingReject(){		
		
		$paperID = $this->input->post('element2');
		
		$x=''; $txt =''; $other_file3 =''; $other_file ='';
		
		$paper = $this->journal_model->listPaper($x,$x,$paperID);
		foreach($paper->result() as $paper2){ }	
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		} 
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add); 
		$round = $this->journal_model->get_roundNumber($paper2->id);
		
		$author = $this->journal_model->get_author2($paper2->author_id);
		foreach($author->result() as $author2){ }	
		$name = $author2->salutation.' '.$author2->first_name.' '.$author2->last_name;
		$to_email = $author2->email;
		
		//$round = '0';	
		$paperFile = $this->journal_model->get_paperFile($paper2->id,$round);
		foreach($paperFile->result() as $paperFile2){ }	
		
		$OtherFile = $this->journal_model->get_otherFiles($paperFile2->id);	
		$n_OtherFile = $OtherFile->num_rows();  
		
		if($n_OtherFile >0){ $a = 1;
							
			foreach($OtherFile->result() as $OtherFile2){
							
				if($n_OtherFile > $a){	$other_file2 ='<br>'; } else { $other_file2 =''; }				
			
				$other_file = $other_file.$a.'. <a href="'.base_url().'uploadfile/'.$OtherFile2->file_name.'" target="_blank">'.$OtherFile2->file_name.'</a>'.$other_file2;
			$a++; }							
			$other_file3 = '<tr>
              <td height="28" align="right" valign="top"><strong>Other File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$other_file.'</td>
            </tr>';								
		}		
		if($round >0){
			$txtRound = 'Round'.$round;
			$txtRound2 = '.R'.$round;
			$paper2->remarks = $paperFile2->remarks;
		
		} else {
			$txtRound = 'For Submission';
			$txtRound2 ='';
		}				
		$result2 = 'x';		
		$from_email = 'jemes.envi@gmail.com';
		$subject = "Journal of Environmental Management and Energy System - Decision on Manuscript ID ".$paper2->paper_no.$txtRound2;			
			
		//$subject = "Editor sent to author";		
		$email_body = '<!doctype html><html><head><meta charset="utf-8"><title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #efefef;
	margin: 0px;
	font-family:  "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;
	color:#262626;
}
a {
	font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
	font-size: 10pt;	
}
a:link 		{color: #8A8A8A; text-decoration: none;}
a:visited 	{text-decoration: none;	color: #22A8B0;}
a:hover 	{text-decoration: none;	color: #22A8B0;}
a:active 	{text-decoration: none;	color: #8A8A8A;}
		
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">	
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="'.base_url().'journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Journal of Environmental Management and Energy System - Decision on Manuscript ID '.$paper2->paper_no.$txtRound2.'</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF">
	  <p style="text-align: right"><a href="'.base_url().'Journal/printMail/'.$paper2->paper_no.$txtRound2.'/9/'.$author2->id.'" target="_blank"><img src="'.base_url().'journal-html/images/printer2.png" height="32" alt=""/></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
	  
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear '.$name.',</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>I write you in regards to manuscript ID '.$paper2->paper_no.$txtRound2.' entitled “'.$paper2->title.'” which you submitted to the Journal of Environmental Management and Energy System.<br><br>In view of the criticisms of the reviewer(s), your manuscript has been denied publication in the Journal of Environmental Management and Energy System.<br><br>Thank you for considering the Journal of Environmental Management and Energy System for the publication of your research. I hope the outcome of this specific submission will not discourage you from the submission of future manuscripts.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>            
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid #878787;">
          <tbody>
            <tr>
              <td width="14%" height="10">&nbsp;</td>
              <td width="1%" height="10">&nbsp;</td>
              <td width="85%" height="10" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submission Details:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" align="left" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->title.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong> File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="'.base_url().$paperFile2->file_pdf.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_pdf).'</a><br>
                2. <a href="'.base_url().$paperFile2->file_word.'" target="_blank">'.$this->journal_model->name_paperFile($paperFile2->file_word).'</a></td>
            </tr>'.$other_file3.'
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left">'.$section.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->abstract.'</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">'.$paper2->remarks.'</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>
              <td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004">'.$dateSubmit.'</td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
		         
		  <a href="'.base_url().'Journal/Submission" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Submission &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
		  </a>              
      <p>&nbsp;</p>
	  
      </td>
    </tr>
    <tr>
      <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="'.base_url().'journal-html/images/social-fb.png" alt=""/></a></td>
    </tr>
    <tr>
      <td height="38" align="center"><a href="'.base_url().'Journal" target="_blank">'.base_url().'Journal</a></td>
    </tr>
    <tr>
      <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
        Hat Yai, Songkhla 90112 Thailand<br>
      Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
    </tr>    
  </tbody>
</table></td>
    </tr>
  </tbody>
</table>
</body>
</html>
';				
		
		$this->email->from($from_email, 'www.jemes.envi.psu.ac.th'); 
        $this->email->to($to_email);
        $this->email->subject($subject); 
        $this->email->message($email_body); 
        //Send mail 
		//$this->email->send();  
		if($this->email->send()){ 
		   $result2 = $this->journal_model->insert_mailData($subject, $author2->id, $to_email, $paper2->paper_no.$txtRound2, $paperID, '9', $name);				
           //$result = $result2;
        }			
		echo $result2;		
	}
	
} ?>
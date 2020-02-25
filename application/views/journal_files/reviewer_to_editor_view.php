<!doctype html>
<link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico')?>">
<html><head><meta charset="utf-8">
<title>Journal of Environmental Management and Energy System | JEMES</title>
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
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">-->
    <?php //$paper_no = $this->uri->segment(4);  
		  //$email_id = $this->uri->segment(3);
		  $emaildetail = $this->journal_model_2->listemaildetail($email_id,$paper_no);
		  foreach($emaildetail->result() as $emaildetail2){ }	
		  //$round = $this->journal_model->get_roundNumber($emaildetail2->paper_id);
		  if(strpos($paper_no, '.R') !== FALSE){
		   		$roundArray = explode(".", $paper_no);
				$round = substr($roundArray[1], 1);
				$paper_no = $roundArray[0];
		  } else {
				$round = '';
		  }
		  $commmentData = $this->journal_model->get_comment($paper_no,$emaildetail2->user_id,$emaildetail2->paper_id,$round);
		  //$commentID = $this->input->post('dataID');
		  //$comment = $this->journal_model->get_comment2($commentID);
		  foreach($commmentData->result() as $comment2){} 
	  	  $commentFile = $this->journal_model->get_commentFile($comment2->reID);
		  $commentNum2 = $commentFile->num_rows();   $txt ='';
		  if($commentNum2 >0){  $n=1;
		  foreach($commentFile->result() as $commentFile2){
			  	if($commentNum2 > $n){
					$txt2 ='<br>';
				} else { $txt2 =''; }
			  		$txt = $txt.$n.'. <a href="'.base_url('uploadfile/').$commentFile2->file_name.'" target="_blank">'.$commentFile2->file_name.'</a>'.$txt2;

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
		  $paperFile = $this->journal_model->get_paperFile($paper2->id,$round);
		  foreach($paperFile->result() as $paperFile2){ }	

		  $editor_data = $this->journal_model->get_nameEditor($paper2->editor_id);
		  foreach($editor_data->result() as $editor_data2){ }	
		  $to_email = $editor_data2->email;	

		  $editor_data3 = $this->journal_model->get_nameEditor($comment2->reviewer_id);
		  foreach($editor_data3->result() as $editor_data4){ }

		  $author_data = $this->journal_model->get_author2($paper2->author_id);
		  foreach($author_data->result() as $author_data2){ }

		  if($round !=''){
				$txtRound = 'Round'.$round;
				$txtRound2 = '.R'.$round;
				$paper2->remarks = $paperFile2->remarks;

		  } else {
				$txtRound = 'For Submission';
				$txtRound2 ='';
		  }	
	  
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
	  
    ?>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" id="table2">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Reviewer Comment</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear <?php echo $editor_data2->name_sname?>,</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID <?php echo $comment2->paper_no.$txtRound2?> entitled “<?php echo $paper2->title?>” with <?php echo $author_data2->salutation?> <?php echo $author_data2->first_name?> <?php echo $author_data2->last_name?> as submitting author, has received the review from <?php echo $editor_data4->name_sname?>. The manuscript has received the required number of reviews and is now ready for your recommendation.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Reviewer Comment <?php echo $txtRound?></font></strong></td>
             
            </tr>
            <tr>
              <td width="14%" height="28" align="right" valign="top"><p><strong>Note:</strong></p></td>
              <td valign="top">&nbsp;</td>
              <td width="85%" height="28" align="left" valign="top"><?php echo $comment2->comment?></td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top"><?php echo $txt?></td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Review Date:</font></strong></td>
              <!--<td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>-->
            </tr>
            <tr>
              <td height="28" align="right"><strong>Review Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004"><?php echo $review_date?></td>
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
              <!--<td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" align="left" bgcolor="#F3F3F3">&nbsp;</td>-->
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Title:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top"><?php echo $paper2->title?></td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="<?php echo base_url().$paperFile2->file_pdf?>" target="_blank"><?php echo $this->journal_model->name_paperFile($paperFile2->file_pdf)?></a><br>
                2. <a href="<?php echo base_url().$paperFile2->file_word?>" target="_blank"><?php echo $this->journal_model->name_paperFile($paperFile2->file_word)?></a></td>
            </tr>
			<?php echo $other_file3?>  
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left"><?php echo $section?></td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top"><?php echo $paper2->abstract?></td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top"><?php echo $paper2->remarks?></td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>
              <!--<td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>-->
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004"><?php echo $dateSubmit?></td>
            </tr>
            <tr>
              <td height="10" align="right">&nbsp;</td>
              <td height="10">&nbsp;</td>
              <td height="10" align="left">&nbsp;</td>
            </tr>			
          </tbody>
        </table>
        <p>&nbsp;</p>		
        	
		  <a href="<?php echo base_url('CMS_Journal')?>" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;" >More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#EFEFEF" height="60" align="center" valign="bottom"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="<?php echo base_url('journal-html/images/social-fb.png')?>" alt=""/></a></td>
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
</table>
<!--</td>
    </tr>
  </tbody>
</table>-->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/jquery.min.js')?>"></script>
<?php if ($print != ''){?>
<script>
 $(document).ready(function () {
     var n_table = 'table2';
    var printContents = document.getElementById(n_table).innerHTML; 
             var originalContents = document.body.innerHTML; 
             document.body.innerHTML = printContents; 
             window.print(); 
             document.body.innerHTML = originalContents;
         });

   </script>
   <?php }?>
</body>
</html>
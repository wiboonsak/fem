<!doctype html>
<link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico')?>">
<html>
<head><meta charset="utf-8">
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
<!--	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
      <tbody>
            <tr>
              <td bgcolor="#EFEFEF">	-->
<?php   //$paper_no = $this->uri->segment(4);
        //$email_id = $this->uri->segment(3);
        $emaildetail = $this->journal_model_2->listemaildetail($email_id, $paper_no);
        foreach($emaildetail->result() as $emaildetail2){}
        //$round = $this->journal_model->get_roundNumber($emaildetail2->paper_id);
        if (strpos($paper_no, '.R') !== FALSE) {
   			$roundArray = explode(".", $paper_no);
        	$round = substr($roundArray[1], 1);
        	$paper_no = $roundArray[0];
		}else{
    		$round = '';
		}       
        $x = '';
        $paper = $this->journal_model->listPaper($x, $paper_no);
        foreach($paper->result() as $paper2){ }
        if($paper2->section == '1'){
            $section = "Research Articles";
			
        } else {
            $section = "Review Articles";
        }
        $dateSubmit = $this->journal_model->GetEngDate($paper2->date_add);
        $commmentData = $this->journal_model->get_comment($paper_no, $paper2->editor_id, $emaildetail2->paper_id, $round);
        foreach($commmentData->result() as $comment2){}

        $commentFile = $this->journal_model->get_commentFile($comment2->reID);
        $commentNum2 = $commentFile->num_rows();
        $txt = ''; $other_file3 =''; $other_file ='';
        if($commentNum2 > 0){
            $n = 1;
            foreach($commentFile->result() as $commentFile2){

                if($commentNum2 > $n){
                    $txt2 = '<br>';
                } else {
                    $txt2 = '';
                }

                $txt = $txt.$n.'. <a href="'.base_url('uploadfile/').$commentFile2->file_name.'" target="_blank">'.$commentFile2->file_name.'</a>'.$txt2;

                $n++;
            }
        }

        $DateTimeArray = explode(" ", $comment2->review_date);
        $dateArray = explode("-", $DateTimeArray[0]);
        $date = $dateArray[2];
        $mon = $dateArray[1];
        $year = $dateArray[0];
        $monthArray3 = Array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
        if($date < 10){  $date = str_replace("0", "", $date);  }
        $review_date = $date."&nbsp;&nbsp;".$monthArray3[$mon]."&nbsp;&nbsp;".$year."&nbsp;&nbsp;".$DateTimeArray[1];
	  
        //$round = '0';	
        $paperFile = $this->journal_model->get_paperFile($paper2->id, $round);
        foreach($paperFile->result() as $paperFile2){}
	  
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

        $author = $this->journal_model->get_author2($paper2->author_id);
        foreach($author->result() as $author2){}
        $name = $author2->salutation.' '.$author2->first_name.' '.$author2->last_name;
        $to_email = $author2->email;       

        if($round != ''){
            $txtRound = 'Round'.$round;
            $txtRound2 = '.R'.$round;
            $paper2->remarks = $paperFile2->remarks;
        } else {
            $txtRound = 'For Submission';
            $txtRound2 = '';
        }
        $result2 = 'x';
        $from_email = 'jemes.envi@gmail.com';
        $subject = "Journal of Environmental Management and Energy System - Decision on Manuscript ID ".$paper2->paper_no.$txtRound2;

        if($comment2->result_status == '1'){

            //$subject = "Accepted & Payment";	
            $date_start = $emaildetail2->date_sent;
            $roundArray = explode(" ", $date_start);
            $date_start = $roundArray[0];
            //$date_start = $this->journal_model->GetEngDate($date_start);
            $today3 = date('j F Y', strtotime($date_start. ' +30 days'));
	?>
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" id="table2">
                <tbody>
                    <tr>
                        <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
                    </tr>
                    <tr>
                        <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Accepted &amp; Payment</td>
                    </tr>
                    <tr>
                        <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td height="28" colspan="3">Dear <?php echo $name?>,</td>
                                    </tr>
                                    <tr>
                                        <td height="81" colspan="3"><br>I am pleased to inform you that your work has now been accepted for publication in Journal of Environmental Management and Energy System. This letter serves as an acceptance certificate. Your article has been sent to the production service and you will receive the proofs soon. Your article has been sent to the production service and you will receive the proofs soon.<br><br>According to journal policy may you please send payment and send me the receipt through this email within 10 days (Deadline : <?php echo $today3?>) so that we can publish your paper.<br><br>Thank you for submitting your work to this journal.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
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
                                        <td height="25" align="left" width="85%"><?php echo $paper2->accountName?></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="right"><strong>Account No:</strong></td>
                                        <td height="25">&nbsp;</td>
                                        <td height="25" align="left"><?php echo $paper2->accountNo?></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="right"><strong>Bank: </strong></td>
                                        <td height="25">&nbsp;</td>
                                        <td height="25" align="left"><?php echo $paper2->bank?></td>
                                    </tr>
                                    <tr>
                                        <td height="25" align="right"><strong>Code: </strong></td>
                                        <td height="25">&nbsp;</td>
                                        <td height="25" align="left"><?php echo $paper2->swiftCode?></td>
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
                                        <td height="28" align="left" style="color:#FF0004"><?php echo $today3?></td>
                                    </tr>				
                                    <tr>
                                        <td height="28">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td height="28" align="left">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>			

                            <a href="<?php echo base_url('Journal/Submission')?>" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;" >Payment</button></a>

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
                                        <td height="28" align="left" width="85%"><?php echo $paper2->title?></td>
                                    </tr>
                                    <tr>
                                        <td height="27" align="right"><strong>Section:</strong></td>
                                        <td>&nbsp;</td>
                                        <td height="27" align="left"><?php echo $section?></td>
                                    </tr>
                                    <tr>
                                        <td height="28" align="right"><strong>Abstract:</strong></td>
                                        <td>&nbsp;</td>
                                        <td height="28" align="left"><?php echo $paper2->abstract?></td>
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
                                        <td height="28" align="left" style="color:#FF0004"><?php echo $review_date?></td>
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
                        <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="<?php echo base_url('journal-html/images/social-fb.png')?>" alt=""/></a></td>
                    </tr>
                    <tr>
                        <td height="38" align="center"><a href="<?php echo base_url('Journal')?>" target="_blank"><?php echo base_url('Journal')?></a></td>
                    </tr>
                    <tr>
                        <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
                            Hat Yai, Songkhla 90112 Thailand<br>
                            Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
                    </tr>    
                </tbody>
            </table>
<?php } else if($comment2->result_status == '4'){ ?>

        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" id="table2">
                <tbody>
                    <tr>
                        <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
                    </tr>
                    <tr>
                        <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor sent to author</td>
                    </tr>
                    <tr>
                        <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td height="28" colspan="3">Dear <?php echo $name?>,</td>
                                    </tr>
                                    <tr>
                                        <td height="81" colspan="3"><br>I write you in regards to manuscript ID <?php echo $paper2->paper_no.$txtRound2?> entitled “<?php echo $paper2->title?>” which you submitted to the Journal of Environmental Management and Energy System.<br><br>In view of the criticisms of the reviewer(s), your manuscript has been denied publication in the Journal of Environmental Management and Energy System.<br><br>Thank you for considering the Journal of Environmental Management and Energy System for the publication of your research. I hope the outcome of this specific submission will not discourage you from the submission of future manuscripts.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
                                    </tr>
                                    <tr>
                                        <td height="10" colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment <?php echo $txtRound?></font></strong></td>             
                                    </tr>
                                    <tr>
                                        <td height="28" align="right" valign="top" width="14%"><p><strong>Comment:</strong></p></td>
                                        <td valign="top">&nbsp;</td>
                                        <td height="28" align="left" valign="top" width="85%"><?php echo $comment2->comment?></td>
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
                                        <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment Date:</font></strong></td>
                                        <td bgcolor="#F3F3F3">&nbsp;</td>
                                        <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
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
                                        <td height="28" align="left" valign="top"><?php echo $paper2->title?></td>
                                    </tr>
                                    <tr>
                                        <td height="28" align="right" valign="top"><strong> File:</strong></td>
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
                                        <td bgcolor="#F3F3F3">&nbsp;</td>
                                        <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
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

                            <a href="<?php echo base_url('Journal/Submission')?>" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Submission &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
                            </a>              
                            <p>&nbsp;</p>

                        </td>
                    </tr>
                    <tr>
                        <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><img src="<?php echo base_url('journal-html/images/social.jpg') ?>" width="237" height="49" alt=""/></td>
                    </tr>
                    <tr>
                        <td height="38" align="center"><a href="<?php echo base_url('Journal')?>" target="_blank"><?php echo base_url('Journal')?></a></td>
                    </tr>
                    <tr>
                        <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
                            Hat Yai, Songkhla 90112 Thailand<br>
                            Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
                    </tr>    
                </tbody>
            </table>
            
<?php  } else if(($comment2->result_status == '2') || ($comment2->result_status == '3')){
    $date_start = $emaildetail2->date_sent;
    $roundArray = explode(" ", $date_start);
    $date_start = $roundArray[0];
    //$date_start2 = $this->journal_model->GetEngDate($date_start);
    $deadline = date('j F Y', strtotime($date_start. ' +30 days'));
	$x = "' ";		
?>
        <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" id="table2">
                <tbody>
                    <tr>
                        <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
                    </tr>
                    <tr>
                        <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor sent to author</td>
                    </tr>
                    <tr>
                        <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
                            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <td height="28" colspan="3">Dear <?php echo $name?>,</td>
                                    </tr>
                                    <tr>
                                        <td height="81" colspan="3"><br>The reviewers have commented on your above paper. They indicated that it is not acceptable for publication in its present form.<br><br>However, if you feel that you can suitably address the reviewers<?php echo $x ?>comments, I invite you to revise and resubmit your manuscript.<br><br>Please carefully address the issues raised in the comments.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
                                    </tr>
                                    <tr>
                                        <td height="10" colspan="3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment <?php echo $txtRound ?></font></strong></td>
                                        <!--<td width="1%" bgcolor="#F3F3F3">&nbsp;</td>
                                        <td width="85%" height="28" bgcolor="#F3F3F3">&nbsp;</td>-->
                                    </tr>
                                    <tr>
                                        <td height="28" align="right" valign="top" width="14%"><p><strong>Comment:</strong></p></td>
                                        <td valign="top">&nbsp;</td>
                                        <td height="28" align="left" valign="top" width="85%"><?php echo $comment2->comment?></td>
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
                                        <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Comment Date:</font></strong></td>
                                        <td bgcolor="#F3F3F3">&nbsp;</td>
                                        <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
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
                                        <td height="28" align="left" valign="top"><?php echo $paper2->title?></td>
                                    </tr>
                                    <tr>
                                        <td height="28" align="right" valign="top"><strong> File:</strong></td>
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
                                        <td bgcolor="#F3F3F3">&nbsp;</td>
                                        <td height="28" bgcolor="#F3F3F3">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td height="28" align="right"><strong>Submit Date:</strong></td>
                                        <td>&nbsp;</td>
                                        <td height="28" align="left"><?php echo $dateSubmit?></td>
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
                                        <td height="28" align="left" style="color:#FF0004"><?php echo $deadline?></td>
                                    </tr>
                                    <tr>
                                        <td height="10" align="right">&nbsp;</td>
                                        <td height="10">&nbsp;</td>
                                        <td height="10" align="left">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>&nbsp;</p>		

                            <a href="<?php echo base_url('Journal/Submission')?>" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">Submission &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
                            </a>              
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td height="60" align="center" valign="bottom" bgcolor="#EFEFEF"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><img src="<?php echo base_url('journal-html/images/social-fb.png')?>" alt=""/></a></td>
                    </tr>
                    <tr>
                        <td height="38" align="center"><a href="<?php echo base_url('Journal')?>" target="_blank"><?php echo base_url('Journal')?></a></td>
                    </tr>
                    <tr>
                        <td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br>
                            Hat Yai, Songkhla 90112 Thailand<br>
                            Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
                    </tr>    
                </tbody>
            </table>
<?php } ?>
        <!--      </td>
            </tr>
          </tbody>
        </table>-->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/jquery.min.js')?>"></script>
<?php if($print != ''){?>
<script>
 $(document).ready(function (){
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
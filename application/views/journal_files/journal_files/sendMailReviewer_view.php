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
</head><body>
    <?php 	$paper_no = $this->uri->segment(4);	
			$result2 = 'x'; $txtRound =''; $x=''; $other_file3 =''; $other_file ='';
	  
            if (strpos($paper_no, '.R') !== FALSE) {
   				$roundArray = explode(".", $paper_no);
        		$round = substr($roundArray[1], 1);
        		$paper_no = $roundArray[0];
        	} else {
    			$round = '';
			}
	  
			$paper = $this->journal_model->listPaper($x,$paper_no);
			foreach($paper->result() as $paper2){ }	
			$paper_id = $paper2->id;
			if($paper2->section == '1'){ 
				$section = "Research Articles"; 
			} else { 
				$section = "Review Articles"; 
			} 
	  
			$author_id = $paper2->author_id;
			$author_data = $this->journal_model->get_author2($author_id);
			foreach($author_data->result() as $author_data2){ }	
			$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add); 			

			$paperFile = $this->journal_model->get_paperFile($paper_id,$round);
			foreach($paperFile->result() as $paperFile2){ }	
			if($round !=''){
				$txtRound = '.R'.$round;
				$paper2->remarks = $paperFile2->remarks;
			}
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
	  
			$reviewer = $this->journal_model->get_reviewerList($paper_id,$round);
			foreach($reviewer->result() as $reviewer2){
				//$txt = 'agree/'.$paper_id.'/'.$reviewer2->reviewer_id.'/'.$paper_no;	
				//$txt2 = 'notagree/'.$paper_id.'/'.$reviewer2->reviewer_id.'/'.$paper_no;				
				$editor_data = $this->journal_model->get_nameEditor($reviewer2->reviewer_id);
				foreach($editor_data->result() as $editor_data2){}
			}
   ?>
<!--<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
  <tbody>
    <tr>
      <td bgcolor="#EFEFEF">-->
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" id="table2">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor set reviewer</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear <?php echo $editor_data2->name_sname;?>,</td> 
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID <?php echo $paper_no.$txtRound?> entitled <?php echo $paper2->title;?> with <?php echo $author_data2->salutation;?> <?php echo $author_data2->first_name;?> <?php echo $author_data2->last_name;?> as contact author has been submitted to the Journal of Environmental Management and Energy System (JEMES).<br><br>Journal of Environmental Management and Energy System is a scientific and technological journal published by Faculty of Environmental Management, Prince of Songkla University (PSU). We have published a wide variety of articles and features from researchers and scientists at PSU and also other institutions. All articles must be reviewed by expert reviewers in each field before publishing.<br><br>We, the editorial board of Journal of Environmental Management and Energy System would like to invite you to review the manuscript as an expert in this field.<br><br>Please let me know as soon as possible if you will be able to accept my invitation to review. If you are unable to review at this time, I would appreciate you recommending another expert reviewer. You may e-mail me with your reply or click the appropriate link at the bottom of the page to automatically register your reply with our online manuscript submission and review system.<br><br>I realize that our expert reviewers greatly contribute to the high standards of the Journal, and I thank you for your present and/or future participation.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
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
              <td height="28" align="left" width="85%"><?php echo $author_data2->salutation;?> <?php echo $author_data2->first_name;?> <?php echo $author_data2->last_name;?></td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Email:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left"><?php echo $author_data2->email;?></td>
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
              <td height="28" align="left" valign="top"><?php echo $paper2->title;?></td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="<?php echo base_url().$paperFile2->file_pdf?>" target="_blank"><?php echo $this->journal_model->name_paperFile($paperFile2->file_pdf);?></a><br>
                2. <a href="<?php echo base_url().$paperFile2->file_word?>" target="_blank"><?php echo $this->journal_model->name_paperFile($paperFile2->file_word);?></a></td>
            </tr>
            <tr>
              <td height="27" align="right"><strong>Section:</strong></td>
              <td>&nbsp;</td>
              <td height="27" align="left"><?php echo $section?></td>
            </tr>
			<?php echo $other_file3?>  
            <tr>
              <td height="28" align="right" valign="top"><strong>Abstract:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top"><?php echo $paper2->abstract;?></td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top"><?php echo $paper2->remarks;?></td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Submit Date:</font></strong></td>              
            </tr>
            <tr>
              <td height="28" align="right"><strong>Submit Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004"><?php echo $dateSubmit?></td>
            </tr>
            <tr>
              <td height="28" align="right">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>			
			</tbody>
        </table>       	
		  
		  <a href="#<?php //echo base_url('CMS_Journal/action_from_mail/'.$txt.'')?>"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 125px; height: 60px; font-size: 16pt; font-weight: 600; color: #ffffff; border:0px; cursor: pointer;">Agree</button></a>&nbsp;&nbsp;&nbsp;
		  
		  <a href="#<?php //echo base_url('CMS_Journal/action_from_mail/'.$txt2.'')?>"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #999; width: 175px; height: 60px; font-size: 16pt; font-weight: 600; color: #ffffff; border:0px; cursor: pointer;">Not Agree</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#EFEFEF" height="60" align="center" valign="bottom"><img src="<?php echo base_url('journal-html/images/social.jpg')?>" width="237" height="49" alt=""/></td>
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
<!--</td>
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
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
      <td bgcolor="#EFEFEF">	-->
<?php 	//$paper_no = $this->uri->segment(4);
        if(strpos($paper_no, '.R') !== FALSE){
   			$roundArray = explode(".", $paper_no);
        	$round = substr($roundArray[1], 1);
        	$paper_no = $roundArray[0];
		}else{
    		$round = '';
		}				
		$result2 = 'x';  $txtRound ='';	 	  
	  	$date_start = $date2;		  	  
		$today3 = date('j F Y', strtotime($date_start. ' +10 days')); 
	  	//$today3 = date("j F Y");		
		$x='';
		$paper = $this->journal_model->listPaper($x,$paper_no);
		foreach($paper->result() as $paper2){ }	
        $paper_id = $paper2->id;
	  
		if($paper2->section == '1'){ 
			$section = "Research Articles"; 
		} else { 
			$section = "Review Articles"; 
		}                
		$dateSubmit = $this->journal_model->GetEngDate($paper2->date_add);
		
		$editData = $this->journal_model->get_paperFile($paper_id,$round);
		foreach($editData->result() as $editData2){}
		$sentDate = $this->journal_model->GetEngDate($editData2->date_add);
		 if($round !=''){
			$txtRound = '.R'.$round;		
		}
		$editor_data = $this->journal_model->get_nameEditor($paper2->editor_id);
		foreach($editor_data->result() as $editor_data2){ }	
		$author_id = $paper2->author_id;
		$author = $this->journal_model->get_author2($author_id);
		foreach($author->result() as $author2){ }	
		$name = $author2->salutation.' '.$author2->first_name.' '.$author2->last_name;
		
//		$from_email = 'jemes.envi@gmail.com';
//		$to_email = $editor_data2->email;
//		$subject = "Manuscript ID ".$paper_no.$txtRound." now in your Editor Center";
    ?>
    <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" id="table2">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Author sent edit</td>
    </tr>
    <tr>
      <td height="355" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear <?php echo $editor_data2->name_sname?>,</td>
            </tr>
            <tr>
              <td height="81" colspan="3"><br>Manuscript ID <?php echo $paper_no.$txtRound?> entitled “<?php echo $paper2->title?>” with <?php echo $name?> as contact author has been assigned to you and is currently sitting in your Editor Center at <?php echo base_url('CMS_Journal')?>.<br><br>Kindly select reviewers for this manuscript by <?php echo $today3?>.<br>Please select at least 3 reviewers who are NOT in the same affiliation as Submitting Author. To add new reviewers, you can go to “<?php echo base_url('CMS_Journal')?>.”<br>If, for any reason, you are unable to serve as Editor for this manuscript, please notify me immediately so that I can reassign it.<br><br>When assigning reviewers, be sure to check if the author has any suggested/non-preferred reviewers.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>
            <tr>
              <td height="10" colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Edit Round <?php echo $round?></font></strong></td>
              <!--<td width="1%" bgcolor="#F3F3F3">&nbsp;</td>
              <td width="85%" height="28" bgcolor="#F3F3F3">&nbsp;</td>-->
            </tr>
            <tr>
              <td height="28" align="right" valign="top" width="10%"><strong>Note:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top" width="87%"><?php echo $editData2->remarks?></td>
            </tr>
            <tr>
              <td height="10" align="right" valign="top">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right" valign="top"><strong>File:</strong></td>
              <td valign="top">&nbsp;</td>
              <td height="28" align="left" valign="top">1. <a href="<?php echo base_url().$editData2->file_pdf?>" target="_blank"><?php echo $this->journal_model->name_paperFile($editData2->file_pdf)?></a><br>
                2. <a href="<?php echo base_url().$editData2->file_word?>" target="_blank"><?php echo $this->journal_model->name_paperFile($editData2->file_word)?></a></td>
            </tr>
            <tr>
              <td height="28">&nbsp;</td>
              <td>&nbsp;</td>
              <td height="28" align="left">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" bgcolor="#F3F3F3" colspan="3"><strong><font color="#48b3ba">&nbsp; Sent Date:</font></strong></td>
              <!--<td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" bgcolor="#F3F3F3">&nbsp;</td>-->
            </tr>
            <tr>
              <td height="28" align="right"><strong>Sent Date:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left" style="color:#FF0004"><?php echo $sentDate?></td>
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
              <!--<td bgcolor="#F3F3F3">&nbsp;</td>
              <td height="28" align="left" bgcolor="#F3F3F3">&nbsp;</td>-->
            </tr>
            <tr>
              <td height="10" align="right" valign="top" width="10%">&nbsp;</td>
              <td height="10" valign="top">&nbsp;</td>
              <td height="10" align="left" valign="top" width="87%">&nbsp;</td>
            </tr>
            <tr>
              <td height="28" align="right"><strong>Title:</strong></td>
              <td>&nbsp;</td>
              <td height="28" align="left"><?php echo $paper2->title?></td>
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
		        	
		  <a href="<?php echo base_url('CMS_Journal')?>" target="_blank"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer;">More Details &nbsp;&nbsp;<i class="fa fa-arrow-circle-o-right"></i> </button></a>
              
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
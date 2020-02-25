<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body {
			background-color: #efefef;
			margin: 0px;
			font-family: "Noto Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
			font-size: 10pt;
			color: #262626;
		}
		
		a {
			font-family: "Noto Sans", "Segoe UI", "Roboto", "Oxygen-Sans", "Ubuntu", "Cantarell", "Helvetica Neue", sans-serif;
			font-size: 10pt;
		}
		
		a:link {
			color: #8A8A8A;
			text-decoration: none;
		}
		
		a:visited {
			text-decoration: none;
			color: #22A8B0;
		}
		
		a:hover {
			text-decoration: none;
			color: #22A8B0;
		}
		
		a:active {
			text-decoration: none;
			color: #8A8A8A;
		}
	</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
<?php 	$editor_data = $this->journal_model->get_nameEditor($reviewer_id);
		foreach($editor_data->result() as $editor_data2){ }
	
		$x =''; $txtRound ='';
		$paper = $this->journal_model->listPaper($x,$paper_no);
		foreach($paper->result() as $paper2){ }
	
		$reviewer = $this->journal_model->get_reviewerList($paper_id,$round,$reviewer_id);
		foreach($reviewer->result() as $reviewer2){ }
	
		//$round = $this->journal_model->get_roundNumber(paper_id);
		if($round >0){
			$txtRound = '.R'.$round;
		}		
		$date_end = date('j F Y', strtotime($reviewer2->date_add . "+30 days"));
?>



	<!--<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EFEFEF">
		<tbody>
			<tr>
				<td bgcolor="#EFEFEF">-->
					<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url()?>journal-html/images/logo-jemes.jpg" width="393" height="116" alt=""/>
								</td>
							</tr>
							<tr>
								<td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Editor set reviewer</td>
							</tr>
							<tr>
								<td height="90" align="center" valign="top" bgcolor="#FFFFFF">
									<p>&nbsp;</p>
									<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
										<tbody>
											<tr>
												<td height="28" colspan="3">Dear <?php echo $editor_data2->name_sname?>,</td>
											</tr>
											<tr>
												<td height="55" colspan="3"><br>Thank you for agreeing to review Manuscript ID <?php echo $paper_no.$txtRound?> entitled “<?php echo $paper2->title?>” for Journal of Environmental Management and Energy System. Please try your best to complete your review by <?php echo $date_end?>.<br></td>
											</tr>											
										</tbody>
									</table>				
									<p>&nbsp;</p>									
								</td>
							</tr>
							
							<tr>
								<td height="38" align="center"><a href="<?php echo base_url()?>Journal" target="_blank"><?php echo base_url()?>Journal</a>
								</td>
							</tr>
							<tr>
								<td height="88" align="center" bgcolor="#6bced4" style="font-size: 10pt; color:#FFFFFF;">Faculty of Environmental Management, Prince of Songkla University,<br> Hat Yai, Songkhla 90112 Thailand<br> Tel: 66(0) 7428 6806 &nbsp; Email: jemes.envi@gmail.com</td>
							</tr>
						</tbody>
					</table>
				<!--</td>
			</tr>
		</tbody>
	</table>-->
 <script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
 <script>
	function sendMail(){		
		
		var paper_id = '<?php echo $paper_id?>';
		var reviewer_id = '<?php echo $reviewer_id?>';
		var paper_no = '<?php echo $paper_no?>';
		var name = '<?php echo $editor_data2->name_sname?>';
		var email = '<?php echo $editor_data2->email?>';
		var date_end = '<?php echo $date_end?>';
		var title = "<?php echo $paper2->title?>";
		var round = '<?php echo $round?>';
	 
	 	$.post('<?php echo base_url('Journal_Mail/sendMail_afterReviewerAction')?>' , { name : name , email : email , paper_id : paper_id , reviewer_id : reviewer_id , paper_no : paper_no , date_end : date_end , title : title , round : round }, function(data){
			
		})	
	}
	 
	$(document).ready(function(){
		sendMail();
	}) 
 </script>	
	
</body>

</html>
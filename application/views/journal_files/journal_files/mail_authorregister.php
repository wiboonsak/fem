<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
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
<?php	foreach($authorData->result() as $authorData2){ }	
		$pass = $authorData2->salutation.' '.$authorData2->first_name.' '.$authorData2->last_name;

?>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="center" bgcolor="#FFFFFF"><img src="<?php echo base_url('journal-html/images/logo-jemes.jpg')?>" width="393" height="116" alt=""/></td>
    </tr>
    <tr>
      <td height="59" align="center" bgcolor="#33C0C9" style="font-size: 18pt; color: #FFFFFF; font-weight: 800;">Journal of Environmental Management and Energy System - Account Created</td>
    </tr>
    <tr>
      <td height="200" align="center" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="28" colspan="3">Dear <?php echo $pass?>,</td>
            </tr>
            <tr>
              <td colspan="3"><br>Welcome to the Journal of Environmental Management and Energy System - Manuscripts site for online manuscript submission and review.<br><br>Your email <?php echo $authorData2->email?> for your account is as follows:<br><br>SITE URL: <?php echo base_url('Journal/Submission')?><br>EMAIL : <?php echo $authorData2->email?><br>PASSWORD : <?php echo $authorData2->password?><br><br>Thank you for your participation.<br><br>Sincerely,<br>Journal of Environmental Management and Energy System Editorial Office<br></td>
            </tr>            
			</tbody>
        </table>
        <p>&nbsp;</p>
		       	
		  <a href="<?php echo base_url('Journal/Submission')?>" target="_blank" style="text-align: center;"><button type="button" name="button" id="button" style="font-family: sans-serif; background-color: #33c0c9; width: 250px; height: 70px; font-size: 16pt; font-weight: 800; color: #ffffff; border:0px; cursor: pointer; text-align: center;">More Details</button></a>
              
      <p>&nbsp;</p>
      </td>
    </tr>
    <tr>
      <td height="60" bgcolor="#EFEFEF" align="center" valign="bottom"><img src="<?php echo base_url('journal-html/images/social.jpg')?>" width="237" height="49" alt=""/></td>
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
</body>
</html>
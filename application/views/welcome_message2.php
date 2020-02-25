<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>test</title>
</head>

<body>
	
	<?php echo anchor('Welcome/index/en' , 'English');?> |
	<?php echo anchor('Welcome/index/th' , 'TH');?> |
	<br><br>
	
	<?php echo $message;?>
	
	
</body>
</html>
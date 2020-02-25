
<!DOCTYPE html>
<html lang="en">
<head>
  <title>QRcode</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   		<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/bootstrap.min.css" />
		<script src="<?php echo base_url(); ?>assets_saraban/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
 
  <div class="row" align="center">
 
	
<?php
 
			$chkName_Type = "";
	foreach ($viewQRcode as $viewQRcode): 

		if ($viewQRcode['Type'] != $chkName_Type ) {
			
		$chkName_Type = $viewQRcode['Type'];
		?>	
			<div class="col-xs-12">
				<h1><?php echo $ID_Bill;?></h1>
				<h3><?php echo $chkName_Type;?></h3>
			</div>

		<?php
		for($i = 0;$i<$viewQRcode['Number'];$i++){
	?>
				<div class="col-xs-2">
				
				<div><img src="<?php echo base_url('uploads/qr_image/'.$viewQRcode['ID_PD'].$viewQRcode['ID_Order'].'.png' ); ?>" alt="QRCode Image"></div>
				<div><?php echo $viewQRcode['Type']; ?></div>
			</div>
		<?php
		}
	}
	 endforeach
	?>	
  </div>
</div>
<script>
	$(document).ready(function(){
	 	window.print();
	});
</script>
</body>
</html>
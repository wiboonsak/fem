<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="<?php echo base_url(); ?>assets_saraban/images/favicon.ico">

	<title>ระบบงานสารบรรณ - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์ </title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/custom.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/skins/facebook.css">		

	<script src="<?php echo base_url(); ?>assets_saraban/js/jquery-1.11.3.min.js"></script>
	<!-- text fonts --> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/custom-font.css" />
<?php
  if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['status'] == "admin_saraban") {
     $firstname = ($this->session->userdata['logged_in']['firstname']);
     $lastname  = ($this->session->userdata['logged_in']['lastname']);
     $id 		= ($this->session->userdata['logged_in']['id']);
  } else {
  ?>

  <script type="text/javascript">

	alert('session ของคุญหมดอายุกรุณาเข้าสู้ระบบอีกครั้ง');
	window.location.assign("<?php echo base_url(); ?>Saraban/login_user")
  	 
  </script>
   
 <?php
  }
?>	 

	<!--[if lt IE 9]><script src="assets_saraban/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container horizontal-menu">
	
	<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- logo -->
			<div class="navbar-brand">
				<?php if(($this->session->userdata['logged_in']['status']) == "user"){ ?>
					<a href="<?php echo base_url(); ?>Saraban/index">
						<img src="<?php echo base_url(); ?>assets_saraban/images/logo-fem.png" width="88" alt="" />
					</a>
				<?php }else if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){ ?>
					<a href="<?php echo base_url(); ?>Saraban/list_saraban">
						<img src="<?php echo base_url(); ?>assets_saraban/images/logo-fem.png" width="88" alt="" />
					</a>
				<?php }else if(($this->session->userdata['logged_in']['status']) == "approve"){ ?>
					<a href="<?php echo base_url(); ?>Saraban/index">
						<img src="<?php echo base_url(); ?>assets_saraban/images/logo-fem.png" width="88" alt="" />
					</a>
				<?php } ?>
			</div>
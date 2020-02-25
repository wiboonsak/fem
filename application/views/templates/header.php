<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="<?php echo base_url(); ?>assets_saraban/images/favicon.ico">

	<title>รายงานการเดินทาง - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์ </title>

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

<?php
  if (isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']['status'] == "user") {
     $firstname = ($this->session->userdata['logged_in']['firstname']);
     $lastname  = ($this->session->userdata['logged_in']['lastname']);
     $id 		= ($this->session->userdata['logged_in']['id']);
  } else {


  ?>

  <script type="text/javascript">
	window.location.assign("<?php echo base_url(); ?>Inputform/login?saraban=<?php echo $idsaraban;?>")
  </script>
   
 <?php
  }
?>	 

</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container horizontal-menu">

	
	<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->
		
		<div class="navbar-inner">
		
			<!-- logo -->
			<div class="navbar-brand">
				<a href="<?php echo base_url(); ?>Allowance/index">
					<img src="<?php echo base_url(); ?>assets_saraban/images/logo-fem.png" width="88" alt="" />
				</a>
            </div> 
            

<!-- notifications and other links -->
<ul class="nav navbar-right pull-right">
				
				<!-- dropdowns -->
				
				
				<li >
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-user"></i>		
                            ยินดีต้อนรับ คุณ <?php echo  ($this->session->userdata['logged_in']['firstname'])." ".
                            $lastname  = ($this->session->userdata['logged_in']['lastname']);?>
					</a>

				
				</li>
				
				<!-- raw links -->
				
				<li>
					<a href="<?php echo base_url('Allowance/logout'); ?>">
						ออกจากระบบ <i class="entypo-logout right"></i>
					</a>
				</li>
				
				
				<!-- mobile only -->
				<li class="visible-xs">	
				
					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>
					
				</li>
				
			</ul>
	 
		</div>
		
	</header>
	
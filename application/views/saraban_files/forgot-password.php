<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="<?php echo base_url('assets_saraban/images/favicon.ico'); ?>">

	<title>ระบบสารบรรณ - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์ | Login</title>

	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/font-icons/entypo/css/entypo.css'); ?>">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/neon-core.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/neon-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/neon-forms.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/custom.css'); ?>">

	<script src="<?php echo base_url('assets_saraban/js/jquery-1.11.3.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/custom-font.css" />  

	<!--[if lt IE 9]><script src="assets_saraban/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	 <style type="text/css">
   	.error {
      color: white;
   }
   </style>

</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
	
<div class="login-container">
	
	<div class="login-header login-caret" style="background-color: #1c3b69 !important">
		
		<div class="login-content">
			
			<a href="proceed_application.html" class="logo">
				<img src="<?php echo base_url('assets_saraban/images/logo-fem.png'); ?>" width="120" alt="" />
			</a>
			
			<p class="description" style="color: white; font-size: 20px">User Forgot Password </p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>		
	</div>
	
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">

			<div class="form-login-error">
				<h3>
This email is invalid or not available in the system.</h3>
			</div>
			<div class="form-register-success">
					<i class="entypo-check"></i>
					<h3>New password has been sent to your email.</h3>
				</div>

		
			<form method="post" role="form" id="form_register">

				<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-block btn-login">
								Send Email
							</button>
						</div>
				
			</form>
			
			
			<div class="login-bottom-links">

				<a href="<?php echo base_url('Saraban/login_user'); ?>" class="link">Return to Login  </a><br>

				<br />
				<br /><br />
				<strong style="color: white; font-size: 12px"> &copy; 2018 ระบบสารบรรณ<br> คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์</strong>
				
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom scripts (common) -->
	<script src="<?php echo base_url('assets_saraban/js/gsap/TweenMax.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/bootstrap.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/joinable.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/resizeable.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/neon-api.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/jquery.validate.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/neon-forgotpassword-S-user.js'); ?>"></script>
	<script src="<?php echo base_url('assets_saraban/js/jquery.inputmask.bundle.js'); ?>"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url('assets_saraban/js/neon-custom.js'); ?>"></script>

	<!-- JavaScripts alert -->
	<script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

	<!-- Demo Settings -->
	<script src="<?php echo base_url('assets_saraban/js/neon-demo.js'); ?>"></script>

	<script type="text/javascript">
		$('#confirm_password	').on('keyup', function () {
	 
		 		if ($('#password').val() == $('#confirm_password').val()) {
				    $('#message').html('Matching').css('color', 'green');
				} else 
				    $('#message').html('Not Matching').css('color', 'red');
		});
	</script>

</body>
</html>
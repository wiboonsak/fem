<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	<link rel="icon" href="<?php echo base_url('assets_saraban/images/favicon.ico'); ?>">

	<title>ระบบเบิกค่าเดินทาง - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์ | Login</title>

	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/font-icons/entypo/css/entypo.css'); ?>">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/neon-core.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/neon-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/neon-forms.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets_saraban/css/custom.css'); ?>">

	<script src="<?php echo base_url('assets_saraban/js/jquery-1.11.3.min.js'); ?>"></script>

	<!--[if lt IE 9]><script src="assets_saraban/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/css/custom-font.css" />  
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
			
			<p class="description" style="color: white; font-size: 20px">Allowance Administrator Login</p>
			
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
				<h3>Invalid login</h3>
				<p> <strong>username</strong> or <strong>password</strong> incorrect.</p>
			</div>
			
			<form method="post" role="form" id="form_login">
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off"/>
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input style="display:none" type="password" name="fakepasswordremembered"/>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-blue btn-block btn-login">
						<i class="entypo-login"></i>
						LogIn
					</button>
				</div>
				
				
			</form>			
			<div class="login-bottom-links">

				<a href="<?php echo base_url('allowance/login_user'); ?>" class="link" id="login22" >Return to user Login  </a><br>
				<!--<a href="<?php echo base_url('allowance/forgotpassword'); ?>" class="link">Forgot your password?</a>-->
				
				<br />
				<br /><br />
				<strong style="color: white; font-size: 12px"> &copy; 2018 ระบบเบิกค่าเดินทาง<br> คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์</strong>
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
	<script src="<?php echo base_url('assets_saraban/js/neon-login-admin.js'); ?>"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url('assets_saraban/js/neon-custom.js'); ?>"></script>


	<!-- Demo Settings -->
	<script src="<?php echo base_url('assets_saraban/js/neon-demo.js'); ?>"></script>
	

</body>
</html>
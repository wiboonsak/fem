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
			
			<p class="description" style="color: white; font-size: 20px">Register</p>
			
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
				<h3>Duplicate</h3>
			</div>
		
			<form method="post" role="form" id="form_register">
				
				<div class="form-register-success">
					<i class="entypo-check"></i>
					<h3>You have been successfully registered.</h3>
				</div>
			
				<div class="form-steps">
					
					<div class="step current" id="step-1">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								<input type="text" class="form-control" name="tname" id="tname" placeholder="Name Title นาย,นาง,นางสาว,ดร. เป็นต้น" autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" autocomplete="off"  />
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-phone"></i>
								</div>
								
								<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" data-mask="phone" autocomplete="off" />
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<select  type="text" class="form-control" name="position_level" id="position_level" autocomplete="off" style="color: gray">
									<option disabled selected >Position Level</option>
									<option value="3" >คณบดี</option>
									<option value="1">อาจารย์</option>
									<option value="2">เจ้าหน้าที่</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user"></i>
								</div>
								
								<input type="text" class="form-control" name="position_name" id="position_name" placeholder="Position Name"  autocomplete="off" />
							</div>
						</div>
						
						<div class="form-group">
							<button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Next Step
							</button>
						</div>
						
						<div class="form-group">
							Step 1 of 2
						</div>
					
					</div>
					
					<div class="step" id="step-2">
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-user-add"></i>
								</div>
								
								<input type="text" class="form-control" name="username" id="username" placeholder="Username" data-mask="[a-zA-Z0-1\.]+" data-is-regex="true" autocomplete="off" />
							</div>
							<span id='username_error'></span>
						</div>
					
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-mail"></i>
								</div>
								
								<input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" />
							</div>
							<span id='email_error'></span>
						</div>

						
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="password" id="password" placeholder="Choose Password" autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="entypo-lock"></i>
								</div>
								
								<input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" autocomplete="off" />

							</div>
							<span id='message'></span>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-block btn-login">
								<i class="entypo-right-open-mini"></i>
								Complete Registration
							</button>
						</div>
						
						<div class="form-group">
							Step 2 of 2
						</div>
						
					</div>
					
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">

				<a href="<?php echo base_url('Saraban/login_user'); ?>" class="link">Return to Login Page  </a><br>
				<a href="<?php echo base_url('Saraban/forgotpassword'); ?>" class="link">Forgot your password?</a>

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
	<script src="<?php echo base_url('assets_saraban/js/neon-register.js'); ?>"></script>
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
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>Faculty of Environmental Management - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์</title>
<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>">	
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Simple User Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, SonyErricsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->
<!-- Style --> <link rel="stylesheet" href="<?php echo base_url('login_library/css/style.css')?>" type="text/css" media="all">	
	
</head>
<body>
<div class="container">
<h1>Control Management System</h1>
     <div class="contact-form" style="width: 43%;">
	 <div class="signin">
	 <?php //if(isset($msg)){ echo $msg;	}?> 
	 <span style="color: #F96D6E; display: none" id="notLogin">ไม่สามารถเข้าสู่ระบบได้ กรุณาลองอีกครั้ง</span>	 
     <!--<form action="<?php //echo base_url('login/LoginUser')?>" method="post" id="frmLogin" name="frmLogin" >-->
     <form id="frmLogin" name="frmLogin" action="<?php echo base_url('control/LoginUser')?>" method="post" >
	     <input type="text" class="user" id="Username" name="Username" placeholder="Enter Your Username" />
		 <input type="password" class="pass" id="Password" name="Password" placeholder="Enter Your Password" />		 
        					
         <input type="button" value="Login" class="signinBtn" onClick="checkFrmLogin()" />	
		 <div style="font-size: smaller;"><a href="<?php echo base_url('ForgotPassword')?>" style="color: #000000; " data-toggle="modal" data-target="#login-modal">Forgotten your password?</a></div>
		 <!-- <p><a href="#">Lost your password?</a></p> --> 
     </form>
	 </div>
	 </div> 
</div>
<!--<div class="footer">
     <p>Copyright &copy; 2015 Simple User Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>-->
	
	
	
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>

<script>
		function checkFrmLogin(){  
			var Username = $('#Username').val();
			var Password = $('#Password').val();  
			//console.log(Username+' '+Password)
			if(Username == ''){
				$('#Username').focus();
				return false;
			} else if(Password == ''){
				$('#Password').focus();
				return false;				
			} else {  
				//$('#frmLogin').submit();
				$.post('<?php echo base_url('login/LoginUser')?>' , { Username : Username , Password : Password }  , function(data){    
					//console.log(data);
					if(data != '0'){ 
						var user1 = '<?php echo $this->session->userdata('user_id')?>';
						
						var link = '<?php echo base_url('Control')?>';
						window.location.href = link;
					} else { 							
						$('#notLogin').show();
						$('#Username').val('');
						$('#Password').val('');  
						
					}				
				})
			}
		}
</script>	
	
	
</body>
</html>
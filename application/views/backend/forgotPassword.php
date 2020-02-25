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
<?php if($txt !=''){ ?>	
<h1>Reset Your Password</h1>
<?php } else {  ?>	
<h1>User Forgot Password</h1>
<?php } ?>	

     <div class="contact-form" style="width: 45%;">
	 <div class="signin" id="signin" <?php if($txt !=''){ ?>style="display: none"<?php } ?>  >
	
     <form id="frmLogin" name="frmLogin" action="<?php echo base_url('control/LoginUser')?>" method="post" >
		 <div style="color: #000000;">Enter your e-mail address below and we'll send you a link to reset your password.</div>
		 
	     <input type="text" class="user" id="mail" name="mail" placeholder="Enter Your E-mail" />
		 <br><span style="color: #F96D6E; display: none" id="notLogin"><strong>This email is invalid or not available in the system.</strong><br><br></span>			 
        					
         <input type="button" value="Send Email" class="signinBtn" onClick="checkEmail()" />	
		 
     </form>
	 </div>
	
	 <div class="signin" id="signin2" style="display: none">	  
	 
     <form id="frm2" name="frm2" method="post">	 
	     
		 <p style="color: #F96D6E;font-weight: bold;margin-top: 0px;font-size: larger;" id="txt2">A link to reset your password has been successfully sent to your email.</p>			 
        					
         <input type="button" value="Login" class="signinBtn" onclick="window.location.href='<?php echo base_url('Login')?>'">	
		 
     </form>
	 </div>
		 
		 
	 <?php $user3=''; if($txt !=''){ ?>	 
	 <div class="signin" id="signin3">
	
     <form id="frmReset" name="frmReset" method="post" >
		 <div style="color: #000000;">Enter your new password.</div><br>
		 
	     <input type="password" class="pass" id="Password" name="Password" placeholder="Enter Your New Password" />
		 <input type="password" class="pass" id="Password2" name="Password2" placeholder="Enter Confirm Password" />
		        					
         <input type="button" value="Save" class="signinBtn" onClick="saveNewPass()" />	
		 
		 <?php $user1 = substr($txt,5,strlen($txt));
		 	   $user2 = explode("#",$user1);
			   $user3 = $user2[0];			 
		 ?> 
		 
     </form>
	 </div>	 
	 <?php } ?>	 
		 
	 </div> 
</div>
<!--<div class="footer">
     <p>Copyright &copy; 2015 Simple User Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>-->
	
	
	
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>

<script>
		function checkEmail(){  
			var mail = $('#mail').val();
			
			if(mail == ''){
				$('#mail').focus();
				return false;
							
			} else {  
				//$('#frmLogin').submit();
				$.post('<?php echo base_url('ForgotPassword/checkEmail')?>' , { mail : mail }  , function(data){    
					//console.log("1......"+data);
					if(data != '0'){ 
						var userID = data;
						$.post('<?php echo base_url('ForgotPassword/sendMail_forgotPassword')?>' , { mail : mail , userID : userID }  , function(data2){   // console.log("2..."+data2);
						
							if(data2 =='1'){
							  /* $('#notLogin').html('<h4>We sent link reset password page to your e-mail<h4>');*/
							   $('.contact-form').css("width", "50%");
								
							   $('#signin').hide();	
							   $('#signin2').show();	
							}						
						})						
						
					} else { 							
						$('#notLogin').show();						
						$('#mail').val('');  
						
					}				
				})
			}
		}
/////////////////////////////////////////////////////	
	
	function saveNewPass(){  
			var Password = $('#Password').val();
			var Password2 = $('#Password2').val();
			var myId = '<?php echo $user3?>';
			
			if(Password == ''){
				alert("Please enter your new password.");
				$('#Password').focus();
				return false;
				
			} else if(Password2 == ''){
				alert("Please enter confirm password.");
				$('#Password2').focus();
				return false;
				
			} else if(Password != Password2){
				alert("Password and confirm password don't match.");				
				$('#Password2').focus();
				return false;	
							
			} else {  
				
				$.post('<?php echo base_url('ForgotPassword/save_newPass')?>' , { Password : Password , myId : myId }  , function(data){    
					
						
							if(data ==1){
							   $('.contact-form').css("width", "40%"); 								
							   $('#signin3').hide();	
							   $('#txt2').text('Your password has been reset successfully.');	
							   $('#signin2').show();	
							}						
						})						
						
					} 				
			}
		
</script>	
	
	
</body>
</html>
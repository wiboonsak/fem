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
	<style>
		body {
			background-color: #00aba6 !important;
			font-family: Cabin-Regular;
		}
	
	</style>
</head>
<body>
<div class="container">
    <h1 style="color: #ffffff; font-size: 34px;" >Journal of Environmental Management and Energy System<br>( JEMES Back Office )</h1>
<?php if($txt !=''){ ?>	
<h2 style="color: #ffffff;text-align: center; ">Reset Your Password</h2>
<?php } else {  ?>	
<h2 style="color: #ffffff;text-align: center; ">User Forgot Password</h2>
<?php } ?>	
<div class="contact-form" style="width: 43%;">
	 <?php $user3=''; if($txt !=''){ ?>

	 <div class="signin" id="signin3">
	
     <form id="frmReset" name="frmReset" method="post" >
         
		 <div style="color: #000000;">Enter your new password.</div><br>
		 
	     <input type="password" class="pass" id="Password" name="Password" placeholder="Enter Your New Password" />
		 <input type="password" class="pass" id="Password2" name="Password2" placeholder="Enter Confirm Password" />
		        					
         <input type="button" value="Save" class="signinBtn" style="background-color: #007b77; color: #ffffff;" onClick="saveNewPass()" />	
		 
		  <?php $user1 = substr($txt,5,strlen($txt));
		 	   $user2 = explode("#",$user1);
			   $user3 = $user2[0];	
                          
		 ?> 
     </form>
	 </div>	 
	 <?php } ?>	 
</div> 
	 </div> 
</div>
<!--<div class="footer">
     <p>Copyright &copy; 2015 Simple User Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
</div>-->
	
	
	
<script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>

<script>
		
	
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
				$.post('<?php echo base_url('Journal/save_newPass2')?>' , { Password : Password , myId : myId }  , function(data){
                    if(data ==1){
                        alert('Your password has been reset successfully.');
                        window.location.href='<?php echo base_url('CMS_Journal')?>';
                    }
			
		});  
					} 				
			}
		
</script>	
	
	
</body>
</html>
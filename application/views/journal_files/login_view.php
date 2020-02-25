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
<link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico')?>">	
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
<h1 style="color: #ffffff; font-size: 34px;" id="exampleModalLabel">Journal of Environmental Management and Energy System<br>( JEMES Back Office )</h1>
<h2 id="forgot_password" style="color: #ffffff; text-align: center; display: none">Forgot your password</h2>
     <div class="contact-form" style="width: 43%;">
	 <div class="signin">
	 <?php //if(isset($msg)){ echo $msg;	}?> 
	 <span style="color: #F96D6E; display: none" id="notLogin">Username or Password Incorrect !</span>	  
     <form>
          <p class="col-form-label" id="labelForgot" style="display: none">Enter your e-mail address below and we'll send you a link to reset your password.<br></p>
	     <input type="text" class="user" id="Username" name="Username" placeholder="Enter Your Username" />
		 <input type="password" class="pass" id="Password" name="Password" placeholder="Enter Your Password" />		 
		 <input style="display: none" type="text" class="user" id="mail" name="mail" placeholder="Enter Your E-mail" />		 
        					
         <input type="button" value="Login" class="signinBtn" id="login5" onClick="checkFrmLogin()" style="background-color: #007b77; color: #ffffff;" />	
         <input type="button" class="signinBtn" id="sendMail5" style="background-color: #007b77; color: #ffffff; display: none;" onClick="check_Email2()" value="Send Email">
        <p id="p_forgot"><a href="#" onClick="show_ForgotPassword()">Forgot your password?</a></p>       		
     </form>
         </div>
</div>
</div>
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
				$.post('<?php echo base_url('Journal_Login/LoginUser')?>' , { Username : Username , Password : Password } , function(data){    
					//console.log(data);
					if(data != '0'){ 
						var user1 = '<?php echo $this->session->userdata('juser_id')?>';
						
						var link = '<?php echo base_url('CMS_Journal')?>';
						window.location.href = link;
					} else { 							
						$('#notLogin').show();
						$('#Username').val('');
						$('#Password').val('');  
						
					}				
				})
			}
		}
                //----------------------------
	
    function show_ForgotPassword(){ 
		$('#Password').hide();
		$('#labelForgot').hide();
		$('#Username').hide();
		$('#login5').hide();
		$('#p_forgot').hide();
		$('#forgot_password').show();		
		$('#labelForgot').show();		
		$('#sendMail5').show();		
		$('#mail').show();		
	}
          //---------------------------------------------
	
    function check_Email2(){
		
		var type = '2';
		var email = $('#mail').val();	
		
		if(email ==''){
			var txt = 'Please insert your Email Address.';                                
			alert(txt);				
			$('#mail').focus();
			return false;	              
                        
		} else {
			
            var table = 'tbl_journal_user';
            $.post('<?php echo base_url('Journal/check_Email')?>',{ email : email, table : table }, function(data){ 
				
                if(data >0){  
					   
						$.post('<?php echo base_url('Journal_Mail/mail_forgotPassword')?>' , { email : email , type : type , userID : data} , function(data){
							//console.log(data);
							if(data == 1){
									alert('A link to reset your password has been successfully sent to your email.');
									var url = '<?php echo base_url('CMS_Journal')?>';                 window.location.href = url;
							}
						});
					
				} else {
                    var txt = 'This email is invalid or not available in the system.';
                    alert(txt);	
					$('#Username').val('');
					$('#Username').focus();
                    return false;	
                }			
			});
       }
	//return true
	}
	//----------------------------
	
</script>	
	
	
</body>
</html>
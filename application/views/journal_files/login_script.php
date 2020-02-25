<script type="text/javascript">
  function login(){
		
		var username = $('#usernameL').val();
		var password = $('#passwordL').val();
		
		if((username !='') && (password !='')){
		
			$.post('<?php echo base_url('Journal/AuthorLogin')?>' , { username : username , password : password }, function(data){ 

				if(data !='0'){
					window.location.href = "<?php echo base_url('Journal/myData')?>";				
				
				} else {
					alert('Username or Password Incorrect !');	
					return false;					
				}				
			})
		}		
	}
    //---------------------------------------------
	
    function alumniForgot(){
		
		var type = '1';
		var email = $('#usernameL').val();	
		
		if(email ==''){
			var txt = 'Please insert your Email Address.';                                
			alert(txt);				
			$('#usernameL').focus();
			return false;	              
                        
		} else {
			
            var table = 'tbl_authors_data';
            $.post('<?php echo base_url('Journal/check_Email')?>',{ email : email, table : table }, function(data){ 
				
                if(data >0){  
					   
						$.post('<?php echo base_url('Journal_Mail/mail_forgotPassword')?>' , { email : email , type : type , userID : data} , function(data){
							//console.log(data);
							if(data == 1){
									alert('A link to reset your password has been successfully sent to your email.');
									var url = '<?php echo base_url('Journal/Submission')?>';                 window.location.href = url;
							}
						});
					
				} else {
                    var txt = 'This email is invalid or not available in the system.';
                    alert(txt);	
					$('#usernameL').val('');
					$('#usernameL').focus();
                    return false;	
                }			
			});
       }
	//return true
	}
	//----------------------------
	
    function show_ForgotPassword(){ 
		$('#div_Password').hide();
		$('#exampleModalLabel').hide();
		$('#login5').hide();
		$('#p_forgot').hide();
		$('#forgot_password').show();		
		$('#labelForgot').show();		
		$('#sendMail5').show();		
	}
</script>	


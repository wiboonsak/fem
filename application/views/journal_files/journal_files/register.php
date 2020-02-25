<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Constro - Construction Business HTML5 Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Journal of Environmental Management and Energy System | JEMES</title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url('journal-html/images/favicon.ico')?>" />

<!-- Bootstrap -->
<link href="<?php echo base_url('journal-html/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />

<!--  Roboto font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

<!-- Mega Menu -->
<link href="<?php echo base_url('journal-html/css/mega-menu/mega_menu.css')?>" rel="stylesheet" type="text/css" />

<!-- Font Awesome -->
<link href="<?php echo base_url('journal-html/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />

<!-- Flaticon -->
<link href="<?php echo base_url('journal-html/css/flaticon.css')?>" rel="stylesheet" type="text/css" />

<!-- Magnific Popup -->
<link href="<?php echo base_url('journal-html/css/magnific-popup/magnific-popup.css')?>" rel="stylesheet" type="text/css">

<!-- Owl Carousel -->
<link href="<?php echo base_url('journal-html/css/owl-carousel/owl.carousel.css')?>" rel="stylesheet" type="text/css" />

<!-- revolution -->
<link href="<?php echo base_url('journal-html/revolution/css/settings.css')?>" rel="stylesheet" type="text/css">

<!-- General style -->
<link href="<?php echo base_url('journal-html/css/general.css')?>" rel="stylesheet" type="text/css" />

<!-- Main Style -->
<link href="<?php echo base_url('journal-html/css/style.css')?>" rel="stylesheet" type="text/css" />
<script src='https://www.google.com/recaptcha/api.js'></script>	

</head>

<body>

<!--=================================header -->
<?php include("header.php"); ?>
<!--================================= header -->

<!--================================= banner -->

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(<?php echo base_url('journal-html/images/bg/bg-1.jpg')?>);">
  <div class="container">
     <div class="row intro-title text-center">
           <div class="col-sm-12">
				<div class="section-title"><h1 class="title text-white">Current</h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><a href="current.php">Current</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Vol 35 No 1 (2018) Published: 2018-07-01</span> </li>
             </ul>
        </div>
     </div>
  </div>
</section>

<!--================================= banner -->

<!--================================= Page Section -->

<section class="page-section-ptb pb-60"><div class="container">
<!--
	<div class="row">
    	<div class="col-sm-12 mb-20">
    	<div class="section-title text-center">
			<h2 class="title">From the Blog</h2>
			<p>Construction Project Management (CPM) is the overall planning, coordination, and control of a project from beginning to completion but also the leap electronic typesetting. Neque porro quisquam.</p>
		</div>
   		</div>
    </div>
-->

        <div class="col-md-8 col-sm-12">
				

		<h2 class="title">Register</h2>
        <p>Fill in this form to register with this site.</p>
        

       <div class="defoult-form form-2">
        <!--<div id="formmessage" style="display:none">Success/Error Message Goes Here</div>-->
		   
           <form id="form1" name="form1" role="form" method="post" action="<?php echo base_url('Journal/AuthorRegister')?>" onSubmit="return formRegis()" >
              <!--<div class="form-group">
                  <label>Username*</label>
                    <div class="input-group">
                      <input id="username" type="text" placeholder="" class="form-control" name="username" onChange="checkMail(this.value , '2')" >
                    </div>
              </div>-->
			  <div class="form-group">
                <label>Email*</label>
                    <div class="input-group">
                    <input type="email" placeholder="" class="form-control" name="email" id="email" onChange="checkMail(this.value , '1'); check_allField()" >
                    </div>
              </div> 
              <div class="form-group half-group">
                  <label>Password*</label>
                    <div class="input-group">
                      <input type="password" placeholder="" class="form-control" name="password" id="password" onChange="check_allField()">
                    </div>
              </div>
              <div class="form-group half-group" style="padding-left: 10px;">
                  <label>Repeat Password*</label>
                    <div class="input-group">
                      <input type="password" placeholder="" class="form-control" name="repeatpassword" id="repeatpassword" onChange="check_allField()" >
                    </div>
              </div> 
              <div class="form-group">
                <label>Salutation</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="salutation" id="salutation" onChange="check_allField()" >
                    </div>
              </div>
               <div class="form-group">
                <label>First Name*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="first_name" id="first_name" onChange="check_allField()" >
                    </div>
              </div>
              <div class="form-group">
                <label>Middle Name</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="middle_name" id="middle_name" onChange="check_allField()" >
                    </div>
              </div>
              <div class="form-group">
                <label>Last Name*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="last_name" id="last_name" onChange="check_allField()">
                    </div>
              </div>
              
              <div class="form-group">
                <label>Affliation*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="affliation" id="affliation" onChange="check_allField()" >
                    </div>
              </div>
              <div class="form-group">
                <label>Country*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="country" id="country2" onChange="check_allField()" >
                    </div>
              </div>
              <div class="form-group">
			   <p>Would you be willing to review submissions to this journal?</p>
			   <p><input type="checkbox" id="check1" name="check1" onClick="requestReviewer(this.checked , '1')" > Yes, request the reviewer role.</p>
			   <!--<p>Denotes required field.</p>-->
			   <p><input type="checkbox" id="check0" name="check0" onClick="requestReviewer(this.checked , '0')" > No, I'm not interested.</p>
			   <!--<p>Denotes required field.</p>-->
			   <p><strong>Privacy Statement</strong></p>
			   <p>The names and email addresses entered in this journal site will be used exclusively for the stated purposes of this journal and will not be made available for any other purpose or to any other party.</p>
			   </div>
			   
			   <input type="hidden" name="checkVal" id="checkVal" value="" >
			   <input type="hidden" name="check_request" id="check_request" value="" >
                          
              <div class="form-group">
                  	<!--<input type="hidden" name="action" value="sendEmail"/>-->
				  	<div class="g-recaptcha" data-sitekey="6LdtZIYUAAAAAMZiXMVtJuZfOEa_YzQFuVGn1Qjz" data-callback="makeaction" ></div>
				   
                	<button id="btn_submit" name="submit" type="submit" class="button border animated middle-fill" ><span>Register</span></button><!--onClick="formRegis()"-->
                	<button type="button" class="button border animated middle-fill" data-toggle="modal" data-target="#login"><span>Login</span></button>
              </div>
            </form>
            <div id="ajaxloader" style="display:none"><img class="center-block" src="images/loading.gif" alt=""></div> 
            </div>
       
        </div>

<div class="col-md-4 col-sm-12"><div class="post-sidebar">
     
      <!--<div class="sidebar-widget">
        <h4 class="widget-title">About Blog</h4>
        <p>Lorem ipsum dolor sit ametLorem Ipsum Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,<br><br>
        lorem quis bibendum auctor, consequat ipsum, nec sagittis sem nibh id elit nibh vel velit auctor aliquet. sem nibh Aenean sollicitudin,</p>
      </div>-->
      <div class="sidebar-widget">
        <h4 class="widget-title">Manual</h4>
           <ul class="widget-ul list-unstyled list-arrow">
             <li><a href="#">For Author </a></li>
             <li><a href="#">For Reviewer </a></li>
           </ul>
      </div>
      <div class="sidebar-widget">
        <h4 class="widget-title">Information</h4>
           <ul class="widget-ul list-unstyled list-arrow">
             <li><a href="#">For Readers </a></li>
             <li><a href="#">For Authors </a></li>
             <li><a href="#">For Librarians </a></li>
           </ul>
      </div>

   <div class="sidebar-widget archives-widget">
       <h4 class="widget-title">Archives</h4>
      <?php 
            $countAll1 = $this->journal_model_2->get_archive('-100','-100');
            $countRow1 = $countAll1->num_rows(); 
        $totalRow1 = ceil($countRow1/$perpage);
           foreach ($getarchive->result() as $getarchive3) { ?>
         <ul class=" list-unstyled list-arrow">
           <li><a href="<?php echo base_url('Journal/archive_detail/').$getarchive3->id?>"><span><?php echo $getarchive3->journal_name ?></span></a></li>
          
         </ul>
           <?php }?>
    </div> 
       <div class="sidebar-widget">
     <h4 class="widget-title">Tags</h4>
       <ul class="tags list-inline">
        <li><a href="#">Journal</a></li>
        <li><a href="#">Environmental</a></li>
        <li><a href="#">Management</a></li>
        <li><a href="#">Energy</a></li>
        <li><a href="#">System</a></li>
        <li><a href="#">JEMES</a></li>
        <li><a href="#">PSU</a></li>
      </ul>
   </div>                    
</div></div>
</div>
        
</div></section>
<!--================================= page-section -->


<!--=================================footer -->
  <?php include("footer.php"); ?>
 <!--=================================footer -->

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-chevron-up"></i></a></div>

<!--================================= jquery -->

<!-- jquery  -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/jquery.min.js')?>"></script>

<!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/bootstrap.min.js')?>"></script>

<!-- appear -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/jquery.appear.js')?>"></script>

<!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/mega-menu/mega_menu.js')?>"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/owl-carousel/owl.carousel.min.js')?>"></script>

<!-- isotope -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/isotope/isotope.pkgd.min.js')?>"></script>

<!-- magnific -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/magnific-popup/jquery.magnific-popup.min.js')?>"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/jquery.themepunch.revolution.min.js')?>"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.actions.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.carousel.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.kenburn.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.layeranimation.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.migration.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.navigation.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.parallax.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.slideanims.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.video.min.js')?>"></script>

<!-- custom -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/custom.js')?>"></script>
	
<script>	
	
	function formRegis(){		
		
		//var username = $('#username').val();
		var password = $('#password').val();
		var repeatpassword = $('#repeatpassword').val();
		var email = $('#email').val();		
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();		
		var affliation = $('#affliation').val();		
		var country = $('#country2').val();		
		var check_request = $('#check_request').val();		
		
		/*if(username ==''){				
			alert('Please insert username.');				
			$('#username').focus();
			return false;*/
		if(email ==''){					
			alert('Please insert your Email Address.');				
			$('#email').focus();
			return false;	
			
		} else if(password ==''){					
			alert('Please insert your password.');				
			$('#password').focus();
			return false;
			
		} else if(repeatpassword ==''){					
			alert('Please insert confirm password.');				
			$('#repeatpassword').focus();
			return false;
			
		} else if(password != repeatpassword){						
			alert("Password and repeat password don't match.");				
			$('#repeatpassword').focus();
			return false;				
		
		} else if(first_name ==''){						
			alert('Please insert your First Name.');				
			$('#first_name').focus();
			return false;
			
		} else if(last_name ==''){						
			alert('Please insert your Last Name.');				
			$('#last_name').focus();
			return false;			
			
		} else if(affliation ==''){					
			alert('Please insert affliation.');				
			$('#affliation').focus();
			return false;
		
		} else if(country ==''){				
			alert('Please insert your country.');				
			$('#country2').focus();
			return false;				
			
	 	} else if(check_request ==''){						
			alert('Please check.');
			$('#check1').focus();
			return false;		
		
		} else {  
		
			/*var form_data = $('#form1').serialize();
			$.post('<?php //echo base_url('Journal/AuthorRegister')?>' , { form_data : form_data }, function(data){ 
				if(data > 0){								
					alert('Thank you, Register Successful.');
					window.location.href = "<?php //echo base_url('Journal/myData')?>";
				}
			})*/	
			return true;
		}  
	}
//////////////////////////////////////////////////////////////
		
	function checkMail(str,type){
		
		var format_mail=/^([a-zA-Z0-9]{1,})+([a-zA-Z0-9\_\-\.]{1,})+@([a-zA-Z0-9\-\_]{1,})+([.]{1,1})+([a-zA-Z0-9\-\_\.]{1,})$/;
				
		if((str !='') && (type =='1')){
		
			if(!(format_mail.test(str))) {							
				alert('Email not valid!');	
				$('#email').focus();
				return false;
				
			} else {
				$.post('<?php echo base_url('Journal/countEmail')?>' , { mail : str }, function(data){ 
				
						if(data >0){
						   alert('This email is already a member.');	
						   $('#email').focus();
						   return false;
						}				
				})				
			}
		} else {
			
			$.post('<?php echo base_url('Journal/countUsername')?>' , { username : str }, function(data){ 
				
				if(data >0){
					alert('This username is already a member.');	
					$('#email').focus();
					return false;
				}				
			})
		}		
	} 	
//////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////
	
	function makeaction(){  
      $('#btn_submit').prop('disabled', false);
      //$('#btn_alumni_login').prop('disabled', false);
      //$('#btn_alumni_forgot').prop('disabled', false);
	  $('#checkVal').val('1');					  
	}
//----------------------
	
	function check_allField(){	
		
		//var username = $('#username').val();
		var password = $('#password').val();
		var repeatpassword = $('#repeatpassword').val();
		var email = $('#email').val();		
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();		
		var affliation = $('#affliation').val();		
		var country = $('#country2').val();	
		var check_request = $('#check_request').val();
		var checkVal = $('#checkVal').val();
		
		//console.log('...'+grecaptcha.getResponse());
		
		if((email !='') && (password !='') && (repeatpassword !='') && (first_name !='') && (last_name !='') && (affliation !='') && (country !='') && (check_request !='') && (checkVal =='')){
			
			$('#btn_submit').css('cursor', 'not-allowed'); 
			$('#btn_submit').prop('disabled', true); //alert('ต้องกูเกิ้ลนะ');	
			
		} else if((first_name !='') && (last_name !='') && (email !='') && (affliation !='') && (password !='') && (repeatpassword !='') && (country !='') && (check_request !='') && (checkVal =='1')){
			
			$('#btn_submit').css('cursor', 'pointer');
			$('#btn_submit').prop('disabled', false);		
			
		} else {
			$('#btn_submit').css('cursor', 'pointer');
			$('#btn_submit').prop('disabled', false);	
		}		
	}	
//----------------------
	
	function requestReviewer(isCheck,val2){	//check1   0   1
	
		if(val2 == '1'){
		   
			if(isCheck == true){
				$('#check0').prop('checked', false);
				$('#check_request').val('1');
			   
			} else {
				$('#check_request').val('');
			}
			
		} else {
			if(isCheck == true){
				$('#check1').prop('checked', false);
				$('#check_request').val('0');
			   
			} else {
				$('#check_request').val('');
			}
		}								   
		check_allField();
	}	
	
</script>	
	
	

</body>
</html>
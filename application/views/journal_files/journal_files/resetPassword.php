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
				<div class="section-title"><h1 class="title text-white">Reset Password</h1></div>
           </div>
           <div class="col-sm-12">
            
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
				

		<h2 class="title">Reset Password</h2>
        
        
 <?php $user3=''; if($txt !=''){ ?>	
       <div class="defoult-form form-2" class="signin" id="signin3">
        <!--<div id="formmessage" style="display:none">Success/Error Message Goes Here</div>-->
		   
           <form id="form1" name="form1" role="form" method="post" >

              <div class="form-group half-group">
                  <label>New Password*</label>
                    <div class="input-group">
                      <input type="password" placeholder="" class="form-control" name="password" id="password" >
                    </div>
              </div>
              <div class="form-group half-group" style="padding-left: 10px;">
                  <label>Repeat Password*</label>
                    <div class="input-group">
                      <input type="password" placeholder="" class="form-control" name="repeatpassword" id="repeatpassword" >
                    </div>
              </div>
               <div class="form-group">
                	<button id="btn_submit" name="submit" type="button" onClick="saveNewPass()" class="button border animated middle-fill" ><span>Save</span></button><!--onClick="formRegis()"-->
                         <?php $user1 = substr($txt,5,strlen($txt));
		 	   $user2 = explode("#",$user1);
			   $user3 = $user2[0];	
                          
		 ?> 
                	
   </div>
           </form>
</div>
                <?php } ?>
        </div>
</div>
        
</section>
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
	
	function saveNewPass(){		
		
		//var username = $('#username').val();
		var password = $('#password').val();
		var repeatpassword = $('#repeatpassword').val();
		var myId = '<?php echo $user3?>';	
		
		if(password ==''){					
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
		
		} else {  
		$.post('<?php echo base_url('Journal/save_newPass')?>' , { Password : password , myId : myId }  , function(data){
                    if(data ==1){
                        alert('Your password has been reset successfully.');
                        window.location.href='<?php echo base_url('Journal/Submission')?>';
                    }
			
		});  
	}
        }
//////////////////////////////////////////////////////////////

</script>	
	
	

</body>
</html>
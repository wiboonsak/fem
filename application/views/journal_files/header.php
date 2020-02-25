<!--================================= preloader -->
 
<div id="preloader">
  <div class="clear-loading loading-effect"><span><img width="200" src="<?php echo base_url('journal-html/images/logo-bw.png')?>" alt="bw-logo"></span><img src="<?php echo base_url('journal-html/images/loading.gif')?>" width="100" alt=""></div>
</div>
	
<!--=================================header -->
<header id="header" class="dark-fancy">
<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="topbar-left text-left">
                <!-- menu logo -->
                <ul class="list-inline menu-logo">
                	<li><a href="<?php echo base_url('Journal/index')?>"><img height="40" id="logo_img" src="<?php echo base_url('journal-html/images/logo-light.png')?>" alt="logo"> </a></li>
           		</ul>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="topbar-right text-right">			
					
					 <ul class="list-inline">
             			<!--<li> <i class="glyph-icon flaticon-email-1"></i> jemes.envi@gmail.com</li> 
            			<li> <i class="glyph-icon flaticon-interface"></i> Mon - Sat 8.00 - 18.00. Sunday CLOSED</li>
                        <li> <i class="glyph-icon flaticon-technology-4"></i> 66(0) 7428 6806</li>   -->
						 <?php if($this->session->userdata('jlogin') ==''){ ?>
						 	<li> <i class="fa fa-lock"></i> <a href="#" data-toggle="modal" data-target="#login" data-whatever="@mdo">Login</a></li> 						
						 	<li> <i class="fa fa-user-plus"></i> <a href="<?php echo base_url('Journal/register')?>">Register</a></li> 
						 
						 <?php } else { 
	
							$author_id2 = $this->session->userdata('jlogin');
						 	$Result3 = $this->journal_model->get_author($author_id2);					 
						 ?>
							<li><i class="fa fa-user"></i> <a href="#">Welcome <?php echo $Result3?></a></li>
						 	<li><i class="fa fa-sign-out"></i> <a href="<?php echo base_url('Journal/logout')?>">Log out</a></li>
						 <?php } ?> 
						 
						 
						 
           			</ul>
				</div>
			</div>
		</div>
	</div>
</div>
 
<!--================================= mega menu -->
	

<div class="menu">  
  <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12 col-md-12"> 
     <!-- menu start -->
       <nav id="menu" class="mega-menu">
        <!-- menu list items container -->
        <section class="menu-list-items">
        	<div class="hidden-lg hidden-md">
                <ul class="list-inline menu-logo">
                        <li><a href="<?php echo base_url('Journal/index')?>"><img height="40" id="logo-footer" src="<?php echo base_url('journal-html/images/logo-dark.png')?>" alt="logo"> </a></li>
                </ul>
            </div>
            <!-- menu links -->
            <?php 
            $active = '';
            if((strpos($_SERVER['REQUEST_URI'], "Submission") !== false)||(strpos($_SERVER['REQUEST_URI'], "myData") !== false)||(strpos($_SERVER['REQUEST_URI'], "payment_noti") !== false)){
                 $active = 'class="active"';
                }else{
                    $active = '';
                } ?>

            <ul class="menu-links">
				<!-- active class -->
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "index") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/index')?>">Home</a></li>
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "current") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/current')?>">Current</a></li>
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "archive") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/archive')?>">Archives</a></li>
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "about") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/about')?>">About JEMES</a></li>
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "instruction") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/instruction')?>">Instruction for Authors</a></li>            
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "editor") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/editor')?>">Editorial Board</a></li>
				<li <?php if(strpos($_SERVER['REQUEST_URI'], "contact") !== false){?> class="active"<?php } ?>><a href="<?php echo base_url('Journal/contact')?>">Contact Us</a></li>            
				<!-- drop down multilevel  -->
				<li <?php echo $active?>><a href="<?php echo base_url('Journal/Submission')?>">Submission</a>

					<!--<ul class="drop-down-multilevel left-menu">
						<li><a href="#" data-toggle="modal" data-target="#login" data-whatever="@mdo"> Login</a></li>
						<li><a href="register.php"> Register</a></li>
						<li><a href="submission.php"> Submission</a></li>
					 </ul>-->
				</li>
       	 	</ul>
        <ul class="list-inline menu-icon-right visible-lg visible-md"> 
             <li><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><i class="fa fa-facebook"></i></a></li>   
             <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>   
             <li><a href="#"><i class="fa fa-instagram"></i></a></li>   
             <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->   
         </ul>
           </section>
         </nav>
       </div>
     </div>
    </div>
   </div>
</header>
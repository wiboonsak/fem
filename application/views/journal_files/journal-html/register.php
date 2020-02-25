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
<link rel="shortcut icon" href="images/favicon.ico" />

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<!--  Roboto font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />

<!-- Mega Menu -->
<link href="css/mega-menu/mega_menu.css" rel="stylesheet" type="text/css" />

<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<!-- Flaticon -->
<link href="css/flaticon.css" rel="stylesheet" type="text/css" />

<!-- Magnific Popup -->
<link href="css/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

<!-- Owl Carousel -->
<link href="css/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />

<!-- revolution -->
<link href="revolution/css/settings.css" rel="stylesheet" type="text/css">

<!-- General style -->
<link href="css/general.css" rel="stylesheet" type="text/css" />

<!-- Main Style -->
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>

<!--=================================header -->
<?php include("header.php"); ?>
<!--================================= header -->


<!--================================= banner -->

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(images/bg/bg-1.jpg);">
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
        <div id="formmessage" style="display:none">Success/Error Message Goes Here</div>
           <form id="contactform" role="form" method="post" action="php/contact-form.php">
              <div class="form-group">
                  <label>Username*</label>
                    <div class="input-group">
                      <input id="name" type="text" placeholder="" class="form-control"  name="name">
                    </div>
              </div>
              <div class="form-group half-group">
                  <label>Password*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control"  name="password">
                    </div>
              </div>
              <div class="form-group half-group" style="padding-left: 10px;">
                  <label>Repeat Password*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control"  name="repeatpassword">
                    </div>
              </div>
              
              <div class="form-group">
                <label>Email*</label>
                    <div class="input-group">
                    <input type="email" placeholder="" class="form-control" name="email">
                    </div>
              </div>
              <div class="form-group">
                <label>Salutation</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="salutation">
                    </div>
              </div>
               <div class="form-group">
                <label>First Name*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="firstname">
                    </div>
              </div>
              <div class="form-group">
                <label>Middle Name</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="middlename">
                    </div>
              </div>
              <div class="form-group">
                <label>Last Name*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="lastname">
                    </div>
              </div>
              
              <div class="form-group">
                <label>Affliation*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="country">
                    </div>
              </div>
              <div class="form-group">
                <label>Country*</label>
                    <div class="input-group">
                      <input type="text" placeholder="" class="form-control" name="country">
                    </div>
              </div>
              <div class="form-group">
			   <p>Would you be willing to review submissions to this journal?</p>
			   <p><input type="checkbox"> Yes, request the reviewer role.</p>
			   <p>Denotes required field.</p>
			   <p><strong>Privacy Statement</strong></p>
			   <p>The names and email addresses entered in this journal site will be used exclusively for the stated purposes of this journal and will not be made available for any other purpose or to any other party.</p>
			   </div>
                          
              <div class="form-group">
                  	<input type="hidden" name="action" value="sendEmail"/>
                	<button id="submit" name="submit" type="submit" value="Send" class="button border animated middle-fill"><span>Register</span></button>
                	<button type="submit" class="button border animated middle-fill" data-toggle="modal" data-target="#login" data-whatever="@mdo">Login</button>
              </div>
            </form>
            <div id="ajaxloader" style="display:none"><img class="center-block" src="images/loading.gif" alt=""></div> 
            </div>
       
        </div>

<div class="col-md-4 col-sm-12"><div class="post-sidebar">
      <div class="sidebar-widget">
        <h4 class="widget-title">Search here</h4>
        <div class="widget-search">
            <i class="fa fa-search"></i>
            <input type="search" placeholder="Search...." class="form-control placeholder">
          </div>
      </div>
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
         <ul class="widget-ul list-unstyled list-arrow">
           <li><a href="#"><span>January - June 2018</span> <span class="number pull-right">12</span></a></li>
           <li><a href="#"><span>July - December 2017</span>  <span class="number pull-right">28</span></a></li>
           <li><a href="#"><span>January - June 2017</span> <span class="number pull-right">08</span></a></li>
           <li><a href="#"><span>July - December 2016</span>  <span class="number pull-right">04</span></a></li>
           <li><a href="#"><span>January - June 2016</span> <span class="number pull-right">13</span></a></li>
         </ul>
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
<script type="text/javascript" src="js/jquery.min.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- appear -->
<script type="text/javascript" src="js/jquery.appear.js"></script>

<!-- bootstrap -->
<script type="text/javascript" src="js/mega-menu/mega_menu.js"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="js/owl-carousel/owl.carousel.min.js"></script>

<!-- isotope -->
<script type="text/javascript" src="js/isotope/isotope.pkgd.min.js"></script>

<!-- magnific -->
<script type="text/javascript" src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>

<!-- custom -->
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
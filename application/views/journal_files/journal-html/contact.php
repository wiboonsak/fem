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

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(images/bg/bg-2.jpg);">
  <div class="container">
     <div class="row intro-title text-center">
           <div class="col-sm-12">
				<div class="section-title"><h1 class="title text-white">Contact Us</h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Contact Us</span> </li>
             </ul>
        </div>
     </div>
  </div>
</section>

<!--================================= banner -->


<!--================================= Page Section -->
<section class="contact-sec page-section-pt"><div class="container mb-70"><div class="row">
    <div class="col-sm-12"><div class="section-title text-center">
        <h2 class="title">Contact Us</h2>
        <P>All correspondence should be directed to:</P>
    </div></div>
    <div class="col-sm-12"><div class="top-info fill clearfix">
                <div class="address-block rounded" style="width: 50% !important">
                    <i class="glyph-icon flaticon-construction-5"></i>
                    <h3 class="title">Location :</h3>
                    <span>Journal of Environmental Management and Energy System (JEMES), <br>Faculty of Environmental Management, <br>Prince of Songkla University, Hat Yai, Songkhla 90112 Thailand</span>
                </div>
                <div class="address-block rounded" style="padding-bottom: 20px; !important">
                    <i class="glyph-icon flaticon-technology-2"></i>
                    <h3 class="title">Phone :</h3>
                    <span>+66(0) 7428 6806</span>
                </div>
                <div class="address-block rounded" >
                    <i class="glyph-icon flaticon-email"></i>
                    <h3 class="title">Mail :</h3>
                    <a href="mailto:jemes.envi@gmail.com">jemes.envi@gmail.com</a>
                </div>
            </div>
        </div>
</div></div>

</section>


<!--================================= page-section -->






<!--=================================
footer -->
  <?php include("footer.php"); ?>
 <!--=================================
footer -->

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-chevron-up"></i></a></div>

<!--=================================
 jquery -->


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

<script type="text/javascript">
  (function($){
  "use strict";

		 var tpj=jQuery;
			var revapi21;
			tpj(document).ready(function() {
				if(tpj("#rev_slider_21_1").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider_21_1");
				}else{
					revapi21 = tpj("#rev_slider_21_1").show().revolution({
						sliderType:"standard",
						sliderLayout:"fullwidth",
						dottedOverlay:"none",
						delay:9000,
						navigation: {
							keyboardNavigation:"off",
							keyboard_direction: "horizontal",
							mouseScrollNavigation:"off",
                             mouseScrollReverse:"default",
							onHoverStop:"off",
							arrows: {
								style:"gyges",
								enable:true,
								hide_onmobile:false,
								hide_onleave:false,
								tmp:'',
								left: {
									h_align:"left",
									v_align:"center",
									h_offset:20,
                                    v_offset:0
								},
								right: {
									h_align:"right",
									v_align:"center",
									h_offset:20,
                                    v_offset:0
								}
							}
						},
						visibilityLevels:[1240,1024,778,480],
						gridwidth:1270,
						gridheight:800,
						lazyType:"none",
						shadow:0,
						spinner:"spinner3",
						stopLoop:"off",
						stopAfterLoops:-1,
						stopAtSlide:-1,
						shuffle:"off",
						autoHeight:"off",
						disableProgressBar:"on",
						hideThumbsOnMobile:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
					});
				}
			});
      })(jQuery);
		</script>
</body>
</html>
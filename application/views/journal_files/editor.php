<!DOCTYPE html>
<?php	if(!isset($editorial_name)){  $editorial_name = ''; }
		if(!isset($editorial_category)){ $editorial_category = ''; }
		if(!isset($dataID)){ $dataID = ''; }
?>
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
				<div class="section-title"><h1 class="title text-white">Editorial Board</h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="<?php echo base_url('Journal')?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Editorial Board</span> </li>
             </ul>
        </div>
     </div>
  </div>
</section>

<!--================================= banner -->


<!--================================= Page Section -->
<section class="privacy-policy page-section-ptb"><div class="container">
	<div class="row">
	<div class="col-sm-12"><div class="section-title text-center"><h2 class="title">Editorial Board</h2><br></div></div>
         <?php $cateID = '';
               $editData = $this->journal_model_2->geteditList();
               foreach ($editData->result() as $editData2){ ?>

    <div class="col-sm-12">     
      <?php if($cateID !=$editData2->editorial_category){?><h4 class="title text-yellow"><?php echo  $editData2->category_title;?></h4><?php } ?>
      <ul class="list list-unstyled">
        <li> <i class="fa fa-user-md"></i> <?php echo $editData2->editorial_name;?></li>
      </ul>
     </div>
     <?php $cateID = $editData2->editorial_category; }?>
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
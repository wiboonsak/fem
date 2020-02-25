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
<?php $txt = 'yes';
	  $getcurrent = $this->journal_model_2->get_current($txt);
	  $numcurrent2 = $getcurrent->num_rows($getcurrent);
		
	if($numcurrent2 >0){
      foreach($getcurrent->result() as $getcurrent2){} 	
	
?>
	
<div id="rev_slider_21_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="construction-slider" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
<!-- START REVOLUTION SLIDER 5.3.0.2.1 fullwidth mode -->
	<div id="rev_slider_21_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2.1">
<ul>	<!-- SLIDE  -->
    <li data-index="rs-67" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="<?php echo base_url('journal-html/revolution/assets/slide4/100x50_ae8a9-1.jpg')?>"  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
		<!-- MAIN IMAGE -->
        <img src="<?php echo base_url('journal-html/revolution/assets/slide4/ae8a9-1.jpg')?>"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
		<!-- LAYERS -->

		<!-- LAYER NR. 1 -->
		<div class="tp-caption   tp-resizeme" 
			 id="slide-67-layer-9" 
			 data-x="right" data-hoffset="10" 
			 data-y="bottom" data-voffset="10" 
						data-width="['none','none','none','none']"
			data-height="['none','none','none','none']"
 
            data-type="image" 
			data-responsive_offset="on" 

            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power1.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"

            style="z-index: 5;"><img src="<?php echo base_url() . 'uploadfile/' . $getcurrent2->img ?>" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>

		<!-- LAYER NR. 2 -->
		<div class="tp-caption   tp-resizeme" 
			 id="slide-67-layer-1" 
			 data-x="50" 
			 data-y="center" data-voffset="-160" 
						data-width="['auto']"
			data-height="['auto']"
 
            data-type="text" 
			data-responsive_offset="on" 

            data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power1.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"

            style="z-index: 6; white-space: nowrap; font-size: 73px; line-height: 73px; font-weight: 900; color: rgba(53, 53, 53, 1.00);font-family:Roboto;text-transform:uppercase;"> </div>

		<!-- LAYER NR. 3 -->
		<div class="tp-caption  text-yellow tp-resizeme" 
			 id="slide-67-layer-2" 
			 data-x="50" 
			 data-y="center" data-voffset="-92" 
						data-width="['auto']"
			data-height="['auto']"
 
            data-type="text" 
			data-responsive_offset="on" 

            data-frames='[{"delay":2000,"speed":1000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power1.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"

            style="z-index: 7; white-space: nowrap; font-size: 73px; line-height: 40px; font-weight: 900; font-family:Roboto;text-transform:uppercase; font-size: 26pt;"><?php echo $getcurrent2->journal_name ?> </div>

		<!-- LAYER NR. 4 -->
		<div class="tp-caption   tp-resizeme" 
			 id="slide-67-layer-3" 
			 data-x="50" 
			 data-y="center" data-voffset="-15" 
			data-width="['auto']"
			data-height="['auto']"
 
            data-type="text" 
			data-responsive_offset="on" 

            data-frames='[{"delay":2720,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power1.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"nothing"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[0,0,0,0]"
            data-paddingright="[0,0,0,0]"
            data-paddingbottom="[0,0,0,0]"
            data-paddingleft="[0,0,0,0]"

            style="z-index: 8; white-space: nowrap; font-size: 17px; line-height: 29px; font-weight: 500; color: rgba(53, 53, 53, 1.00);font-family:Roboto;"><?php echo $getcurrent2->sub_title ?></div>

		<!-- LAYER NR. 9 -->
		<div class="tp-caption button yellow animated middle-fill" href="<?php echo base_url('Journal/current')?>" 
			 id="slide-67-layer-10" 
			 data-x="50" 
			 data-y="586" 
						data-width="['auto']"
			data-height="['auto']"
 
            data-type="button" 
			data-responsive_offset="on" 

            data-frames='[{"delay":3440,"speed":1000,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power1.easeOut"}]'
            data-textAlign="['left','left','left','left']"
            data-paddingtop="[12,12,12,12]"
            data-paddingright="[35,35,35,35]"
            data-paddingbottom="[12,12,12,12]"
            data-paddingleft="[35,35,35,35]"

            style="z-index: 13; white-space: nowrap; font-size: 17px; line-height: 29px;outline:none;cursor:pointer;" onClick="window.location.href = '<?php echo base_url('Journal/current')?>'" > Detail </div>
	</li>
	<!-- SLIDE  -->
	
</ul>
<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>	</div>
</div><!-- END REVOLUTION SLIDER -->

<!--=================================
 banner -->
<?php } ?>


<!--=================================
 Page Section -->

<section class="page-section-ptb pb-50"><div class="container">
        <div style="width:100%">
             <?php
                                                    $homedata = $this->journal_model_2->get_homeData();
                                                  
                                                    
                                                        foreach ($homedata->result() as $homedata2) {?>

    	<div class="col-sm-12 mb-30"><div class="section-title text-center"><h2 class="title"><?php
echo $homedata2->topic;?></h2></div></div>
        <div style="width:50%">
        	<div data-items="1" data-md-items="1" data-sm-items="1">
                <div class="item"><div class="clearfix"><img class="img-responsive" src="<?php echo base_url() . 'uploadfile/'.$homedata2->img; ?>" alt="image" ></div></div>
                
    		</div>
        </div>
        <div style="width:50%">
        <div class="row services clearfix">
    	 <div class="col-sm-12">
         	<p><?php echo $homedata2->desc;?> </p>
            
<!--
             <div class="feature-box mt-30 left_pos ex-small">
                <i class="glyph-icon flaticon-construction-14"></i>
                <h3 class="title">Safety</h3>
                <p>Eiusmod tempor incididunt ut labore et dolore Ut enim ad minim veniam quis</p>
            </div>
            <div class="feature-box left_pos ex-small">
                <i class="glyph-icon flaticon-trophy"></i>
                <h3 class="title">Best Quality</h3>
                <p>It has survived not only five centuries, but also the leap electronic typesetting</p>
            </div>
            <div class="feature-box left_pos ex-small">
                <i class="glyph-icon flaticon-drawing-1"></i>
                <h3 class="title">Sustanability</h3>
                <p>Construction Project Management (CPM) is the overall planning</p>
            </div>
            <div class="feature-box left_pos ex-small">
                <i class="glyph-icon flaticon-projection-screen-with-bar-chart"></i>
                <h3 class="title">Strategy</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
            </div>
-->
        </div>
             <?php } ?>
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
	
//////////////////////////////////////////////////////////////
		
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
		</script>
</body>
</html>
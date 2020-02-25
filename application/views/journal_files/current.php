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

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(<?php echo base_url('journal-html/images/bg/bg-1.jpg')?>)">
  <div class="container">
      <?php $txt = 'yes';
			$getcurrent = $this->journal_model_2->get_current($txt);
            foreach ($getcurrent->result() as $getcurrent2){} ?>
     <div class="row intro-title text-center">
           <div class="col-sm-12">
				<div class="section-title"><h1 class="title text-white">Current</h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="<?php echo base_url('Journal')?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><a href="<?php echo base_url('Journal/current')?>">Current</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span><?php echo $getcurrent2->journal_name ?>  <?php echo $getcurrent2->issue ?></span> </li>
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

<div class="row row-eq-height">  
     <?php $getcurrent = $this->journal_model_2->get_current($txt);
           foreach ($getcurrent->result() as $getcurrent2) {} ?>
        <div class="col-md-8 col-sm-12" id="searchID">
            <div class="post" style="padding-bottom: 20px;">
                <div class="post-image clearfix"><img alt="" width="550" height="714" src="<?php echo base_url() . 'uploadfile/' . $getcurrent2->img ?>" alt="image" /></div>
                <div class="post-date"><?php echo $this->journal_model_2->getDay($getcurrent2->published_date); ?><span><?php echo $this->journal_model_2->getmonth($getcurrent2->published_date); ?></span></div>
                <div class="post-details">
                    <div class="post-title"><h4 class="title" style="font-size: 14pt;"><a href="#"><?php echo $getcurrent2->journal_name ?> </a></h4></div>

                    <div class="post-content"><p><?php echo $getcurrent2->issue ?></p>
                    </div>
                </div>
            </div><hr>                    
              <?php $getsection = $this->journal_model_2->get_listSection($getcurrent2->id);
                    foreach($getsection->result() as $getsection2){ 
						
						$PDFview = $this->journal_model_2->get_listPDF($getcurrent2->id,$getsection2->id);
						$numPDF = $PDFview->num_rows();
						if($numPDF >0){
			?>       
            <div class="comment-box" style="padding-bottom: 30px;">
            	<div class="section-title"><h3 class="title"><?php echo $getsection2->name ?></h3></div>
            	<ol class="list-inline comment-list">
                     <?php 
                              //$PDFview=$this->journal_model_2->get_listPDF($getcurrent2->id,$getsection2->id);
                             foreach($PDFview->result() AS $data){ ?>
                	<li>
                	<div class="comments-media">
						<div class="comments-photo media-left"><a href="#"><i class="fa fa-file-pdf-o fa-5x"></i></a></div>
                        <div class="comments-info media-body">
                             
							<a href="<?php echo base_url().'uploadfile/'.$data->file_name;?>" target="_blank"><h5 class="title" style="font-size: 11pt; padding-right: 70px;"><?php echo $data->title?></h5></a> 
                                                   
                            <div class="comment-metadata"><i class="fa fa-user"></i>
                                 <?php  $a = ', ';  $n = 1;
								 		$authorData = $this->journal_model_2->list_authorData($data->id);
										$authorNum = $authorData->num_rows();
										if($authorNum >0){						  
                             			foreach($authorData->result() AS $authorData2){ 
								
										if($n == $authorNum){ $a ='';  }								
								?> 
                                		<time><?php echo $authorData2->name.$a?></time> 
								<?php $n++; }  } ?>
                            </div> 
                            <a href="#" class="reply button small border animated middle-fill"><span><?php echo $data->pageNo?></span></a>
							<!--<p>Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises</p>-->
						</div>
                       </div>                        
                    </li>
                    <?php } ?>
                </ol>
            </div> 
            <?php }  } ?>
        </div>
 <?php //} ?>
<div class="col-md-4 col-sm-12"><div class="post-sidebar">
       <div class="sidebar-widget">
        <h4 class="widget-title">Search here</h4>
        <div class="widget-search">
            <i class="fa fa-search" onclick="searchinput()" id="searchinput"></i>
            <input type="search" placeholder="Search...." class="form-control placeholder"  name="searchtext" id="searchtext">
          </div>
       
      </div>
      <!--<div class="sidebar-widget">
        <h4 class="widget-title">About Blog</h4>
        <p>Lorem ipsum dolor sit ametLorem Ipsum Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,<br><br>
        lorem quis bibendum auctor, consequat ipsum, nec sagittis sem nibh id elit nibh vel velit auctor aliquet. sem nibh Aenean sollicitudin,</p>
      </div>-->
      <!--<div class="sidebar-widget">
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
      </div>-->
<!--
	<div class="sidebar-widget">
		<h4 class="widget-title">Recent Posts</h4>                    
            <div class="recent-post media">
            	<div class="media-left"><a href="#"><img alt="" class="media-object" src="images/thumbnail/thum-1.jpg" style="width:70px; height:70px;"></a></div>
                <div class="media-body">
                	<a href="#">Proin gravida velit auctor.</a><span><i class="fa fa-calendar"></i> September 30, 2017</span>
                </div>
             </div>
            <div class="recent-post media">
                <div class="media-left"><a href="#"><img alt="" class="media-object" src="images/thumbnail/thum-2.jpg" style="width:70px; height:70px;"></a></div>
                <div class="media-body">
                    <a href="#">Proin gravida velit auctor.</a><span><i class="fa fa-calendar"></i> September 30, 2017</span>
              </div>
            </div>
            <div class="recent-post media">
                <div class="media-left"><a href="#"><img alt="" class="media-object" src="images/thumbnail/thum-3.jpg" style="width:70px; height:70px;"></a></div>
                <div class="media-body">
                    <a href="#">Proin gravida velit auctor.</a><span><i class="fa fa-calendar"></i> September 30, 2017</span>
              </div>
            </div>
            <div class="recent-post media">
                <div class="media-left"><a href="#"><img alt="" class="media-object" src="images/thumbnail/thum-4.jpg" style="width:70px; height:70px;"></a></div>
                <div class="media-body">
                    <a href="#">Proin gravida velit auctor.</a><span><i class="fa fa-calendar"></i> September 30, 2017</span>
              </div>
            </div>
    </div>
-->
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
            //-----------------------------
      function searchinput(){
          var searchtext = $('#searchtext').val();
           if (searchtext == '') {
        return false; 
    }else{
       $.post('<?php echo base_url('Journal/searchdata')?>',{ searchtext:searchtext },
       function(data){ 
				$('#searchID').empty();
				$('#searchID').html(data);
			})
   }
    }
    $('#searchtext').keypress(function (e){
    var key = e.which;
    if (key == 13) {
        $('#searchinput').click();
        return false;
    }
    });
		</script>
</body>
</html>
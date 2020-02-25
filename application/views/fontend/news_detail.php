<?php foreach($news_data->result() as $news_data2){	}
	  $dataID = $news_data2->user_update;	  
	  $postBy = $this->user_model->list_user($dataID);	
	  foreach($postBy->result() as $postBy2){	}	

	  if($this->session->userdata('weblang') == 'en'){ 
		  $description3 = $news_data2->topic_en; 
	  } else { 
		  $description3 = $news_data2->topic_th; 
	  }	

	  if($news_data2->first_pic !=''){ 
		  $bb = $news_data2->first_pic;  
	  } else { 
		  $bb = 'images/e2353f39533eadca9957892d7406bc12.jpg';  
	  }
?>

<!DOCTYPE html>
   <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Always force latest IE rendering engine or request Chrome Frame -->
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <!-- Meta Description -->
        <meta name="description" content="Faculty of Environmental Management - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์">
        <!-- Meta Keyword -->
        <meta name="keywords" content="Faculty of Environmental Management, คณะการจัดการสิ่งแวดล้อม, มหาวิทยาลัยสงขลานครินทร์">
		<meta name="google-site-verification" content="coVXjQuLjz9KVamf8EIkwDUxc41VixXrz7SAQxzURBs" />
        <!-- meta character set -->
        <meta charset="utf-8">
		
		
<meta property="fb:app_id"        content="2205217723093259" />  
<meta property="og:url"           content="<?php echo base_url('News/Detail/').$news_data2->id?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo $description3?>" />
<meta property="og:description"   content="<?php echo $description3?>" />
<meta property="og:image"         content="<?php echo base_url($bb); ?>" />

		
		
<meta name="twitter:card" content="photo" />
<meta name="twitter:site" content="Easy Steps 2 Build Website">
<meta name="twitter:url" content="<?php echo base_url('News/Detail/').$news_data2->id?>">
<meta name="twitter:title" content="<?php echo $description3?>">
<meta name="twitter:description" content="<?php echo $description3?>">
<meta name="twitter:image" content="<?php echo base_url($bb); ?>" />
		
	
		<?php //echo base_url($bb); ?>

        <!-- Site Title -->
        <title>Faculty of Environmental Management - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์</title>
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('webpage/images/favicon.png')?>">
        
        <!--
        Google Fonts
        ============================================= -->

        <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,700italic,300italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,600,700,300,100,800,900' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Dosis:800,700' rel='stylesheet' type='text/css'>
        <link href='https-://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        
        
        <!--
        CSS
        ============================================= -->
        <!-- Fontawesome 
        <link type="text/css" rel="stylesheet" href="<?php// echo base_url('webpage/css/font-awesome.min.css')?>">-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- bootstrap.min -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/bootstrap.min.css')?>">
        <!-- jquery.bxslider -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/jquery.bxslider.css')?>">
        <!-- owl.carousel -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/js/vendor/owl.carousel.css')?>">
        <!-- lightbox -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/jquery.pagepiling.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/magnific-popup.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/lightbox.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/icomoon.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/jquery-ui.min.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/animate.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/bbpress.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/bbp-theme.css')?>">
        <!--
        <link type="text/css" rel="stylesheet" href="<?php //echo base_url('webpage/css/buddypress.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php //echo base_url('webpage/shortcodes/css/owl.carousel.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php// echo base_url('webpage/css/buddypress-theme.css')?>">-->
        <!-- Pages style -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/pages/css/main.css')?>">
        <!-- Shortcodes main stylesheet -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/shortcodes/css/prettyPhoto.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/shortcodes/css/flexslider.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/shortcodes/css/iconmoon.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/shortcodes/css/main.css')?>">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/shortcodes/css/media-queries.css')?>">
        <!-- Main Stylesheet -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/main.css')?>">
        <!-- CSS media queries -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/media-queries.css')?>">
        <link id="themeColorChangeLink" type="text/css" rel="stylesheet" href="<?php echo base_url('webpage/css/colors/c2.css')?>">
		
		<script type="text/javascript" src="<?php echo base_url('js/gtag.js')?>"></script>

    </head>
    <!-- class="boxed-mode" -->
    <body class="magazine3 bordered">
		
		
		
    
	<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.12';
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>	
		
       
        <!-- preview-panel -->
        <?php //include_once 'preview-panel.php'; ?>
        <!-- // preview-panel -->
        
        <!-- Preloader one -->
        <!-- <div id="preloader">
            <div class="loader-spinner"></div>
        </div> -->
        
        <!-- Preloader Two -->
        <div id="preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>

        <div id="wrapper" class="main-wrapper">

            
            <?php include("header.php") ?>

            <div class="breadcrumb-area bc_type t2">
			<?php 	$lang = $this->session->userdata('weblang');
					$categoryName = $this->news_model->get_categoryName($news_data2->category_id,$lang);	
					foreach($categoryName->result() as $categoryName2){	}			
			?>
            <div class="container">
                <h2 class="page-title"><?php if($this->session->userdata('weblang') == 'en'){ echo 'News / '.$categoryName2->name_en; } else { echo 'ข่าวประชาสัมพันธ์ / '.$categoryName2->name_th; }?></h2>
                <div class="bc-right pull-right">                    
                    <ul class="breadcrumb pull-right">
                        <li class="active">Faculty of Environmental Management,</li>
                        <li> Prince of Songkla Universty</li>
                    </ul>
                </div>
            </div>
        	</div>        	
        
               <div class="content-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Post Holder -->
                            <article class="entry-post">
                                <!-- Post Media -->
                                <div class="post-media">
                                    <img src="<?php if($news_data2->first_pic !=''){ echo base_url($news_data2->first_pic);  } else { $bb = 'images/e2353f39533eadca9957892d7406bc12.jpg'; echo base_url($bb); } ?>" alt="post thumb">
                                </div>
                                <!-- // Post Media -->

                                <div class="entry-content">
                                    <!-- Post Header -->
                                    <header class="post-header">    
                                        <h2 class="post-title">
                                            <a href="#"><?php if($this->session->userdata('weblang') == 'en'){ echo $news_data2->topic_en; } else { echo $news_data2->topic_th; }?></a>
                                        </h2>
                                        
                                    </header>
                                    <!-- // Post Header -->

                                    <!-- Post Meta -->
                                    <div class="meta-space">
                                        <span>by <a rel="author" title="" href="#"><?php echo $postBy2->user_name?></a></span>
                                        <span><i class="far fa-calendar-alt"></i> <?php echo $this->news_model->get_dateENG($news_data2->date_add)?></span>
                                       <!-- <span><i class="fa fa-comment-o"></i> <a href="#">15</a></span>
                                        <span><i class="fa fa-tags"></i> <a href="#">Fashion</a>, <a href="#">Lifestyle</a></span>
                                        <span><i class="fa fa-heart-o"></i> <a href="#">250</a></span>-->
                                    </div>
                                    <!-- // Post Meta -->

                                    <!-- Post Excerpt -->
                                    <div class="entry-excerpt">
                                       
                                       <?php if($this->session->userdata('weblang') == 'en'){ echo $news_data2->detail_en; } else { echo $news_data2->detail_th; }?>
										
										
										
									 <?php $language = ''; 
										   $fileTH = $this->news_model->list_newsFile($news_data2->id,$language);	
										   $countRows = $fileTH->num_rows();
							  
										   if($countRows>0) {	
			  							      foreach($fileTH->result() as $fileTH2){ ?>					
										
									 <p><a href="<?php echo base_url('uploadfile/'.$fileTH2->file_name);?>" target="_blank"><i class="far fa-file-alt"></i> <?php echo $fileTH2->file_name?></a></p>
										
									 <?php }  } ?>	
										
                                    </div>
                                    <!-- // Post Excerpt -->

                                    <!-- Social Sharer -->
                                    <div class="social-sharer">
                                       <!-- <ul class="social-links text-center">
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>-->
									
									<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v3.1&appId=2205217723093259&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->		
									<div class="fb-share-button" data-href="<?php echo base_url('News/Detail/').$news_data2->id?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('News/Detail/').$news_data2->id?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>	
										
										
									<g:plus action="share"></g:plus>	
								
									<a href="https://twitter.com/share" class="twitter-share-button" style="padding-top: 20px">Tweet</a>	
									
                                    </div>
                                    <!-- // Social Sharer -->
									
									<!--<div class="col-md-4">
									
							
							</div>	-->
									
									
									
									<!--<a href="https://plus.google.com/share?url=http://www.fempsu.com.122.155.167.147.no-domain.name/News/Detail/37" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img src="https://www.gstatic.com/images/icons/gplus-64.png" alt="Share on Google+"/></a>-->
									
									
									
									
									
									 


                                </div>
                            </article>
                            <!-- // Post Holder -->
							
							<?php 	$check1 = 'n';  $check2 = 'p'; $display =''; $display2 ='';
									$id = $news_data2->id;
									$linkNext = $this->news_model->getLink_newsDetail($check1,$id);	
									$linkPrevious = $this->news_model->getLink_newsDetail($check2,$id);	
										 
									if($linkNext =='x'){  $display = 'style="display: none"';  }
									if($linkPrevious =='x'){  $display2 = 'style="display: none"';  }	 
							?>

                            <nav class="next-prev-post clearfix">
                                <a href="<?php echo base_url('News/Detail/').$linkPrevious?>" <?php echo $display2?>  class="pull-left">Previous Post</a>
                                <a href="<?php echo base_url('News/Detail/').$linkNext?>" <?php echo $display?> class="pull-right">Next Post</a>
                            </nav>
							
							
							
						
							
<script>
   window.___gcfg = {
   		lang: 'en-US',
   		parsetags: 'onload'
   };
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>								
						
<script type="text/javascript">// <![CDATA[
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];
if(!d.getElementById(id)){js=d.createElement(s);js.id=id;
js.async=true;
js.src="//platform.twitter.com/widgets.js";
fjs.parentNode.insertBefore(js,fjs);
}}(document,"script","twitter-wjs");
// ]]></script>						

                        </div>
    					
    					<div class="col-md-4">
    						<div id="secondary" class="widget-area widget2" role="complementary">                                
                                
                                <!-- widget -->
                                <aside class="widget sidebar">
                                    <h4 class="widget-title"><?php echo $this->lang->line('CATEGORYS'); ?></h4>
                                    <?php 	$show = '1';
											$newsCategory = $this->news_model->list_newsCategory($show);	
												
											$countRows2 = $newsCategory->num_rows();
							  				
									?> 
                                    <ul>
                                    <?php if($countRows2 >0) { 
											foreach($newsCategory->result() as $newsCategory2){
									?>   
                                        <li><a href="<?php echo base_url('News/category/').$newsCategory2->id?>"><i class="fa fa-angle-right"></i><?php if($this->session->userdata('weblang') == 'en'){ echo $newsCategory2->name_th; } else { echo $newsCategory2->name_en; }?></a></li>
                                    <?php } } ?>    
                                        
									</ul>
                                </aside>
                                <!-- // widget -->
                                
                               <!-- widget -->
                                <aside class="widget sidebar">
                                    <h4 class="widget-title">Tags</h4>
                                    <div class="tagcloud">
                                        <a href="#">Taiwan delegates visit FEM</a>
                                        <a href="#">PSU</a>
                                        <a href="#">Hosting</a>
                                    </div>
                                </aside>
                                <!-- // widget -->

    						</div>
    					</div>
                    </div>
                </div>
            </div>     
                
              
    		</div>	<!-- end .container -->
    	</div>	<!-- end .portdolio-item-single -->

           
            <!-- footer widget -->
			<?php include("footer.php") ?>
            <!-- /footer widget -->

            
            
            <!-- back to top -->
            <a href="javascript:;" id="go-top">
                <i class="fa fa-angle-up"></i>
                top
            </a>
            <!-- end #go-top -->
        </div>

        <!--
        JavaScripts
        ========================== -->
        <!-- main jQuery -->
        <script type="text/javascript" src="<?php echo base_url('webpage/js/vendor/modernizr-2.6.2.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/vendor/jquery-1.11.1.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery-migrate.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/bootstrap.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery-ui.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.appear.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.bxslider.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/vendor/owl.carousel.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.backstretch.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.nav.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/lightbox.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.parallax-1.1.3.js')?>"></script>        
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery-validation.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.easing.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/form.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.isotope.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.multiscroll.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery-countTo.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.mb.YTPlayer.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jflickrfeed.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.selectbox-0.2.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/tweetie.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.sticky.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.nicescroll.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/bootstrap-progressbar.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.circliful.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.easypiechart.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/masonry.pkgd.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.tubular.1.0.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/kenburned.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/mediaelement-and-player.min.js')?>"></script>
        
        <!--
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
        <script type="text/javascript" src="<?php //echo base_url('webpage/js/okvideo.min.js')?>"></script>
        -->
        
        
        <!-- shortcode scripts -->
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/jquery.nivo.slider.pack.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/jquery.flexslider-min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/jquery.prettyPhoto.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/jquery.slicebox.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/jquery.eislideshow.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/camera.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/jquery.zaccordion.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/shortcodes/js/main.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.prettySocial.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.magnific-popup.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.zoom.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.countdown.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.webticker.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/jquery.timepicker.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/selectize.min.js')?>"></script>
        <!-- image filter -->
        <script type="text/javascript" src="<?php echo base_url('webpage/js/img-filter/jquery.gray.min.js')?>"></script>
        <!-- // image filter -->
        <script type="text/javascript" src="<?php echo base_url('webpage/js/wow.min.js')?>"></script>
        <script src="<?php echo base_url('webpage/syntax-highlighter/scripts/prettify.min.js')?>"></script>
        <script type="text/javascript">$.SyntaxHighlighter.init();</script>
        <script type="text/javascript" src="<?php echo base_url('webpage/js/main.js')?>"></script>        
    </body>
</html>
<!--
footer widget
==================================== -->
<section class="footer-widget">
    <div class="container">
        <div class="row with-border">
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="footer-item">
                    <img alt="Eydia" src="<?php echo base_url('webpage/images/logo-white-footer.png')?>">
                    <p><?php echo $this->lang->line('Faculty_of_Environmental_Management'); ?>, <?php echo $this->lang->line('name2'); ?></p>
                    <a href="https://goo.gl/maps/wyw3xsDwbmK2" target="_blank">Google Map</a>
                </div>
            </div>
			<?php $contactUs = $this->contactus_model->get_contactUsData();
				  foreach($contactUs->result() as $contactUs2){	}
			?>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="footer-item contact-info">
                    <h4>contact info</h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i><span><?php if($this->session->userdata('weblang') == 'en'){ echo $contactUs2->address_en; } else { echo $contactUs2->address_th; }?></span></li>
                        <li><i class="fa fa-phone"></i><span> <?php echo $contactUs2->telephone;?></span></li>
                        <li><i class="fa fa-fax"></i><span> <?php echo $contactUs2->fax;?></span></li>
                        <li><i class="fa fa-map-marker"></i><span> <?php echo $contactUs2->location;?></span></li>
                        <li><i class="fa fa-globe"></i><span><a href="<?php echo base_url()?>" target="_blank">fem.psu.ac.th</a></span></li>
                        
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="footer-item recent-posts">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="<?php echo base_url()?>"><?php echo $this->lang->line('Home'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('About_us')?>"><?php echo $this->lang->line('AboutUs'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('Administrator')?>"><?php echo $this->lang->line('Administator'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('Staff')?>"><?php echo $this->lang->line('Staff'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('Facilities')?>"><?php echo $this->lang->line('Facilities'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('Alumni')?>"><?php echo $this->lang->line('Alumni'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('Research_clusters')?>"><?php echo $this->lang->line('Research'); ?> <i class="fa fa-angle-right"></i></a></li>
                        <li><a href="<?php echo base_url('Contact_us')?>"><?php echo $this->lang->line('ContactUs'); ?> <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                <div class="footer-item recent-posts">
                    <h4>Facebook</h4>
					
                    <div class="fb-page" 
						data-tabs="timeline,events,messages"
						data-href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/"						
						data-width="380" 
						data-height="300"
						data-adapt-container-width="true"
						data-small-header="true"
						data-hide-cover="false"
						data-show-facepile="true">
					</div><!--data-href="https://www.facebook.com/MEFIdotcom"-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--
End footer widget
==================================== -->
<!--
<i class="fab fa-facebook-f" style="padding-top: 8px;"></i>
<i class="fab fa-twitter" style="padding-top: 8px;"></i>
<i class="fab fa-instagram" style="padding-top: 8px;"></i>
<i class="fab fa-youtube" style="padding-top: 8px;"></i>
<i class="fas fa-rss" style="padding-top: 8px;"></i>
<i class="fas fa-user" style="padding-top: 8px;"></i>-->

<footer class="footer">
                <div class="container">
                    <p class="copyright pull-left item_left" style="text-transform: none; font-size:9pt; font-weight: normal;"> Copyright &copy; 2018. Faculty of Environmental Management, Prince of Songkla University. <br>All rights reserved. developed by <strong><a href="#">ME-FI dot com</a>.</strong></p>
                    <ul class="pull-right social-links text-center item_right">
                        <li><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/fempsu" target="_blank"><i class="fab fa-twitter"></i></a></li>
                       <!-- <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                        <li><a href="https://www.youtube.com/channel/UCiux9_TFm-ePCEaL8URKmLg" target="_blank"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="http://fem-psu.blogspot.com/" target="_blank"><i class="fas fa-rss"></i></a></li>
						<li><a href="<?php echo base_url('Login')?>" target="_blank"><i class="fas fa-user"></i></a></li>
                    </ul>
                </div>
            </footer>
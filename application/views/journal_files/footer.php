
<!--================================= Page Section -->

<section class="action-box small yellow-bg"><div class="container"><div class="row">
            <div class="col-sm-8 text-left">
                <h4>Login or Register to make a submission.</h4>
            </div>
            <div class="col-sm-4 text-right text-xs-left">
                <a href="<?php echo base_url('Journal/register')?>" class="button border animated right-icn"><span>Register <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                <a href="#" class="button border animated right-icn" data-toggle="modal" data-target="#login" data-whatever="@mdo"><span>Login <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
            </div>
        </div></div>
</section>

<!--================================= login Modal -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
            <div class="modal-header" style="display: -webkit-box;">
                <h5 class="modal-title" id="exampleModalLabel" style="width: 97%">Login</h5>
                <h5 class="modal-title" id="forgot_password" style="display: none; width: 97%;">Forgot your password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <p class="col-form-label" id="labelForgot" style="display: none">Enter your e-mail address below and we'll send you a link to reset your password.<br></p>
                        <label for="recipient-name" class="col-form-label" >Email</label>
                        <input type="text" class="form-control" id="usernameL" name="usernameL">
                    </div>
                    <div class="form-group" id="div_Password">
                        <label for="recipient-name" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="passwordL" name="passwordL">
                    </div>
                    <p id="p_forgot"><a href="#" onClick="show_ForgotPassword()">Forgot your password?</a></p>       		
                    <!--<p><input type="checkbox">  Keep me logged in</p>-->
                </form>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default">Register</button>-->
                <button type="button" class="btn btn-primary" id="login5" style="color:#ffffff" onClick="login()">Login</button>
				<button type="button" class="btn btn-primary" id="sendMail5" style="color:#ffffff; display: none;" onClick="alumniForgot()">Send Email</button>
            </div>
        </div>
    </div>
</div>

<style>
	.footer-widget ul li a {
		color: #333333;
	}
</style>

<footer class="footer page-section-pt dark-bg"><div class="container"><div class="row">
            <div class="col-sm-5 mb-30">
                <div class="section-title"><h4 class="title">Journal of Environmental Management and Energy System</h4></div>
                <div class="footer-about">
                    <p>The JEMES is a journal for the publication of peer reviewed, original research for all aspects of integrated environmental, energy and ecosystem management. The journal scope covers the integration of multidisciplinary sciences for prevention, control, treatment, environmental clean-up and restoration.</p>
                    <div class="social-icons social-white border color-hover mt-20">
                        <ul>
                            <li class="social-facebook"><a href="https://www.facebook.com/%E0%B8%84%E0%B8%93%E0%B8%B0%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%88%E0%B8%B1%E0%B8%94%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%B4%E0%B9%88%E0%B8%87%E0%B9%81%E0%B8%A7%E0%B8%94%E0%B8%A5%E0%B9%89%E0%B8%AD%E0%B8%A1-%E0%B8%A1%E0%B8%AD-622477971439208/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <!--<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-gplus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 mb-30">
                <div class="footer-usefull">
                    <div class="section-title"><h4 class="title">Usefull Links</h4></div>

                    <ul class="list-mark list-2">
                        <li  class="active"><a href="<?php echo base_url('Journal/index')?>"> Home </a></li>
                        <li><a href="<?php echo base_url('Journal/about')?>"> About JEMES </a></li>
                        <li><a href="<?php echo base_url('Journal/instruction')?>"> Instruction for Authors </a></li>            
                        <li><a href="<?php echo base_url('Journal/current')?>"> Current </a></li>
                    </ul>
                    <ul class="list-mark list-2">           	 
                        <li><a href="<?php echo base_url('Journal/archive')?>"> Archives </a></li>
                        <li><a href="<?php echo base_url('Journal/editor')?>"> Editorial Board </a></li>
                        <li><a href="<?php echo base_url('Journal/contact')?>"> Contact Us </a></li>            
                     <li><a href="<?php echo base_url('Journal/Submission')?>"> Submission <!--<i class="fa fa-angle-down fa-indicator">--></i></a>
                    </ul>

                </div>
            </div>
            <div class="col-sm-3">
                 <?php $contactusdata = $this->journal_model_2->get_contactData();
                       foreach($contactusdata->result() as $contactusdata2){}?>
                <div class="footer-address">
                    <div class="section-title"><h4 class="title">Contact Us</h4></div>
                    <ul class="list-inline">
                        <li><i class="fa fa-map-marker"></i> <span><?php echo $contactusdata2->location?></span></li>
                        <li><i class="fa fa-phone"></i> <span><?php echo $contactusdata2->phone?></span></li>
                        <li><i class="fa fa-envelope"></i> <span><?php echo $contactusdata2->mail?></span></li>
                    </ul>            
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget mt-20">
        <div class="container"><div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <p class="text-white"> &copy;Copyright <span id="copyright"> 2018.</span> <a href="#"> Journal of Environmental Management and Energy System</a></p>
                </div>			
				
				<div class="col-lg-6 col-md-6 col-sm-6 social-icons social-white border color-hover">
                    <ul style="float: right">
                       <li class="social-facebook"><a href="<?php echo base_url('CMS_Journal')?>" style="padding-left: 0px;" target="_blank"><i class="fa fa-user"></i></a></li>
                    </ul>
                </div>
                <!--<div class="col-lg-6 col-md-6 col-sm-6">
                  <ul class="text-right">
                    <li><a href="terms-conditions.html">Terms of Use</a></li>
                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                    <li><a href="contact-1.html">Contact Us</a></li>
                  </ul>
                </div>-->
            </div>
        </div></div>
</footer>

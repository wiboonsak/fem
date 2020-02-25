/**
 *	Neon Register Script
 *
 *	Developed by Arlind Nushi - www.laborator.co
 */


var neonForgotPassword = neonForgotPassword || {};

;(function($, window, undefined)
{
	"use strict";
	
	$(document).ready(function()
	{
		neonForgotPassword.$container = $("#form_register");

		neonForgotPassword.$container.validate({
			rules: {
				
				email: {
					required: true,
					email: true
				}
			},
			
			messages: {
				
				email: {
					email: 'Invalid E-mail.'
				}	
			},
			
			highlight: function(element){
				$(element).closest('.input-group').addClass('validate-has-error');
			},
			
			
			unhighlight: function(element)
			{
				$(element).closest('.input-group').removeClass('validate-has-error');
			},
			
			submitHandler: function(ev)
			{
				$(".login-page").addClass('logging-in');

				// Hide Errors
				$(".form-login-error").slideUp('fast');
				
				// We consider its 30% completed form inputs are filled
				neonForgotPassword.setPercentage(30, function()
				{
					// Lets move to 98%, meanwhile ajax data are sending and processing
					neonForgotPassword.setPercentage(98, function()
					{
					// Send data to the server
						$.ajax({
							url: baseurl + 'forgotpassword_User',
							method: 'POST',
							dataType: 'json',
							data: {
								email: $("input#email").val(),
							},
							error: function()
							{
								alert("An error occoured!");
							},
							success: function(response)
							{
							
							var email_status = response.email_status;
							var chksendmail  = response.chksendmail;
							//console.log(chksendmail);
							//console.log(email_status);					
							// Form is fully completed, we update the percentage
							neonForgotPassword.setPercentage(100);
								
							// We will give some time for the animation to finish, then execute the following procedures	
							setTimeout(function()
							{
								// If login is invalid, we store the 
								if(email_status == false)
								{
									$(".login-page").removeClass('logging-in');
										neonForgotPassword.resetProgressBar(false);
								}
								else
								if(email_status == true)
								{
									if(chksendmail == true ){

										$(".login-page .login-header .description").slideUp();
									
										// Hide the register form (steps)
										neonForgotPassword.$container.slideUp('normal', function()
										{
											// Remove loging-in state
											$(".login-page").removeClass('logging-in');
											
											// Now we show the success message
											$(".form-register-success").slideDown('normal');
											
											// You can use the data returned from response variable
										});
									}
								}
								
							}, 2000);
							}
						});
					});
				});
			}
		});
	
		
		// Login Form Setup
		neonForgotPassword.$body = $(".login-page");
		neonForgotPassword.$login_progressbar_indicator = $(".login-progressbar-indicator h3");
		neonForgotPassword.$login_progressbar = neonForgotPassword.$body.find(".login-progressbar div");
		
		neonForgotPassword.$login_progressbar_indicator.html('0%');
		
		if(neonForgotPassword.$body.hasClass('login-form-fall'))
		{
			var focus_set = false;
			
			setTimeout(function(){ 
				neonForgotPassword.$body.addClass('login-form-fall-init')
				
				setTimeout(function()
				{
					if( !focus_set)
					{
						neonForgotPassword.$container.find('input:first').focus();
						focus_set = true;
					}
					
				}, 550);
				
			}, 0);
		}
		else
		{
			neonForgotPassword.$container.find('input:first').focus();
		}
		
		
		// Functions
		$.extend(neonForgotPassword, {
			setPercentage: function(pct, callback)
			{
				pct = parseInt(pct / 100 * 100, 10) + '%';
				
				// Normal Login
				neonForgotPassword.$login_progressbar_indicator.html(pct);
				neonForgotPassword.$login_progressbar.width(pct);
				
				var o = {
					pct: parseInt(neonForgotPassword.$login_progressbar.width() / neonForgotPassword.$login_progressbar.parent().width() * 100, 10)
				};
				
				TweenMax.to(o, .7, {
					pct: parseInt(pct, 10),
					roundProps: ["pct"],
					ease: Sine.easeOut,
					onUpdate: function()
					{
						neonForgotPassword.$login_progressbar_indicator.html(o.pct + '%');
					},
					onComplete: callback
				});
			},
			resetProgressBar: function(display_errors)
			{
				TweenMax.set(neonForgotPassword.$container, {css: {opacity: 0}});
				
				setTimeout(function()
				{
					TweenMax.to(neonForgotPassword.$container, .6, {css: {opacity: 1}, onComplete: function()
					{
						neonForgotPassword.$container.attr('style', '');
					}});
					
					neonForgotPassword.$login_progressbar_indicator.html('0%');
					neonForgotPassword.$login_progressbar.width(0);
					
					if(display_errors)
					{
						var $errors_container = $(".form-login-error");
						
						$errors_container.show();
						var height = $errors_container.outerHeight();
						
						$errors_container.css({
							height: 0
						});
						
						TweenMax.to($errors_container, .45, {css: {height: height}, onComplete: function()
						{
							$errors_container.css({height: 'auto'});
						}});
						
						 document.getElementById("username").focus();
						 $("#username").closest('.input-group').addClass('validate-has-error');
						 $('#username_error').html('Please set a new username.').css('color', 'red');
						 $('#email_error').html('');
					}else{
						var $errors_container = $(".form-login-error");
						$errors_container.show();
						var height = $errors_container.outerHeight();
						
						$errors_container.css({
							height: 0
						});
						
						TweenMax.to($errors_container, .45, {css: {height: height}, onComplete: function()
						{
							$errors_container.css({height: 'auto'});
						}});
						
						 document.getElementById("email").focus();
						 $("#email").closest('.input-group').addClass('validate-has-error');
						 $('#email_error').html('Please set a new email.').css('color', 'red');
						  $('#username_error').html('');
					}
					
				}, 800);
			}
		});
	});
	
})(jQuery, window);
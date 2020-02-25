<html>
    <head>
        <meta charset="utf-8" />
        <title>Faculty of Environmental Management - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>">

        <link href="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
      
       <!-- Custom box css -->
        <link href="<?php echo base_url('assets/plugins/custombox/css/custombox.min.css')?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jquery.steps/css/jquery.steps.css')?>" />
       
        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url('assets/js/modernizr.min.js')?>"></script>
        
        <style>
			.menu_name { color: #000000 !important; }
		</style>

    </head>
    
    

    <body>

<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
           <div class="wrapper">
			   
			   
			   
			   
			   <div class="left side-menu">

                <div class="slimScrollDiv active" style="position: relative; overflow: hidden; width: auto; height: 944px;"><div class="slimscroll-menu in" id="remove-scroll" style="overflow: hidden; width: auto; height: 944px;">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo">
                            <span>
                                <img src="assets/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                                <img src="assets/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="#">Maxine Kennedy</a> </h5>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu" class="active">

                        <ul class="metismenu in" id="side-menu">

                            <!--<li class="menu-title">Navigation</li>-->

                            <li class="active">
                                <a href="index.html" class="active">
                                    <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">7</span> <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Apps </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="apps-calendar.html">Calendar</a></li>
                                    <li><a href="apps-tickets.html">Tickets</a></li>
                                    <li><a href="apps-taskboard.html">Task Board</a></li>
                                    <li><a href="apps-task-detail.html">Task Detail</a></li>
                                    <li><a href="apps-contacts.html">Contacts</a></li>
                                    <li><a href="apps-projects.html">Projects</a></li>
                                    <li><a href="apps-companies.html">Companies</a></li>
                                    <li><a href="apps-file-manager.html">File Manager</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-mail"></i><span> Email </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="email-inbox.html">Inbox</a></li>
                                    <li><a href="email-read.html">Read Email</a></li>
                                    <li><a href="email-compose.html">Compose Email</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-layout"></i><span> Layouts </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="layouts-menucollapsed.html">Menu Collapsed</a></li>
                                    <li><a href="layouts-small-menu.html">Small Menu</a></li>
                                    <li><a href="layouts-dark-lefbar.html">Dark Leftbar</a></li>
                                    <li><a href="layouts-center-logo.html">Center Logo</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-briefcase"></i> <span> UI Elements </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-cards.html">Cards</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-spinners.html">Spinners</a></li>
                                    <li><a href="ui-ribbons.html">Ribbons</a></li>
                                    <li><a href="ui-tooltips-popovers.html">Tooltips &amp; Popover</a></li>
                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="ui-tabs.html">Tabs</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                    <li><a href="ui-notifications.html">Notification</a></li>
                                    <li><a href="ui-grid.html">Grid</a></li>
                                    <li><a href="ui-sweet-alert.html">Sweet Alert</a></li>
                                    <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                    <li><a href="ui-range-slider.html">Range Slider</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="widgets.html">
                                    <i class="fi-command"></i> <span> Widgets </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Charts </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="chart-flot.html">Flot Chart</a></li>
                                    <li><a href="chart-morris.html">Morris Chart</a></li>
                                    <li><a href="chart-google.html">Google Chart</a></li>
                                    <li><a href="chart-chartist.html">Chartist Chart</a></li>
                                    <li><a href="chart-chartjs.html">Chartjs Chart</a></li>
                                    <li><a href="chart-sparkline.html">Sparkline Chart</a></li>
                                    <li><a href="chart-knob.html">Jquery Knob</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-disc"></i><span class="badge badge-info pull-right">10</span> <span> Forms </span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="form-elements.html">Form Elements</a></li>
                                    <li><a href="form-advanced.html">Form Advanced</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-pickers.html">Form Pickers</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-mask.html">Form Masks</a></li>
                                    <li><a href="form-summernote.html">Summernote</a></li>
                                    <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                                    <li><a href="form-x-editable.html">X Editable</a></li>
                                    <li><a href="form-uploads.html">Multiple File Upload</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-box"></i><span> Icons </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                                    <li><a href="icons-fontawesome.html">Font awesome</a></li>
                                    <li><a href="icons-feather.html">Feather Icons</a></li>
                                    <li><a href="icons-simpleline.html">Simple Line Icons</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-paper"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="tables-basic.html">Basic Tables</a></li>
                                    <li><a href="tables-datatable.html">Data Tables</a></li>
                                    <li><a href="tables-responsive.html">Responsive Table</a></li>
                                    <li><a href="tables-tablesaw.html">Tablesaw Tables</a></li>
                                    <li><a href="tables-foo.html">Foo Tables</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">More</li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-location-2"></i> <span> Maps </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="maps-google.html">Google Maps</a></li>
                                    <li><a href="maps-vector.html">Vector Maps</a></li>
                                    <li><a href="maps-mapael.html">Mapael Maps</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-paper-stack"></i><span> Pages </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="page-starter.html">Starter Page</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-logout.html">Logout</a></li>
                                    <li><a href="page-recoverpw.html">Recover Password</a></li>
                                    <li><a href="page-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                                    <li><a href="page-404.html">Error 404</a></li>
                                    <li><a href="page-404-alt.html">Error 404-alt</a></li>
                                    <li><a href="page-500.html">Error 500</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);"><i class="fi-marquee-plus"></i><span class="badge badge-success pull-right">Hot</span> <span> Extra Pages </span></a>
                                <ul class="nav-second-level collapse" aria-expanded="false">
                                    <li><a href="extras-timeline.html">Timeline</a></li>
                                    <li><a href="extras-profile.html">Profile</a></li>
                                    <li><a href="extras-invoice.html">Invoice</a></li>
                                    <li><a href="extras-faq.html">FAQ</a></li>
                                    <li><a href="extras-pricing.html">Pricing</a></li>
                                    <li><a href="extras-email-template.html">Email Templates</a></li>
                                    <li><a href="extras-ratings.html">Ratings</a></li>
                                    <li><a href="extras-search-results.html">Search Results</a></li>
                                    <li><a href="extras-gallery.html">Gallery</a></li>
                                    <li><a href="extras-maintenance.html">Maintenance</a></li>
                                    <li><a href="extras-coming-soon.html">Coming Soon</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);"><i class="fi-share"></i> <span> Multi Level </span> <span class="menu-arrow"></span></a>
                                <ul class="nav-second-level nav collapse" aria-expanded="false">
                                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                                    <li><a href="javascript: void(0);" aria-expanded="false">Level 1.2 <span class="menu-arrow"></span></a>
                                        <ul class="nav-third-level nav collapse" aria-expanded="false">
                                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div><div class="slimScrollBar" style="background: rgb(158, 165, 171); width: 8px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 909.322px;"></div><div class="slimScrollRail" style="width: 8px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                <!-- Sidebar -left -->

            </div>
			   
			   
			  <div class="content-page"> 
				  
		
		<div class="content">	   
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">เพิ่ม/แก้ไข ข้อมูลเกี่ยวกับเรา</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php $aboutus = $this->contactus_model->get_aboutusData();
			  		  $countRows = 	$aboutus->num_rows();
			  
			  		  $dataID = '';
			  		  //$desc_en = '';
			  
					  if($countRows>0) {	
			  		    foreach($aboutus->result() as $aboutus2){	}	
						  
						$dataID = $aboutus2->id;   
					  }
				 ?>     
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
										
										<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
                                    
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
												   <i class="fi-monitor mr-2"></i> คำอธิบายของหน้าเว็บแสดงข้อมูลเกี่ยวกับเรา
												</a>
											</li>
											<li class="nav-item">
												<a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
													<i class="fi-head mr-2"></i> ประวัติ
												</a>
											</li>
											<li class="nav-item">
												<a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-mail mr-2"></i> วิสัยทัศน์
												</a>
											</li>
											<li class="nav-item">
												<a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-cog mr-2"></i> พันธกิจ
												</a>
											</li>
										</ul>
										
										<div class="tab-content"><br>
											<div class="tab-pane show active" id="home">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="desc_th">คำอธิบาย : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea class="form-control form-control-sm" rows="5" id="desc_th" name="desc_th"><?php if($dataID !=''){ echo $aboutus2->desc_th;}?></textarea>
													</div>
												</div> 

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="desc_en">คำอธิบาย : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea class="form-control form-control-sm" rows="5" id="desc_en" name="desc_en"><?php if($dataID !=''){ echo $aboutus2->desc_en;}?></textarea>
													</div>
												</div>											
											</div>
											
											<div class="tab-pane" id="profile">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="history_th">ประวัติ : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="history_th" name="history_th" class="ex"><?php if($dataID !=''){ echo $aboutus2->history_th;}?></textarea>
													</div>										
												</div> 	

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="history_en">ประวัติ : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="history_en" name="history_en" class="ex"><?php if($dataID !=''){ echo $aboutus2->history_en;}?></textarea>
													</div>										
												</div> 
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="history_img">รูป Banner</label>
													<div class="col-md-9 col-sm-12">
														<div class="fileupload <?php  if(($dataID !='') && ($aboutus2->history_img !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
														<?php if($dataID ==''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
														<?php } ?>	

														<?php if($dataID !=''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
															<?php //if($aboutus2->history_img ==''){ ?>	
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															<?php //} ?>	
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
															<?php if($aboutus2->history_img !=''){ ?>	
																<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$aboutus2->history_img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$aboutus2->history_img?>','_blank'); location.reload();" /><!--</a>-->
															<?php } ?>	
															</div>
														<?php } ?>	

															<div>
																<button type="button" class="btn btn-custom btn-file">
																	<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																	<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																	<input type="file" class="btn-light" id="history_img" name="fileupload1" value=""  />
																</button>
																<?php  if(($dataID !='') && ($aboutus2->history_img !='')){ ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $aboutus2->history_img?>' , 'รูปภาพ' , 'tbl_aboutus_data' , 'history_img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>

																<?php } else { ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
																<?php } ?>

															</div>
															
															<input type="hidden" name="old_file1" id="history_img<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $aboutus2->history_img;}?>" >
														</div>
														
													</div>	
												</div>
												
											</div>
											
											<div class="tab-pane" id="messages">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="vision_th">วิสัยทัศน์ : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="vision_th" name="vision_th" class="ex"><?php if($dataID !=''){ echo $aboutus2->vision_th;}?></textarea>
													</div>										
												</div> 	

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="vision_en">วิสัยทัศน์ : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="vision_en" name="vision_en" class="ex"><?php if($dataID !=''){ echo $aboutus2->vision_en;}?></textarea>
													</div>										
												</div> 
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="vision_img">รูป Banner</label>
													<div class="col-md-9 col-sm-12">
														<div class="fileupload <?php  if(($dataID !='') && ($aboutus2->vision_img !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
														<?php if($dataID ==''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
														<?php } ?>	

														<?php if($dataID !=''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
															<?php //if($aboutus2->vision_img ==''){ ?>	
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															<?php //} ?>	
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
															<?php if($aboutus2->vision_img !=''){ ?>	
																<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$aboutus2->vision_img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$aboutus2->vision_img?>','_blank'); location.reload();" /><!--</a>-->
															<?php } ?>	
															</div>
														<?php } ?>	

															<div>
																<button type="button" class="btn btn-custom btn-file">
																	<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																	<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																	<input type="file" class="btn-light" id="vision_img" name="fileupload2" value="" />
																</button>
																<?php  if(($dataID !='') && ($aboutus2->vision_img !='')){ ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $aboutus2->vision_img?>' , 'รูปภาพ' , 'tbl_aboutus_data' , 'vision_img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>

																<?php } else { ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
																<?php } ?>

															</div>
															
															<input type="hidden" name="old_file2" id="vision_img<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $aboutus2->vision_img;}?>" >
														</div>
														
													</div>	
												</div>
												
											</div>
											
											<div class="tab-pane" id="settings">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="mission_th">พันธกิจ : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="mission_th" name="mission_th" class="ex"><?php if($dataID !=''){ echo $aboutus2->mission_th;}?></textarea>
													</div>										
												</div> 	

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="mission_en">พันธกิจ : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="mission_en" name="mission_en" class="ex"><?php if($dataID !=''){ echo $aboutus2->mission_en;}?></textarea>
													</div>										
												</div> 
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="mission_img">รูป Banner</label>
													<div class="col-md-9 col-sm-12">
														<div class="fileupload <?php  if(($dataID !='') && ($aboutus2->mission_img !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
														<?php if($dataID ==''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
														<?php } ?>	

														<?php if($dataID !=''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
															<?php //if($aboutus2->mission_img ==''){ ?>	
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															<?php //} ?>	
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
															<?php if($aboutus2->mission_img !=''){ ?>	
																<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$aboutus2->mission_img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$aboutus2->mission_img?>','_blank'); location.reload();" /><!--</a>-->
															<?php } ?>	
															</div>
														<?php } ?>
															
															<div>
																<button type="button" class="btn btn-custom btn-file">
																	<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																	<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																	<input type="file" class="btn-light" id="mission_img" name="fileupload3" value="" />
																</button>
																<?php  if(($dataID !='') && ($aboutus2->mission_img !='')){ ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $aboutus2->mission_img?>' , 'รูปภาพ' , 'tbl_aboutus_data' , 'mission_img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>

																<?php } else { ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
																<?php } ?>

															</div>
															
															<input type="hidden" name="old_file3" id="mission_img<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $aboutus2->mission_img;}?>" >
														</div>													
													</div>	
												</div>
												
											</div>
											
										</div>
										<!--<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">-->
											
											<!--<input type="file" id="history_img" name="fileupload1" style="display: none;" />
											<input type="file" id="vision_img" name="fileupload2" style="display: none;" />
											<input type="file" id="mission_img" name="fileupload3" style="display: none;" />-->	
											
											<!--<input type="hidden" name="old_file1" id="history_img<?php //echo $dataID?>" value="<?php //if($dataID !=''){ echo $aboutus2->history_img;}?>" >
											<input type="hidden" name="old_file2" id="vision_img<?php //echo $dataID?>" value="<?php// if($dataID !=''){ echo $aboutus2->vision_img;}?>" >
											<input type="hidden" name="old_file3" id="mission_img<?php// echo $dataID?>" value="<?php //if($dataID !=''){ echo $aboutus2->mission_img;}?>" >-->
											
											<input type="hidden" name="feildf1" id="feildf1" value="history_img" >
											<input type="hidden" name="feildf2" id="feildf2" value="vision_img" >
											<input type="hidden" name="feildf3" id="feildf3" value="mission_img" >
											<input type="hidden" name="table" id="table" value="tbl_aboutus_data" >
											<input type="hidden" name="num" id="num" value="3" >
											
											<input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" >										
										
										<br><br>
										<div class="form-group row">
											<div class="col-12" style="text-align: center">
												<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="checkfrm_aboutus()">เพิ่มข้อมูล</button>					
											</div>                                    
										</div>	
										</form>
										
                                    </div>
                                </div>

                            </div>
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container -->
        </div> </div>   </div>
<?php //echo '1->'.$this->uri->segment(1) ;?>
<?php //echo '2->'.$this->uri->segment(2) ;?>
<?php //echo '3->'.$this->uri->segment(3) ;?>
<?php //echo '4->'.$this->uri->segment(4) ;?>
<!DOCTYPE html>
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
			
			#topnav .navigation-menu > li > a {
				padding-left: 0;
    			padding-right: 15px;
			}
		</style>

    </head>
    
    

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main" style="background-color: #26AB93">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!-- <a href="index.html" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                            <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
                        </a> -->
                        <!-- Image Logo -->
                        <a href="<?php echo base_url('control')?>" class="logo">
                               <img src="<?php echo base_url('assets/images/logo-fem.png')?>" alt="" height="45" class="logo-small">
                            <img src="<?php echo base_url('assets/images/logo-fem.png')?>" alt="" height="50" class="logo-large">
                            
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">					 
					
						    <?php if($this->session->userdata('userLv') != '0'){ ?>
							<li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-database"></i> <span class="ml-1 pro-user-name">Database <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">                       
                                    <!-- item-->
                                    <a href="javascript:void(0);" onClick="window.location.href='<?php echo base_url('Control/BackupDatabase')?>'" class="dropdown-item notify-item">
                                        <i class="dripicons-download"></i> <span>Export Database</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" onClick="modalImport()" class="dropdown-item notify-item">
                                    <!--<a href="javascript:void(0);" onClick="window.location.href='<?php echo base_url('Control/importDB')?>'" class="dropdown-item notify-item">-->
                                        <i class="dripicons-upload"></i> <span>Import Database</span>
                                    </a>

                                </div>
                            </li>
							<?php } ?>

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link" style="color: white!important">
                                    <div class="lines" >
                                        <span style="color: white!important"></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            

                         
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="icon-user"></i> <span class="ml-1 pro-user-name"><?php echo $this->session->userdata('name')?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                <?php $user1 = $this->session->userdata('user_id'); ?>   

                                    <!-- item-->
                                    <a href="javascript:void(0);" onClick="window.location.href='<?php echo base_url('control/addUser/').$user1?>'" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>เปลี่ยนรหัสผ่าน</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" onClick="window.location.href='<?php echo base_url('logout')?>'" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>ออกจากระบบ</span>
                                    </a>

                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom" style="background-color: #dbdbdb;">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <!--<li class="has-submenu">
                                <a href="<?php //echo base_url()?>/control" class="menu_name"><i class="icon-home"></i> Home</a>
								
                            </li>
-->
                           <?php   $getMenuCate = $this->user_model->getMenuList('1','0');
		 						   foreach($getMenuCate->result() AS $MenuCate){ 
							?>
                           <li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-settings menu_name"></i> <?php echo $MenuCate->menu_name?></a>
                                <ul class="submenu" style="left: 10%;">
                                <?php   $getMenuSub = $this->user_model->getMenuList('2',$MenuCate->id);
		 							foreach($getMenuSub->result() AS $MenuSub){ 
										//if($MenuSub->menu_url!=''){ 
							    ?>   
                                   
                                    <li><a href="<?php echo base_url($MenuSub->menu_url)?>"><?php echo $MenuSub->menu_name?></a></li>
                                    <?php } ?>
                                    
                                    
                                    <!--
									<li><a href="<?php //echo base_url('control/AddNews')?>">เพิ่มข้อมูลข่าวสาร</a></li>
                                    <li><a href="<?php //echo base_url('control/Newsdata')?>">ข้อมูลข่าวสาร</a></li>-->
                                    
                                </ul>
                            </li>
                            <?php } ?>  
                               
                 <?php /* ?>           <li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-layers menu_name"></i> News</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('control/NewsCategory')?>">หมวดข่าวสาร</a></li>
									<li><a href="<?php echo base_url('control/AddNews')?>">เพิ่มข้อมูลข่าวสาร</a></li>
                                    <li><a href="<?php echo base_url('control/Newsdata')?>">ข้อมูลข่าวสาร</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Administrator</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/administratorAdd')?>">เพิ่มข้อมูลผู้บริหาร</a></li>
                                            <li><a href="<?php echo base_url('control/administratorData')?>">ข้อมูลผู้บริหาร</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Staff</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/staffCategory')?>">หมวดบุคลากร</a></li>
											<li><a href="<?php echo base_url('control/staffAdd')?>">เพิ่มข้อมูลบุคลากร</a></li>
                                            <li><a href="<?php echo base_url('control/staffData')?>">ข้อมูลบุคลากร</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Events</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/eventAdd')?>">เพิ่มข้อมูล Event</a></li>
                                            <li><a href="<?php echo base_url('control/eventData')?>">ข้อมูล Events</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Slide</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/addSlideIMG')?>">เพิ่มภาพสไลด์</a></li>
                                            <li><a href="<?php echo base_url('control/slideIMG')?>">ภาพสไลด์</a></li>
                                            <li><a href="<?php echo base_url('control/slideText')?>">ข้อความสไลด์</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Facilities</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/facilityAdd')?>">เพิ่มข้อมูล Facility</a></li>
                                            <li><a href="<?php echo base_url('control/facilitiesData')?>">ข้อมูล Facilities</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Curriculums</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>     
											<li><a href="<?php echo base_url('control/curriculumDescription')?>">คำอธิบาย</a></li>
                                            <li><a href="<?php echo base_url('control/curriculumAdd')?>">เพิ่มข้อมูลหลักสูตร</a></li>
                                            <li><a href="<?php echo base_url('control/curriculumsData')?>">ข้อมูลหลักสูตร</a></li>                                 <li><a href="<?php echo base_url('control/AddOtherTopic')?>">เพิ่มข้อมูลหัวข้อเพิ่มเติม</a></li>                                   <li><a href="<?php echo base_url('control/OtherTopicData')?>">ข้อมูลหัวข้อเพิ่มเติม</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
                            
                            <li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Research</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/researchClusterAdd')?>">เพิ่มข้อมูลกลุ่มการวิจัย</a></li>
                                            <li><a href="<?php echo base_url('control/researchClustersData')?>">ข้อมูลกลุ่มการวิจัย</a></li>                                           
                                        </ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> About & Contact</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>     
											<li><a href="<?php echo base_url('control/aboutUs')?>">ข้อมูล About Us</a></li>  
											<li><a href="<?php echo base_url('control/contactUs')?>">ข้อมูล Contact Us</a></li> 
										</ul>
                                    </li>                                 
                                </ul>
                            </li>
							
							<!--<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Contact Us</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>     
											<li><a href="<?php //echo base_url('control/contactUs')?>">ข้อมูลติดต่อเรา</a></li>                                              
										</ul>
                                    </li>
                                  
                                </ul>
                            </li>-->
							
							<!--<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Video</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php //echo base_url('control/videoAdd')?>">เพิ่มข้อมูลวีดิโอ</a></li>
                                            <li><a href="<?php //echo base_url('control/videoData')?>">ข้อมูลวีดิโอ</a></li>                                             
										</ul>
                                    </li>
                                  
                                </ul>
                            </li>-->
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> Alumni</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/alumniData')?>">ข้อมูลศิษย์เก่า</a></li>                                             
										</ul>
                                    </li>
                                  
                                </ul>
                            </li>
							
							<li class="has-submenu">
                                <a href="#" class="menu_name"><i class="icon-briefcase menu_name"></i> User</a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>                                
                                            <li><a href="<?php echo base_url('control/userData')?>">ข้อมูลผู้ใช้งาน</a></li>                                             
										</ul>
                                    </li>
                                  
                                </ul>
                            </li><?php */ ?>
                        
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
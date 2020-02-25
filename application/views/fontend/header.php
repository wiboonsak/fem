<?php /*if($this->session->userdata('weblang')=='en'){
		include("define_eng.php");
		}else{
			include("define_thai.php");
		}*/
$this->lang->load('content', $this->session->userdata('weblang'));
?>
<div class="top-bar header4">
                <div class="top-bar-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-6">
                                <nav class="top-nav">
                                    <ul class="text-left list-inline">
                                        <li><a href="#" style="font-weight: normal;"><?php echo date("l, F j, Y")?></a></li>
                                        <li><a href="#" style="font-weight: normal;">Call : +66-74-28-6899</a>
											 <?php //echo 'weblang >'.$this->session->userdata('weblang');
											
											//echo '---'.$this->lang->line('home');
											
											?>
										</li>
                                    </ul>
                                </nav>
                            </div>

                            <div class="col-xs-12 col-sm-4 col-md-6">
                                <div class="social-links text-right">
                                    <ul>
                                        <li><a href="<?php echo base_url('switchLang/index/th')?>">TH</a></li>
                                        <li><a href="<?php echo base_url('switchLang/index/en')?>">EN</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>

            <div class="main-head">
                <div class="container">
                    <div class="top-head clearfix">
                        <div class="logo">
                            <a href="#">
                                <img src="<?php echo base_url('webpage/images/logo-white-header.png')?>" alt="Faculty of Environmental Management - คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์">
                            </a>
                        </div>
                        <div class="" style="float: right !important">
                            <a href="#">
                                <img src="<?php echo base_url('webpage/images/logo-psu-explore-3.jpg')?>" alt="" class="img-responsive">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
			<!--   Navigation     ==================================== -->
            <header class="main-head sticky-header">
                <div class="container">
                    <div class="mega-menu-wrapper no-beaf clear">
                        <div class="navbar-header">
                            <!-- responsive nav button -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- /responsive nav button -->
                        </div>
                        <!-- main nav -->
                        <nav class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="current mega-menu"><a href="<?php echo base_url()?>"><?php echo $this->lang->line('Home'); ?></a></li>
                                <li><a href="<?php echo base_url('About_us')?>"><?php echo $this->lang->line('AboutUs'); ?></a></li>
								<li><a href="<?php echo base_url('Curriculum')?>"><?php echo $this->lang->line('Curriculum'); ?></a>					
									
									<ul class="dropdown" style="font-size: 10pt; margin: 0px 10px; padding: 0px 10px; ">
							
									<?php   $dataID ='';  $show = '1';		
											$curriculumData = $this->curriculum_model->list_curriculumsData($show,$dataID);
			  								foreach($curriculumData->result() as $curriculumData2){								
										
											if($curriculumData2->file_nameEN !=''){
												$ahrefURL = base_url().$curriculumData2->file_nameEN;
												$none1 = '';
												
											} else {  
												$ahrefURL = ''; 
												$none1 = 'display: none';
											}
												
											if($curriculumData2->file_nameTH !=''){
												$ahrefURL2 = base_url().$curriculumData2->file_nameTH;
												$none2 = '';
											
											} else {  
												$ahrefURL2 = '';
												$none2 = 'display: none';
											}
										
										?>		  						  				
										
									  <li style="border-bottom: 1px solid #D0D0D0; padding-top: 7px; padding-bottom: 7px; line-height: 22px; <?php if($this->session->userdata('weblang') == 'en'){ echo $none1; } else { echo $none2; }?>"><a href="<?php if($this->session->userdata('weblang') == 'en'){ echo $ahrefURL; } else { echo $ahrefURL2; }?>" target="_blank"><?php if($this->session->userdata('weblang') == 'en'){ echo $curriculumData2->curriculum_nameEN; } else { echo $curriculumData2->curriculum_nameTH; }?></a></li>
									  
									<?php } ?>									
									</ul>
								</li>
								<li><a href="<?php echo base_url('Administrator')?>"><?php echo $this->lang->line('Administator');?></a></li>
								<li><a href="<?php echo base_url('Staff')?>"><?php echo $this->lang->line('Staff');?></a>
								
									<ul class="dropdown" style="font-size: 10pt; margin: 0px 10px; padding: 0px 10px; ">
							
									<?php   $dataID ='';  $show = '1';		
											$staffCategory = $this->staff_model->list_staffCategory($show);	
			  								foreach($staffCategory->result() as $staffCategory2){	?>				
									  <li style="border-bottom: 1px solid #D0D0D0; padding-top: 7px; padding-bottom: 7px; line-height: 22px;"><a href="<?php echo base_url('Staff')?>#section<?php echo $staffCategory2->id;?>" ><?php if($this->session->userdata('weblang') == 'en'){ echo $staffCategory2->name_en; } else { echo $staffCategory2->name_th; }?></a></li>
									  
									<?php } ?>									
									</ul>	
								
								</li>
								<li><a href="<?php echo base_url('Facilities')?>"><?php echo $this->lang->line('Facilities');?></a></li>
								<li><a href="<?php echo base_url('Alumni')?>"><?php echo $this->lang->line('Alumni');?></a></li>
								<li><a href="<?php echo base_url('Research_clusters')?>"><?php echo $this->lang->line('Research');?></a></li>
								<li><a href="<?php echo base_url('Contact_us')?>"><?php echo $this->lang->line('ContactUs');?></a></li>                               
                            </ul>
                        </nav>
                        <!-- /main nav -->
                    </div>                
                </div>
            </header>
            
           <!--  End Navigation   ==================================== -->
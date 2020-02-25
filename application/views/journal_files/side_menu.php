<style>
	.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6, label, th {
		font-family: "Roboto", sans-serif !important;
	}
	
    #sidebar-menu > ul > li > a:hover {

        color: #f9bc0b;
    }

    #sidebar-menu > ul > li > a {		
        color: #FFFFFF;
    }

    .nav-second-level li a, .nav-thrid-level li a {		
        color: #FFFFFF;
    }
	
    #sidebar-menu > ul > li > a:focus, #sidebar-menu > ul > li > a:active {		
        color: #000000 !important;
        background-color: #dadada !important;
    }

    #sidebar-menu > ul > li > a.active {		
        color: #000000 !important;
        background-color: #dadada !important;
    }

    /*.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .page-item.active .page-link {
            
            
    }*/
	.nav-second-level li a:hover, .nav-thrid-level li a:hover {
    	background-color: #c9eae9;
    	color: #000000;
	}

    .mce-btn {		
        background-color: #dadada !important;    
        color: #000000 !important;
    }

    .mce-menubtn button span, .mce-menubtn button i, .mce-btn button span, .mce-btn button i {
        color: #000000 !important;
    }

    .mce-menubar .mce-caret, .mce-btn .mce-caret {
        border-top-color: #000000 !important;
    }

	.nav-second-level li.active > a {
    	color: #000000;
    	background-color: #c9eae9;
		font-weight: 600;
	}

</style>
<title>[Back Office] Journal of Environmental Management and Energy System | JEMES</title>

<div class="left side-menu" style="background-color: #00aba6">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left" style="background-color: #007b77">
            <a href="<?php echo base_url('CMS_Journal')?>" class="logo">
                <span>
                    <img src="<?php echo base_url('assets_journal/logoJ.png')?>" alt="" height="40">
                </span>
                <i>
                    <img src="<?php echo base_url('assets_journal/logoJ.png')?>" alt="" height="28">
                </i>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">          
                        <h5 style="color: #FFFFFF">Welcome <?php if ($this->session->userdata('juserLv') == '1'){echo 'Admin';}else if ($this->session->userdata('juserLv') == '2') { echo 'Managing'; } else { echo 'Editor/Reviewer';  } ?></h5>			
        </div>

        <?php if(($this->session->userdata('juserLv') == '1') || ($this->session->userdata('juserLv') == '2')){
            		$status1 = "'0'";
            		$userID = '';
						
					$countPaper = $this->journal_model->list_paperData($userID, $status1);
					$countPaperEdit = $this->journal_model->paper_authorEdit();
        			$countPaperA2 = $countPaper->num_rows();				
        			$countPaperE2 = $countPaperEdit->num_rows();
					$countPaper2 = $countPaperA2 + $countPaperE2;
        }  

        if($this->session->userdata('juserLv') == '3'){

            $userID = $this->session->userdata('juser_id');
            //$status1 = "'1'";
			$countPaper = $this->journal_model->paper_authorEdit2($userID, '1');
			$countPaperEdit = $this->journal_model->paper_authorEdit2($userID, '2');
			
			$countPaper2 = $countPaper + $countPaperEdit;
			
			
        	/*$countPaperA2 = $countPaper->num_rows();				
        	$countPaperE2 = $countPaperEdit->num_rows();
			$countPaper2 = $countPaperA2 + $countPaperE2;*/			
        }
//echo 'e...'.$countPaperA2; echo 'r...'.$countPaperEdit;
       // $countPaper = $this->journal_model->list_paperData($userID, $status1);
      //  $countPaper2 = $countPaper->num_rows();
        ?>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->
<?php if(($this->session->userdata('juserLv') =='1') || ($this->session->userdata('juserLv') =='2')){ ?>
				<li>
                    <!--<a href="<?php //echo base_url('CMS_Journal') ?>">
                        <i class="fi-air-play"></i>--> <p style="background-color: #007b77; font-size: 15px; line-height: 2.6; padding-left: 20px; margin-bottom: 0px; color: #FFFFFF;"> <strong>Journal Managing</strong> </p>
                    <!--</a>-->
                </li>
	<?php } ?>			
                <li>
                    <a href="<?php echo base_url('CMS_Journal')?>">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right" style="background-color: #F9BC0B;"><?php if($countPaper2 <1){ echo '0'; } else { echo $countPaper2; }?></span> <span> New Assignments </span>
                    </a>
                </li>  

                <!--<li>
                    <a href="#">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">7</span> <span> ข้อมูลรีวิว </span>
                    </a>
                </li>      --> 
                    
					<li>
					<?php //if ($this->session->userdata('juserLv') == '3') { ?>                        
						<a href="javascript: void(0);"><i class="fi-command"></i><span> Manuscripts by Decision Status</span> <span class="menu-arrow"></span></a>
					<?php /*} else { ?>	
						<a href="#">
                            <i class="fi-command"></i> <span> ข้อมูลบทความ </span>
                        </a>
					<?php } */?>	
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/statusAccepted')?>">Status Accepted</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/statusRejected')?>">Status Rejected</a></li>
							
					<?php if(($this->session->userdata('juserLv') =='1') || ($this->session->userdata('juserLv') =='2')){ ?>
							
                            <li><a href="<?php echo base_url('CMS_Journal/statusArchived')?>">Status Archived</a></li>
					<?php } ?>		
							
						</ul>    
                    </li>                                                                                  

<?php if(($this->session->userdata('juserLv') =='1') || ($this->session->userdata('juserLv') =='2')){ ?>	
                    <li>
                        <a href="javascript: void(0);"><i class="fi-box"></i><span> Payment Status</span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/payment')?>">Method of Payment</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/payment_detail')?>">Payment Note</a></li>
                        </ul>
                    </li>
					<li>
                    	<a href="<?php echo base_url('CMS_Journal/sendemail')?>"><i class="fa fa-envelope"></i><span> Audit Trail</span>
                    	</a>
                	</li>
					<li>
                        <a href="javascript: void(0);"><i class="fi-paper"></i><span> Report </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/Report_by_Status')?>">Manuscript Status and Summary Reports</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/Report_Number_Paper')?>">Number of Manuscript Reports</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/Report_by_Author')?>">Author Reports</a></li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript: void(0);"><i class="fi-layout"></i><span> Journal Home</span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/published_journal')?>">New Issues</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/published_view')?>">Issues Data</a></li>
                            <!--<li><a href="<?php //echo base_url('CMS_Journal/published_PDF')?>">เพิ่มข้อมูลบทความ</a></li> -->                                   
                                                        
                        </ul>
                    </li>
                    <?php if($this->session->userdata('juserLv') =='1'){?>
                    <li>
                        <a href="javascript: void(0);"><i class="fa fa-id-card-o"></i><span> Manage User </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/user_data')?>">User Data</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/author_data')?>">Author Data</a></li>
                        </ul>
                    </li>
				    <li>
                    <!--<a href="<?php //echo base_url('CMS_Journal') ?>">
                        <i class="fi-air-play"></i>--> <p style="background-color: #007b77; font-size: 15px; line-height: 2.6; padding-left: 20px; margin-bottom: 0px; color: #FFFFFF;"> <strong>Front end Managing</strong> </p>
                    <!--</a>-->
                   </li>	
                   <li>
                        <a href="javascript: void(0);"><i class="fi-folder"></i><span> Home </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/home')?>">Add / Edit Data</a></li>
                            
                                                     
                        </ul>
                    </li>       
                   <li>
                        <a href="javascript: void(0);"><i class="dripicons-align-center"></i><span> About Jemes </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/aboutjemes')?>">Add Data</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/aboutData')?>">List Data</a></li>
                                                     
                        </ul>
                    </li>       
                   <li>
                        <a href="javascript: void(0);"><i class="dripicons-monitor"></i><span> Instructions Authors </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/instructions_add')?>">Add Data</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/instructions_view')?>">List Data</a></li>
                                                     
                        </ul>
                    </li>       
                   <li>
                        <a href="javascript: void(0);"><i class="fa fa-user-circle"></i><span> Editorial Board </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/edit_cate')?>">Add / Edit Catagories</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/edit_add') ?>">Add Data</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal/edit_view')?> ">List Data</a></li>
                                                     
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript: void(0);"><i class="fa fa-vcard"></i><span> Contact US </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/contact')?>">Add / Edit Data</a></li>
						</ul>
                    </li> 
                    <?php }?>
                     <!--<li>
                    <a href="<?php// echo base_url('CMS_Journal/sendemail') ?>">
                        <i class="fa fa-envelope"></i><span class="badge badge-danger badge-pill pull-right" style="background-color: #F9BC0B;"></span> <span> Audit Trail </span>
                    </a>
                </li>-->  
<?php } ?>
<?php //if($this->session->userdata('juserLv') != '1'){?>
                <li>
                    <a href="<?php echo base_url('CMS_Journal/edit_myData')?>">
                        <i class="mdi mdi-account-settings-variant"></i> <span> Change Profile</span>
                    </a>
                </li>
<?php //} ?>				
				<li>
                    <a href="<?php echo base_url('CMS_Journal/logout') ?>">
                        <i class="mdi mdi-logout"></i> <span> Logout</span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
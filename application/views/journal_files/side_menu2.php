<style>
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
        background-color: #f2f2f2 !important;
    }

    #sidebar-menu > ul > li > a.active {		
        color: #000000 !important;
        background-color: #f2f2f2 !important;
    }

    /*.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus, .page-item.active .page-link {
            
            
    }*/

    .mce-btn {		
        background-color: #d9d9d9 !important;    
        color: #000000 !important;
    }

    .mce-menubtn button span, .mce-menubtn button i, .mce-btn button span, .mce-btn button i {
        color: #000000 !important;
    }

    .mce-menubar .mce-caret, .mce-btn .mce-caret {
        border-top-color: #000000 !important;
    }



</style>
<title>[Back Office] Journal of Environmental Management and Energy System | JEMES</title>

<div class="left side-menu" style="background-color: #00aba6">

    <div class="slimscroll-menu" id="remove-scroll">

        <!-- LOGO -->
        <div class="topbar-left" style="background-color: #007b77">
            <a href="index.html" class="logo">
                <span>
                    <img src="<?php echo base_url('assets_journal/logoJ.png') ?>" alt="" height="40">
                </span>
                <i>
                    <img src="<?php echo base_url('assets_journal/logoJ.png') ?>" alt="" height="28">
                </i>
            </a>
        </div>

        <!-- User box -->
        <div class="user-box">          
			<h5 style="color: #FFFFFF"> <?php if (($this->session->userdata('juserLv') == '1') || ($this->session->userdata('juserLv') == '2')) { echo 'Managing'; } else { echo 'Editor/Reviewer';  } ?></h5>			
        </div>

        <?php   if (($this->session->userdata('juserLv') == '1') || ($this->session->userdata('juserLv') == '2')) {
            		$status1 = "'0'";
            		$userID = '';
						
					$countPaper = $this->journal_model->list_paperData($userID, $status1);
					$countPaperEdit = $this->journal_model->paper_authorEdit();
        			$countPaperA2 = $countPaper->num_rows();				
        			$countPaperE2 = $countPaperEdit->num_rows();
					$countPaper2 = $countPaperA2 + $countPaperE2;
        }  

        if ($this->session->userdata('juserLv') == '3') {

            $userID = $this->session->userdata('juser_id');
            //$status1 = "'1'";
			$countPaper = $this->journal_model->paper_authorEdit2($userID, '1');
			$countPaperEdit = $this->journal_model->paper_authorEdit2($userID, '2');		
        	$countPaperA2 = $countPaper->num_rows();				
        	$countPaperE2 = $countPaperEdit->num_rows();
			$countPaper2 = $countPaperA2 + $countPaperE2;			
        }
//echo 'e...'.$countPaperA2; echo 'r...'.$countPaperEdit;
       // $countPaper = $this->journal_model->list_paperData($userID, $status1);
      //  $countPaper2 = $countPaper->num_rows();
        ?>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <!--<li class="menu-title">Navigation</li>-->

                <li>
                    <a href="<?php echo base_url('CMS_Journal') ?>">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right" style="background-color: #F9BC0B;"><?php echo $countPaper2 ?></span> <span> บทความที่ส่งเข้ามา </span>
                    </a>
                </li>  

                <!--<li>
                    <a href="#">
                        <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">7</span> <span> ข้อมูลรีวิว </span>
                    </a>
                </li>      -->    

                    <li>
					<?php //if ($this->session->userdata('juserLv') == '3') { ?>		
                        <a href="#">
                            <i class="fi-command"></i> <span> ข้อมูลบทความ </span>
                        </a>
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
                        <a href="javascript: void(0);"><i class="fi-layout"></i><span> ข้อมูลวารสาร </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/published_journal')?>">เพิ่มวารสารฉบับใหม่</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/published_view')?>">ข้อมูลวารสาร</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/published_PDF')?>">เพิ่มข้อมูลบทความ</a></li>                                    
                                                        
                        </ul>
                    </li>                           
                    <li>
                        <a href="javascript: void(0);"><i class="fa fa-id-card-o"></i><span> Manage User </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/user_data')?>">User Data</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/author_data')?>">Author Data</a></li>
                        </ul>
                    </li>
                   <li>
                        <a href="javascript: void(0);"><i class="fi-folder"></i><span> Home </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/home')?>">เพิ่มข้อมูล</a></li>
                            
                                                     
                        </ul>
                    </li>       
                   <li>
                        <a href="javascript: void(0);"><i class="dripicons-align-center"></i><span> About Jemes </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/aboutjemes') ?>">เพิ่มข้อมูล</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/aboutData')?> ">รายการข้อมูล</a></li>
                                                     
                        </ul>
                    </li>       
                   <li>
                        <a href="javascript: void(0);"><i class="dripicons-monitor"></i><span> Instructions Authors </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/instructions_add') ?>">เพิ่มข้อมูล</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/instructions_view')?> ">รายการข้อมูล</a></li>
                                                     
                        </ul>
                    </li>       
                   <li>
                        <a href="javascript: void(0);"><i class="fa fa-user-circle"></i><span> Editorial Board </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/edit_cate') ?>">ประเภท</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/edit_add') ?>">เพิ่มข้อมูล</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/edit_view')?> ">รายการข้อมูล</a></li>
                                                     
                        </ul>
                    </li> 
                    <li>
                        <a href="javascript: void(0);"><i class="fa fa-vcard"></i><span> Contact US </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/contact') ?>">เพิ่มข้อมูล</a></li>
                            
                                                     
                        </ul>
                    </li> 
					<li>
                        <a href="javascript: void(0);"><i class="fi-box"></i><span> Report </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal/Report_by_Status') ?>">รายงานสถานะการส่ง Paper</a></li>
                            <li><a href="#">รายงานแสดงจำนวนผู้ส่ง Paper</a></li>
                            <li><a href="#">รายงานผู้ส่ง Paper รายบุคคล</a></li>
                           <!-- <li><a href="<?php// echo base_url('CMS_Journal_2/payment_detail') ?>">การชำระเงินของผู้แต่ง</a></li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);"><i class="fi-box"></i><span> ข้อมูลการชำระเงิน </span> <span class="menu-arrow"></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="<?php echo base_url('CMS_Journal_2/payment') ?>">รายละเอียดการชำระเงิน</a></li>
                            <li><a href="<?php echo base_url('CMS_Journal_2/payment_detail') ?>">การชำระเงินของผู้แต่ง</a></li>
                        </ul>
                    </li>
                     <li>
                    <a href="<?php echo base_url('CMS_Journal_2/sendemail') ?>">
                        <i class="fa fa-envelope"></i><span class="badge badge-danger badge-pill pull-right" style="background-color: #F9BC0B;"></span> <span> ข้อมูลการส่งอีเมล์ </span>
                    </a>
                </li>  
<?php } ?>
<?php if($this->session->userdata('juserLv') != '1'){?>
                <li>
                    <a href="<?php echo base_url('CMS_Journal/edit_myData')?>">
                        <i class="fi-air-play"></i> <span> แก้ไขข้อมูลส่วนตัว</span>
                    </a>
                </li>
<?php } ?>				
				<li>
                    <a href="<?php echo base_url('CMS_Journal/logout') ?>">
                        <i class="fi-air-play"></i> <span> Logout</span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
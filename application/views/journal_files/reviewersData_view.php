<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--<title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico')?>">
		<!-- X editable -->
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/css/bootstrap-editable.css')?>" rel="stylesheet" />

        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css" rel="stylesheet')?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css" rel="stylesheet')?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url('assets_journal/js/modernizr.min.js')?>"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

			<?php include('side_menu.php') ?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">

                    <?php /* ?>    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-bell noti-icon"></i>
                                    <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                        </a>
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-custom badge-pill noti-icon-badge">6</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets_journal/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets_journal/images/users/avatar-3.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Sam Garret</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets_journal/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets_journal/images/users/avatar-5.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Sherry Marshall</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets_journal/images/users/avatar-6.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Shawn Millard</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                        </a>
                                    </div>

                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets_journal/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1">Maxine K <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Settings</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-help"></i> <span>Support</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-lock"></i> <span>Lock Screen</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul><?php */ ?>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Comment by reviewers</h4>
                                    <!--<ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>-->
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->
				
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

					<div class="card-box">	
					<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?php echo base_url('CMS_Journal')?>'"><i class="icon-action-undo"></i> Back</button></div><br><br>
					<?php $round = $this->journal_model->get_roundNumber($paperID); ?>	
					<div class="table-responsive">	
						<table class="table table-bordered table-hover" id="table2">
							<thead>	
								<tr style="background-color: #f2f2f2">
									<th width="5" rowspan="2" style="text-align: center">No.</th>
									<th rowspan="2" style="text-align: center">Reviewers</th>
									<th rowspan="2" style="text-align: center">Submission</th>
									<?php if($round >0){ ?>
									<th colspan="<?php echo $round?>" style="text-align: center">Rounds</th>
									<?php } ?>
									<th rowspan="2" style="text-align: center">Detail</th>
								</tr>
								<tr style="background-color: #f2f2f2">
								  <?php if($round >0){ 
									  for($i=1; $i<=$round; $i++){	?>									
									<th style="text-align: center"><?php echo $i?></th>
								<?php } } ?>
								</tr>
							</thead>
							<tbody>
							<?php $n=1; $x=''; $result_status =''; $result_status2 =''; $date1 =''; $date3 =''; $paper_no =''; $a = '0';
								  $reviewerName = $this->journal_model->get_reviewerList($paperID); foreach($reviewerName->result() as $reviewerName2){ 
								
								  $name = $this->journal_model->get_nameEditor($reviewerName2->reviewer_id);
								  foreach($name->result() as $name2){ }	
									  
								  $commentS = $this->journal_model->get_comment($x, $reviewerName2->reviewer_id, $paperID, $a);			  
								  $commentNum3 = $commentS->num_rows();		  		  	  
								  foreach($commentS->result() as $commentS2){ 
									  
								  $date3 = '<br>'.$this->journal_model->GetShortEngDate2($commentS2->review_date);			  
								  $paper_no = $commentS2->paper_no; 
	
								  switch ($commentS2->result_status) {
									case "1":
										$result_status2 = "Accepted";
										break;
									case "2":
										$result_status2 = "Minor Revision";
										break;
									case "3":
										$result_status2 = "Major Revision";
										break;
									case "4":
										$result_status2 = "Rejected";
										break;
								}	}	  
							?>								
								<tr>
									<td style="text-align: center"><?php echo $n?></td>
									<td><?php echo $name2->name_sname?></td>
									<td style="text-align: center"><?php echo $result_status2?><?php echo $date3;?></td>
								<?php if($round >0){ 
									  for($i=1; $i<=$round; $i++){ 						 
									  
								  $comment = $this->journal_model->get_comment($x, $reviewerName2->reviewer_id, $paperID, $i);			  
								  $commentNum = $comment->num_rows();			  		  	  
								  foreach($comment->result() as $comment2){ 
									  
								  $date1 = '<br>'.$this->journal_model->GetShortEngDate2($comment2->review_date);									  
								  $paper_no = $comment2->paper_no; 
	
								  switch ($comment2->result_status) {
									case "1":
										$result_status = "Accepted";
										break;
									case "2":
										$result_status = "Minor Revision";
										break;
									case "3":
										$result_status = "Major Revision";
										break;
									case "4":
										$result_status = "Rejected";
										break;
								}	}
							  ?>								
									<td style="text-align: center"><?php //echo $result_status?><?php //echo $date1;?>
									<?php 
									if(($result_status !='') && ($date1 !='')){ echo $result_status.$date1; } else { echo '<span class="badge badge-pink">Revised</span>'; }?>
									</td>
								<?php } } ?>									
									<!--<td style="text-align: center"><p>Accepted</p>
								    <p>15/10/2018</p></td>-->
									<td style="text-align: center"><button type="button" class="btn btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/comment_by_reviewers/').$paper_no.'/'.$name2->id?>';" style="color: #ffffff; background-color: #007ee5;" <?php if($commentNum3 <1){ echo 'disabled'; } ?> >Detail</button></td>
							  </tr>	
							<?php $n++;  } ?>							
						</tbody>	
						</table>
					</div>	
					</div>

                    </div> <!-- container -->

                </div> <!-- content -->

<footer class="footer text-right">
                    <!--2018 © Highdmin. - Coderthemes.com-->
                </footer>

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->         

    </body>
</html>                
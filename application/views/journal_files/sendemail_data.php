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
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
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

			<?php include('side_menu.php')?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">

                    <nav class="navbar-custom">                  

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Audit Trail</h4>
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

					<div class="row">

                            <!-- Right Sidebar -->
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <!-- Left sidebar -->
                                   
                                    <!-- End Left sidebar -->
									
									<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/sendemail')?>';"><i class="icon-action-undo"></i> Back</button></div><br><br>
        
                                    <div class="">
                                                <div class="">
                                                    <ul class="message-list">
                                                        <li class="" style="font-weight: 600;background-color: #f2f2f2;">
                                                            <div class="col-mail col-mail-1">&nbsp;&nbsp;&nbsp;Recipient
                                                            </div>
                                                            <div class="col-mail col-mail-2">Title
                                                                 <div class="date" style="padding-left: 0px;"> Date </div>
                                                            </div>
                                                           
                                                        </li><!--onClick="window.location.href = '<?php //echo base_url('CMS_Journal/emailDetail/').$emailpaper2->id.'/'.$emailpaper2->paper_no?>','_blank';"-->
                                                         <?php foreach ($emailpaper->result() as $emailpaper2){	 ?>
                                                        <li class="unread" style="cursor: pointer;" onClick="window.open('<?php echo base_url('CMS_Journal/emailDetail/').$emailpaper2->id.'/'.$emailpaper2->paper_no?>','_blank');" >
                                                            <div class="col-mail col-mail-1">
                                                                <a class="subject" style="font-weight: unset;">&nbsp;&nbsp;&nbsp;<?php if($emailpaper2->name !=''){echo $emailpaper2->name;}?></a>
                                                            </div>
                                                            <div class="col-mail col-mail-2">
                                                                <a class="subject" style="font-weight: unset;"><?php echo $emailpaper2->subject?>
                                                                </a>
                                                                 <div class="date" style="padding-left: 0px;"><?php echo $this->journal_model->GetEngDateTime2($emailpaper2->date_sent)?></div>
                                                            </div>
                                                           
                                                        </li>
                                                         <?php } ?>
                                                    </ul>
                                                </div>
        
                                            </div> <!-- card body -->

        
                                    <div class="clearfix"></div>
                                </div>
        
                            </div> <!-- end Col -->
        
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
		<!-- jQuery  -->
        <script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/popper.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/metisMenu.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/waves.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js')?>"></script>		

        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>

    </body>
</html>                
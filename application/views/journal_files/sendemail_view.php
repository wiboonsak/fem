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
                                    <h4 class="page-title">Manuscripts by Decision Status</h4>
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

					<div class="card-box table-responsive">	
						<table class="table table-bordered table-hover" id="table2">
							 <thead>	
                             <tr style="background-color: #f2f2f2"> 
                                 <th width="10">#</th>
                                 <th>No</th>
                                 <th>Title</th>
                                 <th style="text-align: center">Detail</th>                                 
                             </tr>
                             </thead>
                             <tbody>	
                             <?php $n = 1; $x =''; $title ='';
                                   $emailnum = $email->num_rows();
                                   if($emailnum >0){
                                      foreach($email->result() as $email2){ 
										$paper_no = $email2->paper_no;
										if(strpos($paper_no, '.R') !== FALSE){
										    $roundArray = explode(".", $paper_no);
											$round = substr($roundArray[1], 1);
											$paper_no = $roundArray[0];
										}								 		
										$paper= $this->journal_model->listPaper($x,$paper_no);
                                       	foreach($paper->result() as $paper2){}
								 		$title = $paper2->title;
								 ?>
                             <tr>
                                <td style="text-align: center"><?php echo $n; ?></td>
                                <td><?php if($emailnum >0){  echo $email2->paper_no; }?></td>                   <?php /* $x ='';
                                       $paper= $this->journal_model->listPaper($x,$email2->paper_no);
                                       foreach ($paper->result() as $paper2){} */?>
                                <td><?php echo $title;?></td>
                                <td style="text-align: center"><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/emaildata/'.$email2->paper_no)?>';" >Detail</button></td>
                              </tr>
    						  <?php $n++;  }  } ?>						
							  </tbody>	
						</table>										
						
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
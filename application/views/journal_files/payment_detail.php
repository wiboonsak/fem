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

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Payment Note</h4>
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
						<?php if(($this->session->userdata('juserLv') =='1') || ($this->session->userdata('juserLv') =='2')){ ?>
						<table class="table table-bordered table-hover" id="table2">
							<thead>	
								<tr style="background-color: #f2f2f2">
									<th width="5" rowspan="2" style="text-align: center">No.</th>
									<th rowspan="2" style="text-align: center">Title</th>
									<th colspan="2" style="text-align: center">Author Name</th>
									<th rowspan="2" style="text-align: center">Status</th>
									<th rowspan="2" style="text-align: center">Date Time</th>				
                                    <th rowspan="2" style="text-align: center">Confirm</th>					
									<th width="5" rowspan="2" style="text-align: center">Action</th>
								</tr>
								<tr style="background-color: #f2f2f2"> 
									<th style="text-align: center">Author</th>								<th style="text-align: center">Submitted Date</th>
								</tr>
							</thead>
							<tbody>							
							<?php $n=1; $x ='';$txtdate ='';$txttime ='';	$status2 =''; $latest ='';	
								  
								  $paperData2 = $this->journal_model->list_paperPaid();
								  foreach($paperData2->result() as $paperData){ 						
								  $author = $this->journal_model->get_author($paperData->author_id);
	
								  $editor = $this->journal_model->get_nameEditor($paperData->editor_id);
								  $count = $editor->num_rows();					
								  $paymentData = $this->journal_model_2->list_paymentData($paperData->paper_no); 
                                  $paperNum = $paymentData->num_rows();
                                  if($paperNum >0){
                                      foreach($paymentData->result() as $paymentData2){}
                                      $txtdate = $this->journal_model->GetShortEngDate($paymentData2->Date);
                                      $txttime = $paymentData2->Time;
                                  }
								  if($count >0){
									  foreach($editor->result() as $editor2){}  
								  }	
								  $round = $this->journal_model->get_roundNumber($paperData->id);	
								  $comment = $this->journal_model->get_comment($paperData->paper_no, $paperData->editor_id, $paperData->id, $round);
								  $commentNum = $comment->num_rows();  
								  if($commentNum >0){
									foreach($comment->result() as $comment2){}		  
									$status2 = $comment2 ->result_status;
									  
								  } else {
									//$latest = ' <span class="badge badge-pink">Revised</span>';  
									$c = 'y';  
									$round = $this->journal_model->get_roundNumber($paperData->id,$c);	
								  	$comment = $this->journal_model->get_comment($paperData->paper_no, $paperData->editor_id, $paperData->id, $round);
								  	$commentNum = $comment->num_rows();
									  
									if($commentNum >0){
										foreach($comment->result() as $comment2){}		  
										$status2 = $comment2 ->result_status;
										$latest = ' <span class="badge badge-pink">Revised</span>';  
									}  
								  }									 
							?>	
								<tr>
									<td style="text-align: center"><?php echo $n?></td>
									<td><?php echo $paperData->title.$latest?><hr style="width: 345px; margin-bottom: -9px; border-color: #c34545; margin-top: 0px; border-width: 0px;"></td>
									<td><?php echo $author?></td>
									<td style="text-align: center"><?php echo $this->journal_model->GetEngDate($paperData->date_add);?></td>
									<td style="text-align: center">
									<?php if($paperNum ==0){ ?>Waiting<?php } else { ?>Paid<?php } ?>	
								  	<td style="text-align: center"><?php if($paperNum >0){echo $txtdate.'<br>'.$txttime;}?></td>
									<td style="text-align: center">
									<?php if($paymentData2->Comfirmed == '0'){ echo 'In Process'; }else{ echo 'Confirmed'; } ?>
									</td>									
									<td><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/payment_action/').$paperData->paper_no?>';" >Detail</button></td>				   
							</tr>	
						<?php $n++; $latest =''; $status2 =''; } ?>		
								
						</tbody>	
						</table>
						<?php } ?>						
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
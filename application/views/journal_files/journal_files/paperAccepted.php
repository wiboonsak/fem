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
                                    <h4 class="page-title"><?php echo $page_title?></h4>
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
									<th colspan="2" style="text-align: center">Editor in Chief</th>
									<th rowspan="2" style="text-align: center">Reviewers</th>				<th rowspan="2" style="text-align: center">Status</th>
									<th rowspan="2" style="text-align: center">Payment</th>
									<th width="5" rowspan="2" style="text-align: center">Detail</th>
								</tr>
								<tr style="background-color: #f2f2f2"> 
									<th style="text-align: center">Author</th>								<th style="text-align: center">Submitted Date</th>
									<th style="text-align: center">Editor in Chief</th>
									<th style="text-align: center">Status</th>							
								</tr>
							</thead>
							<tbody>							
							<?php $n=1; $x ='';	$status2 =''; $latest =''; $txtpayment ='';					
								  if($check == 'yes'){
									  $paperData2 = $this->journal_model->list_paperArchived();
								  
								  } else {
									  $paperData2 = $this->journal_model->list_paperAccepted($x, $statusF);
								  }																		 
								  foreach($paperData2->result() as $paperData){ 						
								  $author = $this->journal_model->get_author($paperData->author_id);
	
								  $editor = $this->journal_model->get_nameEditor($paperData->editor_id);
								  $count = $editor->num_rows();					
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
								  $paymentData = $this->journal_model_2->list_paymentData($paperData->paper_no); 
                                  $paperNum = $paymentData->num_rows();
                                  if($paperNum >0){	
									  foreach($paymentData->result() as $paymentData2){}     
                                      $txtpayment = $paymentData2->Comfirmed;
								  }	  
								 
							?>	
								<tr>
									<td style="text-align: center"><?php echo $n?></td>
									<td><?php echo $paperData->title.$latest?></td>
									<td><?php echo $author?></td>
									<td><?php echo $this->journal_model->GetEngDate($paperData->date_add);?></td>
									<td><?php if($count >0){ echo $editor2->name_sname; }?></td>		
									<td style="text-align: center">
										<?php  switch($status2) {
													case "1":
														echo "Accepted";
														break;
													case "2":
														echo "Minor Revision";
														break;
													case "3":
														echo "Major Revision";
														break;
													case "4":
														echo "Rejected";
														break;
													case "0":
														echo "";
														break;
													case "":
														echo "";
														break;
											}  ?>
									</td>									
								  	<td style="text-align: center"><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/reviewers/').$paperData->id?>';" >Reviewer Data</button></td>
									<td style="text-align: center">
										<?php if($paperData->archive == '1'){  
												$paperData->status_process = '5';  } ?>		
										
										<?php switch($paperData->status_process){
												case "1":
													echo "in process";
													break;												
												case "3":
													echo "Rejected";
													break;
												case "4":
													echo "Accepted";
													break;
												case "5":
													echo "Archived";
													break;
												case "0":
													echo "";
													break;
												case "":
													echo "";
													break;
										}  ?>    
									</td>	
									<td style="text-align: center">
										<?php if(($paperNum >0) && ($txtpayment == '0')){  echo 'รอยืนยัน'; } else if(($paperNum >0) && ($txtpayment == '1')){  echo 'ยืนยัน'; } else {  echo 'รอชำระเงิน'; } ?>
									</td>
									<td><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/Detail/').$paperData->paper_no?>';" >Detail</button></td>   							   
							</tr>	
						<?php $n++; $latest =''; $status2 =''; } ?>		
								
						</tbody>	
						</table>
						<?php } ?>						
						
						<?php if($this->session->userdata('juserLv') =='3'){ ?>
						<table class="table table-bordered table-hover" id="table2">
							<thead>	
								<tr style="background-color: #f2f2f2">
									<th width="5" rowspan="2" style="text-align: center">No.</th>
									<th rowspan="2" style="text-align: center">Title</th>
									<th colspan="2" style="text-align: center">Author</th>
									<th rowspan="2" style="text-align: center">Status</th>
									<th rowspan="2" style="text-align: center">Detail</th>
									<th rowspan="2" style="text-align: center">Reviewers</th>
									<th rowspan="2" style="text-align: center">Comment</th>
								</tr>
								<tr style="background-color: #f2f2f2"> 
									<th style="text-align: center">Author Name</th>			
									<th style="text-align: center">Submitted Date</th>
								</tr>
							</thead>
							<tbody>	
							<?php $n=1; $status2 =''; $latest ='';
								  $userID = $this->session->userdata('juser_id');							
								  $paperData2 = $this->journal_model->list_paperAccepted($userID,$statusF);
								  //$paperData2 = $this->journal_model->list_paperData($userID, $status1);
								  foreach($paperData2->result() as $paperData){  						
								  $author = $this->journal_model->get_author($paperData->author_id);
								  $round = $this->journal_model->get_roundNumber($paperData->id);	
								  $comment = $this->journal_model->get_comment($paperData->paper_no, $userID, $paperData->id, $round);
								  $commentNum = $comment->num_rows();  
								  if($commentNum >0){
									foreach($comment->result() as $comment2){}		  
									$status2 = $comment2 ->result_status; 
									
								  } else {
									//$latest = ' <span class="badge badge-pink">Revised</span>';  
									$c = 'y';  
									$round2 = $this->journal_model->get_roundNumber($paperData->id,$c);	
								  	$comment = $this->journal_model->get_comment($paperData->paper_no, $userID, $paperData->id, $round2);
								  	$commentNum = $comment->num_rows();
									  
									if($commentNum >0){
										foreach($comment->result() as $comment2){}		  
										$status2 = $comment2 ->result_status; 
										//$latest = ' <span class="badge badge-pink">Revised</span>'; 
									
									} else if($paperData->editor_id == $this->session->userdata('juser_id')){ 
										$firstStatus = $this->journal_model->get_paperFile($paperData->id, $round);	
										foreach($firstStatus->result() as $firstStatus2){}
										$status2 = $firstStatus2 ->editor_result;
										
									} else {
										$reviewer = $this->journal_model->get_reviewerList($paperData->id, $round, $userID);
										$commentNum3 = $reviewer->num_rows();
										if($commentNum3 >0){
											foreach($reviewer->result() as $reviewer2){}
											$status2 = $reviewer2 ->edit_result;
										}
									}  
								  }								  
							?>	
								<tr>
									<td style="text-align: center"><?php echo $n?></td>
									<td><?php echo $paperData->title?></td>
									<td><?php echo $author?></td>
									<td><?php echo $this->journal_model->GetEngDate($paperData->date_add);?></td>
									<td style="text-align: center">
										<?php switch($status2) {
												case "1":
													echo "Accepted";
													break;
												case "2":
													echo "Minor Revision";
													break;
												case "3":
													echo "Major Revision";
													break;
												case "4":
													echo "Rejected";
													break;
												case "0":
													echo "";
													break;
												case "":
													echo "";
													break;
										}  ?>										
									  <!--<a href="#" class="CHstatus2" id="r<?php //echo $paperData->id?>" data-type="select" data-pk="1" data-value="<?php //echo $status2;?>" data-title="" ></a>-->										
									</td>
									<td style="text-align: center"><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/Detail/').$paperData->paper_no?>';" >Detail</button></td>
									<td style="text-align: center">
									<?php if($paperData->editor_id == $this->session->userdata('juser_id')){ ?>											
										<button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/reviewers/').$paperData->id?>';" >Reviewers Data</button>
									<?php } else { echo "-";  }?>
									</td>
								  <td style="text-align: center"><button type="button" class="btn btn-primary waves-effect waves-light btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/review/').$paperData->paper_no?>';" >Comment</button></td>
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
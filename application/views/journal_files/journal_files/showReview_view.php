<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico')?>">
		<link href="<?php echo base_url('assets_journal//plugins/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />		
		<link href="<?php echo base_url('assets_journal/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')?>" rel="stylesheet">
        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css" rel="stylesheet')?>" type="text/css" />		
        <link href="<?php echo base_url('assets_journal/css/icons.css" rel="stylesheet')?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets_journal/js/modernizr.min.js')?>"></script>
		
		
		<style>
			.file_btn {
				border-color: #666666;
    			background-color: #666666;
    			color: #ffffff;
			}
			/*.accordion-blocks .card {
			  margin-bottom: 1.2rem;
			  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
			}

			.accordion-blocks .card .card-body {
			  border-top: 1px solid #eee;
			}*/
			
		</style>

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
                                    <h4 class="page-title">Comment by reviewer</h4>
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

				<?php foreach($paperDetail->result() as $paperDetail2){} 
			  		  	
			  		  $round = $this->journal_model->get_roundNumber($paperDetail2->id); 
			  		  //$round2 = $this->journal_model->get_roundNumber($paperDetail2->id);			  
			  		  //$userID = $this->session->userdata('juser_id');
			  		  $userID = $this->uri->segment(4);
			  		  $x =''; $result_status =''; $a = '0'; $commentNum31 =0;			  		  
				?> 	
               
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

							<div class="card-box">
							<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onclick="window.history.back();"><i class="icon-action-undo"></i> Back</button></div>	
							<!--onclick="window.location.href='<?php// echo base_url('CMS_Journal/reviewers/').$paperDetail2->id?>'"-->	
							<ul class="nav nav-tabs">
							   <li class="nav-item"><a href="#tabS" data-toggle="tab" aria-expanded="<?php if($round ==0){ echo 'true';} else { echo 'false'; } ?>" class="nav-link <?php if($round == 0){ echo 'active';}?>"><i class="mdi mdi-comment-text-outline"></i> Submission</a></li>
							   	
							<?php for($i=1; $i<=$round; $i++){	?>	
                               <li class="nav-item"><a href="#tab<?php echo $i?>" data-toggle="tab" aria-expanded="<?php if($i == $round){ echo 'true';} else { echo 'false'; } ?>" class="nav-link <?php if($i == $round){ echo 'active';}?>"><i class="mdi mdi-comment-text-outline"></i> Round <?php echo $i?></a></li>
								 <!--<a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">-->
                            <?php } ?>            
                            </ul>	
								
							<div class="tab-content">
                            <?php $commentS = $this->journal_model->get_comment($paperDetail2->paper_no, $userID, $paperDetail2->id, $a);	
								  $commentNum3 = $commentS->num_rows();  
								  if($commentNum3 >0){
									foreach($commentS->result() as $commentS2){}  
									$commentFile1 = $this->journal_model->get_commentFile($commentS2->reID);
									$commentNum31 = $commentFile1->num_rows(); 
								  } 
                        ?>    
                              
                              <div class="tab-pane <?php if($round == 0){ echo 'show active';} ?>" id="tabS<?php //echo $i?>">
								   
								   	<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
										<div class="col-md-9 col-sm-12">
										<?php if($commentNum3 >0){
												switch ($commentS2->result_status){
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
										}  } ?>                                      
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="comment2">Comment Details </label>
										<div class="col-md-9 col-sm-12"><?php if($commentNum31 >0){ echo $commentS2->comment; } ?>
										</div>
									</div>								

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
										<div class="col-md-9 col-sm-12">
											<?php if($commentNum31 >0){
													foreach($commentFile1->result() as $commentFile10){		  		
											?>										
											<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentFile10->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $commentFile10->file_name?></a> <!--<i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php //echo $commentF2->id?>' , '<?php //echo $commentF2->file_name?>')"></i>--></label><br>

											<?php  } } ?>

										</div>
									</div>                                           
                               </div>	
                              
                               <!--<div class="tab-pane" id="home">-->  
							<?php for($i=1; $i<=$round; $i++){	
								
									 $comment = $this->journal_model->get_comment($paperDetail2->paper_no, $userID, $paperDetail2->id, $i);	
									 $commentNum = $comment->num_rows();  
									  if($commentNum >0){
										  foreach($comment->result() as $comment2){}  
										  $commentFile = $this->journal_model->get_commentFile($comment2->reID);
										  $commentNum2 = $commentFile->num_rows(); 
									  }	
							?> 
                               <div class="tab-pane <?php if($i == $round){ echo 'show active';} ?>" id="tab<?php echo $i?>">
								   
								   	<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
										<div class="col-md-9 col-sm-12">
										<?php if($commentNum >0){
											    switch ($comment2->result_status) {
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
										}	}  ?>                                      
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="comment2">Comment Details </label>
										<div class="col-md-9 col-sm-12">
											<!--<textarea id="comment2" name="comment2" class="ex">--><?php if($commentNum >0){ echo $comment2->comment; } ?><!--</textarea>-->
										</div>
									</div>								

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
										<div class="col-md-9 col-sm-12">
										<?php if($commentNum >0){
											 if($commentNum2 >0){
													foreach($commentFile->result() as $commentF2){		  		
											?>										
											<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentF2->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $commentF2->file_name?></a> <!--<i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php //echo $commentF2->id?>' , '<?php //echo $commentF2->file_name?>')"></i>--></label><br>

											<?php  } }  } ?>

										</div>
									</div>
                                           
                               </div>	
							   <?php } ?>	
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

        <!-- jQuery  -->
        <script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/popper.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/metisMenu.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/waves.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js')?>"></script>
		
		<!-- plugin js -->
        <script src="<?php echo base_url('assets_journal/plugins/moment/moment.js')?>"></script>       
        <script src="<?php echo base_url('assets_journal/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>	
	
		<script src="<?php echo base_url('assets_journal/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets_journal/plugins/magnific-popup/js/jquery.magnific-popup.min.js')?>"></script> 

        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>
		<script src="<?php echo base_url('assets_journal/plugins/tinymce/tinymce.min.js')?>"></script>

    </body>
</html>                
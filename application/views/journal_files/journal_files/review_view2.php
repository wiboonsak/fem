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
                                    <h4 class="page-title">Comment </h4>
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

				<?php /*foreach($paperDetail->result() as $paperDetail2){} 
			  		  $userID = $this->session->userdata('juser_id');
			  		  $round = $this->journal_model->get_roundNumber($paperDetail2->id);
			  		  $x =''; $commentNum2 =0;			  
			  		  $comment = $this->journal_model->get_comment($paperDetail2->paper_no, $userID, $paperDetail2->id, $round);			  
					  $commentNum = $comment->num_rows();  
			  		  if($commentNum >0){
						  foreach($comment->result() as $comment2){}  
						  $commentFile = $this->journal_model->get_commentFile($comment2->reID);
						  $commentNum2 = $commentFile->num_rows(); 
					  }	*/
			  
			//  *****************************************************
				  
				  	  foreach($paperDetail->result() as $paperDetail2){} 
			  		  	
			  		  $round = $this->journal_model->get_roundNumber($paperDetail2->id); 
			  		  //$round2 = $this->journal_model->get_roundNumber($paperDetail2->id);			  
			  		  $userID = $this->session->userdata('juser_id');
			  		  //$userID = $this->uri->segment(4);
			  		  $x =''; $result_status =''; $a = '0'; 
			  
				?> 	
               
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
							<div class="card-box">
							<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onclick="window.history.back();"><i class="icon-action-undo"></i> Back</button></div>
								
							<ul class="nav nav-tabs">
							   <li class="nav-item"><a href="#tabS" data-toggle="tab" aria-expanded="<?php if($round ==0){ echo 'true';} else { echo 'false'; } ?>" class="nav-link <?php if($round == 0){ echo 'active';}?>"><i class="mdi mdi-comment-text-outline"></i> Submission</a></li>
							   	
							<?php for($i=1; $i<=$round; $i++){	?>	
                               <li class="nav-item"><a href="#tab<?php echo $i?>" data-toggle="tab" aria-expanded="<?php if($i == $round){ echo 'true';} else { echo 'false'; } ?>" class="nav-link <?php if($i == $round){ echo 'active';}?>"><i class="mdi mdi-comment-text-outline"></i> Round <?php echo $i?></a></li>
								 <!--<a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">-->
                            <?php } ?>            
                            </ul>	
								
							<div class="tab-content">
                            <?php if($paperDetail2->editor_id == $userID){ $sendMail ='0'; } 								
								  $reviewerName = $this->journal_model->get_reviewerList($paperDetail2->id,$a,$userID); 
								  $chReviewer = $reviewerName->num_rows();
								
								  if($chReviewer >0){ $sendMail ='0'; }					 
									 
								$commentS = $this->journal_model->get_comment($paperDetail2->paper_no, $userID, $paperDetail2->id, $a);	
								  $commentNum3 = $commentS->num_rows(); 
								  //$sendMail ='1';  //$sendMail ='0';	
								  if($commentNum3 >0){
									foreach($commentS->result() as $commentS2){}
									$sendMail = $commentS2->send_mail;  
									$commentFile1 = $this->journal_model->get_commentFile($commentS2->reID);
									$commentNum31 = $commentFile1->num_rows(); 
								  } 
                        	?>     
                              
                              <div class="tab-pane <?php if($round == 0){ echo 'show active';} ?>" id="tabS<?php //echo $i?>">
								   
								   <?php /* ?>	<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
										<div class="col-md-9 col-sm-12">
											<?php switch ($commentS2->result_status) {
													case "1":
														echo "Accepted";
														break;
													case "2":
														echo "Minor";
														break;
													case "3":
														echo "Major";
														break;
													case "4":
														echo "Rejected";
														break;
											}  ?>                                      
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="comment2">Comment Details </label>
										<div class="col-md-9 col-sm-12">
											<!--<textarea id="comment2" name="comment2" class="ex">--><?php if($commentNum31 >0){ echo $commentS2->comment; } ?><!--</textarea>-->
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
									</div><?php */ ?>
								  
								  
								  <form id="frm<?php echo $a?>" role="form" method="post" action="" enctype="multipart/form-data">	
									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="result_status<?php echo $a?>">Status </label>
										<div class="col-md-9 col-sm-12">
											<select class="form-control" id="result_status<?php echo $a?>" name="result_status" <?php if($sendMail =='1'){ echo "disabled"; }?> >
											   <option value="">-- Select --</option>
											   <option value="1" <?php if(($commentNum3 >0) && ($commentS2->result_status == '1')){ echo "selected";  } ?>>Accepted</option>
											   <option value="2" <?php if(($commentNum3 >0) && ($commentS2->result_status == '2')){ echo "selected";  } ?>>Minor Revision</option>
											   <option value="3" <?php if(($commentNum3 >0) && ($commentS2->result_status == '3')){ echo "selected";  } ?>>Major Revision</option>
											   <option value="4" <?php if(($commentNum3 >0) && ($commentS2->result_status == '4')){ echo "selected";  } ?>>Rejected</option>
										   </select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="comment2<?php echo $a?>">Comment Details </label>
										<div class="col-md-9 col-sm-12">
											<textarea id="comment2<?php echo $a?>" name="comment2" class="ex"><?php if($commentNum3 >0){ echo $commentS2->comment; } ?></textarea>
										</div>
									</div>

									<?php if($sendMail =='0'){ ?>
									  <div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="file_upload">Upload File </label>
										<div class="col-md-9 col-sm-12">
											<input type="file" class="filestyle" data-btnClass="file_btn" multiple id="file_upload<?php echo $a?>" name="file_upload[]">
										</div>
									</div>
									<?php } ?>  

									<?php if($commentNum3 >0){ ?>
									<?php if($commentNum31 >0){ ?>  
									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
										<div class="col-md-9 col-sm-12">
											<?php foreach($commentFile1->result() as $commentFile10){ ?>

											<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentFile10->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $commentFile10->file_name?></a> <!--<i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php //echo $commentF2->id?>' , '<?php //echo $commentF2->file_name?>')"></i>--></label><br>
											<?php } ?>
										</div>
									</div>
									<?php } } ?>  

								<?php if($sendMail =='0'){ ?>  
									<input type="hidden" name="comment" id="comment<?php echo $a?>">
									<input type="hidden" name="commentID" id="commentID<?php echo $a?>" value="<?php if($commentNum3 >0){ echo $commentS2->reID; }?>" >
									<input type="hidden" name="paper_no" id="paper_no" value="<?php echo $paperDetail2->paper_no?>" >
									<input type="hidden" name="paper_id" id="paper_id" value="<?php echo $paperDetail2->id?>" >
									<input type="hidden" name="send_mail" id="send_mail<?php echo $a?>" value="<?php if($commentNum3 >0){ echo $commentS2->send_mail; }?>" >  
									<input type="hidden" name="userType" id="userType" value="<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ echo "1"; } else { echo "2"; } ?>" >
									<br><br>
									<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ $v = "1"; } else { $v = "2"; } ?>
									<div style="text-align: center;">
										<button type="button" class="btn btn-primary waves-light waves-effect" onClick="comment_paper('<?php echo $a?>')" >Save</button>&nbsp;&nbsp;&nbsp;
										<button type="button" class="btn btn-success waves-light waves-effect" onClick="sendMail_comment('<?php echo $v?>','<?php echo $a?>')" >Send Mail</button>    
									</div>	
								<?php } ?>  
								</form>                                          
                               </div>	
                              
                               <!--<div class="tab-pane" id="home">-->                     
								<?php for($i=1; $i<=$round; $i++){	
						
									  if($paperDetail2->editor_id == $userID){ $sendMail ='0'; } 								
								      $reviewerName = $this->journal_model->get_reviewerList($paperDetail2->id,$i,$userID); 
								      $chReviewer = $reviewerName->num_rows();
								
								      if($chReviewer >0){ $sendMail ='0'; }
								
									 $comment = $this->journal_model->get_comment($paperDetail2->paper_no, $userID, $paperDetail2->id, $i);	
									 $commentNum = $comment->num_rows();  
									 //$sendMail ='1'; //$sendMail ='0';		
									  if($commentNum >0){
										  foreach($comment->result() as $comment2){} 
										  $sendMail = $comment2->send_mail;
										  $commentFile = $this->journal_model->get_commentFile($comment2->reID);
										  $commentNum2 = $commentFile->num_rows(); 
									  }	
								?> 
                               <div class="tab-pane <?php if($i == $round){ echo 'show active';} ?>" id="tab<?php echo $i?>">
								   
								  <?php /* ?> 	<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
										<div class="col-md-9 col-sm-12">
										<?php if($commentNum >0){
											    switch ($comment2->result_status) {
													case "1":
														echo "Accepted";
														break;
													case "2":
														echo "Minor";
														break;
													case "3":
														echo "Major";
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
									</div><?php */ ?>
								   
								   
								   <form id="frm<?php echo $i?>" role="form" method="post" action="" enctype="multipart/form-data">	
									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
										<div class="col-md-9 col-sm-12">
											<select class="form-control" id="result_status<?php echo $i?>" name="result_status" <?php if($sendMail =='1'){ echo "disabled"; }?> >
											   <option value="">-- Select --</option>
											   <option value="1" <?php if(($commentNum >0) && ($comment2->result_status == '1')){ echo "selected";  } ?>>Accepted</option>
											   <option value="2" <?php if(($commentNum >0) && ($comment2->result_status == '2')){ echo "selected";  } ?>>Minor Revision</option>
											   <option value="3" <?php if(($commentNum >0) && ($comment2->result_status == '3')){ echo "selected";  } ?>>Major Revision</option>
											   <option value="4" <?php if(($commentNum >0) && ($comment2->result_status == '4')){ echo "selected";  } ?>>Rejected</option>
										   </select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="comment2<?php echo $i?>">Comment Details </label>
										<div class="col-md-9 col-sm-12">
											<textarea id="comment2<?php echo $i?>" name="comment2" class="ex"><?php if($commentNum >0){ echo $comment2->comment; } ?></textarea>
										</div>
									</div>

									<?php if($sendMail =='0'){ ?>
									  <div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" for="file_upload">Upload File </label>
										<div class="col-md-9 col-sm-12">
											<input type="file" class="filestyle" data-btnClass="file_btn" multiple id="file_upload<?php echo $i?>" name="file_upload[]">
										</div>
									</div>
									<?php } ?>  

									<?php if($commentNum >0){ ?>
									<div class="form-group row">
										<label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
										<div class="col-md-9 col-sm-12">
											<?php if($commentNum >0){
											 		if($commentNum2 >0){
													foreach($commentFile->result() as $commentF2){	  		
											?>

											<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentF2->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $commentF2->file_name?></a> <!--<i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php //echo $commentF2->id?>' , '<?php //echo $commentF2->file_name?>')"></i>--></label><br>

											<?php  } } } ?>

										</div>
									</div>
									<?php } ?>   

								<?php if($sendMail =='0'){ ?>  
									<input type="hidden" name="comment" id="comment<?php echo $i?>">
									<input type="hidden" name="commentID" id="commentID<?php echo $i?>" value="<?php if($commentNum >0){ echo $comment2->reID; }?>" >
									<input type="hidden" name="paper_no" id="paper_no" value="<?php echo $paperDetail2->paper_no?>" >
									<input type="hidden" name="paper_id" id="paper_id" value="<?php echo $paperDetail2->id?>" >
									<input type="hidden" name="send_mail" id="send_mail<?php echo $i?>" value="<?php if($commentNum >0){ echo $comment2->send_mail; }?>" >
									<input type="hidden" name="userType" id="userType" value="<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ echo "1"; } else { echo "2"; } ?>" >
									<br><br>
									<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ $v = "1"; } else { $v = "2"; } ?>
									<div style="text-align: center;">
										<button type="button" class="btn btn-primary waves-light waves-effect" onClick="comment_paper('<?php echo $i?>')" >Save</button>&nbsp;&nbsp;&nbsp;
										<button type="button" class="btn btn-success waves-light waves-effect" onClick="sendMail_comment('<?php echo $v?>','<?php echo $i?>')" >Send Mail</button>    
									</div>	
								<?php } ?>  
								</form> 
								   
								   
								   
								   
                                           
                               </div>	
							   <?php } ?>	
                           </div>	
		<?php /* ?>	************************************************************************	
								
							<form id="frm1" role="form" method="post" action="" enctype="multipart/form-data">	
								<div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
                                    <div class="col-md-9 col-sm-12">
                                        <select class="form-control" id="result_status" name="result_status">
                                           <option value="">-- Select --</option>
										   <option value="1" <?php if(($commentNum >0) && ($comment2->result_status == '1')){ echo "selected";  } ?>>Accepted</option>
                                           <option value="2" <?php if(($commentNum >0) && ($comment2->result_status == '2')){ echo "selected";  } ?>>Minor</option>
                                           <option value="3" <?php if(($commentNum >0) && ($comment2->result_status == '3')){ echo "selected";  } ?>>Major</option>
                                           <option value="4" <?php if(($commentNum >0) && ($comment2->result_status == '4')){ echo "selected";  } ?>>Rejected</option>
                                       </select>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label" for="comment2">Comment Details </label>
                                    <div class="col-md-9 col-sm-12">
                                        <textarea id="comment2" name="comment2" class="ex"><?php if($commentNum >0){ echo $comment2->comment; } ?></textarea>
                                    </div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label" for="file_upload">Upload File </label>
									<div class="col-md-9 col-sm-12">
                                    	<input type="file" class="filestyle" data-btnClass="file_btn" multiple id="file_upload" name="file_upload[]">
                                	</div>
                                </div>
								
								<div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
                                    <div class="col-md-9 col-sm-12">
										<?php if($commentNum2 >0){
						  						foreach($commentFile->result() as $commentF2){		  		
										?>
										
										<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentF2->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $commentF2->file_name?></a> <!--<i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php //echo $commentF2->id?>' , '<?php //echo $commentF2->file_name?>')"></i>--></label><br>
										   
										<?php  } } ?>
                                        
                                    </div>
                                </div>
								
								<input type="hidden" name="comment" id="comment">
								<input type="hidden" name="commentID" id="commentID" value="<?php if($commentNum >0){ echo $comment2->reID; }?>" >
								<input type="hidden" name="paper_no" id="paper_no" value="<?php echo $paperDetail2->paper_no?>" >
								<input type="hidden" name="paper_id" id="paper_id" value="<?php echo $paperDetail2->id?>" >
								<input type="hidden" name="userType" id="userType" value="<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ echo "1"; } else { echo "2"; } ?>" >
								<br><br>
								<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ $v = "1"; } else { $v = "2"; } ?>
                                <div style="text-align: center;">
									<button type="button" class="btn btn-primary waves-light waves-effect" onClick="comment_paper()" >Save</button>&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-success waves-light waves-effect" onClick="sendMail_comment('<?php echo $v?>')" >Send Mail</button>    
								</div>	
							</form><?php */ ?>
								
                            </div>

                    </div> <!-- container -->

                </div> <!-- content -->			
			
			
			<?php $today = date("d-m-Y"); ?>	
				
				

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


 <script type="text/javascript">
	 
	 $(document).ready(function(){ 
				
		tinymce.init({
		   selector: "textarea.ex",
		   theme: "modern",
		   height:300,
		   plugins: [
			 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
		   style_formats: [
			 {title: 'Bold text', inline: 'b'},
			 {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			 {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			 {title: 'Example 1', inline: 'span', classes: 'example1'},
			 {title: 'Example 2', inline: 'span', classes: 'example2'},
			 {title: 'Table styles'},
			 {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		   ]
		});
		/////////////////////////////////	

		var today3 = '<?php echo $today?>';	 

		jQuery('#datepicker1 , #datepicker2').datepicker({
			autoclose: true,
			format: "dd/mm/yyyy",
			startDate: today3,
			todayHighlight: true
		});	
		/////////////////////////////////
		 
		
		 
	})		
	/////////////////////////////////
	function comment_paper(num){
		
		var result_status = $('#result_status'+num).val();
		var dataID = $('#commentID'+num).val();
		var comment = tinyMCE.editors[$('#comment2'+num).attr('id')].getContent();
		$('#comment'+num).val(comment);
		$('#send_mail'+num).val('0');
		
		if(result_status ==''){
			
		    alert('Please select status for this paper.');
		
		} else {
			
			if(dataID ==''){
			   var ctrl_name = 'commentPaper';
			   
			} else {
			   var ctrl_name = 'update_commentPaper';		
			}
			
			var form_data = new FormData($("#frm"+num)[0]);
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('CMS_Journal/')?>'+ctrl_name,
				processData: false,
				contentType: false,
				data : form_data,					  		 
				success:function(data2){
					if(data2 >0){
					   
						swal({
							title: 'Saved Successfully.',
							//text: 'You clicked the button!',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						}).then(okay => {
						   if (okay){
							   location.reload();
						   }
						})
					}else{
						swal({
							title: "Data can't be saved. !",
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						})/*.then(okay => {
						   if (okay){
							   location.reload();
						   }
						}) */							
					}
			    }
            });	
		}		
	}
	/////////////////////////////////
	function sendMail_comment(type,num){
		
		var result_status = $('#result_status'+num).val();
		var dataID = $('#commentID'+num).val();
		var comment = tinyMCE.editors[$('#comment2'+num).attr('id')].getContent();
		$('#comment'+num).val(comment);
		$('#send_mail'+num).val('1');
		
		if(result_status ==''){
			
		    alert('Please select status for this paper.');
		
		} else {
			
			if(dataID ==''){
			   var ctrl_name = 'commentPaper';
			   
			} else {
			   var ctrl_name = 'update_commentPaper';		
			}
			if(type =='1'){
			   var ctrl_name2 = 'editor_to_author';
			   
			} else {
			   var ctrl_name2 = 'reviewer_to_editor';		
			}
			
			var form_data = new FormData($("#frm"+num)[0]);
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('CMS_Journal/')?>'+ctrl_name,
				processData: false,
				contentType: false,
				data : form_data,					  		 
				success:function(data2){ //alert('...'+data2+' :: '+ctrl_name2);
								
					if(data2 !='0'){		
						//alert('..>>>>.'+data2+' :: '+ctrl_name2);
						$.post('<?php echo base_url('Journal_Mail/')?>'+ctrl_name2 , { dataID : data2 },
						function(data){
							//alert('data>'+data);
							if(data =='1'){
								swal({
									title: 'Sent email sucessfully.',
									//text: 'You clicked the button!',
									type: 'success',
									confirmButtonClass: 'btn btn-confirm mt-2'
								}).then(okay => {
								   if (okay){
									   location.reload();
								   }
								})
							}
						})						
						
					}else{
						swal({
							title: "Data can't be saved. !",
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}).then(okay => {
						   if (okay){
							   location.reload();
						   }
						}) 							
					}
			    }
            });	
		}			
	}			
		
</script>	 

    </body>
</html>                
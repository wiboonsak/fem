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
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />		
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
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
                                    <h4 class="page-title">Paper Detail</h4>
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
			  		  $r = '0'; $txtRound ='';	
					  $filePaper = $this->journal_model->get_paperFile($paperDetail2->id,$r);	
					  foreach($filePaper->result() as $filePaper2){}   
			  		  $round = $this->journal_model->get_roundNumber($paperDetail2->id);
			  		  if($round >0){
						  $txtRound = '.R'.$round;
					  }	
				?> 	
               
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">
						<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='<?php echo base_url('CMS_Journal/statusAccepted')?>'"><i class="icon-action-undo"></i> Back</button></div>

						<ul class="nav nav-tabs">                            
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                   <i class="fa fa-file-text-o"></i> Papers Detail
                                </a>
                            </li>
							
							<?php /*if($this->session->userdata('juserLv') =='1'){ ?>							
							<li class="nav-item">
                                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="mdi mdi-account-settings-variant "></i> Editor in Chief
                                </a>
                            </li>
							<?php } ?>
							
							<?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ ?>
                            <li class="nav-item">
                                <a href="#messages" id="re" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="mdi mdi-account-settings-variant "></i> Reviewers
                                </a>
                            </li>
							<?php } */?>
							
							<?php if($round >0){ ?>
							<li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                   <i class="fi-cog mr-2"></i> Author Edit
                                </a>
                            </li>
                            <?php } ?>				
						</ul>
						
                       <div class="tab-content">
                            <div class="tab-pane show active" id="profile">
								<div class="card-box">
								<!--<div class="row">-->                                  
                                    
                                    <div class="form-group row" style="background-color: #f5f5f5;">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">No. </label>
                                        <div class="col-md-9 col-sm-12"><?php echo $paperDetail2->paper_no.$txtRound?></div>
                                    </div> 
									
									<div class="form-group row" style="background-color: #f5f5f5;">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">Title </label>
                                        <div class="col-md-9 col-sm-12"><?php echo $paperDetail2->title?></div>
                                    </div> 
                                       
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">Section </label>
                                        <div class="col-md-9 col-sm-12"><?php if($paperDetail2->section == '1'){ echo "Research Articles"; } else { echo "Academic Articles"; } ?></div>
                                    </div>
									
									<div class="form-group row" style="background-color: #f5f5f5;">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">Abstract </label>
                                        <div class="col-md-9 col-sm-12">
                                            <!--<textarea class="form-control" >--><?php echo $paperDetail2->abstract?><!--</textarea>--> 
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">Note </label>
                                        <div class="col-md-9 col-sm-12">
                                            <!--<textarea class="form-control" >--><?php echo $paperDetail2->remarks?><!--</textarea>-->
                                        </div>
                                    </div> 
                                  
                                  <!--<div class="row">--><div class="form-group row">
                                   <div class="col-lg-4 col-xl-2">
                                      <div class="file-man-box">
                                         <div class="file-img-box">
                                              <img src="<?php echo base_url('assets_journal/images/file_icons/pdf.svg')?>" alt="icon">
                                         </div>
                                         <a href="<?php echo base_url().$filePaper2->file_pdf?>" class="file-download" target="_blank"><i class="mdi mdi-download"></i> </a>
                                         <div class="file-man-title">
                                              <h5 class="mb-0 text-overflow"><?php echo $this->journal_model->name_paperFile($filePaper2->file_pdf);?></h5>
                                              <!--<p class="mb-0"><small>568.8 kb</small></p>-->
                                         </div>
                                      </div>
                                   </div>
									
								   <div class="col-lg-4 col-xl-2">
                                      <div class="file-man-box">
                                         <div class="file-img-box">
                                              <img src="<?php echo base_url('assets_journal/images/file_icons/doc.svg')?>" alt="icon">
                                         </div>
                                         <a href="<?php echo base_url().$filePaper2->file_word?>" class="file-download"><i class="mdi mdi-download"></i> </a>
                                         <div class="file-man-title">
                                              <h5 class="mb-0 text-overflow"><?php echo $this->journal_model->name_paperFile($filePaper2->file_word);?>	</h5>
                                              <!--<p class="mb-0"><small>568.8 kb</small></p>-->
                                         </div>
                                      </div>
                                   </div>									
                               </div>
							<?php   $OtherFile = $this->journal_model->get_otherFiles($filePaper2->id);	
									$n_OtherFile = $OtherFile->num_rows();  
		
									if($n_OtherFile >0){ $a = 1;   ?>									
									
							   <div class="form-group row" style="background-color: #f5f5f5;">
									<label class="col-md-3 col-sm-12 col-form-label" >Other File </label>
									<div class="col-md-9 col-sm-12">
									<?php foreach($OtherFile->result() as $OtherFile2){ ?>					
									<label class="col-form-label"><i class="mdi mdi-note-multiple"></i> <a href="<?php echo base_url().'uploadfile/'.$OtherFile2->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $OtherFile2->file_name?></a> <!--<i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php //echo $commentF2->id?>' , '<?php //echo $commentF2->file_name?>')"></i>--></label><br>
									<?php  } ?>
									</div>
							  </div>			
							  <?php } ?>		
                               </div>                                          
								
                            </div>
						   
						   <?php /*if($this->session->userdata('juserLv') =='1'){ 
						   
								$for_type = '1';
						   		$message = $this->journal_model->get_Message_inMail($for_type,$paperDetail2->id);
								$countRows = $message->num_rows();
								if($countRows >0){
									foreach($message->result() as $message2){} 
								}								
						   ?>	
                            <div class="tab-pane" id="home">
								<div class="card-box">
									
									<!--<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="message">ข้อความที่จะแสดงในอีเมล์ </label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea id="message" name="message" class="ex"><?php// if($countRows >0){ echo $message2->message; }?></textarea>
                                        </div>										
                                    </div> 
									<button type="button" class="btn btn-primary waves-light waves-effect" style="margin: auto 50%;" onClick="saveMessage_inMail('1' , '<?php //echo $paperDetail2->id?>' , '<?php //echo $paperDetail2->paper_no?>')">Save</button><br><br>--> 
									<input type="hidden" id="message_id" name="message_id" value="<?php //if($countRows >0){ echo $message2->id; }?>" >	
								<button class="btn" data-toggle="modal" data-target="#login-modal" style="background-color: #666666; border: 1px solid #666666; color: #FFFFFF;"><i class="mdi mdi-plus-circle mr-2"></i> Add Editor in Chief</button><br><br>	
								<div class="table-responsive" id="showList">  </div><br><br>
							  <input type="hidden" id="editor_id" name="editor_id" value="<?php if($paperDetail2->editor_id !=0){ echo $paperDetail2->editor_id; }?>" >		
							  <button type="button" class="btn btn-primary waves-light waves-effect" style="margin: auto 50%;" onClick="sendMail_toEditor()">Send Mail</button>	
							  								
                              </div>                                
							</div>
						   <?php } ?>
						   
						   <?php if(($this->session->userdata('juserLv') =='3') && ($paperDetail2->editor_id == $this->session->userdata('juser_id'))){ 
						   
								$for_type = '2';
						   		$message = $this->journal_model->get_Message_inMail($for_type,$paperDetail2->id);
								$countRows = $message->num_rows();
								if($countRows >0){
									foreach($message->result() as $message2){} 
								} 
						   ?>	
						    <div class="tab-pane" id="messages">
								
								<div class="card-box">
									
									<!--<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" >วันที่เริ่มต้น</label>
                                        <div class="col-md-9 col-sm-12">
                                             <div class="input-group">
                                                <input type="text" class="form-control" placeholder="<?php //if($countRows >0){ echo $this->journal_model->GetDate2($message2->date_start); } else { echo 'dd/mm/yyyy'; }?>" id="datepicker1" >
                                                <div class="input-group-append">
                                                   <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                             </div>
                                        </div>
                                   </div>
									
								   <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" >วันที่สิ้นสุด</label>
                                        <div class="col-md-9 col-sm-12">
                                             <div class="input-group">
                                                <input type="text" class="form-control" placeholder="<?php //if($countRows >0){ echo $this->journal_model->GetDate2($message2->date_end); } else { echo 'dd/mm/yyyy'; }?>" id="datepicker2" >
                                                <div class="input-group-append">
                                                   <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                             </div>
                                        </div>
                                   </div>	
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="message">ข้อความที่จะแสดงในอีเมล์ </label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea id="message" name="message" class="ex"><?php //if($countRows >0){ echo $message2->message; }?></textarea>
                                        </div>
                                    </div> 
									<button type="button" class="btn btn-primary waves-light waves-effect" style="margin: auto 50%;" onClick="saveMessage_inMail('2' , '<?php //echo $paperDetail2->id?>' , '<?php //echo $paperDetail2->paper_no?>')">Save</button><br><br>--> 
									<input type="hidden" id="message_id" name="message_id" value="<?php //if($countRows >0){ echo $message2->id; }?>" >
									
								<button class="btn" data-toggle="modal" data-target="#login-modal2" style="background-color: #666666; border: 1px solid #666666; color: #FFFFFF;"><i class="mdi mdi-plus-circle mr-2"></i> Add Reviewer</button>
								<br><br>	
								<div class="table-responsive" id="showList">   </div><br><br>
							  <button type="button" class="btn btn-primary waves-light waves-effect" style="margin: auto 50%;" onClick="sendMail_toReviewer()">Send Mail</button>		
							</div>                                          
						</div>	
					   <?php } */?>	   
						
					   <?php if($round >0){ ?>		      
						  <div class="tab-pane" id="settings">
							<div class="card-box">  
							  
							 <div id="accordion">
  <div class="card">
    
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Submission
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <?php $a = '0';
					$commentS = $this->journal_model->get_comment($paperDetail2->paper_no, $paperDetail2->editor_id, $paperDetail2->id, $a);	
					$commentNum3 = $commentS->num_rows();  
					if($commentNum3 >0){
						foreach($commentS->result() as $commentS2){}  
						$commentFile1 = $this->journal_model->get_commentFile($commentS2->reID);
						$commentNum31 = $commentFile1->num_rows(); 
					}?>
       <div class="form-group row">
			<label class="col-md-12 col-form-label" for="comment2">No. <?php echo $paperDetail2->paper_no?></label>
	   </div>
		  
	   <div class="form-group row">
			<label class="col-md-12 col-form-label" for="comment2">Comment by Editor</label>
	   </div>		          
        
        <div class="form-group row" style="background-color: #f5f5f5;">
			 <label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
			 <div class="col-md-9 col-sm-12">
			 <?php switch ($commentS2->result_status) {
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
			 }  ?>                                      
			 </div>
		</div>

		<div class="form-group row">
			 <label class="col-md-3 col-sm-12 col-form-label" for="comment2">Comment Details </label>
			 <div class="col-md-9 col-sm-12"><?php if($commentNum31 >0){ echo $commentS2->comment; } ?>
			 </div>
		</div>								

		<div class="form-group row" style="background-color: #f5f5f5;">
			 <label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
			 <div class="col-md-9 col-sm-12">
			<?php if($commentNum31 >0){
				foreach($commentFile1->result() as $commentFile10){	?>										
				  <label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentFile10->file_name?>" target="_blank" ><?php echo $commentFile10->file_name?></a></label><br>
			<?php  } } ?>
			 </div>
		</div><br><hr><br>
									
		<?php $editData = $this->journal_model->get_paperFile($paperDetail2->id,$a);
			  foreach($editData->result() as $editData2){}  ?>									
									
		<div class="form-group row">
			 <label class="col-md-12 col-form-label" for="comment2">Author - Upload File Edit</label>		
		</div>							
									
		<div class="form-group row">
             <div class="col-lg-4 col-xl-2">
                  <div class="file-man-box">
                  <div class="file-img-box">
                       <img src="<?php echo base_url('assets_journal/images/file_icons/pdf.svg')?>" alt="icon">
                  </div>
                  <a href="<?php echo base_url().$editData2->file_pdf?>" class="file-download" target="_blank"><i class="mdi mdi-download"></i> </a>
                  <div class="file-man-title">
                       <h5 class="mb-0 text-overflow"><?php echo $this->journal_model->name_paperFile($editData2->file_pdf);?></h5><!--<p class="mb-0"><small>568.8 kb</small></p>-->
                  </div>
                  </div>
             </div>
									
			 <div class="col-lg-4 col-xl-2">
                  <div class="file-man-box">
                  <div class="file-img-box">
                       <img src="<?php echo base_url('assets_journal/images/file_icons/doc.svg')?>" alt="icon">
                  </div>
                  <a href="<?php echo base_url().$editData2->file_word?>" class="file-download"><i class="mdi mdi-download"></i> </a>
                  <div class="file-man-title">
                       <h5 class="mb-0 text-overflow"><?php echo $this->journal_model->name_paperFile($editData2->file_word);?>	</h5><!--<p class="mb-0"><small>568.8 kb</small></p>-->
                  </div>
                  </div>
            </div>									
        </div>  
		  
        <div class="form-group row" style="background-color: #f5f5f5;">
             <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">Note </label>
             <div class="col-md-9 col-sm-12"><?php echo $editData2->remarks?>
             </div>
        </div> 
        
      </div>
    </div>
     
    <?php for($i=1; $i<=$round; $i++){	?> 
     
     <div class="card-header" id="heading<?php echo $i?>">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?php echo $i?>" aria-expanded="false" aria-controls="collapse<?php echo $i?>">
          Edit #<?php echo $i?>
        </button>
      </h5>
    </div>
    <div id="collapse<?php echo $i?>" class="collapse" aria-labelledby="heading<?php echo $i?>" data-parent="#accordion">
      <div class="card-body">
		  
		<div class="form-group row">
			<label class="col-md-12 col-form-label" for="comment2">No. <?php echo $paperDetail2->paper_no.'.R'.$i?></label>
	    </div>   
       
        <?php 	$commentS = $this->journal_model->get_comment($paperDetail2->paper_no, $paperDetail2->editor_id, $paperDetail2->id, $i);	
				$commentNum3 = $commentS->num_rows();  
				if($commentNum3 >0){
					foreach($commentS->result() as $commentS2){}  
					$commentFile1 = $this->journal_model->get_commentFile($commentS2->reID);
					$commentNum31 = $commentFile1->num_rows(); 
				} 
									  
				if($commentNum3 >0){  ?>		 
		
		<div class="form-group row">
			 <label class="col-md-12 col-form-label" for="comment2">Comment by Editor</label>				
		</div>	              
        
        <div class="form-group row" style="background-color: #f5f5f5;">
			 <label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status</label>
			 <div class="col-md-9 col-sm-12">
			 <?php switch ($commentS2->result_status){
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
			 }  ?>                                      
			 </div>
		</div>

		<div class="form-group row">
			 <label class="col-md-3 col-sm-12 col-form-label" for="comment2">Comment Details </label>
			 <div class="col-md-9 col-sm-12"><?php if($commentNum31 >0){ echo $commentS2->comment; } ?>
			 </div>
		</div>								

		<div class="form-group row" style="background-color: #f5f5f5;">
			 <label class="col-md-3 col-sm-12 col-form-label" >File Upload </label>
			 <div class="col-md-9 col-sm-12">
			<?php if($commentNum31 >0){
					foreach($commentFile1->result() as $commentFile10){	?>										
				  <label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$commentFile10->file_name?>" target="_blank" ><?php echo $commentFile10->file_name?></a></label><br>
			<?php  } } ?>

			 </div>
		</div><br><hr><br><?php } ?>
									
			<?php $editData = $this->journal_model->get_paperFile($paperDetail2->id,$i);
				  foreach($editData->result() as $editData2){} ?>	  
		  
		<div class="form-group row">
			 <label class="col-md-10 col-form-label">Author - Upload File Edit</label>	
		</div>	
		  
		<div class="form-group row">
             <div class="col-lg-4 col-xl-2">
                  <div class="file-man-box">
                  <div class="file-img-box">
                       <img src="<?php echo base_url('assets_journal/images/file_icons/pdf.svg')?>" alt="icon">
                  </div>
                  <a href="<?php echo base_url().$editData2->file_pdf?>" class="file-download" target="_blank"><i class="mdi mdi-download"></i> </a>
                  <div class="file-man-title">
                       <h5 class="mb-0 text-overflow"><?php echo $this->journal_model->name_paperFile($editData2->file_pdf);?></h5><!--<p class="mb-0"><small>568.8 kb</small></p>-->
                  </div>
                  </div>
             </div>
								
			 <div class="col-lg-4 col-xl-2">
                  <div class="file-man-box">
                  <div class="file-img-box">
                       <img src="<?php echo base_url('assets_journal/images/file_icons/doc.svg')?>" alt="icon">
                  </div>
                  <a href="<?php echo base_url().$editData2->file_word?>" class="file-download"><i class="mdi mdi-download"></i> </a>
                  <div class="file-man-title">
                       <h5 class="mb-0 text-overflow"><?php echo $this->journal_model->name_paperFile($editData2->file_word);?>	</h5><!--<p class="mb-0"><small>568.8 kb</small></p>-->
                  </div>
                  </div>
            </div>									
        </div>  
		  
        <div class="form-group row" style="background-color: #f5f5f5;">
             <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">Note </label>
             <div class="col-md-9 col-sm-12"><?php echo $editData2->remarks?>
             </div>
        </div>    
       
      </div>
    </div>
    <?php } ?>
  </div>  
</div>
                                            
</div>  
</div>  
<?php } ?>			   
						  
</div>					   
</div>
<br><br>
					
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
				 
		listEditor(); 		 
		 
	})		
	/////////////////////////////////
		 
		function addEditor(type){ 
			
			if(type =='1'){
			   
			   var name = $('#name_sname').val();
			   var email = $('#email').val();
				
				if(name ==''){
				   	alert('Please insert first name and last name.');				
					$('#name_sname').focus();
					return false;
				
				} else if(email ==''){					
					alert('Please insert email address.');				
					$('#email').focus();
					return false;
					
				} else {				
										
					$.post('<?php echo base_url('CMS_Journal/add_Editor')?>' , { name : name , email : email  }, function(data){ 
						if(data ==1){								
							listEditor();
							$('#login-modal').modal('hide');
						}
					})	
				}	
				
			}  else if(type =='2'){
			   
			   var name = $('#name_sname2').val();
			   var email = $('#email2').val();
				
				if(name ==''){
				   	alert('Please insert first name and last name.');				
					$('#name_sname2').focus();
					return false;
				
				} else if(email ==''){					
					alert('Please insert email address.');				
					$('#email2').focus();
					return false;
					
				} else {				
										
					$.post('<?php echo base_url('CMS_Journal/add_Editor')?>' , { name : name , email : email  }, function(data){ 
						if(data ==1){								
							listEditor();
							$('#login-modal2').modal('hide');
						}
					})	
				}				
			}
		}
	/////////////////////////////////
		 
		function listEditor(){
			
			var dataID = '<?php echo $paperDetail2->editor_id?>';
			var paperID = '<?php echo $paperDetail2->id?>';
			$.post('<?php echo base_url('CMS_Journal/list_editor')?>' , { dataID : dataID , paperID : paperID }, function(data){ 
				$('#showList').empty();
				$('#showList').html(data);
			})
			
		}
   /////////////////////////////////
		 
		function saveMessage_inMail(type,paper_id,paper_no){			
			
			var message = tinyMCE.editors[$('#message').attr('id')].getContent();
			var message_id = $('#message_id').val();
			if(message !=''){
				
				if(type == '1'){

					var date_start = '0000-00-00';
					var date_end = '0000-00-00';
				}			
				if(type == '2'){

					var date_start = $('#datepicker1').val();
					var date_end = $('#datepicker2').val();
				}			
				$.post('<?php echo base_url('CMS_Journal/save_Message_inMail')?>' , { type : type , paper_id : paper_id , paper_no : paper_no , date_start : date_start , date_end : date_end , message : message , message_id : message_id }, function(data){ 

					 if(data>0){	
						 
						$('#message_id').val(data); 

						swal({
							title: 'Saved Successfully.',
							//text: 'You clicked the button!',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						})
					}else{
						swal({
							title: "Data can't be saved. !",
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}) 							
					}		
				})			  
			}			
		}
	 /////////////////////////////////		
	
		function setEditor(dataID,ischecked){  				 
										   
			$('.checkboxName').prop('checked',false);  
			
			if(ischecked==true){ 
				$('#checkbox'+dataID).prop('checked',true);   
				var editor_id1 = $('#editor_id').val();	
				var message_id = $('#message_id').val();	
				var paper_id = '<?php echo $paperDetail2->id?>';	
				
				$.post('<?php echo base_url('CMS_Journal/set_editor')?>' , { paper_id : paper_id , dataID : dataID , message_id : message_id , editor_id1 : editor_id1 }, function(data){ 
					if(data ==1){
						$('#editor_id').val(dataID);
					}					
				})	
			}
			if(ischecked==false){ 
				$('#checkbox'+dataID).prop('checked',false);   
				$('#editor_id').val('');
				var paper_id = '<?php echo $paperDetail2->id?>';
				
				$.post('<?php echo base_url('CMS_Journal/remove_editor')?>' , { paper_id : paper_id , dataID : dataID }, function(data){ })
			}			
		}
	/////////////////////////////////		
	
		function setReviewer(dataID,ischecked){  				 
										   
			//$('.checkboxName').prop('checked',false);  
			
			if(ischecked==true){ 
				   
				//var editor_id1 = $('#editor_id').val();	
				var message_id = $('#message_id').val();	
				var paper_id = '<?php echo $paperDetail2->id?>';	
				
				$.post('<?php echo base_url('CMS_Journal/set_reviewer')?>' , { paper_id : paper_id , dataID : dataID , message_id : message_id }, function(data){ 
					if(data ==1){
						//$('#editor_id').val(dataID);
						$('#checkbox'+dataID).prop('checked',true);
					}					
				})	
			}
			if(ischecked==false){ 
				//$('#checkbox'+dataID).prop('checked',false);   
				//$('#editor_id').val('');
				var paper_id = '<?php echo $paperDetail2->id?>';
				var round = '<?php echo $round?>';
				
				$.post('<?php echo base_url('CMS_Journal/remove_reviewer')?>' , { paper_id : paper_id , dataID : dataID , round : round }, function(data){ 
					if(data ==1){
						$('#checkbox'+dataID).prop('checked',false); 
					}
				})
			}			
		}
      /////////////////////////////////
		
		function sendMail_toEditor(){
			
			//var message = tinyMCE.editors[$('#message').attr('id')].getContent();
			var editor_id = $('#editor_id').val();
			var paper_id = '<?php echo $paperDetail2->id?>';
			var paper_no = '<?php echo $paperDetail2->paper_no?>';
			var author_id = '<?php echo $paperDetail2->author_id?>';
			
			/*if(message ==''){
				alert('กรุณาระบุข้อความที่จะแสดงในอีเมล์');				
				$('#message').focus();
				return false;
			
			} else */
			if(editor_id ==''){
				alert('Please select Editor in Chief.');				
				$('#showList').focus();
				return false;
				
			} else {				
				$.post('<?php echo base_url('Journal_Mail/sendMailEditor')?>' , { editor_id : editor_id , paper_id : paper_id , paper_no : paper_no , author_id : author_id }, function(data){ 
				
					if(data ==1){				

						swal({
							title: 'Set Editor in Chief and sent email sucessfully.',
							//text: 'You clicked the button!',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						})
					}else{
						swal({
							title: 'Can not set Editor in Chief and sent email!',
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}) 							
					}	
				})
			}			
		}
	  /////////////////////////////////
		
		function sendMail_toReviewer(){
			
			//var message = tinyMCE.editors[$('#message').attr('id')].getContent();
			//var date_start = $('#datepicker1').val();
			//var date_end = $('#datepicker2').val();			
			var paper_id = '<?php echo $paperDetail2->id?>';
			var paper_no = '<?php echo $paperDetail2->paper_no?>';
			var author_id = '<?php echo $paperDetail2->author_id?>';
			var checkReviewer = $('input.checkboxName:checkbox:checked').length;  
			
			/*if(message ==''){
				alert('กรุณาระบุข้อความที่จะแสดงในอีเมล์');				
				$('#message').focus();
				return false;
			
			} else */
			if(checkReviewer ==0){
				alert('Please select Reviewer.');				
				$('#showList').focus();
				return false;
				
			} else {				
				$.post('<?php echo base_url('Journal_Mail/sendMailReviewer')?>' , { paper_id : paper_id , paper_no : paper_no , author_id : author_id }, function(data){ 
				
					if(data ==1){				

						swal({
							title: 'Set Reviewer and sent email sucessfully.',
							//text: 'You clicked the button!',
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						})
					}else{
						swal({
							title: 'Can not set Reviewer and sent email!',
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}) 							
					}	
				})
			}		
		}	
		
</script>	 

    </body>
</html>                
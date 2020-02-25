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

				<?php foreach($paperDetail->result() as $paperDetail2){} 
			  		  $userID = $this->session->userdata('juser_id');
			  		  $round = $this->journal_model->get_roundNumber($paperDetail2->id);
			  		  $x =''; $commentNum2 =0;			  
			  		  $comment = $this->journal_model->get_comment($paperDetail2->paper_no, $userID, $paperDetail2->id, $round);			  
					  $commentNum = $comment->num_rows();  
			  		  if($commentNum >0){
						  foreach($comment->result() as $comment2){}  
						  $commentFile = $this->journal_model->get_commentFile($comment2->reID);
						  $commentNum2 = $commentFile->num_rows(); 
					  }						   					  	
				?> 	
               
                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

							<div class="card-box">
							<form id="frm1" role="form" method="post" action="" enctype="multipart/form-data">	
								<div class="form-group row">
                                    <label class="col-md-3 col-sm-12 col-form-label" for="result_status">Status </label>
                                    <div class="col-md-9 col-sm-12">
                                        <select class="form-control" id="result_status" name="result_status">
                                           <option value="">-- Select --</option>
										   <option value="1" <?php if(($commentNum >0) && ($comment2->result_status == '1')){ echo "selected";  } ?>>Accepted</option>
                                           <option value="2" <?php if(($commentNum >0) && ($comment2->result_status == '2')){ echo "selected";  } ?>>Minor Revision</option>
                                           <option value="3" <?php if(($commentNum >0) && ($comment2->result_status == '3')){ echo "selected";  } ?>>Major Revision</option>
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
							</form>	
								
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
	function comment_paper(){
		
		var result_status = $('#result_status').val();
		var dataID = $('#commentID').val();
		var comment = tinyMCE.editors[$('#comment2').attr('id')].getContent();
		$('#comment').val(comment);
		
		if(result_status ==''){
			
		    alert('Please select status for this paper.');
		
		} else {
			
			if(dataID ==''){
			   var ctrl_name = 'commentPaper';
			   
			} else {
			   var ctrl_name = 'update_commentPaper';		
			}
			
			var form_data = new FormData($("#frm1")[0]);
			
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
	function sendMail_comment(type){
		
		var result_status = $('#result_status').val();
		var dataID = $('#commentID').val();
		var comment = tinyMCE.editors[$('#comment2').attr('id')].getContent();
		$('#comment').val(comment);
		
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
			
			var form_data = new FormData($("#frm1")[0]);
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('CMS_Journal/')?>'+ctrl_name,
				processData: false,
				contentType: false,
				data : form_data,					  		 
				success:function(data2){
					if(data2 >0){					   
						$.post('<?php echo base_url('Journal_Mail/')?>'+ctrl_name2 , { dataID : data2 },
						function(data){
							
							if(data ==1){
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
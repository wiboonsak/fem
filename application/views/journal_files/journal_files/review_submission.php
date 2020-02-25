<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Constro - Construction Business HTML5 Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Journal of Environmental Management and Energy System | JEMES</title>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo base_url('journal-html/images/favicon.ico')?>" />
<!-- Bootstrap -->
<link href="<?php echo base_url('journal-html/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
<!--  Roboto font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet" />
<!-- Mega Menu -->
<link href="<?php echo base_url('journal-html/css/mega-menu/mega_menu.css')?>" rel="stylesheet" type="text/css" />
<!-- Font Awesome -->
<link href="<?php echo base_url('journal-html/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />
<!-- Flaticon -->
<link href="<?php echo base_url('journal-html/css/flaticon.css')?>" rel="stylesheet" type="text/css" />
<!-- Magnific Popup -->
<link href="<?php echo base_url('journal-html/css/magnific-popup/magnific-popup.css')?>" rel="stylesheet" type="text/css">
<!-- Owl Carousel -->
<link href="<?php echo base_url('journal-html/css/owl-carousel/owl.carousel.css')?>" rel="stylesheet" type="text/css" />
<!-- revolution -->
<link href="<?php echo base_url('journal-html/revolution/css/settings.css')?>" rel="stylesheet" type="text/css">
<!-- General style -->
<link href="<?php echo base_url('journal-html/css/general.css')?>" rel="stylesheet" type="text/css" />
<!-- Main Style -->
<link href="<?php echo base_url('journal-html/css/style.css')?>" rel="stylesheet" type="text/css" />

</head>
<body>

<!--=================================header -->
<?php include("header.php"); ?>
<!--================================= header -->

<!--================================= banner -->

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(<?php echo base_url('journal-html/images/bg/bg-2.jpg')?>);">
  <div class="container">
     <div class="row intro-title text-center">
           <div class="col-sm-12">
				<div class="section-title"><h1 class="title text-white">Submission</h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="<?php echo base_url('Journal')?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Submission</span> </li>
             </ul>
        </div>
     </div>
  </div>
</section>
<!--================================= banner -->


<!--================================= Page Section -->

<section class="page-section-ptb">
<div class="container" style="width: 90% !important">
<div class="row">
<div class="col-sm-12">
      <div class="tab tab-bor clearfix">   
		  
		<?php 	$author_id = $this->session->userdata('jlogin');
				$papper = $this->journal_model->listPaper($author_id,$paper_no);
		 		foreach($papper->result() as $papper2){} 
		 		//$round = $this->journal_model->get_roundNumber($papper2->id);
		 		$c = 'y';
		 		//$round = $this->journal_model->get_roundNumber($papper2->id,$c);
		 		$round = $this->journal_model->get_roundNumber($papper2->id);
		 		//$roundCom
		 		$round = $round + 1;
		 		$x ='0'; $sendMail ='0';	 				 
		 
		 		$papperFile = $this->journal_model->get_paperFile($papper2->id,$x);
		 		foreach($papperFile->result() as $papperFile2){}
		 
		 		$commentCH = $this->journal_model->get_comment($paper_no, $papper2->editor_id, $papper2->id, $x);	
				$commentCH2 = $commentCH->num_rows(); //$round =1;
		 		if($commentCH2 >0){ 
		 			foreach($commentCH->result() as $commentCH1){}
		 			$sendMail = $commentCH1->send_mail;
				}
		?>	  
		  
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="<?php if(($sendMail =='0') || ($commentCH2 ==0)){ echo 'active';}?>" style="width: 25% !important"><a href="#tab1-A" data-toggle="tab" aria-expanded="<?php if(($sendMail =='0') ||($commentCH2 ==0)){ echo 'true';} else { echo 'false'; } ?>"><i class="fa fa-file-text"></i><span>Details</span></a></li>			
			
			
		<?php //if(($papper2->editor_changeStatus_date != '0000-00-00 00:00:00') && (($papperFile2->editor_result =='2') || ($papperFile2->editor_result =='3')) ){ 			
		 	if($papper2->editor_changeStatus_date != '0000-00-00 00:00:00'){ 			
				
				for($i=1; $i<=$round; $i++){	
					
					$sendMail ='0';
					$comment = $this->journal_model->get_comment($paper_no, $papper2->editor_id, $papper2->id, $i-1);	
					$commentNumX = $comment->num_rows();    
					if($commentNumX >0){
						foreach($comment->result() as $comment2){}  						
						$sendMail = $comment2->send_mail;
					}	
					
					if($sendMail !='0'){					
		?> 			
          <li style="width: 25% !important" class="<?php if($i == $round){ echo 'active';}?>"><a href="#tab1-<?php echo $i?>" data-toggle="tab" aria-expanded="<?php if($i == $round){ echo 'true';} else { echo 'false'; } ?>"><i class="fa fa-edit"></i><span>Round <?php echo $i?></span></a></li>
		<?php } } } ?>	
			
          <!--<li style="width: 25% !important"><a href="#tab1-3" data-toggle="tab"><i class="fa fa-edit"></i><span>Round 2</span></a></li>
          <li style="width: 25% !important"><a href="#tab1-4" data-toggle="tab"><i class="fa fa-edit"></i><span>Round 3</span></a></li>-->
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">		
         
          <div role="tabpanel" class="tab-pane fade active in<?php //if(($sendMail =='0') || ($commentCH2 ==0)){ echo 'active in';}?>" id="tab1-A">
              <p style="font-size: 14pt"><strong>Submission</strong><br><br></p>

			   <div class="defoult-form form-2">
					<div id="formmessage" style="display:none">Success/Error Message Goes Here</div>
					<form id="contactform" role="form" method="post" action="">				  
						<div class="form-group" >
							  <label>1. Title</label>
								<div class="input-group">
								  <input type="text" placeholder="<?php echo $papper2->title?>" class="form-control" disabled>
								</div>
						 </div> 
						<div class="form-group" >
							  <label>2. Upload File</label>
								<div class="input-group">
									<ul>
										<li><i class="fa fa-file-pdf-o"></i> <a href="<?php echo base_url().$papperFile2->file_pdf?>" target="_blank"><?php echo $this->journal_model->name_paperFile($papperFile2->file_pdf);?></a></li>
										<li><i class="fa fa-file-word-o"></i> <a href="<?php echo base_url().$papperFile2->file_word?>" target="_blank"><?php echo $this->journal_model->name_paperFile($papperFile2->file_word);?></a></li>
									</ul>
								</div>
							
						<?php 	$OtherFile = $this->journal_model->get_otherFiles($papperFile2->id);	
								$n_OtherFile = $OtherFile->num_rows();    
								if($n_OtherFile >0){  ?>  
							  
							<br>
							<label>&nbsp;&nbsp;&nbsp;Other File</label>
								<div class="input-group">
									<ul>
									<?php foreach($OtherFile->result() as $OtherFile2){ ?>	
										<li><i class="fa fa-folder-open-o"></i> <a href="<?php echo base_url().'uploadfile/'.$OtherFile2->file_name?>" target="_blank"><?php echo $OtherFile2->file_name;?></a></li>
									<?php } ?>	
									</ul>
								</div>
						<?php } ?>							
						 </div>					
						 <div class="form-group" >
							  <label>3. Select Section</label>
							 	<div class="input-group">
								  <input type="text" placeholder="<?php if($papper2->section == '1'){ echo "บทความวิจัย (Research Articles)"; } else { echo "บทความวิชาการ (Academic Articles)"; } ?>" class="form-control" disabled>
								</div>
						</div> 
					    <div class="form-group" >
							  <label>4. Abstract</label>
								<div class="input-group">						 	
									<textarea class="form-control" rows="5" disabled><?php echo $papper2->abstract?></textarea>
								</div>
						</div> 	
						<div class="form-group" >
							  <label>5. Note (Cover Letter)</label>
								<div class="input-group">						 	
									<textarea class="form-control" rows="5" disabled><?php echo $papper2->remarks?></textarea>
								</div>
						</div> 	
					</form>
					<div id="ajaxloader" style="display:none"><img class="center-block" src="images/loading.gif" alt=""></div> 
				</div>

          </div><!--($sendMail !='0') &&-->
			
		<?php //if(($papper2->editor_changeStatus_date != '0000-00-00 00:00:00') && (($papperFile2->editor_result =='2') || ($papperFile2->editor_result =='3')) ){
			if($papper2->editor_changeStatus_date != '0000-00-00 00:00:00'){
				for($a=1; $a<=$round; $a++){ 
			
					$sendMail ='0';
					$comment = $this->journal_model->get_comment($paper_no, $papper2->editor_id, $papper2->id, $a-1);	
					$commentNum = $comment->num_rows();    
					if($commentNum >0){
						foreach($comment->result() as $comment2){}  
						$commentFile = $this->journal_model->get_commentFile($comment2->reID);
						$commentNum2 = $commentFile->num_rows(); 
						$sendMail = $comment2->send_mail;
					}	
					
					if($sendMail !='0'){
			?>				

          <div role="tabpanel" class="tab-pane fade <?php if($a == $round){ echo 'active in';} ?>" id="tab1-<?php echo $a?>">
              <p style="font-size: 14pt"><strong>Comment Details : Round <?php echo $a?></strong><br><br></p>
              		<form id="submissionFrm<?php echo $a?>" role="form" method="post" action="" enctype="multipart/form-data">			  
						<div class="form-group" >
							  <label>Comment Details</label>
								<div class="input-group">
								 	 <!--<textarea class="form-control" rows="5" id="comment" disabled>--><?php echo $comment2->comment;?><!--</textarea>-->
								</div>
						 </div> 
						<?php if($commentNum2 >0){ ?>
						<div class="form-group" >
							  <label>File Document</label>
								<div class="input-group">
									<ul>
									<?php //if($commentNum2 >0){
										foreach($commentFile->result() as $commentF2){		  		
									?>	
										<li><i class="fa fa-file-text-o"></i> <a href="<?php echo base_url().'uploadfile/'.$commentF2->file_name?>" target="_blank"><?php echo $commentF2->file_name?></a></li>
									<?php } ?>	
										
										<!--<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-2.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-3.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-4.pdf</a></li>-->
									</ul>
								</div>
						 </div> <?php } ?>
						<?php if($comment2->result_status != '1'){   ?>
						 <hr>
						<p style="font-size: 14pt"><strong>Author - Upload File Edit</strong><br><br></p>
						<!--<br><br>-->
						<?php //$editData = $this->journal_model->get_paperFile($papper2->id,$round);
							  $editData = $this->journal_model->get_paperFile($papper2->id,$a);
							  $numEdit = $editData->num_rows();
		 				    //foreach($editData->result() as $editData2){}  ?>				
						
						 <div class="form-group" >
							  <label>1. Upload File</label>
							    <?php if($numEdit >0){ ?>
							    <div class="input-group">
									<ul>
									<?php foreach($editData->result() as $editData2){} ?>	
										<li><i class="fa fa-file-text-o"></i> <a href="<?php echo base_url().$editData2->file_pdf?>" target="_blank"><?php echo $this->journal_model->name_paperFile($editData2->file_pdf);?><?php //echo $editData2->file_pdf?></a></li>
										<li><i class="fa fa-file-text-o"></i> <a href="<?php echo base_url().$editData2->file_word?>" target="_blank"><?php echo $this->journal_model->name_paperFile($editData2->file_word);?><?php //echo $editData2->file_word?></a></li>										
										
										<!--<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-2.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-3.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-4.pdf</a></li>-->
									</ul>
								</div>
							  	<?php }  else  { ?>
								<div class="input-group">
								  Browse File Word * <input id="file1<?php echo $a?>" type="file" placeholder="Browse File Word" class="form-control"  name="file1" onChange="check_typeFile(this.value, 'file1<?php echo $a?>', 'w')"><br>
								  Browse File PDF * <input id="file2<?php echo $a?>" type="file" placeholder="Browse File PDF" class="form-control"  name="file2" onChange="check_typeFile(this.value, 'file2<?php echo $a?>', 'p')">
								</div>
								<?php } ?>
						</div> 
					    <div class="form-group" >
							  <label>2. Note (Cover Letter)</label>						  
								<div class="input-group">
								<?php if($numEdit >0){ ?>
								<textarea class="form-control" rows="5" disabled><?php echo $editData2->remarks?></textarea>
								<?php }  else  { ?>
								<textarea class="form-control" rows="5" id="remarks<?php echo $a?>" name="remarks"></textarea>
								<?php } ?>								
								</div>
						</div> 
							
						<input type="hidden" id="paper_id<?php echo $a?>" name="paper_id" value="<?php echo $papper2->id;?>" >
						<input type="hidden" id="round<?php echo $a?>" name="round" value="<?php echo $round;?>" >
						<input type="hidden" id="editor_id<?php echo $a?>" name="editor_id" value="<?php echo $papper2->editor_id;?>" >
						
						 <div class="form-group">
						 <?php if($numEdit ==0){ ?>
							<input type="hidden" name="action" value="sendEmail"/>
							<button id="submit" name="submit" type="button" class="button border animated middle-fill" onClick="submission('<?php echo $a?>')"><span>Submit</span></button>
							<button type="button" value="Send" class="button border animated middle-fill" onClick="$('#submissionFrm<?php echo $a?>')[0].reset();"><span>Cancel</span></button>
						<?php } ?>	
					  	</div>
						<?php } ?>
					</form>
		</div>
		<?php }  }  } ?>	
			
			
          
          <!--<div role="tabpanel" class="tab-pane fade" id="tab1-3">
              <p style="font-size: 14pt"><strong>Review Details : Round 2</strong><br><br></p>
              		<form id="contactform" role="form" method="post" action="">				  
						<div class="form-group" >
							  <label>Review Details</label>
								<div class="input-group">
								 	 <textarea class="form-control" rows="5" id="note" disabled>Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises 	Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises 	Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises 	Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises
								 	 </textarea>
								</div>
						 </div> 
						<div class="form-group" >
							  <label>File Document</label>
								<div class="input-group">
									<ul>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-1.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-2.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-3.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-4.pdf</a></li>
									</ul>
								</div>
						 </div> 
						 <hr>
						<p style="font-size: 14pt"><strong>Author - Upload File Edit</strong><br><br></p>
						<br><br>
						 <div class="form-group" >
							  <label>1. Upload File</label>
								<div class="input-group">
								  	<input id="name" type="text" placeholder="Browse File Word" class="form-control" name="search" style="margin: 5px !important"><br>
								  	<input id="name" type="text" placeholder="Browse File PDF" class="form-control" name="search" style="margin: 5px !important">
								</div>
						</div> 
					    <div class="form-group" >
							  <label>2. Note</label>
								<div class="input-group">						 	
									<textarea class="form-control" rows="5" id="note" >Note</textarea>
								</div>
						</div> 	
						
						 <div class="form-group">
							<input type="hidden" name="action" value="sendEmail"/>
							<button id="submit" name="submit" type="submit" value="Send" class="button border animated middle-fill"><span>Submit</span></button>
							<button id="submit" name="submit" type="submit" value="Send" class="button border animated middle-fill"><span>Cancel</span></button>
					  </div>
					</form>
		</div>

         <div role="tabpanel" class="tab-pane fade" id="tab1-4">
              <p style="font-size: 14pt"><strong>Review Details : Round 3</strong><br><br></p>
              		<form id="contactform" role="form" method="post" action="">				  
						<div class="form-group" >
							  <label>Review Details</label>
								<div class="input-group">
								 	 <textarea class="form-control" rows="5" id="note" disabled>Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises 	Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises 	Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises 	Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises Structural Equation Model of Factors Influencing Supply Chain Management Practice of Community Enterprises
								 	 </textarea>
								</div>
						 </div> 
						<div class="form-group" >
							  <label>File Document</label>
								<div class="input-group">
									<ul>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-1.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-2.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-3.pdf</a></li>
										<li><i class="fa fa-file-pdf-o"></i> <a href="#">Comment-4.pdf</a></li>
									</ul>
								</div>
						 </div> 
						 <hr>
						<p style="font-size: 14pt"><strong>Author - Upload File Edit</strong></p>
						<br><br>
						 <div class="form-group" >
							  <label>1. Upload File</label>
								<div class="input-group">
								  	<input id="name" type="text" placeholder="Browse File Word" class="form-control" name="search" style="margin: 5px !important"><br>
								  	<input id="name" type="text" placeholder="Browse File PDF" class="form-control" name="search" style="margin: 5px !important">
								</div>
						</div> 
					    <div class="form-group" >
							  <label>2. Note</label>
								<div class="input-group">						 	
									<textarea class="form-control" rows="5" id="note" >Note</textarea>
								</div>
						</div> 	
						
						 <div class="form-group">
							<input type="hidden" name="action" value="sendEmail"/>
							<button id="submit" name="submit" type="submit" value="Send" class="button border animated middle-fill"><span>Submit</span></button>
							<button id="submit" name="submit" type="submit" value="Send" class="button border animated middle-fill"><span>Cancel</span></button>
					  </div>
					</form>
		</div>-->

          

        </div>
      </div>
</div>
</div></div></section>

<!--================================= page-section -->

<!--=================================footer -->
  <?php include("footer.php"); ?>
 <!--=================================footer -->

<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-chevron-up"></i></a></div>

<!--================================= jquery -->

<!-- jquery  -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/jquery.min.js')?>"></script>

<!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/bootstrap.min.js')?>"></script>

<!-- appear -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/jquery.appear.js')?>"></script>

<!-- bootstrap -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/mega-menu/mega_menu.js')?>"></script>

<!-- owl-carousel -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/owl-carousel/owl.carousel.min.js')?>"></script>

<!-- isotope -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/isotope/isotope.pkgd.min.js')?>"></script>

<!-- magnific -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/magnific-popup/jquery.magnific-popup.min.js')?>"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/jquery.themepunch.tools.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/jquery.themepunch.revolution.min.js')?>"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.actions.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.carousel.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.kenburn.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.layeranimation.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.migration.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.navigation.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.parallax.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.slideanims.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('journal-html/revolution/js/extensions/revolution.extension.video.min.js')?>"></script>

<!-- custom -->
<script type="text/javascript" src="<?php echo base_url('journal-html/js/custom.js')?>"></script>
<script>
	
	function submission(aa){			
		
		var file1 = $('#file1'+aa).val();
		var file2 = $('#file2'+aa).val();		
		var paperID = '<?php echo $papper2->id;?>';	
		var paper_no = '<?php echo $paper_no;?>';	
		var round = '<?php echo $round;?>';	
				
		if(file1 ==''){					
			alert('Please upload file word.');				
			$('#file1').focus();
			return false;
			
		} else if(file2 ==''){					
			alert('Please upload file PDF.');				
			$('#file2').focus();
			return false;				
		
		} else {  
		
			//var form_data = $('#submissionFrm').serialize();
			var form_data = new FormData($("#submissionFrm"+aa)[0]);
			$('#preloader').css({'display' : 'block','backgroundColor' : '#00aba617'});
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Journal/submissionEdit')?>',
				processData: false,
				contentType: false,
				data : form_data,						  		 
				success:function(data2){
					if(data2 ==2){
						$.post('<?php echo base_url('Journal_Mail/author_mailEdit')?>' , { paperID : paperID , paper_no : paper_no , round : round }, function(data){
							if(data ==1){
								$('#preloader').css({'display' : 'none'});
								alert('Submission successfully.');				   		
								location.reload();
							}							
						})						
					}
			    }
            });	
			
		/*	$.post('<?php //echo base_url('Journal/submissionPaper')?>' , { form_data : form_data , author_id : author_id , file1 : file1 , file2 : file2 }, function(data){ 
				
				if(data ==1){
				   alert('Submission successfully.');
				   window.location.href = "<?php //echo base_url('Journal/myData')?>";	
				   
				}				
			})	*/		
		}		
	}
	//----------------------------------------	
	
	function check_typeFile(file,element,type){		
		
		if(file !=''){
			
			if(type == 'w'){
				var arrayExtensions = ["doc", "DOC", "docx", "DOCX"]; 
				var txt = 'Please upload file word only';

			} else {
				var arrayExtensions = ["pdf" , "PDF"];
				var txt = 'Please upload file PDF only';
			}				
			var ext = file.split(".");
			ext = ext[ext.length-1].toLowerCase(); 			
			if(arrayExtensions.lastIndexOf(ext) == -1){
				alert(txt);
				$("#"+element).val("");
				$("#"+element).focus();
			}
		}		
	}
	
</script>

</body>
</html>
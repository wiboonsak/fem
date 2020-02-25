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
                <li><a href="index.php"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Submission</span> </li>
             </ul>
        </div>
     </div>
  </div>
</section>

<!--================================= banner -->

<!--================================= Page Section -->
	
<?php $checkTab = $this->uri->segment(2);?>	

<section class="page-section-ptb">
<div class="container" style="width: 90% !important">
<div class="row">
<?php if($this->session->userdata('jlogin') !=''){ ?>	
<div class="col-sm-12">
      <div class="tab tab-bor clearfix"> 
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li <?php if($checkTab == 'myData'){ ?>class="active"<?php } ?> style="width: 25% !important"><a href="#tab1-1" data-toggle="tab" aria-expanded="false"><i class="fa fa-list"></i><span>Account Dashboard</span></a></li>
          <li style="width: 25% !important" <?php if($checkTab == 'Submission'){ ?>class="active"<?php } ?> ><a href="#tab1-2" data-toggle="tab" aria-expanded="true"><i class="fa fa-paperclip"></i><span>Submission</span></a></li>
          <li style="width: 25% !important"><a href="#tab1-3" data-toggle="tab"><i class="fa fa-paypal"></i><span>Payment</span></a></li>
          <li style="width: 25% !important"><a href="#tab1-4" data-toggle="tab"><i class="fa fa-info-circle"></i><span>Profile</span></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade <?php if($checkTab == 'myData'){ echo 'active in'; } ?>" id="tab1-1">
              <p style="font-size: 11pt"><strong>List Paper</strong><br><br></p>
               <section class="page-section-ptb data-table" style="padding-top: 10px !important">
  
				 <div class="col-lg-12 col-md-12">      
					<div class="table-responsive table-3" id="showlist">					  
					</div>
				 </div>
			  </section>
          </div>          
          
          <div role="tabpanel" class="tab-pane fade <?php if($checkTab == 'Submission'){ echo 'active in'; } ?>" id="tab1-2">
              <p style="font-size: 11pt"><strong>Submission</strong><br><br></p>

			   <div class="defoult-form form-2">
					<div id="formmessage" style="display:none">Success/Error Message Goes Here</div>
					<form id="submissionFrm" role="form" method="post" action="" enctype="multipart/form-data">
				  
				  	<div class="form-group" >
						  <label>1. Title *</label>
							<div class="input-group">
							  <input id="title" type="text" placeholder="Title" class="form-control"  name="title">
							</div>
					</div> 
			  	 	<div class="form-group" >
						  <label>2. Upload File</label>
							<div class="input-group">
							  File Word * <input id="file1" type="file" placeholder="Browse File Word" class="form-control" name="file1" onChange="check_typeFile(this.value, 'file1', 'w')"><br>
							  File PDF * <input id="file2" type="file" placeholder="Browse File PDF" class="form-control" name="file2" onChange="check_typeFile(this.value, 'file2', 'p')"><br>
							  Other File <input id="Other_file" type="file" placeholder="Browse File PDF"class="form-control" name="Other_file[]" multiple >
							</div>
					 </div> 
				  	 <div class="form-group" >
						  <label>3. Select Section * </label>
							<div class="input-group">
							  <select class="form-control" id="section" name="section">
								  <option value="">-- Select --</option>
								  <option value="1">Research Articles</option>
								  <option value="2">Review Articles</option>
							  </select>
							</div>
					 </div> 
				   	 <div class="form-group" >
						  <label>4. Abstract * </label>
							<div class="input-group"><textarea class="form-control" rows="5" id="abstract" name="abstract"></textarea></div>
					 </div> 
				     <div class="form-group" >
						  <label>5. Note (Cover Letter)</label>
							<div class="input-group"><textarea class="form-control" rows="5" id="remarks" name="remarks"></textarea></div>
					 </div> 
					  
					 <div class="form-group">
						<input type="hidden" name="action" value="sendEmail"/>
						<button id="btn_submission" name="btn_submission" type="button" class="button border animated middle-fill" onClick="submission()"><span>Submission</span></button>
						<button id="submit" name="submit" type="button" class="button border animated middle-fill" onClick="$('#submissionFrm')[0].reset();"><span>Cancel</span></button>
					 </div>  
					</form>
					<div id="ajaxloader" style="display:none"><img class="center-block" src="<?php echo base_url('journal-html/images/loading.gif')?>" alt=""></div> 
				</div>
          </div>
          
          
          
          <div role="tabpanel" class="tab-pane fade" id="tab1-3">
              <p style="font-size: 11pt"><strong>List Payment</strong><br><br></p>
               <section class="page-section-ptb data-table" style="padding-top: 10px !important">
  
				 <div class="col-lg-12 col-md-12">      
					<div class="table-responsive table-3" id="showPaperACC">					  
					</div>
				 </div>
			  </section>

          </div>
          <div role="tabpanel" class="tab-pane fade" id="tab1-4">
              <p><strong>Profile</strong><br><br> </p>              
              
				<div class="defoult-form form-2">
				<div id="formmessage" style="display:none">Success/Error Message Goes Here</div>
				  <form id="contactform" role="form" method="post" action="php/contact-form.php">
				  <?php $data = $this->journal_model->get_author2($this->session->userdata('jlogin'));
					  	foreach($data->result() as $dataAuthor){ }	
					  ?>
					  <!--<div class="form-group">
						  <label>Username*</label>
							<div class="input-group">
							  <input id="name" type="text" placeholder="Monthana" class="form-control"  name="name" disabled>
							</div>
					  </div>-->
					  <div class="form-group">
						<label>Email*</label>
							<div class="input-group">
                              <input type="email"  class="form-control" name="email" id="email" value="<?php echo $dataAuthor->email?>" onChange="checkEmail(this.value)">
							</div>
					  </div>
					  <div class="form-group half-group">
						  <label>Password*</label>
							<div class="input-group">
							  <input type="password" class="form-control" name="password" id="password">
							  <input type="hidden" name="passwordA" id="passwordA" value="<?php echo $dataAuthor->password?>">							  
							</div>
					  </div>
					  <div class="form-group half-group" style="padding-left: 10px;">
						  <label>Repeat Password*</label>
							<div class="input-group">
							  <input type="password" class="form-control"  name="repeatpassword" id="repeatpassword">
							</div>
					  </div>

					  <!--<div class="form-group">
						<label>Email*</label>
							<div class="input-group">
							<input type="email" placeholder="monthana.k@hotmail.com" class="form-control" name="email" disabled>
							</div>
					  </div>-->
					  <div class="form-group">
						<label>Salutation</label>
							<div class="input-group">
                              <input type="text"  class="form-control" name="salutation" id="salutation" value="<?php echo $dataAuthor->salutation?>" >
							</div>
					  </div>
					   <div class="form-group">
						<label>First Name*</label>
							<div class="input-group">
							  <input type="text" value="<?php echo $dataAuthor->first_name?>" class="form-control" name="first_name" id="first_name">
							</div>
					  </div>
					  <div class="form-group">
						<label>Middle Name</label>
							<div class="input-group">
							  <input type="text" value="<?php if($dataAuthor->middle_name !=''){ echo $dataAuthor->middle_name; } else { echo '-';} ?>" class="form-control" name="middle_name" id="middle_name">
							</div>
					  </div>
					  <div class="form-group">
						<label>Last Name*</label>
							<div class="input-group">
							  <input type="text" value="<?php echo $dataAuthor->last_name?>" class="form-control" name="last_name" id="last_name">
							</div>
					  </div>
					  <div class="form-groupp">
						<label>Affliation*</label>
							<!--<div class="input-group">
							  <input type="text" placeholder="<?php //echo $dataAuthor->affliation?>" class="form-control" name="affliation" id="affliation">
							</div>-->
							<div class="input-group">
							  <input type="text" value="<?php echo $dataAuthor->affliation?>" class="form-control" name="affliation" id="affliation">
							</div>
					  </div>
					  <div class="form-group">
						<label>Country*</label>
							<div class="input-group">
							  <input type="text" value="<?php echo $dataAuthor->country?>" class="form-control" name="country" id="country">
							</div>
					  </div>					 

					  <div class="form-group">
							<input type="hidden" name="action" value="sendEmail"/>
                            <button id="btn_change" name="btn_change" type="button" value="Send" class="button border animated middle-fill" onclick="ChangeData()"><span>Change Data</span></button>
							<button id="Cancel2" name="Cancel2" type="button" value="Send" class="button border animated middle-fill" onClick="$('#contactform')[0].reset();"><span>Cancel</span></button>
					  </div>
					</form>
					<div id="ajaxloader" style="display:none"><img class="center-block" src="<?php echo base_url('journal-html/images/loading.gif')?>" alt=""></div> 
					</div>

          </div>

        </div>
      </div>
</div><?php } ?>
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
	function login(){
		
		var username = $('#usernameL').val();
		var password = $('#passwordL').val();
		
		if((username !='') && (password !='')){
		
			$.post('<?php echo base_url('Journal/AuthorLogin')?>' , { username : username , password : password }, function(data){ 

				if(data !='0'){
					window.location.href = "<?php echo base_url('Journal/myData')?>";				
				
				} else {
					alert('Username or Password Incorrect !');	
					return false;					
				}				
			})
		}		
	}
///////////////////////////////////////////
	
	function getListPaper(){
		
		var author_id = '<?php echo $this->session->userdata('jlogin');?>';
		
		$.post('<?php echo base_url('Journal/get_listPaper')?>' , { author_id : author_id }, function(data){ 
			$('#showlist').empty();
			$('#showlist').html(data);						
		})		
	}
///////////////////////////////////////////
	
	function listPaper_payment(){
		
		var author_id = '<?php echo $this->session->userdata('jlogin');?>';
		
		$.post('<?php echo base_url('Journal/paper_payment')?>' , { author_id : author_id }, function(data){ 
			$('#showPaperACC').empty();
			$('#showPaperACC').html(data);						
		})		
	}
///////////////////////////////////////////	
	
	$(document).ready(function(){
		
		<?php if($this->session->userdata('jlogin') ==''){ ?>
			$('#login').modal('show');
		
		<?php } else { ?>	
			getListPaper();
			listPaper_payment();
		<?php } ?>
	})	
///////////////////////////////////////////
	
	function submission(){
		
		var author_id = '<?php echo $this->session->userdata('jlogin');?>';
		var title = $('#title').val();
		var file1 = $('#file1').val();
		var file2 = $('#file2').val();
		var section = $('#section').val();		
		var abstract = $('#abstract').val();
				
		if(title ==''){				
			alert('Please insert title.');				
			$('#title').focus();
			return false;		
			
		} else if(file1 ==''){					
			alert('Please upload file word.');				
			$('#file1').focus();
			return false;
			
		} else if(file2 ==''){					
			alert('Please upload file PDF.');				
			$('#file2').focus();
			return false;	
			
		} else if(section ==''){					
			alert('Please select section.');				
			$('#section').focus();
			return false;		
		
		} else if(abstract ==''){						
			alert('Please insert abstract.');				
			$('#abstract').focus();
			return false;				
		
		} else {  
		
			//var form_data = $('#submissionFrm').serialize();
			var form_data = new FormData($("#submissionFrm")[0]);
			$('#preloader').css({'display' : 'block','backgroundColor' : '#00aba617'});
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Journal/submissionPaper')?>',
				processData: false,
				contentType: false,
				data : form_data,						  		 
				success:function(data2){
					//if(data2 ==2){
					if(data2 >0){
						
						$.post('<?php echo base_url('Journal_Mail/mail_authorSubmission')?>' , { dataID : data2 },
						function(data){
							
							if(data ==1){
								$('#preloader').css({'display' : 'none'});
								alert('Submission successfully.');
				   				window.location.href = "<?php echo base_url('Journal/myData')?>";
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
//------------------------------------------
	
    function ChangeData(){
		
        var email = $('#email').val();
		var password = $('#password').val();
		var passwordA = $('#passwordA').val();
		var repeatpassword = $('#repeatpassword').val();
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var affliation = $('#affliation').val();
		var country = $('#country').val();
		
		if(email ==''){
			alert('Please insert email.');
			$('#email').focus();
			return false;
			
		} else if((password =='')&&passwordA ==''){
			alert('Please insert password.');
			$('#password').focus();
			return false;
			
		} else if((repeatpassword =='')&&passwordA ==''){
			alert('Please insert repeatpassword.');
			$('#repeatpassword').focus();
			return false;
			
		} else if(first_name ==''){
			alert('Please insert first_name.');
			$('#first_name').focus();
			return false;
		
		} else if(last_name ==''){
			alert('Please insert last_name.');
			$('#last_name').focus();
			return false;
		} else if(affliation ==''){
			alert('Please insert affliation.');
			$('#affliation').focus();
			return false;
		} else if(country ==''){
			alert('Please insert country.');
			$('#country').focus();
			return false;
		
		} else {  
		
			//var form_data = $('#submissionFrm').serialize();
			var form_data = new FormData($("#contactform")[0]);
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Journal/author_update')?>',
				processData: false,
				contentType: false,
				data: form_data,
                success:function(data, status){
                   alert('Change Data Successfully');
                }
        	});         
		}
	}
//----------------------------------------
	
    function checkEmail(email){
		$.post('<?php echo base_url('Journal/checkemail')?>',{ email : email }, function(data){
			if(data >0){
				alert('This email is already a member.');
                $('#email').val('');
                $('#email').focus();
                return false;
			}
		})
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
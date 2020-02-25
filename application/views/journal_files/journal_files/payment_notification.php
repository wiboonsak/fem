<!DOCTYPE html>
<?php 
if (!isset($currentID)) {
    $currentID = '';
}?>
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

<?php $checkTab = $this->uri->segment(3);
 	  	
	
?>
<!--================================= banner -->

<section class="inner-intro bg bg-fixed bg-overlay-black-70" style="background-image:url(<?php echo base_url('journal-html/images/bg/bg-2.jpg')?>;">
  <div class="container">
     <div class="row intro-title text-center">
           <div class="col-sm-12">
				<div class="section-title"><h1 class="title text-white">Submission</h1></div>
           </div>
           <div class="col-sm-12">
             <ul class="page-breadcrumb">
                <li><a href="<?php echo base_url('Journal/index')?>"><i class="fa fa-home"></i> Home</a> <i class="fa fa-angle-double-right"></i></li>
                <li><span>Payment</span> </li>
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
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li style="width: 25% !important" ><a href="#tab1-2" data-toggle="tab" aria-expanded="true"><i class="fa fa-paperclip"></i><span>Payment</span></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade  active in"  id="tab1-2">
              <p style="font-size: 11pt"><strong>Payment</strong><br><br></p>

			   <div class="defoult-form form-2">
					
					<form id="paymentFrm" role="form" method="post" action="" enctype="multipart/form-data">
                                  <?php 
                                  $txtRound ='';
                                  foreach ($payment->result() as $payment2){}
                                  if ($payment2->section == '1'){
                                      $section = "Research Articles";
                                  }else{
                                      $section = "Review Articles";
                                  }
                                  $round = $this->journal_model->get_roundNumber($payment2->id);
  if($round >0){
   $txtRound = '.R'.$round;
  }
                                  ?>
				  	<div class="form-group" >
						  <label>No.&nbsp;&nbsp;<?php echo $payment2->paper_no.$txtRound?> </label>
							<div class="input-group">
                                                            <input id="payment_no" type="hidden"  class="form-control"  name="payment_no" value="<?php echo $payment2->paper_no?>">
                                                            <input id="payment_id" type="hidden"  class="form-control"  name="payment_id" value="<?php echo $payment2->id?>">
							</div>
					 </div> 
                                         <div class="form-group ">
                  <label>Title.&nbsp;&nbsp;<?php echo $payment2->title?> </label> 
              </div>
                                           <div class="form-group" >
						  <label>Section.&nbsp;&nbsp;<?php echo $section?></label>
							  
					</div>
                                             <?php
                                                     
                                                      $paymentData = $this->journal_model_2->list_paymentData($payment2->paper_no); 
                                                     $paymentDatanum = $paymentData->num_rows();
                                                  if($paymentDatanum >0){
                                                  foreach ($paymentData->result() AS $paymentData2){} }?>
                                            <div class="form-group" >
						  <label>Amount.&nbsp;&nbsp;</label><?php if($paymentDatanum  >0){
                                                  echo number_format($paymentData2->Amount);}else{?>
							<div class="input-group">
                                                            <input id="Amount" type="text"  class="form-control"  name="Amount" >
							</div>
                                                  <?php }?>
					 </div>
                                            <div class="form-group">
                <label>Date.</label>&nbsp;&nbsp;<?php if($paymentDatanum  >0){
                    echo $this->journal_model->GetEngDate($paymentData2->Date);}else{?>
                    <div class="input-group">
                        <input type="date" placeholder="" class="form-control" name="Date" id="Date"  >
                    </div>
                <?php }?>
              </div>
              <div class="form-group">
                <label>Time.</label>&nbsp;&nbsp;<?php if($paymentDatanum  >0){
                    echo $paymentData2->Time;}else{?>
                    <div class="input-group">
                        <input type="time" placeholder="" class="form-control" name="Time" id="Time" >
                    </div>
                 <?php }?>
              </div>
			  	 	<div class="form-group" >
						  <label>Slip</label>
							<div class="input-group">
                                                            <?php if($paymentDatanum  ==0){?>
							<input type="file" class="btn-light" id="img" name="img[]" /><br> <?php }?>
                                                        <div>
                                                            <?php if($paymentDatanum >0){ ?>
                                                                            <img src="<?php echo base_url() . 'uploadfile/' . $paymentData2->Slip ?>" alt="image" width="200" height="225"  /><!--</a>-->
                                                                        <?php } ?>
                                                        </div>
							 
							</div>
					 </div> 
				  	
				 
				   <div class="form-group" >
						  <label>Note.</label>&nbsp;&nbsp;<?php if($paymentDatanum  >0){
                    echo $paymentData2->Note;}else{?>
                                                        <div class="input-group"><textarea class="form-control" rows="5" id="Note" name="Note" ></textarea></div>
                                                        <?php }?>
					</div> 
					  
					  <div class="form-group">
						<?php if($paymentDatanum  ==0){?>
						<button id="btn_save" name="btn_save" type="button" class="button border animated middle-fill" onClick="submission()"><span>Save</span></button>
                                               <?php }?>
					  </div>  
                                            <input type="hidden" name="currentID" id="currentID" value="<?php if($paymentDatanum >0){echo $paymentData2->id;} ?>" >
                                           
                                                                <input type="hidden" name="img_old" id="img_old" value="<?php  if($paymentDatanum >0){echo $paymentData2->Slip;}?>" >
					</form>
					
				</div>
          </div>

          </div>

        </div>
      </div>
</div>
</div></section>
	

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

///////////////////////////////////////////
	
	function submission(){
		var Amount = $('#Amount').val();		
		var Date = $('#Date').val();
		var Time = $('#Time').val();
		var img = $('#img').val();
                var img_old = $('#img_old').val();
		var Note = $('#Note').val();
				
		if(Amount ==''){					
			alert('Please insert Amount.');				
			$('#Amount').focus();
			return false;		
		
		} else if(Date ==''){						
			alert('Please insert Date.');				
			$('#Date').focus();
			return false;				
		} else if(Time ==''){						
			alert('Please insert Time.');				
			$('#Time').focus();
			return false;				
		} else if((img == '')&& (img_old =='')){						
			alert('Please insert Slip.');				
			$('#img').focus();
			return false;				
		} else if(Note ==''){						
			alert('Please insert Note.');				
			$('#Note').focus();
			return false;				
		
		} else {  
		
			//var form_data = $('#submissionFrm').serialize();
			var form_data = new FormData($("#paymentFrm")[0]);
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Journal/addPayment_no')?>',
				processData: false,
				contentType: false,
				data : form_data,						  		 
				success:function(data, status){
                                   var payNo = $('#payment_no').val();
                   alert('Payment Successfully');
                   setTimeout(function(){ window.location.href = "<?php echo base_url('Journal/payment_noti/')?>"+payNo; }, 2000);
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
 
                    //--------------------------- 
	
	
</script>	

</body>
</html>
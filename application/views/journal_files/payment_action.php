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
        <link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico') ?>">
        <!-- Sweet Alert css -->
        <link href="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- X editable -->
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/css/bootstrap-editable.css') ?>" rel="stylesheet" />

        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css" rel="stylesheet') ?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css" rel="stylesheet') ?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css') ?>" rel="stylesheet" type="text/css" />


        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css') ?>" rel="stylesheet" />

    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <?php include('side_menu.php') ?>
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
                                    <h4 class="page-title">Payment</h4></div>
                                <br>
                                <div class="row">
                            <?php $txtRound ='';
                                  foreach ($payment->result() as $payment2){}
                                  if($payment2->section == '1'){
									  
                                      $section = "Research Articles";
									  
                                  }else{
									  
                                      $section = "Review Articles";
                                  }
			  
                                  $round = $this->journal_model->get_roundNumber($payment2->id);
			  
  								  if($round >0){
   									  $txtRound = '.R'.$round;
  								  }
                            ?>
                                    <div class="col-12">                                     
                                        <div class="card-box"> 
                                           <div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/payment_detail')?>';"><i class="icon-action-undo"></i> Back</button></div><br><br>                             
                                            
                                            <form id="paymentForm" name="paymentForm">
                                                <div class="form-group row">
                                              <?php $authorBypaper = $this->journal_model_2->getauthorBypaper($payment2->paper_no);
                                                    foreach ($authorBypaper->result() as $authorBypaper2){}
                                              ?>
                                                    <label class="col-sm-3">Name :</label>
                                                    <div class="col-sm-9">
                                                        <label>
                                                               <?php //echo $authorBypaper2->first_name?>
                                                               <?php echo $authorBypaper2->salutation.' '.$authorBypaper2->first_name.' '.$authorBypaper2->last_name;?>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">E-mail :</label>
                                                    <div class="col-sm-9">
                                                         <label>
                                                               <?php echo $authorBypaper2->email?>
                                                         </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">No. :</label>
                                                    <div class="col-sm-9">
                                                        <label>
                                                               <?php echo $payment2->paper_no.$txtRound?>
                                                        </label>
                                                        <input id="payment_no" type="hidden"  class="form-control"  name="payment_no" value="<?php echo $payment2->paper_no?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Title :</label>
                                                    <div class="col-sm-9">
                                                       <label>
                                                               <?php echo $payment2->title?>
                                                       </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Section :</label>
                                                    <div class="col-sm-9">
                                                       <label>
                                                               <?php echo $section?>
                                                       </label>
                                                    </div>
                                                </div>
  													
										<?php	$paymentData = $this->journal_model_2->list_paymentData($payment2->paper_no); 
                                                $paymentDatanum = $paymentData->num_rows();
                                                if($paymentDatanum >0){
                                                  foreach ($paymentData->result() AS $paymentData2){} }?>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3">Amount (THB Baht) :</label>
                                                    <div class="col-sm-9">
                                                       <label>
                                                              <?php if($paymentDatanum >0){echo number_format($paymentData2->Amount);}?>
                                                       </label>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3">Date :</label>
                                                    <div class="col-sm-9">
                                                       <label>
                                                              <?php if($paymentDatanum >0){echo $this->journal_model->GetEngDate($paymentData2->Date);}?>
                                                           
                                                       </label>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3">Time :</label>
                                                    <div class="col-sm-9">
                                                       <label>
                                                              <?php if($paymentDatanum >0){echo $paymentData2->Time;}?>
                                                       </label>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3">Slip :</label>
													 
								<?php	$fileArray = explode(".",$paymentData2->Slip);							
										$allowed = array('gif','jpg','png','jpeg','GIF','JPG','PNG','JPEG');
										$filename = $fileArray[1];
										if(!in_array($filename,$allowed)){  ?>
									
													<a href="<?php echo base_url().'uploadfile/'.$paymentData2->Slip?>" target="_blank" ><label class="col-sm-9"><?php echo $paymentData2->Slip?></label></a>
											
								<?php	} else { ?>  
													<div class="col-sm-9">                                      
                                                        <img src="<?php echo base_url() . 'uploadfile/' . $paymentData2->Slip?>" alt="image" width="200" height="225" onClick="window.open('<?php echo base_url() . 'uploadfile/' . $paymentData2->Slip ?>', '_blank'); location.reload();" />                     
													 </div>
								<?php } ?>					 
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3">Note :</label>
                                                    <div class="col-sm-9">
                                                       <label>
                                                              <?php if($paymentDatanum >0){echo $paymentData2->Note;}?>
                                                       </label>
                                                    </div>
                                                </div>
                                                 <div class="form-group row">
                                                    <label class="col-sm-3">Note By Admin :</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" rows="5" id="NotebAdmin"><?php if($paymentDatanum >0){echo $paymentData2->Notebyadmin;}?></textarea>
                                                    </div>
                                                </div>

                                               <div class="form-group row" >
                                                   <?php if($paymentData2->Comfirmed =='0'){?>
                                                            <div class="col-12" style="text-align: center">
                                                                <button type="button" id="comfirm" class="btn btn-primary btn-sm" onClick="Comfirm()" >Confirm</button> 
                                                            </div>
                                                   <?php }else{ ?>
                                                   <div class="col-12" style="text-align: left">
                                                       <button  class="btn btn-success " type="button"  >Confirmed</button> 
                                                            </div>
                                                   <?php } ?>
                                                   <input type="hidden" name="currentID" id="currentID" value="<?php if($paymentDatanum >0){echo $paymentData2->id;} ?>" >
                                              </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                </div>
                                <!-- Top Bar End -->

                                </div>
                                </div>
                                </div>
                                </body>
                                </html>                
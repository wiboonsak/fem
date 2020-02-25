<!DOCTYPE html>
<?php	if(!isset($journal_name)){ $journal_name = ''; }
		if(!isset($sub_title)){ $sub_title = ''; }
		if(!isset($issue)){ $issue = ''; }
		if(!isset($published_date)){ $published_date = ''; }
		if(!isset($currentID)){ $currentID = ''; }
		if(!isset($img)){ $img = ''; }
?>
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
        <!-- Sweet Alert css -->
        <link href="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
        <!-- X editable -->
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/css/bootstrap-editable.css')?>" rel="stylesheet" />
         <link href="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />

        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
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
                                    <h4 class="page-title">Add / Edit Data</h4></div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            
                                            <div class="card-box"> 
                                            <?php  if($currentID != ''){ ?>
                                           	<div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_view')?>';"><i class="icon-action-undo"></i> Back</button></div><br><br><?php } ?> 
                                                <h5 class="card-title">
                                                    <div class="progress mb-0" style="display: none">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                    </div>
                                                </h5>
                                                
                                                    <?php  if($currentID != ''){ 
                                                      		$publishData = $this->journal_model_2->list_publishData($currentID);
                                                      		foreach($publishData->result() AS $publishData2){}
													} ?>
                                                   
                                                    <form enctype="multipart/form-data" id="publishedForm" name="publishedForm">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Journal</label>
                                                            <div class="col-md-9 col-sm-12">
                                                                <input id="journal_name" name="journal_name" type="text" class="form-control form-control-sm" value="<?php if($currentID !=''){ echo $publishData2->journal_name;}?>" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Sub Title</label>
                                                            <div class="col-md-9 col-sm-12">
                                                                <input id="sub_title" name="sub_title" type="text" class="form-control form-control-sm" value="<?php if($currentID !=''){ echo $publishData2->sub_title;}?>" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Issue No.</label>
                                                            <div class="col-md-9 col-sm-12">
                                                                <input id="issue" name="issue" type="text" class="form-control form-control-sm" value="<?php if($currentID !=''){ echo $publishData2->issue;}?>" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Publish Date</label>
                                                            <div class="col-md-9 col-sm-12">
                                            					<input class="form-control form-control-sm" type="date" name="published_date" id="published_date" value="<?php if($currentID !=''){ echo $publishData2->published_date;}?>" >
                                        					</div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Cover</label>
														    <div class="col-md-9 col-sm-12">
                                                            <div class="fileupload <?php
                                                            if(($currentID != '') && ($publishData2->img != '')){ echo 'fileupload-exists';} else { echo 'fileupload-new';}?>" data-provides="fileupload"> 
                                                                    <?php if($currentID == ''){ ?>
                                                                    <div class="fileupload-new thumbnail col-md-9" style="width: 225px; height: 150px;" id="upload_new">
                                                                        <img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
																    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>							<?php } ?>
                                                                <?php if($currentID != ''){ ?>
                                                                    <div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
                                                                        <?php //if($aboutus2->history_img ==''){   ?>	
                                                                        <img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
                                                                        <?php //}   ?>	
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
                                                                        <?php if($publishData2->img != ''){ ?>
                                                                            <img src="<?php echo base_url().'uploadfile/'.$publishData2->img?>" alt="image" width="150" height="225" onClick="window.open('<?php echo base_url().'uploadfile/'.$publishData2->img?>', '_blank'); location.reload();" /><!--</a>-->
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                                    <div class="col-md-9">
                                                                    <button type="button" class="btn btn-custom btn-file">
                                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                        <input type="file" class="btn-light" id="img" name="img[]" />
                                                                    </button>
                                                                    <?php if(($currentID !='') && ($publishData2->img !='')){ ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $currentID?>' , '<?php echo $publishData2->img?>' , 'รูปภาพ' , 'tbl_published_journal' , 'img' , '')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													
													<?php } else { ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													<?php } ?>				
                                                                </div>
<!--                                                                <input type="hidden" name="img" id="img<?php //echo $dataID ?>" value="<?php //if ($dataID != '') { echo $homedata2->img;}?>" >-->
                                                                <small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 400 x 265 พิกเซล)</small>
                                                            </div>
                                                        </div>
                                                        </div>
                                                       
                                                        <div class="form-group row" >
                                                            <div class="col-7" style="text-align: right">
                                                                <button type="button" class="btn btn-success btn-sm" onClick="Add()" >Add / Edit Data</button>
                                                                <input type="hidden" name="currentID" id="currentID" value="<?php if($currentID != ''){ echo $currentID; }?>" >
                                                                <input type="hidden" name="img_old" id="img_old" value="<?php if($currentID != ''){ echo $publishData2->img; }?>" >
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php if($currentID!=''){?>
                                                <br>
                                                <hr>
                                                <br>
                                                <br>
                                                <div id="showSection" class="table-responsive">
                                                   
                                                <div class="form-group row">
                                                    
                                                    <label class="col-md-3 col-sm-12 col-form-label">Manuscript Type</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="name" name="name" type="text" class="form-control form-control-sm" value="" >
                                                    </div>
                                            	</div>
                                                <div class="form-group row" >
                                                            <div class="col-12" style="text-align: center">
                                                                <button type="button" class="btn btn-primary btn-sm" onClick="Addsection()" >Add</button>
                                                                <input type="hidden" name="dataID" id="dataID" value="" >
                                                               
                                                            </div>
                                                        </div>
                                                    <div class="col-12 form-group row" id="show_data" >
                                                        
                                                    </div>          

                                        </div>
                                                <?php } ?>
                                            </div>
                                    </div>
                                <!-- Top Bar End -->
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>
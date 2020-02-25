<!DOCTYPE html>
<?php	if(!isset($topic)){ $topic = ''; }
		if(!isset($comment)){ $comment = ''; }
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
        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
        <script src="<?php echo base_url('assets_journal/js/modernizr.min.js')?>"></script>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <?php include('side_menu.php')?>
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
                                <div class="page-title-box"><h4 class="page-title">Add / Edit Data</h4></div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card m-b-30 card-body">
                                                <h5 class="card-title">
                                                    <div class="progress mb-0" style="display: none">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                    </div>
                                                </h5>
                                                <!--<div class="row">-->
                                                    <?php $homedata = $this->journal_model_2->get_homeData();
                                                    $currentID = $homedata->num_rows();
                                                    $dataID ='';
                                                    if($currentID > 0){
                                                        foreach($homedata->result() as $homedata2){}
                                                        $dataID = $homedata2->id;
                                                    } ?>
                                                    <!----->
                                                    <form enctype="multipart/form-data" id="homeForm" name="homeForm">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Topic</label>
                                                            <div class="col-md-9 col-sm-12">
                                                                <input id="topic" name="topic" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $homedata2->topic; } ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Detail</label>
                                                            <div class="col-md-9 col-sm-12">
                                                                <textarea id="desc" name="desc" type="text" class="ex"><?php if($dataID !=''){ echo $homedata2->desc; }?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-sm-12 col-form-label">Upload File</label>
															<div class="col-md-9 col-sm-12">
                                                            <div class="fileupload <?php
                                                            if(($dataID != '') && ($homedata2->img != '')){ echo 'fileupload-exists';} else { echo 'fileupload-new';}?>" data-provides="fileupload"> 
                                                            <?php if($dataID == ''){ ?>
                                                                    <div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
                                                                        <img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
																	</div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>						
															<?php } ?>
                                                            <?php if($dataID != ''){ ?>
                                                                    <div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
                                                                        <?php //if($aboutus2->history_img ==''){   ?>	
                                                                        <img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
                                                                        <?php //}   ?>	
                                                                    </div>
                                                                    <div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
                                                                        <?php if($homedata2->img != ''){ ?>
                                                                            <img src="<?php echo base_url().'uploadfile/'.$homedata2->img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().'uploadfile/'.$homedata2->img?>', '_blank'); location.reload();" /><!--</a>-->
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                                <div>
                                                                    <button type="button" class="btn btn-custom btn-file">
                                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                        <input type="file" class="btn-light" id="img" name="img[]" />
                                                                    </button>
                                                                    <?php if(($dataID != '') && ($homedata2->img != '')){ ?>                    
                                                                        <a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>', '<?php echo $homedata2->img?>', 'tbl_journal_home', 'img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                                    <?php } else { ?>
                                                                        <a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload" ><i class="fa fa-trash"></i> Remove</a>						
                                                                    <?php } ?>
                                                                </div>
<!--                                                                <input type="hidden" name="img" id="img<?php //echo $dataID ?>" value="<?php //if ($dataID != '') { echo $homedata2->img;}?>" >-->
                                                                <small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 400 x 265 พิกเซล)</small>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" >
                                                            <div class="col-12" style="text-align: center">
                                                                <button type="button" class="btn btn-success btn-sm" onClick="Add()" >Add / Edit Data</button>
                                                                <input type="hidden" name="currentID" id="currentID" value="<?php if($dataID != ''){ echo $currentID; }?>">
                                                                <input type="hidden" name="comment" id="comment" >
                                                                <input type="hidden" name="img_old" id="img_old" value="<?php if($dataID != ''){ echo $homedata2->img; }?>" >
                                                            </div>
                                                        </div>
                                                        <div class="form-group row" >
                                                            <div id="showError"></div>
                                                        </div>
                                                    </form>
                                                <!--</div>-->
                                            </div>
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
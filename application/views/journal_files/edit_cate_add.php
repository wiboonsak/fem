<!DOCTYPE html>
<?php	if(!isset($category_title)){  $category_title = ''; }
		if(!isset($dataID)){  $dataID = ''; }
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
                            </li>
                        </ul>
                        <div class="row">
                              <?php   if($dataID !=''){
										$show = '';	
										$editcateData = $this->journal_model_2->list_editcateData($show, $dataID);
			  							foreach($editcateData->result() as $editcateData2){	}	
								} ?>   
                        <div class="col-sm-12">
                            
                            <div class="card m-b-30 card-body">
                                <h5 class="card-title">
                                    <div class="progress mb-0" style="display: none">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/edit_cate_add')?>'"><i class="icon-plus"></i>&nbsp;&nbsp;Add Category</button>
                                        &nbsp;&nbsp;
                                        <button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/edit_cate')?>'"><i class=" icon-arrow-left-circle"></i>&nbsp;&nbsp;Back</button></div>
                                </h5>
                                <form id="categoryForm" name="categoryForm">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">Category</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input id="category_title" name="category_title" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $editcateData2->category_title; }?>" > 
                                        </div>
                                    </div>

                                    <div class="form-group row">
										<input type="hidden" name="dataID" id="dataID" value="<?php if($dataID !=''){ echo $dataID; }?>" >
                                        <div class="col-12" style="text-align: center">
                                            <button type="button" class="btn btn-success btn-sm" onClick="AddCateGory()">Add / Edit Data</button>
                                        </div>
                                    </div>
                                    <div class="form-group row" >
                                        <div id="showError"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </nav>
                </div>
            </div>
            </div>
    </body>
</html>                
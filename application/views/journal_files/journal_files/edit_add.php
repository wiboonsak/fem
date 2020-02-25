<!DOCTYPE html>
<?php 	if(!isset($editorial_name)){  $editorial_name = ''; }
		if(!isset($editorial_category)){ $editorial_category = ''; }
		if(!isset($dataID)){ $dataID = ''; }
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
                                <br>
                                <div class="row">
                                    <?php if($dataID != ''){
                                        	$editData = $this->journal_model_2->list_editData($dataID);
                                        	foreach($editData->result() as $editData2){ }
                                    } ?>   
                                    <div class="col-sm-12">
                                        <div class="card m-b-30 card-body">
                                            <h5 class="card-title">
                                                <div class="progress mb-0" style="display: none">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </h5>
                                            <form id="editAddForm" name="editAddForm">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Name Surname</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="editorial_name" name="editorial_name" type="text" class="form-control form-control-sm" value="<?php if($dataID != ''){  echo $editData2->editorial_name; }?>" > 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Category</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <select id="editorial_category" name="editorial_category"  class="form-control form-control-sm" >
                                                            <option value="">---Select---</option>
                                                            <?php foreach($listCategory->result() AS $category){ ?>
                                                                <option value="<?php echo $category->id?>" <?php if($dataID == ''){
                                                                    	if($category->id == $editorial_category){ echo "selected"; }
                                                                } else {
                                                                    	if($editData2->editorial_category == $category->id){ echo 'selected'; }
                                                                }?> ><?php echo $category->category_title?></option>
                                                    		<?php } ?>	
                                                        </select>
                                                    </div>
                                                    <!--<div class="col-sm-4">	</div>-->
                                                </div>	                                                

                                                <div class="form-group row">
													<input type="hidden" name="dataID" id="dataID" value="<?php if($dataID != ''){  echo $dataID; }?>" > 
													<div class="col-12" style="text-align: center">
                                                    	<button type="button" class="btn btn-success btn-sm" onClick="Addedit()">Add / Edit Data</button>
													</div>
												</div>
                                                <!--<div class="form-group row" >
                                                    <div id="showError"></div>
                                                </div>-->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>                
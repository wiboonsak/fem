<!DOCTYPE html>
<?php	if(!isset($accountName)){ $accountName = ''; }
		if(!isset($accountNo)){ $accountNo = ''; }
		if(!isset($bank)){ $bank = ''; }
		if(!isset($swiftCode)){ $swiftCode = ''; }
		if(!isset($currentID)){ $currentID = ''; }
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
                                <div class="page-title-box">
                                    <h4 class="page-title">Method of Payment</h4></div>
                                <br>
                                <div class="row">
                                    <?php	$paymentdata = $this->journal_model_2->get_paymentData();
                                    		$currentID = $paymentdata->num_rows();
                                    		$dataID = '';
                                    		if($currentID > 0){
                                        		foreach($paymentdata->result() as $paymentdata2){}
                                        		$dataID = $paymentdata2->id;
                                    		}
                                    ?>
                                    <div class="col-sm-12">
                                        <div class="card m-b-30 card-body">
                                            <h5 class="card-title">
                                                <div class="progress mb-0" style="display: none">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </h5>
                                            <!----->
                                            <form  id="paymentForm" name="paymentForm">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Account Name :</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="accountName" name="accountName" type="text" class="form-control form-control-sm" value="<?php if($dataID != ''){ echo $paymentdata2->accountName; }?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Account No :</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="accountNo" name="accountNo" type="text" class="form-control form-control-sm" value="<?php if($dataID != ''){ echo $paymentdata2->accountNo; }?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Bank :</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="bank" name="bank" type="text" class="form-control form-control-sm" value="<?php if($dataID != ''){ echo $paymentdata2->bank; }?>" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Swift Code :</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="swiftCode" name="swiftCode" type="text" class="form-control form-control-sm" value="<?php if($dataID != ''){ echo $paymentdata2->swiftCode; }?>" >
                                                    </div>
                                                </div>

                                                <div class="form-group row" >
                                                    <div class="col-12" style="text-align: center">
                                                        <button type="button" class="btn btn-success btn-sm" onClick="Add()" >Add / Edit Data</button>
                                                        <input type="hidden" name="currentID" id="currentID" value="<?php echo $currentID ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row" >
                                                    <div id="showError"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                </div>
                                <!-- Top Bar End -->

                                </div>
                                </div>
                               <!-- </div>-->
                                </body>
                                </html>                
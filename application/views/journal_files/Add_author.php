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
        <link href="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.css') ?>" rel="stylesheet" />

        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css" rel="stylesheet') ?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css" rel="stylesheet') ?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css') ?>" rel="stylesheet" />
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
                                    <h4 class="page-title">Add/Edit Author </h4></div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card m-b-30 card-body">
                                            <h5 class="card-title">
                                                <div class="progress mb-0" style="display: none">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </h5>
  <?php
 if ($dataID != '') {
                                                     foreach ($authorData->result() AS $authorData2){}
 } ?>

                                            <form enctype="multipart/form-data"  id="AddauthorForm" name="AddauthorForm">
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        E-mail* 
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="email" name="email" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->email;}?>" onChange="checkEmail(this.value)" > 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Password*
                                                    </label>
                                                    <div class="col-9">
                                                        <input type="password" id="Password" name="Password" type="text" class="form-control form-control-sm" > 
                                                        <input type="hidden" id="password_old" name="password_old" value="<?php if($dataID !=''){echo $authorData2->password;}?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Repeat Password*
                                                    </label>
                                                    <div class="col-9">
                                                        <input type="password" id="Repeat" name="Repeat" type="text" class="form-control form-control-sm" onchange="chpass(this.value)" > 
                                                        <input type="hidden" id="Repeat" name="Repeat_old" value="<?php if($dataID !=''){echo $authorData2->password;}?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Salutation
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="Salutation" name="Salutation" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->salutation;}?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        First Name*
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="name" name="name" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->first_name;}?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Middle Name
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="Middle" name="Middle" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->middle_name;}?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Last Name*
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="Last" name="Last" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->last_name;}?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Affliation*
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="Affliation" name="Affliation" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->affliation;}?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">
                                                        Country*
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="Country" name="Country" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $authorData2->country;}?>"> 
                                                    </div>
                                                </div>
                                               
                                                 <div class="form-group row" >
                                                            <div class="col-7" style="text-align: right">
                                                                <button type="button" class="btn btn-primary btn-sm" onClick="Add()" >Add/Edit Author</button>
                                                                <input type="hidden" name="dataID" id="dataID" value="<?php  if($dataID !=''){echo $authorData2->id;}?>" >                           
                                                               
                                                               
                                                            </div>
                                                        </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                                <!--</div>-->
                                <!-- Top Bar End -->
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </body>
</html>
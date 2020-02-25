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
                                    <h4 class="page-title">Add / Edit User</h4></div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card m-b-30 card-body">
                                            <h5 class="card-title">
                                                <div class="progress mb-0" style="display: none">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </h5>
  <?php	if($dataID != ''){
         foreach ($userData->result() AS $userData2){}
  } ?>

                                            <form enctype="multipart/form-data"  id="AdduserForm" name="AdduserForm">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Name Surname</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="name" name="name" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $userData2->name_sname;}?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Password</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="password" id="Password" name="Password"  class="form-control form-control-sm" > 
                                                        <input type="hidden" id="password_old" name="password_old" value="<?php if($dataID !=''){ echo $userData2->password; }?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">E-mail</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input id="email" name="email" type="text" class="form-control form-control-sm" value="<?php if($dataID !=''){echo $userData2->email;}?>" onChange="checkEmail(this.value)" > 
                                                    </div>
                                                </div>
												
												<?php if($this->session->userdata('juser_id') != $dataID){?>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">User Type</label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <select id="adminType" name="adminType"  class="form-control form-control-sm"  >
                                                            <option value="">--- Select ---</option>
                                                            <option value="3" <?php if(($dataID !='')&& $userData2->admin_type == '3'){echo"selected";} ?> >Editor/Reviewers</option>
                                                            <option value="2" <?php if(($dataID !='')&& $userData2->admin_type == '2'){echo"selected";}?> >Managing</option>
                                                        </select>
                                                    </div>
                                                </div>
												<?php } else { ?>												
												
												<?php //if($this->session->userdata('juserLv') =='1'){ ?>
													<input type="hidden" id="adminType" name="adminType" value="<?php echo $userData2->admin_type?>" >
												<?php } ?>
                                                
                                                 <div class="form-group row" >
                                                      <div class="col-12" style="text-align: center">
                                                          <button type="button" class="btn btn-primary btn-sm" onClick="Add()" >Add / Edit Data</button>
                                                          <input type="hidden" name="dataID" id="dataID" value="<?php if($dataID !=''){echo $userData2->id;}?>" >                 
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
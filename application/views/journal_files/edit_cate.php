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

        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />
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
                                <div class="page-title-box"><h4 class="page-title">List Data</h4></div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="p-20">
                                                        <div class="card-box table-responsive">	
                                                            <table class="table table-bordered table-hover" id="table2">
                                                                <!--<h5 class="card-title">รายชื่อประเภท</h5>-->
                                                                <div class="pull-right">
                                                                    <button type="button" class="btn btn-success btn-sm" style="margin: 0px 5px" onClick="window.location.href='<?php echo base_url('CMS_Journal/edit_cate_add')?>'"><i class="icon-plus"></i>&nbsp;&nbsp;Add Category</button></div>
                                                                <thead>
                                                                    <tr style="background-color: #f2f2f2"> 
                                                                        <th width="10">No.</th>
                                                                        <th>Topic</th>
                                                                        <th>Create Date</th>
                                                                        <th style="text-align: center">Show / Hide</th>
                                                                        <th width="5" style="text-align: center">Edit</th>
                                                                        <th width="5" style="text-align: center">Delete</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $n = 1;
                                                                    foreach($editcateData->result() as $editcateData2){ ?>
                                                                        <tr>
                                                                            <td style="text-align: center"><?php echo $n?></td>
                                                                            <td><?php echo $editcateData2->category_title?></td>
                                                                            <td><?php echo $this->journal_model_2->getIncluded($editcateData2->date_add);?></td>
                                                                            <td align="center">        
                                                                                <label><input id="ch<?php echo $editcateData2->id?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $editcateData2->id?>', this.value, 'tbl_journal_editorial_cate')" value="<?php echo $editcateData2->show_onweb?>" <?php if($editcateData2->show_onweb == '1'){  echo 'checked'; }?> data-plugin="switchery" data-color="#007bff" data-size="small" ></label>
                                                                            </td>
                                                                            <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/edit_cate_add/').$editcateData2->id?>'" >Edit</button></td>
                                                                            <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $editcateData2->id?>', 'tbl_journal_editorial_cate')">Delete</button></td>
                                                                        </tr>
    <?php $n++; } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
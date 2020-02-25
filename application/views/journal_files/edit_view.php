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

        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
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
                                    <div class="col-12">
                                        <div class="card-box">

                                            <div class="table-responsive">	
                                                <table class="table table-bordered table-hover" id="table2">
                                                    <!--<h5 class="card-title">รายชื่อข้อมูล</h5>-->
                                                    <thead>
                                                        <tr style="background-color: #f2f2f2"> 
                                                            <th width="10">No.</th>
                                                            <th>Name Surname</th>
                                                            <th>Category</th>
                                                            <th>Create Date</th>
                                                            <th style="text-align: center">Show / Hide</th>
                                                            <th width="5" style="text-align: center">Edit</th>
                                                            <th width="5" style="text-align: center">Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $n = 1;
                                                        		foreach($editList->result() AS $data){ ?>	
                <!--                                <tr id="row<?php //echo $data->id ?>">-->
                                                            <tr>
                                                                <td style="text-align: center"><?php echo $n?></td>
                                                                <td><?php echo $data->editorial_name?></td>
                                                                <td><?php echo $data->category_title?></td>
                                                                <td><?php echo $this->journal_model_2->getIncluded($data->date_add); ?></td>
                                                                <td align="center">        
                                                                    <label>
                                                                        <input id="ch<?php echo $data->id?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data->id?>', this.value, 'tbl_journal_editorial')" value="<?php echo $data->show_onweb?>" <?php if($data->show_onweb == '1'){ echo 'checked'; }?> data-plugin="switchery" data-color="#007bff" data-size="small" >
																	</label>
                                                                </td>
                                                                <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('CMS_Journal/edit_add/').$data->id?>'" >Edit</button></td>
                                                                <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $data->id?>', 'tbl_journal_editorial')">Delete</button></td>
                                                            </tr>
    <?php $n++;  } ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                </body>
                </html>
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
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-fileupload/bootstrap-fileupload.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.css') ?>" rel="stylesheet" />
    </head>
    <body>
        <div class="wrapper">
            <?php include('side_menu.php') ?>
            <div class="content-page">			 	
                <nav class="navbar-custom">       
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Authors Data</h4>
                            </div>
                            <br>
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-20">
                                                    <div class="card-box table-responsive">
                                                        <div class="pull-right" style="margin-left: 10px">
                                <button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal_2/Add_author') ?>'"><i class="fa fa-plus"></i> Add Author</button>
                            </div> 
                                                        <table class="table table-bordered table-hover" id="table2">
                                                            <thead>
                                                                <tr style="background-color: #f2f2f2"> 
                                                                    <th width="10">No.</th>
                                                                    <th>Name&Surname</th>
                                                                    <th>E-mail</th>
                                                                    <th width="5" style="text-align: center">Edit</th>
                                                                    <th width="5" style="text-align: center">Delete/Block/Unblock</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>	
                                                                <?php $n = 1;
                                                                foreach ($authorData->result() as $authorData2) {
                                                                    ?>
                                                                    <tr>
                                                                        <td style="text-align: center"><?php echo $n ?></td>
                                                                        <td><?php echo $authorData2->first_name ?>&nbsp;&nbsp;&nbsp;<?php echo $authorData2->last_name ?></td>					
                                                                        <td><?php echo $authorData2->email ?></td>					
                                                                        <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal_2/Add_author/') . $authorData2->id ?>'" >Edit</button></td>
                                                                         <td align="center">
                                                                        <?php 
                                  $authorpaper = $this->journal_model->listPaper($authorData2->id);
                                  $numpaper = $authorpaper->num_rows();?>
                                                                        <?php if($numpaper >0){?>
                                                                       
                                           <label>
                                              <input id="ch<?php echo $authorData2->id?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $authorData2->id ?>', this.value, 'tbl_authors_data')" value="<?php echo $authorData2->data_status ?>" <?php if ($authorData2->data_status == '1') { echo 'checked'; }?> data-plugin="switchery" data-color="#007bff" data-size="small" />
                                           </label>
                                      
                                                                        <?php }else{?>
                                                                        <button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $authorData2->id ?>', 'tbl_authors_data')">Delete</button>
                                                                        <?php }?>
                                                                         </td>
                                                                    </tr>
    <?php $n++;}?>
                                                            </tbody>
                                                        </table>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </li>
                    </ul>
                </nav>
            </div> <!-- end container -->
        </div>
    </body>
</html>
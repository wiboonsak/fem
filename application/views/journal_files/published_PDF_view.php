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



        <script src="<?php echo base_url('assets_journal/js/modernizr.min.js') ?>"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->

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
                                    <h4 class="page-title">PDF Data</h4>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->

 

                <!-- Start Page content -->
                <div class="content">
                   
                    <div class="container-fluid">
                        <div class="card-box table-responsive">
                          <div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_view')?>';"><i class="icon-action-undo"></i> Back</button></div><br><br>
                           <?php  foreach($publishbyid->result() AS $publishbyid2){} ?>
                            <h5 style="float: left">Journal : <?php echo $publishbyid2->journal_name?></h5>
                           <?php  
                           $numPDF = $this->uri->segment(3);
                           //foreach($PDF_view->result() AS $data){} ?>
                                <button type="button" style="float: right" class="btn btn-info btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_PDF/0/').$numPDF?>'" >Add PDF</button>                           
                                <br>
                                <br>
                           
                            <table class="table table-bordered table-hover" id="table2">
                                <thead>	
                                    <tr style="background-color: #f2f2f2">
                                        <th  style="text-align: center">No.</th>
                                        <th  style="text-align: center">Title</th>
                                        <th  style="text-align: center">Page No.</th>
                                        <th  style="text-align: center">Manuscript Type</th>
                                        <th  style="text-align: center">Create Date</th>
                                        <th  style="text-align: center">Show / Hide</th>
                                        <th  style="text-align: center">Sort Number</th>
                                        <th  style="text-align: center">Edit</th>
                                        <th  style="text-align: center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>	
                                    <?php $n=1; 
                                    $numPDF = $this->uri->segment(3);foreach($PDF_view->result() AS $data){ ?>	
                                   <tr id="row<?php echo $data->id?>">
                                    <td style="text-align: center"><?php echo $n?></td>
                                    <td><?php echo $data->title?></td>
                                    <td style="text-align: center"><?php echo $data->pageNo?></td>
                                        <td><?php echo $data->name?></td>
                                        <td style="text-align: center"><?php echo $this->journal_model_2->getIncluded($data->date_add);?></td>
                                        <td align="center">
                                           <label>
                                              <input id="ch<?php echo $data->id?>"  type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $data->id ?>', this.value, 'tbl_journal_PDF')" value="<?php echo $data->show_onweb ?>" <?php if ($data->show_onweb == '1') { echo 'checked'; }?> data-plugin="switchery" data-color="#007bff" data-size="small" />
                                           </label>
                                       </td>
                                       <td><input id="order<?php echo $data->id?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $data->sort_number?>" onChange="updateOrder('<?php echo $data->id?>', 'sort_number', this.value,<?php echo $numPDF?>)">
                                       <input type="hidden" id="chkOrder<?php echo $data->id?>" value="<?php echo $data->sort_number?>"></td>
                                       <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_PDF/').$data->id?>'" >Edit</button></td>
									   <td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $data->id?>', ' tbl_journal_PDF')">Delete</button></td>              
                                     </tr>
                                      <?php  $n++;  }?>
                                </tbody>	
                            </table>
                        </div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->               

            </div>

            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


    </body>
</html>                
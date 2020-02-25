<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <!--<title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- X editable -->
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/css/bootstrap-editable.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/plugins/datatables/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets_journal/favicon.ico') ?>">

        <!-- Sweet Alert css -->
        <link href="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/plugins/bootstrap-fileupload/bootstrap-fileupload.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.css') ?>" rel="stylesheet" />

        <link href="<?php echo base_url('assets_journal/plugins/jquery-toastr/jquery.toast.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css" rel="stylesheet') ?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css" rel="stylesheet') ?>" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/metismenu.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/style.css') ?>" rel="stylesheet" type="text/css" />

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
                                <div class="page-title-box"><h4 class="page-title">Issues Data</h4></div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->



                <!-- Start Page content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="card-box table-responsive">	
                            <table class="table table-bordered table-hover" id="table2">
                                <thead>	
                                    <tr style="background-color: #f2f2f2">
                                        <th  style="text-align: center">Cover</th>
                                        <th  style="text-align: center">Journal</th>
                                        <th  style="text-align: center">Publish Date</th>
                                        <th  style="text-align: center">Status</th>
                                        <th  style="text-align: center">Create Date</th>
                                        <th  style="text-align: center">PDF</th>
                                   		<th  style="text-align: center">Edit</th>
                                        <th  style="text-align: center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>	
                                    <?php $n = 1;
                                    foreach($publishedData->result() as $publishedData2){?>
                                        <tr>
                                            <td style="width: 120px;height: 90px;text-align: center;cursor:pointer" ><img  src="<?php echo base_url() . 'uploadfile/' . $publishedData2->img ?>" alt="image" width="80" height="90" onClick="window.open('<?php echo base_url() . 'uploadfile/' . $publishedData2->img ?>', '_blank'); location.reload();" /></td>
                                            <td><?php echo $publishedData2->journal_name ?></td>
                                            <td style="text-align: center"><?php if($publishedData2->published_date == '0000-00-00'){ echo 'ไม่ได้กำหนด';}else {echo  $this->journal_model_2->getIncluded($publishedData2->published_date); } ?></td>
                                            <td style="text-align: center">
                                              <?php if($publishedData2->status =='1'){
                                                  echo 'Current';
                                              }else if($publishedData2->status =='2'){
                                                 echo 'Archived';
                                              }else if($publishedData2->status =='3'){
                                                 echo 'Pending';
                                              }else {
                                                  echo '-';
                                              } ?>
                                            </td>
                                            <td style="text-align: center"><?php echo $this->journal_model_2->getIncluded($publishedData2->date_add); ?></td>
                                             <td style="text-align: center"><button type="button" class="btn btn-info btn-sm mdi mdi-file" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_PDF_view/') . $publishedData2->id?>'" ></button></td>
<!--                                            <td style="text-align: center"><button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php //echo base_url('CMS_Journal/published_PDF/0/') . $publishedData2->id?>'" >File PDF</button></td>-->
                                            <td style="text-align: center"><button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_journal/') . $publishedData2->id ?>'" >Edit</button></td>
                                            <td style="text-align: center"><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $publishedData2->id ?>', 'tbl_published_journal')">Delete</button></td>
                                        </tr>
    <?php $n++;
} ?>
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
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
        <link href="<?php echo base_url('assets_journal/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets_journal/css/icons.css')?>" rel="stylesheet" type="text/css" />
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
                                    <h4 class="page-title">Add / Edit PDF </h4></div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                      <?php $pdfjournalID ='';
                                            if($currentID != ''){ 
                                                $pdfData = $this->journal_model_2->list_pdfData($currentID);
                                                foreach ($pdfData->result() AS $pdfData2){}
                                                $pdfjournalID = $pdfData2->journal_id;
                                      } ?>   
                                       
                                        <div class="card-box"> 
                                           <div class="pull-right"><button type="button" class="btn btn-primary btn-sm" onClick="window.location.href = '<?php echo base_url('CMS_Journal/published_PDF_view/').$pdfjournalID?>';"><i class="icon-action-undo"></i> Back</button></div><br><br>
                                            <h5 class="card-title">
                                                <div class="progress mb-0" style="display: none">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </h5>
                                            
                                            <form enctype="multipart/form-data"  id="PDFForm" name="PDFForm">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Journal</label>
                                                    <div class="col-sm-9">
                                                        <select id="publishedData" name="publishedData"  class="form-control form-control-sm" onchange="changeSection(this.value)">
                                                            <option value="">--- Select Journal ---</option>
                                                            <?php if($journalID !=''){$pdfjournalID = $journalID;}
                                                            foreach($publishedData->result() as $publishedData2){  ?>
																<option value="<?php echo $publishedData2->id ?>"<?php if($publishedData2->id==$pdfjournalID){ echo "selected";}?> ><?php echo $publishedData2->journal_name?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">Manuscript Type</label>
                                                    <div class="col-md-9 col-sm-12" id="sectionID">
                                                        <select id="sectionData" name="sectionData"  class="form-control form-control-sm" >
                                                            <option value="">--- Select Manuscript Type ---</option>     <?php                             if($currentID!=''){
                                                              $sectionData = $this->journal_model_2->get_listSection($pdfData2->journal_id);
                                                            foreach ($sectionData->result() as $sectionData2) { ?>
                                                             <option value="<?php echo $sectionData2->id?>"<?php if(($currentID != '')&&($sectionData2->id==$pdfData2->section_id)){ echo "selected";}?> ><?php echo $sectionData2->name?></option>
                                                              <?php } }?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">
                                                        Title 
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="title" name="title" type="text" class="form-control form-control-sm" value="<?php if($currentID !=''){echo $pdfData2->title;} ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label" for="file_upload">Upload File </label>
                                                    <div class="col-md-9 col-sm-12">
                                                        <input type="file" class="filestyle" data-btnClass="file_btn"  id="file_upload" name="file_upload[]" value="" >
                                                         <?php if ($currentID !='') {   
                                                             if($pdfData2->file_name != ''){?>
                                                        <label class="col-form-label File_name"><a href="<?php if($currentID !=''){echo base_url().'uploadfile/'.$pdfData2->file_name;}?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php if($currentID !=''){echo $pdfData2->file_name;}?></a> </label><br>
                                                         <?php }}?> 
                                                    </div>
                                                   

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-sm-12 col-form-label">
                                                        Page No. 
                                                    </label>
                                                    <div class="col-9">
                                                        <input id="Page" name="Page" type="text" class="form-control form-control-sm" value="<?php if($currentID !=''){echo $pdfData2->pageNo;} ?>"> 
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <?php
                                                   // if ($currentID != '') { 
                                                     // $authorData = $this->journal_model_2->list_authorData($currentID);
                                                    //  foreach ($authorData->result() AS $authorData2){}?>   
                                                    <label class="col-md-3 col-sm-12 col-form-label">
                                                        Author Name 
                                                    </label>
                                                    <div id="Name_a" class="col-7">
                                                        <input id="Author" name="Author[]" type="text" class="form-control form-control-sm author3" value="">  
													</div>                                  
                                                    <div class="col-2">
                                                        <a href="#" id="bt1"class="btn btn-custom waves-effect waves-light btn-sm" onclick="ADDAuthor()">Add</a>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                <?php
                                                   // if ($currentID != '') { 
                                                     // $authorData = $this->journal_model_2->list_authorData($currentID);
                                                    //  foreach ($authorData->result() AS $authorData2){}?>   
                                                   
                                                      <?php
                                                    if ($currentID != '') { 
                                                      $authorData = $this->journal_model_2->list_authorData($currentID);
                                                      foreach ($authorData->result() AS $authorData2){?>
                                                     <label class="col-md-3 col-sm-12 col-form-label"></label>
                                                    <div class="col-7">                     <input id="order<?php echo $authorData2->id?>" type="text" class="form-control form-control-sm " value="<?php echo $authorData2->name?>" onChange="updateAuthor('<?php echo $authorData2->id?>', 'name', this.value)">  <br>    <!--<input type="hidden" id="chkOrder<?php //echo $authorData2->id ?>" value="<?php //echo $authorData2->name ?>">  -->  
                                                    </div> 
                                                     <div class="col-2">
                                                        <a href="#" id="bt2"class="btn btn-danger waves-effect waves-light btn-sm fa fa-remove" onclick="deleteauthor('<?php echo $authorData2->id?>', ' tbl_authors_pdf')"></a>
                                                         
                                                    </div>
                                                    <?php  } } ?> 
                                                 </div>
                                                 <div class="form-group row" >
                                                            <div class="col-7" style="text-align: right">
                                                                <button type="button" class="btn btn-primary btn-sm" onClick="Add()" >Add / Edit Data</button>
                                                                <input type="hidden" name="dataID" id="dataID" value="<?php if ($currentID != '') { echo $pdfData2->id; }?>" >                           
                                                                <input type="hidden" name="img_old" id="img_old" value="<?php if ($currentID != '') { echo $pdfData2->file_name; }?>" >
                                                               
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
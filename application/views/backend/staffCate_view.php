<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">หมวดบุคลากร</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">หมวดบุคลากร : ภาษาไทย</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control form-control-sm" name="name_th" id="name_th">
                                                </div>                                                 
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">หมวดบุคลากร : ภาษาอังกฤษ</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control form-control-sm" name="name_en" id="name_en">
                                                </div>                                                
                                            </div>
                                            
                                            <br><br>
                                            <div class="form-group row">
												<div class="col-12" style="text-align: center">
													<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="addStaff_category()">เพิ่มข้อมูล</button>
													<button type="button" class="btn btn-primary btn-sm" id="btnUpdate" onClick="update_staffCategory()">แก้ไขข้อมูล</button>
												</div>
                                            <input type="hidden" id="dataID" name="dataID" >
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div><br>
                            <div id="showData"></div>
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container -->
        </div>
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
                           <h4 class="page-title">หมวดข่าวสาร</h4>
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
                                                <label class="col-3 col-form-label">หมวดข่าวสาร : ภาษาไทย</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control form-control-sm" name="name_th" id="name_th">
                                                </div>
                                                 <!--<div class="col-2">
                                                  <button type="button"  class="btn btn-success btn-sm" onClick="addCorp()">เพิ่มข้อมูล</button>
                                              
												</div>-->
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-3 col-form-label">หมวดข่าวสาร : ภาษาอังกฤษ</label>
                                                <div class="col-9">
                                                    <input type="text" class="form-control form-control-sm" name="name_en" id="name_en">
                                                </div>
                                                <!-- <div class="col-2">
                                                  <button type="button"  class="btn btn-success btn-sm" onClick="addCorp()">เพิ่มข้อมูล</button>
                                              
												</div>-->
                                            </div>
                                            
                                            <br><br>
                                            <div class="form-group row">
												<div class="col-12" style="text-align: center">
													<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="addNewsCate()">เพิ่มข้อมูล</button>
													<button type="button"  class="btn btn-primary btn-sm" onClick="update_NewsCate()" id="btnUpdate">แก้ไขข้อมูล</button>
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


<div id="myModal33" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">กำหนดสิทธิ์ผู้ใช้งาน</h4>
                                        </div>
                                        <div class="modal-body">
                                            
                                        </div>
                                        <div class="modal-footer">
											<div style="text-align: center"><button type="button" class="btn btn-success btn-sm" onclick="save_selectUser()">บันทึก</button></div>
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                            <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>-->
											<!--<input type="hidden" id="allUserId" name="allUserId" >
											<input type="hidden" id="cateId" name="cateId" >-->
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
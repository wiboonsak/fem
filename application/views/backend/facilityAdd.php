<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">เพิ่มข้อมูลสิ่งอำนวยความสะดวก</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
							$show = '';		
							$facilityData = $this->facility_model->list_facilitiesData($show,$dataID);
			  				foreach($facilityData->result() as $facilityData2){	}	
				} ?>    
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1">
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_th">หัวข้อ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_th" name="topic_th" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $facilityData2->topic_th;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_en">หัวข้อ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_en" name="topic_en" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $facilityData2->topic_en;}?>" >
                                        </div>
                                    </div>	
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="url">ลิงค์ URL</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="url" name="url" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $facilityData2->url;}?>" >
                                            <small class="text-danger">(รูปแบบ URL คือ http://www.yourlink.com  หรือ https://www.yourlink.com)</small>
                                        </div>
                                    </div>								
									</form>			
									
									<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">รูปภาพ</label>
										<div class="col-md-9 col-sm-12">
											<div class="fileupload <?php if(($dataID !='') && ($facilityData2->first_pic !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
											
											<?php if($dataID ==''){ ?>	
												<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
													<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 225px; max-height: 150px; line-height: 20px;" id="upload_preview"></div>
											<?php } ?>
											
											<?php if($dataID !=''){ ?>	
												
												<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">							
													<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
												</div>									
												
												<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
												<?php if($facilityData2->first_pic !=''){ ?>	
													<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$facilityData2->first_pic?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$facilityData2->first_pic?>','_blank'); location.reload();" /><!--</a>-->
												<?php } ?>	
												</div>
											<?php } ?>		
												
												<div>
															
													<button type="button" class="btn btn-custom btn-file">
														<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
														<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
														<input type="file" class="btn-light" id="first_pic" name="fileupload1" onChange="Change2()" />
													</button>
													
													<?php  if(($dataID !='') && ($facilityData2->first_pic !='')){ ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $facilityData2->first_pic?>' , 'รูปภาพ' , 'tbl_facilities_data' , 'first_pic' , '')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													
													<?php } else { ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													<?php } ?>				
													
												</div>
												
												<input type="hidden" name="old_file1" id="first_pic<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $facilityData2->first_pic;}?>" >
												<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB ขนาดรูปภาพ (กว้างxสูง) 340 x 280 พิกเซล)</small>
											</div>
										</div>
										<input type="hidden" name="feildf1" id="feildf1" value="first_pic" >
										<input type="hidden" name="table" id="table" value="tbl_facilities_data" >
										<input type="hidden" name="num" id="num" value="1" >
										</div>
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmFacility()">เพิ่มข้อมูล</button>								
									    </div>
                                    <input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" >
                                    </div>	
										
									</form>
                                    </div>
                                </div>

                            </div>
                            
                            <!-- end row -->
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- end container -->
        </div>
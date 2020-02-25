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
                           <h4 class="page-title">เพิ่มข้อมูลผู้บริหาร (Administrator)</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
									
							$administratorData = $this->administrator_model->list_administratorData($dataID);	
			  				foreach($administratorData->result() as $administratorData2){	}	
				} ?>   
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" id="frm1" name="frm1" method="post" >								
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="name_th">ชื่อ - นามสกุล : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="name_th" name="name_th" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $administratorData2->name_th;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="name_en">ชื่อ - นามสกุล : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="name_en" name="name_en" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $administratorData2->name_en;}?>" >
                                        </div>
                                    </div>
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">ตำแหน่ง : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="position_th" name="position_th"><?php if($dataID !=''){ echo $administratorData2->position_th;}?></textarea>
                                        </div>
                                    </div>	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">ตำแหน่ง : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="position_en" name="position_en"><?php if($dataID !=''){ echo $administratorData2->position_en;}?></textarea>
                                        </div>
                                    </div>										
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="email">อีเมล์</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="email" name="email" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $administratorData2->email;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="telephone">เบอร์โทรศัพท์</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="telephone" name="telephone" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $administratorData2->telephone;}?>" >
                                        </div>
                                    </div>
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="url_appointment">URL ปฏิทินสำหรับการนัดหมาย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="url_appointment" name="url_appointment" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $administratorData2->url_appointment;}?>" >
                                            <small class="text-danger">(รูปแบบ URL คือ http://www.yourlink.com  หรือ https://www.yourlink.com)</small>
                                        </div>
                                    </div>										
									</form>	
										
									<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="cv_file_th">ไฟล์ CV : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">                      
                                        <?php if(($dataID !='') && ($administratorData2->cv_file_th !='')){ ?>	
											
											<a href="<?php echo base_url().$administratorData2->cv_file_th?>" target="_blank" id="aFile01" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $administratorData2->cv_file_th?>' , 'ไฟล์' , 'tbl_administrator_data' , 'cv_file_th' , '1')" class="btn btn-danger btn-sm" id="aFile1" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php } ?>                               
                                           
                                            <div class="fileupload fileupload-new" data-provides="fileupload" <?php if(($dataID !='') && ($administratorData2->cv_file_th !='')){ ?>	style="display: none" <?php } ?> id="up_file1" >
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="cv_file_th" name="fileupload1" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
                                        
                                        <input type="hidden" name="old_file1" id="cv_file_th<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $administratorData2->cv_file_th;}?>" >
                                        <small class="text-danger">(สำหรับแนบไฟล์ CV ภาษาไทย รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf ขนาดไฟล์ไม่ควรเกิน 2MB)</small>
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="cv_file_en">ไฟล์ CV : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                        <?php if(($dataID !='') && ($administratorData2->cv_file_en !='')){ ?>	
											
											<a href="<?php echo base_url().$administratorData2->cv_file_en?>" target="_blank" id="aFile02" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $administratorData2->cv_file_en?>' , 'ไฟล์' , 'tbl_administrator_data' , 'cv_file_en' , '2')" class="btn btn-danger btn-sm" id="aFile2" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php } ?>     
                                           
                                            <div class="fileupload fileupload-new" data-provides="fileupload" <?php if(($dataID !='') && ($administratorData2->cv_file_en !='')){ ?>	style="display: none" <?php } ?> id="up_file2" >
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="cv_file_en" name="fileupload2" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
                                        
                                        <input type="hidden" name="old_file2" id="cv_file_en<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $administratorData2->cv_file_en;}?>" >
                                        <small class="text-danger">(สำหรับแนบไฟล์ CV ภาษาอังกฤษ รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf ขนาดไฟล์ไม่ควรเกิน 2MB)</small>
                                        </div>
                                    </div> 	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="picture">รูปภาพ</label>
										<div class="col-md-9 col-sm-12">					
											<div class="fileupload <?php if(($dataID !='') && ($administratorData2->picture !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
											
											<?php if($dataID ==''){ ?>	
												<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
													<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 230px; max-height: 307px; line-height: 20px;" id="upload_preview"></div>
											<?php } ?>	
											
											<?php if($dataID !=''){ ?>	
												
												<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">							
													<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
												</div>									
												
												<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 230px; max-height: 307px; line-height: 20px;">
												<?php if($administratorData2->picture !=''){ ?>	
													<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$administratorData2->picture?>" alt="image" width="230" height="307" onClick="window.open('<?php echo base_url().$administratorData2->picture?>','_blank'); location.reload();" /><!--</a>-->
												<?php } ?>	
												</div>
											<?php } ?>			
												
												<div>
													<button type="button" class="btn btn-custom btn-file">
														<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
														<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
														<input type="file" class="btn-light" id="picture" name="fileupload3" />
													</button>
													
													<?php  if(($dataID !='') && ($administratorData2->picture !='')){ ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $administratorData2->picture?>' , 'รูปภาพ' , 'tbl_administrator_data' , 'picture' , '')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													
													<?php } else { ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													<?php } ?>	
													
												</div>
												
												<input type="hidden" name="old_file3" id="picture<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $administratorData2->picture;}?>" >
												<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 230 x 307 พิกเซล)</small>
											</div>
										</div>	
										<input type="hidden" name="feildf1" id="feildf1" value="cv_file_th" >
										<input type="hidden" name="feildf2" id="feildf2" value="cv_file_en" >
										<input type="hidden" name="feildf3" id="feildf3" value="picture" >
										<input type="hidden" name="table" id="table" value="tbl_administrator_data" >
										<input type="hidden" name="num" id="num" value="3" >
										
                                    </div>					
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmAdministrator()">เพิ่มข้อมูล</button>								
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
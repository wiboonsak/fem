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
                           <h4 class="page-title">เพิ่ม/แก้ไข ข้อมูลติดต่อเรา</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php $contactUs = $this->contactus_model->get_contactUsData();
			  		  $countRows = 	$contactUs->num_rows();
			  
			  		  $dataID = '';
			  		  //$desc_en = '';
			  
					  if($countRows>0) {	
			  		    foreach($contactUs->result() as $contactUs2){	}	
						  
						$dataID = $contactUs2->id;   
					  }
				 ?>     
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="address_th">ที่อยู่ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="address_th" name="address_th"><?php if($dataID !=''){ echo $contactUs2->address_th;}?></textarea>
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="address_en">ที่อยู่ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="address_en" name="address_en"><?php if($dataID !=''){ echo $contactUs2->address_en;}?></textarea>
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="telephone">โทรศัพท์</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="telephone" name="telephone" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $contactUs2->telephone;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="fax">แฟกซ์</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="fax" name="fax" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $contactUs2->fax;}?>" >
                                        </div>
                                    </div>
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="location">ตำแหน่งที่ตั้ง</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="location" name="location" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $contactUs2->location;}?>" >
                                            <small class="text-danger">(ตำแหน่งที่ตั้งแบบละติจูด ลองจิจูด เช่น 7.00631 100.49814)</small>
                                        </div>
                                    </div>	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="map">ลิงค์แผนที่</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="map" name="map"><?php if($dataID !=''){ echo $contactUs2->map;}?></textarea>
                                            <small class="text-danger">(คัดลอกโค้ด HTML จาก Google Map (https://www.google.com/maps) โดยใช้การแชร์แบบฝังแผนที่)</small>
                                        </div>
                                    </div> 										
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">รูปภาพ</label>
										<div class="col-md-9 col-sm-12">
											<div class="fileupload <?php if(($dataID !='') && ($contactUs2->first_pic !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
											
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
												<?php if($contactUs2->first_pic !=''){ ?>	
													<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$contactUs2->first_pic?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$contactUs2->first_pic?>','_blank'); location.reload();" /><!--</a>-->
												<?php } ?>	
												</div>
											<?php } ?>		
												
												<div>
															
													<button type="button" class="btn btn-custom btn-file">
														<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
														<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
														<input type="file" class="btn-light" id="first_pic" name="fileupload1" onChange="Change2()" />
													</button>
													
													<?php  if(($dataID !='') && ($contactUs2->first_pic !='')){ ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $contactUs2->first_pic?>' , 'รูปภาพ' , 'tbl_contactUs_data' , 'first_pic' , '')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													
													<?php } else { ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													<?php } ?>				
													
												</div>
												
												<input type="hidden" name="old_file1" id="first_pic<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $contactUs2->first_pic;}?>" >
												<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB ขนาดรูปภาพ (กว้างxสูง) 1023 x 594 พิกเซล)</small>
											</div>
										</div>
										<input type="hidden" name="feildf1" id="feildf1" value="first_pic" >
										<input type="hidden" name="table" id="table" value="tbl_contactUs_data" >
										<input type="hidden" name="num" id="num" value="1" >
										</div>
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmContactUs()">เพิ่มข้อมูล</button>								
									    </div>
                                    <input type="hidden" id="dataID" name="dataID" value="<?php echo $dataID;?>" >
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
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
                           <h4 class="page-title">เพิ่ม/แก้ไข ข้อมูลเกี่ยวกับเรา</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php $aboutus = $this->contactus_model->get_aboutusData();
			  		  $countRows = 	$aboutus->num_rows();
			  
			  		  $dataID = '';
			  		  //$desc_en = '';
			  
					  if($countRows>0) {	
			  		    foreach($aboutus->result() as $aboutus2){	}	
						  
						$dataID = $aboutus2->id;   
					  }
				 ?>     
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
										
										<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
                                    
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
												   <i class="fi-monitor mr-2"></i> คำอธิบายของหน้าเว็บแสดงข้อมูลเกี่ยวกับเรา
												</a>
											</li>
											<li class="nav-item">
												<a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
													<i class="fi-head mr-2"></i> ประวัติ
												</a>
											</li>
											<li class="nav-item">
												<a href="#messages" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-mail mr-2"></i> วิสัยทัศน์
												</a>
											</li>
											<li class="nav-item">
												<a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-cog mr-2"></i> พันธกิจ
												</a>
											</li>
										</ul>
										
										<div class="tab-content"><br>
											<div class="tab-pane show active" id="home">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="desc_th">คำอธิบาย : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea class="form-control form-control-sm" rows="5" id="desc_th" name="desc_th"><?php if($dataID !=''){ echo $aboutus2->desc_th;}?></textarea>
													</div>
												</div> 

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="desc_en">คำอธิบาย : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea class="form-control form-control-sm" rows="5" id="desc_en" name="desc_en"><?php if($dataID !=''){ echo $aboutus2->desc_en;}?></textarea>
													</div>
												</div>											
											</div>
											
											<div class="tab-pane" id="profile">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="history_th">ประวัติ : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="history_th" name="history_th" class="ex"><?php if($dataID !=''){ echo $aboutus2->history_th;}?></textarea>
													</div>										
												</div> 	

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="history_en">ประวัติ : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="history_en" name="history_en" class="ex"><?php if($dataID !=''){ echo $aboutus2->history_en;}?></textarea>
													</div>										
												</div> 
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="history_img">รูป Banner</label>
													<div class="col-md-9 col-sm-12">
														<div class="fileupload <?php  if(($dataID !='') && ($aboutus2->history_img !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
														<?php if($dataID ==''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
														<?php } ?>	

														<?php if($dataID !=''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
															<?php //if($aboutus2->history_img ==''){ ?>	
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															<?php //} ?>	
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
															<?php if($aboutus2->history_img !=''){ ?>	
																<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$aboutus2->history_img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$aboutus2->history_img?>','_blank'); location.reload();" /><!--</a>-->
															<?php } ?>	
															</div>
														<?php } ?>	

															<div>
																<button type="button" class="btn btn-custom btn-file">
																	<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																	<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																	<input type="file" class="btn-light" id="history_img" name="fileupload1" value=""  />
																</button>
																<?php  if(($dataID !='') && ($aboutus2->history_img !='')){ ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $aboutus2->history_img?>' , 'รูปภาพ' , 'tbl_aboutus_data' , 'history_img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>

																<?php } else { ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
																<?php } ?>

															</div>
															
															<input type="hidden" name="old_file1" id="history_img<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $aboutus2->history_img;}?>" >
															<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 400 x 265 พิกเซล)</small>
														</div>
														
													</div>	
												</div>
												
											</div>
											
											<div class="tab-pane" id="messages">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="vision_th">วิสัยทัศน์ : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="vision_th" name="vision_th" class="ex"><?php if($dataID !=''){ echo $aboutus2->vision_th;}?></textarea>
													</div>										
												</div> 	

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="vision_en">วิสัยทัศน์ : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="vision_en" name="vision_en" class="ex"><?php if($dataID !=''){ echo $aboutus2->vision_en;}?></textarea>
													</div>										
												</div> 
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="vision_img">รูป Banner</label>
													<div class="col-md-9 col-sm-12">
														<div class="fileupload <?php  if(($dataID !='') && ($aboutus2->vision_img !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
														<?php if($dataID ==''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
														<?php } ?>	

														<?php if($dataID !=''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
															<?php //if($aboutus2->vision_img ==''){ ?>	
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															<?php //} ?>	
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
															<?php if($aboutus2->vision_img !=''){ ?>	
																<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$aboutus2->vision_img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$aboutus2->vision_img?>','_blank'); location.reload();" /><!--</a>-->
															<?php } ?>	
															</div>
														<?php } ?>	

															<div>
																<button type="button" class="btn btn-custom btn-file">
																	<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																	<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																	<input type="file" class="btn-light" id="vision_img" name="fileupload2" value="" />
																</button>
																<?php  if(($dataID !='') && ($aboutus2->vision_img !='')){ ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $aboutus2->vision_img?>' , 'รูปภาพ' , 'tbl_aboutus_data' , 'vision_img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>

																<?php } else { ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
																<?php } ?>

															</div>
															
															<input type="hidden" name="old_file2" id="vision_img<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $aboutus2->vision_img;}?>" >
															<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 400 x 265 พิกเซล)</small>
														</div>
														
													</div>	
												</div>
												
											</div>
											
											<div class="tab-pane" id="settings">
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="mission_th">พันธกิจ : ภาษาไทย</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="mission_th" name="mission_th" class="ex"><?php if($dataID !=''){ echo $aboutus2->mission_th;}?></textarea>
													</div>										
												</div> 	

												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="mission_en">พันธกิจ : ภาษาอังกฤษ</label>
													<div class="col-md-9 col-sm-12">
														<textarea id="mission_en" name="mission_en" class="ex"><?php if($dataID !=''){ echo $aboutus2->mission_en;}?></textarea>
													</div>										
												</div> 
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="mission_img">รูป Banner</label>
													<div class="col-md-9 col-sm-12">
														<div class="fileupload <?php  if(($dataID !='') && ($aboutus2->mission_img !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
														<?php if($dataID ==''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
														<?php } ?>	

														<?php if($dataID !=''){ ?>	

															<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
															<?php //if($aboutus2->mission_img ==''){ ?>	
																<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
															<?php //} ?>	
															</div>


															<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
															<?php if($aboutus2->mission_img !=''){ ?>	
																<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$aboutus2->mission_img?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$aboutus2->mission_img?>','_blank'); location.reload();" /><!--</a>-->
															<?php } ?>	
															</div>
														<?php } ?>
															
															<div>
																<button type="button" class="btn btn-custom btn-file">
																	<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
																	<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
																	<input type="file" class="btn-light" id="mission_img" name="fileupload3" value="" />
																</button>
																<?php  if(($dataID !='') && ($aboutus2->mission_img !='')){ ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $aboutus2->mission_img?>' , 'รูปภาพ' , 'tbl_aboutus_data' , 'mission_img')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>

																<?php } else { ?>
																<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
																<?php } ?>

															</div>
															
															<input type="hidden" name="old_file3" id="mission_img<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $aboutus2->mission_img;}?>" >
															<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 400 x 265 พิกเซล)</small>
														</div>													
													</div>	
												</div>
												
											</div>
											
										</div>
										<!--<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">-->
											
											<!--<input type="file" id="history_img" name="fileupload1" style="display: none;" />
											<input type="file" id="vision_img" name="fileupload2" style="display: none;" />
											<input type="file" id="mission_img" name="fileupload3" style="display: none;" />-->	
											
											<!--<input type="hidden" name="old_file1" id="history_img<?php //echo $dataID?>" value="<?php //if($dataID !=''){ echo $aboutus2->history_img;}?>" >
											<input type="hidden" name="old_file2" id="vision_img<?php //echo $dataID?>" value="<?php// if($dataID !=''){ echo $aboutus2->vision_img;}?>" >
											<input type="hidden" name="old_file3" id="mission_img<?php// echo $dataID?>" value="<?php //if($dataID !=''){ echo $aboutus2->mission_img;}?>" >-->
											
											<input type="hidden" name="feildf1" id="feildf1" value="history_img" >
											<input type="hidden" name="feildf2" id="feildf2" value="vision_img" >
											<input type="hidden" name="feildf3" id="feildf3" value="mission_img" >
											<input type="hidden" name="table" id="table" value="tbl_aboutus_data" >
											<input type="hidden" name="num" id="num" value="3" >
											
											<input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" >										
										
										<br><br>
										<div class="form-group row">
											<div class="col-12" style="text-align: center">
												<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="checkfrm_aboutus()">เพิ่มข้อมูล</button>					
											</div>                                    
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
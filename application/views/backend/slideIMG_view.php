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
                           <h4 class="page-title">เพิ่มข้อมูลภาพสไลด์</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
							$show = '';	 $font_back = 'b';	
							$slideIMGData = $this->slide_model->list_slideIMG($show,$dataID,$font_back);
			  				foreach($slideIMGData->result() as $slideIMGData2){	}	
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
                                            <input type="text" id="topic_th" name="topic_th" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $slideIMGData2->topic_th;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_en">หัวข้อ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_en" name="topic_en" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $slideIMGData2->topic_en;}?>" >
                                        </div>
                                    </div>
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">คำอธิบาย : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="desc_th" name="desc_th"><?php if($dataID !=''){ echo $slideIMGData2->desc_th;}?></textarea>
                                        </div>
                                    </div>	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">คำอธิบาย : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="desc_en" name="desc_en"><?php if($dataID !=''){ echo $slideIMGData2->desc_en;}?></textarea>
                                        </div>
                                    </div>										
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="url">ลิงค์ URL</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="url" name="url" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $slideIMGData2->url;}?>" >
                                            <small class="text-danger">(รูปแบบ URL คือ http://www.yourlink.com  หรือ https://www.yourlink.com)</small>
                                        </div>
                                    </div>
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-3 col-form-label" for="date_start" >วันที่เริ่มต้น</label>
                                        <div class="col-md-3 col-sm-9">
                                            <input class="form-control form-control-sm" type="date" name="date_start" id="date_start" value="<?php if($dataID !=''){ echo $slideIMGData2->date_start;}?>" >
                                            <small class="text-danger">(วันที่เริ่มต้นคือวันเริ่มต้นแสดงข้อมูลบนเว็บไซต์ โดยระบบจะตั้งค่าเป็นวันที่เพิ่มข้อมูลอัตโนมัติ)</small>
                                        </div>
										<label class="col-md-3 col-sm-3 col-form-label" for="date_end" id="labelD">วันที่สิ้นสุด</label>
                                        <div class="col-md-3 col-sm-9">
                                            <input class="form-control form-control-sm" type="date" name="date_end" id="date_end" value="<?php if($dataID !=''){ echo $slideIMGData2->date_end;}?>" >
                                            <small class="text-danger">(วันที่สิ้นสุดคือวันที่ให้ซ่อนข้อมูลบนเว็บไซต์ หากไม่กำหนดวันสิ้นสุด ข้อมูลจะแสดงบนเว็บไซต์ต่อไป)</small>
                                        </div>
                                    </div>	
                                    </form>			
									
									<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">รูปภาพ</label>
										<div class="col-md-9 col-sm-12">
											<div class="fileupload <?php if(($dataID !='') && ($slideIMGData2->image_name !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
											
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
												<?php if($slideIMGData2->image_name !=''){ ?>	
													<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$slideIMGData2->image_name?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$slideIMGData2->image_name?>','_blank'); location.reload();" /><!--</a>-->
												<?php } ?>	
												</div>
											<?php } ?>		
												
												<div>
															
													<button type="button" class="btn btn-custom btn-file">
														<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
														<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
														<input type="file" class="btn-light" id="image_name" name="fileupload1" onChange="Change2()" />
													</button>
													
													<?php  if(($dataID !='') && ($slideIMGData2->image_name !='')){ ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $slideIMGData2->image_name?>' , 'รูปภาพ' , 'tbl_slide_data' , 'image_name' , '')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													
													<?php } else { ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													<?php } ?>				
													
												</div>
												
												<input type="hidden" name="old_file1" id="image_name<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $slideIMGData2->image_name;}?>" >
												<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB  ขนาดรูปภาพ (กว้างxสูง) 1256 x 558พิกเซล)</small>
											</div>
										</div>
										<input type="hidden" name="feildf1" id="feildf1" value="image_name" >
										<input type="hidden" name="table" id="table" value="tbl_slide_data" >
										<input type="hidden" name="num" id="num" value="1" >
										</div>
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmSlideIMG()">เพิ่มข้อมูล</button>								
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
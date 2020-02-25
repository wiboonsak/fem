<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

 <!-- Summernote css -->
        <link href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css" rel="stylesheet')?>" />
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">เพิ่มข้อมูลข่าวสาร (News)</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">  
				<?php   if($dataID !=''){
							$show ='all';
							$limit ='';
							$Category ='';
							$font_back = 'b';
		
							$news_data = $this->news_model->get_news_data02($dataID,$show,$limit,$Category,$font_back);
			  				foreach($news_data->result() as $news_data2){	}	
					} ?>
					
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" id="frm1" name="frm1" >
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">หมวดข่าวสาร</label><div class="col-9">
                                            <select class="form-control form-control-sm" id="category_id" name="category_id">
                                                <option value="">-- เลือก --</option>
												<?php 	$categoryData=$this->news_model->list_newsCategory2();  
			  											foreach($categoryData->result() AS $category){ ?>
                                                <option value="<?php echo $category->id?>"  <?php if($dataID !=''){ if($news_data2->category_id == $category->id){ echo 'selected'; } }?>  ><?php echo $category->name_th?></option>
												<?php } ?>
                                            </select>
                                        </div>
                                    </div>
										
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_th">หัวข้อ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_th" name="topic_th" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $news_data2->topic_th;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_en">หัวข้อ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_en" name="topic_en" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $news_data2->topic_en;}?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">คำอธิบายแบบสั้น : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="desc_th" name="desc_th"><?php if($dataID !=''){ echo $news_data2->desc_th;}?></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">คำอธิบายแบบสั้น : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <textarea class="form-control form-control-sm" rows="5" id="desc_en" name="desc_en"><?php if($dataID !=''){ echo $news_data2->desc_en;}?></textarea>
                                        </div>
                                    </div>    
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">รายละเอียด : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <!--<textarea id="detail_th" name="detail_th" class="ex"><?php //if($dataID !=''){ echo $news_data2->detail_th;}?></textarea>-->
											<div class="summernote" id="detail_th" name="detail_th"><?php if($dataID !=''){ echo $news_data2->detail_th;}?></div>
                                        </div>										
                                    </div> 	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_en">รายละเอียด : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <!--<textarea id="detail_en" name="detail_en" class="ex"><?php //if($dataID !=''){ echo $news_data2->detail_en;}?></textarea>-->
											<div class="summernote" id="detail_en" name="detail_en"><?php if($dataID !=''){ echo $news_data2->detail_en;}?></div>
                                        </div>										
                                    </div>  	
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-3 col-form-label" for="date_start" >วันที่เริ่มต้น</label>
                                        <div class="col-md-3 col-sm-9">
                                            <input class="form-control form-control-sm" type="date" name="date_start" id="date_start" value="<?php if($dataID !=''){ echo $news_data2->date_start;}?>" >
                                            <small class="text-danger">(วันที่เริ่มต้นคือวันเริ่มต้นแสดงข้อมูลบนเว็บไซต์ โดยระบบจะตั้งค่าเป็นวันที่เพิ่มข้อมูลอัตโนมัติ)</small>
                                        </div>
										<label class="col-md-3 col-sm-3 col-form-label" for="date_end" id="labelD">วันที่สิ้นสุด</label>
                                        <div class="col-md-3 col-sm-9">
                                            <input class="form-control form-control-sm" type="date" name="date_end" id="date_end" value="<?php if($dataID !=''){ echo $news_data2->date_end;}?>" >
                                            <small class="text-danger">(วันที่สิ้นสุดคือวันที่ให้ซ่อนข้อมูลบนเว็บไซต์ หากไม่กำหนดวันสิ้นสุด ข้อมูลจะแสดงบนเว็บไซต์ต่อไป)</small>
                                        </div>
                                    </div>
									</form>	
										
									<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
									<!--<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">อัพโหลดไฟล์  : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
										<?php //if(($dataID !='') && ($news_data2->file_name !='')){ ?>	
											
											<a href="<?php //echo base_url().$news_data2->file_name?>" target="_blank" id="aFile" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php //echo $dataID?>' , '<?php //echo $news_data2->file_name?>' , 'ไฟล์' , 'tbl_news_data' , 'file_name')" class="btn btn-danger btn-sm" id="aFile2" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php //} ?>	
											
                                        <div class="fileupload fileupload-new" id="up_file" data-provides="fileupload" <?php //if(($dataID !='') && ($news_data2->file_name !='')){ ?>	style="display: none" <?php //} ?> >
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="file_name2" name="file_name2" value="" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>                                           
                                        </div>
																		
											
										<input type="hidden" name="old_file" id="old_file" value="<?php //if($dataID !=''){ echo $news_data2->file_name;}?>" >
                                       	<small class="text-danger">(รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf  และรองรับไฟล์รูปภาพนามสกุล jpg, gif, png ขนาดไฟล์ไม่ควรเกิน 2MB)</small>	
                                        </div>
                                    </div> -->	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">อัพโหลดไฟล์  : ภาษาไทย</label>
                                       <div class="col-md-9 col-sm-12">
										<?php //if(($dataID !='') && ($news_data2->file_name !='')){ ?>	
											
									<!-- 		<a href="<?php// echo base_url().$news_data2->file_name?>" target="_blank" id="aFile" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php //echo $dataID?>' , '<?php// echo $news_data2->file_name?>' , 'ไฟล์' , 'tbl_news_data' , 'file_name')" class="btn btn-danger btn-sm" id="aFile2" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php// } ?>	
											
                                        <div class="fileupload fileupload-new" id="up_file" data-provides="fileupload" <?php //if(($dataID !='') && ($news_data2->file_name !='')){ ?>	style="display: none" <?php //} ?> >
                                            <button type="button" class="btn btn-custom btn-file" onClick="rrr3()">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="file_name2" name="file_name2" value="" multiple />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>                                           
                                        </div>-->
											
										<input type="file" id="file_th" name="file_th[]" multiple="multiple">										
										
                                       	<small class="text-danger">(รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf และรองรับไฟล์รูปภาพนามสกุล jpg, gif, png ขนาดไฟล์ไม่ควรเกิน 2MB  สามารถเลือกไฟล์ครั้งละหลายไฟล์ได้ แต่ไม่ควรเกิน 5 ไฟล์ โดยคลิกปุ่ม Ctrl ค้างไว้และคลิกเลือกไฟล์ ระบบจะแสดงผลตามชื่อไฟล์ที่ตั้งไว้)</small>	
										   
										<?php if($dataID !=''){										   
										   
										   	  $language = 'th'; 
											  $fileTH = $this->news_model->list_newsFile($dataID,$language);						   
			  								  foreach($fileTH->result() as $fileTH2){	
										?>
										<br>
										<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$fileTH2->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $fileTH2->file_name?></a> <i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php echo $fileTH2->id?>' , '<?php echo $fileTH2->file_name?>')"></i></label>
										   
										<?php }  } ?>
                                       </div>
                                    </div> 	
										
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label">อัพโหลดไฟล์  : ภาษาอังกฤษ</label>
                                       <div class="col-md-9 col-sm-12">
										<?php //if(($dataID !='') && ($news_data2->file_name !='')){ ?>	
											
									<!-- 		<a href="<?php// echo base_url().$news_data2->file_name?>" target="_blank" id="aFile" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php //echo $dataID?>' , '<?php// echo $news_data2->file_name?>' , 'ไฟล์' , 'tbl_news_data' , 'file_name')" class="btn btn-danger btn-sm" id="aFile2" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php// } ?>	
											
                                        <div class="fileupload fileupload-new" id="up_file" data-provides="fileupload" <?php //if(($dataID !='') && ($news_data2->file_name !='')){ ?>	style="display: none" <?php //} ?> >
                                            <button type="button" class="btn btn-custom btn-file" onClick="rrr3()">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="file_name2" name="file_name2" value="" multiple />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>                                           
                                        </div>-->
											
										<input type="file" id="file_en" name="file_en[]" multiple="multiple">
											
                                       	<small class="text-danger">(รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf และรองรับไฟล์รูปภาพนามสกุล jpg, gif, png ขนาดไฟล์ไม่ควรเกิน 2MB  สามารถเลือกไฟล์ครั้งละหลายไฟล์ได้ แต่ไม่ควรเกิน 5 ไฟล์ โดยคลิกปุ่ม Ctrl ค้างไว้และคลิกเลือกไฟล์ ระบบจะแสดงผลตามชื่อไฟล์ที่ตั้งไว้)</small>	
										   
										<?php if($dataID !=''){										   
										   
										   	  $language2 = 'en'; 
											  $fileEN = $this->news_model->list_newsFile($dataID,$language2);						   
			  								  foreach($fileEN->result() as $fileEN2){	
										?>
										<br>
										<label class="col-form-label"><a href="<?php echo base_url().'uploadfile/'.$fileEN2->file_name?>" target="_blank" ><!--<i class="fa fa-file-text-o"></i> --><?php echo $fileEN2->file_name?></a> <i class="mdi mdi-delete-forever" style="font-size: 20px; cursor: pointer;" title="ลบไฟล์" onClick="deleteFile('<?php echo $fileEN2->id?>' , '<?php echo $fileEN2->file_name?>')"></i></label>
										   
										<?php }  } ?>   
                                        </div>
                                    </div> 	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="first_pic">รูป Banner</label>
										<div class="col-md-9 col-sm-12">
											<div class="fileupload <?php  if(($dataID !='') && ($news_data2->first_pic !='')){ echo 'fileupload-exists'; } else { echo 'fileupload-new'; }?>" data-provides="fileupload">
											<?php if($dataID ==''){ ?>	
												
												<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
													<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
												</div>
												
												
												<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;"></div>
											<?php } ?>	
											
											<?php if($dataID !=''){ ?>	
												
												<div class="fileupload-new thumbnail" style="width: 225px; height: 150px;" id="upload_new">
												<?php //if($news_data2->first_pic ==''){ ?>	
													<img src="<?php echo base_url('assets/images/picture-not-available.jpg')?>" alt="image" />
												<?php //} ?>	
												</div>
												
												
												<div class="fileupload-preview fileupload-exists thumbnail" id="upload_preview" style="max-width: 225px; max-height: 150px; line-height: 20px;">
												<?php if($news_data2->first_pic !=''){ ?>	
													<!--<a href="javascript:void(0)"  target="_blank" >--><img src="<?php echo base_url().$news_data2->first_pic?>" alt="image" width="225" height="150" onClick="window.open('<?php echo base_url().$news_data2->first_pic?>','_blank'); location.reload();" /><!--</a>-->
												<?php } ?>	
												</div>
											<?php } ?>	
												
												
												
												
												<div>
													<button type="button" class="btn btn-custom btn-file">
														<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
														<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
														<input type="file" class="btn-light" id="first_pic" name="first_pic" value="" />
													</button>
													<?php  if(($dataID !='') && ($news_data2->first_pic !='')){ ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $news_data2->first_pic?>' , 'รูปภาพ' , 'tbl_news_data' , 'first_pic')" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													
													<?php } else { ?>
													<a href="javascript:void(0)" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
													<?php } ?>
													
												</div>
											</div>
											
											<input type="hidden" name="old_pic" id="old_pic" value="<?php if($dataID !=''){ echo $news_data2->first_pic;}?>" >										
											<small class="text-danger">(รองรับไฟล์รูปภาพนามสกุล jpg, gif, png  ขนาดไฟล์ไม่ควรเกิน 2MB ขนาดรูปภาพ (กว้างxสูง) 670 x 300 พิกเซล)</small>
										</div>	
                                    </div>                                     
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmNewsdata() " >เพิ่มข้อมูล</button>
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
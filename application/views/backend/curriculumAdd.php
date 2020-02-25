<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

<!--<link type="text/css" rel="stylesheet" href="../../../webpage/css/font-awesome.min.css">-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
          
<style>
	.icon-click {
		cursor: pointer;
		padding: 0 7px 0 7px;
	}
	
	.select-icon {
		font-size: 50px;
		padding: 0 10px 0 10px;
		color: #FC3A3D;
	}

</style>      
          
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">เพิ่มข้อมูลหลักสูตร</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
							$show = '';		
							$curriculumData = $this->curriculum_model->list_curriculumsData($show,$dataID);
			  				foreach($curriculumData->result() as $curriculumData2){	}	
				} ?>    
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1">
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="curriculum_nameTH">หัวข้อ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="curriculum_nameTH" name="curriculum_nameTH" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $curriculumData2->curriculum_nameTH;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="curriculum_nameEN">หัวข้อ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="curriculum_nameEN" name="curriculum_nameEN" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $curriculumData2->curriculum_nameEN;}?>" >
                                        </div>
                                    </div>	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="url">ลิงค์ URL</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="url" name="url" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $curriculumData2->url;}?>" >
                                            <small class="text-danger">(รูปแบบ URL คือ http://www.yourlink.com  หรือ https://www.yourlink.com)</small>
                                        </div>
                                    </div>		
									</form>			
									
									<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" id="frm2" name="frm2">
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="file_nameTH">ไฟล์ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                        <?php if(($dataID !='') && ($curriculumData2->file_nameTH !='')){ ?>	
											
											<a href="<?php echo base_url().$curriculumData2->file_nameTH?>" target="_blank" id="aFile01" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $curriculumData2->file_nameTH?>' , 'ไฟล์' , 'tbl_curriculum_files' , 'file_nameTH' , '1')" class="btn btn-danger btn-sm" id="aFile1" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php } ?>   
                                           
                                            <div class="fileupload fileupload-new" data-provides="fileupload" <?php if(($dataID !='') && ($curriculumData2->file_nameTH !='')){ ?>	style="display: none" <?php } ?> id="up_file1" >
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="file_nameTH" name="fileupload1" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
                                        <input type="hidden" name="old_file1" id="file_nameTH<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $curriculumData2->file_nameTH;}?>" >
                                        <small class="text-danger">(รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf ขนาดไฟล์ไม่ควรเกิน 2MB)</small>
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="file_nameEN">ไฟล์ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                        <?php if(($dataID !='') && ($curriculumData2->file_nameEN !='')){ ?>	
											
											<a href="<?php echo base_url().$curriculumData2->file_nameEN?>" target="_blank" id="aFile02" ><span><i class="fa fa-folder"></i> File</span></a>&nbsp;
											<a href="javascript:void(0)" onClick="removeFile('<?php echo $dataID?>' , '<?php echo $curriculumData2->file_nameEN?>' , 'ไฟล์' , 'tbl_curriculum_files' , 'file_nameEN' , '2')" class="btn btn-danger btn-sm" id="aFile2" ><i class="fa fa-trash"></i> Remove</a>
											
										<?php } ?>    
                                           
                                            <div class="fileupload fileupload-new" data-provides="fileupload" <?php if(($dataID !='') && ($curriculumData2->file_nameEN !='')){ ?>	style="display: none" <?php } ?> id="up_file2" >
                                            <button type="button" class="btn btn-custom btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-light" id="file_nameEN" name="fileupload2" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                        </div>
                                        
                                        <input type="hidden" name="old_file2" id="file_nameEN<?php echo $dataID?>" value="<?php if($dataID !=''){ echo $curriculumData2->file_nameEN;}?>" >
                                        <small class="text-danger">(รองรับไฟล์เอกสารนามสกุล docx, xlsx, pdf ขนาดไฟล์ไม่ควรเกิน 2MB)</small>
                                        </div>
                                        
                                        <input type="hidden" name="feildf1" id="feildf1" value="file_nameTH" >
										<input type="hidden" name="feildf2" id="feildf2" value="file_nameEN" >								
										<input type="hidden" name="table" id="table" value="tbl_curriculum_files" >
										<input type="hidden" name="num" id="num" value="2" >
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="url">สัญลักษณ์</label>
                                        <div class="col-md-9 col-sm-12" style="color: #343a40; font-size: x-large;">
                                           
                                            <i class="fab fa-readme icon-click"></i>
											<i class="fas fa-graduation-cap icon-click"></i>
											<i class="fas fa-file-alt icon-click"></i>
											<i class="fas fa-folder-open icon-click"></i>
											<i class="fas fa-inbox icon-click"></i>
											<i class="fas fa-list icon-click"></i>
											<i class="fas fa-list-alt icon-click"></i>
											<i class="fas fa-tasks icon-click"></i>
											<i class="fas fa-laptop icon-click"></i>
											<i class="fas fa-keyboard icon-click"></i>
											<i class="fas fa-comment-dots icon-click"></i>
											<i class="fas fa-map-marker-alt icon-click"></i>
											<i class="fas fa-cogs icon-click"></i>
											<i class="fas fa-award icon-click"></i>
											<i class="fas fa-chalkboard-teacher icon-click"></i>
											<i class="fas fa-search icon-click"></i>
											<i class="fas fa-layer-group icon-click"></i>
											<i class="fas fa-plus-circle icon-click"></i>
											<i class="fas fa-edit icon-click"></i>
											<i class="fas fa-check-double icon-click"></i>
											<i class="fas fa-check-square icon-click"></i>
											<i class="fas fa-star icon-click"></i>
											<i class="fas fa-heart icon-click"></i>
											<i class="fas fa-globe-americas icon-click"></i>
											<i class="fas fa-share-alt icon-click"></i>
											<i class="fas fa-thumbs-up icon-click"></i>
											<i class="fas fa-tv icon-click"></i>
											<i class="fas fa-info-circle icon-click"></i>
											<i class="fas fa-pencil-ruler icon-click"></i>
											<i class="fas fa-tablet-alt icon-click"></i>
											
                                        </div>
                                    </div>		
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmCurriculum()">เพิ่มข้อมูล</button>								
									    </div>
                                    <input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" >
                                    <input type="hidden" id="icon_class" name="icon_class" value="<?php if($dataID !=''){ echo $curriculumData2->icon_class;}?>" >
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
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
                           <h4 class="page-title">เพิ่มข้อมูลกลุ่มงานวิจัย</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
							$show = ''; $font_back = 'b';		
							$researchData = $this->researchCluster_model->list_researchClusters($show,$dataID,$font_back);
			  				foreach($researchData->result() as $researchData2){	}	
				} ?>   
                   
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1" >
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="name_th">ชื่อกลุ่มงานวิจัย : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="name_th" name="name_th" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->name_th;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="name_en">ชื่อกลุ่มงานวิจัย : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="name_en" name="name_en" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->name_en;}?>" >
                                        </div>
                                    </div> 		
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="contact_nameTH">ชื่อ-นามสกุล ผู้ติดต่อ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="contact_nameTH" name="contact_nameTH" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->contact_nameTH;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="contact_nameEN">ชื่อ-นามสกุล ผู้ติดต่อ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="contact_nameEN" name="contact_nameEN" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->contact_nameEN;}?>" >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="contact_tel">เบอร์โทรติดต่อ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="contact_tel" name="contact_tel" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->contact_tel;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="contact_mail">E-mail</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="contact_mail" name="contact_mail" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->contact_mail;}?>" >
                                        </div>
                                    </div>	
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="url_website">ลิงค์ URL</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="url_website" name="url_website" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $researchData2->url_website;}?>" >
                                            <small class="text-danger">(รูปแบบ URL คือ http://www.yourlink.com  หรือ https://www.yourlink.com)</small>
                                        </div>
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
											<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmResearch()">เพิ่มข้อมูล</button>								
										</div>
                                    <input type="hidden" id="dataID" name="dataID" value="<?php if($dataID !=''){ echo $dataID;}?>" >
                                    <input type="hidden" id="icon_class" name="icon_class" value="<?php if($dataID !=''){ echo $researchData2->icon_class;}?>" >
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
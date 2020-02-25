<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

<!-- Summernote css -->
        <link href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css" rel="stylesheet')?>"
          
        <link type="text/css" rel="stylesheet" href="../../../webpage/css/font-awesome.min.css">  
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">หัวข้อเพิ่มเติม</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php   if($dataID !=''){
							$show = '';		
							$topicData = $this->curriculum_model->list_topicData($show,$dataID);
			  				foreach($topicData->result() as $topicData2){	}	
				} ?>   
                   
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1" >
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_th">หัวข้อ : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_th" name="topic_th" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $topicData2->topic_th;}?>" >
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="topic_en">หัวข้อ : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" id="topic_en" name="topic_en" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $topicData2->topic_en;}?>" >
                                        </div>
                                    </div> 		
									
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_th">รายละเอียด : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <!--<textarea id="detail_th" name="detail_th" class="ex"><?php //if($dataID !=''){ echo $topicData2->detail_th;}?></textarea>-->
											<div class="summernote" id="detail_th" name="detail_th"><?php if($dataID !=''){ echo $topicData2->detail_th;}?></div>
                                        </div>
                                    </div> 	
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="detail_en">รายละเอียด : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <!--<textarea id="detail_en" name="detail_en" class="ex"><?php //if($dataID !=''){ echo $topicData2->detail_en;}?></textarea>-->
											<div class="summernote" id="detail_en" name="detail_en"><?php if($dataID !=''){ echo $topicData2->detail_en;}?></div>
                                        </div>
                                    </div>					
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmTopic()">เพิ่มข้อมูล</button>								
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
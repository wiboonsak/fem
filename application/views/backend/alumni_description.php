<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

<link href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css" rel="stylesheet')?>" />
           <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">เพิ่ม/แก้ไข คำอธิบายหน้าแรกสมาชิกศิษย์เก่า</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                <?php $description = $this->alumni_model->get_descriptionData();
			  		  $countRows = 	$description->num_rows();
			  
			  		  $desc_th = '';
			  		  $desc_en = '';
			  
					  if($countRows>0) {	
			  		    foreach($description->result() as $description2){	}	
						  
						  if($description2->desc_th !=''){ $desc_th = $description2->desc_th; } 
												  
						  if($description2->desc_en !=''){ $desc_en = $description2->desc_en; } 
					  }
				 ?>    
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1">
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="desc_th">คำอธิบาย : ภาษาไทย</label>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="summernote" id="desc_th" name="desc_th"><?php echo $desc_th; ?></div>
                                        </div>
                                    </div> 
										
									<div class="form-group row">
                                        <label class="col-md-3 col-sm-12 col-form-label" for="desc_en">คำอธิบาย : ภาษาอังกฤษ</label>
                                        <div class="col-md-9 col-sm-12">
                                            <div class="summernote" id="desc_en" name="desc_en"><?php echo $desc_en; ?></div>
                                        </div>
                                    </div>								
										
									<br><br>
                                    <div class="form-group row">
										<div class="col-12" style="text-align: center">
											<button type="button" class="btn btn-primary btn-sm" id="btnAdd" onClick="add_description()">เพิ่มข้อมูล</button>					
									    </div>                                    
                                    </div>	
									<input type="hidden" id="check" name="check" value="<?php echo $countRows;?>" >	
										
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
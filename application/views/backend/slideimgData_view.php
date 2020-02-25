<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />
		<link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />

           <div class="wrapper">
            <div class="container-fluid">			 	

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลภาพสไลด์
							<div class="pull-right">                            	
                             	<!--<button type="button" class="btn btn-primary btn-sm" onClick="window.location.href='<?php //echo base_url('news/Newsdata')?>'"><i class="icon-action-undo"></i> กลับ</button>-->
                            </div>
						   </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                             <div class="row">
                                <div class="col-12">
                                    <div class="p-20">
										<!--<div class="form-group row">
											<label class="col-1 col-form-label"><i class="icon-briefcase menu_name"></i> </label>
											<div class="col-3">
												<img src="<?php //echo base_url('assets/images/picture-not-available.jpg')?>" width="225" height="150" />
											</div>
											<label class="col-2 col-form-label">วันที่เพิ่มข้อมูล</label>	
											<label class="col-2 col-form-label">กำหนดแสดงหน้าเว็บ</label>	
											<label class="col-2 col-form-label">แก้ไข</label>	
											<label class="col-2 col-form-label">ลบ</label>	
                                   		</div> 
										<div class="form-group row">
											<label class="col-1 col-form-label"><i class="icon-briefcase menu_name"></i> </label>
											<div class="col-3">
												<img src="<?php //echo base_url('assets/images/picture-not-available.jpg')?>" />
											</div>
											<label class="col-2 col-form-label">วันที่เพิ่มข้อมูล</label>	
											<label class="col-2 col-form-label">กำหนดแสดงหน้าเว็บ</label>	
											<label class="col-2 col-form-label">แก้ไข</label>	
											<label class="col-2 col-form-label">ลบ</label>	
                                   		</div>--> 
                                    	<div class="card-box table-responsive">	
										<table class="table">
											<thead class="thead-light">
											<tr>
												<th>ภาพ</th>
												<th>วันที่เริ่มต้น - วันที่สิ้นสุด</th>
												<th>วันที่เพิ่มข้อมูล</th>
												<th style="text-align: center">กำหนดแสดงหน้าเว็บ</th>
												<th width="5" style="text-align: center">แก้ไข</th>
												<th width="5" style="text-align: center">ลบ</th>
											</tr>
											</thead>
											<tbody>
											<?php foreach($slideIMGData->result() as $slideIMGData2){
												
												if($slideIMGData2->image_name ==''){
													$slideIMGData2->image_name = 'assets/images/picture-not-available.jpg';
												}	
	
												$date_start = ''; 
												$date_end = ''; 
												$dateAdd = ''; 
									 
												  if($slideIMGData2->date_start != '0000-00-00'){ 
														$date_start = $this->events_model->DateThai($slideIMGData2->date_start);
												  }

												  if($slideIMGData2->date_end != '0000-00-00'){ 
														$date_end = $this->events_model->DateThai($slideIMGData2->date_end);
												  }
											?>	
											<tr>
												<td><img src="<?php echo base_url($slideIMGData2->image_name)?>" width="225" height="150" /></td>
												<td><?php echo $date_start." - ".$date_end;?></td>			
												<td><?php echo $this->events_model->DateThai($slideIMGData2->date_add); ?></td>
												<td align="center"><label>
			   										<input id="ch<?php echo $slideIMGData2->id?>" type="checkbox" class="js-switch js-check-change" onClick="setShow_onWeb('<?php echo $slideIMGData2->id?>' , this.value , 'tbl_slide_data')" value="<?php echo $slideIMGData2->show_onWeb?>"  <?php if($slideIMGData2->show_onWeb == '1'){  echo 'checked'; } ?> data-plugin="switchery" data-color="#007bff" data-size="small" /></label>
			   									</td>
												<td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href ='<?php echo base_url('control/addSlideIMG/').$slideIMGData2->id?>'" >แก้ไข</button></td>
												<td><button type="button" class="btn btn-danger btn-sm" onClick="delete_data('<?php echo $slideIMGData2->id?>' , 'tbl_slide_data' , '0')">ลบ</button></td>
											</tr>
											<?php } ?>	
											</tbody>
										</table>
										</div>	
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
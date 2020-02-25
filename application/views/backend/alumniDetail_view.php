<!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

		<style>
			.widthLabel { width: auto;}			
			
		</style>

           <div class="wrapper">
            <div class="container-fluid">			

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">ข้อมูลศิษย์เก่า (Alumni) 
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
									<form class="form-horizontal" role="form" enctype="multipart/form-data" id="frm1" name="frm1" >
									<?php if($dataID !=''){
			  							  $alumni=$this->alumni_model->get_alumniDetail($dataID);	
			  							  foreach($alumni->result() as $alumni2){} 
									  }
									?>	
										
                                    	<ul class="nav nav-tabs">
											<li class="nav-item">
												<a href="#tab1" data-toggle="tab" aria-expanded="true" class="nav-link active">
												   <i class="fi-monitor mr-2"></i> ข้อมูลทั่วไป
												</a>
											</li>
											<li class="nav-item">
												<a href="#tab2" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-head mr-2"></i> ที่อยู่ปัจจุบันที่ติดต่อได้
												</a>
											</li>
											<li class="nav-item">
												<a href="#tab3" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-mail mr-2"></i> สถานที่ทํางานปัจจุบัน
												</a>
											</li>
											<li class="nav-item">
												<a href="#tab4" data-toggle="tab" aria-expanded="false" class="nav-link">
													<i class="fi-cog mr-2"></i> ข้อมูลการศึกษา
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane show active" id="tab1">
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="name">ชื่อ - สกุล</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="name" name="name" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->name;}?>" >
													</div>
												</div> 										
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="old_name">ชื่อ - สกุลเดิม (ถ้ามี)</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="old_name" name="old_name" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->old_name;}?>" >
													</div>
												</div> 	
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="ID_card">รหัสบัตรประชาชน</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="ID_card" name="ID_card" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->ID_card;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="email">E-mail</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="email" name="email" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->email;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="telephone">เบอร์โทร</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="telephone" name="telephone" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->telephone;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="facebook">Facebook - ชื่อเฟสบุ๊ค</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="facebook" name="facebook" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->facebook;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="ID_line">ID Line</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="ID_line" name="ID_line" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->ID_line;}?>" >
													</div>
												</div>
											</div>
											
											<div class="tab-pane" id="tab2">
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="house_number">เลขที่</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="house_number" name="house_number" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->house_number;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="village_no">หมู่ที่</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="village_no" name="village_no" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->village_no;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="alley">ซอย</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="alley" name="alley" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->alley;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="road">ถนน</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="road" name="road" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->road;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="district">ตำบล</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="district" name="district" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->district;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="prefecture">อำเภอ</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="prefecture" name="prefecture" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->prefecture;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="province">จังหวัด</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="province" name="province" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->province;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="postcode">รหัสไปรษณีย์</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="postcode" name="postcode" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->postcode;}?>" >
													</div>		
												</div>
												
											</div>
											
											<div class="tab-pane" id="tab3">	
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_name">ชื่อหน่วยงาน</label>
													<div class="col-md-10 col-sm-12">
														<input type="text" id="institution_name" name="institution_name" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_name;}?>" >
													</div>
												</div> 				
												<!--<div class="form-group row">
													<label class="col-md-2 col-sm-5 col-form-label w1" for="topic_th">ที่อยู่หน่วยงาน</label>
													<label class="col-md-4 col-sm-7 col-form-label w2" for="topic_th"><?php //echo $alumni2->institution_number?></label>
													<label class="col-md-2 col-sm-5 col-form-label w1" for="topic_th">ถนน</label>
													<label class="col-md-4 col-sm-7 col-form-label w2" for="topic_th"><?php //echo $alumni2->name?></label>
												</div>-->
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_number">เลขที่</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_number" name="institution_number" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_number;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="institutionVillage_no">หมู่ที่</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institutionVillage_no" name="institutionVillage_no" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institutionVillage_no;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_alley">ซอย</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_alley" name="institution_alley" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_alley;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_road">ถนน</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_road" name="institution_road" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_road;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_district">ตำบล</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_district" name="institution_district" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_district;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_prefecture">อำเภอ</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_prefecture" name="institution_prefecture" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_prefecture;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_province">จังหวัด</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_province" name="institution_province" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_province;}?>" >
													</div>
													
													<label class="col-md-2 col-sm-12 col-form-label" for="institution_postcode">รหัสไปรษณีย์</label>
													<div class="col-md-4 col-sm-12">
														<input type="text" id="institution_postcode" name="institution_postcode" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->institution_postcode;}?>" >
													</div>		
												</div>
												
												<div class="form-group row">
													<label class="col-md-2 col-sm-12 col-form-label" for="position">ตำแหน่งงานปัจจุบัน</label>
													<div class="col-md-10 col-sm-12">
														<input type="text" id="position" name="position" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->position;}?>" >
													</div>
												</div>												
											</div>
											
											<div class="tab-pane" id="tab4" >
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="Thesis_titleTH">ชื่อวิทยานิพนธ์ (ไทย)</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="Thesis_titleTH" name="Thesis_titleTH" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->Thesis_titleTH;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="Thesis_titleEN">ชื่อวิทยานิพนธ์ (อังกฤษ)</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="Thesis_titleEN" name="Thesis_titleEN" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->Thesis_titleEN;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="adviser">อาจารย์ที่ปรึกษา</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="adviser" name="adviser" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->adviser;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="studentID_number">รหัสประจำตัวนักศึกษา</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="studentID_number" name="studentID_number" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->studentID_number;}?>" >
													</div>
												</div>
												
												<div class="form-group row">
													<label class="col-md-3 col-sm-12 col-form-label" for="graduation_certificate">วุฒิที่สำเร็จการศึกษา</label>
													<div class="col-md-9 col-sm-12">
														<input type="text" id="graduation_certificate" name="graduation_certificate" class="form-control form-control-sm" value="<?php if($dataID !=''){ echo $alumni2->graduation_certificate;}?>" >
													</div>
												</div>
											
											</div>
										</div>	
										<br><br>
										<div class="form-group row">
											<div class="col-12" style="text-align: center">
												<button type="button"  class="btn btn-primary btn-sm" id="btnAdd" onClick="check_frmAlumni()">เพิ่มข้อมูล</button>
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
	
	<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">รายงานงบประมาณ</h2>
		<div class="row">
			<div class="" style="margin: 0 auto; width: 70% ">
				<div class="panel panel-gradient" data-collapsed="0">
					<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							รายละเอียดคำขอ
						</div>
					</div>
					<div class="panel-body">
						<form role="form" class="form-horizontal form-groups-bordered" >
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >ระหว่างวันที่</label>
								<div class="col-sm-1" style="padding-left: 0px;padding-right: 0px;">
                                                                    <select  id="daystart" name="daystart" style="font-size: 14px;margin-left: 15px" >
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                       <span id='daystart_error'></span>
                                                                </div>
                                                                <div class="col-sm-2" style="width: 130px">
                                                       <select   id="monthstart" name="monthstart" style="font-size: 14px">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>" ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                       <span id='monthstart_error'></span>
                                                                </div>
                                                                <div class="col-sm-1" >
                                                       <select   id="yearstart" name="yearstart" >
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543;
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
							 <span id='yearstart_error'></span>		
								</div>
								<label for="field-1" class="col-sm-1 text-center"  >-</label>
								
                                                                <div class="col-sm-1" >
									<select  id="dayend" name="dayend" style="font-size: 14px">
                               <option value="">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>" ><?php echo $a?></option>	
							<?php }	?>
							</select>
                                                                    <span id='dayend_error'></span>
                                                                </div>
                                                                <div class="col-sm-2" style="width: 130px">
                                                                    <select  id="monthend" name="monthend" style="font-size: 14px">
                               <option value="">เดือน</option>
							<?php for($x=1; $x<=12; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; } 
                                                                        if($x==1){
                                                                            $month = 'มกราคม';
                                                                        }else if($x==2){
                                                                            $month = 'กุมภาพันธ์';
                                                                        }else if($x==3){
                                                                            $month = 'มีนาคม';
                                                                        }else if($x==4){
                                                                            $month = 'เมษายน';
                                                                        }else if($x==5){
                                                                            $month = 'พฤษภาคม';
                                                                        }else if($x==6){
                                                                            $month = 'มิถุนายน';
                                                                        }else if($x==7){
                                                                            $month = 'กรกฎาคม';
                                                                        }else if($x==8){
                                                                            $month = 'สิงหาคม';
                                                                        }else if($x==9){
                                                                            $month = 'กันยายน';
                                                                        }else if($x==10){
                                                                            $month = 'ตุลาคม';
                                                                        }else if($x==11){
                                                                            $month = 'พฤศจิกายน';
                                                                        }else if($x==12){
                                                                            $month = 'ธันวาคม';
                                                                        }
							?>								
								<option value="<?php echo $txt.$x?>"  ><?php echo $month?> </option>
	
							<?php }	?>
							</select>
                                                                    <span id='monthend_error'></span>
                                                                </div>
                                                                <div class="col-sm-1" >
                                                                    <select  id="yearend" name="yearend" style="font-size: 14px">
                               <option value="">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543;
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
								<span id='yearend_error'></span>	
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เลขที่คำขอ</label>
								
								<div class="col-sm-3">
									<select class="form-control" id="id_saraban" style="font-size: 16px">
										<option value=""  >เลือก</option>;	
							
										<?php foreach ($getdata as $getdata1): 
											if($getdata1['saraban_number'] != null){
										?>
										<option value = "<?php echo $getdata1['saraban_number']; ?>"><?php echo $this->Saraban_model->explode_sarabanNumber($getdata1['saraban_number'],'1'); ?></option>;			
										<?php 
										}
										endforeach; 
										?>
										</select>
									
								</div>
							
								<label for="field-1" class="col-sm-2 control-label"  >เรื่อง</label>
								
								<div class="col-sm-3">
									<select class="form-control" id="topic" style="font-size: 16px">
										<option value="0" >เลือก</option>;	
									
										
										<option value = "1">ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย</option>;			
										<option value = "2">ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ</option>;			
										
										
										</select>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >ชื่อ - นามสกุล </label>
								
								<div class="col-sm-5">
									<select class="form-control" id="user_create" style="font-size: 16px">
										<option value=""  >เลือก</option>;	
							
									
										<?php
										$firstname = "";
										 foreach ($userdata as $getdata4): 
										if ($getdata4['firstname'] != $firstname ) {
													$firstname = $getdata4['titlename'].''.$getdata4['firstname'].' '.$getdata4['lastname'];
											?>			
												<option value = "<?php echo $getdata4['id']; ?>"><?php echo $getdata4['titlename'].''.$getdata4['firstname'].' '.$getdata4['lastname']; ?></option>;	
										<?php 
											}
										endforeach; 
										?>
										</select>
									
								</div>
							</div>
							
					
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-9">	
									<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<button type="button" class="btn btn-red btn-icon" onclick="dosearch()">ค้นหา<i class="entypo-search"></i> </button> 
								 		<button type="button" class="btn btn-orange btn-icon" onclick="doreset()">รีเซ็ต<i class="entypo-arrows-ccw"></i> </button> 
								 		
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div id="showdata">
		
		</div>


	<!-- Footer -->
	<footer class="main">

		© 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>




</div><span role="status" aria-live="polite" class="select2-hidden-accessible"></span></body></html>
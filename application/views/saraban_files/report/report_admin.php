	
	<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">รายงานเลขสารบรรณ</h2>
		<div class="row">
			<div class="" style="margin: 0 auto; width: 70% ">
				<div class="panel panel-gradient" data-collapsed="0">
					<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							รายละเอียดเลขสารบรรณ
						</div>
					</div>
					<div class="panel-body">
						<form role="form" class="form-horizontal form-groups-bordered" >
						
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >ระหว่างวันที่ออกเลข</label>
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
						$yearthai = $y+543
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
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>"><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>
								<span id='yearend_error'></span>	
								</div>
							</div>
<!--							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >วัน</label>
								
								<div class="col-sm-2">
									<select  id="dd" style="font-size: 14px">
										<option value="0"  >เลือก</option>	
									
										<?php
										 //for($i=1;$i<=31;$i++){
										 	//if($i<10){
										?>
											<option value = "<?php //echo '0'.$i; ?>"><?php //echo '0'.$i; ?></option>;			
										<?php 
											 	//}else{
										?>
											<option value = "<?php //echo $i; ?>"><?php //echo $i; ?></option>;			
										<?php 
												//}
										//} 
										?>
										</select>
								</div>
								<label for="field-1" class="col-sm-1 control-label"  >เดือน</label>
								
								<div class="col-sm-1">
									<select  id="mm" style="font-size: 14px">
										<option value="0" >เลือก</option>	
									
										<?php
										 //for($i=1;$i<=12;$i++){
										 	//if($i<10){
										?>
											<option value = "<?php //echo '0'.$i; ?>"><?php //echo '0'.$i; ?></option>;			
										<?php 
											 	//}else{
										?>
											<option value = "<?php //echo $i; ?>"><?php //echo $i; ?></option>;			
										<?php 
												//}
										//} 
										?>
										</select>
								</div>
								<label for="field-1" class="col-sm-1 control-label"  >ปี</label>
								
								<div class="col-sm-2">
									<select  id="yy" style="font-size: 16px">
										<option value="0"  >เลือก</option>;	
									
										<?php
										//$date = "";
										// foreach ($getdata as $getdata3): 
											//if($getdata3['date_add'] != null){

												//$newDate = date("Y", strtotime($getdata3['date_add']));

												//if ($newDate != $date ) {
												//	$date = $newDate;
											?>			
												<option value = "<?php //echo $newDate; ?>"><?php //echo $newDate; ?></option>;	
									
												
										<?php 
											//}
										//}
										//endforeach; 
										?>
										</select>
								</div>
							</div>-->
							<div class="form-group">
								<label class="col-sm-3 control-label" >ประเภท</label>
								<div class="col-sm-4 radio radio-replace recheck" style="padding-left: 15px;">
                                    <input type="radio" name="in_out2[]" value="1" onClick="set_inOut(this.checked , this.value)" >
                                    <label>หนังสือภายใน</label>
                                </div>
								
								<div class="col-sm-5 radio radio-replace recheck" style="padding-left: 15px;">
                                    <input type="radio" name="in_out2[]" value="2" onClick="set_inOut(this.checked , this.value)" >
                                    <label>หนังสือภายนอก</label>
                                </div>	
								<input type="hidden" id="in_out" name="in_out" >								
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">เลขที่คำขอ</label>
								
								<div class="col-sm-3">
									<select class="form-control" id="id_saraban" style="font-size: 16px">
										<option value="0"  >เลือก</option>;	
							
										<?php foreach ($idsarabandata as $idsarabandata2): 
											if($idsarabandata2['id_saraban'] != null){
										?>
										<option value = "<?php echo $idsarabandata2['id_saraban']; ?>"><?php echo $idsarabandata2['id_saraban']; ?></option>;			
										<?php 
										}
										endforeach; 
										?>
										</select>									
								</div>
							
								<label for="field-1" class="col-sm-2 control-label">เรื่อง</label>
								
								<div class="col-sm-3">
									<select class="form-control" id="topic" style="font-size: 16px">
										<option value="0" >เลือก</option>;	
									
										<?php foreach ($getdata as $getdata2): 
											if($getdata2['topic'] != null){
										?>
										<option value = "<?php echo htmlentities($getdata2['topic'], ENT_QUOTES);?>"><?php echo htmlentities($getdata2['topic'], ENT_QUOTES);?></option>;			
										<?php 
										}
										endforeach; 
										?>
										</select>
								</div>

							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >ชื่อผู้ขอเลข</label>
								
								<div class="col-sm-3">
									<select class="form-control" id="firstname" style="font-size: 16px">
										<option value="0"  >เลือก</option>;	
							
									
										<?php
										$firstname = "";
										 foreach ($getdata as $getdata4): 
										if ($getdata4['firstname'] != $firstname ) {
													$firstname = $getdata4['firstname'];
											?>			
												<option value = "<?php echo $getdata4['firstname']; ?>"><?php echo $getdata4['firstname']; ?></option>;	
										<?php 
											}
										endforeach; 
										?>
										</select>
									
								</div>
								<label for="field-1" class="col-sm-2 control-label"  >นามสกุล</label>
								
								<div class="col-sm-3">
									<select class="form-control" id="lastname" style="font-size: 16px">
										<option value="0"  >เลือก</option>;	
							
									
										<?php
										$lastname = "";
										 foreach ($getdata as $getdata5): 
										if ($getdata5['lastname'] != $lastname ) {
													$lastname = $getdata5['lastname'];
											?>			
												<option value = "<?php echo $getdata5['lastname']; ?>"><?php echo $getdata5['lastname']; ?></option>;	
										<?php 
											}
										endforeach; 
										?>
										</select>
									
								</div>
							</div>
							
					
							<div class="form-group">
<!--								<label class="col-sm-3 control-label">&nbsp;</label>-->
                                                                <div class="col-sm-12" style="text-align: center">	
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
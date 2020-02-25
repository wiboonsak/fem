
	<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">รายละเอียดคำขอเบิกค่าเดินทาง</h2>
		<br />
		<br />
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 70%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							รายละเอียดคำขอเบิกค่าเดินทาง
						</div>
						
					</div>
					
					<div class="panel-body">
								
						<form role="form" class="form-horizontal form-groups-bordered" >
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เลขที่หนังสือขออนุมัติเดินทาง</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-0" >
									<span id='field-0_error'></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เรื่อง</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-1" onkeyup="	$('#field-1_error').html('').css('color', 'red');">
									<span id='field-1_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >วันที่</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="date" class="form-control" id="field-4" onchange="	$('#field-4_error').html('').css('color', 'red');">
									<span id='field-4_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เรียน</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-3" value="คณบดีคณะการจัดการสิ่งแวดล้อม" onkeyup="	$('#field-3_error').html('').css('color', 'red');" >
									<span id='field-3_error'></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รายละเอียด<br>(ย่อหน้าที่ 1)</label>
								
								<div class="col-sm-9">
									<!--<div class="form-group">-->
										<textarea class="form-control" style="margin: 0px; width: 100%; height: 200px; font-size: 16px" name="detail_1" id="detail_1" onkeyup="	$('#detail_1_error').html('').css('color', 'red');">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ข้าพเจ้า………………………..................................................................ตำแหน่ง…………......................
พร้อมด้วย.........................................................................................................................................................
มีความประสงค์ขออนุญาตไปราชการเพื่อ    เข้าประชุม   อบรม   สัมมนา   อื่น ๆ.............................
เรื่อง..............................................................................................................................................................................
ตั้งแต่วันที่..........เดือน.................พ.ศ......... ถึงวันที่..........เดือน.....................พ.ศ............. รวม............วัน 
 ณ..............................................................................................................................................................................................................................................................................................................................................................................
ตามหนังสือที่……………………………………...…………………..ลงวันที่……………………………………………………………………….....</textarea>
										<span id='detail_1_error'></span>
									<!--</div>-->
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รายละเอียด<br>(ย่อหน้าที่ 2)</label>
								
								<div class="col-sm-9">									
										<textarea  class="form-control" style="margin: 0px; width: 100%; height: 200px; font-size: 16px" name="detail_2" id="detail_2" onkeyup="	$('#detail_2_error').html('').css('color', 'red');">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ในการนี้  ข้าพเจ้าจึงขออนุมัติเบิกค่าเดินไปปฏิบัติงานดังกล่าว .............................................................
..........................................................................................................................................................................................</textarea>
										<span id='detail_2_error'></span>
																				
								</div>
							</div>	
								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">คำลงท้าย</label>
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-5" value="จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติด้วย จักขอบคุณยิ่ง" onkeyup="	$('#field-5_error').html('').css('color', 'red');">
									<span id='field-5_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">เหตุผลการขออนุมัติ</label>
								
								<div class="col-sm-5">
									<div class="radio radio-replace">
										<input type="radio" id="rd-1" name="radio1" value="1" onchange ="	$('#radio1_error').html('').css('color', 'red');" >
										<label>กรณีขอไปเอง</label>
									</div>
									
									<div class="radio radio-replace">
										<input type="radio" id="rd-2" name="radio1" value="0" onchange="	$('#radio1_error').html('').css('color', 'red');">
										<label>กรณีได้รับมอบหมาย</label>
									</div>
									<span id='radio1_error'></span>								
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								
								<div class="col-sm-5">
									<div class="radio radio-replace">
										<input type="radio" id="rd-3" name="radio2"  value="1" onclick="Expenses()" onchange="	$('#radio2_error').html('').css('color', 'red');">
										<label>เบิกค่าใช้จ่าย</label>
									</div>
									
									<div class="radio radio-replace">
										<input type="radio" id="rd-4" name="radio2"  value="2" " onclick="notExpenses()" onchange="	$('#radio2_error').html('').css('color', 'red');">
										<label>ไม่เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-5" name="radio2"  value="3" onclick="notExpenses2()" onchange="	$('#radio2_error').html('').css('color', 'red');">
										<label>อื่นๆ</label>
										<input type="text" id="field-6" class="form-control" name="field-6" onkeyup ="	$('#field-6_error').html('').css('color', 'red');" >
										<span id='field-6_error'></span>
									</div>
									<span id='radio2_error'></span>	

								</div>
							</div>
							<div class="form-group" id="Expensesform"  >
								<label class="col-sm-3 control-label">ค่าใช้จ่าย</label>
								
								<div class="col-sm-9">
									<div class="row">
										<label for="field-1" class="col-sm-3"> 1. ค่าเบี้ยเลี้ยง</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date1" >
											<span id='Expenses_date1_error'></span>
										</div>
										<label for="field-1" class="col-sm-2 control-label">วัน&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses1" onchange="total()">
											<span id='Expenses1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 2. ค่าที่พัก</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date2">
											<span id='Expenses_date2_error'></span>
											
										</div>
										<label for="field-1" class="col-sm-2 control-label">วัน&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses2" onchange="total()">
											<span id='Expenses2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 3. ค่าพาหนะ</label>
										<div class="col-sm-2">	
											<input  style="font-size: 16px" type="number" class="form-control hidden" id="Expenses_date3" value=0>
											<span id='Expenses_date3_error'></span>
										</div>
										<label  for="field-1" class="col-sm-2 control-label">&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses3" onchange="total()">
											<span id='Expenses3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">	
										<label for="field-2" class="col-sm-1 ">4.อื่นๆ</label>
										<div class="col-sm-4">	
											<input style="font-size: 16px" type="text" class="form-control" id="remark_Expenses4" placeholder="............">
											<span id='remark_Expenses4_error' ></span>
										</div>
										<label for="field-1" class="col-sm-2 control-label"></label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses4" onchange="total()">
											<span id='Expenses4_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-7 control-label">รวม</label>
										<div class="col-sm-2">
										<input style="font-size: 16px" readonly type="number" class="form-control" id="field-2" onclick="total()">
										<span id='field-2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
									</div>
							</div>
						</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์</label>
								
								<div class="col-sm-9 ">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary " type="file" name="file[]" id = file1   multiple  onchange="chkconfig('1')" />
										<input type="hidden" id = "encrypt1"/>
										 <button type="button" class="btn btn-blue hidden" id="remove1" onclick ="do_remove('1')">remove</button>
								        <button type="button" class="btn btn-blue hidden" id="view1"  onclick ="newTabImage('1')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete1"  onclick ="do_delete('1')">delete</button>
								        <button type="button" class="btn btn-blue hidden " id="upload1">Upload</button>
										 <span id="namefile1" class="file-input-name"></span>
										<br><br>
									</div>
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file2   multiple onchange="chkconfig('2')" />
										<input type="hidden" id = "encrypt2"/>
										  <button type="button"  class="btn btn-blue hidden" id="remove2" onclick ="do_remove('2')">remove</button>
								         <button type="button"  class="btn btn-blue hidden" id="view2"   onclick ="newTabImage('2')">view</button>
								        <button type="button"  class="btn btn-blue hidden" id="delete2"  onclick ="do_delete('2')">delete</button>
								        <button type="button"   class="btn btn-blue hidden" id="upload2">Upload</button>
										 <span id="namefile2" class="file-input-name"></span>
										<br><br>
									</div>
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file3   multiple onchange="chkconfig('3')" />
										<input type="hidden" id = "encrypt3"/>
										  <button type="button"  class="btn btn-blue hidden" id="remove3" onclick ="do_remove('3')">remove</button>
								         <button type="button"  class="btn btn-blue hidden" id="view3"   onclick ="newTabImage('3')">view</button>
								        <button type="button"  class="btn btn-blue hidden" id="delete3"  onclick ="do_delete('3')">delete</button>
								        <button type="button"   class="btn btn-blue hidden" id="upload3">Upload</button>
										 <span id="namefile3" class="file-input-name"></span>
										<br><br>
									</div>
									<div class="row">	
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file4   multiple onchange="chkconfig('4')" />
										<input type="hidden" id = "encrypt4"/>
								         <button type="button"  class="btn btn-blue hidden" id="remove4" onclick ="do_remove('4')">remove</button>
								         <button type="button"  class="btn btn-blue hidden" id="view4"   onclick ="newTabImage('4')">view</button>
								        <button type="button"  class="btn btn-blue hidden" id="delete4"  onclick ="do_delete('4')">delete</button>
								        <button type="button"   class="btn btn-blue hidden" id="upload4">Upload</button>
										 <span id="namefile4" class="file-input-name"></span>
										<br><br>
									</div>
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file5   multiple onchange="chkconfig('5')" />
										<input type="hidden" id = "encrypt5"/>
										 <button type="button"  class="btn btn-blue hidden" id="remove5" onclick ="do_remove('5')">remove</button>
								         <button type="button"  class="btn btn-blue hidden" id="view5"   onclick ="newTabImage('5')">view</button>
								        <button type="button"  class="btn btn-blue hidden" id="delete5"  onclick ="do_delete('5')">delete</button>
								        <button type="button"   class="btn btn-blue hidden" id="upload5">Upload</button>
										 <span id="namefile5" class="file-input-name"></span>
										  <br><br>
									</div> 
									<div class="row">
									 	<!--<button type="button" class="btn btn-blue" id="upload" >All Upload</button>-->
									 	 <span id="alertupload5" style="color: red">กรุณาอัพโหลดไฟล์ก่อนบันทึกทุกครั้ง  <b><u>มิเช่นนั้นไฟล์จะไม่ถูกแนบไปกับคำขอ</u><b></span>
									 </div>


							</div>
						</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-9">	
									<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<!--<button type="button" class="btn btn-red btn-icon" onclick="dusubmit_save()">บันทึก<i class="entypo-check"></i> </button>--> 
								 		<button type="button" class="btn btn-orange btn-icon" onclick="Preview()">บันทึก<i class="entypo-search"></i> </button> 
								 		<button type="button" class="btn btn-success btn-icon" onclick="dusubmit_saveANDsend()">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i> </button>
								 		<button type="button" class="btn btn-red btn-icon" onclick="doclose()">ปิด<i class="entypo-cancel"></i> </button> 
										
									</p>
								</div>
							</div>
							
							
						
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>



	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>

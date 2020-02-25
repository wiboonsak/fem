<!-- bUUUUUUUUUUUUUUUUUUUUUUUUUU -->

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">ที่ทำการ</label>
								<input class="form-control" name="1" id="1_where" data-validate="required" placeholder="สัญญายืมเงินเลขที่" />
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="birthdate">วันที่</label>
								<input class="form-control" name="2" id="1_dateinput" data-validate="required" type="date" placeholder="วันที่" value="<?php echo date('Y-m-d'); ?>"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">เรื่อง</label>
								<input class="form-control" name="3" readonly id="1_title" value="ขออนุมัติเบิกค่าใช้จ่ายในการเดินทางไปราชการ" placeholder="สัญญายืมเงินเลขที่" />
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">เรียน</label>
								<input class="form-control" name="4" id="1_to" data-validate="required" placeholder="เรียน" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">ตามคำสั่งบันทึกที่</label>
								<input class="form-control" name="5" readonly id="1_title" value="เลขสารบรรณ" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ลงเมื่อวันที่</label>
								<input class="form-control" name="6" id="1_dateinput" data-validate="required" value="<?php echo date('Y-m-d'); ?>" type="date" placeholder="ลงเมื่อวันที่" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ข้าพเจ้า</label>
								<input class="form-control" name="7" id="1_name" data-validate="required" placeholder="ชื่อ นามสกุล" />
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ตำแหน่ง</label>
								<input class="form-control" name="8" id="1_position" data-validate="required" placeholder="ตำแหน่ง" />
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">สังกัด</label>
								<input class="form-control" name="9" id="1_major" data-validate="required" placeholder="สังกัด" />
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">พร้อมด้วย</label>
								<input class="form-control" name="10" id="1_with" data-validate="required" placeholder="ผู้ติดตาม/คณะผู้ติดตาม" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">เดินทางไปปฏิบัติราชการ</label>
								<input class="form-control" name="11" id="1_goto" data-validate="required" placeholder="รายละเอียด" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">โดยออกเดินทางจาก</label>
								<select id="1_start" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="1">บ้านพัก</option>
										<option value="2">สำนักงาน</option>
										<option value="3">ประเทศไทย</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ตั้งแต่วันที่</label>
								<input class="form-control" name="12" id="1_datestart" data-validate="required" data-mask="datetime" placeholder="ตั้งแต่วันที่" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">กลับถึง</label>
								<select id="1_end" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="1">บ้านพัก</option>
										<option value="2">สำนักงาน</option>
										<option value="3">ประเทศไทย</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ในวันที่</label>
								<input class="form-control" name="13" id="1_dateend" data-validate="required" data-mask="datetime" placeholder="ถึงในวันที่" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเวลาไปราชการครั้งนี้</label>
								<input  value="-" name="14" class="form-control" id="1_sumdate" data-validate="required" placeholder="รวมเวลา" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="birthdate">ข้าพเจ้าขอเบิกสำหรับ</label>
								<select id="1_allowfor" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="1">ข้าพเจ้า</option>
										<option value="2">คณะเดินทาง</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเบี้ยเลี้ยงเดินทางประเภท</label>
								<input class="form-control" name="15" id="1_travel" data-validate="required" placeholder="ระบุ" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนวัน</label>
								<input class="form-control" name="16" id="1_travelday" data-validate="required" placeholder="จำนวนวัน" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="17" id="1_travelprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเช่าที่พักประเภท</label>
								<input class="form-control" name="18" id="1_resident" data-validate="required" placeholder="ระบุ" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนวัน</label>
								<input class="form-control" name="19" id="1_residentday" data-validate="required" placeholder="จำนวนวัน" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="20" id="1_residentprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าพาหนะ</label>
								<input class="form-control" name="21" id="1_vehical" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="22" id="1_vehicalprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าใช้จ่ายอื่นๆ</label>
								<input class="form-control" name="23" id="1_other" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="24" id="1_otherprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงินทั้งสิ้น</label>
								<input readonly class="form-control" value="-" name="25" id="1_otherprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="checkbox checkbox-replace">
							<input type="checkbox" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
							<label for="chk-rules">ข้าพเจ้าขอรับรองว่ารายการที่กล่าวมาข้างต้นเป็นความจริง และหลักฐานการจ่ายที่ส่งมาด้วย รวมทั้งจำนวนเงินที่ขอเบิกถูกต้องตามกฎหมายทุกประการ</label>
						</div>
					</div>




					<!--55555555555555555555555555555-->
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="full_name">หลักฐานค่าใช้จ่ายประกอบใบเบิกค่าใช้จ่ายในการเดินทางของ</label>
								<input class="form-control" name="26" id="2_name" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ลงวันที่</label>
								<input class="form-control" name="27" id="2_date" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="ลงเมื่อวันที่" />
							</div>
						</div>
					</div>

					<div class="container1">
						<div class="row">
							<div class="col-md-1">
								<div class="form-group">
									<br><br>
									ลำดับที่ 1 :
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
									<input class="form-control" name="28" id="2_n1" placeholder="ระบุ" data-validate="required" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
									<input class="form-control" name="29" id="2_p1" placeholder="ระบุ" data-validate="required" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control" name="30" id="2_priceA1" placeholder="ระบุ"  data-validate="required"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าที่พัก</label>
									<input class="form-control" name="31" id="2_priceB1" placeholder="ระบุ" data-validate="required"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control" name="32" id="2_priceC1" placeholder="ระบุ" data-validate="required"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control" name="33" id="2_priceD1" placeholder="ระบุ" data-validate="required"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input readonly class="form-control" name="34" value="-" readonly id="2_sum1" placeholder="ระบุ" data-validate="required"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">วันที่รับเงิน</label>
									<input class="form-control" name="35" id="2_dateinput1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="ลงเมื่อวันที่" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="other_qualifications" data-validate="required" id="2_other1" placeholder="List one subject per row"></textarea>
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>

					</div> <!-- div for container1-->

					<div class="row">
						<div class="col-md-1">

						</div>

						<div class="col-md-2">
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<br>
								&nbsp;&nbsp;&nbsp; รวมเงิน
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
								<input class="form-control" name="36" id="2_sumA" placeholder="ระบุ"  data-validate="required"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าที่พัก</label>
								<input class="form-control" name="37" id="2_sumB" placeholder="ระบุ" data-validate="required"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าพาหนะ</label>
								<input class="form-control" name="38" id="2_sumC" placeholder="ระบุ" data-validate="required"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าอื่นๆ</label>
								<input class="form-control" name="39" id="2_sumD" placeholder="ระบุ" data-validate="required"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">รวม</label>
								<input readonly class="form-control" name="40" value="-" readonly id="2_sumAll" placeholder="ระบุ" data-validate="required"/>
							</div>
						</div>

						<div class="col-md-1">
						</div>

						<div class="col-md-1">
						</div>

						<div class="col-md-1">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนเงินทั้งสิ้น (ตัวอักษร)</label>
								<input class="form-control" name="41" id="2_sumthai" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								คำชี้แจง<br>
								1. ค่าเบี้ยเลี้ยงและค่าเช่าที่พักให้ระบุอัตราวันและจำนวนวันที่ขอเบิกของแต่ละบุคคลในช่องหมายเหตุ <br>
								2. ให้ลงวันเดือนปีที่ได้รับเงิน กรณีเป้นการรับเงินจากการยืม ให้ระบุวันที่ได้รับจากเงินยืม 
							</div>
						</div>
					</div>


		<!--......................................-->

					<div class="container3">
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="42" id="3_date1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่" />
								</div>
							</div>

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
									<input class="form-control" name="43" id="3_detail1" data-validate="required" placeholder="รายละเอียดรายจ่าย" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control" name="44" id="3_price1" data-validate="required" placeholder="จำนวนเงิน" />
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="45" id="3_other1" data-validate="required" placeholder="หมายเหตุ" />
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
					</div><!--div container3-->

					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
							</div>
						</div>

						<div class="col-md-4">
							
						</div>

						<div class="col-md-1">
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp; รวมเงิน
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label" for="birthdate">จำนวนเงิน</label>
								<input class="form-control" name="46" id="3_sum" data-validate="required" placeholder="จำนวนเงิน" />
							</div>
						</div>

						<div class="col-md-3">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงินทั้งสิ้น (ตัวอักษร)</label>
								<input class="form-control" name="47" id="3_sumthai" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="checkbox checkbox-replace">
							<input type="checkbox" name="chk-rules2" id="chk-rules2" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
							<label for="chk-rules2">ข้าพเจ้าขอรับรองว่ารายจ่ายข้างต้นนี้ไม่อาจเรียกใบเสร็จรับเงินจากผู้รับได้ และข้าพเจ้าได้จ่ายไปในงานของราชการโดยแท้</label>
						</div>
					</div>


	<!--*****************************-->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
								<input class="form-control" name="48" id="4_date" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ข้าพเจ้า</label>
								<input class="form-control" name="49" id="4_name" data-validate="required" placeholder="สัญญายืมเงินเลขที่" />
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="birthdate">ที่อยู่</label>
								<input class="form-control" name="50" id="4_address" data-validate="required" placeholder="จำนวนเงิน" />
							</div>
						</div>

						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label" for="birthdate">ตำบล</label>
								<input class="form-control" name="51" id="4_tambon" data-validate="required" placeholder="หมายเหตุ" />
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">อำเภอ</label>
								<input class="form-control" name="52" id="4_district" data-validate="required" placeholder="หมายเหตุ" />
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">จังหวัด</label>
								<input class="form-control" name="53" id="4_province" data-validate="required" placeholder="หมายเหตุ" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<br>
							ได้รับเงินจากคณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลาครินทร์ ดังรายการต่อไปนี้<br>
							Received from Faculty of Environmental Management, Prince of Songkla University, the following payment<br>
							<br>
						</div>
					</div>

					<div class="container2">
						<div class="row">
							<div class="col-md-8">
								<div class="form-group">
									<label class="control-label" for="full_name">รายการ</label>
									<input class="form-control" name="54" id="4_item1" data-validate="required" placeholder="รายการ" />
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control" name="55" id="4_amount1" data-validate="required" placeholder="จำนวนเงิน" />
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field2 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>

						</div> 
					</div> <!--container2-->

					<div class="row">
						<div class="col-md-7">
						</div>

						<div class="col-md-1">
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp; รวมเงิน
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">จำนวนเงิน</label>
								<input class="form-control" name="56" id="4_sumamount" data-validate="required" placeholder="จำนวนเงิน" />
							</div>
						</div>
					</div>

					<div class="form-group" align="center"> 
						<button type="submit" class="btn btn-primary">Finish</button> 
					</div>



					<!--++++++++++++++++++++-->
				<div class="tab-pane active" id="tab2-1">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">ที่ทำการ</label>
								<input class="form-control" name="1" id="1_where" data-validate="required" placeholder="ที่ทำการ" />
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="birthdate">วันที่</label>
								<input class="form-control" name="2" id="1_date" data-validate="required" type="date" placeholder="วันที่" value="<?php echo date('Y-m-d'); ?>"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">เรื่อง</label>
								<input class="form-control" name="3" readonly id="1_title" value="ขออนุมัติเบิกค่าใช้จ่ายในการเดินทางไปราชการ" placeholder="สัญญายืมเงินเลขที่" />
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">เรียน</label>
								<input class="form-control" name="4" id="1_to" data-validate="required" placeholder="เรียน" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">ตามคำสั่งบันทึกที่</label>
								<input class="form-control" name="5" readonly id="1_idsaraban" value="เลขสารบรรณ" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ลงเมื่อวันที่</label>
								<input class="form-control" name="6" id="1_dateinput" data-validate="required" value="<?php echo date("Y-m-d"); ?>" type="date" placeholder="ลงเมื่อวันที่" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ข้าพเจ้า</label>
								<input class="form-control" name="7" id="1_name" data-validate="required" placeholder="ชื่อ นามสกุล" />
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ตำแหน่ง</label>
								<input class="form-control" name="8" id="1_position" data-validate="required" placeholder="ตำแหน่ง" />
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">สังกัด</label>
								<input class="form-control" name="9" id="1_major" data-validate="required" placeholder="สังกัด" />
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">พร้อมด้วย</label>
								<input class="form-control" name="10" id="1_with" data-validate="required" placeholder="ผู้ติดตาม/คณะผู้ติดตาม" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">เดินทางไปปฏิบัติราชการ</label>
								<input class="form-control" name="11" id="1_goto" data-validate="required" placeholder="รายละเอียด" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">โดยออกเดินทางจาก</label>
								<select id="1_start" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="1">บ้านพัก</option>
										<option value="2">สำนักงาน</option>
										<option value="3">ประเทศไทย</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ตั้งแต่วันที่</label>
								<input class="form-control" name="12" id="1_datestart" type="datetime-local" value="<?php echo date("Y-m-d\TH:i"); ?>" data-validate="required"/>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">กลับถึง</label>
								<select id="1_end" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="1">บ้านพัก</option>
										<option value="2">สำนักงาน</option>
										<option value="3">ประเทศไทย</option>
								</select>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ในวันที่</label>
								<input class="form-control" name="13" id="1_dateend" data-validate="required" type="datetime-local" value="<?php echo date("Y-m-d\TH:i"); ?>" placeholder="ถึงในวันที่" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเวลาไปราชการครั้งนี้</label>
								<input readonly value="-" name="14" class="form-control" id="1_sumdate" data-validate="required" placeholder="รวมเวลา" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="birthdate">ข้าพเจ้าขอเบิกสำหรับ</label>
								<select id="1_allowfor" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="1">ข้าพเจ้า</option>
										<option value="2">คณะเดินทาง</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเบี้ยเลี้ยงเดินทางประเภท</label>
								<input class="form-control" name="15" id="1_travel" data-validate="required" placeholder="ระบุ" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนวัน</label>
								<input class="form-control" name="16" id="1_travelday" data-validate="required" placeholder="จำนวนวัน" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="17" id="1_travelprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเช่าที่พักประเภท</label>
								<input class="form-control" name="18" id="1_resident" data-validate="required" placeholder="ระบุ" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนวัน</label>
								<input class="form-control" name="19" id="1_residentday" data-validate="required" placeholder="จำนวนวัน" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="20" id="1_residentprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าพาหนะ</label>
								<input class="form-control" name="21" id="1_vehical" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="22" id="1_vehicalprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าใช้จ่ายอื่นๆ</label>
								<input class="form-control" name="23" id="1_other" placeholder="ระบุ" data-validate="required" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control" name="24" id="1_otherprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงินทั้งสิ้น</label>
								<input readonly class="form-control" value="-" name="25" id="1_sumprice" data-validate="required" placeholder="รวมเงิน" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="checkbox checkbox-replace">
							<input type="checkbox" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
							<label for="chk-rules">ข้าพเจ้าขอรับรองว่ารายการที่กล่าวมาข้างต้นเป็นความจริง และหลักฐานการจ่ายที่ส่งมาด้วย รวมทั้งจำนวนเงินที่ขอเบิกถูกต้องตามกฎหมายทุกประการ</label>
						</div>
					</div>
				</div>
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

						<script type="text/javascript">
									var  Listfile = [];
									var  id_allownace = "";
						</script>
						<?php foreach($getdataAllow as $getdataAllow) { ?> 

							<script type="text/javascript">
								id_allownace = "<?php echo $getdataAllow['id_allowance']; ?>";
							</script>

						<form role="form" class="form-horizontal form-groups-bordered" >
							<input readonly  type="hidden" name="id_allowance" id="id_allowance" value="<?php echo $getdataAllow['id_allowance']; ?>">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เลขที่หนังสือขออนุมัติเดินทาง</label>
								<div class="col-sm-9">
									<input readonly style="font-size: 16px" type="text" class="form-control" id="field-00" value="<?php echo $getdataAllow['ref_saraban']; ?>">
									<span id='field-00_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">หมายเลขสารบรรณ</label>
								<div class="col-sm-9">
									<input readonly style="font-size: 16px"  type="number" class="form-control" id="field-0" value="<?php echo $getdataAllow['id_saraban']; ?>">
									<span id='field-0_error'></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เรื่อง</label>
								
								<div class="col-sm-9">
									<input readonly style="font-size: 16px" type="text" class="form-control" id="field-1" value="<?php echo $getdataAllow['topic']; ?>">
									<span id='field-1_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >วันที่</label>
								
								<div class="col-sm-9">
									<input readonly style="font-size: 16px" type="date" class="form-control" id="field-4" value="<?php echo $getdataAllow['date_add']; ?>" >
									<span id='field-4_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เรียน</label>
								
								<div class="col-sm-9">
									<input readonly style="font-size: 16px" type="text" class="form-control" id="field-3"  value="<?php echo $getdataAllow['text1']; ?>" >
									<span id='field-3_error'></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รายละเอียด<br>(ย่อหน้าที่ 1)</label>
								
								<div class="col-sm-9">
									<!--<div class="form-group">-->
										<textarea readonly class="form-control" style="margin: 0px; width: 100%; height: 200px; font-size: 16px;" name="detail_1" id="detail_1"><?php echo trim($getdataAllow['text2']); ?></textarea>
										<span id='detail_1_error'></span>
									<!--</div>-->
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รายละเอียด<br>(ย่อหน้าที่ 2)</label>
								
								<div class="col-sm-9">									
										<textarea readonly class="form-control" style="margin: 0px; width: 100%; height: 200px; font-size: 16px" name="detail_2" id="detail_2"><?php echo trim($getdataAllow['text3']); ?></textarea>
										<span id='detail_2_error'></span>
																				
								</div>
							</div>	
								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">คำลงท้าย</label>
								<div class="col-sm-9">
									<input readonly style="font-size: 16px" type="text" class="form-control" id="field-5" value="<?php echo $getdataAllow['footer']; ?>">
									<span id='field-5_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">เหตุผลการขออนุมัติ</label>
								
								<div class="col-sm-5">
									<?php if($getdataAllow['text5'] == '1'){ ?>
										
											<label>กรณีขอไปเอง</label>
										
									<?php }else if($getdataAllow['text5'] == '0'){?>
										
											<label>กรณีได้รับมอบหมาย</label>
											
									<?php } ?>

									<span id='radio1_error'></span>								
								</div> 
							</div>


							<?php if($getdataAllow['text6'] == '1'){ ?>	
							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
										<label>เบิกค่าใช้จ่าย</label>
								</div>
							</div>
							<?php } else if($getdataAllow['text6'] == '2'){ ?>	
							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
										<label>ไม่เบิกค่าใช้จ่าย</label>
								</div>
							</div>
								<?php } else if($getdataAllow['text6'] == '3'){ ?>	
								<div class="form-group">
									<label class="col-sm-3 control-label">ประเภทการเบิก</label>
										<div class="col-sm-5">
											<label>อื่นๆ</label>
											<input style="font-size: 16px" type="text" id="field-6" class="form-control" name="field-6" value="<?php echo $getdataAllow['budget_datail'] ?>" readonly>
										</div>
										<span id='radio2_error'></span>							
								</div>
							<?php } else if($getdataAllow['text6'] == '0'){?>

								<div class="form-group hidden">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
										<label>ไม่เบิกค่าใช้จ่าย</label>
								</div>
							</div>
							<?php } ?>
							
							<?php if($getdataAllow['text6'] == '1'){ ?>
													<div class="form-group " id="Expensesform"  >
								<label class="col-sm-3 control-label">ค่าใช้จ่าย</label>
								
								<div class="col-sm-9">
									<div class="row">
										<label for="field-1" class="col-sm-3"> 1. ค่าเบี้ยเลี้ยง</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="number" class="form-control" id="Expenses_date1" value="<?php echo $getdataAllow['date_expenses1']; ?>">
											<span id='Expenses_date1_error'></span>
										</div>
										<label for="field-1" class="col-sm-2 control-label">วัน&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="text" class="form-control" id="Expenses1"
											value="<?php echo number_format($getdataAllow['expenses1'],2); ?>">
											<span id='Expenses1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 2. ค่าที่พัก</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="number" class="form-control" id="Expenses_date2" value="<?php echo $getdataAllow['date_expenses2']; ?>">
											<span id='Expenses_date2_error'></span>
											
										</div>
										<label for="field-1" class="col-sm-2 control-label">วัน&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="text" class="form-control" id="Expenses2" value="<?php echo number_format($getdataAllow['expenses2'],2); ?>">
											<span id='Expenses2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 3. ค่าพาหนะ</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="text" class="form-control hidden" id="Expenses_date3" value="<?php echo $getdataAllow['date_expenses3']; ?>">
											<span id='Expenses_date3_error'></span>
										</div>
										<label for="field-1" class="col-sm-2 control-label">&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="txt" class="form-control" id="Expenses3" value="<?php echo number_format($getdataAllow['expenses3'],2); ?>">
											<span id='Expenses3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">	
										<label for="field-2" class="col-sm-1 ">4.อื่นๆ</label>
										<div class="col-sm-4">	
											<input readonly style="font-size: 16px" type="text" class="form-control" id="remark_Expenses4" placeholder="............" value="<?php echo $getdataAllow['remark_Expenses4']; ?>">
											<span id='remark_Expenses4_error' ></span>
										</div>
										<label for="field-2" class="col-sm-2 "></label>
										<div class="col-sm-2">
											<input readonly style="font-size: 16px" type="number" class="form-control" id="Expenses4" value="<?php echo number_format($getdataAllow['expenses4'],2); ?>">
											<span id='Expenses4_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">

										<label for="field-1" class="col-sm-7 control-label">รวม</label>
										<div class="col-sm-2">
										<input style="font-size: 16px" readonly type="text" class="form-control" id="field-2" onclick="total()" value="<?php echo number_format($getdataAllow['text4'],2); ?>">
										<span id='field-2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
									</div>
								</div>
							</div>
							<?php  }else{  ?>
							<div class="form-group  hidden" id="Expensesform"  >
								<label class="col-sm-3 control-label">ค่าใช้จ่าย</label>
								
								<div class="col-sm-9">
									<div class="row">
										<label for="field-1" class="col-sm-3"> 1. ค่าเบี้ยเลี้ยง</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="number" class="form-control" id="Expenses_date1" value="<?php echo $getdataAllow['date_expenses1']; ?>">
											<span id='Expenses_date1_error'></span>
										</div>
										<label for="field-1" class="col-sm-2 control-label">วัน&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="text" class="form-control" id="Expenses1"
											value="<?php echo number_format($getdataAllow['expenses1'],2); ?>">
											<span id='Expenses1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 2. ค่าที่พัก</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="number" class="form-control" id="Expenses_date2" value="<?php echo $getdataAllow['date_expenses2']; ?>">
											<span id='Expenses_date2_error'></span>
											
										</div>
										<label for="field-1" class="col-sm-2 control-label">วัน&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="text" class="form-control" id="Expenses2" value="<?php echo number_format($getdataAllow['expenses2'],2); ?>">
											<span id='Expenses2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 3. ค่าพาหนะ</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="text" class="form-control hidden" id="Expenses_date3" value="<?php echo $getdataAllow['date_expenses3']; ?>">
											<span id='Expenses_date3_error'></span>
										</div>
										<label for="field-1" class="col-sm-2 control-label">&nbsp;&nbsp;รวมเป็นเงิน</label>
										<div class="col-sm-2">	
											<input readonly style="font-size: 16px" type="txt" class="form-control" id="Expenses3" value="<?php echo number_format($getdataAllow['expenses3'],2); ?>">
											<span id='Expenses3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">	
										<label for="field-2" class="col-sm-1 ">4.อื่นๆ</label>
										<div class="col-sm-4">	
											<input readonly style="font-size: 16px" type="text" class="form-control" id="remark_Expenses4" placeholder="............" value="<?php echo $getdataAllow['remark_Expenses4']; ?>">
											<span id='remark_Expenses4_error' ></span>
										</div>
										<label for="field-2" class="col-sm-2 "></label>
										<div class="col-sm-2">
											<input readonly style="font-size: 16px" type="number" class="form-control" id="Expenses4" value="<?php echo number_format($getdataAllow['expenses4'],2); ?>">
											<span id='Expenses4_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">

										<label for="field-1" class="col-sm-7 control-label">รวม</label>
										<div class="col-sm-2">
										<input style="font-size: 16px" readonly type="text" class="form-control" id="field-2" onclick="total()" value="<?php echo number_format($getdataAllow['text4'],2); ?>">
										<span id='field-2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
									</div>
								</div>
							</div>
						<?php  } ?>

							<script type="text/javascript">
					 var dataObj1 = {
							file_name	: "<?php echo $getdataAllow['file_name1']; ?>",
							client_name : "<?php echo $getdataAllow['file_Orig1']; ?>"
															
									}                
									Listfile.push(dataObj1);

					 var dataObj2 = {
							file_name  : "<?php echo $getdataAllow['file_name2'];?>",
							client_name: "<?php echo $getdataAllow['file_Orig2'];?>"
															
									}                
									Listfile.push(dataObj2);
					var dataObj3 = {
							file_name  : "<?php echo $getdataAllow['file_name3'];?>",
							client_name: "<?php echo $getdataAllow['file_Orig3'];?>"
															
									}                
									Listfile.push(dataObj3);
					var dataObj4 = {
							file_name  : "<?php echo $getdataAllow['file_name4'];?>",
							client_name: "<?php echo $getdataAllow['file_Orig4'];?>"
															
									}                
									Listfile.push(dataObj4);
					var dataObj5 = {
							file_name  : "<?php echo $getdataAllow['file_name5'];?>",
							client_name: "<?php echo $getdataAllow['file_Orig5'];?>"
															
									}                
									Listfile.push(dataObj5);
				</script>	

							<div class="form-group">
								<label class="col-sm-3 control-label">ไฟล์ที่แนบมา</label>
								
								<div class="col-sm-9 ">
									<?php if($getdataAllow['file_name1'] != null || $getdataAllow['file_name1'] != "" ){ ?>   
										<div class="row">
											<input readonly type="hidden" id = "encrypt1" value="<?php echo $getdataAllow['file_name1'];?>" />
									        <button type="button" class="btn btn-blue " id="view1"  onclick ="newTabImage('1')">view</button>
									        <span id="namefile1" class="file-input-name"><?php echo $getdataAllow['file_Orig1'];?></span>
											  <br><br>
										</div>
									<?php } ?>
									<?php if($getdataAllow['file_name2'] != null || $getdataAllow['file_name2'] != "" ){ ?>   
										<div class="row">
											<input readonly type="hidden" id = "encrypt2" value="<?php echo $getdataAllow['file_name2'];?>" />
									        <button type="button" class="btn btn-blue " id="view2"  onclick ="newTabImage('2')">view</button>
									        <span id="namefile2" class="file-input-name"><?php echo $getdataAllow['file_Orig2'];?></span>
											  <br><br>
										</div>
									<?php } ?>
									<?php if($getdataAllow['file_name3'] != null || $getdataAllow['file_name3'] != "" ){ ?>   
										<div class="row">
											<input readonly type="hidden" id = "encrypt3" value="<?php echo $getdataAllow['file_name3'];?>" />
									        <button type="button" class="btn btn-blue " id="view3"  onclick ="newTabImage('3')">view</button>
									        <span id="namefile3" class="file-input-name"><?php echo $getdataAllow['file_Orig3'];?></span>
											  <br><br>
										</div>
									<?php } ?>
									<?php if($getdataAllow['file_name4'] != null || $getdataAllow['file_name4'] != "" ){ ?>   
										<div class="row">
											<input readonly type="hidden" id = "encrypt4" value="<?php echo $getdataAllow['file_name4'];?>" />
									        <button type="button" class="btn btn-blue " id="view4"  onclick ="newTabImage('4')">view</button>
									        <span id="namefile4" class="file-input-name"><?php echo $getdataAllow['file_Orig4'];?></span>
											  <br><br>
										</div>
									<?php } ?>
									<?php if($getdataAllow['file_name5'] != null || $getdataAllow['file_name5'] != "" ){ ?>   
										<div class="row">
											<input readonly type="hidden" id = "encrypt5" value="<?php echo $getdataAllow['file_name5'];?>" />
									        <button type="button" class="btn btn-blue " id="view5"  onclick ="newTabImage('5')">view</button>
									        <span id="namefile5" class="file-input-name"><?php echo $getdataAllow['file_Orig5'];?></span>
											  <br><br>
										</div>
									<?php } ?>
							</div>
						</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">ผู้อนุมัติ</label>
									<div class="col-sm-5">
										<input readonly type="text" class="form-control" id="field-3" value="<?php
											if($chkfail == "false"){
												
												echo $getdataAllow['titlename']; 
												echo " "; 
												echo $getdataAllow['firstname']; 
												echo " "; 
												echo $getdataAllow['lastname'];
												echo " "; 
												if($getdataAllow['position_level'] == 3 ){
												echo "คณบดี ";
												}elseif($getdataAllow['position_level'] == 4 ){
													echo "รองคณบดี " ;
												}  
											}else{
												echo "";
											} 
											 ?>" >
									</div>
								</div>

								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">เสนอ</label>
									<div class="col-sm-9">									
										<input readonly type="text" class="form-control" id="field-3" value="<?php echo $getdataAllow['command']; ?>" >
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-9">								 
										<p class="bs-example"> 
											<!--<button onclick="sendpass()" type="button" class="btn btn-green btn-icon">ผ่าน<i class="entypo-check"></i> </button> -->
											<!--<button onclick="sendfail()" type="button" class="btn btn-red btn-icon">ไม่ผ่าน<i class="entypo-cancel"></i> </button> -->
											<button onclick="Preview()" type="button" class="btn btn-blue btn-icon">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button> 
										</p>
									</div> 
								</div>
							<?php } ?>
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
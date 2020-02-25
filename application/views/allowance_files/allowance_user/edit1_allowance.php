
	<div class="main-content">
			
	<script type="text/javascript">
									var  Listfile = [];
									var  id_allowance = "";
									var  text6 = "";
						</script>
						<?php foreach($getdataAllow as $getdataAllow) { ?> 

		
		<?php if($getdataAllow['text6'] == '1' || $getdataAllow['text6'] == '2' || $getdataAllow['text6'] == '3'){ ?>	
								<h2 style="text-align: center; padding-top: 20px;">รายละเอียดคำขอเบิกค่าเดินทาง</h2>
						<?php }else if($getdataAllow['text6'] == '0'){?>
								<h2 style="text-align: center; padding-top: 20px;">รายละเอียดคำขออนุมัติเดินทาง</h2>
						<?php } ?>
		<br />
		<br />
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 70%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
								
						<?php if($getdataAllow['text6'] == '1' || $getdataAllow['text6'] == '2' || $getdataAllow['text6'] == '3'){ ?>	
								<div class="panel-heading">
									<div class="panel-heading" style="font-size: 12pt !important">
										รายละเอียดคำขอเบิกค่าเดินทาง
									</div>
								</div>
						<?php }else if($getdataAllow['text6'] == '0'){?>
								<div class="panel-heading">
									<div class="panel-heading" style="font-size: 12pt !important">
										รายละเอียดคำขออนุมัติเดินทาง
									</div>
								</div>	
						<?php } ?>

					
					
					<div class="panel-body">

						

							<script type="text/javascript">
								id_allowance = "<?php echo $getdataAllow['id_allowance']; ?>";
								text6		 = "<?php echo $getdataAllow['text6']; ?>";
							</script>

						<form role="form" class="form-horizontal form-groups-bordered" >
							<input type="hidden" name="id_allowance" id="id_allowance" value="<?php echo $getdataAllow['id_allowance']; ?>">
							
						<?php if($getdataAllow['text6'] == '1' || $getdataAllow['text6'] == '2' || $getdataAllow['text6'] == '3'){ ?>	
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เลขที่หนังสือขออนุมัติเดินทาง</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-00" value="<?php echo $getdataAllow['ref_saraban']; ?>" onkeyup="	$('#field-00_error').html('').css('color', 'red');">
									<span id='field-00_error'></span>
								</div>
							</div>
						<?php }else if($getdataAllow['text6'] == '0'){?>
								<div class="form-group hidden">
								<label for="field-1" class="col-sm-3 control-label"  >เลขที่หนังสือขออนุมัติเดินทาง</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-00" value="<?php echo $getdataAllow['ref_saraban']; ?>" onkeyup="	$('#field-00_error').html('').css('color', 'red');">
									<span id='field-00_error'></span>
								</div>
							</div>
						<?php } ?>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เรื่อง</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-1" value="<?php echo $getdataAllow['topic']; ?>" onkeyup="$('#field-1_error').html('').css('color', 'red');">
									<span id='field-1_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >วันที่</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="date" class="form-control" id="field-4" value="<?php echo $getdataAllow['date_add']; ?>"  onkeyup="$('#field-4_error').html('').css('color', 'red');">
									<span id='field-4_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label"  >เรียน</label>
								
								<div class="col-sm-9">
									<input style="font-size: 16px" type="text" class="form-control" id="field-3"  value="<?php echo $getdataAllow['text1']; ?>" onkeyup="$('#field-3_error').html('').css('color', 'red');">
									<span id='field-3_error'></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รายละเอียด<br>(ย่อหน้าที่ 1)</label>
								
								<div class="col-sm-9">
									<!--<div class="form-group">-->
										<textarea class="form-control" style="margin: 0px; width: 100%; height: 200px; font-size: 16px" name="detail_1" id="detail_1" onkeyup="$('#detail_1_error').html('').css('color', 'red');"><?php echo trim($getdataAllow['text2']); ?></textarea>
										<span id='detail_1_error'></span>
									<!--</div>-->
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">รายละเอียด<br>(ย่อหน้าที่ 2)</label>
								
								<div class="col-sm-9">									
										<textarea  class="form-control" style="margin: 0px; width: 100%; height: 200px; font-size: 16px" name="detail_2" id="detail_2" onkeyup="$('#detail_2_error').html('').css('color', 'red');"><?php echo trim($getdataAllow['text3']); ?></textarea>
										<span id='detail_2_error'></span>
																				
								</div>
							</div>	
								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">คำลงท้าย</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="field-5" value="<?php echo $getdataAllow['footer']; ?>" style="font-size: 16px" onkeyup="$('#field-5_error').html('').css('color', 'red');">
									<span id='field-5_error'></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">เหตุผลการขออนุมัติ</label>
								
								<div class="col-sm-5">
									<?php if($getdataAllow['text5'] == '1'){ ?>
										<div class="radio radio-replace ">
											<input type="radio" id="rd-1" name="radio1" value="1" checked  onchange ="	$('#radio1_error').html('').css('color', 'red');">
											<label>กรณีขอไปเอง</label>
										</div>
										<div class="radio radio-replace">
											<input type="radio" id="rd-2" name="radio1" value="0"  onchange ="	$('#radio1_error').html('').css('color', 'red');">
											<label>กรณีได้รับมอบหมาย</label>
										</div>
									<?php }else if($getdataAllow['text5'] == '0'){?>
										<div class="radio radio-replace">
											<input type="radio" id="rd-1" name="radio1" value="1"  onchange ="	$('#radio1_error').html('').css('color', 'red');" >
											<label>กรณีขอไปเอง</label>
										</div>
										<div class="radio radio-replace ">
											<input type="radio" id="rd-2" name="radio1" value="0" checked  onchange ="	$('#radio1_error').html('').css('color', 'red');">
											<label>กรณีได้รับมอบหมาย</label>
										</div>
									<?php } ?>

									<span id='radio1_error'></span>								
								</div>
							</div>


											
						<?php if($getdataAllow['text6'] == '1'){ ?>	
							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
									<div class="radio radio-replace">
										<input type="radio" id="rd-1" name="radio2"  value="1"  checked onclick="Expenses()"  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-2" name="radio2"  value="2" onclick="notExpenses()" onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>ไม่เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-3" name="radio2"  value="3" onclick="notExpenses2()" onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>อื่นๆ</label>
										<input type="text" id="field-6" class="form-control" name="field-6" onkeyup ="	$('#field-6_error').html('').css('color', 'red');">
									</div>
									<span id='radio2_error'></span>	
									<span id='field-6_error'></span>							
								</div>
							</div>
							<?php } else if($getdataAllow['text6'] == '2'){ ?>	
							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
									<div class="radio radio-replace">
										<input type="radio" id="rd-1" name="radio2"  value="1"  onclick="Expenses()"  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-2" name="radio2"  value="2" checked onclick="notExpenses()"  onchange ="	$('#radio2_error').html('').css('color', 'red');"> 
										<label>ไม่เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-3" name="radio2"  value="3" onclick="notExpenses2()"  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>อื่นๆ</label>
										<input type="text" id="field-6" class="form-control" name="field-6"  onkeyup ="	$('#field-6_error').html('').css('color', 'red');">
									</div>
									<span id='radio2_error'></span>	
									<span id='field-6_error'></span>							
								</div>
							</div>
								<?php } else if($getdataAllow['text6'] == '3'){ ?>	
							<div class="form-group">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
									<div class="radio radio-replace">
										<input type="radio" id="rd-1" name="radio2"  value="1" onclick="Expenses()"  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-2" name="radio2"  value="2" onclick="notExpenses()"  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>ไม่เบิกค่าใช้จ่าย</label>
									</div>
									<div class="radio radio-replace">
										<input type="radio" id="rd-3" name="radio2"  value="3" checked onclick="notExpenses2()"  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>อื่นๆ</label>
										<input type="text" id="field-6" class="form-control" name="field-6" value="<?php echo $getdataAllow['budget_datail'] ?>" disabled  onkeyup ="	$('#field-6_error').html('').css('color', 'red');">
									</div>
									<span id='radio2_error'></span>			
									<span id='field-6_error'></span>				
								</div>
							</div>
							<?php } else if($getdataAllow['text6'] == '0'){?>

								<div class="form-group hidden ">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								<div class="col-sm-5">
									<div class="radio radio-replace">
										<input type="radio" id="rd-2" name="radio2"  value="0" onclick="notExpenses()" checked  onchange ="	$('#radio2_error').html('').css('color', 'red');">
										<label>ไม่เบิกค่าใช้จ่าย</label>
									</div>
									<span id='radio2_error'></span>	
									<span id='field-6_error'></span>							
								</div>
							</div>
							<?php } ?>	
							<?php if($getdataAllow['text6'] == '1'){ ?>
							<div class="form-group" id="Expensesform"  >
								<label class="col-sm-3 control-label">ค่าใช้จ่าย</label>
								
								<div class="col-sm-9">
									<div class="row">
										<label for="field-1" class="col-sm-3"> 1. ค่าเบี้ยเลี้ยง</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date1" value="<?php echo $getdataAllow['date_expenses1']; ?>">
											<span id='Expenses_date1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">วัน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses1"
											value="<?php echo $getdataAllow['expenses1']; ?>" onchange="total()">
											<span id='Expenses1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 2. ค่าที่พัก</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date2" value="<?php echo $getdataAllow['date_expenses2']; ?>">
											<span id='Expenses_date2_error'></span>
											
										</div>
										<label for="field-1" class="col-sm-1 control-label">วัน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses2" value="<?php echo $getdataAllow['expenses2']; ?>" onchange="total()">
											<span id='Expenses2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 3. ค่าพาหนะ</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control hidden" id="Expenses_date3" value="<?php echo $getdataAllow['date_expenses3']; ?>">
											<span id='Expenses_date3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label"></label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses3" value="<?php echo $getdataAllow['expenses3']; ?>" onchange="total()">
											<span id='Expenses3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">	
										<label for="field-2" class="col-sm-1 ">4.อื่นๆ</label>
										<div class="col-sm-4">	
											<input style="font-size: 16px" type="text" class="form-control" id="remark_Expenses4" placeholder="............" value="<?php echo $getdataAllow['remark_Expenses4']; ?>" >
											<span id='remark_Expenses4_error' ></span>
										</div>
									
										<label for="field-1" class="col-sm-1 control-label">วัน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses4" value="<?php echo $getdataAllow['expenses4']; ?>" onchange="total()">
											<span id='Expenses4_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-6 control-label">รวม</label>
										<div class="col-sm-2">
										<input style="font-size: 16px" readonly type="number" class="form-control" id="field-2" onclick="total()" value="<?php echo $getdataAllow['text4']; ?>">
										<span id='field-2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
									</div>
							</div>
						</div>
							<?php  }else{  ?>
							<div class="hidden form-group" id="Expensesform"  >
								<label class="col-sm-3 control-label">ค่าใช้จ่าย</label>
								
								<div class="col-sm-9">
									<div class="row">
										<label for="field-1" class="col-sm-3"> 1. ค่าเบี้ยเลี้ยง</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date1" value="<?php echo $getdataAllow['date_expenses1']; ?>">
											<span id='Expenses_date1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">วัน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses1"
											value="<?php echo $getdataAllow['expenses1']; ?>" onchange="total()">
											<span id='Expenses1_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 2. ค่าที่พัก</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date2" value="<?php echo $getdataAllow['date_expenses2']; ?>">
											<span id='Expenses_date2_error'></span>
											
										</div>
										<label for="field-1" class="col-sm-1 control-label">วัน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses2" value="<?php echo $getdataAllow['expenses2']; ?>" onchange="total()">
											<span id='Expenses2_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-3 "> 3. ค่าพาหนะ</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control hidden" id="Expenses_date3" value="<?php echo $getdataAllow['date_expenses3']; ?>">
											<span id='Expenses_date3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label"></label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses3" value="<?php echo $getdataAllow['expenses3']; ?>" onchange="total()">
											<span id='Expenses3_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">	
										<label for="field-2" class="col-sm-1 ">4.อื่นๆ</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="text" class="form-control" id="remark_Expenses4" placeholder="............" value="<?php echo $getdataAllow['remark_Expenses4']; ?>">
											<span id='remark_Expenses4_error' ></span>
										</div>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses_date4" value="<?php echo $getdataAllow['date_expenses4']; ?>">
											<span id='Expenses_date4_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">วัน</label>
										<div class="col-sm-2">	
											<input style="font-size: 16px" type="number" class="form-control" id="Expenses4" value="<?php echo $getdataAllow['expenses4']; ?>" onchange="total()">
											<span id='Expenses4_error'></span>
										</div>
										<label for="field-1" class="col-sm-1 control-label">บาท</label>
										<br><br>
									</div>
									<div class="row">
										<label for="field-1" class="col-sm-6 control-label">รวม</label>
										<div class="col-sm-2">
										<input style="font-size: 16px" readonly type="number" class="form-control" id="field-2" onclick="total()" value="<?php echo $getdataAllow['text4']; ?>">
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
								<label class="col-sm-3 control-label">แนบไฟล์</label>
								
								<div class="col-sm-9 ">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary " type="file" name="file[]" id = file1   multiple  onchange="chkconfig('1')" />
										<input type="hidden" id = "encrypt1" value="<?php echo $getdataAllow['file_name1'];?>" />
										 <button type="button" class="btn btn-blue hidden" id="remove1" onclick ="do_remove('1')">remove</button>
								     <?php if($getdataAllow['file_name1'] == null || $getdataAllow['file_name1'] == "" ){ ?>   
								        <button type="button" class="btn btn-blue hidden" id="view1"  onclick ="newTabImage('1')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete1"  onclick ="do_delete('1')">delete</button>
								     <?php }else{ ?>
								        <button type="button" class="btn btn-blue " id="view1"  onclick ="newTabImage('1')">view</button>
								        <button type="button" class="btn btn-blue " id="delete1"  onclick ="do_delete('1')">delete</button>
								      <?php }?>
								       <button type="button" class="btn btn-blue hidden" id="upload1">Upload</button>
										 <span id="namefile1" class="file-input-name"><?php echo $getdataAllow['file_Orig1'];?></span>
										<br><br>
									</div>
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file2   multiple onchange="chkconfig('2')" />
										<input type="hidden" id = "encrypt2"  value="<?php echo $getdataAllow['file_name2'];?>"/>
										  <button type="button"  class="btn btn-blue hidden" id="remove2" onclick ="do_remove('2')">remove</button>
									<?php if($getdataAllow['file_name2'] == null || $getdataAllow['file_name2'] == "" ){ ?>   
								        <button type="button" class="btn btn-blue hidden" id="view2"  onclick ="newTabImage('2')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete2"  onclick ="do_delete('2')">delete</button>
								     <?php }else{ ?>
								         <button type="button"  class="btn btn-blue " id="view2"   onclick ="newTabImage('2')">view</button>
								        <button type="button"  class="btn btn-blue " id="delete2"  onclick ="do_delete('2')">delete</button>
								        <?php } ?>
								        <button type="button"   class="btn btn-blue hidden" id="upload2">Upload</button>
										 <span id="namefile2" class="file-input-name"><?php echo $getdataAllow['file_Orig2'];?></span>
										<br><br>
									</div>
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file3   multiple onchange="chkconfig('3')" />
										<input type="hidden" id = "encrypt3"  value="<?php echo $getdataAllow['file_name3'];?>"/>
										  <button type="button"  class="btn btn-blue hidden" id="remove3" onclick ="do_remove('3')">remove</button>
									<?php if($getdataAllow['file_name3'] == null || $getdataAllow['file_name3'] == "" ){ ?>   
								        <button type="button" class="btn btn-blue hidden" id="view3"  onclick ="newTabImage('3')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete3"  onclick ="do_delete('3')">delete</button>
								     <?php }else{ ?>
								         <button type="button"  class="btn btn-blue " id="view3"   onclick ="newTabImage('3')">view</button>
								        <button type="button"  class="btn btn-blue " id="delete3"  onclick ="do_delete('3')">delete</button>
								        <?php } ?>
								        <button type="button"   class="btn btn-blue hidden" id="upload3">Upload</button>
										 <span id="namefile3" class="file-input-name"><?php echo $getdataAllow['file_Orig3'];?></span>
										<br><br>
									</div>
									<div class="row">	
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file4   multiple onchange="chkconfig('4')" />
										<input type="hidden" id = "encrypt4"  value="<?php echo $getdataAllow['file_name4'];?>"/>
								         <button type="button"  class="btn btn-blue hidden" id="remove4" onclick ="do_remove('4')">remove</button>
								     <?php if($getdataAllow['file_name4'] == null || $getdataAllow['file_name4'] == "" ){ ?>   
								        <button type="button" class="btn btn-blue hidden" id="view4"  onclick ="newTabImage('4')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete4"  onclick ="do_delete('4')">delete</button>
								     <?php }else{ ?>
								         <button type="button"  class="btn btn-blue " id="view4"   onclick ="newTabImage('4')">view</button>
								        <button type="button"  class="btn btn-blue " id="delete4"  onclick ="do_delete('4')">delete</button>
								      <?php } ?>
								        <button type="button"   class="btn btn-blue hidden" id="upload4">Upload</button>
										 <span id="namefile4" class="file-input-name"><?php echo $getdataAllow['file_Orig4'];?></span>
										<br><br>
									</div>
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id = file5   multiple onchange="chkconfig('5')" />
										<input type="hidden" id = "encrypt5"  value="<?php echo $getdataAllow['file_name5'];?>"/>
										 <button type="button"  class="btn btn-blue hidden" id="remove5" onclick ="do_remove('5')">remove</button>
									<?php if($getdataAllow['file_name5'] == null || $getdataAllow['file_name5'] == "" ){ ?>   
								        <button type="button" class="btn btn-blue hidden" id="view5"  onclick ="newTabImage('5')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete5"  onclick ="do_delete('5')">delete</button>
								     <?php }else{ ?>
								         <button type="button"  class="btn btn-blue " id="view5"   onclick ="newTabImage('5')">view</button>
								        <button type="button"  class="btn btn-blue " id="delete5"  onclick ="do_delete('5')">delete</button>
								        <?php } ?>
								        <button type="button"   class="btn btn-blue hidden" id="upload5">Upload</button>
										 <span id="namefile5" class="file-input-name"><?php echo $getdataAllow['file_Orig5'];?></span>
										  <br><br>
									</div>
									<div class="row">
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
						<?php } ?>
						
					</div>
				
				</div>
			
			</div>
		</div>



	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>

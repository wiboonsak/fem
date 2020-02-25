		<?php
		date_default_timezone_set("Asia/Bangkok");
		?>
<style>
    
 .isDisabled {
	  pointer-events: none;
	  cursor: not-allowed !important;
	  opacity: 0.5;
	  text-decoration: none;
 }
</style>
<?php 
$table = '';
$user_id = $this->uri->segment(4);
$idsaraban = $this->uri->segment(3);
$checktab = $this->uri->segment(7);
$type_travel = $this->uri->segment(5);
$getuser = $this->Inputform_model->getuser($user_id);

  if($type_travel == '1'){
       $table = 'tbl_local_document';
  }else{
       $table = 'tbl_outbound_document';
  }
foreach ($getuser->result() AS $getuser2){}
$getdocument = $this->Inputform_model->getdocument($idsaraban,$table);
foreach ($getdocument->result() AS $documentData2){}

$getdoc2 = $this->Inputform_model->getdoc2($idsaraban,$type_travel);
$numdoc2 = $getdoc2->num_rows();
foreach ($getdoc2->result() AS $getdoc2_1){}

$doc1_id = 0;
$getdoc1idsaraban = $this->Inputform_model->getdoc1idsaraban($idsaraban,$type_travel);
$numdoc1 = $getdoc1idsaraban->num_rows();
if($numdoc1>0){
		foreach($getdoc1idsaraban->result() AS $getdoc1idsaraban2){}
		$doc1_id = $getdoc1idsaraban2->id;
		$getdoc1 = $this->Inputform_model->getdoc1($doc1_id,$type_travel);
		foreach($getdoc1->result() AS $Data){}
		$getdoc3 = $this->Inputform_model->getdoc3($idsaraban,$type_travel);
		$getdoc3_1 = $this->Inputform_model->getdoc3_1($idsaraban,$type_travel);
		$time_end = $Data->time_end;
		$time_endarray = explode(":",$time_end);
		$m1 = $time_endarray[1];
		$h1 = $time_endarray[0];
		$timeend = $h1.":".$m1;

		$time_start = $Data->time_start;
		$time_startarray = explode(":",$time_start);
		$m = $time_startarray[1];
		$h = $time_startarray[0];
		$timestart = $h.":".$m;
}
if($documentData2->withdraw=='0'){
	$sarabannumber = $documentData2->saraban_number;
}else{
	$sarabannumber = $documentData2->saraban_number;
	if($type_travel == '2'){
		$sarabannumber = $this->Saraban_model->explode_sarabanNumber($sarabannumber,'1');
	}
}
$career_id = $getuser2->career_id;

?>
		<div class="well well-sm">
			<h4>กรุณากรอกแบบฟอร์มดังต่อไปนี้</h4>
		</div>
		
		<form action="#" id="rootwizard" name="rootwizard" class="form-wizard validate"  method="post" onsubmit="savedoc_1();return false">
			 <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">
                    <input type="hidden" id="idsaraban" name="idsaraban" value="<?php echo $idsaraban?>">
                    <input type="hidden" id="doc_1_id" name="doc_1_id" value="<?php if($numdoc1>0){echo $doc1_id;}else{echo 0;}?>">
                   <input type="hidden" id="type_travel1" name="type_travel1" value="<?php echo $type_travel?>">
                    
			<div class="steps-progress">
				<div class="progress-indicator"></div>
			</div>
			
			<ul>
                <li class="<?php if($checktab!='2'){echo 'active';}?>">
					<a href="#tab2-1" data-toggle="tab"><span>1</span>หลักฐานการจ่ายเงิน</a>
				</li>
                <li class="<?php if($checktab=='2'){echo 'active';}?>">
					<a href="#tab2-2" data-toggle="tab"><span>2</span>ใบเบิกค่าใช้จ่าย</a>
				</li>
                <li class="">
					<a href="#tab2-4" data-toggle="tab"><span>3</span>ใบสำคัญรับเงิน</a>
				</li>				
			</ul>
			
			<div class="tab-content">

				<div class="tab-pane <?php if($checktab!='2'){ echo 'active'; }?>" id="tab2-1">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="full_name">หลักฐานค่าใช้จ่ายประกอบใบเบิกค่าใช้จ่ายในการเดินทางของ</label>
                                <input class="form-control" name="26" id="2_name" placeholder="ระบุ" data-validate="required" value="<?php if($numdoc2>0){ echo $getdoc2_1->name; }?>"/>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ลงวันที่</label>
                                <input class="form-control" name="27" id="2_date" data-validate="required" type="date" <?php if($numdoc2>0){?>value="<?php echo $getdoc2_1->date; ?>"<?php }else{?>value="<?php echo date('Y-m-d'); ?>"<?php }?> placeholder="ลงเมื่อวันที่" />
							</div>
						</div>
					</div>
<?php if($numdoc2>0){ ?>
                    <div class="container1">
                    <?php $e=1;
                          foreach($getdoc2->result() AS $Data2){?>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28[]" id="2_n1" placeholder="ระบุ" data-validate="required" value="<?php echo $Data2->n?>" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29[]" id="2_p1" placeholder="ระบุ" data-validate="required" value="<?php echo $Data2->p?>"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control Allowance totalall<?php echo $e?>" name="30[]" id="2_priceA1" placeholder="จำนวนเงิน"  data-validate="required" onchange="sumAllowance('<?php echo $e?>')" value="<?php echo $Data2->priceA?>" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accom totalall<?php echo $e?>" name="31[]" id="2_priceB1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumAccom('<?php echo $e?>')" value="<?php echo $Data2->priceB?>" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Travel totalall<?php echo $e?>" name="32[]" id="2_priceC1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumTravel('<?php echo $e?>')" value="<?php echo $Data2->priceC?>" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Other totalall<?php echo $e?>" name="33[]" id="2_priceD1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumOther('<?php echo $e?>')" value="<?php echo $Data2->priceD?>" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalalla<?php echo $e?>" name="34[]" id="2_sum1" placeholder="จำนวนเงิน" data-validate="required" readonly value="<?php echo $Data2->sum?>" type="number"/>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วันที่รับเงิน</label>
									<input class="form-control" name="35[]" id="2_dateinput1" data-validate="required" type="date" placeholder="ลงเมื่อวันที่" value="<?php if(($Data2->dateinput != '') && ($Data2->dateinput != '0000-00-00')){ echo $Data2->dateinput; } else { echo date('Y-m-d'); }?>" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36[]" data-validate="required" id="2_other1" placeholder="หมายเหตุ"><?php echo $Data2->other?></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deletea<?php echo $e?>">
								<br>
								<?php if($e==1){ ?>
									<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                <?php }else{ ?>
                                    <a href="javascript:void(0);" class="delete" onclick="deletea('<?php echo $e?>')">Delete</a>
                               <?php } ?>
							</div>
						</div>
                        <?php $e++; } ?>
                        <input type="hidden" id="x" value="<?php echo $e?>">
					</div>
<?php }else{ ?>
					<div class="container1">
                    <?php $e=1;
                          $get_listNameData = $this->Allowance_model->get_listNameData($idsaraban,$type_travel);

                          $numlistName = $get_listNameData->num_rows();
                          if($numlistName>0){
                               foreach ($get_listNameData->result() AS $get_listNameData2){?>
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28[]" id="2_n1" placeholder="ระบุ" data-validate="required" value="<?php echo $get_listNameData2->name?>" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29[]" id="2_p1" placeholder="ระบุ" data-validate="required" value="<?php echo $get_listNameData2->position?>"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
									<input class="form-control Allowance totalall<?php echo $e?>" name="30[]" id="2_priceA1" placeholder="จำนวนเงิน"  data-validate="required" onchange="sumAllowance('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accom totalall<?php echo $e?>" name="31[]" id="2_priceB1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumAccom('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Travel totalall<?php echo $e?>" name="32[]" id="2_priceC1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumTravel('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Other totalall<?php echo $e?>" name="33[]" id="2_priceD1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumOther('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalalla<?php echo $e?>" name="34[]" id="2_sum1" placeholder="จำนวนเงิน" data-validate="required" readonly type="number"/>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วันที่รับเงิน</label>
									<input class="form-control" name="35[]" id="2_dateinput1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="ลงเมื่อวันที่" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36[]" data-validate="required" id="2_other1" placeholder="หมายเหตุ"></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deletea<?php echo $e?>">
								<br>
							<?php if($e==1){?>
								<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                            <?php }else{?>
                                <a href="javascript:void(0);" class="delete" onclick="deletea('<?php echo $e?>')">Delete</a>
                            <?php } ?>
							</div>
						</div>
                        <?php $e++; } }else{ ?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="full_name">ชื่อ</label>
                                    <input class="form-control" name="28[]" id="2_n1" placeholder="ระบุ" data-validate="required" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ตำแหน่ง</label>
                                    <input class="form-control" name="29[]" id="2_p1" placeholder="ระบุ" data-validate="required" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
                                    <input class="form-control Allowance totalall<?php echo $e?>" name="30[]" id="2_priceA1" placeholder="จำนวนเงิน"  data-validate="required" onchange="sumAllowance('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label " for="full_name">ค่าที่พัก</label>
									<input class="form-control Accom totalall<?php echo $e?>" name="31[]" id="2_priceB1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumAccom('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าพาหนะ</label>
									<input class="form-control Travel totalall<?php echo $e?>" name="32[]" id="2_priceC1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumTravel('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">ค่าอื่นๆ</label>
									<input class="form-control Other totalall<?php echo $e?>" name="33[]" id="2_priceD1" placeholder="จำนวนเงิน" data-validate="required" onchange="sumOther('<?php echo $e?>')" type="number"/>
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="full_name">รวม</label>
									<input class="form-control totalalla<?php echo $e?>" name="34[]" id="2_sum1" placeholder="จำนวนเงิน" data-validate="required" readonly type="number"/>
								</div>
							</div>

							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วันที่รับเงิน</label>
									<input class="form-control" name="35[]" id="2_dateinput1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="ลงเมื่อวันที่" />
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<textarea class="form-control autogrow" name="36[]" data-validate="required" id="2_other1" placeholder="หมายเหตุ"></textarea>
								</div>
							</div>

                            <div class="col-md-1" id="deletea<?php echo $e?>">
								<br>								
								<button type="button" class="add_form_field1 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>                                               
							</div>
						</div>
                      <?php } ?>
                      <input type="hidden" id="x" value="<?php echo $e?>">
					</div> <!-- div for container1-->
<?php } ?>
					<div class="row">
						<div class="col-md-1"></div>

						<div class="col-md-1"></div>

						<div class="col-md-1">
							<div class="form-group">
								<br>
								&nbsp;&nbsp;&nbsp; รวมเงิน
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>
                                <input class="form-control Allowancetotal" name="36_1" id="2_sumA" placeholder="จำนวนเงิน"  data-validate="required" readonly value="<?php if($numdoc2>0){echo $getdoc2_1->sumA;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าที่พัก</label>
								<input class="form-control Accomtotal" name="37" id="2_sumB" placeholder="จำนวนเงิน" data-validate="required" readonly value="<?php if($numdoc2>0){echo $getdoc2_1->sumB;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าพาหนะ</label>
								<input class="form-control Traveltotal" name="38" id="2_sumC" placeholder="จำนวนเงิน" data-validate="required" readonly value="<?php if($numdoc2>0){echo $getdoc2_1->sumC;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">ค่าอื่นๆ</label>
								<input class="form-control Othertotal" name="39" id="2_sumD" placeholder="จำนวนเงิน" data-validate="required" readonly value="<?php if($numdoc2>0){echo $getdoc2_1->sumD;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1">
							<div class="form-group">
								<label class="control-label" for="full_name">รวม</label>
								<input class="form-control " name="40" id="2_sumAll" placeholder="จำนวนเงิน" data-validate="required" readonly value="<?php if($numdoc2>0){echo $getdoc2_1->sumAll;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
						<div class="col-md-1"></div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนเงินทั้งสิ้น (ตัวอักษร)</label>
								<input class="form-control" name="41" id="2_sumthai" placeholder="ระบุ" data-validate="required" value="<?php if($numdoc2>0){echo $getdoc2_1->sumthai;}?>"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								คำชี้แจง<br>
								1. ค่าเบี้ยเลี้ยงและค่าเช่าที่พักให้ระบุอัตราวันและจำนวนวันที่ขอเบิกของแต่ละบุคคลในช่องหมายเหตุ <br>
	2. ให้ผู้มีสิทธิแต่ละคนเป็นผู้ลงลายมือชื่อผู้รับเงินและวันเดือนปีที่ได้รับเงิน กรณีเป็นการรับจากเงินยืม ให้ระบุวันที่ที่ได้รับจากเงินยืม<br>
	3. ผู้จ่ายเงินหมายถึงผู้ที่ขอยืมเงินจากทางราชการ และจ่ายเงินยืมนั้นให้แก่ผู้เดินทางแต่ละคนเป็นผู้ลงลายมือชื่อผู้จ่ายเงิน
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
                            <div class="form-group" style="text-align:center">
                                <button type="button" onclick="checkinput()" class="btn btn-info" id="btn2" >บันทึกข้อมูล</button>
							</div>
						</div>
					</div>
				</div>
                <div class="tab-pane <?php if($checktab=='2'){echo 'active';}?>" id="tab2-2">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">ที่ทำการ</label>
                                <input class="form-control" name="1" id="1_where" data-validate="required" placeholder="ที่ทำการ" value="<?php if($numdoc1>0){echo $Data->doc_where;}?>" onchange="nextdisable()"/>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="birthdate">วันที่</label>
                                <input class="form-control" name="2" id="1_date" data-validate="required" type="date" placeholder="วันที่" value="<?php if($numdoc1>0){echo $Data->date;}else{echo date('Y-m-d');} ?>"/>
							</div>
						</div>
					</div>
                                    <div>
                                        <hr style="height: 5px;background-color: #808080">
                                    </div>
                                    <div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="full_name">เรื่อง</label>
                                <input class="form-control" name="3"  id="1_title" value="<?php if($numdoc1>0){echo $Data->title;}else{echo $documentData2->subject_document;}?>" placeholder="สัญญายืมเงินเลขที่" />
							</div>
						</div>
					</div>
						
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">เรียน</label>
                                <input class="form-control" name="4" id="1_to" data-validate="required" placeholder="เรียน" <?php if($numdoc1>0){?>value="<?php echo $Data->doc_to?>"<?php }else{?>value="<?php if($career_id == '5'){ echo 'อธิการบดี'; } if($career_id == '4'){ echo 'คณบดีคณะการจัดการสิ่งแวดล้อม'; }?>"<?php }?>/>
							</div>
						</div> 

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">ตามคำสั่งบันทึกที่</label>
                                <input class="form-control" name="5" readonly id="1_idsaraban" value="<?php echo $sarabannumber;?>" />
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ลงเมื่อวันที่</label>
                                <input class="form-control" name="6" id="1_dateinput" data-validate="required" value="<?php  if($numdoc1>0){echo $Data->date;}else{echo date('Y-m-d');} ?>" type="date" placeholder="ลงเมื่อวันที่" />
							</div>
						</div>
					</div>
					<div>
                      <hr style="height: 5px;background-color: #808080">
                    </div>
                                   
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ข้าพเจ้า</label>
                                <input class="form-control" name="7" id="1_name" data-validate="required" placeholder="ชื่อ นามสกุล"  <?php if($numdoc1>0){?>value="<?php echo $Data->name?>"<?php }else{?>value="<?php echo $getuser2->titlename.' '.$getuser2->firstname.' '.$getuser2->lastname?>"<?php }?>/>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">ตำแหน่ง</label>
                                <input class="form-control" name="8" id="1_position" data-validate="required" placeholder="ตำแหน่ง" value="<?php if($numdoc1>0){echo $Data->position;}else{echo $getuser2->position;}?>"/>
							</div>
						</div>
						
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">สังกัด</label>
								<input class="form-control" name="9" id="1_major" data-validate="required" placeholder="สังกัด" value="<?php if($numdoc1>0){echo $Data->major;}?>"/>
							</div>
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="full_name">พร้อมด้วย</label>
								<input class="form-control" name="10" id="1_with" data-validate="required" placeholder="ผู้ติดตาม/คณะผู้ติดตาม" value="<?php if($numdoc1>0){echo $Data->doc_with;}?>"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
                        <?php if($numdoc1>0){ ?>
                        <div class="form-group">
								<label class="control-label" for="full_name">เดินทางไปปฏิบัติราชการ</label>
                                <select name="11" id="1_goto" class="selectboxit"><option value="">-- เลือก --</option><option value="1" <?php if($Data->goto == '1'){ echo 'selected'; } ?> >เข้าร่วมประชุม</option><option value="2" <?php if($Data->goto == '2'){ echo 'selected'; } ?> >เข้าร่วมประชุมทางวิชาการ</option><option value="3" <?php if($Data->goto == '3'){ echo 'selected'; } ?> >ฝึกอบรม</option><option value="4" <?php if($Data->goto == '4'){ echo 'selected'; } ?> >ดูงาน</option><option value="5" <?php if($Data->goto == '5'){ echo 'selected'; } ?> >ประชุมเชิงปฎิบัติการ</option><option value="6" <?php if($Data->goto == '6'){ echo 'selected'; } ?> >ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>
								
							</div>
                        <?php }else{ ?>
							<div class="form-group">
								<label class="control-label" for="full_name">เดินทางไปปฏิบัติราชการ</label>
                                <select name="11" id="1_goto" class="selectboxit"><option value="">-- เลือก --</option><option value="1" <?php if($documentData2->travel_for == '1'){ echo 'selected'; } ?> >เข้าร่วมประชุม</option><option value="2" <?php if($documentData2->travel_for == '2'){ echo 'selected'; } ?> >เข้าร่วมประชุมทางวิชาการ</option><option value="3" <?php if($documentData2->travel_for == '3'){ echo 'selected'; } ?> >ฝึกอบรม</option><option value="4" <?php if($documentData2->travel_for == '4'){ echo 'selected'; } ?> >ดูงาน</option><option value="5" <?php if($documentData2->travel_for == '5'){ echo 'selected'; } ?> >ประชุมเชิงปฎิบัติการ</option><option value="6" <?php if($documentData2->travel_for == '6'){ echo 'selected'; } ?> >ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>
								
							</div>
                        <?php } ?>
						</div>
						<?php if($numdoc1 > 0){ ?>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">โดยออกเดินทางจาก</label>
								<select name="11_1" id="1_start" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก"<?php if(($Data->start == 'บ้านพัก')&&($numdoc1>0)){ echo 'selected'; } ?>>บ้านพัก</option>
										<option value="สำนักงาน" <?php if(($Data->start == 'สำนักงาน')&&($numdoc1>0)){ echo 'selected'; } ?>>สำนักงาน</option>
										<option value="ประเทศไทย" <?php if(($Data->start == 'ประเทศไทย')&&($numdoc1>0)){ echo 'selected'; } ?>>ประเทศไทย</option>
								</select>
							</div>
						</div>
                        <?php }else{ ?>
                        <div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">โดยออกเดินทางจาก</label>
								<select name="11_1" id="1_start" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก">บ้านพัก</option>
										<option value="สำนักงาน" >สำนักงาน</option>
										<option value="ประเทศไทย" >ประเทศไทย</option>
								</select>
							</div>
						</div>
                                                <?php } ?>
                                            
						<div class="col-md-4">
							<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">ตั้งแต่วันที่</label>
                                 </div><br>
                                 <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                                      <input class="form-control" name="12" id="1_datestart" type="date" value="<?php if($doc1_id!=''){ echo $Data->datestart; }?>" data-validate="required" onchange="calculateday(this.value)"/>
                                 </div>
                                 <div class="col-md-3" style="padding-right: 0px;">
                                      <select class="form-control" id="transfer_h_time1" name="transfer_h_time1" onchange="calculatedayh(this.value)">
                               <option value="00">-- ชั่วโมง --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if(($doc1_id != '')&&($txt.$a==$h)){ echo "selected";}?>  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-3" style="padding-right: 0px;">
                                 <select class="form-control" id="transfer_m_time1" name="transfer_m_time1" onchange="calculatedaym(this.value)">
                               <option value="00">-- นาที --</option>
							<?php for($x=0; $x<=59; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$x?>" <?php if(($doc1_id != '')&&($txt.$x==$m)){ echo "selected";}?> ><?php echo $txt.$x?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
						</div>
					</div>

					<div class="row">
                                            <?php if($numdoc1>0){?>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">กลับถึง</label>
								<select name="12_1" id="1_end" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก" <?php if(($Data->end == 'บ้านพัก')&&($numdoc1>0)){ echo 'selected'; } ?>>บ้านพัก</option>
										<option value="สำนักงาน" <?php if(($Data->end == 'สำนักงาน')&&($numdoc1>0)){ echo 'selected'; } ?>>สำนักงาน</option>
										<option value="ประเทศไทย" <?php if(($Data->end == 'ประเทศไทย')&&($numdoc1>0)){ echo 'selected'; } ?>>ประเทศไทย</option>
								</select>
							</div>
						</div>
                                            <?php }else{?>
                                            <div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">กลับถึง</label>
								<select name="12_1" id="1_end" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="บ้านพัก" >บ้านพัก</option>
										<option value="สำนักงาน" >สำนักงาน</option>
										<option value="ประเทศไทย" >ประเทศไทย</option>
								</select>
							</div>
						</div>
                                            <?php }?>
						<div class="col-md-4">
							<div class="form-group">
                                 <div class="col-md-12" style="padding-left: 0px;">
                                      <label class="control-label" for="birthdate">ในวันที่</label>
                                 </div><br>
                                 <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                                      <input class="form-control" name="13" id="1_dateend" type="date" value="<?php if($doc1_id!=''){ echo $Data->dateend; }?>" data-validate="required" onchange="calculatedayend(this.value)"/>
                                 </div>
                                 <div class="col-md-3" style="padding-right: 0px;">
                                      <select class="form-control" id="transfer_h_time2" name="transfer_h_time2" onchange="calculatedayendh(this.value)">
                               <option value="00">-- ชั่วโมง --</option>
							<?php for($a=1; $a<=24; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$a?>" <?php if(($doc1_id != '')&&($txt.$a==$h1)){ echo "selected";}?>  ><?php echo $txt.$a?></option>	
							<?php }	?>
							</select>
<!--                                                                    <input class="form-control" type="time" id="timestart" name="timestart" value="<?php //if($doc1_id!=''){echo $timestart;}else{echo date("H:i");} ?>" />-->
							</div>
                            <div class="col-md-3" style="padding-right: 0px;">
                                 <select class="form-control" id="transfer_m_time2" name="transfer_m_time2" onchange="calculatedayendm(this.value)">
                               <option value="00">-- นาที --</option>
							<?php for($x=0; $x<=59; $x++){ 
								
									if($x < 10){  $txt = '0';  } else { $txt =''; }
							?>								
								<option value="<?php echo $txt.$x?>" <?php if(($doc1_id != '')&&($txt.$x==$m1)){ echo "selected";}?>  ><?php echo $txt.$x?></option>
	
							<?php }	?>
							</select>

							</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเวลาไปราชการครั้งนี้ (จำนวนวัน)</label>
                                                                <input name="14" class="form-control" id="1_sumdate" data-validate="required" placeholder="จำนวนวัน" value="<?php if($numdoc1>0){ echo $Data->sumdate; }?>" type="text" readonly/>
							</div>
						</div>
					</div>
<div>
                                     <hr style="height: 5px;background-color: #808080">
                                    </div>
					<div class="row">
						<div class="col-md-6">
                                                    <?php if($numdoc1>0){?>
							<div class="form-group">
								<label class="control-label" for="birthdate">ข้าพเจ้าขอเบิกสำหรับ</label>
								<select name="14_1" id="1_allowfor" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
                                                                                <option value="ข้าพเจ้า" <?php if(($Data->allowfor == 'ข้าพเจ้า')&&($numdoc1>0)){ echo 'selected'; } ?>>ข้าพเจ้า</option>
										<option value="คณะเดินทาง" <?php if(($Data->allowfor == 'คณะเดินทาง')&&($numdoc1>0)){ echo 'selected'; } ?>>คณะเดินทาง</option>
								</select>
							</div>
                                                    <?php }else{?>
							<div class="form-group">
								<label class="control-label" for="birthdate">ข้าพเจ้าขอเบิกสำหรับ</label>
								<select name="14_1" id="1_allowfor" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
                                                                                <option value="ข้าพเจ้า" >ข้าพเจ้า</option>
										<option value="คณะเดินทาง" selected>คณะเดินทาง</option>
								</select>
							</div>
                                                    <?php }?>
						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเบี้ยเลี้ยง (จำนวนเงินต่อวัน)</label>
                                                                <input class="form-control" name="15" id="1_travel" data-validate="required" placeholder="จำนวนเงินต่อวัน" onChange="calculateAmount(this.value, '1', '1_travelday', '1_travelprice')" value="<?php if($numdoc1>0){echo $Data->travel;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนวัน</label>
								<input class="form-control" name="16" id="1_travelday" data-validate="required" placeholder="จำนวนวัน" onChange="calculateAmount(this.value, '1', '1_travel', '1_travelprice')" value="<?php if($numdoc1>0){echo $Data->travelday;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
                                                                <input class="form-control withdraw1" name="17" id="1_travelprice" data-validate="required" placeholder="รวมเงิน" readonly value="<?php if($numdoc1>0){echo $Data->travelprice;}?>" type="number"/>
							</div>
						</div>
					</div>

					<div class="row">
                                            <?php if($numdoc1>0){?>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเช่าที่พักประเภท</label>
                                                                <select  id="typerent" name="18" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="เหมาจ่าย" <?php if(($Data->resident == 'เหมาจ่าย')&&($numdoc1>0)){ echo 'selected'; } ?>>เหมาจ่าย</option>
										<option value="ตามจ่ายจริง" <?php if(($Data->resident == 'ตามจ่ายจริง')&&($numdoc1>0)){ echo 'selected'; } ?>>ตามจ่ายจริง</option>
								</select>
<!--								<input class="form-control" name="18" id="1_resident" data-validate="required" placeholder="ระบุ" />-->
							</div>
						</div>
                                            <?php }else{?>
                                            <div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าเช่าที่พักประเภท</label>
                                                                <select  id="typerent" name="18" class="selectboxit">
										<option value="">-------โปรดเลือก------</option>
										<option value="เหมาจ่าย" >เหมาจ่าย</option>
										<option value="ตามจ่ายจริง" >ตามจ่ายจริง</option>
								</select>
<!--								<input class="form-control" name="18" id="1_resident" data-validate="required" placeholder="ระบุ" />-->
							</div>
						</div>
                                            <?php }?>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">จำนวนวัน</label>
								<input class="form-control" name="19" id="1_residentday" data-validate="required" placeholder="จำนวนวัน" value="<?php if($numdoc1>0){echo $Data->residentday;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control withdraw1" name="20" id="1_residentprice" data-validate="required" placeholder="รวมเงิน" onChange="calculate_totalPrice(this.value, '1')" value="<?php if($numdoc1>0){echo $Data->residentprice;}?>" type="number"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าพาหนะ (จำนวนเงิน)</label>
								<input class="form-control" name="21" id="1_vehical" placeholder="จำนวนเงิน" data-validate="required" onChange="calculateAmount(this.value, '1', '1_traveldayhid', '1_vehicalprice')" value="<?php if($numdoc1>0){echo $Data->vehical;}?>" type="number"/>
                                                                <input type="hidden" class="form-control"  id="1_traveldayhid" data-validate="required" placeholder="จำนวนวัน" onChange="calculateAmount(this.value, '1', '1_vehical', '1_vehicalprice')" value="1" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control withdraw1" name="22" id="1_vehicalprice" data-validate="required" placeholder="รวมเงิน" readonly value="<?php if($numdoc1>0){echo $Data->vehicalprice;}?>" type="number"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label class="control-label" for="birthdate">ค่าใช้จ่ายอื่นๆ (จำนวนเงิน)</label>
								<input class="form-control" name="23" id="1_other" placeholder="จำนวนเงิน" data-validate="required" onChange="calculateAmount(this.value, '1', '1_otherhid', '1_otherprice')" value="<?php if($numdoc1>0){echo $Data->other;}?>" type="number"/>
                                                                 <input type="hidden" class="form-control"  id="1_otherhid" data-validate="required" placeholder="จำนวนวัน" onChange="calculateAmount(this.value, '1', '1_other', '1_otherprice')" value="1" />
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงิน</label>
								<input class="form-control withdraw1" name="24" id="1_otherprice" data-validate="required" placeholder="รวมเงิน" readonly value="<?php if($numdoc1>0){echo $Data->otherprice;}?>" type="number"/>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">รวมเงินทั้งสิ้น (ใบเสร็จรับเงินสมบูรณ์)</label>
								<input class="form-control" name="25" id="1_sumprice" data-validate="required" placeholder="รวมเงิน" readonly value="<?php if($numdoc1>0){echo $Data->sumprice;}?>" type="number"/>
							</div>
						</div>
					</div>
                                        <div class="form-group">
						<div class="checkbox checkbox-replace">
                                                    <input type="checkbox" name="chkshowdiv" id="chk-showdiv" onclick="showdiv()" value="1" <?php if(($numdoc1>0)&&($Data->checkno!=null)){echo 'checked';}?>>
							<label for="chk-showdiv">กรณีไม่มี ใบเสร็จรับเงิน หรือ ใบเสร็จรับเงินไม่สมบูรณ์ (ยกเว้นค่าเบี้ยเลี้ยง)</label>
							
						</div>
					</div>

                                    <div class="form-group" id="showdiv" <?php if(($numdoc1>0)&&($Data->checkno!=null)){?>style=""<?php }else{?>style="display:none"<?php }?>>
						<div class="container3">
                                                    
                                                    <?php $n=1;
                                                    
                                                    if($doc1_id>0){$numdoc_3 = $getdoc3->num_rows();
                                                    if($numdoc_3>0){foreach ($getdoc3->result() AS $Data3){?>
                                                    
						<div class="row" >
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="42[]" id="3_date<?php echo $n?>" data-validate="required" type="date" value="<?php echo $Data3->date?>" placeholder="วันที่" />
								</div>
							</div>
							

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <select name="43[]" id="3_detail<?php echo $n?>" class="form-control" ><option value="">-------โปรดเลือก------</option>
                                                                             <option value="ค่าเช่าที่พัก" <?php if($Data3->detail=='ค่าเช่าที่พัก'){echo 'selected';}?>>ค่าเช่าที่พัก</option>
                        <option value="ค่าพาหนะ" <?php if($Data3->detail=='ค่าพาหนะ'){echo 'selected';}?>>ค่าพาหนะ</option>
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="44[]" id="3_price<?php echo $n?>" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" value="<?php echo $Data3->price?>" type="number"/>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="45[]" id="3_other<?php echo $n?>" data-validate="required" placeholder="หมายเหตุ" value="<?php echo $Data3->other?>"/>
                                                                         <input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden"/>
								</div>
							</div>

							<div class="col-md-1" id="delete<?php echo $n?>">
								<br>
                                                                <?php if($n==1){?>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                                                <?php }else{?>
                                                                <a href="javascript:void(0);" onclick="deletedoc_3('<?php echo $Data3->id?>','tbl_doc_3','<?php echo $n?>')">Delete</a>
                                                                <?php }?>
							</div>
						</div>
                                                    <?php $n++;}}else{?>
                                                    <?php }?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="42[]" id="3_date1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่" />
								</div>
							</div>
							

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <select name="43[]" id="3_detail1" class="form-control" ><option value="">-------โปรดเลือก------</option><option value="ค่าเช่าที่พัก">ค่าเช่าที่พัก</option><option value="ค่าพาหนะ">ค่าพาหนะ</option>
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="44[]" id="3_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number"/>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="45[]" id="3_other1" data-validate="required" placeholder="หมายเหตุ" />
                                                                        <input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden" />
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                              <?php  }else{?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="42[]" id="3_date1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่" />
								</div>
							</div>
							

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <select name="43[]" id="3_detail1" class="form-control" ><option value="">-------โปรดเลือก------</option><option value="ค่าเช่าที่พัก">ค่าเช่าที่พัก</option><option value="ค่าพาหนะ">ค่าพาหนะ</option>
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="44[]" id="3_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number"/>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="45[]" id="3_other1" data-validate="required" placeholder="หมายเหตุ" />
                                    <input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden" />
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field3 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                    <?php }?>
                                                     <input type="hidden" id="z" value="<?php echo $n?>">
					</div><!--div container3-->
<div class="form-group">
						<div class="checkbox checkbox-replace">
                                                    <input type="checkbox" name="chkshowauthor" id="chk-showauthor" onclick="showauthor()" value="1" <?php if(($numdoc1>0)&&($Data->checkexpenses!=null)){echo 'checked';}?>>
							<label for="chk-showauthor">ค่าใช้จ่ายอื่นๆ</label>
<!--							<p></p>-->
						</div>
					</div>
                                        <div class="form-group" id="showauthor" <?php if(($numdoc1>0)&&($Data->checkexpenses!=null)){?>style=""<?php }else{?>style="display:none"<?php }?>>
						<div class="container4">
                                                     <?php $a=1;
                                                   
                                                    if($numdoc1>0){$numdoc_3_1 = $getdoc3_1->num_rows();
                                                    if($numdoc_3_1>0){foreach ($getdoc3_1->result() AS $Data3_1){?>
                                                   
						<div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="46[]" id="4_date<?php echo $a?>" data-validate="required" type="date" value="<?php echo $Data3_1->date ?>" placeholder="วันที่" />
								</div>
							</div>
							

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                        <input class="form-control" name="47[]" id="4_detail<?php echo $a?>" data-validate="required" placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" value="<?php echo $Data3_1->detail ?>" />
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="48[]" id="4_price<?php echo $a?>" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" value="<?php echo $Data3_1->price ?>" type="number"/>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="49[]" id="4_other<?php echo $a?>" data-validate="required" placeholder="หมายเหตุ" value="<?php echo $Data3_1->other ?>"/>
                                                                        <input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>
								</div>
							</div>
                                                    
							<div class="col-md-1" id="deletet<?php echo $a?>">
								<br>
                                                                <?php if($a==1){?>
								<button type="button" class="add_form_field4 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
                                                                <?php }else{?>
                                                                <a href="javascript:void(0);" onclick="deletedoc_3_1('<?php echo $Data3_1->id?>','tbl_doc_3','<?php echo $a?>')" class="delete">Delete</a>
                                                                <?php }?>
							</div>
						</div>
                                                    <?php $a++;}}else{?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="46[]" id="4_date1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่" />
								</div>
							</div>
							

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                    <input class="form-control" name="47[]" id="4_detail1" data-validate="required" placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" />
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="48[]" id="4_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number"/>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="49[]" id="4_other1" data-validate="required" placeholder="หมายเหตุ" />
                                                                        <input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field4 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                    <?php }?>
                                                    <?php }else{?>
                                                    <div class="row">
							<div class="col-md-2">
								<div class="form-group">
									<label class="control-label" for="birthdate">วัน/เดือน/ปี</label>
									<input class="form-control" name="46[]" id="4_date1" data-validate="required" type="date" value="<?php echo date('Y-m-d'); ?>" placeholder="วันที่" />
								</div>
							</div>
							

							<div class="col-md-5">
								<div class="form-group">
									<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>
                                                                         <input class="form-control" name="47[]" id="4_detail1" data-validate="required" placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" />
										
								</select> 
<!--									<input class="form-control" name="43[]"  data-validate="required" placeholder="รายละเอียดรายจ่าย" />-->
								</div>
							</div>

							<div class="col-md-1">
								<div class="form-group">
									<label class="control-label" for="birthdate">จำนวนเงิน</label>
									<input class="form-control qty1" name="48[]" id="4_price1" data-validate="required" placeholder="จำนวนเงิน" onchange="sumqty()" type="number"/>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label" for="birthdate">หมายเหตุ</label>
									<input class="form-control" name="49[]" id="4_other1" data-validate="required" placeholder="หมายเหตุ" />
                                                                        <input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>
								</div>
							</div>

							<div class="col-md-1">
								<br>
								<button type="button" class="add_form_field4 btn btn-gold btn-icon">เพิ่มช่อง<i class="entypo-plus"></i> </button>
							</div>
						</div>
                                                    <?php }?>
                                                     <input type="hidden" id="z1" value="<?php echo $a?>">
					</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
							</div>
						</div>

						<div class="col-md-4"></div>

						<div class="col-md-1">
							<br>
							&nbsp;&nbsp;&nbsp;&nbsp; รวมเงิน
						</div>

						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label" for="birthdate">จำนวนเงิน (ใบเสร็จรับเงินไม่สมบูรณ์)</label>
                               <input class="form-control total" name="50" id="3_sum" data-validate="required" placeholder="จำนวนเงิน" readonly value="<?php if(($numdoc1>0)&&($Data->checkno!=null)){echo $Data->Incomplete_receipt;}?>" type="number"/>
							</div>
						</div>

						<div class="col-md-2"></div>
					</div>

					</div>
					<div class="form-group">
						<div class="checkbox checkbox-replace">
                            <input type="checkbox" name="chkrules" id="chkrules" onclick="enablebutton(this.checked)">
							<label for="chk-rules">ข้าพเจ้าขอรับรองว่ารายการที่กล่าวมาข้างต้นเป็นความจริง และหลักฐานการจ่ายที่ส่งมาด้วย รวมทั้งจำนวนเงินที่ขอเบิกถูกต้องตามกฎหมายทุกประการ</label><br>
                            <label for="chk-rules" style="color:red">(กรุณากดเลือกปุ่มรับรองความจริงก่อนบันทึกข้อมูล)</label>  
						</div>
					</div>
                    <div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="full_name">ใบเสร็จรับเงินสมบูรณ์</label>
                                <input class="form-control" name="51" id="1_sumprice1" data-validate="required" placeholder="ใบเสร็จรับเงินสมบูรณ์" readonly value="<?php if($numdoc1>0){echo $Data->sumprice;}?>" type="number"/>
							</div>
						</div>
                        <div class="col-md-4" id="billnosuccess" <?php if(($numdoc1>0)&&($Data->checkno!=null)){?>style=""<?php }else{?>style="display:none"<?php }?>>
							<div class="form-group">
								<label class="control-label" for="full_name">ใบเสร็จรับเงินไม่สมบูรณ์</label>
                                <input class="form-control total1" name="52" id="total1" data-validate="required" placeholder="ใบเสร็จรับเงินไม่สมบูรณ์" readonly value="<?php if(($numdoc1>0)&&($Data->checkno!=null)){echo $Data->Incomplete_receipt;}?>" type="number"/>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="birthdate">รวมเงินทั้งสิ้น</label>
								<input class="form-control" name="53" id="sumtotal" data-validate="required" type="text" placeholder="รวมเงินทั้งสิ้น" readonly value="<?php if($numdoc1>0){echo $Data->sumtotal_price;}?>" />
							</div>
						</div>
						<input type="hidden" id="money_spent" value="<?php if($numdoc1 > 0){ echo $Data->sumprice; }?>" >						
					</div>
                    <div class="form-group" style="text-align:center">
						<div class="">
                           <button class="btn btn-info" type="submit" id="btn1" disabled>บันทึกข้อมูล</button><br>
                           <label  style="color:red">(กรุณากดเลือกปุ่มรับรองความจริงก่อนบันทึกข้อมูล)</label>
						</div>
					</div>
				</div>
                <input type="hidden" id="checkhidden" >
                            
                <div class="tab-pane" id="tab2-4"> 
				<div class="container-full">
            	<!--<iframe id="iframe" src="package_pdf/1Quotation_<?php //echo $_GET['OrderNo']?>.pdf"></iframe> -->     
                      <iframe id="iframe" src="http://www.fempsu.com.122.155.167.147.no-domain.name/Printer_controller/Preview_doc_group/<?php echo $idsaraban?>/<?php echo $type_travel?>" style="width:100%;height:640px"></iframe>     
            	</div>
                <br>
                <div class="row" style="text-align:center">
                     <button type="button" class="btn btn-success" onclick="upload()" >ไฟล์หลักฐานการจ่าย</button>&nbsp;
                     <button type="button" class="btn btn-info" style="width:8%" onclick="savedata('<?php echo $idsaraban?>','<?php echo $table?>')">ยืนยัน</button>
                </div>
				</div>
				<ul class="pager wizard">
					<li class="previous">
						<a href="#"><i class="entypo-left-open"></i> Previous</a>
					</li>
					<li class="next">
                       <a href="#" class="<?php if($numdoc2>0){echo '';}else{echo 'isDisabled';}?>" id="nextnext">Next <i class="entypo-right-open"></i></a>
					</li>
				</ul>
			</div>		
		</form>
		<div id="modal-upload-saraban" class="modal fade" role="dialog" >
									<div class="modal-dialog modal-lg ">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													ไฟล์หลักฐานการจ่าย
												</div>
											</div>

											<div class="modal-body">
												<!-- PAGE CONTENT BEGINS -->
												<form enctype="multipart/form-data" id="imgForm" name="imgForm" method="post">
													<div class="row">
														<label class="col-sm-4 text-left" style="line-height: 30px;">เลขสารบรรณ</label>
														<label id="saraban_id" class="col-sm-8 text-left" style="line-height: 30px;"><?php echo $sarabannumber?></label>
															<div class="clear"></div>
														
		<div id="showdata">
 <?php $f = 1;
 $file = $this->Inputform_model->getdocfile($idsaraban,$type_travel);
 $numfile = $file->num_rows();
 if($numfile>0){
     foreach ($file->result() AS $file2){
 ?>
<label class="col-sm-4 text-left" style="line-height: 30px;"><?php if($f==1){?>ไฟล์หลักฐานการจ่าย<?php }?></label>
<div class="col-md-6">
    <p onclick="window.open('<?php echo base_url();?><?php echo $file2->file_name?>','_blank');" style="color:blue; cursor:pointer"><u><?php echo $file2->file_name?></u></p>    
</div>
<div class="col-md-2">
    <i class="entypo-trash" aria-hidden="true" style="cursor:pointer" onclick="comfirmDelete('<?php echo $idsaraban?>','<?php echo $file2->file_name?>','<?php echo $type_travel?>')"></i>
</div>
<div class="clear"></div>
     <?php $f++; } } ?>
</div>												
<label class="col-sm-4 text-left" style="line-height: 30px;">อัพโหลดไฟล์หลักฐานการจ่าย</label>
	<div class="col-md-8">
		<input type="file" class="form-control" placeholder="" id="img2" name="img2[]" multiple style="height: 35px;" ><br>
<p style="color:red">(รองรับไฟล์นามสกุล .jpg .png .jpeg .pdf และขนาดไฟล์ควรมีขนาดไม่เกิน 2 MB)</p>                                                                                                                            
		<input type="hidden" id="outboundid" name="outboundid" value="<?php echo $idsaraban?>">  
		<input type="hidden" id="sarabannumber" name="sarabannumber" value="<?php echo $sarabannumber?>"> <input type="hidden" id="doc1_id" name="doc1_id" value="<?php echo $doc1_id?>">
		<input type="hidden" id="type_travel" name="type_travel" value="<?php echo $type_travel?>">	
	</div> 
</div>	
												</form> 
											</div>

											<div class="modal-footer no-margin-top">
												<button type="button" class="btn btn-lg btn-success " onClick="Addimg()" ><i class="ace-icon fa fa-check"></i>บันทึก</button>
												<button class="btn btn-lg btn-danger pull-right" data-dismiss="modal"><i class="ace-icon fa fa-times"></i>ปิด</button>	
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
		<!-- Footer -->
		<footer class="main">
			&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>
		</footer>	
	</div> 
</div>
	
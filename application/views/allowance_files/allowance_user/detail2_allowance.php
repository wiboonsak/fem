<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>allowance/assets/FontTHSarabun/styles.css">
	<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">คำขออนุมัติเดินทางไปต่างประเทศ</h2>
		<br/><br/>
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 80%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
					<!--<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							รายละเอียดคำขออนุมัติเดินทาง
						</div>						
					</div>-->
					
					<div class="panel-body">
								
						<form role="form" class="form-horizontal form-groups-bordered" >
							
							<?php /* ?><div class="form-group">
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
									<input style="font-size: 16px" type="text" class="form-control" id="field-3" value="คณบดีคณะการจัดการสิ่งแวดล้อม"  onkeyup="	$('#field-3_error').html('').css('color', 'red');">
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
										<input type="radio" id="rd-2" name="radio1" value="0" onchange ="	$('#radio1_error').html('').css('color', 'red');">
										<label>กรณีได้รับมอบหมาย</label>
									</div>
									<span id='radio1_error'></span>								
								</div>
							</div><?php */ ?>
							
							
	<?php $career_id = '';
		  $dataId = $this->session->userdata['logged_in']['id'];
		  $userDetail = $this->Allowance_model->get_userDetail($dataId); 
		  foreach($userDetail->result() as $userDetail2){ }
		  $career_id = $userDetail2->career_id;	
							
		  $careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
		  foreach($careerData->result() as $careerData2){ }
							
		  $positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
		  foreach($positionData->result() as $positionData2){ }
		  			
	?>								
							
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="80" height="159" valign="top"><img src="<?php echo base_url();?>allowance/assets/logo_psu.png" width="80" height="132" alt=""/></td>
      <td align="center" valign="bottom" style="font-size: 18pt; font-weight: 600;">บันทึกข้อความ&nbsp;&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
		<td width="115" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">ส่วนงาน</span></td>
		<td width="648" height="30" align="left" valign="bottom">คณะการจัดการสิ่งแวดล้อม</td>
		<td width="737" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">โทร.</span>&nbsp;6805</td>
    </tr>
    <tr>
      <td height="5" align="left"></td>
      <td height="5" align="left" style="border-top: 1px dotted #000000;"></td>
      <td align="left" style="border-top: 1px dotted #000000;"></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
		<td width="27" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">ที่</span></td>
      <td width="736" height="30" align="left" valign="bottom">มอ 820/</td>
	  <td width="62" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">&nbsp;&nbsp;วันที่</span></td>
      <td width="675" height="30" align="center" valign="bottom">9&nbsp;มกราคม&nbsp;2562</td>
    </tr>
    <tr>
      <td height="5"></td>
      <td height="5" style="border-top: 1px dotted #000000;"></td>
      <td height="5"></td>
      <td height="5" style="border-top: 1px dotted #000000;"></td>
    </tr>
   
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="5%" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">เรื่อง</span></td>
      <td width="95%" height="30" align="left" valign="bottom"><input type="text" name="textfield2" id="textfield2" placeholder="ระบุชื่อเรื่อง" class="input-data" style="width: 100%;"></td>
    </tr>
    <!--<tr>
      <td height="5"></td>
      <td height="5" style="border-top: 1px dotted #000000;"></td>
    </tr>-->
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td height="30" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="80" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">เรียน</span></td>
      <td width="1420" height="30" align="left" valign="bottom"><?php if($career_id == '5'){ echo 'อธิการบดี'; } if($career_id == '4'){ echo 'คณบดีคณะการจัดการสิ่งแวดล้อม'; }?>		  
		  <!--คณบดีคณะการจัดการสิ่งแวดล้อม&nbsp; &lt;&lt; ถ้าเป็นพนักงาน&nbsp; &nbsp;//&nbsp; เรียน&nbsp; อธิการบดี&nbsp; &lt;&lt; ถ้าเป็นข้าราชการ--></td>
    </tr>
    <tr>
      <td height="30" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วย <?php echo $userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname; ?><!--  วรดร ไผ่เรือง--> <?php echo $careerData2->career; ?>&nbsp;ตำแหน่ง<?php echo $positionData2->position; ?>&nbsp;<?php //if($career_id == '5'){?>ตำแหน่งเลขที่ <?php echo $userDetail2->position_number;  //}?>&nbsp;<!-- { เฉพาะข้าราชการมี&nbsp; --><?php if($career_id == '4'){?>อัตราค่าจ้าง <?php echo number_format($userDetail2->wage); ?> บาท<?php } ?>&nbsp;สังกัดคณะการจัดการสิ่งแวดล้อม มีความประสงค์จะเดินทางไปปฎิบัติงานเพื่อ
        <select class="input-data"><option value="">เข้าร่วมประชุม</option><option value="">เข้าร่วมประชุมทางวิชาการ</option><option value="">ฝึกอบรม</option><option value="">ดูงาน</option><option value="">ประชุมเชิงปฎิบัติการ</option></select>
        &nbsp;เรื่อง <input type="text" name="textfield" id="textfield" placeholder="ระบุชื่อเรื่อง" class="input-data" <?php if($career_id == '5'){ ?>style="width: 100%;"<?php } ?> <?php if($career_id == '4'){ ?>style="width: 79%;"<?php } ?> >&nbsp;ณ&nbsp;<input type="text" name="textfield" id="textfield" placeholder="ระบุสถานที่" class="input-data" style="width: 600px;">&nbsp;มีกำหนด&nbsp;<span id="numDay">0</span>&nbsp;วัน&nbsp;ตั้งแต่วันที่&nbsp;<input type="date" class="input-data" id="startDate" style="padding: 0px !important">&nbsp;ถึง&nbsp;<input type="date" id="endDate" class="input-data" onChange="countDays(this.value)" style="padding: 0px !important">&nbsp;โดยใช้เงินสนับสนุนจาก&nbsp;<input type="text" name="textfield6" id="textfield16" placeholder="ระบุแหล่งเงิน" class="input-data" style="width: 75%;">&nbsp;ดังเอกสารที่แนบมาพร้อมนี้</td>
    </tr>
    <tr>
      <td height="40">&nbsp;</td>
    </tr>
	  
<?php if($money == '1'){?>	
	<tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดยเบิกค่าใช้จ่ายจากคณะ&nbsp;จำนวน&nbsp;<input type="text" name="textfield11" id="textfield3" placeholder="ระบุจำนวนเงิน" class="input-data" style="width: 200px;">&nbsp;บาท&nbsp;โดยมีค่าใช้จ่ายดังนี้<br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="99" align="right">1.</td>
              <td width="119" align="left">&nbsp;ค่าเบี้ยเลี้ยง</td>
              <td width="106" align="center"><input type="text" name="textfield8" id="textfield9" placeholder="" class="input-data" style="width: 100px;"></td>
              <td width="62" align="center">วัน</td>
              <td width="242" align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
              <td width="149" align="center"><input type="text" name="textfield7" id="textfield8" placeholder="" class="input-data" style="width: 100px;"></td>
              <td width="423" align="left">บาท</td>
            </tr>
            <tr>
              <td width="99" align="right">2.</td>
              <td align="left">&nbsp;ค่าที่พัก</td>
              <td align="center"><input type="text" name="textfield8" id="textfield9" placeholder="" class="input-data" style="width: 100px;"></td>
              <td align="center">วัน</td>
              <td align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
              <td align="center"><input type="text" name="textfield7" id="textfield8" placeholder="" class="input-data" style="width: 100px;"></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td width="99" align="right">3.</td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center"><input type="text" name="textfield8" id="textfield9" placeholder="" class="input-data" style="width: 100px;"></td>
              <td align="center">วัน</td>
              <td align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
              <td align="center"><input type="text" name="textfield7" id="textfield8" placeholder="" class="input-data" style="width: 100px;"></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td width="99" align="right">4.</td>
              <td colspan="6" align="left">&nbsp;อื่นๆ
              <input type="text" name="textfield9" id="textfield10" placeholder="" class="input-data" style="width: 300px;"></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="3" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="textfield7" id="textfield8" placeholder="" class="input-data" style="width: 100px;"></td>
              <td align="left">บาท</td>
            </tr>
          </tbody>
        </table>
		</td>
    </tr>	  
	<tr>
      <td height="40">&nbsp;</td>
    </tr>
<?php } ?>	  
	  
	<?php if($career_id == '4'){ 
	  
	$url3 = 'Printer_controller/Preview';
	  
	  ?>  
    <!--<tr bgcolor="#E3E3E3">
      <td height="40">----- พนักงาน</td>
    </tr>-->
    <tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา หากเห็นชอบด้วยกรุณาอนุมัติ และ
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="85" align="right"><input type="checkbox" name="checkbox2" id="checkbox2"></td>
              <td width="1101" align="left">&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางทีแน่นอนต่อไปด้วย</td>
            </tr>
            <tr>
              <td width="85" align="right"><input type="checkbox" name="checkbox3" id="checkbox3"></td>
              <td align="left">&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ</td>
            </tr>
          </tbody>
      </table></td>
    </tr>
	<?php } ?> 
	<?php if($career_id == '5'){ 
	  
	$url3 = 'Printer_controller/Preview2';
	  
	  ?>  
    <!--<tr bgcolor="#E3E3E3">
      <td height="40">----- ข้าราชการ</td>
    </tr>-->
    <tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="checkbox" id="checkbox1" onClick="showSpan(this.checked)">&nbsp;&nbsp;หนังสือเดินทางมีอายุไม่ถึง 6 เดือน ณ วันเดินทาง</td>
    </tr>
    <tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="doCH" style="display: none">จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ และลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ แจ้งงานทะเบียนประวัติ และต้นฉบับคืนหน่วยงาน</span><span id="notCH">จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</span><!-- &lt;&lt; ถ้าคลิกช่องหนังสือเดินทาง--></td>
    </tr>
   <!-- <tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</span>  &lt;&lt; ถ้าไม่คลิกช่องหนังสือเดินทาง</td>
    </tr>-->
	<?php } ?>  
    <tr>
      <td height="40">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="600">&nbsp;</td>
      <td width="564" height="30" align="center"><!--(ลงชื่อ).............................................................--></td>
    </tr>
    <tr>
      <td width="600" align="left" valign="bottom">&nbsp;</td>
      <td height="30" align="center" valign="bottom"><input type="text" placeholder="ลงชื่อ" class="input-data" style="width: 263px;"><!--(นายวรดร ไผ่เรือง)--></td>
    </tr>
    <tr>
      <td width="600">&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="600">&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<?php if($career_id == '4'){ ?> 							
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
	  <td align="center"><span style="font-size: 16pt; font-weight: 600;">อนุมัติ</span></td>
      <td height="30">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td height="30">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><!--&lt;&lt; กรณีพนักงาน มีช่องอนุมัติ &gt;&gt;--></td>
      <td height="30">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td height="30">&nbsp;</td>
    </tr>
    <tr>
      <td width="" align="center">(ลงชื่อ).............................................................</td>
      <td width="564" height="30">&nbsp;</td>
    </tr>
    <tr>
      <td width="" align="center" valign="bottom">(ผู้ช่วยศาตราจารย์ ดร.เกื้ออนันต์ เตชะโต)</td>
      <td height="30" align="center" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td width="" align="center">คณบดีคณะการจัดการสิ่งแวดล้อม</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="">&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>				
<?php } ?>	
							
<?php if(($money == '1') && ($career_id == '4')){
							
			$url3 = 'Printer_controller/Preview3';				
}
							
	if(($money == '1') && ($career_id == '5')){
							
			$url3 = 'Printer_controller/Preview4';				
}						
							?>							
							
						

<!---------------------------------------------------------------------------->
							<div class="form-group hidden">
								<label class="col-sm-3 control-label">ประเภทการเบิก</label>
								
								<div class="col-sm-5 ">
									<div class="radio radio-replace">
										<input type="radio" id="rd-2" name="radio2"  value="0" onclick="notExpenses()" checked onchange="	$('#radio2_error').html('').css('color', 'red');">
										<label>ไม่เบิกค่าใช้จ่าย</label>
									</div>
									<span id='radio2_error'></span>								
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
								 		<button type="button" class="btn btn-orange btn-icon" onclick="PreviewTT()">บันทึก<i class="entypo-search"></i></button> 
								 		<!--<button type="button" class="btn btn-orange btn-icon" onclick="Preview()">บันทึก<i class="entypo-search"></i></button> -->
								 		<button type="button" class="btn btn-success btn-icon" onclick="dusubmit_saveANDsend()">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i></button>
								 		<button type="button" class="btn btn-red btn-icon" onclick="doclose()">ปิด<i class="entypo-cancel"></i></button>		
									</p>
								</div>
							</div>
							
					<input type="hidden" id="w22" value="<?php echo $url3?>">		
						
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

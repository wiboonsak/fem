<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>allowance/assets/FontTHSarabun/styles.css">
		<div class="main-content">
			
	
		<h2 style="text-align: center; padding-top: 20px;">รายละเอียดคำขออนุมัติเดินทาง</h2>
		<br />
		<br />
		
		<div class="row">
			<div class="" style="margin: 0 auto; width: 80%">
				
				<div class="panel panel-gradient" data-collapsed="0">
				
					<!--<div class="panel-heading">
						<div class="panel-heading" style="font-size: 12pt !important">
							รายละเอียดคำขออนุมัติเดินทาง
						</div>
						
					</div>-->
					
					<div class="panel-body">

						<script type="text/javascript">
									var  Listfile = [];
									var  id_allow = "";
						</script> 
						
						<form role="form" class="form-horizontal form-groups-bordered">
							<?php /*foreach($getdataAllow as $getdataAllow) { ?> 
							<script type="text/javascript">
								id_allow = "<?php echo $getdataAllow['id_allow']; ?>";
								email 		 = "<?php echo $getdataAllow['email']; ?>";
								topic        = "<?php echo $getdataAllow['topic']; ?>";
								titlename  	 =	"<?php echo $getdataAllow['titlename']; ?>";
								firstname	=	"<?php echo $getdataAllow['firstname']; ?>";
								lastname	=	"<?php echo $getdataAllow['lastname']; ?>";
								date_modify = "<?php echo $getdataAllow['date_modify']; */?>"
							</script>
							<!--<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">หมายเลขสารบรรณ</label>
									<div class="col-sm-9">
										<input type="hidden" class="form-control" id="field" value="<?php //echo $getdataAllow['id_saraban']; ?>">
										<span id='field-0_error'></span>
									</div>
								</div> -->
								 
					<?php /*			<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">เรื่อง</label>
									<div class="col-sm-9">
										<input type="hidden" class="form-control" id="id_allow" value="<?php echo $getdataAllow['id_allow']; ?>">
										<input type="hidden" class="form-control" id="fname" value="<?php echo $getdataAllow['firstname']; ?>">
										<input type="hidden" class="form-control" id="lname" value="<?php echo $getdataAllow['lastname']; ?>">
										<input style="font-size: 16px" readonly type="text" class="form-control" id="field-0" value="<?php echo $getdataAllow['topic']; ?>" >
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
							
							<?php if($getdataAllow['text6'] == '1' ){ ?>
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
							<div class="form-group hidden" id="Expensesform"  >
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
						<?php  }*/ ?>
							
		<?php $career_id = '';  $dataId ='12';  $money = '0';
		  //$dataId = $this->session->userdata['logged_in']['id'];
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
      <td width="675" height="30" align="center" valign="bottom">20&nbsp;เมษายน&nbsp;2561</td>
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
      <td width="95%" height="30" align="left" valign="bottom"><input type="text" name="textfield2" id="textfield2" value="ขออนุมัติเดินทางไปปฏิบัติงาน ณ ต่างประเทศ"  class="input-data" style="width: 100%;"></td>
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
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยคณะการจัดการสิ่งแวดล้อม&nbsp;เสนอขออนุญาตให้&nbsp;<input type="text" name="textfield7" id="textfield5" value="พนักงานมหาวิทยาลัยและพนักงานเงินรายได้"  class="input-data" style="width: 65%;">&nbsp;จำนวน <input type="text" name="textfield8" id="textfield7" value="3"  class="input-data" style="width: 10%;"> ราย เดินทางไป&nbsp;เข้าร่วมประชุม&nbsp;&nbsp;เรื่อง <input type="text" name="textfield" id="textfield" value="การปฎิบัติงานด้านเทคโนโลยีและภูมิสารสนเทศ"  class="input-data" style="width: 880px;"> ณ&nbsp;<input type="text" name="textfield" id="textfield" value="Feng Chia University ประเทศไต้หวัน"  class="input-data" style="width: 75%;">&nbsp;ตั้งแต่วันที่&nbsp;11 มีนาคม 2562&nbsp;ถึง&nbsp;20 มีนาคม 2562 โดยใช้เงินสนับสนุนจาก&nbsp;<input type="text" name="textfield6" id="textfield16" value="รายได้คณะ"  class="input-data" style="width: 55%;">&nbsp;ซึ่งมีรายนามดังต่อไปนี้<br><br>		  
		  
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
		<?php if($career_id == '4'){ ?>	  
            <tr>
              <td align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ลูกจ้างชั่วคราว-งบประมาณ</strong></td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td width="95" align="right">1.&nbsp;</td>
              <td width="450" align="left"><input type="text" name="textfield5" id="textfield6" value="นายนพรัตน บำรุงรักษ์" class="input-data" style="width: 400px;" ></td>
              <td width="350" align="left">ตำแหน่ง
                <select  name="select" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="" selected >อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td width="241" align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield4" id="textfield4" value="0006"  class="input-data" style="width: 100px;"></td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>              
              <td align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>พนักงานมหาวิทยาลัย</strong></td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">2.&nbsp;</td>
              <td align="left"><input type="text" name="textfield9" id="textfield8" value="นางสาวนริสรา นุธรรมโชติ" class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data" >
                  <option value="" selected>อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield9" value="2547"  class="input-data" style="width: 100px;"></td>
            </tr>
            <tr>
              <td align="right">3.&nbsp;</td>
              <td align="left"><input type="text" name="textfield9" id="textfield10" value=" นายคัมภีร พวงทอง"  class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data" >
                  <option value="" selected>อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield11" value="3236"  class="input-data" style="width: 100px;"></td>
            </tr>
		<?php } ?>	  
            <!--<tr>
              <td width="85" align="right">4.</td>
              <td align="left"><input type="text" name="textfield9" id="textfield12" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield13" placeholder="ระบุชื่อตำแหน่ง" class="input-data" style="width: 100px;"></td>
            </tr>
            <tr>
              <td width="85" align="right">5.</td>
              <td align="left"><input type="text" name="textfield9" id="textfield19" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield20" placeholder="ระบุชื่อตำแหน่ง" class="input-data" style="width: 100px;"></td>
            </tr>
            <tr>
              <td width="85" height="40" align="right">6.</td>
              <td align="left"><input type="text" name="textfield9" id="textfield17" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield18" placeholder="ระบุชื่อตำแหน่ง" class="input-data" style="width: 100px;"></td>
            </tr>
            <tr>
              <td width="85" align="right">7.</td>
              <td align="left"><input type="text" name="textfield9" id="textfield14" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield15" placeholder="ระบุชื่อตำแหน่ง" class="input-data" style="width: 100px;"></td>
            </tr>-->
			  
		<?php if($career_id == '5'){ 
			  
		$url3 = 'Printer_controller/PreviewGroup2';	  
			  
			  ?>	  
			  
			<tr>
              <td align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>ข้าราชการ</strong></td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td width="95" align="right">1.&nbsp;</td>
              <td width="450" align="left"><input type="text" name="textfield9" id="textfield8" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"></td>
              <td width="350" align="left">ตำแหน่ง
                <select name="select2" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td width="241" align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield9" placeholder="ระบุชื่อตำแหน่ง" class="input-data" style="width: 100px;"></td>
            </tr>
            <tr>
              <td align="right">2.&nbsp;</td>
              <td align="left"><input type="text" name="textfield9" id="textfield10" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"></td>
              <td align="left">ตำแหน่ง
                <select name="select2" class="input-data">
                  <option value="">อาจารย์</option>
                  <option value="">รองศาสตราจารย์</option>
                  <option value="">ผู้ช่วยศาสตราจารย์</option>
                  <option value="">อาจารย์ผู้มีความรู้-ความสามารถพิเศษ</option>
                  <option value="">นักวิชาการศึกษาชำนาญการพิเศษ</option>
                  <option value="">นักวิจัยชำนาญการพิเศษ</option>
                  <option value="">เจ้าหน้าที่บริหารงานทั่วไปปฎิบัติการ</option>
                </select></td>
              <td align="left">ตำแหน่งเลขที่
                <input type="text" name="textfield9" id="textfield11" placeholder="ระบุชื่อตำแหน่ง" class="input-data" style="width: 100px;"></td>
            </tr>  
		<?php } ?>	  
			  
			  
          </tbody>
        </table>		
		</td>
    </tr>
	  
<?php if($money == '1'){?>	  
    <tr>
      <td height="40">&nbsp;</td>
    </tr>
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
<?php } ?>
	  
	<tr>
      <td height="40">&nbsp;</td>
    </tr>    
    <tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</td>
    </tr>
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
      <td height="30" align="center" valign="bottom"><input type="text" value="รองศาสตราจารย์ ดร.นพรัตน บำรุงรักษ์"  class="input-data" style="width: 263px;"><!--(นายวรดร ไผ่เรือง)--></td>
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
<?php if($career_id == '4'){ 
							
	$url3 = 'Printer_controller/PreviewGroup';							
							
					?> 							
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
									<?php /*if($getdataAllow['file_name1'] != null || $getdataAllow['file_name1'] != "" ){ ?>   
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
									<?php }*/ ?>
							</div>
						</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">ผู้อนุมัติ</label>
									<div class="col-sm-5">
									<select id="sendto" style="width: 100%" >
											<option value="">----------เลือก----------</option>		 			
											<?php foreach ($getapprove as $getapprove): ?> 
											<option value="<?php echo $getapprove['id']; ?>" >
											<?php 
											echo $getapprove['titlename']; ; 
											echo " ";   
											echo $getapprove['firstname'];  
											echo " ";  
											echo $getapprove['lastname']; 
											echo " "; 
											if($getapprove['position_level'] == 3 ){
												echo "คณบดี ";
												}elseif($getapprove['position_level'] == 4 ){
													echo "รองคณบดี " ;
												}  
											 ?>
											</option>
										<?php endforeach ?>
									</select>						
									</div>
								</div>

								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">เสนอ</label>
									<div class="col-sm-9">									
										<input type="text" class="form-control" id="command">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-9">								 
										<p class="bs-example"> 
											<button onclick="sendpass()" type="button" class="btn btn-green btn-icon">ผ่าน<i class="entypo-check"></i> </button> 
											<button onclick="sendfail()" type="button" class="btn btn-red btn-icon">ไม่ผ่าน<i class="entypo-cancel"></i> </button>
											<button  type="button" class="btn btn-blue btn-icon"  onclick="Preview()">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button> 
										</p>
									</div> 
								</div>
							<?php //} ?>
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
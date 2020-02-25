<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>allowance/assets/FontTHSarabun/styles.css">
	<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">สร้างคำขออนุมัติเดินทางไปต่างประเทศ</h2>
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
								
						<form role="form" class="form-horizontal form-groups-bordered" id="frm1" >				
								
	<?php function DateThai($strDate){
				$strYear = date("Y",strtotime($strDate))+543;
				$strMonth= date("n",strtotime($strDate));
				$strDay= date("j",strtotime($strDate));
				$strHour= date("H",strtotime($strDate));
				$strMinute= date("i",strtotime($strDate));
				$strSeconds= date("s",strtotime($strDate));
				$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
				$strMonthThai=$strMonthCut[$strMonth];
				return "$strDay $strMonthThai $strYear";
		 }		
							
		  //$career_id = '';
		  //$dataId = $this->session->userdata['logged_in']['id'];
		  //$userDetail = $this->Allowance_model->get_userDetail($dataId); 
		  foreach($userDetail->result() as $userDetail2){}
          $career_id = $userDetail2->career_id;
		  $array1 = array('1','5');						
		  $array2 = array('2','3','4','6');					
							
		  $careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
		  foreach($careerData->result() as $careerData2){ }
							
		  $positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
		  foreach($positionData->result() as $positionData2){ }	
							
		  foreach($documentData->result() as $documentData2){ }					
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
		<td width="737" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">โทร.</span>&nbsp;<input type="text" name="telephone_number" id="telephone_number" class="input-data" style="width: 150px;" value="<?php if($documentData2->telephone_number != ''){ echo $documentData2->telephone_number; }?>"></td>
    </tr>
    <tr>
      <td height="5" align="left"></td>
      <td height="5" align="left" style="border-top: 1px dotted #000000;"></td>
      <td align="left" style="border-top: 1px dotted #000000;"></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
	<?php $today = $this->Allowance_model->DateThai(date("Y-m-d"));?>
  <tbody><?php
	  /*
	  $documentData2->check_doc 0 , 1, 2, 3 
	  $documentData2->check_doc2 0 , 1, 2, 3 
	  $documentData2->saraban_id 0 , !=0
	  $this->session->userdata['logged_in']['status']  admin_saraban ,  admin , user 
	  $documentData2->approve_status  0 ,1 ,2 
	  $documentData2->approve_status2  0 ,1 ,2 
	  
	  
	  1.user เข้ามาแกไ้ข */
	          $saraban_number = 'มอ 820/';
	  		  	
if(($documentData2->withdraw == '1') && ($documentData2->saraban_number != '')){
	  
	  if(($this->session->userdata['logged_in']['status'] == 'user') && (($documentData2->check_doc != '0') && ($documentData2->check_doc != '3')) && ($documentData2->saraban_number != '')){
	  		
	  		$saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	  	
	  } else if(($this->session->userdata['logged_in']['status'] == 'admin_saraban') && (($documentData2->check_doc != '0') && ($documentData2->check_doc != '3')) && ($documentData2->saraban_number != '')){	  
	         
	       $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	  
	  } else if(($this->session->userdata['logged_in']['status'] == 'user') && ($documentData2->check_doc == '0') && ($documentData2->saraban_number != '')){
		  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	  
	  
	  } else if(($this->session->userdata['logged_in']['status'] == 'approve') && ($documentData2->check_doc == '1') && ($documentData2->saraban_number != '') && ($documentData2->approve_status2 == '2')){
	  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	  
	  } else if(($this->session->userdata['logged_in']['status'] == 'admin') && ($documentData2->check_doc2 != '0') && ($documentData2->check_doc2 != '3') && ($documentData2->approve_status == '1')){
		  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'1');
		  
	  } else if(($this->session->userdata['logged_in']['status'] == 'admin') && (($documentData2->check_doc2 != '0') && ($documentData2->check_doc2 != '3'))){	
		  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'1');
		  
	  } else if(($this->session->userdata['logged_in']['status'] == 'approve') && ($documentData2->check_doc2 == '1') && ($documentData2->saraban_number!= '')){
	         
	      $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'1');
	  
	  } else if(($this->session->userdata['logged_in']['status'] == 'user') && ($documentData2->check_doc2 == '0') && ($documentData2->saraban_number != '')){ 
		  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'1');
	  
	  } else if(($this->session->userdata['logged_in']['status'] == 'user') && ($documentData2->check_doc == '1') && ($documentData2->approve_status == '2') && ($documentData2->saraban_number != '')){	
		  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	  
	  } else if(($this->session->userdata['logged_in']['status'] == 'user') && ($documentData2->check_doc == '1') && ($documentData2->approve_status != '2') && ($documentData2->check_doc2 == '1') && ($documentData2->approve_status2 != '2') && ($documentData2->saraban_number != '')){	
		  
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'1');
	 
	  } else {
	  		
		  $saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	  
	  } 

} else if(($documentData2->withdraw == '0') && ($documentData2->saraban_number != '')){
	$saraban_number = $documentData2->saraban_number;
}
	  
	  
	  
	  
	  ?>
	
	  
	<?php /*$saraban_number = 'มอ 820/';
		  if(($documentData2->check_doc != '3') && ($documentData2->saraban_id != '0') && ($this->session->userdata['logged_in']['status'] == 'admin_saraban')){ 
	
				$saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
	
		  } else if(($documentData2->check_doc == '1') && ($documentData2->check_doc2 != '3') && ($documentData2->approve_status == '1') && ($this->session->userdata['logged_in']['status'] == 'admin')){ 
	
				$saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'1');	
		  }*/  ?>  
    <tr>
		<td width="27" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">ที่</span></td>
      <td width="736" height="30" align="left" valign="bottom"><?php echo $saraban_number?></td>
	  <td width="62" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">&nbsp;&nbsp;วันที่</span></td>
      <td width="675" height="30" align="center" valign="bottom"><?php if($documentData2->date_create != '0000-00-00'){ echo $this->Allowance_model->DateThai($documentData2->date_create); }?></td>
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
      <td width="95%" height="30" align="left" valign="bottom"><input type="text" name="subject_document" id="subject_document" placeholder="ระบุชื่อเรื่อง" class="input-data" style="width: 100%;" value="<?php if($documentData2->subject_document != ''){ echo $documentData2->subject_document; }?>"></td>
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
      <td width="1420" height="30" align="left" valign="bottom"><?php if(in_array($userDetail2->career_id, $array1)){ echo 'อธิการบดี'; }else{ echo 'คณบดีคณะการจัดการสิ่งแวดล้อม'; }?>		  
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
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วย <?php echo $userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname; ?><!--  วรดร ไผ่เรือง--> <?php echo $careerData2->career; ?>&nbsp;ตำแหน่ง<?php echo $positionData2->position; ?>&nbsp;<?php //if($career_id == '5'){?>ตำแหน่งเลขที่ <?php echo $userDetail2->position_number;  //}?>&nbsp;<!-- { เฉพาะข้าราชการมี&nbsp; --><?php if(in_array($userDetail2->career_id, $array2)){?>อัตราค่าจ้าง <?php echo number_format($userDetail2->wage); ?> บาท<?php } ?>&nbsp;สังกัดคณะการจัดการสิ่งแวดล้อม มีความประสงค์จะเดินทางไป<!--ปฎิบัติงานเพื่อ--> <select name="travel_for" id="travel_for" class="input-data"><option value="">-- เลือก --</option><option value="1" <?php if($documentData2->travel_for == '1'){ echo 'selected'; } ?> >เข้าร่วมประชุม</option><option value="2" <?php if($documentData2->travel_for == '2'){ echo 'selected'; } ?> >เข้าร่วมประชุมทางวิชาการ</option><option value="3" <?php if($documentData2->travel_for == '3'){ echo 'selected'; } ?> >ฝึกอบรม</option><option value="4" <?php if($documentData2->travel_for == '4'){ echo 'selected'; } ?> >ดูงาน</option><option value="5" <?php if($documentData2->travel_for == '5'){ echo 'selected'; } ?> >ประชุมเชิงปฎิบัติการ</option><option value="6" <?php if($documentData2->travel_for == '6'){ echo 'selected'; } ?> >ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>&nbsp;เรื่อง <input type="text" name="subject_form" id="subject_form" placeholder="ระบุชื่อเรื่อง" class="input-data" <?php if(in_array($userDetail2->career_id, $array1)){ ?>style="width: 100%;"<?php } ?> <?php if(in_array($userDetail2->career_id, $array2)){ ?>style="width: 79%;"<?php } ?> value="<?php if($documentData2->subject_form != ''){ echo $documentData2->subject_form; }?>">&nbsp;ณ&nbsp;<input type="text" name="place" id="place" placeholder="ระบุสถานที่" class="input-data" style="width: 600px;" value="<?php if($documentData2->place != ''){ echo $documentData2->place; }?>">&nbsp;มีกำหนด&nbsp;<span id="numDay"><?php echo $this->Allowance_model->DateDiff2($documentData2->date_start , $documentData2->date_end);?>       </span>&nbsp;วัน&nbsp;ตั้งแต่วันที่&nbsp;<input type="date" class="input-data" id="date_start" name="date_start" style="padding: 0px !important" value="<?php if($documentData2->date_start != ''){ echo $documentData2->date_start; }?>">&nbsp;ถึง&nbsp;<input type="date" id="date_end" name="date_end" class="input-data" onChange="countDays()" style="padding: 0px !important" value="<?php if($documentData2->date_end != ''){ echo $documentData2->date_end; }?>">&nbsp;โดยใช้เงินสนับสนุนจาก&nbsp;<input type="text" name="money_source" id="money_source" placeholder="ระบุแหล่งเงิน" class="input-data" style="width: 75%;" value="<?php if($documentData2->money_source != ''){ echo $documentData2->money_source; }?>">&nbsp;ดังเอกสารที่แนบมาพร้อมนี้</td>
    </tr>
	  
<?php if($money != '1'){

      $num_withdrawData = 0;
      $num_withdrawDataOut = 0;
      $withdrawNum = 0;
} ?>	  
	  
<?php if($money == '1'){?>	  
    <tr>
      <td height="40">&nbsp;</td>
    </tr>
	<tr>
      <td height="40"><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดยเบิกค่าใช้จ่ายจากคณะ&nbsp;จำนวน&nbsp;<input type="text" name="total_price" id="total_price" placeholder="ระบุจำนวนเงิน" class="input-data" style="width: 200px;" value="<?php //if($documentData2->total_price != '0.00'){ echo number_format($documentData2->total_price); }?>">&nbsp;บาท&nbsp;โดยมีค่าใช้จ่ายดังนี้-->
		  
	<?php	
       
        $withdrawNum = $withdrawNum->num_rows();
			if($withdrawNum > 0){
				
				$num_withdraw = 1;
				$num_withdrawDataOut = $withdrawData_out->num_rows();
				if($num_withdrawDataOut > 0){
					foreach($withdrawData_out->result() as $withdrawData_out2){} 					
	?>	  
		  <!--
		<br><br>-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ค่าใช้จ่ายระหว่างประเทศ)</strong><br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
			<?php if($withdrawData_out2->allowance1_baht != '0.00'){ ?>	  
            <tr>
              <td width="10%" align="right"><?php echo $num_withdraw?>.</td>
              <td width="12%" align="left">&nbsp;ค่าเบี้ยเลี้ยง 1</td>
              <td align="center"><input type="text" name="allowance1_days" id="allowance1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance1_baht', 'allowance1_total')" value="<?php echo $withdrawData_out2->allowance1_days?>" ></td>
              <td width="" align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td  align="center"><input type="text" name="allowance1_baht" id="allowance1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance1_days', 'allowance1_total')" value="<?php echo number_format($withdrawData_out2->allowance1_baht)?>" > บาท</td>
              <td width="" align="right">&nbsp;&nbsp; รวม</td>
              <td width="" align="center"><input type="text" name="allowance1_total" id="allowance1_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->allowance1_total)?>" readonly ></td>
              <td width="" align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData_out2->allowance2_baht != '0.00'){ ?>			  
			<tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าเบี้ยเลี้ยง 2</td>
              <td align="center"><input type="text" name="allowance2_days" id="allowance2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance2_baht', 'allowance2_total')" value="<?php echo $withdrawData_out2->allowance2_days?>" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td align="center"><input type="text" name="allowance2_baht" id="allowance2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance2_days', 'allowance2_total')" value="<?php echo number_format($withdrawData_out2->allowance2_baht)?>" > บาท</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="allowance2_total" id="allowance2_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->allowance2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>   
			  
			<?php if($withdrawData_out2->accommodation1_baht != '0.00'){ ?>	  
            <tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าที่พัก 1</td>
              <td align="center"><input type="text" name="accommodation1_days" id="accommodation1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation1_baht', 'accommodation1_total')" value="<?php echo $withdrawData_out2->accommodation1_days?>" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="accommodation1_baht" id="accommodation1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation1_days', 'accommodation1_total')" value="<?php echo number_format($withdrawData_out2->accommodation1_baht)?>" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="accommodation1_total" id="accommodation1_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->accommodation1_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?> 
			  
			<?php if($withdrawData_out2->accommodation2_baht != '0.00'){ ?>   
			<tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าที่พัก 2</td>
              <td align="center"><input type="text" name="accommodation2_days" id="accommodation2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation2_baht', 'accommodation2_total')" value="<?php echo $withdrawData_out2->accommodation2_days?>" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="accommodation2_baht" id="accommodation2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation2_days', 'accommodation2_total')" value="<?php echo number_format($withdrawData_out2->accommodation2_baht)?>" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="accommodation2_total" id="accommodation2_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->accommodation2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData_out2->accommodation2_baht != '0.00'){ ?>   
            <tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="passage_baht" id="passage_baht" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->passage_baht)?>" onChange="calculate_totalPrice(this.value, '1')" ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData_out2->other_baht != '0.00'){ ?>  
            <tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td colspan="4" align="left">&nbsp;อื่นๆ
              <input type="text" name="other_text" id="other_text" placeholder="" class="input-data" style="width: 300px;" value="<?php echo $withdrawData_out2->other_text?>" ></td>
			  <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="other_baht" id="other_baht" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '1')" value="<?php echo number_format($withdrawData_out2->other_baht)?>" ></td>
              <td align="left">บาท</td>	
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>
			  
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; รวม&nbsp;</td>
              <td align="center"><input type="text" name="total_price2" id="total_price2" placeholder="" readonly class="input-data" style="text-align: right;" data-mask="fdecimal" data-dec="," data-rad="." value="<?php echo number_format($withdrawData_out2->total_price)?>" ></td>
              <td align="left">&nbsp;บาท</td>
            </tr>
          </tbody>
        </table>
		<?php } ?>  
		</td>
    </tr>  
	  
	  <?php $num_withdrawData = $withdrawData->num_rows();
			if($num_withdrawData > 0){
				$num_withdraw = 1;
				foreach($withdrawData->result() as $withdrawData2){} ?>
	  
	<tr>
      <td height="40"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ค่าใช้จ่ายในประเทศ)</strong><br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
			<?php if($withdrawData2->allowance1_baht != '0.00'){ ?>  
            <tr>
              <td width="10%" align="right"><?php echo $num_withdraw?>.</td>
              <td width="12%" align="left">&nbsp;ค่าเบี้ยเลี้ยง 1</td>
              <td align="center"><input type="text" name="Nallowance1_days" id="Nallowance1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance1_baht', 'Nallowance1_total')" value="<?php echo $withdrawData2->allowance1_days?>" ></td>
              <td width="" align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td  align="center"><input type="text" name="Nallowance1_baht" id="Nallowance1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance1_days', 'Nallowance1_total')" value="<?php echo number_format($withdrawData2->allowance1_baht)?>" > บาท</td>
              <td width="" align="right">&nbsp;&nbsp; รวม</td>
              <td width="" align="center"><input type="text" name="Nallowance1_total" id="Nallowance1_total" placeholder="" class="input-data withdraw2" readonly style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->allowance1_total)?>"></td>
              <td width="" align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData2->allowance2_baht != '0.00'){ ?>	  
			  
			<tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าเบี้ยเลี้ยง 2</td>
              <td align="center"><input type="text" name="Nallowance2_days" id="Nallowance2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance2_baht', 'Nallowance2_total')" value="<?php echo $withdrawData2->allowance2_days?>" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td align="center"><input type="text" name="Nallowance2_baht" id="Nallowance2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance2_days', 'Nallowance2_total')" value="<?php echo number_format($withdrawData2->allowance2_baht)?>" > บาท</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Nallowance2_total" id="Nallowance2_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->allowance2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>   
			  
			<?php if($withdrawData2->accommodation1_baht != '0.00'){ ?>	  
            <tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าที่พัก 1</td>
              <td align="center"><input type="text" name="Naccommodation1_days" id="Naccommodation1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" value="<?php echo $withdrawData2->accommodation1_days?>" onChange="calculateAmount(this.value, '2', 'Naccommodation1_baht', 'Naccommodation1_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="Naccommodation1_baht" id="Naccommodation1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation1_days', 'Naccommodation1_total')" value="<?php echo number_format($withdrawData2->accommodation1_baht)?>" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Naccommodation1_total" id="Naccommodation1_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" readonly value="<?php echo number_format($withdrawData2->accommodation1_total)?>" ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?> 
			  
			<?php if($withdrawData2->accommodation2_baht != '0.00'){ ?>    
			<tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าที่พัก 2</td>
              <td align="center"><input type="text" name="Naccommodation2_days" id="Naccommodation2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" value="<?php echo $withdrawData2->accommodation2_days?>" onChange="calculateAmount(this.value, '2', 'Naccommodation2_baht', 'Naccommodation2_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="Naccommodation2_baht" id="Naccommodation2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation2_days', 'Naccommodation2_total')" value="<?php echo number_format($withdrawData2->accommodation2_baht)?>" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Naccommodation2_total" id="Naccommodation2_total" placeholder="" class="input-data withdraw2" readonly style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->accommodation2_total)?>"></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData2->accommodation2_baht != '0.00'){ ?>   
            <tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Npassage_baht" id="Npassage_baht" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->passage_baht)?>" onChange="calculate_totalPrice(this.value, '2')" ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData2->other_baht != '0.00'){ ?>  
            <tr>
              <td align="right"><?php echo $num_withdraw?>.</td>
              <td colspan="4" align="left">&nbsp;อื่นๆ
              <input type="text" name="Nother_text" id="Nother_text" placeholder="" class="input-data" style="width: 300px;" value="<?php echo $withdrawData2->other_text?>"></td>
			  <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Nother_baht" id="Nother_baht" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->other_baht)?>" onChange="calculate_totalPrice(this.value, '2')" ></td>
              <td align="left">บาท</td>	
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>
			  
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; รวม&nbsp;</td>
              <td align="center"><input type="text" name="Ntotal_price2" id="Ntotal_price2" placeholder="" class="input-data" style="text-align: right;" data-mask="fdecimal" data-dec="," data-rad="." readonly value="<?php echo number_format($withdrawData2->total_price)?>" ></td>
              <td align="left">&nbsp;บาท</td>
            </tr>
          </tbody>
        </table>
		</td>
    </tr>	  
	  
<?php } } } ?>
	  
	<tr>
      <td height="30">&nbsp;</td>
    </tr>
<?php //} ?>
	  
<?php if(($documentData2->vacation == '1')&&(($documentData2->check_doc != '3') && ($documentData2->check_doc != '0'))){ ?>	  
	<tr>
      <td>
		  <div class="checkbox" style="margin-left: 7%;"><label><input type="checkbox" id="CHvacation" name="CHvacation" onClick="check_vacation2(this.checked,'e')" <?php if($documentData2->vacation == '1'){ echo "checked"; } ?> value="<?php echo $documentData2->vacation?>" disabled >ต้องการลาพักผ่อน</label></div>
	  </td>
    </tr>
<?php } else if(($documentData2->vacation == '1')&&(($documentData2->check_doc == '3') && ($documentData2->check_doc == '0'))){ ?>	  
	<tr>
      <td>
		  <div class="checkbox" style="margin-left: 7%;"><label><input type="checkbox" id="CHvacation" name="CHvacation" onClick="check_vacation2(this.checked,'e')" <?php if($documentData2->vacation == '1'){ echo "checked"; } ?> value="<?php echo $documentData2->vacation?>" >ต้องการลาพักผ่อน</label></div>
	  </td>
    </tr>  
<?php } else if(($documentData2->vacation == '0')&&(($documentData2->check_doc == '3') && ($documentData2->check_doc == '0'))){ ?>
	<tr>
      <td>
		  <div class="checkbox" style="margin-left: 7%;"><label><input type="checkbox" id="CHvacation" name="CHvacation" onClick="check_vacation2(this.checked,'e')" <?php if($documentData2->vacation == '1'){ echo "checked"; } ?> value="<?php echo $documentData2->vacation?>" >ต้องการลาพักผ่อน</label></div>
	  </td>
    </tr>  
<?php } ?>	  
	  
	<tr <?php if($documentData2->vacation == '0'){ ?>style="display: none"<?php } ?> class="hide_tr">
      <td><br>
		  <div id="div_vacation">
		  		<div class="form-group">
					<label for="date_office" class="col-sm-3 control-label">วันที่เดินทางออกจากสำนักงาน</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_office" name="date_office" value="<?php if($documentData2->date_office != '0000-00-00'){ echo $documentData2->date_office; }?>" >
					</div>
				</div>

				<div class="form-group">
					<label for="date_office2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงสำนักงาน</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_office2" name="date_office2" value="<?php if($documentData2->date_office2 != '0000-00-00'){ echo $documentData2->date_office2; }?>" >
					</div>
				</div>

				<div class="form-group">
					<label for="date_thailand" class="col-sm-3 control-label">วันที่เดินทางออกจากประเทศไทย</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_thailand" name="date_thailand" value="<?php if($documentData2->date_thailand != '0000-00-00'){ echo $documentData2->date_thailand; }?>">
					</div>
				</div>

				<div class="form-group">
					<label for="date_thailand2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงประเทศไทย</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_thailand2" name="date_thailand2" value="<?php if($documentData2->date_thailand2 != '0000-00-00'){ echo $documentData2->date_thailand2; }?>" >
					</div>
				</div>	
			  
			  <?php $num_vacation = $vacationData->num_rows();
			  		foreach($vacationData->result() as $vacationData2){} ?>
			  
			  	<div class="form-group">
					<label for="date_thailand2" class="col-sm-3 control-label">วันที่ต้องการลาพักผ่อน</label>
					<div class="col-sm-5">
						<input type="text" class="form-control input-data" id="date_vacation" name="date_vacation" placeholder="ตัวอย่าง 10 เมษายน 2562 , 15 เมษายน 2562 หรือ 10-12 เมษายน 2562" value="<?php if($num_vacation > 0){ echo $vacationData2->date_vacation; }?>">					
					</div>
				</div>		  
		  </div>
	  </td>
    </tr>  
	<tr>
      <td>&nbsp;</td>
    </tr>	  
	
	<?php if(in_array($userDetail2->career_id, $array2)){ ?>  
	<tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณา หากเห็นชอบด้วยกรุณาอนุมัติ และ
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="85" align="right"><input type="checkbox" name="select_checkbox[]" id="select_checkbox" value="1" <?php if(($documentData2->select_checkbox == '1') || ($documentData2->select_checkbox == '4')){ echo "checked"; } ?> ></td>
              <td width="1101" align="left">&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางทีแน่นอนต่อไปด้วย</td>
            </tr>
            <tr>
              <td width="85" align="right"><input type="checkbox" name="select_checkbox[]" id="select_checkbox2" value="2" <?php if(($documentData2->select_checkbox == '2') || ($documentData2->select_checkbox == '4')){ echo "checked"; } ?> ></td>
              <td align="left">&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ</td>
            </tr>
          </tbody>
      </table></td>
    </tr>
	<?php } ?> 
	<?php if(in_array($userDetail2->career_id, $array1)){ ?>	  
	<tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="select_checkbox[]" id="select_checkbox" value="3" onClick="showSpan(this.checked)" <?php if($documentData2->select_checkbox == '3'){ echo "checked"; } ?> > &nbsp;&nbsp;หนังสือเดินทางมีอายุไม่ถึง 6 เดือน ณ วันเดินทาง</td>
    </tr>
    <tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="doCH" <?php if($documentData2->select_checkbox != '3'){?>style="display: none"<?php } ?> >จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ และลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ แจ้งงานทะเบียนประวัติ และต้นฉบับคืนหน่วยงาน</span><span id="notCH" <?php if($documentData2->select_checkbox == '3'){?>style="display: none"<?php } ?> >จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</span><!-- &lt;&lt; ถ้าคลิกช่องหนังสือเดินทาง--></td>
    </tr>  
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
      <td height="30" align="center" valign="bottom"><input type="text" placeholder="ลงชื่อ" class="input-data" style="width: 263px;" id="name_surname" name="name_surname" value="<?php if($documentData2->name_surname != ''){ echo $documentData2->name_surname; }?>" ><!--(นายวรดร ไผ่เรือง)--></td>
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
<?php if(in_array($userDetail2->career_id, $array2)){ 
	
	//$url3 = 'Printer_controller/PreviewGroup';	?> 	
							
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
						
				
<?php /*$url3 =''; if(($money == '1') && ($career_id == '4')){
							
			$url3 = 'Printer_controller/PreviewGroup3';				
}
							
	if(($money == '1') && ($career_id == '5')){
							
			$url3 = 'Printer_controller/PreviewGroup4';				
}*/						
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
							<!--<div class="form-group">
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
						</div>-->
									
							<div class="form-group">&nbsp;</div>	
					<?php if(($this->session->userdata['logged_in']['status'] == 'user') && (($documentData2->check_doc == '3') || ($documentData2->check_doc == '0'))){ ?>			
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์หนังสือเชิญ</label>
								<div class="col-sm-9">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file1" onchange="chkconfig('1')" value="<?php if($documentData2->file_name1 != ''){ echo $documentData2->file_name1; }?>" />
										<input type="hidden" id="encrypt1" name="file_name1" value="<?php if($documentData2->file_name1 != ''){ echo $documentData2->file_name1; }?>" />									
										<button type="button" class="btn btn-blue hidden" id="remove1" onclick ="do_remove('1')">remove</button>									
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name1 == ''){ echo 'hidden'; }?>" id="view1" onclick ="view_attachedFile('1')" >view</button>
										
										<!--<button type="button" class="btn btn-blue <?php //if($documentData2->file_name1 == ''){ echo 'hidden'; }?>" id="view1" onclick ="newTabImage('1')">view</button>-->	
										
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name1 == ''){ echo 'hidden'; }?>" id="delete1" onclick ="do_delete('1')">delete</button>										
								        <button type="button" class="btn btn-blue hidden" id="upload1" >Upload</button>									
										<span id="namefile1" class="file-input-name"><?php if($documentData2->file_name1 != ''){ echo $documentData2->file_name1; }?></span>	
									</div>									
								</div>
							</div>	
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์กำหนดการ</label>
								<div class="col-sm-9">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file2" onchange="chkconfig('2')" value="<?php if($documentData2->file_name2 != ''){ echo $documentData2->file_name2; }?>" />
										<input type="hidden" id="encrypt2" name="file_name2" value="<?php if($documentData2->file_name2 != ''){ echo $documentData2->file_name2; }?>" />
										<button type="button" class="btn btn-blue hidden" id="remove2" onclick ="do_remove('2')">remove</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name2 == ''){ echo 'hidden'; }?>" id="view2" onclick ="view_attachedFile('2')" >view</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name2 == ''){ echo 'hidden'; }?>" id="delete2" onclick ="do_delete('2')">delete</button>
								        <button type="button" class="btn btn-blue hidden" id="upload2" >Upload</button>
										<span id="namefile2" class="file-input-name"><?php if($documentData2->file_name2 != ''){ echo $documentData2->file_name2; }?></span>
									</div>									
								</div>
							</div>		
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์แบบตอบรับ</label>
								<div class="col-sm-9">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id ="file3" onchange="chkconfig('3')" value="<?php if($documentData2->file_name3 != ''){ echo $documentData2->file_name3; }?>" />
										<input type="hidden" id="encrypt3" name="file_name3" value="<?php if($documentData2->file_name3 != ''){ echo $documentData2->file_name3; }?>" />
										<button type="button" class="btn btn-blue hidden" id="remove3" onclick ="do_remove('3')">remove</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name3 == ''){ echo 'hidden'; }?>" id="view3" onclick ="view_attachedFile('3')" >view</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name3 == ''){ echo 'hidden'; }?>" id="delete3" onclick ="do_delete('3')">delete</button>
								        <button type="button" class="btn btn-blue hidden" id="upload3" >Upload</button>
										<span id="namefile3" class="file-input-name"><?php if($documentData2->file_name3 != ''){ echo $documentData2->file_name3; }?></span>
									</div>									
								</div>
							</div>									
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์อื่น ๆ</label>
								<div class="col-sm-9">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file4" onchange="chkconfig('4')"/>
										<input type="hidden" id="encrypt4" name="file_name4" value="<?php if($documentData2->file_name4 != ''){ echo $documentData2->file_name4; }?>" />
								        <button type="button" class="btn btn-blue hidden" id="remove4" onclick ="do_remove('4')">remove</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name4 == ''){ echo 'hidden'; }?>" id="view4" onclick ="view_attachedFile('4')" >view</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name4 == ''){ echo 'hidden'; }?>" id="delete4" onclick ="do_delete('4')">delete</button>
								        <button type="button" class="btn btn-blue hidden" id="upload4" >Upload</button>
										<span id="namefile4" class="file-input-name"><?php if($documentData2->file_name4 != ''){ echo $documentData2->file_name4; }?></span>
									</div>									
								</div>
							</div>		
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์อื่น ๆ</label>
								<div class="col-sm-9">
									<div class="row">
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file5" onchange="chkconfig('5')"/>
										<input type="hidden" id="encrypt5" name="file_name5" value="<?php if($documentData2->file_name5 != ''){ echo $documentData2->file_name5; }?>" />
										<button type="button" class="btn btn-blue hidden" id="remove5" onclick ="do_remove('5')">remove</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name5 == ''){ echo 'hidden'; }?>" id="view5" onclick ="view_attachedFile('5')" >view</button>
								        <button type="button" class="btn btn-blue <?php if($documentData2->file_name5 == ''){ echo 'hidden'; }?>" id="delete5" onclick ="do_delete('5')">delete</button>
								        <button type="button" class="btn btn-blue hidden" id="upload5" >Upload</button>
										<span id="namefile5" class="file-input-name"><?php if($documentData2->file_name5 != ''){ echo $documentData2->file_name5; }?></span>
									</div>									
								</div>
							</div>	
					<?php } ?>		
							
					<?php if(($documentData2->check_doc != '3') && ($documentData2->check_doc != '0')){ ?>		
							
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์หนังสือเชิญ</label>
								<div class="col-sm-9">
									<div class="row">
										
										
										<!--<button type="button" class="btn btn-blue <?php //if($documentData2->file_name1 == ''){ echo 'hidden'; }?>" id="view1" onclick ="newTabImage('1')">view</button>-->	
										
								        									
                                                                            <a id="namefile1" class="file-input-name" href="<?php echo base_url('uploadfile/'.$documentData2->file_name1)?>"><?php if($documentData2->file_name1 != ''){ echo $documentData2->file_name1; }?></a>	
									</div>									
								</div>
							</div>	
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์กำหนดการ</label>
								<div class="col-sm-9">
									<div class="row">
								
										<a id="namefile2" class="file-input-name" href="<?php echo base_url('uploadfile/'.$documentData2->file_name2)?>"><?php if($documentData2->file_name2 != ''){ echo $documentData2->file_name2; }?></a>
									</div>									
								</div>
							</div>		
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์แบบตอบรับ</label>
								<div class="col-sm-9">
									<div class="row">
										
										<a id="namefile3" class="file-input-name" href="<?php echo base_url('uploadfile/'.$documentData2->file_name3)?>"><?php if($documentData2->file_name3 != ''){ echo $documentData2->file_name3; }?></a>
									</div>									
								</div>
							</div>								<?php if($documentData2->file_name4 != ''){?>			
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์อื่น ๆ</label>
								<div class="col-sm-9">
									<div class="row">
										
										<a id="namefile4" class="file-input-name" href="<?php echo base_url('uploadfile/'.$documentData2->file_name4)?>"><?php if($documentData2->file_name4 != ''){ echo $documentData2->file_name4; }?></a>
									</div>									
								</div>
							</div>
                                                        <?php }?>
							<?php if($documentData2->file_name5 != ''){?>		
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์อื่น ๆ</label>
								<div class="col-sm-9">
									
										<a id="namefile5" class="file-input-name" href="<?php echo base_url('uploadfile/'.$documentData2->file_name5)?>"><?php if($documentData2->file_name5 != ''){ echo $documentData2->file_name5; }?></a>
									</div>									
								</div>
					<?php }   } ?>		
							
					<?php if($this->session->userdata['logged_in']['status'] != 'user'){ ?>
								<div class="form-group" <?php if($this->session->userdata['logged_in']['status'] == 'approve'){?>style="display: none"<?php } ?> >
                                                                   
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
											echo $getapprove['lastname']; /*
											echo " "; 
											if($getapprove['position_level'] == 3 ){
												echo "คณบดี ";
												}elseif($getapprove['position_level'] == 4 ){
													echo "รองคณบดี " ;
												}*/  
											 ?>
											</option>
										<?php endforeach ?>
									</select>						
									</div>
								</div>
							
								<?php if((($this->session->userdata['logged_in']['status'] == 'admin') || ($this->session->userdata['logged_in']['status'] == 'approve')) && ($documentData2->check_doc == '1') && ($documentData2->check_doc2 != '3')){ ?>
								<div class="form-group">
									<label for="command" class="col-sm-3 control-label">เสนอ</label>
									<div class="col-sm-9">									
										<input type="text" class="form-control" id="command" style="font-family:'THSarabunPSK-Bold' !important; color: #000000; font-size: 14pt; border: 1px solid #A4A4A4; border-radius: 4px; padding: 2px; margin: 2px;" value="<?php if($documentData2->offer_text2 != ''){ echo $documentData2->offer_text2; }?>" <?php if($this->session->userdata['logged_in']['status'] == 'approve'){ echo 'readonly'; }?> >
									</div>
								</div>
								<?php } ?>							
								<?php if(($this->session->userdata['logged_in']['status'] == 'admin_saraban') || ($this->session->userdata['logged_in']['status'] == 'approve') && ($documentData2->check_doc2 == '3') && ($documentData2->check_doc != '3')){ ?>
								<div class="form-group">
									<label for="command" class="col-sm-3 control-label">เสนอ</label>
									<div class="col-sm-9">									
										<input type="text" class="form-control" id="command" style="font-family:'THSarabunPSK-Bold' !important; color: #000000; font-size: 14pt; border: 1px solid #A4A4A4; border-radius: 4px; padding: 2px; margin: 2px;" value="<?php if($documentData2->offer_text != ''){ echo $documentData2->offer_text; }?>" <?php if($this->session->userdata['logged_in']['status'] == 'approve'){ echo 'readonly'; }?> >
									</div>
								</div>
                <?php } } ?>		
							
							
				<?php if($this->session->userdata['logged_in']['status'] != 'approve'){ ?>						
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-9">	
									<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<!--<button type="button" class="btn btn-red btn-icon" onclick="dusubmit_save()">บันทึก<i class="entypo-check"></i> </button>--> 
										<?php if(($this->session->userdata['logged_in']['status'] == 'user') && (($documentData2->check_doc == '3') || ($documentData2->check_doc == '0')) && ($documentData2->check_doc2 == '3') && ($documentData2->approve_status2 == '')){ ?>
										
								 		<button type="button" class="btn btn-orange btn-icon" onclick="check_dateVacation()" >บันทึก<i class="entypo-search"></i></button>
								 		<!--<button type="button" class="btn btn-orange btn-icon" onclick="PreviewTT()">บันทึก<i class="entypo-search"></i></button>-->	
										
										<!--<button type="button" class="btn btn-orange btn-icon" onclick="Preview()">บันทึก<i class="entypo-search"></i></button>--> 
								 		<?php if($documentData2->check_doc == '0'){ ?>
										
								 		<button type="button" class="btn btn-success btn-icon" onclick="user_submitEdit('<?php echo $documentData2->id?>' ,'2' ,'3')">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i></button>
										
										<?php } else { ?>
										
										<button type="button" class="btn btn-success btn-icon" onclick="submit_andSend('<?php echo $withdrawNum?>', '<?php echo $num_withdrawDataOut?>', '<?php echo $num_withdrawData?>','<?php echo $documentData2->id?>')">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i></button>
										
										<?php } ?>
								 		<button type="button" class="btn btn-red btn-icon" onclick="doclose()">ปิด<i class="entypo-cancel"></i></button>
										
										<?php } ?>										
										
										<?php if(($this->session->userdata['logged_in']['status'] == 'user') && (($documentData2->check_doc2 == '3') || ($documentData2->check_doc2 == '0')) && ($documentData2->check_doc == '1') && ($documentData2->approve_status != '')){ ?>
										
								 		<button type="button" class="btn btn-orange btn-icon" onclick="check_dateVacation()" >บันทึก<i class="entypo-search"></i></button>
								 		<!--<button type="button" class="btn btn-orange btn-icon" onclick="PreviewTT()">บันทึก<i class="entypo-search"></i></button>-->	
										
										<!--<button type="button" class="btn btn-orange btn-icon" onclick="Preview()">บันทึก<i class="entypo-search"></i></button>--> 
								 		<?php if($documentData2->check_doc2 == '0'){ ?>
										
								 		<button type="button" class="btn btn-success btn-icon" onclick="user_submitEdit('<?php echo $documentData2->id?>', '<?php echo $documentData2->check_doc?>', '2')">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i></button>
										
										<?php } else { ?>
										
										<button type="button" class="btn btn-success btn-icon" onclick="submit_andSend('<?php echo $withdrawNum?>', '<?php echo $num_withdrawDataOut?>', '<?php echo $num_withdrawData?>')">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i></button>
										
										<?php } ?>
								 		<button type="button" class="btn btn-red btn-icon" onclick="doclose()">ปิด<i class="entypo-cancel"></i></button>
										
										<?php } ?>	
										
										<?php if($this->session->userdata['logged_in']['status']!='user'){ ?>
										
										<button onclick="sendpass('<?php echo $documentData2->id?>','pass','ผ่าน')" type="button" class="btn btn-green btn-icon">ผ่าน<i class="entypo-check"></i> </button> 
										<button onclick="sendpass('<?php echo $documentData2->id?>','fail','ไม่ผ่าน')" type="button" class="btn btn-red btn-icon">ไม่ผ่าน<i class="entypo-cancel"></i> </button>
										<?php } ?>
										
										<?php if(($documentData2->check_doc != '3') && ($documentData2->check_doc != '0')){ ?>
										
										<button type="button" class="btn btn-blue btn-icon" onclick="Preview('<?php echo $url_preview?>','<?php echo $documentData2->id?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>
										<?php } ?>									
									</p>
								</div>
							</div>
					<?php } ?>		
							
					<?php if($this->session->userdata['logged_in']['status'] == 'approve'){ ?>		
							
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-9">	
									<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<button type="button" class="btn btn-success btn-icon" onclick="dusubmit_approve('<?php echo $documentData2->id?>','<?php echo $documentData2->approve_status?>')">อนุมัติ<i class="entypo-mail" ></i> </button>  
								 		<button type="button" class="btn btn-red btn-icon" onclick="dusubmit_notapprove()">ไม่อนุมัติ<i class="entypo-mail" ></i> </button> 
								 		<button type="button" class="btn btn-orange btn-icon" onclick="Preview('<?php echo $url_preview?>','<?php echo $documentData2->id?>','<?php echo $documentData2->user_create?>')">Preview<i class="entypo-search"></i> </button> 
										
									</p>
								</div>
							</div>
					<?php } ?>			
							
							<input type="hidden" id="url_preview" value="<?php echo $url_preview?>">
							<input type="hidden" id="for_type" name="for_type" value="<?php echo $documentData2->for_type;?>">
							<input type="hidden" id="reason_request" name="reason_request" value="<?php echo $documentData2->reason_request;?>">
							<input type="hidden" id="withdraw" name="withdraw" value="<?php echo $documentData2->withdraw;?>">
						
						</form>
						
					</div>
				
				</div>
			
			</div>
		</div>		
		
		<div class="modal fade custom-width" id="modal_vacation">
		<div class="modal-dialog" style="width: 60%;">
			<div class="modal-content">				
				<div class="modal-body">					
					<div class="col-12" id="modalbody"> </div>
				</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-info">ตกลง</button>
					<button type="button" class="btn btn-default" data-dismiss="modal" onClick="$('#vacation').val('0'); $('#vacation').attr('checked', false);" >ยกเลิก</button>	
				</div>
			</div>
		</div>
		</div>

	<!-- Footer -->
	<footer class="main">

		&copy; 2018 <strong>FEM.</strong> Developed by <a href="http://www.me-fi.com" target="_blank">ME-FI dot com</a>

	</footer>
	
	</div>
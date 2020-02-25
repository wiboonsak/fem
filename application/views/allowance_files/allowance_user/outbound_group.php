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
							
	<?php $career_id = '';
		  $array1 = array('1','5');						
		  $array2 = array('2','3','4','6');					
		  $dataId = $this->session->userdata['logged_in']['id'];
		  $userDetail = $this->Allowance_model->get_userDetail($dataId); 
		  foreach($userDetail->result() as $userDetail2){}
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
		<td width="737" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">โทร.</span>&nbsp;<input type="text" name="telephone_number" id="telephone_number" class="input-data" style="width: 150px;"></td>
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
	  <?php $today = $this->Allowance_model->DateThai(date("Y-m-d"));?>
    <tr>
		<td width="27" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">ที่</span></td>
      <td width="736" height="30" align="left" valign="bottom">มอ 820/</td>
	  <td width="62" height="30" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">&nbsp;&nbsp;วันที่</span></td>
      <td width="675" height="30" align="center" valign="bottom"><?php echo $today?></td>
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
      <td width="95%" height="30" align="left" valign="bottom"><input type="text" name="subject_document" id="subject_document" placeholder="ระบุชื่อเรื่อง" class="input-data" style="width: 100%;"></td>
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
<?php if(($money == '1') && ($reason_request == '1')){
	  $quota = 0; $money2 = 0; $balance = 0;
	  $checkQuota = $this->Allowance_model->check_quota($this->session->userdata['logged_in']['id']);
	  $numQuota = $checkQuota->num_rows();

	  if($numQuota > 0){

		  foreach($checkQuota->result() as $checkQuota2){}
		  $quota = $checkQuota2->quota;
							
		  $money2 = $this->Allowance_model->calculate_money($this->session->userdata['logged_in']['id']);		
		  $balance = $quota - $money2;	
	  } } ?>						
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยคณะการจัดการสิ่งแวดล้อม&nbsp;เสนออนุมัติให้&nbsp;<input type="text" name="group_name" id="group_name" placeholder="ระบุชื่อกลุ่มคณะผู้เดินทาง" class="input-data" style="width: 65%;">&nbsp;จำนวน <input type="text" name="number_people" id="number_people" placeholder="ระบุจำนวน" class="input-data" style="width: 10%;"> ราย เดินทางไป&nbsp;<select name="travel_for" id="travel_for" class="input-data"><option value="">-- เลือก --</option><option value="1">เข้าร่วมประชุม</option><option value="2">เข้าร่วมประชุมทางวิชาการ</option><option value="3">ฝึกอบรม</option><option value="4">ดูงาน</option><option value="5">ประชุมเชิงปฎิบัติการ</option><option value="6">ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>&nbsp;&nbsp;เรื่อง <input type="text" name="subject_form" id="subject_form" placeholder="ระบุชื่อเรื่อง" class="input-data" style="width: 880px;"> ณ&nbsp;<input type="text" name="place" id="place" placeholder="ระบุสถานที่" class="input-data" style="width: 75%;">&nbsp;ตั้งแต่วันที่&nbsp;<select class="input-data" id="daystart" name="daystart" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"><?php echo $a?></option>	
							<?php }	?>
							</select><select class="input-data" id="monthstart" name="monthstart" >
                               <option value="00">เดือน</option>
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
							</select><select class="input-data" id="yearstart" name="yearstart" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>" ><?php echo $yearthai?></option>
	
							<?php }	?>
							</select>&nbsp;ถึง&nbsp;<select class="input-data" id="dayend" name="dayend" >
                               <option value="00">วัน</option>
							<?php for($a=1; $a<=31; $a++){ 
								
									if($a < 10){  $txt = '0';  } else { $txt =''; }
							?>								
                                                                <option value="<?php echo $txt.$a?>"><?php echo $a?></option>	
							<?php }	?>
							</select><select class="input-data" id="monthend" name="monthend" >
                               <option value="00">เดือน</option>
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
							</select><select class="input-data" id="yearend" name="yearend" >
                               <option value="00">ปี</option>
							<?php for($y=2017; $y<=2032; $y++){ 
						$yearthai = $y+543
							?>								
								<option value="<?php echo $y?>" ><?php echo $yearthai?></option>
	
							<?php }	?>
							</select> โดยใช้เงินสนับสนุนจาก&nbsp;<input type="text" name="money_source" id="money_source" placeholder="ระบุแหล่งเงิน" class="input-data" style="width: 55%;"><?php if(($money == '1') && ($reason_request == '1')){?>&nbsp;<U>ตามสิทธิคงเหลือ <?php echo number_format($balance);?> บาท</U><?php } ?>&nbsp;ซึ่งมีรายนามดังต่อไปนี้<br><br>		  
		  
        <table border="0" cellpadding="0" cellspacing="0">			
          <tbody> 
			  
		<?php //if($career_id == '5'){ $url3 = 'Printer_controller/PreviewGroup2'; } ?>	  
			  
			<tr class="career_tr2">
              <td align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--<strong>ข้าราชการ</strong>--><select name="select_career" id="select_career" class="input-data"><!--onChange="tr_career(this.value)"-->
				  <option value="">เลือกสถานภาพ</option>
				  <?php foreach($getcareer->result() as $getcareer2){ ?>
                  <option value="<?php echo $getcareer2->id?>"><?php echo $getcareer2->career?></option>
				  <?php } ?>                  
                </select>&nbsp;
				<button type="button" class="btn btn-blue btn-sm" onClick="add_listName2()">เพิ่มข้อมูล</button><!--onClick="add_listName()"-->  
				<input type="hidden" id="num_tr" name="num_tr" value="0" >  
				<input type="hidden" id="num_group" name="num_group" value="0" >  
			   </td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>		  
			  
            <tr class="trNamePerson position_tr" style="display: none">
              <td width="95" align="right"><!--<i class="entypo-plus-squared chicon" style="font-size: 13pt; cursor: pointer;" title="เพิ่มรายชื่อ" onClick="append_listName()"></i>&nbsp;-->&nbsp;</td>
              <td width="450" align="left">
				  
				  <input type="text" name="name[]" id="name" placeholder="ระบุชื่อผู้เดินทาง" class="input-data inputName9" style="width: 400px;"  ><!--onChange="get_dataposition(this.value)"-->
				  
				  <input type="hidden" name="career_id[]" value="" class="careerHide" ><!--id="career_id0"-->
				
			  </td>
              <td width="300" align="left">ตำแหน่ง
                <select name="position_id[]"  class="input-data slected88"><!--id="position_id0"-->
                  <option value="">เลือกตำแหน่ง</option>
				  <?php foreach($getposition->result() as $getposition2){ ?>	
				  <option value="<?php echo $getposition2->id?>"><?php echo $getposition2->position?></option>
				  <?php } ?>                  
                </select></td>
              <td width="241" align="left">ตำแหน่งเลขที่
                <input type="text" name="position_number[]" id="position_number" placeholder="ระบุตำแหน่งเลขที่" class="input-data" style="width: 120px;">&nbsp;<i class="glyphicon glyphicon-trash icondel" style="cursor: pointer;" title="ลบรายชื่อ"></i>
			  </td>				
            </tr>
			  
			<tr class="tdheight" style="display: none">
      			<td height="30">&nbsp;</td>
    		</tr>
			  
			<tr id="xxx" style="display: none">
      			<td height="30">&nbsp;</td>
    		</tr>			  
			  
          </tbody>
        </table>		
		</td>
    </tr>	  
	  
<?php if($money == '1'){?>	  
    <tr id="ww333">
      <td height="40">&nbsp;</td>
    </tr>
	<tr>
      <td height="40"><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดยเบิกค่าใช้จ่ายจากคณะ&nbsp;จำนวน&nbsp;<input type="text" name="total_price" id="total_price" placeholder="ระบุจำนวนเงิน" class="input-data" style="width: 200px;">&nbsp;บาท&nbsp;โดยมีค่าใช้จ่ายดังนี้<br><br>-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ประมาณการค่าใช้จ่ายระหว่างประเทศ)</strong><br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="10%" align="right">1.</td>
              <td width="12%" align="left">&nbsp;ค่าเบี้ยเลี้ยง 1</td>
              <td align="center"><input type="text" name="allowance1_days" id="allowance1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance1_baht', 'allowance1_total')" ></td>
              <td width="" align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td  align="center"><input type="text" name="allowance1_baht" id="allowance1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance1_days', 'allowance1_total')" > บาท</td>
              <td width="" align="right">&nbsp;&nbsp; รวม</td>
              <td width="" align="center"><input type="text" name="allowance1_total" id="allowance1_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" readonly ></td>
              <td width="" align="left">บาท</td>
            </tr>
			<tr>
              <td align="right">2.</td>
              <td align="left">&nbsp;ค่าเบี้ยเลี้ยง 2</td>
              <td align="center"><input type="text" name="allowance2_days" id="allowance2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance2_baht', 'allowance2_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td align="center"><input type="text" name="allowance2_baht" id="allowance2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance2_days', 'allowance2_total')" > บาท</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="allowance2_total" id="allowance2_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" readonly ></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td align="right">3.</td>
              <td align="left">&nbsp;ค่าที่พัก 1</td>
              <td align="center"><input type="text" name="accommodation1_days" id="accommodation1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation1_baht', 'accommodation1_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="accommodation1_baht" id="accommodation1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation1_days', 'accommodation1_total')" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="accommodation1_total" id="accommodation1_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<tr>
              <td align="right">4.</td>
              <td align="left">&nbsp;ค่าที่พัก 2</td>
              <td align="center"><input type="text" name="accommodation2_days" id="accommodation2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation2_baht', 'accommodation2_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="accommodation2_baht" id="accommodation2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation2_days', 'accommodation2_total')" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="accommodation2_total" id="accommodation2_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" readonly ></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td align="right">5.</td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="passage_baht" id="passage_baht" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '1')" ></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td align="right">6.</td>
              <td colspan="4" align="left">&nbsp;อื่นๆ
              <input type="text" name="other_text" id="other_text" placeholder="" class="input-data" style="width: 300px;"></td>
			  <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="other_baht" id="other_baht" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '1')" ></td>
              <td align="left">บาท</td>	
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; รวม&nbsp;</td>
              <td align="center"><input type="text" name="total_price2" id="total_price2" placeholder="" readonly class="input-data" style="text-align: right;" data-mask="fdecimal" data-dec="," data-rad="." ></td>
              <td align="left">&nbsp;บาท</td>
            </tr>
          </tbody>
        </table>
		</td>
    </tr>  
	  
	<tr>
      <td height="40"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ประมาณการค่าใช้จ่ายในประเทศ)</strong><br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td width="10%" align="right">1.</td>
              <td width="12%" align="left">&nbsp;ค่าเบี้ยเลี้ยง 1</td>
              <td align="center"><input type="text" name="Nallowance1_days" id="Nallowance1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance1_baht', 'Nallowance1_total')" ></td>
              <td width="" align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td  align="center"><input type="text" name="Nallowance1_baht" id="Nallowance1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance1_days', 'Nallowance1_total')" > บาท</td>
              <td width="" align="right">&nbsp;&nbsp; รวม</td>
              <td width="" align="center"><input type="text" name="Nallowance1_total" id="Nallowance1_total" placeholder="" class="input-data withdraw2" readonly style="width: 100px; text-align: right;"></td>
              <td width="" align="left">บาท</td>
            </tr>
			<tr>
              <td align="right">2.</td>
              <td align="left">&nbsp;ค่าเบี้ยเลี้ยง 2</td>
              <td align="center"><input type="text" name="Nallowance2_days" id="Nallowance2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance2_baht', 'Nallowance2_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td align="center"><input type="text" name="Nallowance2_baht" id="Nallowance2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance2_days', 'Nallowance2_total')" > บาท</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Nallowance2_total" id="Nallowance2_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" readonly ></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td align="right">3.</td>
              <td align="left">&nbsp;ค่าที่พัก 1</td>
              <td align="center"><input type="text" name="Naccommodation1_days" id="Naccommodation1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation1_baht', 'Naccommodation1_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="Naccommodation1_baht" id="Naccommodation1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation1_days', 'Naccommodation1_total')" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Naccommodation1_total" id="Naccommodation1_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<tr>
              <td align="right">4.</td>
              <td align="left">&nbsp;ค่าที่พัก 2</td>
              <td align="center"><input type="text" name="Naccommodation2_days" id="Naccommodation2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation2_baht', 'Naccommodation2_total')" ></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="Naccommodation2_baht" id="Naccommodation2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation2_days', 'Naccommodation2_total')" > บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Naccommodation2_total" id="Naccommodation2_total" placeholder="" class="input-data withdraw2" readonly style="width: 100px; text-align: right;"></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td align="right">5.</td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Npassage_baht" id="Npassage_baht" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '2')" ></td>
              <td align="left">บาท</td>
            </tr>
            <tr>
              <td align="right">6.</td>
              <td colspan="4" align="left">&nbsp;อื่นๆ
              <input type="text" name="Nother_text" id="Nother_text" placeholder="" class="input-data" style="width: 300px;"></td>
			  <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Nother_baht" id="Nother_baht" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '2')" ></td>
              <td align="left">บาท</td>	
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; รวม&nbsp;</td>
              <td align="center"><input type="text" name="Ntotal_price2" id="Ntotal_price2" placeholder="" class="input-data" style="text-align: right;" data-mask="fdecimal" data-dec="," data-rad="." readonly ></td>
              <td align="left">&nbsp;บาท</td>
            </tr>
			  
			<tr height="40">
              <td align="right">&nbsp;</td>
              <td align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
	  
	  		<tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; <strong>จำนวนเงินรวมทั้งสิ้น</strong>&nbsp;</td>
              <td align="right"><span id="txt_amount"></span></td>
              <td align="left">&nbsp;<strong>บาท</strong></td>
            </tr>  
			  
          </tbody>
        </table>
		</td>
    </tr>	  
	  
<?php } ?>
	  
	<tr>
      <td height="30">&nbsp;</td>
    </tr>
	<tr>
      <td>
		  <div class="checkbox" style="margin-left: 7%;"><label><input type="checkbox" id="CHvacation" name="CHvacation" onClick="check_vacation(this.checked,'a')" value="0" >ต้องการลาพักผ่อน</label></div>
	  </td>
    </tr>
	<tr style="display: none" class="hide_tr">
      <td><br>
		  <div id="div_vacation">33333333333</div>
	  </td>
    </tr>  
	<tr>
      <td>&nbsp;</td>
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
      <td height="30" align="center" valign="bottom"><input type="text" placeholder="ลงชื่อ" class="input-data" style="width: 263px;" id="name_surname" name="name_surname" ><!--(นายวรดร ไผ่เรือง)--></td>
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
    <!--<tr>
      <td width="" align="center" valign="bottom">(ผู้ช่วยศาตราจารย์ ดร.เกื้ออนันต์ เตชะโต)</td>
      <td height="30" align="center" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td width="" align="center">คณบดีคณะการจัดการสิ่งแวดล้อม</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>-->
    <tr>
      <td width="">&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>				
<?php } ?>	
						
				
<?php /*if(($money == '1') && ($career_id == '4')){
							
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
							
							<div class="form-group">
								
							<label class="col-sm-12 control-label" style="font-size: 10pt; color: red; line-height: 24px; text-align: left; padding-bottom: 15px;"><strong>ข้อแนะนำการแนบไฟล์</strong><br>
							1. การอัพโหลดไฟล์ ทุกช่องสามารถอัพโหลดได้ครั้งละ 1 ไฟล์เท่านั้น และหากมีหลายหน้าหรือหลายภาพ ควรจัดทำและบันทึกเป็นไฟล์ .pdf เพื่อสะดวกต่อการอัพโหลดไฟล์และเรียกดูการแสดงผล<br>
							2. รองรับไฟล์นามสกุล .pdf , .jpg , .png , .gif , .docx เท่านั้น<br> 
							3. ขนาดไฟล์ไม่ควรเกิน 2MB<br> 
							4. กรุณากดปุ่ม Upload ทุกช่องที่มีการแนบไฟล์</label>							
								 
								<label class="col-sm-3 control-label">แนบไฟล์หนังสือเชิญ *</label>
								<div class="col-sm-9">
									<div class="row">
									<div class="col-sm-9">										
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file1" onchange="chkconfig('1')"/>
										<input type="hidden" id="encrypt1" name="file_name1" />
										<span id="namefile1" class="file-input-name" style="margin-right: 8px;"></span>									
										<!--<button type="button" class="btn btn-blue hidden" id="remove1" onclick ="do_remove('1')">remove</button>
								        <button type="button" class="btn btn-blue hidden" id="view1" onclick ="newTabImage('1')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete1" onclick ="do_delete('1')">delete</button>-->
								        <button type="button" class="btn btn-blue hidden" id="upload1" >Upload</button>
									</div>	
									<div class="col-sm-3" style="text-align: center;">	
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="remove1" onclick ="do_remove('1')" style="cursor: pointer;"></i>
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="delete1" onclick ="do_delete('1')" style="cursor: pointer;"></i>				 
									</div>									
									</div>									
								</div>
							</div>	
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์กำหนดการ *</label>
								<div class="col-sm-9">
									<div class="row">
									<div class="col-sm-9">	
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file2" onchange="chkconfig('2')"/>
										<input type="hidden" id="encrypt2" name="file_name2" />
										<span id="namefile2" class="file-input-name" style="margin-right: 8px;"></span>										
										<!--<button type="button" class="btn btn-blue hidden" id="remove2" onclick ="do_remove('2')">remove</button>
								        <button type="button" class="btn btn-blue hidden" id="view2" onclick ="newTabImage('2')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete2" onclick ="do_delete('2')">delete</button>-->
								        <button type="button" class="btn btn-blue hidden" id="upload2" >Upload</button>										 
									</div>										
									<div class="col-sm-3" style="text-align: center;">	
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="remove2" onclick ="do_remove('2')" style="cursor: pointer;"></i>
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="delete2" onclick ="do_delete('2')" style="cursor: pointer;"></i>				 
									</div>	
									</div>
								</div>
							</div>		
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์แบบตอบรับ *</label>
								<div class="col-sm-9">
									<div class="row">
									<div class="col-sm-9">	
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id ="file3" onchange="chkconfig('3')"/>
										<input type="hidden" id="encrypt3" name="file_name3" />
										<span id="namefile3" class="file-input-name" style="margin-right: 8px;"></span>									
										<!--<button type="button" class="btn btn-blue hidden" id="remove3" onclick ="do_remove('3')">remove</button>
								        <button type="button" class="btn btn-blue hidden" id="view3" onclick ="newTabImage('3')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete3" onclick ="do_delete('3')">delete</button>-->
								        <button type="button" class="btn btn-blue hidden" id="upload3" >Upload</button>										 
									</div>										
									<div class="col-sm-3" style="text-align: center;">	
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="remove3" onclick ="do_remove('3')" style="cursor: pointer;"></i>
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="delete3" onclick ="do_delete('3')" style="cursor: pointer;"></i>				 
									</div>
									</div>	
								</div>
							</div>									
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์อื่น ๆ</label>
								<div class="col-sm-9">
									<div class="row">
									<div class="col-sm-9">	
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file4" onchange="chkconfig('4')"/>
										<input type="hidden" id="encrypt4" name="file_name4" />
										<span id="namefile4" class="file-input-name" style="margin-right: 8px;"></span>									
								        <!--<button type="button" class="btn btn-blue hidden" id="remove4" onclick ="do_remove('4')">remove</button>
								        <button type="button" class="btn btn-blue hidden" id="view4" onclick ="newTabImage('4')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete4" onclick ="do_delete('4')">delete</button>-->									
								        <button type="button" class="btn btn-blue hidden" id="upload4" >Upload</button>										
									</div>										
									<div class="col-sm-3" style="text-align: center;">	
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="remove4" onclick ="do_remove('4')" style="cursor: pointer;"></i>
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="delete4" onclick ="do_delete('4')" style="cursor: pointer;"></i>				 
									</div>
									</div>
								</div>
							</div>		
									
							<div class="form-group">
								<label class="col-sm-3 control-label">แนบไฟล์อื่น ๆ</label>
								<div class="col-sm-9">
									<div class="row">
									<div class="col-sm-9">										
										<input class="file-input-wrapper btn form-control file2 inline btn btn-primary" type="file" name="file[]" id="file5" onchange="chkconfig('5')"/>
										<input type="hidden" id="encrypt5" name="file_name5" />
										<span id="namefile5" class="file-input-name" style="margin-right: 8px;"></span>									
										<!--<button type="button" class="btn btn-blue hidden" id="remove5" onclick ="do_remove('5')">remove</button>
								        <button type="button" class="btn btn-blue hidden" id="view5" onclick ="newTabImage('5')">view</button>
								        <button type="button" class="btn btn-blue hidden" id="delete5" onclick ="do_delete('5')">delete</button>-->										
								        <button type="button" class="btn btn-blue hidden" id="upload5" >Upload</button>										 
									</div>										
									<div class="col-sm-3" style="text-align: center;">	
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="remove5" onclick ="do_remove('5')" style="cursor: pointer;"></i>
										<i class="glyphicon glyphicon-trash hidden" title="ลบไฟล์" id="delete5" onclick ="do_delete('5')" style="cursor: pointer;"></i>				 
									</div>									
									</div>									
								</div>
							</div>									
									
							<div class="form-group">
								<label class="col-sm-3 control-label">&nbsp;</label>
								<div class="col-sm-9">	
									<span id='alert_error'></span>							 
								 	<p class="bs-example"> 
								 		<!--<button type="button" class="btn btn-red btn-icon" onclick="dusubmit_save()">บันทึก<i class="entypo-check"></i> </button>--> 
										
								 		<button type="button" class="btn btn-orange btn-icon" onclick="check_dateVacation()" >บันทึก<i class="entypo-search"></i></button>
								 		<!--<button type="button" class="btn btn-orange btn-icon" onclick="PreviewTT()">บันทึก<i class="entypo-search"></i></button>-->
										
										
										<!--<button type="button" class="btn btn-orange btn-icon" onclick="Preview()">บันทึก<i class="entypo-search"></i></button>--> 
								 		<!--<button type="button" class="btn btn-success btn-icon" onclick="dusubmit_saveANDsend()">ยืนยัน & ส่งข้อมูล<i class="entypo-mail" ></i></button>-->
								 		<button type="button" class="btn btn-red btn-icon" onclick="doclose()">ปิด<i class="entypo-cancel"></i></button>		
									</p>
								</div>
							</div>
							
							<input type="hidden" id="url_preview" value="<?php echo $url_preview?>">
							<input type="hidden" id="for_type" name="for_type" value="<?php echo $for_type?>">
							<input type="hidden" id="reason_request" name="reason_request" value="<?php echo $reason_request?>">
							<input type="hidden" id="withdraw" name="withdraw" value="<?php echo $money?>">
						
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
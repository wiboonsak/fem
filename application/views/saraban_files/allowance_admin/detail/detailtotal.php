<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>allowance/assets/FontTHSarabun/styles.css">
	<div class="main-content">			
	
		<h2 style="text-align: center; padding-top: 20px;">รายละเอียดคำขออนุมัติเดินทาง</h2>
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
							
	<?php 
                                            $withdraw = $this->uri->segment(3);
                                            $for_type = $this->uri->segment(4);
                                            $doccuid = $this->uri->segment(5);
        
        
        function DateThai($strDate){
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
		 $career_id = '';  $dataId ='12';  $money = '0';					
		  //$career_id = '';
		  //$dataId = $this->session->userdata['logged_in']['id'];
		  //$userDetail = $this->Allowance_model->get_userDetail($dataId); 
		  foreach($userDetail->result() as $userDetail2){ }
		  $career_id = $userDetail2->career_id;	
							
		  $careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
		  foreach($careerData->result() as $careerData2){ }
							
		  $positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
		  foreach($positionData->result() as $positionData2){ }
							
		  foreach($documentData->result() as $documentData2){ }			 
                  
                  $group_listNameData = $this->Allowance_model->get_listNameData($documentData2->id); 
		  foreach($group_listNameData->result() as $group_listNameData2){ }	
                  $careergroupData = $this->Allowance_model->get_career($group_listNameData2->career_id); 
		  foreach($careergroupData->result() as $careergroupData2){ }
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
                <td width="737" align="left" valign="bottom"><span style="font-size: 13pt; font-weight: 600;">โทร.</span>&nbsp;<input readonly type="text" name="telephone_number" id="telephone_number" class="input-data" style="width: 150px;" value="<?php if($documentData2->telephone_number != ''){ echo $documentData2->telephone_number; }?>"></td>
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
      <td width="95%" height="30" align="left" valign="bottom"><input type="text" name="subject_document" id="subject_document" placeholder="ระบุชื่อเรื่อง" class="input-data" style="width: 100%;" value="<?php if($documentData2->subject_document != ''){ echo $documentData2->subject_document; }?>" readonly></td>
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
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยคณะการจัดการสิ่งแวดล้อม&nbsp;เสนอขออนุญาตให้&nbsp;<input type="text" name="group_name" id="group_name" placeholder="ระบุชื่อกลุ่มคณะผู้เดินทาง" class="input-data" style="width: 65%;" value="<?php if($documentData2->group_name != ''){ echo $documentData2->group_name; }?>" readonly>&nbsp;จำนวน <input type="text" name="number_people" id="number_people" placeholder="ระบุจำนวน" class="input-data" style="width: 10%;" value="<?php if($documentData2->number_people != ''){ echo $documentData2->number_people; }?>"> ราย เดินทางไป&nbsp;<select name="travel_for" id="travel_for" class="input-data" disabled><option value="">-- เลือก --</option><option value="1" <?php if($documentData2->travel_for == '1'){ echo 'selected'; } ?> >เข้าร่วมประชุม</option><option value="2" <?php if($documentData2->travel_for == '2'){ echo 'selected'; } ?> >เข้าร่วมประชุมทางวิชาการ</option><option value="3" <?php if($documentData2->travel_for == '3'){ echo 'selected'; } ?> >ฝึกอบรม</option><option value="4" <?php if($documentData2->travel_for == '4'){ echo 'selected'; } ?> >ดูงาน</option><option value="5" <?php if($documentData2->travel_for == '5'){ echo 'selected'; } ?> >ประชุมเชิงปฎิบัติการ</option><option value="6" <?php if($documentData2->travel_for == '6'){ echo 'selected'; } ?> >ปฏิบัติงานเพื่อปรึกษาหารือ</option></select>&nbsp;&nbsp;เรื่อง <input type="text" name="subject_form" id="subject_form" placeholder="ระบุชื่อเรื่อง" class="input-data" style="width: 880px;" value="<?php if($documentData2->subject_form != ''){ echo $documentData2->subject_form; }?>" readonly> ณ&nbsp;<input type="text" name="place" id="place" placeholder="ระบุสถานที่" class="input-data" style="width: 75%;" value="<?php if($documentData2->place != ''){ echo $documentData2->place; }?>" readonly>&nbsp;ตั้งแต่วันที่&nbsp;<input type="date" class="input-data" id="date_start" name="date_start" style="padding: 0px !important" value="<?php if($documentData2->date_start != ''){ echo $documentData2->date_start; }?>" readonly>&nbsp;ถึง&nbsp;<input type="date" class="input-data" style="padding: 0px !important" id="date_end" name="date_end" value="<?php if($documentData2->date_end != ''){ echo $documentData2->date_end; }?>" readonly> โดยใช้เงินสนับสนุนจาก&nbsp;<input type="text" name="money_source" id="money_source" placeholder="ระบุแหล่งเงิน" class="input-data" style="width: 55%;" value="<?php if($documentData2->money_source != ''){ echo $documentData2->money_source; }?>" readonly>&nbsp;ซึ่งมีรายนามดังต่อไปนี้<br><br>		  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $careergroupData2->career?></strong>
            <br>
            <br>
        
        <table border="0" cellpadding="0" cellspacing="0">			
          <tbody>		  
		
				  <?php 	$listNameNum = $listNameData->num_rows(); 
				  			$getcareer = $this->Allowance_model->get_career();
				  			foreach($getcareer->result() as $getcareer2){ ?>
                
				  <?php } ?>                  
               
			 
            <tr class="trNamePerson position_tr" style="display: none">
<!--              <td width="95" align="right"><i class="entypo-plus-squared" style="font-size: 13pt; cursor: pointer;" title="เพิ่มรายชื่อ" onClick="append_listName()"></i>&nbsp;&nbsp;</td>-->
              <td width="450" align="left">
			  
				  <input type="text" name="name[]" id="name" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;" readonly>				  
				  <input type="hidden" name="career_id[]" value="" class="careerHide" ><!--id="career_id0"-->
				  <input type="hidden" name="id_listName[]" value="x">	
			  </td>
              <td width="300" align="left">ตำแหน่ง
                  <select name="position_id[]" class="input-data slected88" disabled><!--id="position_id0"-->
                  <option value="">เลือกตำแหน่ง</option>
				  <?php		$getposition = $this->Allowance_model->get_position(); 
							foreach($getposition->result() as $getposition2){ ?>	
				  <option value="<?php echo $getposition2->id?>"><?php echo $getposition2->position?></option>
				  <?php } ?>                  
                </select>
			  </td>
              <td width="241" align="left">ตำแหน่งเลขที่
                <input readonly type="text" name="position_number[]" id="position_number" placeholder="ระบุตำแหน่งเลขที่" class="input-data" style="width: 120px;">&nbsp;<i class="glyphicon glyphicon-trash icondel" style="cursor: pointer;" title="ลบรายชื่อ"></i></td>
            </tr>
			<tr class="tdheight" style="display: none">
      			<td height="30">&nbsp;</td>
    		</tr>
			<!--<tr id="xxx" style="display: none">
      			<td height="30">&nbsp;</td>
    		</tr> --> 
			  
	<?php //$listNameNum = $listNameData->num_rows(); 
		  if($listNameNum > 0){			  
			$numName = 1; $numtr = 1; $career ='';  
			  
			foreach($listNameData->result() as $listNameData2){
				
				if($listNameData2->position_number != ''){
					
					$position_number = 'ตำแหน่งเลขที่ '.$listNameData2->position_number;
				}
				
				
		?>
					
					  
			  
			<tr class="trNamePerson career<?php echo $listNameData2->career_id?>" id="rowName<?php echo $numtr?>">
              <td width="95" align="right">&nbsp;&nbsp;</td>
              <td width="450" align="left">				  
				  <input type="text" name="name[]" id="name" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;" value="<?php echo $listNameData2->name?>" onChange="changeName(this.value,'<?php echo $listNameData2->id?>')" readonly>				  
				  <input type="hidden" name="career_id[]" value="<?php echo $listNameData2->career_id?>" ><!--id="career_id<?php //echo $numtr?>" -->
				  <input type="hidden" name="id_listName[]" value="<?php echo $listNameData2->id?>">			  
			  </td>
              <td width="300" align="left">ตำแหน่ง			  
                  <select name="position_id[]" id="position_id0" class="input-data" disabled>
                  <option value="">เลือกตำแหน่ง</option>				  	
				  <option value="5" <?php if($listNameData2->position_id == '5'){ echo 'selected'; } ?> >อาจารย์ผู้มีความรู้ - ความสามารถพิเศษ</option>				  	
				  <option value="4" <?php if($listNameData2->position_id == '4'){ echo 'selected'; } ?> >รองศาสตราจารย์</option>				  	
				  <option value="3" <?php if($listNameData2->position_id == '3'){ echo 'selected'; } ?> >ผู้ช่วยศาสตราจารย์</option>				  	
				  <option value="2" <?php if($listNameData2->position_id == '2'){ echo 'selected'; } ?> >บุคลากร</option>				  	
				  <option value="1" <?php if($listNameData2->position_id == '1'){ echo 'selected'; } ?> >อาจารย์</option>                 
                </select>
			  </td>
              <td width="241" align="left">ตำแหน่งเลขที่
                <input type="text" name="position_number[]" id="position_number" placeholder="ระบุตำแหน่งเลขที่" class="input-data" style="width: 120px;" value="<?php echo $listNameData2->position_number?>" readonly>&nbsp;
<!--                <i class="glyphicon glyphicon-trash" style="cursor: pointer;" title="ลบรายชื่อ" onClick="remove_thisName('<?php //echo $listNameData2->id?>','<?php //echo $documentData2->id?>','','rowName<?php //echo $numtr?>')" ></i>-->
			  </td>
            </tr>
			  
	<?php $numtr++; } ?>	  
			  
			<!--<tr class="tdheight">
      			<td height="30">&nbsp;</td>
    		</tr>-->
			
			  
			<tr id="xxx" style="display: none">
      			<td height="30">&nbsp;</td>
    		</tr>  
			  
	<?php } ?>		  
          </tbody>
        </table>		
		</td>
    </tr>
	  


    <tr>
      <td height="40">&nbsp;</td>
    </tr>
    <?php if($documentData2->withdraw!='0'){?>
	<tr>
      <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;โดยเบิกค่าใช้จ่ายจากคณะ&nbsp;จำนวน&nbsp;<input type="text" name="total_price" id="total_price" placeholder="ระบุจำนวนเงิน" class="input-data" style="width: 200px;" value="<?php if($documentData2->total_price != '0.00'){ echo number_format($documentData2->total_price); }?>" readonly>&nbsp;บาท&nbsp;โดยมีค่าใช้จ่ายดังนี้
		  
	<?php	
       
        $withdrawNum = $withdrawNum->num_rows();
			if($withdrawNum > 0){
				
				$num_withdraw = 1;
				$num_withdrawDataOut = $withdrawData_out->num_rows();
				if($num_withdrawDataOut > 0){
					foreach($withdrawData_out->result() as $withdrawData_out2){} 					
	?>		  
	<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ค่าใช้จ่ายระหว่างประเทศ)</strong><br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
			<?php if($withdrawData_out2->allowance1_baht != '0.00'){ ?>		  
            <tr>
              <td width="10%" align="right"><?php echo $num_withdraw?></td>
              <td width="12%" align="left">&nbsp;ค่าเบี้ยเลี้ยง 1</td>
              <td align="center"><input type="text" name="allowance1_days" id="allowance1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance1_baht', 'allowance1_total')" value="<?php echo $withdrawData_out2->allowance1_days?>" readonly></td>
              <td width="" align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td  align="center"><input type="text" name="allowance1_baht" id="allowance1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance1_days', 'allowance1_total')" value="<?php echo number_format($withdrawData_out2->allowance1_baht)?>" readonly> บาท</td>
              <td width="" align="right">&nbsp;&nbsp; รวม</td>
              <td width="" align="center"><input type="text" name="allowance1_total" id="allowance1_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->allowance1_total)?>" readonly ></td>
              <td width="" align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData_out2->allowance2_baht != '0.00'){ ?>	  
			<tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าเบี้ยเลี้ยง 2</td>
              <td align="center"><input type="text" name="allowance2_days" id="allowance2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance2_baht', 'allowance2_total')" value="<?php echo $withdrawData_out2->allowance2_days?>" readonly></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td align="center"><input type="text" name="allowance2_baht" id="allowance2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'allowance2_days', 'allowance2_total')" value="<?php echo number_format($withdrawData_out2->allowance2_baht)?>" readonly> บาท</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="allowance2_total" id="allowance2_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->allowance2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>   
			  
			<?php if($withdrawData_out2->accommodation1_baht != '0.00'){ ?>	  
            <tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าที่พัก 1</td>
              <td align="center"><input type="text" name="accommodation1_days" id="accommodation1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" value="<?php echo $withdrawData_out2->accommodation1_days?>" onChange="calculateAmount(this.value, '1', 'accommodation1_baht', 'accommodation1_total')" readonly></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="accommodation1_baht" id="accommodation1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation1_days', 'accommodation1_total')" value="<?php echo number_format($withdrawData_out2->accommodation1_baht)?>" readonly> บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="accommodation1_total" id="accommodation1_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->accommodation1_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?> 
			  
			<?php if($withdrawData_out2->accommodation2_baht != '0.00'){ ?>  
			<tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าที่พัก 2</td>
              <td align="center"><input type="text" name="accommodation2_days" id="accommodation2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" value="<?php echo $withdrawData_out2->accommodation2_days?>" onChange="calculateAmount(this.value, '1', 'accommodation2_baht', 'accommodation2_total')" readonly></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="accommodation2_baht" id="accommodation2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '1', 'accommodation2_days', 'accommodation2_total')" value="<?php echo number_format($withdrawData_out2->accommodation2_baht)?>" readonly> บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="accommodation2_total" id="accommodation2_total" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->accommodation2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData_out2->accommodation2_baht != '0.00'){ ?> 			  
            <tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="passage_baht" id="passage_baht" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData_out2->passage_baht)?>" onChange="calculate_totalPrice(this.value, '1')" readonly></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData_out2->other_baht != '0.00'){ ?>			  
            <tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td colspan="4" align="left">&nbsp;อื่นๆ
              <input type="text" name="other_text" id="other_text" placeholder="" class="input-data" style="width: 300px;" value="<?php echo $withdrawData_out2->other_text?>" readonly></td>
			  <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="other_baht" id="other_baht" placeholder="" class="input-data withdraw1" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '1')" value="<?php echo number_format($withdrawData_out2->other_baht)?>" readonly></td>
              <td align="left">บาท</td>	
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>			  
			  
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; <strong>รวม</strong>&nbsp;</td>
              <td align="center"><input type="text" name="total_price2" id="total_price2" placeholder="" readonly class="input-data" style="text-align: right;" data-mask="fdecimal" data-dec="," data-rad="." value="<?php echo number_format($withdrawData_out2->total_price)?>" readonly></td>
              <td align="left">&nbsp;<strong>บาท</strong></td>
            </tr>
          </tbody>
        </table>
		<?php } ?>		  
		</td>
    </tr>	  
	  
	<?php 	

        $num_withdrawData = $withdrawData->num_rows();
			if($num_withdrawData > 0){
				$num_withdraw = 1;
				foreach($withdrawData->result() as $withdrawData2){} ?>	    
	<tr>
      <td height="40"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>(ค่าใช้จ่ายในประเทศ)</strong><br><br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <?php if($withdrawData2->allowance1_baht != '0.00'){ ?>		  
            <tr>
              <td width="10%" align="right"><?php echo $num_withdraw?></td>
              <td width="12%" align="left">&nbsp;ค่าเบี้ยเลี้ยง 1</td>
              <td align="center"><input type="text" name="Nallowance1_days" id="Nallowance1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance1_baht', 'Nallowance1_total')" value="<?php echo $withdrawData2->allowance1_days?>" readonly></td>
              <td width="" align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td  align="center"><input type="text" name="Nallowance1_baht" id="Nallowance1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance1_days', 'Nallowance1_total')" value="<?php echo number_format($withdrawData2->allowance1_baht)?>" readonly> บาท</td>
              <td width="" align="right">&nbsp;&nbsp; รวม</td>
              <td width="" align="center"><input type="text" name="Nallowance1_total" id="Nallowance1_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->allowance1_total)?>" readonly ></td>
              <td width="" align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData2->allowance2_baht != '0.00'){ ?>	  
			<tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าเบี้ยเลี้ยง 2</td>
              <td align="center"><input type="text" name="Nallowance2_days" id="Nallowance2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance2_baht', 'Nallowance2_total')" value="<?php echo $withdrawData2->allowance2_days?>" readonly></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
              <td align="center"><input type="text" name="Nallowance2_baht" id="Nallowance2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Nallowance2_days', 'Nallowance2_total')" value="<?php echo number_format($withdrawData2->allowance2_baht)?>" readonly> บาท</td>
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Nallowance2_total" id="Nallowance2_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->allowance2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>   
			  
			<?php if($withdrawData2->accommodation1_baht != '0.00'){ ?>	  
            <tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าที่พัก 1</td>
              <td align="center"><input type="text" name="Naccommodation1_days" id="Naccommodation1_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" value="<?php echo $withdrawData2->accommodation1_days?>" onChange="calculateAmount(this.value, '2', 'Naccommodation1_baht', 'Naccommodation1_total')" readonly></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="Naccommodation1_baht" id="Naccommodation1_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation1_days', 'Naccommodation1_total')" value="<?php echo number_format($withdrawData2->accommodation1_baht)?>" readonly> บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Naccommodation1_total" id="Naccommodation1_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->accommodation1_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?> 
			  
			<?php if($withdrawData2->accommodation2_baht != '0.00'){ ?>  
			<tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าที่พัก 2</td>
              <td align="center"><input type="text" name="Naccommodation2_days" id="Naccommodation2_days" placeholder="" class="input-data" style="width: 100px; text-align: right;" value="<?php echo $withdrawData2->accommodation2_days?>" onChange="calculateAmount(this.value, '2', 'Naccommodation2_baht', 'Naccommodation2_total')" readonly></td>
              <td align="center">&nbsp;&nbsp;วัน x อัตรา&nbsp;</td>
			  <td align="center"><input type="text" name="Naccommodation2_baht" id="Naccommodation2_baht" placeholder="" class="input-data" style="text-align: right;" onChange="calculateAmount(this.value, '2', 'Naccommodation2_days', 'Naccommodation2_total')" value="<?php echo number_format($withdrawData2->accommodation2_baht)?>" readonly> บาท</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Naccommodation2_total" id="Naccommodation2_total" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->accommodation2_total)?>" readonly ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData2->accommodation2_baht != '0.00'){ ?> 			  
            <tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td align="left">&nbsp;ค่าพาหนะ</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
			  <td align="center">&nbsp;</td>	
              <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input readonly type="text" name="Npassage_baht" id="Npassage_baht" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" value="<?php echo number_format($withdrawData2->passage_baht)?>" onChange="calculate_totalPrice(this.value, '2')" ></td>
              <td align="left">บาท</td>
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>  
			  
			<?php if($withdrawData2->other_baht != '0.00'){ ?>			  
            <tr>
              <td align="right"><?php echo $num_withdraw?></td>
              <td colspan="4" align="left">&nbsp;อื่นๆ
              <input type="text" name="Nother_text" id="Nother_text" placeholder="" class="input-data" style="width: 300px;" value="<?php echo $withdrawData2->other_text?>" readonly></td>
			  <td align="right">&nbsp;&nbsp; รวม</td>
              <td align="center"><input type="text" name="Nother_baht" id="Nother_baht" placeholder="" class="input-data withdraw2" style="width: 100px; text-align: right;" onChange="calculate_totalPrice(this.value, '2')" value="<?php echo number_format($withdrawData2->other_baht)?>" readonly></td>
              <td align="left">บาท</td>	
            </tr>
			<?php $num_withdraw = $num_withdraw + 1;  } ?>			  
			  
            <tr>
              <td align="right">&nbsp;</td>
              <td colspan="4" align="left">&nbsp;</td>
              <td align="right">&nbsp;&nbsp; <strong>รวม</strong>&nbsp;</td>
              <td align="center"><input type="text" name="Ntotal_price2" id="Ntotal_price2" placeholder="" readonly class="input-data" style="text-align: right;" data-mask="fdecimal" data-dec="," data-rad="." value="<?php echo number_format($withdrawData2->total_price)?>" readonly></td>
              <td align="left">&nbsp;<strong>บาท</strong></td>
            </tr>
          </tbody>
        </table>
		</td>
    </tr>	  
<?php }  } ?>   
	  
	<tr>
      <td height="30">&nbsp;</td>
    </tr>
    <?php }?>

	  
	<?php if($documentData2->vacation == '0'){ ?>	  
	<tr style="display: none" class="hide_tr">
      <td><br>
		  <div id="div_vacation">33333333333</div>
	  </td>
    </tr>
	<?php } ?>  
	
	<?php if($documentData2->vacation == '1'){ ?>  
	<tr class="hide_tr">
      <td><br>
		  <div id="div_vacation">
			  
		  		<div class="form-group">
					<label for="date_office" class="col-sm-3 control-label">วันที่เดินทางออกจากสำนักงาน</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_office" name="date_office" value="<?php if($documentData2->date_office != '0000-00-00'){ echo $documentData2->date_office; }?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="date_office2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงสำนักงาน</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_office2" name="date_office2" value="<?php if($documentData2->date_office2 != '0000-00-00'){ echo $documentData2->date_office2; }?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="date_thailand" class="col-sm-3 control-label">วันที่เดินทางออกจากประเทศไทย</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_thailand" name="date_thailand" value="<?php if($documentData2->date_thailand != '0000-00-00'){ echo $documentData2->date_thailand; }?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label for="date_thailand2" class="col-sm-3 control-label">วันที่เดินทางกลับถึงประเทศไทย</label>
					<div class="col-sm-5">
						<input type="date" class="form-control input-data" id="date_thailand2" name="date_thailand2" value="<?php if($documentData2->date_thailand2 != '0000-00-00'){ echo $documentData2->date_thailand2; }?>" readonly>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">รายชื่อผู้เดินทาง</label>			
				</div>
			  
			    <?php 	$disabled = "";  $dateVacation2 = "";
						if($documentData2->all_vacation == '1'){
	
							$dateVacation2 = $this->Allowance_model->get_someField($documentData2->id, 'date_vacation', 'tbl_vacation_data', 'document_id');	
							$disabled = "disabled";					  
						}
			  	?>

				<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<div class="checkbox">
							<label><input type="checkbox" id="vacation" name="vacationAll" value="1" onClick="edit_select_listName(this.checked, '1', 'date_vacationA', 'x')" <?php if($documentData2->all_vacation == '1'){ echo "checked"; } ?> readonly>ทุกคน</label>
						</div>		
					</div>
					<div class="col-sm-7">
						<input type="text" class="form-control input-data checkName" id="date_vacationA" name="date_vacationA" value="<?php echo $dateVacation2?>" placeholder="ตัวอย่าง 10 ม.ค. 2562 , 15 ม.ค. 2562 หรือ 10-12 ม.ค. 2562" readonly>
					</div>
				</div> 	

				<?php 	$numName = 1; $arrCount = 0; $vacationArr = array();									  
											  
						foreach($vacationData->result() as $vacationData2){						
							$vacationArr[] = $vacationData2->grouplist_id;
						}				  
						   
						foreach($listNameData->result() as $list_vacation){							
							
							if(((in_array($list_vacation->id, $vacationArr))) && ($documentData2->all_vacation == '0')){
								
								$ch = "checked";								
								$vacation_id = $list_vacation->id;
								$dateVacation = $this->Allowance_model->get_someField($list_vacation->id, 'date_vacation', 'tbl_vacation_data', 'grouplist_id');
								
							} else {
								
								$ch = ""; 
								$vacation_id = ""; 
								$dateVacation = "";
							}							
				?>
				<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-3">
						<div class="checkbox">
							<label><input readonly type="checkbox" id="vacation<?php echo $list_vacation->id?>" name="vacation[]" class="checkName" onClick="edit_select_listName(this.checked ,'2' ,'date_vacation<?php echo $list_vacation->id?>', '<?php echo $list_vacation->id?>')" value="<?php echo $list_vacation->name?>" <?php echo $ch; echo $disabled;?> ><?php echo $numName.'. '.$list_vacation->name?></label>
							
							<!--<label><input type="checkbox" id="vacation<?php //echo $arrCount?>" name="vacation[]" class="checkName" onClick="edit_select_listName(this.checked ,'2' ,'date_vacation<?php //echo $arrCount?>', '<?php //echo $list_vacation->id?>')" value="<?php //echo $list_vacation->name?>" <?php //echo $ch; echo $disabled;?> ><?php //echo $numName.'. '.$list_vacation->name?></label>-->
							
							<!--onClick="select_listName(this.checked,'2','date_vacation<?php //echo $arrCount?>')"-->
							
						</div>				
					</div>
					<div class="col-sm-7">
						<input type="text" class="form-control input-data checkName" id="date_vacation<?php echo $arrCount?>" name="date_vacation[]" placeholder="ตัวอย่าง 10 ม.ค. 2562 , 15 ม.ค. 2562 หรือ 10-12 ม.ค. 2562" onChange="keyInput_changeCheckbox('<?php echo $arrCount?>',this.value)" value="<?php echo $dateVacation;?>" <?php echo $disabled;?> readonly>
					</div>
				</div>
				<?php $numName++;  $arrCount++; } ?>		  
		  
		  </div>
	  </td>
    </tr> 
	<?php } ?>	  
	  
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
      <td height="30" align="center" valign="bottom"><input type="text" placeholder="ลงชื่อ" class="input-data" style="width: 263px;" id="name_surname" name="name_surname" value="<?php if($documentData2->name_surname != ''){ echo $documentData2->name_surname; }?>" readonly><!--(นายวรดร ไผ่เรือง)--></td>
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
										<input type="radio" id="rd-2" name="radio2"  value="0" onclick="notExpenses()" checked onchange="	$('#radio2_error').html('').css('color', 'red');" readonly>
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
                                                        <?php }?>
								 <?php if($this->session->userdata['logged_in']['status']!='user'){?>
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
										<input type="text" class="form-control" id="command" >
									</div>
								</div>
                                                                 <?php }?>
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-9">								 
										<p class="bs-example">  <?php if($this->session->userdata['logged_in']['status']!='user'){?>
											<button onclick="sendpass('<?php echo $doccuid?>','pass','ผ่าน')" type="button" class="btn btn-green btn-icon">ผ่าน<i class="entypo-check"></i> </button> 
											<button onclick="sendpass('<?php echo $doccuid?>','fail','ไม่ผ่าน')" type="button" class="btn btn-red btn-icon">ไม่ผ่าน<i class="entypo-cancel"></i> </button>
                                                                                <?php }?>
                                            <?php 
                                            
                                            $career2 = $group_listNameData2->career_id;
                                            if(($withdraw==1)&&($for_type==2)&&($career2==1)){?>
                                                                                        <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('preview_outboundGroup','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button> 
                                            <?php }else if(($withdraw==0)&&($for_type==2)&&($career2==1)){?>
                                              <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('outboundGroup_noWithdraw','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }else if(($withdraw==1)&&($for_type==2)&&($career2!=1)){?>
						<button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('preview_outboundGroup','<?php echo $doccuid?>'),'<?php echo $documentData2->user_create?>'">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }else if(($withdraw==0)&&($for_type==2)&&($career2!=1)){?>				
                                                <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('outboundGroup_noWithdraw','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }else if(($withdraw==1)&&($for_type==1)&&($career2==1)){?>
                                                <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('preview_outboundWithdraw','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }else if(($withdraw==0)&&($for_type==1)&&($career2==1)){?>
                                                 <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('preview_outbound','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }else if(($withdraw==1)&&($for_type==1)&&($career2!=1)){?>
                                                    <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('preview_outboundWithdraw','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }else if(($withdraw==0)&&($for_type==1)&&($career2!=1)){?>
                                                    <button  type="button" class="btn btn-blue btn-icon"  onclick="Preview('preview_outbound','<?php echo $doccuid?>','<?php echo $documentData2->user_create?>')">ดูตัวอย่างบน PDF<i class="entypo-search"></i> </button>  
                                            <?php }?>
                                                                                </p>
									</div> 
								</div>	
									
							
							
							<?php if(($documentData2->for_type == '2') && ($documentData2->withdraw == '1')){
										$url_preview = 'preview_outboundGroup';
	
								  }
							?>							
							<input type="hidden" id="url_preview" value="<?php echo $url_preview?>">
							<input type="hidden" id="for_type" name="for_type" value="<?php echo $documentData2->for_type;?>">
							<input type="hidden" id="reason_request" name="reason_request" value="<?php echo $documentData2->reason_request;?>">
							<input type="hidden" id="withdraw" name="withdraw" value="<?php echo $documentData2->withdraw;?>">
                                                        
						
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
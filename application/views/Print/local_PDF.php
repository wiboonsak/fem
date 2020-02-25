<?php
//============================================================+
// File name   : example_061.php
// Begin       : 2010-05-24
// Last Update : 2014-01-25
//
// Description : Example 061 for TCPDF class
//               XHTML + CSS
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */

// Include the main TCPDF library (search for installation path).
//require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('ขออนุมัติเดินทางภายในประเทศ');
//$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);
$pdf->SetMargins(20, 10, 20, true);

$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set auto page breaks
//$pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_FOOTER);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('thsarabun', '',16);

// add a page
$pdf->AddPage();

/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */                   
	function DateThai($strDate){
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	function zero($value){
		if($value == 0 || $value == 0.00 || $value == "00" || $value == "0" || $value == null || $value == "null"){
			return "-";
		}else{
			return $value;
		}
	}

foreach($userDetail->result() as $userDetail2){}
$career_id = $userDetail2->career_id;
$array1 = array('1','5');						
$array2 = array('2','3','4','6');

foreach($documentData->result() as $documentData2){ }

$careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
foreach($careerData->result() as $careerData2){ }
							
$positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
foreach($positionData->result() as $positionData2){ }

if(in_array($userDetail2->career_id, $array1)){ 
	
	$to = 'อธิการบดี'; 
	
	
}else{ 
	$to = 'คณบดีคณะการจัดการสิ่งแวดล้อม'; 
	
}

	if($documentData2->vacation == '0'){
	
		$month_start = $this->Allowance_model->get_month($documentData2->date_start,'1'); 
		$month_end = $this->Allowance_model->get_month($documentData2->date_end,'1');
		$days = round(abs(strtotime($documentData2->date_start)-strtotime($documentData2->date_end))/86400);
		$txt_vacation ='';

		if($month_start == $month_end){		

			$date_start = substr($documentData2->date_start,8);
			if($date_start < 10){ 
				$date_start = str_replace("0", "", $date_start); 
			} 
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.'-'.$date_start2;

		} else {  

			$date_start = DateThai($documentData2->date_start);
			$date_start = substr($date_start,-4);			
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.' - '.$date_start2;	
		}
		
	} else {
		
		$month_start = $this->Allowance_model->get_month($documentData2->date_start,'1'); 
		$month_end = $this->Allowance_model->get_month($documentData2->date_end,'1');	
		$days = round(abs(strtotime($documentData2->date_start)-strtotime($documentData2->date_end))/86400);
		
		foreach($vacationData->result() as $vacationData2){}
		
		$txt_vacation = ' (ลาพักผ่อนวันที่ '.$vacationData2->date_vacation.')';

		if($month_start == $month_end){		

			$date_start = substr($documentData2->date_start,8);
			if($date_start < 10){ 
				$date_start = str_replace("0", "", $date_start); 
			} 
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.'-'.$date_start2;

		} else {  

			$date_start = DateThai($documentData2->date_start);
			//$date_start = substr($date_start,-4);			
			//$date_start = substr($date_start,0,-4);			
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.' - '.$date_start2;	
		}	
	}	 	

	switch($documentData2->travel_for){
		case "0":
			$travel_for = "";
			break;
		case "1":
			$travel_for = "เข้าร่วมประชุม";
			break;
		case "2":
			$travel_for = "เข้าร่วมประชุมทางวิชาการ";
			break;
		case "3":
			$travel_for = "ฝึกอบรม";
			break;
		case "4":
			$travel_for = "ดูงาน";
			break;
		case "5":
			$travel_for = "ประชุมเชิงปฎิบัติการ";
			break;	
		case "6":
			$travel_for = "ปฏิบัติงานเพื่อปรึกษาหารือ";
			break;	
	}
	if($documentData2->saraban_number != ''){
		
		$saraban_number = $documentData2->saraban_number;
		
	} else if($documentData2->saraban_number == ''){
		
		$saraban_number = 'มอ 820/';
	}

if($documentData2->withdraw == '1'){ 	
	
	if($documentData2->vacation == '0'){
	
		$month_start = $this->Allowance_model->get_month($documentData2->date_start,'1'); 
		$month_end = $this->Allowance_model->get_month($documentData2->date_end,'1');	
		$days = round(abs(strtotime($documentData2->date_start) - strtotime($documentData2->date_end))/86400);
		$txt_vacation =''; 

		if($month_start == $month_end){		

			$date_start = substr($documentData2->date_start,8);
			if($date_start < 10){ 
				$date_start = str_replace("0", "", $date_start); 
			} 
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.'-'.$date_start2;

		} else {  

			$date_start = DateThai($documentData2->date_start);
			$date_start = substr($date_start,-4);			
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.' - '.$date_start2;	
		}
		
	} else {
		
		$month_start = $this->Allowance_model->get_month($documentData2->date_office,'1'); 
		$month_end = $this->Allowance_model->get_month($documentData2->date_office2,'1');
		$days = round(abs(strtotime($documentData2->date_office) - strtotime($documentData2->date_office2))/86400);
		
		foreach($vacationData->result() as $vacationData2){}
		
		$txt_vacation = ' (ลาพักผ่อนวันที่ '.$vacationData2->date_vacation.')';

		if($month_start == $month_end){		

			$date_start = substr($documentData2->date_office,8);
			if($date_start < 10){ 
				$date_start = str_replace("0", "", $date_start); 
			} 
			$date_start2 = DateThai($documentData2->date_office2);			
			$txt_date =	$date_start.'-'.$date_start2;

		} else {  

			$date_start = DateThai($documentData2->date_office);
			$date_start = substr($date_start,-4);			
			$date_start2 = DateThai($documentData2->date_office2);			
			$txt_date =	$date_start.' - '.$date_start2;	
		}		
	}	

		$withdrawNum = $withdrawData->num_rows();
		if($withdrawNum > 0){
			
			$td_withdraw = ''; $subject_doc2 =''; $total_price = 0; $txtbaht ='';
			//$td_withdraw ='<tr><td colspan="7" align="left">ประมาณการค่าใช้จ่าย (ค่าใช้จ่ายระหว่างประเทศ)</td></tr>';
			
			//$num_withdraw = 1;
			foreach($withdrawData->result() as $withdrawData2){	
				
				if(($withdrawNum == 1) && ($withdrawData2->type_travel == '1')){
					
					$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
				}
				else if(($withdrawNum == 1) && ($withdrawData2->type_travel == '2')){
					
					$subject_doc2 = 'ขออนุมัติค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน ณ ต่างประเทศ';
				}
				else if($withdrawNum == 2){
					
					$subject_doc2 = 'ขออนุมัติเดินทางในประเทศเพื่อไปต่างประเทศ และขอเบิกค่าใช้จ่าย';
				}				
				$num_withdraw = 1;
				$total_price = $total_price + $withdrawData2->total_price; 
				//if($withdrawData2->type_travel == '2'){
					
					$td_withdraw_txt = '<tr><td colspan="7" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ประมาณการค่าใช้จ่าย<!-- (ค่าใช้จ่ายระหว่างประเทศ และค่าใช้จ่ายในประเทศ)--></td></tr>';
				/*}
				if($withdrawData2->type_travel == '1'){
					
					$td_withdraw_txt = '<tr><td colspan="7" align="left">ประมาณการค่าใช้จ่าย (ค่าใช้จ่ายในประเทศ)</td></tr>';
				}*/				
				
				if($withdrawData2->allowance1_baht != '0.00'){
					
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">'.$num_withdraw.'.&nbsp;&nbsp;</td>
					  <td width="163" align="left" colspan="2">ค่าเบี้ยเลี้ยง 1</td>
					  <td width="120" align="left">'.$withdrawData2->allowance1_days.' วัน x '.number_format($withdrawData2->allowance1_baht).' บาท</td>
					  <td width="45" align="right">&nbsp;&nbsp; รวม</td>
					  <td width="95" align="right">'.number_format($withdrawData2->allowance1_total).'</td>
					  <td width="50" align="left">&nbsp;&nbsp;บาท</td>	  
					</tr>';
					
					$num_withdraw = $num_withdraw + 1;
				}
				if($withdrawData2->allowance2_baht != '0.00'){
					
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">'.$num_withdraw.'.&nbsp;&nbsp;</td>
					  <td width="163" align="left" colspan="2">ค่าเบี้ยเลี้ยง 2</td>
					  <td width="120" align="left">'.$withdrawData2->allowance2_days.' วัน x '.number_format($withdrawData2->allowance2_baht).' บาท</td>
					  <td width="45" align="right">&nbsp;&nbsp; รวม</td>
					  <td width="95" align="right">'.number_format($withdrawData2->allowance2_total).'</td>
					  <td width="50" align="left">&nbsp;&nbsp;บาท</td>	  
					</tr>';	
					
					$num_withdraw = $num_withdraw + 1;
				}
				if($withdrawData2->accommodation1_baht != '0.00'){
					
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">'.$num_withdraw.'.&nbsp;&nbsp;</td>
					  <td width="163" align="left" colspan="2">ค่าที่พัก 1</td>
					  <td width="120" align="left">'.$withdrawData2->accommodation1_days.' วัน x '.number_format($withdrawData2->accommodation1_baht).' บาท</td>
					  <td width="45" align="right">&nbsp;&nbsp; รวม</td>
					  <td width="95" align="right">'.number_format($withdrawData2->accommodation1_total).'</td>
					  <td width="50" align="left">&nbsp;&nbsp;บาท</td>	  
					</tr>';		
					
					$num_withdraw = $num_withdraw + 1;
				}
				if($withdrawData2->accommodation2_baht != '0.00'){
					
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">'.$num_withdraw.'.&nbsp;&nbsp;</td>
					  <td width="163" align="left" colspan="2">ค่าที่พัก 2</td>
					  <td width="120" align="left">'.$withdrawData2->accommodation2_days.' วัน x '.number_format($withdrawData2->accommodation2_baht).' บาท</td>
					  <td width="45" align="right">&nbsp;&nbsp; รวม</td>
					  <td width="95" align="right">'.number_format($withdrawData2->accommodation2_total).'</td>
					  <td width="50" align="left">&nbsp;&nbsp;บาท</td>	  
					</tr>';	
					
					$num_withdraw = $num_withdraw + 1;
				}
				if($withdrawData2->passage_baht != '0.00'){
					
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">'.$num_withdraw.'.&nbsp;&nbsp;</td>
					  <td width="163" align="left" colspan="2">ค่าพาหนะ</td>
					  <td width="120">&nbsp;</td>
					  <td width="45" align="right">&nbsp;&nbsp; รวม</td>
					  <td width="95" align="right">'.number_format($withdrawData2->passage_baht).'</td>
					  <td width="50" align="left">&nbsp;&nbsp;บาท</td>	  
					</tr>';
					
					$num_withdraw = $num_withdraw + 1;
				}
				if($withdrawData2->other_baht != '0.00'){   
					
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">'.$num_withdraw.'.&nbsp;&nbsp;</td>
					  <td width="163" align="left" colspan="2">'.$withdrawData2->other_text.'</td>
					  <td width="120">&nbsp;</td>
					  <td width="45" align="right">&nbsp;&nbsp; รวม</td>
					  <td width="95" align="right">'.number_format($withdrawData2->other_baht).'</td>
					  <td width="50" align="left">&nbsp;&nbsp;บาท</td>	  
					</tr>';	
					
					$num_withdraw = $num_withdraw + 1;
				}
					$td_withdraw = $td_withdraw.'					
					<tr>
					  <td width="90" align="right">&nbsp;</td>
					  <td width="163" align="left" colspan="2">&nbsp;</td>
					  <td width="120">&nbsp;</td>
					  <td width="45" align="right">&nbsp;&nbsp; <strong>รวม</strong></td>
					  <td width="95" align="right"><strong>'.number_format($withdrawData2->total_price).'</strong></td>
					  <td width="50" align="left">&nbsp;&nbsp;<strong>บาท</strong></td>	  
					</tr>';
			}				
			
			$td_withdraw = $td_withdraw_txt.$td_withdraw;			
			//$td_withdraw = $td_withdraw;
			if($total_price > 0){
				
				$txtbaht = 'จำนวนเงิน '.number_format($total_price).' บาท ('.$this->Allowance_model->convert(number_format($total_price,2)).')&nbsp;';
			}
		}
}

$html2 = ' <br><br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="6%" valign="top"><img src="'.base_url().'allowance/assets/logo_psu.png" width="80" height="132" alt=""/></td>
      <td width="94%" align="center" valign="bottom" style="font-size: 29pt"><strong>บันทึกข้อความ</strong></td>
    </tr>
  </tbody>
</table><br>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
		<td width="14%" align="left" valign="bottom"><span style="font-size: 20pt;"><strong>ส่วนงาน</strong></span></td>
		<td width="35%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;คณะการจัดการสิ่งแวดล้อม</td>
		<td width="7%" align="left" valign="bottom"><span style="font-size: 20pt;">&nbsp;<strong>โทร.</strong></span></td>
		<td width="44%" align="left" style="border-bottom: 0px dotted #000000;" valign="bottom"> &nbsp;&nbsp;'.$documentData2->telephone_number.'</td>		
    </tr>
    <!--<tr>
      <td height="5" align="left"></td>
      <td height="5" align="left" style="border-top: 1px dotted #000000;"></td>
      <td align="left" style="border-top: 1px dotted #000000;"></td>
    </tr>-->	
	
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
	  <td width="5%" align="left" valign="bottom"><span style="font-size: 20pt"><strong>ที่</strong></span></td>
      <td width="44%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;'.$saraban_number.'</td>
	  <td width="7%" align="left" valign="bottom">&nbsp;<span style="font-size: 20pt"><strong>วันที่</strong></span></td>
      <td width="44%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;&nbsp;'.DateThai($documentData2->date_create).'</td>
    </tr>
    <!--<tr>
      <td height="5"></td>
      <td height="5" style="border-top: 1px dotted #000000;"></td>
      <td height="5"></td>
      <td height="5" style="border-top: 1px dotted #000000;"></td>
    </tr>-->   
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="7%" align="left" valign="bottom"><span style="font-size: 20pt"><strong>เรื่อง</strong></span></td>
      <td width="93%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;'.$documentData2->subject_document.'</td>
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
      <td width="8%" align="left" valign="bottom"><span style="font-size: 20pt"><strong>เรียน</strong></span></td>
      <td width="92%" height="30" align="left" valign="bottom">'.$to.'</td>
    </tr>
    <tr>
      <td height="20" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วย '.$userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.' '.$careerData2->career.' &nbsp; ตำแหน่ง'.$positionData2->position.'&nbsp;สังกัดคณะการจัดการสิ่งแวดล้อม มีความประสงค์จะเดินทางไป'.$travel_for.'&nbsp;เรื่อง '.$documentData2->subject_form.'&nbsp;ณ&nbsp;'.$documentData2->place.$txt_vacation.'&nbsp;มีกำหนด&nbsp;'.$days.'&nbsp;วัน&nbsp;ตั้งแต่วันที่&nbsp;'.$txt_date.' โดยใช้เงินสนับสนุนจาก&nbsp;'.$documentData2->money_source.'&nbsp;'.$txtbaht;
	
	if(($documentData2->reason_request == '1') && ($documentData2->withdraw == '1')){		  
		  
		  $quota = 0; $money = 0; $balance = 0;
		  $checkQuota = $this->Allowance_model->check_quota($userDetail2->id);
		  $numQuota = $checkQuota->num_rows();

		  if($numQuota > 0){

			  foreach($checkQuota->result() as $checkQuota2){}
			  $quota = $checkQuota2->quota;

			  $money = $this->Allowance_model->calculate_money($userDetail2->id);		
			  $balance = $quota - $money;	
		  }		  
		$html2 = $html2.'<U>ตามสิทธิคงเหลือ '.number_format($balance).' บาท</U>&nbsp;';	  
	}
	  
	  $html2 = $html2.'ดังเอกสารที่แนบมาพร้อมนี้</td></tr>';		
	
if($documentData2->withdraw == '1'){
	
$html2 = $html2.'<tr>
      <td height="40"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <!--<tr>
      <td colspan="7" align="left">&nbsp;</td>
    </tr>-->
	'.$td_withdraw .'    
  </tbody>
</table>
		</td>
    </tr>';
}	
	
if(in_array($userDetail2->career_id, $array2)){	
	
	$html2 = $html2.'
	<tr>
      <td align="left" style="text-align: justify;">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  จึงเรียนมาเพื่อโปรดพิจารณาด้วย จะเป็นพระคุณยิ่ง';
	  
	if($documentData2->select_checkbox == '1'){
	  $html2 = $html2.'<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางทีแน่นอนต่อไปด้วย';	  
	}
	if($documentData2->select_checkbox == '2'){  
	  $html2 = $html2.'<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ';
	}
	if($documentData2->select_checkbox == '4'){	  
	  $html2 = $html2.'<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางทีแน่นอนต่อไปด้วย
	  <br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ';
	}	  
	  
	$html2 = $html2.'</td>
    </tr>
</tbody>
</table>'; 
}

if(in_array($userDetail2->career_id, $array1)){
	
	$html2 = $html2.'	
    <tr>
      <td style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="doCH">จึงเรียนมาเพื่อโปรดพิจารณาด้วย จะเป็นพระคุณยิ่ง';
	  
	if($documentData2->select_checkbox == '3'){	  
	  $html2 = $html2.'&nbsp; และลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ&nbsp; แจ้งงาน ทะเบียนประวัติ&nbsp; และต้นฉบับคืนหน่วยงาน';
	  
	}
	  
	  $html2 = $html2.'</span></td>
    </tr>
</tbody>
</table>'; 
}	

$html2 = $html2.'
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
	<tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td width="50%">&nbsp;</td>
      <td width="50%" height="30" align="center">(ลงชื่อ).............................................................</td>
    </tr>
    <tr>
      <td width="50%" align="left" valign="bottom">&nbsp;</td>
      <td height="30" align="center" valign="bottom">('.$userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.')</td>
    </tr>
    <tr>
      <td width="50%">&nbsp;</td>
      <td width="50%" height="30" align="center">'.$positionData2->position.'</td>
    </tr>
    <!--<tr>
      <td >&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>-->
    <tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>';


//if(($documentData2->approve_id != 0) && (in_array($userDetail2->career_id, $array2))){ 	
if($documentData2->approve_id != 0){ 	
   
        $approveName = $this->Allowance_model->get_userDetail($documentData2->approve_id);
		foreach($approveName->result() as $approveName2){}
		 if($approveName2->titlename!=''){
                    $approve_name = $approveName2->titlename.$approveName2->firstname.' '.$approveName2->lastname;
                }else{
                    $approve_name = $approveName2->firstname.' '.$approveName2->lastname;
                }
		$position_approve = $this->Allowance_model->get_position($approveName2->position_id);
		foreach($position_approve->result() as $position_approve2){}
	
	    if(($approveName2->position_manage != 0) && ($approveName2->act_for_else != 0)){
                    if($approveName2->position_manage == 1){
                        $txtpmana = 'รองคณบดีฝ่ายวิจัย';
                    }else if($approveName2->position_manage == 2){
                        $txtpmana = 'รองคณบดีฝ่ายวางแผนและการเงิน';
                    }else if($approveName2->position_manage == 3){
                        $txtpmana = 'รองคณบดีฝ่ายสื่อสารองค์กร';
                    }else if($approveName2->position_manage == 4){
                        $txtpmana = 'หัวหน้าสาขาวิชาการจัดการสิ่งแวดล้อม';
                    }
                    
                    if($approveName2->act_for_else == 1){
                        $txtact = 'รักษาการแทน';
                    }else if($approveName2->act_for_else == 2){
                        $txtact = 'ปฏิบัติการแทน';
                    }
                    $txtposition = ''.$txtpmana.' '.$txtact.'';
                    $position = 'คณบดีคณะการจัดการสิ่งแวดล้อม';
                }else{
                    $txtposition = '';
                    $position = $position_approve2->position;
                }
	
	$html2 = $html2.'
	<table width="100%" border="0" cellpadding="0" cellspacing="0" >
  <tbody>
    <tr>';
        
        if($documentData2->offer_text!=''){
        $getsetadmin = $this->Allowance_model->getsetadmin('2',$documentData2->reason_request);
        foreach ($getsetadmin->result() AS $getsetadmin2){}
         if($getsetadmin2->titlename!=''){
            $adminname = $getsetadmin2->titlename.$getsetadmin2->firstname.' '.$getsetadmin2->lastname;
        }else{
            $adminname = $getsetadmin2->firstname.' '.$getsetadmin2->lastname; 
        }
     $html2 = $html2.' <td width="40%" align="" style="border: 1px solid black;font-size:16px ">
      &nbsp;เรียน&nbsp;คณบดี<br>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'.$documentData2->offer_text.'<br><span style="" align="right">'.$adminname.' &nbsp;&nbsp;</span></td>';
      }else{ 
       $html2 = $html2.' 
           <td width="40%" >
       </td>';
      }
       $html2 = $html2.' 
        <td width="10%" >
       </td>   
      <td width="50%" align="center">(ลงชื่อ).............................................................<br>('.$approve_name.')<br>'; 
       if($txtposition!=''){ $html2 = $html2.'
           '.$txtposition.'<br>';
       }
       $html2 = $html2.'
       '.$position.'
          </td>
    </tr>
  </tbody>
</table>';	
       

 }

// set style for barcode
$style = array(
	'border' => 0,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);


// $html = $html.$pdf->write2DBarcode('http://www.tireshop.com.122.155.167.147.no-domain.name/', 'QRCODE,L', 140, 30, 50, 50, $style, 'Y');
// output the HTML content

//$pdf->Image( base_url('assets_saraban/images/psu.png'), 20, 8, 12, 18, '', '', '', true, 100);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
/*$pdf->ImageSVG($file='images/favicon.png', $x=30, $y=100, $w='', $h=100, $link='', $align='', $palign='', $border=0, $fitonpage=false);*/

//$pdf->writeHTML($html, true, false, true, false, '');
//$pdf->AddPage();
$pdf->writeHTML($html2, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('allowance.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

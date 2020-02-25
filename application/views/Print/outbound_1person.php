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
$pdf->SetTitle('ขออนุมัติเดินทางไปต่างประเทศ');
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

foreach($userDetail->result() as $userDetail2){ }
$career_id = $userDetail2->career_id;

foreach($documentData->result() as $documentData2){ }

$careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
foreach($careerData->result() as $careerData2){ }
							
$positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
foreach($positionData->result() as $positionData2){ }
$array1 = array('1','5');						
$array2 = array('2','3','4','6');

if(in_array($userDetail2->career_id, $array1)){ 
	$to = 'อธิการบดี'; 
	$wage = '&nbsp;';
} 

if(in_array($userDetail2->career_id, $array2)){ 
	$to = 'คณบดีคณะการจัดการสิ่งแวดล้อม'; 
	$wage = ' อัตราค่าจ้าง '.number_format($userDetail2->wage).' บาท ';
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
			//$date_start = substr($date_start,-4);	
			//$date_start = substr($date_start,0,-4);
			$date_start2 = DateThai($documentData2->date_end);			
			$txt_date =	$date_start.' - '.$date_start2;	
		}
		
	} else {
		
		$month_start = $this->Allowance_model->get_month($documentData2->date_thailand,'1'); 
		$month_end = $this->Allowance_model->get_month($documentData2->date_thailand2,'1');	
		$days = round(abs(strtotime($documentData2->date_thailand)-strtotime($documentData2->date_thailand2))/86400);
		
		foreach($vacationData->result() as $vacationData2){}
		
		$txt_vacation = ' (ลาพักผ่อนวันที่ '.$vacationData2->date_vacation.')';

		if($month_start == $month_end){		

			$date_start = substr($documentData2->date_thailand,8);
			if($date_start < 10){ 
				$date_start = str_replace("0", "", $date_start); 
			} 
			$date_start2 = DateThai($documentData2->date_thailand2);			
			$txt_date =	$date_start.'-'.$date_start2;

		} else {  

			$date_start = DateThai($documentData2->date_thailand);
			//$date_start = substr($date_start,-4);			
			//$date_start = substr($date_start,0,-4);			
			$date_start2 = DateThai($documentData2->date_thailand2);			
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
		
		$saraban_number = $this->Saraban_model->explode_sarabanNumber($documentData2->saraban_number,'0');
		
	} else if($documentData2->saraban_number == ''){
		
		$saraban_number = 'มอ 820/';
	}

$html = ' <br><br>
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
      <td style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วย '.$userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.' '.$careerData2->career.' &nbsp; ตำแหน่ง'.$positionData2->position.'&nbsp; ตำแหน่งเลขที่ '.$userDetail2->position_number.$wage.'สังกัดคณะการจัดการสิ่งแวดล้อม มีความประสงค์จะเดินทางไป'.$travel_for.'&nbsp;เรื่อง '.$documentData2->subject_form.'&nbsp;ณ&nbsp;'.$documentData2->place.$txt_vacation.'&nbsp;มีกำหนด&nbsp;'.$days.'&nbsp;วัน&nbsp;ตั้งแต่วันที่&nbsp;'.$txt_date.' โดยใช้เงินสนับสนุนจาก&nbsp;'.$documentData2->money_source.'&nbsp;ดังเอกสารที่แนบมาพร้อมนี้</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
    </tr>';
	
if(in_array($userDetail2->career_id, $array2)){	
	
	$html = $html.'
	<tr>
      <td align="left" style="text-align: justify;">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  จึงเรียนมาเพื่อโปรดพิจารณา หากเห็นชอบด้วยกรุณาอนุมัติ และ';
	  
	if($documentData2->select_checkbox == '1'){
	  $html = $html.'<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางที่แน่นอนต่อไปด้วย';	  
	}
	if($documentData2->select_checkbox == '2'){  
	  $html = $html.'<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ';
	}
	if($documentData2->select_checkbox == '4'){	  
	  $html = $html.'<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางที่แน่นอนต่อไปด้วย
	  <br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ';
	}	  
	  
	$html = $html.'</td>
    </tr>
</tbody>
</table>'; 
}

if(in_array($userDetail2->career_id, $array1)){
	
	$html = $html.'	
    <tr>
      <td style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="doCH">จึงเรียนมาเพื่อโปรดพิจารณาด้วย จะเป็นพระคุณยิ่ง';
	  
	if($documentData2->select_checkbox == '3'){	  
	  $html = $html.'&nbsp; และลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ&nbsp; แจ้งงาน ทะเบียนประวัติ&nbsp; และต้นฉบับคืนหน่วยงาน';
	  
	}
	  
	  $html = $html.'</span></td>
    </tr>
</tbody>
</table>'; 
}	

$html = $html.'
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
      <td height="30" align="center" valign="bottom">('.$documentData2->name_surname.')</td>
    </tr>
    <!--<tr>
      <td >&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>-->';	
	
if(($documentData2->approve_id != 0) && (in_array($userDetail2->career_id, $array1))){
	
	$approveName = $this->Allowance_model->get_userDetail($documentData2->approve_id);
	foreach($approveName->result() as $approveName2){}
		
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
                    $txtposition = '<tr><td width="50%" align="left" valign="bottom">&nbsp;</td>
					<td height="30" align="center" valign="bottom">'.$txtpmana.' '.$txtact.'</td></tr>';
                    $position = 'คณบดีคณะการจัดการสิ่งแวดล้อม';
					  
    }else{					  
            $txtposition = '';
            $position = $position_approve2->position;
    }
		
	$html = $html.'<tr>
      <td >&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
	<tr>
      <td width="50%">&nbsp;</td>
      <td width="50%" height="30" align="center">(ลงชื่อ).............................................................</td>
    </tr>
    <tr>
      <td width="50%" align="left" valign="bottom">&nbsp;</td>
      <td height="30" align="center" valign="bottom">('.$approveName2->titlename.''.$approveName2->firstname.' '.$approveName2->lastname.')</td>
    </tr>
	'.$txtposition.'
	<tr>
      <td width="50%" align="left" valign="bottom">&nbsp;</td>
      <td height="30" align="center" valign="bottom">'.$position.'</td>
    </tr>';
}	
	
    $html = $html.'<tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>';

if(($documentData2->approve_id != 0) && (in_array($userDetail2->career_id, $array2))){ 
	
	if(($documentData2->check_doc == 1) && ($documentData2->approve_id != 0)){
	
		$approveName = $this->Allowance_model->get_userDetail($documentData2->approve_id);
		foreach($approveName->result() as $approveName2){}
		
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
                    $txtposition = '<tr><td width="40%" align="center">'.$txtpmana.' '.$txtact.'</td>
      <td align="left">&nbsp;</td></tr>';
			
                    $position = 'คณบดีคณะการจัดการสิ่งแวดล้อม';				
       }else{					  
                    $txtposition = '';
                    $position = $position_approve2->position;
       }
	
	$html = $html.'	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0"><tbody>';
  
  if($documentData2->approve_status == '1'){
  
    $html = $html.'<tr>
	  <td width="40%" align="center"><span style="font-size: 20pt; font-weight: 600;"><strong>อนุมัติ</strong></span></td>
      <td height="">&nbsp;</td>
    </tr>
    <!--<tr>
      <td align="center">&nbsp;</td>
      <td height="30">&nbsp;</td>
    </tr>-->
    <tr>
      <td align="center"><!--&lt;&lt; กรณีพนักงาน มีช่องอนุมัติ &gt;&gt;--></td>
      <td height="30">&nbsp;</td>
    </tr>
    <!--<tr>
      <td align="center">&nbsp;</td>
      <td height="30">&nbsp;</td>
    </tr>-->';
  }
	
    $html = $html.'<tr>
      <td width="40%" align="center">(ลงชื่อ).............................................................</td>
      <td width="" height="">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" align="center" valign="bottom">('.$approveName2->titlename.''.$approveName2->firstname.' '.$approveName2->lastname.')</td>
      <td height="" align="left" valign="bottom">&nbsp;</td>
    </tr>
	'.$txtposition.'
    <tr>
      <td width="40%" align="center">'.$position.'</td>
      <td height="" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="">&nbsp;</td>
      <td height="" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>';				
 }  }

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

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('allowance.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

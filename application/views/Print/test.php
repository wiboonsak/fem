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
$pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);

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
function DateThai($strDate)
	{
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

	function zero($value)
	{
		if($value == 0 || $value == 0.00 || $value == "00" || $value == "0" || $value == null || $value == "null"){
			return "-";
		}else{
			return $value;
		}
	}

/*foreach ($getdata as $getdata):
	 	$id_allowance 	= $getdata['id_allowance'];
	 	$id_saraban   	= $getdata['id_saraban']; 
	  	$user_create	= $getdata['user_create'];
	   	$text1			= $getdata['text1'];
	   	$text2			= $getdata['text2'];
	   	$text3			= $getdata['text3'];
	   	$text4			= $getdata['text4'];
	    $text5			= $getdata['text5'];
	    $text6			= $getdata['text6'];
	  	$expenses1      = $getdata['expenses1'];
	  	$expenses2 		= $getdata['expenses2'];
 	  	$expenses3     	= $getdata['expenses3']; 
	  	$expenses4 		= $getdata['expenses4'];
	  	$remark_Expenses4= $getdata['remark_Expenses4'];
	  	$date_expenses1	= $getdata['date_expenses1'];
	  	$date_expenses2	= $getdata['date_expenses2'];
	  	$date_expenses3	= $getdata['date_expenses3'];
	  	//$date_expenses4	= $getdata['date_expenses4'];
	  	$footer 		= $getdata['footer'];
	   	$date_add 		= DateThai($getdata['date_add']);
	    $approve_status = $getdata['approve_status'];
	    $topic 			= $getdata['topic'];
	    $titlename 		= $getdata['titlename'];
	    $firstname 		= $getdata['firstname'];
	    $lastname 		= $getdata['lastname'];
	    $position_name 	= $getdata['position_name'];

	    if($getdata['position_level'] == '1'){
	    	 $position_level ='อาจารย์';
	    }else if($getdata['position_level'] == '2'){
	    	 $position_level ='เจ้าหน้าที่';
	    }else if($getdata['position_level'] == '3'){
	    	 $position_level ='คณบดี';
	    }else if($getdata['position_level'] == '4'){
	    	 $position_level ='รองคณบดี';
	    }

	    if($approve_status == '1'){
	    		$approve_statusstr = '<strong style="color: rgb(0, 0, 204); font-size: 30px">อนุมัติ</strong>';
	    }else if($approve_status == '0'){
	    		$approve_statusstr = '<strong style="color: red; font-size: 30px">ไม่อนุมัติ</strong>';
	    }
	 
	 
endforeach;*/


// define some HTML content with style
/*$html = '
<h1  align="center" >บันทึกข้อความ</h1><br>	
<table border = "0">
<tr>
  <td ><b>ส่วนงาน</b><u> &nbsp; &nbsp; &nbsp;คณะการจัดการสิ่งแวดล้อม&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
  <td><b>โทร</b><u>&nbsp; &nbsp; &nbsp; 6829 &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</u></td>
</tr>
<tr>
  <td><b>ที่</b><u>&nbsp; &nbsp; &nbsp;มอ.820/'.$id_saraban.'&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;</u></td>
  <td><b>วันที่</b><u>&nbsp; &nbsp; &nbsp; '.$date_add.'&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
</tr>
<tr>
  <td colspan = "2"><b>เรื่อง</b><u>&nbsp; &nbsp; &nbsp;'.$topic.'&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
</tr>
</table>
<br>
<label>เรียน  &nbsp;  &nbsp; คณบดีคณะการจัดการสิ่งแวดล้อม<br><br></label>
<label>'.nl2br((str_replace(' ', '&nbsp;',$text2)),false).'</label> <br />
<label>'.nl2br((str_replace(' ', '&nbsp;',$text3)),false).'</label> <br />

<label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;'.$footer.'  </label><br /><br />
<table>
	<tr align="center" >
		<td width="35%" ></td>
	  	<td>('. $titlename.' '.$firstname.'&nbsp; &nbsp;'.$lastname.')</td>
	</tr>
	<tr align="center">
		<td width="35%" ></td>
	  	<td>'.$position_level.'</td>
	</tr>

</table>';
if($text6 == '1'){
	$html = $html.'<label> ประมาณการค่าใช้จ่าย</label> <br /><br />
<table>
<tr>
  <td>1. ค่าเบี้ยเลี้ยง</td>
  <td align="right">'.zero($date_expenses1) .'&nbsp;&nbsp;</td>
  <td>วัน</td>
  <td align="right" >รวมเป็นเงิน</td>
  <td align="right">'.zero(number_format($expenses1,2)) .'&nbsp;&nbsp;</td>
  <td>บาท</td>
</tr>
<tr>
  <td>2. ค่าที่พัก</td>
  <td align="right">'.zero($date_expenses2) .'&nbsp;&nbsp;</td>
  <td>วัน</td>
  <td align="right" >รวมเป็นเงิน</td>
  <td align="right">'. zero(number_format($expenses2,2)) .'&nbsp;&nbsp;</td>
  <td>บาท</td>
</tr>
<tr>
  <td>3. ค่าพาหนะ</td>
  <td ></td>
  <td ></td>
  <td align="right" >รวมเป็นเงิน</td>
  <td align="right">'. zero(number_format($expenses3,2)) .'&nbsp;&nbsp;</td>
  <td>บาท</td>
</tr>
<tr>
  <td>4. อื่นๆ '.$remark_Expenses4.'</td>
  <td align="right"></td>
  <td></td>
  <td align="right" >รวมเป็นเงิน</td>
  <td align="right">'. zero(number_format($expenses4,2)) .'&nbsp;&nbsp;</td>
  <td>บาท</td>
</tr>
<tr>
  <td></td>
  <td ></td>
  <td ></td>
  <td align="right">รวมเงิน</td>
  <td align="right">'. zero(number_format($text4,2)) .'&nbsp;&nbsp;</td>
  <td>บาท</td>
</tr>
</table>';
}


 if($approve_status == '1' || $approve_status == '0'){
	
		foreach ($send_to as $send_to):

		$send_to_titlename 		= $send_to['titlename'];
		$send_to_firstname 		= $send_to['firstname'];
	    $send_to_lastname 		= $send_to['lastname'];
	    $send_to_position_name 	= $send_to['position_name'];

	    if($send_to['position_level'] == '1'){
	    	 $send_to_position_level ='อาจารย์';
	    }else if($send_to['position_level'] == '2'){
	    	 $send_to_position_level ='เจ้าหน้าที่';
	    }else if($send_to['position_level'] == '3'){
	    	 $send_to_position_level ='คณบดี';
	    }else if($send_to['position_level'] == '4'){
	    	 $send_to_position_level ='รองคณบดี';
	    }

	   $html = $html. 
	   '
	   <table>
	   		<tr align="center">
				<td width="35%" >'.$approve_statusstr.'</td>
			  	<td><br><br><br></td>

			</tr>
	   		<tr align="center">
				<td width="35%" >(ลงชื่อ).................................................</td>
			  	<td></td>
			</tr>
			<tr align="center" >
				<td width="35%" >('.$send_to_titlename.' '.$send_to_firstname.'&nbsp; &nbsp;'.$send_to_lastname.')</td>
			  	<td></td>
			</tr>
			<tr align="center">
				<td width="35%" >'.$send_to_position_level.'คณะการจัดการสิ่งแวดล้อม</td>
			  	<td></td>
			</tr>
		</table>';
	 
	 
endforeach;
}*/

///////////////////////////////////////////////////////////////

$career_id = '';
//$dataId = $this->session->userdata['logged_in']['id'];
$dataId = '9';
$userDetail = $this->Allowance_model->get_userDetail($dataId); 
foreach($userDetail->result() as $userDetail2){ }
$career_id = $userDetail2->career_id;

$careerData = $this->Allowance_model->get_career($userDetail2->career_id); 
foreach($careerData->result() as $careerData2){ }
							
$positionData = $this->Allowance_model->get_position($userDetail2->position_id); 
foreach($positionData->result() as $positionData2){ }


if($career_id == '5'){ 
	$to = 'อธิการบดี'; 
	$wage = '&nbsp;';
} 

if($career_id == '4'){ 
	$to = 'คณบดีคณะการจัดการสิ่งแวดล้อม'; 
	$wage = ' อัตราค่าจ้าง '.number_format($userDetail2->wage).' บาท ';
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
		<td width="44%" align="left" style="border-bottom: 0px dotted #000000;" valign="bottom"> &nbsp;&nbsp;6805</td>		
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
      <td width="44%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;มอ 820/</td>
	  <td width="7%" align="left" valign="bottom">&nbsp;<span style="font-size: 20pt"><strong>วันที่</strong></span></td>
      <td width="44%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;&nbsp;9&nbsp;มกราคม&nbsp;2562</td>
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
      <td width="93%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;พนักงานมหาวิทยาลัยขออนุมัติไปฝึกอบรม ณ ต่างประเทศ</td>
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
      <td style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วย '.$userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.' '.$careerData2->career.' &nbsp; ตำแหน่ง'.$positionData2->position.'&nbsp; ตำแหน่งเลขที่ '.$userDetail2->position_number.$wage.'สังกัดคณะการจัดการสิ่งแวดล้อม มีความประสงค์จะเดินทางไปปฎิบัติงานเพื่อฝึกอรม&nbsp;เรื่อง สาขาวิชา Aerosol Physic&nbsp;ณ&nbsp;สาธารณรัฐออสเตรีย&nbsp;มีกำหนด&nbsp;88&nbsp;วัน&nbsp;ตั้งแต่วันที่&nbsp;4 เมษายน&nbsp;ถึงวันที่&nbsp;30 มิถุนายน 2561 โดยใช้เงินสนับสนุนจาก&nbsp;Ernst Mach Grant - ASEA-UNINET&nbsp;ดังเอกสารที่แนบมาพร้อมนี้</td>
    </tr>
    <tr>
      <td height="30">&nbsp;</td>
    </tr>';

if($money == '1'){
$html = $html.'
<tr>
      <td height="40"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <!--<tr>
      <td colspan="7" align="left">&nbsp;</td>
    </tr>-->
    <tr>
      <td colspan="7" align="left">งบประมาณค่าใช้จ่าย</td>
    </tr>
    <tr>
      <td width="80" align="right">-&nbsp;&nbsp;</td>
      <td width="150" align="left">ค่าเบี้ยเลี้ยง</td>
      <td width="35" align="center">5</td>
      <td width="35" align="left">วัน</td>
      <td width="95" align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
      <td width="95" align="right">5,000</td>
      <td width="50" align="left">&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td align="right">-&nbsp;&nbsp;</td>
      <td align="left">ค่าที่พัก</td>
      <td align="center">5</td>
      <td align="left">วัน</td>
      <td align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
      <td align="right">10,000</td>
      <td align="left">&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td align="right">-&nbsp;&nbsp;</td>
      <td align="left">ค่าพาหนะ</td>
      <td align="center">5</td>
      <td align="left">วัน</td>
      <td align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
      <td align="right">3,000</td>
      <td align="left">&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td align="right">-&nbsp;&nbsp;</td>
      <td colspan="3" align="left">อื่นๆ  ค่าลงทะเบียน</td>
      <td align="right">&nbsp;&nbsp; รวมเป็นเงิน</td>
      <td align="right">2,000</td>
      <td align="left">&nbsp;&nbsp;บาท</td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td colspan="3" align="left">&nbsp;</td>
      <td align="right"><strong>&nbsp;&nbsp; รวม</strong></td>
      <td align="right"><strong>20,000</strong></td>
      <td align="left"><strong>&nbsp;&nbsp;บาท</strong></td>
    </tr>
  </tbody>
</table>
		</td>
    </tr>	  
	<tr>
      <td height="40">&nbsp;</td>
    </tr>';

}
	
	
if($career_id == '4'){	
	
	$html = $html.'
	<tr>
      <td align="left" style="text-align: justify;">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  จึงเรียนมาเพื่อโปรดพิจารณา หากเห็นชอบด้วยกรุณาอนุมัติ และ<br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; แจ้งกองคลัง, งานทะเบียนประวัติ และแจ้งวันเดินทางทีแน่นอนต่อไปด้วย
	  <br>
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <img src="'.base_url().'allowance/assets/check.png"/>&nbsp; เสนอ อธิการบดี พิจารณาลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ
	  
	  </td>
    </tr>
</tbody>
</table>'; 
}

if($career_id == '5'){
	
	$html = $html.'	
    <tr>
      <td style="text-align: justify;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="doCH">จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ&nbsp; และลงนามในหนังสือถึงปลัดกระทรวงการต่างประเทศ&nbsp; แจ้งงาน ทะเบียนประวัติ&nbsp; และต้นฉบับคืนหน่วยงาน</span><!--<span id="notCH">จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</span>--><!-- &lt;&lt; ถ้าคลิกช่องหนังสือเดินทาง--></td>
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
      <td height="30" align="center" valign="bottom">('.$userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.')</td>
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

if($career_id == '4'){ 
	
	$html = $html.'
	<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
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
    </tr>-->
    <tr>
      <td width="40%" align="center">(ลงชื่อ).............................................................</td>
      <td width="" height="">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" align="center" valign="bottom">(ผู้ช่วยศาตราจารย์ ดร.เกื้ออนันต์ เตชะโต)</td>
      <td height="" align="left" valign="bottom">&nbsp;</td>
    </tr>
    <tr>
      <td width="40%" align="center">คณบดีคณะการจัดการสิ่งแวดล้อม</td>
      <td height="" align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="">&nbsp;</td>
      <td height="" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>';				
 } 

/*$html = $html.'
    
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;vvvvvvv</td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td  height="30" align="center">&nbsp;vvvvvxxxxx</td>
    </tr>
    <tr>
      <td align="left" valign="bottom">&nbsp;</td>
      <td height="30" align="center" valign="bottom">('.$userDetail2->titlename.$userDetail2->firstname.' '.$userDetail2->lastname.')</td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td >&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>';


if($career_id == '4'){ 
	$html = $html.'	
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
      <td width="" height="30">&nbsp;</td>
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
</table>';
}*/

/*$html = '  

<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="80" height="159" valign="top"><img src="'.base_url().'allowance/assets/logo_psu.png" width="80" height="132" alt=""/></td>
      <td align="center" valign="bottom" style="font-size: 18pt; font-weight: 600;">บันทึกข้อความ&nbsp;&nbsp;</td>
    </tr>
  </tbody>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0">
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
<table border="0" align="center" cellpadding="0" cellspacing="0">
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
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="7%" height="30" align="left" valign="bottom"><span style="font-size: 20pt">เรื่อง</span></td>
      <td width="93%" height="30" align="left" valign="bottom">พนักงานมหาวิทยาลัยขออนุมัติไปฝึกอบรม ณ ต่างประเทศ</td>
    </tr>    
  </tbody>
</table>
';*/




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

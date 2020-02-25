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
$pdf->SetTitle('ขอเบิกเงิน');
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

foreach ($getdata as $getdata):
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
	 
	 
endforeach;


// define some HTML content with style
$html = '
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

$pdf->Image( base_url('assets_saraban/images/psu.png'), 20, 8, 12, 18, '', '', '', true, 100);

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

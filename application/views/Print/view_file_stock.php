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
$pdf->SetMargins(PDF_MARGIN_LEFT,/* PDF_MARGIN_TOP,*/PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('thsarabun', '', 10);

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


foreach ($getdata as $getdata):
	 $id_saraban 	= $getdata['id_saraban']; 
	 
endforeach;
// define some HTML content with style
$html = '
<h1  align="center" >บันทึกข้อความ</h1><br>	
<h4>ส่วนงาน  &nbsp;  &nbsp; คณะการจัดการสิ่งแวดล้อม    &nbsp;  &nbsp;  &nbsp;  &nbsp;โทร.  &nbsp;  &nbsp;  &nbsp; 6829</h4>
<h4>ที่  &nbsp;  &nbsp; มอ.820/'.$id_saraban.'    &nbsp;  &nbsp;  &nbsp;  &nbsp;โทร.  &nbsp;  &nbsp;  &nbsp; 6829</h4>
<table class="first" cellpadding="4" cellspacing="6">
<tr>
  <td cospan="6" align="left"><b>รายการสินค้า</b></td>
 </tr>
 <tr>
  <td width="45" align="center"><b>ลำดับ</b></td>
  <td width="200" align="center"><b>ซื้อสินค้า</b></td>
  <td width="85" align="center"><b>จำนวนตู้</b></td>
  <td width="85" align="center"> <b>ราคา USD</b></td>
  <td width="85" align="center"><b>ราคารวมภาษี</b></td>
  <td width="85" align="center"><b>จำนวนที่สั่ง</b></td>
 </tr>';


$html = $html.'</table> ';

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


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('test.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

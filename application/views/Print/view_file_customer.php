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
$pdf->SetTitle('ใบสั่งซื้อร้านค้า');
//$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
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
$pdf->SetFont('freeserif', '', 10);

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


foreach ($viewBill as $viewBill):
	 $IDOrder 	= $viewBill['ID_Bill']; 
	 $date 		= $viewBill['Date_Order']; 
	 $customer	= $viewBill['ID_Customer']; 
	 $Sale_person = $viewBill['Sale_person']; 
	 $Credit	= $viewBill['Credit'];
	 $ID_Staff  = $viewBill['ID_person']; 

	 if($viewBill['Type_Sale']==1){
	 	 $Type_Sale ="รอเก็บเช็ค";
	 }else if($viewBill['Type_Sale']==2){
	 	 $Type_Sale ="เก็บเช็ค";
	 }else if($viewBill['Type_Sale']==3){
	 	 $Type_Sale ="รอขึ้นเงิน";
	 }else if($viewBill['Type_Sale']==4){
	 	 $Type_Sale ="ขึ้นเงิน";
	 }else if($viewBill['Type_Sale']==5){
	 	 $Type_Sale ="เช็คเด้ง";
	 }else if($viewBill['Type_Sale']==6){
	 	 $Type_Sale ="เงินสด";
	 }

endforeach;
// define some HTML content with style
$html = '
<!-- EXAMPLE OF CSS STYLE -->


<h1>หมายเลขใบสั่งซื้อ  '.$IDOrder. '</h1><br>	
<h4>วันที่ออก  '.$date. '  </h4>

<table class="first" cellpadding="4" cellspacing="6">
	<tr>
  		<td cospan="6" align="left" ><b>ลูกค้า : '.$customer.'</b></td>
  		<td cospan="6" align="left" ><b>เครดิต : '.$Credit.' วัน</b></td>
 	</tr>
 	<tr>
  		<td cospan="6" align="left" ><b>พนักงานขาย : '.$Sale_person.'</b></td>
  		<td cospan="6" align="left" ><b>การชำระเงิน : '.$Type_Sale.'</b></td>
 	</tr>
 </table>


<table class="first" cellpadding="4" cellspacing="6">
<tr>
  <td cospan="6" align="left" bgcolor="#FFFF00"><b>รายการสินค้า</b></td>
 </tr>
 <tr>
  <td width="45" align="center"><b>ลำดับ</b></td>
  <td width="400"><b>รายการสินค้า</b></td>
  <td width="85" align="center"><b>จำนวน</b></td>
  <td width="85" align="center"><b>ราคา</b></td>
 </tr>';


 $num = 0;
 $total = 0;
foreach ($viewDetail as $viewDetail):
 $num++;

 $total =  $total + $viewDetail['price'];


$html = $html.'<tr>
  <td width="45" align="center">'.$num.'</td>
  <td width="400" >'.$viewDetail['Type'].'</td>
  <td width="85" align="center">'.$viewDetail['Number'].'</td>
  <td width="85" align="center"> '.number_format($viewDetail['price'],2) .'</td>
 </tr>';
endforeach;
$html = $html.'
<tr>
  <td width="627" align="right" bgcolor="#FFFF00"><b>ราคารวม  '.number_format($total,2).'  บาท</b></td>
 </tr>
</table> ';

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


				$text1 = "buy";
				$text2 = $ID_Staff;
				$text3 = $IDOrder;
				//$text4 = "https://www.google.com"; 
				$text4 = "http://www.tireshop.com.122.155.167.147.no-domain.name/Scan_controller/Buy";
				$text5 = $Sale_person;

				$myObj = new StdClass; //stdClass ย่อมาจาก Standard Class เป็นการประกาศ Object แบบ Standard php
				$myObj->go = $text1;
				$myObj->idstaff = $text2;
				$myObj->idbill = $text3;
				$myObj->url = $text4;
				$myObj->namestaff = $text5;

				$myJSON = json_encode($myObj);

 $html = $html.$pdf->write2DBarcode($myJSON, 'QRCODE,L', 150, 20, 50, 50, $style, 'Y');
// output the HTML contet

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output($IDOrder.'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

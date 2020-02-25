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
$pdf->SetTitle('ขออนุมัติเดินทางไปต่างประเทศ (สำหรับคณะเดินทาง)');
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

///////////////////////////////////////////////////////////////

$career_id = '';
//$dataId = $this->session->userdata['logged_in']['id'];
$dataId = '12';
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
      <td width="93%" align="left" valign="bottom" style="border-bottom: 0px dotted #000000;">&nbsp;&nbsp;ขออนุมัติเดินทางไปปฏิบัติงาน ณ ต่างประเทศ</td>
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
      <td style="text-align: justify;" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ด้วยคณะการจัดการสิ่งแวดล้อม &nbsp; เสนอขออนุญาตให้พนักงานมหาวิทยาลัยและพนักงานเงินรายได้&nbsp; จำนวน 3 ราย&nbsp;เดินทางไปเข้าร่วมประชุม&nbsp;เรื่อง การปฎิบัติงานด้านเทคโนโลยีและภูมิสารสนเทศ ณ Feng Chia University ประเทศไต้หวัน&nbsp;ตั้งแต่วันที่&nbsp;4-8 พฤษภาคม 2562&nbsp;โดยใช้เงินสนับสนุนจากรายได้คณะ&nbsp;ซึ่งมีรายนามดัง ต่อไปนี้<br>
        <table border="0" cellpadding="0" cellspacing="0">
          <tbody>            
            <tr>
			  <td align="left" colspan="2" style="text-indent: 81px"><strong>ลูกจ้างชั่วคราว-งบประมาณ</strong></td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td width="95" align="right">1.&nbsp;&nbsp;</td>
              <td width="183" align="left">นายนพรัตน์ &nbsp;บำรุงรักษ์</td>
              <td width="205" align="left">ตำแหน่ง อาจารย์ผู้มีความรู้ - ความสามารถพิเศษ</td>
              <td width="241" align="left">ตำแหน่งเลขที่ 0006</td>
            </tr>            
			<tr>
			  <td align="left" colspan="2" style="text-indent: 81px"><strong>พนักงานมหาวิทยาลัย</strong></td>
              <td align="left">&nbsp;</td>
              <td align="left">&nbsp;</td>
            </tr>
            <tr>
              <td align="right">2.&nbsp;&nbsp;</td>
              <td align="left">นางสาวนริสรา &nbsp;นุธรรมโชติ</td>
              <td align="left">ตำแหน่ง อาจารย์</td>
              <td align="left">ตำแหน่งเลขที่ 2547</td>
            </tr>
            <tr>
              <td align="right">3.&nbsp;&nbsp;</td>
              <td align="left">นายคัมภีร์ &nbsp;พ่วงทอง</td>
              <td align="left">ตำแหน่ง อาจารย์</td>
              <td align="left">ตำแหน่งเลขที่ 3236</td>
            </tr>			
          </tbody>
        </table></td>
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
      <td width="99" align="right">-&nbsp;&nbsp;</td>
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
	<!--<tr>
      <td height="40">&nbsp;</td>
    </tr>-->';

}
	
	
	
	
	$html = $html.'
	
</tbody>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>      
      <td align="left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ</td>
    </tr>
  </tbody></table>
	
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>
	<!--<tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>-->
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
    </tr>
   <tr>
      <td>&nbsp;</td>
      <td height="30" align="center">&nbsp;</td>
    </tr>-->
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

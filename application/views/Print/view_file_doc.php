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
$pdf->SetTitle('รายงานการเดินทาง - PDF');
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
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
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

	function DateThaiwithtime($strDate)
	{
		$strYear 		= date("Y",strtotime($strDate))+543;
		$strMonth 		= date("n",strtotime($strDate));
		$strDay 		= date("j",strtotime($strDate));
		$strHour 		= date("H",strtotime($strDate));
		$strMinute 		= date("i",strtotime($strDate));
		$strSeconds 	= date("s",strtotime($strDate));
		$strMonthCut 	= Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$strMonthThai 	= $strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute น.";
	}

	function DateThaithai($strDate)
	{
		$strYear 		= date("Y",strtotime($strDate))+543;
		$strMonth 		= date("n",strtotime($strDate));
		$strDay 		= date("j",strtotime($strDate));
		$strHour 		= date("H",strtotime($strDate));
		$strMinute 		= date("i",strtotime($strDate));
		$strSeconds     = date("s",strtotime($strDate));
		$strMonthCut 	= Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai	= $strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

// set font
$pdf->SetFont('thsarabun', '',16);
$numdoc = $getdocument->num_rows();
if($numdoc>0){
foreach ($getdocument->result() AS $documentData2){}
if($type_travel=='1'){
    $approve_id = $documentData2->approve_id;
}else{
    $approve_id = $documentData2->approve_id2;
}
if($approve_id!=0){
$get_userDetail = $this->Allowance_model->get_userDetail($approve_id);
foreach ($get_userDetail->result() AS $get_userDetail2){}
 if($get_userDetail2->titlename!=''){
  $approve_name = $get_userDetail2->titlename.$get_userDetail2->firstname.' '.$get_userDetail2->lastname;   
 }else{
    $approve_name = $get_userDetail2->firstname.' '.$get_userDetail2->lastname; 
 }
 }else{
    $approve_name = '..................................................';
}

}
foreach ($doc_1 as $doc_1){

	 	$doc1_doc_id 		= $doc_1['doc_id'];
	 	$doc1_where 		= $doc_1['doc_where'];
	 	$doc1_date 			= DateThai($doc_1['date']);
	 	$doc1_date_create 	= DateThai($doc_1['date_create']);
	 	$doc1_title 		= $doc_1['title'];
	 	$doc1_doc_to 		= $doc_1['doc_to'];
	 	$doc1_id_saraban 	= $doc_1['id_saraban'];
	 	$doc1_dateinput 	= DateThai($doc_1['dateinput']);
	 	$doc1_name 			= $doc_1['name'];
                $doc1_position          = $doc_1['position'];

//	 	if($doc_1['position'] == '1'){
//	    	 $doc1_position ='อาจารย์';
//	    }else if($doc_1['position'] == '2'){
//	    	 $doc1_position ='เจ้าหน้าที่';
//	    }else if($doc_1['position'] == '3'){
//	    	 $doc1_position ='คณบดี';
//	    }else if($doc_1['position'] == '4'){
//	    	 $doc1_position ='รองคณบดี';
//	    }
                $time_end = $doc_1['time_end'];
                $time_endarray = explode(":",$time_end);
			$m1 = $time_endarray[1];
			$h1 = $time_endarray[0];
                        

                $time_start = $doc_1['time_start'];
                $time_startarray = explode(":",$time_start);
			$m = $time_startarray[1];
			$h = $time_startarray[0];
                        

	 	$doc1_major 		= $doc_1['major'];
	 	$doc1_with 			= $doc_1['doc_with'];
	 	$doc1_goto 			= $doc_1['goto'];
	 	$doc1_start 		= $doc_1['start'];
	 	$doc1_datestart 	= DateThaiwithtime($doc_1['datestart'].' '.$h.':'.$m);
	 	$doc1_end 			= $doc_1['end'];
	 	$doc1_dateend 		= DateThaiwithtime($doc_1['dateend'].' '.$h1.':'.$m1);
	 	$doc1_sumdate 		= $doc_1['sumdate'];
	 	$doc1_allowfor 		= $doc_1['allowfor'];
	 	$doc1_travel 		= $doc_1['travel'];
	 	$doc1_travelday 	= $doc_1['travelday'];
	 	$doc1_travelprice 	= $doc_1['travelprice'];
	 	$doc1_resident 		= $doc_1['resident'];
	 	$doc1_residentday 	= $doc_1['residentday'];
	 	$doc1_residentprice = $doc_1['residentprice'];
	 	$doc1_vehical 		= $doc_1['vehical'];
	 	$doc1_vehicalprice 	= $doc_1['vehicalprice'];
	 	$doc1_other 		= $doc_1['other'];
	 	$doc1_otherprice 	= $doc_1['otherprice'];
	 	$doc1_sumprice 		= $doc_1['sumprice'];
	 	$doc1_Incomplete_receipt        = $doc_1['Incomplete_receipt'];
	 	$doc1_sumtotal_price 		= $doc_1['sumtotal_price'];
	 	$doc1_firstname		= $doc_1['firstname']; 
	 	$doc1_lastname		= $doc_1['lastname']; 
	 	$position_name		= $doc_1['position_name']; 
	 	$titlename 			= $doc_1['titlename']; 
                
                $doc1_sumthai           = $this->Allowance_model->convert(number_format($doc1_sumprice,2));
                $goto = '';
                if($doc1_goto=='1'){
                   $goto = 'เข้าร่วมประชุม'; 
                }else if($doc1_goto=='2'){
                     $goto = 'เข้าร่วมประชุมทางวิชาการ'; 
                }else if($doc1_goto=='3'){
                     $goto = 'ฝึกอบรม'; 
                }else if($doc1_goto=='4'){
                     $goto = 'ดูงาน'; 
                }else if($doc1_goto=='5'){
                     $goto = 'ประชุมเชิงปฎิบัติการ'; 
                }else if($doc1_goto=='6'){
                     $goto = 'ปฏิบัติงานเพื่อปรึกษาหารือ'; 
                }
	 
                $doc3_sum 			= number_format($doc1_Incomplete_receipt,2);
                $doc3_sum2 			= number_format($doc1_Incomplete_receipt);
                $doc3_sumthai 		= $this->Allowance_model->convert(number_format($doc1_Incomplete_receipt,2));
}
$text = '';
$doc1_id =  $this->uri->segment(3);
$doc_file = $this->Allowance_model->getdoc_file($doc1_id);
$getreason_request = $this->Allowance_model->getreason_request($doc1_doc_id,$type_travel);
foreach ($getreason_request->result() AS $getreason_request2){}
$getsetadmin = $this->Allowance_model->getsetadmin('2',$getreason_request2->reason_request);
foreach ($getsetadmin->result() AS $getsetadmin2){}
$numdoc_file = $doc_file->num_rows();
if ($numdoc_file>0){
foreach ($doc_file->result() as $doc_file1){
    $countdata = $doc_file1->Count;
    if($countdata>0){
       $text = 'จำนวน '.$countdata.' ฉบับ'; 
    }else{
        $text = '';
    }
}
}
//foreach ($doc_2 as $doc_2):
//
//	 	$doc2_name 			= $doc_2['name'];
//	 	$doc2_date 			= DateThai($doc_2['date']);
//	 	$doc2_sumA 			= number_format($doc_2['sumA'],2);
//	 	$doc2_sumB 			= number_format($doc_2['sumB'],2);
//	 	$doc2_sumC 			= number_format($doc_2['sumC'],2);
//	 	$doc2_sumD 			= number_format($doc_2['sumD'],2);
//	 	$doc2_sumAll 		= number_format($doc_2['sumAll'],2);
//	 	$doc2_sumthai 		= $doc_2['sumthai'];
//	 
//endforeach;

//foreach ($doc_3 as $doc_3):
//
//	 	$doc3_sum 			= number_format($doc_3['sum'],2);
//	 	$doc3_sum2 			= number_format($doc_3['sum']);
//	 	$doc3_sumthai 		= $doc_3['sumthai'];
//	 
//endforeach;



$pdf->AddPage('P', 'A4');
$html = '
<table>
	<tr>
		  <td>สัญญาเงินยืมเลขที่&nbsp; ...............................</td>
		   <!--<td>วันที่&nbsp; &nbsp; &nbsp; '.$doc1_date.'</td>-->
                  <td>วันที่&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ...........................................</td>
	</tr>
	<tr>
		  <!--<td>ชื่อผู้ยืม&nbsp; &nbsp; &nbsp;'.$titlename." ".' '.$doc1_firstname.' '.$doc1_lastname.' </td>-->
                      <td>ชื่อผู้ยืม&nbsp; &nbsp; &nbsp; ............................................</td>
		  <!--<td>จำนวนเงิน&nbsp; &nbsp; &nbsp; '.number_format($doc1_sumprice,2) .'&nbsp; &nbsp; &nbsp;บาท</td>-->
                      <td>จำนวนเงิน&nbsp;  ...........................................</td>
	</tr>
</table>

<label><b><h1  align="center" >ใบเบิกค่าใช้จ่ายในการเดินทางไปราชการ</h1><br></b></label>
<br>
<br>
<table >
	<tr>
		  <td></td>
		  <td></td>
		  <td>ที่ทำการ&nbsp;'.$doc1_where.'<br>วันที่ &nbsp;'.$doc1_date .'</td>
	</tr>
</table>
<label>เรื่อง&nbsp; &nbsp; &nbsp;ขออนุมัติเบิกค่าใช้จ่ายในการเดินทางไปราชการ</label>
<br>
<br>
<label>เรียน  &nbsp;  &nbsp; '.$doc1_doc_to.'<br><br></label>

<label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ตามคำสั่งบันทึกที่ '.$doc1_id_saraban.' ลงเมื่อวันที่ '.$doc1_dateinput.' ได้อนุมัติให้
	<br>ข้าพเจ้า '.$titlename.' '.$doc1_firstname.' '.$doc1_lastname.' ตำแหน่ง '.$doc1_position.' สังกัด '.$doc1_major.' <br>พร้อมด้วย '.$doc1_with.' เดินทางไปปฏิบัติราชการ '.$goto.' โดยออกเดินทางจาก '.$doc1_start.'
	<br>ตั้งแต่วันที่ '.$doc1_datestart.' และกลับถึง '.$doc1_end.' วันที่ '.$doc1_dateend.'
<br>ระยะเวลาเดินทางไปราชการครั้งนี้ '.$doc1_sumdate.' </label><br>
<label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;ข้าพเจ้าขอเบิกค่าใช้จ่ายในการเดินทางไปราชการสำหรับ'.$doc1_allowfor.'ดังนี้</label><br>
<table border = "0">
	<tr>
		  <!--<td width="40%">ค่าเบี้ยเลี้ยงเดินทาง '.number_format($doc1_travel,2).' บาท</td>-->
                  <td width="40%">ค่าเบี้ยเลี้ยงเดินทาง </td>
		  <td align="right">จำนวน '.$doc1_travelday .'&nbsp;&nbsp; วัน</td>
		  <td align="right" width="15%">รวม</td>
		  <td align="right" width="15%">'.number_format($doc1_travelprice,2) .'&nbsp;&nbsp;</td>
		  <td width="8%" align="right" >บาท</td>
	</tr>
	<tr>
		  <td>ค่าเช่าที่พักประเภท '.$doc1_resident.'</td>
		  <td align="right">จำนวน '.$doc1_residentday.'&nbsp;&nbsp; วัน</td>
		  <td align="right">รวม</td>
		  <td align="right">'.number_format($doc1_residentprice,2).'&nbsp;&nbsp;</td>
		  <td align="right">บาท</td>
	</tr>
	<tr>
		  <!--<td colspan="2">ค่าพาหนะ '.number_format($doc1_vehical,2).' บาท</td>-->
                  <td colspan="2">ค่าพาหนะ </td>
		  <td align="right">รวม</td>
		  <td align="right">'.number_format($doc1_vehicalprice,2).'&nbsp;&nbsp;</td>
		  <td align="right">บาท</td>
	</tr>
	<tr>
		   <!--<td colspan="2">ค่าใช้จ่ายอื่น '.number_format($doc1_other,2).' บาท</td>-->
                  <td colspan="2">ค่าใช้จ่ายอื่น </td>
		  <td align="right">รวม</td>
		  <td align="right">'.number_format($doc1_otherprice,2).'&nbsp;&nbsp;</td>
		  <td align="right">บาท</td>
	</tr>
	<tr>
		  <td></td>
		  <td></td>
		  <td align="right">รวมเงินทั้งสิ้น</td>
		  <td align="right">'.number_format($doc1_sumprice,2).'&nbsp;&nbsp;</td>
		  <td align="right">บาท</td>
	</tr>
	<tr>
		  <td colspan = "5">จำนวนเงิน (ตัวอักษร) '.$doc1_sumthai.'</td>
	</tr>
</table>
<br><br>
<label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ข้าพเจ้าขอรับรองว่ารายการที่กล่าวมาข้างต้นเป็นความจริง และหลักฐานการจ่ายที่ส่งมาด้วย '.$text.' รวมทั้งจำนวนเงินที่ขอเบิกถูกต้องตามกฎหมายทุกประการ  </label><br /><br /><br /><br />
<table>
	<tr align="center" >
		<td width="55%" ></td>
	  	<td>ลงชื่อ.........................................ผู้ขอรับเงิน</td>
	</tr>
	<tr align="center" >
		<td width="55%" ></td>
	  	<td>('. $titlename." ".$doc1_firstname.'&nbsp; &nbsp;'.$doc1_lastname.')</td>
	</tr>
	<tr align="center">
		<td width="55%" ></td>
	  	<td>'.$doc1_position.'</td>
	</tr>

</table>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->AddPage('P', 'A4');


$html2 = 
'<table frame="hsides" border = "1">
	<tr >
		<td>
			&nbsp; &nbsp; ได้ตรวจสอบหลักฐานการเบิกจ่ายเงินที่แนบถูกต้องแล้ว<br>
			&nbsp; &nbsp; เห็นควรอนุมัติให้เบิกจ่ายได้<br>
			<span align="center">ลงชื่อ...................................................</span><br>
			<span align="center">('.$getsetadmin2->titlename.' '.$getsetadmin2->firstname.' '.$getsetadmin2->lastname.')</span><br>
			<span align="center">'.$getsetadmin2->position.'</span><br>
			<span align="center">วันที่..................................................</span>
			<br>
			
		</td>
		<td>
			&nbsp; &nbsp;อนุมัติให้จ่ายได้<br><br>
			<span align="center">ลงชื่อ...................................................</span><br>
			<span align="center">('.$approve_name.')</span><br>
			<span align="center">ตำแหน่ง...............................................</span><br>
			<span align="center">วันที่..................................................</span>
			<br>
			
		</td>
	</tr>
</table>
<br>
<br>
<label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ได้รับเงินค่าใช้จ่ายในการเดินทางไปราชการ  จำนวน '.number_format($doc1_sumprice,2).' บาท ('.$doc1_sumthai.')   <br> 
	ไว้เป็นการถูกต้องแล้ว</label><br /><br>

<table>
	<tr>
		<td align="center">
			&nbsp; &nbsp; &nbsp; &nbsp;ลงชื่อ...................................................ผู้รับเงิน<br>
			('. $titlename." ".$doc1_firstname.'&nbsp;'.$doc1_lastname.')<br>
			 '.$doc1_position.'<br>
			วันที่.............................................................
			<br>
			
		</td>
		<td align="center">
			ลงชื่อ...................................................ผู้จ่ายเงิน<br>
			(...................................................)<br>
			ตำแหน่ง......................................................<br>
			วันที่.............................................................

			<br>
			
		</td>
	</tr>
	<tr>
		<td colspan = "2">
			&nbsp; &nbsp; &nbsp; &nbsp;จากเงินยืมตามหนังสือสัญญาเลขที่........................
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			วันที่.............................................................
		</td>
	</tr>
</table>
<br>
<hr width=80% size=1>
หมายเหตุ........................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................
<br><hr width=80% size=1>
คำชี้แจง<br>
 1. กรณีเดินทางเป็นหมู่คณะและจัดทำใบเบิกค่าใช้จ่ายรวมฉบับเดียวกัน หากระยะเวลาในการเริ่มต้นและ<br>สิ้นสุดการเดินทางของแต่ละบุคคลแตกต่างกันให้แสดงรายละเอียดของวันเวลาที่แตกต่างกันของบุคคลนั้น<br>
ในช่องหมายเหตุ<br>
 2. กรณียื่นขอเบิกค่าใช้จ่ายรายบุคคล ให้ผู้ขอรับเงินเป็นผู้ลงลายมือชื่อผู้รับเงินและวันเดือนปีที่รับเงิน กรณีที่มีการยืมเงิน ให้ระบุ วันที่ที่ได้รับเงินยืม เลขที่สัญญายืมและวันที่อนุมัติเงินยืมด้วย<br>
 3. กรณีที่ยื่นขอเบิกค่าใช้จ่ายรวมเป็นหมู่คณะ ผู้ขอรับเงินมิต้องลงลายมือชื่อในช่องผู้รับเงิน ทั้งนี้ ให้ผู้มีสิทธิแต่ละคนลงลายมือชื่อผู้รับเงินในหลักฐานการจ่ายเงิน (ส่วนที่ 2)';

$pdf->writeHTML($html2, true, false, true, false, '');
//$pdf->AddPage('L', 'A4');
//	
//	$html3 = 
//	'<label>
//		<b><h3  align="center" >หลักฐานการจ่ายเงินค่าใช้จ่ายในการเดินทางไปราชการ
//		<br>ชื่อส่วนราชการ คณะการจัดการสิ่งแวดส้อม</h3><br></b>
//	</label>
//	<br>
//	 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ประกอบค่าเดินทางของ '.$doc2_name.' ลงวันที่ '.$doc2_date.'
//	<label><br><br>
//	<table border = "1">
//		<tr align= "center">
//			  <th width= "4%" rowspan="2">ลำดับที่</th>
//			  <th  rowspan="2">ชื่อ</th>
//			  <th  rowspan="2">ตำแหน่ง</th>
//			  <th colspan="4" >ค่าใช้จ่าย</th>
//			  <th  rowspan="2">รวม</th>
//			  <th  rowspan="2">ลายมือชื่อ<br>ผู้รับเงิน</th>
//			  <th  rowspan="2">วันเดือนปี<br>ที่รับเงิน</th>
//			  <th  rowspan="2">หมายเหตุ</th>
//		 </tr>
//		 <tr align= "center">
//			  <th>ค่าเบี้ยเลี้ยง</th>
//			  <th>ค่าเช่าที่พัก</th>
//			  <th>ค่าพาหนะ</th>
//			  <th>ค่าใช้จ่ายอื่น</th>
//		 </tr>';
//		 $i = 0;
//foreach ($doc_2_1 as $doc_2_1):
//		$i = $i +1 ;
//
//	 	$doc2_n 			= $doc_2_1['n'];
//	 	$doc2_p 			= $doc_2_1['p'];
//	 	$doc2_priceA 		= number_format($doc_2_1['priceA'],2);
//	 	$doc2_priceB 		= number_format($doc_2_1['priceB'],2);
//	 	$doc2_priceC 		= number_format($doc_2_1['priceC'],2);
//	 	$doc2_priceD 		= number_format($doc_2_1['priceD'],2);
//	 	$doc2_sum    		= number_format($doc_2_1['sum'],2);
//	 	$doc2_dateinput 	= DateThaithai($doc_2_1['dateinput']);
//	 	$doc2_other 		= $doc_2_1['other'];
//
//	 	$html3 = $html3.
//	 	'<tr align= "center" >
//	 		<td>'.$i.'</td>
//	 		<td align="left">&nbsp;'.$doc2_n.'</td>
//	 		<td align="left">&nbsp;'.$doc2_p.'</td>
//	 		<td>'.$doc2_priceA.'</td>
//	 		<td>'.$doc2_priceB.'</td>
//	 		<td>'.$doc2_priceC.'</td>
//	 		<td>'.$doc2_priceD.'</td>
//	 		<td>'.$doc2_sum.'</td>
//	 		<td></td>
//	 		<td align="left">&nbsp;'.$doc2_dateinput.'</td>
//	 		<td align="left">&nbsp;'.$doc2_other .'</td>
//	 	</tr>';
//	 
//endforeach;
//	$html3 = $html3.
//		'<tr align= "center" >
//	 		<td colspan = "3">	รวม</td>
//	 		<td>'.$doc2_sumA.'</td>
//	 		<td>'.$doc2_sumB.'</td>
//	 		<td>'.$doc2_sumC.'</td>
//	 		<td>'.$doc2_sumD.'</td>
//	 		<td>'.$doc2_sumAll.'</td>
//	 		<td colspan = "3"></td>
//	 		
//	 	</tr>
//	 </table>
//	 <br><br>
//	 <label>
//		จำนวนเงินทั้งสิน(ตัวอักษร)'.$doc2_sumthai.'
//	</label>
//	<table>
//	<tr>
//		<td width = "50%"></td>
//		<td>
//			&nbsp; &nbsp; &nbsp; &nbsp;ลงชื่อ...................................................ผู้จ่ายเงิน<br>
//			&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;(...................................................)<br>
//			&nbsp; &nbsp; &nbsp; &nbsp;ตำแหน่ง......................................................<br>
//			&nbsp; &nbsp; &nbsp; &nbsp;วันที่.............................................................
//		</td>
//	</tr>
//</table><br>
//คำชี้แจง<br>
//	1. ค่าเบี้ยเลี้ยงและค่าเช่าที่พักให้ระบุอัตราวันและจำนวนวันที่ขอเบิกของแต่ละบุคคลในช่องหมายเหตุ <br>
//	2. ให้ลงวันเดือนปีที่ได้รับเงิน กรณีเป้นการรับเงินจากการยืม ให้ระบุวันที่ได้รับจากเงินยืม<br>
//	3. ผู้จ่ายหมายถึงผู้ที่ขอยืมเงินจากทางราชการและจ่ายเงินยืมให้แก่ผู้เดินทางแต่ละคนเป็นผู้ลงลายมือชื่อผู้จ่ายเงิน';
//
//$pdf->writeHTML($html3, true, false, true, false, '');
 if($doc_3_1!=''){   
$pdf->AddPage('p', 'A4');
 		$html4 = 
	'<label>
		<b><h3  align="center" >ใบรับรองแทนใบเสร็จรับเงิน
		<br>ส่วนราชการ มหาวิทยาลัยสงขลานครินทร์</h3><br></b>
	</label>
	<br><br>
	<table border = "1">
		<tr align= "center">
			  <th   rowspan="2">วัน เดือน ปี</th>
			  <th width="30%" rowspan="2">รายละเอียดรายจ่าย</th>
			  <th width="20%" colspan="2" >จำนวนเงิน</th>
			  <th width="25%" rowspan="2">หมายเหตุ</th>
		 </tr>
		 <tr align= "center">
			  <th width="15%">บาท</th>
			  <th width="5%">สต.</th>
		 </tr>';
		 $i = 0;
             
foreach ($doc_3_1 as $doc_3_1):

	 	$doc3_date 		= DateThaithai($doc_3_1['date']);
	 	$doc3_detail 	= $doc_3_1['detail'];
	 	$doc3_price 	= number_format($doc_3_1['price'],2);
	 	$doc3_other 	= $doc_3_1['other'];

	 	$html4 = $html4.
		'<tr align= "center" >
	 		<td align="left">&nbsp;'.$doc3_date.'</td>
	 		<td align="left">&nbsp;'.$doc3_detail.'<br>&nbsp;'.$doc3_other.'</td>
	 		<td>'.number_format($doc_3_1['price']).'</td>
	 		<td>'.substr($doc3_price,-2).'</td>
	 		<td></td>
	 	</tr>';
	 
endforeach;
 
	$html4 = $html4.
		'<tr align= "center" >
	 		<td colspan = "2">	รวม '.$doc3_sumthai.'</td>
	 		<td>'.$doc3_sum2.'</td>
	 		<td>'.substr($doc3_sum,-2).'</td>
	 		<td></td>
	 	</tr>
	 </table>
	 <br><br>
	 <label>
		 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนเงินทั้งสิ้น (ตัวอักษร) '.$doc3_sumthai.'
	</label>
	<br><br>
	<label>ข้าพเจ้า '.$doc1_firstname.' '.$doc1_lastname.' ตำแหน่ง '.$doc1_position.' สังกัด '.$doc1_major.' ขอรับรองว่ารายจ่ายข้างต้นนี้ไม่อาจเรียกใบเสร็จรับเงินจากผู้รับได้ และข้าพเจ้าได้จ่ายไปในงานของราชการโดยแท้
	</label>
	<br>
	<br>
	<br>
	<table>
	<tr  >
		<td width = "65%"></td>
		<td>
			(ลงชื่อ)..................................................<br>
			&nbsp; &nbsp; &nbsp; &nbsp;  วันที่ &nbsp; '.$doc1_date.'
		</td>
	</tr>
</table><br>';
 
$pdf->writeHTML($html4, true, false, true, false, '');
 
//$pdf->AddPage('P', 'A4');
 }
//foreach ($doc_4 as $doc_4):
//
//	 	$doc4_date 		= DateThai($doc_4['date']);
//	 	$doc4_name 		= $doc_4['name'];
//	 	$doc4_address 	= $doc_4['address'];
//	 	$doc4_tambon 	= $doc_4['tambon'];
//	 	$doc4_district 	= $doc_4['district'];
//	 	$doc4_province 	= $doc_4['province'];
//	 	$doc4_sumamount = number_format($doc_4['sumamount'],2);
//
//endforeach;


//if($doc_3){
//
//$html5 = '
//<style> 
//.div2 {
//    width: 300px;
//    height: 100px;    
//    padding: 50px;
//    border: 1px solid black;
//}
//</style>
//
//<div class="div2">
//	<label>
//		<b><h3  align="center" >ใบสำคัญรับเงิน
//		<br>RECEIPT</h3><br></b>
//	</label>
//
//	<table>
//	<tr>
//		<td width = "55%"></td>
//		<td>
//			วันที่ '.$doc1_date.'<br>
//			Date  &nbsp; &nbsp; Month  &nbsp; &nbsp;Year 
//		</td>
//	</tr>
//	</table>
//	<br>
//	<br>
//	<table>
//	<tr>
//		<td>
//			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ข้าพเจ้า &nbsp;'.$doc1_name.' 
//		</td>
//		<td>ที่อยู่ &nbsp; คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์</td>
//	</tr>
//	<tr>
//		<td>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Name &nbsp; </td>
//		<td>Address</td>
//	</tr>
//	</table>
//<br><br>
//	<table>
//	<tr>
//		<td>&nbsp; &nbsp;ตำบล &nbsp; หาดใหญ่</td>
//		<td>&nbsp; &nbsp;อำเภอ &nbsp; หาดใหญ่</td>
//		<td>&nbsp; &nbsp;จังหวัด &nbsp; &nbsp;สงขลา</td>
//	</tr>
//	<tr>
//		<td>&nbsp; &nbsp;Tambon</td>
//		<td>&nbsp; &nbsp;District</td>
//		<td>&nbsp; &nbsp;Province </td>
//	</tr>
//</table>
//<br>
//<br>
//<label>&nbsp; &nbsp;ได้รับเงินจากคณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์ ดังรายการต่อไปนี้</label><br>
//<label>&nbsp; &nbsp;Received from Faculty of Environmental Management, Prince of Songkla University,
//	<br>&nbsp; &nbsp;the follwing payment</label>
//	<br>
//	<br>
//<table border = "1">
//		<tr align= "center">
//			  <th  rowspan="2" width = "70%">รายการ<br>Item</th>
//			  <th colspan="2" width = "30%" >จำนวนเงิน<br>Amount</th>
//		 </tr>
//		 <tr align= "center">
//			  <th>บาท<br>Baht</th>
//			  <th>สต.<br>Stang</th>
//		 </tr>';
//
//		foreach ($doc_3 as $doc_3_1):
//
//	 	$doc3_date 		= DateThaithai($doc_3_1['date']);
//	 	$doc3_detail 	= $doc_3_1['detail'];
//	 	$doc3_price 	= number_format($doc_3_1['price'],2);
//	 	$doc3_price1 	= number_format($doc_3_1['price']);
//	 	$doc3_other 	= $doc_3_1['other'];
//$html5 = $html5.'
//		<tr align= "center" >
//		  	  <td align="left">&nbsp;'.$doc3_detail.'</td>
//			  <td>'.$doc3_price1.'</td>
//			  <td>'.substr($doc3_price,-2).'</td>
//		 </tr>';
//	endforeach;
//
//		 $html5 = $html5.' <tr align= "center">
//		  	  <td>รวม<br> Total Amount of</td>
//			  <td>'.number_format($doc1_Incomplete_receipt) .'</td>
//			  <td>'.substr($doc1_Incomplete_receipt,-2).'</td>
//		 </tr>
//</table>
//<br>
//<br>
//<table>
//	<tr>
//		<td width = "55%"></td>
//		<td width = "45%">
//			ลงชื่อ...................................................ผู้รับเงิน<br>
//Signed by &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Payee<br>
//		</td>
//	</tr>
//	<tr>
//		<td width = "55%"></td>
//		<td width = "45%">
//			ลงชื่อ...................................................ผู้จ่ายเงิน<br>
//Signed by &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;Payer<br>
//		</td>
//	</tr>
//</table>
//<br>
//<br>
//</div>
//';
//
//$pdf->writeHTML($html5, true, false, true, false, '');
//}
// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('doc.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

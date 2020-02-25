<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/selectboxit/jquery.selectBoxIt.css">

<!-- Bottom scripts (common) -->
<script src="<?php echo base_url(); ?>assets_saraban/js/gsap/TweenMax.min.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/joinable.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/resizeable.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/neon-api.js"></script>

<!-- Imported scripts on this page -->
<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/selectboxit/jquery.selectBoxIt.min.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url(); ?>assets_saraban/js/neon-chat.js"></script>

<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.1.js"></script> 
 
<!-- This is what you need -->
<script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

<!-- Demo Settings -->
<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        
    var doc_1_id = $('#doc_1_id').val();
    if(doc_1_id==0){
    var date_start = $('#date_start').val();  
    calculateday(date_start);
    }
    });
    //-----------------------------------------
    function sumqty(){
		var sum = 0;
		$(".qty1").each(function(){
			sum += +$(this).val();
		});
		$(".total").val(sum);
		$(".total1").val(sum);
		var sumprice = $('#1_sumprice').val();
		var sumint = parseInt(sum);
		var sumpriceint = parseInt(sumprice);
		$('#sumtotal').val(sumint+sumpriceint);
	}
	////////////////////////////////////////////////////////////////

    function sumAllowance(x){
		
		var sum = 0;
		$(".Allowance").each(function(){
			sum += +$(this).val();
		});
		$(".Allowancetotal").val(sum);
		sumtotalall(x);
		var sumA = parseInt($('#2_sumA').val());
		var sumB = parseInt($('#2_sumB').val());
		var sumC = parseInt($('#2_sumC').val());
		var sumD = parseInt($('#2_sumD').val());
		 var sumAll = sumA+sumB+sumC+sumD;

		$('#2_sumAll').val(sumAll.toFixed(2));
		var sumthai = ThaiBaht(sumAll.toFixed(2));
		$('#2_sumthai').val(sumthai);    
	}
	////////////////////////////////////////////////////////////////
	
    function sumAccom(x){
		
		var sum = 0;
		$(".Accom").each(function(){
			sum += +$(this).val();
		});
		$(".Accomtotal").val(sum);
		sumtotalall(x);
		var sumA = parseInt($('#2_sumA').val());
		var sumB = parseInt($('#2_sumB').val());
		var sumC = parseInt($('#2_sumC').val());
		var sumD = parseInt($('#2_sumD').val());

		var sumAll = sumA+sumB+sumC+sumD;
		$('#2_sumAll').val(sumAll.toFixed(2));
		var sumthai = ThaiBaht(sumAll.toFixed(2));
		$('#2_sumthai').val(sumthai);
	}
	////////////////////////////////////////////////////////////////
	
    function sumTravel(x){
		var sum = 0;
		$(".Travel").each(function(){
			sum += +$(this).val();
		});
		$(".Traveltotal").val(sum);
		sumtotalall(x);
		 var sumA = parseInt($('#2_sumA').val());
		var sumB = parseInt($('#2_sumB').val());
		var sumC = parseInt($('#2_sumC').val());
		var sumD = parseInt($('#2_sumD').val());

		var sumAll = sumA+sumB+sumC+sumD;
		$('#2_sumAll').val(sumAll.toFixed(2));
		var sumthai = ThaiBaht(sumAll.toFixed(2));
		$('#2_sumthai').val(sumthai);
	}
	////////////////////////////////////////////////////////////////
	
    function sumOther(x){
		var sum = 0;
		$(".Other").each(function(){
			sum += +$(this).val();
		});
		$(".Othertotal").val(sum);
		sumtotalall(x);
		var sumA = parseInt($('#2_sumA').val());
		var sumB = parseInt($('#2_sumB').val());
		var sumC = parseInt($('#2_sumC').val());
		var sumD = parseInt($('#2_sumD').val());

		var sumAll = sumA+sumB+sumC+sumD;
		$('#2_sumAll').val(sumAll.toFixed(2));
		var sumthai = ThaiBaht(sumAll.toFixed(2));
		$('#2_sumthai').val(sumthai);
	}
	////////////////////////////////////////////////////////////////
	
	function sumtotalall(x){
		var sum1 = 0;
		$(".totalall"+x).each(function(){
			sum1 += +$(this).val();
		});
		$(".totalalla"+x).val(sum1);
	}
	////////////////////////////////////////////////////////////////
  
  	function ThaiBaht(Number){
	  
		for(var i = 0; i < Number.length; i++){
		Number = Number.replace (",", ""); //ไม่ต้องการเครื่องหมายคอมมาร์
		Number = Number.replace (" ", ""); //ไม่ต้องการช่องว่าง
		Number = Number.replace ("บาท", ""); //ไม่ต้องการตัวหนังสือ บาท
		Number = Number.replace ("฿", ""); //ไม่ต้องการสัญลักษณ์สกุลเงินบาท
		}
		var TxtNumArr = new Array ("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า", "สิบ");
		var TxtDigitArr = new Array ("", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
		var BahtText = "";
		if (isNaN(Number))
		{
		return "ข้อมูลนำเข้าไม่ถูกต้อง";
		} else
		{
		//ตรวสอบอีกสักครั้งว่าตัวเลขมากเกินความต้องการหรือเปล่า
		if ((Number - 0) > 9999999.9999)
		{
		return "ข้อมูลนำเข้าเกินขอบเขตที่ตั้งไว้";
		} else
		{
		//พรากทศนิยม กับจำนวนเต็มออกจากกัน (บาปหรือเปล่าหนอเรา พรากคู่เขา)
		Number = Number.split (".");
		//ขั้นตอนต่อไปนี้เป็นการประมวลผลดูกันเอาเองครับ แบบว่าขี้เกียจจะจิ้มดีดแล้ว อิอิอิ
		if (Number[1].length > 0)
		{
		Number[1] = Number[1].substring(0, 2);
		}
		var NumberLen = Number[0].length - 0;
		for(var i = 0; i < NumberLen; i++)
		{
		var tmp = Number[0].substring(i, i + 1) - 0;
		if (tmp != 0)
		{
		if ((i == (NumberLen - 1)) && (tmp == 1))
		{
		BahtText += "เอ็ด";
		} else
		if ((i == (NumberLen - 2)) && (tmp == 2))
		{
		BahtText += "ยี่";
		} else
		if ((i == (NumberLen - 2)) && (tmp == 1))
		{
		BahtText += "";
		} else
		{
		BahtText += TxtNumArr[tmp];
		}
		BahtText += TxtDigitArr[NumberLen - i - 1];
		}
		}
		BahtText += "บาท";
		if ((Number[1] == "0") || (Number[1] == "00"))
		{
		BahtText += "ถ้วน";
		} else
		{
		DecimalLen = Number[1].length - 0;
		for (var i = 0; i < DecimalLen; i++)
		{
		var tmp = Number[1].substring(i, i + 1) - 0;
		if (tmp != 0)
		{
		if ((i == (DecimalLen - 1)) && (tmp == 1))
		{
		BahtText += "เอ็ด";
		} else
		if ((i == (DecimalLen - 2)) && (tmp == 2))
		{
		BahtText += "ยี่";
		} else
		if ((i == (DecimalLen - 2)) && (tmp == 1))
		{
		BahtText += "";
		} else
		{
		BahtText += TxtNumArr[tmp];
		}
		BahtText += TxtDigitArr[DecimalLen - i - 1];
		}
		}
		BahtText += "สตางค์";
		}
		return BahtText;
		}
		}
	}
            
	var x = $('#x').val();
		var y = 1;
		var z = $('#z').val();
		var z1 = $('#z1').val(); 
		
		$(document).ready(function() {
			//var max_fields      = 10;

			var wrapper1         = $(".container1");
			var add_button1      = $(".add_form_field1");

			var wrapper2         = $(".container2");
			var add_button2      = $(".add_form_field2");

			var wrapper3         = $(".container3");
			var add_button3      = $(".add_form_field3");
                       
                        var wrapper4         = $(".container4");
			var add_button4     = $(".add_form_field4");

			$(add_button3).click(function(e){
				e.preventDefault();
				//if(z < max_fields){
					z++;
					$(wrapper3).append(
						'<div class="row deleterow" >'
							+'<div class="col-md-3">'
								+'<div class="form-group"><div class="col-md-12" style="padding-left: 0px;"><label class="control-label" for="birthdate">วันที่/เดือน/ปี</label></div><br><div class="col-md-3" style="padding-right: 0px;padding-left: 0px"><select class="form-control" id="daydoc3'+z+'" name="daydoc3[]" ><option value="00">วัน</option><?php for($a=1; $a<=31; $a++){if($a < 10){  $txt = '0';  } else { $txt =''; }?><option value="<?php echo $txt.$a?>"    <?php  if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option><?php }	?></select></div><div class="col-md-5" style="padding-right: 0px;"><select class="form-control" id="monthdoc3'+z+'" name="monthdoc3[]" ><option value="00">เดือน</option><?php for($x=1; $x<=12; $x++){ if($x < 10){  $txt = '0';  } else { $txt =''; }if($x==1){$month = 'มกราคม';}else if($x==2){$month = 'กุมภาพันธ์';}else if($x==3){$month = 'มีนาคม';}else if($x==4){$month = 'เมษายน';}else if($x==5){$month = 'พฤษภาคม';}else if($x==6){$month = 'มิถุนายน';}else if($x==7){$month = 'กรกฎาคม';}else if($x==8){$month = 'สิงหาคม';}else if($x==9){$month = 'กันยายน';}else if($x==10){$month = 'ตุลาคม';}else if($x==11){$month = 'พฤศจิกายน';}else if($x==12){$month = 'ธันวาคม';}?><option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?> </option><?php }?></select></div><div class="col-md-4" style="padding-right: 0px;"><select class="form-control" id="yeardoc3'+z+'" name="yeardoc3[]" ><option value="00">ปี</option><?php for($y=2017; $y<=2032; $y++){ $yearthai = $y+543?><option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option><?php }	?></select></div></div>'
							+'</div>'

							+'<div class="col-md-3">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>' 
									+'<select name="43[]" id="3_detail'+z+'" class="form-control" ><option value="">-------โปรดเลือก------</option><option value="ค่าเช่าที่พัก">ค่าเช่าที่พัก</option><option value="ค่าพาหนะ">ค่าพาหนะ</option></select> '
								+'</div>'
							+'</div>'

                                                        +'<div class="col-md-4">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">รายละเอียด</label>'
									+'<input class="form-control" name="45[]" id="3_other'+z+'" required placeholder="รายละเอียด" />'
                                                                        +'<input class="form-control" name="textselect[]" id="textselect" value="1" type="hidden"/>'
								+'</div>'
							+'</div>'
							+'<div class="col-md-1">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">จำนวนเงิน</label>'
									+'<input class="form-control qty1" name="44[]" id="3_price'+z+'" required placeholder="จำนวนเงิน" onchange="sumqty()" type="number" min = "0"/>'
								+'</div>'
							+'</div>'

							
                                                        +'<div class="col-md-1"  id="delete'+z+'">'
							+'<br>'
							+'<a href="#" class="delete">Delete</a></div>'
                                                        +'</div>'
						+'</div>'
					); //add input box
					console.log(z);
//				}
//				else
//				{
//					console.log(z);
//				alert('เพิ่มได้สูงสุด 10 ช่อง')
//				}
			});
                        
                        $(wrapper3).on("click",".delete", function(e){
                        var deleteint = 'delete'+z;
				e.preventDefault(); $('#'+deleteint).parent().remove(); z--;
                                sumqty();
				console.log(z);
			});
                        
                        $(add_button4).click(function(e){
				e.preventDefault();
				//if(z1 < max_fields){
					z1++;
					$(wrapper4).append(
						'<div class="row">'
							+'<div class="col-md-3">'
								+'<div class="form-group"><div class="col-md-12" style="padding-left: 0px;"><label class="control-label" for="birthdate">วันที่/เดือน/ปี</label></div><br><div class="col-md-3" style="padding-right: 0px;padding-left: 0px"><select class="form-control" id="daydoc3_1'+z+'" name="daydoc3_1[]" ><option value="00">วัน</option><?php for($a=1; $a<=31; $a++){if($a < 10){  $txt = '0';  } else { $txt =''; }?><option value="<?php echo $txt.$a?>"    <?php  if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option><?php }	?></select></div><div class="col-md-5" style="padding-right: 0px;"><select class="form-control" id="monthdoc3_1'+z+'" name="monthdoc3_1[]" ><option value="00">เดือน</option><?php for($x=1; $x<=12; $x++){ if($x < 10){  $txt = '0';  } else { $txt =''; }if($x==1){$month = 'มกราคม';}else if($x==2){$month = 'กุมภาพันธ์';}else if($x==3){$month = 'มีนาคม';}else if($x==4){$month = 'เมษายน';}else if($x==5){$month = 'พฤษภาคม';}else if($x==6){$month = 'มิถุนายน';}else if($x==7){$month = 'กรกฎาคม';}else if($x==8){$month = 'สิงหาคม';}else if($x==9){$month = 'กันยายน';}else if($x==10){$month = 'ตุลาคม';}else if($x==11){$month = 'พฤศจิกายน';}else if($x==12){$month = 'ธันวาคม';}?><option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?> </option><?php }?></select></div><div class="col-md-4" style="padding-right: 0px;"><select class="form-control" id="yeardoc3_1'+z+'" name="yeardoc3_1[]" ><option value="00">ปี</option><?php for($y=2017; $y<=2032; $y++){ $yearthai = $y+543?><option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option><?php }	?></select></div></div>'
							+'</div>'
							

                                                        +'<div class="col-md-3">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">รายละเอียด</label>'
									+'<input class="form-control" name="49[]" id="4_other'+z1+'" required placeholder="รายละเอียด" />'
                                                                        +'<input class="form-control" name="textinput[]" id="textinput" value="2" type="hidden"/>'
								+'</div>'
							+'</div>'
							+'<div class="col-md-3">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">รายละเอียดรายจ่าย</label>' 
                                                                +'<input class="form-control" name="47[]" id="4_detail'+z1+'" required placeholder="รายละเอียดค่ายใช้จ่ายอื่น ๆ" />'
								+'</div>'
							+'</div>'

							+'<div class="col-md-1">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">จำนวนเงิน</label>'
									+'<input class="form-control qty1" name="48[]" id="4_price'+z1+'" required placeholder="จำนวนเงิน" onchange="sumqty()" type="number" min = "0"/>'
								+'</div>'
							+'</div>'

							

							+'<div class="col-md-1" id="deletet'+z1+'">'
							+'<br>'
							+'<a href="#" class="delete">Delete</a></div>'
                                                        +'</div>'

						+'</div>'
					); //add input box
					console.log(z1);
//				}
//				else
//				{
//					console.log(z1);
//				alert('เพิ่มได้สูงสุด 10 ช่อง')
//				}
			});

			$(wrapper4).on("click",".delete", function(e){
                        var deleteint = 'deletet'+z1;
				e.preventDefault(); $('#'+deleteint).parent().remove(); z1--;
                                sumqty();
				console.log(z1);
			});

			$(add_button2).click(function(e){
				e.preventDefault();
				if(y < max_fields){
					y++;
					$(wrapper2).append(
						'<div class="row">'
							+'<div class="col-md-8">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">รายการ</label>'
									+'<input id="chk2" type="hidden" value='+y+' />'
									+'<input class="form-control" name="54[]" id="4_item'+y+'" required placeholder="รายการ" />'
								+'</div>'
							+'</div>'

							+'<div class="col-md-3">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">จำนวนเงิน</label>'
									+'<input class="form-control" name="55[]" id="4_amount'+y+'" required placeholder="จำนวนเงิน" type="number"/>'
								+'</div>'
							+'</div>'

							+'<br>'
							+'<br>'
							+'<a href="#" class="delete">Delete</a></div>'
						+'</div>'
					); //add input box
					console.log(y);
				}
				else
				{
					console.log(y);
				alert('เพิ่มได้สูงสุด 10 ช่อง')
				}
			});

			$(wrapper2).on("click",".delete", function(e){
				e.preventDefault(); $(this).parent('div').remove(); y--;
				console.log(y);
			});


			$(add_button1).click(function(e){
				e.preventDefault();
				//if(x < max_fields){
					x++;
					$(wrapper1).append(
						'<div class="row">'
							+'<div class="col-md-2" style="padding:0px">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">ชื่อ</label>'
									+'<input class="form-control" name="28[]" id="2_n'+x+'" placeholder="ระบุ" required />'
								+'</div>'
							+'</div>'

							+'<div class="col-md-2">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">ตำแหน่ง</label>'
									+'<input class="form-control" name="29[]" id="2_p'+x+'" placeholder="ระบุ" required/>'
								+'</div>'
							+'</div>'

							+'<div class="col-md-1">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">เบี้ยเลี้ยง</label>'
									+'<input class="form-control Allowance totalall'+x+'" name="30[]" id="2_priceA'+x+'" placeholder="ระบุ" required onchange="sumAllowance('+x+')" type="number"/>'
								+'</div>'
							+'</div>'

							+'<div class="col-md-1">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">ค่าที่พัก</label>'
									+'<input class="form-control Accom totalall'+x+'" name="31[]" id="2_priceB'+x+'" placeholder="ระบุ" required onchange="sumAccom('+x+')" type="number"/>'
								+'</div>'
							+'</div>'

							+'<div class="col-md-1">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">ค่าพาหนะ</label>'
									+'<input class="form-control Travel totalall'+x+'" name="32[]" id="2_priceC'+x+'" placeholder="ระบุ" required onchange="sumTravel('+x+')" type="number"/>'
								+'</div>'
							+'</div>'

							+'<div class="col-md-1">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">ค่าอื่นๆ</label>'
									+'<input class="form-control Other totalall'+x+'" name="33[]" id="2_priceD'+x+'" placeholder="ระบุ" required onchange="sumOther('+x+')" type="number"/>'
								+'</div>'
							+'</div>'

							+'<div class="col-md-1" style=" padding-left: 0px;">'
								+'<div class="form-group">'
									+'<label class="control-label" for="full_name">รวม</label>'
									+'<input class="form-control totalalla'+x+'" name="34[]" id="2_sum'+x+'" value="" placeholder="ระบุ" required readonly type="number"/>'
								+'</div>'
							+'</div>'

							+'<div class="col-md-2" style="padding:0px;display: none">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">วันที่รับเงิน</label><br>'
									+'<div class="col-md-3" style="padding-right: 0px;padding-left: 0px"><select class="form-control" id="day'+x+'" name="day2[]" ><option value="00">วัน</option><?php for($a=1; $a<=31; $a++){ if($a < 10){  $txt = '0';  } else { $txt =''; }?><option value="<?php echo $txt.$a?>"    <?php if(date('d')==$txt.$a){echo 'selected';}?>><?php echo $a?></option><?php }?></select></div>'
									+'<div class="col-md-5" style="padding-right: 0px;padding-left: 5px"><select class="form-control" id="month'+x+'" name="month2[]" ><option value="00">เดือน</option><?php for($x=1; $x<=12; $x++){ if($x < 10){  $txt = '0';  } else { $txt =''; }if($x==1){$month = 'มกราคม';}else if($x==2){$month = 'กุมภาพันธ์';}else if($x==3){$month = 'มีนาคม';}else if($x==4){$month = 'เมษายน';}else if($x==5){$month = 'พฤษภาคม';}else if($x==6){$month = 'มิถุนายน';}else if($x==7){$month = 'กรกฎาคม';}else if($x==8){$month = 'สิงหาคม';}else if($x==9){$month = 'กันยายน';}else if($x==10){$month = 'ตุลาคม';}else if($x==11){$month = 'พฤศจิกายน';}else if($x==12){$month = 'ธันวาคม';}?><option value="<?php echo $txt.$x?>"  <?php if(date('m')==$txt.$x){echo 'selected';}?> ><?php echo $month?></option><?php }	?></select></div>\n\
                                                            <div class="col-md-4" style="padding-right: 0px;padding-left: 5px"><select class="form-control" id="year'+x+'" name="year2[]" ><option value="00">ปี</option><?php for($y=2017; $y<=2032; $y++){ $yearthai = $y+543?><option value="<?php echo $y?>"   <?php if(date('Y')==$y){echo 'selected';}?>><?php echo $yearthai?></option><?php }	?></select></div>'
                                                               
								+'</div>'
							+'</div>'

							+'<div class="col-md-2">'
								+'<div class="form-group">'
									+'<label class="control-label" for="birthdate">หมายเหตุ</label>'
									+'<textarea class="form-control autogrow" name="36[]" required id="2_other'+x+'" placeholder="หมายเหตุ"></textarea>'
								+'</div>'
							+'</div>'

							 +'<div class="col-md-1"  id="deletea'+x+'">'
							+'<br>'
							+'<a href="#" class="delete">Delete</a></div>'
                                                        +'</div>'
						+'</div>'
					
					); //add input box
					console.log(x);
//				}
//				else
//				{
//					console.log(x);
//				alert('เพิ่มได้สูงสุด 10 ช่อง')
//				}
			});

			$(wrapper1).on("click",".delete", function(e){
			 var deleteint = 'deletea'+x;
				e.preventDefault(); $('#'+deleteint).parent().remove(); x--;
                                sumAllowance();
                                sumAccom();
                                sumTravel();
                                sumOther();
				console.log(x);
			});
		});
		
		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }


		function DoJSON(postURL) {
			return new Promise(function (resolve, reject) {
				$.ajax({  
					url:postURL,  
					method:"POST",  
					data:$('#rootwizard').serialize(),
					type:'json',
					success : function(info){
						resolve(info);
					},
					error: function (err) {
						alert("ERROR : DoJSON() " + err.statusText);
						reject(err.statusText);
					}
				});
			});
		}
                //----------------------------
                //--------------------------------
function deletea(x){
var deleteint = 'deletea'+x;

				  $('#'+deleteint).parent().remove(); x--;
                                 $('#x').val(x);
                                 sumAllowance();
                                sumAccom();
                                sumTravel();
                                sumOther();

}
                //--------------------------------
function checkinput(){
    $('input[data-validate="required"]').each(function(){
        if($(this).val() == ''){
         $("#rootwizard").valid();
        }
    });
var postData = new FormData($("#rootwizard")[0]);
              var user_id = $('#user_id').val();
            var idsaraban = $('#idsaraban').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Inputform/savedoc_2') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status) {
                        //console.log(data);
                       // $('#currentID').val(data);
                        if (status == 'success') {
                  
                     swal({
                title: 'บันทึกข้อมูลสำเร็จ',
                text: "คุณต้องการไปหน้าต่อไปหรือไม่",
                type: 'success',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: 'Next'
                
            },function () {
            $('.next').click();
            })

                     $("a").removeClass("isDisabled");
//                     setTimeout(function(){ window.location.href = "<?php //echo base_url('Inputform/form_group/')?>"+idsaraban+'/'+user_id; }, 2000);
			
                } else {
                            swal({
                                title: 'ไม่สามารถบันทึกข้อมูลได้!',
                                text: "Can not be saved.!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                        }
                    }
                });

}
               function showdiv(){
                if($('#chk-showdiv').is(':checked')){
                $('#showdiv').show();
                $('#billnosuccess').show();
                }else{
                    $('#showdiv').hide();
                    $('#billnosuccess').hide();
                }
            }
                function showauthor(){
                if($('#chk-showauthor').is(':checked')){
                $('#showauthor').show();
                }else{
                    $('#showauthor').hide();
                }
            }
            	//////////////////////////////////////////////////////////////
	
	function calculateAmount(amount,type,field_another,fieldTotal){
		
		var amount2 = $('#'+field_another).val();
		var amount3 = 0;
		
		if(amount.indexOf(',') != -1){
			amount = amount.replace(",", "");
		}
		if(amount2.indexOf(',') != -1){
			amount2 = amount2.replace(",", "");
		}
		//if((amount2 != '') && (amount2 >0)){				
			amount3 = amount * amount2;
			$('#'+fieldTotal).val(amount3);
		//}	
		//if(amount3 >0){
		   calculate_totalPrice(amount3,type);
		//}		
	}
	////////////////////////////////////////////////////////////////
	
    function calculate_totalPrice(amount,type){		
		
		var chEdit = '<?php echo $this->uri->segment(6)?>';		
		var balance = '<?php echo $balance?>'; 		
		
		if(chEdit != ''){
			
			var sumprice = $('#money_spent').val();
			balance = parseInt(balance) + parseInt(sumprice);		   
		}		
		
		if(type == '1'){
		   
		   var fieldTotal = '1_sumprice';
		   var className = '.withdraw1';	
		}
		if(type == '2'){
		   
		   var fieldTotal = 'Ntotal_price2';
		   var className = '.withdraw2';	
		}	
		
		var totalPoints = 0;		
		$(className).each(function(){ 
 
			if($(this).val() ==''){
				
				var numPrice = 0;
				
			} else {
				
				var numPrice = $(this).val();				
				if(numPrice.indexOf(',') != -1){
					numPrice = numPrice.replace(",", "");
				}
				numPrice = parseInt(numPrice); 
				totalPoints += numPrice;		
			}
			//$('#'+fieldTotal).val(totalPoints);
		})
		
		/*if(totalPoints > balance){  *****ไฟล์นี้สำหรับ คณะ เลยไม่ต้องใช้โค้ด alert นี้******
			
			balance = balance.toLocaleString();
			alert('ตามสิทธิคงเหลือ '+balance+' บาท กรุณาตรวจสอบและแก้ไขข้อมูล !');
		    $('#btn1').attr("disabled", true);
		}*****ไฟล์นี้สำหรับ คณะ เลยไม่ต้องใช้โค้ด alert นี้****** */		
		
		$('#'+fieldTotal).val(totalPoints);
		$('#1_sumprice1').val(totalPoints);
		var total = $('.total').val();
		
        if(total !=''){
            var sumtotalpoint = parseInt(total);
        }else{
            var sumtotalpoint = total;
        }
        var sumtotalall = parseInt(totalPoints);
		$('#sumtotal').val(sumtotalall + sumtotalpoint);                
	}
    //----------------------------------
	
    function settotal(value){
		
        $('#sumtotal').val(value);
    }
	//----------------------------------
	
    function settotal1(value){
                
		var settotal = $('#sumtotal').val();
        var number = settotal+value;
        $('#sumtotal').val(number);
    }
    //--------------------------------------
	
    function savedoc_1(){
              var doc_1_id = $('#doc_1_id').val();
              var postData = new FormData($("#rootwizard")[0]);
              var user_id = $('#user_id').val();
              var idsaraban = $('#idsaraban').val();
              var type_travel1 = $('#type_travel1').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Inputform/savedoc_1/2') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status) {
                        //console.log(data);
                       // $('#currentID').val(data);
                        if (status == 'success') {
                            console.log(data);
                  if(doc_1_id == 0){
                    swal({
                            title: 'บันทึกข้อมูลสำเร็จ.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                    // $("a").removeClass("isDisabled");
                      var dataid = parseInt(data);
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Inputform/form_group/')?>"+idsaraban+'/'+user_id+'/'+type_travel1+'/'+dataid+'/'+2; }, 2000);
	}else{
          
            swal({
                title: 'บันทึกข้อมูลสำเร็จ',
                text: "คุณต้องการไปหน้าต่อไปหรือไม่",
                type: 'success',
                showCancelButton: true,
                confirmButtonClass: 'btn btn-confirm mt-2',
                cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
                confirmButtonText: 'Next'
                
            },function () {
            $('.next').click();
            })

			
}    } else {
                            swal({
                                title: 'ไม่สามารถบันทึกข้อมูลได้!',
                                text: "Can not be saved.!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                        }
                    }
                });
//            
        }


         /*   $('input[data-validate="required"]').each(function(){
        if($(this).val() == ''){
            
          return false; 
          break;
        }
    });
            var checkBox = document.getElementById("chkrules");
            if (checkBox.checked == false){
                 
                alert('กรุณากดเลือกปุ่มรับรองความจริง');
               return false;
            }else{
              var postData = new FormData($("#rootwizard")[0]);
              var user_id = $('#user_id').val();
            var idsaraban = $('#idsaraban').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php //echo base_url('Inputform/savedoc_1') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status) {
                        //console.log(data);
                       // $('#currentID').val(data);
                        if (status == 'success') {
                  
                    swal({
                            title: 'บันทึกข้อมูลสำเร็จ.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                    // $("a").removeClass("isDisabled");
                     setTimeout(function(){ window.location.href = "<?php //echo base_url('Inputform/form_alone/')?>"+idsaraban+'/'+user_id; }, 2000);
			
                } else {
                            swal({
                                title: 'ไม่สามารถบันทึกข้อมูลได้!',
                                text: "Can not be saved.!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                        }
                    }
                });
//            
        }*/
       
         //---------------------------------
		function enablebutton(ischecked){
			//console.log(ischecked)
			if(ischecked==true){
				$('#btn1').attr("disabled", false);
			}else{
				$('#btn1').attr("disabled", true);
			}
		}
//-----------------------
function checksumbit(){
    var checkBox = document.getElementById("chkrules");
     if (checkBox.checked == false){
  
                alert('กรุณากดเลือกปุ่มรับรองความจริง');
               return false;
                
            }else{
                return true; 
            }
}
//--------------------------------
function deletedoc_3(iddoc_3,table,z){
var deleteint = 'delete'+z;
      $.post('<?php echo base_url('Inputform/deletedoc_3')?>' , { iddoc_3 : iddoc_3, table:table }, 
			function(data){
				  $('#'+deleteint).parent().remove(); z--;
                                 $('#z').val(z);
                                sumqty();
				console.log(z);
			});
    
}
//--------------------------------
function deletedoc_3_1(iddoc_3,table,z){
var deleteint = 'deletet'+z;
      $.post('<?php echo base_url('Inputform/deletedoc_3')?>' , { iddoc_3 : iddoc_3, table:table }, 
			function(data){
				  $('#'+deleteint).parent().remove(); z--;
                                 $('#z1').val(z);
                                sumqty();
				console.log(z);
			});
    
}
//--------------------------------
	
function savedata(idsaraban,table,type_travel,ch4step){
	
    	var type_travel1 = $('#type_travel1').val();
	
      	$.post('<?php echo base_url('Inputform/getdocfile')?>', { idsaraban : idsaraban, type_travel : type_travel }, function(data1){
                            
			if(data1!=0){
				
      			$.post('<?php echo base_url('Inputform/savedata')?>', { idsaraban : idsaraban, table : table }, function(data){
				
					if(data!=0){
                         if(type_travel1 != '1'){
                                  
							 $.post('<?php echo base_url('document_sendmail/send_mail4step')?>' , { idsaraban : idsaraban } , function(data){ 
                                     
                                    swal({
										title: 'บันทึกข้อมูลสำเร็จ.',
										//text: 'You clicked the button!',
										type: 'success',
										confirmButtonClass: 'btn btn-confirm mt-2'
									});
									 setTimeout(function(){ window.location.href = "<?php echo base_url('Allowance')?>"; }, 2000);
                             });
							 
                         } else {
                              
							 $.post('<?php echo base_url('document_sendmail/send_mail4steplocal')?>', { idsaraban : idsaraban , ch4step : ch4step }, function(data){ 
                               
                                   swal({
										title: 'บันทึกข้อมูลสำเร็จ.',
										//text: 'You clicked the button!',
										type: 'success',
										confirmButtonClass: 'btn btn-confirm mt-2'
									});
                             		setTimeout(function(){ window.location.href = "<?php echo base_url('Allowance')?>"; }, 2000);
                             });
                        }
                  } else {
                      swal({
                         title: 'ไม่สามารถบันทึกข้อมูลได้!',
                         text: "Can not be saved.!",
                         type: 'warning',
                         confirmButtonClass: 'btn btn-confirm mt-2'
                      });
                 }
			 });
         } else {
              swal({
                 title: 'กรูณาแนบไฟล์หลักฐานการจ่าย!',
                 text: "Can not be saved.!",
                 type: 'warning',
                  confirmButtonClass: 'btn btn-confirm mt-2'
             });
         }
	});    
}
//--------------------------------	
	
function nextdisable(){
    $("#nextnext").addClass("isDisabled");
}
function upload(){
                  
                    //$("#user_id").val(user_id);

					$('#modal-upload-saraban').modal({backdrop: 'static', keyboard: false}) 
					$("#modal-upload-saraban").modal();
		}
                //--------------------------------------------------
                		
    function Addimg(){
        var img2 = $('#img2').val();
        var postData = new FormData($("#imgForm")[0]);
        if(img2 !=''){
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('Inputform/addimg')?>',
            processData: false,
            contentType: false,
            data: postData,
            success: function (data, status) { 
                if(status == 'success'){
                                        $('#img2').val('');  
					$('#showdata').empty();		
					$('#showdata').html(data);
                   alert('บันทึกข้อมูลสำเร็จ');
                   $('iframe').attr('src', $('iframe').attr('src'));
                } else {
                    alert('บันทึกข้อมูลไม่สำเร็จ');
                }
            }
            
        })
        }else{
        	alert('กรุณาเลือกไฟล์สำเนา');
            return false;
            $('#modal-upload-saraban').modal({backdrop: 'static', keyboard: false}) 
			$("#modal-upload-saraban").modal();
        }
    }
    	//----------------------------------------	
	
	function check_typeFile(file,element){		
		
		if(file !=''){		
			
			var arrayExtensions = ["gif", "jpg", "png", "jpeg", "pdf", "GIF", "JPG", "PNG", "JPEG", "PDF"];
			var ext = file.split(".");
			ext = ext[ext.length-1].toLowerCase(); 			
			if(arrayExtensions.lastIndexOf(ext) == -1){
				alert('กรุณตรวจสอบประเภทไฟล์ เนื่องจากรองรับไฟล์นามสกุล .pdf , .jpg , .png , .gif เท่านั้น');
				$("#"+element).val("");
				$("#"+element).focus();
			}
		}		
	}
        //--------------------------------------
        function comfirmDelete(idsaraban,file_name,typeData){
             $.post('<?php echo base_url('Inputform/comfirmDelete') ?>', {idsaraban: idsaraban,file_name:file_name,typeData:typeData}, function (data) {
                 //$("#modal-upload-saraban").modal('hide');
                alert('ลบข้อมูลสำเร็จ');
                $('#showdata').empty();		
				$('#showdata').html(data);
                $('iframe').attr('src', $('iframe').attr('src'));
             });
        }
        //--------------------------------------
        function calculateday(date){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedaydaystart(daystart){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            //var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedaymonthstart(monthstart){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            //var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            //alert(date+'...'+endend_date);
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedayyearstart(yearstart){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            //var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            //alert(date+'...'+endend_date);
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedayh(timestart){
            //var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = timestart+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedaym(transfer_m_time1){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            //var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedayend(endend_date){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
           var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            //var endend_date = $('#1_dateend').val();
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
         //--------------------------------------
        function calculatedaydayend(dayend){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            //var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
         //--------------------------------------
        function calculatedaymonthend(monthend){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            //var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
         //--------------------------------------
        function calculatedayyearend(yearend){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            //var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedayendh(transfer_h_time2){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            //var transfer_h_time2 = $('#transfer_h_time2').val();
            var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        //--------------------------------------
        function calculatedayendm(transfer_m_time2){
            var transfer_h_time1 = $('#transfer_h_time1').val();
            var transfer_m_time1 = $('#transfer_m_time1').val();
            var daystart = $('#daystart').val();
            var monthstart = $('#monthstart').val();
            var yearstart = $('#yearstart').val();
            var date = yearstart+'-'+monthstart+'-'+daystart;
            var dayend = $('#dayend').val();
            var monthend = $('#monthend').val();
            var yearend = $('#yearend').val();
            var endend_date = yearend+'-'+monthend+'-'+dayend;
            var transfer_h_time2 = $('#transfer_h_time2').val();
            //var transfer_m_time2 = $('#transfer_m_time2').val();
            var timestart = transfer_h_time1+':'+transfer_m_time1;
            var time_end = transfer_h_time2+':'+transfer_m_time2;
            $.post('<?php echo base_url('Inputform/calculateday') ?>', {date: date,timestart:timestart,endend_date:endend_date,time_end:time_end}, function (data) {
                 $('#1_sumdate').val(data);
             });
        }
        
		</script>


</body>
</html>


<!---------- table ------------------->

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/select2/select2.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/wysihtml5/bootstrap-wysihtml5.css">

	<!-- Imported scripts on this page -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/datatables/datatables.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/select2/select2.min.js"></script>

<!---------- table ------------------->
	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/rickshaw/rickshaw.min.css">


	<!-- Bottom scripts (common) -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/gsap/TweenMax.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/joinable.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/resizeable.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-api.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

	<!-- Imported scripts on this page -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/rickshaw/vendor/d3.v3.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/rickshaw/rickshaw.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/raphael-min.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/morris.min.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/toastr.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-chat.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.validate.min.js"></script>

	<!-- This is what you need -->
	<script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>

	<!-- Imported scripts on this page -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/fileinput.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/dropzone/dropzone.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-chat.js"></script>

<script>

		var chk_update   = false;
		var id_allowance = "";

		$(document).ready(function(){
			 $("#Expensesform").addClass("hidden");
			 document.getElementById("field-6").disabled = true;  
		})

		function Expenses(){
			 $("#Expensesform").removeClass("hidden");
			 $('#field-6').val("");
			document.getElementById("field-6").disabled = true;  
		}
		function notExpenses(){
			$("#Expensesform").addClass("hidden");
			$('#Expenses_date1').val("");
			$('#Expenses_date2').val("");
			$('#Expenses_date3').val("");
			$('#Expenses1').val("");
		 	$('#Expenses2').val("");
	 		$('#Expenses3').val("");
			$('#Expenses4').val("");
			$('#remark_Expenses4').val("");
			$('#field-2').val("");
			$('#field-6').val("");
			document.getElementById("field-6").disabled = true;  
		}

		function notExpenses2(){
			$("#Expensesform").addClass("hidden");
			$('#Expenses_date1').val("");
			$('#Expenses_date2').val("");
			$('#Expenses_date3').val("");
			$('#Expenses1').val("");
		 	$('#Expenses2').val("");
	 		$('#Expenses3').val("");
			$('#Expenses4').val("");
			$('#remark_Expenses4').val("");
			$('#field-2').val("");
			document.getElementById("field-6").disabled = false;  
		}

		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }

		function DoJSON(data, api_link) {
			return new Promise(function (resolve, reject) {
				$.ajax({
					url: api_link,
					data: data,
					type: "POST",
					cache: false,
					dataType: 'json', //หรือ json หรือ xml
					success: function (info) {
						resolve(info);
					},
					error: function (err) {
						alert("ERROR : DoJSON() " + err.statusText);
						reject(err.statusText);
					}
				});
			});
		}

		
		
		function dusubmit_save(){
			
			    var chk 		= true;
				var ref_saraban = $('#field-0').val();
				var topic 		= $('#field-1').val();
				var total 		= $('#field-2').val();
				var date 		= $('#field-4').val();
				var to 			= $('#field-3').val();
				var detail1 	= $('#detail_1').val();
				var detail2 	= $('#detail_2').val();
				var footer		= $('#field-5').val();
				var Reason 		= "";
				var budget	    = "";
				var budget_datail= $('#field-6').val();
				var file1 		= "";
				var file2 		= "";
				var file3 		= "";
				var file4 		= "";
				var file5 		= "";
				var Orig1		= "";
				var Orig2		= "";
				var Orig3		= "";
				var Orig4		= "";
				var Orig5		= "";
				var Expenses_date1  = $('#Expenses_date1').val();
				var Expenses_date2  = $('#Expenses_date2').val();
				var Expenses_date3  = $('#Expenses_date3').val();
				//var Expenses_date4  = $('#Expenses_date4').val();
				var Expenses1  = $('#Expenses1').val();
				var Expenses2  = $('#Expenses2').val();
				var Expenses3  = $('#Expenses3').val();
				var Expenses4  = $('#Expenses4').val();
				var remark_Expenses4 = $('#remark_Expenses4').val();


				var radios1 = document.getElementsByName('radio1');

					for (var i = 0, length = radios1.length; i < length; i++)
					{
					 if (radios1[i].checked)
					 {
					  // do whatever you want with the checked radio
					 Reason = radios1[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

				var radios2 = document.getElementsByName('radio2');

					for (var i = 0, length = radios2.length; i < length; i++)
					{
					 if (radios2[i].checked)
					 {
					  // do whatever you want with the checked radio
					 budget = radios2[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}
		
				/*if(ref_saraban== "" ||ref_saraban == null){
						$('#field-0').addClass('validate-has-error');
						$('#field-0_error').html('กรุณาระบุเลขที่หนังสือขออนุมัติเดินทาง').css('color', 'red');
						chk = false;
				}*/

				if(topic== "" ||topic == null){
						$('#field-1').addClass('validate-has-error');
						$('#field-1_error').html('กรุณาระบุเรื่อง').css('color', 'red');
						chk = false;
				}
				if(detail1== "" ||detail1 == null){
						$('#detail_1').addClass('validate-has-error');
						$('#detail_1_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						chk = false;
				}
				if(detail2 == "" ||detail2 == null){
						$('#detail_2').addClass('validate-has-error');
						$('#detail_2_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						chk = false;
				}
				if(Reason== "" ||Reason == null){
						//$('#field-0').addClass('validate-has-error');
						$('#radio1_error').html('กรุณาระบุเหตุผลการขออนุมัติ').css('color', 'red');
						chk = false;
				}

				if(budget== "" ||budget == null){
						//$('#field-0').addClass('validate-has-error');
						$('#radio2_error').html('กรุณาระบุประเภทการเบิก').css('color', 'red');
						chk = false;
				}
				
				if(to == "" ||to == null){
						$('#field-3').addClass('validate-has-error');
						$('#field-3_error').html('กรุณาระบุเรียน').css('color', 'red');	
						chk = false;
				}	

				if(date == "" ||date == null){
						$('#field-4').addClass('validate-has-error');
						$('#field-4_error').html('กรุณาระบุวันที่').css('color', 'red');	
						chk = false;
				}	

				/*if(budget == '1'){

					if(Expenses_date1 == "" ||Expenses_date1 == null){
						$('#Expenses_date1').addClass('validate-has-error');
						$('#Expenses_date1_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						console.log("test");
						chk = false;
					}	
					if(Expenses_date2 == "" ||Expenses_date2 == null){
						$('#Expenses_date2').addClass('validate-has-error');
						$('#Expenses_date2_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses_date3 == "" ||Expenses_date3 == null){
						$('#Expenses_date3').addClass('validate-has-error');
						$('#Expenses_date3_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses1 == "" ||Expenses1 == null){
						$('#Expenses1').addClass('validate-has-error');
						$('#Expenses1_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses2 == "" ||Expenses2 == null){
						$('#Expenses2').addClass('validate-has-error');
						$('#Expenses2_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses3 == "" ||Expenses3 == null){
						$('#Expenses3').addClass('validate-has-error');
						$('#Expenses3_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(total== "" || total == null){
						$('#field-2').addClass('validate-has-error');
						$('#field-2_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');
						chk = false;
					}
					
				}else*/if(budget == '3'){
					if(budget_datail== "" || budget_datail == null){
						$('#field-6').addClass('validate-has-error');
						$('#field-6_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						 Expenses_date1  = null;
						 Expenses_date2  = null;
						 Expenses_date3  = null;
						 Expenses1  = null;
						 Expenses2  = null;
						 Expenses3  = null;
						 Expenses4  = null;
						 remark_Expenses4 = null;
						 total = null;
						 chk = false;
					}
				}else if(budget == '2'){
					
					 Expenses_date1  = null;
					 Expenses_date2  = null;
					 Expenses_date3  = null;
					 Expenses1  = null;
					 Expenses2  = null;
					 Expenses3  = null;
					 Expenses4  = null;
					 total		= null;
					 remark_Expenses4 = null;
				
				}
					
				for (var x = 0; x < Listfile.length; x++) {
	              	if(x == 0){
	              		file1 = Listfile[x].file_name;
	              		Orig1 = Listfile[x].client_name;
	              	} 
	              	if(x == 1){
	              		file2 = Listfile[x].file_name;
	              		Orig2 = Listfile[x].client_name;
	              	} 
	              	if(x == 2){
	              		file3 = Listfile[x].file_name;
	              		Orig3 = Listfile[x].client_name;
	              	} 
	              	if(x == 3){
	              		file4 = Listfile[x].file_name;
	              		Orig4 = Listfile[x].client_name;
	              	} 
	              	if(x == 4){
	              		file5 = Listfile[x].file_name;
	              		Orig5 = Listfile[x].client_name;
	              	} 
	            }  

				if(chk == true){

					swal({
					  title: "ยืนยันการบันทึก",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					}, function () {
						var api_link = "<?php echo base_url(); ?>allowance/insert_allowance"; 
						var username = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance: id_allowance,
									topic		: topic,
									ref_saraban : ref_saraban,
									date        : date,
									detail1 	: detail1,
									detail2 	: detail2,
									Reason    	: Reason,
									footer		: footer,
									budget		: budget,
									budget_datail: budget_datail,
									Expenses1   : Expenses1, 
									Expenses2   : Expenses2, 
									Expenses3   : Expenses3, 
									Expenses4   : Expenses4,
									Expenses_date1 : Expenses_date1,
									Expenses_date2 : Expenses_date2,
									Expenses_date3 : Expenses_date3,
									//Expenses_date4 : Expenses_date4,
									remark_Expenses4 : remark_Expenses4,
									total 		: total,
									file1 		: file1,
									file2 		: file2,
									file3 		: file3,
									file4 		: file4,
									file5 		: file5,
									Orig1		: Orig1,
									Orig2		: Orig2,
									Orig3		: Orig3,
									Orig4		: Orig4,
									Orig5		: Orig5,
									check_doc	: 3,
									total		: total,
									username 	: username,
									chk_authen	: chk_authen,
									to 			: to ,
									chk_update  : chk_update
									};

						DoJSON(data,api_link).then(function (info) {
							if(info != false){
								setTimeout(function () {
								    swal({
									  title: "สำเร็จ",
									  text: "บันทึกข้อมูลสำเร็จ",
									  type: "success",
									  timer: 1000,
									  showCancelButton: false,
									  showConfirmButton: false
									});
								  }, 2000);
								chk_update = info.chk;
								id_allowance = info.detail.id_allowance
								
							}else{ 
								setTimeout(function () {
								swal({
										title: "ไม่สำเร็จ",
										text: "ไม่สามารถขอเลขได้กรุณาลองใหม่อีกครั้ง",
										type: "error"
									},
									function(){
										//reload();
									});
								  }, 2000);
							}
						});		  
					});
				}else{
						$('#alert_error').html('********กรุณากรอกข้อมูลให้ครบถ้วน********').css('color', 'red');
				}	
		}

		function dusubmit_saveANDsend(){
			
			    var chk 		= true;
				var ref_saraban = $('#field-0').val();
				var topic 		= $('#field-1').val();
				var total 		= $('#field-2').val();
				var date 		= $('#field-4').val();
				var to 			= $('#field-3').val();
				var detail1 	= $('#detail_1').val();
				var detail2 	= $('#detail_2').val();
				var footer		= $('#field-5').val();
				var Reason 		= "";
				var budget	    = "";
				var budget_datail= $('#field-6').val();
				var file1 		= "";
				var file2 		= "";
				var file3 		= "";
				var file4 		= "";
				var file5 		= "";
				var Orig1		= "";
				var Orig2		= "";
				var Orig3		= "";
				var Orig4		= "";
				var Orig5		= "";
				var Expenses_date1  = $('#Expenses_date1').val();
				var Expenses_date2  = $('#Expenses_date2').val();
				var Expenses_date3  = $('#Expenses_date3').val();
				//var Expenses_date4  = $('#Expenses_date4').val();
				var Expenses1  = $('#Expenses1').val();
				var Expenses2  = $('#Expenses2').val();
				var Expenses3  = $('#Expenses3').val();
				var Expenses4  = $('#Expenses4').val();
				var remark_Expenses4 = $('#remark_Expenses4').val();


				var radios1 = document.getElementsByName('radio1');

					for (var i = 0, length = radios1.length; i < length; i++)
					{
					 if (radios1[i].checked)
					 {
					  // do whatever you want with the checked radio
					 Reason = radios1[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

				var radios2 = document.getElementsByName('radio2');

					for (var i = 0, length = radios2.length; i < length; i++)
					{
					 if (radios2[i].checked)
					 {
					  // do whatever you want with the checked radio
					 budget = radios2[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}
				/*if(ref_saraban== "" ||ref_saraban == null){
						$('#field-0').addClass('validate-has-error');
						$('#field-0_error').html('กรุณาระบุเลขที่หนังสือขออนุมัติเดินทาง').css('color', 'red');
						chk = false;
				}*/
				if(topic== "" ||topic == null){
						$('#field-1').addClass('validate-has-error');
						$('#field-1_error').html('กรุณาระบุเรื่อง').css('color', 'red');
						chk = false;
				}
				if(detail1== "" ||detail1 == null){
						$('#detail_1').addClass('validate-has-error');
						$('#detail_1_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						chk = false;
				}
				if(detail2 == "" ||detail2 == null){
						$('#detail_2').addClass('validate-has-error');
						$('#detail_2_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						chk = false;
				}
				if(Reason== "" ||Reason == null){
						//$('#field-0').addClass('validate-has-error');
						$('#radio1_error').html('กรุณาระบุเหตุผลการขออนุมัติ').css('color', 'red');
						chk = false;
				}

				if(budget== "" ||budget == null){
						//$('#field-0').addClass('validate-has-error');
						$('#radio2_error').html('กรุณาระบุประเภทการเบิก').css('color', 'red');
						chk = false;
				}
				
				if(to == "" ||to == null){
						$('#field-3').addClass('validate-has-error');
						$('#field-3_error').html('กรุณาระบุเรียน').css('color', 'red');	
						chk = false;
				}	

				if(date == "" ||date == null){
						$('#field-4').addClass('validate-has-error');
						$('#field-4_error').html('กรุณาระบุวันที่').css('color', 'red');	
						chk = false;
				}	

				/*if(budget == '1'){

					if(Expenses_date1 == "" ||Expenses_date1 == null){
						$('#Expenses_date1').addClass('validate-has-error');
						$('#Expenses_date1_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						console.log("test");
						chk = false;
					}	
					if(Expenses_date2 == "" ||Expenses_date2 == null){
						$('#Expenses_date2').addClass('validate-has-error');
						$('#Expenses_date2_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses_date3 == "" ||Expenses_date3 == null){
						$('#Expenses_date3').addClass('validate-has-error');
						$('#Expenses_date3_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses1 == "" ||Expenses1 == null){
						$('#Expenses1').addClass('validate-has-error');
						$('#Expenses1_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses2 == "" ||Expenses2 == null){
						$('#Expenses2').addClass('validate-has-error');
						$('#Expenses2_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses3 == "" ||Expenses3 == null){
						$('#Expenses3').addClass('validate-has-error');
						$('#Expenses3_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(total== "" || total == null){
						$('#field-2').addClass('validate-has-error');
						$('#field-2_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');
						chk = false;
					}
					
				}else*/if(budget == '3'){
					if(budget_datail== "" || budget_datail == null){
						$('#field-6').addClass('validate-has-error');
						$('#field-6_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						 Expenses_date1  = null;
						 Expenses_date2  = null;
						 Expenses_date3  = null;
						 Expenses1  = null;
						 Expenses2  = null;
						 Expenses3  = null;
						 Expenses4  = null;
						 remark_Expenses4 = null;
						 total = null;
						 chk = false;
					}
				}else if(budget == '2'){
					
					 Expenses_date1  = null;
					 Expenses_date2  = null;
					 Expenses_date3  = null;
					 Expenses1  = null;
					 Expenses2  = null;
					 Expenses3  = null;
					 Expenses4  = null;
					 total		= null;
					 remark_Expenses4 = null;
				
				}


					
					
				for (var x = 0; x < Listfile.length; x++) {
	              	if(x == 0){
	              		file1 = Listfile[x].file_name;
	              		Orig1 = Listfile[x].client_name;
	              	} 
	              	if(x == 1){
	              		file2 = Listfile[x].file_name;
	              		Orig2 = Listfile[x].client_name;
	              	} 
	              	if(x == 2){
	              		file3 = Listfile[x].file_name;
	              		Orig3 = Listfile[x].client_name;
	              	} 
	              	if(x == 3){
	              		file4 = Listfile[x].file_name;
	              		Orig4 = Listfile[x].client_name;
	              	} 
	              	if(x == 4){
	              		file5 = Listfile[x].file_name;
	              		Orig5 = Listfile[x].client_name;
	              	} 
	            }  

				if(chk == true){

					swal({
					  title: "ยืนยันการบันทึก",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					}, function () {
						var api_link = "<?php echo base_url(); ?>allowance/insert_allowance"; 
						var username = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance: id_allowance,
									ref_saraban : ref_saraban,
									topic		: topic,
									date        : date,
									detail1 	: detail1,
									detail2 	: detail2,
									Reason    	: Reason,
									footer		: footer,
									budget		: budget,
									budget_datail:budget_datail,
									Expenses1   : Expenses1, 
									Expenses2   : Expenses2, 
									Expenses3   : Expenses3, 
									Expenses4   : Expenses4,
									Expenses_date1 : Expenses_date1,
									Expenses_date2 : Expenses_date2,
									Expenses_date3 : Expenses_date3,
									//Expenses_date4 : Expenses_date4,
									remark_Expenses4 : remark_Expenses4,
									total 		: total,
									file1 		: file1,
									file2 		: file2,
									file3 		: file3,
									file4 		: file4,
									file5 		: file5,
									Orig1		: Orig1,
									Orig2		: Orig2,
									Orig3		: Orig3,
									Orig4		: Orig4,
									Orig5		: Orig5,
									check_doc	: 2,
									total		: total,
									username 	: username,
									chk_authen	: chk_authen,
									to 			: to ,
									chk_update  : chk_update
									};

						DoJSON(data,api_link).then(function (info) {
							if(info != false){

								setTimeout(function () {
										swal({
											  title: "สำเร็จ",
											  text: "บันทึกข้อมูลสำเร็จ",
											  type: "success",
											  timer: 1000,
											  showCancelButton: false,
											  showConfirmButton: false
											},
											function(){
												chk_update = info.chk;
												id_allowance = info.detail.id_allowance;
												window.location.href ='<?php echo base_url(); ?>allowance/index';
											});
										}, 2000);
												
							}else{ 
								setTimeout(function () {
								swal({
										title: "ไม่สำเร็จ",
										text: "ไม่สามารถขอเลขได้กรุณาลองใหม่อีกครั้ง",
										type: "error"
									},
									function(){
										//reload();
									});
								  }, 2000);
							}
						});	
					});		  
				}else{
						$('#alert_error').html('********กรุณากรอกข้อมูลให้ครบถ้วน********').css('color', 'red');
				}	
		}

		function Preview(){

			console.log(chk_update)

			    var chk 		= true;
				var ref_saraban = $('#field-0').val();
				var topic 		= $('#field-1').val();
				var total 		= $('#field-2').val();
				var date 		= $('#field-4').val();
				var to 			= $('#field-3').val();
				var detail1 	= $('#detail_1').val();
				var detail2 	= $('#detail_2').val();
				var footer		= $('#field-5').val();
				var Reason 		= "";
				var budget	    = "";
				var budget_datail= $('#field-6').val();
				var file1 		= "";
				var file2 		= "";
				var file3 		= "";
				var file4 		= "";
				var file5 		= "";
				var Orig1		= "";
				var Orig2		= "";
				var Orig3		= "";
				var Orig4		= "";
				var Orig5		= "";
				var Expenses_date1  = $('#Expenses_date1').val();
				var Expenses_date2  = $('#Expenses_date2').val();
				var Expenses_date3  = $('#Expenses_date3').val();
				//var Expenses_date4  = $('#Expenses_date4').val();
				var Expenses1  = $('#Expenses1').val();
				var Expenses2  = $('#Expenses2').val();
				var Expenses3  = $('#Expenses3').val();
				var Expenses4  = $('#Expenses4').val();
				var remark_Expenses4 = $('#remark_Expenses4').val();


				var radios1 = document.getElementsByName('radio1');

					for (var i = 0, length = radios1.length; i < length; i++)
					{
					 if (radios1[i].checked)
					 {
					  // do whatever you want with the checked radio
					 Reason = radios1[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

				var radios2 = document.getElementsByName('radio2');

					for (var i = 0, length = radios2.length; i < length; i++)
					{
					 if (radios2[i].checked)
					 {
					  // do whatever you want with the checked radio
					 budget = radios2[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}
				/*if(ref_saraban== "" ||ref_saraban == null){
						$('#field-0').addClass('validate-has-error');
						$('#field-0_error').html('กรุณาระบุเลขที่หนังสือขออนุมัติเดินทาง').css('color', 'red');
						chk = false;
				}*/

				if(topic== "" ||topic == null){
						$('#field-1').addClass('validate-has-error');
						$('#field-1_error').html('กรุณาระบุเรื่อง').css('color', 'red');
						chk = false;
				}
				if(detail1== "" ||detail1 == null){
						$('#detail_1').addClass('validate-has-error');
						$('#detail_1_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						chk = false;
				}
				if(detail2 == "" ||detail2 == null){
						$('#detail_2').addClass('validate-has-error');
						$('#detail_2_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						chk = false;
				}
				if(Reason== "" ||Reason == null){
						//$('#field-0').addClass('validate-has-error');
						$('#radio1_error').html('กรุณาระบุเหตุผลการขออนุมัติ').css('color', 'red');
						chk = false;
				}

				if(budget== "" ||budget == null){
						//$('#field-0').addClass('validate-has-error');
						$('#radio2_error').html('กรุณาระบุประเภทการเบิก').css('color', 'red');
						chk = false;
				}
				
				if(to == "" ||to == null){
						$('#field-3').addClass('validate-has-error');
						$('#field-3_error').html('กรุณาระบุเรียน').css('color', 'red');	
						chk = false;
				}	

				if(date == "" ||date == null){
						$('#field-4').addClass('validate-has-error');
						$('#field-4_error').html('กรุณาระบุวีนที่').css('color', 'red');	
						chk = false;
				}	

				/*if(budget == '1'){

					if(Expenses_date1 == "" ||Expenses_date1 == null){
						$('#Expenses_date1').addClass('validate-has-error');
						$('#Expenses_date1_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						console.log("test");
						chk = false;
					}	
					if(Expenses_date2 == "" ||Expenses_date2 == null){
						$('#Expenses_date2').addClass('validate-has-error');
						$('#Expenses_date2_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses_date3 == "" ||Expenses_date3 == null){
						$('#Expenses_date3').addClass('validate-has-error');
						$('#Expenses_date3_error').html('กรุณาระบุจำนวนวัน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses1 == "" ||Expenses1 == null){
						$('#Expenses1').addClass('validate-has-error');
						$('#Expenses1_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses2 == "" ||Expenses2 == null){
						$('#Expenses2').addClass('validate-has-error');
						$('#Expenses2_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(Expenses3 == "" ||Expenses3 == null){
						$('#Expenses3').addClass('validate-has-error');
						$('#Expenses3_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');	
						chk = false;
					}	
					if(total== "" || total == null){
						$('#field-2').addClass('validate-has-error');
						$('#field-2_error').html('กรุณาระบุจำนวนเงิน').css('color', 'red');
						chk = false;
					}
					
				}else*/if(budget == '3'){
					if(budget_datail== "" || budget_datail == null){
						$('#field-6').addClass('validate-has-error');
						$('#field-6_error').html('กรุณาระบุรายละเอียด').css('color', 'red');
						 Expenses_date1  = null;
						 Expenses_date2  = null;
						 Expenses_date3  = null;
						 Expenses1  = null;
						 Expenses2  = null;
						 Expenses3  = null;
						 Expenses4  = null;
						 remark_Expenses4 = null;
						 total = null;
						 chk = false;
					}
				}else if(budget == '2'){
					
					 Expenses_date1  = null;
					 Expenses_date2  = null;
					 Expenses_date3  = null;
					 Expenses1  = null;
					 Expenses2  = null;
					 Expenses3  = null;
					 Expenses4  = null;
					 total		= null;
					 remark_Expenses4 = null;
				
				}

					
				for (var x = 0; x < Listfile.length; x++) {
	              	if(x == 0){
	              		file1 = Listfile[x].file_name;
	              		Orig1 = Listfile[x].client_name;
	              	} 
	              	if(x == 1){
	              		file2 = Listfile[x].file_name;
	              		Orig2 = Listfile[x].client_name;
	              	} 
	              	if(x == 2){
	              		file3 = Listfile[x].file_name;
	              		Orig3 = Listfile[x].client_name;
	              	} 
	              	if(x == 3){
	              		file4 = Listfile[x].file_name;
	              		Orig4 = Listfile[x].client_name;
	              	} 
	              	if(x == 4){
	              		file5 = Listfile[x].file_name;
	              		Orig5 = Listfile[x].client_name;
	              	} 
	            }  

				if(chk == true){

					swal({
					  title: "ยืนยันการบันทึก",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					}, function () {
						var api_link = "<?php echo base_url(); ?>allowance/insert_allowance"; 
						var username = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance: id_allowance,
									ref_saraban : ref_saraban,
									topic		: topic,
									date        : date,
									detail1 	: detail1,
									detail2 	: detail2,
									Reason    	: Reason,
									footer		: footer,
									budget		: budget,
									budget_datail:budget_datail,
									Expenses1   : Expenses1, 
									Expenses2   : Expenses2, 
									Expenses3   : Expenses3, 
									Expenses4   : Expenses4,
									Expenses_date1 : Expenses_date1,
									Expenses_date2 : Expenses_date2,
									Expenses_date3 : Expenses_date3,
									//Expenses_date4 : Expenses_date4,
									remark_Expenses4 : remark_Expenses4,
									total 		: total,
									file1 		: file1,
									file2 		: file2,
									file3 		: file3,
									file4 		: file4,
									file5 		: file5,
									Orig1		: Orig1,
									Orig2		: Orig2,
									Orig3		: Orig3,
									Orig4		: Orig4,
									Orig5		: Orig5,
									check_doc	: 3,
									total		: total,
									username 	: username,
									chk_authen	: chk_authen,
									to 			: to ,
									chk_update  : chk_update
									};

						DoJSON(data,api_link).then(function (info) {
							if(info != false){
								setTimeout(function () {
								    swal({
										 title: "สำเร็จ",
									  text: "บันทึกข้อมูลสำเร็จ",
									  type: "success",
									  timer: 1000,
									  showCancelButton: false,
									  showConfirmButton: false
									});
									chk_update = info.chk;
										id_allowance = info.detail.id_allowance
										window.open("<?php echo base_url(); ?>Printer_controller/Preview?id_allownace="+id_allowance);
								  }, 2000);
								
							}else{ 
								setTimeout(function () {
								swal({
										title: "ไม่สำเร็จ",
										text: "ไม่สามารถขอเลขได้กรุณาลองใหม่อีกครั้ง",
										type: "error"
									},
									function(){
										//reload();
									});
								  }, 2000);
							}
						});		  
					});
				}else{
						$('#alert_error').html('********กรุณากรอกข้อมูลให้ครบถ้วน********').css('color', 'red');
				}
		}

		function total(){

			    var Expenses1  = $('#Expenses1').val();
				var Expenses2  = $('#Expenses2').val();
				var Expenses3  = $('#Expenses3').val();
				var Expenses4  = $('#Expenses4').val();

				if(Expenses1 == null || Expenses1 == ""){
					Expenses1 = 0;
				}
				if(Expenses2 == null || Expenses2 == ""){
					Expenses2 = 0;
				}
				if(Expenses3 == null || Expenses3 == ""){
					Expenses3 = 0;
				}
				if(Expenses4 == null || Expenses4 == ""){
					Expenses4 = 0;
				}

				var total =	parseFloat(Expenses1) + parseFloat(Expenses2) + parseFloat(Expenses3) + parseFloat(Expenses4);

			 	$('#field-2').val(total);

		}

		//***********************************FILE UPLOAD***************************************//
		var  Listfile = [];	 
		$('#upload').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file-input-wrapper input[type=file]');
            var i = 0;
            var testchk = true;
            console.log(fileInputs);
            $.each(fileInputs, function(i,fileInput){
                if( fileInput.files.length > 0 ){

                    $.each(fileInput.files, function(k,file){
                        formData.append('file', file);
                        formData.append('id_saraban', '0001');
                        formData.append('id_user', '0001');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                                console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                         $("#view1").removeClass("hidden");
                                         $("#delete1").removeClass("hidden");
                                         $("#remove1").addClass("hidden");
                                         $("#upload1").addClass("hidden");
                                          $("#file1").addClass("hidden");
                                           $("#encrypt1").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                    
                                 }else
                                 if(i == 1){
                                    if(testchk == true){
                                         $("#view2").removeClass("hidden");
                                         $("#delete2").removeClass("hidden");
                                         $("#remove2").addClass("hidden");
                                         $("#upload2").addClass("hidden");
                                          $("#file2").addClass("hidden");
                                           $("#encrypt2").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                 }else
                                 if(i == 2){
                                    if(testchk == true){
                                         $("#view3").removeClass("hidden");
                                         $("#delete3").removeClass("hidden");
                                         $("#remove3").addClass("hidden");
                                         $("#upload3").addClass("hidden");
                                          $("#file3").addClass("hidden");
                                           $("#encrypt3").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                 }else
                                 if(i == 3){
                                    if(testchk == true){
                                         $("#view4").removeClass("hidden");
                                         $("#delete4").removeClass("hidden");
                                         $("#remove4").addClass("hidden");
                                         $("#upload4").addClass("hidden");
                                          $("#file4").addClass("hidden");
                                           $("#encrypt4").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                 }else
                                 if(i == 4){
                                    if(testchk == true){
                                         $("#view5").removeClass("hidden");
                                         $("#delete5").removeClass("hidden");
                                         $("#remove5").addClass("hidden");
                                         $("#upload5").addClass("hidden");
                                          $("#file5").addClass("hidden");
                                           $("#encrypt5").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                 }

                            }
                        });

                    });
                }
            });  
        });

        $('#upload1').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
                    var input = document.getElementById('file1');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        formData.append('id_saraban', '0001');
                        formData.append('id_user', '0001');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                            	//console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                         $("#view1").removeClass("hidden");
                                         $("#delete1").removeClass("hidden");
                                         $("#remove1").addClass("hidden");
                                         $("#upload1").addClass("hidden");
                                          $("#file1").addClass("hidden");
                                         $("#encrypt1").val(response.defail['file_name']);
                                         var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                    
                                 }

                            }
                        });
                     }
                    // console.log(Listfile);
        });

        $('#upload2').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
                    var input = document.getElementById('file2');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        formData.append('id_saraban', '0001');
                        formData.append('id_user', '0001');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                                console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                       $("#view2").removeClass("hidden");
                                         $("#delete2").removeClass("hidden");
                                         $("#remove2").addClass("hidden");
                                         $("#upload2").addClass("hidden");
                                         $("#file2").addClass("hidden");
                                         $("#encrypt2").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                    
                                 }

                            }
                        });
                     }
        });

        $('#upload3').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
                    var input = document.getElementById('file3');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        formData.append('id_saraban', '0001');
                        formData.append('id_user', '0001');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                                console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                       $("#view3").removeClass("hidden");
                                         $("#delete3").removeClass("hidden");
                                         $("#remove3").addClass("hidden");
                                         $("#upload3").addClass("hidden");
                                         $("#file3").addClass("hidden");
                                         $("#encrypt3").val(response.defail['file_name']);
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                    
                                 }

                            }
                        });
                     }
        });

		$('#upload4').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
                    var input = document.getElementById('file4');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        formData.append('id_saraban', '0001');
                        formData.append('id_user', '0001');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                                console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                       $("#view4").removeClass("hidden");
                                         $("#delete4").removeClass("hidden");
                                         $("#remove4").addClass("hidden");
                                         $("#upload4").addClass("hidden");
                                         $("#file4").addClass("hidden");
                                         $("#encrypt4").val(response.defail['file_name']);

                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                    
                                 }

                            }
                        });
                     }
        });

		$('#upload5').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
                    var input = document.getElementById('file5');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        formData.append('id_saraban', '0001');
                        formData.append('id_user', '0001');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                                console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                       $("#view5").removeClass("hidden");
                                         $("#delete5").removeClass("hidden");
                                         $("#remove5").addClass("hidden");
                                         $("#upload5").addClass("hidden");
                                         $("#file5").addClass("hidden");
                                         $("#encrypt5").val(response.defail['file_name']);
                                         
                                          var dataObj = {
														file_name	: response.defail['file_name'],
														client_name : response.defail['client_name'],
														full_path 	: response.defail['full_path']
														
														}                
										Listfile.push(dataObj);
                                    }else{
                                        alert(response);
                                    }
                                    i++;
                                    
                                 }

                            }
                        });
                     }
        });


	function newTabImage(num) {
             console.log(Listfile)
            var encrypt =  $("#encrypt"+num).val();
            var filename ="";
            for (var x = 0; x < Listfile.length; x++) {
              	if(encrypt == Listfile[x].file_name){
              		filename = Listfile[x].file_name;
              	} 
            }  

            console.log(filename);

            window.open('<?php echo base_url(); ?>uploadfile/'+filename,'_blank');
    }

    function chkconfig(num){
         var FileSize = "";
         var filename = "";
            //get the input and UL list
            var input = document.getElementById('file'+num);
            for (var x = 0; x < input.files.length; x++) {
                FileSize = input.files[x].size;
                filename = input.files[x].name;

                console.log(FileSize);
            if (FileSize > 2024000) {
             	alert('File size exceeds 2 MB');
            	do_remove(num);
            }else{

            	 $("#remove"+num).removeClass("hidden");
                 $("#upload"+num).removeClass("hidden");
                  $("#namefile"+num).empty();
                 $("#namefile"+num).append(filename);
                
            } 
                
            }
             
    }

    function do_remove(num){
        $("#file"+num).val(null);
        $("#namefile"+num).empty();
        $("#remove"+num).addClass("hidden");
        $("#upload"+num).addClass("hidden");

    }

    function do_delete(num){

       var encrypt =  $("#encrypt"+num).val();
       var filename ="";
            for (var x = 0; x < Listfile.length; x++) {
              	if(encrypt == Listfile[x].file_name){
              		filename = Listfile[x].file_name;
              		delete Listfile[x];
					Listfile.splice(x,1);
              	} 
            }  
        // AJAX request
          $.ajax({
               url:"<?php echo base_url(); ?>Upload_Controller/remove",
               type: 'post',
               data: {filename: filename},
               success: function(response){
                    // Changing image source when remove
                    if(response == 1){
                        do_remove(num);
                        $("#view"+num).addClass("hidden");
                        $("#delete"+num).addClass("hidden");
                        $("#file"+num).removeClass("hidden");
                    }
               }
          });
    }

     function doclose(){
     	swal({
		  title: "ยืนยันการปิด",
		  text: "ท่านทำการบันทึก หรือ ยืนยัน&ส่งข้อมลูม เรียบร้อยแล้ว\n ใช่หรือไม่?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes",
		  closeOnConfirm: false
		},
		function(){
		 window.location.href ='<?php echo base_url(); ?>allowance/index';
		});
	    	
	}
	</script>

</body>
</html>
<?php /*if($career_id == '4'){ 
	  
	$url3 = 'Printer_controller/Preview2';  }

 if($career_id == '5'){ 
	  
	$url3 = 'Printer_controller/Preview'; }  echo '....'.$url3;*/
foreach($documentData->result() as $documentData2){ }
//echo 'num-row'.$documentData->num_rows();
//echo 'check_doc....'.$documentData2->check_doc." ".$documentData2->check_doc2;
//echo $this->uri->segment(4).$this->uri->segment(5);

$checkURI = $this->uri->segment(2);
?>

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

	<script src="<?php echo base_url(); ?>assets_saraban/js/jquery.inputmask.bundle.js"></script>

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
	<!--<script src="<?php //echo base_url(); ?>assets_saraban/js/bootstrap-datepicker.js"></script>
	<script src="<?php //echo base_url(); ?>assets_saraban/js/moment.min.js"></script>-->

<?php if(($documentData2->check_doc != '3') && ($documentData2->check_doc != '0') && ($checkURI != 'create_local') && ($checkURI != 'local_withdraw')){ ?>
<script>
		$(document).ready(function(){
			$('.input-data').attr('readonly', true);
			$('select.input-data').attr('disabled', true); 
			$('input[type="checkbox"]').attr('disabled', true);			
			$('.entypo-plus-squared , .glyphicon-trash').remove();
		})
</script>
<?php } ?>

<script>
    <?php if(($documentData2->check_doc == '3') || ($documentData2->check_doc == '0') && ($checkURI != 'create_local') && ($checkURI != 'local_withdraw')){ ?>
        $(document).ready(function(){
    $("input,select").change(function(){
  $('#textchange').val('1');
});

})
    <?php }?>


		var chk_update   = false;
		var id_allowance = "";	
	
		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }
		////////////////////////////////////////////////////////////////
	
		function DoJSON(data, api_link){
			return new Promise(function (resolve, reject){
				$.ajax({
					url: api_link,
					data: data,
					type: "POST",
					cache: false,
					dataType: 'json', //หรือ json หรือ xml
					success: function (info) {
						resolve(info);
					},
					error: function (jqXHR, exception) {
				        var msg = '';
				        if(jqXHR.status === 0){
				            msg = 'Not connect.\n Verify Network.';
				        } else if (jqXHR.status == 404) {
				            msg = 'Requested page not found. [404]';
				        } else if (jqXHR.status == 500) {
				            msg = 'Internal Server Error [500].';
				        } else if (exception === 'parsererror') {
				            msg = 'Requested JSON parse failed.';
				        } else if (exception === 'timeout') {
				            msg = 'Time out error.';
				        } else if (exception === 'abort') {
				            msg = 'Ajax request aborted.';
				        } else {
				            msg = 'Uncaught Error.\n' + jqXHR.responseText;
				        }
				        alert("ERROR : DoJSON() " + msg);
				    },
				});
			});
		}
		////////////////////////////////////////////////////////////////

		function dusubmit_save(){
			
			    var chk 		= true;
				var topic 		= $('#field-1').val();
				var date 		= $('#field-4').val();
				var to 			= $('#field-3').val();
				var detail1 	= $('#detail_1').val();
				var detail2 	= $('#detail_2').val();
				var footer		= $('#field-5').val();
				var Reason 		= "";
				var budget	    = "";
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


				var radios1 = document.getElementsByName('radio1');

					for (var i = 0, length = radios1.length; i < length; i++){
					 if (radios1[i].checked)
					 {
					  // do whatever you want with the checked radio
					 Reason = radios1[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

				var radios2 = document.getElementsByName('radio2');

					for (var i = 0, length = radios2.length; i < length; i++){
					 if (radios2[i].checked)
					 {
					  // do whatever you want with the checked radio
					 budget = radios2[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

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
				
				for(var x = 0; x < Listfile.length; x++){
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
						var api_link = "<?php echo base_url(); ?>allowance/insert2_allowance"; 
						var username = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance: id_allowance,
									topic		: topic,
									date        : date,
									detail1 	: detail1,
									detail2 	: detail2,
									Reason    	: Reason,
									footer		: footer,
									budget		: budget,
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
		////////////////////////////////////////////////////////////////

		function dusubmit_saveANDsend(){
			
			swal({
									  title: "สำเร็จ",
									  text: "บันทึกข้อมูลและส่งข้อมูลสำเร็จ",
									  type: "success",
									  timer: 1000,
									  showCancelButton: false,
									  showConfirmButton: false
									});
							setTimeout(function () {		
										window.location.href ='<?php echo base_url();?>allowance/index';
								  }, 2000);
			
			   /* var chk 		= true;
				var topic 		= $('#field-1').val();
				var date 		= $('#field-4').val();
				var to 			= $('#field-3').val();
				var detail1 	= $('#detail_1').val();
				var detail2 	= $('#detail_2').val();
				var footer		= $('#field-5').val();
				var Reason 		= "";
				var budget	    = "";
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
						var api_link = "<?php //echo base_url(); ?>allowance/insert2_allowance"; 
						var username = '<?php //echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php //echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance: id_allowance,
									topic		: topic,
									date        : date,
									detail1 	: detail1,
									detail2 	: detail2,
									Reason    	: Reason,
									footer		: footer,
									budget		: budget,
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
												window.location.href ='<?php //echo base_url(); ?>allowance/index';
											});
									}, 2000);
												
							}else{ 
								setTimeout(function () {
								swal({
										title: "ไม่สำเร็จ",
										text: "ไม่สามารถบันทึกได้กรุณาลองใหม่อีกครั้ง",
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
				}	*/
		}
		////////////////////////////////////////////////////////////////

		/*function Preview(){  ///////////  original ****

			console.log(chk_update);

			    var chk 		= true;
				var topic 		= $('#field-1').val();
				var date 		= $('#field-4').val();
				var to 			= $('#field-3').val();
				var detail1 	= $('#detail_1').val();
				var detail2 	= $('#detail_2').val();
				var footer		= $('#field-5').val();
				var Reason 		= "";
				var budget	    = "";
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

				var radios1 = document.getElementsByName('radio1');

					for(var i = 0, length = radios1.length; i < length; i++){
					 if(radios1[i].checked){
					  // do whatever you want with the checked radio
					 Reason = radios1[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

				var radios2 = document.getElementsByName('radio2');

					for(var i = 0, length = radios2.length; i < length; i++){
					 if(radios2[i].checked){
					  // do whatever you want with the checked radio
					 budget = radios2[i].value

					  // only one radio can be logically checked, don't check the rest
					  break;
					 }
					}

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
					
				for(var x = 0; x < Listfile.length; x++){
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
						var api_link = "<?php //echo base_url(); ?>allowance/insert2_allowance"; 
						var username = '<?php //echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php //echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance: id_allowance,
									//id_saraban 	: id_saraban,
									topic		: topic,
									date        : date,
									detail1 	: detail1,
									detail2 	: detail2,
									Reason    	: Reason,
									footer		: footer,
									budget		: budget,
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
										window.open("<?php //echo base_url(); ?>Printer_controller/Preview?id_allownace="+id_allowance);
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
		}*/
		////////////////////////////////////////////////////////////////

		function PreviewTT(){
			
			var pp = $('#w22').val();

			var xx = '<?php echo base_url();?>'+pp;

					/*swal({
					  title: "ยืนยันการบันทึก",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					})*/
								    /*swal({
									  title: "สำเร็จ",
									  text: "บันทึกข้อมูลสำเร็จ",
									  type: "success",
									  timer: 1000,
									  showCancelButton: false,
									  showConfirmButton: false
									});*/
								
			
		//	setTimeout(function () {
								    swal({
									  title: "สำเร็จ",
									  text: "บันทึกข้อมูลสำเร็จ",
									  type: "success",
									  timer: 2000,
									  showCancelButton: false,
									  showConfirmButton: false
									});
							setTimeout(function () {		
										window.open(xx);
								  }, 3000);
										
								  
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
                if(fileInput.files.length > 0){

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
                                         //$("#view1").removeClass("hidden");
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
                                    
                                 } else if(i == 1){
                                    if(testchk == true){
                                         //$("#view2").removeClass("hidden");
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
                                 } else if(i == 2){
                                    if(testchk == true){
                                         //$("#view3").removeClass("hidden");
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
                                         //$("#view4").removeClass("hidden");
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
                                         //$("#view5").removeClass("hidden");
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
		////////////////////////////////////////////////////////////////

        $('#upload1').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
            var dataID = '<?php echo $this->uri->segment(5)?>';			
			
                    var input = document.getElementById('file1');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        //formData.append('id_saraban', '0001');
                        //formData.append('id_user', '0001');
                        formData.append('dataID', dataID);
                        formData.append('number2', '1');
                        formData.append('chk2', '1');
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
                                         //$("#view1").removeClass("hidden");
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
		////////////////////////////////////////////////////////////////

        $('#upload2').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
			var dataID = '<?php echo $this->uri->segment(5)?>';
			
                    var input = document.getElementById('file2');
                    for (var x = 0; x < input.files.length; x++) {    
                        formData.append('file', input.files[x]);
                        //formData.append('id_saraban', '0001');
                        //formData.append('id_user', '0001');
                        formData.append('dataID', dataID);
                        formData.append('number2', '2');
                        formData.append('chk2', '1');
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
                                       	 //$("#view2").removeClass("hidden");
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
		////////////////////////////////////////////////////////////////

        $('#upload3').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
			var dataID = '<?php echo $this->uri->segment(5)?>';
			
                    var input = document.getElementById('file3');
                    for(var x = 0; x < input.files.length; x++){    
                        formData.append('file', input.files[x]);
                        //formData.append('id_saraban', '0001');
                        //formData.append('id_user', '0001');
                        formData.append('dataID', dataID);
                        formData.append('number2', '3');
                        formData.append('chk2', '1');
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
                                       //$("#view3").removeClass("hidden");
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
		////////////////////////////////////////////////////////////////

		$('#upload4').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
			var dataID = '<?php echo $this->uri->segment(5)?>';
			
                    var input = document.getElementById('file4');
                    for(var x = 0; x < input.files.length; x++){    
                        formData.append('file', input.files[x]);
                        //formData.append('id_saraban', '0001');
                        //formData.append('id_user', '0001');
                        formData.append('dataID', dataID);
                        formData.append('number2', '4');
                        formData.append('chk2', '1');
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
                                       //$("#view4").removeClass("hidden");
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
		////////////////////////////////////////////////////////////////

		$('#upload5').on('click', function(){
            var formData = new FormData();
            var fileInputs = $('.file_input');
            var i = 0;
            var testchk = true;
			var dataID = '<?php echo $this->uri->segment(5)?>';
			
                    var input = document.getElementById('file5');
                    for(var x = 0; x < input.files.length; x++){    
                        formData.append('file', input.files[x]);
                        //formData.append('id_saraban', '0001');
                        //formData.append('id_user', '0001');
                        formData.append('dataID', dataID);
                        formData.append('number2', '5');
                        formData.append('chk2', '1');
                         $.ajax({
                            method: 'post',
                            url:"<?php echo base_url(); ?>Upload_Controller/process",
                            data: formData,
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            success: function(response){
                              //  console.log(response);
                                testchk = response.chk;
                                if(i == 0){
                                    if(testchk == true){
                                       //$("#view5").removeClass("hidden");
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
		////////////////////////////////////////////////////////////////

		function newTabImage(num){
             console.log(Listfile)
            var encrypt =  $("#encrypt"+num).val();
            var filename ="";
            for(var x = 0; x < Listfile.length; x++){
              	if(encrypt == Listfile[x].file_name){
              		filename = Listfile[x].file_name;
              	} 
            }  

            console.log(filename);

            window.open('<?php echo base_url(); ?>uploadfile/'+filename,'_blank');
    	}
		////////////////////////////////////////////////////////////////

    	function chkconfig(num){
         var FileSize = "";
         var filename = "";
            //get the input and UL list
            var input = document.getElementById('file'+num);
            for(var x = 0; x < input.files.length; x++){
                FileSize = input.files[x].size;
                filename = input.files[x].name;

                console.log(FileSize);
            if(FileSize > 2024000){
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
		////////////////////////////////////////////////////////////////

		function do_remove(num){
			$("#file"+num).val(null);
			$("#namefile"+num).empty();
			$("#remove"+num).addClass("hidden");
			$("#upload"+num).addClass("hidden");

		}
		////////////////////////////////////////////////////////////////

		function do_delete(num){

		   var filename = $("#encrypt"+num).val();
		 
			// AJAX request
			  $.ajax({
				   url:"<?php echo base_url();?>Upload_Controller/remove",
				   type: 'post',
				   data: {filename: filename},
				   success: function(response){
						// Changing image source when remove
						if(response == 1){
							do_remove(num);
							//$("#view"+num).addClass("hidden");
							$("#delete"+num).addClass("hidden");
							$("#file"+num).removeClass("hidden");
						}
				   }
			  });
		}
		////////////////////////////////////////////////////////////////

		function doclose(){
			swal({
			  title: "ยืนยันการปิด",
			  text: "ท่านทำการบันทึก หรือ ยืนยัน&ส่งข้อมลูม เรียบร้อยแล้ว ใช่หรือไม่?",
			  type: "warning",
			  showCancelButton: true,
			  confirmButtonClass: "btn-danger",
			  confirmButtonText: "Yes",
			  closeOnConfirm: false
			},
			function(){
				window.location.href ='<?php echo base_url();?>allowance/index';
		   });
		}
		////////////////////////////////////////////////////////////////
	
		function showSpan(valCheck){			
			  
			if(valCheck == true){
			   $('#doCH').show();
			   $('#notCH').hide();
			}			
			if(valCheck == false){
			   $('#notCH').show();
			   $('#doCH').hide();
			}			
		}
		////////////////////////////////////////////////////////////////
	
		function countDays(){	
			
			var daystart = $('#daystart').val();			  
			var monthstart = $('#monthstart').val();			  
			var yearstart = $('#yearstart').val();
                        var startDate = monthstart+'/'+daystart+'/'+yearstart;
                        var dayend = $('#dayend').val();			  
			var monthend = $('#monthend').val();			  
			var yearend = $('#yearend').val();
			var endDate = monthend+'/'+dayend+'/'+yearend;		
			
			startDate = new Date(startDate);
			endDate = new Date(endDate);
			var days = (endDate - startDate) / 1000 / 60 / 60 / 24;			
			$('#numDay').text(days);			
		}
		////////////////////////////////////////////////////////////////
	
		function set_chFor(val2,type){	
			
			if(type == '1'){
				$('#chFor').val(val2);	
			}
			if(type == '2'){
				$('#money').val(val2);	
			}
			if(type == '3'){
				$('#chReason').val(val2);	
			}				
		}
		////////////////////////////////////////////////////////////////
	
		function select_outbound(){				//1คนเดียว 2 คณะ  1เบิก  0ไม่เบิก
			
			var check2 = $('input:radio:checked').length; 
			var chFor = $('#chFor').val();			
			var chReason = $('#chReason').val();	
			var money = $('#money').val();	
			
			if(check2 ==3){
			   
				if((chFor == '1') && (money == '1')){				   
				   window.location.href ='<?php echo base_url();?>Allowance/outbound_withdraw/'+chFor+'/'+chReason;
				
				} else if((chFor == '1') && (money == '0')){				   
				   window.location.href ='<?php echo base_url();?>Allowance/create_outbound';
				   
				} else if((chFor == '2') && (money == '1')){				   
				   window.location.href ='<?php echo base_url();?>Allowance/outboundGroup_withdraw/'+chFor+'/'+chReason;
				   
				} else if((chFor == '2') && (money == '0')){				   
				   window.location.href ='<?php echo base_url();?>Allowance/outboundGroup';
				}			
			   
			} else {
				
				swal({
				  title: "กรุณาเลือก !",
				  //text: "ท่านทำการบันทึก หรือ ยืนยัน&ส่งข้อมลูม เรียบร้อยแล้ว ใช่หรือไม่?",
				  type: "warning",
				  showCancelButton: true,
				  confirmButtonClass: "btn-danger",
				  confirmButtonText: "OK",
				  closeOnConfirm: false
				})				
			}						
	}
	//////////////////////////////////////////////////////////////
	
	function tr_career(career_id){ 
		
		if(career_id != ''){ 
			
		   var numGroup = $("#numGroup").val();
		   
		   $(".career_tr").clone().insertAfter(".tdheight");
		   $(".career_tr:eq(0)").removeClass("career_tr");
			
			
			
		   $(".position_tr").clone().insertAfter(".career_tr");
		   $(".position_tr:eq(0)").removeClass("position_tr");
			
			
		   $(".tdheight").clone().insertAfter(".position_tr");
		   $(".tdheight:eq(0)").removeClass("tdheight");			
		}		
	}
	//////////////////////////////////////////////////////////////
	
	function append_listName(){	
		
		var num_tr = parseInt($('#num_tr').val());
		var setID = num_tr+1;
			
		var html = '<tr class="trNamePerson position_tr"><td width="95" align="right">&nbsp;</td><td width="450" align="left"><input type="text" name="name[]" id="name'+setID+'" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"> <input type="hidden" name="career_id[]" id="career_id'+setID+'" value="" ></td><td width="300" align="left">ตำแหน่ง <select name="position_id[]" id="position_id'+setID+'" class="input-data slected88"></select></td><td width="241" align="left">ตำแหน่งเลขที่ <input type="text" name="position_number[]" id="position_number'+setID+'" placeholder="ระบุตำแหน่งเลขที่" class="input-data" style="width: 120px;"></td></tr>';		  
			
		$(html).insertAfter(".position_tr");
		$(".position_tr:eq(0)").removeClass("position_tr");
		$('#num_tr').val(setID);		
		//$('#position_id0').find('option').clone().appendTo('#position_id'+setID);		
		$('.slected88:eq(0)').find('option').clone().appendTo('#position_id'+setID);		
	}
	//////////////////////////////////////////////////////////////
	
	function add_listName(){	
	
		var countOldSelect = $('.slected88').length;
		var career = $("#select_career option:selected").text();
		var career_val = $("#select_career").val();
		var num_tr = parseInt($('#num_tr').val());
		var setID = num_tr+1;
		var num_group = parseInt($('#num_group').val());
		
		var txtClass = 'career'+career_val;
		
		$('#num_tr').val()
		$(".position_tr").removeClass("position_tr"); 	
		
		
		if($('tr').hasClass(txtClass)){
			
			var clone = $(".trNamePerson").clone();
			$(clone).insertAfter($('.'+txtClass).last());
			$(".entypo-plus-squared").remove();
			
			console.log('countOldSelect....'+countOldSelect);		

			var tt = countOldSelect - 1;

			for(var i=0;i<countOldSelect;i++){

				  console.log('....'+$('.slected88:eq('+i+')').val());

				  var x = $('.slected88:eq(0)').val();		

				  // $('.slected88:eq('+i+')').removeAttr('id'); 
				   $('.trNamePerson:eq(0)').remove();
				   $('.trNamePerson').addClass(txtClass);

				  if(num_group > 0){				  

					  var aa = num_tr - (tt-i);

				  } else {
					  var aa = i;
				  }		console.log('aa.....'+aa);	  

				 //$('#position_id'+i).val(x);  
				 $('#position_id'+aa).val(x);			 
				 $('#career_id'+aa).val(career_val);			 

				 // $('#position_id1:eq(0) select').val(5);

				// console.log('po.....'+ $('#position_id'+i+':eq(0)').val());
				 console.log('po.....'+ $('#position_id'+aa).val());
				// console.log('po.....'+ $('#position_id'+i).val());			  

				  console.log('num_group.....'+num_group);
				  console.log('num_tr.....'+num_tr);
				
				$("#select_career").val('');
				$('#num_tr').val(setID);

			}
			
			var cc = $('.slected88:eq(0)').find('option').clone();
			
			$(".slected88").removeClass("slected88");	
			$(".trNamePerson").removeClass("trNamePerson");			

			var html2 = '<tr class="trNamePerson position_tr"><td width="95" align="right"><i class="entypo-plus-squared" style="font-size: 13pt; cursor: pointer;" title="เพิ่มรายชื่อ" onClick="append_listName()"></i>&nbsp;&nbsp;</td><td width="450" align="left"><input type="text" name="name[]" id="name'+setID+'" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"> <input type="hidden" name="career_id[]" id="career_id'+setID+'" value="" ></td><td width="300" align="left">ตำแหน่ง <select name="position_id[]" id="position_id'+setID+'" class="input-data slected88"></select></td><td width="241" align="left">ตำแหน่งเลขที่ <input type="text" name="position_number[]" id="position_number'+setID+'" placeholder="ระบุตำแหน่งเลขที่" class="input-data" style="width: 120px;"></td></tr>';	

			$(html2).insertAfter(".career_tr2");	
			$(cc).appendTo('#position_id'+setID);			
			
		} else {			
			
			var html = '<tr class="career_tr"><td align="left" colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>'+career+'</strong></td><td align="left">&nbsp;</td><td align="left">&nbsp;</td></tr>';	$(html).insertAfter(".tdheight");		
		
			var clone = $(".trNamePerson").clone();
			//var cc = $('.slected88:eq(0)').find('option').clone();

			$(clone).insertAfter(".career_tr");	
			$(".entypo-plus-squared").remove();
			$(".career_tr").removeClass("career_tr");

			console.log('countOldSelect....'+countOldSelect);		

			var tt = countOldSelect - 1;

			  for(var i=0;i<countOldSelect;i++){

				  console.log('....'+$('.slected88:eq('+i+')').val());

				  var x = $('.slected88:eq(0)').val();		

				  // $('.slected88:eq('+i+')').removeAttr('id'); 
				   $('.trNamePerson:eq(0)').remove();
				   $('.trNamePerson').addClass(txtClass);

				  if(num_group > 0){				  

					  var aa = num_tr - (tt-i);

				  } else {
					  var aa = i;
				  }		console.log('aa.....'+aa);	  

				 //$('#position_id'+i).val(x);  
				 $('#position_id'+aa).val(x);
				 $('#career_id'+aa).val(career_val); 

				 // $('#position_id1:eq(0) select').val(5);

				// console.log('po.....'+ $('#position_id'+i+':eq(0)').val());
				 console.log('po.....'+ $('#position_id'+aa).val());
				// console.log('po.....'+ $('#position_id'+i).val());			  

				  console.log('num_group.....'+num_group);
				  console.log('num_tr.....'+num_tr);

			  }

			var cc = $('.slected88:eq(0)').find('option').clone();

			//$(".trNamePerson").remove();	


			//$(".trNamePerson").removeClass("trNamePerson");	

			var clone_tdheight = $(".tdheight").clone();
			$(".tdheight").removeClass("tdheight");
			$(clone_tdheight).insertAfter($('.trNamePerson').last());		

			$(".slected88").removeClass("slected88");	
			$(".trNamePerson").removeClass("trNamePerson");			

			var html2 = '<tr class="trNamePerson position_tr"><td width="95" align="right"><i class="entypo-plus-squared" style="font-size: 13pt; cursor: pointer;" title="เพิ่มรายชื่อ" onClick="append_listName()"></i>&nbsp;&nbsp;</td><td width="450" align="left"><input type="text" name="name[]" id="name'+setID+'" placeholder="ระบุชื่อผู้เดินทาง" class="input-data" style="width: 400px;"> <input type="hidden" name="career_id[]" id="career_id'+setID+'" value="" ></td><td width="300" align="left">ตำแหน่ง <select name="position_id[]" id="position_id'+setID+'" class="input-data slected88"></select></td><td width="241" align="left">ตำแหน่งเลขที่ <input type="text" name="position_number[]" id="position_number'+setID+'" placeholder="ระบุตำแหน่งเลขที่" class="input-data" style="width: 120px;"></td></tr>';	

			$(html2).insertAfter(".career_tr2");	
			$(cc).appendTo('#position_id'+setID);		

			$("#select_career").val('');
			$('#num_tr').val(setID);
			var num_group2 = num_group + 1;
			$('#num_group').val(num_group2);			
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
			//$('#Nallowance1_days').val(amount);
		//}	
		//if(amount3 >0){
		   calculate_totalPrice(amount3,type);
		//}		
	}
	//////////////////////////////////////////////////////////////
	
	function calculate_totalPrice(amount,type){		
		
		if(type == '1'){
		   
		   var fieldTotal = 'total_price2';
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
		})		
		$('#'+fieldTotal).val(totalPoints);	
		//sumAmount_toText();
		$('#txt_amount').text(totalPoints.toLocaleString());	
		$('#txt_amount').css('font-weight', 'bold');
	}	
	////////////////////////////////////////////////////////////
	function sumAmount_toText(){	
		
		var document_id = '<?php echo $this->uri->segment(5)?>';
		
		if(document_id == ''){
			
			var amount = $('#total_price2').val();
			var amount2 = $('#Ntotal_price2').val();   
		   
		} else {
			
			var amount = '0';
			var amount2 = '0';	
			var num_withdrawData = $('#num_withdrawData').val();
			var num_withdrawDataOut = $('#num_withdrawDataOut').val();
			
			if(num_withdrawDataOut > 0){
				
				amount = $('#total_price2').val();
			}
			if(num_withdrawData > 0){
				
				amount2 = $('#Ntotal_price2').val();
			}			
			
		}
		
		console.log('1 amount....'+amount);
		console.log('1 amount2....'+amount2);
		
		
		if(amount.indexOf(',') != -1){
			amount = amount.replace(",", "");
		}
		if(amount2.indexOf(',') != -1){
			amount2 = amount2.replace(",", "");
		}
		
		
		/*
		
		if((num_withdrawDataOut == '0') || (num_withdrawDataOut == '')){
		   
		   var amount = $('#total_price2').val(); console.log('1 amount....'+amount);
		   
		} else {
			
			
		}
		
		
		var amount2 = $('#Ntotal_price2').val();  console.log('1 amount2....'+amount2);*/
		
		/*if(amount == ''){
			amount = 0;
		} else {
			
			if(amount.indexOf(',') != -1){
				amount = amount.replace(",", "");
			}
		}*/ console.log('2 amount....'+amount);/*
		if(amount2 == ''){
			amount2 = 0;
		} else {
			
			if(amount2.indexOf(',') != -1){
				amount2 = amount2.replace(",", "");
			}
		}*/	console.log('2 amount2....'+amount2);	
		var amount3 = parseInt(amount) + parseInt(amount2);
		$('#txt_amount').text(amount3);	
		$('#txt_amount').css('font-weight', 'bold');		
	}
	////////////////////////////////////////////////////////////
	
	
	function check_vacation(check){	
		
		if(check == true){
			
			var postData = new FormData($("#frm1")[0]);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Allowance2/modal_listName')?>',
				processData: false,
				contentType: false,
				data : postData,
				success:function(data, status){
							
					$('#CHvacation').val('1');
					$('.hide_tr').show();
					$('#div_vacation').empty();
					$('#div_vacation').html(data);					
				}
			});
			
		} else {
			
			$('#CHvacation').val('0');
			$('.hide_tr').hide();
			$('#div_vacation').empty();			
		}	
	}
	//////////////////////////////////////////////////////////// 
	
	function check_vacation2(check,type){	
		
		if(check == true){
			
			$('#CHvacation').val('1');
			if(type != 'e'){			
			$('#date_office').val('');
			$('#date_office2').val('');
			$('#date_thailand').val('');
			$('#date_thailand2').val('');
			$('#date_vacation').val('');
			}			
			$('.hide_tr').show();
			//$('#div_vacation').empty();
			//$('#div_vacation').html(data);				
			
		} else {
			
			$('#CHvacation').val('0');
			if(type != 'e'){			
			$('#date_office').val('');
			$('#date_office2').val('');
			$('#date_thailand').val('');
			$('#date_thailand2').val('');
			$('#date_vacation').val('');
			}			
			$('.hide_tr').hide();
			//$('#div_vacation').empty();			
		}	
	}
	//////////////////////////////////////////////////////////// 
	
	function select_listName(check,type,field){
		
		var checkList = $('input.checkName:checkbox:checked').length; 
		
		if((type == '1') && (check == true)){	
			
		   $('.checkName').val('');
		   $('.checkName').prop('disabled', true);
		   $('.checkName').prop('checked', false);		   
		   $('#vacation , #date_vacationA').prop('disabled', false);	
			
		} else if((type == '1') && (check == false)){	
			
			$('#date_vacationA').val('');
			$('#vacation , #date_vacationA').prop('disabled', false);			
			$('.checkName').prop('disabled', false);
		
		} else if((type == '2') && (check == false)){			
			
			$('#'+field).val('');
			
		} else if((type == '2') && (check == true)){			
			
			$('#'+field).focus();
			
		} else if(checkList < 1){
			
			$('.checkName').val('');
			$('#date_vacationA').val('');
			$('#vacation , #date_vacationA').prop('disabled', false);
			$('.checkName').prop('disabled', false);				  
		}		
	}
	////////////////////////////////////////////////////////////
	
	function saveData(){
		
		var document_id = '<?php echo $this->uri->segment(5)?>';
		var url_preview = $('#url_preview').val();
		var withdraw = $('#withdraw').val();
		var for_type = $('#for_type').val();	
		
		if(document_id == ''){
			var file1 = $('#file1').val();
			var file2 = $('#file2').val();
			var file3 = $('#file3').val();
		
		} else {
			
			var file1 = $('#encrypt1').val();
			var file2 = $('#encrypt2').val();
			var file3 = $('#encrypt3').val();			
		}		
						
		if(file1 ==''){				
			alert('กรุณาแนบไฟล์หนังสือเชิญ !');				
			return false;		
			
		} else if(file2 ==''){					
			alert('กรุณาแนบไฟล์กำหนดการ !');				
			return false;
			
		} else if(file3 ==''){					
			alert('กรุณาแนบไฟล์แบบตอบรับ!');				
			return false;				
		
		} else {
			
			if(document_id == ''){
			   
				var fnName = 'save_outboundWithdrawlocal';
			   
			} else {
				   
				var fnName = 'edit_outboundWithdrawlocal/'+document_id;				   
			}
		
			var form_data = new FormData($("#frm1")[0]);			
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Allowance2/')?>'+fnName,
				processData: false,
				contentType: false,
				data : form_data,						  		 
				success:function(data){
					var id = data.trim();					
					if(id != 'x'){
						var url ='<?php echo base_url();?>Printer_controller/'+url_preview+'/'+id;	
						window.open(url,'_blank');
						if(document_id == ''){						
							window.location.href ='<?php echo base_url();?>Allowance2/detailLocal/'+withdraw+'/'+for_type+'/'+id;
						}else{
                                                    window.location.href ='<?php echo base_url();?>Allowance2/detailLocal/'+withdraw+'/'+for_type+'/'+id;
                                                }							
					}					
			    }
            })		
		}		
	}
	//////////////////////////////////////////////////////////// 
	
	function keyInput_changeCheckbox(numID,txt_val){
		
		if(txt_val.trim() != ''){
			
			$('#vacation'+numID).prop('checked', true);
			
		} else {
			
			$('#vacation'+numID).prop('checked', false);
			$('#date_vacation'+numID).val('');
		}	
	}
	////////////////////////////////////////////////////////////
	
	function check_dateVacation(){
		var numID = $(this).attr('id');
		if($('#CHvacation').val() == '1'){
			
			if(($('#dayoffice').val() == '')||($('#monthoffice').val() == '')||($('#yearoffice').val() == '')){
				alert('กรุณาระบุวันที่เดินทางออกจากสำนักงาน !');
				return false;
				
			} else if(($('#dayoffice2').val() == '')||($('#monthoffice2').val() == '')||($('#yearoffice2').val() == '')){
				
				alert('กรุณาระบุวันที่เดินทางกลับถึงสำนักงาน !');
				return false;
			} else if($('#date_vacation').val() == ''){
				
				alert('กรุณาระบุวันที่ต้องการลาพักผ่อน !');
				$('#date_vacation'+numID).focus();
				return false;
			} else {
				
				saveData();				
			}		   
		} else {
			
			saveData();
		}		
	}
	////////////////////////////////////////////////////////////
	
	function submit_andSend(withdrawNum, num_withdrawDataOut, num_withdrawData,dataid){
            var textchange = $('#textchange').val();
        if(textchange != '1'){
                var edit = '';
		var document_id = '<?php echo $this->uri->segment(5)?>';
		var subject_document = $('#subject_document').val();
		var withdraw = $('#withdraw').val();
		$.post('<?php echo base_url('Allowance2/do_submit_andSend2')?>' , { document_id : document_id , subject_document : subject_document , withdraw : withdraw , withdrawNum : withdrawNum , num_withdrawDataOut : num_withdrawDataOut , num_withdrawData : num_withdrawData } , function(data){
               
			if(data == 1){
  if(withdraw=='1'){
 $.post('<?php echo base_url('document_sendmail/send_maillocal')?>' , { dataid : dataid , edit : edit ,withdraw:withdraw } , function(data){
     
				swal({
				  title: "สำเร็จ",
				  text: "ยืนยันข้อมูล และส่งข้อมูลสำเร็จ",
				  type: "success",
				  showCancelButton: false,
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "ตกลง",
				  closeOnConfirm: false
				},
				function(){
					window.location.href ='<?php echo base_url();?>allowance/index';
			   });				         
			   });				         
			}else{
                         $.post('<?php echo base_url('document_sendmail/send_mailnowithdraw')?>' , { dataid : dataid , edit : edit } , function(data){
     
				swal({
				  title: "สำเร็จ",
				  text: "ยืนยันข้อมูล และส่งข้อมูลสำเร็จ",
				  type: "success",
				  showCancelButton: false,
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "ตกลง",
				  closeOnConfirm: false
				},
				function(){
					window.location.href ='<?php echo base_url();?>allowance/index';
			   });				         
			   });		
                        }			         
			}  
		})
                }else{
        alert('ยังไม่ได้บันทึกข้อมูลที่แก้ไข');
        }
	}	
	////////////////////////////////////////////////////////////
	
	function Preview(url,dataid,user_create){

		window.open("<?php echo base_url(); ?>Printer_controller/"+url+'/'+dataid+'/'+user_create);				
	}	
	//-------------------------
	
    function sendpass(dataid,p_or_f,textpass){	
                var typedata = '2';
		var userid = '<?php echo $this->session->userdata['logged_in']['id']?>';
		var user = '<?php echo $this->session->userdata['logged_in']['status']?>';
		var url2 = '<?php echo $this->uri->segment(1)?>';
		var fn = '';
		var notapproved = '';
		var sendto = $('#sendto').val();
		var command = $('#command').val();
		//console.log(sendto);
		if((sendto == "") && (p_or_f == 'pass')){
			swal({
				title: "กรุณาเลือกผู้อนุมัติ",
				type: "warning",
				showCancelButton: false
			},
			function(){
				$("#sendto").select2("open");
			}); 
		} else {
		
			swal({
				title: "ยืนยัน ?",
				text: "ยืนยันการตรวจเช็คหนังสือราชการให้ "+"'"+textpass+"'",
				type: "warning",
				showCancelButton: true, 
				confirmButtonClass: "btn-danger", 
				confirmButtonText: "ยืนยัน", 
				closeOnConfirm: false,
				showLoaderOnConfirm: true
			},
			function(){
				
				if((user != 'user') && (user == 'admin_saraban')){
					
					fn = 'update_chk_doclocal';
					
				} else if((user != 'user') && (user == 'admin')){
						  
					fn = 'update_chk_doclocal2';	  
				}
				if(p_or_f != 'pass'){	
			
					var p_or_f2 = p_or_f.split("#");
					p_or_f = p_or_f2[0];
					notapproved = p_or_f2[1];
				}
				
				$.post('<?php echo base_url('Saraban/')?>'+fn, { dataid : dataid, process : p_or_f, sendto : sendto, command : command, notapproved : notapproved }, function (data){
                                    
                                    if(data != 0){
                                        if(p_or_f!='pass'){
                                    $.post('<?php echo base_url('document_sendmail/send_mailfaillocal')?>' , { dataid : dataid, userid : userid, typedata:typedata  } , function(data1){
					
							swal({
								title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
								//text: "Your file has been deleted",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'
							});
							setTimeout(function (){
								window.location.href = "<?php echo base_url()?>"+url2+"/index_admin";
							}, 2000);
                                                        })
                                                        }else{
                                                        $.post('<?php echo base_url('document_sendmail/send_mailpasslocal')?>' , { dataid : dataid, userid : userid ,sendto : sendto, typedata:typedata} , function(data1){
					
							swal({
								title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
								//text: "Your file has been deleted",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'
							});
							setTimeout(function (){
								window.location.href = "<?php echo base_url()?>"+url2+"/index_admin";
							}, 2000);
                                                        });
                                                        }
					} else {
							swal("ผิดพลาด !", "ไม่สามารถทำรายการได้", "error");	
					}
				
			})
			})
		}
    }
	//-------------------------		
	
	function user_submitEdit(dataid,ch1,ch2){
        var textchange = $('#textchange').val();
        if(textchange != '1'){
		var edit = '1';
                var withdraw = $('#withdraw').val();
		$.post('<?php echo base_url('Saraban/update_chk_doclocal')?>' , { dataid : dataid, process : 'user_edit' , ch1 : ch1 , ch2 : ch2 } , function(data){
               
		if(data != 0){
                    if(withdraw=='1'){
 $.post('<?php echo base_url('document_sendmail/send_maillocal')?>' , { dataid : dataid , edit : edit ,withdraw:withdraw } , function(data){
     
				swal({
				  title: "สำเร็จ",
				  text: "ยืนยันข้อมูล และส่งข้อมูลสำเร็จ",
				  type: "success",
				  showCancelButton: false,
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "ตกลง",
				  closeOnConfirm: false
				},
				function(){
					window.location.href ='<?php echo base_url();?>allowance/index';
			   });				         
			   });				         
			}else{
                         $.post('<?php echo base_url('document_sendmail/send_mailnowithdraw')?>' , { dataid : dataid , edit : edit } , function(data){
     
				swal({
				  title: "สำเร็จ",
				  text: "ยืนยันข้อมูล และส่งข้อมูลสำเร็จ",
				  type: "success",
				  showCancelButton: false,
				  confirmButtonClass: "btn-success",
				  confirmButtonText: "ตกลง",
				  closeOnConfirm: false
				},
				function(){
					window.location.href ='<?php echo base_url();?>allowance/index';
			   });				         
			   });		
                        }
                        }   
		})
        }else{
        alert('ยังไม่ได้บันทึกข้อมูลที่แก้ไข');
        }
    }
	//-------------------------
	
	function dusubmit_approve(id_allownace,chk_approve,approve_status){
						
													/*console.log(id_allownace);
													console.log(topic);
													console.log(email);
													console.log(budget);
													console.log(id_saraban);*/
        
var typedata = '2';
var withdraw = $('#withdraw').val();
		var notapproved = '';
		var approve_status2 = approve_status.split("#");
		approve_status = approve_status2[0];
		if(approve_status == '0'){
			notapproved = approve_status2[1];
		}
					swal({
					  title: "ยืนยันการอนุมัติ",
					  //text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					}, function (){
						
						$.post('<?php echo base_url('allowance/approve_allowancelocal')?>' , { id_allowance : id_allownace , approve_status : approve_status , chk_approve : chk_approve , notapproved : notapproved } , function(data){
               
							if(data != 0){
                                                            $.post('<?php echo base_url('document_sendmail/send_mailapprovelocal')?>' , { id_allownace : id_allownace , approve_status : approve_status, withdraw:withdraw} , function(data){
								swal({
								  title: "ยืนยันการอนุมัติสำเร็จ",
								  //text: "ยืนยันข้อมูล และส่งข้อมูลสำเร็จ",
								  type: "success",
								  showCancelButton: false,
								  confirmButtonClass: "btn-success",
								  confirmButtonText: "ตกลง",
								  closeOnConfirm: false
								},
								function(){
									window.location.href = '<?php echo base_url(); ?>Allowance/index_approve';
							   });
							   });
							} else {
								
								swal("ผิดพลาด !", "ไม่สามารถทำรายการได้", "error");								
							} 
						})							  
					});
		}
	//-------------------------
	function btn_fail(dataid,type,approve_status){
		
		if(type == '1'){
		
			swal({
				title: "ระบุเหตุผล",
				html: true,
				text: '<textarea id="notapproved" class="form-control" rows="5" autofocus ></textarea>',
				type: "warning",
				showCancelButton: true, 
				confirmButtonClass: "btn-success", 
				confirmButtonText: "ยืนยัน", 
				closeOnConfirm: false,
				showLoaderOnConfirm: false
			},
			function(){
				//check_notapproved();
				var notapproved = $('#notapproved').val();
				if(notapproved == ''){						
					alert('กรุณาระบุเหตุผล !');
					$('#notapproved').focus();
					return false

				} else {					   
					//console.log('เรียบร้อย');
					var txt = 'fail#'+notapproved;	
					//console.log('txt.....'+txt);
					sendpass(dataid,txt,'ไม่ผ่าน');	
				}			
			});
		} else if(type == '2'){ 
		
			swal({
				title: "ระบุเหตุผลการพิจารณาไม่อนุมัติ",
				html: true,
				text: '<textarea id="notapproved" class="form-control" rows="5" autofocus ></textarea>',
				type: "warning",
				showCancelButton: true, 
				confirmButtonClass: "btn-success", 
				confirmButtonText: "ยืนยัน", 
				closeOnConfirm: false,
				showLoaderOnConfirm: false
			},
			function(){
				//check_notapproved();
				var notapproved = $('#notapproved').val();
				if(notapproved == ''){						
					alert('กรุณาระบุเหตุผลการพิจารณาไม่อนุมัติ !');
					$('#notapproved').focus();
					return false

				} else {					   
					//console.log('เรียบร้อย');
					var txt = '0#'+notapproved;	
					//console.log('txt.....'+txt);
					//sendpass(dataid,txt,'ไม่ผ่าน');	
					dusubmit_approve(dataid,approve_status,txt);
				}			
			});
		}
	}
	//-------------------------
	</script>

</body>
</html>
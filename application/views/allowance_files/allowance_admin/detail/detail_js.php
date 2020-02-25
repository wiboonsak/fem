	


<!---------- table ------------------->

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/select2/select2.css">
 
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


	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>

	<!-- This is what you need -->
    <script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">


	<!-- Demo Settings -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
			$("#sendto").select2();
			$(".wysihtml5-toolbar").eq(0).remove(); 
			$(".wysihtml5-toolbar").eq(2).remove();
		})
        
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
		} );

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

		function insert_topic(_callback){
			var fname 		= $("#fname").val();	
			var lname  		= $("#lname").val(); 
			var user_create = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session 
			var chk 		 = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
			var topic 		= $("#field-0").val(); 
			var api_link = "<?php echo base_url(); ?>Saraban/insert_topic"; 
			var data = {
						fname 		: fname, 
						lname 		: lname,  
						user_update : user_create,
						chk 		: chk,
						user_create : user_create,
						topic    	: topic  
						};
			DoJSON(data,api_link).then(function (info) { 
				//console.log(info) 
				var formattedNumber = info.padStart(4, "0"); //ต้องให้ส่ง เลขสารรบรรณ กลับมา เพื่อนำไป edit  
				console.log(formattedNumber);
				_callback(formattedNumber);
			});
				
		}



		function sendpass(){
			var sendto 	 = $('#sendto').val();
			//console.log(sendto);
			if(sendto == ""){
				swal({
					title: "กรุณาเลือกผู้อนุมัติ",
					type: "warning",
					showCancelButton: false
				},
				function(){
				$("#sendto").select2("open");
				}); 
			}else{
				swal({
					title: "ยืนยันการตรวจเช็คให้ 'ผ่าน' ?",
					text: "ระบบจะทำการเพิ่มเลขสารบรรณให้อัตโนมัติ",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-danger", 
					confirmButtonText: "ยืนยัน", 
					closeOnConfirm: false,
					showLoaderOnConfirm: true
				},
				function(){
				setTimeout(function () {
					insert_topic((info) => {
						console.log(info);
						var id_saraban = info;
						console.log(id_saraban);
						var id_allow = $('#id_allow').val();
						var command  = $('#command').val();
						var api_link = "<?php echo base_url(); ?>allowance/update_chk_doc"; 
						var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chkauthen 		 = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session
							var data = {
										process 		: "pass",
										id_saraban		: id_saraban,
										command			: command,
										id_allowance 	: id_allow,
										userupdate 		: user_update,
										sendto 			: sendto,
										chkauthen		: chkauthen
										};
							DoJSON(data,api_link).then(function (info) {
								if(info != false){ 
										//send mail
										var api_linkemail = "<?php echo base_url(); ?>Email_controller/send_mail_admin"; 
										var dataEmail = {
													process 		: "allow",
													result 			: "pass",
													id_allowance	: id_allow, 
													topic			: topic,
													email       	: email,
													id_saraban 		: id_saraban,
													userupdate 		: user_update,
													sendto 			: sendto,
													tname			: titlename,
													fname			: firstname,
													lname			: lastname,
													date_modify		: date_modify
													};

										DoJSON(dataEmail,api_linkemail).then(function (info) {
											console.log(info);
											if(info != false){
												if(info.chkmail != false){
													swal({
															title: "เสร็จสิ้น",
															text: "ส่งสถานะเรียบร้อยแล้ว",
															type: "success", 
															showCancelButton: false,
															closeOnConfirm: false,
															}, function () {
																window.location.href = '<?php echo base_url(); ?>Allowance/chkstatus_admin'; 
														});
												}else{ 
													swal("ไม่สามารถทำรายการได้", "กรุณาตรวจสอบรายการใหม่อีกครั้ง", "error");
												}
											}else{ 
												swal("ไม่สามารถทำรายการได้", "กรุณาตรวจสอบรายการใหม่อีกครั้ง", "error");
											}
										});	
								}else{ 
										swal("ไม่สามารถทำรายการได้", "กรุณาตรวจสอบรายการใหม่อีกครั้ง", "error");
								}
							});
					});
				},5000); });
			}
		}

		function sendfail(){
			swal({
					title: "ยืนยันตรวจเช็คให้ 'ไม่ผ่าน' ?",
					text: "กรุณาระบุหมายเหตุที่ไม่ผ่าน:",
					type: "input",
					inputPlaceholder: "ระบุหมายเหตุ",
					showCancelButton: true,
					confirmButtonClass: "btn-danger",
					confirmButtonText: "ยืนยัน",
					closeOnConfirm: false,
					showLoaderOnConfirm: true
				},
				function(inputValue){
					if (inputValue === false) return false;
					if (inputValue === "") {
						swal.showInputError("กรุณาระบุหมายเหตุ!");
						return false
					}else{
						var id_allow = $('#id_allow').val();
						var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
						var chkauthen 		 = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var api_link = "<?php echo base_url(); ?>allowance/update_chk_doc";
							var data = {
										process 		: "fail",
										id_allowance 	: id_allow,
										userupdate 		: user_update,
										chkauthen		: chkauthen,
										remark			: inputValue
										};
							DoJSON(data,api_link).then(function (info) {
								if(info != false){ 
										//send mail
										var api_linkemail = "<?php echo base_url(); ?>Email_controller/send_mail_admin"; 
										var dataEmail = {

													process 		: "allow",
													result 			: "fail",
													id_allowance	: id_allow,
													topic			: topic,
													email       	: email,
													remark			: inputValue,
													userupdate 		: user_update,
													tname			: titlename,
													fname			: firstname,
													lname			: lastname,
													date_modify		: date_modify
													};

										DoJSON(dataEmail,api_linkemail).then(function (info) {
											console.log(info);
											if(info != false){
												if(info.chkmail != false){
													swal({
															title: "เสร็จสิ้น",
															text: "ส่งสถานะเรียบร้อยแล้ว",
															type: "success",
															showCancelButton: false,
															closeOnConfirm: false,
															}, function () {
															window.location.href = '<?php echo base_url(); ?>Allowance/fail_admin'; 
															});
												}else{ 
													swal("ไม่สามารถทำรายการได้", "กรุณาตรวจสอบรายการใหม่อีกครั้ง", "error");
												}
											}else{ 
												swal("ไม่สามารถทำรายการได้", "กรุณาตรวจสอบรายการใหม่อีกครั้ง", "error");
											}
										});	
								}else{ 
										swal("ไม่สามารถทำรายการได้", "กรุณาตรวจสอบรายการใหม่อีกครั้ง", "error");
								}

							});
					}
					
				});
		}
		function Preview(){

			window.open("<?php echo base_url(); ?>Printer_controller/Preview_admin?id_allownace="+id_allow);
								
		}

		
		function newTabImage(num) {
            var encrypt =  $("#encrypt"+num).val();
            var filename ="";
            for (var x = 0; x < Listfile.length; x++) {
              	if(encrypt == Listfile[x].file_name){
              		filename = Listfile[x].file_name;
              	} 
            }  

            window.open('<?php echo base_url(); ?>uploadfile/'+filename,'_blank');
    }
		</script>

</body>
</html>
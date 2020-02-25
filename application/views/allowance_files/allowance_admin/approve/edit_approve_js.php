	


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
			
		function dusubmit_approve(){
						
													/*console.log(id_allownace);
													console.log(topic);
													console.log(email);
													console.log(budget);
													console.log(id_saraban);*/

					swal({
					  title: "ยืนยันการอนุมัติ",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					}, function () {
						var api_link = "<?php echo base_url(); ?>allowance/approve_allowance"; 
						var username = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance   : id_allownace, 
									approve_status : 1,
									username 	   : username,
									chk_authen	   : chk_authen
									};

						DoJSON(data,api_link).then(function (info) {
							if(info != false){

								  var api_linkemail = "<?php echo base_url(); ?>Email_controller/send_mail_approve"; 
								  var id_approve = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
										var dataemali = {
													process     : 'approve',
													id_allowance: id_allownace,
													topic		: topic,
													email       : email,
													budget      : budget,
													id_saraban 	: id_saraban,
													id_approve  : id_approve,
													user_create : user_create
 													};

										DoJSON(dataemali,api_linkemail).then(function (info) {
											console.log(info);
											if(info.chkmail != false){
												setTimeout(function () {
												    swal({
														title: "สำเร็จ",
														text: "บันทึกข้อมูลสำเร็จ",
														type: "success", 
														timer: 2000,
									  					showCancelButton: false,
									  					showConfirmButton: false

													},
													function(){
														window.location.href = '<?php echo base_url(); ?>Allowance/index_approve'; 
													});
												  }, 2000);
												
											}else{ 
												setTimeout(function () {
												swal({
														title: "ไม่สำเร็จ",
														text: "ไม่สามารถทำการรายได้กรุณาลองใหม่อีกครั้ง",
														type: "error"
													},
													function(){
														//reload();
														//window.location.href = '<?php echo base_url(); ?>Allowance/index_approve';
													});
												  }, 2000);
											}
										});	
								
								
							}else{ 
								setTimeout(function () {
								swal({
										title: "ไม่สำเร็จ",
										text: "ไม่สามารถยืนยันการอนุมัติสำเร็จได้กรุณาลองใหม่อีกครั้ง",
										type: "error"
									},
									function(){
										//reload();
										//window.location.href = '<?php echo base_url(); ?>Allowance/index_approve';
									});
								  }, 2000);
							}
						});		  
					});
		}
		function dusubmit_notapprove(){
				

					swal({
					  title: "ยืนยันการไม่อนุมัติ",
					  text: "Submit to run ajax request",
					  type: "info",
					  showCancelButton: true,
					  closeOnConfirm: false,
					  showLoaderOnConfirm: true
					}, function () {
						var api_link = "<?php echo base_url(); ?>allowance/approve_allowance"; 
						var username = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
						var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
						var data = {
									id_allowance   	: id_allownace, 
									approve_status 	: 0,
									username 		: username,
									chk_authen		: chk_authen
									};

						DoJSON(data,api_link).then(function (info) {
							if(info != false){
								 var api_linkemail = "<?php echo base_url(); ?>Email_controller/send_mail_approve"; 
								 var id_approve = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
										
										var dataemali = {
													process     : 'Notapprove',
													id_allowance: id_allownace,
													topic		: topic,
													email       : email,
													budget      : budget,
													id_saraban 	: id_saraban,
													id_approve  : id_approve,
													user_create : user_create
													};

										DoJSON(dataemali,api_linkemail).then(function (info) {
											console.log(info);
											if(info.chkmail != false){
												setTimeout(function () {
												    swal({
														title: "สำเร็จ",
														text: "บันทึกข้อมูลสำเร็จ",
														type: "success",
														timer: 2000,
									                    showCancelButton: false,
									                    showConfirmButton: false
													},
													function(){
														window.location.href = '<?php echo base_url(); ?>Allowance/index_approve';
													});
												  }, 2000);
												
											}else{ 
												setTimeout(function () {
												swal({
														title: "ไม่สำเร็จ",
														text: "ไม่สามารถทำรายการได้กรุณาลองใหม่อีกครั้ง",
														type: "error"
													},
													function(){
														//reload();
														//window.location.href = '<?php echo base_url(); ?>Allowance/index_approve';
													});
												  }, 2000);
											}
										});	
								
							}else{ 
								setTimeout(function () {
								swal({
										title: "ไม่สำเร็จ",
										text: "ไม่สามารถยืนยันการไม่อนุมัติสำเร็จได้กรุณาลองใหม่อีกครั้ง",
										type: "error"
									},
									function(){
										//reload();
										//window.location.href = '<?php echo base_url(); ?>Allowance/index_approve';
									});
								  }, 2000);
							}
						});		  
					});
		}

		function Preview(){

			window.open("<?php echo base_url(); ?>Printer_controller/Preview_admin?id_allownace="+id_allownace);
								
		}

		
	function newTabImage(num) {
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


		</script>

</body>
</html>
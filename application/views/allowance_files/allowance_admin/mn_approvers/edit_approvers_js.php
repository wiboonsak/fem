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
	
	<!-- This is what you need -->
    <script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>

	<!-- Demo Settings -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>

		<script type="text/javascript">
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

		function editbtn(id) {
				for(var i=0;i<userlist.length;i++){
				var eachData 	= userlist[i];
				if(eachData.id == id){
					$("#modal-Edit").modal();
					
					$("#0").val(eachData.pname);
					$("#1").val(eachData.fname);
					$("#2").val(eachData.lname);
					$("#3").val(eachData.plevel);
					$("#4").val(eachData.approve);
					$("#5").val(eachData.tel);
					$("#6").val(eachData.mail);
					$("#id").val(eachData.id);
				} 
			}
		}

		function dosubmit_edit(){
			var id 			= $("#id").val();
			var fname 		= $("#1").val();
			var lname  		= $("#2").val();
			var tel 		= $("#5").val();
			var mail  		= $("#6").val();
			var plevel 		= $("#3").val(); 
			var pname  		= $("#0").val();
			var approve 	= $("#4").val();
			var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
			var chk 		= '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
			if(fname!="" &&lname!="" &&tel!="" &&mail!="" &&plevel!="" &&approve!=""){
				if(confirm("ยืนยันการบันทึก")){ 
					var api_link = "<?php echo base_url(); ?>Allowance/update_approver"; 
					var data = {
								process 	: "edit",
								id 			: id,
								fname 		: fname,
								lname  		: lname,
								tel 		: tel,
								mail  		: mail,
								plevel 		: plevel,
								pname  		: pname,
								approve 	: approve,
								user_update : user_update,
								chk 		: chk
								};
					DoJSON(data,api_link).then(function (info) { 
						if(info != false){
							swal({
								title: "สำเร็จ",
								text: "แก้ไขข้อมูลสำเร็จ",
								type: "success"},
								function(){
									reload();
								}
							);
						}else{ 
							alert("ไม่สามารถแก้ไขได้กรุณาลองใหม่อีกครั้ง");
							reload();
						}
					});
				}
			}else{
				alert("กรุณาระบุข้อมูลให้ครบถ้วน");
			}
		}

		function dosubmit_delect(id){
			var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
			var chk 		= '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
				swal({
					title: "ยืนยันการลบ",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-info",
					confirmButtonText: "ตกลง",
					closeOnConfirm: false
				},
				function(){
						var api_link = "<?php echo base_url(); ?>Allowance/update_approver"; 
						var data = {
									process 	: "delete",
									id			: id,
									user_update : user_update,
									chk 		: chk
									};
						DoJSON(data,api_link).then(function (info){
							if(info != false){
								swal({
									title: "สำเร็จ", 
									text: "ลบข้อมูลสำเร็จ"},
									function(){
										reload();
									}
								);
							}else{ 
								alert("ไม่สามารถยกเลิกได้กรุณาลองใหม่อีกครั้ง");
								reload();
							}
						});
			});
		}

		function edituserpass(id) {
				for(var i=0;i<userlist.length;i++){
				var eachData 	= userlist[i];
				if(eachData.id == id){
					$("#modal-editP").modal();
					
					$("#idusr").val(eachData.id);
					$("#usr").val(eachData.usrname);
				} 
			}
		}

		function dosubmitCHP(){
				var chkdup = false;

				var api_link 				= "<?php echo base_url(); ?>Allowance/update_approver";
				var NEW_PassWord 			= $("#NEW_PassWord").val();	
				var NEW_confirm_PassWord 	= $("#NEW_confirm_PassWord").val();
				var id 						= $("#idusr").val();
				var username 				= $("#usr").val();
				var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
				var chk 		= '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 

				if (NEW_PassWord == "" || username == "") {
						alert("กรุณาระบุให้ครบทุกช่อง");
				}else if (NEW_confirm_PassWord == "") {
						alert("กรุณายืนยันรหัสผ่าน");
				}else if (NEW_confirm_PassWord != NEW_PassWord) {
						alert("รหัสผ่านไม่ตรงกัน");
				}else {
						swal({
							title: "ยืนยันการเปลี่ยนแปลง",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-info",
							confirmButtonText: "ตกลง",
							closeOnConfirm: false
							},
							function(){
								var api_link = "<?php echo base_url(); ?>Allowance/update_approver"; 
								var data = {
											process 	: "chgP",
											id			: id,
											user_update : user_update,
											chk  		: chk, 
											newpass		: NEW_PassWord,
											username	: username
											};
								DoJSON(data,api_link).then(function (info) {
									if(info != false){
										swal({
											title: "สำเร็จ", 
											text: "แก้ไขข้อมูลสำเร็จ"},
											function(){
												reload();
											}
										);
									}else{ 
										alert("ไม่สามารถแก้ไขได้กรุณาลองใหม่อีกครั้ง");
										reload();
									}
								});
						});
		        }
		}
		</script>

</body>
</html>

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
	<script src="<?php echo base_url();?>assets_saraban/js/neon-custom.js"></script>
	
	<!-- This is what you need -->
    <script src="<?php echo base_url();?>assets_saraban/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets_saraban/dist/sweetalert.css">

	<!-- Demo Settings -->
	<script src="<?php echo base_url();?>assets_saraban/js/neon-demo.js"></script>

		<script type="text/javascript">

		jQuery(document).ready( function( $ ){
			var $table1 = jQuery('#table-1');			
			var $table2 = jQuery('#table-2');			
			
			// Initialize DataTable
			$table1.DataTable( {
				"aLengthMenu": [[20, 50, -1], [20, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
			// Initialize DataTable
			$table2.DataTable( {
				"aLengthMenu": [[20, 50, -1], [20, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table2.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});		
		});
		//--------------------------------------
			
		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }
		//--------------------------------------
			
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
		//--------------------------------------
			
		function update_type(id) {
			var selected  	= $("#selected").val(); 
			var userupdate 	= '<?php echo ($this->session->userdata['logged_in']['id']);?>'; //ดึงจาก session 
			var chk 		= '<?php echo ($this->session->userdata['logged_in']['status']);?>'; //ดึงจาก session 
			if(selected!=""){
				//console.log(selected);
				swal({
					title: "ยืนยันการเปลี่ยนแปลงแหล่งเงิน",
					type: "warning",
					showCancelButton: true,
					confirmButtonClass: "btn-info",
					confirmButtonText: "ตกลง",
					closeOnConfirm: false
					},
					function(){
						var api_link = "<?php echo base_url();?>Allowance/update_chk_doc"; 
						var data = {
									process			: "edittype", 
									type 			: selected,
									id_allowance 	: id,
									userupdate	 	: userupdate,
									chk 			: chk
									};
						DoJSON(data,api_link).then(function (info) {
							if(info != false){
								swal("สำเร็จ", "เปลี่ยนแปลงเรียบร้อยแล้ว", "success");
							}else{ 
								swal({
									title: "ไม่สามารถแก้ไขได้กรุณาลองใหม่อีกครั้ง",
									type: "warning",
									showCancelButton: true,
									showConfirmButton: false
								});
							}
						});
					});
			}else{
				swal({
					title: "กรุณาเลือกแหล่งเงิน",
					type: "warning",
					showCancelButton: false
				},
				function(){
				$("#selected").select2("open");
				});
			}
		}
		//--------------------------------------
			
		function show_notapproved(notapproved,title){
            swal({
                title: title,
				html: true,
				text: '<p style="color: #000000">'+notapproved+'</p>',
                confirmButtonClass: "btn-blue btn-sm",
                confirmButtonText: "ตกลง",
                closeOnConfirm: true
           });
        }		
		</script>

</body>
</html>
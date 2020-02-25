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
			
			$("#selected").select2();

			$("#selected").change(function(){
				var seleted = $("#selected").val();
				for(var i = 0; i < user.length; i++){
					if(seleted == user[i].id){
						
						/*if(user[i].plevel == '3' ){
							$("#position").val("คณบดี");
						}else if(user[i].plevel == '4' ){
							$("#position").val("รองคณบดี");
						}else if(user[i].plevel == '2' ){
							$("#position").val("เจ้าหน้าที่");
						}else if(user[i].plevel == '1' ){
							$("#position").val("อาจารย์");
						}*/
						
						$("#position").val(user[i].plevel); 
						$("#email").val(user[i].mail); 
						$("#position_manage").val(user[i].position_manage); 
						$("#act_for_else").val(user[i].act_for_else); 
						break;
					}else{
						$("#position").val("");
						$("#email").val("");
						$("#position_manage").val(""); 
						$("#act_for_else").val("");
					}
				}
			});
		});

		jQuery(document).ready(function( $ ){
			var $table1 = jQuery('#table-1');
			
			// Initialize DataTable
			$table1.DataTable({
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest('.dataTables_wrapper').find('select').select2({
				minimumResultsForSearch: -1
			});
		});

		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }

		function DoJSON(data, api_link){
			return new Promise(function (resolve, reject){
				$.ajax({
					url: api_link,
					data: data,
					type: "POST",
					cache: false,
					dataType: 'json', //หรือ json หรือ xml
					success: function (info){
						resolve(info);
					},
					error: function (err){
						alert("ERROR : DoJSON() " + err.statusText);
						reject(err.statusText);
					}
				});
			});
		}

		function add_approvers(){
			
			var selected = $("#selected").val();
			var position = $("#position").val();
			var email = $("#email").val();
			var position_manage = $("#position_manage").val();
			var act_for_else = $("#act_for_else").val();
			var userupdate = '<?php echo ($this->session->userdata['logged_in']['id']);?>'; //ดึงจาก session 
			var chk = '<?php echo ($this->session->userdata['logged_in']['status']);?>'; //ดึงจาก session 
			
			if(selected != "" && position != "" && email != ""){
				//console.log(selected);
				
				if(position_manage == ''){
				   
				   	swal({
						title: "กรุณาเลือกตำแหน่งบริหาร",
						type: "warning",
						showCancelButton: true,
						showConfirmButton: false
					});
					return false
					
				} else if(act_for_else == ''){
				   
				   	swal({
						title: "กรุณาเลือก",
						type: "warning",
						showCancelButton: true,
						showConfirmButton: false
					});
					return false
				
				} else {			
				
						swal({
							title: "ยืนยันการบันทึก",
							type: "warning",
							showCancelButton: true,
							confirmButtonClass: "btn-info",
							confirmButtonText: "ตกลง",
							closeOnConfirm: false
						},
						function(){
							var api_link = "<?php echo base_url();?>Allowance/update_approver"; 
							var data = {
								process		: "add",
								id 			: selected,
								userupdate  : userupdate,
								position_manage  : position_manage,
								act_for_else  : act_for_else,
								chk 		: chk
							};
							DoJSON(data,api_link).then(function (info){
								if(info != false){

									swal("สำเร็จ", "เพิ่มผู้อนุมัติเรียบร้อยแล้ว", "success");
									$("#selected").val("");
									$('#selected').val('').trigger('change');
									$("#position").val("");
									$("#email").val("");
									$("#position_manage").val(""); 
									$("#act_for_else").val("");

								}else{

									swal({
										title: "ไม่สามารถเพิ่มผู้อนุมัติได้กรุณาลองใหม่อีกครั้ง",
										type: "warning",
										showCancelButton: true,
										showConfirmButton: false
									});
								}
							});
						});					
				}

			}else{

				swal({
					title: "กรุณาเลือกผู้อนุมัติ",
					type: "warning",
					showCancelButton: false
				},
				function(){
					$("#selected").select2("open");
				});
			}			
		}
		
		function doreset(){
						         	
			$('#selected').val('').trigger('change');
			$('#position').val(''); 	
			$('#email').val('');
			$("#position_manage").val(''); 
			$("#act_for_else").val('');
        }
		</script>

</body>
</html>
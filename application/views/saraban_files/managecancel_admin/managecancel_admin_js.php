 <!-- This is what you need -->
<script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

<!---------- table ------------------->

	<!-- Imported styles on this page -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/datatables/datatables.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/js/select2/select2.css">

	<!-- Imported scripts on this page -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/datatables/datatables.js"></script>
	<script src="<?php echo base_url(); ?>assets_saraban/js/select2/select2.min.js"></script>

	<!--select2 scripts-->

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

	<!-- Demo Settings -->
    <script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>
    <script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			$("#username").select2();
		} );
                </script>
    <script type="text/javascript">
		$(document).ready(function(){
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"order": [],
				"aLengthMenu": [[5, 25, 10, "All"], [5,25, 10, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});

			$("#field-5").change(function(){
				var seleted = $("#field-5").val(); 
				for (var i = 0; i < user.length; i++) {
					if( seleted == user[i].user ){
						$("#field-1").val(user[i].fname); 
						$("#field-2").val(user[i].lname); 
						break;
					}else{
						$("#field-1").val("");
						$("#field-2").val("");
					}
				}
			}); 
		});

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

		var id_sarabanE = "";
		function editbtn(id_saraban){
				id_sarabanE = id_saraban; 

				for(var i=0;i<sarabanList.length;i++){
				var eachData 	= sarabanList[i];
				if(eachData.id_saraban==id_saraban){
 
					$('#modal-Edit-saraban').modal({backdrop: 'static', keyboard: false});
					$("#modal-Edit-saraban").modal();
					$("#field-1").val(eachData.fname);
					$("#field-2").val(eachData.lname);
					$("#field-3").val(eachData.topic);
					$("#field-4").val(id_saraban);
					$("#username").val(eachData.username); 
					$("#select2-chosen-1").text(eachData.username); 
					$("#to_name").val(eachData.to_name); 
					$("#from_name").val(eachData.from_name); 
					$("#field-6").val(eachData.remark);
					$("#field-7").val(eachData.refno);				
				} 
			}
		}

		function dosubmit_edit(){
			var fname 		= $("#field-1").val();
			var lname  		= $("#field-2").val(); 
			var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
			var chk 		= '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
			var topic 		= $("#field-3").val();
			var to_name 	= $("#to_name").val();
			var from_name 	= $("#from_name").val();
			var username 	= $("#username").val();
			var remark		= $("#field-6").val();
			var refno 	 	= $("#field-7").val();   
			var id = "";
			for(var i = 0; i < user.length; i++){
				if(username == user[i].user){
					id = user[i].id
					break;
				}
			}
			if(fname!="" &&lname!="" &&topic!=""&&username!=""){
				if(confirm("ยืนยันการบันทึก")){
					var api_link = "<?php echo base_url(); ?>Saraban/reset_saraban"; 
					var data = {
								id_saraban	: id_sarabanE,
								fname 		: fname,
								lname 		: lname,  
								remark 		: remark,
								refno 		: refno,
								user_update : user_update,
								chk 		: chk,
								topic    	: topic,
								to_name    	: to_name,
								from_name   : from_name,
								user_create	: id 
								};
					DoJSON(data,api_link).then(function (info){
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
				}
			}else{				
				alert("กรุณาระบุข้อมูลให้ครบถ้วน");
				$('#modal-Edit-saraban').modal({backdrop: 'static', keyboard: false});
				$("#modal-Edit-saraban").modal();
				return false
			}
		}
     //----------------------------------
                  
    function usernamesearh(changeValue) {
        $.post('<?php echo base_url('Saraban/usernamesearh') ?>', {changeValue: changeValue},
                function (data) {
                    if (data != 'error') {
                        var res = data.split("/");

                        $('#field-1').val(res[0]);
                        $('#field-2').val(res[1]);
                        $('#iduser').val(res[2]);
                    } else {
                        $('#field-1').val('');
                        $('#field-2').val('');
                        $('#iduser').val('');
                    }
                });
    }
    //----------------------------------------
		
    function hideselect(){
  		$('.select2-drop').hide();
    }
	</script>
</body>
</html>
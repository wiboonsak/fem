	
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
		jQuery( document ).ready( function( $ ){
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
		} );

		function reload(){
			var delayInMilliseconds = 500; //1 second

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

		function dodelete(id_allowance){

				   swal({
                                  title: "ยืนยันการลบคำขอเบิกค่าเดินทาง?",
                                  type: "warning",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Yes, Delete it!",
                                  closeOnConfirm: false
                                },
                               function () {
                                       var api_link = "<?php echo base_url(); ?>allowance/Delete_allowance"; 
                                       var id_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                                       var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
                                        var data = {
                                                    id_allowance : id_allowance, 
                                                    id           : id_update,
                                                    chk_authen   : chk_authen
                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                            if(info == true){	
                                                    swal({
                                                        title: "สำเร็จ",
                                                        text: "ลบคำขอเบิกค่าเดินทางสำเร็จ",
                                                        type: "success"
                                                    },
                                                    function(){
                                                        reload();
                                                    });
                                                
                                            }else{ 
                                               
                                                swal({
                                                        title: "ไม่สำเร็จ",
                                                        text: "ไม่สามารถลบคำขอเบิกค่าเดินทางได้ กรุณาลองใหม่อีกครั้ง",
                                                        type: "error"
                                                    });
                                            }
                                        });    
                                 });
                            }
                            //---------------------
                            function dodelete2(id_allowance){

				   swal({
                                  title: "ยืนยันการลบคำขอเบิกค่าเดินทาง?",
                                  type: "warning",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Yes, Delete it!",
                                  closeOnConfirm: false
                                },
                               function () {
                                       var api_link = "<?php echo base_url(); ?>allowance/Delete_allowance2"; 
                                       var id_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                                       var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
                                        var data = {
                                                    id_allowance : id_allowance, 
                                                    id           : id_update,
                                                    chk_authen   : chk_authen
                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                            if(info == true){	
                                                    swal({
                                                        title: "สำเร็จ",
                                                        text: "ลบคำขอเบิกค่าเดินทางสำเร็จ",
                                                        type: "success"
                                                    },
                                                    function(){
                                                        reload();
                                                    });
                                                
                                            }else{ 
                                               
                                                swal({
                                                        title: "ไม่สำเร็จ",
                                                        text: "ไม่สามารถลบคำขอเบิกค่าเดินทางได้ กรุณาลองใหม่อีกครั้ง",
                                                        type: "error"
                                                    });
                                            }
                                        });    
                                 });
                            }
                            function upload(i){
                  
                    //$("#user_id").val(user_id);

					$('#modal-upload-saraban'+i).modal({backdrop: 'static', keyboard: false}) 
					$("#modal-upload-saraban"+i).modal();
		}
        //--------------------------------------------------
                		
		function Addimg(i){
			var img2 = $('#img2'+i).val();
			var postData = new FormData($("#imgForm"+i)[0]);
			if(img2 !=''){
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('Inputform/addimg')?>',
				processData: false,
				contentType: false,
				data: postData,
				success: function (data, status) { 
					if(status == 'success'){
											$('#img2'+i).val('');  
						$('#showdata'+i).empty();		
						$('#showdata'+i).html(data);
					   alert('บันทึกข้อมูลสำเร็จ');
					} else {
						alert('บันทึกข้อมูลไม่สำเร็จ');
					}
				}

			})
			}else{
				alert('กรุณาเลือกไฟล์สำเนา');
				return false;
				$('#modal-upload-saraban'+i).modal({backdrop: 'static', keyboard: false}) 
				$("#modal-upload-saraban"+i).modal();
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
        function comfirmDelete(idsaraban,file_name,typeData,i){
             $.post('<?php echo base_url('Inputform/comfirmDelete') ?>', {idsaraban: idsaraban,file_name:file_name,typeData:typeData,i:i}, function (data) {
                 //$("#modal-upload-saraban").modal('hide');
                 alert('ลบข้อมูลสำเร็จ');
                                        $('#showdata'+i).empty();		
					$('#showdata'+i).html(data);
             });
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


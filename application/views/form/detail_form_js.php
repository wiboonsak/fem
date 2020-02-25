
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

<script>	
		$(document).ready(function(){
			
            $(".unCheck").prop("checked", false);
            $("#chFor").val('');
            $("#chReason").val('');
            $("#money").val('');
			$('.neon-cb-replacement.checked').removeClass('checked');			
		})

		var chk_update   = false;
		var id_allowance = "";
		
		////////////////////////////////////////////////////////////////
	
		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }
	////////////////////////////////////////////////////////////////		
	
    function sendpass(dataid,p_or_f,textpass,type_travel2){		
		
		//var url2 = '<?php //echo $this->uri->segment(1)?>';
		var fn = '';
		var notapproved = '';
		var check_val = '1';
		var type_travel = '<?php echo $this->uri->segment(5);?>';
		
		//console.log(sendto);
		/*if((sendto == "") && (p_or_f == 'pass')){
			swal({
				title: "กรุณาเลือกผู้อนุมัติ",
				type: "warning",
				showCancelButton: false
			},
			function(){
				$("#sendto").select2("open");
			}); 
		} else {*/
		
			swal({
				title: "ยืนยัน ?",
				text: "ยืนยันการตรวจเช็ครายงานการเดินทางให้ "+"'"+textpass+"'",
				type: "warning",
				showCancelButton: true, 
				confirmButtonClass: "btn-danger", 
				confirmButtonText: "ยืนยัน", 
				closeOnConfirm: false,
				showLoaderOnConfirm: true
			},
			function(){
				
				/*if((user != 'user') && (user == 'admin_saraban')){
					
					fn = 'update_chk_doc';
					
				} else if((user != 'user') && (user == 'admin')){
						  
					fn = 'update_chk_doc2';	  
				}*/
				
				if(p_or_f != 'pass'){	
			
					check_val = '0';
					var p_or_f2 = p_or_f.split("#");
					p_or_f = p_or_f2[0];
					notapproved = p_or_f2[1];  
				}				
				
				$.post('<?php echo base_url('Allowance/check_travelReport')?>', { dataid : dataid, process : p_or_f, notapproved : notapproved, check_val : check_val, type_travel : type_travel }, function (data){
                                    
                    if(data != 0){
                          //if(p_or_f != 'pass'){
                                            
                               $.post('<?php echo base_url('document_sendmail/send_mailpass_report')?>' , { doc_id : dataid, type_travel : type_travel, process : p_or_f } , function(data1){
					
									swal({
										title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
										//text: "Your file has been deleted",
										type: 'success',
										confirmButtonClass: 'btn btn-confirm mt-2'
									});
									setTimeout(function (){
										window.location.href = "<?php echo base_url()?>"+"Allowance/otherdoc";
									}, 2000);
                                })
                          /* } else {						   
                                                       
                                $.post('<?php //echo base_url('document_sendmail/send_mailpass_report')?>' , { doc_id : dataid, type_travel : type_travel, process : p_or_f } , function(data1){
					
									swal({
										title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
										//text: "Your file has been deleted",
										type: 'success',
										confirmButtonClass: 'btn btn-confirm mt-2'
									});
									setTimeout(function (){
										window.location.href = "<?php //echo base_url()?>"+url2+"/index_admin";
									}, 2000);
                                })
                           }*/
					} else {
							swal("ผิดพลาด !", "ไม่สามารถทำรายการได้", "error");	
					}				
			 })
		   })
		//}
    }
	//-------------------------		
	
	function btn_fail(dataid,approve_status,type_travel){	
		
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
					sendpass(dataid,txt,'ไม่ผ่าน',type_travel);	
				}			
			});		
	} 
	
	
	</script>

</body>
</html>
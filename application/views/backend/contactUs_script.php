<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js')?>"></script>
<!--<script src="<?php //echo base_url('assets/js/autoNumeric-1.9.41.js')?>"></script>-->
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script> 
<script src="<?php echo base_url('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')?>"></script> 
<script src="<?php echo base_url('assets/plugins/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')?>"></script>
       
<script>		
	$(document).ready(function(){ 
				
	tinymce.init({
       selector: "textarea.ex",
       theme: "modern",
       height:300,
       plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
       ],
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
       style_formats: [
         {title: 'Bold text', inline: 'b'},
         {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
         {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
         {title: 'Example 1', inline: 'span', classes: 'example1'},
         {title: 'Example 2', inline: 'span', classes: 'example2'},
         {title: 'Table styles'},
         {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
       ]
	});
	/////////////////////////////////	
		
	// Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);	
	/////////////////////////////////
		
	$('#table2').DataTable({
		searching: true ,
		ordering : false ,
		pageLength : 15 ,
		lengthChange : false
	} );	
	
})	
	
	//----------------------
	function checkWidth() {
		var windowSize = $(window).width();
		if (windowSize >= 576) {
            $("#labelD").css({"text-align": "center"});
        }  else  {
			$("#labelD").css({"text-align": "left"});
		}      
    }
	
	//----------------------
	function check_frmContactUs() {
		
			var address_th = $('#address_th').val();
			var address_en = $('#address_en').val();
			var telephone = $('#telephone').val();
			var map = $('#map').val();
			var first_pic = $('#first_pic').val();
			//var first_pic = $("input[name*='old_file1']").val();
		    var dataID = $('#dataID').val();		   
		
			if(address_th==''){
				alert('กรุณาใส่ที่อยู่ภาษาไทย');
				return false;
				
			}else if(address_en==''){
				alert('กรุณาใส่ที่อยู่ภาษาอังกฤษ');
				return false;
				
			}else if(telephone==''){
				alert('กรุณาใส่เบอร์โทรติดต่อ');
				return false;
				
			}else if(map==''){
				alert('กรุณาใส่ลิงค์แผนที่');
				return false;	
				
			}else{  
				var form_data = $('#frm2').serialize();
				
				if(dataID != ''){					  
				   var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   
					
				} else {				   
				   var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';				  
				}
				
				$.post('<?php echo base_url('control/add_contactUs')?>' , { form_data : form_data , dataID : dataID }, function(data){ 
					
					   if(data!= 0){						   
						   
						    if(first_pic != ''){
								
								$("#dataID").val(data);
								var postData = new FormData($("#frm2")[0]);
								
								 $.ajax({
									 type:'POST',
									 url:'<?php echo base_url('control/AddFile')?>',
									 processData: false,
									 contentType: false,
									 data : postData,						  		 
									 success:function(data2){
										 
										 if(data2 > 0){
											  swal({
												title: finished_txt,
												//text: 'You clicked the button!',
												type: 'success',
												confirmButtonClass: 'btn btn-confirm mt-2'
											  })
											  setTimeout(function(){ location.reload(); }, 2000);
										 }
									 }
                        		});	
								
							} else {
								swal({
								  title: finished_txt,
								  //text: 'You clicked the button!',
								  type: 'success',
								  confirmButtonClass: 'btn btn-confirm mt-2'
							    })
								
								setTimeout(function(){ location.reload(); }, 2000);
							}						
							
					   }else{
						    swal({
								title: not_txt,
								//text: "You won't be able to revert this!",
								type: 'warning',								
								confirmButtonClass: 'btn btn-confirm mt-2'				
							}) 							
					  }
				})
			}
		}
		
	//----------------------
	
	$( ".fileupload-exists" ).click(function() { 
  		$("#upload_preview").empty();
		$("#upload_preview").addClass("fileupload-exists");
		$("#upload_new").removeClass("fileupload-exists");
		$("#first_pic").val("");
		$("[data-provides=fileupload]").removeClass("fileupload-exists");					
		$("[data-provides=fileupload]").addClass("fileupload-new");	
		//$("input[name*='old_file1']").val("");
	}); 
	
	
	/*function ppp33(aa){
		
		$("#upload_preview:eq("+aa+")").empty();
		$("#upload_preview").addClass("fileupload-exists");
		$("#upload_new").removeClass("fileupload-exists");
		$("#first_pic").val("");
		$("[data-provides=fileupload]").removeClass("fileupload-exists");					
		$("[data-provides=fileupload]").addClass("fileupload-new");	
	}*/
	
	//----------------------
	function removeFile(dataID,file_name,txt1,table,field,ch){ 
		
		var txt2 = 'ต้องการลบ'+txt1+'นี้ ?';
		var url = '<?php echo $this->uri->segment(2)?>';
		
		swal({
           title: txt2,
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'ลบข้อมูล'
        }).then(function () {
			
		   $.post('<?php echo base_url('control/remove_file')?>' , { dataID : dataID , table : table , file_name : file_name , field : field }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'ลบ'+txt1+'เรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }).then(okay => {
					   if (okay) {
						   
						   if(txt1 == 'ไฟล์'){
							//$('#'+field+dataID).val('');
						    $('#up_file'+ch).show();
							$('#aFile0'+ch).hide();
							$('#aFile'+ch).hide();  
						   }
						   
						   if(txt1 == 'รูปภาพ'){
							$("#upload_preview").empty();
							$("#upload_preview").addClass("fileupload-exists");
							$("#upload_new").removeClass("fileupload-exists");
							$("#"+field).val("");
							$("#"+field+dataID).val("");
							$("[data-provides=fileupload]").removeClass("fileupload-exists");		
							$("[data-provides=fileupload]").addClass("fileupload-new");   
							   
							   if(url == 'aboutUs'){
								   setTimeout(function(){ location.reload(); }, 2000);
							   }
						   }
					   }
					})				
				}else{
					swal({
						title: 'ไม่สามารถลบ'+txt1+'ได้!',
						//text: "You won't be able to revert this!",
						type: 'warning',								
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 							
				}
			})	
		})		
	}
	
	//----------------------
	/*function setValueIMG(val_img , field){
		$("#"+field).val(val_img);
		console.log('............'+$("#"+field).val());
	}*/
	
	//---------------------- 
	function checkfrm_aboutus() {
		
			var desc_th = $('#desc_th').val();
			var desc_en = $('#desc_en').val();	
			var history_th = tinyMCE.editors[$('#history_th').attr('id')].getContent();
			var history_en = tinyMCE.editors[$('#history_en').attr('id')].getContent();
			var vision_th = tinyMCE.editors[$('#vision_th').attr('id')].getContent();
			var vision_en = tinyMCE.editors[$('#vision_en').attr('id')].getContent();
			var mission_th = tinyMCE.editors[$('#mission_th').attr('id')].getContent();
			var mission_en = tinyMCE.editors[$('#mission_en').attr('id')].getContent();			
			
		    var dataID = $('#dataID').val();		   
		
			if(history_th==''){
				alert('กรุณาใส่ประวัติภาษาไทย');
				return false;
				
			}else if(history_en==''){
				alert('กรุณาใส่ประวัติภาษาอังกฤษ');
				return false;
				
			}else if(vision_th==''){
				alert('กรุณาใส่วิสัยทัศน์ภาษาไทย');
				return false;
				
			}else if(vision_en==''){
				alert('กรุณาใส่วิสัยทัศน์ภาษาอังกฤษ');
				return false;
				
			}else if(mission_th==''){
				alert('กรุณาใส่พันธกิจภาษาไทย');
				return false;
				
			}else if(mission_en==''){
				alert('กรุณาใส่พันธกิจภาษาอังกฤษ');
				return false;			
				
			}else{  
				//var form_data = $('#frm2').serialize();
				
				var history_img = $('#history_img').val();  console.log("history_img...."+history_img);
				var vision_img = $('#vision_img').val();  console.log("vision_img...."+vision_img);
				var mission_img = $('#mission_img').val();   console.log("mission_img...."+mission_img);
				
				if(dataID != ''){					  
				   var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้ !';				   
					
				} else {				   
				   var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้ !';				  
				}
				
				$.post('<?php echo base_url('control/add_aboutUs')?>' , { desc_th : desc_th , desc_en : desc_en , history_th : history_th , history_en : history_en , vision_th : vision_th , vision_en : vision_en , mission_th : mission_th , mission_en : mission_en , dataID : dataID }, function(data){ 
					
					   if(data!= 0){					   
						   
						    if((history_img != '') || (vision_img != '') || (mission_img != '')){
										
								$("#dataID").val(data);
								var postData = new FormData($("#frm2")[0]);
								
								 $.ajax({
									 type:'POST',
									 url:'<?php echo base_url('control/AddFile')?>',
									 processData: false,
									 contentType: false,
									 data : postData,						  		 
									 success:function(data2){ 	 console.log("data2...."+data2);	
										 
										 if(data2 > 0){
											  swal({
												title: finished_txt,
												//text: 'You clicked the button!',
												type: 'success',
												confirmButtonClass: 'btn btn-confirm mt-2'
											  })
											  setTimeout(function(){ location.reload(); }, 2000);
										 
										 } /*else {
											 swal({
												title: not_txt,
												//text: "You won't be able to revert this!",
												type: 'warning',								
												confirmButtonClass: 'btn btn-confirm mt-2'				
											}) 
										 }*/
									 }
                        		});	
								
							} else {
								swal({
								  title: finished_txt,
								  //text: 'You clicked the button!',
								  type: 'success',
								  confirmButtonClass: 'btn btn-confirm mt-2'
							    })
								
								setTimeout(function(){ location.reload(); }, 2000);
							}						
							
					   }else{
						    swal({
								title: not_txt,
								//text: "You won't be able to revert this!",
								type: 'warning',								
								confirmButtonClass: 'btn btn-confirm mt-2'				
							}) 							
					  }  
				})
			}
		}
	
</script>

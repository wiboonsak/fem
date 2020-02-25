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
		function addText() {
			var topic_th = $('#topic_th').val();
			var topic_en = $('#topic_en').val();
			if(topic_th==''){
				alert('กรุณาใส่ข้อความภาษาไทย');
				return false;
				
			}else if(topic_en==''){
				alert('กรุณาใส่ข้อความภาษาอังกฤษ');
				return false;
				
			}else{  
				$.post('<?php echo base_url('control/AddTextSlide')?>' , { name_th : topic_th , name_en : topic_en } , function(data){
					   if(data==1){
						   $('#topic_th').val('');
						   $('#topic_en').val('');
						   
							swal({
								title: 'เพิ่มข้อมูลสำเร็จแล้ว',
								//text: 'You clicked the button!',
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'
							})  
						   listData();
							
					   }else{
						    swal({
								title: 'ไม่สามารถเพิ่มข้อมูลได้!',
								//text: "You won't be able to revert this!",
								type: 'warning',								
								confirmButtonClass: 'btn btn-confirm mt-2'								
							}) 							
					   }
				})
			}
		}
	
	//----------------------
	function listData(){
		$.post('<?php echo base_url('control/listTextSlide')?>' , { } , function(data){
			$('#showData').html(data);
		})
	}
	$(document).ready(function(){ 
		$('#btnUpdate').hide();  listData();
	/////////////////////////////////
		
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
	function edit_textSlide(dataID,name_th,name_en){
		
		$('#topic_th').val(name_th);
		$('#topic_th').focus();
		$('#topic_en').val(name_en);
		$('#dataID').val(dataID);
		$('#btnAdd').hide();
		$('#btnUpdate').show();
	} 
	
	//----------------------
	function updateText() {
		var name_th = $('#topic_th').val();
		var name_en = $('#topic_en').val();
		var dataID = $('#dataID').val();
		if(name_th==''){
			alert('กรุณาใส่ข้อความภาษาไทย');
			return false;
				
		}else if(name_en==''){
			alert('กรุณาใส่ข้อความภาษาอังกฤษ');
			return false;
				
		}else{  
			$.post('<?php echo base_url('control/update_Text')?>' , { name_th : name_th , name_en : name_en , dataID : dataID }, function(data){
				if(data==1){
					$('#topic_th').val('');
					$('#topic_en').val('');
					$('#dataID').val('');
					$('#btnAdd').show();
					$('#btnUpdate').hide();
						   
					swal({
						title: 'แก้ไขข้อมูลสำเร็จแล้ว',
						//text: 'You clicked the button!',
						type: 'success',
						confirmButtonClass: 'btn btn-confirm mt-2'
					})  
				    listData();
							
				}else{
					swal({
						title: 'ไม่สามารถแก้ไขข้อมูลได้!',
						//text: "You won't be able to revert this!",
						type: 'warning',								
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 							
				}
			})
		}
	}
	
	//----------------------
	function check_frmSlideIMG() {
		
			var topic_th = $('#topic_th').val();
			var topic_en = $('#topic_en').val();
			var image_name = $('#image_name').val();
			//var image_name = $("input[name*='old_file1']").val();
		    var dataID = $('#dataID').val();		   
		
			if(topic_th==''){
				alert('กรุณาใส่ข้อความภาษาไทย');
				return false;
				
			}else if(topic_en==''){
				alert('กรุณาใส่ข้อความภาษาอังกฤษ');
				return false;
				
			}else if((image_name =='') && (dataID=='')){
				
				alert('กรุณาเลือกรูปภาพ');
				return false;	
				
			//}else if(($('#image_name').val() !='') && (dataID!='')){
				
			//	$("input[name*='old_file1']").val('have');		
				
			}else if(($("input[name*='old_file1']").val() =='') && (dataID!='')){
				
				alert('กรุณาเลือกรูปภาพ');
				return false;				
				
			}else{  
				var form_data = $('#frm1').serialize();
				
				if(dataID != ''){
					
				   var nameFunction = 'edit_slideIMG';
				   var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   
					
				} else {
				   var nameFunction = 'add_slideIMG';
				   var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';				  
				}
				
				$.post('<?php echo base_url('control/')?>'+nameFunction , { form_data : form_data , dataID : dataID }, function(data){
					
					   if(data!= '0'){						   
						   
						    if(image_name != ''){
								
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
											  setTimeout(function(){ window.location.href = "<?php echo base_url('control/addSlideIMG/')?>"+data; }, 2000);
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
								
								setTimeout(function(){ window.location.href = "<?php echo base_url('control/addSlideIMG/')?>"+data; }, 2000);
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
	
	function setShow_onWeb(dataID , val2 , table){  
		
		var changeCheckbox = document.querySelector('.js-check-change');		
  		var x = changeCheckbox.checked; 		
		
		if(val2 == '0'){
		   var check = '1';
		}
		if(val2 == '1'){
		   var check = '0';
		}
		
		$.post('<?php echo base_url('control/set_ShowOnWeb')?>' , { dataID : dataID , check : check , table : table }  , function(data){
			if(data==1){
				$('#ch'+dataID).val(check);
				swal({
					title: 'แก้ไขข้อมูลสำเร็จแล้ว',
					//text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn btn-confirm mt-2'
				})  
				listData();
							
			}else{
				swal({
					title: 'ไม่สามารถแก้ไขข้อมูลได้!',
					//text: "You won't be able to revert this!",
					type: 'warning',								
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) 							
			}
		})
	}
	
	//----------------------
	
	function delete_data(dataID,table,ch){  
	
		swal({
           title: 'ต้องการลบข้อมูลนี้?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'ลบข้อมูล'
        }).then(function () {
			
		   $.post('<?php echo base_url('control/deleteData')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'ลบข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }).then(okay => {
					   if (okay) {
						   
						   if(ch == '1'){
							   listData();
						   } else {
							   location.reload();
						   }
						   
					   }
					})				
				}else{
					swal({
						title: 'ไม่สามารถลบข้อมูลได้!',
						//text: "You won't be able to revert this!",
						type: 'warning',								
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 							
				}
			})	
		})
	} 
	
	//----------------------
	
	$( ".fileupload-exists" ).click(function() {  
  		$("#upload_preview").empty();
		$("#upload_preview").addClass("fileupload-exists");
		$("#upload_new").removeClass("fileupload-exists");
		$("#first_pic").val("");
		$("[data-provides=fileupload]").removeClass("fileupload-exists");					
		$("[data-provides=fileupload]").addClass("fileupload-new");	
		$("input[name*='old_file1']").val("");
	}); 
	
	//----------------------
	function removeFile(dataID,file_name,txt1,table,field,ch){ 
		
		var txt2 = 'ต้องการลบ'+txt1+'นี้ ?';
		
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
							$('#'+field+dataID).val('');
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
	
	function Change2(){
		if(($('#image_name').val() !='') && ($('#dataID').val() !='')){
				
				$("input[name*='old_file1']").val('have');
		} /*else {
			$("input[name*='old_file1']").val('');
		}*/
	}
	
</script>

<script src="<?php echo base_url('assets/plugins/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js')?>"></script>
<!--<script src="<?php //echo base_url('assets/js/autoNumeric-1.9.41.js')?>"></script>-->
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script> 
<script src="<?php echo base_url('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')?>"></script> 
<script src="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')?>"></script>

<!--Summernote js-->
        <script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
       
<script>
		function addNewsCate() {
			var name_th = $('#name_th').val();
			var name_en = $('#name_en').val();
			if(name_th==''){
				alert('กรุณาใส่หมวดข่าวสารภาษาไทย');
				return false;
				
			}else if(name_en==''){
				alert('กรุณาใส่หมวดข่าวสารภาษาอังกฤษ');
				return false;
				
			}else{  
				$.post('<?php echo base_url('control/AddNewsCate')?>' , { name_th : name_th , name_en : name_en }
					   , function(data){
					   if(data==1){
						   $('#name_th').val('');
						   $('#name_en').val('');
						   
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
		$.post('<?php echo base_url('control/listNewsCategory')?>' , { } , function(data){
			$('#showData').html(data);
		})
	}
	$(document).ready(function(){ 
		$('#btnUpdate').hide();  listData();
	/////////////////////////////////
		
	/*tinymce.init({
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
	});*/
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
		
		
		
		
		// jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 350,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });

               
            //});
		
		
		
		$('#file_th , #file_en').filestyle({
		 	input : false, 
		 	iconName : 'mdi mdi-database',
			badge : true,
		 	text : 'Select file',
		 	btnClass : 'btn btn-custom btn-file'	
		}); 
	
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
	function edit_newsCategory(dataID,name_th,name_en){
		
		$('#name_th').val(name_th);
		$('#name_th').focus();
		$('#name_en').val(name_en);
		$('#dataID').val(dataID);
		$('#btnAdd').hide();
		$('#btnUpdate').show();
	} 
	
	//----------------------
	function update_NewsCate() {
		var name_th = $('#name_th').val();
		var name_en = $('#name_en').val();
		var dataID = $('#dataID').val();
		if(name_th==''){
			alert('กรุณาใส่หมวดข่าวสารภาษาไทย');
			return false;
				
		}else if(name_en==''){
			alert('กรุณาใส่หมวดข่าวสารภาษาอังกฤษ');
			return false;
				
		}else{  
			$.post('<?php echo base_url('control/updateNewsCate')?>' , { name_th : name_th , name_en : name_en , dataID : dataID }, function(data){
				if(data==1){
					$('#name_th').val('');
					$('#name_en').val('');
					$('#dataID').val('');
						   
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
	function delete_newsCategory(dataID){
		
		swal({
           title: 'ต้องการลบข้อมูลนี้?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'ลบข้อมูล'
        }).then(function () {
			
		   $.post('<?php echo base_url('control/deleteNewsCategory')?>' , { dataID : dataID }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'ลบข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    })
					listData();
		   		}else{
					swal({
						title: 'ไม่สามารถลบข้อมูลได้!',
						text: "เนื่องจากยังมีข้อมูลข่าวสารอยู่ภายในหมวดนี้",
						type: 'warning',								
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 							
				}
			})	
		})	 
	}
	
	//----------------------	
	
	function check_frmNewsdata() {
		
			var category_id = $('#category_id').val();
			var topic_th = $('#topic_th').val();
			var topic_en = $('#topic_en').val();
		
			if(category_id ==''){
				alert('กรุณาระบุหมวดข่าวสาร');
				return false;
				$('#category_id').focus();
				
			}else if(topic_th ==''){
				alert('กรุณาใส่หัวข้อข่าวสารภาษาไทย');
				return false;
				$('#topic_th').focus();
			
			}else if(topic_en ==''){
				alert('กรุณาใส่หัวข้อข่าวสารภาษาอังกฤษ');
				return false;				
				$('#topic_en').focus();
			}else{  
				
				var form_data = $('#frm1').serialize();
				var first_pic = $('#first_pic').val();
				var file_name = $('#file_name2').val();
				//var detail_th = tinyMCE.editors[$('#detail_th').attr('id')].getContent();
				//var detail_en = tinyMCE.editors[$('#detail_en').attr('id')].getContent();	
				var detail_th = $('#detail_th').summernote('code');
				var detail_en = $('#detail_en').summernote('code'); 
				
				var dataID = $('#dataID').val();
				
				if(dataID != ''){
					
				   var nameFunction = 'EditDataNews';
				   var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';	
					
				} else {
				   var nameFunction = 'AddDataNews';
				   var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';	
				}
				
				$.post('<?php echo base_url('control/')?>'+nameFunction , { form_data : form_data , detail_th : detail_th , detail_en : detail_en , dataID : dataID }, function(data){
					
					   if(data!= '0'){						   
						   
						    if((first_pic != '') || (file_name != '')){								
								
								var postData = new FormData($("#frm2")[0]);
								
								 $.ajax({
									 type:'POST',
									 url:'<?php echo base_url('control/upload_first_pic/')?>'+data,
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
										 //window.location.href = "<?php //echo base_url('control/AddNews/')?>"+data;
											 
										 setTimeout(function(){ window.location.href = "<?php echo base_url('control/AddNews/')?>"+data; }, 2000);	 
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
								
								//window.location.href = "<?php //echo base_url('control/AddNews/')?>"+data;
								setTimeout(function(){ window.location.href = "<?php echo base_url('control/AddNews/')?>"+data; }, 2000);	
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
	}); 
	
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
	
	function delete_data(dataID,table){  
	
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
						   location.reload();
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
	function removeFile(dataID,file_name,txt1,table,field){ 
		
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
							$('#old_file').val('');
						    $('#up_file').show();
							$('#aFile').hide();
							$('#aFile2').hide();  
						   }
						   
						   if(txt1 == 'รูปภาพ'){
							$("#upload_preview").empty();
							$("#upload_preview").addClass("fileupload-exists");
							$("#upload_new").removeClass("fileupload-exists");
							$("#first_pic").val("");
							$("#old_pic").val("");
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
	//----------------------
	
	function modal_setUser(category_id , category_name){	
		
		// arr2.length = 0;		
		 $.post('<?php echo base_url('control/get_user')?>' , { category_id : category_id }, function(data){
				$('#myModalLabel').text('กำหนดผู้ดูแล หมวด '+category_name);
			 	$('.modal-body').empty();
			 	$('.modal-body').html(data);
		 		$('#myModal33').modal('show'); 
			 	$('#cateId').val(category_id);
		 
		 })
	}
	//----------------------
	
	function selectUser(userID){
	
		if($("#check"+userID).prop("checked")){ 
			//alert('Is checked');
			selectUser2(userID);

		} else {  //alert('uncheck');
			
			//if($('#allUserId').val() !=''){ alert('1');
			   unselectUser(userID);
			
			/*} else { alert('2');
			  selectUser2(userID);		
			}*/
			
		}
	}
	//----------------------
	
	//var arr2 = Array(); 
	function selectUser2(userID){
		
		var cateId = $('#cateId').val();
		$.post('<?php echo base_url('control/insertUser_newsCategory')?>' , { userID : userID , cateId : cateId }, function(data){ 	})
		
	
		/*if((arr2.length == 0) && ($('#allUserId').val() !='')){
			
			var gg = $('#allUserId').val();   console.log(gg);
			var strx = gg.split(',');
			arr2 = strx;
			
			if(jQuery.inArray(userID , arr2) != -1) {  //alert('11');
				arr2.splice(arr2.indexOf(userID),1);			

			} else {  // alert('21');
				arr2.push(userID);
			}
		
		} else {
			
			if(jQuery.inArray(userID , arr2) != -1) {  //alert('12');
				arr2.splice(arr2.indexOf(userID),1);			

			}else{  // alert('22');
				arr2.push(userID);
			}
			arr2.push(userID);
		}*/
		
		
		
		
		/*
		 	
		
		if($('#allUserId2').val() !=''){
			
			if(arr2.length() ==0){
				
				var gg =	$('#allUserId2').val();   console.log(gg);
			var strx   = gg.split(',');
			
			
		 //  arr2 = arr2.concat(strx);
		  arr2 = strx;
			}
			
			
			
		  		
			
			if(jQuery.inArray(userID , arr2) != -1) {  alert('11');
				arr2.splice(arr2.indexOf(userID),1);			

			}else{   alert('21');
				arr2.push(userID);
			}
			
		} else {
			
			if(jQuery.inArray(userID , arr2) != -1) {  alert('12');
				arr2.splice(arr2.indexOf(userID),1);			

			}else{   alert('22');
				arr2.push(userID);
			}	 
		}*/
		//$('#allUserId').val(arr2);     
		//console.log("arr   "+$('#allUserId').val());
	}
	//-------------------------------
	
	function unselectUser(userID){
		
		var cateId = $('#cateId').val();
		$.post('<?php echo base_url('control/deleteUser_newsCategory')?>' , { userID : userID , cateId : cateId }, function(data){ 	})
		
	}	
	//-------------------------------
	
	function save_selectUser(){
		
		/*var allUserId = $('#allUserId').val();
		var cateId = $('#cateId').val();
		
		if(allUserId !=''){
			
			$.post('<?php// echo base_url('control/insertUser_newsCategory')?>' , { allUserId : allUserId , cateId : cateId }, function(data){
				
				if(data ==1){
				   swal({
                        title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }).then(okay => {
					   if (okay) {						   
						  $('#myModal33').modal('hide'); 
						  location.reload(); 
					   }
					})
				}				
			})
		   
		} else {
			return false
		}*/
		swal({
                        title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }).then(okay => {
					   if (okay) {						   
						  $('#myModal33').modal('hide'); 
						  location.reload(); 
					   }
					})
	}
	//-------------------------------
	
	function deleteFile(dataID,fileName){
		
		swal({
           title: 'ต้องการลบไฟล์นี้ ?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'ลบ'
        }).then(function (){
			
				$.post('<?php echo base_url('control/delete_file')?>' , { dataID : dataID , fileName : fileName }, function(data){ 
					if(data ==1){
						swal({
						   title: 'ลบไฟล์เรียบร้อยแล้ว',
						   //text: "Your file has been deleted",
						   type: 'success',
						   confirmButtonClass: 'btn btn-confirm mt-2'
						}).then(okay => {
						   if (okay) {
							  location.reload();
						   }
						})	
					}
				})
		})    
	}
	//-------------------------------
	
</script>

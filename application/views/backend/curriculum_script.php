<?php $checkURL02 = $this->uri->segment(3);
	  $classIcon = '';	

	  if(isset($checkURL02)){
		  $show = '';		
		  $curriculumDataX = $this->curriculum_model->list_curriculumsData($show,$checkURL02);
		  
		  $countRows = 	$curriculumDataX->num_rows();
		  if($countRows>0) {
		  foreach($curriculumDataX->result() as $curriculumDataY){	}
		  $classIcon = $curriculumDataY->icon_class;
	  } } 

?>


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

<!--Summernote js-->
        <script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
       
<script>		
	$(document).ready(function(){ 
				
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
	
	$('.summernote').summernote({
                    height: 350,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
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
		
	/////////////////////////////////	
		
	var url3 = '<?php echo $checkURL02;?>';	
	var	classIcon = '<?php echo $classIcon;?>';
		
	if((url3 !='') && (classIcon !='')){
		
		var classIcon2 = classIcon.replace(' ', '.');
		
		$('.'+classIcon2+'.icon-click').removeClass("icon-click");
		$('.'+classIcon2).addClass('select-icon');			
	}	
		
	
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
	function check_frmCurriculum() {
		
			var curriculum_nameTH = $('#curriculum_nameTH').val();
			var curriculum_nameEN = $('#curriculum_nameEN').val();
			var file_nameTH = $('#file_nameTH').val();
			var file_nameEN = $('#file_nameEN').val();
			var url = $('#url').val();
			var icon_class = $('#icon_class').val();
			
		    var dataID = $('#dataID').val();		   
		
			if(curriculum_nameTH==''){
				alert('กรุณาใส่ข้อความภาษาไทย');
				return false;
				
			}else if(curriculum_nameEN==''){
				alert('กรุณาใส่ข้อความภาษาอังกฤษ');
				return false;		
				
			}else{  
				var form_data = $('#frm1').serialize();
				
				if(dataID != ''){
					
				   var nameFunction = 'edit_curriculumData';
				   var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   
					
				} else {
				   var nameFunction = 'add_curriculumData';
				   var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
				   var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';				  
				}
				
				$.post('<?php echo base_url('control/')?>'+nameFunction , { curriculum_nameTH : curriculum_nameTH , curriculum_nameEN : curriculum_nameEN , dataID : dataID , url : url , icon_class : icon_class }, function(data){
					
					   if(data!= '0'){						   
						   
						    if((file_nameTH != '') || (file_nameEN != '')){
								
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
											  setTimeout(function(){ window.location.href = "<?php echo base_url('control/curriculumAdd/')?>"+data; }, 2000);
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
								
								setTimeout(function(){ window.location.href = "<?php echo base_url('control/curriculumAdd/')?>"+data; }, 2000);
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
		//$("input[name*='old_file1']").val("");
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
	///////////////////////////////////////////////
	
	function add_description(){
		
		var desc_th = $('#desc_th').val();
		var desc_en = $('#desc_en').val();
		var check = $('#check').val();
		
		 if((desc_th != '') || (desc_en != '')){
			 
			  $.post('<?php echo base_url('control/addDescription')?>' , { desc_th : desc_th , desc_en : desc_en , check : check }, 
			     function(data){
					if(data==1){ 
						swal({
							title: 'แก้ไขข้อมูลสำเร็จแล้ว',
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
							title: 'ไม่สามารถแก้ไขข้อมูลได้!',
							//text: "You won't be able to revert this!",
							type: 'warning',								
							confirmButtonClass: 'btn btn-confirm mt-2'
						}) 							
					}
			})	
			 
		 } else {
			 return false
		 }
		
	} 
	
	//----------------------
	function check_frmTopic() {
		
		var topic_th = $('#topic_th').val();
		var topic_en = $('#topic_en').val();
		//var detail_th = tinyMCE.editors[$('#detail_th').attr('id')].getContent();
		//var detail_en = tinyMCE.editors[$('#detail_en').attr('id')].getContent();
		var detail_th = $('#detail_th').summernote('code');
		var detail_en = $('#detail_en').summernote('code');
			
		var dataID = $('#dataID').val();		   
		
		if(topic_th==''){
			alert('กรุณาใส่หัวข้อภาษาไทย');
			return false;
				
		}else if(topic_en==''){
			alert('กรุณาใส่หัวข้อภาษาอังกฤษ');
			return false;		
				
		}else{  
				//var form_data = $('#frm1').serialize();
				
			if(dataID != ''){
					
				var nameFunction = 'edit_otherTopicData';
				var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
				var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   
					
			} else {
				var nameFunction = 'add_otherTopicData';
				var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
				var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';				  
			}
				
			$.post('<?php echo base_url('control/')?>'+nameFunction , { topic_th : topic_th , topic_en : topic_en , dataID : dataID , detail_th : detail_th , detail_en : detail_en }, function(data){
					
			if(data!= '0'){						   
						    
				swal({
					title: finished_txt,
					//text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn btn-confirm mt-2'
				})
								
				setTimeout(function(){ window.location.href = "<?php echo base_url('control/AddOtherTopic/')?>"+data; }, 2000);	
							
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
	
	$( ".icon-click" ).click(function() { 
		$(".select-icon").addClass("icon-click");
		$(".select-icon").removeClass("select-icon");
		$(this).removeClass("icon-click");
		var class2 = $(this).attr("class"); 
		$(this).addClass("select-icon");
		 console.log("class2...."+class2);
		
		//var class3 = 
		$("#icon_class").val(class2);
										
	}); 	
	
</script>

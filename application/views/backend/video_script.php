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
	
	function listData(){
		$.post('<?php echo base_url('News/listNewsCategory')?>' , { } , function(data){
			$('#showData').html(data);
		})
	}
	$(document).ready(function(){ 
		//$('#btnUpdate').hide();  listData();
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
		ordering : true ,
		pageLength : 30 ,
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
	function check_frm() {
			var topic_th = $('#topic_th').val();
			var topic_en = $('#topic_en').val();
			var link = $('#link').val();
			if(topic_th==''){
				alert('กรุณาใส่หัวข้อภาษาไทย');
				return false;
				
			}else if(topic_en==''){
				alert('กรุณาใส่หัวข้อภาษาอังกฤษ');
				return false;
				
			}else{  
				$.post('<?php echo base_url('control/AddLink_data')?>' , { name_th : topic_th , name_en : topic_en , link : link } , function(data){
					   if(data==1){
						   $('#topic_th').val('');
						   $('#topic_en').val('');
						   $('#link').val('');
						   
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
	
</script>

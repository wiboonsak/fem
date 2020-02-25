<?php $checkURL02 = $this->uri->segment(3);
	  $classIcon = '';	

	  if(isset($checkURL02)){
		  $show = ''; $font_back = 'b';		
		  $curriculumDataX = $this->researchCluster_model->list_researchClusters($show,$checkURL02,$font_back);
		  foreach($curriculumDataX->result() as $curriculumDataY){	}		  
		  $classIcon = $curriculumDataY->icon_class;
	  }

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
       
<script>		
	$(document).ready(function(){ 
		$('#btnUpdate').hide();  
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
	function check_frmResearch() {
		
			var name_th = $('#name_th').val();
			var name_en = $('#name_en').val();
			var contact_nameTH = $('#contact_nameTH').val();
			var contact_nameEN = $('#contact_nameEN').val();			
		    var dataID = $('#dataID').val();		   
		
			if(name_th==''){
				alert('กรุณาใส่ชื่อกลุ่มการวิจัยภาษาไทย');
				return false;
				
			}else if(name_en==''){
				alert('กรุณาใส่ชื่อกลุ่มการวิจัยภาษาอังกฤษ');
				return false;
				
			}else if(contact_nameTH==''){
				alert('กรุณาใส่ชื่อ-นามสกุล ผู้ติดต่อภาษาไทย');
				return false;
				
			}else if(contact_nameEN==''){
				alert('กรุณาใส่ชื่อ-นามสกุล ผู้ติดต่อภาษาอังกฤษ');
				return false;						
				
			}else{  
				  
				var form_data = $('#frm1').serialize();
				
				if(dataID != ''){

					var nameFunction = 'edit_researchClusterData';
					var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
					var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   

				} else {
					var nameFunction = 'add_researchClusterData';
					var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
					var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';				  
				}

				$.post('<?php echo base_url('control/')?>'+nameFunction , { form_data : form_data , dataID : dataID }, function(data){

				if(data!= '0'){						   

					swal({
						title: finished_txt,
						//text: 'You clicked the button!',
						type: 'success',
						confirmButtonClass: 'btn btn-confirm mt-2'
					})

					setTimeout(function(){ window.location.href = "<?php echo base_url('control/researchClusterAdd/')?>"+data; }, 2000);	

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

</html>
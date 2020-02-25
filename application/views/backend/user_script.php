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
		$.post('<?php echo base_url('Control/userAll')?>' , { } , function(data){
			$('#showData').html(data);
		})
	}
	$(document).ready(function(){ 
		//$('#btnUpdate').hide();  
		listData();
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
	function setPermission(userID,menuId,chPermission,menu_url) {
		
		if(chPermission == '1'){
			var permission = '2';
		}
		if(chPermission == '2'){
			var permission = '1';
		}
		/*	alert('กรุณาใส่หมวดข่าวสารภาษาไทย');
			return false;
				
		}else if(name_en==''){
			alert('กรุณาใส่หมวดข่าวสารภาษาอังกฤษ');
			return false;
				
		}else{*/  console.log(menu_url);	
			$.post('<?php echo base_url('Control/do_setPermission')?>' , { userID : userID , menuId : menuId , permission : permission , menu_url : menu_url }, function(data){
				if(data==1){	
					$("#ch"+menuId).val(permission);
					console.log(data);							
				}
			})
		//}
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
	function check_frmUser() {
		
			var name_sname = $('#name_sname').val();
			var user_name = $('#user_name').val();
			var password = $('#password').val();
			var hpass = $('#hpass').val();
			var email = $('#email').val();
			var position_level = $('#position_level').val();			
			var position_name = $('#position_name').val();			
		    var dataID = $('#dataID').val();		   
		
			if(name_sname==''){
				alert('กรุณาใส่ชื่อ-นามสกุล');
				return false;
				
			}else if(user_name==''){
				alert('กรุณาใส่ username');
				return false;
				
			}else if((password=='') && (hpass=='')){
				alert('กรุณาใส่รหัสผ่าน');
				return false;
				
			}else if(email==''){
				alert('กรุณาใส่ e-mail');
				return false;	
				
			}else if(position_level==''){
				alert('กรุณาเลือกประเภทบุคลากร');
				return false;	
				
			}else if(position_name==''){
				alert('กรุณาใส่ตำแหน่ง');
				return false;		
				
			}else{  
				  
				var form_data = $('#frm1').serialize();
				
				if(dataID != ''){

					var nameFunction = 'edit_userData';
					var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
					var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   

				} else {
					var nameFunction = 'add_userData';
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

					setTimeout(function(){ window.location.href = "<?php echo base_url('control/addUser/')?>"+data; }, 2000);	

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
	
	function editU(){
		$('#myModal').modal('show');
	}
	
	function showPermissionForm(){
		$('#myModal33').modal('show');  
	}
	
</script>

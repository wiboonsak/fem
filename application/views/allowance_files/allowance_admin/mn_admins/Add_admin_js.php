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

	<script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap-switch.min.js"></script>
	
	<!-- This is what you need -->
    <script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>

	<!-- Demo Settings -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>

	<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			var $table1 = jQuery('#table-1');
			
			// Initialize DataTable
			$table1.DataTable( {
				"order": [],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
            }); 
            $('<button type="button" class="btn btn-success btn-sm" style="margin-left: 15px;" onclick="addmember()">เพิ่มข้อมูล Admin</button>').insertAfter("#table-1_filter>label");
		} );
		//-----------------------------	

		function reload(){
			var delayInMilliseconds = 1000; //1 second

			setTimeout(function() {
				location.reload(true); 
			}, delayInMilliseconds);
        }
		//-----------------------------
			
		function DoJSON(data, api_link){
			return new Promise(function (resolve, reject){
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
		//-----------------------------	

		function addmember(){
            setTimeout(function (){
                window.location.href = "<?php echo base_url('Allowance/Add_Admin') ?>";
            });
        }
		//-----------------------------	
		
		function checkEmail(email,idemail){
			$.post('<?php echo base_url('Saraban/ch_emailmember') ?>', { email: email }, function (data){
				if(data > 0){
					   swal({
						title: "email ซ้ำกับผู้ใช้งานอื่น",
						//text: "email ตรงกับผู้ใช้งานอื่น",
						type: "error"
				   });
					var html2 = "<span style='color: red' class='spError'>กรุณาระบุ email อื่น</span>";
					$(html2).insertAfter("#" + idemail);
					return false;
				};
			});
		}	
		//-----------------------------------
		
		function chk_username(user){
			$.post('<?php echo base_url('Saraban/ch_usermember') ?>', { user: user }, function (data){
				if(data > 0){
					swal({
						title: "Username ซ้ำกับผู้ใช้งานอื่น",
						//text: "Username ตรงกับผู้ใช้งานอื่น",
						type: "error"
					});
					$('#user_name').val('');
					$('#user_name').focus();
					var html2 = "<span style='color: red' class='spError'>กรุณาระบุ Username อื่น</span>";
					$(html2).insertAfter("#user_name");
					return false;
				}            
			});
		}    
		//-----------------------------
		
		function selectPosition(position){

			if(position != ''){

			   if(position == '1'){
				   var title = 'สิทธิ์เข้าใช้ระบบ';
			   }
			   if(position == '2'){
				   var title = 'สิทธิ์การจัดการเอกสาร';
			   }

			   $.post('<?php echo base_url('Allowance2/modal_setPosition') ?>', { position : position }, function (data){

				   $('#modal_title').text(title);
				   $('#modal_body').empty();
				   $('#modal_body').html(data);
				   $('#modal-1').modal('show');
			   })

			} else {		

				$('#reason_type').val('');
				$('#system_permissions').val('');
				txt_input.length = 0;
			}		
		}
		//-----------------------------
		
		function save_dataAdmin(){

				var format_mail=/^([a-zA-Z0-9]{1,})+([a-zA-Z0-9\_\-\.]{1,})+@([a-zA-Z0-9\-\_]{1,})+([.]{1,1})+([a-zA-Z0-9\-\_\.]{1,})$/;

				var dataID = $('#dataID').val();
				var titlename = $('#titlename').val();	
				var firstname = $('#firstname').val();	
				var lastname = $('#lastname').val();	
				var user_name = $('#user_name').val();	
				var password = $('#password').val();	
				var password_old = $('#password_old').val();	
				var Repeat = $('#Repeat').val();	
				var email = $('#email').val();	
				var group_type = $('#group_type').val();	
				var position = $('#position').val();	
				var reason_type = $('#reason_type').val();	
				var system_permissions = $('#system_permissions').val();	

                                if(titlename == ''){
                                    $('#titlename').focus();
					swal({
						title: "กรุณาระบุคำนำหน้าชื่อ Admin",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;
                                }else if(firstname ==''){

					//alert('กรุณาระบุชื่อ Admin');
					$('#firstname').focus();
					swal({
						title: "กรุณาระบุชื่อ Admin",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(lastname ==''){

					//alert('กรุณาระบุนามสกุล Admin');
					$('#lastname').focus();
					swal({
						title: "กรุณาระบุนามสกุล Admin",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(user_name ==''){

					//alert('กรุณาระบุ Username');
					$('#user_name').focus();
					swal({
						title: "กรุณาระบุ Username",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if((password =='') && (password_old =='')){

					//alert('กรุณาระบุรหัสผ่าน');
					$('#password').focus();
					swal({
						title: "กรุณาระบุรหัสผ่าน",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if((Repeat =='') && (password_old =='')){

					//alert('กรุณายืนยันรหัสผ่าน');
					$('#Repeat').focus();
					swal({
						title: "กรุณายืนยันรหัสผ่าน",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(email ==''){

					//alert('กรุณาระบุอีเมล์');
					$('#email').focus();
					swal({
						title: "กรุณาระบุอีเมล์",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(position ==''){

					//alert('กรุณาระบุอีเมล์');
					$('#position').focus();
					swal({
						title: "กรุณาระบุตำแหน่ง",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(group_type ==''){

					//alert('กรุณาระบุตำแหน่ง');
					$('#group_type').focus();
					swal({
						title: "กรุณาระบุตำแหน่ง",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(password != Repeat){

					//alert('การยืนยันรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่');
					$('#Repeat').focus();
					swal({
						title: "การยืนยันรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;

				} else if(!(format_mail.test(email))){

					//alert('รูปแบบอีเมล์ไม่ถูกต้อง');
					$('#email').focus();
					swal({
						title: "รูปแบบอีเมล์ไม่ถูกต้อง",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					return false;				

				} else if((group_type == '1') && (system_permissions =='')){

					//alert('กรุณากำหนดสิทธิ์เข้าใช้ระบบของ Admin');
					swal({
						title: "กรุณากำหนดสิทธิ์เข้าใช้ระบบของ Admin",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					selectPosition('1');				
					setTimeout(function(){ swal.close(); }, 2500);				
					return false;

				} else if((group_type == '2') && (reason_type =='')){

					//alert('กรุณากำหนดสิทธิ์การจัดการเอกสารของ Admin');
					swal({
						title: "กรุณากำหนดสิทธิ์การจัดการเอกสารของ Admin",
						type: "warning",
						closeOnConfirm: false,
						showLoaderOnConfirm: true  
					});
					selectPosition('2');
					setTimeout(function(){ swal.close(); }, 2500);
					return false;						

				}else{  

					var form_data = $('#frm1').serialize();

					if((dataID != '') && ((dataID != '0'))){

						var nameFunction = 'edit_dataAdmin';
						var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
						var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   

					} else {
						var nameFunction = 'insert_dataAdmin';
						var finished_txt = 'เพิ่มข้อมูลสำเร็จแล้ว';	
						var not_txt = 'ไม่สามารถเพิ่มข้อมูลได้!';				  
					}

					$.post('<?php echo base_url('Allowance2/')?>'+nameFunction , { form_data : form_data }, function(data){ 

						if(data != '0'){

							$('#dataID').val(data);	
							swal({
								title: finished_txt,
								//text: 'You clicked the button!',
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'
							})

							//setTimeout(function(){ window.location.href = "<?php //echo base_url('control/alumniDetail/')?>"+data; }, 2000);	

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
		//-----------------------------
		
		var txt_input = []; 
		function select_reasonType(check,val2,field){ 

			if(check == true){ 

			   txt_input.push(val2); 
			   //$('#'+field).val(txt_input);	*****	
			}
			if(check == false){ 

			   //if(jQuery.inArray(val2 , txt_input) != -1){
					var Index2 = txt_input.indexOf(val2); 					 
					txt_input.splice(Index2, 1);
					//$('#'+field).val(txt_input);	******
			   //}		   		   
			}	
			$('#'+field).val(txt_input);										 
		}
		//-----------------------------
		
		function save_setting(){

			var position = $('#position').val();		

			if(position == '1'){

			   $('#reason_type').val('');
			   $('#system_permissions').val(txt_input);
			}
			if(position == '2'){

			   $('#system_permissions').val('');
			   $('#reason_type').val(txt_input);
			}
			txt_input.length = 0;
			$('#modal-1').modal('hide');
		}
		//-----------------------------

		function setShow_onWeb(dataID,table2){  

			var val2 = $('#ch'+table2+dataID).val();

			if(val2 == '0'){
			   var check = '1';
			}
			if(val2 == '1'){
			   var check = '0';
			}
			if(table2 == '1'){
				var table = 'tbl_admin_allowance';  
			}
			if(table2 == '2'){
				var table = 'tbl_admin_saraban';   
			}
			$.post('<?php echo base_url('allowance/set_ShowOnWebauthor')?>' , { dataID : dataID , check : check , table : table }  , function(data){    
				if(data==1){ 
					$('#ch'+table2+dataID).val(check); 
					swal({
						title: 'Edit data successfully.',
						//text: 'You clicked the button!',
						type: 'success',
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) ; 
				}else{
					swal({
						title: "Data can't be edited.!",
						//text: "You won't be able to revert this!",
						type: 'warning',
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) ;
				}
			});
		}
	</script>

</body>
</html>
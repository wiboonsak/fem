<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js')?>"></script>
<!--<script src="<?php //echo base_url('assets/js/autoNumeric-1.9.41.js')?>"></script>-->
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script> 

<script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js')?>"></script> 
<script src="<?php echo base_url('assets/plugins/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')?>"></script>

<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js')?>"></script>
<script src="<?php echo base_url('js/jquery.mask.js')?>"></script>

<!-- Buttons examples -->
        <script src="<?php echo base_url('assets/plugins/datatables/dataTables.buttons.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/jszip.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/pdfmake.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/vfs_fonts.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.html5.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables/buttons.print.min.js')?>"></script>
        
<script>	
	
	$(document).ready(function(){ 
		//$('#btnUpdate').hide();  listData();
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
	$('input[name="ID_card"]').mask('0-0000-00000-00-0');	
	$('input[name="telephone"]').mask('000 000 0000');	
			
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
		
	//$('#table2').DataTable({
	var table = $('#table2').DataTable({	
		searching: true ,
		ordering : false ,
		pageLength : 15 ,
		//buttons: ['excel' , 'print'],
		lengthChange : false ,
		buttons: [
            /*{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },*/
			{
                extend: 'excel',
				title: 'ข้อมูลศิษย์เก่า (Alumni) คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            },
            {
                extend: 'print',
				title: 'ข้อมูลศิษย์เก่า (Alumni) คณะการจัดการสิ่งแวดล้อม มหาวิทยาลัยสงขลานครินทร์',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5 ]
                }
            }//,
           // 'colvis'
        ]
	} );
		
	table.buttons().container()
    .appendTo('#table2_wrapper .col-md-6:eq(0)');
	
		
		$('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ]
    } );
		
	
})	
	
	//----------------------
	function checkWidth() {
		var windowSize = $(window).width();
		if (windowSize <= 767) {
            $(".w2").css({"width": "65%"});
			$(".w1").css({"width": "35%"});
        }  else  {
			$(".w2 , .w1").removeAttr("style");
		}      
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
	
	function alumniRegis(){
		
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		var name = $('#name').val();
		var old_name = $('#old_name').val();
		var studentID_number = $('#ID_card').val();
		var email = $('#email').val();
		var telephone = $('#telephone').val();
		var password = $('#password').val();
		var password2 = $('#password2').val();   //console.log('...'+grecaptcha.getResponse());
		
		if(name ==''){
			
			if(lang == 'en'){
				var txt = 'Please insert your First & Last Name.';
			} else{
				var txt = 'กรุณาระบุชื่อและนามสกุลของท่าน';
			}			
			alert(txt);				
			$('#name').focus();
			return false;
			
		} else if(studentID_number ==''){
			if(lang == 'en'){
				var txt = 'Please insert your Passport Number.';
			} else{
				var txt = 'กรุณาระบุหมายเลขบัตรประจำตัวประชาชนของท่าน';
			}			
			alert(txt);				
			$('#ID_card').focus();
			return false;
		
		} else if(email ==''){
			if(lang == 'en'){
				var txt = 'Please insert your Email Address.';
			} else{
				var txt = 'กรุณาระบุ e-mail ของท่าน';
			}			
			alert(txt);				
			$('#email').focus();
			return false;
			
		} else if(telephone ==''){
			if(lang == 'en'){
				var txt = 'Please insert your Mobile Phone.';
			} else{
				var txt = 'กรุณาระบุเบอร์โทรของท่าน';
			}			
			alert(txt);				
			$('#telephone').focus();
			return false;
			
		} else if(password ==''){
			if(lang == 'en'){
				var txt = 'Please insert password.';
			} else{
				var txt = 'กรุณาระบุรหัสผ่าน';
			}			
			alert(txt);				
			$('#password').focus();
			return false;
			
		} else if(password2 ==''){
			if(lang == 'en'){
				var txt = 'Please insert confirm password.';
			} else{
				var txt = 'กรุณาระบุยืนยันรหัสผ่านอีกครั้ง';
			}			
			alert(txt);				
			$('#password2').focus();
			return false;
			
		} else if(password != password2){
			if(lang == 'en'){
				var txt = "Password and confirm password don't match.";
			} else{
				var txt = 'รหัสผ่าน กับยืนยันรหัสผ่านไม่ตรงกัน';
			}			
			alert(txt);				
			$('#password2').focus();
			return false;	
		
	//	} else if(){
			
			
	 /*	} else if(!$('#terms').is(':checked')){
			if(lang == 'en'){
				var txt = 'Please read and accept the terms & conditions.';
			} else{
				var txt = 'Please read and accept the terms & conditions.';
			}			
			alert(txt);	
			
		} else if($('#terms').is(':checked')){
			if(lang == 'en'){
				var txt = "Please click I'm not a robot";
			} else{
				var txt = 'กรุณาคลิกยืนยันว่าคุณไม่ใช่โปรแกรมอัตโนมัติ';
			}	
			$('#btnSubmit').prop('disabled', true);	
			alert(txt);				
			return false;
		*/	
/*		} else if(grecaptcha.getResponse() == ""){
            alert('Please click the reCAPTCHA checkbox');
            return false;
        	*/
		
		} else { 
			/*$.post('<?php// echo base_url('Alumni/AlumniRegister')?>' , { name : name , old_name : old_name , studentID_number : studentID_number , email : email , telephone : telephone , password : password }, function(data){ 
				if(data > 0){
					if(lang == 'en'){
						var txt = 'Thank you, Register Successful.';
					} else{
						var txt = 'Thank you, Register Successful.';
					}			
					alert(txt);
					window.location.href = "<?php// echo base_url('Alumni/Detail/')?>"+data;
				}
			})*/
			return true
		}  
	}
	
	//----------------------
	
	function alumniLogin(){
		
		var email = $('#email3').val();
		var password = $('#password3').val();	
		
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		if(email ==''){
			if(lang == 'en'){
				var txt = 'Please insert your Email Address.';
			} else{
				var txt = 'กรุณาระบุ e-mail ของท่าน';
			}			
			alert(txt);				
			$('#email3').focus();
			return false;
			
		} else if(password ==''){
			if(lang == 'en'){
				var txt = 'Please insert your password.';
			} else{
				var txt = 'กรุณาระบุรหัสผ่านของท่าน';
			}			
			alert(txt);				
			$('#password3').focus();
			return false;
		
		} else { 
			/*$.post('<?php// echo base_url('Alumni/AlumniLogin')?>' , { email : email , password : password }, function(data){ 
				
				if(data != '0'){
				   window.location.href = "<?php// echo base_url('Alumni/Detail/')?>"+data;	
					
				} else {
					
				    if(lang == 'en'){
						var txt = 'E-mail or Password Incorrect !';
					} else{
						var txt = 'อีเมล์หรือรหัสผ่านไม่ถูกต้อง';
					}			
					alert(txt);				
					$('#email3').focus();
					return false;					
				}
			
			})*/
			return true
		
		}
	}	
	//----------------------
	
	function alumniForgot(){
		
		var email = $('#email_forgot').val();			
		
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		if(email ==''){
			if(lang == 'en'){
				var txt = 'Please insert your Email Address.';
			} else{
				var txt = 'กรุณาระบุ e-mail ของท่าน';
			}			
			alert(txt);				
			$('#email_forgot').focus();
			return false;		
		
		} else { 
			/*$.post('<?php// echo base_url('Alumni/AlumniLogin')?>' , { email : email , password : password }, function(data){ 
				
				if(data != '0'){
				   window.location.href = "<?php// echo base_url('Alumni/Detail/')?>"+data;	
					
				} else {
					
				    if(lang == 'en'){
						var txt = 'E-mail or Password Incorrect !';
					} else{
						var txt = 'อีเมล์หรือรหัสผ่านไม่ถูกต้อง';
					}			
					alert(txt);				
					$('#email3').focus();
					return false;					
				}
			
			})*/
			return true
		
		}
	}	
	//----------------------
	
	function editSpan(){
		
		//var input = $('<input />', {'type': 'text','class': 'txtToInput', 'name': 'aname', 'value': $(this).html()});
		$('#btn1').hide();
		$('#btn2').show();
		
		var dataID = '<?php echo $this->uri->segment(3)?>';
		var numClass = $('.spantxt').length;	
		
		var arr = new Array('' , 'name', 'old_name', 'telephone' , 'email', 'ID_card', 'facebook' , 'ID_line', 'house_number', 'village_no', 'alley', 'road', 'district', 'prefecture' , 'province', 'postcode', 'institution_name' , 'institution_number' , 'institutionVillage_no', 'institution_alley' , 'institution_road', 'institution_district', 'institution_prefecture' ,'institution_province', 'institution_postcode', 'position' , 'Thesis_titleTH', 'Thesis_titleEN', 'adviser' , 'studentID_number', 'graduation_certificate');
		
		
		//console.log('...'+dataID);
		
		for(x=1; x <= numClass; x++){
			
			var spantxt = $('#spantxt'+x).text();
			var arrVal = arr[x];
			
			var input = $('<input />', {'type': 'text','class': 'txtToInput eydia-input form-control', 'name': arrVal, 'value': spantxt,'style': 'width:100%','onChange': 'editAlumniData(this.value ,\'' +dataID+'\' , \''+arrVal+'\')'});
		
			$('#spantxt'+x).replaceWith(input);			
		}		
	}
	
	//----------------------
	
	function editAlumniData2(){
		
		//var input = $('<input />', {'type': 'text','class': 'txtToInput', 'name': 'aname', 'value': $(this).html()});
		$('#btn2').hide();
		$('#btn1').show();
		
		//var dataID = '<?php //echo $this->uri->segment(3)?>';
		var numClass = $('.txtToInput').length;	
		
		var arr = new Array('' , 'name', 'old_name', 'telephone' , 'email', 'ID_card', 'facebook' , 'ID_line', 'house_number', 'village_no', 'alley', 'road', 'district', 'prefecture' , 'province', 'postcode', 'institution_name' , 'institution_number' , 'institutionVillage_no', 'institution_alley' , 'institution_road', 'institution_district', 'institution_prefecture' ,'institution_province', 'institution_postcode', 'position' , 'Thesis_titleTH', 'Thesis_titleEN', 'adviser' , 'studentID_number', 'graduation_certificate');		
		
		//console.log('...'+numClass);
		
		for(x=1; x <= numClass; x++){     
			//console.log($('[name="'+arr[x]+'"]').val());
			//var x = parseInt(x);
			var arrVal = arr[x];
			var spantxt = $('[name="'+arr[x]+'"]').val();  
						
			var span = $('<span />', {'id': 'spantxt'+x,'class': 'spantxt'});
		
			//$('#spantxt'+x).replaceWith(span);
			//$("input[name*='"+arrVal+"']").replaceWith(span);
			$('[name="'+arr[x]+'"]').replaceWith(span);
			$('#spantxt'+x).text(spantxt);			
		}		
	}
	
	//----------------------
	
	function editAlumniData(val2 , dataID , field){
		
		//console.log('...'+dataID);
		//console.log('...'+field);
		
		$.post('<?php echo base_url('Alumni/edit_alumniData')?>' , { val2 : val2 , dataID : dataID , field : field }, function(data){ 	})		
	}
	
	//----------------------
	
	function search_alumni(){
		
		var txt_search = $('#txt_search').val();
		if(txt_search !=''){   //console.log('..'+txt_search);
			$.post('<?php echo base_url('Alumni/searchAlumni')?>' , { txt_search : txt_search }, 
			function(data){ 
				
				if(data == 0){
				    var lang = '<?php echo $this->session->userdata('weblang')?>';
					if(lang == 'en'){
						var txt = 'Data not found.';
					} else{
						var txt = 'ไม่พบข้อมูล';
					}			
					//alert(txt);		
					swal({
						title: txt,
						//text: "Your imaginary file is safe :)",
						type: 'error',
						confirmButtonClass: 'btn btn-confirm mt-2'
					})	
					$('#txt_search').val('');
				
			   }  else {
				   
				   var txt3 = '<?php echo $this->lang->line('RESULT_OF_SEARCH_MEMBER'); ?>';
				   
				   $('#main').empty();
				   $('#main').html(data);
				   $('#hhtt').text(txt3);
				   
			   }
			
			})		
		} 
	}
		
	//----------------------
		
	function check_frmAlumni() {
		
			var name_sname = $('#name').val();	
			var dataID = $('#dataID').val();	
		
			if(name_sname==''){
				alert('กรุณาใส่ชื่อ-นามสกุล');
				return false;			
				
			}else{  
				  
				var form_data = $('#frm1').serialize();
				
				if(dataID != ''){

					var nameFunction = 'edit_alumni';
					var finished_txt = 'แก้ไขข้อมูลสำเร็จแล้ว';	
					var not_txt = 'ไม่สามารถแก้ไขข้อมูลได้!';				   

				} else {
					var nameFunction = 'add_alumni';
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

					setTimeout(function(){ window.location.href = "<?php echo base_url('control/alumniDetail/')?>"+data; }, 2000);	

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
	
	function show_ForgotPassword(){ 
		$('#divLogin').hide();
		$('#divForgot').show();		
	}
	
//----------------------
	
	function makeaction(){  
      $('#btnSubmit').prop('disabled', false);
      $('#btn_alumni_login').prop('disabled', false);
      $('#btn_alumni_forgot').prop('disabled', false);
	  $('#checkVal').val('1');					  
	}
	
//----------------------	
	function add_description(){
		
		//var desc_th = $('#desc_th').val();
		//var desc_en = $('#desc_en').val();
		var desc_en = $('#desc_en').summernote('code');
		var desc_th = $('#desc_th').summernote('code'); 
		var check = $('#check').val();
		
		 if((desc_th != '') || (desc_en != '')){
			 
			  $.post('<?php echo base_url('control/addDescription_alumni')?>' , { desc_th : desc_th , desc_en : desc_en , check : check }, 
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
	function check_allField(){
		
		//var lang = '<?php //echo $this->session->userdata('weblang')?>';
		
		var name = $('#name').val();		
		var ID_card = $('#ID_card').val();
		var email = $('#email').val();
		var telephone = $('#telephone').val();
		var password = $('#password').val();
		var password2 = $('#password2').val();   
		var checkVal = $('#checkVal').val();   
		
		//console.log('...'+grecaptcha.getResponse());
		
		if((name !='') && (ID_card !='') && (email !='') && (telephone !='') && (password !='') && (password2 !='') && (checkVal =='')){
			
			$('#btnSubmit').prop('disabled', true);	
			
		} else if((name !='') && (ID_card !='') && (email !='') && (telephone !='') && (password !='') && (password2 !='') && (checkVal =='1')){
			
			$('#btnSubmit').prop('disabled', false);		
			
		} else {
			$('#btnSubmit').prop('disabled', false);	
		}	
		
	}
	
	//----------------------
	
	function checkPassword(){
		
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		var password = $('#password').val();
		var password2 = $('#password2').val();   //console.log('...'+grecaptcha.getResponse());
		
		if(password ==''){
			if(lang == 'en'){
				var txt = 'Please enter your new password.';
			} else{
				var txt = 'กรุณาระบุรหัสผ่านใหม่ของคุณ';
			}			
			alert(txt);				
			$('#password').focus();
			return false;
			
		} else if(password2 ==''){
			if(lang == 'en'){
				var txt = 'Please insert confirm password.';
			} else{
				var txt = 'กรุณาระบุยืนยันรหัสผ่านอีกครั้ง';
			}			
			alert(txt);				
			$('#password2').focus();
			return false;
			
		} else if(password != password2){
			if(lang == 'en'){
				var txt = "Password and confirm password don't match.";
			} else{
				var txt = 'รหัสผ่าน กับยืนยันรหัสผ่านไม่ตรงกัน';
			}			
			alert(txt);				
			$('#password2').focus();
			return false;	
		
	
		
		} else { 
			
			return true
		}  
	}
	
	/////////////////////////////////////////////////////	
	
	function saveNewPass(){  
			
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		var password = $('#password').val();
		var password2 = $('#password2').val(); 
		var myId = $('#user3').val();
		//console.log('...'+grecaptcha.getResponse());
		
		if(password ==''){
			if(lang == 'en'){
				var txt = 'Please enter your new password.';
			} else{
				var txt = 'กรุณาระบุรหัสผ่านใหม่ของคุณ';
			}			
			alert(txt);				
			$('#password').focus();
			return false;
			
		} else if(password2 ==''){
			if(lang == 'en'){
				var txt = 'Please insert confirm password.';
			} else{
				var txt = 'กรุณาระบุยืนยันรหัสผ่านอีกครั้ง';
			}			
			alert(txt);				
			$('#password2').focus();
			return false;
			
		} else if(password != password2){
			if(lang == 'en'){
				var txt = "Password and confirm password don't match.";
			} else{
				var txt = 'รหัสผ่าน กับยืนยันรหัสผ่านไม่ตรงกัน';
			}			
			alert(txt);				
			$('#password2').focus();
			return false;
							
			} else {  
				
				$.post('<?php echo base_url('Alumni/save_newPass')?>' , { Password : password , myId : myId }  , function(data){    
					
						
							if(data ==1){
							    if(lang == 'en'){
									var txt = "Your password has been reset successfully.";
								} else{
									var txt = 'รหัสผ่านของคุณได้รับการตั้งค่าใหม่เรียบร้อยแล้ว';
								}			
								alert(txt);
								window.location.href = "<?php echo base_url('Alumni')?>";	
							
							}						
						})						
						
					} 				
	}
	
	/////////////////////////////////////////////////////	
		
	$('#txt_search').keypress(function (e) {
	 var key = e.which;
	 if(key == 13){
		$('#search_alumni3').click();
		return false;  
	  }
	});
	
	/////////////////////////////////////////////////////	
	
	function isThaichar(str,obj){   
		var isThai=true;
		var orgi_text="ๅภถุึคตจขชๆไำพะัีรนยบลฃฟหกดเ้่าสวงผปแอิืทมใฝูฎฑธํ๊ณฯญฐฅฤฆฏโฌ็๋ษศซฉฮฺ์ฒฬฦabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
		var chk_text=str.split("");
		chk_text.filter(function(s){        
			if(orgi_text.indexOf(s)==-1){
				isThai=false;
				obj.value=str.replace(RegExp(s, "g"),'');
			}           
		}); 
		return isThai; // ถ้าเป็น true แสดงว่าเป็นภาษาไทยทั้งหมด*/
	}
	
	/////////////////////////////////////////////////////	
	
	function checkMail(str){
		
		var format_mail=/^([a-zA-Z0-9]{1,})+([a-zA-Z0-9\_\-\.]{1,})+@([a-zA-Z0-9\-\_]{1,})+([.]{1,1})+([a-zA-Z0-9\-\_\.]{1,})$/;
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		if(str !=''){
		
			if(!(format_mail.test(str))) {

				if(lang == 'en'){
					var txt = 'Email not valid!';
				} else{
					var txt = 'รูปแบบอีเมล์ไม่ถูกต้อง';
				}			
				alert(txt);	
				$('#email').focus();
				return false;
			
			} else {
				
				$.post('<?php echo base_url('Alumni/countMail')?>' , { mail : str }  , function(data){ 
				
					if(data >0){
					    if(lang == 'en'){
							var txt = 'This email is already a member.';
						} else{
							var txt = 'อีเมล์นี้เป็นสมาชิกศิษย์เก่าแล้ว';
						}			
						alert(txt);	
						$('#email').focus();
						return false;
					}			
				})
			} 
		}		
	}
	
	
</script>
<?php /*	$segment = $this->uri->segment(1);
		if(($this->session->userdata('chceckRegis') == '1') && ($segment == 'Alumni')){?>
<script>	
	
	$(document).ready(function(){ 
		var lang = '<?php echo $this->session->userdata('weblang')?>';
		
		if(lang == 'en'){
			
			var txt = 'Thank you, Register Successful.';
			
		} else{
			var txt = 'สมัครสมาชิกเรียบร้อยแล้ว';
		}			
		alert(txt);
	
	})

</script>
<?php } */ ?>
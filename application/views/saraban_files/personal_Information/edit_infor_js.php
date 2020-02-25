
    <!-- Bottom scripts (common) -->
    <script src="<?php echo base_url(); ?>assets_saraban/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/joinable.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/resizeable.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/neon-api.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="<?php echo base_url('assets_saraban/js/jquery.validate.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_saraban/js/jquery.inputmask.bundle.js'); ?>"></script>

    <!-- This is what you need -->
    <script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>
   

<script type="text/javascript">

                function reload(){
                        var delayInMilliseconds = 1000; //1 second

                        setTimeout(function() {
                            location.reload(true); 
                        }, delayInMilliseconds);
                    }

                    function DoJSON(data, api_link) {
                        return new Promise(function (resolve, reject) {
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


                    function validateEmail(email) {
                         var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                         return re.test(email);
               
                    }
                              function validateEmail2(email,idemail) {
                         var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                         
                       if(email == ''){
                           $('.spError').remove();
                           $('#'+idemail).removeClass('validate-has-error');
                       }  
                       else if ((re.test(email)== true) && (email != '')){
                           $('.spError').remove();
                           chk_email(email,idemail);
                       }else{
                           $('#'+idemail).addClass('validate-has-error');                           
                           var html2 = "<span style='color: red' class='spError'>กรุณาระบุ email ให้ถูกต้อง</span>";    
                           $(html2).insertAfter("#"+idemail);
                           //$('#email_error').html('กรุณาระบุ email ให้ถูกต้อง').css('color', 'red');
                       };
               
                    }
                    var chkemail = true;
                    function chk_email(email,idemail){

//                          var email    = $("#email").val();
if(email == ''){
                           $('.spError').remove();
                           $('#'+idemail).removeClass('validate-has-error');
                       } 
                           var id = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                          
                           var api_link = "<?php echo base_url(); ?>Allowance/chk_email";  
                                    
                        
                                        var data = {
                                                    id              : id,
                                                    email           : email
                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                            if(info == true){
                                            
                                                    swal({
                                                        title: "email ซ้ำ",
                                                        text: "email ตรงกับผู้ใช้งานอื่น",
                                                        type: "error"
                                                    },
                                                    function(){
                                                        $('#'+idemail).addClass('validate-has-error');
                                                        //$('#email_error').html('กรุณาระบุ email อื่น').css('color', 'red');
                                                        var html2 = "<span style='color: red' class='spError'>กรุณาระบุ email อื่น</span>";    
                                                        $(html2).insertAfter("#"+idemail);
                                                        chkemail = false;
                                                    });
                                                
                                                
                                            }else{
                                                 $('.spError').remove();
                                                 $('#'+idemail).removeClass('validate-has-error');
                                                 //$('#email_error').empty();
                                               chkemail = true;
                                            }
                                    });

                    }
                     var chkusername = true;
                    function chk_username(){

                          var user_name       = $("#user_name").val();

                           var id = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                          
                           var api_link = "<?php echo base_url(); ?>Allowance/chk_username";  
                                    
                        
                                        var data = {
                                                    id              : id,
                                                    user_name       : user_name
                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                            if(info == true){
                                            
                                                    swal({
                                                        title: "Username ซ้ำ",
                                                        text: "Username ตรงกับผู้ใช้งานอื่น",
                                                        type: "error"
                                                    },
                                                    function(){
                                                        $('#user_name').addClass('validate-has-error');
                                                        $('#user_name_error').html('กรุณาระบุ Username อื่น').css('color', 'red');
                                                        chkusername = false;
                                                    });
                                                
                                                
                                            }else{
                                                 $('#user_name').removeClass('validate-has-error');
                                                 $('#user_name_error').empty();
                                               chkusername = true;
                                            }
                                    });

                    }
                    function doreset(){

                            swal({
                                  title: "ยืนยันการล้างข้อความ?",
                                  type: "warning",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "Yes, reset it!",
                                  closeOnConfirm: false
                                },
                                function(){
                                        document.getElementById('user_name').value = infor[0].user_name;
                                        document.getElementById('email').value = infor[0].email;
                                        document.getElementById('titlename').value = infor[0].titlename;
                                        document.getElementById('firstname').value = infor[0].firstname;
                                        document.getElementById('lastname').value = infor[0].lastname;
                                        document.getElementById('telephone').value = infor[0].telephone;
                                        document.getElementById('position_level').value = infor[0].position_level;
                                        document.getElementById('position_name').value = infor[0].position_name;

                                         $('#email').removeClass('validate-has-error');
                                         $('#email_error').empty();
                                          $('#user_name').removeClass('validate-has-error');
                                         $('#user_name_error').empty();
                                          $('#titlename').removeClass('validate-has-error');
                                         $('#titlename_error').empty();
                                          $('#firstname').removeClass('validate-has-error');
                                         $('#firstname_error').empty();
                                          $('#lastname').removeClass('validate-has-error');
                                         $('#lastname_error').empty();
                                          $('#telephone').removeClass('validate-has-error');
                                         $('#telephone_error').empty();
                                          $('#position_level').removeClass('validate-has-error');
                                         $('#position_level_error').empty();
                                          $('#position_name').removeClass('validate-has-error');
                                         $('#position_name_error').empty();

                                     
                                  swal("เสร็จสิ้น","ยืนยันการล้างข้อความเสร็จสิ้น!","success");
                                });
                    }
                    
                    function dosubmit(){
                       

                           var user_name       = $("#user_name").val();
                           var email           = $("#email").val();
                           var firstname       = $("#firstname").val();
                           var lastname        = $("#lastname").val();
                           var telephone       = $("#telephone").val();
                           var position_level  = $("#position_level").val();
                           var position_name   = $("#position_name").val();
                           var titlename       = $("#titlename").val();
                           var idemail       = $("#idemail").val();



                            var chk = true;

                            if(user_name == "" ||user_name == null ){
                                    $('#user_name').addClass('validate-has-error'); 
                                    $('#user_name_error').html('กรุณาระบุ Username').css('color', 'red');    
                                    chk = false;
                            }
                         else if($("input.email3").filter(function(){ return $(this).val(); }).length < 1){
                                    $('#email').addClass('validate-has-error');
                                    $('#email_error').html('กรุณาระบุ email').css('color', 'red');
                                    chk = false;
                            }
//                         else   if( validateEmail(email) == false ){
//                                    $('#email').addClass('validate-has-error');
//                                    $('#email_error').html('กรุณาระบุ email ให้ถูกต้อง').css('color', 'red');
//                                    chk = false;
//                            }
                          else  if(titlename== "" || titlename == null){
                                    $('#titlename').addClass('validate-has-error');
                                    $('#titlename_error').html('กรุณาระบุ คำนำหน้าชื่อ').css('color', 'red');
                                    chk = false;
                            }
                           else  if(firstname== "" || firstname == null){
                                    $('#firstname').addClass('validate-has-error');
                                    $('#firstname_error').html('กรุณาระบุ ชื่อ').css('color', 'red');
                                    chk = false;
                            }
                            else  if(lastname == "" ||lastname == null ){
                                    $('#lastname').addClass('validate-has-error'); 
                                    $('#lastname_error').html('กรุณาระบุ นามสกุล').css('color', 'red');    
                                    chk = false;
                            }
                           else  if(telephone== "" ||telephone == null){
                                    $('#telephone').addClass('validate-has-error');
                                    $('#telephone_error').html('กรุณาระบุ เบอร์โทรศัพท์').css('color', 'red');
                                    chk = false;
                            }
                            else if(position_level== "" || position_level == null){
                                    $('#position_level').addClass('validate-has-error');
                                    $('#position_level_error').html('กรุณาระบุ ตำแหน่ง').css('color', 'red');
                                    chk = false;
                            }
                          else   if(position_name== "" || position_name == null){
                                    $('#position_name').addClass('validate-has-error');
                                    $('#position_name_error').html('กรุณาระบุ ชื่อตำแหน่ง').css('color', 'red');
                                    chk = false;
                            }

//                           else  if(chk == true && chkusername == true && chkemail == true){
                            else if(chk == true ){ 
                                  swal({
                                      title: "ยืนยันการแก้ไขข้อมูลส่วนตัว",
                                      text: "Submit to run ajax request",
                                      type: "info",
                                      showCancelButton: true,
                                      closeOnConfirm: false,
                                      showLoaderOnConfirm: true
                                    }, function () {
                                        var api_link = "<?php echo base_url(); ?>Saraban/edit_personal_Information"; 
                                    
                                        var id_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                                        var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
                                        var data = {
                                                    id              : id_update,
                                                    chk_authen      : chk_authen,
                                                    user_name       : user_name,
                                                    email           : email,
                                                    titlename       : titlename,
                                                    firstname       : firstname,
                                                    lastname        : lastname,
                                                    telephone       : telephone,
                                                    position_level  : position_level,
                                                    position_name   : position_name,
                                                    idemail         : idemail

                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                            if(info == true){
                                                setTimeout(function () {
                                                    swal({
                                                        title: "สำเร็จ",
                                                        text: "เปลี่ยนรหัสผ่านสำเร็จ",
                                                        type: "success"
                                                    },
                                                    function(){
                                                        reload();
                                                    });
                                                  }, 2000);
                                                
                                            }else if(info == "errorpass"){ 
                                                setTimeout(function () {
                                                swal({
                                                        title: "ไม่สำเร็จ",
                                                        text: "รหัสบัจจุบันไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง",
                                                        type: "error"
                                                    },
                                                    function(){
                                                         $('#old_Pass').addClass('validate-has-error'); 
                                                    });
                                                  }, 2000);
                                               
                                            }else{ 
                                                setTimeout(function () {
                                                swal({
                                                        title: "ไม่สำเร็จ",
                                                        text: "ไม่สามารถเปลี่ยนรหัสได้ กรุณาลองใหม่อีกครั้ง",
                                                        type: "error"
                                                    });
                                                  }, 2000);
                                            }
                                        });    
                                    });
                            
                           }else{
                                 $('#alert_error').html('***กรุณากรอกของมูลให้ครบถ้วน***').css('color', 'red');
                           }
                    }
    function dosubmit1() {
        var user_name = $("#user_name").val();
        var Password = $("#Password").val();
        var password_old = $("#password_old").val();
        var Repeat = $("#Repeat").val();
        var Repeat_old = $("#Repeat_old").val();
        var email = $("#email").val();
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var telephone = $("#telephone").val();
        var titlename = $("#titlename").val();
        var idemail = $("#idemail").val();
        var chk = true;
        if(user_name ==''){
            swal({
              title: "กรุณาใส่ user name ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            });
        }else if((Password == '')&&(password_old == '')){
             swal({
              title: "กรุณาใส่ Password ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            });
        }else if ((Repeat == '')&&(Repeat_old == '')){
                swal({
              title: "กรุณาใส่ Repeat Password ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
//          } else if ($("input.email3").filter(function () {
//            return $(this).val();
//        }).length < 1) {
//                swal({
//              title: "กรุณาใส่ E-mail ",
//                type: "warning",
//                closeOnConfirm: false,
//                showLoaderOnConfirm: true  
//            }); 
      
        }else{
                var postData = new FormData($("#frm1")[0]);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Saraban/addusermember') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status) {
                        //console.log(data);
                        $('#currentID').val(data);
                        if (status == 'success') {
                            swal({
                                title: 'บันทึกข้อมูลสำเร็จ.',
                                text: 'Saved successfully',
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                            setTimeout(function () {
                                window.location.href = "<?php echo base_url('Saraban/personal_Information') ?>";
                            }, 2000);
                        } else {
                            swal({
                                title: 'ไม่สามารถบันทึกข้อมูลได้!',
                                text: "Can not be saved.!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                        }
                    }
                });
                }
            }
                          //===============================
        function ADDemail(){
             
        var num = $('.email3').length;
        num = num + 1;
        $('#email_a').append("<br><input name='email[]' type='text' id='inputMail"+num+"' class='form-control form-control-sm email3' value=''>");
        var nameFN = "validateEmail2(this.value,'inputMail"+num+"')";
        $('#inputMail'+num).attr('onchange', nameFN);    
       
    
        }
             //================================
    function setDefault(checkvalue,id_input,id_email){
		if(checkvalue == true){
                    $('.chdefaultclass').prop('checked',false);
                    $('#'+id_input).prop('checked',true);
                    var data_status = '1';
                }
                if(checkvalue == false){
                     $('.chdefaultclass').prop('checked',false);
                     var data_status = '0';
                }
                 $.post('<?php echo base_url('Saraban/setDefault') ?>', {id_email: id_email, data_status: data_status});
	}
           //----------------------
	function deleteemail(dataID,table){  
		swal({
           title: 'ต้องการลบข้อมูลนี้?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'ลบข้อมูล'
    }, function () {
		   $.post('<?php echo base_url('Saraban/deleteemail')?>' , { dataID : dataID , table : table }, 
			function(data){
				//if(data>0){ 
                	swal({
                        title: 'ลบข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                     setTimeout(function () {
                        window.location.href = "<?php echo base_url('Saraban/personal_Information') ?>" ;
                    }, 2000);
				//	}else{
//					swal({
//						title: 'ไม่สามารถลบข้อมูลได้!',
//						//text: "You won't be able to revert this!",
//						type: 'warning',
//						confirmButtonClass: 'btn btn-confirm mt-2'
//					});
				//}
			});
                        });
                        
                        }
 //----------------------------------------------
	function checkpass(pass,user_name){  
        
		   $.post('<?php echo base_url('Saraban/checkpass')?>' , { pass : pass ,user_name:user_name},
			function(data){
                            //alert(data);
				if(data == 0){ 
                                    alert('รหัสผ่านเดิมไม่ถูกต้อง');
                                    $('#confirmPassword').val('');
                                    $('#confirmPassword').focus();
                                    $('#Password').attr('readonly', true);
                                $('#Repeat').attr('readonly', true);
                            }else{
                                $('#Password').attr('readonly', false);
                                $('#Repeat').attr('readonly', false);
                            }
			});
             
                        
                        }
                        function chpass(checkpass){
	var pass = $('#Password').val();
        if(pass != checkpass){
            alert('รหัสผ่านไม่ตรงกัน');
            $('#Repeat').val('');
            $('#Repeat').focus('');
            return false;
        }
	}
	
                         
            </script>
  </body>       
</html>
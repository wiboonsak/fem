
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

                    var chkemail = true;
                    function chk_email(){

                          var email    = $("#email").val();

                           var id = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                          
                           var api_link = "<?php echo base_url(); ?>Saraban/chk_email";  
                                    
                        
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
                                                        $('#email').addClass('validate-has-error');
                                                        $('#email_error').html('กรุณาระบุ email อื่น').css('color', 'red');
                                                        chkemail = false;
                                                    });
                                                
                                                
                                            }else{
                                                 $('#email').removeClass('validate-has-error');
                                                 $('#email_error').empty();
                                               chkemail = true;
                                            }
                                    });

                    }
                     var chkusername = true;
                    function chk_username(){

                          var user_name       = $("#user_name").val();

                           var id = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                          
                           var api_link = "<?php echo base_url(); ?>Saraban/chk_username";  
                                    
                        
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
                                        document.getElementById('firstname').value = infor[0].firstname;
                                        document.getElementById('lastname').value = infor[0].lastname;

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
                                          $('#position').removeClass('validate-has-error');
                                         $('#position_error').empty();

                                  swal("เสร็จสิ้น","ยืนยันการล้างข้อความเสร็จสิ้น!","success");
                                });
                    }
                    
                    
                    function dosubmit(){
                       

                           var user_name       = $("#user_name").val();
                           var email           = $("#email").val();
                           var titlename       = $("#titlename").val();
                           var firstname       = $("#firstname").val();
                           var lastname        = $("#lastname").val();
                           var position        = $("#position").val();

                            var chk = true;

                            if(user_name == "" ||user_name == null ){
                                    $('#user_name').addClass('validate-has-error'); 
                                    $('#user_name_error').html('กรุณาระบุ Username').css('color', 'red');    
                                    chk = false;
                            }
                            if(email== "" ||email == null){
                                    $('#email').addClass('validate-has-error');
                                    $('#email_error').html('กรุณาระบุ email').css('color', 'red');
                                    chk = false;
                            }
                            if( validateEmail(email) == false ){
                                    $('#email').addClass('validate-has-error');
                                    $('#email_error').html('กรุณาระบุ email ให้ถูกต้อง').css('color', 'red');
                                    chk = false;
                            }
                            if(titlename== "" || titlename == null){
                                    $('#titlename').addClass('validate-has-error');
                                    $('#titlename_error').html('กรุณาระบุ คำนำหน้า').css('color', 'red');
                                    chk = false;
                            }
                            if(firstname== "" || firstname == null){
                                    $('#firstname').addClass('validate-has-error');
                                    $('#firstname_error').html('กรุณาระบุ ชื่อ').css('color', 'red');
                                    chk = false;
                            }
                             if(lastname == "" ||lastname == null ){
                                    $('#lastname').addClass('validate-has-error'); 
                                    $('#lastname_error').html('กรุณาระบุ นามสกุล').css('color', 'red');    
                                    chk = false;
                            }
                               if(position == "" ||position == null ){
                                    $('#position').addClass('validate-has-error'); 
                                    $('#position_error').html('กรุณาตำแหน่ง').css('color', 'red');    
                                    chk = false;
                            }
                            if(chk == true && chkusername == true && chkemail == true){
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
                                                    position       : position,
                                                    lastname        : lastname
                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                            if(info == true){
                                                setTimeout(function () {
                                                    swal({
                                                        title: "สำเร็จ",
                                                        text: "แก้ไขข้อมูลส่วนตัวสำเร็จ",
                                                        type: "success"
                                                    },
                                                    function(){
                                                        reload();
                                                    });
                                                  }, 2000);
                                                
                                            }else{ 
                                                setTimeout(function () {
                                                swal({
                                                        title: "ไม่สำเร็จ",
                                                        text: "ไม่สามารถแก้ไขข้อมูลส่วนตัวได้ กรุณาลองใหม่อีกครั้ง",
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
         //===============================
        function ADDemail(){
             
        $('#email_a').append('<br><input name="email[]" type="text" class="form-control form-control-sm " value="">');
    
        }
                         
            </script>
    </body>       
</html>
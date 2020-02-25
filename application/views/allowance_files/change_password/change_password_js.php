
    <!-- Bottom scripts (common) -->
    <script src="<?php echo base_url(); ?>assets_saraban/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/joinable.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/resizeable.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/neon-api.js"></script>
    <script src="<?php echo base_url(); ?>assets_saraban/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


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
    

                        var statuschk5  = false;
                        var statuschk6  = false;
                         
               $("input[type=password]").keyup(function(){

                        if($("#new_pass").val() == $("#re_pass").val() && $("#re_pass").val() != "" ){
                               
                                $("#pwmatch").removeClass("glyphicon-remove");
                                $("#pwmatch").addClass("glyphicon-ok");
                                $("#pwmatch").css("color","#00A41E");
                                statuschk5  = true;
                        }else{
                              
                                $("#pwmatch").removeClass("glyphicon-ok");
                                $("#pwmatch").addClass("glyphicon-remove");
                                $("#pwmatch").css("color","#FF0004");
                                statuschk5 = false;
                        }
                        
                        if($("#new_pass").val() != $("#old_Pass").val() && $("#old_Pass").val() != "" && $("#new_pass").val() != "" ){
                               
                                $("#pwdup").removeClass("glyphicon-remove");
                                $("#pwdup").addClass("glyphicon-ok");
                                $("#pwdup").css("color","#00A41E");
                                statuschk6  = true;
                        }else{
                               
                                $("#pwdup").removeClass("glyphicon-ok");
                                $("#pwdup").addClass("glyphicon-remove");
                                $("#pwdup").css("color","#FF0004");
                                statuschk6 = false;
                        }
                        
                      
                    }); 

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
                                    document.getElementById('old_Pass').value = "";
                                     document.getElementById('new_pass').value = "";
                                     document.getElementById('re_pass').value = "";
                                     
                                    $("#pwmatch").removeClass("glyphicon-ok");
                                    $("#pwmatch").addClass("glyphicon-remove");
                                    $("#pwmatch").css("color","#FF0004");
                                    statuschk5 = false;
                                     
                                    $("#pwdup").removeClass("glyphicon-ok");
                                    $("#pwdup").addClass("glyphicon-remove");
                                    $("#pwdup").css("color","#FF0004");
                                statuschk6 = false;  
                                  swal("เสร็จสิ้น","ยืนยันการล้างข้อความเสร็จสิ้น!","success");
                                });
                            }
                    
                    function dosubmit(){
                       
                            var old_pass = $("#old_Pass").val();
                            var new_pass = $("#new_pass").val();
                            var re_pass  = $("#re_pass").val();



                            var chk = true;

                            if(old_pass == "" ||old_pass == null ){
                                    $('#old_Pass').addClass('validate-has-error'); 
                                    $('#field-0_error').html('กรุณาระบุรหัสผ่านเก่า').css('color', 'red');    
                                    chk = false;
                            }
                            if(new_pass== "" ||new_pass == null){
                                    $('#new_pass').addClass('validate-has-error');
                                    $('#field-1_error').html('กรุณาระบุรหัสผ่านใหม่').css('color', 'red');
                                    chk = false;
                            }
                            if(re_pass== "" || re_pass == null){
                                    $('#re_pass').addClass('validate-has-error');
                                    $('#field-2_error').html('กรุณาระบุยืนยันรหัสผ่านใหม่').css('color', 'red');
                                    chk = false;
                            }

                            if(chk == true){

                                if( statuschk5  == true && statuschk6  == true ){
                                  swal({
                                      title: "ยืนยันการเปลี่ยนรหัสผ่าน",
                                      text: "Submit to run ajax request",
                                      type: "info",
                                      showCancelButton: true,
                                      closeOnConfirm: false,
                                      showLoaderOnConfirm: true
                                    }, function () {
                                        var api_link = "<?php echo base_url(); ?>Allowance/edit_pass";  
                                        var username = '<?php echo ($this->session->userdata['logged_in']['username']); ?>';
                                        var id_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                                        var chk_authen = '<?php echo ($this->session->userdata['logged_in']['status']); ?>';
                                        var data = {
                                                    id         : id_update,
                                                    username   : username,
                                                    new_pass   : new_pass,
                                                    old_pass   : old_pass,
                                                    chk_authen : chk_authen
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
                                        swal("ไม่ตรงข้อกำหนด!", "การตั้งรหัสผ่านไม่เป็นไปตามข้อกำหนด โปรดตรวจสอบอีกครั้ง", "warning")
                                    }
                           }
                    }
                    
                    function ShowPW(){
                         
                        if (document.getElementById('showpass').checked){
                            $('#new_pass').attr('Type','text');
                            $('#re_pass').attr('Type','text');
                        } else {
                             $('#new_pass').attr('Type','password');
                             $('#re_pass').attr('Type','password');
                        }
                    }
                    
                    
            </script>
	</body>       
</html>
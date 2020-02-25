
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

    function reload() {
        var delayInMilliseconds = 1000; //1 second

        setTimeout(function () {
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
     //-----------------------------
    function checkEmail(email,idemail) {
        $.post('<?php echo base_url('Saraban/ch_emailmember') ?>', {email: email}, function (data) {
            if (data > 0) {
                   swal({
                    title: "email ซ้ำ",
                    text: "email ตรงกับผู้ใช้งานอื่น",
                    type: "error"
               });
                var html2 = "<span style='color: red' class='spError'>กรุณาระบุ email อื่น</span>";
                            $(html2).insertAfter("#" + idemail);
                return false;
                        };
        });

    }

    function validateEmail2(email, idemail) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (email == '') {
            $('.spError').remove();
            $('#' + idemail).removeClass('validate-has-error');
        } else if ((re.test(email) == true) && (email != '')) {
            $('.spError').remove();
            checkEmail(email, idemail);
        } else {
            $('#' + idemail).addClass('validate-has-error');
            var html2 = "<span style='color: red' class='spError'>กรุณากรอกอีเมล์ให้ถูกต้อง</span>";
            $(html2).insertAfter("#" + idemail);
            //$('#email_error').html('กรุณาระบุ email ให้ถูกต้อง').css('color', 'red');
        }
        ;

    }
    //-----------------------------------
 //   var chkusername = true;
    function chk_username(user) {

//        var user_name = $("#user_name").val();
//
//        var id = '<?php //echo ($this->session->userdata['logged_in']['id']); ?>';
//
//        var api_link = "<?php //echo base_url(); ?>Allowance/ch_usermember";
//
//
//        var data = {
//            id: id,
//            user_name: user_name
//        };
//
//        DoJSON(data, api_link).then(function (info) {
//            if (info == true) {
//
//                swal({
//                    title: "Username ซ้ำ",
//                    text: "Username ตรงกับผู้ใช้งานอื่น",
//                    type: "error"
//                },
//                        function () {
//                            $('#user_name').addClass('validate-has-error');
//                            $('#user_name_error').html('กรุณาระบุ Username อื่น').css('color', 'red');
//                           chkusername = false;
//                        });
//
//
//            } else {
//                $('#user_name').removeClass('validate-has-error');
//                $('#user_name_error').empty();
//                chkusername = true;
//            }
//        });
  $.post('<?php echo base_url('Saraban/ch_usermember') ?>', {user: user}, function (data) {
            if (data > 0) {
   swal({
                    title: "Username ซ้ำ",
                    text: "Username ตรงกับผู้ใช้งานอื่น",
                    type: "error"
              });
                $('#user_name').val('');
                $('#user_name').focus();
                return false;
            }
            ;
        });
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
          } else if (email == '') {
                swal({
              title: "กรุณาใส่ E-mail ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
        }else if (titlename == ''){
                swal({
              title: "กรุณาใส่คำนำหน้า ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
        }else if (lastname == ''){
                swal({
              title: "กรุณาใส่นามสกุล ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
        }else if (firstname == ''){
                swal({
              title: "กรุณาใส่ชื่อ ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
        }else if (telephone == ''){
                swal({
              title: "กรุณาใส่เบอร์โทรศัพท์ ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
        }else{
                var postData = new FormData($("#frm1")[0]);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Saraban/addusermember') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status){
                        //console.log(data);
                        //$('#currentID').val(data);
                        if(status == 'success'){
                            swal({
                                title: 'บันทึกข้อมูลสำเร็จ.',
                                text: 'Saved successfully',
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                            setTimeout(function (){
                                window.location.href = "<?php echo base_url('Saraban/Add_member/') ?>"+ data;;
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
    function ADDemail() {

        var num = $('.email3').length;
        num = num + 1;
        $('#email_a').append("<br><input name='email[]' type='text' id='inputMail" + num + "' class='form-control form-control-sm email3' value=''>");
        var nameFN = "validateEmail2(this.value,'inputMail" + num + "')";
        $('#inputMail' + num).attr('onchange', nameFN);


    }
    //================================
    function setDefault(checkvalue, id_input, id_email,userid) {
        if (checkvalue == true) {
            $('.chdefaultclass').prop('checked', false);
            $('#' + id_input).prop('checked', true);
            var data_status = '1';
        }
        if (checkvalue == false) {
            $('.chdefaultclass').prop('checked', false);
            var data_status = '0';
        }
        $.post('<?php echo base_url('Saraban/setDefault') ?>', {id_email: id_email, data_status: data_status,userid:userid});

    }
    //----------------------
    function deleteemail(dataID, table,userid) {
        swal({
            title: 'ต้องการลบข้อมูลนี้?',
            //text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'ลบข้อมูล'
        }, function () {
            $.post('<?php echo base_url('Saraban/deleteemail') ?>', {dataID: dataID, table: table},
                    function (data) {
                        //if(data>0){ 
                        swal({
                            title: 'ลบข้อมูลเรียบร้อยแล้ว',
                            text: "Your file has been deleted",
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                        setTimeout(function () {
                            window.location.href = "<?php echo base_url('Saraban/Add_member/') ?>"+userid;
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
           function chpass(pass){
                    var Password = $('#Password').val();
            if(Password != pass){
                            swal({
					title: 'Passwords ไม่ตรงกัน',
					text: 'Passwords do not match.',
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
                $('#Repeat').val('');
                $('#Repeat').focus();
            }
        }
        //----------------------------------------------
	function checkmail(email){  
        
		   $.post('<?php echo base_url('Saraban/ch_emailmember')?>' , { email : email },
			function(data){
                            //alert(data);
				if(data > 0){ 
                                    alert('อีเมล์นี้ถูกใช้งานแล้ว');
                                    $('#email').val('');
                                    $('#email').focus();
                               
                            }
			});
             
                        
                        }

    


</script>
</body>       
</html>
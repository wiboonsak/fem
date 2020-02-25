<!-- This is what you need -->
<script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

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

<!-- JavaScripts initializations and stuff -->
<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>


<!-- Demo Settings -->
<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>
<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			$("#username").select2();
		} );
                </script>
<script type="text/javascript">
$(document).ready(function(){
    
    
    
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"order": [],
				"aLengthMenu": [[5, 10, 25, -1], [5,10, 25, "All"]],
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});

        $("#field-5").change(function () {
            var seleted = $("#field-5").val();
            for (var i = 0; i < user.length; i++) {
                if (seleted == user[i].user) {
                    $("#field-1").val(user[i].fname);
                    $("#field-2").val(user[i].lname);
                    break;
                } else {
                    $("#field-1").val("");
                    $("#field-2").val("");
                }
            }
        });
//        $(' <button type="button" class="btn btn-success btn-sm" style="margin-left: 15px;" onclick="addPreviouss()"> ขอเลขสารบรรณย้อนหลัง </button>').insertAfter("#table-1_filter>label");
    });

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

    var id_sarabanE = "";
    function addPreviouss() {
//				id_sarabanE = id_saraban; 

        //for(var i=0;i<sarabanList.length;i++){
        //var eachData 	= sarabanList[i];
        //if(eachData.id_saraban==id_saraban){

        $("#modal-Edit-saraban").modal();
        $("#frmpre")[0].reset();
        $('.recheck').removeClass('checked');
        $("#circular_letter").val("0");


    

//					$("#field-2").val();
//					$("#field-3").val();
//					$("#field-4").val();
//					$("#field-5").val(); 
//					$("#field-6").val();
//					$("#field-7").val(); 

        //} 
    }
    //}

    function addprevios() {
        var numbersarabun = $("#numbersarabun").val();
        var numbersarabun1 = $("#numbersarabun1").val();
        var numbersarabun2 = numbersarabun+numbersarabun1;
        var fname = $("#nameuser").val();
        var lname = $("#lastnameuser").val();
        var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
        var chk = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
        var topic = $("#topic").val();
        var to_name = $("#to_name").val();
        var username = $("#username").val();
        var remark = $("#remark").val();
        var inorout = $("#inorout").val();
        var daystart 	    = $('#daystart').val();
	var monthstart 	    = $('#monthstart').val();
	var yearstart 	    = $('#yearstart').val();
        var date = yearstart+'-'+monthstart+'-'+daystart;
        var circular_letter = $("#circular_letter").val();
        var refno = $("#refno").val();
        var id = "";
        for(var i = 0; i < user.length; i++){
            if(username == user[i].user){
                id = user[i].id
                break;
            }
        }
        if(numbersarabun != '' && fname != "" && lname != "" && topic != "" && username != "" ){
            if (confirm("ยืนยันการบันทึก")) {
                var api_link = "<?php echo base_url(); ?>Saraban/addprevios";
                var data = {
                    numbersarabun: numbersarabun2,
                    fname: fname,
                    lname: lname,
                    remark: remark,
                    refno: refno,
                    inorout: inorout,
                    circular_letter: circular_letter,
                    user_update: user_update,
                    chk: chk,
                    topic: topic,
                    to_name: to_name,
                    date: date,
                    user_id: id
                };
                DoJSON(data, api_link).then(function (info) {
                    if (info != false) {
                        swal({
                            title: "สำเร็จ",
                            text: "บันทึกข้อมูลสำเร็จ"},
                                function () {
                                    reload();
                                }
                        );
                    } else {
                        alert("ไม่สามารถแก้ไขได้กรุณาลองใหม่อีกครั้ง");
                        reload();
                    }
                });
            }
        } else {
            alert("กรุณาระบุข้อมูลให้ครบถ้วน");
        }
    }
    function edit_previousSaraban(iddata){
        var numbersarabun = $("#numbersarabun").val();
        var numbersarabun1 = $("#numbersarabun1").val();
        var numbersarabun2 = numbersarabun+'.'+numbersarabun1;
        var fname = $("#nameuser").val();
        var lname = $("#lastnameuser").val();
        var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
        var chk = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
        var topic = $("#topic").val();
        var to_name = $("#to_name").val();
        var from_name = $("#from_name").val();
        var username = $("#username").val();
        var remark = $("#remark").val();
        var inorout = $("#inorout").val();
        var daystart 	    = $('#daystart').val();
	var monthstart 	    = $('#monthstart').val();
	var yearstart 	    = $('#yearstart').val();
        var date = yearstart+'-'+monthstart+'-'+daystart;
        var circular_letter = $("#circular_letter").val();
        var refno = $("#refno").val();
        var id = "";
        for (var i = 0; i < user.length; i++) {
            if (username == user[i].user) {
                id = user[i].id
                break;
            }
        }
        if (numbersarabun1!='' &&numbersarabun2 != '' && fname != "" && lname != "" && topic != "" && username != "" ) {
            if (confirm("ยืนยันการบันทึก")) {
                var api_link = "<?php echo base_url(); ?>Saraban/edit_previousSaraban";
                var data = {
                    numbersarabun: numbersarabun2,
                    fname: fname,
                    lname: lname,
                    remark: remark,
                    refno: refno,
                    inorout: inorout,
                    circular_letter: circular_letter,
                    user_update: user_update,
                    chk: chk,
                    topic: topic,
                    to_name: to_name,
                    from_name: from_name,
                    date: date,
                    user_id: id,
                    iddata: iddata
                };
                DoJSON(data, api_link).then(function (info){
                    if(info != false){
                        swal({
                            title: "สำเร็จ",
                            text: "บันทึกข้อมูลสำเร็จ"},
                                function (){
                                    reload();
                                }
                        );
                    } else {
                        alert("ไม่สามารถแก้ไขได้กรุณาลองใหม่อีกครั้ง");
                        reload();
                    }
                });
            }
        } else {
            alert("กรุณาระบุข้อมูลให้ครบถ้วน");
        }
    }

    //-------------------------------------------
    function usernamesearh(changeValue) {
        $.post('<?php echo base_url('Saraban/usernamesearh') ?>', {changeValue: changeValue},
                function (data) {
                    if (data != 'error') {
                        var res = data.split("/");

                        $('#nameuser').val(res[0]);
                        $('#lastnameuser').val(res[1]);
                        $('#iduser').val(res[2]);
                    } else {
                        $('#nameuser').val('');
                        $('#lastnameuser').val('');
                        $('#iduser').val('');
                    }
                });
    }
    //-------------------------------------------
    function inout(changeValue) {
        var valuetxt = '';
        var circu = $('#circular_letter').val();
        if (circu == '1') {
            var txt = 'ว';
        } else {
            var txt = '';
        }
        if (changeValue == '1') {
            valuetxt = 'มอ.820/' + txt;
        } else if (changeValue == '2') {
            valuetxt = 'ศธ0521.1.01/' + txt;
        }
        $('#numbersarabun').val(valuetxt);
        $('#inorout').val(changeValue);

    }
    //-------------------------------------------
    function circular(changeValue) {
        var txt = $('#numbersarabun').val();
        //var circu = $('#circular_letter').val();



        if (changeValue == true) {
            /* $('#circular_letter').val('1');
             txt.replace("ว", "ว");
             var txt2 = txt+'ว';
             $('#numbersarabun').val(txt2);*/
            $('#circular_letter').val('1');
            if (txt.indexOf("ว") == -1) {
                $('#circular_letter').val('1');
                var txt2 = txt + 'ว';
                $('#numbersarabun').val(txt2);
            }
        } else {
            /* $('#circular_letter').val('0');
             txt.replace("ว", "");
             $('#numbersarabun').val(txt);*/


            // if(txt.indexOf("ว") != -1){
            $('#circular_letter').val('0');
            var txt2 = txt.replace("ว", "");
            $('#numbersarabun').val(txt2);
            //}
        }
    }
    
    function check_checkbox(){
        var circular_letter = $('#circular_letter').val();
        var inorout = $('#inorout').val();
        
        if(circular_letter == '1'){
            $('#divcircular').addClass('checked');
        }
        if(inorout == '1'){
            $('#divinout').addClass('checked');
        }
        if(inorout == '2'){
            $('#divinout2').addClass('checked');
        }
    }
    
    
    	var id_sarabanE = "";
		function editbtn(id_saraban,idData,topic){
				id_sarabanE = id_saraban; 
$("#topic").val(topic);
/*if(txtEdit == 'รายละเอียด'){
						$("#btnSave").hide();
                                                $( "#date" ).prop( "disabled", true );
                                                $( "#numbersarabun1" ).prop( "disabled", true );
                                                $( "#username" ).prop( "disabled", true );
                                                $( "#topic" ).prop( "disabled", true );
                                                $( "#to_name" ).prop( "disabled", true );
                                                $( "#remark" ).prop( "disabled", true );
                                                $( "#refno" ).prop( "disabled", true );
					} else {
				
						$("#btnSave").show();
                                                    $( "#date" ).prop( "disabled", false );
                                                $( "#numbersarabun1" ).prop( "disabled", false );
                                                $( "#username" ).prop( "disabled", false );
                                                $( "#topic" ).prop( "disabled", false );
                                                $( "#to_name" ).prop( "disabled", false );
                                                $( "#remark" ).prop( "disabled", false );
                                                $( "#refno" ).prop( "disabled", false );
					}*/
        $('#modal-Edit-saraban').modal({backdrop: 'static', keyboard: false})
				for(var i=0;i<sarabanList.length;i++){
				var eachData 	= sarabanList[i];
				if(eachData.id_saraban==id_saraban){
                                var str = id_saraban;
                                var maxL = str.length;
                                var font = str.substring(0,maxL-2);
                                var back = str.substr(str.length - 1);
                                 var datesaraban = eachData.date_saraban;
                                       
                                      
                                        var result = datesaraban.split('-');
                                        var date = result[2];
                                        var mon = result[1];
                                        var year = result[0];
					$("#modal-Edit-saraban").modal();
					$("#nameuser").val(eachData.fname);
					$("#lastnameuser").val(eachData.lname);
					$("#to_name").val(eachData.to_name);					
					$("#from_name").val(eachData.from_name);					
					$("#numbersarabun").val(font);
					$("#numbersarabun1").val(back);
					$("#username").val(eachData.username); 
					$("#select2-chosen-1").text(eachData.username);
					$("#remark").val(eachData.remark);
					$("#refno").val(eachData.refno); 
					$("#daystart").val(date); 
					$("#monthstart").val(mon); 
					$("#yearstart").val(year); 
					$("#inorout").val(eachData.in_out); 
					$("#circular_letter").val(eachData.circular_letter);                                    
					
				} 
			}
                    $("#btnSave").attr("onclick", "edit_previousSaraban('"+idData+"')");  
                    check_checkbox();  
		}
        //------------------------------------------
        function delete_data(dataID,table){  
		  swal({
                                  title: "ยืนยันการลบ",
                                  type: "warning",
                                  showCancelButton: true,
                                  confirmButtonClass: "btn-danger",
                                  confirmButtonText: "ยืนยัน !",
                                  closeOnConfirm: false
                                },
                                function () {
		   $.post('<?php echo base_url('Saraban/deleteData')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
                	swal({
                        title: 'ลบข้อมูลเรียบร้อยแล้ว',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                    setTimeout(function(){ window.location.href = "<?php echo base_url('Saraban/manageprevious_admin')?>"; }, 2000);
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
           //-----------------------------
        function checknumber(numberprevious){
        var numbersaraban = $("#numbersarabun").val();
        var numbersaraban2 = numbersaraban+'.'+numberprevious;
			$.post('<?php echo base_url('Saraban/checknumber')?>',{ numbersaraban2:numbersaraban2 }, function(data){
			if(data >0){
				alert('เลขสารบรรณย้อนหลังนี้มีแล้ว!');
                                $('#numbersarabun1').val('');
                                $('#numbersarabun1').focus();
                                return false;
				} ;
			});
		
                    }
                    		//-----------------------------
		function upload(id_saraban,topic,urlseg,urlseg3,id){
                    $("#saraban_id").text(id_saraban);
                    $("#saraban_topic").text(topic);
                    $("#uelseg").val(urlseg);
                    $("#uelseg3").val(urlseg3);
                    $("#id").val(id);

					$('#modal-upload-saraban').modal({backdrop: 'static', keyboard: false}) 
					$("#modal-upload-saraban").modal();
		}
       //--------------------------------------
    function Addimg(){
		
        var saraban_id = $('#saraban_id').text();
        var uelseg = $('#uelseg').val();
        var uelseg3 = $('#uelseg3').val();
        var id = $('#id').val();
        var img2 = $('#img2').val();
        var postData = new FormData($("#imgForm")[0]);
        if(img2 !=''){
			
			var saraban_number = saraban_id.substring(3);			
			saraban_number = saraban_number.replace('/', '_');
			
			if(saraban_number.indexOf('ว') != -1){
				saraban_number = saraban_number.replace("ว", "");
			}			
			if(saraban_number.indexOf('.') != -1){
				
				var count1 = 0;
				var position1 = saraban_number.indexOf('.');

				while(position1 !== -1){
				  count1++;
				  position1 = saraban_number.indexOf('.', position1 + 1);
				  saraban_number = saraban_number.replace(".", "_");	
				}				
			}					
			
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('Saraban/addimg1/')?>'+id+'/'+saraban_number,
            processData: false,
            contentType: false,
            data: postData,
            success: function (data, status){  
                if(status == 'success'){
                    swal({
                        title: 'Successfully saved.',
                        //text: 'You clicked the button!',
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                    setTimeout(function (){
                        window.location.href = "<?php echo base_url('Saraban/')?>"+uelseg+'/'+uelseg3;
                    }, 2000);
                } else {
                    swal({
                        title: 'Can not be saved!',
                        //text: "You won't be able to revert this!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                }
            }
        })
        }else{
        	alert('กรุณาเลือกไฟล์สำเนา');
        }
    }
    //--------------------------------------
	function check_typeFile(file,element){		
		
		if(file !=''){		
			
			var arrayExtensions = ["gif", "jpg", "png", "jpeg", "pdf", "GIF", "JPG", "PNG", "JPEG", "PDF"];
			var ext = file.split(".");
			ext = ext[ext.length-1].toLowerCase(); 			
			if(arrayExtensions.lastIndexOf(ext) == -1){
				alert('กรุณตรวจสอบประเภทไฟล์ เนื่องจากรองรับไฟล์นามสกุล .pdf , .jpg , .png , .gif เท่านั้น');
				$("#"+element).val("");
				$("#"+element).focus();
			}
		}		
	}
        //----------------------------------
            function hideselect(){
  $('.select2-drop').hide();
    }

    


</script>
</body>
</html>
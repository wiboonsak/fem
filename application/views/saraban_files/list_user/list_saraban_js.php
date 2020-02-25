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

<?php if(($this->session->userdata['logged_in']['status']) == "admin_saraban"){ ?>
    <script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			$("#username").select2();
		} );
                </script>
<?php } ?>

    <script type="text/javascript">
		$(document).ready(function(){
			var $table1 = jQuery( '#table-1' );
			
			// Initialize DataTable
			$table1.DataTable( {
				"order": [],
				"aLengthMenu": [[20,-1], [20, "All"]], 
				"bStateSave": true
			});
			
			// Initalize Select Dropdown after DataTables is created
			$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
				minimumResultsForSearch: -1
			});
		});
		//-----------------------------
		
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
		//-----------------------------
		
		var id_sarabanE = "";
		function editsaraban(id_saraban,topic){
				id_sarabanE = id_saraban;

				for(var i=0;i<sarabanList.length;i++){
				var eachData 	= sarabanList[i];
				if(eachData.id_saraban==id_saraban){					
									
					$('#modal-Edit-saraban').modal({backdrop: 'static', keyboard: false}); 
					$("#modal-Edit-saraban").modal();

					$("#field-1").val(eachData.fname);
					$("#field-2").val(eachData.lname);
					$("#field-3").val(topic);
					$("#to_name").val(eachData.to_name);
					$("#from_name").val(eachData.from_name);
					$("#field-4").val(eachData.remark);
					$("#field-5").val(eachData.refno);
				} 
			}				
		}
		//-----------------------------
		
		function upload(id_saraban,topic,urlseg,urlseg3,id,copy_file){
                    $("#saraban_id").text(id_saraban);
                    $("#saraban_topic").text(topic);
                    $("#uelseg").val(urlseg);
                    $("#uelseg3").val(urlseg3);
                    $("#id").val(id);
                    $("#old_img").val(copy_file);

					$('#modal-upload-saraban').modal({backdrop: 'static', keyboard: false}); 
					$("#modal-upload-saraban").modal();
		}
		//-----------------------------

		function dosubmit_edit(){
			var fname 		= $("#field-1").val();
			var lname  		= $("#field-2").val();
			var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
			var chk_authen	= '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session
			var topic 		= $("#field-3").val();
			var to_name 	= $("#to_name").val();
			var from_name 	= $("#from_name").val();
			var remark 		= $("#field-4").val();
			var refno  		= $("#field-5").val();
			if(fname!="" &&lname!="" &&topic!=""){
				if(confirm("ยืนยันการบันทึก")){
					var api_link = "<?php echo base_url();?>Saraban/edit_saraban"; 
					var data = {
								id_saraban	: id_sarabanE,
								fname 		: fname,
								lname 		: lname,
								remark 		: remark,
								refno 		: refno,
								user_update : user_update,
								topic    	: topic,
								to_name    	: to_name,
								from_name   : from_name,
								chk_authen	: chk_authen
								};
					DoJSON(data,api_link).then(function (info){
						if(info != false){
							swal({
								title: "สำเร็จ",
								text: "แก้ไขข้อมูลสำเร็จ"},
								function(){
									reload();
								}
							);
						}else{ 
							alert("ไม่สามารถแก้ไขได้กรุณาลองใหม่อีกครั้ง");
							reload();
						}
					});
				}
			}else{
				alert("กรุณาระบุข้อมูลให้ครบถ้วน");
			}
		}
		//-----------------------------

		function dosubmit_delect(id_saraban){
			
			var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
			var chk_authen	= '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session
			
				if(confirm("ยืนยันการยกเลิก")){
					var api_link = "<?php echo base_url(); ?>Saraban/delect_saraban"; 
					var data = {
								id_saraban	: id_saraban,
								user_update : user_update,
								chk_authen	: chk_authen
								};
					DoJSON(data,api_link).then(function (info) {
						if(info != false){
							swal({
								title: "สำเร็จ",
								text: "ยกเลิกข้อมูลสำเร็จ"},
								function(){
									reload();
								}
							);
						}else{ 
							alert("ไม่สามารถยกเลิกได้กรุณาลองใหม่อีกครั้ง");
							reload();
						}
					});
				}			
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
            url: '<?php echo base_url('Saraban/addimg/')?>'+id+'/'+saraban_number,
            processData: false,
            contentType: false,
            data: postData,
            success: function (data, status) { 
                if(status == 'success'){
					$("#modal-upload-saraban").modal('hide');
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
            return false;
            $('#modal-upload-saraban').modal({backdrop: 'static', keyboard: false}); 
			$("#modal-upload-saraban").modal();
        }
    } 
    //------------------------------------------
		
    function addPreviouss(idsaraban,circular,inout){
//				id_sarabanE = id_saraban; 

        //for(var i=0;i<sarabanList.length;i++){
        //var eachData 	= sarabanList[i];
        //if(eachData.id_saraban==id_saraban){

        $("#modal-Edit-saraban").modal();
        $("#frmpre")[0].reset();
        $('.recheck').removeClass('checked');
        $("#circular_letter").val(circular);
        $("#inorout").val(inout);
        $("#numbersarabun").val(idsaraban);


    

//					$("#field-2").val();
//					$("#field-3").val();
//					$("#field-4").val();
//					$("#field-5").val(); 
//					$("#field-6").val();
//					$("#field-7").val(); 

        //} 
    }
    //} 
    //-------------------------------------------
		
    function usernamesearh(changeValue){
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
		
    function inout(changeValue){
        var valuetxt = '';
        var circu = $('#circular_letter').val();
        if (circu == '1') {
            var txt = 'ว';
        } else {
            var txt = '';
        }		
		if(changeValue == '1'){
            valuetxt = 'มอ 820/'+txt;
        } else if(changeValue == '2'){
            valuetxt = 'อว 6801.01/'+txt;
            //valuetxt = 'ศธ0521.1.01/'+txt;
        }
        $('#numbersarabun').val(valuetxt);
        $('#inorout').val(changeValue);
    }		
    //-------------------------------------------
		
    function circular(changeValue){
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
	//-----------------------------	
    
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
    //-----------------------------
    
    	var id_sarabanE = "";
		function editbtn(id_saraban,idData,topic) {
				id_sarabanE = id_saraban; 
$("#topic").val(topic);
				for(var i=0;i<sarabanList.length;i++){
				var eachData 	= sarabanList[i];
				if(eachData.id_saraban==id_saraban){
                                var str = id_saraban;
                                var maxL = str.length;
                                var font = str.substring(0,maxL-6);
                                var back = str.substr(str.length - 6);
					$("#modal-Edit-saraban").modal();

					$("#nameuser").val(eachData.fname);
					$("#lastnameuser").val(eachData.lname);
					
					$("#numbersarabun").val(font);
					$("#numbersarabun1").val(back);
					$("#username").val(eachData.username); 
					$("#remark").val(eachData.remark);
					$("#refno").val(eachData.refno); 
					$("#date").val(eachData.date_saraban); 
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
		
         	var id_sarabanE = "";
		function editbtn1(id_saraban,topic,id){
				id_sarabanE = id_saraban; 
				$("#topic").val(topic);
			
				var status = '<?php echo $this->session->userdata['logged_in']['status']?>';
			 
				for(var i=0;i<sarabanList.length;i++){
				var eachData = sarabanList[i];
				if(eachData.id_saraban==id_saraban){					
					
					if(eachData.in_out == '1'){
					   
					   var length_txt = 12;
					   var length_txt2 = 11;	
					   
					} else if(eachData.in_out == '2'){					   
					   
					   var length_txt = 16;
					   var length_txt2 = 15;
					}					
					if(eachData.circular_letter == '1'){
						
						length_txt = parseInt(length_txt + 1);				
						length_txt2 = parseInt(length_txt2 + 1);					
					} 
					//eachData.date_saraban = eachData.date_saraban.substring(0,10);
					var numbersarabun1 = id_saraban.substring(length_txt); 
					var id_saraban2 = id_saraban.substring(0,length_txt2);
//                                var str = id_saraban;
//                                var maxL = str.length;
//                                var font = str.substring(0,maxL-6);
//                                var back = str.substr(str.length - 6);
                                        var datesaraban = eachData.date_add;
                                       
                                        var result1 = datesaraban.split(' ');
                                        var result = result1[0].split('-');
                                        var date = result[2];
                                        var mon = result[1];
                                        var year = result[0];
					$('#modal-Edit1-saraban').modal({backdrop: 'static', keyboard: false});
					$("#modal-Edit1-saraban").modal();					
					$("#nameuser").val(eachData.fname);
					$("#lastnameuser").val(eachData.lname);					
					$("#to_name2").val(eachData.to_name);
					$("#from_name2").val(eachData.from_name);					
					$("#mainsarabun").val(id);
					$("#numbersarabun").val(id_saraban2);
					$("#numbersarabun1").val(numbersarabun1); 
					$("#username").val(eachData.username);
					if(status == 'admin_saraban'){
						$("#select2-chosen-1").text(eachData.username); 
					}
					$("#remark").val(eachData.remark);
					$("#refno").val(eachData.refno); 
					$("#daystart").val(date); 
					$("#monthstart").val(mon); 
					$("#yearstart").val(year); 
					$("#inorout").val(eachData.in_out); 
					$("#circular_letter").val(eachData.circular_letter);					
				} 
			}
                      check_checkbox();  
		}		
		//-----------------------------
		
        function addprevios(){
			var numbersarabun = $("#numbersarabun").val();
			var numbersarabun1 = $("#numbersarabun1").val();
			var numbersarabun2 = numbersarabun+'.'+numbersarabun1;
			var mainsarabun = $("#mainsarabun").val();
			var fname = $("#nameuser").val();
			var lname = $("#lastnameuser").val();
			var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
			var chk = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
			var topic = $("#topic").val();
			var to_name = $("#to_name2").val();
			var from_name2 = $("#from_name2").val();
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
			if(numbersarabun1!='' && numbersarabun != '' && fname != "" && lname != "" && topic != "" && username != "" && date!=""){
				if(confirm("ยืนยันการบันทึก")){
					var api_link = "<?php echo base_url(); ?>Saraban/addprevios";
					var data = {
						numbersarabun: numbersarabun2,
						mainsarabun: mainsarabun,
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
						from_name: from_name2,
						date: date,
						user_id: id
					};
					DoJSON(data, api_link).then(function (info){
						if(info != false){
							$("#modal-Edit1-saraban").modal("hide");
							swal({
								title: "สำเร็จ",
								text: "บันทึกข้อมูลสำเร็จ"},
									function (){
										setTimeout(function(){ window.location.href = "<?php echo base_url('Saraban/manageprevious_admin')?>"; }, 1000);
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
				$("#modal-Edit1-saraban").modal();
			}
    }
		
//     if (numbersarabun1!=''){
//            alert("กรุณาระบุเลขสารบรรณย้อนหลัง");
//             $('#numbersarabun1').val('');
//             $('#numbersarabun1').focus();
//        }else if(username != ''){
//            alert("กรุณาระบุ User Name");
//            $('#username').val('');
//             $('#username').focus();
//        }else if(date !=''){
//            alert("กรุณาระบุวันที่");
//            $('#date').val('');
//             $('#date').focus();
//        }else if(topic !=''){
//            alert("กรุณาระบุชื่อเรื่อง");
//            $('#topic').val('');
//             $('#topic').focus();
//        }else if(remark !=''){
//            alert("กรุณาระบุหมายเหตุ");
//            $('#remark').val('');
//             $('#remark').focus();
//        }else if(refno !=''){
//            alert("กรุณาระบุ Ref No.");
//            $('#refno').val('');
//             $('#refno').focus();
//        }else {
    //------------------------------------------
		
    function edit_previousSaraban(iddata){
        var numbersarabun = $("#numbersarabun").val();
        var fname = $("#nameuser").val();
        var lname = $("#lastnameuser").val();
        var user_update = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session
        var chk = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
        var topic = $("#topic").val();
        var username = $("#username").val();
        var remark = $("#remark").val();
        var inorout = $("#inorout").val();
        var date = $("#date").val();
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
            if(confirm("ยืนยันการบันทึก")){
                var api_link = "<?php echo base_url(); ?>Saraban/edit_previousSaraban";
                var data = {
                    numbersarabun: numbersarabun,
                    fname: fname,
                    lname: lname,
                    remark: remark,
                    refno: refno,
                    inorout: inorout,
                    circular_letter: circular_letter,
                    user_update: user_update,
                    chk: chk,
                    topic: topic,
                    date: date,
                    user_id: id,
                    iddata: iddata
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
				} 
			});		
    }
	//----------------------------------------	
	
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
	//----------------------------------------
		
    function hideselect(){
  		$('.select2-drop').hide();
    }	
	</script>
</body>
</html>
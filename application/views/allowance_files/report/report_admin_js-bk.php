	


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

    <!-- This is what you need -->
    <script src="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets_saraban/dist/sweetalert.css">

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="<?php echo base_url(); ?>assets_saraban/js/neon-demo.js"></script>

		<script type="text/javascript">
		jQuery( document ).ready( function( $ ) {
			
			$("#id_saraban").select2();
			$("#topic").select2();
			$("#user_create").select2();
		} );

		function reload(){
			var delayInMilliseconds = 500; //1 second

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

		function formatDate(date) {
		  var monthNames = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];

		  var day = date.getDate();
		  var monthIndex = date.getMonth();
		  var year = date.getFullYear();

		  /*if(day< 10){
		  		day ="0"+day
		  }
		  if(monthIndex< 10){
		  		monthIndex ="0"+monthIndex
		  }*/
		  year = parseInt(year + 543);
		  return day+' '+monthNames[monthIndex]+' '+year;
		}
		
		function dosearch(){

			var typeBudget 	= $('#typeBudget').val();
			var id_saraban 	= $('#id_saraban').val();
			var topic 		= $('#topic option:selected').val();
			var topic999 		= $('#select2-drop').val();
			var dd 			= $('#dd').val();
			var mm 			= $('#mm').val();
			var yy 			= $('#yy').val();
			var approve 	= $('#approve').val();
			var checkdoc 	= $('#checkdoc').val();
			var user_create   = $("#user_create").val();
			var date1 	    = $('#date1').val();
			var date2 		= $('#date2').val();
			var chk         = true;

			if(date1 != ""){
					if(date2 == ""){
						$('#date2').addClass('validate-has-error');
						$('#date2_error').html('กรุณาระบุวันที่').css('color', 'red');
						chk         = false;	
					}else if(date2 != ""){
						$('#date2').removeClass('validate-has-error');
						$('#date2_error').html('').css('color', 'red');	
						chk         = true;
					}
			}

			if(date2 != ""){
					if(date1 == ""){
						$('#date1').addClass('validate-has-error');
						$('#date1_error').html('กรุณาระบุวันที่').css('color', 'red');	
						chk         = false;
					}else if(date1 != ""){
						$('#date1').removeClass('validate-has-error');
						$('#date1_error').html('').css('color', 'red');	
						chk         = true;
					}
			}

//                               function () {
                                       var api_link = "<?php echo base_url(); ?>allowance/get_report_admin"; 
                                         var id_user = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
                                  
                                        var data = {
                                                    typeBudget : typeBudget, 
                                                    id_saraban : id_saraban,
                                                    topic      : topic,
                                                    //dd  		: dd,
                                                    //mm 		: mm,
                                                    //yy 		: yy,
                                                    approve 	: approve,
                                                    checkdoc 	: checkdoc,
                                                    date1       : date1,
                                                    date2       : date2,
                                                    topic999       : topic999,
                                                    user_create	: user_create
                                          }; console.log('....'+topic);

                                        DoJSON(data,api_link).then(function (info) {

                                            if(info['allow'] != false){	
                                                    	var datail = "";
                                                    	var x = 0;
												          datail = datail+'<table class="table table-bordered datatable table-striped" id="table-1">'
													    	+'<thead>'
														        +'<tr>'
														            +'<th>ลำดับ</th>'
														            +'<th>วันที่ส่งคำขอ</th>'
														            +'<th>เลขที่คำขอ</th>'
														            +'<th>เรื่อง</th>'
														            +'<th>สถานะเอกสาร</th>'
//														            +'<th>หมายเหตุเอกสาร</th>'
														            +'<th>สถานะอนุมัติ</th>'
														            //+'<th>ดำเนินการ</th>'
														        +'</tr>'
													    	+'</thead>'
													    	+'<tbody>';
													    											
                                                      for (var i = 0; i < info['allow'].length; i++) {
                                                      	x=x+1;
                                                      	var id_allow = "";
                                                        
                                                      	if(info['allow'][i].saraban_number != null){
                                                      		id_allow = info['allow'][i].saraban_number;
                                                                var result = id_allow.split(',');

                                                      	}
										                   	datail = datail+  '<tr class="gradeA odd" role="row">'
																+'<td class="" style="text-align:center">'+x+'</td>'
																+'<td>'+formatDate(new Date(info['allow'][i].date_create))+'</td>'
																+'<td class="sorting_1">'+result[1]+'</td>'
																+'<td>'+info['allow'][i].subject_document+'</td>'
																+'<td class="center" style="text-align:center">';

																	if(info['allow'][i].check_doc2 == 0){
																					
																		datail = datail+'<span class="text-danger" >'
																			+'<i class="entypo-cancel"></i>'
																			+'ไม่ผ่าน'
																		+'</span>';
																		
																	}else if(info['allow'][i].check_doc2 == 1){
																						
																		datail = datail +'<span class="text-success">'
																			+'<i class="entypo-check"></i>'
																			+'ผ่าน'
																		+'</span>	';
																		
																	}else if(info['allow'][i].check_doc2 == 2){
																						
																		datail = datail+'<span class="text-info">'
																			+'<i class="entypo-clock"></i>'
																			+'รอตรวจ'
																		+'</span>';
																		
																	}else if(info['allow'][i].check_doc2 == 3){
																					
																	datail = datail	+'<span class="text-primary">'
																			+'<i class="entypo-mail"></i>'
																			+'รอส่ง'
																		+'</span>';
																	
																	}
																					
																datail = datail+'</td>'
//																+'<td>'+info['allow'][i].remark+'</td>'
																+'<td class="center" style="text-align:center">';


																if(info['allow'][i].check_doc2 == 3){

																}else{
																	if(info['allow'][i].approve_status2 == '0' ){
																					
																		datail = datail+'<span class="text-danger">'
																			+'<i class="entypo-cancel"></i>'
																			+'ไม่อนุมัติ'
																		+'</span>';
																		
																	}else if(info['allow'][i].approve_status2 == 1){
																						
																		datail = datail+'<span class="text-success">'
																			+'<i class="entypo-check"></i>'
																			+'อนุมัติ'
																		+'</span>';
																		
																	}else if(info['allow'][i].approve_status2 == 2){
																						
																		datail = datail+'<span class="text-info">'
																			+'<i class="entypo-clock"></i>'
																			+'รอดำเนินการ'
																		+'</span>'	;

																	}else if(info['allow'][i].approve_status2 == null){
																	
																	}
																}
																	
															datail = datail	+'</td>'
																
																
																	
													datail = datail
														+'</tr>';
                                            		

                                            	}
                                                datail = datail+'</tbody>'
																+'</table>';
                                            	$('#showdata').empty();
                                            	$('#showdata').append(datail);
                                            	var $table1 = jQuery( '#table-1' );
										            // Initialize DataTable
													$table1.DataTable( {
													dom: 'Bfrtip',
													buttons: [
														'excelHtml5'
														
													]
												});
													
													// Initalize Select Dropdown after DataTables is created
													$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
														minimumResultsForSearch: -1
													});
                                                 
   
                                            }else{ 
                                               
                                                swal({
                                                        title: "ไม่สำเร็จ",
                                                        text: "ไม่พบคำขอที่ระบุ กรุณาลองใหม่อีกครั้ง",
                                                        type: "error"
                                                    });
                                            }
                                        });    
              
              }

         function doreset(){
						         	$('#showdata').empty();
						         	 document.querySelector('#typeBudget').value = 'null';
						         	 $('#id_saraban').val('0').trigger('change');
						         	 $('#topic').val('0').trigger('change');
						         	 document.querySelector('#dd').value = '0';
						         	 document.querySelector('#mm').value = '0';
						         	 document.querySelector('#yy').value = '0';
						         	 document.querySelector('#approve').value = 'null';
						         	 document.querySelector('#checkdoc').value = 'null';
						         	 document.querySelector('#date1').value = '';
						         	 document.querySelector('#date2').value = '';
//						          swal("เสร็จสิ้น","ยืนยันการรีเซ็ตเสร็จสิ้น!","success");
         }
		</script>


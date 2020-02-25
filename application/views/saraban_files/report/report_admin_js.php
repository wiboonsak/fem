
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
			$("#firstname").select2();
			$("#lastname").select2();
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
		  var monthIndex = date.getMonth()+1;
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
//-------------------------------------------
			
		function dosearch(){

			var typeBudget 	= $('#typeBudget').val();
			var id_saraban 	= $('#id_saraban').val();
			var topic 		= $('#topic').val();
			var dd 			= $('#dd').val();
			var mm 			= $('#mm').val();
			var yy 			= $('#yy').val();
			var approve 	= $('#approve').val();
			var checkdoc 	= $('#checkdoc').val();			
			var firstname   = $("#firstname").val();
			var lastname    = $("#lastname").val();
			var daystart 	    = $('#daystart').val();
			var monthstart 	    = $('#monthstart').val();
			var yearstart 	    = $('#yearstart').val();
			var dayend 	    = $('#dayend').val();
			var monthend 	    = $('#monthend').val();
			var yearend 	    = $('#yearend').val();
			var in_out 		= $('#in_out').val();
			var chk         = true;

			if((daystart != "")&&(monthstart != "")&&(yearstart != "")){
                            var date1 = yearstart+'-'+monthstart+'-'+daystart;
					if(dayend == ""){
						$('#dayend').addClass('validate-has-error');
						$('#dayend_error').html('กรุณาระบุวัน').css('color', 'red');
						chk         = false;
                                        }else if(monthend == ""){
						$('#monthend').addClass('validate-has-error');
						$('#monthend_error').html('กรุณาระบุเดือน').css('color', 'red');	
						chk         = false;
                                        }else if(yearend == ""){
						$('#yearend').addClass('validate-has-error');
						$('#yearend_error').html('กรุณาระบุปี').css('color', 'red');	
						chk         = false;
					}else if(dayend != ""){
						$('#dayend').removeClass('validate-has-error');
						$('#dayend_error').html('').css('color', 'red');	
						chk         = true;
					}else if(monthend != ""){
						$('#monthend').removeClass('validate-has-error');
						$('#monthend_error').html('').css('color', 'red');	
						chk         = true;
					}else if(yearend != ""){
						$('#yearend').removeClass('validate-has-error');
						$('#yearend_error').html('').css('color', 'red');	
						chk         = true;
					}
			}else{
                            var date1 = '';
                        }

			if((dayend != "")&&(monthend != "")&&(yearend != "")){
                            var date2 = yearend+'-'+monthend+'-'+dayend;
					if(daystart == ""){
						$('#daystart').addClass('validate-has-error');
						$('#daystart_error').html('กรุณาระบุวัน').css('color', 'red');
						chk         = false;
                                        }else if(monthstart == ""){
						$('#monthstart').addClass('validate-has-error');
						$('#monthstart_error').html('กรุณาระบุเดือน').css('color', 'red');	
						chk         = false;
                                        }else if(yearstart == ""){
						$('#yearstart').addClass('validate-has-error');
						$('#yearstart_error').html('กรุณาระบุปี').css('color', 'red');	
						chk         = false;
					}else if(daystart != ""){
						$('#daystart').removeClass('validate-has-error');
						$('#daystart_error').html('').css('color', 'red');	
						chk         = true;
					}else if(monthstart != ""){
						$('#monthstart').removeClass('validate-has-error');
						$('#monthstart_error').html('').css('color', 'red');	
						chk         = true;
					}else if(yearstart != ""){
						$('#yearstart').removeClass('validate-has-error');
						$('#yearstart_error').html('').css('color', 'red');	
						chk         = true;
					}
			}else{
                            var date2 = '';
                        }

			if(chk == true){

					var id_user = '<?php echo ($this->session->userdata['logged_in']['id']); ?>';
  
                    $.post('<?php echo base_url('Saraban/get_report_saraban_admin')?>' , { id : id_user, id_saraban : id_saraban, topic : topic, date1 : date1, date2 : date2, in_out : in_out, firstname : firstname, lastname : lastname }, function(data){
						
						if(data != 0){
						
							$('#showdata').empty();
                        	$('#showdata').html(data);
							
						} else {
							
							$('#showdata').empty();
							swal({
                              title: "ไม่สำเร็จ",
                              text: "ไม่พบคำขอที่ระบุ กรุณาลองใหม่อีกครั้ง",
                              type: "error"
                            });							
						}
					})
			}
                              
                                      /* var api_link = "<?php //echo base_url(); ?>Saraban/get_report_saraban_admin"; 
                                       var id_user = '<?php //echo ($this->session->userdata['logged_in']['id']); ?>';
  
                                        var data = {
                                                    id_saraban : id_saraban,
                                                    topic 		: topic,
//                                                    dd  		: dd,
//                                                    mm 			: mm,
//                                                    yy 			: yy,
                                                    date1 		: date1,
                                                    date2       : date2,
                                                    firstname 	: firstname,
                                                    lastname    : lastname,
                                                    in_out    	: in_out
                                                    };

                                        DoJSON(data,api_link).then(function (info) {
                                        

                                            if(info['allow'] != false){	                                        
                                                        
                                                    	var datail = "";                                           var tabheard = "";
                                                    	var x = 0;
	//<table class="table table-bordered datatable table-striped" id="table-1">											         
     tabheard =	'<thead>' 
             +'<tr>'
														            +'<th>วันที่ออกเลข</th>'
														            +'<th>เลขที่สารบรรณ</th>'
                                                                    +'<th>ชื่อ-นามสกุล</th>'
														            +'<th>วันที่ทำรายการ</th>'
                                                                    +'</tr>'
        +'</thead>'
													    	+'<tbody>';


 for (var i = 0; i < info['allow'].length; i++) {
                         
                     var id_allow = "";
                     	if(info['allow'][i].id_saraban != null){
                                         	id_allow = info['allow'][i].id_saraban;
                                      	}

   var spl_text = info['allow'][i].grp_sub_name;
   
   datail = datail+  '<tr class="gradeA odd" role="row">'																												+'<td>'+formatDate(new Date(info['allow'][i].date_add))+'</td>'
																+'<td class="sorting_1">'+id_allow+'</td>'
                                                                                                            
+'<td>'+info['allow'][i].topic+'</td>'   																+'<td>'+info['allow'][i].firstname+' '+info['allow'][i].lastname+'</td>'


+'<td>'+formatDate(new Date(info['allow'][i].date_add))+'</td>'
+'</tr>';
                                            		
try { 
   var txt_show = "";
   var sub_detail = "";
  spl_text = spl_text.split(',');
    for(var j=0;j<spl_text.length;j++){
        txt_show = spl_text[j];
       var txt_show_data = txt_show.split('->');
   if(txt_show_data[5]!=undefined){
    datail = datail+ '<tr class="gradeA odd" role="row"><td>'+formatDate(new Date(txt_show_data[4]))+'</td>'
       +'<td>'+txt_show_data[0]+'</td>'
       +'<td>'+txt_show_data[5]+'</td>'
       +'<td>'+txt_show_data[1]+' '+txt_show_data[2]+'</td>'
       +'<td>'+formatDate(new Date(txt_show_data[3]))+'</td></tr>';
      //alert(datail);
      }
     }
    }
    catch(err) {
        txt_show = "test";
    }
                                            	}
    datail = '<table class="table table-bordered datatable table-striped" id="table-1">'+tabheard+datail+'</tbody>'+'</table>';
                                                                           
                                            	$('#showdata').empty();
                                            	$('#showdata').append(datail);
                                            	var $table1 = jQuery( '#table-1' );
										            // Initialize DataTable
		$table1.DataTable( {
		dom: 'Bfrtip',
		buttons: ['excelHtml5'],
                order : false 
												});
													
													// Initalize Select Dropdown after DataTables is created
													$table1.closest( '.dataTables_wrapper' ).find( 'select' ).select2( {
														minimumResultsForSearch: -1
													});
   
                                            }else if(info['previous'] != false){ 
                                                       
                                                    	var datail = "";                                           var tabheard = "";
                                                    
											         
     tabheard =	'<thead>' 
             +'<tr>'
														            +'<th>วันที่ออกเลข</th>'
														            +'<th>เลขที่สารบรรณ</th>'
                                                                    +'<th>ชื่อ-นามสกุล</th>'
														            +'<th>วันที่ทำรายการ</th>'
                                                                    +'</tr>'
        +'</thead>'
													    	+'<tbody>';

 for (var i = 0; i < info['previous'].length; i++) {
                         
                     var id_allow = "";
                     if(info['previous'][i].id_saraban != null){
                                         	id_allow = info['previous'][i].id_saraban;
                                      	}

   datail = datail+  '<tr class="gradeA odd" role="row">'																												+'<td>'+formatDate(new Date(info['previous'][i].date_add))+'</td>'
																+'<td class="sorting_1">'+id_allow+'</td>'
                                                                                                            
+'<td>'+info['previous'][i].topic+'</td>'   																+'<td>'+info['previous'][i].firstname+' '+info['previous'][i].lastname+'</td>'


+'<td>'+formatDate(new Date(info['previous'][i].date_add))+'</td>'
+'</tr>';
                                            		                                      	}
    datail = '<table class="table table-bordered datatable table-striped" id="table-1">'+tabheard+datail+'</tbody>'+'</table>';
   
                                                                                                                        
                                            	$('#showdata').empty();
                                            	$('#showdata').append(datail);
                                            	var $table1 = jQuery( '#table-1' );
										            // Initialize DataTable
		$table1.DataTable( {
		dom: 'Bfrtip',
		buttons: ['excelHtml5'],
                order : false 
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
					}*/
              }
	//-------------------------------------------		

         function doreset(){

						         	 $('#showdata').empty();
//						         	 document.querySelector('#typeBudget').value = '';
						         	 $('#id_saraban').val('0').trigger('change');
						         	 $('#topic').val('0').trigger('change');
						         	 $('#firstname').val('0').trigger('change');
						         	 $('#lastname').val('0').trigger('change');
						         	  document.querySelector('#daystart').value = '';
						         	 document.querySelector('#monthstart').value = '';
						         	 document.querySelector('#yearstart').value = '';
						         	 document.querySelector('#dayend').value = '';
						         	 document.querySelector('#monthend').value = '';
						         	 document.querySelector('#yearend').value = '';
			 						 $('.recheck').attr('checked', false); 	
			 						 $('.neon-cb-replacement.checked').removeClass('checked'); 	
			 						 $('#in_out').val(''); 	
			 						 //('.myCheckbox').prop('checked', false); 	
			 
//						         	 document.querySelector('#dd').value = '0';
//						         	 document.querySelector('#mm').value = '0';
//						         	 document.querySelector('#yy').value = '0';
//						         	 document.querySelector('#approve').value = '';
//						         	 document.querySelector('#checkdoc').value = '';
//						         	 document.querySelector('#date1').value = '';
//						         	 document.querySelector('#date2').value = '';
						    
         }
	//-------------------------------------------		
			
		function set_inOut(check2,val2){
			
			if(check2 == true){
			   
			   $('#in_out').val(val2);
			}
			if(check2 == false){
			   
			   $('#in_out').val('');
			}			
		}	
			
			
		</script>


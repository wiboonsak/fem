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
		$(document).ready(function(){
			var $table1 = jQuery('#table-1');
			
			// Initialize DataTable
			$table1.DataTable( { 
				"order": [],
				//"aLengthMenu": [[5], [5]],
				//"bLengthChange" : false,
				"bPaginate": false,
				"bInfo": false,
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
		function insert_topic(){
            var inorout = $("#inorout").val();
            var circular_letter = $("#circular_letter").val();
            var numbersarabun = $("#numbersarabun").val();
			var fname = $("#field-1").val();
			var lname = $("#field-2").val();
			var user_create = '<?php echo ($this->session->userdata['logged_in']['id']); ?>'; //ดึงจาก session 
			var chk = '<?php echo ($this->session->userdata['logged_in']['status']); ?>'; //ดึงจาก session 
			var topic = $("#field-3").val();
			var to_name = $("#to_name").val();
			var from_name = $("#from_name").val();			
			
			if($('input:radio:checked').length < 1){				
				
				alert('กรุณาเลือก หนังสือภายใน หรือ หนังสือภายนอก');				

 			} else if(fname!="" &&lname!="" &&topic!=""){ 
				
				if(confirm("ยืนยันการบันทึก")){
					var api_link = "<?php echo base_url(); ?>Saraban/insert_topic"; 
					var data = {
								inorout 	: inorout,
								circular_letter : circular_letter,
								numbersarabun 	: numbersarabun,
								fname 		: fname,
								lname 		: lname, 
								user_update : user_create,
								chk 		: chk,
								user_create : user_create,
								topic    	: topic,  
								to_name    	: to_name,  
								from_name   : from_name  
								};
					DoJSON(data,api_link).then(function (info) {
						if(info != false){
							var formattedNumber = info.padStart(4, "0");
							swal({
								title: "สำเร็จ เลขสารบัญที่คุณได้รับคือ \n\n"+formattedNumber+"",
								text: "กรุณาจดเลขที่ได้รับก่อนกด ok เพื่อนำไปใช้ในขั้นต่อไป"},
								function(){ 
									reload();
								}
							);
						}else{ 
							alert("ไม่สามารถขอเลขได้กรุณาลองใหม่อีกครั้ง");
							reload();
						}
					});
				}
			}else{
				alert("กรุณาระบุข้อมูลให้ครบถ้วน");
			}
		}
//-------------------------------------------
    function inout(changeValue){
        var valuetxt = '';
        var circu = $('#circular_letter').val();
        if(circu == '1'){
            var txt = '/ว';
        } else {
            var txt = '/';
        }
        if(changeValue == '1'){
            valuetxt = 'มอ 820'+txt;
        } else if(changeValue == '2'){
            valuetxt = 'อว 6801.01'+txt;
            //valuetxt = 'ศธ0521.1.01/'+txt;
        }
        $('#numbersarabun').val(valuetxt);
        $('#inorout').val(changeValue);

    }
//-------------------------------------------
    function circular(changeValue){
        var txt = $('#numbersarabun').val();
        //var circu = $('#circular_letter').val();
        if(changeValue == true){
            /* $('#circular_letter').val('1');
             txt.replace("ว", "ว");
             var txt2 = txt+'ว';
             $('#numbersarabun').val(txt2);*/
            $('#circular_letter').val('1');
            if(txt.indexOf("/ว") == -1){
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
            var txt2 = txt.replace("/ว", "");
			//txt2 = txt + '/';
            $('#numbersarabun').val(txt2+'/');
            //}
        }
    }
//-------------------------------------------
	function reset_input(){
        
		$('#frm1')[0].reset();
		$('#in_out').prop('checked', false);
		$('#in_out1').prop('checked', false);
		$('#circular_letter').prop('checked', false);
		$('.neon-cb-replacement.checked').removeClass('checked');
    }		
		
	</script>
</body>
</html>
<!-- jQuery  -->
        <script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/popper.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/metisMenu.min.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/waves.js')?>"></script>        
        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/js/jquery.mockjax.js')?>"></script>
<!-- Required datatable js -->
        <script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js')?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js')?>"></script> 
        <!-- App js -->
        <script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
		<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js')?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js')?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
		<script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>

 <script type="text/javascript">
            $(document).ready(function() {

                // Default Datatable
                $('#table2').DataTable();
				
				//modify buttons style
				$.fn.editableform.buttons =
					'<button type="submit" class="btn btn-primary editable-submit btn-sm waves-effect waves-light" ><i class="mdi mdi-check" ></i></button>' +
					'<button type="button" class="btn btn-light editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';
				
				$('.CHstatus').editable({
					prepend: "New",
					mode: 'inline',
					inputclass: 'form-control-sm',
					url: '/post',  
					source: [											
						{value: 1, text: 'in process'},						
						{value: 3, text: 'Rejected'},
						{value: 4, text: 'Accepted'}
					],
					ajaxOptions: {  type: 'put' },
					display: function(value, sourceData) {
						var colors = {"": "gray", 1: "green", 3: "red", 4: "black"},
							elem = $.grep(sourceData, function(o){return o.value == value;});  

						if(elem.length) {
							$(this).text(elem[0].text).css("color", colors[value]);
						} else {
							$(this).empty();
						}
					}					
				})
				
				$('.CHstatus3').editable({
					//prepend: "in process",
					mode: 'inline',
					inputclass: 'form-control-sm',
					url: '/post',  
					source: [							
						{value: 1, text: 'in process'},
						{value: 5, text: 'Archived'}
					],
					ajaxOptions: {  type: 'put' },
					display: function(value, sourceData) {
						var colors = {"": "gray", 1: "green", 4: "black"},
							elem = $.grep(sourceData, function(o){return o.value == value;});  

						if(elem.length) {
							$(this).text(elem[0].text).css("color", colors[value]);
						} else {
							$(this).empty();
						}
					}					
				});	
				
				/*$('.CHstatus2').editable({
					prepend: "New",
					mode: 'inline',
					inputclass: 'form-control-sm',
					url: '/post',  
					source: [
						{value: 5, text: 'in process'},
						{value: 1, text: 'Accepted'},						
						{value: 2, text: 'Minor Revision'},									
						{value: 3, text: 'Major Revision'},
						{value: 4, text: 'Rejected'}						
					],
					ajaxOptions: {  type: 'put' },
					display: function(value, sourceData) {
						var colors = {"": "gray", 1: "green", 2: "#fc6a02", 3: "#fc6a02", 4: "red", 5: "#212529"},
							elem = $.grep(sourceData, function(o){return o.value == value;});  

						if(elem.length) {
							$(this).text(elem[0].text).css("color", colors[value]);
						} else {
							$(this).empty();
						}
					}					
				});*/	

				//ajax emulation
				$.mockjax({
					url: '/post',
					responseTime: 200,
					response: function(settings){						
						/*console.log(settings);
						console.log(settings.data.value);
						console.log(settings.data.name);*/
						
						var val = settings.data.value;
						var element = settings.data.name;
						managing_updateStatus(val,element);					
					}
				})	
	 })
	 
	 function managing_updateStatus(val,element){
		 
		 var element2 = element.substr(1);
		 
		 if(val == '3'){
			 
			 swal({
			   title: 'Are you sure to reject ?',
			   //text: "You won't be able to revert this!",
			   type: 'warning',
			   showCancelButton: true,
			   confirmButtonClass: 'btn btn-confirm mt-2',
			   cancelButtonClass: 'btn btn-cancel ml-2 mt-2 mmm',
			   confirmButtonText: 'Reject'
			}).then(function (){
				 
				 $.post('<?php echo base_url('CMS_Journal/managing_updateStatus_paper')?>' , { val : val , element2 : element2 }, function(data){
			 
					 	if(data ==1){
							$.post('<?php echo base_url('Journal_Mail/managingReject')?>' , { element2 : element2 }, function(data2){ 
								if(data2 ==1){
									location.reload();
								}							
							})
						}							
				})				 
			 }, function(dismiss){
			   if(dismiss == 'cancel'){
				   // function when cancel button is clicked
				   location.reload();
			   }
			}).catch(swal.noop);		 
		 
		 } else {			
		 	$.post('<?php echo base_url('CMS_Journal/managing_updateStatus_paper')?>' , { val : val , element2 : element2 }, function(data){ })
		 }
	 }	
	 
	
	
</script>	
           <!-- sample modal content -->
                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel1">Modal Heading</h4>
                                        </div>
                                        <div class="modal-body" id="modalbody1"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                           
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            
                            
                            
                            <div id="modal_Large" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                        </div>
                                        <div class="modal-body"></div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>                                           
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


  <div id="modalImport" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
       

        
          <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        2018 ©me-fi.com
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/js/jquery.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/waves.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.js')?>"></script>

         <!-- Modal-Effect -->
        <script src="<?php echo base_url('assets/plugins/custombox/js/custombox.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/custombox/js/legacy.min.js')?>"></script>

<script src="<?php echo base_url('assets/plugins/switchery/switchery.min.js')?>"></script>
       
        <!-- App js -->
        <script src="<?php echo base_url('assets/js/jquery.core.js')?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.app.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script>
	function modalImport(){
		
		$.post('<?php echo base_url('Control/formImportDB')?>', { }, function(data){ 
			
			//$('#myModalLabel1').text('Import Database');
			//$('#modalbody1').empty();
			$('#modalImport').html(data);
			$('#modalImport').modal('show');				
		
		})
		
	}
	
	function addFile_Import(){
		
		var file_Import = $('#import1').val();
		var ext = file_Import.split('.').pop().toLowerCase();
		if(file_Import ==''){
		   
			swal({
								title: "กรุณาเลือกไฟล์ import",
								//text: "You won't be able to revert this!",
								type: 'warning',								
								confirmButtonClass: 'btn btn-confirm mt-2'
								
							}) 	
			
		} else if($.inArray(ext, ['sql']) == -1) {
				swal({
								title: "กรุณาเลือกไฟล์นามสกุล .sql เท่านั้น",
								//text: "You won't be able to revert this!",
								type: 'warning',								
								confirmButtonClass: 'btn btn-confirm mt-2'
								
							}) 	
			
			
		} else {  console.log('...'+file_Import);
				$("#btnimp10").hide();
				$("#load20").show();
				 
			
			var postData = new FormData($("#frm_import")[0]);
								
								 $.ajax({
									 type:'POST',
									 //url:'<?php //echo base_url('control/upload_first_pic/')?>'+data,
									 url:'<?php echo base_url('control/importDB')?>',
									 processData: false,
									 contentType: false,
									 data : postData,						  		 
									 success:function(data2){								
										 
										if(data2 ==1){
											 $('#modalImport').modal('hide');
											  swal({
												title: 'การ Import Database เสร็จเรียบร้อยแล้ว',
												//text: 'You clicked the button!',
												type: 'success',
												confirmButtonClass: 'btn btn-confirm mt-2'
											  })
											  	
										 }
									 }
                        		});	
			
		}
	}
</script>


    </body>
</html>

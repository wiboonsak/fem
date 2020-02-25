<!-- jQuery  -->
<script src="<?php echo base_url('assets_journal/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/metisMenu.min.js') ?>"></script>

<script src="<?php echo base_url('assets_journal/js/waves.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')?>"></script>
<!-- Sweet Alert Js  -->
<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/pages/jquery.sweet-alert.init.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.js')?>"></script>

<!-- Required datatable js -->

<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js') ?>"></script>

<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js') ?>" type="text/javascript"></script>

<script src="<?php echo base_url('assets_journal/plugins/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js') ?>" type="text/javascript"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/js/jquery.core.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.app.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {

        // Default Datatable
        $('#table2').DataTable();

    })
    //=====================================
  
   //==================================
    function updateOrder(dataID,FieldName,changeValue,numPDF){
		//var returnValue = $('#chkOrder'+dataID).val();
		//console.log('returnValue:-'+returnValue)
		 if((changeValue=='')){
							swal({
								title: 'คำเตือน !',
								text: "กรุณาใส่หมายเลขเรียงลำดับ",
								type: 'warning',
								confirmButtonClass: 'btn btn-confirm mt-2'
							}) 
			 //$('#order'+dataID).val(returnValue);
			 //return false;   
		}else{
			$.post('<?php echo base_url('CMS_Journal/updatePDF')?>',{ dataID:dataID , FieldName:FieldName , changeValue:changeValue });
                        setTimeout(function(){ window.location.href = "<?php echo base_url('CMS_Journal/published_PDF_view/')?>"+numPDF; }, 2000);
				  
		}
	}
        //-------------------------------
         //----------------------
    function delete_data(dataID, table) {
        swal({
            title: 'Want to delete this data ?',
            //text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'Delete'
        }).then(function () {
            $.post('<?php echo base_url('CMS_Journal/deleteData_publish') ?>', {dataID: dataID, table: table},
                    function (data) {
                        if (data == 1) {
                            swal({
                                title: 'Deleted Successfully',
                                //text: "Your file has been deleted",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }).then(okay => {
                                if (okay) {
                                    location.reload();
                                }
                            })
                        } else {
                            swal({
                                title: "Data can't be deleted. !",
                                //text: "You won't be able to revert this!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            })
                        }
                    })
        })
    }
    //------------------------------------
    //----------------------
	function setShow_onWeb(dataID , val2 , table){  
		var changeCheckbox = document.querySelector('.js-check-change');		
  		var x = changeCheckbox.checked; 		
		if(val2 == '0'){
		   var check = '1';
		}
		if(val2 == '1'){
		   var check = '0';
		}
		$.post('<?php echo base_url('CMS_Journal/set_ShowOnWeb')?>' , { dataID : dataID , check : check , table : table }  , function(data){
			if(data==1){
				$('#ch'+dataID).val(check);
				swal({
					title: 'Edit data successfully.',
					//text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
			}else{
				swal({
					title: "Data can't be edited.!",
					//text: "You won't be able to revert this!",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ;
			}
		});
	}

</script>	
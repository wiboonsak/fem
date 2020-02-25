<!-- jQuery  -->
<script src="<?php echo base_url('assets_journal/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/metisMenu.min.js') ?>"></script>

<script src="<?php echo base_url('assets_journal/js/waves.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js') ?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js') ?>" type="text/javascript"></script>
<!-- Sweet Alert Js  -->
<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/pages/jquery.sweet-alert.init.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.js') ?>"></script>
<!-- Required datatable js -->
<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_journal/plugins/tinymce/tinymce.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js') ?>" type="text/javascript"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/js/jquery.core.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.app.js') ?>"></script>

<script type="text/javascript">
  

          //---------------------- txtTitle catFiles 
    function Comfirm(){
        swal({
           title: 'Confirm payment successfully.',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'OK'
        }).then(function () {
        
			var NotebAdmin = $('#NotebAdmin').val();
        	var payment_no = $('#payment_no').val();
        	var currentID = $('#currentID').val();
       		$.post('<?php echo base_url('CMS_Journal/updateconfirm') ?>' , { NotebAdmin:NotebAdmin,payment_no:payment_no,currentID:currentID } , function(data ){
                  //console.log('data->'+data); 
                  setTimeout(function(){ window.location.href = "<?php echo base_url('CMS_Journal/payment_action/')?>"+payment_no; }, 1000);
       		});
       })
   }
        //----------------------
        //การส่งแบย jquery
//                $.post('<?php //echo base_url('CMS_Journal/addHome') ?>' , { topic:topic , desc_en : desc_en , currentID:currentID} , function(data ){
//                    
//                  console.log('data->'+data);  
//                } )
   
 
	 
</script>


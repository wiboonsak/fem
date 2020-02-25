<!-- jQuery  -->
<script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/metisMenu.min.js')?>"></script>

<script src="<?php echo base_url('assets_journal/js/waves.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script>
<!-- Sweet Alert Js  -->
<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/pages/jquery.sweet-alert.init.js')?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.js')?>"></script>
<!-- Required datatable js -->
<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_journal/plugins/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js')?>" type="text/javascript"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>
<script type="text/javascript">
//---------------------------------
    function Addedit(){
        var editorial_name = $('#editorial_name').val();
        var editorial_category = $('#editorial_category option:selected').val();
        var dataID = $('#dataID').val();
        //var postData = new FormData($("#categoryForm")[0]);
        console.log(editorial_name+' '+editorial_category);
        if(editorial_name == ''){
            swal({
               title: 'Please insert Name Surname !',
               confirmButtonClass: 'btn btn-confirm mt-2',
               type: 'warning'
            })
    	} else if(editorial_category == ''){ 
			swal({
				title: 'Please select category !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})
        } else {
            var postData = new FormData($("#editAddForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('CMS_Journal/Addedit')?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data, status){
                    console.log(data);
                    $('#dataID').val(data);
//                    $('#topic').val('');
//                    tinyMCE.editors[$('#desc').attr('id')].setContent('');
                    // console.log("File Uploaded");
                    console.log('data->' + data + '  status->' + status);
                    if(status == 'success'){
                        swal({
                            title: 'Saved Successfully.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                        setTimeout(function (){
                            window.location.href = "<?php echo base_url('CMS_Journal/edit_add/')?>" + data;
                        }, 2000);
                    } else {
                        swal({
                            title: "Data can't be saved. !",
                            //text: "You won't be able to revert this!",
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                    }
                }
            });
        }
    }
</script>	
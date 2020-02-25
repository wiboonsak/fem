<!-- jQuery  -->
<script src="<?php echo base_url('assets_journal/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/metisMenu.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script>
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

    //-----------------------
     function Add() {
        var email = $('#email').val();
        var Password = $('#Password').val();
        var Repeat = $('#Repeat').val();
        var Repeat_old = $('#Repeat_old').val();
        var Password_old = $('#password_old').val();
        var name = $('#name').val();
        var Last = $('#Last').val();
        var Affliation = $('#Affliation').val();
        var Country = $('#Country').val();
        if (email == '') {
       
            swal(
                    {
                        title: '	Please insert email !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if ((Password == '')&& Password_old =='') {
            swal(
                    {
                        title: '	Please insert password !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if ((Repeat == '')&& Repeat_old =='') {
            swal(
                    {
                        title: '	Please insert Repeat password !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if (name == '') {
            swal(
                    {
                        title: '	Please insert Name !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if (Last == '') {
            swal(
                    {
                        title: '	Please insert Last name !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if (Affliation == '') {
            swal(
                    {
                        title: '	Please insert Affliation !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if (Country == ''){
            swal(
                    {
                        title: '	Please insert Country!',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else {
            
            //---------------------------------------------           
           var postData = new FormData($("#AddauthorForm")[0]);
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('CMS_Journal_2/AuthorAdd')?>',
		 processData: false,
		 contentType: false,
		 data : postData,
		 
		 success:function(data, status){
			console.log(data);
			$('#dataID').val(data);
		  // console.log("File Uploaded");
			console.log('data->'+data+'  status->'+status);
			if(status=='success'){
			
				
				 swal({
					title: 'Saved successfully',
					//text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
                                 setTimeout(function(){ window.location.href = "<?php echo base_url('CMS_Journal_2/Add_author/')?>"+data; }, 2000);
			}else{
				swal({
					title: 'Cannot save data!',
					//text: "You won't be able to revert this!",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ;
			}

		 }
	});
        }
        }
        //-----------------------------
        function checkEmail(email){
			$.post('<?php echo base_url('CMS_Journal_2/checkemailauthor')?>',{ email:email }, function(data){
			if(data >0){
                             swal({
					title: 'This email is already a member.',
					//text: 'You clicked the button!',
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
                                $('#email').val('');
                                $('#email').focus();
                                return false;
				} ;
			});
		
                    }
        //-----------------------------
        function chpass(pass){
                    var Password = $('#Password').val();
            if(Password != pass){
                            swal({
					title: 'Passwords do not match.',
					//text: 'You clicked the button!',
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
                $('#Repeat').val('');
                $('#Repeat').focus();
            }
		
                    }
                    

</script>


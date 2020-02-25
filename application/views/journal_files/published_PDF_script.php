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
    $(document).ready(function () {
       
		/////////////////////////////////	
        // Default Datatable
        $('#table2').DataTable({
     searching: true ,
     pageLength : 15     
});
var section2 = '<?php echo $currentID;?>';
if((section2 == '') || (section2 == '0')){
changeSection('<?php echo $pdf2;?>');
          }
    })
          //---------------------- txtTitle catFiles 
 
	//----------------------
	function delete_data(dataID,table){  
		swal({
           title: 'Want to delete this data ?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'Delete'
        }).then(function () {
		   $.post('<?php echo base_url('CMS_Journal/deleteData_publish')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
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
				}else{
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
        //---------------------------
       $(".fileupload-exists").click(function () {
            $("#upload_preview").empty();
            $("#upload_preview").addClass("fileupload-exists");
            $("#upload_new").removeClass("fileupload-exists");
            $("#img").val("");
            $("[data-provides=fileupload]").removeClass("fileupload-exists");
            $("[data-provides=fileupload]").addClass("fileupload-new");
        });
        //----------------------

    //-----------------------
     function Add() {
        var publishedData = $('#publishedData').val();
        var sectionData = $('#sectionData').val();
        var title = $('#title').val();
        var file_upload = $('#file_upload').val();
        var Page = $('#Page').val();    
        var numItems = $('.File_name').length
         
        if (publishedData == '') {
       
            swal(
                    {
                        title: '	กรุณาใส่ชื่อวารสาร !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if (sectionData == '') {
            swal(
                    {
                        title: '	กรุณาใส่หัวเรื่องหลัก !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if (title == '') {
            swal(
                    {
                        title: '	กรุณาใส่Title !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else if ((file_upload == '') && (numItems ==0)){
            swal(
                    {
                        title: '	กรุณาใส่File PDF !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } 
           else  if (Page == '') {
            swal(
                    {
                        title: '	กรุณาใส่Page No. !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        } else {
            //---------------------------------------------           
           var postData = new FormData($("#PDFForm")[0]);
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('CMS_Journal/addPDF')?>',
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
					title: 'Saved Successfully.',
					//text: 'You clicked the button!',
					type: 'success',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ; 
                                 setTimeout(function(){ window.location.href = "<?php echo base_url('CMS_Journal/published_PDF/')?>"+data; }, 2000);
			}else{
				swal({
					title: "Data can't be saved. !",
					//text: "You won't be able to revert this!",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
				}) ;
			}

		 }
	});
        }
            }
            //======================
         //================================
    function updateAuthor(dataID,FieldName,changeValue){
		//var returnValue = $('#chkOrder'+dataID).val();
		//console.log('returnValue:-'+returnValue)
		 if((changeValue=='')){
							swal({
								title: 'คำเตือน !',
								text: "กรุณาใส่ Author Name",
								type: 'warning',
								confirmButtonClass: 'btn btn-confirm mt-2'
							}) 
			 //$('#order'+dataID).val(returnValue);
			 return false;   
		}else{
			$.post('<?php echo base_url('CMS_Journal/updateauthor')?>',{ dataID:dataID , FieldName:FieldName , changeValue:changeValue })
				
		}
	}
        //==============================
        function changeSection(changeValue){ 
        $.post('<?php echo base_url('CMS_Journal/changeSection')?>',{ changeValue:changeValue },
       function(data){ 
				$('#sectionID').empty();
				$('#sectionID').html(data);
			})
        }
        //===============================
        function ADDAuthor(){
             
        $('#Name_a').append('<br><input name="Author[]" type="text" class="form-control form-control-sm author3" value="">');
    
        }
        //-----------------------------
           //----------------------
	function deleteauthor(dataID,table){  
		swal({
           title: 'Want to delete this data ?',
           //text: "You won't be able to revert this!",
           type: 'warning',
           showCancelButton: true,
           confirmButtonClass: 'btn btn-confirm mt-2',
           cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
           confirmButtonText: 'Delete'
        }).then(function () {
		   $.post('<?php echo base_url('CMS_Journal/deleteData')?>' , { dataID : dataID , table : table }, 
			function(data){
				if(data==1){ 
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
				}else{
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
</script>


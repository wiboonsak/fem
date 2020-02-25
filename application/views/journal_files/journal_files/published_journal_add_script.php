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
<script src="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')?>"></script>
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
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js') ?>" type="text/javascript"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>

<script type="text/javascript">
    $(document).ready(function (){
       
		/////////////////////////////////	
        // Default Datatable
        $('#table2').DataTable({
     		searching: true ,
     		pageLength : 15     
		});
        //modify buttons style
        showSection_data('<?php echo $currentID?>');
    })
          //---------------------- txtTitle catFiles 
    function Add(){
        var journal_name = $('#journal_name').val();
        var issue = $('#issue').val();
        var img = $('#img').val();
        var img_old = $('#img_old').val();         
    	var currentID = $('#currentID').val();
        console.log(img);
        if(journal_name == ''){
            swal({
                title: 'กรุณาใส่ชื่อวารสาร !',
                confirmButtonClass: 'btn btn-confirm mt-2',
                type: 'warning'
            }) 
        } else if(issue == ''){ 
            swal({
                title: 'กรุณาใส่ชื่อฉบับที่ !',
                confirmButtonClass: 'btn btn-confirm mt-2',
                type: 'warning'
            }) 
        } else if((img == '')&& (img_old =='')){ 
            swal(
                    {
                        title: '	กรุณาใส่รูป !',
                        confirmButtonClass: 'btn btn-confirm mt-2',
                        type: 'warning'
                    }
            ) 
        }else {
            //---------------------------------------------
			var imgs = $('#img').val();
			//console.log('imgs=>'+imgs)
            var postData = new FormData($("#publishedForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('CMS_Journal_2/addPublish')?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data, status){
                    //console.log(data);
                    $('#currentID').val(data);
                    //console.log('data->' + data + '  status->' + status);
                    if(status == 'success'){
                        swal({
                            title: 'Saved Successfully.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                     	setTimeout(function(){ window.location.href = "<?php echo base_url('CMS_Journal_2/published_journal/')?>"+data; }, 2000);
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
        //----------------------
        //การส่งแบย jquery
//                $.post('<?php //echo base_url('CMS_Journal_2/addHome') ?>' , { topic:topic , desc_en : desc_en , currentID:currentID} , function(data ){
//                    
//                  console.log('data->'+data);  
//                } )
   }
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
		$.post('<?php echo base_url('CMS_Journal_2/set_ShowOnWeb')?>' , { dataID : dataID , check : check , table : table }  , function(data){
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
		   $.post('<?php echo base_url('CMS_Journal_2/deleteData_publish')?>' , { dataID : dataID , table : table }, 
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
       $(".fileupload-exists").click(function (){
            $("#upload_preview").empty();
            $("#upload_preview").addClass("fileupload-exists");
            $("#upload_new").removeClass("fileupload-exists");
            $("#img").val("");
            $("[data-provides=fileupload]").removeClass("fileupload-exists");
            $("[data-provides=fileupload]").addClass("fileupload-new");
        });
        //----------------------
    function removeFile(dataID, file_name, txt1, table, field, ch) {
        var txt2 = 'Want to delete this data ?';
        swal({
            title: txt2,
            //text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'Delete'
        }).then(function () {
            $.post('<?php echo base_url('CMS_Journal_2/remove_file3')?>', { dataID: dataID, table: table, file_name: file_name, field: field },
                    function (data) {
                        if(data == '1'){
                            swal({
                                title: 'Deleted Successfully',
                                //text: "Your file has been deleted",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }).then(okay => {
                                if(okay){
                                    
                                    if(txt1 == 'รูปภาพ'){
                                        $("#upload_preview").empty();
                                        $("#upload_preview").addClass("fileupload-exists");
                                        $("#upload_new").removeClass("fileupload-exists");
                                        $("#" + field).val("");
                                        $("#img_old").val("");
                                        $("#" + field + dataID).val("");
                                        $("[data-provides=fileupload]").removeClass("fileupload-exists");
                                        $("[data-provides=fileupload]").addClass("fileupload-new");
                                    }
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
    //-------------------------------------
    function update(dataid,dataname){
    $('#name').val(dataname);
    $('#dataID').val(dataid);
    
    }
   
    //-----------------------
     function Addsection(){
        var name = $('#name').val();
        var dataID = $('#dataID').val();    
       
        if(name == ''){
            swal({
               title: 'กรุณาใส่หัวข้อหลัก !',
               confirmButtonClass: 'btn btn-confirm mt-2',
               type: 'warning'
        }) 
			
        } else {
            //---------------------------------------------
            
           var currentID = '<?php echo $currentID?>';
           $.post('<?php echo base_url('CMS_Journal_2/addsection')?>' , { currentID : currentID, name : name, dataID : dataID },function (data){
                    console.log(data);
                    $('#dataID').val(data);
//                    $('#topic').val('');
//                    tinyMCE.editors[$('#desc').attr('id')].setContent('');
                    // console.log("File Uploaded");
                    console.log('data->' + data + '  status->' + status);
                    if(data !=0){ 
                        showSection_data(currentID);
                        swal({
                            title: 'Saved Successfully.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                   
        			} else {
                        swal({
                            title: "Data can't be saved. !",
                            //text: "You won't be able to revert this!",
                            type: 'warning',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                    }
    
            });
        }
   }
  //======================
   function showSection_data(ProID){
            $.post('<?php echo base_url('CMS_Journal/List_show')?>' , { currentID : ProID }, function(data){ 
				$('#show_data').empty();
				$('#show_data').html(data);
			})
            }
            //======================
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
		$.post('<?php echo base_url('CMS_Journal_2/set_ShowOnWeb')?>' , { dataID : dataID , check : check , table : table }  , function(data){
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
        //=================================
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
		   $.post('<?php echo base_url('CMS_Journal_2/deleteData_publish')?>' , { dataID : dataID , table : table }, 
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
        
    //================================
    function updateOrder(dataID,FieldName,changeValue){
		var returnValue = $('#chkOrder'+dataID).val();
		console.log('returnValue:-'+returnValue)
		if((changeValue=='')){
			swal({
				title: 'Please insert sort number',
				//text: "กรุณาใส่หมายเลขเรียงลำดับ",
				type: 'warning',
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#order'+dataID).val(returnValue);
			return false; 
			
		}else{
			$.post('<?php echo base_url('CMS_Journal_2/updateOrderCate')?>',{ dataID : dataID , FieldName : FieldName , changeValue : changeValue } ,function(data){ 
						
				if(data==1){
					swal({
						title: 'Edit data successfully.',
						//text: 'You clicked the button!',
						type: 'success',
						confirmButtonClass: 'btn btn-confirm mt-2'
					}); 
				}else{
					swal({
						title: "Data can't be edited.!",
						//text: 'You clicked the button!',
						type: 'warning',
						confirmButtonClass: 'btn btn-confirm mt-2'
					}); 
				}
			})
		}
	}
</script>
<!-- jQuery  -->
<script src="<?php echo base_url('assets_journal/js/jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/metisMenu.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/modernizr.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/waves.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js')?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js')?>"></script>
<!-- Sweet Alert Js  -->
<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/pages/jquery.sweet-alert.init.js')?>"></script>

<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js')?>"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_journal/plugins/tinymce/tinymce.min.js')?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js')?>" type="text/javascript"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/js/jquery.core.js')?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.app.js')?>"></script>
<script type="text/javascript">
    $(document).ready(function (){
        tinymce.init({
            selector: "textarea.ex",
            theme: "modern",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
        /////////////////////////////////	
        // Default Datatable
        $('#table2').DataTable();
        
    })
    //----------------------
    function removeFile(dataID, file_name, table, field, ch){
        var txt2 = 'Want to delete this data ?';
        swal({
            title: txt2,
            //text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-confirm mt-2',
            cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
            confirmButtonText: 'Delete'
        }).then(function (){
            $.post('<?php echo base_url('CMS_Journal/remove_file')?>', { dataID: dataID, table: table, file_name: file_name, field: field },
                    function (data){
                        if(data == '1'){
                            swal({
                                title: 'Deleted Successfully',
                                //text: "Your file has been deleted",
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            }).then(okay => {
                                if(okay){
                                   /* if(txt1 == 'ไฟล์'){
                                        $('#' + field + dataID).val('');
                                        $('#up_file' + ch).show();
                                        $('#aFile0' + ch).hide();
                                        $('#aFile' + ch).hide();
                                    }
                                    if (txt1 == 'รูปภาพ') {*/
                                        $("#upload_preview").empty();
                                        $("#upload_preview").addClass("fileupload-exists");
                                        $("#upload_new").removeClass("fileupload-exists");
                                        $("#"+field).val("");
                                        $("#"+field+dataID).val("");
                                        $("[data-provides=fileupload]").removeClass("fileupload-exists");
                                        $("[data-provides=fileupload]").addClass("fileupload-new");
                                    //}
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
    //---------------------- txtTitle catFiles 
    function Add(){
        var topic = $('#topic').val();
        var desc = tinyMCE.editors[$('#desc').attr('id')].getContent();
        $('#comment').val(desc);
        var currentID = $('#currentID').val();
        console.log(topic + '  ' + desc);
        if(topic == ''){
            swal({
                title: 'Please insert topic !',
                confirmButtonClass: 'btn btn-confirm mt-2',
                type: 'warning'
            })
        } else {
            //---------------------------------------------
            var postData = new FormData($("#homeForm")[0]);
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('CMS_Journal/addHome')?>',
                processData: false,
                contentType: false,
                data: postData,
                success: function (data,status){
                    console.log(data);
                    $('#currentID').val(data);
                    // console.log("File Uploaded");
                    console.log('data->' + data + '  status->' + status);
                    if(status == 'success'){
                        swal({
                            title: 'Saved Successfully.',
                            //text: 'You clicked the button!',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        });
                        setTimeout(function(){ window.location.href = "<?php echo base_url('CMS_Journal/home/')?>"+data; }, 2000);
                                
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
        //------------------------------------
        
        
        //การส่งแบย jquery
//                $.post('<?php //echo base_url('CMS_Journal/addHome') ?>' , { topic:topic , desc_en : desc_en , currentID:currentID} , function(data ){
//                    
//                  console.log('data->'+data);  
//                } )
    }
    $(".fileupload-exists").click(function (){
       $("#upload_preview").empty();
       $("#upload_preview").addClass("fileupload-exists");
       $("#upload_new").removeClass("fileupload-exists");
       $("#img").val("");
       $("[data-provides=fileupload]").removeClass("fileupload-exists");
       $("[data-provides=fileupload]").addClass("fileupload-new");
    });
</script>


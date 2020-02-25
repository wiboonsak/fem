<!-- jQuery  -->
<script src="<?php echo base_url('assets_journal/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/metisMenu.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/waves.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.slimscroll.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jquery-toastr/jquery.toast.min.js') ?>"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/js/jquery.mockjax.js') ?>"></script>
<script src="<?php echo base_url('assets/pages/jquery.toastr.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-filestyle.min.js') ?>" type="text/javascript"></script>
<!-- Sweet Alert Js  -->
<script src="<?php echo base_url('assets_journal/plugins/sweet-alert/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/pages/jquery.sweet-alert.init.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/plugins/switchery/switchery.min.js') ?>"></script>

<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<!-- App js -->
<script src="<?php echo base_url('assets_journal/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<script src="<?php echo base_url('assets_journal/plugins/moment/moment.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_journal/plugins/bootstrap-xeditable/js/bootstrap-editable.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.core.js') ?>"></script>
<script src="<?php echo base_url('assets_journal/js/jquery.app.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {

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
                {value: 1, text: 'Current'},
                {value: 2, text: 'Archive'},
            ],
            ajaxOptions: {type: 'put'},
            display: function (value, sourceData) {
                var colors = {1: "green", 2: "black"},
                        elem = $.grep(sourceData, function (o) {
                            return o.value == value;
                        });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        $('.CHstatus2').editable({
            prepend: "New",
            mode: 'inline',
            inputclass: 'form-control-sm',
            url: '/post',
            source: [
                {value: 1, text: 'Accepted'},
                {value: 2, text: 'Minor'},
                {value: 3, text: 'Major'},
                {value: 4, text: 'Rejected'}
            ],
            ajaxOptions: {type: 'put'},
            display: function (value, sourceData) {
                var colors = {"": "gray", 1: "green", 2: "#fc6a02", 3: "#fc6a02", 4: "red"},
                        elem = $.grep(sourceData, function (o) {
                            return o.value == value;
                        });

                if (elem.length) {
                    $(this).text(elem[0].text).css("color", colors[value]);
                } else {
                    $(this).empty();
                }
            }
        });

        //ajax emulation
        $.mockjax({
            url: '/post',
            responseTime: 200,
            response: function (settings) {
                /*console.log(settings);
                 console.log(settings.data.value);
                 console.log(settings.data.name);*/

                var val = settings.data.value;
                var element = settings.data.name;
                managing_updateStatus(val, element);
            }
        })
    })

    function managing_updateStatus(val, element) {

        var element2 = element.substr(1);

        $.post('<?php echo base_url('CMS_Journal/managing_updateStatus') ?>', {val: val, element2: element2}, function (data) {

        })
    }
    //=====================================
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
   


</script>	
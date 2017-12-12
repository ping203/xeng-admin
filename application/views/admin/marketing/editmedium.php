<!-- head -->

<link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
<link rel="stylesheet"
      href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
<script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
<script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
<script
    src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
<?php $this->load->view('admin/marketing/head', $this->data) ?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Cập nhật medium</h6>
        </div>
        <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
            <fieldset>
                <div class="formRow">
                    <div class="formRight">
                        <label id="error-status" style="color: red ;margin-bottom: 10px;font-size: 20;font-weight: bold">

                        </label>
                    </div>
                </div>
                <div class="formRow">
                    <label for="param_username" class="formLeft">Tên utm_medium request:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" value="<?php echo $info[0]->name ?>"   name="name" id="param_remedium"></span>
                        <span class="autocheck" name="name_autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label for="param_name" class="formLeft">Tên utm_medium hiển thị::<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo"><input type="text" _autocheck="true" id="param_dismedium" value="<?php echo $info[0]->display ?>"  name="display_name"></span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formSubmit">
                    <input type="button" class="redB" value="Cập nhật" id="editmedium">
                </div>
            </fieldset>
        </form>
    </div>
</div>
<div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <p style="color: #0000ff">Bạn sửa medium thành công</p>
            </div>
            <div class="modal-footer">
                <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
            </div>
        </div>
    </div>
</div>


<script>
    $("#editmedium").click(function () {

        if ($("#param_remedium").val() == "") {
            $("#error-status").html("Bạn chưa nhập tên medium");
            return false;
        }
        if ($("#param_dismedium").val() == "") {
            $("#error-status").html("Bạn chưa nhập tên displaymedium");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/editmediumajax')?>",
            data: {
                name: $("#param_remedium").val(),
                displayname: $("#param_dismedium").val(),
                id : "<?php  echo $info[0]->id ?>"
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result == 0) {
                    $("#error-status").html("Sửa không thành công");
                } else {
                    $("#error-status").html("");
                    $("#bsModal3").modal("show");
                }

            }, error: function () {
                $("#spinner").hide();
                $("#error-status").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: 60000
        })

    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        window.location.href = "<?php echo admin_url('marketing/medium') ?>";
    });

</script>
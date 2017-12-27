<div class="content-wrapper">
<?php if ($role == false): ?>
    <section class="content-header">
        <h1>
            Bạn không được phân quyền
        </h1>
    </section>
<?php else: ?>

    <section class="content-header">
        <h1>
            Gửi mail giftcode
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>
        <input type="hidden" id="listnickname" value="<?php echo $listnn ?>">
        <input type="hidden" id="listgiftcode" value="<?php echo $listgc ?>">

    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label  style="color: red;word-break: break-all;" id="errocode"><?php echo $error; ?></label>
                </div>
            </div>
        </div>
        <form action="<?php echo admin_url("mail/sendmailgc") ?>" id="fileinfo" name="fileinfo"
              enctype="multipart/form-data" method="post">
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tài khoản:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="file" id="userfile" name="filexls"
                           value="<?php echo $this->input->post('filexls') ?>">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="submit" class="btn btn-success" id="upload"
                           value="Upload"
                           name="ok">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" value="Gửi mail" name="submit" class="btn btn-success" id="sendmail">
                </div>
            </div>
        </div>
            </form>

    </div>

    <div class="box-body  table-responsive no-padding">
        <?php $this->load->view('admin/message', $this->data); ?>
        <?php $this->load->view('admin/error', $this->data); ?>

        <div id="spinner" class="spinner" style="display:none;">
            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
        </div>
        <div class="text-center">
            <ul id="pagination-demo" class="pagination-sm"></ul>
        </div>
        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                        <p style="color: #0000ff">Bạn gửi mail thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-success" type="button" value="Đóng" data-dismiss="modal"
                               aria-hidden="true">
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>
    </section>
<?php endif; ?>
</div>
<script>
    $("#sendmail").click(function () {
        if ($("#listnickname").val() == "" || $("#listgiftcode").val()== "" ) {
            $("#errocode").html("Không tồn tại file hoặc key Nickname , Giftcode viết sai");
        } else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('mail/sendmailgcajax')?>",
                data: {
                    nickname: $("#listnickname").val(),
                    giftcode: $("#listgiftcode").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        if (res.nickName != null || res.nickName != "" ) {
                            $("#errocode").html("Nick name không tồn tại:" + (res.nickName));
                        }
                    } else if (res.errorCode == 10001) {
                        $("#errocode").html("Nick name không tồn tại:" + (res.nickName));

                    } else if (res.errorCode == 10002) {
                        $("#errocode").html("Số lượng nickname nhiều hơn số lượng giftcode vui lòng upload lại file");

                    } else if (res.errorCode == 10003) {
                        $("#errocode").html("Số lượng giftcode nhiều hơn số lượng nickname vui lòng upload lại file");

                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Bạn không gửi được gift code");
                }
            });
        }
    });

</script>
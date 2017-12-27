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
                Gửi tin nhắn
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <input type="hidden" id="listsdt" value="<?php echo $listsdt ?>">
                        <input type="hidden" id="listgiftcode" value="<?php echo $listgc ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label  style="color: red;word-break: break-all;" id="errocode"><?php echo $error; ?></label>
                                    </div>
                                </div>
                            </div>
                            <form action="<?php echo admin_url("mail/sendmessagegc") ?>" id="fileinfo" name="fileinfo"
                                  enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="radio" id="smsbrandname" name="isThuong" value="1" checked > Brandname
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="radio" id="smsnotify" name="isThuong" value="0"> Notify
                                        </div>
                                        <input type="hidden" name="displaycheck" id="displaycheck" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label  for="exampleInputEmail1">Tài khoản:</label>
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
                                            <input type="button" value="Gửi tin nhắn" name="submit" class="btn btn-success" id="sendmail">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label  for="exampleInputEmail1">Nội dung:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <textarea id="content" row="100" class="form-control" style="height: 400px"
                                                      placeholder="Bạn chỉ được nhập ký tự không dấu" maxlength="459"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>

                        <div class="box-body">
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
                                            <p style="color: #0000ff">Bạn gửi tin nhắn thành công</p>
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
        if ($("#content").val() == "") {
            $("#errocode").html("Bạn chưa nhập nội dung");
            return false;
        }
        var link;
        if( $("#displaycheck").val() == 1){
            link = "<?php echo admin_url('mail/sendmessagegcajax')?>";
        }

        if( $("#displaycheck").val() == 2){
            link = "<?php echo admin_url('mail/sendmessagegc1ajax')?>";
            if($("#content").val().length > 150){
                $("#errocode").html("Bạn nhập quá nội dung gửi");
                return false;
            }
        }
        if ($("#listsdt").val() == "" || $("#listgiftcode").val() == "") {
            $("#errocode").html("Không tồn tại file hoặc key Sdt , Giftcode viết sai");
        } else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: link,
                data: {
                    mobile: $("#listsdt").val(),
                    content: $("#content").val(),
                    giftcode: $("#listgiftcode").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res == 0) {
                        $("#bsModal3").modal("show");
                        $("#errocode").html("");
                        $("#content").val("");
                    } else if (res == 1) {
                        $("#errocode").html("Hệ thống gián đoạn");
                    } else if (res == 2) {
                        $("#errocode").html("Số điện thoại không hợp lệ");
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Bạn không thể gửi tin nhắn gift code");
                }
            });
        }


    });


    $(document).ready(function () {
        $("#displaycheck").val(1);

    });
    $('#smsbrandname').on('change', function () {
        $("#displaycheck").val(1);

    }).change();
    $('#smsnotify').on('change', function () {
        $("#displaycheck").val(2);
    }).change();

</script>
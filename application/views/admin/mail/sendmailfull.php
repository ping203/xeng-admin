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
                Gửi mail giftcode full
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
                            <form action="<?php echo admin_url("mail/sendmailfull") ?>" id="fileinfo" name="fileinfo"
                                  enctype="multipart/form-data" method="post">

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
                                           <label>Tiêu đề</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input id="txttitle" type="text" class="form-control"
                                                   placeholder="Bạn nhập tiêu đề">
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
        if ($("#txttitle").val() == "") {
            $("#errocode").html("Bạn chưa nhập tiêu đề");
            return false;
        }
        else if ($("#content").val() == "") {
            $("#errocode").html("Bạn chưa nhập nội dung");
            return false;
        }
        if ($("#listnickname").val() == "" || $("#listgiftcode").val()== "" ) {
            $("#errocode").html("Không tồn tại file hoặc key Nickname , Giftcode viết sai");
            return false;
        } else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('mail/sendmailfullajax')?>",
                data: {
                    nickname: $("#listnickname").val(),
                    giftcode:  $("#listgiftcode").val(),
                    content: $("#content").val(),
                    title: $("#txttitle").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    console.log(res);
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        $("#errocode").html("");
                        $("#content").val("");
                        $("#txttitle").val("");
                        if (res.nickName != "") {
                            $("#errocode").html("Nick name không tồn tại:" + res.nickName);
                        }
                    } else if (res.errorCode == 10001) {
                        $("#errocode").html("Nick name không tồn tại:" + res.nickName);

                    } else if (res.errorCode == 10002) {
                        $("#errocode").html("Số lượng nickname và số lượng giftcode không bằng nhau vui lòng upload lại file");


                    }
                    else if (res.errorCode == 10003) {
                        $("#errocode").html("Số lượng nickname và số lượng giftcode không bằng nhau vui lòng upload lại file");


                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Bạn không gửi tin nhắn gift code");
                }
            });
        }


    });

</script>
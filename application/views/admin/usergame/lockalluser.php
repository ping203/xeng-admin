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
            Khóa nhiều tài khoản
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>
        <input type="hidden" id="listnickname" value="<?php echo $listnn ?>">
    <div class="box-body">
        <div class="form-group">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label  style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?></label>
                </div>
            </div>
        </div>

        <form action="<?php echo admin_url("usergame/lockalluser") ?>" id="fileinfo" name="fileinfo"
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
                    </div>
                    <div class="col-md-1 col-sm-2 col-xs-12">
                        <input type="submit" class="btn btn-success" id="upload"
                               value="Upload" name="ok">
                    </div>
                </div>
            </div>
        </form>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-1 col-xs-12">
                    <label for="exampleInputEmail1">Cấm login</label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input type="checkbox" name="role" value="0">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12">
                    <label for="exampleInputEmail1">Cấm đổi thưởng</label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input type="checkbox" name="role" value="1">
                </div>
                <div class="col-md-1 col-sm-1 col-xs-12">
                    <label for="exampleInputEmail1">Cấm chuyển tiền</label>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <input type="checkbox" name="role" value="3">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Lý do khóa:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="txtlydo" class="form-control" placeholder="Nhập lý do khóa">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Chức năng:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_type" class="form-control">
                        <option value="1">Khóa tài khoản</option>
                        <option value="0">Mở khóa tài khoản</option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="openuser" value="Cập nhật" class="btn btn-success">
                </div>
            </div>
        </div>
    </div>

    <div>
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
                        <p style="color: #0000ff">Bạn khóa tài khoản thành công</p>
                    </div>
                    <div class="modal-footer">
                        <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal" aria-hidden="true">
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

<script type="text/javascript">
    $(document).ready(function () {
    });

    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });
    $("#openuser").click(function () {
        var lst_role = [];
        var lst_role_txt = [];
        $.each($("input[name='role']:checked"), function () {
            lst_role.push($(this).val());
            lst_role_txt.push(getlockuser($(this).val()));
        });
        if ($("#txtlydo").val() == "") {
            alert("Bạn chưa nhập lý do khóa");
            return false;
        }
        if (lst_role.length > 0) {
            $("#txtaction").val(lst_role_txt.join(','));
            if($("#listnickname").val() == ""){
                $("#errocode").html("Không tồn tại file hoặc key Nickname viết sai");
            }else {
                $("#spinner").show();
                $.ajax({
                    type: "POST",
                    url: "<?php echo admin_url('usergame/lockalluserajax')?>",
                    data: {
                        nickname: $("#listnickname").val(),
                        action: lst_role.join(','),
                        type: $("#select_type").val(),
                        txtlydo: $("#txtlydo").val(),
                        txtaction: $("#txtaction").val()

                    },
                    dataType: 'json',
                    success: function (res) {
                        $("#spinner").hide();
                        if (res.errorCode == 0) {
                            $("#bsModal3").modal("show");
                            if (res.nickName != null || res.nickName != "") {
                                $("#errocode").html("Nick name không tồn tại:" + (res.nickName));
                            }
                        } else if (res.errorCode == 10001) {
                            $("#errocode").html("Nick name không tồn tại:" + (res.nickName));
                        }
                    }, error: function () {
                        $("#spinner").hide();
                        $("#errocode").html("Bạn không khóa được tài khoản");
                    }
                });
            }

        } else {
            $("#errocode").html("Bạn phải chọn chức năng khóa tài khoản");
            return false;
        }
    });


    function getlockuser(count) {
        var strresult = "";
        switch (count) {
            case "0":
                strresult = " Cấm Login";
                break;
            case "1":
                strresult = "Cấm Đổi thưởng";
                break;
            case "2":
                strresult = "Login sandbox";
                break;
            case "3":
                strresult = "Cấm Chuyển tiền";
                break;
            case "8":
                strresult = "Cấm Chơi sâm";
                break;
            case "9":
                strresult = "Cấm Chơi ba cây";
                break;
            case "10":
                strresult = "Cấm Chơi binh";
                break;
            case "11":
                strresult = "Cấm Chơi tlmn";
                break;
            case "12":
                strresult = "Cấm Chơi tá lả";
                break;
            case "13":
                strresult = "Cấm Chơi liêng";
                break;
            case "14":
                strresult = "Cấm Chơi xì tố";
                break;
            case "15":
                strresult = "Cấm Chơi bài cào";
                break;
            case "16":
                strresult = "Cấm Chơi xóc xóc";
                break;
            case "17":
                strresult = "Cấm Chơi poker";
                break;
        }
        return strresult;
    }
</script>

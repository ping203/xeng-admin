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
                Kiểm tra nickname được dùng giftcode
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <input type="hidden" id="listnickname" value="<?php echo $listnn ?>">
                        <input type="hidden" id="status" value="<?php echo $admin_info->Status ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label  style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                                    </div>
                                </div>
                            </div>

                            <form action="<?php echo admin_url("usergame/checkusername") ?>" id="fileinfo" name="fileinfo"
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
                                                   value="Upload" name="ok">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="button" id="openuser" value="Tìm kiếm"
                                                   class="btn btn-success">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="button" id="exportexel" value="Xuất Exel"
                                                   class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="checkAll" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Username</td>
                                            <td>Nickname</td>
                                            <td>IP</td>
                                            <?php if($admin_info->Status == "A"): ?>
                                                <td>Điện thoại</td>
                                            <?php endif; ?>
                                            <td>Thời gian</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
                            </div>
                            <div class="text-center">
                                <ul id="pagination-demo" class="pagination-sm"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<script type="text/javascript">
    $("#openuser").click(function () {
        var result = ""
        if($("#listnickname").val() == ""){
            $("#errocode").html("Không tồn tại file ");
        }else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('usergame/checkusernameajax')?>",
                data: {
                    nickname: $("#listnickname").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        if (res.lstNickName != null || res.lstNickName != "") {
                            $("#errocode").html("Nick name không tồn tại:" + (res.lstNickName));
                        }
                        stt = 1;
                        $.each(res.transactions, function (index, value) {
                            result += resultSearchTransction(stt, value.user_name, value.nick_name, value.ip,value.phone,value.time_log);
                            stt++;
                        });
                        $('#logaction').html(result);
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Hệ thống gián đoạn");
                }
            });
        }

    });
    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Listuser",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    function resultSearchTransction(stt, username, nickname, ip,phone,time) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + username + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + ip + "</td>";
		 if($("#status").val() == "A"){
            rs += "<td>" + phone + "</td>";
        }
        rs += "<td>" + time + "</td>";
        return rs;
    }
</script>

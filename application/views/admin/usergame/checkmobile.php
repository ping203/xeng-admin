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
                Kiểm tra số điện thoại
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <input type="hidden" id="listmobile" value="<?php echo $listmb ?>">
                        <input type="hidden" id="status" value="<?php echo $admin_info->Status ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label  style="color: red;word-break: break-all" id="errocode"><?php echo $error; ?>
                                    </div>
                                </div>
                            </div>

                            <form action="<?php echo admin_url("usergame/checkmobile") ?>" id="fileinfo" name="fileinfo"
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
                                            <td>SDT</td>
                                            <td>Tiền nạp</td>
                                            <td>Bảo mật</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="checkAll1" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>SĐT</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction1">

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
        var result1 = ""
        if($("#listmobile").val() == ""){
            $("#errocode").html("Không tồn tại file ");
        }else {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('usergame/checkmobileajax')?>",
                data: {
                    mobile: $("#listmobile").val()
                },
                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res.errorCode == 0) {
                        $("#bsModal3").modal("show");
                        if (res.lstPhone != null || res.lstPhone != "") {
                            $("#errocode").html("Số điện thoại không tồn tại:" + (res.lstPhone));

                            stt1 = 1;
                            $.each(res.lstPhone.split(','), function (index, value) {
                                result1 += resultsdt(stt1, value);
                                stt1++;
                            });
                            $('#logaction1').html(result1);
                            $("#checkAll1").table2excel({
                                exclude: ".noExl",
                                name: "Excel Document Name",
                                filename: "Listnomobile",
                                fileext: ".xls",
                                exclude_img: true,
                                exclude_links: true,
                                exclude_inputs: true
                            });
                        }
                        stt = 1;
                        $.each(res.transactions, function (index, value) {
                            result += resultSearchTransction(stt, value.userName, value.nickName,value.mobile, value.rechargeMoney, value.isHasSercurityMobile);
                            stt++;
                        });
                        $('#logaction').html(result);
                    }
                }, error: function () {
                    $("#spinner").hide();
                    $("#errocode").html("Hệ thống quá tải. Vui lòng gọi 19008698");
                }, timeout: timeOutApi
            });
        }

    });
    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Listmobile",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
    function resultSearchTransction(stt, username, nickname,sdt,rechargemoney,baomat) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + username + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + sdt + "</td>";
        rs += "<td>" + commaSeparateNumber(rechargemoney) + "</td>";
        if( baomat == 1){
            rs += "<td>" + "Đã bảo mật" + "</td>";
        }else if(baomat == 0){
            rs += "<td>" + "Chưa bảo mật" + "</td>";
        }

        return rs;
    }
    function resultsdt(stt, sdt) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + sdt + "</td>";
        return rs;
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

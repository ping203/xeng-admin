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
            Danh sách tài khoản đại lý cấp 1
        </h1>
        <ol class="breadcrumb">
            <label class="">Tổng: <span id="sumResult" style="color: #0000ff"></span></label>
        </ol>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>

    <div class="box-body">
    <form action="<?php echo admin_url('usergame/userdaily1') ?>" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Từ ngày:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' value="" class="form-control"
                           id="toDate" name="toDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Đến ngày:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">

                <div class='input-group date' id='datetimepicker2'>
                    <input type='text' value="" class="form-control"
                           id="fromDate" name="fromDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Tên đăng nhập:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" id="username"
                       value="<?php echo $this->input->post('username') ?>" name="username">
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Nickname:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" id="nickname" class="form-control"
                       value="<?php echo $this->input->post('nickname') ?>" name="nickname">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Sắp xếp theo:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="fieldname" name="fieldname" class="form-control">
                    <option value="">Chọn</option>
                    <option value="1" <?php if ($this->input->post('fieldname') == 1) {
                        echo "selected";
                    } ?>><?php echo $namegame ?></option>
                    <option value="2" <?php if ($this->input->post('fieldname') == 2) {
                        echo "selected";
                    } ?>>Xu
                    </option>
                    <option value="3" <?php if ($this->input->post('fieldname') == 3) {
                        echo "selected";
                    } ?>>Safe
                    </option>
                    <option value="4" <?php if ($this->input->post('fieldname') == 4) {
                        echo "selected";
                    } ?>>Vippoint
                    </option>
                    <option value="5" <?php if ($this->input->post('fieldname') == 5) {
                        echo "selected";
                    } ?>>Vippoint tích lũy
                    </option>
                    <option value="6" <?php if ($this->input->post('fieldname') == 6) {
                        echo "selected";
                    } ?>>Nạp tiền
                    </option>
                </select>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1"> Điều kiện:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="timkiemtheo" name="timkiemtheo" class="form-control">
                    <option value="">Chọn</option>
                    <option value="1" <?php if ($this->input->post('timkiemtheo') == 1) {
                        echo "selected";
                    } ?>>Tăng dần
                    </option>
                    <option value="2" <?php if ($this->input->post('timkiemtheo') == 2) {
                        echo "selected";
                    } ?> >Giảm dần
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Loại tài khoản:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <?php if ($admin_info->Status == "M" || $admin_info->Status == "S"): ?>
                    <select id="typetaikhoan" name="timkiemtheo" class="form-control">
                        <option value="0">Chọn</option>
                    </select>
                <?php else: ?>
                    <select id="typetaikhoan" name="typetaikhoan" class="form-control">
                        <option value="1" <?php if ($this->input->post('typetaikhoan') == "1") {
                            echo "selected";
                        } ?> >Đại lý cấp 1
                        </option>
                    </select>
                <?php endif; ?>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Hiển thị:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="record" name="record" class="form-control">
                    <option value="50" <?php if ($this->input->post('record') == 50) {
                        echo "selected";
                    } ?> >50
                    </option>
                    <option value="100" <?php if ($this->input->post('record') == 100) {
                        echo "selected";
                    } ?>>100
                    </option>
                    <option value="200" <?php if ($this->input->post('record') == 200) {
                        echo "selected";
                    } ?>>200
                    </option>
                    <option value="500" <?php if ($this->input->post('record') == 500) {
                        echo "selected";
                    } ?>>500
                    </option>
                    <option value="1000" <?php if ($this->input->post('record') == 1000) {
                        echo "selected";
                    } ?>>1000
                    </option>
                    <option value="2000" <?php if ($this->input->post('record') == 2000) {
                        echo "selected";
                    } ?>>2000
                    </option>
                    <option value="5000" <?php if ($this->input->post('record') == 5000) {
                        echo "selected";
                    } ?>>5000
                    </option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Điện thoại:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" id="phone"
                       value="<?php echo $this->input->post('phone') ?>" name="phone">
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Email:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" id="txtemail"
                       value="<?php echo $this->input->post('txtemail') ?>" name="txtemail">
            </div>

        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Loại tìm kiếm:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="typetimkiem" name="typetimkiem" class="form-control">
                    <?php if ($admin_info->Status == "M" || $admin_info->Status == "L" || $admin_info->Status == "LM"): ?>
                        <option value="0" <?php if ($this->input->post('typetimkiem') == "0") {
                            echo "selected";
                        } ?>>Tìm chính xác
                        </option>
                    <?php else: ?>
                        <option value="0" <?php if ($this->input->post('typetimkiem') == "0") {
                            echo "selected";
                        } ?>>Tìm chính xác
                        </option>
                        <option value="1" <?php if ($this->input->post('typetimkiem') == "1") {
                            echo "selected";
                        } ?>>Tìm gần đúng
                        </option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <input type="submit" id="search_tran" value="Tìm kiếm" class="btn btn-success">
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
                <table id="example2" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Username</td>
                        <td>Nickname</td>
                        <td>Số dư <?php echo $namegame ?></td>
                        <td>Số dư xu</td>
                        <td>Số <?php echo $namegame ?> két sắt</td>
                        <td>Vippoint hiện tại</td>
                        <td>Vippoint tích lũy</td>
                        <td>Vippoint event</td>
                        <td>Tiền nạp</td>
                        <td>Ngày tạo</td>
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
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });
    $("#search_tran").click(function () {
        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    function resultSearchTransction(stt, username, nickname, vin, xu, safe, vippoint, vpsave, vpevent, recharge, date, googleid, facebookid) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        if (username == null) {
            if (googleid != null) {
                rs += "<td>" + "GG_" + googleid + "</td>";
            } else if (facebookid != null) {
                rs += "<td>" + "FB_" + facebookid + "</td>";
            }
        } else {
            rs += "<td>" + username + "</td>";
        }
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(vin) + "</td>";
        rs += "<td>" + commaSeparateNumber(xu) + "</td>";
        rs += "<td>" + commaSeparateNumber(safe) + "</td>";
        rs += "<td>" + vippoint + "</td>";
        rs += "<td>" + vpsave + "</td>";
        rs += "<td>" + vpevent + "</td>";
        rs += "<td>" + commaSeparateNumber(recharge) + "</td>";
        rs += "<td>" + date + "</td>";
        return rs;
    }
    $(document).ready(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/uservinplayajax')?>",
            // url: "http://192.168.0.251:8082/api_backend",
            data: {
                username: $("#username").val(),
                nickname: $("#nickname").val(),
                phone: $("#phone").val(),
                fieldname: $("#fieldname").val(),
                timkiemtheo: $("#timkiemtheo").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                typetaikhoan: $("#typetaikhoan").val(),
                pages: 1,
                record: $("#record").val(),
                typetk: $("#typetimkiem").val(),
                email: $("#txtemail").val()

            },

            dataType: 'json',
            success: function (result) {
                $("#numuser").html(result.totalRecord);
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    var totalPage = result.total;
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.username, value.nickname, value.vinTotal, value.xuTotal, value.safe, value.vippoint, value.vippointSave, 0, value.rechargeMoney, value.createTime, value.google_id, value.facebook_id);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('usergame/uservinplayajax')?>",
                                    // url: "http://192.168.0.251:8082/api_backend",
                                    data: {
                                        username: $("#username").val(),
                                        nickname: $("#nickname").val(),
                                        phone: $("#phone").val(),
                                        fieldname: $("#fieldname").val(),
                                        timkiemtheo: $("#timkiemtheo").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        typetaikhoan: $("#typetaikhoan").val(),
                                        pages: page,
                                        record: $("#record").val(),
                                        typetk: $("#typetimkiem").val(),
                                        email: $("#txtemail").val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.username, value.nickname, value.vinTotal, value.xuTotal, value.safe, value.vippoint, value.vippointSave, 0, value.rechargeMoney, value.createTime, value.google_id, value.facebook_id);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });
                }

            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: timeOutApi
        })

    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
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
            Trừ phí đại lý
        </h1>

    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-body">

                    <label id="resultsearch" style="color: red;"></label>

                    <div class="box-body">
                        <form action="<?php echo admin_url('transaction/huydoanhso') ?>" method="post">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Từ ngày:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' value="<?php echo $start_time ?>" class="form-control"
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
                                            <input type='text' value="<?php echo $end_time ?>" class="form-control"
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
                                        <label for="exampleInputEmail1">Nickname gửi:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control" id="filter_iname"
                                               value="<?php echo $this->input->post('name') ?>" name="name">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Nickname nhận:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               id="nicknamere" value="<?php echo $this->input->post('nicknamere') ?>"
                                               name="nicknamere">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Doanh số:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="doanhso" name="doanhso" class="form-control">
                                            <option value="" <?php if ($this->input->post('doanhso') == "") {
                                                echo "selected";
                                            } ?>>Tất cả
                                            </option>
                                            <option value="1" <?php if ($this->input->post('doanhso') == "1") {
                                                echo "selected";
                                            } ?>>Cộng
                                            </option>
                                            <option value="0" <?php if ($this->input->post('doanhso') == "0") {
                                                echo "selected";
                                            } ?>>Hủy
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Trạng thái:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="status" name="status" class="form-control">
                                            <option value="" <?php if ($this->input->post('status') == "") {
                                                echo "selected";
                                            } ?>>Chọn
                                            </option>

                                            <option value="1" <?php if ($this->input->post('status') == "1") {
                                                echo "selected";
                                            } ?>>Tài khoản thường chuyển đại lý cấp 1
                                            </option>
                                            <option value="2" <?php if ($this->input->post('status') == "2") {
                                                echo "selected";
                                            } ?>>Tài khoản thường chuyển đại lý cấp 2
                                            </option>
                                            <option value="3" <?php if ($this->input->post('status') == "3") {
                                                echo "selected";
                                            } ?>>Đại lý cấp 1 chuyển tài khoản thường
                                            </option>
                                            <option value="4" <?php if ($this->input->post('status') == "4") {
                                                echo "selected";
                                            } ?>>Đại lý cấp 1 chuyển đại lý cấp 1
                                            </option>
                                            <option value="5" <?php if ($this->input->post('status') == "5") {
                                                echo "selected";
                                            } ?>>Đại lý cấp 1 chuyển đại lý cấp 2
                                            </option>
                                            <option value="6" <?php if ($this->input->post('status') == "6") {
                                                echo "selected";
                                            } ?>>Đại lý cấp 2 chuyển tài khoản thường
                                            </option>
                                            <option value="7" <?php if ($this->input->post('status') == "7") {
                                                echo "selected";
                                            } ?>>Đại lý cấp 2 chuyển đại lý cấp 1
                                            </option>
                                            <option value="8" <?php if ($this->input->post('status') == "8") {
                                                echo "selected";
                                            } ?>>Đại lý cấp 2 chuyển đại lý cấp 2
                                            </option>
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
                                        <td>Tài khoản chuyển</td>
                                        <td>Tài khoản nhận</td>
                                        <td>Số <?php echo $namegame ?> gửi</td>
                                        <td>Số <?php echo $namegame ?> nhận</td>
                                        <td>Phí chuyển khoản</td>
                                        <td>Trạng thái</td>
                                        <td>Doanh số</td>
                                        <td>Thời gian</td>
                                        <td>Hủy doanh số</td>
                                    </tr>
                                    </thead>
                                    <tbody id="logaction">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="spinner" class="spinner" style="display:none;">
                            <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                 alt="Loading"/>
                        </div>
                        <div class="text-center">
                            <ul id="pagination-demo" class="pagination-sm"></ul>
                        </div>
                        <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">
                                        <p id="statuspenđing"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input class="blueB logMeIn" type="submit" value="Đóng" data-dismiss="modal"
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

    function resultSearchTransction(stt, namesend, namerecive, moneysend, moneyrecive, fee, status, date, topds) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + namesend + "</td>";
        rs += "<td>" + namerecive + "</td>";
        rs += "<td>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        if (status == 1 || status == 2 || status == 3 || status == 6) {
            if (topds == 1) {
                rs += "<td>" + "Được tính doanh số" + "</td>";
            } else if (topds == 0) {
                rs += "<td>" + "Không được tính doanh số" + "</td>";
            }
        } else {
            rs += "<td></td>";
        }
        rs += "<td>" + date + "</td>";
        if (status == 1 || status == 2 || status == 3 || status == 6) {

            if (topds == 1) {
                rs += "<td>" + "<input type='button' id='huydoanhso' value='Hủy' class='btn btn-success' style='margin-left: 70px' onclick=\"huydoanhso('" + namesend + "','" + namerecive + "','" + date + "',0)\" >" + "</td>";
            }
            else if (topds == 0) {
                rs += "<td>" + "<input type='button' id='congdoanhso' value='Cộng' class='btn btn-success' style='margin-left: 70px' onclick=\"congdoanhso('" + namesend + "','" + namerecive + "','" + date + "',1)\" >" + "</td>";
            }
        } else {
            rs += "<td></td>";
        }
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/huydoanhsoajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                nicknamere: $("#nicknamere").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                status: $("#status").val(),
                topds: $("#doanhso").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    var totalmoney = commaSeparateNumber(result.totalVinSend);
                    $('#summoney').html(totalmoney);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time, value.top_ds);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/huydoanhsoajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        nicknamere: $("#nicknamere").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        status: $("#status").val(),
                                        topds: $("#doanhso").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time, value.top_ds);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false
                                        });

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
    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function statustranfer(feetran) {
        var strresult;
        switch (feetran) {
            case 1:
                strresult = "Tài khoản thường chuyển đại lý cấp 1";
                break;
            case 2:
                strresult = "Tài khoản thường chuyển đại lý cấp 2";
                break;
            case 3:
                strresult = "Đại lý cấp 1 chuyển tài khoản thường";
                break;
            case 4:
                strresult = "Đại lý cấp 1 chuyển đại lý cấp 1";
                break;
            case 5:
                strresult = "Đại lý cấp 1 chuyển đại lý cấp 2";
                break;
            case 6:
                strresult = "Đại lý cấp 2 chuyển tài khoản thường";
                break;
            case 7:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 1";
                break;
            case 8:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 2";
                break;
        }
        return strresult;
    }


    function huydoanhso(nicknamesend, nicknamerecive, date, topds) {
        if (!confirm('Bạn chắc chắn muốn hủy doanh số đại lý ?')) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/doanhsoajax')?>",
            data: {
                ns: nicknamesend,
                nr: nicknamerecive,
                date: date,
                tds: topds
            },

            dataType: 'json',
            success: function (result) {
                $("#bsModal3").modal("show");
                $("#statuspenđing").css({"color": "blue"});
                $("#statuspenđing").html("Hủy doanh số thành công");

            }
        });
    }

    function congdoanhso(nicknamesend, nicknamerecive, date, topds) {
        if (!confirm('Bạn chắc chắn muốn cộng doanh số đại lý ?')) {
            return false;
        }

        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/doanhsoajax')?>",
            data: {
                ns: nicknamesend,
                nr: nicknamerecive,
                date: date,
                tds: topds
            },

            dataType: 'json',
            success: function (result) {
                $("#bsModal3").modal("show");
                $("#statuspenđing").css({"color": "blue"});
                $("#statuspenđing").html("Cộng doanh số thành công");

            }
        });
    }

</script>
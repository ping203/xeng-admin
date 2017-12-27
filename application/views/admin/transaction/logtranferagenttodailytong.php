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
                Lịch sử chuyển khoản đại lý tổng chuyển cho đại lý
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">

                            <form action="<?php echo admin_url('transaction/logtranferagenttodailytong') ?>" method="post">
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
                                            <label for="exampleInputEmail1">Nickname:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="filter_iname"
                                                   value="<?php echo $this->input->post('name') ?>" name="name">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
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
                                            <td>Tài khoản chuyển</td>
                                            <td>Tài khoản nhận</td>
                                            <td>Số <?php echo $namegame ?> gửi</td>
                                            <td>Số <?php echo $namegame ?> nhận</td>
                                            <td class="col-sm-3">Mô tả</td>
                                            <td>Ngày tạo</td>
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
    function resultSearchTransction(stt, nicknamesend, nicknamerecive, moneysend, moneyrecive, description, time) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nicknamesend + "</td>";
        rs += "<td>" + nicknamerecive + "</td>";
        rs += "<td>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + time + "</td>";
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
            url: "<?php echo admin_url('transaction/logtranferagenttodailytongajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                nickname : $("#filter_iname").val(),
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
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.des_receive, value.trans_time);
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
                                    url: "<?php echo admin_url('transaction/logtranferagenttodailytongajax')?>",
                                    data: {
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        nickname : $("#filter_iname").val(),
                                        pages: page

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.des_receive, value.trans_time);
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


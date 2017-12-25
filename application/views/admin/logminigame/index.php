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
                Lịch sử tài khoản chơi tài xỉu
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Từ ngày:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' value="<?php echo $this->input->post('toDate') ?>"
                                                   class="form-control"
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
                                            <input type='text' value="<?php echo $this->input->post('fromDate') ?>"
                                                   class="form-control"
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
                                        <label for="exampleInputEmail1">Phiên:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               id="phientx" value="<?php echo $this->input->post('phientx') ?>"
                                               name="phientx">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Tiền:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="money_type" name="money" class="form-control">
                                            <option value="1" <?php if ($this->input->post('money') == "1") {
                                                echo "selected";
                                            } ?>><?php echo $namegame ?></option>
                                            <option value="0" <?php if ($this->input->post('money') == "0") {
                                                echo "selected";
                                            } ?>>Xu
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-1 col-sm-2 col-xs-12">

                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm"
                                               class="btn btn-success">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="checkAll" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>Phiên</td>
                                            <td>Tiền đặt xỉu</td>
                                            <td style="width:100px;">Tiền đặt tài</td>
                                            <td>Tổng đặt xỉu</td>
                                            <td style="width:100px;">Tổng đặt tài</td>
                                            <td>Kết quả</td>
                                            <td>Kết quả giải</td>
                                            <td>Hoàn trả cửa tài</td>
                                            <td>Hoàn trả cửa xỉu</td>
                                            <td>Loại tiền</td>
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
    function resultSearchtaixiu(referenceId, totalxiu, totaltai, numxiu, numtai, dice1, dice2, dice3, result, totalrefundtai, totalrefundxiu, money, datetime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td><a style='color: #0000FF' href='logminigame/detailphientaixiu/" + referenceId + "'>" + referenceId + "</a></td>";
        rs += "<td>" + commaSeparateNumber(totalxiu) + "</td>";
        rs += "<td>" + commaSeparateNumber(totaltai) + "</td>";
        rs += "<td>" + commaSeparateNumber(numxiu) + "</td>";
        rs += "<td>" + commaSeparateNumber(numtai) + "</td>";
        rs += "<td>" + dice1 + "," + dice2 + "," + dice3 + "</td>";
        if (result == 1) {
            rs += "<td>" + "Tài" + "</td>";
        } else if (result == 0) {
            rs += "<td>" + "Xỉu" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(totalrefundtai) + "</td>";
        rs += "<td>" + commaSeparateNumber(totalrefundxiu) + "</td>";
        if (money == 1) {
            rs += "<td>" + "Vin" + "</td>";
        } else if (money == 0) {
            rs += "<td>" + "Xu" + "</td>";
        }
        rs += "<td>" + datetime + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
    })
    $("#search_tran").click(function () {
        var result = "";
        var oldPage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/indexajax')?>",
            data: {
                phientx: $("#phientx").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#money_type").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchtaixiu(value.reference_id, value.total_xiu, value.total_tai, value.num_bet_xiu, value.num_bet_tai, value.dice1, value.dice2, value.dice3, value.result, value.total_refund_tai, value.total_refund_xiu, value.money_type, value.timestamp);
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
                                    url: "<?php echo admin_url('logminigame/indexajax')?>",
                                    data: {
                                        phientx: $("#phientx").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#money_type").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchtaixiu(value.reference_id, value.total_xiu, value.total_tai, value.num_bet_xiu, value.num_bet_tai, value.dice1, value.dice2, value.dice3, value.result, value.total_refund_tai, value.total_refund_xiu, value.money_type, value.timestamp);
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


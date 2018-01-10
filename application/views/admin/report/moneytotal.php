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
               Tổng số <?php echo $namegame ?> hiện tại
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
                            <div class="form-group">
                                <form action="<?php echo admin_url('report/moneytotal') ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Từ ngày:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' value="<?php echo $start_time ?>"
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
                                                <input type='text' value="<?php echo $end_time ?>" class="form-control"
                                                       id="fromDate" name="fromDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                            </div>
                                        </div>

                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
                                                   class="btn btn-success">
                                        </div>
                                    </div>
                                </form>

                            </div>
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
                                            <td>Người chơi</td>
                                            <td>Bot</td>
                                            <td>Đại lý tổng</td>
                                            <td>Đại lý cấp 1</td>
                                            <td style="width:100px;">Đại lý cấp 2</td>
                                            <td>Tổng tiền</td>
                                            <td>Thời gian</td>
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
    function resultSearchTransction(stt, moneyuser, moneybot, moneyagent, moneyagent1, moneyagent2, totalmoney, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyuser) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneybot) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyagent) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyagent1) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyagent2) + "</td>";
        rs += "<td>" + commaSeparateNumber(totalmoney) + "</td>";
        rs += "<td>" + date + "</td>";
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
            url: "<?php echo admin_url('report/moneytotalajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.totals == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    var totalPage = 10;
                    stt = 1;
                    $.each(result.totals, function (index, value) {
                        result += resultSearchTransction(stt, value.moneyUser, value.moneyBot, value.moneySuperAgent, value.moneyAgent1, value.moneyAgent2, value.total, value.timeLog);
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
                                    url: "<?php echo admin_url('report/moneytotalajax')?>",
                                    // url: "http://192.168.0.251:8082/api_backend",
                                    data: {
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.totals, function (index, value) {
                                            result += resultSearchTransction(stt, value.moneyUser, value.moneyBot, value.moneySuperAgent, value.moneyAgent1, value.moneyAgent2, value.total, value.timeLog);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $('#logaction').html("");
                                        errorThongBao();
                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });
                }
            }, error: function () {
                $('#logaction').html("");
               errorThongBao();
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
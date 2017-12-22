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
                Hoàn trả phí đại lý
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
                                        <label for="exampleInputEmail1">Nickname:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control" id="filter_iname"
                                               value="<?php echo $this->input->post('name') ?>" name="name">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Tháng:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">

                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text'  class="form-control"
                                                   id="toDate" name="toDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
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
                                            <td>STT</td>
                                            <td>Nickname</td>
                                            <td>Phí DL 1</td>
                                            <td>Tỉ lệ DL 1</td>
                                            <td>Phí DL 2</td>
                                            <td>Tỉ lệ DL 2</td>
                                            <td>Phí DL 2 khác</td>
                                            <td>Tỉ lệ DL 2 khác</td>
                                            <td>Tổng phí</td>
                                            <td>Mô tả</td>
                                            <td>Tháng</td>
                                            <td>Thời gian</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">

                                        </tbody>
                                        <tbody id="logactionsum">
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
            format: 'MM/YYYY'
        });
        var startdate = moment().subtract(-30, "days").format("DD-MM-YYYY");
        console.log(startdate);
    });
    $("#search_tran").click(function () {
        $("#spinner").show();
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total6 = 0;
        var res = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/refundfeeajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if (result.length == 0) {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    $.each(result, function (index, value) {
                        res += resultSearchTransction(stt, value.nickname, value.fee1, value.ratio1, value.fee2, value.ratio2, value.feeVinCash, value.feeVinplayCard, value.fee, value.description, value.month, value.createTime, value.percent, value.fee2More, value.ratio2More);
                        stt++;
                        total1 += value.fee1;
                        total2 += value.fee2;
                        total3 += value.fee2More;
                        total4 += value.feeVinCash;
                        total5 += value.feeVinplayCard;
                        total6 += value.fee;
                    });
                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,result[0].ratio1,total2,result[0].ratio2,total3,result[0].ratio2More,total4,total5,total6));

                }
            }, error: function () {
                $('#logactionsum').html("");
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: timeOutApi
        })
    });

    $(document).ready(function () {
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;
        var total4 = 0;
        var total5 = 0;
        var total6 = 0;
        $("#toDate").val(moment().subtract('month', 1).format('MM/YYYY'));
        $("#spinner").show();
        var res = ""
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/refundfeeajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if (result.length == 0) {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    $.each(result, function (index, value) {
                        res += resultSearchTransction(stt, value.nickname, value.fee1, value.ratio1, value.fee2, value.ratio2, value.feeVinCash, value.feeVinplayCard, value.fee, value.description, value.month, value.createTime, value.percent, value.fee2More, value.ratio2More);
                        stt++;
                        total1 += value.fee1;
                        total2 += value.fee2;
                        total3 += value.fee2More;
                        total4 += value.feeVinCash;
                        total5 += value.feeVinplayCard;
                        total6 += value.fee;

                    });
                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,result[0].ratio1,total2,result[0].ratio2,total3,result[0].ratio2More,total4,total5,total6));
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $('#logactionsum').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: timeOutApi
        })
    });
    function resultSearchTransction(stt, nickname, fee1, ratio1, fee2, ratio2, feevin, feevincard, fee, description, month, datetime, percent, fee2khac, ratio2khac) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(fee1) + "</td>";
        rs += "<td>" + (ratio1 * 100) + "%" + "</td>";
        rs += "<td>" + commaSeparateNumber(fee2) + "</td>";
        rs += "<td>" + (ratio2 * 100) + "%" + "</td>";
        rs += "<td>" + commaSeparateNumber(fee2khac) + "</td>";
        rs += "<td>" + (ratio2khac * 100) + "%" + "</td>";

        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + month + "</td>";
        rs += "<td>" + datetime + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resultSumTransaction(fee1, ratio1, fee2, ratio2, fee2khac, ratio2khac, feevin, feevincard, fee) {
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='2'>" + "Tổng" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee1) + "</td>";
        rs += "<td style='color: #0000ff'>" + (ratio1 * 100) + "%" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee2) + "</td>";
        rs += "<td style='color: #0000ff'>" + (ratio2 * 100) + "%" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee2khac) + "</td>";
        rs += "<td style='color: #0000ff'>" + (ratio2khac * 100) + "%" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(fee) + "</td>";
        rs += "</tr>";
        return rs;
    }

</script>

<script>

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

</script>
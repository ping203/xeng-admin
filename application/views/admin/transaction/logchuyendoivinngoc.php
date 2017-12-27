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
            Lịch sử nạp vin qua thẻ
        </h1>
        <ol class="breadcrumb">
            <label class="">Tổng: <span id="summoney" style="color: #0000ff"></span></label>
        </ol>
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
                    <label for="exampleInputEmail1">Mã lỗi:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_error" name="select_error" class="form-control">
                        <option value="-1" <?php if ($this->input->post('select_error') == "-1") {
                            echo "selected";
                        } ?> >Tất cả
                        </option>
                        <option value="0" <?php if ($this->input->post('select_error') == "0") {
                            echo "selected";
                        } ?>>Thành công
                        </option>
                        <option value="8" <?php if ($this->input->post('select_error') == "8") {
                            echo "selected";
                        } ?>>Không đủ tiền
                        </option>
                        <option value="10" <?php if ($this->input->post('select_error') == "10") {
                            echo "selected";
                        } ?>>Quá hạn mức đổi tiền
                        </option>
                        <option value="11" <?php if ($this->input->post('select_error') == "11") {
                            echo "selected";
                        } ?>>Cấm đổi tiền
                        </option>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã giao dịch Merchant:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="txt_merchant" value="<?php echo $this->input->post('txt_merchant') ?>"
                           name="txt_merchant">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Merchant:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_merchant" name="select_merchant" class="form-control">
                        <option value="HamCaMap" <?php if ($this->input->post('select_merchant') == "HamCaMap") {
                            echo "selected";
                        } ?> >Hàm Cá Mập
                        </option>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã giao dịch Vinplay:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="txt_vinplay" value="<?php echo $this->input->post('txt_vinplay') ?>" name="txt_vinplay">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Chuyển đổi:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_type" name="select_type" class="form-control">
                        <option value="" <?php if ($this->input->post('select_type') == "") {
                            echo "selected";
                        } ?> >Tất cả
                        </option>
                        <option value="0" <?php if ($this->input->post('select_type') == "0") {
                            echo "selected";
                        } ?> >Cộng <?php echo $namegame ?>
                        </option>
                        <option value="1" <?php if ($this->input->post('select_type') == "1") {
                            echo "selected";
                        } ?> >Trừ <?php echo $namegame ?>
                        </option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
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
                <table id="example2" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>Nickname</td>
                        <td>MerchantId</td>
                        <td>MerchantTransId</td>
                        <td>transNo</td>
                        <td>Money</td>
                        <td>Loại tiền</td>
                        <td>Loại chuyển đổi</td>
                        <td>ExchangeMoney</td>
                        <td>Phí</td>
                        <td>Code</td>
                        <td>IP</td>
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
    function resultSearchTransction(nickname, merchantId, merchantTransId, transNo, money, moneyType, type, exchangeMoney, fee, code, ip, createTime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + merchantId + "</td>";
        if (merchantTransId != null) {
            rs += "<td>" + merchantTransId + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }

        rs += "<td>" + transNo + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + moneyType + "</td>";
        if (type == 1) {
            rs += "<td>" + "Trừ Z" + "</td>";
        } else if (type == 0) {
            rs += "<td>" + "Cộng Z" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(exchangeMoney) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + commaSeparateNumber(code) + "</td>";
        rs += "<td>" + ip + "</td>";
        rs += "<td>" + createTime + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		$("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
   $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/logchuyendoivinngocajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                mid: $("#select_merchant").val(),
                tid: $("#txt_merchant").val(),
                tno: $("#txt_vinplay").val(),
                type: $("#select_type").val(),
                code: $("#select_error").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.trans == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#summoney').html("");
                    $('#summoneychange').html("");
                    $('#feechange').html("");
                    $('#sumgd').html("");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    $('#summoney').html(commaSeparateNumber(result.totalMoney));
                    $('#summoneychange').html(commaSeparateNumber(result.totalExchangeMoney));
                    $('#feechange').html(commaSeparateNumber(result.totalFee));
                    $('#sumgd').html(commaSeparateNumber(result.totalTrans));

                    $.each(result.trans, function (index, value) {
                        result += resultSearchTransction(value.nickname, value.merchantId, value.merchantTransId, value.transNo, value.money, value.moneyType, value.type, value.exchangeMoney, value.fee, value.code, value.ip, value.createTime);
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/logchuyendoivinngocajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        mid: $("#select_merchant").val(),
                                        tid: $("#txt_merchant").val(),
                                        tno: $("#txt_vinplay").val(),
                                        type: $("#select_type").val(),
                                        code: $("#select_error").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        if (result.trans == "") {
                                            $('#pagination-demo').css("display", "none");
                                            $("#resultsearch").html("Không tìm thấy kết quả");
                                            $('#summoney').html("");
                                            $('#summoneychange').html("");
                                            $('#feechange').html("");
                                            $('#sumgd').html("");
                                            $('#logaction').html("");
                                        } else {
                                            $("#resultsearch").html("");

                                            $.each(result.trans, function (index, value) {
                                                result += resultSearchTransction(value.nickname, value.merchantId, value.merchantTransId, value.transNo, value.money, value.moneyType, value.type, value.exchangeMoney, value.fee, value.code, value.ip, value.createTime);

                                            });
                                            $('#logaction').html(result);
                                        }
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $('#summoney').html("");
                                        $('#summoneychange').html("");
                                        $('#feechange').html("");
                                        $('#sumgd').html("");
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
                $('#summoney').html("");
                $('#summoneychange').html("");
                $('#feechange').html("");
                $('#sumgd').html("");
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
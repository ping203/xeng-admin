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
            Lịch sử nạp vin qua ngân lượng
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
                <label for="exampleInputEmail1">Trạng thái:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_status" name="select_status" class="form-control">
                    <option value="00" <?php if ($this->input->post('select_status') == "00") {
                        echo "selected";
                    } ?> selected="selected">Thành công
                    </option>
                    <option value="" <?php if ($this->input->post('select_status') == "") {
                        echo "selected";
                    } ?>>Tát cả
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Ip:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" id="txtip"
                       value="<?php echo $this->input->post('txtip') ?>" name="txtip">
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Ngân hàng:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="select_bank" name="select_bank" class="form-control">
                    <option value="">Chọn</option>
                    <option
                        value="BIDV" <?php if ($this->input->post('select_bank') == "BIDV") {
                        echo "selected";
                    } ?>>BIDV
                    </option>
                    <option
                        value="VietinBank" <?php if ($this->input->post('select_bank') == "VietinBank") {
                        echo "selected";
                    } ?>>VietinBank
                    </option>
                    <option
                        value="VietcomBank" <?php if ($this->input->post('select_bank') == "VietcomBank") {
                        echo "selected";
                    } ?>>VietcomBank
                    </option>
                    <option
                        value="MaritimeBank" <?php if ($this->input->post('select_bank') == "MaritimeBank") {
                        echo "selected";
                    } ?>>MaritimeBank
                    </option>
                    <option
                        value="VPBank" <?php if ($this->input->post('select_bank') == "VPBank") {
                        echo "selected";
                    } ?>>VPBank
                    </option>
                    <option
                        value="VietABank" <?php if ($this->input->post('select_bank') == "VietABank") {
                        echo "selected";
                    } ?>>VietABank
                    </option>
                    <option
                        value="TechcomBank" <?php if ($this->input->post('select_bank') == "TechcomBank") {
                        echo "selected";
                    } ?>>TechcomBank
                    </option>
                    <option
                        value="EximBank" <?php if ($this->input->post('select_bank') == "EximBank") {
                        echo "selected";
                    } ?>>EximBank
                    </option>
                    <option
                        value="VIBBank" <?php if ($this->input->post('select_bank') == "VIBBank") {
                        echo "selected";
                    } ?>>VIBBank
                    </option>
                    <option
                        value="TPBank" <?php if ($this->input->post('select_bank') == "TPBank") {
                        echo "selected";
                    } ?>>TPBank
                    </option>
                    <option value="SHB" <?php if ($this->input->post('select_bank') == "SHB") {
                        echo "selected";
                    } ?>>SHB
                    </option>
                    <option
                        value="SeaBank" <?php if ($this->input->post('select_bank') == "SeaBank") {
                        echo "selected";
                    } ?>>SeaBank
                    </option>
                    <option
                        value="SacomBank" <?php if ($this->input->post('select_bank') == "SacomBank") {
                        echo "selected";
                    } ?>>SacomBank
                    </option>
                    <option
                        value="OceanBank" <?php if ($this->input->post('select_bank') == "OceanBank") {
                        echo "selected";
                    } ?>>OceanBank
                    </option>
                    <option
                        value="MBBank" <?php if ($this->input->post('select_bank') == "MBBank") {
                        echo "selected";
                    } ?>>MBBank
                    </option>
                    <option
                        value="GPBank" <?php if ($this->input->post('select_bank') == "GPBank") {
                        echo "selected";
                    } ?>>GPBank
                    </option>
                    <option
                        value="BacABank" <?php if ($this->input->post('select_bank') == "BacABank") {
                        echo "selected";
                    } ?>>BacABank
                    </option>
                    <option
                        value="AgriBank" <?php if ($this->input->post('select_bank') == "AgriBank") {
                        echo "selected";
                    } ?>>AgriBank
                    </option>
                    <option
                        value="ABBank" <?php if ($this->input->post('select_bank') == "ABBank") {
                        echo "selected";
                    } ?>>ABBank
                    </option>
                    <option value="ACB" <?php if ($this->input->post('select_bank') == "ACB") {
                        echo "ACB";
                    } ?>>ACB
                    </option>
                    <option
                        value="OricomBank" <?php if ($this->input->post('select_bank') == "OricomBank") {
                        echo "selected";
                    } ?>>OricomBank
                    </option>
                    <option
                        value="LienVietPostBank" <?php if ($this->input->post('select_bank') == "LienVietPostBank") {
                        echo "selected";
                    } ?>>LienVietPostBank
                    </option>
                    <option
                        value="DongABank" <?php if ($this->input->post('select_bank') == "DongABank") {
                        echo "selected";
                    } ?>>DongABank
                    </option>
                    <option
                        value="BaoVietBank" <?php if ($this->input->post('select_bank') == "BaoVietBank") {
                        echo "selected";
                    } ?>>BaoVietBank
                    </option>
                    <option
                        value="HDBank" <?php if ($this->input->post('select_bank') == "HDBank") {
                        echo "selected";
                    } ?>>HDBank
                    </option>
                    <option
                        value="KienLongBank" <?php if ($this->input->post('select_bank') == "KienLongBank") {
                        echo "selected";
                    } ?>>KienLongBank
                    </option>
                    <option
                        value="NamABank" <?php if ($this->input->post('select_bank') == "NamABank") {
                        echo "selected";
                    } ?>>NamABank
                    </option>
                    <option value="NCB" <?php if ($this->input->post('select_bank') == "NCB") {
                        echo "selected";
                    } ?>>NCB
                    </option>
                    <option value="VRB" <?php if ($this->input->post('select_bank') == "VRB") {
                        echo "selected";
                    } ?>>VRB
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-1 col-sm-2 col-xs-12">
                <label for="exampleInputEmail1">Mã giao dịch:</label>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <input type="text" class="form-control" id="txtvinplay"
                       value="<?php echo $this->input->post('txtvinplay') ?>" name="txtvinplay">
            </div>
            <div class="col-md-1 col-sm-2 col-xs-12">
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
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
                        <td>STT</td>
                        <td>Nickname</td>
                        <td>Tiền</td>
                        <td>Ngân hàng</td>
                        <td>IP</td>
                        <td>Mã giao dịch</td>
                        <td style="width: 15%">Token</td>
                        <td>Thời gian</td>
                        <td>Trạng thái</td>
                        <td>Mô tả</td>
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

        var result = "";
        var oldpage = 0;


        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/rechargebynganluongajax')?>",

            data: {
                nickname: $("#filter_iname").val(),
                txtvinplay: $("#txtvinplay").val(),
                txtip: $("#txtip").val(),
                bank: $("#select_bank").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();

                if (result.records == "") {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#pagination-demo').html("");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.totalPages;
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalSuccess);
                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.records, function (index, value) {
                        result += resultSearchTransction(stt, value.orderCode, value.nickname, value.email, value.mobile, value.totalAmount, value.bank, value.ip, value.errorCodeReturn, value.descReturn, value.transTime, value.updateTime, value.token);
                        stt++;
                    });
                    $('#logaction').html(result);

                    if ($('#pagination-demo').data("twbs-pagination")) {
                        $('#pagination-demo').twbsPagination('destroy');
                    }
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/rechargebynganluongajax')?>",

                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        txtvinplay: $("#txtvinplay").val(),
                                        txtip: $("#txtip").val(),
                                        bank: $("#select_bank").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.records, function (index, value) {
                                            result += resultSearchTransction(stt, value.orderCode, value.nickname, value.email, value.mobile, value.totalAmount, value.bank, value.ip, value.errorCodeReturn, value.descReturn, value.transTime, value.updateTime, value.token);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
                            }
                            oldpage = page;
                        }
                    });
                }

            }
        })
    });
    function resultSearchTransction(stt, tid, nickname, email, mobile, money, bank, ip, status, description, time, updatetime, token) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + bank + "</td>";
        rs += "<td>" + ip + "</td>";
        rs += "<td>" + tid + "</td>";
        rs += "<td>" + token + "</td>";
        rs += "<td>" + time + "</td>";
        rs += "<td>" + status + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + updatetime + "</td>";
        rs += "</tr>";
        return rs;
    }

    $(document).ready(function () {
        $('select option:contains("Thành công")').prop('selected', true);

        $("#resultsearch").html("Vụi lòng ấn nút tìm kiếm");

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
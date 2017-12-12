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
                    <label for="exampleInputEmail1">Loại thẻ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_provider" name="select_provider" class="form-control">
                        <option value="">Chọn</option>
                        <option
                            value="Viettel" <?php if ($this->input->post('select_provider') == "Viettel") {
                            echo "selected";
                        } ?>>Viettel
                        </option>
                        <option
                            value="Mobifone" <?php if ($this->input->post('select_provider') == "Mobifone") {
                            echo "selected";
                        } ?>>Mobifone
                        </option>
                        <option
                            value="Vinaphone" <?php if ($this->input->post('select_provider') == "Vinaphone") {
                            echo "selected";
                        } ?>>Vinaphone
                        </option>
                        <option
                            value="Zing" <?php if ($this->input->post('select_provider') == "Zing") {
                            echo "selected";
                        } ?>>Zing
                        </option>
                        <option
                            value="Vcoin" <?php if ($this->input->post('select_provider') == "Vcoin") {
                            echo "selected";
                        } ?>>Vcoin
                        </option>
                        <option
                            value="Gate" <?php if ($this->input->post('select_provider') == "Gate") {
                            echo "selected";
                        } ?>>Gate
                        </option>
                        <option
                            value="VietNamMobile" <?php if ($this->input->post('select_provider') == "VietNamMobile") {
                            echo "selected";
                        } ?>>VietNamMobile
                        </option>
                        <option
                            value="MegaCard" <?php if ($this->input->post('select_provider') == "MegaCard") {
                            echo "selected";
                        } ?>>MegaCard
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã thẻ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="txtmathe" class="form-control"
                           value="<?php echo $this->input->post('txtmathe') ?>" name="txtmathe">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã serial:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="txtserial" class="form-control"
                           value="<?php echo $this->input->post('txtserial') ?>"
                           name="txtserial">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã giao dịch:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                           name="magiaodich" class="form-control">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Trạng thái:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_status" name="select_status" class="form-control">
                        <option value="">Chọn</option>
                        <option value="0" <?php if ($this->input->post('select_status') == "0") {
                            echo "selected";
                        } ?>>Thành công
                        </option>
                        <option value="1" <?php if ($this->input->post('select_status') == "1") {
                            echo "selected";
                        } ?>>Thất bại
                        </option>
                        <option value="30" <?php if ($this->input->post('select_status') == "30") {
                            echo "selected";
                        } ?>>Đang xử lý
                        </option>
                        <option value="31" <?php if ($this->input->post('select_status') == "31") {
                            echo "selected";
                        } ?>>Thẻ đã nạp trước đó
                        </option>
                        <option value="32" <?php if ($this->input->post('select_status') == "32") {
                            echo "selected";
                        } ?>>Thẻ bị khóa
                        </option>
                        <option value="33" <?php if ($this->input->post('select_status') == "33") {
                            echo "selected";
                        } ?>>Thẻ chưa kích hoạt
                        </option>
                        <option value="34" <?php if ($this->input->post('select_status') == "34") {
                            echo "selected";
                        } ?>>Thẻ hết hạn
                        </option>
                        <option value="35" <?php if ($this->input->post('select_status') == "35") {
                            echo "selected";
                        } ?>>Sai mã thẻ
                        </option>
                        <option value="36" <?php if ($this->input->post('select_status') == "36") {
                            echo "selected";
                        } ?>>Mã serial không đúng
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nhà cung cấp:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_partner" name="select_partner" class="form-control">
                        <option value="">Chọn</option>
                        <option value="maxpay" <?php if ($this->input->post('select_partner') == "maxpay") {
                            echo "selected";
                        } ?>>Maxpay
                        </option>
                        <option value="abtpay" <?php if ($this->input->post('select_partner') == "abtpay") {
                            echo "selected";
                        } ?>>Abtpay
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
                        <th>STT</th>
                        <th>Mã giao dịch</th>
                        <th>Nick name</th>
                        <th>Thẻ</th>
                        <th>Nhà cung cấp</th>
                        <th>Serial</th>
                        <th>Mã thẻ</th>
                        <th>Mệnh giá</th>
                        <th>Mã lỗi dịch vụ</th>
                        <th>Mô tả</th>
                        <th>Mã lỗi Vinplay</th>
                        <th>Thời gian</th>
                        <th>Cập nhật thẻ</th>
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
    function resultSearchTransction(stt, rid, nickName, provider, partner, serial, pin, amount, status, message, code, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + provider + "</td>";
        rs += "<td>" + partner + "</td>";
        rs += "<td>" + serial + "</td>";
        rs += "<td>" + pin + "</td>";
        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>" + status + "</td>";
        rs += "<td>" + message + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + date + "</td>";
        if (code == 30) {
            rs += "<td>" + "<input type='button' id='updatecard' value='Cập nhật thẻ' class='btn btn-success'  onclick=\"updatecard('" + rid + "','" + nickName + "')\" >" + "</td>";
        }
        else {
            rs += "<td></td>"
        }
        rs += "</tr>";
        return rs;
    }

    function resultnhamang(viettel, vina, mobi, gate, mega, vcoin) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(viettel) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vina) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(mobi) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(gate) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(mega) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(vcoin) + "</td>";

        rs += "<td >" + "" + "</td>";
        rs += "</tr>";
        return rs;
    }
    function resultplatform(web, android, ios, wp, facebook, desktop, other) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(web) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(android) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(ios) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(wp) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(facebook) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(desktop) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(other) + "</td>";

        rs += "</tr>";
        return rs;
    }

    $(document).ready(function () {
        $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
    });
    $("#search_tran").click(function () {
        var result = "";
        var result1 = "";
        var result2 = "";
        var oldpage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/rechargebycardajax')?>",

            data: {
                nickname: $("#filter_iname").val(),
                provider: $("#select_provider").val(),
                serial: $("#txtserial").val(),
                mathe: $("#txtmathe").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                tranid: $("#magiaodich").val(),
                partner: $("#select_partner").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalrecord = commaSeparateNumber(result.totalMoney);
                $("#sumResult").html(totalrecord);

                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    // var totalmoney = commaSeparateNumber(result.moneyReponse[0].value);

                    // var total1 = commaSeparateNumber(result.moneyReponse[1].value);
                    // var total2 = commaSeparateNumber(result.moneyReponse[2].value);
                    //var total3 = commaSeparateNumber(result.moneyReponse[3].value);
                    // var total4 = commaSeparateNumber(result.moneyReponse[4].value);
                    // var total5 = commaSeparateNumber(result.moneyReponse[5].value);
                    //  var total6 = commaSeparateNumber(result.moneyReponse[6].value);
                    // var total7 = commaSeparateNumber(result.moneyReponse[7].value);
                    //  var total8 = commaSeparateNumber(result.moneyReponse[8].value);
                    // var total9 = commaSeparateNumber(result.moneyReponse[9].value);
                    //  var total10 = commaSeparateNumber(result.moneyReponse[10].value);
                    //var total13 = commaSeparateNumber(result.moneyReponse[11].value);
                    //  var total16 = commaSeparateNumber(result.moneyReponse[12].value);
                    //  var total17 = commaSeparateNumber(result.moneyReponse[13].value);
                    //  result1 += resultnhamang(total8, total9, total10, total13,total16,total17);
                    //   $('#logaction1').html(result1);
                    //   result2 += resultplatform(total1, total2, total3, total4,total5, total6, total7);
                    //  $('#logaction2').html(result2);
                    //    $('#summoney').html(totalmoney);
                    //   $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.referenceId, value.nickName, value.provider, value.partner, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.timelog);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/rechargebycardajax')?>",

                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        provider: $("#select_provider").val(),
                                        serial: $("#txtserial").val(),
                                        mathe: $("#txtmathe").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        tranid: $("#magiaodich").val(),
                                        partner: $("#select_partner").val(),

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        $("#sumResult").html(commaSeparateNumber(result.totalMoney));
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.referenceId, value.nickName, value.provider, value.partner, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.timelog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: 60000
                                });
                            }
                            oldpage = page;
                        }
                    });
                }

            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: 60000
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


    function updatecard(referentid, nickname) {
        if (!confirm('Bạn chắc chắn muốn cập nhật thẻ ?')) {
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/updatecard')?>",
            data: {
                rid: referentid,
                nickname: nickname
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.errorCode == 0) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Bạn cập nhật thẻ thành công. Trạng thái  " + result.rechargeByCardMessage.message);
                    $("#status-error").css("color", "blue");
                    $('#error-popup').on('hidden.bs.modal', function () {
                        location.reload();
                    });
                } else if (result.errorCode == 1001) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Có lỗi xảy ra với Maxpay");
                    $("#status-error").css("color", "red");
                } else if (result.errorCode == 1036) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Không tìm thấy dữ liệu giao dịch nạp thẻ trong DB");
                    $("#status-error").css("color", "red");
                } else if (result.errorCode == 1037) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Có lỗi xảy ra khi xử lý cộng tiền cho khách hàng");
                    $("#status-error").css("color", "red");

                } else if (result.errorCode == 1038) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Chưa cộng được tiền cho khách hàng chưa login");
                    $("#status-error").css("color", "red");

                } else if (result.errorCode == 1039) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Dữ liệu gửi lên không chính xác khi kết nối với maxpay");
                    $("#status-error").css("color", "red");

                }
                else if (result.errorCode == 1040) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Không tìm thấy giao dịch thẻ khi kết nối với maxpay");
                    $("#status-error").css("color", "red");

                }
                else if (result.errorCode == 1041) {
                    $("#error-popup").modal("show");
                    $("#status-error").html("Lỗi không xác định khi kết nối với maxpay");
                    $("#status-error").css("color", "red");
                }

            }, error: function () {
                $("#error-popup").modal("show");
                $("#status-error").html("Hệ thống gián đoạn vui lòng liên hệ 19006896");
                $("#status-error").css("color", "red");
            }, timeout: 20000
        });


    }
</script>
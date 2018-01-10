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
                Top chơi game
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
                                        <label for="exampleInputEmail1">Hiển thị:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="displaygame" class="form-control">

                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="200">200</option>
                                            <option value="500">500</option>

                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Tên game:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="gamename" class="form-control">
                                            <option value="">Hãy chọn game</option>
                                            <option value="all">--------Tất cả</option>
                                            <option value="">Minigame</option>
                                            <option value="TaiXiu" selected>--------TaiXiu</option>
                                            <option value="MiniPoker">--------MiniPoker</option>
                                            <option value="BauCua">--------BauCua</option>
                                            <option value="CaoThap">--------CaoThap</option>
                                            <option value="">Slot</option>
                                            <option value="PokeGo">--------Candy Slot</option>
                                            <option value="KhoBau">--------KhoBau</option>
                                            <option value="SieuAnhHung">--------Siêu Anh Hùng</option>
                                            <option value="MyNhanNgu">--------MyNhanNgu</option>
                                            <option value="NuDiepVien">--------NuDiepVien</option>
                                            <option value="VuongQuocVin">--------VuongQuoc<?php echo $namegame ?></option>
                                            <option value="HamCaMap">--------HamCaMap</option>
                                            <option value="">Game bài</option>
                                            <option value="Sam">--------Sam</option>
                                            <option value="BaCay">--------BaCay</option>
                                            <option value="Binh">--------Binh</option>
                                            <option value="Tlmn">--------Tlmn</option>
                                            <option value="TaLa">--------TaLa</option>
                                            <option value="Lieng">--------Lieng</option>
                                            <option value="XiTo">--------XiTo</option>
                                            <option value="BaiCao">--------BaiCao</option>
                                            <option value="XocDia">--------Xóc Xóc</option>
                                            <option value="Poker">--------Poker</option>
                                            <option value="PokerTour">--------PokerTour</option>
                                            <option value="XiDzach">--------XiDzach</option>
                                            <option value="">Game cờ</option>
                                            <option value="Caro">--------Caro</option>
                                            <option value="CoTuong">--------Cờ Tướng</option>
                                            <option value="CoUp">--------Cờ úp</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <h4 style="text-align: left;margin-left: 30px">Tên game:<span style="color:red" id="tengame"></span>
                                    </h4>
                                </div>
                            </div>

                        </div>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h3 style="text-align: center;color: #0000ff">Top User thắng</h3>
                                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr style="height: 20px;">
                                            <td>STT</td>
                                            <td>Nickname</td>
                                            <td>Tiền thắng</td>
                                        </tr>
                                        </thead>

                                        <tbody id="loguserwin">
                                        </tbody>
                                        <h4 style="text-align: center;color:red" id="resultuserwin"></h4>
                                    </table>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h3 style="text-align: center;color: #0000ff">Top User thua</h3>
                                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr style="height: 20px;">
                                            <td>STT</td>
                                            <td>Nickname</td>
                                            <td>Tiền thua</td>
                                        </tr>
                                        </thead>
                                        <tbody id="loguserlost">
                                        </tbody>
                                        <h4 style="text-align: center;color:red" id="resultuserlost"></h4>
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
    $("#search_tran").click(function () {
        if ($("#gamename").val() == "") {
            alert("Bạn chưa nhập tên game");
            return false;
        }
        $("#spinner").show();
        var result1 = "";
        var result2 = "";
        var result3 = "";
        var result4 = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/topuserbotajax')?>",
            // url: "http://api.vinplay.com:8081/api",
            data: {
                gamename: $("#gamename").val(),
                display: $("#displaygame").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#tengame").html($("#gamename").text());

                if (result.topUserWin == "") {
                    $("#resultuserwin").html("Không tìm thấy kết quả");
                    $('#loguserwin').html("");
                } else {
                    $("#resultuserwin").html("");
                    stt = 1;
                    $.each(result.topUserWin, function (index, value) {
                        result1 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#loguserwin').html(result1);
                }
                if (result.topUserLost == "") {
                    $("#resultuserlost").html("Không tìm thấy kết quả");
                    $('#loguserlost').html("");
                } else {
                    $("#resultuserlost").html("");
                    stt = 1;
                    $.each(result.topUserLost, function (index, value) {
                        result2 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#loguserlost').html(result2);
                }
                if (result.topBotWin == "") {
                    $("#resultbotwin").html("Không tìm thấy kết quả");
                    $('#logbotwin').html("");
                } else {
                    $("#resultbotwin").html("");
                    stt = 1;
                    $.each(result.topBotWin, function (index, value) {
                        result3 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#logbotwin').html(result3);
                }
                if (result.topBotLost == "") {
                    $("#resultbotlost").html("Không tìm thấy kết quả");
                    $('#logbotlost').html("");
                } else {
                    $("#resultbotlost").html("");
                    stt = 1;
                    $.each(result.topBotLost, function (index, value) {
                        result4 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#logbotlost').html(result4);
                }

            }, error: function () {
                errorThongBao();
            }, timeout: timeOutApi
        })
    });
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD-MM-YYYY'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });
    $(document).ready(function () {
        $("#toDate").val(moment().format('DD-MM-YYYY'));
        $("#fromDate").val(moment().format('DD-MM-YYYY'));
        $("#spinner").show();
        var result1 = "";
        var result2 = "";
        var result3 = "";
        var result4 = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('usergame/topuserbotajax')?>",
            // url: "http://api.vinplay.com:8081/api",
            data: {
                gamename: $("#gamename").val(),
                display: $("#displaygame").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                $("#tengame").html($("#gamename").val());

                if (result.topUserWin == "") {
                    $("#resultuserwin").html("Không tìm thấy kết quả");
                    $('#loguserwin').html("");
                } else {
                    $("#resultuserwin").html("");
                    stt = 1;
                    $.each(result.topUserWin, function (index, value) {
                        result1 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#loguserwin').html(result1);
                }
                if (result.topUserLost == "") {
                    $("#resultuserlost").html("Không tìm thấy kết quả");
                    $('#loguserlost').html("");
                } else {
                    $("#resultuserlost").html("");
                    stt = 1;
                    $.each(result.topUserLost, function (index, value) {
                        result2 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#loguserlost').html(result2);
                }
                if (result.topBotWin == "") {
                    $("#resultbotwin").html("Không tìm thấy kết quả");
                    $('#logbotwin').html("");
                } else {
                    $("#resultbotwin").html("");
                    stt = 1;
                    $.each(result.topBotWin, function (index, value) {
                        result3 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#logbotwin').html(result3);
                }
                if (result.topBotLost == "") {
                    $("#resultbotlost").html("Không tìm thấy kết quả");
                    $('#logbotlost').html("");
                } else {
                    $("#resultbotlost").html("");
                    stt = 1;
                    $.each(result.topBotLost, function (index, value) {
                        result4 += resultSearchTransction(stt, value.nickname, value.moneyWin);
                        stt++
                    });
                    $('#logbotlost').html(result4);
                }

            }, error: function () {
               errorThongBao();
            }, timeout: timeOutApi
        });
    });

    function resultSearchTransction(stt, nickname, moneywin) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(moneywin) + "</td>";
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
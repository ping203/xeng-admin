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
            Lịch sử giao dịch hệ thống
            Lịch sử giao dịch hệ thống
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
                    <label for="exampleInputEmail1">Tiền:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="money_type" name="money" class="form-control">
                        <option value="vin" <?php if ($this->input->post('money') == "vin") {
                            echo "selected";
                        } ?>><?php echo $namegame ?>
                        </option>
                        <option value="xu" <?php if ($this->input->post('money') == "xu") {
                            echo "selected";
                        } ?>>Xu
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Dịch vụ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                <select id="servicename" name="servicename" class="form-control">
                <option value="">Minigame</option>
                <option value="VQMM" <?php if ($this->input->post('servicename') == "VQMM") {
                    echo "selected";
                } ?>>------Quay VQMM
                </option>
                <option value="VQVIP" <?php if ($this->input->post('servicename') == "VQVIP") {
                    echo "selected";
                } ?>>------Quay VIP
                </option>
                <option value="TaiXiu" <?php if ($this->input->post('servicename') == "TaiXiu") {
                    echo "selected";
                } ?>>------Chơi game Tài Xỉu
                </option>
                <option value="MiniPoker" <?php if ($this->input->post('servicename') == "MiniPoker") {
                    echo "selected";
                } ?>>------Chơi game Mini Poker
                </option>
                <option value="CaoThap" <?php if ($this->input->post('servicename') == "CaoThap") {
                    echo "selected";
                } ?>>------Chơi game Cao Thấp
                </option>
                <option value="BauCua" <?php if ($this->input->post('servicename') == "BauCua") {
                    echo "selected";
                } ?>>------Chơi game Bầu Cua
                </option>
                <option value="">Slot</option>
                <option value="PokeGo" <?php if ($this->input->post('servicename') == "PokeGo") {
                    echo "selected";
                } ?>>------Quay Candy Slot
                </option>
                <option value="KhoBau" <?php if ($this->input->post('servicename') == "KhoBau") {
                    echo "selected";
                } ?>>------Quay Kho Báu
                </option>
                <option value="SieuAnhHung" <?php if ($this->input->post('servicename') == "SieuAnhHung") {
                    echo "selected";
                } ?>>------Quay Avengers
                </option>
                <option value="MyNhanNgu" <?php if ($this->input->post('servicename') == "MyNhanNgu") {
                    echo "selected";
                } ?>>------Quay Mỹ Nhân Ngư
                </option>
                <option value="NuDiepVien" <?php if ($this->input->post('servicename') == "NuDiepVien") {
                    echo "selected";
                } ?>>------Quay Nữ Điệp Viên
                </option>
                <option value="VuongQuocVin" <?php if ($this->input->post('servicename') == "VuongQuocVin") {
                    echo "selected";
                } ?>>------Quay Vương Quốc <?php echo $namegame ?>
                </option>
                <option value="">Dịch vụ khác</option>
                <option value="SafeMoney" <?php if ($this->input->post('servicename') == "SafeMoney") {
                    echo "selected";
                } ?>>------Két sắt
                </option>
                <option
                    value="CashOutByCard" <?php if ($this->input->post('servicename') == "CashOutByCard") {
                    echo "selected";
                } ?>>------Mua mã thẻ
                </option>
                <option
                    value="CashOutByTopUp" <?php if ($this->input->post('servicename') == "CashOutByTopUp") {
                    echo "selected";
                } ?>>------Nạp tiền điện thoại
                </option>
                <option
                    value="CashOutByBank" <?php if ($this->input->post('servicename') == "CashOutByBank") {
                    echo "selected";
                } ?>>------Chuyển khoản ngân hàng
                </option>
                <option
                    value="RechargeByCard" <?php if ($this->input->post('servicename') == "RechargeByCard") {
                    echo "selected";
                } ?>>------Nạp <?php echo $namegame ?> qua thẻ
                </option>
                <option
                    value="RechargeByVinCard" <?php if ($this->input->post('servicename') == "RechargeByVinCard") {
                    echo "selected";
                } ?>>------Nạp <?php echo $namegame ?> qua VinCard
                </option>
                <option
                    value="RechargeByMegaCard" <?php if ($this->input->post('servicename') == "RechargeByMegaCard") {
                    echo "selected";
                } ?>>------Nạp <?php echo $namegame ?> qua MegaCard
                </option>
                <option
                    value="RechargeByIAP" <?php if ($this->input->post('servicename') == "RechargeByIAP") {
                    echo "selected";
                } ?>>------Nạp <?php echo $namegame ?> qua IAP
                </option>
                <option
                    value="RechargeByBank" <?php if ($this->input->post('servicename') == "RechargeByBank") {
                    echo "selected";
                } ?>>------Nạp <?php echo $namegame ?> qua ngân hàng
                </option>
                <option
                    value="RechargeBySMS" <?php if ($this->input->post('servicename') == "RechargeBySMS") {
                    echo "selected";
                } ?>>------Nạp <?php echo $namegame ?> qua SMS
                </option>
                <option value="NapXu" <?php if ($this->input->post('servicename') == "NapXu") {
                    echo "selected";
                } ?>>------Nạp Xu
                </option>
                <option
                    value="TransferMoney" <?php if ($this->input->post('servicename') == "TransferMoney") {
                    echo "selected";
                } ?>>------Chuyển khoản
                </option>
                <option value="Admin" <?php if ($this->input->post('servicename') == "Admin") {
                    echo "selected";
                } ?>>------Admin
                </option>
                <option value="GiftCode" <?php if ($this->input->post('servicename') == "GiftCode") {
                    echo "selected";
                } ?>>------GiftCode
                </option>
                <option value="GiftCodeVH" <?php if ($this->input->post('servicename') == "GiftCodeVH") {
                    echo "selected";
                } ?>>------GiftCode vận hành
                </option>
                <option value="GiftCodeMKT" <?php if ($this->input->post('servicename') == "GiftCodeMKT") {
                    echo "selected";
                } ?>>------GiftCode marketing
                </option>
                <option value="GcAgent" <?php if ($this->input->post('servicename') == "GcAgent") {
                    echo "selected";
                } ?>>------GiftCode đại lý
                </option>
                <option value="CashoutByVP" <?php if ($this->input->post('servicename') == "CashoutByVP") {
                    echo "selected";
                } ?>>------Đổi thưởng vippoint
                </option>
                <option value="Bot" <?php if ($this->input->post('servicename') == "Bot") {
                    echo "selected";
                } ?>>------Bot
                </option>
                <option value="RefundFee" <?php if ($this->input->post('servicename') == "RefundFee") {
                    echo "selected";
                } ?>>------Hoàn trả phí đại lý
                </option>
                <option value="EventVPBonus" <?php if ($this->input->post('servicename') == "EventVPBonus") {
                    echo "selected";
                } ?>>------Vippoint Event
                </option>
                <option value="NhiemVu" <?php if ($this->input->post('servicename') == "NhiemVu") {
                    echo "selected";
                } ?>>------Nhận thưởng nhiệm vụ
                </option>
                <option value="EventVP" <?php if ($this->input->post('servicename') == "EventVP") {
                    echo "selected";
                } ?>>------Trao thưởng Vippoint Event
                </option>
                <option value="BonusTopDS" <?php if ($this->input->post('servicename') == "BonusTopDS") {
                    echo "selected";
                } ?>>------Thường doanh số đại lý
                </option>
                <option value="ChargeSMS" <?php if ($this->input->post('servicename') == "ChargeSMS") {
                    echo "selected";
                } ?>>------Phí SMS đại lý
                </option>
                <option value="">Game bài</option>
                <option value="Sam" <?php if ($this->input->post('servicename') == "Sam") {
                    echo "selected";
                } ?>>------Chơi game Sâm
                </option>
                <option value="BaCay" <?php if ($this->input->post('servicename') == "BaCay") {
                    echo "selected";
                } ?>>------Chơi game Ba cây
                </option>
                <option value="Binh" <?php if ($this->input->post('servicename') == "Binh") {
                    echo "selected";
                } ?>>------Chơi game Binh
                </option>
                <option value="Tlmn" <?php if ($this->input->post('servicename') == "Tlmn") {
                    echo "selected";
                } ?>>------Chơi game TLMN
                </option>
                <option value="TaLa" <?php if ($this->input->post('servicename') == "TaLa") {
                    echo "selected";
                } ?>>------Chơi game Tá Lả
                </option>
                <option value="Lieng" <?php if ($this->input->post('servicename') == "Lieng") {
                    echo "selected";
                } ?>>------Chơi game Liêng
                </option>
                <option value="XiTo" <?php if ($this->input->post('servicename') == "XiTo") {
                    echo "selected";
                } ?>>------Chơi game Xì Tố
                </option>
                <option value="BaiCao" <?php if ($this->input->post('servicename') == "BaiCao") {
                    echo "selected";
                } ?>>------Chơi game Bài Cào
                </option>
                <option value="XocDia" <?php if ($this->input->post('servicename') == "XocDia") {
                    echo "selected";
                } ?>>------Chơi game Xóc Đĩa
                </option>
                <option value="Poker" <?php if ($this->input->post('servicename') == "Poker") {
                    echo "selected";
                } ?>>------Chơi game Poker
                </option>
                <option value="PokerTour" <?php if ($this->input->post('servicename') == "PokerTour") {
                    echo "selected";
                } ?>>------Chơi game PokerTour
                </option>
                <option value="XiDzach" <?php if ($this->input->post('servicename') == "XiDzach") {
                    echo "selected";
                } ?>>------Chơi game XiDzach
                </option>

                <option value="">Game Khác</option>
                <option value="HamCaMap" <?php if ($this->input->post('servicename') == "HamCaMap") {
                    echo "selected";
                } ?>>------Chơi game bắn cá
                </option>
                <option value="">Game Cờ</option>
                <option value="Caro" <?php if ($this->input->post('servicename') == "Caro") {
                    echo "selected";
                } ?>>------Chơi game cờ caro
                </option>
                <option value="CoTuong" <?php if ($this->input->post('servicename') == "CoTuong") {
                    echo "selected";
                } ?>>------Chơi game cờ Cờ tướng
                </option>
                <option value="CoUp" <?php if ($this->input->post('servicename') == "CoUp") {
                    echo "selected";
                } ?>>------Chơi game cờ úp
                </option>
                <option value="">Lượt quay slot</option>
                <option value="KhoBauVqFree" <?php if ($this->input->post('servicename') == "KhoBauVqFree") {
                    echo "selected";
                } ?>>------Quay kho báu free
                </option>
                <option value="NuDiepVienVqFree" <?php if ($this->input->post('servicename') == "NuDiepVienVqFree") {
                    echo "selected";
                } ?>>------Quay nữ điệp viên free
                </option>
                <option value="SieuAnhHungVqFree" <?php if ($this->input->post('servicename') == "SieuAnhHungVqFree") {
                    echo "selected";
                } ?>>------Quay siêu anh hùng free


                </select>
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
                <table id="checkAll" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Nick name</th>
                        <th>Dịch vụ</th>
                        <th>Hành động</th>
                        <th class="col-sm-3" id="des">Mô tả</th>
                        <th style="width:100px;">Số dư</th>
                        <th>Tiền thay đổi</th>
                        <th>Phế</th>
                        <th>Ngày tạo</th>
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
    function resultSearchTransction(stt, transactionTime, nickName, actionName, description, currentMoney, moneyExchange, serviceName, fee) {
        var rs = "";

        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickName + "</td>";

        rs += "<td>" + strDichvu(actionName) + "</td>";
        rs += "<td>" + serviceName + "</td>";
        if (actionName != "CashOutByCard") {
            rs += "<td>" + description + "</td>";
        }else{
            rs += "<td></td>";
        }
        rs += "<td>" + currentMoney + "</td>";
        rs += "<td>" + moneyExchange + "</td>";
        rs += "<td>" + fee + "</td>";
        rs += "<td>" + transactionTime + "</td>";
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
            url: "<?php echo admin_url('transaction/indexajax')?>",
           
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#money_type").val(),
                servicename: $("#servicename").val(),
                action_name: $("#action_name").val(),
                pages: 1,
                timkiemtheo: $("#timkiemtheo").val(),
				 record : $("#record").val()
            },

            dataType: 'json',
			cache : true,
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
					 $("#resultsearch").html("");
                    var totalPage = result.totalPages;
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.transactionTime, value.nickName, value.actionName, value.description, commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName, commaSeparateNumber(value.fee));
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
						"retrieve": true,
                        "ordering": true,
                        "searching": false,
                        "paging": false,
                        "draw": false
                    });

                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                               // table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/indexajax')?>",
                                   
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#money_type").val(),
                                        servicename: $("#servicename").val(),
                                        action_name: $("#action_name").val(),
                                        pages: page,
                                        timkiemtheo: $("#timkiemtheo").val(),
										 record : $("#record").val()
                                    },
                                    dataType: 'json',
									cache : true,
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.transactionTime, value.nickName, value.actionName, value.description, commaSeparateNumber(value.currentMoney), commaSeparateNumber(value.moneyExchange), value.serviceName, commaSeparateNumber(value.fee));
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
											"retrieve": true,
                                            "ordering": true,
                                            "searching": false,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : 45000,
			 statusCode: {
                                        502: function () {
                                            $("#spinner").hide();
                                            $('#logaction').html("");
                                            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                        }
                                    }
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
            },timeout : 45000,
			 statusCode: {
                                        502: function () {
                                            $("#spinner").hide();
                                            $('#logaction').html("");
                                            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                        }
                                    }
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

    function commaSeparateNumber1(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ' ' + '$2');
        }
        return val;
    }


    function strDichvu(str){
        var str1;
        if(str == "PokeGo"){
            str1 =  "Candy";
        }else if(str == "SieuAnhHung"){
            str1 = "VuaHaiTac";
        }
        else if(str == "VuongQuocVin"){
            str1 =  "VuongQuocZum";
        }else{
            str1 =  str;
        }
        return str1;
    }
</script>
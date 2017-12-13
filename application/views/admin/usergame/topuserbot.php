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






<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
    <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
		<?php $this->load->view('admin/error')?>
    <div class="widget">
        <div class="title">
            <h6>Top chơi game</h6>
        </div>
        <form class="list_filter form" action="" method="get">
            <div class="formRow">
                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 70px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate"
                                       value="<?php echo $this->input->post('toDate') ?>"> <span
                                    class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                            </div>


                        </td>

                        <td>
                            <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                   class="formLeft"> Đến ngày: </label>
                        </td>
                        <td class="item">

                            <div class="input-group date" id="datetimepicker2">
                                <input type="text" id="fromDate" name="fromDate"
                                       value="<?php echo $this->input->post('fromDate') ?>"> <span
                                    class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                            </div>
                        </td>

                    </tr>
                </table>
            </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Hiển thị:</label></td>
                        <td><select id="displaygame">
                              
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="500">500</option>

                            </select>
                        </td>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 120px">Tên Game:</label></td>
                        <td><select id="gamename">
						  <option value="">Hãy chọn game</option>
                                <option value="all">--------Tất cả</option>
                                 <option value="">Minigame</option>
                                <option value="TaiXiu" selected>--------TaiXiu</option>
                                <option value="MiniPoker">--------MiniPoker</option>
                                <option value="BauCua">--------BauCua</option>
                                <option value="CaoThap">--------CaoThap</option>
                                <option value="">Slot</option>
                                <option value="PokeGo">--------PokeGo</option>
                                <option value="KhoBau">--------KhoBau</option>
                                <option value="SieuAnhHung">--------Siêu Anh Hùng</option>
                                <option value="MyNhanNgu">--------MyNhanNgu</option>
                                <option value="NuDiepVien">--------NuDiepVien</option>
								  <option value="VuongQuocVin">--------VuongQuocVin</option>
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
								<option value="XocDia">--------XocDia</option>
                                <option value="Poker">--------Poker</option>
								 <option value="PokerTour">--------PokerTour</option>
								 <option value="XiDzach">--------XiDzach</option>
								 <option value="">Game cờ</option>
                                <option value="Caro">--------Caro</option>
								 <option value="CoTuong">--------Cờ Tướng</option>
								  <option value="CoUp">--------Cờ úp</option>
                        </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 123px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('usergame/topuserbot') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="formRow">
            <div class="row">
                <h4 style="text-align: left;margin-left: 30px" >Tên game:<span style="color:red" id="tengame"></span></h4>
                </div>
            </div>

            <div class="formRow">
            <div class="row">

                <div class="col-xs-6">
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
                <div class="col-xs-6">
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
        </div>
		
       <!-- <div class="formRow">
            <div class="row">

                <div class="col-xs-6">
                    <h3 style="text-align: center;color: #0000ff">Top Bot thắng</h3>
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Nickname</td>
                            <td>Tiền thắng</td>
                        </tr>
                        </thead>
                        <tbody id="logbotwin">
                        </tbody>
                        <h4 style="text-align: center;color:red" id="resultbotwin"></h4>
                    </table>
                </div>
                <div class="col-xs-6">
                    <h3 style="text-align: center;color: #0000ff">Top Bot thua</h3>
                    <table id="checkAll" class="table table-bordered" style="table-layout: fixed">
                        <thead>
                        <tr style="height: 20px;">
                            <td>STT</td>
                            <td>Nickname</td>
                            <td>Tiền thua</td>
                        </tr>
                        </thead>
                        <tbody id="logbotlost">
                        </tbody>
                        <h4 style="text-align: center;color:red" id="resultbotlost"></h4>
                    </table>
                </div>
            </div>
        </div>-->
		
    </div>

</div>
<?php endif; ?>

<style>
    td{
        word-break: break-all;
    }
    thead{
        font-size: 12px;
    }
    .spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
</div>
<script>
$("#search_tran").click(function () {
    if($("#gamename").val()== ""){
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
            display : $("#displaygame").val(),
            toDate: $("#toDate").val(),
            fromDate:  $("#fromDate").val()
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
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
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
    $("#toDate").val( moment().format('DD-MM-YYYY'));
    $("#fromDate").val( moment().format('DD-MM-YYYY'));
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
            display : $("#displaygame").val(),
            toDate: $("#toDate").val(),
            fromDate:  $("#fromDate").val()
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
            $("#spinner").hide();
            $("#error-popup").modal("show");
        }, timeout: 40000
    });
});

function resultSearchTransction(stt, nickname,moneywin) {
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
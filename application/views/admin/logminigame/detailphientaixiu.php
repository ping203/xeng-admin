<div class="content-wrapper">
        <section class="content-header">
            <h1>
                Chi tiết phiên tài xỉu
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <input type="hidden" id="phientx" value="<?php echo $phien; ?>">

                        <div class="box-body">
                            <form action="<?php echo admin_url('logminigame/detailphientaixiu/' . $phien) ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Nickname:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control" id="name"
                                                   value="<?php echo $this->input->post('name') ?>" name="name">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Tiền:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">

                                            <select id="money" name="money"
                                                    class="form-control">
                                                <option value="1" <?php if ($this->input->post('money') == "1") {
                                                    echo "selected";
                                                } ?>><?php echo $namegame ?></option>
                                                <option value="0" <?php if ($this->input->post('money') == "0") {
                                                    echo "selected";
                                                } ?> >Xu
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
                                                   class="btn btn-success">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label>Phiên: <?php echo $phien; ?></label>
                                        </div>
                                    </div>

                                </div>
                            </form>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 style="text-align: center">Tài</h3>

                                        <div id="resulttai">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr style="height: 20px;">
                                                    <td>Phiên</td>
                                                    <td>Nick name</td>
                                                    <td>Tiền đạt</td>
                                                    <td>Cửa đặt</td>
                                                    <td>Thưởng</td>
                                                    <td>Hoàn trả</td>
                                                    <td>Giây đặt</td>
                                                    <td>Loại tiền</td>
                                                    <td>Ngày tạo</td>
                                                </tr>
                                                </thead>
                                                <tbody id="logaction">
                                                </tbody>
                                            </table>

                                            <div class="text-center" style="float: left">
                                                <ul id="pagination-demo" class="pagination-sm"></ul>
                                            </div>
                                        </div>
                                        <div id="errortai" style="color: red;text-align: center"></div>

                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h3 style="text-align: center">Xỉu</h3>

                                        <div id="resultxiu">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr style="height: 20px;">
                                                    <td>Phiên</td>
                                                    <td>Nick name</td>
                                                    <td>Tiền đạt</td>
                                                    <td>Cửa đặt</td>
                                                    <td>Thưởng</td>
                                                    <td>Hoàn trả</td>
                                                    <td>Giây đặt</td>
                                                    <td>Loại tiền</td>
                                                    <td>Ngày tạo</td>
                                                </tr>
                                                </thead>
                                                <tbody id="logactionxiu">
                                                </tbody>
                                            </table>

                                            <div class="text-center" style="float: right;">
                                                <ul id="pagination-demoxu" class="pagination-sm"></ul>
                                            </div>
                                        </div>
                                        <div id="errorxiu" style="color: red;text-align: center"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>

                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>


<script>
    function resulttaixiudetail(reference_id, user_name, bet_value, bet_side, prize, refund, input_time, money_type, time_log) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + reference_id + "</td>";
        rs += "<td>" + user_name + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_value) + "</td>";
        if (bet_side == 0) {
            rs += "<td>" + "Xỉu" + "</td>";
        }
        else if (bet_side == 1) {
            rs += "<td>" + "Tài" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(prize) + "</td>";
        rs += "<td>" + commaSeparateNumber(refund) + "</td>";
        rs += "<td>" + input_time + "</td>";
        if (money_type == 0) {
            rs += "<td>" + "xu" + "</td>";
        } else if (money_type == 1) {
            rs += "<td>" + "<?php echo $namegame ?>" + "</td>";
        }
        rs += "<td>" + time_log + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        var result = "";
        var oldpage = 0;
        var oldpage1 = 0;
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/detailphientaixiuajax')?>",
            data: {
                phientx: $("#phientx").val(),
                cuadat: 1,
                money: $("#money").val(),
                pages: 1,
                nickname: $("#name").val()
            },

            dataType: 'json',
            success: function (result) {
                if (result.transactions != "") {
                    $('#resulttai').css("display", "block");
                    $('#errortai').css("display", "none")
                    $("#spinner").hide();
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    $.each(result.transactions, function (index, value) {
                        result += resulttaixiudetail(value.reference_id, value.user_name, value.bet_value, value.bet_side, value.prize, value.refund, value.input_time, value.money_type, value.time_log);
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
                                    url: "<?php echo admin_url('logminigame/detailphientaixiuajax')?>",
                                    data: {
                                        phientx: $("#phientx").val(),
                                        cuadat: 1,
                                        money: $("#money").val(),
                                        pages: page,
                                        nickname: $("#name").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        $.each(result.transactions, function (index, value) {
                                            result += resulttaixiudetail(value.reference_id, value.user_name, value.bet_value, value.bet_side, value.prize, value.refund, value.input_time, value.money_type, value.time_log);
                                        });
                                        $('#logaction').html(result);
                                    }
                                });
                            }
                            oldpage = page;
                        }
                    });

                } else {
                    $("#spinner").hide();
                    $('#pagination-demo').css("display", "none");
                    $('#resulttai').css("display", "none");
                    $('#errortai').html("Không có ai đặt tài");
                }
            }
        });
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/detailphientaixiuajax')?>",
            data: {
                phientx: $("#phientx").val(),
                cuadat: 0,
                money: $("#money").val(),
                pages: 1,
                nickname: $("#name").val()
            },

            dataType: 'json',
            success: function (result) {
                if (result.transactions != "") {
                    $('#resultxiu').css("display", "block");
                    $('#errorxiu').css("display", "none")
                    $("#spinner").hide();
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    $.each(result.transactions, function (index, value) {
                        result += resulttaixiudetail(value.reference_id, value.user_name, value.bet_value, value.bet_side, value.prize, value.refund, value.input_time, value.money_type, value.time_log);
                    });
                    $('#logactionxiu').html(result);
                    $('#pagination-demoxu').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage1 > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('logminigame/detailphientaixiuajax')?>",
                                    data: {
                                        phientx: $("#phientx").val(),
                                        cuadat: 0,
                                        money: $("#money").val(),
                                        pages: page,
                                        nickname: $("#name").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        $.each(result.transactions, function (index, value) {
                                            result += resulttaixiudetail(value.reference_id, value.user_name, value.bet_value, value.bet_side, value.prize, value.refund, value.input_time, value.money_type, value.time_log);
                                        });
                                        $('#logactionxiu').html(result);
                                    }
                                });
                            }
                            oldpage1 = page;
                        }
                    });

                } else {
                    $("#spinner").hide();
                    $('#pagination-demoxu').css("display", "none");
                    $('#resultxiu').css("display", "none");
                    $('#errorxiu').html("Không có ai đặt xỉu");
                }
            }
        })
    });
    function replacedice(str) {
        return str.replace(/0/g, "bầu").replace(/1/g, "cua").replace(/2/g, "tôm").replace(/3/g, "cá").replace(/4/g, "gà").replace(/5/g, "hưou");
    }
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

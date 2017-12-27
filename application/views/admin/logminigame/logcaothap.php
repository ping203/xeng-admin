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
            Lịch sử cao thấp
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-body">

                    <label id="resultsearch" style="color: red;"></label>
                    <input type="hidden" id="typemoney" value="<?php echo $namegame ?>">
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
                                           value="<?php echo $this->input->post('phienbc') ?>" name="phienbc">
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-12">
                                    <label for="exampleInputEmail1">Nickname:</label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <input type="text" class="form-control" id="nickname"
                                           value="<?php echo $this->input->post('nickname') ?>" name="nickname">
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1 col-sm-2 col-xs-12">
                                    <label for="exampleInputEmail1">Phòng <?php echo $namegame ?>:</label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <select id="menhgiavin" name="menhgiavin" class="form-control">
                                        <option value="" <?php if($this->input->post('menhgiavin') == "" ){echo "selected";} ?>>Chọn</option>
                                        <option value="1000" <?php if($this->input->post('menhgiavin') == "1000" ){echo "selected";} ?>>1K <?php echo $namegame ?></option>
                                        <option value="10000" <?php if($this->input->post('menhgiavin') == "10000" ){echo "selected";} ?>>10K <?php echo $namegame ?></option>
                                        <option value="50000" <?php if($this->input->post('menhgiavin') == "50000" ){echo "selected";} ?>>50K <?php echo $namegame ?></option>
                                        <option value="100000" <?php if($this->input->post('menhgiavin') == "100000" ){echo "selected";} ?>>100K <?php echo $namegame ?></option>
                                        <option value="500000" <?php if($this->input->post('menhgiavin') == "500000" ){echo "selected";} ?>>500K <?php echo $namegame ?></option>
                                    </select>
                                </div>
                                <div class="col-md-1 col-sm-2 col-xs-12">
                                    <label for="exampleInputEmail1">Phòng xu:</label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <select id="menhgiaxu" name="menhgiaxu" class="form-control">
                                        <option value="" <?php if($this->input->post('menhgiaxu') == "" ){echo "selected";} ?>>Chọn</option>
                                        <option value="10000" <?php if($this->input->post('menhgiaxu') == "10000" ){echo "selected";} ?>>10K Xu</option>
                                        <option value="100000" <?php if($this->input->post('menhgiaxu') == "100000" ){echo "selected";} ?>>100K Xu</option>
                                        <option value="500000" <?php if($this->input->post('menhgiaxu') == "500000" ){echo "selected";} ?>>500K Xu</option>
                                        <option value="1000000" <?php if($this->input->post('menhgiaxu') == "1000000" ){echo "selected";} ?>>1M Xu</option>
                                        <option value="5000000" <?php if($this->input->post('menhgiaxu') == "5000000" ){echo "selected";} ?>>5M Xu</option>
                                    </select>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-1 col-sm-2 col-xs-12">
                                    <label for="exampleInputEmail1">Tiền:</label>
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <select id="money" name="money" class="form-control">
                                        <option value="1" <?php if ($this->input->post('money') == "1") {
                                            echo "selected";
                                        } ?>><?php echo $namegame ?>
                                        </option>
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
                                        <td>Nick name</td>
                                        <td style="width:100px;">Cửa đặt</td>
                                        <td style="width:100px;">Bước</td>
                                        <td>Phòng chơi</td>
                                        <td style="width:100px;">Kết quả</td>
                                        <td>Số tiền nhận được</td>
                                        <td>Quân bài</td>
                                        <td>Hũ hiện tại</td>
                                        <td>Quỹ hiện tại</td>
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

    function resultlogcaothap(tran_id,nickName,pot_bet,step,bet_value,result,prize,cards,current_pot,current_fund,money_type,time_log) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>"+tran_id+"</td>";
        rs += "<td>" + nickName + "</td>";
        if(pot_bet == 0){
            rs += "<td>" +"Dưới"+ "</td>";
        }else if(pot_bet == 1){
            rs += "<td>" +"Trên"+ "</td>";
        }
        rs += "<td>" + step + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_value) + "</td>";
        if(result == 4){
            rs += "<td>" + "Thắng" + "</td>";
        }else if(result == 5){
            rs += "<td>" + "Thua" + "</td>";
        }else if(result == 7){
            rs += "<td>" + "Nổ hũ" + "</td>";
        }
        else{
            rs += "<td>" + " " + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(prize) + "</td>";
        rs += "<td>" + cards + "</td>";
        rs += "<td>" + commaSeparateNumber(current_pot) + "</td>";
        rs += "<td>" + commaSeparateNumber(current_fund) + "</td>";
        if(money_type == 0){
            rs += "<td>" + "xu" + "</td>";
        }else if(money_type == 1){
            rs += "<td>" + $("#typemoney").val() + "</td>";
        }
        rs += "<td>" + time_log + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		$("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
   $("#search_tran").click(function () {
        var oldpage = 0;
        $('#pagination-demo').css("display","block");
        $("#spinner").show();
        if($("#money").val()==1) {
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                data: {
                    nickname: $("#nickname").val(),
                    phienbc: $("#phienbc").val(),
                    roomvin: $("#menhgiavin").val(),
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    money : $("#money").val(),
                    pages :1
                },
                dataType: 'json',
                success: function (result) {
                    $("#spinner").hide();
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    if (result.transactions == "") {
                        $('#pagination-demo').css("display","none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
						  $('#logaction').html("");
                    } else {
                        $("#resultsearch").html("");
                        $.each(result.transactions, function (index, value) {
                            result += resultlogcaothap(value.tran_id,value.nickName,value.pot_bet,value.step,value.bet_value,value.result,value.prize,value.cards,value.current_pot,value.current_fund,value.money_type,value.time_log);
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if(oldpage > 0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                                        data: {
                                            nickname: $("#nickname").val(),
                                            phienbc: $("#phienbc").val(),
                                            roomvin: $("#menhgiavin").val(),
                                            toDate: $("#toDate").val(),
                                            fromDate: $("#fromDate").val(),
                                            money : $("#money").val(),
                                            pages : page
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            $.each(result.transactions, function (index, value) {
                                                result += resultlogcaothap(value.tran_id, value.nickName, value.pot_bet, value.step, value.bet_value, value.result, value.prize, value.cards, value.current_pot, value.current_fund, value.money_type, value.time_log);
                                            });
                                            $('#logaction').html(result);
                                        }, error: function () {
                                            $("#spinner").hide();
                                            $('#logaction').html("");
                                            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                        }, timeout: timeOutApi
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
                }, timeout: timeOutApi
            })
        }else if($("#money").val()== 0){
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                data: {
                    nickname: $("#nickname").val(),
                    phienbc: $("#phienbc").val(),
                    roomxu: $("#menhgiaxu").val(),
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    money : $("#money").val(),
                    pages :1
                },
                dataType: 'json',
                success: function (result) {
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    $("#spinner").hide();
                    if (result.transactions == "") {
                        $('#pagination-demo').css("display","none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        $.each(result.transactions, function (index, value) {
                            result += resultlogcaothap(value.tran_id,value.nickName,value.pot_bet,value.step,value.bet_value,value.result,value.prize,value.cards,value.current_pot,value.current_fund,value.money_type,value.time_log);
                        });
                        $('#logaction').html(result);
                        $('#pagination-demo').twbsPagination({
                            totalPages: totalPage,
                            visiblePages: 5,
                            onPageClick: function (event, page) {
                                if(oldpage>0) {
                                    $("#spinner").show();
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo admin_url('logminigame/logcaothapajax')?>",
                                        data: {
                                            nickname: $("#nickname").val(),
                                            phienbc: $("#phienbc").val(),
                                            roomxu: $("#menhgiaxu").val(),
                                            toDate: $("#toDate").val(),
                                            fromDate: $("#fromDate").val(),
                                            money : $("#money").val(),
                                            pages: page
                                        },
                                        dataType: 'json',
                                        success: function (result) {
                                            $("#spinner").hide();
                                            $.each(result.transactions, function (index, value) {
                                                result += resultlogcaothap(value.tran_id, value.nickName, value.pot_bet, value.step, value.bet_value, value.result, value.prize, value.cards, value.current_pot, value.current_fund, value.money_type, value.time_log);
                                            });
                                            $('#logaction').html(result);
                                        }, error: function () {
                                            $("#spinner").hide();
                                            $('#logaction').html("");
                                            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                        }, timeout: timeOutApi
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
                }, timeout: timeOutApi
            })
        }
    });


    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

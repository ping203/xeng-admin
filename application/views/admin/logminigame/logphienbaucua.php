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
                Lịch sử bầu cua
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
                                               id="phientx" value="<?php echo $this->input->post('phientx') ?>"
                                               name="phientx">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Phòng:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="menhgiavin" name="menhgiavin" class="form-control">
                                            <option value="" <?php if($this->input->post('menhgiavin')== "" ){echo "selected";} ?> >Chọn</option>
                                            <option value="0" <?php if($this->input->post('menhgiavin')== "0" ){echo "selected";} ?>>1K <?php echo $namegame ?></option>
                                            <option value="1" <?php if($this->input->post('menhgiavin')== "1" ){echo "selected";} ?>>10K <?php echo $namegame ?></option>
                                            <option value="2" <?php if($this->input->post('menhgiavin')== "2" ){echo "selected";} ?>>100K <?php echo $namegame ?></option>
                                            <option value="3" <?php if($this->input->post('menhgiavin')== "3" ){echo "selected";} ?>>10K Xu</option>
                                            <option value="4" <?php if($this->input->post('menhgiavin')== "4" ){echo "selected";} ?>>100K Xu</option>
                                            <option value="5" <?php if($this->input->post('menhgiavin')== "5" ){echo "selected";} ?>>1000K Xu</option>
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
                                            <td>STT</td>
                                            <td>Phiên</td>
                                            <td>Phòng</td>
                                            <td>Kết quả</td>
                                            <td>Cửa nhân</td>
                                            <td>Tiền đặt bầu</td>
                                            <td>Tiền thưởng bầu</td>
                                            <td>Tiền đặt cua</td>
                                            <td>Tiền thưởng cua</td>
                                            <td>Tiền đặt tôm</td>
                                            <td>Tiền thưởng tôm</td>
                                            <td>Tiền đặt cá</td>
                                            <td>Tiền thưởng cá</td>
                                            <td>Tiền đặt gà</td>
                                            <td>Tiền thưởng gà</td>
                                            <td>Tiền đặt hưou</td>
                                            <td>Tiền thưởng hưou</td>
                                            <td>Tiền thắng  thua</td>
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
})
function resultlogbaucua(stt,referid,room,dice1,dice2,dice3,xpot,xvalue,bet_bau,bet_cua,bet_tom,bet_ca,bet_ga,bet_huou,prize_bau,prize_cua,prize_tom,prize_ca,prize_ga,prize_huou,total,time_log) {
    var rs = "";
    rs += "<tr>";
    rs += "<td>" + stt + "</td>";
    rs += "<td><a style='color: #0000FF' href='detailbaucua/"+referid+"'>"+referid+"</a>" + "</td>";
    rs += "<td>" + resultroom(room) + "</td>";
    rs += "<td>" + replacedice(dice1+','+dice2+','+dice3) + "</td>";
    rs += "<td>" + resultbaucua(xpot)+" x "+xvalue + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_bau) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_bau) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_cua) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_cua) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_tom) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_tom) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_ca) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_ca) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_ga) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_ga) + "</td>";
    rs += "<td>" + commaSeparateNumber(bet_huou) + "</td>";
    rs += "<td>" + commaSeparateNumber(prize_huou) + "</td>";
    rs += "<td>" + commaSeparateNumber(total) + "</td>";
    rs += "<td>" + time_log + "</td>";
    rs += "</tr>";
    return rs;
}
$(document).ready(function () {
	   $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
})
$("#search_tran").click(function () {
    var result = "";
    var oldpage = 0;
    $('#pagination-demo').css("display","block");
    $("#spinner").show();
    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('logminigame/logphienbaucuaajax')?>",
        data: {
            phienbc: $("#phienbc").val(),
            room: $("#menhgiavin").val(),
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val(),
            pages : 1
        },

        dataType: 'json',
        success: function (result) {
            $("#spinner").hide();
            if (result.transactions == "") {
                $('#pagination-demo').css("display", "none");
                $("#resultsearch").html("Không tìm thấy kết quả");
				 $('#logaction').html("");
            }else {
					$("#resultsearch").html("");
                var totalPage = result.total;
                var countrow = result.totalRecord;
                $("#num").html(countrow);
                stt = 1;
                $.each(result.transactions, function (index, value) {
                    result += resultlogbaucua(stt,value.reference_id, value.room, value.dice1, value.dice2, value.dice3, value.x_pot, value.x_value, value.bet_bau, value.bet_cua, value.bet_tom,value.bet_ca,value.bet_ga,value.bet_huou,value.prize_bau, value.prize_cua, value.prize_tom, value.prize_ca, value.prize_ga, value.prize_huou,value.total, value.time_log);
                stt ++;
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
                                url: "<?php echo admin_url('logminigame/logphienbaucuaajax')?>",
                                data: {
                                    phienbc: $("#phienbc").val(),
                                    room: $("#menhgiavin").val(),
                                    toDate: $("#toDate").val(),
                                    fromDate: $("#fromDate").val(),
                                    pages : page
                                },
                                dataType: 'json',
                                success: function (result) {
									$("#resultsearch").html("");
                                    $("#spinner").hide();
                                    stt = 1;
                                    $.each(result.transactions, function (index, value) {
                                        result += resultlogbaucua(stt,value.reference_id, value.room, value.dice1, value.dice2, value.dice3, value.x_pot, value.x_value, value.bet_bau, value.bet_cua, value.bet_tom,value.bet_ca,value.bet_ga,value.bet_huou,value.prize_bau, value.prize_cua, value.prize_tom, value.prize_ca, value.prize_ga, value.prize_huou,value.total, value.time_log);
                                        stt ++;
                                    });
                                    $('#logaction').html(result);
                                }, error: function () {
            $("#spinner").hide();
            $('#logaction').html("");
            $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
        },timeout : timeOutApi
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
        },timeout : timeOutApi
    })
});
function replacedice(str){
    return str.replace(/0/g,"bầu").replace(/1/g,"cua").replace(/2/g,"tôm").replace(/3/g,"cá").replace(/4/g,"gà").replace(/5/g,"hưou");
}
function commaSeparateNumber(val) {
    while (/(\d+)(\d{3})/.test(val.toString())) {
        val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
    }
    return val;
}

    function resultbaucua(count) {
        var strresult;
        switch (count) {
            case 0:
                strresult = "Bầu";
                break;
            case 1:
                strresult = "Cua";
                break;
            case 2:
                strresult = "Tôm";
                break;
            case 3:
                strresult = "Cá";
                break;
            case 4:
                strresult = "Gà";
                break;
            case 5:
                strresult = "Hưou";
                break;
        }
        return strresult;
    }
function resultroom(count) {
    var strresult;
    switch (count) {
        case 0:
            strresult = "1K Vin";
            break;
        case 1:
            strresult = "10K Vin";
            break;
        case 2:
            strresult = "100K Vin";
            break;
        case 3:
            strresult = "10K Xu";
            break;
        case 4:
            strresult = "100K Xu";
            break;
        case 5:
            strresult = "1M Xu";
            break;
    }
    return strresult;
}
</script>

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
                Log siêu anh hùng
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
                                            <option value="" <?php if($this->input->post('menhgiavin')== "" ){echo "selected";} ?> >Chọn</option>
                                            <option value="100" <?php if($this->input->post('menhgiavin')== "100" ){echo "selected";} ?>>100 <?php echo $namegame ?></option>
                                            <option value="1000" <?php if($this->input->post('menhgiavin')== "1000" ){echo "selected";} ?>>1K <?php echo $namegame ?></option>
                                            <option value="10000" <?php if($this->input->post('menhgiavin')== "10000" ){echo "selected";} ?>>10K <?php echo $namegame ?></option>
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
                                            <td>Nickname</td>
                                            <td>Phòng</td>
                                            <td>Dòng đặt</td>
                                            <td>Dòng thắng</td>
                                            <td>Tiền thưởng</td>
                                            <td>Tổng thưởng</td>
                                            <td>Kết quả</td>
                                            <td>Thời gian</td>
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

<style>
    td{
        word-break: break-all;
    }
</style>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'HH:mm:ss DD-MM-YYYY'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'HH:mm:ss DD-MM-YYYY'
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
    function resultlogpokego(stt,referid,nickname,room,linebet,linewin,prizeline,prize,result,time_log) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + referid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + room + "</td>";
        rs += "<td class='col-sm-2'>" + linebet + "</td>";
        rs += "<td class='col-sm-2'>" + linewin + "</td>";
        rs += "<td class='col-sm-2'>" + prizeline + "</td>";
        rs += "<td>" + commaSeparateNumber(prize) + "</td>";
        rs += "<td>" + resultpokego(result) + "</td>";
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
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/logavengerajax')?>",
            data: {
                phienbc: $("#phienbc").val(),
                nickname: $("#name").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                roomvin: $("#menhgiavin").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
					 $("#resultsearch").html("");
                    var totalPage = result.total;
                    var countrow = result.totalRecord;
                    $("#num").html(countrow);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultlogpokego(stt, value.reference_id, value.user_name, value.bet_value, value.lines_betting, value.lines_win, value.prizes_on_line, value.prize, value.result, value.time_log);
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
                                    url: "<?php echo admin_url('logminigame/logavengerajax')?>",
                                    data: {

                                        phienbc: $("#phienbc").val(),
                                        nickname: $("#name").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        roomvin: $("#menhgiavin").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultlogpokego(stt, value.reference_id, value.user_name, value.bet_value, value.lines_betting, value.lines_win, value.prizes_on_line, value.prize, value.result, value.time_log);
                                            stt++;
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
    });
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

    function resultpokego(count) {
        var strresult;
        switch (count) {
            case 0:
                strresult = "Trượt";
                break;
            case 1:
                strresult = "Thắng";
                break;
            case 2:
                strresult = "Thắng lớn";
                break;
            case 3:
                strresult = "Nổ hũ";
                break;
            case 4:
                strresult = "Nổ hũ x2";
                break;
            case 5:
                strresult = "Mini kho báu";
                break;
            case 100:
                strresult = "Lỗi hệ thống";
                break;
            case 101:
                strresult = "Đặt cược không hợp lệ";
                break;
            case 102:
                strresult = "Không đủ tiền";
                break;
        }
        return strresult;
    }
</script>

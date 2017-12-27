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
                Danh sách chủ bàn xóc đĩa
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <form action="<?php echo admin_url('event/listbossxocdia') ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Nickname:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control"
                                                   id="filter_iname" value="<?php echo $this->input->post('name') ?>"
                                                   name="name">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Trạng thái:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <select id="sl-status" name="sl-status" class="form-control">
                                                <option value="1" <?php if ($this->input->post('sl-status') == "1") {
                                                    echo "selected";
                                                } ?>>Đang chạy
                                                </option>
                                                <option value="0" <?php if ($this->input->post('sl-status') == "0") {
                                                    echo "selected";
                                                } ?>>Đã hủy
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Phòng</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control"
                                                   id="txtroom" value="<?php echo $this->input->post('txtroom') ?>"
                                                   name="txtroom">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Tiền cược:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <input type="text" class="form-control"
                                                   id="txtmoney" value="<?php echo $this->input->post('txtmoney') ?>"
                                                   name="txtmoney">
                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">

                                        </div>
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
                                                   class="btn btn-success">
                                        </div>

                                    </div>
                                </div>
                            </form>

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
                                            <td>SessionID</td>
                                            <td>Nickname</td>
                                            <td>RoomID</td>
                                            <td>Mức cược phòng</td>
                                            <td>Password</td>
                                            <td>Roomname</td>
                                            <td>Quỹ khởi tạo</td>
                                            <td>Quỹ hiện tại</td>
                                            <td>Trạng thái</td>
                                            <td>Phê</td>
                                            <td>Lợi nhuận</td>
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






<script>


    function resultSearchTransction(stt, ssid, nickname, roomid, moneybet, password, roomname, fundint, fund, status, fee, revenue, date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + ssid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + roomid + "</td>";
        rs += "<td>" + commaSeparateNumber(moneybet) + "</td>";
        rs += "<td>" + password + "</td>";
        rs += "<td>" + roomname + "</td>";
        rs += "<td>" + commaSeparateNumber(fundint) + "</td>";
        rs += "<td>" + commaSeparateNumber(fund) + "</td>";
        if (status == 0) {
            rs += "<td>" + "Đã hủy" + "</td>";
        } else if (status == 1) {
            rs += "<td>" + "Đang chạy" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + commaSeparateNumber(revenue) + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {

        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/listbossxocdiaajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                status: $("#sl-status").val(),
                room: $("#txtroom").val(),
                money: $("#txtmoney").val()
            },

            dataType: 'json',
            success: function (result) {
                console.log(result);

                $("#spinner").hide();
                if (result.bossList == "") {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    $.each(result.bossList, function (index, value) {
                        result += resultSearchTransction(stt, value.sessionId, value.nickname, value.roomId, value.moneyBet, value.password, value.roomName, value.fundInitial, value.fund, value.status, value.fee, value.revenue, value.createTime);
                        stt++;

                    });
                    $('#logaction').html(result);
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
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
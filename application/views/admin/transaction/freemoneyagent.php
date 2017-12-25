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
                Danh sách đóng băng tiền đại lý
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">

                            <form action="<?php echo admin_url('transaction/freemoneyagent') ?>" method="post">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Từ ngày:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' value="<?php echo $this->input->post("toDate") ?>" class="form-control"
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
                                                <input type='text' value="<?php echo $this->input->post("fromDate") ?>" class="form-control"
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
                                            <select id="statusdb" name="statusdb" class="form-control">
                                                <option value="" <?php if ($this->input->post('statusdb') == "") {
                                                    echo "selected";
                                                } ?>>Chọn
                                                </option>
                                                <option value="1" <?php if ($this->input->post('statusdb') == "1") {
                                                    echo "selected";
                                                } ?>>Đang đóng băng
                                                </option>
                                                <option value="0" <?php if ($this->input->post('statusdb') == "0") {
                                                    echo "selected";
                                                } ?>>Đã mở đóng băng
                                                </option>

                                            </select>
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
                        <input type="hidden" value="<?php echo $admin_info->Status ?>" id="statusopen">

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="checkAll" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>STT</td>
                                            <td>Session id</td>
                                            <td>Nickname</td>
                                            <td>Tiền đóng băng</td>
                                            <td>Thời gian</td>
                                            <?php if ($admin_info->Status == "W" || $admin_info->Status == "A"): ?>
                                                <td>Mở đóng băng</td>
                                            <?php endif; ?>
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
                            <div class="modal fade" id="bsModal3" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <p id="statuspenđing" style="color: #0000ff"></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input class="blueB logMeIn" type="button" value="Đóng" data-dismiss="modal"
                                                   aria-hidden="true">
                                        </div>
                                    </div>
                                </div>
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

    $(document).ready(function () {
        var oldPage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/freemoneyagentajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                status: $("#statusdb").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if (result.length == 0) {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result, function (index, value) {
                        result += resultSearchTransction(stt, value.sessionId, value.nickname, value.money, value.createTime, value.status);
                        stt++;
                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: 200,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/freemoneyagentajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        status: $("#statusdb").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result, function (index, value) {
                                            result += resultSearchTransction(stt, value.sessionId, value.nickname, value.money, value.createTime, value.status);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
                                    }, timeout: timeOutApi
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
            }, timeout: timeOutApi
        })
    });
    function resultSearchTransction(stt, sesionid, nickname, money, date, status) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + sesionid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + moment.unix(date / 1000).format("DD MMM YYYY hh:mm a") + "</td>";
        if ($("#statusopen").val() == "A" || $("#statusopen").val() == "W") {
            if (status == 1) {

                rs += "<td>" + "<input type='button' id='updatecard' value='Mở đóng băng' class='btn btn-success'  onclick=\"opendongbang('" + sesionid + "','" + nickname + "','" + money + "')\" >" + "</td>";
            } else {
                rs += "<td>" + "" + "</td>";
            }
        }
        rs += "</tr>";
        return rs;
    }


    function opendongbang(referentid, nickname, money) {
        if (!confirm('Bạn chắc chắn muốn mở đóng băng ?')) {
            return false;
        }
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/openmoneyagentajax')?>",
            data: {
                sid: referentid,
                nickname: nickname,
                money: money

            },

            dataType: 'text',
            success: function (result) {

                $("#spinner").hide();
                if (result == 0) {

                    $("#bsModal3").modal("show");
                    $("#statuspenđing").html("Bạn mở đóng băng thành công");
                } else if (result == 1) {
                    $("#statuspenđing").html("Bạn mở đóng băng không thành công");
                }

            }, error: function () {
                errorThongBao();
            }, timeout: timeOutApi
        });


    }

    $('#bsModal3').on('hidden.bs.modal', function () {
        location.reload();
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
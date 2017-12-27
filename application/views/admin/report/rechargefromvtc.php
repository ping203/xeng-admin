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
            Lịch sử nạp <?php echo $namegame ?> qua VTC
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
                    <label for="exampleInputEmail1">Mã giao dịch:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text"  class="form-control" id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                           name="magiaodich">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mệnh giá:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_price" name="select_price" class="form-control">
                        <option value="">Chọn</option>
                        <option value="10000" <?php if ($this->input->post('select_price') == "10000") {
                            echo "selected";
                        } ?>>10K
                        </option>
                        <option value="20000" <?php if ($this->input->post('select_price') == "20000") {
                            echo "selected";
                        } ?>>20K
                        </option>
                        <option value="50000" <?php if ($this->input->post('select_price') == "50000") {
                            echo "selected";
                        } ?>>50K
                        </option>
                        <option value="100000" <?php if ($this->input->post('select_price') == "100000") {
                            echo "selected";
                        } ?>>100K
                        </option>
                        <option value="200000" <?php if ($this->input->post('select_price') == "200000") {
                            echo "selected";
                        } ?>>200K
                        </option>
                        <option value="500000" <?php if ($this->input->post('select_price') == "500000") {
                            echo "selected";
                        } ?>>500K
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
                        <td>STT</td>
                        <td>Mã giao dịch</td>
                        <td>Nick name</td>
                        <td>Mệnh giá</td>
                        <td>Mã lỗi</td>
                        <td>Mô tả</td>
                        <td>Thời gian yêu cầu</td>
                        <td>Thời gian đáp ứng</td>
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
    function resultSearchTransction(stt, rid, nickName, price, error, description, timerequest, timeresponse) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + commaSeparateNumber(price) + "</td>";
        rs += "<td>" + error + "</td>";
        rs += "<td>" + description + "</td>";
        if (timerequest == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + timerequest + "</td>";
        }
        if (timeresponse == null) {
            rs += "<td>" + "" + "</td>";
        } else {
            rs += "<td>" + timeresponse + "</td>";
        }
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
            url: "<?php echo admin_url('report/rechargefromvtcajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val().replace(/[-:  +]/g, ''),
                fromDate: $("#fromDate").val().replace(/[-:  +]/g, ''),
                pages: 1,
                tranid: $("#magiaodich").val(),
                price: $("#select_price").val()
            },

            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if (res.trans == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");

                    var stt = 1;
                    $.each(res.trans, function (index, value) {
                        result += resultSearchTransction(stt, value.transId, value.nickName, value.price, value.responseCode, value.description, value.timeRequest, value.timeResponse);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldpage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/rechargefromvtcajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val().replace(/[-:  +]/g, ''),
                                        fromDate: $("#fromDate").val().replace(/[-:  +]/g, ''),
                                        pages: page,
                                        tranid: $("#magiaodich").val(),
                                        price: $("#select_price").val()

                                    },
                                    dataType: 'json',
                                    success: function (res) {
                                        $("#spinner").hide();
                                        if (res.trans == "") {
                                            $('#pagination-demo').css("display", "none");
                                            $('#logaction').html("");
                                        } else {
                                            $("#resultsearch").html("");
                                            stt = 1;
                                            $.each(res.trans, function (index, value) {
                                                result += resultSearchTransction(stt, value.transId, value.nickName, value.price, value.responseCode, value.description, value.timeRequest, value.timeResponse);
                                                stt++;
                                            });
                                            $('#logaction').html(result);
                                        }
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
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
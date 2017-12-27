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
            Lịch sử nạp tiền điện thoại
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
                    <label for="exampleInputEmail1">Số điện thoại:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="txtmobile" value="<?php echo $this->input->post('txtmobile') ?>"
                           name="txtmobile">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã giao dịch:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                           name="magiaodich">
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
                        <option value="23" <?php if ($this->input->post('select_status') == "23") {
                            echo "selected";
                        } ?>>Sai số điện thoại
                        </option>
                        <option value="30" <?php if ($this->input->post('select_status') == "30") {
                            echo "selected";
                        } ?>>Đang xử lý
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
                        <option value="" <?php if ($this->input->post('select_partner') == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="vtc" <?php if ($this->input->post('select_partner') == "vtc") {
                            echo "selected";
                        } ?>>VTC
                        </option>
                        <option value="epay" <?php if ($this->input->post('select_partner') == "epay") {
                            echo "selected";
                        } ?>>EPay
                        </option>

                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Thuê bao:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_dichvu" name="select_dichvu" class="form-control">
                        <option value="" <?php if ($this->input->post('select_dichvu') == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="1" <?php if ($this->input->post('select_dichvu') == "1") {
                            echo "selected";
                        } ?>>Trả trước
                        </option>
                        <option value="2" <?php if ($this->input->post('select_dichvu') == "2") {
                            echo "selected";
                        } ?>>Trả sau
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
                        <td>Điện thoại</td>
                        <td>Nhà mạng</td>
                        <td>Nhà cung cấp</td>
                        <td>Thuê bao</td>
                        <td>Tiền</td>
                        <td style="width:100px;">Mã lỗi dịch vụ</td>
                        <td>Mô tả</td>
                        <td>Mã lỗi <?php echo $namegame ?></td>
                        <td>Thời gian</td>
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
    function resultSearchTransction(stt, rid, nickName, target, amount, status, message, code, date,provider,partner,type) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + target + "</td>";
        rs += "<td>" + provider + "</td>";
        rs += "<td>" + partner + "</td>";
        if(type == 1){
            rs += "<td>" + "Trả trước" + "</td>";
        }else if(type == 2){
            rs += "<td>" + "Trả sau" + "</td>";
        }

        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>" + status + "</td>";
        rs += "<td>" + message + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + date + "</td>";
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
            url: "<?php echo admin_url('report/cashoutbytopupajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                mobile: $("#txtmobile").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
                tranid: $("#magiaodich").val(),
                partner : $("#select_partner").val(),
                type : $("#select_dichvu").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalRecord);

                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
					   $('#logaction').html("");

                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.total;
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalRecord);

                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.referenceId, value.nickName, value.target, value.amount, value.status, value.message, value.code, value.timeLog,value.provider,value.partner,value.type);
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
                                    url: "<?php echo admin_url('report/cashoutbytopupajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        mobile: $("#txtmobile").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        tranid: $("#magiaodich").val(),
                                        partner : $("#select_partner").val(),
                                        type : $("#select_dichvu").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.referenceId, value.nickName, value.target, value.amount, value.status, value.message, value.code, value.timeLog,value.provider,value.partner,value.type);
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
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
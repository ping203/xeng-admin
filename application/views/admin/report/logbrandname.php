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
            Lịch sử Brandname
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
                    <label for="exampleInputEmail1">Số điện thoại:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="txtmobile" value="<?php echo $this->input->post('txtmobile') ?>"
                           name="txtmobile">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Trạng thái:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_status" name="select_status" class="form-control">
                        <option value="">Chọn</option>
                        <option value="1" <?php if ($this->input->post('select_status') == "1") {
                            echo "selected";
                        } ?>>Thành công
                        </option>
                        <option value="2" <?php if ($this->input->post('select_status') == "2") {
                            echo "selected";
                        } ?>>Thất bại
                        </option>
                    </select>
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
                           id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>" name="magiaodich"></td>
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
                        <td>Request Id</td>
                        <td>Tin nhắn</td>
                        <td>Điện thoại</td>
                        <td>Trạng thái</td>
                        <td>Số lượng tin nhắn</td>
                        <td>Mô tả</td>
                        <td>Thời gian</td>
                        <td>Thời gian cập nhật</td>
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
    function resultSearchTransction(stt,rid, message, mobile,status,count,description,time,updatetime) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td class='col-sm-3'>" + message + "</td>";
        rs += "<td>" + mobile + "</td>";
        rs += "<td>" + status + "</td>";
        rs += "<td>" + count + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + time + "</td>"
        rs += "<td>" + updatetime + "</td>";
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
            url: "<?php echo admin_url('report/logbrandnameajax')?>",
         
            data: {
                mobile: $("#txtmobile").val(),
                status : $("#select_status").val(),
                toDate:   $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages : 1,
				   tranid : $("#magiaodich").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.records == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.totalPages;
                    var totalReceiveSuccess = (result.numSend);
                    var totalSendSuccess = (result.numSuccess);
                    $('#summessend').html(totalReceiveSuccess);
                    $('#summessuc').html(totalSendSuccess);
                    stt = 1;
                    $.each(result.records, function (index, value) {
                        result += resultSearchTransction(stt, value.requestId, value.message, value.receives, value.status, value.count, value.statusDesc, value.transTime, value.updateTime);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage>0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/logbrandnameajax')?>",
                                 
                                    data: {
                                        mobile: $("#txtmobile").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
										   tranid : $("#magiaodich").val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
										$("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.records, function (index, value) {
                                            result += resultSearchTransction(stt, value.requestId, value.message, value.receives, value.status, value.count, value.statusDesc, value.transTime, value.updateTime);
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
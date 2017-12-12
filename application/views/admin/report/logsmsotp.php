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
            Lịch sử SMS OTP
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
                    <input type="text" class="form-control" id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>" name="magiaodich">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Số điện thoại:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="txtmobile" value="<?php echo $this->input->post('txtmobile') ?>" name="txtmobile">
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
                        <td>Điện thoại</td>
                        <td>Command Code</td>
                        <td>Tin nhắn nhận</td>
                        <td>Kết quả nhận</td>
                        <td>Tin nhắn gửi</td>
                        <td>Kết quả gửi</td>
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
    function resultSearchTransction(stt,rid, mobile, cmcode,mesmo,resmo,mesmt, resmt,time) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + mobile + "</td>";
        rs += "<td>" + cmcode + "</td>";
        rs += "<td>" + mesmo + "</td>";
        if(resmo == 1){
        rs += "<td>" + "Thành công" + "</td>";}
        else if(resmo == -1){
            rs += "<td>" + "Thất bại" + "</td>";
        }
        rs += "<td class='col-sm-3'>" + mesmt + "</td>";
        if(resmt == 1){
            rs += "<td>" + "Thành công" + "</td>";}
        else if(resmt == -1){
            rs += "<td>" + "Thất bại" + "</td>";
        }
        rs += "<td>" + time + "</td>";
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
            url: "<?php echo admin_url('report/logsmsotpajax')?>",
           
            data: {
                mobile: $("#txtmobile").val(),
                toDate:   $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages: 1,
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
                    var totalReceiveSuccess = commaSeparateNumber(result.numReceiveSuccess);
                    var totalSendSuccess = commaSeparateNumber(result.numSendSuccess);
                    $('#summesrec').html(totalReceiveSuccess);
                    $('#summessend').html(totalSendSuccess);
                    stt = 1;
                    $.each(result.records, function (index, value) {
                        result += resultSearchTransction(stt, value.requestId, value.mobile, value.commandCode, value.messageMO, value.responseMO, value.messageMT, value.responseMT, value.transTime);
                        stt++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage >0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('report/logsmsotpajax')?>",
                                  
                                    data: {
                                        mobile: $("#txtmobile").val(),
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
                                            result += resultSearchTransction(stt, value.requestId, value.mobile, value.commandCode, value.messageMO, value.responseMO, value.messageMT, value.responseMT, value.transTime);
                                            stt++;
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
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
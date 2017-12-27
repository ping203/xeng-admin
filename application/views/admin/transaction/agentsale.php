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
                Lịch sử tài khoản bán <?php echo $namegame ?> cho đại lý
            </h1>
            <ol class="breadcrumb">
                <label>Tổng bán:<span style="color: #0000ff" id="summoney"></span></label>
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
                                        <label for="exampleInputEmail1">Hiển thị:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="record" name="record" class="form-control">
                                            <option value="50" <?php if($this->input->post('record') == 50 ){echo "selected";} ?> >50</option>
                                            <option value="100" <?php if($this->input->post('record') == 100 ){echo "selected";} ?>>100</option>
                                            <option value="200" <?php if($this->input->post('record') == 200 ){echo "selected";} ?>>200</option>
                                            <option value="500" <?php if($this->input->post('record') == 500 ){echo "selected";} ?>>500</option>
                                            <option value="1000" <?php if($this->input->post('record') == 1000 ){echo "selected";} ?>>1000</option>
                                            <option value="2000" <?php if($this->input->post('record') == 2000 ){echo "selected";} ?>>2000</option>
                                            <option value="5000" <?php if($this->input->post('record') == 5000 ){echo "selected";} ?>>5000</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="exportexel" value="Xuất Exel" class="btn btn-success">
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
                                            <td>Tài khoản chuyển</td>
                                            <td>Tài khoản nhận</td>
                                            <td>Số <?php echo $namegame ?> gửi</td>
                                            <td>Số <?php echo $namegame ?> nhận</td>
                                            <td>Phí chuyển khoản</td>
                                            <td>Trạng thái</td>
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
    function resultSearchTransction(stt, namesend, namerecive, moneysend, moneyrecive,fee,status,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + namesend + "</td>";
        rs += "<td>" + namerecive + "</td>";
        rs += "<td>" + commaSeparateNumber(moneysend) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyrecive) + "</td>";
        rs += "<td>" + commaSeparateNumber(fee) + "</td>";
        rs += "<td>" + statustranfer(status) + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		 $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
   $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/agentsaleajax')?>",
        
            data: {
                nickname: $("#filter_iname").val(),
                toDate : $("#toDate").val(),
                fromDate : $("#fromDate").val(),
				 record : $("#record").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
					   $('#summoney').html("");
                }else {
					 $("#resultsearch").html("");
                    var totalPage = result.total;
                    var totalmoney = commaSeparateNumber(result.totalVinSend);
                    $('#summoney').html(totalmoney);
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
						"retrieve": true,
                        "ordering": true,
                        "searching": false,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                              //  table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('transaction/agentsaleajax')?>",
                                   
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate : $("#toDate").val(),
                                        fromDate : $("#fromDate").val(),
										 record : $("#record").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
										 $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nick_name_send, value.nick_name_receive, value.money_send, value.money_receive, value.fee, value.status, value.trans_time);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
											"retrieve": true,
                                            "ordering": true,
                                            "searching": false,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
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
            },timeout : timeOutApi
        })

    });
	$("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "listagentsale",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
    function statustranfer(feetran){
        var strresult;
        switch (feetran) {
            case 1:
                strresult = "Tài khoản thường chuyển đại lý cấp 1";
                break;
            case 2:
                strresult = "Tài khoản thường chuyển đại lý cấp 2";
                break;
            case 3:
                strresult = "Đại lý cấp 1 chuyển tài khoản thường";
                break;
            case 4:
                strresult = "Đại lý cấp 1 chuyển đại lý cấp 1";
                break;
            case 5:
                strresult = "Đại lý cấp 1 chuyển đại lý cấp 2";
                break;
            case 6:
                strresult = "Đại lý cấp 2 chuyển tài khoản thường";
                break;
            case 7:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 1";
                break;
            case 8:
                strresult = "Đại lý cấp 2 chuyển đại lý cấp 2";
                break;
        }
        return strresult;
    }
</script>
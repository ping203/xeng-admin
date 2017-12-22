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
                Lịch sử nạp vin 8x98
            </h1>
            <ol class="breadcrumb">
                <label class="">Tổng: <span id="summoney" style="color: #0000ff"></span></label>
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
                                        <label for="exampleInputEmail1">Mệnh giá:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="select_amout" name="select_amout" class="form-control">
                                            <option value="">Chọn</option>
                                            <option value="1000" <?php if($this->input->post('select_amout') == "1000" ){echo "selected";} ?>>1.000</option>
                                            <option value="2000" <?php if($this->input->post('select_amout') == "2000" ){echo "selected";} ?>>2.000</option>
                                            <option value="3000" <?php if($this->input->post('select_amout') == "3000" ){echo "selected";} ?>>3.000</option>
                                            <option value="4000" <?php if($this->input->post('select_amout') == "4000" ){echo "selected";} ?>>4.000</option>
                                            <option value="5000" <?php if($this->input->post('select_amout') == "5000" ){echo "selected";} ?>>5.000</option>
                                            <option value="10000" <?php if($this->input->post('select_amout') == "10000" ){echo "selected";} ?>>10.000</option>
                                            <option value="15000" <?php if($this->input->post('select_amout') == "15000" ){echo "selected";} ?>>15.000</option>
                                            <option value="20000" <?php if($this->input->post('select_amout') == "20000" ){echo "selected";} ?>>20.000</option>
                                            <option value="30000" <?php if($this->input->post('select_amout') == "30000" ){echo "selected";} ?>>30.000</option>
                                            <option value="50000" <?php if($this->input->post('select_amout') == "50000" ){echo "selected";} ?>>50.000</option>
                                            <option value="100000" <?php if($this->input->post('select_amout') == "100000" ){echo "selected";} ?>>100.000</option>
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
                                               id="txtgiaodich"  value="<?php echo $this->input->post('txtgiaodich') ?>" name="txtgiaodich">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Trạng thái:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="select_status" name="select_status" class="form-control">
                                            <option value="">Chọn</option>
                                            <option value="0" <?php if($this->input->post('select_status') == "0" ){echo "selected";} ?>>Thành công</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Điện thoại:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control" id="txtmobile"  value="<?php echo $this->input->post('txtmobile') ?>" name="txtmobile">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Đầu số:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="select_dauso" name="select_dauso" class="form-control">
                                            <option value="">Chọn</option>
                                            <option value="8198" <?php if($this->input->post('select_dauso') == "8198" ){echo "selected";} ?>>8198</option>
                                            <option value="8298" <?php if($this->input->post('select_dauso') == "8298" ){echo "selected";} ?>>8298</option>
                                            <option value="8398" <?php if($this->input->post('select_dauso') == "8398" ){echo "selected";} ?>>8398</option>
                                            <option value="8498" <?php if($this->input->post('select_dauso') == "8498" ){echo "selected";} ?>>8498</option>
                                            <option value="8598" <?php if($this->input->post('select_dauso') == "8598" ){echo "selected";} ?>>8598</option>
                                            <option value="8698" <?php if($this->input->post('select_dauso') == "8698" ){echo "selected";} ?>>8698</option>
                                            <option value="8798" <?php if($this->input->post('select_dauso') == "8798" ){echo "selected";} ?>>8798</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
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
                                            <td>Nick name</td>
                                            <td>Điện thoại</td>
                                            <td>Tin nhắn gửi</td>
                                            <td>Mệnh giá</td>
                                            <td>Mã trả về 1 pay</td>
                                            <td>Mã giao dịch</td>
                                            <td>Mô tả</td>
                                            <td>Vin</td>
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
    function resultSearchTransction(stt,nickname, mobile, momess, amout,shortcode,rid, description,money,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + mobile + "</td>";
        rs += "<td>" + momess + "</td>";
        rs += "<td>" + commaSeparateNumber(amout) + "</td>";
        rs += "<td>" + shortcode + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + commaSeparateNumber(money) + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
	 $(document).ready(function () {
        $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
    });
    $("#search_tran").click(function () {
        var result = "";
        var oldpage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/rechargeby8x98ajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                amout: $("#select_amout").val(),
                mobile : $("#txtmobile").val(),
                rid : $("#txtgiaodich").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate :   $("#fromDate").val(),
                pages : 1,
                shortcode : $("#select_dauso").val()
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
                    var totalPage = result.totalPages;
                    var totalmoney = commaSeparateNumber(result.totalMoney);
                    var totalrecord = commaSeparateNumber(result.totalSuccess);
                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);

                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.nickname,value.mobile, value.moMessage, value.amount, value.shortCode, value.requestId, value.des, value.money, value.timeLog);
                        stt++;
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
                                    url: "<?php echo admin_url('report/rechargeby8x98ajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        amout: $("#select_amout").val(),
                                        mobile : $("#txtmobile").val(),
                                        rid : $("#txtgiaodich").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate :   $("#fromDate").val(),
                                        pages: page,
                                        shortcode : $("#select_dauso").val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
										$("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.nickname,value.mobile, value.moMessage, value.amount, value.shortCode, value.requestId, value.des, value.money, value.timeLog);
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
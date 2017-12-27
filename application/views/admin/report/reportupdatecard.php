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
            Lịch sử cập nhật thẻ pendding
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
                    <label for="exampleInputEmail1">Admin xử lý:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control" id="txtnickname" value="<?php echo $this->input->post('txtnickname') ?>" name="txtnickname">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã thẻ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="txtmathe" class="form-control"
                           value="<?php echo $this->input->post('txtmathe') ?>" name="txtmathe">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã serial:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="txtserial" class="form-control"
                           value="<?php echo $this->input->post('txtserial') ?>"
                           name="txtserial">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Mã giao dịch:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" id="magiaodich" value="<?php echo $this->input->post('magiaodich') ?>"
                           name="magiaodich" class="form-control">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Loại thẻ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_provider" name="select_provider" class="form-control">
                        <option value="">Chọn</option>
                        <option value="Viettel" <?php if($this->input->post('select_provider') == "Viettel" ){echo "selected";} ?>>Viettel</option>
                        <option value="Mobifone" <?php if($this->input->post('select_provider') == "Mobifone" ){echo "selected";} ?>>Mobifone</option>
                        <option value="Vinaphone" <?php if($this->input->post('select_provider') == "Vinaphone" ){echo "selected";} ?>>Vinaphone</option>
                        <option value="Zing" <?php if($this->input->post('select_provider') == "Zing" ){echo "selected";} ?>>Zing</option>
                        <option value="Vcoin" <?php if($this->input->post('select_provider') == "Vcoin" ){echo "selected";} ?>>Vcoin</option>
                        <option value="Gate" <?php if($this->input->post('select_provider') == "Gate" ){echo "selected";} ?>>Gate</option>
                        <option value="VietNamMobile" <?php if($this->input->post('select_provider') == "VietNamMobile" ){echo "selected";} ?>>VietNamMobile</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Trạng thái:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_status" name="select_status" class="form-control">
                        <option value="">Chọn</option>
                        <option value="0" <?php if($this->input->post('select_status') == "0" ){echo "selected";} ?>>Thành công</option>
                        <option value="1" <?php if($this->input->post('select_status') == "1" ){echo "selected";} ?>>Thất bại</option>
                        <option value="30" <?php if($this->input->post('select_status') == "30" ){echo "selected";} ?>>Đang xử lý</option>
                        <option value="31" <?php if($this->input->post('select_status') == "31" ){echo "selected";} ?>>Thẻ đã nạp trước đó</option>
                        <option value="32" <?php if($this->input->post('select_status') == "32" ){echo "selected";} ?>>Thẻ bị khóa</option>
                        <option value="33" <?php if($this->input->post('select_status') == "33" ){echo "selected";} ?>>Thẻ chưa kích hoạt</option>
                        <option value="34" <?php if($this->input->post('select_status') == "34" ){echo "selected";} ?>>Thẻ hết hạn</option>
                        <option value="35" <?php if($this->input->post('select_status') == "35" ){echo "selected";} ?>>Sai mã thẻ</option>
                        <option value="36" <?php if($this->input->post('select_status') == "36" ){echo "selected";} ?>>Mã serial không đúng</option>
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
                        <td>Admin xử lý</td>
                        <td>Thẻ</td>
                        <td>Serial</td>
                        <td>Mã thẻ</td>
                        <td>Mệnh giá</td>
                        <td>Mã lỗi dịch vụ</td>
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
    function resultSearchTransction(stt,rid, nickName,actor, provider, serial, pin,amount, status,message,code,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + rid + "</td>";
        rs += "<td>" + nickName + "</td>";
        rs += "<td>" + actor + "</td>";
        rs += "<td>" + provider + "</td>";
        rs += "<td>" + serial + "</td>";
        rs += "<td>" + pin + "</td>";
        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>"+status+"</td>";
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
            url: "<?php echo admin_url('report/reportupdatecardajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                provider: $("#select_provider").val(),
                serial : $("#txtserial").val(),
                mathe: $("#txtmathe").val(),
                status: $("#select_status").val(),
                toDate: $("#toDate").val(),
                fromDate :   $("#fromDate").val(),
                pages : 1,
                tranid : $("#magiaodich").val(),
                txtnickname: $("#txtnickname").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.trans == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
					   $('#summoney').html("");
                    $('#sumrecord').html("");
                    $('#money1').html("");
                    $('#money2').html("");
                    $('#money3').html("");
                    $('#money6').html("");
                } else {
                    $("#resultsearch").html("");
                    var totalPage = result.totalPage;
                    var totalmoney = commaSeparateNumber(result.moneyReponse[0].value);
                    var totalrecord = commaSeparateNumber(result.totalRecord);
                    var total1 = commaSeparateNumber(result.moneyReponse[1].value);
                    var total2 = commaSeparateNumber(result.moneyReponse[2].value);
                    var total3 = commaSeparateNumber(result.moneyReponse[3].value);
                    var total6 = commaSeparateNumber(result.moneyReponse[6].value);
                    $('#summoney').html(totalmoney);
                    $('#sumrecord').html(totalrecord);
                    $('#money1').html(total1);
                    $('#money2').html(total2);
                    $('#money3').html(total3);
                    $('#money6').html(total6);
                    stt = 1;
                    $.each(result.trans, function (index, value) {
                        result += resultSearchTransction(stt, value.referenceId, value.nickName,value.actor, value.provider, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.plusMoneyLog);
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
                                    url: "<?php echo admin_url('report/reportupdatecardajax')?>",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        provider: $("#select_provider").val(),
                                        serial: $("#txtserial").val(),
                                        mathe: $("#txtmathe").val(),
                                        status: $("#select_status").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        pages: page,
                                        tranid : $("#magiaodich").val(),
                                        txtnickname: $("#txtnickname").val()

                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.trans, function (index, value) {
                                            result += resultSearchTransction(stt, value.referenceId, value.nickName,value.actor, value.provider, value.serial, value.pin, value.amount, value.status, value.message, value.code, value.plusMoneyLog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $("#spinner").hide();
                                        $('#logaction').html("");
										   $('#summoney').html("");
											$('#sumrecord').html("");
											$('#money1').html("");
											$('#money2').html("");
											$('#money3').html("");
											$('#money6').html("");
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
				   $('#summoney').html("");
                    $('#sumrecord').html("");
                    $('#money1').html("");
                    $('#money2').html("");
                    $('#money3').html("");
                    $('#money6').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
        })

    });

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
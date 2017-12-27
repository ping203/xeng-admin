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
            Thống kê vé free
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
                        <input type='text' value="<?php echo $this->input->post('toDate') ?>" class="form-control"
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
                        <input type='text' value="<?php echo $this->input->post('fromDate') ?>" class="form-control"
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
                    <label for="exampleInputEmail1">Id:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="txt_id" value="<?php echo $this->input->post('txt_id') ?>" name="txt_id">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nickname:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="nickname" value="<?php echo $this->input->post('nickname') ?>" name="nickname">
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Nguồn tạo</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_source" name="select_source" class="form-control">
                        <option value="-1">Chọn</option>
                        <option value="1" <?php if ($this->input->post('select_source') == 1) {
                            echo "selected";
                        } ?>>TopDay
                        </option>
                        <option value="2" <?php if ($this->input->post('select_source') == 2) {
                            echo "selected";
                        } ?>>TopWeek
                        </option>
                        <option value="3" <?php if ($this->input->post('select_source') == 3) {
                            echo "selected";
                        } ?>>TopMonth
                        </option>
                        <option value="4" <?php if ($this->input->post('select_source') == 4) {
                            echo "selected";
                        } ?>>TopYear
                        </option>
                        <option value="5" <?php if ($this->input->post('select_source') == 5) {
                            echo "selected";
                        } ?>>Code
                        </option>

                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Giá trị vé:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_gtve" name="select_gtve" class="form-control">
                        <option value="-1">Chọn</option>
                        <option value="10000" <?php if ($this->input->post('select_gtve') == "10000") {
                            echo "selected";
                        } ?>>10K
                        </option>
                        <option value="50000" <?php if ($this->input->post('select_gtve') == "50000") {
                            echo "selected";
                        } ?> >50K
                        </option>
                        <option value="100000" <?php if ($this->input->post('select_gtve') == "100000") {
                            echo "selected";
                        } ?> >100K
                        </option>
                        <option value="200000" <?php if ($this->input->post('select_gtve') == "200000") {
                            echo "selected";
                        } ?> >200K
                        </option>
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
                    <select id="select_tt" name="select_tt" class="form-control">
                        <option value="-1"<?php if ($this->input->post('select_tt') == "") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="0" <?php if ($this->input->post('select_tt') == "0") {
                            echo "selected";
                        } ?>>Chưa active
                        </option>
                        <option value="1" <?php if ($this->input->post('select_tt') == "1") {
                            echo "selected";
                        } ?>>Đã active
                        </option>
                        <option value="2" <?php if ($this->input->post('select_tt') == "2") {
                            echo "selected";
                        } ?>>Hết hiệu lực
                        </option>

                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Hiển thị:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="record" name="record" class="form-control">
                        <option value="50" <?php if ($this->input->post('record') == 20) {
                            echo "selected";
                        } ?> >50
                        </option>
                        <option value="100" <?php if ($this->input->post('record') == 50) {
                            echo "selected";
                        } ?>>100
                        </option>
                        <option value="200" <?php if ($this->input->post('record') == 100) {
                            echo "selected";
                        } ?>>200
                        </option>
                        <option value="500" <?php if ($this->input->post('record') == 200) {
                            echo "selected";
                        } ?>>500
                        </option>
                        <option value="1000" <?php if ($this->input->post('record') == 500) {
                            echo "selected";
                        } ?>>1000
                        </option>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tour Id:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="txt_tourid" value="<?php echo $this->input->post('txt_tourid') ?>" name="txt_tourid">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Loại Tour:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="typetour" name="typetour" class="form-control">
                        <option value="-1" <?php if ($this->input->post('typetour') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="1" <?php if ($this->input->post('typetour') == "1") {
                            echo "selected";
                        } ?>>Daily
                        </option>
                        <option value="2" <?php if ($this->input->post('typetour') == "2") {
                            echo "selected";
                        } ?>>Vip
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tình trạng:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_ttr" name="select_ttr" class="form-control">
                        <option value="-1" <?php if ($this->input->post('select_ttr') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="0" <?php if ($this->input->post('select_ttr') == "0") {
                            echo "selected";
                        } ?>>Chưa sử dụng
                        </option>
                        <option value="1" <?php if ($this->input->post('select_ttr') == "1") {
                            echo "selected";
                        } ?>>Đã sử dụng
                        </option>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Loại tài khoản:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_tk" name="select_tk" class="form-control">
                        <option value="-1" <?php if ($this->input->post('select_tk') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="0" <?php if ($this->input->post('select_tk') == "0") {
                            echo "selected";
                        } ?>>Tài khoản thường
                        </option>
                        <option value="1" <?php if ($this->input->post('select_tk') == "1") {
                            echo "selected";
                        } ?>>Tài khoản bot
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
                        <td>ID</td>
                        <td>Nickname</td>
                        <td>Vé</td>
                        <td>Tour type</td>
                        <td>Trạng thái</td>
                        <td>Create Time</td>
                        <td>Available Time</td>
                        <td>Limit Time</td>
                        <td>Create Type</td>
                        <td>Loại tài khoản</td>
                        <td>Addition Info</td>
                        <td>Tour ID</td>
                        <td>Use Time</td>
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
            format: 'YYYY-MM-DD 00:00:00'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD 23:59:59'
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
    function resultSearchTransction(id, nickname, ticket, typetour, status, createtime, availableTime, limitTime, createType, useTime, addInfo, isbot, tourid) {

        var rs = "";
        rs += "<tr>";

        rs += "<td>" + id + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(ticket) + "</td>";
        rs += "<td>" + typetour + "</td>";
        if(status == 0 ){
            rs += "<td>" + "Chưa sử dụng" + "</td>";
        }else if(status == 1){
            rs += "<td>" + "Đã sử dụng" + "</td>";
        }
        if(createtime != null ){
            rs += "<td>" + moment.unix(createtime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        if(availableTime != null ){
            rs += "<td>" + moment.unix(availableTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        if(limitTime != null ){
            rs += "<td>" + moment.unix(limitTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        rs += "<td>" + createType + "</td>";


        if(isbot == 0 ){
            rs += "<td>" + "Tài khoản thường" + "</td>";
        }else if(isbot == 1){
            rs += "<td>" + "Tài khoản bot" + "</td>";
        }
        rs += "<td>" + addInfo + "</td>";
        rs += "<td>" + tourid + "</td>";
        if(useTime != null ){
            rs += "<td>" + moment.unix(useTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
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
            url: "<?php echo admin_url('loggamebai/ticketfreeajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                id : $("#txt_id").val(),
                nickname:$("#nickname").val(),
                source: $("#select_source").val(),
                gtve: $("#select_gtve").val(),
                status: $("#select_tt").val(),
                record: $("#record").val(),
                tourid: $("#txt_tourid").val(),
                typetour: $("#typetour").val(),
                tinhtrang: $("#select_ttr").val(),
                taikhoan: $("#select_tk").val(),
                page : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.tickets == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    $.each(result.tickets, function (index, value) {
                        result += resultSearchTransction( value.id, value.nickname, value.ticket, value.tourType, value.used, value.createTime, value.availableTime, value.limitTime, value.createType, value.useTime, value.addInfo, value.isBot, value.tourId);

                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('loggamebai/ticketfreeajax')?>",
                                    data: {
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        id : $("#txt_id").val(),
                                        nickname:$("#nickname").val(),
                                        source: $("#select_source").val(),
                                        gtve: $("#select_gtve").val(),
                                        status: $("#select_tt").val(),
                                        record: $("#record").val(),
                                        tourid: $("#txt_tourid").val(),
                                        typetour: $("#typetour").val(),
                                        tinhtrang: $("#select_ttr").val(),
                                        taikhoan: $("#select_tk").val(),
                                        page : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        $.each(result.tickets, function (index, value) {
                                            result += resultSearchTransction( value.id, value.nickname, value.ticket, value.tourType, value.used, value.createTime, value.availableTime, value.limitTime, value.createType, value.useTime, value.addInfo, value.isBot, value.tourId);
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                      errorThongBao();
                                        $('#logaction').html("");
                                        $("#resultsearch").html("");

                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });

                }
            }, error: function () {
               errorThongBao();
                $('#logaction').html("");
                $("#resultsearch").html("");

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
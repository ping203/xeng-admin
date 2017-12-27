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
            Chi tiết code free poker tour
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>

    <div class="box-body">
        <form action="<?php echo admin_url('loggamebai/reportcodefree') ?>" method="post">
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
                    <label for="exampleInputEmail1">Code</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="txt_code" value="<?php echo $this->input->post('txt_code') ?>" name="txt_code">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Giá trị code:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="select_gtcode" name="select_gtcode" class="form-control">
                        <option value="-1">Chọn</option>
                        <option value="10000" <?php if ($this->input->post('select_gtcode') == "10000") {
                            echo "selected";
                        } ?>>10K
                        </option>
                        <option value="50000" <?php if ($this->input->post('select_gtcode') == "50000") {
                            echo "selected";
                        } ?> >50K
                        </option>
                        <option value="100000" <?php if ($this->input->post('select_gtcode') == "100000") {
                            echo "selected";
                        } ?> >100K
                        </option>
                        <option value="200000" <?php if ($this->input->post('select_gtcode') == "200000") {
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
                        } ?>>Block
                        </option>
                        <option value="3" <?php if ($this->input->post('select_tt') == "3") {
                            echo "selected";
                        } ?>>Đã sử dụng
                        </option>
                        <option value="4" <?php if ($this->input->post('select_tt') == "4") {
                            echo "selected";
                        } ?>>Hết hạn
                        </option>

                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Tìm theo:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="search_type" name="search_type" class="form-control">
                        <option value="0" <?php if ($this->input->post('search_type') == 0) {
                            echo "selected";
                        } ?> >Thời gian tạo
                        </option>
                        <option value="1" <?php if ($this->input->post('search_type') == 1) {
                            echo "selected";
                        } ?>>Thời gian sử dụng
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Lô Id:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="txt_loid" value="<?php echo $this->input->post('txt_loid') ?>" name="txt_loid">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Loại code:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="typecode" name="typecode" class="form-control">
                        <option value="-1" <?php if ($this->input->post('typecode') == "-1") {
                            echo "selected";
                        } ?>>Chọn
                        </option>
                        <option value="1" <?php if ($this->input->post('typecode') == "1") {
                            echo "selected";
                        } ?>>Daily
                        </option>
                        <option value="2" <?php if ($this->input->post('typecode') == "2") {
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
                    <label for="exampleInputEmail1">Thông tin thêm:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <input type="text" class="form-control"
                           id="txt_thongtin" value="<?php echo $this->input->post('txt_thongtin') ?>"
                           name="txt_thongtin">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="button" id="exportexel" value="Xuất Exel" class="btn btn-success">
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <input type="submit" id="search_tran" value="Tìm kiếm" class="btn btn-success">
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
                        <td style="width: 70px">ID</td>
                        <td style="width: 70px">Lô</td>
                        <td style="width: 170px">Code</td>
                        <td>Tên game</td>
                        <td>Loại code</td>
                        <td>Mệnh giá</td>
                        <td>Trạng thái</td>
                        <td style="width: 170px">Hạn sử dụng</td>
                        <td style="width: 170px">Ngày tạo</td>
                        <td>Nickname sử dụng</td>
                        <td>Thông tin thêm</td>
                        <td>Thời gian sử dụng</td>
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
    function resultSearchTransction(id, lo, code, gamename, typecode, amount, status, expire, createTime, nickname, addInfo, useTime) {

        var rs = "";
        rs += "<tr>";
        rs += "<td>" + id + "</td>";
        rs += "<td>" + lo + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + gamename + "</td>";
        if (typecode == 1) {
            rs += "<td>" + "Daily" + "</td>";
        } else if (typecode == 2) {
            rs += "<td>" + "Vip" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(amount) + "</td>";
        rs += "<td>" + checkStatus(status) + "</td>";

        if (expire != null) {
            rs += "<td>" + moment.unix(expire / 1000).format("DD-MM-YYYY HH:mm:ss") + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }
        if (createTime != null) {
            rs += "<td>" + moment.unix(createTime / 1000).format("DD-MM-YYYY HH:mm:ss") + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }
        if (nickname != null) {
            rs += "<td>" + nickname + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }
        if (addInfo != null) {
            rs += "<td>" + addInfo + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }
        if (useTime != null) {
            rs += "<td>" + moment.unix(useTime / 1000).format("DD-MM-YYYY HH:mm:ss") + "</td>";
        } else {
            rs += "<td>" + "" + "</td>";
        }
        rs += "</tr>";
        return rs;
    }

    function checkStatus(status) {
        var str = "";
        if (status == 0) {
            str = "Chưa active";
        } else if (status == 1) {
            str = "Đã active";
        } else if (status == 2) {
            str = "Block";
        } else if (status == 3) {
            str = "Đã sử dụng";
        } else if (status == 4) {
            str = "Hết hạn";
        }
        return str;
    }
    $(document).ready(function () {

        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('loggamebai/reportcodefreeajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                id: $("#txt_id").val(),
                nickname: $("#nickname").val(),
                code: $("#txt_code").val(),
                amount: $("#select_gtcode").val(),
                status: $("#select_tt").val(),
                search: $("#search_type").val(),
                loid: $("#txt_loid").val(),
                typecode: $("#typecode").val(),
                thongtin: $("#txt_thongtin").val()
            },

            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                if (res == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    $.each(res, function (index, value) {
                        result += resultSearchTransction(value.id, value.packageId, value.code, value.gamename, value.type, value.amount, value.status, value.expire, value.createTime, value.nickname, value.addInfo, value.useTime);

                    });
                    $('#logaction').html(result);
                    Pagging();
                }
            }, error: function () {

                $('#logaction').html("");
                $("#resultsearch").html("");
                errorThongBao();
            }, timeout: timeOutApi
        })
        function Pagging() {
            var items = $("#checkAll #logaction tr");
            var numItems = items.length;
            console.log(numItems);

            var perPage = 50;
            // only show the first 2 (or "first per_page") items initially
            items.slice(perPage).hide();
            // now setup pagination
            $("#pagination").pagination({
                items: numItems,
                itemsOnPage: perPage,
                cssStyle: "light-theme",
                onPageClick: function (pageNumber) { // this is where the magic happens
                    // someone changed page, lets hide/show trs appropriately
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;

                    items.hide() // first hide everything, then show for the new page
                        .slice(showFrom, showTo).show();
                }
            });
        }
    });


    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Report",
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
</script>
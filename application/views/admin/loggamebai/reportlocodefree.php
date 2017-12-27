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
            Chi tiết lô code free poker tour
        </h1>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-xs-12">
    <div class="box box-body">

    <label id="resultsearch" style="color: red;"></label>

    <div class="box-body">
        <form action="<?php echo admin_url('loggamebai/reportlocodefree') ?>" method="post">
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
                    <label for="exampleInputEmail1">Actor:</label>
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
                        <td>ID</td>
                        <td>Tên game</td>
                        <td>Loại code</td>
                        <td>Số lượng</td>
                        <td>Mệnh giá</td>
                        <td>Hạn sử dụng</td>
                        <td>Ngày tạo</td>
                        <td>Người tạo</td>
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
        function resultSearchTransction(id, gamename, type, quantity, amount, expire, createTime, creater) {

            var rs = "";
            rs += "<tr>";
            rs += "<td>" + id + "</td>";
            rs += "<td>" + gamename + "</td>";
            if(type == 1 ){
                rs += "<td>" + "Daily" + "</td>";
            }else if(type == 2){
                rs += "<td>" + "Vip" + "</td>";
            }
            rs += "<td>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td>" + commaSeparateNumber(amount) + "</td>";

            if(expire != null ){
                rs += "<td>" + moment.unix(expire/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
            }else{
                rs += "<td>" + "" + "</td>";
            }
            if(createTime != null ){
                rs += "<td>" + moment.unix(createTime/1000).format("DD-MM-YYYY HH:mm:ss")+ "</td>";
            }else{
                rs += "<td>" + "" + "</td>";
            }
            rs += "<td>" + creater + "</td>";
            rs += "</tr>";
            return rs;
        }
        $(document).ready(function () {
            var result = "";
            $('#pagination-demo').css("display", "block");
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('loggamebai/reportlocodefreeajax')?>",
                data: {
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    id : $("#txt_id").val(),
                    amount: $("#select_gtcode").val(),
                    nickname:$("#nickname").val(),
                    typecode: $("#typecode").val()

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
                            result += resultSearchTransction( value.id, value.gamename, value.type, value.quantity, value.amount, value.expire, value.createTime, value.creater);

                        });
                        $('#logaction').html(result);

                    }
                }, error: function () {

                    $('#logaction').html("");
                    $("#resultsearch").html("");
                   errorThongBao();
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
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
                Thống kê code free poker tour
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <form action="<?php echo admin_url('loggamebai/reportcodepokertour') ?>" method="post">
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
                                        <div class="col-md-1 col-sm-2 col-xs-12">

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
                                            <td>Mệnh giá</td>
                                            <td>Số lượng</td>
                                            <td>Chưa kích hoạt</td>
                                            <td>Đã dùng</td>
                                            <td>Đã khóa</td>
                                            <td>Hết hạn</td>
                                            <td>Còn lại</td>
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
        function resultSearchTransction(amount, total, totalInactive, totalUsed, totalLocked, totalExpired, totalRemain) {

            var rs = "";
            rs += "<tr>";
            rs += "<td>" + commaSeparateNumber(amount) + "</td>";
            rs += "<td>" + commaSeparateNumber(total) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalInactive) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalUsed) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalLocked) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalExpired) + "</td>";
            rs += "<td>" + commaSeparateNumber(totalRemain) + "</td>";
            rs += "</tr>";
            return rs;
        }

    function resultSum(total, totalInactive, totalUsed, totalLocked, totalExpired, totalRemain) {

        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + "Tổng" + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(total) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalInactive) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalUsed) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalLocked) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalExpired) + "</td>";
        rs += "<td style='color: #0000ff ;font-weight: 600'>" + commaSeparateNumber(totalRemain) + "</td>";
        rs += "</tr>";
        return rs;
    }
        $(document).ready(function () {
            var total1 = 0;
            var total2 = 0;
            var total3 = 0;
            var total4 = 0;
            var total5 = 0;
            var total6 = 0;
            var result = "";
            $('#pagination-demo').css("display", "block");
            $("#spinner").show();
            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('loggamebai/reportcodepokertourajax')?>",
                data: {
                    toDate: $("#toDate").val(),
                    fromDate: $("#fromDate").val(),
                    search : $("#search_type").val()
                },

                dataType: 'json',
                success: function (res) {
                    $("#spinner").hide();
                    if (res == "") {
                        $('#pagination-demo').css("display", "none");
                        $("#resultsearch").html("Không tìm thấy kết quả");
                    } else {
                        $("#resultsearch").html("");
                        if(res[10000]){
                            result += resultSearchTransction(res[10000].amount, res[10000].total,res[10000].totalInactive,res[10000].totalUsed, res[10000].totalLocked, res[10000].totalExpired,res[10000].totalRemain);
                            total1 +=  res[10000].total;total2 +=  res[10000].totalInactive;total3 +=  res[10000].totalUsed;total4 +=  res[10000].totalLocked;total5 +=  res[10000].totalExpired;total6 +=  res[10000].totalRemain;
                        }else{
                            result += resultSearchTransction(10000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;

                        }
                        if(res[50000]){
                            result += resultSearchTransction(res[50000].amount, res[50000].total,res[50000].totalInactive,res[50000].totalUsed, res[50000].totalLocked, res[50000].totalExpired,res[50000].totalRemain);
                            total1 +=  res[50000].total;total2 +=  res[50000].totalInactive;total3 +=  res[50000].totalUsed;total4 +=  res[50000].totalLocked;total5 +=  res[50000].totalExpired;total6 +=  res[50000].totalRemain;
                        }else{
                            result += resultSearchTransction(50000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;
                        }
                        if(res[100000]){
                            result += resultSearchTransction(res[100000].amount, res[100000].total,res[100000].totalInactive,res[100000].totalUsed, res[100000].totalLocked, res[100000].totalExpired,res[100000].totalRemain);
                            total1 +=  res[100000].total;total2 +=  res[100000].totalInactive;total3 +=  res[100000].totalUsed;total4 +=  res[100000].totalLocked;total5 +=  res[100000].totalExpired;total6 +=  res[100000].totalRemain;
                        }else{
                            result += resultSearchTransction(100000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;
                        }
                        if(res[200000]){
                            result += resultSearchTransction(res[200000].amount, res[200000].total,res[200000].totalInactive,res[200000].totalUsed, res[200000].totalLocked, res[200000].totalExpired,res[200000].totalRemain);
                            total1 +=  res[200000].total;total2 +=  res[200000].totalInactive;total3 +=  res[200000].totalUsed;total4 +=  res[200000].totalLocked;total5 +=  res[200000].totalExpired;total6 +=  res[200000].totalRemain;
                        }else{
                            result += resultSearchTransction(200000,0,0,0,0,0,0,0);
                            total1 += 0;total2 +=  0;total3 +=  0;total4 +=  0;total5 +=  0;total6 += 0;
                        }
                        result += resultSum(total1,total2,total3,total4,total5,total6);
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
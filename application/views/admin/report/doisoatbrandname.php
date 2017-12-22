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
                Đối soát Brandname

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
                                    <table id="checkAll" class="table table-bordered">
                                        <tbody id="reportbrandname">
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
<style>
    td {
        word-break: break-all;
    }

    thead {
        font-size: 12px;
    }

    .moneysystem {
        font-weight: 600;

        color: #000000;
    }

    .tdmoney {

        text-align: right;
    }
    .tdmoneybold {
        font-weight: 600;
        text-align: right;
    }
</style>
<script>
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });


    $(document).ready(function () {
        $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
    });

    $("#search_tran").click(function () {
        var result = "";
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/doisoatbrandnameajax')?>",
            data: {

                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()

            },

            dataType: 'json',
            success: function (result1) {
				$("#resultsearch").html("");
                console.log(result1.providers[0]);
                $("#spinner").hide();

                result += "<tr>";
                result += '<td class="moneysystem">'+"Nội dung"+'</td>';
                result += '<td class="moneysystem">'+"Số lượng"+'</td>';
                result += '<td class="moneysystem">'+"Đơn giá"+'</td>';
                result += '<td class="moneysystem">'+"Số tiền"+'</td>';
                result += "</tr>";
                result += resultbrandname("Mạng Viettel",result1.providers[0].sms,result1.providers[0].price,result1.providers[0].money);
                result += resultbrandname("Mạng Vinaphone",result1.providers[1].sms,result1.providers[1].price,result1.providers[1].money);
                result += resultbrandname("Mạng Mobifone",result1.providers[2].sms,result1.providers[2].price,result1.providers[2].money);
                result += resultbrandname("Mạng Khác",result1.providers[5].sms,result1.providers[5].price,result1.providers[5].money);
                result += resultbrandnamesum(result1.totalSms,result1.totalMoney);
                $('#reportbrandname').html(result);

            }, error: function () {
            $('#reportbrandname').html("");
           errorThongBao();
        }, timeout: timeOutApi
        })
    });
    function resultbrandname(provider,sms,price,money) {
        var rs = "";
        rs += "<tr>";
        rs += "<td >"+ provider +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(sms) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(price) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(money) +"</td>";
        rs += "</tr>";

        return rs;
    }
    function resultbrandnamesum(sms,money) {
        var rs = "";
        rs += "<tr>";
        rs += "<td class='moneysystem'>"+ "Tổng cộng (đã bao gồm 10% VAT)" +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(sms) +"</td>";
        rs += "<td class='tdmoney'>"+ "" +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(money) +"</td>";
        rs += "</tr>";

        return rs;
    }

</script>


<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>
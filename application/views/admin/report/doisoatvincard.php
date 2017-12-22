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
                Đối soát nạp vin qua vincard
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
                                        <tbody id="reportvt">
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
        font-weight: 500;
        font-size: 16px;
        color: #000000;
    }

    .tdmoney {
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
	})
   $("#search_tran").click(function () {
        var result = "";
        var total1 = 0;
        var total2 = 0;
        var total3 = 0;

        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/doisoatvincardajax')?>",
            data: {

                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()

            },

            dataType: 'json',
            success: function (result1) {
				$("#resultsearch").html("");
                console.log(result1.moneyReponse[0].trans);
                $("#spinner").hide();
                var i = 2;
                $.each(result1.moneyReponse[0].trans, function (index, value) {
                    i++;
                });
                result += "<tr>";
                result += "<td colspan='1'></td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Mệnhgiá" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Số lượng" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tiền nạp" + "</td>";

                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tỉ lệ" + "</td>";
                result += "<td style='color: #000000;font-size: 20px;text-align: right;font-weight: 600'>" + "Tiền thực thu" + "</td>";
                result += "</tr>";
                result += "<tr>";
                result += "<td rowspan='"+ i +"' style='vertical-align: middle;color:#0000ff;text-align: center;background: #e8e2e2;font-weight: 700; font-size: 20px'>" + "Vincard" + "</td>";
                result += "</tr>";
                for (var j = result1.moneyReponse[0].trans.length - 1; j >= 0; j--) {
                    if (result1.moneyReponse[0].trans[j].quantity > 0) {
                        result += resultvincard(result1.moneyReponse[0].trans[j].faceValue, result1.moneyReponse[0].trans[j].quantity, result1.moneyReponse[0].trans[j].moneyTotal);
                        total1 += result1.moneyReponse[0].trans[j].quantity;
                        total2 += result1.moneyReponse[0].trans[j].moneyTotal;
                        total3 += result1.moneyReponse[0].trans[j].moneyTotal;
                    }
                }
                result += sumresultvincard(total1,total2,total3);
                $('#reportvt').html(result);

            }, error: function () {
            $('#reportvt').html("");
           errorThongBao();
        }, timeout: timeOutApi
        })
    });

    $("#exportexel").click(function () {
        $("#checkAll").table2excel({
            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "Reportvincard",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });


    function resultvincard(provider, quantity, money) {
        var rs = "";
        rs += "<tr>";

            rs += "<td  class='tdmoney'>" + commaSeparateNumber(provider) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(quantity) + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(money) + "</td>";
            rs += "<td class='tdmoney'>" + 100+"%" + "</td>";
            rs += "<td class='tdmoney'>" + commaSeparateNumber(Math.round(money)) + "</td>";

        rs += "</tr>";

        return rs;
    }

    function sumresultvincard(quantity, money,moneybonus) {
        var rs = "";
        rs += "<tr class='moneysystem'>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right'>" + "Tổng" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money1'>" + commaSeparateNumber(quantity) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + commaSeparateNumber(money) + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money2'>" + 100+"%" + "</td>";
        rs += "<td style='color: #ba9406;font-size: 20px;font-weight:700;text-align: right' id='money3'>"+ commaSeparateNumber(Math.round(moneybonus)) +"</td>";
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
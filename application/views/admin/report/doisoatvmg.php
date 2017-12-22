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
                Đối soát VMG
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
                                        <tbody id="reportvmg">
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
            url: "<?php echo admin_url('report/doisoatvmgajax')?>",
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
                result += '<td  class="moneysystem">'+"Đầu số"+'</td>';
                result += '<td class="moneysystem">'+"Nhà cung cấp"+'</td>';
                result += "<td class='moneysystem' >"+'Yêu cầu (MO)'+"</td>";
                result += "<td class='moneysystem' >"+'Phản hồi (MT)'+"</td>";
                result += "<td class='moneysystem' >"+'Tính cước(CDR)'+"</td>";
                result += "</tr>";
                result += resultvmg("Viettel", result1.providers[0].mo,result1.providers[0].mt,result1.providers[0].sms);
                result += resultvmg("Vinaphone", result1.providers[1].mo,result1.providers[1].mt,result1.providers[1].sms);
                result += resultvmg("Mobilefone", result1.providers[2].mo,result1.providers[2].mt,result1.providers[2].sms);
                result += resultvmg("Vietnam mobile", result1.providers[3].mo,result1.providers[3].mt,result1.providers[3].sms);
                result += resultvmg("Gtel", result1.providers[4].mo,result1.providers[4].mt,result1.providers[4].sms);
                result += resultvmg("Khác", result1.providers[5].mo,result1.providers[5].mt,result1.providers[5].sms);
                result += resultvmgsum(result1.totalMo,result1.totalMt,result1.totalSms);

                $('#reportvmg').html(result);

            }, error: function () {
            $('#reportvmg').html("");
           errorThongBao();
        }, timeout: timeOutApi
        })
    });


    function resultvmg(provider,mo,mt,sms) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>"+ "8079" +"</td>";
        rs += "<td>"+ provider +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(mo) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(mt) +"</td>";
        rs += "<td class='tdmoney'>"+ commaSeparateNumber(sms) +"</td>";
        rs += "</tr>";

        return rs;
    }

    function resultvmgsum(mo,mt, sms) {
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='2' class='moneysystem'>"+ "Tổng" +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(mo) +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(mt) +"</td>";
        rs += "<td class='tdmoneybold'>"+ commaSeparateNumber(sms) +"</td>";
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
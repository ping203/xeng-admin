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
                Tiền nạp game (VND)
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">
                        <label id="resultsearch" style="color: red;"></label>
                        <form action="<?php echo admin_url('marketing/rechargevnd') ?>" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <label for="exampleInputEmail1">Từ ngày:</label>
                                        </div>
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' value="<?php echo $start_time ?>"
                                                       class="form-control"
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
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
                                                   class="btn btn-success">
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </form>

                        <div class="box-body  table-responsive no-padding">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>Nạp qua IAP</td>
                                            <td>Nạp qua thẻ</td>
                                            <td>Nạp qua Vincard</td>
                                            <td>Nạp qua ngân hàng</td>
                                            <td>Nạp qua SMS</td>
                                            <td>Nạp qua Megacard</td>
                                            <td>Nạp từ VTC</td>
                                            <td>Tổng tiền</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logrecharge">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="spinner" class="spinner" style="display:none;">
                                <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>"
                                     alt="Loading"/>
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
            format: 'DD-MM-YYYY'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'DD-MM-YYYY'
        });

    });
    $("#search_tran").click(function () {

    });

    function resulttotalrecharge(rechargeiap, rechargecard, rechargevincard, rechargebank, rechargesms, recharemega, rechargevtc, total) {
        var rs = "";
        rs += "<tr>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargeiap) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargecard) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargevincard) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargebank) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargesms) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(recharemega) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(rechargevtc) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(total) + "</td>";

        rs += "</tr>";
        return rs;
    }

    $(document).ready(function () {
        var result10 = "";
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/rechargevndajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()
            },

            dataType: 'json',
            success: function (res) {
                $("#spinner").hide();
                var total1 = 0;
                var total2 = 0;
                var total3 = 0;
                var total4 = 0;
                var total5 = 0;
                var total6 = 0;
                var total7 = 0;
                var total = 0;
                if ($.isEmptyObject(res.vinInUser)) {
                    result10 = resulttotalrecharge(0, 0, 0, 0, 0, 0, 0, 0);
                    $('#logrecharge').html(result10);
                } else {
                    $("#resultsearch").html("");
                    if (res.vinInUser.RechargeByCard != null || res.vinInUser.RechargeByCard != null) {
                        total1 = res.vinInUser.RechargeByCard;
                    }
                    if (res.vinInUser.RechargeByIAP != null || res.vinInUser.RechargeByIAP != null) {
                        total2 = Math.round(res.vinInUser.RechargeByIAP * (22000 / 15));
                    }
                    if (res.vinInUser.RechargeBySMS != null || res.vinInUser.RechargeBySMS != null) {
                        total3 = res.vinInUser.RechargeBySMS * 2;
                    }
                    if (res.vinInUser.RechargeByBank != null || res.vinInUser.RechargeByBank != null) {

                        total4 = Math.round(res.vinInUser.RechargeByBank / 1.1);
                    }


                    if (res.vinInUser.RechargeByVinCard != null || res.vinInUser.RechargeByVinCard != null) {
                        total5 = Math.round(res.vinInUser.RechargeByVinCard / 1.05);
                    }
                    if (res.vinInUser.RechargeByMegaCard != null || res.vinInUser.RechargeByMegaCard != null) {

                        total6 = (res.vinInUser.RechargeByMegaCard / 1.05);
                    }
                    if (res.vinInUser.TopupVTCPay != null || res.vinInUser.TopupVTCPay != null) {
                        total7 = (res.vinInUser.TopupVTCPay);
                    }
                }
                total = total1 + total2 + total3 + total4 + total5 + total6 + total7;
                result10 = resulttotalrecharge(total2, total1, total5, total4, total3, total6, total7, total);
                $('#logrecharge').html(result10);

            }, error: function () {
                $("#spinner").hide();
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: 40000

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
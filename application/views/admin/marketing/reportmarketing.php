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
                Chỉ số marketing
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>

                        <div class="box-body">
                            <form action="<?php echo admin_url('marketing/reportmarketing') ?>" method="post">
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
                                        <div class="col-md-1 col-sm-2 col-xs-12">
                                            <input type="submit" id="search_tran" value="Tìm kiếm"
                                                   class="btn btn-success">
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
                                            <th>User đăng ký</th>
                                            <th>User nạp thẻ</th>
                                            <th>User đăng ký bảo mật</th>
                                            <th>User vừa nạp thẻ vừa đăng ký bảo mật</th>
                                        </tr>
                                        </thead>
                                        <tbody id="reportvt">

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

<style>
    .tdmoney {
        color: #0000ff;
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
        var result = "";
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/reportmarketingajax')?>",
            data: {

                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()

            },

            dataType: 'json',
            success: function (result1) {
                $("#spinner").hide();
                result += resultmarketing(result1.register, result1.recharge, result1.secMobile, result1.both);
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
            filename: "Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });


    function resultmarketing(register, recharge, mobile, both) {
        var rs = "";
        rs += "<tr>";
        rs += "<td  class='tdmoney'>" + commaSeparateNumber(register) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(recharge) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(mobile) + "</td>";
        rs += "<td class='tdmoney'>" + commaSeparateNumber(both) + "</td>";
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
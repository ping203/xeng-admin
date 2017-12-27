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
                Biểu đồ tổng số <?php echo $namegame ?> đại lý
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
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="submit" id="search_tran" value="Tìm kiếm" class="btn btn-success">
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="box-body">
                            <?php $this->load->view('admin/message', $this->data); ?>
                            <?php $this->load->view('admin/error', $this->data); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="chartContainer" style="min-width: 310px; height: 400px; margin: 0 auto">
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
    $(document).ready(function () {
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('report/chartmoneytotalajax')?>",
            data: {
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                pages : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.totals == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                }else {
                    var Agent1 = [];
                    var Agent2 = [];
                    var Time = [];
                    $.each(result.totals, function (index, value) {
                        Agent1.push(value.moneyAgent1);
                        Agent2.push(value.moneyAgent2);
                        Time.push(value.timeLog);
                    });
                    chart(Agent1,Agent2,Time);
                }
            }, error: function () {
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

    function chart (agent1,agent2,date) {
        Highcharts.chart('chartContainer', {
            title: {
                text: 'Biểu đồ luồng tiền',
                x: -20 //center
            },
            xAxis: {
                categories: date,
            },
            yAxis: {
                title: {
                    text: 'Tổng tiền'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]

            },
            chart: {
                zoomType: 'x'

            },
            tooltip: {
                valueSuffix: ' <?php echo $namegame ?>'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Đại lý cấp 1',
                data: agent1
            }, {
                name: 'Đại lý cấp 2',
                data: agent2,
				 visible: false
            }]
        });

    }
</script>
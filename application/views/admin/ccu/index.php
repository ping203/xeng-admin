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
                CCU
            </h1>
            <ol class="breadcrumb">
                <label class="">Tổng: <span id="sumccu" style="color: #0000ff"></span></label>
            </ol>
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
                                            <input type='text' value="" class="form-control"
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
                                            <input type='text' value="" class="form-control"
                                                   id="fromDate" name="fromDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
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
                                    <table>
                                        <div id="container"
                                             style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
});
$(document).ready(function () {
    $("#toDate").val(moment().subtract('minutes', 15).format('YYYY-MM-DD HH:mm:ss'));
    $("#fromDate").val(moment().format('YYYY-MM-DD HH:mm:ss'));
    window.setTimeout(function () {
        document.location.reload(true);
    }, 30000);
    //load ccu hien tai
    getCcu();
});
$("#search_tran").click(function () {
    getCcu();
});
$(function () {
    $('#toDate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss'
    });
    $('#fromDate').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss '
    });

});

function getCcu() {
    var result = "";
    var newlabels = [];
    var ccu = [];
    var Web = [];
    var Android = [];
    var Ios = [];
    var Winphone = [];
    var Facebook = [];
    var Destkop = [];
    var Other = [];

    $.ajax({
        type: "POST",
        url: "<?php echo admin_url('ccu/indexajax')?>",
        data: {
            toDate: $("#toDate").val(),
            fromDate: $("#fromDate").val()
        },
        dataType: 'json',
        success: function (data) {
            var count = 0;
            $.each(data.transactions, function (i, item) {
                newlabels.push(item.ts);
                ccu.push(item.ccu);
                Web.push(item.web);
                Android.push(item.ad);
                Ios.push(item.ios);
                Winphone.push(item.wp);
                Facebook.push(item.fb);
                Destkop.push(item.dt);
                Other.push(item.ot);
                count++;

            });

            result += resultccu(Web[count - 1], Android[count - 1], Ios[count - 1], Winphone[count - 1], Facebook[count - 1], Destkop[count - 1], Other[count - 1]);
            $('#logccu').html(result);
            $('#sumccu').html(ccu[count - 1]);
            $(function () {
                $('#container').highcharts({
                    title: {
                        text: 'Tổng CCU',
                        x: -20 //center
                    },
                    subtitle: {
                        text: '',
                        x: -20
                    },
                    chart: {
                        zoomType: 'x'
                    },
                    rangeSelector: {
                        selected: 1
                    },
                    xAxis: {
                        categories: newlabels
                    },

                    yAxis: {
                        title: {
                            text: 'ccu'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        },

                        ]
                    },
                    tooltip: {
                        valueSuffix: ''
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                    },
                    series: [{
                        name: 'CCU',
                        data: ccu
                    }]
                });
            });


            chart(Web, Android, Ios, Winphone, Facebook, Destkop, Other, newlabels);
        }
    });
}

function chart(web, android, ios, winphone, facebook, destkop, other, date) {
    Highcharts.chart('chartcontainer', {
        title: {
            text: 'CCU từng thiết bị',
            x: -20 //center
        },
        xAxis: {
            categories: date,
        },
        yAxis: {
            title: {
                text: 'Tổng User'
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
            valueSuffix: 'User'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Web',
            data: web
        }, {
            name: 'Android',
            data: android

        }, {
            name: 'IOS',
            data: ios

        },
            {
                name: 'Winphone',
                data: winphone,
                visible: false

            },
            {
                name: 'App Facebook',
                data: facebook,
                visible: false

            },
            {
                name: 'Destkop',
                data: destkop,
                visible: false

            },
            {
                name: 'Other',
                data: other,
                visible: false

            }]
    });

}
function resultccu(web, android, ios, winphone, facebook, destkop, other) {
    var rs = "";
    rs += "<tr>";
    rs += "<td style='color: #0000ff'>" + web + "</td>";
    rs += "<td style='color: #0000ff'>" + android + "</td>";
    rs += "<td style='color: #0000ff'>" + ios + "</td>";
    rs += "<td style='color: #0000ff'>" + winphone + "</td>";
    rs += "<td style='color: #0000ff'>" + facebook + "</td>";
    rs += "<td style='color: #0000ff'>" + destkop + "</td>";
    rs += "<td style='color: #0000ff'>" + other + "</td>";
    rs += "</tr>";
    return rs;
}
</script>



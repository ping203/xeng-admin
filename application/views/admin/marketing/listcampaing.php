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
            Danh sách campaign
        </h1>
        <ol class="breadcrumb">
            <h6>Tổng NRU:<span id="nru" style="color: red"></span> </h6>
            <h6>Tổng PU:<span id = "pu" style="color: red"></span> </h6>
            <h6>Tổng doanh thu:<span id="doanhthu" style="color: red"></span> </h6>
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
            </div>

        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Campaign:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="utmcampaign" name="utmcampaign"  class="form-control"
                            value="<?php echo $this->input->get('utmcampaign') ?>">
                        <option value="">All</option>
                        <?php foreach ($utm_campain as $row): ?>
                            <option
                                value="<?php echo $row->name ?>"><?php echo $row->display?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Source:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="utmsource" name="utmsource"   class="form-control"
                            value="<?php echo $this->input->get('utmsource') ?>">
                        <option value="">All</option>
                        <?php foreach ($utm_source as $row): ?>
                            <option
                                value="<?php echo $row->name ?>"><?php echo $row->display ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Medium:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="utmmedium" name="utmmedium"  class="form-control"
                            value="<?php echo $this->input->get('utmmedium') ?>">
                        <option value="">All</option>
                        <?php foreach ($utm_medium as $row): ?>
                            <option
                                value="<?php echo $row->name ?>"><?php echo $row->display ?></option>
                        <?php endforeach; ?>
                    </select>
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
                <table id="example2" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>Campain</td>
                        <td>Medium</td>
                        <td>Source</td>
                        <td style="width:100px;">NRU</td>
                        <td>PU</td>
                        <td>Doanh thu</td>
                        <td>Thời gian</td>
                    </tr>
                    </thead>
                    <tbody id="logaction">

                    </tbody>
                    <tbody><tr id="totalmar">
                        <td colspan="4">Tổng:</td>

                        <td class="rowDataSd" id="totalnru" style="color: red"></td>
                        <td class="rowDataSd" id="totalpu" style="color:red "></td>
                        <td class="rowDataSd" id="totaldt" style="color: red"></td>
                    </tr>

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
            format: 'YYYY-MM-DD'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD'
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

    function resultSearchTransction(stt, campain, medium, source, nru, pu, doanhthu,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + campain + "</td>";
        rs += "<td>" + medium + "</td>";
        rs += "<td>" + source + "</td>";
        rs += "<td class='rowDataSd1'>" + nru + "</td>";
        rs += "<td class='rowDataSd2'>" + pu + "</td>";
        rs += "<td class='rowDataSd3'>" + doanhthu + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('marketing/listcampaingajax')?>",
            // url: "http://192.168.0.251:8082/api_backend",
            data: {
                utm_campaign: $("#utmcampaign").val(),
                utm_medium: $("#utmmedium").val(),
                utm_source: $("#utmsource").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $('#logaction').html("");
                    $("#totalnru").text("");
                    $("#nru").text("");
                    $("#totalpu").text("");
                    $("#pu").text("");
                    $("#totaldt").text("");
                    $("#doanhthu").text("");
                    $("#resultsearch").html("Không tìm thấy kết quả");
                }else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.campaign, value.medium, value.source, value.NRU, commaSeparateNumber(value.PU), commaSeparateNumber(value.doanhthu),value.dateStr);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var total=0;
                    var total1=0;
                    var total2=0;
                    $(".rowDataSd1" ).each(function( index ) {
                        total +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalnru").text(commaSeparateNumber(total));
                        $("#nru").text(commaSeparateNumber(total));
                    });
                    $(".rowDataSd2" ).each(function( index ) {
                        total1 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totalpu").text(commaSeparateNumber(total1));
                        $("#pu").text(commaSeparateNumber(total1));
                    });
                    $(".rowDataSd3" ).each(function( index ) {
                        total2 +=parseInt($(this).text().replace(',','').replace(',','').replace(',','').replace(',','').replace(',','').replace(',',''));
                        $("#totaldt").text(commaSeparateNumber(total2));
                        $("#doanhthu").text(commaSeparateNumber(total2));
                    });
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
</script>

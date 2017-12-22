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
                Top doanh số liên minh
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
                                        <label for="exampleInputEmail1">Tháng:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' value="" class="form-control"
                                                   id="fromDate" name="fromDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
                                        <input type="hidden" id="startDate">
                                        <input type="hidden" id="endDate">
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
                                    <table id="checkAll" class="table  table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>TOP</td>
                                            <td>Tên đại lý</td>
                                            <td>Nickname</td>
                                            <td>Doanh số</td>
                                            <td>Thưởng doanh số(Vin)</td>
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
            format: 'MM/YYYY'
        });
    });
    function resultSearchTransction(top, username, nickname, doanso, bonus) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + top + "</td>";
        rs += "<td>" + username + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(doanso) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonus) + "</td>";
        rs += "</tr>";
        return rs;
    }

    $(document).ready(function () {

        $("#spinner").show();
        $("#fromDate").val(getFirtDayOfMonth());
        var queryDate = $("#fromDate").val();
        var dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1], dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1], dateParts[0]));
        topDoanhSoAdmin();
    });
    $("#search_tran").click(function () {
        var queryDate = $("#fromDate").val();
        var dateParts = queryDate.match(/(\d+)/g);
        $("#startDate").val(FirstDayOfMonth(dateParts[1], dateParts[0]));
        $("#endDate").val(LastDayOfMonth(dateParts[1], dateParts[0]));
        topDoanhSoAdmin();
    });

    function topDoanhSoAdmin() {
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/topdoanhsoajax')?>",
            data: {
                timestart: $("#startDate").val(),
                timeend: $("#endDate").val(),
                month: $("#fromDate").val()
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $("#resultsearch").html("Không tìm thấy kết quả");
                } else {
                    $("#resultsearch").html("");
                    var stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.agentName, value.nickName, value.total, value.bonusMore);
                        stt++;

                    });
                    $('#logaction').html(result);
                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            }, timeout: timeOutApi
        })

    }
    ;

</script>
<script>
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }


    function getFirtDayOfMonth() {
        var date = new Date();
        var thangtruoc = '';
        var ngaytruoc = '';
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        if (firstDay.getMonth() < 10) {
            thangtruoc = "0" + (firstDay.getMonth() + 1);
        }
        else {
            thangtruoc = firstDay.getMonth() + 1;
        }
        if (firstDay.getDate() < 10) {
            ngaytruoc = "0" + firstDay.getDate();
        }
        else {
            ngaytruoc = firstDay.getDate();
        }
        $("#startDate").val(firstDay.getFullYear() + '-' + (thangtruoc) + '-' + (ngaytruoc) + " " + "00:00:00")
        return thangtruoc + '/' + firstDay.getFullYear();
    }

    function getLastDayOfMonth() {
        var date = new Date();
        var thangsau = '';
        var ngaysau = '';
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        if (lastDay.getMonth() < 10) {
            thangsau = "0" + (lastDay.getMonth() + 1);
        }
        else {
            thangsau = lastDay.getMonth() + 1;
        }
        if (lastDay.getDate() < 10) {
            ngaysau = "0" + lastDay.getDate();
        }
        else {
            ngaysau = lastDay.getDate();
        }
        $("#endDate").val(lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59")
        return lastDay.getFullYear() + '-' + (thangsau) + '-' + (ngaysau) + " " + "23:59:59";
    }
    function LastDayOfMonth(Year, Month) {
        var nowDate = new Date((new Date(Year, Month, 1)) - 1);
        return formatLastDate(nowDate);
    }
    function formatLastDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate() + " 23:59:59",
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 11) day = '0' + day;

        return [year, month, day].join('-');
    }
    function FirstDayOfMonth(Year, Month) {
        var nowDate = new Date(Year, Month - 1, 1);
        return formatFirstDate(nowDate);
    }
    function formatFirstDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate() + " 00:00:00",
            year = d.getFullYear();

        if (month.length < 2) month = '0' + month;
        if (day.length < 11) day = '0' + day;
        return [year, month, day].join('-');
    }
</script>
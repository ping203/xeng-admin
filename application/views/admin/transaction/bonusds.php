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
                Thưởng doanh số
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
                                        <label for="exampleInputEmail1">Nickname:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control" id="filter_iname"
                                               value="<?php echo $this->input->post('name') ?>" name="name">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Tháng:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">

                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text'  class="form-control"
                                                   id="toDate" name="toDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                        </div>
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
                                            <td>Nickname</td>
                                            <td>Top</td>
                                            <td>Doanh số</td>
                                            <td>Thưởng cố định</td>
                                            <td>Thưởng DS</td>
                                            <td>Top C2</td>
                                            <td>Doanh số C2</td>
                                            <td>Thưởng cố định C2</td>
                                            <td>Thưởng DS C2</td>

                                            <td>Tổng</td>
                                            <td>Tháng</td>
                                            <td>Code</td>
                                            <td>Mô tả</td>
                                            <td>Thời gian</td>
                                        </tr>
                                        </thead>
                                        <tbody id="logaction">

                                        </tbody>
                                        <tbody id="logactionsum">

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
        var startdate = moment().subtract(-30, "days").format("DD-MM-YYYY");
        console.log(startdate);
    });
    $("#search_tran").click(function () {
        var total1=0;
        var total2=0;
        var total3=0;
        var total4=0;
        var total5=0;
        var total6=0;
        var total7=0;
        var total8=0;
        var total9=0;
        $("#spinner").show();
        var res = "";
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/bonusdsajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if(result.length == 0){
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                }else{
                    $("#resultsearch").html("");
                    $.each(result, function (index, value) {
                        res += resultSearchTransction(value.top, value.nickname, value.ds, value.bonusFix, value.bonusMore, value.bonusVinCash,value.bonusVinplayCard, value.bonusTotal, value.month, value.code,value.description,value.timeLog,value.percent,value.ds2,value.top2,value.bonusFix2,value.bonusMore2);
                        total1 += value.ds;
                        total2 += value.ds2;
                        total3 += value.bonusFix;
                        total4 += value.bonusFix2;
                        total5 += value.bonusMore;
                        total6 += value.bonusMore2;
                        total7 += value.bonusVinCash;
                        total8 += value.bonusVinplayCard;
                        total9 += value.bonusTotal;
                    });

                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,total2,total3,total4,total5,total6,total7,total8,total9));
                    //console.log(resultSumTransaction(total1,total2,total3,total4,total5,total6,total7,total8,total9));

                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $('#logactionsum').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
        })
    });

    $(document).ready(function () {
        var total1=0;
        var total2=0;
        var total3=0;
        var total4=0;
        var total5=0;
        var total6=0;
        var total7=0;
        var total8=0;
        var total9=0;
        $("#toDate").val( moment().subtract('month', 1).format('MM/YYYY'));
        $("#spinner").show();
        var res = ""
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('transaction/bonusdsajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                month: $("#toDate").val()
            },

            dataType: 'json',
            success: function (result) {

                $("#spinner").hide();
                if(result.length == 0){
                    $("#resultsearch").html("Không tìm thấy kết quả");
                    $('#logaction').html("");
                    $('#logactionsum').html("");
                }else{
                    $("#resultsearch").html("");
                    $.each(result, function (index, value) {
                        res += resultSearchTransction(value.top, value.nickname, value.ds, value.bonusFix, value.bonusMore,value.bonusVinCash,value.bonusVinplayCard, value.bonusTotal, value.month, value.code,value.description,value.timeLog,value.percent,value.ds2,value.top2,value.bonusFix2,value.bonusMore2);
                        total1 += value.ds;
                        total2 += value.ds2;
                        total3 += value.bonusFix;
                        total4 += value.bonusFix2;
                        total5 += value.bonusMore;
                        total6 += value.bonusMore2;
                        total7 += value.bonusVinCash;
                        total8 += value.bonusVinplayCard;
                        total9 += value.bonusTotal;
                    });
                    $('#logaction').html(res);
                    $('#logactionsum').html(resultSumTransaction(total1,total2,total3,total4,total5,total6,total7,total8,total9));

                }
            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $('#logactionsum').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
        })
    });

    function resultSearchTransction(top,nickname, doanhso, bonusfix, bonusmore,bonusvin,bonusvincard, bonustotal, month,code,description,datetime,percent,ds2,top2,bonusfix2,bonusmore2) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + top + "</td>";
        rs += "<td>" + commaSeparateNumber(doanhso) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusfix) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusmore) + "</td>";
        rs += "<td>" + top2 + "</td>";
        rs += "<td>" + commaSeparateNumber(ds2) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusfix2) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonusmore2) + "</td>";
        rs += "<td>" + commaSeparateNumber(bonustotal) + "</td>";
        rs += "<td>" + month + "</td>";
        rs += "<td>" + code + "</td>";
        rs += "<td>" + description + "</td>";
        rs += "<td>" + datetime + "</td>";
        rs += "</tr>";
        return rs;
    }

    function resultSumTransaction(doanhso,ds2,bonusfix,bonusfix2,bonusmore,bonusmore2,bonusvin,bonusvincard,bonustotal){
        var rs = "";
        rs += "<tr>";
        rs += "<td colspan='2' style='color: #0000ff'>" + "Tổng" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(doanhso) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusfix) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusmore) + "</td>";
        rs += "<td>" + "" + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(ds2) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusfix2) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonusmore2) + "</td>";
        rs += "<td style='color: #0000ff'>" + commaSeparateNumber(bonustotal) + "</td>";
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
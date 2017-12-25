<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Lịch sử chi tiết phiên bầu cua
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-body">

                    <label id="resultsearch" style="color: red;"></label>
                    <input type="hidden" id="phienbc" value="<?php echo $rid ?>">

                    <div class="box-body  table-responsive no-padding">
                        <?php $this->load->view('admin/message', $this->data); ?>
                        <?php $this->load->view('admin/error', $this->data); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="checkAll" class="table  table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td>Phiên</td>
                                        <td>Nick name</td>
                                        <td>Phòng</td>
                                        <td>Tiền đặt bầu</td>
                                        <td>Tiền đặt cua</td>
                                        <td>Tiền đặt tôm</td>
                                        <td>Tiền đặt cá</td>
                                        <td>Tiền đặt gà</td>
                                        <td>Tiền đặt hưou</td>
                                        <td>Tiền</td>
                                        <td>Ngày tạo</td>
                                    </tr>
                                    </thead>
                                    <tbody id="logaction">

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

</div>

<script>
    $("#toDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#fromDate").datepicker({dateFormat: 'yy-mm-dd'});
    $("#search_tran").click(function () {
        var from = $("#fromDate").datepicker('getDate');
        var to = $("#toDate").datepicker('getDate');
        if (to > from) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }
    });
    function resultlogbaucua(referid, nickname, room, bet_bau, bet_cua, bet_tom, bet_ca, bet_ga, bet_huou, money_type, time_log) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + referid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + commaSeparateNumber(room) + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_bau) + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_cua) + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_tom) + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_ca) + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_ga) + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_huou) + "</td>";
        if (money_type == 0) {
            rs += "<td>" + "xu" + "</td>";
        } else if (money_type == 1) {
            rs += "<td>" + "vin" + "</td>";
        }
        rs += "<td>" + time_log + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
        var result = "";
        var oldpage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/detailbaucuaajax')?>",
            data: {
                phienbc: $("#phienbc").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalPage = result.total;
                var countrow = result.totalRecord;
                $("#num").html(countrow);
                $.each(result.transactions, function (index, value) {
                    result += resultlogbaucua(value.referent_id, value.user_name, value.room, value.bet_bau, value.bet_cua, value.bet_tom, value.bet_ca, value.bet_ga, value.bet_huou, value.money_type, value.time_log)
                });
                $('#logaction').html(result);
                $('#pagination-demo').twbsPagination({
                    totalPages: totalPage,
                    visiblePages: 5,
                    onPageClick: function (event, page) {
                        if (oldpage > 0) {
                            $("#spinner").show();
                            $.ajax({
                                type: "POST",
                                url: "<?php echo admin_url('logminigame/detailbaucuaajax')?>",
                                data: {
                                    phienbc: $("#phienbc").val(),
                                    pages: page
                                },
                                dataType: 'json',
                                success: function (result) {
                                    $("#spinner").hide();
                                    $.each(result.transactions, function (index, value) {
                                        result += resultlogbaucua(value.referent_id, value.user_name, value.room, value.bet_bau, value.bet_cua, value.bet_tom, value.bet_ca, value.bet_ga, value.bet_huou, value.money_type, value.time_log);
                                    });
                                    $('#logaction').html(result);
                                }
                            });
                        }
                        oldpage = page;
                    }
                });

            }
        })


    });
    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
</script>

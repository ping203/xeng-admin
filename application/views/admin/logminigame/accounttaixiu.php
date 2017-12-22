<?php $this->load->view('admin/logminigame/head', $this->data) ?>
<div class="line"></div>
<?php if($role == false): ?>
    <div class="wrapper">
        <div class="widget">
            <div class="title">
                <h6>Bạn không được phân quyền</h6>
            </div>
        </div>
    </div>
<?php else: ?>
<div class="wrapper">
    <?php $this->load->view('admin/message', $this->data); ?>
     <link rel="stylesheet" href="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.css">
    <script src="<?php echo public_url() ?>/site/bootstrap/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo public_url() ?>/js/jquery.twbsPagination.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/moment.js"></script>
    <script src="<?php echo public_url() ?>/site/bootstrap/bootstrap.min.js"></script>
    <script
        src="<?php echo public_url() ?>/site/bootstrap/bootstrap-datetimepicker.min.js"></script>
    <div class="widget">
        <h4 id="resultsearch" style="color: red;margin-left: 20px"></h4>
        <div class="title">
            <h6>Lịch sử tài khoản chơi tài xỉu</h6>
        </div>
        <form class="list_filter form" action="<?php echo admin_url('logminigame/accounttaixiu') ?>" method="post">
            <div class="formRow">

                <table>
                    <tr>
                        <td>
                            <label for="param_name" class="formLeft" id="nameuser"
                                   style="margin-left: 50px;margin-bottom:-2px;width: 100px">Từ ngày:</label></td>
                        <td class="item">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" id="toDate" name="toDate" value="<?php echo $this->input->post('toDate') ?>"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                            </div>


                        </td>

                        <td>
                            <label for="param_name" style="margin-left: 20px;width: 100px;margin-bottom:-3px;"
                                   class="formLeft"> Đến ngày: </label>
                        </td>
                        <td class="item">

                            <div class="input-group date" id="datetimepicker2">
                                <input type="text" id="fromDate" name="fromDate" value="<?php echo $this->input->post('fromDate') ?>"> <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
</span>
                            </div>
                        </td>

                    </tr>

                </table>

            </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 30px;margin-bottom:-2px;width: 100px">Nick name:</label></td>
                        <td><input type="text" style="margin-left: 20px;margin-bottom:-2px;width: 150px"
                                   id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name"></td>
                        <td>
                            <label for="param_name" style="width: 100px;margin-bottom:-3px;margin-left: 23px;"
                                   class="formLeft">Phiên: </label>
                        </td>
                        <td><input type="text" style="margin-left: 27px;margin-bottom:-2px;width: 150px"
                                   id="phientx" value="<?php echo $this->input->post('phientx') ?>"
                                   name="phientx"></td>

                    </tr>
                </table>
            </div>
            <div class="formRow">
                <table>
                    <tr>
                        <td><label style="margin-left: 50px;margin-bottom:-2px;width: 100px">Tiền:</label></td>
                        <td class="">
                            <select id="money_type" name="money"
                                    style="margin-left: 0px;margin-bottom:-2px;width: 143px">
                                <option value="1" <?php if($this->input->post('money') == "1"){echo "selected";} ?>>Vin</option>
                                <option value="0" <?php if($this->input->post('money') == "0"){echo "selected";} ?>>Xu</option>
                            </select>
                        </td>
                        <td>
                            <label for="param_name" style="width: 100px;margin-bottom:-3px;margin-left: 64px;"
                                   class="formLeft">Cửa đặt: </label>
                        </td>
                        <td class="item"><select id="cuadatid" name="cuadatid"
                                                 style="margin-left: 5px;margin-bottom:-2px;width: 150px">
                                <option value="" <?php if($this->input->post('cuadatid') == ""){echo "selected";} ?>>Chọn</option>
                                <option value="1" <?php if($this->input->post('cuadatid') == "1"){echo "selected";} ?>>Tài</option>
                                <option value="0" <?php if($this->input->post('cuadatid') == "0"){echo "selected";} ?>>Xỉu</option>
                            </select>
                        </td>
                        <td style="">
                            <input type="button" id="search_tran" value="Tìm kiếm" class="button blueB"
                                   style="margin-left: 123px">
                        </td>
                        <td>
                            <input type="reset"
                                   onclick="window.location.href = '<?php echo admin_url('logminigame/accounttaixiu') ?>'; "
                                   value="Reset" class="basic" style="margin-left: 20px">
                        </td>
                    </tr>
                    </table>
                </div>

        </form>
        <div class="formRow"></div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr style="height: 20px;">
                <td>Phiên</td>
                <td>Nick name</td>
                <td>Tiền đặt</td>
                <td>Cửa đặt</td>
                <td style="width:100px;">Thưởng</td>
                <td>Hoàn trả</td>
                <td>Tiền thay đổi</td>
                <td>Tiền</td>
                <td>Ngày tạo</td>
            </tr>
            </thead>
            <tbody id="logaction">
            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>

<style>.spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -50px; /* half width of the spinner gif */
        margin-top: -50px; /* half height of the spinner gif */
        text-align: center;
        z-index: 1234;
        overflow: auto;
        width: 100px; /* width of the spinner gif */
        height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
    }</style>
<div class="container" style="margin-right:20px;">
    <div id="spinner" class="spinner" style="display:none;">
        <img id="img-spinner" src="<?php echo public_url('admin/images/gif-load.gif') ?>" alt="Loading"/>
    </div>
    <div class="text-center">
        <ul id="pagination-demo" class="pagination-lg"></ul>
    </div>
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
    function resultSearchtaixiu(referenceId, user_name, bet_value, bet_side, total_prize, total_refund, total_exchange, time_log,money_type) {
        var rs = "";
        rs += "<tr>";
        rs += "<td><a style='color: #0000FF' href='detailphientaixiu/"+referenceId+"'>"+referenceId+"</a></td>";
        rs += "<td>" + user_name + "</td>";
        rs += "<td>" + commaSeparateNumber(bet_value) + "</td>";
        if(bet_side == 1){
            rs += "<td>" + "Tài" + "</td>";
        }else  if(bet_side == 0){
            rs += "<td>" + "Xỉu" + "</td>";
        }
        rs += "<td>" + commaSeparateNumber(total_prize) + "</td>";
        rs += "<td>" + commaSeparateNumber(total_refund) + "</td>";
        rs += "<td>" + commaSeparateNumber(total_exchange) + "</td>";
        if(money_type == 1){
            rs += "<td>" + "Vin" + "</td>";
        }else  if(money_type == 0){
            rs += "<td>" + "Xu" + "</td>";
        }
        rs += "<td>" + time_log + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		  $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
		
	})
     $("#search_tran").click(function () {
        var result = "";
        var oldPage = 0;
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('logminigame/accounttaixiuajax')?>",
            data: {
                phientx: $("#phientx").val(),
                nickname: $("#filter_iname").val(),
                cuadat : $("#cuadatid").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#money_type").val(),
                pages : 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					 $('#logaction').html("");
                }else {
					$("#resultsearch").html("");
                    var totalPage = result.total;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchtaixiu(value.referenceId, value.user_name, value.bet_value, value.bet_side, value.total_prize, value.total_refund, value.total_exchange, value.time_log, value.money_type)
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('logminigame/accounttaixiuajax')?>",
                                    data: {
                                        phientx: $("#phientx").val(),
                                        nickname: $("#filter_iname").val(),
                                        cuadat : $("#cuadatid").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#money_type").val(),
                                        pages : page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
										$("#resultsearch").html("");
                                        $("#spinner").hide();
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchtaixiu(value.referenceId, value.user_name, value.bet_value, value.bet_side, value.total_prize, value.total_refund, value.total_exchange, value.time_log, value.money_type)
                                        });
                                        $('#logaction').html(result);

                                    }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
                                });
                            }
                            oldPage = page;
                        }

                    });

                }

            }, error: function () {
                $("#spinner").hide();
                $('#logaction').html("");
                $("#resultsearch").html("Hệ thống quá tải. Vui lòng gọi 19008698 hoặc F5 lại pages");
            },timeout : timeOutApi
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
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
            Danh sách nhận thưởng nhiệm vụ
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
            </div>

        </div>
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
                    <label for="exampleInputEmail1">Loại thẻ:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="sl-gamname" name="sl-gamname" class="form-control">
                        <option value="" selected >Tất cả</option>
                        <option value="" <?php if ($this->input->post('sl-gamname') == "") {
                            echo "selected";
                        } ?> >Minigame && Slot
                        </option>
                        <option value="TaiXiu" <?php if ($this->input->post('sl-gamname') == "TaiXiu") {
                            echo "selected";
                        } ?> >------Tài Xỉu
                        </option>
                        <option value="KhoBau" <?php if ($this->input->post('sl-gamname') == "KhoBau") {
                            echo "selected";
                        } ?> >------Kho Báu
                        </option>
                        <option
                            value="SieuAnhHung" <?php if ($this->input->post('sl-gamname') == "SieuAnhHung") {
                            echo "selected";
                        } ?> >------Siêu Anh Hùng
                        </option>
                        <option
                            value="MyNhanNgu" <?php if ($this->input->post('sl-gamname') == "MyNhanNgu") {
                            echo "selected";
                        } ?> >------Mỹ Nhân Ngư
                        </option>
                        <option
                            value="NuDiepVien" <?php if ($this->input->post('sl-gamname') == "NuDiepVien") {
                            echo "selected";
                        } ?> >------Nữ Điệp Viên
                        </option>
                        <option
                            value="VuongQuocVin" <?php if ($this->input->post('sl-gamname') == "VuongQuocVin") {
                            echo "selected";
                        } ?> >------Vương Quốc <?php  echo $namegame ?>
                        </option>
                        <option value="" <?php if ($this->input->post('sl-gamname') == "") {
                            echo "selected";
                        } ?> >Game bài
                        </option>
                        <option value="Sam" <?php if ($this->input->post('sl-gamname') == "Sam") {
                            echo "selected";
                        } ?> >------Sâm
                        </option>
                        <option value="BaCay " <?php if ($this->input->post('sl-gamname') == "BaCay ") {
                            echo "selected";
                        } ?> >------Ba Cây
                        </option>
                        <option value="Binh" <?php if ($this->input->post('sl-gamname') == "Binh") {
                            echo "selected";
                        } ?> >------Binh
                        </option>
                        <option value="Tlmn" <?php if ($this->input->post('sl-gamname') == "Tlmn") {
                            echo "selected";
                        } ?> >------Tiến lên
                        </option>
                        <option value="Lieng" <?php if ($this->input->post('sl-gamname') == "Lieng") {
                            echo "selected";
                        } ?> >------Liêng
                        </option>
                        <option value="BaiCao" <?php if ($this->input->post('sl-gamname') == "BaiCao") {
                            echo "selected";
                        } ?> >------Bài Cào
                        </option>
                        <option value="XocDia" <?php if ($this->input->post('sl-gamname') == "XocDia") {
                            echo "selected";
                        } ?> >------Xóc Đĩa
                        </option>
                        <option value="Poker" <?php if ($this->input->post('sl-gamname') == "Poker") {
                            echo "selected";
                        } ?> >------Poker
                        </option>
                        <option value="XiDzach" <?php if ($this->input->post('sl-gamname') == "XiDzach") {
                            echo "selected";
                        } ?> >------XiDzach
                        </option>

                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-1 col-sm-2 col-xs-12">
                    <label for="exampleInputEmail1">Loại tiền:</label>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <select id="sl-moneytype" name="sl-moneytype" class="form-control">
                        <option value="" <?php if ($this->input->post('sl-moneytype') == "") {
                            echo "selected";
                        } ?> >Tất cả
                        </option>
                        <option value="vin" <?php if ($this->input->post('sl-moneytype') == "vin") {
                            echo "selected";
                        } ?> ><?php echo $namegame ?>
                        </option>
                        <option value="xu" <?php if ($this->input->post('sl-moneytype') == "xu") {
                            echo "selected";
                        } ?> >Xu
                        </option>
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
                <table id="checkAll" class="table  table-bordered table-hover">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td>User Id</td>
                        <td>Nickname</td>
                        <td>Tên game</td>
                        <td>Cấp độ nhận thưởng</td>
                        <td>Tiền thưởng</td>
                        <td>Tiền User</td>
                        <td>Loại tiền</td>
                        <td>Thời gian</td>
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
    function resultSearchTransction(stt, userid, nickname, gamename, level, moneybonus, moneyuser, moneytype,date) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td>" + userid + "</td>";
        rs += "<td>" + nickname + "</td>";
        rs += "<td>" + gamename + "</td>";
        rs += "<td>" + level + "</td>";
        rs += "<td>" + commaSeparateNumber(moneybonus) + "</td>";
        rs += "<td>" + commaSeparateNumber(moneyuser) + "</td>";
        rs += "<td>" + moneytype + "</td>";
        rs += "<td>" + date + "</td>";
        rs += "</tr>";
        return rs;
    }
    $(document).ready(function () {
		 $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
     $("#search_tran").click(function () {
        var oldPage = 0;
        var result = "";
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('event/listbonusnhiemvuajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                toDate: $("#toDate").val(),
                fromDate: $("#fromDate").val(),
                money: $("#sl-moneytype").val(),
                gamename: $("#sl-gamname").val(),
                pages: 1
            },

            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");


                     stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt, value.userId, value.nickName, value.gameName, value.levelReceivedReward, value.moneyBonus, value.moneyUser, value.moneyType,value.timeLog);
                        stt++;

                    });
                    $('#logaction').html(result);
                    var table = $('#checkAll').DataTable({
						"retrieve": true,
                        "ordering": true,
                        "searching": true,
                        "paging": false,
                        "draw": false
                    });
                    $('#pagination-demo').twbsPagination({
                        totalPages: 10,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if (oldPage > 0) {
                                $("#spinner").show();
                               // table.destroy();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('event/listbonusnhiemvuajax')?>",

                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        toDate: $("#toDate").val(),
                                        fromDate: $("#fromDate").val(),
                                        money: $("#sl-moneytype").val(),
                                        gamename: $("#sl-gamname").val(),
                                        pages: page
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#resultsearch").html("");
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.userId, value.nickName, value.gameName, value.levelReceivedReward, value.moneyBonus, value.moneyUser, value.moneyType,value.timeLog);
                                            stt++;

                                        });
                                        $('#logaction').html(result);
                                        table = $('#checkAll').DataTable({
											"retrieve": true,
                                            "ordering": true,
                                            "searching": true,
                                            "paging": false,
                                            "draw": false
                                        });
                                    }, error: function () {

                                        $('#logaction').html("");
                                       errorThongBao();

                                    }, timeout: timeOutApi
                                });
                            }
                            oldPage = page;
                        }
                    });
                }
            }, error: function () {
                $('#logaction').html("");
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
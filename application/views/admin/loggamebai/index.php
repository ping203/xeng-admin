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
                Lịch sử game bài
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-body">

                        <label id="resultsearch" style="color: red;"></label>
                        <input type="hidden" id="typemoney" value="<?php echo $namegame ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Từ ngày:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' value="<?php echo $this->input->post('toDate') ?>"
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
                                            <input type='text' value="<?php echo $this->input->post('fromDate') ?>"
                                                   class="form-control"
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
                                        <input type="text" class="form-control"
                                               id="filter_iname" value="<?php echo $this->input->post('name') ?>" name="name">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Tên game:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="namegame" name="namegame" class="form-control">
                                            <option value="" <?php if($this->input->post('namegame') == ""){echo "selected";} ?>>Chọn</option>
                                            <option value="Sam" <?php if($this->input->post('namegame') == "Sam"){echo "selected";} ?>>Sâm</option>
                                            <option value="BaCay" <?php if($this->input->post('namegame') == "BaCay"){echo "selected";} ?>>Ba cây</option>
                                            <option value="Binh" <?php if($this->input->post('namegame') == "Binh"){echo "selected";} ?>>Binh</option>
                                            <option value="Tlmn" <?php if($this->input->post('namegame') == "Tlmn"){echo "selected";} ?>>TLML</option>
                                            <option value="Tala" <?php if($this->input->post('namegame') == "Tala"){echo "selected";} ?>>Tá Lả</option>
                                            <option value="Lieng" <?php if($this->input->post('namegame') == "Lieng"){echo "selected";} ?>>Liêng</option>
                                            <option value="XiTo" <?php if($this->input->post('namegame') == "XiTo"){echo "selected";} ?>>Xì Tố</option>
                                            <option value="BaiCao" <?php if($this->input->post('namegame') == "BaiCao"){echo "selected";} ?>>Bài Cào</option>
                                            <option value="XocDia" <?php if($this->input->post('namegame') == "XocDia"){echo "selected";} ?>>Xóc Đĩa</option>
                                            <option value="Poker" <?php if($this->input->post('namegame') == "Poker"){echo "selected";} ?>>Poker</option>
                                            <option value="PokerTour" <?php if($this->input->post('namegame') == "PokerTour"){echo "selected";} ?>>PokerTour</option>
                                            <option value="XiDzach" <?php if($this->input->post('namegame') == "XiDzach"){echo "selected";} ?>>XiDzach</option>
                                            <option value="Caro" <?php if($this->input->post('namegame') == "Caro"){echo "selected";} ?>>Caro</option>
                                            <option value="Cotuong" <?php if($this->input->post('namegame') == "CoTuong"){echo "selected";} ?>>Cờ tướng</option>
                                            <option value="CoUp" <?php if($this->input->post('namegame') == "CoUp"){echo "selected";} ?>>Cờ úp</option>
                                        </select>
                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Phiên:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <input type="text" class="form-control"
                                               id="session_name" value="<?php echo $this->input->post('session_name') ?>" name="session_name">
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <label for="exampleInputEmail1">Loại tiền:</label>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <select id="moneytype" name="moneytype" class="form-control">
                                            <option value="" <?php if($this->input->post('moneytype') == ""){echo "selected";} ?>>Chọn</option>
                                            <option value="1" <?php if($this->input->post('moneytype') == "1"){echo "selected";} ?>><?php echo $namegame?></option>
                                            <option value="0" <?php if($this->input->post('moneytype') == "0"){echo "selected";} ?>>Xu</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1 col-sm-2 col-xs-12">

                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <input type="button" id="search_tran" value="Tìm kiếm"
                                               class="btn btn-success">
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
                                            <td>Session id</td>
                                            <td>Nick name</td>
                                            <td>Tên game</td>
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
    <?php endif; ?>
</div>
<script src="<?php echo public_url() ?>/js/moment.min.js"></script>
<script>
    $("#search_tran").click(function () {


        var fromDatetime = $("#toDate").val();
        var toDatetime = $("#fromDate").val();
        if (fromDatetime > toDatetime) {
            alert('Ngày kết thúc phải lớn hơn ngày bắt đầu')
            return false;
        }

    });

    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });

    });

    $(document).ready(function () {
		
		   $("#resultsearch").html("Vui lòng ấn nút tìm kiếm");
	})
    $("#search_tran").click(function () {

        var fromdate;
        var todate;
        var oldpage = 0;
        if($("#toDate").val()!=""){
            var match = $("#toDate").val().match(/^(\d+)-(\d+)-(\d+) (\d+)\:(\d+)\:(\d+)$/)
            var date = new Date(match[1], match[2] - 1, match[3], match[4], match[5], match[6])
            fromdate = date.getTime() / 1000;
        }
        else{
            fromdate =  "";
        }
        if($("#fromDate").val()!=""){
            var match = $("#fromDate").val().match(/^(\d+)-(\d+)-(\d+) (\d+)\:(\d+)\:(\d+)$/)
            var date = new Date(match[1], match[2] - 1, match[3], match[4], match[5], match[6])
            todate = date.getTime() / 1000;
        }
        else{
            todate =  "";
        }
        $('#pagination-demo').css("display", "block");
        $("#spinner").show();
        $.ajax({
            type: "POST",
            url: "<?php echo admin_url('loggamebai/indexajax')?>",
            data: {
                nickname: $("#filter_iname").val(),
                namegame: $("#namegame").val(),
                toDate : fromdate,
                fromDate : todate,
                pages : 1,
                sid : $("#session_name").val(),
                money : $("#moneytype").val()
            },
            dataType: 'json',
            success: function (result) {
                $("#spinner").hide();
                var totalPage = result.total;
                if (result.transactions == "") {
                    $('#pagination-demo').css("display", "none");
                    $("#resultsearch").html("Không tìm thấy kết quả");
					  $('#logaction').html("");
                } else {
                    $("#resultsearch").html("");
                    stt = 1;
                    $.each(result.transactions, function (index, value) {
                        result += resultSearchTransction(stt,value.sessionId, value.nickName, value.gameName,value.moneyType,value.timeLog);
                        stt ++;
                    });
                    $('#logaction').html(result);
                    $('#pagination-demo').twbsPagination({
                        totalPages: totalPage,
                        visiblePages: 5,
                        onPageClick: function (event, page) {
                            if(oldpage>0) {
                                $("#spinner").show();
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo admin_url('loggamebai/indexajax')?>",
                                    // url: "http://192.168.0.251:8082/api_backend",
                                    data: {
                                        nickname: $("#filter_iname").val(),
                                        namegame: $("#namegame").val(),
                                        toDate : fromdate,
                                        fromDate : todate,
                                        pages : page,
                                        sid : $("#session_name").val(),
                                        money : $("#moneytype").val()
                                    },
                                    dataType: 'json',
                                    success: function (result) {
                                        $("#spinner").hide();
                                        stt = 1;
                                        $.each(result.transactions, function (index, value) {
                                            result += resultSearchTransction(stt, value.sessionId, value.nickName, value.gameName,value.moneyType, value.timeLog);
                                            stt++;
                                        });
                                        $('#logaction').html(result);
                                    }, error: function () {
                                        $('#logaction').html("");
                                        errorThongBao();
                                    }, timeout: timeOutApi
                                });
                            }
                            oldpage = page;
                        }
                    });
                }




            }, error: function () {
                                        $('#logaction').html("");
                                        errorThongBao();
                                    }, timeout: timeOutApi
        })

    })
    function resultSearchTransction(stt,sid,nickname,gamename,moneytype,time) {
        var rs = "";
        rs += "<tr>";
        rs += "<td>" + stt + "</td>";
        rs += "<td width='50' >" + sid + "</td>";
        rs += "<td><a style='color: #0000FF' href='loggamebai/detail/"+sid+"/"+gamename+"/"+time+"'>"+nickname+"</a>"+ "</td>";
        rs += "<td>" + gamename + "</td>";

        if(moneytype ==1){
            rs += "<td>" + "<?php echo $namegame ?>" + "</td>";
        }else if(moneytype == 0){
            rs += "<td>" + "Xu" + "</td>";
        }else{
            rs += "<td>" + "" + "</td>";
        }
        rs += "<td>" + moment.unix(time/1000).format("DD MMM YYYY hh:mm a"), + "</td>";
        rs += "</tr>";
        return rs;
    }


</script>